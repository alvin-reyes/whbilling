<table class="table table-bordered table-hover sys_table">
    <thead>
    <tr>
        <th>#</th>
        <th>Account</th>
        <th>Amount</th>
        <th>Invoice Date</th>
        <th>Due Date</th>
        <th>Status</th>
        <th>Manage</th>
    </tr>
    </thead>
    <tbody>

    {foreach $i as $is}
        <tr>
            <td>{$is['id']}</td>
            <td>{$is['account']}</td>
            <td>{$is['total']}</td>
            <td>{$is['date']}</td>
            <td>{$is['duedate']}</td>
            <td>{$is['status']}</td>
            <td>
                <a href="{$_url}invoices/view/{$is['id']}/" class="btn btn-primary btn-xs"><i class="fa fa-check"></i> View</a>
                <a href="{$_url}invoices/edit/{$is['id']}/" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit</a>
            </td>
        </tr>
    {/foreach}

    </tbody>
</table>