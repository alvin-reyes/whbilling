{include file="sections/header.tpl"}
<div class="row">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Automation</h5>

            </div>
            <div class="ibox-content">

                <form class="form-horizontal" method="post" action="{$_url}settings/consolekey_regen/">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Security Token</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="ckey" value="{$_c['ckey']}" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-refresh"></i> Re Generate Key</button>
                        </div>
                    </div>
                </form>

                <p>To enable the automation features to run, make sure you set up a cron job to run once per day. (e.g. 9AM).</p>
                <br>
                <p class="text-primary text-center">Create the following Cron Job using GET:</p>
                <input type="text" class="form-control" value="GET {$_url}console/{$_c['ckey']}/">
                <h3 class="text-primary text-center">Or</h3>
                <p class="text-primary text-center">Create the following Cron Job using PHP:</p>
                <input type="text" class="form-control" value="php-cgi -f {getcwd()}/index.php a=CLI _route=console/{$_c['ckey']}/">
                <h3 class="text-primary text-center">Or</h3>
                <p class="text-primary text-center">Create the following Cron Job using WGET:</p>
                <input type="text" class="form-control" value="WGET '{$_url}console/{$_c['ckey']}/'">
                <hr>
<h3>Settings</h3>
                <hr>
                <form method="post" action="{$_url}settings/automation-post/">

                    <div class="checkbox">
                        <label>
                            <input type="checkbox" class="sys_csw" name="accounting_snapshot" value="on" {if ($arcs['accounting_snapshot']) eq 'Active'}checked{/if}> Generate Daily Accounting Snapshot
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" class="sys_csw" name="recurring_invoice" value="on" {if ($arcs['recurring_invoice']) eq 'Active'}checked{/if}> Generate Recurring Invoices
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" class="sys_csw" name="notify" value="on" {if ($arcs['notify']) eq 'Active'}checked{/if}> Enable Email Notifications
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Send Notifications To: </label>
                        <input type="email" class="form-control" id="notifyemail" name="notifyemail" value="{$arcs['notifyemail']}">
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Save Changes</button>
                </form>
            </div>
        </div>



    </div>



</div>




{include file="sections/footer.tpl"}
