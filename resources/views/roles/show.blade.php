@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6">
                    <h1>Role Details</h1>
                </div>
               
                <div class="col-md-6 pull-right">
                    <a href="{{ route('roles.edit', [$role->id]) }}"
                        class='btn btn-primary pull-right'>
                         Edit Role
                     </a>
                </div>
                    

            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @include('roles.show_fields')
                </div>
            </div>
        </div>
    </div>
@endsection
