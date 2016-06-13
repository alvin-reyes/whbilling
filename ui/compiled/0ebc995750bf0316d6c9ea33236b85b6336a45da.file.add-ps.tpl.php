<?php /* Smarty version Smarty-3.1.13, created on 2015-04-07 21:30:14
         compiled from "ui/theme/softhash/add-ps.tpl" */ ?>
<?php /*%%SmartyHeaderCode:990804111552484a63f0e99-92027706%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0ebc995750bf0316d6c9ea33236b85b6336a45da' => 
    array (
      0 => 'ui/theme/softhash/add-ps.tpl',
      1 => 1428452871,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '990804111552484a63f0e99-92027706',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'type' => 0,
    '_url' => 0,
    'nxt' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_552484a643bae7_37510471',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_552484a643bae7_37510471')) {function content_552484a643bae7_37510471($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">

        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Add <?php echo $_smarty_tpl->tpl_vars['type']->value;?>
</h5>
                    <div class="ibox-tools">
                       <?php if ($_smarty_tpl->tpl_vars['type']->value=='Product'){?>
                           <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
ps/p-list" class="btn btn-primary btn-xs">List Products</a>
                       <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['type']->value=='Service'){?>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
ps/s-list" class="btn btn-primary btn-xs">List Services</a>
                        <?php }?>


                    </div>
                </div>
                <div class="ibox-content">
                    <div class="alert alert-danger" id="emsg">
                        <span id="emsgbody"></span>
                    </div>

                    <form class="form-horizontal" id="rform">

                        <div class="form-group"><label class="col-lg-2 control-label" for="name"><?php echo $_smarty_tpl->tpl_vars['type']->value;?>
 Name</label>

                            <div class="col-lg-10"><input type="text" id="name" name="name" class="form-control" autocomplete="off">

                            </div>
                        </div>

                        <div class="form-group"><label class="col-lg-2 control-label" for="sales_price">Sales Price</label>

                            <div class="col-lg-10"><input type="text" id="sales_price" name="sales_price" class="form-control" autocomplete="off">

                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label" for="item_number">Item Number</label>

                            <div class="col-lg-10"><input type="text" id="item_number" value="<?php echo $_smarty_tpl->tpl_vars['nxt']->value;?>
" name="item_number" class="form-control" autocomplete="off">

                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label" for="description">Description</label>

                            <div class="col-lg-10"><textarea id="description" class="form-control" rows="3"></textarea>

                            </div>
                        </div>


<input type="hidden" id="type" name="type" value="<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
">



                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">

                                <button class="btn btn-sm btn-primary" type="submit" id="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>