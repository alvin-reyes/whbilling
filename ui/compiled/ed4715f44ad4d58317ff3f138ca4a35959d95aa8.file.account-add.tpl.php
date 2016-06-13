<?php /* Smarty version Smarty-3.1.13, created on 2015-04-07 21:35:23
         compiled from "ui/theme/softhash/account-add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:616307848552485db53faa7-57447428%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ed4715f44ad4d58317ff3f138ca4a35959d95aa8' => 
    array (
      0 => 'ui/theme/softhash/account-add.tpl',
      1 => 1428452868,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '616307848552485db53faa7-57447428',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_L' => 0,
    '_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_552485db57fc03_32758955',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_552485db57fc03_32758955')) {function content_552485db57fc03_32758955($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="row">
    <div class="col-md-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Add_New_Account'];?>
</h5>

            </div>
            <div class="ibox-content">

                <form role="form" name="accadd" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
accounts/add-post">
                    <div class="form-group">
                        <label for="account">Account Title</label>
                        <input type="text" class="form-control" id="account" name="account">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" id="description" name="description">
                    </div>
                    <div class="form-group">
                        <label for="balance">Initial Balance</label>
                        <input type="text" class="form-control" id="balance" name="balance">
                    </div>


                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
                </form>

            </div>
        </div>



    </div>



</div>




<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>