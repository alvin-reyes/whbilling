{include file="sections/header.tpl"}
<div class="row">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Payment Gateways</h5>

            </div>
            <div class="ibox-content">
                <a href="{$_url}reorder/pg/" class="btn btn-primary"><i class="fa fa-arrows"></i> Reorder Payment Gateways Position</a>
                <br>
                <table class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Gateway Name</th>
                        <th>Setting Name</th>
                        <th>Value</th>
                        <th>Status</th>
                        <th class="text-right">Manage</th>
                    </tr>
                    </thead>
                    <tbody>

                    {foreach $d as $ds}
                        <tr>
                            <td>{counter} </td>
                            <td><a href="{$_url}settings/pg-conf/{$ds['id']}/">{$ds['name']}</a> </td>
                            <td>{$ds['settings']}</td>
                            <td>{$ds['value']}</td>

                            <td>
                                {if $ds['status'] eq 'Inactive'}
                                    <span class="label label-danger">Inactive</span>
                                {else}
                                    <span class="label label-success">Active</span>
                                {/if}

                            </td>

                            <td class="text-right">

                                <a href="{$_url}settings/pg-conf/{$ds['id']}/" class="btn btn-info btn-sm"><i class="fa fa-pencil-square-o"></i> Edit</a>

                            </td>
                        </tr>
                    {/foreach}

                    </tbody>
                </table>

            </div>
        </div>



    </div>



</div>




{include file="sections/footer.tpl"}
