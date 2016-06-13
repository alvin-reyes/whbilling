<?php /* Smarty version Smarty-3.1.13, created on 2015-04-07 21:00:56
         compiled from "ui/theme/softhash/automation.tpl" */ ?>
<?php /*%%SmartyHeaderCode:24445664855247dc8669a58-11204300%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '41c23d660bf720ffd2cadba1892b8af4a7d3d18f' => 
    array (
      0 => 'ui/theme/softhash/automation.tpl',
      1 => 1428452875,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24445664855247dc8669a58-11204300',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_url' => 0,
    '_c' => 0,
    'arcs' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55247dc86c3940_88778458',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55247dc86c3940_88778458')) {function content_55247dc86c3940_88778458($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="row">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Automation</h5>

            </div>
            <div class="ibox-content">

                <form class="form-horizontal" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/consolekey_regen/">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Security Token</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="ckey" value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['ckey'];?>
" disabled>
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
                <input type="text" class="form-control" value="GET <?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
console/<?php echo $_smarty_tpl->tpl_vars['_c']->value['ckey'];?>
/">
                <h3 class="text-primary text-center">Or</h3>
                <p class="text-primary text-center">Create the following Cron Job using PHP:</p>
                <input type="text" class="form-control" value="php-cgi -f <?php echo getcwd();?>
/index.php a=CLI _route=console/<?php echo $_smarty_tpl->tpl_vars['_c']->value['ckey'];?>
/">
                <h3 class="text-primary text-center">Or</h3>
                <p class="text-primary text-center">Create the following Cron Job using WGET:</p>
                <input type="text" class="form-control" value="WGET '<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
console/<?php echo $_smarty_tpl->tpl_vars['_c']->value['ckey'];?>
/'">
                <hr>
<h3>Settings</h3>
                <hr>
                <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/automation-post/">

                    <div class="checkbox">
                        <label>
                            <input type="checkbox" class="sys_csw" name="accounting_snapshot" value="on" <?php if (($_smarty_tpl->tpl_vars['arcs']->value['accounting_snapshot'])=='Active'){?>checked<?php }?>> Generate Daily Accounting Snapshot
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" class="sys_csw" name="recurring_invoice" value="on" <?php if (($_smarty_tpl->tpl_vars['arcs']->value['recurring_invoice'])=='Active'){?>checked<?php }?>> Generate Recurring Invoices
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" class="sys_csw" name="notify" value="on" <?php if (($_smarty_tpl->tpl_vars['arcs']->value['notify'])=='Active'){?>checked<?php }?>> Enable Email Notifications
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Send Notifications To: </label>
                        <input type="email" class="form-control" id="notifyemail" name="notifyemail" value="<?php echo $_smarty_tpl->tpl_vars['arcs']->value['notifyemail'];?>
">
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Save Changes</button>
                </form>
            </div>
        </div>



    </div>



</div>




<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>