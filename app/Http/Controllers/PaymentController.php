<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Paystack;
use Flash;
use App\Models\Transaction;
use App\Models\Qrcode as QrcodeModel;
use App\Models\User;
use App\Models\Account;
use App\Models\AccountHistory;
use Auth;


class PaymentController extends Controller
{

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
        // $sample = Paystack::getAuthorizationUrl();
        // dd($sample);
        try{
           
           
            return Paystack::getAuthorizationUrl()->redirectNow();
        }catch(\Exception $e) {
            dd($e);
            return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }        
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();

        if($paymentDetails['data']['status'] != 'success'){
            Flash::error('Sorry , Payment Failed');

            return redirect()->route('qrcodes.show',['id'=>$paymentDetails['data']['metadata']['qrcode_id'] ]);
        }

        $qrcode = QrcodeModel::find($paymentDetails['data']['metadata']['qrcode_id']);

        //Check amount is same as in the database
        if($qrcode->amount != ($paymentDetails['data']['amount']/100)){
            Flash::error('Sorry , You Paid the wrong Amount. Contact administrator');

            return redirect()->route('qrcodes.show',['id'=>$paymentDetails['data']['metadata']['qrcode_id'] ]);
        }

        //Update Transaction

        $transaction = Transaction::where('id',$paymentDetails['data']['metadata']['transaction_id'])->first();
        Transaction::where('id',$paymentDetails['data']['metadata']['transaction_id'])
        ->update([
            'Status'=>'Completed'
        ]);

        //get Buyer Details
        $buyer = User::find('id',$paymentDetails['data']['metadata']['buyer_user_id']);

        //Update Qrcode Owner Account and Account Hisotry
        $qrCodeOwneraccount = Account::where('user_id',$qrcode->user_id)->first();

        Account::where('user_id',$qrcode->user_id)->update([
            'balance'=> ($qrCodeOwneraccount->balance + $qrcode->amount),
            'total_credit' => ($qrCodeOwneraccount->total_credit + $qrcode->amount),
        ]);

        AccountHistory::create([
            'user_id' =>$qrcode->user_id,
            'account_id' =>$qrCodeOwneraccount->id,
            'message' =>'Received '.$transaction->payment_method.' Payment from '.$buyer->email.'for qrcode :'.$qrcode->product_name,
        ]);



                //Update Qrcode Owner Account and Account Hisotry
                $buyerAccount = Account::where('user_id',$paymentDetails['data']['metadata']['buyer_user_id'])->first();

                Account::where('user_id',$paymentDetails['data']['metadata']['buyer_user_id'])->update([
                    'total_debit' => ($qrCodeOwneraccount->total_credit + $qrcode->amount),
                ]);
        
                AccountHistory::create([
                    'user_id' =>$paymentDetails['data']['metadata']['buyer_user_id'],
                    'account_id' =>$buyerAccount->id,
                    'message' =>'Paid '.$transaction->payment_method.' Payment from '.$qrcode->user['email'].'for qrcode :'.$qrcode->product_name,
                ]);

                return redirect(route('transactions.show',['id'=>$transaction->id] ));


        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }
}
