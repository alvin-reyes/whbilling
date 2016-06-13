<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{$_title}</title>
    <link rel="shortcut icon" href="{$app_url}sysfrm/uploads/icon/favicon.ico" type="image/x-icon" />

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
</head>

<body class="fixed-nav">

<div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="side-menu">


                <li {if $_sysfrm_menu eq 'dashboard'}class="active"{/if}><a href="{$_url}{$_c['redirect_url']}/"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a></li>
                <li class="{if $_sysfrm_menu eq 'contacts'}active{/if}">
                    <a href="#"><i class="fa fa-building-o"></i> <span class="nav-label">CRM</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="{$_url}contacts/add/">Add Contact</a></li>

                        <li><a href="{$_url}contacts/list/">List Contacts</a></li>

                    </ul>
                </li>
                <li class="{if $_sysfrm_menu eq 'transactions'}active{/if}">
                    <a href="#"><i class="fa fa-database"></i> <span class="nav-label">Transactions</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="{$_url}transactions/deposit/">New Deposit</a></li>
                        <li><a href="{$_url}transactions/expense/">New Expense</a></li>
                        <li><a href="{$_url}transactions/transfer/">Transfer</a></li>
                        <li><a href="{$_url}transactions/list/">View Transactions</a></li>
                        <li><a href="{$_url}generate/balance-sheet/">Balance Sheet</a></li>
                    </ul>
                </li>
                {*<li {if $_sysfrm_menu eq 'tasks'}class="active"{/if}><a href="{$_url}tasks/me"><i class="fa fa-tasks"></i> <span class="nav-label">Tasks</span></a></li>*}
                <li class="{if $_sysfrm_menu eq 'invoices'}active{/if}">
                    <a href="#"><i class="fa fa-shopping-cart"></i> <span class="nav-label">Sales</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="{$_url}invoices/list/">Invoices</a></li>
                        <li><a href="{$_url}invoices/add/">New Invoice</a></li>
                        <li><a href="{$_url}invoices/list-recurring/">Recurring Invoices</a></li>
                        <li><a href="{$_url}invoices/add/recurring/">New Recurring Invoice</a></li>




                    </ul>
                </li>



                {*<li {if $_sysfrm_menu eq 'flmcs'}class="active"{/if}><a href="{$_url}plugins/flmcs/init/list-services/"><i class="fa fa-paper-plane-o"></i> <span class="nav-label">FLMCS</span></a></li>*}


                <li class="{if $_sysfrm_menu eq 'accounts'}active{/if}">
                    <a href="#"><i class="fa fa-building-o"></i> <span class="nav-label">Bank &amp; Cash</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="{$_url}accounts/add/">New Account</a></li>

                        <li><a href="{$_url}accounts/list/">List Accounts</a></li>
                        <li><a href="{$_url}accounts/balances/">{$_L['Account_Balances']}</a></li>

                    </ul>
                </li>
                <li class="{if $_sysfrm_menu eq 'ps'}active{/if}">
                    <a href="#"><i class="fa fa-cube"></i> <span class="nav-label">Products &amp; Services</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="{$_url}ps/p-list/">Products</a></li>
                        <li><a href="{$_url}ps/p-new/">New Product</a></li>
                        <li><a href="{$_url}ps/s-list/">Services</a></li>
                        <li><a href="{$_url}ps/s-new/">New Service</a></li>


                    </ul>
                </li>


