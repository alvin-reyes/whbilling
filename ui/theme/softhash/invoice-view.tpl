{include file="sections/header.tpl"}
<div class="row animated fadeInDown">
    <div class="col-lg-12"  id="sysfrm_ajaxrender">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Invoice - {$d['id']} </h5>
                <input type="hidden" name="iid" value="{$d['id']}" id="iid">
                {*<a href="{$_url}plugins/flmcs/init/add-new" class="btn btn-success btn-sm pull-right"><i class="fa fa-plus"></i> Add New Service</a>*}

                {*<a href="{$_url}plugins/flmcs/init/sync" class="btn btn-success btn-sm pull-right"><i class="fa fa-plus"></i> Sync</a>*}

                <div class="btn-group  pull-right" role="group" aria-label="...">


                    <div class="btn-group" role="group">
                        <button type="button" class="btn  btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-envelope-o"></i>  Send Email
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#" id="mail_invoice_created">Invoice Created</a></li>
                            <li><a href="#" id="mail_invoice_reminder">Invoice Payment Reminder</a></li>
                            <li><a href="#" id="mail_invoice_overdue">Invoice Overdue Notice</a></li>
                            <li><a href="#" id="mail_invoice_confirm">Invoice Payment Confirmation</a></li>
                            <li><a href="#" id="mail_invoice_refund">Invoice Refund Confirmation</a></li>
                        </ul>
                    </div>

                    <div class="btn-group" role="group">
                        <button type="button" class="btn  btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-ellipsis-v"></i>  Mark As
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            {if $d['status'] neq 'Paid'}
                                <li><a href="#" id="mark_paid">Paid</a></li>
                            {/if}
                            {if $d['status'] neq 'Unpaid'}
                                <li><a href="#" id="mark_unpaid">Unpaid</a></li>
                            {/if}
                            {if $d['status'] neq 'Partially Paid'}
                                <li><a href="#" id="mark_partially_paid">Partially Paid</a></li>
                            {/if}
                            {if $d['status'] neq 'Cancelled'}
                                <li><a href="#" id="mark_cancelled">Cancelled</a></li>
                            {/if}

                        </ul>
                    </div>

                    <button type="button" class="btn  btn-danger btn-sm" id="add_payment"><i class="fa fa-plus"></i> Add Payment</button>
                    <a href="{$_url}client/iview/{$d['id']}/token_{$d['vtoken']}" target="_blank" class="btn btn-primary  btn-sm"><i class="fa fa-paper-plane-o"></i> Preview</a>
                    <a href="{$_url}invoices/edit/{$d['id']}" class="btn btn-warning  btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                    <div class="btn-group" role="group">
                        <button type="button" class="btn  btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-file-pdf-o"></i>
                            PDF
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{$_url}invoices/pdf/{$d['id']}/view" target="_blank">View PDF</a></li>
                            <li><a href="{$_url}invoices/pdf/{$d['id']}/dl">Download PDF</a></li>
                        </ul>
                    </div>
                    <a href="{$_url}iview/print/{$d['id']}/token_{$d['vtoken']}" target="_blank" class="btn btn-primary  btn-sm"><i class="fa fa-print"></i> Print</a>


                </div>

            </div>
            <div class="ibox-content">

                <div class="invoice">
                    <header class="clearfix">
                        <div class="row">
                            <div class="col-sm-6 mt-md">
                                <h2 class="h2 mt-none mb-sm text-dark text-bold">INVOICE</h2>
                                <h4 class="h4 m-none text-dark text-bold">#{$d['id']}</h4>
                                {if $d['status'] eq 'Unpaid'}
                                    <h3 class="alert alert-danger">Unpaid</h3>
                                {elseif $d['status'] eq 'Paid'}
                                    <h3 class="alert alert-success">Paid</h3>
                                {else}
                                    <h3 class="alert alert-info">{$d['status']}</h3>
                                {/if}
                            </div>
                            <div class="col-sm-6 text-right mt-md mb-md">
                                <address class="ib mr-xlg">
                                    {$_c['caddress']}
                                </address>
                                <div class="ib">
                                    <img src="sysfrm/uploads/system/logo.png" alt="Logo">
                                </div>
                            </div>
                        </div>
                    </header>
                    <div class="bill-info">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="bill-to">
                                    <p class="h5 mb-xs text-dark text-semibold">Invoiced To:</p>
                                    <address>
                                        {$d['account']}
                                        <br>
                                        {$a['address']} <br>
                                        {$a['city']} <br>
                                        {$a['state']} - {$a['zip']} <br>
                                        {$a['country']}
                                        <br>
                                        Phone: {$a['phone']}
                                        <br>
                                        Email: {$a['email']}
                                    </address>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="bill-data text-right">
                                    <p class="mb-none">
                                        <span class="text-dark">Invoice Date:</span>
                                        <span class="value">{date( $_c['df'], strtotime($d['date']))}</span>
                                    </p>
                                    <p class="mb-none">
                                        <span class="text-dark">Due Date:</span>
                                        <span class="value">{date( $_c['df'], strtotime($d['duedate']))}</span>
                                    </p>
                                    <h2> Amount Due: {$_c['currency_code']} {number_format($d['total'],2,$_c['dec_point'],$_c['thousands_sep'])} </h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table invoice-items">
                            <thead>
                            <tr class="h4 text-dark">
                                <th id="cell-id" class="text-semibold">#</th>
                                <th id="cell-item" class="text-semibold">Item</th>

                                <th id="cell-price" class="text-center text-semibold">Price</th>
                                <th id="cell-qty" class="text-center text-semibold">Quantity</th>
                                <th id="cell-total" class="text-center text-semibold">Total</th>
                            </tr>
                            </thead>
                            <tbody>

                            {foreach $items as $item}
                                <tr>
                                    <td>{$item['itemcode']}</td>
                                    <td class="text-semibold text-dark">{$item['description']}</td>

                                    <td class="text-center">{$_c['currency_code']} {number_format($item['amount'],2,$_c['dec_point'],$_c['thousands_sep'])}</td>
                                    <td class="text-center">{$item['qty']}</td>
                                    <td class="text-center">{$_c['currency_code']} {number_format($item['total'],2,$_c['dec_point'],$_c['thousands_sep'])}</td>
                                </tr>
                            {/foreach}

                            </tbody>
                        </table>
                    </div>

                    <div class="invoice-summary">
                        <div class="row">
                            <div class="col-sm-4 col-sm-offset-8">
                                <table class="table h5 text-dark">
                                    <tbody>
                                    <tr class="b-top-none">
                                        <td colspan="2">Subtotal</td>
                                        <td class="text-left">{$_c['currency_code']} {number_format($d['subtotal'],2,$_c['dec_point'],$_c['thousands_sep'])}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">TAX</td>
                                        <td class="text-left">{$_c['currency_code']} {number_format($d['tax'],2,$_c['dec_point'],$_c['thousands_sep'])}</td>
                                    </tr>
                                    <tr class="h4">
                                        <td colspan="2">Grand Total</td>
                                        <td class="text-left">{$_c['currency_code']} {number_format($d['total'],2,$_c['dec_point'],$_c['thousands_sep'])}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                {if ($d['notes']) neq ''}
                    <div class="well m-t">
                        {$d['notes']}
                    </div>
                {/if}
   {if ($trs_c neq '')}
       <h3>Related Transactions</h3>
       <table class="table table-bordered sys_table">
           <th>Date</th>
           <th>Account</th>


           <th class="text-right">Amount</th>

           <th>Description</th>




           {foreach $trs as $tr}
               <tr class="{if $tr['cr'] eq '0.00'}warning {else}info{/if}">
                   <td>{date( $_c['df'], strtotime($tr['date']))}</td>
                   <td>{$tr['account']}</td>


                   <td class="text-right">{number_format($tr['amount'],2,$_c['dec_point'],$_c['thousands_sep'])}</td>
                   <td>{$tr['description']}</td>




               </tr>
           {/foreach}



       </table>
   {/if}

                {if ($emls_c neq '')}
                    <hr>
                    <h3>Related Emails</h3>
                    <table class="table table-bordered sys_table">
                        <th width="20%">Date</th>
                        <th>Subject</th>







                        {foreach $emls as $eml}
                            <tr>
                                <td>{date( $_c['df'], strtotime($eml['date']))}</td>
                                <td>{$eml['subject']}</td>
                            </tr>
                        {/foreach}



                    </table>
                {/if}



            </div>


        </div>
    </div>
</div>
{include file="sections/footer.tpl"}