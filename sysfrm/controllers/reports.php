<?php
// *************************************************************************
// *                                                                       *
// * iBilling -  Accounting, Billing Software                              *
// * Copyright (c) Sadia Sharmin. All Rights Reserved                      *
// *                                                                       *
// *************************************************************************
// *                                                                       *
// * Email: sadiasharmin3139@gmail.com                                                *
// * Website: http://www.sadiasharmin.com                                  *
// *                                                                       *
// *************************************************************************
// *                                                                       *
// * This software is furnished under a license and may be used and copied *
// * only  in  accordance  with  the  terms  of such  license and with the *
// * inclusion of the above copyright notice.                              *
// * If you Purchased from Codecanyon, Please read the full License from   *
// * here- http://codecanyon.net/licenses/standard                         *
// *                                                                       *
// *************************************************************************
//it will handle all settings
_auth();
$ui->assign('_title', 'Reports- '. $config['CompanyName']);
$ui->assign('_st', 'Reports');
$ui->assign('_sysfrm_menu', 'reports');
$action = $routes['1'];
$user = User::_info();
$ui->assign('user', $user);
$mdate = date('Y-m-d');
$tdate = date('Y-m-d', strtotime('today - 30 days'));

//first day of month
$first_day_month = date('Y-m-01');
//
$this_week_start = date('Y-m-d',strtotime( 'previous sunday'));
// 30 days before
$before_30_days = date('Y-m-d', strtotime('today - 30 days'));
//this month
$month_n = date('n');

