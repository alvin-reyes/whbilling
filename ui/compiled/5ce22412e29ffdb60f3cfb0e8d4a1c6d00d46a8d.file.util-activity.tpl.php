<?php /* Smarty version Smarty-3.1.13, created on 2015-04-08 16:12:05
         compiled from "ui/theme/softhash/util-activity.tpl" */ ?>
<?php /*%%SmartyHeaderCode:126292267055258b95d61946-68784327%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5ce22412e29ffdb60f3cfb0e8d4a1c6d00d46a8d' => 
    array (
      0 => 'ui/theme/softhash/util-activity.tpl',
      1 => 1428452905,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '126292267055258b95d61946-68784327',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cnt' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55258b95dec497_94106120',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55258b95dec497_94106120')) {function content_55258b95dec497_94106120($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="row animated fadeInDown">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Total Logs: <?php echo $_smarty_tpl->tpl_vars['cnt']->value;?>
 </h5>
                <a href="#" class="btn btn-primary btn-sm pull-right" id="clear_logs"><i class="fa fa-list"></i> Clear Old Data</a>



            </div>
            <div class="ibox-content" id="sysfrm_ajaxrender">


                <table class="table table-bordered sys_table" id="sys_logs">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Type</th>
                        <th>Description</th>
                        <th>UID</th>
                        <th>IP</th>

                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>


        </div>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>