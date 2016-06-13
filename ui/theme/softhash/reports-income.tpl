{include file="sections/header.tpl"}
<div class="row">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Income Reports </h5>

        </div>
        <div class="ibox-content">


                <h4>Income Summary</h4>
                <hr>
                <h5>Total Income: {$_c['currency_code']}  {number_format($a,2,$_c['dec_point'],$_c['thousands_sep'])}</h5>
                <h5>Total Income This Month: {$_c['currency_code']} {number_format($m,2,$_c['dec_point'],$_c['thousands_sep'])}</h5>
                <h5>Total Income This Week: {$_c['currency_code']}  {number_format($w,2,$_c['dec_point'],$_c['thousands_sep'])}</h5>
                <h5>Total Income Last 30 days: {$_c['currency_code']} {number_format($m3,2,$_c['dec_point'],$_c['thousands_sep'])}</h5>


                <hr>
                <h4>Last 20 deposit/ Income</h4>
                <hr>
                <table class="table table-striped table-bordered">
                    <th>Date</th>
                    <th>Account</th>
                    <th>Type</th>
                    <th>Category</th>
                    <th class="text-right">Amount</th>
                    <th>Payer</th>



                    <th>Description</th>

                    <th class="text-right">Cr.</th>
                    <th class="text-right">Balance</th>

                    {foreach $d as $ds}
                        <tr>
                            <td>{$ds['date']}</td>
                            <td>{$ds['account']}</td>
                            <td>{$ds['type']}</td>
                            <td>{$ds['category']}</td>
                            <td class="text-right">{$_c['currency_code']} {number_format($ds['amount'],2,$_c['dec_point'],$_c['thousands_sep'])}</td>
                            <td>{$ds['payer']}</td>



                            <td>{$ds['description']}</td>

                            <td class="text-right">{$_c['currency_code']} {number_format($ds['cr'],2,$_c['dec_point'],$_c['thousands_sep'])}</td>
                            <td class="text-right"><span {if $ds['bal'] < 0}class="text-red"{/if}>{$_c['currency_code']} {number_format($ds['bal'],2,$_c['dec_point'],$_c['thousands_sep'])}</span></td>

                        </tr>
                    {/foreach}



                </table>
                <hr>
                <h4>Monthly Income Graph</h4>
                <hr>
                <div id="placeholder" class="flot-placeholder"></div>
                <hr>


        </div>
    </div>



    <!-- Widget-2 end-->
</div>
{include file="sections/footer.tpl"}
