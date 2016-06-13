{include file="sections/header.tpl"}
<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>Sales Taxes </h5>
    </div>
    <div class="ibox-content">
<a href="{$_url}settings/add-tax/" id="item_add" class="btn btn-primary"><i class="fa fa-plus"></i> Add Tax </a>
        <table class="table table-bordered table-hover sys_table">
            <thead>
            <tr>
                <th width="70%">Name</th>
                <th>Tax Rate</th>

                <th>Manage</th>
            </tr>
            </thead>
            <tbody>
            {foreach $d as $ds}
                <tr id="{$ds['id']}">
                    <td>{$ds['name']}</td>
                    <td>{$ds['rate']}</td>
                    <td>
                        <a href="{$_url}settings/edit-tax/{$ds['id']}/" class="btn btn-info btn-xs edit"><i class="fa fa-pencil"></i> Edit </a>
                        <button type="button" id="t{$ds['id']}" class="btn btn-danger btn-xs cdelete"><i class="fa fa-trash"></i> Delete </button>
                    </td>

                </tr>
            {/foreach}

            </tbody>
        </table>
{$paginator['contents']}
    </div>
</div>
{include file="sections/footer.tpl"}