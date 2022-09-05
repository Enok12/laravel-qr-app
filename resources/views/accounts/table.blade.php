<div class="table-responsive">
    <table class="table" id="accounts-table">
        <thead>
        <tr>
        <th>User Email </th>
        <th>Balance</th>
        <th>Total Credit</th>
        <th>Total Debit</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($accounts as $account)
            <tr>
            <td>{{ $account->user_id }}</td>
            <td>{{ $account->balance }}</td>
            <td>{{ $account->total_credit }}</td>
            <td>{{ $account->total_debit }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['accounts.destroy', $account->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('accounts.show', [$account->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('accounts.edit', [$account->id]) }}"
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
