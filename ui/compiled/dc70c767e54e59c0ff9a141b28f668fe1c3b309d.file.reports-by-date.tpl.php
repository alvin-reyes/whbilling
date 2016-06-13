<?php /* Smarty version Smarty-3.1.13, created on 2015-04-08 00:48:07
         compiled from "ui/theme/softhash/reports-by-date.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1393614175524b3073473f5-23799303%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dc70c767e54e59c0ff9a141b28f668fe1c3b309d' => 
    array (
      0 => 'ui/theme/softhash/reports-by-date.tpl',
      1 => 1428452900,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1393614175524b3073473f5-23799303',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cr' => 0,
    'dr' => 0,
    'mdate' => 0,
    'd' => 0,
    'ds' => 0,
    '_c' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5524b3073f5cf3_88403631',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5524b3073f5cf3_88403631')) {function content_5524b3073f5cf3_88403631($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="row">
    <div id="dpx"></div>
    <div class="col-lg-12" id="result">

        <div class="panel-body" style="background: #ffffff; margin-top: 10px;">
            <h4>Total Income: <?php echo $_smarty_tpl->tpl_vars['cr']->value;?>
</h4>
            <h4>Total Expense: <?php echo $_smarty_tpl->tpl_vars['dr']->value;?>
</h4>

            <hr>
            <h4>All Transactions at Date - <?php echo $_smarty_tpl->tpl_vars['mdate']->value;?>
</h4>
            <hr>
            <table class="table table-striped table-bordered">

                <th>Account</th>
                <th>Type</th>
                <th>Category</th>
                <th class="text-right">Amount</th>
                <th>Payer</th>
                <th>Payee</th>
                <th>Method</th>
                <th>Ref</th>
                <th>Description</th>
                <th class="text-right">Dr.</th>
                <th class="text-right">Cr.</th>
                <th class="text-right">Balance</th>

                <?php  $_smarty_tpl->tpl_vars['ds'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ds']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['d']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ds']->key => $_smarty_tpl->tpl_vars['ds']->value){
$_smarty_tpl->tpl_vars['ds']->_loop = true;
?>
                    <tr>

                        <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['account'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['type'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['category'];?>
</td>
                        <td class="text-right"><?php echo number_format($_smarty_tpl->tpl_vars['ds']->value['amount'],2,$_smarty_tpl->tpl_vars['_c']->value['dec_point'],$_smarty_tpl->tpl_vars['_c']->value['thousands_sep']);?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['payer'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['payee'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['method'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['ref'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['description'];?>
</td>
                        <td class="text-right"><?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 <?php echo number_format($_smarty_tpl->tpl_vars['ds']->value['dr'],2,$_smarty_tpl->tpl_vars['_c']->value['dec_point'],$_smarty_tpl->tpl_vars['_c']->value['thousands_sep']);?>
</td>
                        <td class="text-right"><?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 <?php echo number_format($_smarty_tpl->tpl_vars['ds']->value['cr'],2,$_smarty_tpl->tpl_vars['_c']->value['dec_point'],$_smarty_tpl->tpl_vars['_c']->value['thousands_sep']);?>
</td>
                        <td class="text-right"><span <?php if ($_smarty_tpl->tpl_vars['ds']->value['bal']<0){?>class="text-red"<?php }?>><?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 <?php echo number_format($_smarty_tpl->tpl_vars['ds']->value['bal'],2,$_smarty_tpl->tpl_vars['_c']->value['dec_point'],$_smarty_tpl->tpl_vars['_c']->value['thousands_sep']);?>
</span></td>

                    </tr>
                <?php } ?>



            </table>
        </div>

    </div>




    <!-- Widget-2 end-->
</div>
 <!-- Row end-->


<!-- Row end-->


<!-- Row end-->

<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>