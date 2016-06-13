{include file="sections/header.tpl"}
<div class="row">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>{$account} Statement [{$fdate} - {$tdate}]</h5>

        </div>
        <div class="ibox-content">

            <table class="table table-bordered sys_table">
                <th>Date</th>




                <th>Description</th>
                <th class="text-right">Dr.</th>
                <th class="text-right">Cr.</th>
                <th class="text-right">Balance</th>

                {foreach $d as $ds}
                    <tr>
                        <td>{$ds['date']}</td>
                        <td>{$ds['description']}</td>


                        <td class="text-right">{$_c['currency_code']} {number_format($ds['dr'],2,$_c['dec_point'],$_c['thousands_sep'])}</td>
                        <td class="text-right">{$_c['currency_code']} {number_format($ds['cr'],2,$_c['dec_point'],$_c['thousands_sep'])}</td>
                        <td class="text-right"><span {if $ds['bal'] < 0}class="text-red"{/if}>{$_c['currency_code']} {number_format($ds['bal'],2,$_c['dec_point'],$_c['thousands_sep'])}</span></td>

                    </tr>
                {/foreach}



            </table>
            <div class="row">
                <div class="col-md-8">
                    &nbsp;
                </div>
                <div class="col-md-2" style="text-align: right"> <form class="form-horizontal" method="post" action="{$_url}export/printable" target="_blank">
                        <input type="hidden" name="fdate" value="{$fdate}">
                        <input type="hidden" name="tdate" value="{$tdate}">
                        <input type="hidden" name="stype" value="{$stype}">
                        <input type="hidden" name="account" value="{$account}">
                        <button type="submit" class="btn btn-default btn-sm"><i class="fa fa-print"></i> Export for Print</button>

                    </form></div>
                <div class="col-md-2" style="text-align: right"> <form class="form-horizontal" method="post" action="{$_url}export/pdf">
                        <input type="hidden" name="fdate" value="{$fdate}">
                        <input type="hidden" name="tdate" value="{$tdate}">
                        <input type="hidden" name="stype" value="{$stype}">
                        <input type="hidden" name="account" value="{$account}">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-file-pdf-o"></i> Export to PDF</button>
                    </form></div>
            </div>
        </div>
    </div>



    <!-- Widget-2 end-->
</div>
 <!-- Row end-->


<!-- Row end-->


<!-- Row end-->

{include file="sections/footer.tpl"}
