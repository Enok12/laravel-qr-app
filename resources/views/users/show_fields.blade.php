<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $user->name }}</p>
</div>

<!-- Role Id Field -->
<div class="col-sm-12">
    {!! Form::label('role_id', 'User Level:') !!}
    <p>{{ $user->role['name'] }}</p>
</div>

<!-- Email Field -->
<div class="col-sm-12">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $user->email }}</p>
</div>

<!-- Email Verified At Field -->
<div class="col-sm-12">
    {!! Form::label('email_verified_at', 'Email Verified At:') !!}
    <p>{{ $user->email_verified_at }}</p>
</div>

@if($user->user_id == Auth::user()->id || Auth::user()->role_id < 3)

    <div class="col-md-12">
        <h3 class="text-center">Transactions</h3>
        @include('transactions.table')
    </div>

    <div class="col-md-12">
        <h3 class="text-center">QRCodes</h3>
        @include('qrcodes.table')
    </div>

@endif





