<?php /* Smarty version Smarty-3.1.13, created on 2015-04-07 20:59:56
         compiled from "ui/theme/softhash/pg.tpl" */ ?>
<?php /*%%SmartyHeaderCode:104050353455247d8cab38a9-98139991%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5bd6b8389e9fca7d5abf4fd17748d67facab10b8' => 
    array (
      0 => 'ui/theme/softhash/pg.tpl',
      1 => 1428452892,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '104050353455247d8cab38a9-98139991',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_url' => 0,
    'd' => 0,
    'ds' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55247d8cb0c658_39835025',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55247d8cb0c658_39835025')) {function content_55247d8cb0c658_39835025($_smarty_tpl) {?><?php if (!is_callable('smarty_function_counter')) include '/home/alvinjayreyes/public_html/demo/whbilling/sysfrm/vendors/smarty/libs/plugins/function.counter.php';
?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="row">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Payment Gateways</h5>

            </div>
            <div class="ibox-content">
                <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
reorder/pg/" class="btn btn-primary"><i class="fa fa-arrows"></i> Reorder Payment Gateways Position</a>
                <br>
                <table class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Gateway Name</th>
                        <th>Setting Name</th>
                        <th>Value</th>
                        <th>Status</th>
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
                            <td><?php echo smarty_function_counter(array(),$_smarty_tpl);?>
 </td>
                            <td><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/pg-conf/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['ds']->value['name'];?>
</a> </td>
                            <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['settings'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['value'];?>
</td>

                            <td>
                                <?php if ($_smarty_tpl->tpl_vars['ds']->value['status']=='Inactive'){?>
                                    <span class="label label-danger">Inactive</span>
                                <?php }else{ ?>
                                    <span class="label label-success">Active</span>
                                <?php }?>

                            </td>

                            <td class="text-right">

                                <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/pg-conf/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/" class="btn btn-info btn-sm"><i class="fa fa-pencil-square-o"></i> Edit</a>

                            </td>
                        </tr>
                    <?php } ?>

                    </tbody>
                </table>

            </div>
        </div>



    </div>



</div>




<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>