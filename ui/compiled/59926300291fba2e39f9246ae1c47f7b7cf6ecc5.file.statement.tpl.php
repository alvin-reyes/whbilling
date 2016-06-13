<?php /* Smarty version Smarty-3.1.13, created on 2015-04-08 00:48:03
         compiled from "ui/theme/softhash/statement.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4089136385524b30392fa66-93806530%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '59926300291fba2e39f9246ae1c47f7b7cf6ecc5' => 
    array (
      0 => 'ui/theme/softhash/statement.tpl',
      1 => 1428452902,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4089136385524b30392fa66-93806530',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_url' => 0,
    'd' => 0,
    'ds' => 0,
    'tdate' => 0,
    'mdate' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5524b3039a16d4_02280567',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5524b3039a16d4_02280567')) {function content_5524b3039a16d4_02280567($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="row">
    <div class="col-md-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>View Statement</h5>

            </div>
            <div class="ibox-content">

                <form class="form-horizontal" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
reports/statement-view" id="tform" role="form">
                    <div class="form-group">
                        <label for="description" class="col-sm-3 control-label">Account</label>
                        <div class="col-sm-9">
                            <select id="account" name="account">
                                <option value="">Choose an Account</option>
                                <?php  $_smarty_tpl->tpl_vars['ds'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ds']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['d']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ds']->key => $_smarty_tpl->tpl_vars['ds']->value){
$_smarty_tpl->tpl_vars['ds']->_loop = true;
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['account'];?>
"><?php echo $_smarty_tpl->tpl_vars['ds']->value['account'];?>
</option>
                                <?php } ?>


                            </select>
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="fdate" class="col-sm-3 control-label">From Date</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control"  value="<?php echo $_smarty_tpl->tpl_vars['tdate']->value;?>
" name="fdate" id="fdate" datepicker data-date-format="yyyy-mm-dd" data-auto-close="true">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tdate" class="col-sm-3 control-label">To Date</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control"  value="<?php echo $_smarty_tpl->tpl_vars['mdate']->value;?>
" name="tdate" id="tdate" datepicker data-date-format="yyyy-mm-dd" data-auto-close="true">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="stype" class="col-sm-3 control-label">Type</label>
                        <div class="col-sm-9">
                            <select id="stype" name="stype" class="form-control">
                                <option value="all" selected="selected">All Transactions</option>
                                <option value="credit">Credit</option>
                                <option value="debit">Debit</option>

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" id="submit" class="btn btn-primary">View Statement</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>



    </div>



</div>




<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>