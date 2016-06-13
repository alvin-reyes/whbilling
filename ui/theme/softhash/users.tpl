{include file="sections/header.tpl"}
<div class="row">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>{$_L['Manage_Users']}</h5>

            </div>
            <div class="ibox-content">
                <a href="{$_url}settings/users-add" class="btn btn-primary"><i class="fa fa-plus"></i> {$_L['Add_New_User']}</a>
                <br>
                <br>
                <table class="table table-striped table-bordered">
                    <th>{$_L['Username']}</th>
                    <th>{$_L['Full_Name']}</th>
                    <th>{$_L['Type']}</th>
                    <th>{$_L['Manage']}</th>
                    {foreach $d as $ds}
                        <tr>
                            <td>{$ds['username']}</td>
                            <td>{$ds['fullname']}</td>
                            <td>{$ds['user_type']}</td>
                            <td>
                                <a href="{$_url}settings/users-edit/{$ds['id']}" class="btn btn-warning"><i class="fa fa-pencil"></i> {$_L['Edit']}</a>
                                {if ($_user['username']) neq ($ds['username'])}
                                    <a href="{$_url}settings/users-delete/{$ds['id']}" id="{$ds['id']}" class="btn btn-danger cdelete"><i class="fa fa-trash"></i> {$_L['Delete']}</a>
                                {/if}
                            </td>
                        </tr>
                    {/foreach}


                </table>

            </div>
        </div>



    </div>



</div>




{include file="sections/footer.tpl"}
