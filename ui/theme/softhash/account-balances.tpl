{include file="sections/header.tpl"}
<div class="row">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Financial Balances</h5>

            </div>
            <div class="ibox-content">

                <table class="table table-striped table-bordered">
                    <th>{$_L['Account']}</th>
                    <th class="text-right">{$_L['Balance']}</th>
                    {foreach $d as $ds}
                        <tr>
                            <td>{$ds['account']}</td>
                            <td class="text-right"><span {if $ds['balance'] < 0}class="text-red"{/if}>{$_c['currency_code']} {number_format($ds['balance'],2,$_c['dec_point'],$_c['thousands_sep'])}</span> </td>
                        </tr>
                    {/foreach}


                    <tr>
                        <td><strong>{$_L['Total']}:</strong></td>
                        <td class="text-right"><strong><span {if $tbal < 0}class="text-red"{/if}>{number_format($tbal,2,$_c['dec_point'],$_c['thousands_sep'])}</span></strong></td>
                    </tr>
                </table>

            </div>
        </div>



    </div>



</div>




{include file="sections/footer.tpl"}
