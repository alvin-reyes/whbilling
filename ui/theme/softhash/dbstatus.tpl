{include file="sections/header.tpl"}
<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>Total Database Size: {$dbsize}  MB </h5>
        <div class="ibox-tools">
            <a href="{$_url}util/dbbackup/" class="btn btn-primary btn-xs"><i class="fa fa-download"></i> Download Database Backup</a>
        </div>
    </div>
    <div class="ibox-content">

        <table class="table table-bordered table-hover sys_table">
            <thead>
            <tr>
                <th width="50%">Table Name</th>
                <th>Rows</th>
                <th>Size</th>

            </tr>
            </thead>
            <tbody>

            {foreach $tables as $tbl}
                <tr>
                    <td>{$tbl['name']}</td>
                    <td>{$tbl['rows']}</td>
                    <td>{$tbl['size']} Kb</td>

                </tr>
            {/foreach}

            </tbody>
        </table>

    </div>
</div>
{include file="sections/footer.tpl"}