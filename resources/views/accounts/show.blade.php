@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Account : {{ $account->id }}
                    <small>
                        @if($account->applied_for_payout == 1)
                            Payout Request pending
                        @endif
                    </small>
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
