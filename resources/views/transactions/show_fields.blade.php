<div class="col-md-6">
    <!-- Qr Code Id Field -->
    <div class="col-sm-12">
        {!! Form::label('qr_code_id', 'Product Name') !!}

        <p>
            {{-- Check out the Transaciton Model and QrCodel Model the relationships --}}
            <a href="/qrcodes/{{ $transaction->qrcode['id'] }}">
                <b>
                    {{ $transaction->qrcode['product_name'] }}
                </b>
                
            </a>
        </p>
    </div>

    <!-- Amount Field -->
    <div class="col-sm-12">
        {!! Form::label('amount', 'Amount:') !!}
        <p>{{ $transaction->amount }}</p>
    </div>

    @if($transaction->qrcode['product_url'])
    <div class="col-sm-12">
        <p><a href="{{ $transaction->qrcode['product_url'] }}" class="btn btn-success btn-lg">
            Return to Merchant Site</a></p>
    </div>
    @endif
</div>


<div class="col-md-6">
<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', 'Buyer Name:') !!}
    <p>
        <a href="/users/{!! $transaction->user['id']!!}">
        {{ $transaction->user['name'] }} | {{  $transaction->user['email'] }}</a></p>
</div>

<!-- Qr Code Owner Field -->
<div class="col-sm-12">
    {!! Form::label('qr_code_owner', 'Qr Code Owner Name:') !!}
    <p><a href="/users/{!! $transaction->user['id']!!}">
        {{ $transaction->qrcode_owner['name'] }}</a></p>
</div>

<!-- Payment Method Field -->
<div class="col-sm-12">
    {!! Form::label('payment_method', 'Payment Method:') !!}
    <p>{{ $transaction->payment_method }}</p>
</div>

<!-- Message Field -->
<div class="col-sm-12">
    {!! Form::label('message', 'Message:') !!}
    <p>{{ $transaction->message }}</p>
</div>



<!-- Status Field -->
<div class="col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $transaction->status }}</p>
</div>


</div>

