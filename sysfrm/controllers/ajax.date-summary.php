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
_auth();
$mdate = $routes['1'];
$mdate = $mdate/1000;
$mdate = date('Y-m-d',$mdate);
$d = ORM::for_table('sys_transactions')->where('date',$mdate)->order_by_desc('id')->find_many();
$dr = ORM::for_table('sys_transactions')->where('date',$mdate)->sum('dr');
if($dr == ''){
    $dr = '0.00';
}
$cr = ORM::for_table('sys_transactions')->where('date',$mdate)->sum('cr');
if($cr == ''){
    $cr = '0.00';
}
?>
<div class="panel-body" style="background: #ffffff; margin-top: 10px;">
<h4>Total Income: <?php echo $cr; ?></h4>
<h4>Total Expense:  <?php echo $dr; ?></h4>

<hr>
<h4>All Transactions at Date -  <?php echo $mdate; ?></h4>
<hr>
<table class="table table-striped table-bordered">

    <th>Account</th>
    <th>Type</th>
    <th>Category</th>
    <th class="text-right">Amount</th>
    <th>Payer</th>
    <th>Payee</th>
    <th>Method</th>
    <th>Ref</th>
    <th>Description</th>
    <th class="text-right">Dr.</th>
    <th class="text-right">Cr.</th>
    <th class="text-right">Balance</th>
<?php

   foreach($d as $ds){
       $cls = '';
       if(($ds['bal']) < 0){
           $cls = 'class="text-red"';
       }
       echo ' <tr>

        <td>'.$ds['account'].'</td>
        <td>'.$ds['type'].'</td>
        <td>'.$ds['category'].'</td>
        <td class="text-right">'.$ds['amount'].'</td>
        <td>'.$ds['payer'].'</td>
        <td>'.$ds['payee'].'</td>
        <td>'.$ds['method'].'</td>
        <td>'.$ds['ref'].'</td>
        <td>'.$ds['description'].'</td>
        <td class="text-right">'.$config['currency_code'].' '.number_format($ds['dr'],2,$config['dec_point'],$config['thousands_sep']).'</td>
        <td class="text-right">'.$config['currency_code'].' '.number_format($ds['cr'],2,$config['dec_point'],$config['thousands_sep']).'</td>
        <td class="text-right"><span '.$cls.'>'.$config['currency_code'].' '.number_format($ds['bal'],2,$config['dec_point'],$config['thousands_sep']).'</span></td>

    </tr>';
   }



?>
</table>
    </div>