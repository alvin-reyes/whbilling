<?php /* Smarty version Smarty-3.1.13, created on 2015-04-08 01:11:44
         compiled from "ui/theme/softhash/list-invoices.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14104050855524b8909607f9-58808549%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '50fdba91a2eea38e523fe39a4194765d8c3fd147' => 
    array (
      0 => 'ui/theme/softhash/list-invoices.tpl',
      1 => 1428452887,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14104050855524b8909607f9-58808549',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'paginator' => 0,
    '_url' => 0,
    'd' => 0,
    'ds' => 0,
    '_c' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5524b890a1e674_21786239',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5524b890a1e674_21786239')) {function content_5524b890a1e674_21786239($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>Total Invoices <?php echo $_smarty_tpl->tpl_vars['paginator']->value['found'];?>
. Page <?php echo $_smarty_tpl->tpl_vars['paginator']->value['page'];?>
 of <?php echo $_smarty_tpl->tpl_vars['paginator']->value['lastpage'];?>
.</h5>
        <div class="ibox-tools">
            <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
invoices/list-recurring/" class="btn btn-info btn-xs"><i class="fa fa-repeat"></i> Manage Recurring Invoices</a>
            <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
invoices/add/" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Add Invoice</a>

        </div>
    </div>
    <div class="ibox-content">

        <table class="table table-bordered table-hover sys_table">
            <thead>
            <tr>
                <th>#</th>
                <th>Account</th>
                <th>Amount</th>
                <th>Invoice Date</th>
                <th>Due Date</th>
                <th>Status</th>
                <th>Type</th>
                <th class="text-right">Manage</th>
            </tr>
            </thead>
            <tbody>

            <?php  $_smarty_tpl->tpl_vars['ds'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ds']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['d']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ds']->key => $_smarty_tpl->tpl_vars['ds']->value){
$_smarty_tpl->tpl_vars['ds']->_loop = true;
?>
                <tr>
                    <td><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
invoices/view/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
</a> </td>
                    <td><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
contacts/view/<?php echo $_smarty_tpl->tpl_vars['ds']->value['userid'];?>
/"><?php echo $_smarty_tpl->tpl_vars['ds']->value['account'];?>
</a> </td>
                    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['total'];?>
</td>
                    <td><?php echo date($_smarty_tpl->tpl_vars['_c']->value['df'],strtotime($_smarty_tpl->tpl_vars['ds']->value['date']));?>
</td>
                    <td><?php echo date($_smarty_tpl->tpl_vars['_c']->value['df'],strtotime($_smarty_tpl->tpl_vars['ds']->value['duedate']));?>
</td>
                    <td>
                        <?php if ($_smarty_tpl->tpl_vars['ds']->value['status']=='Unpaid'){?>
                            <span class="label label-danger">Unpaid</span>
                            <?php }elseif($_smarty_tpl->tpl_vars['ds']->value['status']=='Paid'){?>
                            <span class="label label-success">Paid</span>
                            <?php }elseif($_smarty_tpl->tpl_vars['ds']->value['status']=='Cancelled'){?>
                            <span class="label label-default">Cancelled</span>
                            <?php }else{ ?>
                            <span class="label label-info"><?php echo $_smarty_tpl->tpl_vars['ds']->value['status'];?>
</span>
                        <?php }?>

                    </td>
                    <td>
                        <?php if ($_smarty_tpl->tpl_vars['ds']->value['r']=='0'){?>
                            <span class="label label-success"><i class="fa fa-dot-circle-o"></i> Onetime</span>
                          <?php }else{ ?>
                            <span class="label label-success"><i class="fa fa-repeat"></i> Recurring</span>
                    <?php }?>
                    </td>
                    <td class="text-right">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
invoices/view/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/" class="btn btn-primary btn-xs"><i class="fa fa-check"></i> View</a>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
invoices/edit/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                        <a href="#" class="btn btn-danger btn-xs cdelete" id="iid<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
"><i class="fa fa-trash"></i> Delete</a>
                    </td>
                </tr>
            <?php } ?>

            </tbody>
        </table>
<?php echo $_smarty_tpl->tpl_vars['paginator']->value['contents'];?>

    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>