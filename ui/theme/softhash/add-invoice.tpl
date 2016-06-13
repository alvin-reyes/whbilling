{include file="sections/header.tpl"}
<div class="row">
<div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>
                {if $recurring}
                    Create Recurring Invoice
                    {else}
                    Create New Invoice
                {/if}
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
                                            {foreach $c as $cs}
                                                <option value="{$cs['id']}">{$cs['account']}</option>
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
                                {if $recurring}
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
                                    {else}
                                    <input type="hidden" name="repeat" id="repeat" value="0">
                                {/if}
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-4 control-label">Invoice Date</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="idate" name="idate" datepicker data-date-format="yyyy-mm-dd" data-auto-close="true" value="{$idate}">
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
                                            {foreach $t as $ts}
                                                <option value="{$ts['id']}">{$ts['name']}</option>
                                            {/foreach}

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
{include file="sections/footer.tpl"}