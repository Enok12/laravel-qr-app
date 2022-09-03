<div class="table-responsive">
    <table class="table" id="accountHistories-table">
        <thead>
        <tr>
            <th>Account Id</th>
        <th>User Id</th>
        <th>Message</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($accountHistories as $accountHistory)
            <tr>
                <td>{{ $accountHistory->account_id }}</td>
            <td>{{ $accountHistory->user_id }}</td>
            <td>{{ $accountHistory->message }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['accountHistories.destroy', $accountHistory->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('accountHistories.show', [$accountHistory->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('accountHistories.edit', [$accountHistory->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
