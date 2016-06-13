<?php /* Smarty version Smarty-3.1.13, created on 2015-04-07 20:51:51
         compiled from "ui/theme/softhash/list-contacts.tpl" */ ?>
<?php /*%%SmartyHeaderCode:171651591155247ba7dcf748-95787742%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3f8f1b37db18cec2bb5b1ca39c65a3f87ab771d7' => 
    array (
      0 => 'ui/theme/softhash/list-contacts.tpl',
      1 => 1428452887,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '171651591155247ba7dcf748-95787742',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_url' => 0,
    't' => 0,
    'ts' => 0,
    'd' => 0,
    'ds' => 0,
    'app_url' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55247ba7e6aae6_66184968',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55247ba7e6aae6_66184968')) {function content_55247ba7e6aae6_66184968($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-body">

                <form class="form-horizontal" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
contacts/list/">
                    <div class="form-group">
                        <div class="col-md-8">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <span class="fa fa-search"></span>
                                </div>
                                <input type="text" name="name" class="form-control" placeholder="Search by Name..."/>
                                <div class="input-group-btn">
                                    <button class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">

                            <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
contacts/add/" class="btn btn-success btn-block"><i class="fa fa-plus"></i> Add New Contact</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-body">
<h3>Filter by Tags</h3>
                <ul class="tag-list" style="padding: 0">
                 <?php  $_smarty_tpl->tpl_vars['ts'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ts']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['t']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ts']->key => $_smarty_tpl->tpl_vars['ts']->value){
$_smarty_tpl->tpl_vars['ts']->_loop = true;
?>
                     <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
contacts/list/<?php echo $_smarty_tpl->tpl_vars['ts']->value['text'];?>
/"><i class="fa fa-tag"></i> <?php echo $_smarty_tpl->tpl_vars['ts']->value['text'];?>
</a></li>
                 <?php } ?>
                </ul>
            </div>
        </div>

    </div>
</div>

<div class="row">

    <?php  $_smarty_tpl->tpl_vars['ds'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ds']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['d']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ds']->key => $_smarty_tpl->tpl_vars['ds']->value){
$_smarty_tpl->tpl_vars['ds']->_loop = true;
?>
        <div class="col-md-3 sdiv">
            <!-- CONTACT ITEM -->
            <div class="panel panel-default">
                <div class="panel-body profile">
                    <div class="profile-image">
                        <?php if ($_smarty_tpl->tpl_vars['ds']->value['img']=='gravatar'){?>
                            <img src="http://www.gravatar.com/avatar/<?php echo md5(($_smarty_tpl->tpl_vars['ds']->value['email']));?>
?s=200" class="img-thumbnail img-responsive" alt="<?php echo $_smarty_tpl->tpl_vars['ds']->value['fname'];?>
 <?php echo $_smarty_tpl->tpl_vars['ds']->value['lname'];?>
">
                        <?php }elseif($_smarty_tpl->tpl_vars['ds']->value['img']==''){?>
                            <img src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
sysfrm/uploads/system/profile-icon.png" class="img-thumbnail img-responsive" alt="<?php echo $_smarty_tpl->tpl_vars['ds']->value['fname'];?>
 <?php echo $_smarty_tpl->tpl_vars['ds']->value['lname'];?>
">
                        <?php }else{ ?>
                            <img src="<?php echo $_smarty_tpl->tpl_vars['ds']->value['img'];?>
" class="img-thumbnail img-responsive" alt="<?php echo $_smarty_tpl->tpl_vars['ds']->value['account'];?>
">
                        <?php }?>
                    </div>
                    <div class="profile-data">
                        <div class="profile-data-name"><?php echo $_smarty_tpl->tpl_vars['ds']->value['account'];?>
</div>

                    </div>

                </div>
                <div class="panel-body">
                    <div class="contact-info">

                        <p><small>Email</small><br/><?php if ($_smarty_tpl->tpl_vars['ds']->value['email']!=''){?><?php echo $_smarty_tpl->tpl_vars['ds']->value['email'];?>
 <?php }else{ ?> n/a <?php }?></p>

                        <p>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
contacts/view/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/" class="btn btn-primary btn-xs"><i class="fa fa-search"></i> View</a>

                            <a href="delete/crm-user/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/" class="btn btn-danger btn-xs cdelete" id="uid<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
"><i class="fa fa-trash"></i> Delete</a>
                        </p>
                    </div>
                </div>
            </div>
            <!-- END CONTACT ITEM -->
        </div>
    <?php } ?>


</div>
<div class="row">
    <div class="col-md-12">
       <?php echo $_smarty_tpl->tpl_vars['paginator']->value['contents'];?>

    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>