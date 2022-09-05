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
            <td>
                
                <a href="{{ route('accounts.show', [$account->id]) }}"
                    class='btn btn-default btn-xs'>
                    {{ $account->user['email'] }}
                 </a>
            </td>
            <td>Rs. {{ number_format($account->balance) }}</td>
            <td>Rs. {{  number_format($account->total_credit) }}</td>
            <td>Rs. {{  number_format($account->total_debit) }}</td>
                <td width="120">
                    <div class='btn-group'>
                
                        <a href="{{ route('accounts.edit', [$account->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                    </div>
            
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
