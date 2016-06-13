<?php /* Smarty version Smarty-3.1.13, created on 2015-04-07 21:40:39
         compiled from "ui/theme/softhash/transactions.tpl" */ ?>
<?php /*%%SmartyHeaderCode:178386271955248717213f44-41978452%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9c35c94e3f8fdcafcc3aa2d883d13f2cb06fefcd' => 
    array (
      0 => 'ui/theme/softhash/transactions.tpl',
      1 => 1428452903,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '178386271955248717213f44-41978452',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'paginator' => 0,
    'd' => 0,
    'ds' => 0,
    '_c' => 0,
    '_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_552487172b9f99_12767137',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_552487172b9f99_12767137')) {function content_552487172b9f99_12767137($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="row">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Total Found <?php echo $_smarty_tpl->tpl_vars['paginator']->value['found'];?>
. Page <?php echo $_smarty_tpl->tpl_vars['paginator']->value['page'];?>
 of <?php echo $_smarty_tpl->tpl_vars['paginator']->value['lastpage'];?>
. </h5>

        </div>
        <div class="ibox-content">

            <table class="table table-bordered sys_table">
                <th>Date</th>
                <th>Account</th>
                <th>Type</th>

                <th class="text-right">Amount</th>

                <th>Description</th>
                <th class="text-right">Dr.</th>
                <th class="text-right">Cr.</th>
                <th class="text-right">Balance</th>
                <th>Manage</th>
                <?php  $_smarty_tpl->tpl_vars['ds'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ds']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['d']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ds']->key => $_smarty_tpl->tpl_vars['ds']->value){
$_smarty_tpl->tpl_vars['ds']->_loop = true;
?>
                    <tr class="<?php if ($_smarty_tpl->tpl_vars['ds']->value['cr']=='0.00'){?>warning <?php }else{ ?>info<?php }?>">
                        <td><?php echo date($_smarty_tpl->tpl_vars['_c']->value['df'],strtotime($_smarty_tpl->tpl_vars['ds']->value['date']));?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['account'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['type'];?>
</td>

                        <td class="text-right"><?php echo number_format($_smarty_tpl->tpl_vars['ds']->value['amount'],2,$_smarty_tpl->tpl_vars['_c']->value['dec_point'],$_smarty_tpl->tpl_vars['_c']->value['thousands_sep']);?>
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
                        <td><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
transactions/manage/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
">Manage</a></td>
                    </tr>
                <?php } ?>



            </table>

        </div>
    </div>

    <?php echo $_smarty_tpl->tpl_vars['paginator']->value['contents'];?>
 <!-- Widget-1 end-->

    <!-- Widget-2 end-->
</div> <!-- Row end-->


<!-- Row end-->


<!-- Row end-->

<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>