switch ($action) {
    case 'statement':

        $d = ORM::for_table('sys_accounts')->find_many();
        $ui->assign('d', $d);

        $ui->assign('mdate', $mdate);
        $ui->assign('tdate', $tdate);
        $ui->assign('xheader', '
<link rel="stylesheet" type="text/css" href="' . $_theme . '/lib/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="' . $_theme . '/lib/dp/dist/datepicker.min.css"/>
');
        $ui->assign('xfooter', '
<script type="text/javascript" src="' . $_theme . '/lib/select2/select2.min.js"></script>
<script type="text/javascript" src="' . $_theme . '/lib/dp/dist/datepicker.min.js"></script>
');
        $ui->assign('xjq', '
 $("#account").select2();
 $("#cats").select2();
  $("#pmethod").select2();
  $("#payer").select2();
$(\'#dp1\').datepicker({
				format: \'yyyy-mm-dd\'
			});
			$(\'#dp2\').datepicker({
				format: \'yyyy-mm-dd\'
			});

 ');
        $ui->display('statement.tpl');


        break;


    case 'statement-view':

        $fdate = _post('fdate');
        $tdate = _post('tdate');
        $account = _post('account');
        $stype = _post('stype');
        $d = ORM::for_table('sys_transactions');
        $d->where('account', $account);
        if($stype == 'credit'){
            $d->where('dr', '0.00');
        }
        elseif($stype == 'debit'){
            $d->where('cr', '0.00');
        }
        else{

        }
        $d->where_gte('date', $fdate);
        $d->where_lte('date', $tdate);
        $d->order_by_desc('id');
        $x =  $d->find_many();

        $ui->assign('d',$x);
        $ui->assign('fdate',$fdate);
        $ui->assign('tdate',$tdate);
        $ui->assign('account',$account);
        $ui->assign('stype',$stype);

        $ui->display('statement-view.tpl');
        break;

    case 'by-date':


        $d = ORM::for_table('sys_transactions')->where('date',$mdate)->order_by_desc('id')->find_many();
        $dr = ORM::for_table('sys_transactions')->where('date',$mdate)->sum('dr');
        if($dr == ''){
            $dr = '0.00';
        }
        $cr = ORM::for_table('sys_transactions')->where('date',$mdate)->sum('cr');
        if($cr == ''){
            $cr = '0.00';
        }
        $ui->assign('d',$d);
        $ui->assign('dr',$dr);
        $ui->assign('cr',$cr);


        $ui->assign('mdate', $mdate);

        $ui->assign('xheader', '
<link rel="stylesheet" type="text/css" href="' . $_theme . '/lib/datepaginator/bootstrap-datepaginator.min.css"/>
<link rel="stylesheet" type="text/css" href="' . $_theme . '/lib/datepaginator/bootstrap-datepicker.css"/>
');
        $ui->assign('xfooter', '
<script type="text/javascript" src="' . $_theme . '/lib/datepaginator/moment.js"></script>
<script type="text/javascript" src="' . $_theme . '/lib/datepaginator/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="' . $_theme . '/lib/datepaginator/bootstrap-datepaginator.min.js"></script>
');

        $ui->assign('xjq', '

  $(\'#dpx\').datepaginator();
   $(\'#dpx\').on(\'selectedDateChanged\', function(event, date) {
  // Your logic goes here
 // alert(date);
 $( "#result" ).html( "<h3>Loading.....</h3>" );
 $(\'#tdate\').text(moment(date).format("dddd, MMMM Do YYYY"));
 $.get( "index.php?_route=ajax.date-summary/" + date, function( data ) {
     $( "#result" ).html( data );
     //alert(date);
 });
});


 ');
        $ui->display('reports-by-date.tpl');


        break;

    case 'income':


        $d = ORM::for_table('sys_transactions')->where('type','Income')->limit(20)->order_by_desc('id')->find_many();
        $ui->assign('d',$d);
        $a = ORM::for_table('sys_transactions')->sum('cr');
        if($a == ''){
            $a = '0.00';
        }
        $ui->assign('a',$a);
        $m = ORM::for_table('sys_transactions')->where_gte('date',$first_day_month)->where_lte('date',$mdate)->sum('cr');
        if($m == ''){
            $m = '0.00';
        }
        $ui->assign('m',$m);

        $w = ORM::for_table('sys_transactions')->where_gte('date',$this_week_start)->where_lte('date',$mdate)->sum('cr');
        if($w == ''){
            $w = '0.00';
        }
        $ui->assign('w',$w);

        $m3 = ORM::for_table('sys_transactions')->where_gte('date',$before_30_days)->where_lte('date',$mdate)->sum('cr');
        if($m3 == ''){
            $m3 = '0.00';
        }
        $ui->assign('m3',$m3);

        $ui->assign('mdate', $mdate);
//generate graph string
        $array = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
        $till = $month_n - 1;
        $gstring = '';
        for ($m=0; $m<=$till; $m++) {
            $mnth = $array[$m];
            $cal = ORM::for_table('sys_transactions')->where_gte('date',date('Y-m-d',strtotime("first day of $mnth")))->where_lte('date',date('Y-m-d',strtotime("last day of $mnth")))->sum('cr');
            $gstring .= '["'.$mnth.'",'.$cal.'], ';

        }
        $gstring = rtrim($gstring,',');

        $ui->assign('xfooter', '
<script type="text/javascript" src="' . $_theme . '/lib/chart/jquery.flot.js"></script>
<script type="text/javascript" src="' . $_theme . '/lib/chart/jquery.flot.resize.min.js"></script>
<script type="text/javascript" src="' . $_theme . '/lib/chart/jquery.flot.categories.js"></script>

');

        $ui->assign('xjq', '

  var data = [ '.$gstring.' ];

		$.plot("#placeholder", [ data ], {
			series: {
				bars: {
					show: true,
					barWidth: 0.6,
					align: "center"
				}
			},
			xaxis: {
				mode: "categories",
				tickLength: 0
			}
		});

 ');
        $ui->display('reports-income.tpl');


        break;


    case 'expense':


        $d = ORM::for_table('sys_transactions')->where('type','Expense')->limit(20)->order_by_desc('id')->find_many();
        $ui->assign('d',$d);
        $a = ORM::for_table('sys_transactions')->sum('dr');
        if($a == ''){
            $a = '0.00';
        }
        $ui->assign('a',$a);
        $m = ORM::for_table('sys_transactions')->where_gte('date',$first_day_month)->where_lte('date',$mdate)->sum('dr');
        if($m == ''){
            $m = '0.00';
        }
        $ui->assign('m',$m);

        $w = ORM::for_table('sys_transactions')->where_gte('date',$this_week_start)->where_lte('date',$mdate)->sum('dr');
        if($w == ''){
            $w = '0.00';
        }
        $ui->assign('w',$w);

        $m3 = ORM::for_table('sys_transactions')->where_gte('date',$before_30_days)->where_lte('date',$mdate)->sum('dr');
        if($m3 == ''){
            $m3 = '0.00';
        }
        $ui->assign('m3',$m3);

        $ui->assign('mdate', $mdate);
//generate graph string
        $array = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
        $till = $month_n - 1;
        $gstring = '';
        for ($m=0; $m<=$till; $m++) {
            $mnth = $array[$m];
            $cal = ORM::for_table('sys_transactions')->where_gte('date',date('Y-m-d',strtotime("first day of $mnth")))->where_lte('date',date('Y-m-d',strtotime("last day of $mnth")))->sum('dr');
            $gstring .= '["'.$mnth.'",'.$cal.'], ';

        }
        $gstring = rtrim($gstring,',');

        $ui->assign('xfooter', '
<script type="text/javascript" src="' . $_theme . '/lib/chart/jquery.flot.js"></script>
<script type="text/javascript" src="' . $_theme . '/lib/chart/jquery.flot.resize.min.js"></script>
<script type="text/javascript" src="' . $_theme . '/lib/chart/jquery.flot.categories.js"></script>

');

        $ui->assign('xjq', '

  var data = [ '.$gstring.' ];

		$.plot("#placeholder", [ data ], {
			series: {
				bars: {
					show: true,
					barWidth: 0.6,
					align: "center"
				}
			},
			xaxis: {
				mode: "categories",
				tickLength: 0
			}
		});

 ');
        $ui->display('reports-expense.tpl');


        break;


    case 'income-vs-expense':

        $ai = ORM::for_table('sys_transactions')->sum('cr');
        if($ai == ''){
            $ai = '0.00';
        }
        $ui->assign('ai',$ai);
        $mi = ORM::for_table('sys_transactions')->where_gte('date',$first_day_month)->where_lte('date',$mdate)->sum('cr');
        if($mi == ''){
            $mi = '0.00';
        }
        $ui->assign('mi',$mi);

        $wi = ORM::for_table('sys_transactions')->where_gte('date',$this_week_start)->where_lte('date',$mdate)->sum('cr');
        if($wi == ''){
            $wi = '0.00';
        }
        $ui->assign('wi',$wi);

        $m3i = ORM::for_table('sys_transactions')->where_gte('date',$before_30_days)->where_lte('date',$mdate)->sum('cr');
        if($m3i == ''){
            $m3i = '0.00';
        }
        $ui->assign('m3i',$m3i);

        $ae = ORM::for_table('sys_transactions')->sum('dr');
        if($ae == ''){
            $ae = '0.00';
        }
        $ui->assign('ae',$ae);
        $me = ORM::for_table('sys_transactions')->where_gte('date',$first_day_month)->where_lte('date',$mdate)->sum('dr');
        if($me == ''){
            $me = '0.00';
        }
        $ui->assign('me',$me);





        $ui->assign('mdate', $mdate);
        $aime = $ai-$ae;
        $ui->assign('aime', $aime);
        $mime = $mi-$me;
        $ui->assign('mime', $mime);
//generate graph string
        $array = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
        $till = $month_n - 1;
        $gstring = '';
        $egstring = '';
        for ($m=0; $m<=$till; $m++) {
            $mnth = $array[$m];
            $cal = ORM::for_table('sys_transactions')->where_gte('date',date('Y-m-d',strtotime("first day of $mnth")))->where_lte('date',date('Y-m-d',strtotime("last day of $mnth")))->sum('dr');
            $egstring .= '["'.$m.'",'.$cal.'], ';
            $cal = ORM::for_table('sys_transactions')->where_gte('date',date('Y-m-d',strtotime("first day of $mnth")))->where_lte('date',date('Y-m-d',strtotime("last day of $mnth")))->sum('cr');
            $gstring .= '["'.$m.'",'.$cal.'], ';

        }
        $gstring = rtrim($gstring,',');

        $ui->assign('xfooter', '
<script type="text/javascript" src="' . $_theme . '/lib/chart/jquery.flot.js"></script>
<script type="text/javascript" src="' . $_theme . '/lib/chart/jquery.flot.resize.min.js"></script>
<script type="text/javascript" src="' . $_theme . '/lib/chart/jquery.flot.categories.js"></script>

');

        $ui->assign('xjq', '



		var d1 = [ '.$gstring.' ];
		var d2 = [ '.$egstring.' ];



		$.plot("#placeholder", [{
			data: d1,
			lines: { show: true, fill: true }
		},  {
			data: d2,
			lines: { show: true, fill: true }
		}]);

 ');
        $ui->display('reports-income-vs-expense.tpl');


        break;

    case 'categories':

        $d = ORM::for_table('sys_cats')->find_many();
        $ui->assign('d', $d);

        $ui->assign('mdate', $mdate);
        $ui->assign('tdate', $tdate);
        $ui->assign('xheader', '
<link rel="stylesheet" type="text/css" href="' . $_theme . '/lib/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="' . $_theme . '/lib/datepicker/css/datepicker.css"/>
');
        $ui->assign('xfooter', '
<script type="text/javascript" src="' . $_theme . '/lib/select2/select2.min.js"></script>
<script type="text/javascript" src="' . $_theme . '/lib/datepicker/js/bootstrap-datepicker.js"></script>
');
        $ui->assign('xjq', '

 $("#cat").select2();

$(\'#dp1\').datepicker({
				format: \'yyyy-mm-dd\'
			});
			$(\'#dp2\').datepicker({
				format: \'yyyy-mm-dd\'
			});

 ');
        $ui->display('reports-categories.tpl');


        break;


    case 'category-view':

        $fdate = _post('fdate');
        $tdate = _post('tdate');
        $cat = _post('cat');

        $d = ORM::for_table('sys_transactions');
        $d->where('category', $cat);

        $d->where_gte('date', $fdate);
        $d->where_lte('date', $tdate);
        $d->order_by_desc('id');
        $x =  $d->find_many();

        $ui->assign('d',$x);
        $ui->assign('fdate',$fdate);
        $ui->assign('tdate',$tdate);


        $ui->display('report-common.tpl');
        break;

    case 'payees':

        $d = ORM::for_table('sys_payee')->find_many();
        $ui->assign('d', $d);

        $ui->assign('mdate', $mdate);
        $ui->assign('tdate', $tdate);
        $ui->assign('xheader', '
<link rel="stylesheet" type="text/css" href="' . $_theme . '/lib/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="' . $_theme . '/lib/datepicker/css/datepicker.css"/>
');
        $ui->assign('xfooter', '
<script type="text/javascript" src="' . $_theme . '/lib/select2/select2.min.js"></script>
<script type="text/javascript" src="' . $_theme . '/lib/datepicker/js/bootstrap-datepicker.js"></script>
');
        $ui->assign('xjq', '

 $("#payee").select2();

$(\'#dp1\').datepicker({
				format: \'yyyy-mm-dd\'
			});
			$(\'#dp2\').datepicker({
				format: \'yyyy-mm-dd\'
			});

 ');
        $ui->display('reports-payees.tpl');


        break;


    case 'payees-view':

        $fdate = _post('fdate');
        $tdate = _post('tdate');
        $payee = _post('payee');

        $d = ORM::for_table('sys_transactions');
        $d->where('payee', $payee);

        $d->where_gte('date', $fdate);
        $d->where_lte('date', $tdate);
        $d->order_by_desc('id');
        $x =  $d->find_many();

        $ui->assign('d',$x);
        $ui->assign('fdate',$fdate);
        $ui->assign('tdate',$tdate);


        $ui->display('report-common.tpl');
        break;

    case 'payers':

        $d = ORM::for_table('sys_payers')->find_many();
        $ui->assign('d', $d);

        $ui->assign('mdate', $mdate);
        $ui->assign('tdate', $tdate);
        $ui->assign('xheader', '
<link rel="stylesheet" type="text/css" href="' . $_theme . '/lib/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="' . $_theme . '/lib/datepicker/css/datepicker.css"/>
');
        $ui->assign('xfooter', '
<script type="text/javascript" src="' . $_theme . '/lib/select2/select2.min.js"></script>
<script type="text/javascript" src="' . $_theme . '/lib/datepicker/js/bootstrap-datepicker.js"></script>
');
        $ui->assign('xjq', '

 $("#payer").select2();

$(\'#dp1\').datepicker({
				format: \'yyyy-mm-dd\'
			});
			$(\'#dp2\').datepicker({
				format: \'yyyy-mm-dd\'
			});

 ');
        $ui->display('reports-payers.tpl');


        break;


    case 'payer-view':

        $fdate = _post('fdate');
        $tdate = _post('tdate');
        $payer = _post('payer');

        $d = ORM::for_table('sys_transactions');
        $d->where('payer', $payer);

        $d->where_gte('date', $fdate);
        $d->where_lte('date', $tdate);
        $d->order_by_desc('id');
        $x =  $d->find_many();

        $ui->assign('d',$x);
        $ui->assign('fdate',$fdate);
        $ui->assign('tdate',$tdate);


        $ui->display('report-common.tpl');
        break;

    default:
        echo 'action not defined';
}
/*
 *
 *
 *
 *
 */
/*
$mdate = date('Y-m-d');
$tdate = date('Y-m-d', strtotime('today - 30 days'));

//first day of month
$first_day_month = date('Y-m-01');
//
$this_week_start = date('Y-m-d',strtotime( 'previous sunday'));
// 30 days before
$before_30_days = date('Y-m-d', strtotime('today - 30 days'));
//this month
$month_n = date('n');

switch ($action) {
    case 'statement':

        $d = ORM::for_table('sys_accounts')->find_many();
        $ui->assign('d', $d);

        $ui->assign('mdate', $mdate);
        $ui->assign('tdate', $tdate);
        $ui->assign('xheader', '
<link rel="stylesheet" type="text/css" href="' . $_theme . '/lib/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="' . $_theme . '/lib/dp/dist/datepicker.min.css"/>
');
        $ui->assign('xfooter', '
<script type="text/javascript" src="' . $_theme . '/lib/select2/select2.min.js"></script>
<script type="text/javascript" src="' . $_theme . '/lib/dp/dist/datepicker.min.js"></script>
');
        $ui->assign('xjq', '
 $("#account").select2();
 $("#cats").select2();
  $("#pmethod").select2();
  $("#payer").select2();
$(\'#dp1\').datepicker({
				format: \'yyyy-mm-dd\'
			});
			$(\'#dp2\').datepicker({
				format: \'yyyy-mm-dd\'
			});

 ');
        $ui->display('statement.tpl');


        break;


    case 'statement-view':
$fdate = _post('fdate');
$tdate = _post('tdate');
$account = _post('account');
if($account == ''){
    r2(U.'reports/statement','e','Please choose an Account');
}
$stype = _post('stype');
        $d = ORM::for_table('sys_transactions');
        $d->where('account', $account);
if($stype == 'credit'){
    $d->where('dr', '0.00');
}
elseif($stype == 'debit'){
    $d->where('cr', '0.00');
}
else{

}
        $d->where_gte('date', $fdate);
        $d->where_lte('date', $tdate);
        $d->order_by_desc('id');
        $x =  $d->find_many();

        $ui->assign('d',$x);
        $ui->assign('fdate',$fdate);
        $ui->assign('tdate',$tdate);
        $ui->assign('account',$account);
        $ui->assign('stype',$stype);

        $ui->display('statement-view.tpl');
        break;

    case 'by-date':


        $d = ORM::for_table('sys_transactions')->where('date',$mdate)->order_by_desc('id')->find_many();
        $dr = ORM::for_table('sys_transactions')->where('date',$mdate)->sum('dr');
        if($dr == ''){
            $dr = '0.00';
        }
        $cr = ORM::for_table('sys_transactions')->where('date',$mdate)->sum('cr');
        if($cr == ''){
            $cr = '0.00';
        }
        $ui->assign('d',$d);
        $ui->assign('dr',$dr);
        $ui->assign('cr',$cr);


        $ui->assign('mdate', $mdate);

        $ui->assign('xheader', '
<link rel="stylesheet" type="text/css" href="' . $_theme . '/lib/datepaginator/bootstrap-datepaginator.min.css"/>
<link rel="stylesheet" type="text/css" href="' . $_theme . '/lib/datepaginator/bootstrap-datepicker.css"/>
');
        $ui->assign('xfooter', '
<script type="text/javascript" src="' . $_theme . '/lib/datepaginator/moment.js"></script>
<script type="text/javascript" src="' . $_theme . '/lib/datepaginator/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="' . $_theme . '/lib/datepaginator/bootstrap-datepaginator.min.js"></script>
');

        $ui->assign('xjq', '

  $(\'#dpx\').datepaginator();
   $(\'#dpx\').on(\'selectedDateChanged\', function(event, date) {
  // Your logic goes here
 // alert(date);
 $( "#result" ).html( "<h3>Loading.....</h3>" );
 $(\'#tdate\').text(moment(date).format("dddd, MMMM Do YYYY"));
 $.get( "index.php?_route=ajax.date-summary/" + date, function( data ) {
     $( "#result" ).html( data );
     //alert(date);
 });
});


 ');
        $ui->display('reports-by-date.tpl');


        break;

    case 'income':


        $d = ORM::for_table('sys_transactions')->where('type','Income')->limit(20)->order_by_desc('id')->find_many();
        $ui->assign('d',$d);
        $a = ORM::for_table('sys_transactions')->sum('cr');
        if($a == ''){
            $a = '0.00';
        }
        $ui->assign('a',$a);
        $m = ORM::for_table('sys_transactions')->where_gte('date',$first_day_month)->where_lte('date',$mdate)->sum('cr');
        if($m == ''){
            $m = '0.00';
        }
        $ui->assign('m',$m);

        $w = ORM::for_table('sys_transactions')->where_gte('date',$this_week_start)->where_lte('date',$mdate)->sum('cr');
        if($w == ''){
            $w = '0.00';
        }
        $ui->assign('w',$w);

        $m3 = ORM::for_table('sys_transactions')->where_gte('date',$before_30_days)->where_lte('date',$mdate)->sum('cr');
        if($m3 == ''){
            $m3 = '0.00';
        }
        $ui->assign('m3',$m3);

        $ui->assign('mdate', $mdate);
//generate graph string
        $array = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
        $till = $month_n - 1;
        $gstring = '';
for ($m=0; $m<=$till; $m++) {
    $mnth = $array[$m];
    $cal = ORM::for_table('sys_transactions')->where_gte('date',date('Y-m-d',strtotime("first day of $mnth")))->where_lte('date',date('Y-m-d',strtotime("last day of $mnth")))->sum('cr');
    $gstring .= '["'.$mnth.'",'.$cal.'], ';

}
        $gstring = rtrim($gstring,',');

        $ui->assign('xfooter', '
<script type="text/javascript" src="' . $_theme . '/lib/chart/jquery.flot.js"></script>
<script type="text/javascript" src="' . $_theme . '/lib/chart/jquery.flot.resize.min.js"></script>
<script type="text/javascript" src="' . $_theme . '/lib/chart/jquery.flot.categories.js"></script>

');

        $ui->assign('xjq', '

  var data = [ '.$gstring.' ];

		$.plot("#placeholder", [ data ], {
			series: {
				bars: {
					show: true,
					barWidth: 0.6,
					align: "center"
				}
			},
			xaxis: {
				mode: "categories",
				tickLength: 0
			}
		});

 ');
        $ui->display('reports-income.tpl');


        break;


    case 'expense':


        $d = ORM::for_table('sys_transactions')->where('type','Expense')->limit(20)->order_by_desc('id')->find_many();
        $ui->assign('d',$d);
        $a = ORM::for_table('sys_transactions')->sum('dr');
        if($a == ''){
            $a = '0.00';
        }
        $ui->assign('a',$a);
        $m = ORM::for_table('sys_transactions')->where_gte('date',$first_day_month)->where_lte('date',$mdate)->sum('dr');
        if($m == ''){
            $m = '0.00';
        }
        $ui->assign('m',$m);

        $w = ORM::for_table('sys_transactions')->where_gte('date',$this_week_start)->where_lte('date',$mdate)->sum('dr');
        if($w == ''){
            $w = '0.00';
        }
        $ui->assign('w',$w);

        $m3 = ORM::for_table('sys_transactions')->where_gte('date',$before_30_days)->where_lte('date',$mdate)->sum('dr');
        if($m3 == ''){
            $m3 = '0.00';
        }
        $ui->assign('m3',$m3);

        $ui->assign('mdate', $mdate);
//generate graph string
        $array = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
        $till = $month_n - 1;
        $gstring = '';
        for ($m=0; $m<=$till; $m++) {
            $mnth = $array[$m];
            $cal = ORM::for_table('sys_transactions')->where_gte('date',date('Y-m-d',strtotime("first day of $mnth")))->where_lte('date',date('Y-m-d',strtotime("last day of $mnth")))->sum('dr');
            $gstring .= '["'.$mnth.'",'.$cal.'], ';

        }
        $gstring = rtrim($gstring,',');

        $ui->assign('xfooter', '
<script type="text/javascript" src="' . $_theme . '/lib/chart/jquery.flot.js"></script>
<script type="text/javascript" src="' . $_theme . '/lib/chart/jquery.flot.resize.min.js"></script>
<script type="text/javascript" src="' . $_theme . '/lib/chart/jquery.flot.categories.js"></script>

');

        $ui->assign('xjq', '

  var data = [ '.$gstring.' ];

		$.plot("#placeholder", [ data ], {
			series: {
				bars: {
					show: true,
					barWidth: 0.6,
					align: "center"
				}
			},
			xaxis: {
				mode: "categories",
				tickLength: 0
			}
		});

 ');
        $ui->display('reports-expense.tpl');


        break;


    case 'income-vs-expense':

        $ai = ORM::for_table('sys_transactions')->sum('cr');
        if($ai == ''){
            $ai = '0.00';
        }
        $ui->assign('ai',$ai);
        $mi = ORM::for_table('sys_transactions')->where_gte('date',$first_day_month)->where_lte('date',$mdate)->sum('cr');
        if($mi == ''){
            $mi = '0.00';
        }
        $ui->assign('mi',$mi);

        $wi = ORM::for_table('sys_transactions')->where_gte('date',$this_week_start)->where_lte('date',$mdate)->sum('cr');
        if($wi == ''){
            $wi = '0.00';
        }
        $ui->assign('wi',$wi);

        $m3i = ORM::for_table('sys_transactions')->where_gte('date',$before_30_days)->where_lte('date',$mdate)->sum('cr');
        if($m3i == ''){
            $m3i = '0.00';
        }
        $ui->assign('m3i',$m3i);

        $ae = ORM::for_table('sys_transactions')->sum('dr');
        if($ae == ''){
            $ae = '0.00';
        }
        $ui->assign('ae',$ae);
        $me = ORM::for_table('sys_transactions')->where_gte('date',$first_day_month)->where_lte('date',$mdate)->sum('dr');
        if($me == ''){
            $me = '0.00';
        }
        $ui->assign('me',$me);





        $ui->assign('mdate', $mdate);
        $aime = $ai-$ae;
        $ui->assign('aime', $aime);
        $mime = $mi-$me;
        $ui->assign('mime', $mime);
//generate graph string
        $array = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
        $till = $month_n - 1;
        $gstring = '';
        $egstring = '';
        for ($m=0; $m<=$till; $m++) {
            $mnth = $array[$m];
            $cal = ORM::for_table('sys_transactions')->where_gte('date',date('Y-m-d',strtotime("first day of $mnth")))->where_lte('date',date('Y-m-d',strtotime("last day of $mnth")))->sum('dr');
            $egstring .= '["'.$m.'",'.$cal.'], ';
            $cal = ORM::for_table('sys_transactions')->where_gte('date',date('Y-m-d',strtotime("first day of $mnth")))->where_lte('date',date('Y-m-d',strtotime("last day of $mnth")))->sum('cr');
            $gstring .= '["'.$m.'",'.$cal.'], ';

        }
        $gstring = rtrim($gstring,',');

        $ui->assign('xfooter', '
<script type="text/javascript" src="' . $_theme . '/lib/chart/jquery.flot.js"></script>
<script type="text/javascript" src="' . $_theme . '/lib/chart/jquery.flot.resize.min.js"></script>
<script type="text/javascript" src="' . $_theme . '/lib/chart/jquery.flot.categories.js"></script>

');

        $ui->assign('xjq', '



		var d1 = [ '.$gstring.' ];
		var d2 = [ '.$egstring.' ];



		$.plot("#placeholder", [{
			data: d1,
			lines: { show: true, fill: true }
		},  {
			data: d2,
			lines: { show: true, fill: true }
		}]);

 ');
        $ui->display('reports-income-vs-expense.tpl');


        break;

    default:
        echo 'action not defined';
}

*/