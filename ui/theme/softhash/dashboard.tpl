{include file="sections/header.tpl"}
<div class="row">
    <div class="col-lg-3">
        <div class="widget style1 lazur-bg">
            <div class="row">
                <div class="col-xs-4">
                    <i class="fa fa-plus fa-5x"></i>
                </div>
                <div class="col-xs-8 text-right">
                    <span> Income Today </span>
                    <h2 class="font-bold">26'C</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="widget style1 red-bg">
            <div class="row">
                <div class="col-xs-4">
                    <i class="fa fa-minus fa-5x"></i>
                </div>
                <div class="col-xs-8 text-right">
                    <span> Expense Today </span>
                    <h2 class="font-bold">26'C</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="widget style1 lazur-bg">
            <div class="row">
                <div class="col-xs-4">
                    <i class="fa fa-plus fa-5x"></i>
                </div>
                <div class="col-xs-8 text-right">
                    <span> Income This Month </span>
                    <h2 class="font-bold">26'C</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="widget style1 red-bg">
            <div class="row">
                <div class="col-xs-4">
                    <i class="fa fa-minus fa-5x"></i>
                </div>
                <div class="col-xs-8 text-right">
                    <span> Expense This Month </span>
                    <h2 class="font-bold">26'C</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">

    <div class="widget-1 col-md-6">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Financial Balances</h3>
            </div>
            <div class="panel-body">
                <table class="table table-striped table-bordered">
                    <th>Account</th>
                    <th class="text-right">Balance</th>
                    {foreach $d as $ds}
                        <tr>
                            <td>{$ds['account']}</td>
                            <td class="text-right"><span {if $ds['balance'] < 0}class="text-red"{/if}>{$_c['currency_code']} {number_format($ds['balance'],2,$_c['dec_point'],$_c['thousands_sep'])}</span></td>
                        </tr>
                    {/foreach}



                </table>
            </div>
        </div>
    </div> <!-- Widget-1 end-->

    <div class="widget-2 col-md-6">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Latest 5 Income</h3>
            </div>
            <div class="panel-body">
                <table class="table table-striped table-bordered">
                    <th>Date</th>
                    <th>Description</th>
                    <th class="text-right">Amount</th>
                    {foreach $inc as $incs}
                        <tr>
                            <td>{$incs['date']}</td>
                            <td><a href="{$_url}transactions/manage/{$incs['id']}">{$incs['description']}</a> </td>
                            <td class="text-right">{$_c['currency_code']} {number_format($incs['amount'],2,$_c['dec_point'],$_c['thousands_sep'])}</td>
                        </tr>
                    {/foreach}



                </table>
            </div>


        </div>
    </div> <!-- Widget-2 end-->
</div> <!-- Row end-->


<div class="row">
    <div class="widget-3 col-md-6">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Upcoming Payments</h3>
            </div>
            <div class="panel-body">
                <table class="table table-striped table-bordered">

                    <th>Date</th>
                    <th>Description</th>
                    <th class="text-right">Amount</th>
                    {foreach $rx as $rxs}
                        <tr>
                            <td>{$rxs['date']}</td>
                            <td><a href="{$_url}repeating/view/{$rxs['id']}">{$rxs['description']}</a> </td>
                            <td class="text-right">{$_c['currency_code']} {number_format($rxs['amount'],2,$_c['dec_point'],$_c['thousands_sep'])}</td>
                        </tr>
                    {/foreach}




                </table>
            </div>
        </div>
    </div> <!-- Widget-3 end-->

    <div class="widget-4 col-md-6">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Latest 5 Expense</h3>
            </div>
            <div class="panel-body">
                <table class="table table-striped table-bordered">
                    <th>Date</th>
                    <th>Description</th>
                    <th class="text-right">Amount</th>
                    {foreach $exp as $exps}
                        <tr>
                            <td>{$exps['date']}</td>
                            <td><a href="{$_url}transactions/manage/{$exps['id']}">{$exps['description']}</a> </td>
                            <td class="text-right">{$_c['currency_code']} {number_format($exps['amount'],2,$_c['dec_point'],$_c['thousands_sep'])}</td>
                        </tr>
                    {/foreach}



                </table>
            </div>
        </div>
    </div> <!-- Widget-4 end-->
</div> <!-- Row end-->


<div class="row">
    <div class="widget-4 col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Income Vs Expense This Year</h3>
            </div>
            <div class="panel-body">
                <div id="placeholder" class="flot-placeholder"></div>
            </div>
        </div>
    </div> <!-- Widget-5 end-->

</div> <!-- Row end-->






{include file="sections/footer.tpl"}