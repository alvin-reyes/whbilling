<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Invoice - {$d['id']}</title>
    <link rel="apple-touch-icon" sizes="57x57" href="{$app_url}sysfrm/uploads/icon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="{$app_url}sysfrm/uploads/icon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="{$app_url}sysfrm/uploads/icon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="{$app_url}sysfrm/uploads/icon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="{$app_url}sysfrm/uploads/icon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="{$app_url}sysfrm/uploads/icon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="{$app_url}sysfrm/uploads/icon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="{$app_url}sysfrm/uploads/icon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="{$app_url}sysfrm/uploads/icon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="{$app_url}sysfrm/uploads/icon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{$app_url}sysfrm/uploads/icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="{$app_url}sysfrm/uploads/icon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{$app_url}sysfrm/uploads/icon/favicon-16x16.png">
    <link rel="manifest" href="{$app_url}sysfrm/uploads/icon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{$app_url}sysfrm/uploads/icon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link href="{$_theme}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{$_theme}/lib/fa/css/font-awesome.min.css" rel="stylesheet">
    <link href="{$_theme}/lib/icheck/skins/all.css" rel="stylesheet">
    <link href="{$_theme}/css/animate.css" rel="stylesheet">
    <link href="{$_theme}/css/style.css" rel="stylesheet">
    <link href="{$_theme}/css/custom.css" rel="stylesheet">

    {if $_c['rtl'] eq '1'}
        <link href="{$_theme}/css/bootstrap-rtl.min.css" rel="stylesheet">
        <link href="{$_theme}/css/style-rtl.min.css" rel="stylesheet">
    {/if}

    {if isset($xheader)}
        {$xheader}
    {/if}
    <style type="text/css">
        body {

            background-color: #FAFAFA;
            overflow-x: visible;
        }
        .paper {
            margin: 50px auto;
            width: 980px;
            border: 2px solid #DDD;
            background-color: #FFF;
            position: relative;
            width: 980px;
        }
    </style>
</head>

<body class="fixed-nav">

<div class="paper">
    <section class="panel">
        <div class="panel-body">
            <div class="invoice">
                {if isset($notify)}
                    {$notify}
                {/if}
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

                                {if ($d['status']) neq 'Paid'}
                                    <form class="form-inline" method="post" action="{$_url}client/ipay/{$d['id']}/token_{$d['vtoken']}">

                                        <div class="form-group has-success">
                                            <select class="form-control" name="pg" id="pg">
                                                {foreach $pgs as $pg}
                                                    <option value="{$pg['processor']}">{$pg['name']}</option>
                                                {/foreach}
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-info ml-sm"><i class="fa fa-credit-card"></i> Pay Now</button>
                                    </form>
                                {/if}

                                {*<a href="{$_url}client/ipay/{$d['id']}/token_{$d['vtoken']}" class="btn btn-info ml-sm"><i class="fa fa-credit-card"></i> Pay Now</a>*}

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
            <div class="text-right">

                 <br>
                <a href="{$_url}client/ipdf/{$d['id']}/token_{$d['vtoken']}" class="btn btn-primary ml-sm"><i class="fa fa-print"></i> Download PDF</a>
                <a href="{$_url}iview/print/{$d['id']}/token_{$d['vtoken']}" target="_blank" class="btn btn-primary ml-sm"><i class="fa fa-print"></i> Printable Version</a>
            </div>
        </div>
    </section>

</div>

<!-- Mainly scripts -->
<script src="{$_theme}/js/jquery-1.10.2.js"></script>
<script src="{$_theme}/js/jquery-ui-1.10.4.min.js"></script>
<script src="{$_theme}/js/bootstrap.min.js"></script>
<script src="{$_theme}/js/jquery.metisMenu.js"></script>
<script src="{$_theme}/js/jquery.slimscroll.min.js"></script>
<!-- Custom and plugin javascript -->
<script src="{$_theme}/lib/moment.js"></script>

<script src="{$_theme}/js/app.js"></script>
<script src="{$_theme}/js/pace.min.js"></script>
<script src="{$_theme}/lib/progress.js"></script>
<script src="{$_theme}/lib/bootbox.min.js"></script>

<!-- iCheck -->
<script src="{$_theme}/lib/icheck/icheck.min.js"></script>
{if isset($xfooter)}
    {$xfooter}
{/if}
<script>
    jQuery(document).ready(function() {
        // initiate layout and plugins

        {if isset($xjq)}
        {$xjq}
        {/if}

    });

</script>
</body>

</html>
