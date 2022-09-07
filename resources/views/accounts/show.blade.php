@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="float-left">Account : {{ $account->id }}
                    <small>
                        @if($account->applied_for_payout == 1)
                            Payout Request pending
                        @endif
                    </small>
                    </h1>
                    <h1 class="float-right">
                        @if(Auth::user()->id == $account->user_id && $account->applied_for_payout != 1)
                            {!! Form::open(['route' => ['accounts.apply_for_payout'], 'method' => 'post', 'class'=>'float-left','style'=>'margin-right:10px;']) !!}
                            <input type="hidden" name="account_id" value="{{ $account->id }}">
                            <div class='btn-group'>
                                {!! Form::button('<i class="fa fa-check"></i> Apply for Payout', ['type' => 'submit', 'class' => 'btn btn-primary', 'onclick' => "return confirm('Are you wish to apply for payout?')"]) !!}
                            </div>
                            {!! Form::close() !!}
                        @endif
                        @if(Auth::user()->role_id < 3 && $account->paid != 1)
                            {!! Form::open(['route' => ['accounts.mark_as_paid'], 'method' => 'post', 'class'=>'float-left']) !!}
                            <input type="hidden" name="account_id" value="{{ $account->id }}">
                            <div class='btn-group'>
                                {!! Form::button('<i class="fa fa-check"></i> Mark as Paid', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure you wish to confirm payout?')"]) !!}
                            </div>
                            {!! Form::close() !!}
                        @endif
                    </h1>

                   

                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @include('accounts.show_fields')
                </div>
            </div>
        </div>
    </div>
@endsection
