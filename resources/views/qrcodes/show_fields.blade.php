<div class="col-md-6">

<!-- Product Name Field -->
<div class="col-sm-12">
    {!! Form::label('product_name', 'Product Name:') !!}
    <h3>
        {{ $qrcode->product_name }}
        <br>
        @if(isset( $qrcode->company_name ))
            <small>{{ $qrcode->company_name }}</small>
        @endif
    </h3>    
</div>

<!-- Amount Field -->
<div class="col-sm-12">
    <h4>Amount : {{ $qrcode->amount }}</h4>
</div>

<!-- Product Url Field -->
<div class="col-sm-12">
    {!! Form::label('product_url', 'Product Url:') !!}
    <p>
        <a href="{{ $qrcode->product_url }}" target="_blank">
            {{ $qrcode->product_url }}
        </a>
    </p>
</div>

@if(!Auth::guest() && ($qrcode->user_id == Auth::user()->id || Auth::user()->role_id < 3))
<hr>
    <!-- User Id Field -->
    <div class="col-sm-12">
        {!! Form::label('user_id', 'User Name:') !!}
        <p>{{ $qrcode->user['email'] }}</p>
    </div>
@endif
<!-- Website Field -->
<div class="col-sm-12">
    {!! Form::label('website', 'Website:') !!}
    <p><a href="{{ $qrcode->website }}" target="_blank">{{ $qrcode->website }}</a></p>
</div>



<!-- Callback Url Field -->
<div class="col-sm-12">
    {!! Form::label('callback_url', 'Callback Url:') !!}
    <p><a href="{{ $qrcode->callback_url }}">{{ $qrcode->callback_url }}</a></p>
</div>

<!-- Status Field -->
<div class="col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    @if($qrcode->status == 1)
        Active
    @else
        Inactive
    @endif
</div>

</div>

<div class="col-md-5 pull-right">
    <!-- Qrcode Path Field -->
    <div class="col-sm-12">
        {!! Form::label('qrcode_path', 'Scan QRCode and Pay Path:') !!}<br>
        <img src="{{ asset($qrcode->qrcode_path) }}" alt="">
    </div>


    <?php
// more details https://paystack.com/docs/payments/multi-split-payments/#dynamic-splits

$split = [
   "type" => "percentage",
   "currency" => "KES",
   "subaccounts" => [
    [ "subaccount" => "ACCT_li4p6kte2dolodo", "share" => 10 ],
    [ "subaccount" => "ACCT_li4p6kte2dolodo", "share" => 30 ],
   ],
   "bearer_type" => "all",
   "main_account_share" => 70
];
?>

                        <form method="POST" role="form" class="col-md-6" action="{{ route('show_payments_page') }}">
                            {{ csrf_field() }}
                                <div class="form-group">
                                    @if(Auth::guest())
                                    {{-- Only logged out users --}}
                                        <label for="email">Enter Your Email</label>
                                        <input type="text" name="email" required class="form-control" placeholder="Youremail@gmail.com"> 
                                </div>
                                @else
                                <input type="hidden" name="email" value={{ Auth::user()->email }}> {{-- required --}}

                                @endif
                                <input type="hidden" name = "qrcode_id" value="{{ $qrcode->id }}">
                                    <p>
                                        <button class="btn btn-success btn-lg btn-block" type="submit" value="Pay Now!">
                                            <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
                                        </button>
                                    </p>
                                
                            </div>
                        </form>
                    

@if(!Auth::guest() && ($qrcode->user_id == Auth::user()->id || Auth::user()->role_id < 3))

    <div class="col-md-12">
        <h3 class="text-center">Transactions done on this QR Code</h3>
        @include('transactions.table')
    </div>

@endif

