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
                    <h3 class="font-bold">{$_c['currency_code']} {number_format($ti,2,$_c['dec_point'],$_c['thousands_sep'])}</h3>
                    <a href="{$_url}transactions/deposit/" class="btn btn-success btn-xs">Add Deposit</a>
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
                    <h3 class="font-bold">{$_c['currency_code']} {number_format($te,2,$_c['dec_point'],$_c['thousands_sep'])}</h3>
                    <a href="{$_url}transactions/expense/" class="btn btn-warning btn-xs">Add Expense</a>
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
                    <h3 class="font-bold">{$_c['currency_code']} {number_format($mi,2,$_c['dec_point'],$_c['thousands_sep'])}</h3>
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
                    <h3 class="font-bold">{$_c['currency_code']} {number_format($me,2,$_c['dec_point'],$_c['thousands_sep'])}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">

                <h5>Income &amp; Expense - {date('F Y')}</h5>
            </div>
            <div class="ibox-content">
                <div id="chart"></div>
            </div>
        </div>

    </div>
    <!-- Widget-5 end-->

</div>
<div class="row">
    <div class="col-md-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <a href="#" id="set_goal" class="btn btn-primary btn-xs pull-right"><i class="fa fa-bullseye"></i> Set Goal</a>
                <h5>Net Worth &amp; Account Balances</h5>
            </div>
            <div class="ibox-content">
                <div>
<h3 class="text-center">{$_c['currency_code']} {number_format($net_worth,2,$_c['dec_point'],$_c['thousands_sep'])}</h3>
                    <div>
                        <span>{$_c['currency_code']} {number_format($net_worth,2,$_c['dec_point'],$_c['thousands_sep'])} of {$_c['currency_code']} {number_format($_c['networth_goal'],2,$_c['dec_point'],$_c['thousands_sep'])} </span>
                        <small class="pull-right">{$pg}%</small>
                    </div>


                    <div class="progress progress-small">
                        <div style="width: {$pgb}%;" class="progress-bar progress-bar-{$pgc}"></div>
                    </div>
                </div>
                <table class="table table-striped table-bordered" style="margin-top: 26px;">
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
    </div>
    <div class="col-md-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">

                <h5>Income vs Expense - {date('F Y')}</h5>
            </div>
            <div class="ibox-content">
                <div id="dchart"></div>
            </div>
        </div>

    </div>
</div>

     <!-- Row end-->
<div class="row">
    <div class="col-md-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">

                <h5>Latest Income</h5>
            </div>
            <div class="ibox-content">
                <table class="table table-striped table-bordered">
                    <th>Date</th>
                    <th>Description</th>
                    <th class="text-right">Amount</th>
                    {foreach $inc as $incs}
                        <tr>
                            <td>{date( $_c['df'], strtotime($incs['date']))}</td>
                            <td><a href="{$_url}transactions/manage/{$incs['id']}/">{$incs['description']}</a> </td>
                            <td class="text-right">{$_c['currency_code']} {number_format($incs['amount'],2,$_c['dec_point'],$_c['thousands_sep'])}</td>
                        </tr>
                    {/foreach}



                </table>
            </div>
        </div>

    </div>


    <div class="col-md-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">

                <h5>Latest Expense</h5>
            </div>
            <div class="ibox-content">
                <table class="table table-striped table-bordered">
                    <th>Date</th>
                    <th>Description</th>
                    <th class="text-right">Amount</th>
                    {foreach $exp as $exps}
                        <tr>
                            <td>{date( $_c['df'], strtotime($exps['date']))}</td>
                            <td><a href="{$_url}transactions/manage/{$exps['id']}/">{$exps['description']}</a> </td>
                            <td class="text-right">{$_c['currency_code']} {number_format($exps['amount'],2,$_c['dec_point'],$_c['thousands_sep'])}</td>
                        </tr>
                    {/foreach}



                </table>
            </div>
        </div>

    </div>


</div>
{include file="sections/footer.tpl"}