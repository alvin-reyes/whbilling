
{include file="sections/header.tpl"}
<div class="row">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>{$_L['Manage_Accounts']}</h5>

            </div>
            <div class="ibox-content">

                <table class="table table-striped table-bordered">
                    <th>Account</th>
                    <th>Description</th>
                    <th>Manage</th>
                    {foreach $d as $ds}
                        <tr>
                            <td>{$ds['account']}</td>
                            <td>{$ds['description']}</td>
                            <td>
                                <a href="{$_url}accounts/edit/{$ds['id']}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> {$_L['Edit']}</a>
                                <a href="{$_url}accounts/delete/{$ds['id']}" id="did{$ds['id']}" class="cdelete btn btn-danger btn-sm"><i class="fa fa-trash"></i> {$_L['Delete']}</a>
                            </td>
                        </tr>
                    {/foreach}


                </table>

            </div>
        </div>



    </div>



</div>




{include file="sections/footer.tpl"}
