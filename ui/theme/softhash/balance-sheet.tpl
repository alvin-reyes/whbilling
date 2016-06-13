{include file="sections/header.tpl"}

<div class="row">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Balance Sheet </h5>

        </div>
        <div class="ibox-content">

            <table class="table table-bordered sys_table">

                <th width="80%">Account</th>

                <th class="text-right">Balance</th>

                {foreach $d as $ds}
                    <tr>

                        <td>{$ds['account']}</td>

                        <td class="text-right"><span {if $ds['balance'] < 0}class="text-red"{/if}>{$_c['currency_code']} {number_format($ds['balance'],2,$_c['dec_point'],$_c['thousands_sep'])}</span></td>

                    </tr>
                {/foreach}



            </table>
            <table class="table invoice-total">
                <tbody>

                <tr>
                    <td><strong>TOTAL :</strong></td>
                    <td><strong>{if $tbal < 0}class="text-red"{/if}{$_c['currency_code']} {number_format($tbal,2,$_c['dec_point'],$_c['thousands_sep'])}</strong></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>



    <!-- Widget-2 end-->
</div> <!-- Row end-->


<!-- Row end-->


<!-- Row end-->

{include file="sections/footer.tpl"}
