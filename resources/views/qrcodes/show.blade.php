@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Qrcode Details</h1>
                </div>

                @if($qrcode->user_id == Auth::user()->id || Auth::user()->role_id < 3)
                    <div class="col-sm-6">
                        <a class="btn btn-primary float-right"
                        href="{{ route('qrcodes.edit', [$qrcode->id]) }}">
                            Edit 
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @include('qrcodes.show_fields')
                </div>
            </div>
        </div>
    </div>
@endsection
