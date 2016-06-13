{include file="sections/header.tpl"}
<div class="row">
    <div id="dpx"></div>
    <div class="col-lg-12" id="result">

        <div class="panel-body" style="background: #ffffff; margin-top: 10px;">
            <h4>Total Income: {$cr}</h4>
            <h4>Total Expense: {$dr}</h4>

            <hr>
            <h4>All Transactions at Date - {$mdate}</h4>
            <hr>
            <table class="table table-striped table-bordered">

                <th>Account</th>
                <th>Type</th>
                <th>Category</th>
                <th class="text-right">Amount</th>
                <th>Payer</th>
                <th>Payee</th>
                <th>Method</th>
                <th>Ref</th>
                <th>Description</th>
                <th class="text-right">Dr.</th>
                <th class="text-right">Cr.</th>
                <th class="text-right">Balance</th>

                {foreach $d as $ds}
                    <tr>

                        <td>{$ds['account']}</td>
                        <td>{$ds['type']}</td>
                        <td>{$ds['category']}</td>
                        <td class="text-right">{number_format($ds['amount'],2,$_c['dec_point'],$_c['thousands_sep'])}</td>
                        <td>{$ds['payer']}</td>
                        <td>{$ds['payee']}</td>
                        <td>{$ds['method']}</td>
                        <td>{$ds['ref']}</td>
                        <td>{$ds['description']}</td>
                        <td class="text-right">{$_c['currency_code']} {number_format($ds['dr'],2,$_c['dec_point'],$_c['thousands_sep'])}</td>
                        <td class="text-right">{$_c['currency_code']} {number_format($ds['cr'],2,$_c['dec_point'],$_c['thousands_sep'])}</td>
                        <td class="text-right"><span {if $ds['bal'] < 0}class="text-red"{/if}>{$_c['currency_code']} {number_format($ds['bal'],2,$_c['dec_point'],$_c['thousands_sep'])}</span></td>

                    </tr>
                {/foreach}



            </table>
        </div>

    </div>




    <!-- Widget-2 end-->
</div>
 <!-- Row end-->


<!-- Row end-->


<!-- Row end-->

{include file="sections/footer.tpl"}
