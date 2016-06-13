<?php /* Smarty version Smarty-3.1.13, created on 2015-04-07 21:49:07
         compiled from "ui/theme/softhash/add-invoice.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2007522890552489135485b9-25462295%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '45b4bb35f2c74c43a650936de021ee68493e993d' => 
    array (
      0 => 'ui/theme/softhash/add-invoice.tpl',
      1 => 1428452871,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2007522890552489135485b9-25462295',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'recurring' => 0,
    'c' => 0,
    'cs' => 0,
    'idate' => 0,
    't' => 0,
    'ts' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_552489135a64d9_84915498',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_552489135a64d9_84915498')) {function content_552489135a64d9_84915498($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="row">
<div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>
                <?php if ($_smarty_tpl->tpl_vars['recurring']->value){?>
                    Create Recurring Invoice
                    <?php }else{ ?>
                    Create New Invoice
                <?php }?>
            </h5>

        </div>
        <div class="ibox-content">
            <form id="invform" method="post">
                <div class="ibox-content p-xl">
                    <div class="row">
                        <div class="alert alert-danger" id="emsg">
                            <span id="emsgbody"></span>
                        </div>
                        <div class="col-md-6">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <label for="cid" class="col-sm-2 control-label">Customer</label>
                                    <div class="col-sm-10">
                                        <select id="cid" name="cid">
                                            <option value="">Select Contact...</option>
                                            <?php  $_smarty_tpl->tpl_vars['cs'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cs']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['c']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cs']->key => $_smarty_tpl->tpl_vars['cs']->value){
$_smarty_tpl->tpl_vars['cs']->_loop = true;
?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['cs']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['cs']->value['account'];?>
</option>
                                            <?php } ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Address</label>
                                    <div class="col-sm-10">
                                        <textarea id="address" readonly class="form-control" rows="3"></textarea>
                                    </div>
                                </div>


                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-horizontal">
                                <?php if ($_smarty_tpl->tpl_vars['recurring']->value){?>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-4 control-label">Repeat Every</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" name="repeat" id="repeat">
                                                <option value="week1">Week</option>
                                                <option value="weeks2">2 Weeks</option>
                                                <option value="month1" selected>Month</option>
                                                <option value="months2">2 Months</option>
                                                <option value="months3">3 Months</option>
                                                <option value="months6">6 Months</option>
                                                <option value="year1">Year</option>
                                                <option value="years2">2 Years</option>
                                                <option value="years3">3 Years</option>

                                            </select>
                                        </div>
                                    </div>
                                    <?php }else{ ?>
                                    <input type="hidden" name="repeat" id="repeat" value="0">
                                <?php }?>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-4 control-label">Invoice Date</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="idate" name="idate" datepicker data-date-format="yyyy-mm-dd" data-auto-close="true" value="<?php echo $_smarty_tpl->tpl_vars['idate']->value;?>
">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-4 control-label">Payment Terms</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="duedate" id="duedate">
                                            <option value="due_on_receipt" selected>Due On Receipt</option>
                                            <option value="days3">+3 days</option>
                                            <option value="days5">+5 days</option>
                                            <option value="days7">+7 days</option>
                                            <option value="days10">+10 days</option>
                                            <option value="days15">+15 days</option>
                                            <option value="days30">+30 days</option>
                                            <option value="days45">+45 days</option>
                                            <option value="days60">+60 days</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tid" class="col-sm-4 control-label">Sales TAX</label>
                                    <div class="col-sm-8">
                                        <select id="tid" name="tid">
                                            <option value="">None</option>
                                            <?php  $_smarty_tpl->tpl_vars['ts'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ts']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['t']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ts']->key => $_smarty_tpl->tpl_vars['ts']->value){
$_smarty_tpl->tpl_vars['ts']->_loop = true;
?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['ts']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['ts']->value['name'];?>
</option>
                                            <?php } ?>

                                        </select>
                                        <input type="hidden" id="stax" name="stax" value="0.00">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="table-responsive m-t">
                        <table class="table invoice-table" id="invoice_items">
                            <thead>
                            <tr>
                                <th width="10%">Item Code</th>
                                <th width="50%">Item Name</th>

                                <th width="10%">Qty</th>
                                <th width="10%">Price</th>

                                <th width="10%">Total</th>
                                <th width="10%">Tax</th>
                            </tr>
                            </thead>
                            <tbody>




                            </tbody>
                        </table>

                    </div><!-- /table-responsive -->
                    <button type="button" class="btn btn-primary" id="blank-add"><i class="fa fa-plus"></i> Add blank Line</button>
                    <button type="button" class="btn btn-primary" id="item-add"><i class="fa fa-search"></i> Add Product OR Service</button>
                    <button type="button" class="btn btn-danger" id="item-remove"><i class="fa fa-minus-circle"></i> Delete</button>
                    <table class="table invoice-total">
                        <tbody>
                        <tr>
                            <td><strong>Sub Total :</strong></td>
                            <td id="sub_total">0.00</td>
                        </tr>
                        <tr>
                            <td><strong>TAX :</strong></td>
                            <td id="taxtotal">0.00</td>
                        </tr>
                        <tr>
                            <td><strong>TOTAL :</strong></td>
                            <td id="total">0.00</td>
                        </tr>
                        </tbody>
                    </table>
                    <textarea class="form-control" name="notes" id="notes" rows="3" placeholder="Invoice Terms..."></textarea>
                    <br>

                    <div class="text-right">
                        <button class="btn btn-primary" id="submit"><i class="fa fa-save"></i> Save Invoice</button>
                    </div>


                </div>
            </form>


        </div>
    </div>
</div>

</div>
<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>