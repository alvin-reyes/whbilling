{include file="sections/header.tpl"}
<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content animated fadeInRight">
            <form id="invform" method="post">
                <div class="ibox-content p-xl">
                    <div class="row">
                        <div class="alert alert-danger" id="emsg">
                            <span id="emsgbody"></span>
                        </div>
                        <div class="col-md-6">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <label for="cid" class="col-sm-2 control-label">Contact</label>
                                    <div class="col-sm-10">
                                        <select id="cid" name="cid">
                                            <option value="">Select Contact...</option>
                                            {foreach $c as $cs}
                                                <option value="{$cs['id']}" {if $i['account'] eq $cs['account']}selected="selected" {/if}>{$cs['account']}</option>
                                            {/foreach}

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
                                {if $i['r'] neq '0'}
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-4 control-label">Repeat Every</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" name="repeat" id="repeat">
                                                <option value="week1" {if $i['r'] eq '+1 week'} selected{/if}>Week</option>
                                                <option value="weeks2" {if $i['r'] eq '+2 weeks'} selected{/if}>2 Weeks</option>
                                                <option value="month1" {if $i['r'] eq '+1 month'} selected{/if}>Month</option>
                                                <option value="months2" {if $i['r'] eq '+2 months'} selected{/if}>2 Months</option>
                                                <option value="months3" {if $i['r'] eq '+3 months'} selected{/if}>3 Months</option>
                                                <option value="months6" {if $i['r'] eq '+6 months'} selected{/if}>6 Months</option>
                                                <option value="year1" {if $i['r'] eq '+1 year'} selected{/if}>Year</option>
                                                <option value="years2" {if $i['r'] eq '+2 years'} selected{/if}>2 Years</option>
                                                <option value="years3" {if $i['r'] eq '+3 years'} selected{/if}>3 Years</option>

                                            </select>
                                        </div>
                                    </div>
                                {else}
                                    <input type="hidden" name="repeat" id="repeat" value="0">
                                {/if}
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-4 control-label">Invoice Date</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="idate" name="idate" datepicker data-date-format="yyyy-mm-dd" data-auto-close="true" value="{$i['date']}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-4 control-label">Due Date</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="ddate" name="ddate" datepicker data-date-format="yyyy-mm-dd" data-auto-close="true" value="{$i['duedate']}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tid" class="col-sm-4 control-label">Sales TAX</label>
                                    <div class="col-sm-8">
                                        <select id="tid" name="tid">
                                            <option value="">None</option>
                                            {foreach $t as $ts}
                                                <option value="{$ts['id']}" {if $ts['name'] eq $i['taxname']}selected="selected" {/if} >{$ts['name']}</option>
                                            {/foreach}

                                        </select>
                                        <input type="hidden" id="stax" name="stax" value="{$i['taxrate']}">
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
                            {foreach $items as $item}
                                <tr> <td>{$item['itemcode']}</td> <td><input type="text" class="form-control item_name" name="desc[]" value="{$item['description']}"></td> <td><input type="text" class="form-control qty" value="{$item['qty']}" name="qty[]"></td> <td><input type="text" class="form-control item_price" name="amount[]" value="{$item['amount']}"></td> <td class="ltotal"><input type="text" class="form-control lvtotal" readonly="" value="{$item['total']}"></td> <td> <select class="form-control taxed" name="taxed[]"> <option value="Yes" {if $item['taxed'] eq '1'}selected{/if}>Yes</option> <option value="No" {if $item['taxed'] eq '0'}selected{/if}>No</option></select></td> </tr>
                            {/foreach}

                            {*<tr>*}
                            {*<td>PS 1000</td>*}
                            {*<td><div><strong>Angular JS &amp; Node JS Application</strong></div></td>*}
                            {*<td>*}
                            {*<textarea class="form-control" rows="3"></textarea></td>*}
                            {*<td><input type="text" class="form-control" placeholder="Text input"></td>*}
                            {*<td><input type="text" class="form-control" placeholder="Text input"></td>*}
                            {*<td><input type="text" class="form-control" placeholder="Text input"></td>*}
                            {*<td>$1033.20</td>*}
                            {*<td>Yes</td>*}
                            {*</tr>*}

                            </tbody>
                        </table>

                    </div><!-- /table-responsive -->
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
                    <textarea class="form-control" name="notes" id="notes" rows="3" placeholder="Invoice Terms...">{$i['notes']}</textarea>
                    <br>

                    <div class="text-right">
                        <input type="hidden" name="iid" id="iid" value="{$i['id']}">
                        <button class="btn btn-primary" id="submit"><i class="fa fa-save"></i> Save Invoice</button>
                    </div>


                </div>
            </form>
        </div>
    </div>
</div>
{include file="sections/footer.tpl"}