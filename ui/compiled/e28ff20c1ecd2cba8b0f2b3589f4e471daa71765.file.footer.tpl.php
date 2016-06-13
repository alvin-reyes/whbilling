<?php /* Smarty version Smarty-3.1.13, created on 2015-04-07 20:50:17
         compiled from "ui/theme/softhash/sections/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:193393410255247b490064b4-06118707%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e28ff20c1ecd2cba8b0f2b3589f4e471daa71765' => 
    array (
      0 => 'ui/theme/softhash/sections/footer.tpl',
      1 => 1428452958,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '193393410255247b490064b4-06118707',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_url' => 0,
    '_c' => 0,
    '_theme' => 0,
    'xfooter' => 0,
    'xjq' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55247b49037f92_31686422',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55247b49037f92_31686422')) {function content_55247b49037f92_31686422($_smarty_tpl) {?><div id="ajax-modal" class="modal container fade" tabindex="-1" style="display: none;"></div>
</div>
<div class="footer">
    
        
    
    <div>
        <input type="hidden" id="_url" name="_url" value="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
">
        <input type="hidden" id="_df" name="_df" value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['df'];?>
">
        <strong>Copyright</strong> &copy; <?php echo $_smarty_tpl->tpl_vars['_c']->value['CompanyName'];?>

    </div>
</div>

</div>
</div>

<!-- Mainly scripts -->
<script src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/js/jquery-1.10.2.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/js/jquery-ui-1.10.4.min.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/js/bootstrap.min.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/js/jquery.metisMenu.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/js/jquery.slimscroll.min.js"></script>
<!-- Custom and plugin javascript -->
<script src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/lib/moment.js"></script>

<script src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/js/app.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/js/pace.min.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/lib/progress.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/lib/bootbox.min.js"></script>

<!-- iCheck -->
<script src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/lib/icheck/icheck.min.js"></script>
<?php if (isset($_smarty_tpl->tpl_vars['xfooter']->value)){?>
    <?php echo $_smarty_tpl->tpl_vars['xfooter']->value;?>

<?php }?>
<script>
    jQuery(document).ready(function() {
        // initiate layout and plugins

        <?php if (isset($_smarty_tpl->tpl_vars['xjq']->value)){?>
        <?php echo $_smarty_tpl->tpl_vars['xjq']->value;?>

        <?php }?>

    });

</script>
</body>

</html>
<?php }} ?>