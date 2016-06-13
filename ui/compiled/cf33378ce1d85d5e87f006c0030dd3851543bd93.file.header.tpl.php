<?php /* Smarty version Smarty-3.1.13, created on 2015-04-07 20:50:16
         compiled from "ui/theme/softhash/sections/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:113404172955247b48e21347-17521221%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cf33378ce1d85d5e87f006c0030dd3851543bd93' => 
    array (
      0 => 'ui/theme/softhash/sections/header.tpl',
      1 => 1428452958,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '113404172955247b48e21347-17521221',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_title' => 0,
    'app_url' => 0,
    '_theme' => 0,
    '_c' => 0,
    'xheader' => 0,
    '_sysfrm_menu' => 0,
    '_url' => 0,
    '_L' => 0,
    '_pls' => 0,
    '_pl' => 0,
    'user' => 0,
    '_st' => 0,
    'notify' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55247b49002565_77148261',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55247b49002565_77148261')) {function content_55247b49002565_77148261($_smarty_tpl) {?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $_smarty_tpl->tpl_vars['_title']->value;?>
</title>
    <link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
sysfrm/uploads/icon/favicon.ico" type="image/x-icon" />

    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
sysfrm/uploads/icon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
sysfrm/uploads/icon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
sysfrm/uploads/icon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
sysfrm/uploads/icon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
sysfrm/uploads/icon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
sysfrm/uploads/icon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
sysfrm/uploads/icon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
sysfrm/uploads/icon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
sysfrm/uploads/icon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
sysfrm/uploads/icon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
sysfrm/uploads/icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
sysfrm/uploads/icon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
sysfrm/uploads/icon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
sysfrm/uploads/icon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
sysfrm/uploads/icon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <link href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/lib/fa/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/lib/icheck/skins/all.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/css/animate.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/css/style.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/css/custom.css" rel="stylesheet">

    <?php if ($_smarty_tpl->tpl_vars['_c']->value['rtl']=='1'){?>
        <link href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/css/bootstrap-rtl.min.css" rel="stylesheet">
        <link href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/css/style-rtl.min.css" rel="stylesheet">
    <?php }?>

    <?php if (isset($_smarty_tpl->tpl_vars['xheader']->value)){?>
        <?php echo $_smarty_tpl->tpl_vars['xheader']->value;?>

    <?php }?>
</head>

<body class="fixed-nav">

<div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="side-menu">


                <li <?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu']->value=='dashboard'){?>class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['_c']->value['redirect_url'];?>
/"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a></li>
                <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu']->value=='contacts'){?>active<?php }?>">
                    <a href="#"><i class="fa fa-building-o"></i> <span class="nav-label">CRM</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
contacts/add/">Add Contact</a></li>

                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
contacts/list/">List Contacts</a></li>

                    </ul>
                </li>
                <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu']->value=='transactions'){?>active<?php }?>">
                    <a href="#"><i class="fa fa-database"></i> <span class="nav-label">Transactions</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
transactions/deposit/">New Deposit</a></li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
transactions/expense/">New Expense</a></li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
transactions/transfer/">Transfer</a></li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
transactions/list/">View Transactions</a></li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
generate/balance-sheet/">Balance Sheet</a></li>
                    </ul>
                </li>
                
                <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu']->value=='invoices'){?>active<?php }?>">
                    <a href="#"><i class="fa fa-shopping-cart"></i> <span class="nav-label">Sales</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
invoices/list/">Invoices</a></li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
invoices/add/">New Invoice</a></li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
invoices/list-recurring/">Recurring Invoices</a></li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
invoices/add/recurring/">New Recurring Invoice</a></li>




                    </ul>
                </li>



                


                <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu']->value=='accounts'){?>active<?php }?>">
                    <a href="#"><i class="fa fa-building-o"></i> <span class="nav-label">Bank &amp; Cash</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
accounts/add/">New Account</a></li>

                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
accounts/list/">List Accounts</a></li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
accounts/balances/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Account_Balances'];?>
</a></li>

                    </ul>
                </li>
                <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu']->value=='ps'){?>active<?php }?>">
                    <a href="#"><i class="fa fa-cube"></i> <span class="nav-label">Products &amp; Services</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
ps/p-list/">Products</a></li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
ps/p-new/">New Product</a></li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
ps/s-list/">Services</a></li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
ps/s-new/">New Service</a></li>


                    </ul>
                </li>


<?php  $_smarty_tpl->tpl_vars['_pl'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_pl']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_pls']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_pl']->key => $_smarty_tpl->tpl_vars['_pl']->value){
$_smarty_tpl->tpl_vars['_pl']->_loop = true;
?>
    <li <?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu']->value==($_smarty_tpl->tpl_vars['_pl']->value['c'])){?>class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
plugins/<?php echo $_smarty_tpl->tpl_vars['_pl']->value['url'];?>
/"><i class="<?php echo $_smarty_tpl->tpl_vars['_pl']->value['icon'];?>
"></i> <span class="nav-label"><?php echo $_smarty_tpl->tpl_vars['_pl']->value['name'];?>
</span></a></li>
<?php } ?>


                
                    
                    
                        
                        
                        
                        


                    
                



                <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu']->value=='reports'){?>active<?php }?>">
                    <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Reports </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
reports/statement/">Account Statement</a></li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
reports/by-date/">Reports by Date</a></li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
reports/income/">Income Reports</a></li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
reports/expense/">Expense Reports</a></li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
reports/income-vs-expense/">Income Vs Expense</a></li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
transactions/list-income/">All Income</a></li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
transactions/list-expense/">All Expense</a></li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
transactions/list/">All Transactions</a></li>

                    </ul>
                </li>

                <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu']->value=='util'){?>active<?php }?>">
                    <a href="#"><i class="fa fa-bars"></i> <span class="nav-label">Utilities </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
util/activity/">Activity Log</a></li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
util/sent-emails/">Email Message Log</a></li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
util/dbstatus/">Database Status</a></li>


                    </ul>
                </li>

                <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu']->value=='my_account'){?>active<?php }?>">
                    <a href="#"><i class="fa fa-user"></i> <span class="nav-label">My Account </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">

                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/users-edit/<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
/">Edit Profile</a></li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/change-password/">Change Password</a></li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
logout/">Logout</a></li>



                    </ul>
                </li>

                <?php if (($_smarty_tpl->tpl_vars['user']->value['user_type'])=='Admin'){?>
                    <li class="<?php if ($_smarty_tpl->tpl_vars['_sysfrm_menu']->value=='settings'){?>active<?php }?>">
                        <a href="#"><i class="fa fa-cogs"></i> <span class="nav-label">Settings </span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/app/">General Settings</a></li>
                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/localisation/">Localisation</a></li>
                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/users/">Manage Users</a></li>
                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/pg/">Payment Gateways</a></li>

                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/expense-categories/">Expense Categories</a></li>
                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/income-categories/">Income Categories</a></li>
                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/tags/">Manage Tags</a></li>
                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/pmethods/">Payment Methods</a></li>
                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
tax/list/">Sales Taxes</a></li>

                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/emls/">Email Settings</a></li>
                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/email-templates/">Email Templates</a></li>
                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/automation/">Automation Settings</a></li>
                            



                        </ul>
                    </li>
                    <?php }?>


            </ul>

        </div>
    </nav>
    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <nav class="navbar navbar-fixed-top white-bg" role="navigation" style="margin-bottom: 0">

                <img class="logo" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
sysfrm/uploads/system/logo.png" alt="Logo">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-dedent"></i> </a>

                </div>
                <ul class="nav navbar-top-links navbar-right hidden-xs">

                    
                        
                            
                        
                        
                            
                                
                                    
                                        
                                        
                                    
                                
                            
                            


                        
                    



                    <li>
                        <div class="btn-group mr10">
                            <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle"><span class="">Welcome <?php echo $_smarty_tpl->tpl_vars['user']->value['fullname'];?>
!</span> <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/users-edit/<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
/">Edit Profile</a></li>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/change-password/">Change Password</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
logout/">Logout</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
logout">
                            <i class="fa fa-power-off"></i>
                        </a>

                    </li>
                </ul>

            </nav>
        </div>

        <div class="row wrapper border-bottom mat-bg page-heading">
            <div class="col-lg-12">
                <h2 style="color: #ffffff; font-size: 16px; font-weight: 400; margin-top: 18px"><?php echo $_smarty_tpl->tpl_vars['_st']->value;?>
</h2>

            </div>

        </div>

        <div class="wrapper wrapper-content">
            <?php if (isset($_smarty_tpl->tpl_vars['notify']->value)){?>
            <?php echo $_smarty_tpl->tpl_vars['notify']->value;?>

<?php }?><?php }} ?>