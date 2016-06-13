<?php /* Smarty version Smarty-3.1.13, created on 2015-04-08 00:47:43
         compiled from "ui/theme/softhash/balance-sheet.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17314711865524b2ef7c9269-78008880%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '39c8b68c59f4519cef6f3410abb952b7f047effe' => 
    array (
      0 => 'ui/theme/softhash/balance-sheet.tpl',
      1 => 1428452876,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17314711865524b2ef7c9269-78008880',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'd' => 0,
    'ds' => 0,
    '_c' => 0,
    'tbal' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5524b2ef871967_12324535',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5524b2ef871967_12324535')) {function content_5524b2ef871967_12324535($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="row">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Balance Sheet </h5>

        </div>
        <div class="ibox-content">

            <table class="table table-bordered sys_table">

                <th width="80%">Account</th>

                <th class="text-right">Balance</th>

                <?php  $_smarty_tpl->tpl_vars['ds'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ds']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['d']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ds']->key => $_smarty_tpl->tpl_vars['ds']->value){
$_smarty_tpl->tpl_vars['ds']->_loop = true;
?>
                    <tr>

                        <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['account'];?>
</td>

                        <td class="text-right"><span <?php if ($_smarty_tpl->tpl_vars['ds']->value['balance']<0){?>class="text-red"<?php }?>><?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 <?php echo number_format($_smarty_tpl->tpl_vars['ds']->value['balance'],2,$_smarty_tpl->tpl_vars['_c']->value['dec_point'],$_smarty_tpl->tpl_vars['_c']->value['thousands_sep']);?>
</span></td>

                    </tr>
                <?php } ?>



            </table>
            <table class="table invoice-total">
                <tbody>

                <tr>
                    <td><strong>TOTAL :</strong></td>
                    <td><strong><?php if ($_smarty_tpl->tpl_vars['tbal']->value<0){?>class="text-red"<?php }?><?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 <?php echo number_format($_smarty_tpl->tpl_vars['tbal']->value,2,$_smarty_tpl->tpl_vars['_c']->value['dec_point'],$_smarty_tpl->tpl_vars['_c']->value['thousands_sep']);?>
</strong></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>



    <!-- Widget-2 end-->
</div> <!-- Row end-->


<!-- Row end-->


<!-- Row end-->

<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>