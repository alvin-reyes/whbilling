<?php /* Smarty version Smarty-3.1.13, created on 2015-04-07 22:06:16
         compiled from "ui/theme/softhash/email-templates.tpl" */ ?>
<?php /*%%SmartyHeaderCode:206539823755248d188a1ff2-07811254%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '427e3daa35fcf50cf082fb43e5932ac510d50422' => 
    array (
      0 => 'ui/theme/softhash/email-templates.tpl',
      1 => 1428452882,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '206539823755248d188a1ff2-07811254',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'd' => 0,
    'ds' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55248d188f1785_74256717',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55248d188f1785_74256717')) {function content_55248d188f1785_74256717($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="row">

    <div class="col-lg-12 animated fadeInRight">
        <div class="mail-box-header">


            <h2>
                Email Templates
            </h2>

        </div>
        <div class="mail-box" id="sysfrm_ajaxrender">

            <table class="table table-hover table-mail">
                <tbody>


              <?php  $_smarty_tpl->tpl_vars['ds'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ds']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['d']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ds']->key => $_smarty_tpl->tpl_vars['ds']->value){
$_smarty_tpl->tpl_vars['ds']->_loop = true;
?>
                  <tr class="read">

                      <td><a  class="ve" id="f<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
" href="#"><?php echo $_smarty_tpl->tpl_vars['ds']->value['tplname'];?>
</a>  </td>
                      <td><a  class="ve" id="s<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
" href="#"><?php echo $_smarty_tpl->tpl_vars['ds']->value['subject'];?>
</a></td>
                      <td class=""></td>
                      <td class="text-right">
                              <?php if ($_smarty_tpl->tpl_vars['ds']->value['send']=='Yes'){?>
                          <span class="label label-success pull-right"> Active </span>
                                  <?php }else{ ?>
                                  <span class="label label-danger pull-right"> Inactive </span>
                              <?php }?>

                          </td>
                  </tr>
              <?php } ?>

                </tbody>
            </table>


        </div>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>