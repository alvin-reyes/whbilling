<?php /* Smarty version Smarty-3.1.13, created on 2015-04-07 21:00:46
         compiled from "ui/theme/softhash/ps-list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:76469498455247dbe155db0-97382708%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1ae64afe394bf5aa975fb5f89418b1dc7c72ad39' => 
    array (
      0 => 'ui/theme/softhash/ps-list.tpl',
      1 => 1428452896,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '76469498455247dbe155db0-97382708',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'type' => 0,
    '_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55247dbe18b695_34405957',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55247dbe18b695_34405957')) {function content_55247dbe18b695_34405957($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="wrapper wrapper-content animated fadeInUp">

<div class="ibox">
<div class="ibox-title">
    <h5>List <?php echo $_smarty_tpl->tpl_vars['type']->value;?>
s</h5>
    <div class="ibox-tools">
        <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
ps/p-new" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Add Product</a>
        <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
ps/s-new" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Add Service</a>
    </div>
</div>
<div class="ibox-content">
<div class="input-group"><input type="text" placeholder="Search" id="txtsearch" class="input-sm form-control"> <span class="input-group-btn">
                                        <button type="button" id="search" class="btn btn-sm btn-primary"> Search</button> </span></div>
    <input type="hidden" id="stype" value="<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
">

<div class="project-list mt-md">
    <div id="progressbar">
    </div>

<div id="sysfrm_ajaxrender">


</div>


</div>
</div>
</div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>