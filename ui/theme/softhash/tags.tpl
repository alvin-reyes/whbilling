{include file="sections/header.tpl"}
<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>Manage Tags </h5>
    </div>
    <div class="ibox-content">

        <table class="table table-bordered table-hover sys_table">
            <thead>
            <tr>

                <th>Tag</th>
                <th>Type</th>
                <th>Delete</th>

            </tr>
            </thead>
            <tbody>

            {foreach $d as $ds}
                <tr>

                    <td>{$ds['text']}</td>
                    <td>{$ds['type']}</td>
                    <td>
                        <a href="#" class="btn btn-danger btn-xs cdelete" id="iid{$ds['id']}"><i class="fa fa-trash"></i> Delete</a>
                    </td>
                </tr>
            {/foreach}

            </tbody>
        </table>

    </div>
</div>
{include file="sections/footer.tpl"}