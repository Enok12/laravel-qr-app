<div class="col-md-6">
<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', 'User:') !!}
    <p>{{ $account->user['name'] }} : {{ $account->user['email'] }}</p>
</div>

<!-- Balance Field -->
<div class="col-sm-12">
    {!! Form::label('balance', 'Balance:') !!}
    <p>Rs. {{ number_format($account->balance) }}</p>
</div>

<!-- Total Credit Field -->
<div class="col-sm-12">
    {!! Form::label('total_credit', 'Total Credit:') !!}
    <p>Rs. {{ number_format($account->total_credit) }}</p>
</div>

<!-- Total Debit Field -->
<div class="col-sm-12">
    {!! Form::label('total_debit', 'Total Debit:') !!}
    <p>Rs. {{ number_format($account->total_debit) }}</p>
</div>

<!-- Withdrawal Method Field -->
<div class="col-sm-12">
    {!! Form::label('withdrawal_method', 'Withdrawal Method:') !!}
    <p>{{ $account->withdrawal_method }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $account->created_at->format('D d, M, Y H:i') }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $account->updated_at->format('D d, M, Y H:i') }}</p>
</div>

</div>

<div class="col-md-6">

<!-- Payment Email Field -->
<div class="col-sm-12">
    {!! Form::label('payment_email', 'Payment Email:') !!}
    <p>{{ $account->payment_email }}</p>
</div>

<!-- Bank Name Field -->
<div class="col-sm-12">
    {!! Form::label('bank_name', 'Bank Name:') !!}
    <p>{{ $account->bank_name }}</p>
</div>

<!-- Bank Branch Field -->
<div class="col-sm-12">
    {!! Form::label('bank_branch', 'Bank Branch:') !!}
    <p>{{ $account->bank_branch }}</p>
</div>

<!-- Bank Account Field -->
<div class="col-sm-12">
    {!! Form::label('bank_account', 'Bank Account:') !!}
    <p>{{ $account->bank_account }}</p>
</div>


<!-- Country Field -->
<div class="col-sm-12">
    {!! Form::label('country', 'Country:') !!}
    <p>{{ $account->country }}</p>
</div>

<!-- Other Details Field -->
<div class="col-sm-12">
    {!! Form::label('other_details', 'Other Details:') !!}
    <p>{{ $account->other_details }}</p>
</div>



</div>

