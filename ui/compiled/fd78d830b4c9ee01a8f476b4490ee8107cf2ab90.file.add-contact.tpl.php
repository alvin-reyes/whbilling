<?php /* Smarty version Smarty-3.1.13, created on 2015-04-08 01:10:58
         compiled from "ui/theme/softhash/add-contact.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5747860205524b862edf7c9-40431899%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fd78d830b4c9ee01a8f476b4490ee8107cf2ab90' => 
    array (
      0 => 'ui/theme/softhash/add-contact.tpl',
      1 => 1428452870,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5747860205524b862edf7c9-40431899',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'countries' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5524b862f2e219_40199536',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5524b862f2e219_40199536')) {function content_5524b862f2e219_40199536($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">

    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Add Contact</h5>

            </div>
            <div class="ibox-content">
                <div class="alert alert-danger" id="emsg">
                    <span id="emsgbody"></span>
                </div>

                <form class="form-horizontal" id="rform">

                    <div class="form-group"><label class="col-lg-2 control-label" for="account">Full Name</label>

                        <div class="col-lg-10"><input type="text" id="account" name="account" class="form-control" autocomplete="off">

                        </div>
                    </div>

                    <div class="form-group"><label class="col-lg-2 control-label" for="email">Email</label>

                        <div class="col-lg-10"><input type="text" id="email" name="email" class="form-control" autocomplete="off">

                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-2 control-label" for="phone">Phone</label>

                        <div class="col-lg-10"><input type="text" id="phone" name="phone" class="form-control" autocomplete="off">

                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-2 control-label" for="address">Address</label>

                        <div class="col-lg-10"><input type="text" id="address" name="address" class="form-control" autocomplete="off">

                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-2 control-label" for="city">City</label>

                        <div class="col-lg-10"><input type="text" id="city" name="city" class="form-control" autocomplete="off">

                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-2 control-label" for="state">State/Region</label>

                        <div class="col-lg-10"><input type="text" id="state" name="state" class="form-control" autocomplete="off">

                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-2 control-label" for="zip">ZIP/Postal Code </label>

                        <div class="col-lg-10"><input type="text" id="zip" name="zip" class="form-control" autocomplete="off">

                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-2 control-label" for="country">Country</label>

                        <div class="col-lg-10">

                            <select name="country" id="country">
                                <option value="">Select Country</option>
                               <?php echo $_smarty_tpl->tpl_vars['countries']->value;?>

                            </select>

                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-2 control-label" for="tags">Tags</label>

                        <div class="col-lg-10"><input type="text" id="tags" name="tags" style="width:100%">

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">

                            <button class="btn btn-primary" type="submit" id="submit"><i class="fa fa-check"></i> Submit</button>
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