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

@if($qrcode->user_id == Auth::user()->id || Auth::user()->role_id < 3)
<hr>
    <!-- User Id Field -->
    <div class="col-sm-12">
        {!! Form::label('user_id', 'User Name:') !!}
        <p>{{ $qrcode->user_id }}</p>
    </div>
@endif
<!-- Website Field -->
<div class="col-sm-12">
    {!! Form::label('website', 'Website:') !!}
    <p>{{ $qrcode->website }}</p>
</div>



<!-- Callback Url Field -->
<div class="col-sm-12">
    {!! Form::label('callback_url', 'Callback Url:') !!}
    <p>{{ $qrcode->callback_url }}</p>
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
</div>

@if($qrcode->user_id == Auth::user()->id || Auth::user()->role_id < 3)

    <div class="col-md-12">
        <h3 class="text-center">Transactions done on this QR Code</h3>
        @include('transactions.table')
    </div>

@endif

