{include file="sections/header.tpl"}
<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>List Invoices </h5>
        <div class="ibox-tools">
            <a href="{$_url}invoices/add/recurring/" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Add Recurring Invoice</a>
        </div>
    </div>
    <div class="ibox-content">

        <table class="table table-bordered table-hover sys_table">
            <thead>
            <tr>
                <th>#</th>
                <th>Account</th>
                <th>Amount</th>
                <th>Invoice Date</th>
                <th>Due Date</th>
                <th>Next Invoice</th>
                <th>Status</th>
                <th class="text-right">Manage</th>
            </tr>
            </thead>
            <tbody>

            {foreach $d as $ds}
                <tr>
                    <td><a href="{$_url}invoices/view/{$ds['id']}">{$ds['id']}</a></td>
                    <td><a href="{$_url}contacts/view/{$ds['userid']}">{$ds['account']}</a> </td>
                    <td>{$ds['total']}</td>
                    <td>{date( $_c['df'], strtotime($ds['date']))}</td>
                    <td>{date( $_c['df'], strtotime($ds['duedate']))}</td>
                    <td>{date( $_c['df'], strtotime($ds['nd']))}</td>
                    <td> {if $ds['status'] eq 'Unpaid'}
                            <span class="label label-danger">Unpaid</span>
                        {elseif $ds['status'] eq 'Paid'}
                            <span class="label label-success">Paid</span>
                        {elseif $ds['status'] eq 'Cancelled'}
                            <span class="label label-default">Cancelled</span>
                        {else}
                            <span class="label label-info">{$ds['status']}</span>
                        {/if}</td>
                    <td class="text-right">
                        <a href="{$_url}invoices/view/{$ds['id']}" class="btn btn-primary btn-xs"><i class="fa fa-check"></i> View</a>
                        <a href="{$_url}invoices/edit/{$ds['id']}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                        <a href="#" class="btn btn-warning btn-xs cstop" id="sid{$ds['id']}"><i class="fa fa-stop"></i> Stop Recurring</a>
                        <a href="#" class="btn btn-danger btn-xs cdelete" id="iid{$ds['id']}"><i class="fa fa-trash"></i> Delete</a>
                    </td>
                </tr>
            {/foreach}

            </tbody>
        </table>

    </div>
</div>
{include file="sections/footer.tpl"}