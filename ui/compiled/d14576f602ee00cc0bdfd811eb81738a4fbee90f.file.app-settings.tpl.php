<?php /* Smarty version Smarty-3.1.13, created on 2015-04-07 20:59:46
         compiled from "ui/theme/softhash/app-settings.tpl" */ ?>
<?php /*%%SmartyHeaderCode:50278201255247d82c91e07-11879205%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd14576f602ee00cc0bdfd811eb81738a4fbee90f' => 
    array (
      0 => 'ui/theme/softhash/app-settings.tpl',
      1 => 1428452875,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '50278201255247d82c91e07-11879205',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_url' => 0,
    '_c' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55247d82d048b8_79782349',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55247d82d048b8_79782349')) {function content_55247d82d048b8_79782349($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="row">
    <div class="col-md-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>General Settings</h5>

            </div>
            <div class="ibox-content">

                <form role="form" name="accadd" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/app-post">
                    <div class="form-group">
                        <label for="company">Application Name/ Company Name</label>
                        <input type="text" class="form-control" id="company" name="company" value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['CompanyName'];?>
">
                        <span class="help-block">This Name will be shown on the Title</span>
                    </div>
                    
                    
                    
                    

                    <div class="form-group">
                        <label for="theme">Theme</label>
                        <select name="theme" id="theme" class="form-control">
                            <option value="softhash" <?php if ($_smarty_tpl->tpl_vars['_c']->value['theme']=='softhash'){?>selected="selected" <?php }?>>Softhash</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nstyle">Style</label>
                        <select name="nstyle" id="nstyle" class="form-control">
                            <option value="dark" <?php if ($_smarty_tpl->tpl_vars['_c']->value['nstyle']=='dark'){?>selected="selected" <?php }?>>Dark</option>
                            

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="caddress">Pay To Address</label>

                        <textarea class="form-control" id="caddress" name="caddress" rows="3"><?php echo $_smarty_tpl->tpl_vars['_c']->value['caddress'];?>
</textarea>
                        <span class="help-block">You can use html tag</span>
                    </div>


                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
                </form>

            </div>
        </div>

        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Logo</h5>


            </div>
            <div class="ibox-content">

                <img class="logo" src="sysfrm/uploads/system/logo.png" alt="Logo">
                <br><br>
                <form role="form" name="logo" enctype="multipart/form-data" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/logo-post">
                    <div class="form-group">
                        <label for="exampleInputFile">Upload New Logo</label>
                        <input type="file" id="file" name="file">
                        <p class="help-block">This will replace existing logo. You may also change logo by replacing file - sysfrm/uploads/system/logo.png</p>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
                </form>


            </div>
        </div>

    </div>



</div>




<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>