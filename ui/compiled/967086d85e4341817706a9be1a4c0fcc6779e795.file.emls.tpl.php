<?php /* Smarty version Smarty-3.1.13, created on 2015-04-09 19:24:22
         compiled from "ui/theme/softhash/emls.tpl" */ ?>
<?php /*%%SmartyHeaderCode:112801590455270a269497c8-54450961%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '967086d85e4341817706a9be1a4c0fcc6779e795' => 
    array (
      0 => 'ui/theme/softhash/emls.tpl',
      1 => 1428452883,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '112801590455270a269497c8-54450961',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_url' => 0,
    'e' => 0,
    '_c' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55270a26d77ca6_66773048',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55270a26d77ca6_66773048')) {function content_55270a26d77ca6_66773048($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>




<div class="row">
    <div class="col-md-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Email Settings</h5>

            </div>
            <div class="ibox-content">

                <form role="form" name="eml" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/eml-post">


                    <div class="form-group">
                        <label for="theme">Send Email Using</label>
                        <select name="email_method" id="email_method" class="form-control">
                            <option value="phpmail" <?php if ($_smarty_tpl->tpl_vars['e']->value['method']=='phpmail'){?>selected="selected" <?php }?>>PHP mail() Function</option>
                            <option value="smtp" <?php if ($_smarty_tpl->tpl_vars['e']->value['method']=='smtp'){?>selected="selected" <?php }?>>SMTP</option>

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="sysemail">System Email</label>
                        <input type="text" class="form-control" id="sysemail" name="sysemail" value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['sysEmail'];?>
">
<span class="help-block">All Outgoing Email Will be sent from This Email Address.</span>
                    </div>

                    <div id="a_hide">
                        <div class="form-group">
                            <label for="smtp_host">SMTP Host</label>
                            <input type="text" class="form-control" id="smtp_host" name="smtp_host" value="<?php echo $_smarty_tpl->tpl_vars['e']->value['host'];?>
">

                        </div>

                        <div class="form-group">
                            <label for="smtp_user">SMTP Username</label>
                            <input type="text" class="form-control" id="smtp_user" name="smtp_user" value="<?php echo $_smarty_tpl->tpl_vars['e']->value['username'];?>
">

                        </div>

                        <div class="form-group">
                            <label for="smtp_password">SMTP Password</label>
                            <input type="password" class="form-control" id="smtp_password" name="smtp_password" value="<?php echo $_smarty_tpl->tpl_vars['e']->value['password'];?>
">

                        </div>

                        <div class="form-group">
                            <label for="smtp_port">SMTP Port</label>
                            <input type="text" class="form-control" id="smtp_port" name="smtp_port" value="<?php echo $_smarty_tpl->tpl_vars['e']->value['port'];?>
">

                        </div>

                        <div class="form-group">
                            <label for="smtp_secure">SMTP Secure</label>
                            <select name="smtp_secure" id="smtp_secure" class="form-control">
                                <option value="tls" <?php if ($_smarty_tpl->tpl_vars['e']->value['secure']=='tls'){?>selected="selected" <?php }?>>TLS</option>
                                <option value="ssl" <?php if ($_smarty_tpl->tpl_vars['e']->value['secure']=='ssl'){?>selected="selected" <?php }?>>SSL</option>

                            </select>

                        </div>

                    </div>


                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
                </form>

            </div>
        </div>
    </div>



</div>

<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>