{foreach $_pls as $_pl}
    <li {if $_sysfrm_menu eq ($_pl['c'])}class="active"{/if}><a href="{$_url}plugins/{$_pl['url']}/"><i class="{$_pl['icon']}"></i> <span class="nav-label">{$_pl['name']}</span></a></li>
{/foreach}


                {*<li class="{if $_sysfrm_menu eq 'repeating'}active{/if}">*}
                    {*<a href="#"><i class="fa fa-calendar"></i> <span class="nav-label">Recurring</span><span class="fa arrow"></span></a>*}
                    {*<ul class="nav nav-second-level">*}
                        {*<li><a href="{$_url}repeating/income/">Repeating Income</a></li>*}
                        {*<li><a href="{$_url}repeating/expense/">Repeating Expense</a></li>*}
                        {*<li><a href="{$_url}repeating/income-calendar/">Income Calendar</a></li>*}
                        {*<li><a href="{$_url}repeating/expense-calendar/">Expense Calendar</a></li>*}


                    {*</ul>*}
                {*</li>*}



                <li class="{if $_sysfrm_menu eq 'reports'}active{/if}">
                    <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Reports </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="{$_url}reports/statement/">Account Statement</a></li>
                        <li><a href="{$_url}reports/by-date/">Reports by Date</a></li>
                        <li><a href="{$_url}reports/income/">Income Reports</a></li>
                        <li><a href="{$_url}reports/expense/">Expense Reports</a></li>
                        <li><a href="{$_url}reports/income-vs-expense/">Income Vs Expense</a></li>
                        <li><a href="{$_url}transactions/list-income/">All Income</a></li>
                        <li><a href="{$_url}transactions/list-expense/">All Expense</a></li>
                        <li><a href="{$_url}transactions/list/">All Transactions</a></li>

                    </ul>
                </li>

                <li class="{if $_sysfrm_menu eq 'util'}active{/if}">
                    <a href="#"><i class="fa fa-bars"></i> <span class="nav-label">Utilities </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="{$_url}util/activity/">Activity Log</a></li>
                        <li><a href="{$_url}util/sent-emails/">Email Message Log</a></li>
                        <li><a href="{$_url}util/dbstatus/">Database Status</a></li>


                    </ul>
                </li>

                <li class="{if $_sysfrm_menu eq 'my_account'}active{/if}">
                    <a href="#"><i class="fa fa-user"></i> <span class="nav-label">My Account </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">

                        <li><a href="{$_url}settings/users-edit/{$user['id']}/">Edit Profile</a></li>
                        <li><a href="{$_url}settings/change-password/">Change Password</a></li>
                        <li><a href="{$_url}logout/">Logout</a></li>



                    </ul>
                </li>

                {if ($user['user_type']) eq 'Admin'}
                    <li class="{if $_sysfrm_menu eq 'settings'}active{/if}">
                        <a href="#"><i class="fa fa-cogs"></i> <span class="nav-label">Settings </span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="{$_url}settings/app/">General Settings</a></li>
                            <li><a href="{$_url}settings/localisation/">Localisation</a></li>
                            <li><a href="{$_url}settings/users/">Manage Users</a></li>
                            <li><a href="{$_url}settings/pg/">Payment Gateways</a></li>

                            <li><a href="{$_url}settings/expense-categories/">Expense Categories</a></li>
                            <li><a href="{$_url}settings/income-categories/">Income Categories</a></li>
                            <li><a href="{$_url}settings/tags/">Manage Tags</a></li>
                            <li><a href="{$_url}settings/pmethods/">Payment Methods</a></li>
                            <li><a href="{$_url}tax/list/">Sales Taxes</a></li>

                            <li><a href="{$_url}settings/emls/">Email Settings</a></li>
                            <li><a href="{$_url}settings/email-templates/">Email Templates</a></li>
                            <li><a href="{$_url}settings/automation/">Automation Settings</a></li>
                            {*<li><a href="{$_url}settings/features/">Choose Features</a></li>*}



                        </ul>
                    </li>
                    {/if}


            </ul>

        </div>
    </nav>
    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <nav class="navbar navbar-fixed-top white-bg" role="navigation" style="margin-bottom: 0">

                <img class="logo" src="{$app_url}sysfrm/uploads/system/logo.png" alt="Logo">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-dedent"></i> </a>

                </div>
                <ul class="nav navbar-top-links navbar-right hidden-xs">

                    {*<li class="dropdown">*}
                        {*<a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">*}
                            {*<i class="fa fa-envelope"></i>  <span class="label label-danger">14</span>*}
                        {*</a>*}
                        {*<ul class="dropdown-menu dropdown-alerts">*}
                            {*<li>*}
                                {*<a href="mailbox.html">*}
                                    {*<div>*}
                                        {*<i class="fa fa-envelope fa-fw"></i> You have 14 messages*}
                                        {*<span class="pull-right text-muted small">11 minutes ago</span>*}
                                    {*</div>*}
                                {*</a>*}
                            {*</li>*}
                            {*<li class="divider"></li>*}


                        {*</ul>*}
                    {*</li>*}



                    <li>
                        <div class="btn-group mr10">
                            <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle"><span class="">Welcome {$user['fullname']}!</span> <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="{$_url}settings/users-edit/{$user['id']}/">Edit Profile</a></li>
                                <li><a href="{$_url}settings/change-password/">Change Password</a></li>
                                <li class="divider"></li>
                                <li><a href="{$_url}logout/">Logout</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="{$_url}logout">
                            <i class="fa fa-power-off"></i>
                        </a>

                    </li>
                </ul>

            </nav>
        </div>

        <div class="row wrapper border-bottom mat-bg page-heading">
            <div class="col-lg-12">
                <h2 style="color: #ffffff; font-size: 16px; font-weight: 400; margin-top: 18px">{$_st}</h2>

            </div>

        </div>

        <div class="wrapper wrapper-content">
            {if isset($notify)}
            {$notify}
{/if}