<?php /* Smarty version Smarty-3.1.13, created on 2015-04-07 20:50:16
         compiled from "ui/theme/softhash/users-edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:146929439955247b48dc8b81-58111639%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '14213f8cffacd9a893001cadb320786785a19c3d' => 
    array (
      0 => 'ui/theme/softhash/users-edit.tpl',
      1 => 1428452904,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '146929439955247b48dc8b81-58111639',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_url' => 0,
    'd' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55247b48e1e115_93765694',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55247b48e1e115_93765694')) {function content_55247b48e1e115_93765694($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="row">
    <div class="col-md-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Edit User</h5>

            </div>
            <div class="ibox-content">

                <form role="form" name="accadd" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/users-edit-post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['username'];?>
">
                    </div>
                    <div class="form-group">
                        <label for="fullname">Full Name</label>
                        <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['fullname'];?>
">
                    </div>
                    <?php if (($_smarty_tpl->tpl_vars['user']->value['id'])!=($_smarty_tpl->tpl_vars['d']->value['id'])){?>
                        <div class="form-group">
                            <label for="user_type">User Type</label>
                            <select name="user_type" id="user_type" class="form-control">
                                <option value="Admin" <?php if ($_smarty_tpl->tpl_vars['d']->value['user_type']=='Admin'){?>selected="selected" <?php }?>>Full Administrator</option>
                                <option value="Employee" <?php if ($_smarty_tpl->tpl_vars['d']->value['user_type']=='Employee'){?>selected="selected" <?php }?>>Employee</option>

                            </select>
                            <span class="help-block">Choose User Type Employee to disable Settings access</span>
                        </div>
                    <?php }?>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                        <span class="help-block">Keep Blank to do not change Password</span>
                    </div>

                    <div class="form-group">
                        <label for="cpassword">Confirm Password</label>
                        <input type="password" class="form-control" id="cpassword" name="cpassword">
                    </div>

                    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
                    Or <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/users">Cancel</a>
                </form>

            </div>
        </div>



    </div>



</div>




<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>