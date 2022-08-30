<div class="table-responsive">
    <table class="table" id="transactions-table">
        <thead>
        <tr>
            <th>User Id</th>
        <th>Qr Code Owner</th>
        <th>Qr Code Id</th>
        <th>Payment Method</th>
        <th>Message</th>
        <th>Amount</th>
        <th>Status</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($transactions as $transaction)
            <tr>
                <td>{{ $transaction->user_id }}</td>
            <td>{{ $transaction->qr_code_owner }}</td>
            <td>{{ $transaction->qr_code_id }}</td>
            <td>{{ $transaction->payment_method }}</td>
            <td>{{ $transaction->message }}</td>
            <td>{{ $transaction->amount }}</td>
            <td>{{ $transaction->status }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['transactions.destroy', $transaction->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('transactions.show', [$transaction->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('transactions.edit', [$transaction->id]) }}"
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