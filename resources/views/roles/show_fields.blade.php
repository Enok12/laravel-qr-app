
<!-- Created at  Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $role->created_at->format('D d, M, Y') }}</p>
</div>

<h3 class="text-center">Users that belong to this Role</h3>
@include('users.table')