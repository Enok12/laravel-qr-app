<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateQrcodeRequest;
use App\Http\Requests\UpdateQrcodeRequest;
use App\Repositories\QrcodeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use QRCode;
use Auth;
use App\Models\Qrcode as QrcodeModel;

class QrcodeController extends AppBaseController
{
    /** @var QrcodeRepository $qrcodeRepository*/
    private $qrcodeRepository;

    public function __construct(QrcodeRepository $qrcodeRepo)
    {
        $this->qrcodeRepository = $qrcodeRepo;
    }

    /**
     * Display a listing of the Qrcode.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        //Only Admin can see Qr Codes
        if(Auth::user()->role_id < 3){
            $qrcodes = $this->qrcodeRepository->all();
        }else{
            $qrcodes = QrcodeModel::where('user_id',Auth::user()->id);
        }

        return view('qrcodes.index')
            ->with('qrcodes', $qrcodes);
    }

    /**
     * Show the form for creating a new Qrcode.
     *
     * @return Response
     */
    public function create()
    {
        return view('qrcodes.create');
    }

    /**
     * Store a newly created Qrcode in storage.
     *
     * @param CreateQrcodeRequest $request
     *
     * @return Response
     */
    public function store(CreateQrcodeRequest $request)
    {
        $input = $request->all();

        //Save to the database
        $qrcode = $this->qrcodeRepository->create($input);

        $file = 'generated_qrcodes/'.$qrcode->id.'.png';

         QRCode::text("YOU ARE GAY")
        ->setSize(8)
        ->setMargin(2)
        ->setOutfile($file)
        ->png();

        $input['qrcode_path'] = $file;

            //Update
            QrcodeModel::where('id',$qrcode->id)
            ->update(['qrcode_path' => $input['qrcode_path']]);
           
            // Flash::success('Qrcode saved successfully.');

        return redirect(route('qrcodes.show',['qrcode' => $qrcode]));
    }

    /**
     * Display the specified Qrcode.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $qrcode = $this->qrcodeRepository->find($id);

        if (empty($qrcode)) {
            Flash::error('Qrcode not found');

            return redirect(route('qrcodes.index'));
        }

        $transactions = $qrcode->transactions;

        return view('qrcodes.show')
        ->with('qrcode', $qrcode)
        ->with('transactions', $transactions);
    }

    /**
     * Show the form for editing the specified Qrcode.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $qrcode = $this->qrcodeRepository->find($id);

        if (empty($qrcode)) {
            Flash::error('Qrcode not found');

            return redirect(route('qrcodes.index'));
        }

        return view('qrcodes.edit')->with('qrcode', $qrcode);
    }

    /**
     * Update the specified Qrcode in storage.
     *
     * @param int $id
     * @param UpdateQrcodeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateQrcodeRequest $request)
    {
        $qrcode = $this->qrcodeRepository->find($id);

        if (empty($qrcode)) {
            Flash::error('Qrcode not found');

            return redirect(route('qrcodes.index'));
        }

        $qrcode = $this->qrcodeRepository->update($request->all(), $id);

        Flash::success('Qrcode updated successfully.');

        return redirect(route('qrcodes.show',['qrcode' => $qrcode]));
    }

    /**
     * Remove the specified Qrcode from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $qrcode = $this->qrcodeRepository->find($id);

        if (empty($qrcode)) {
            Flash::error('Qrcode not found');

            return redirect(route('qrcodes.index'));
        }

        $this->qrcodeRepository->delete($id);

        Flash::success('Qrcode deleted successfully.');

        return redirect(route('qrcodes.index'));
    }
}
