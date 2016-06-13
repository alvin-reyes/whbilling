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
$ui->assign('_title', 'Transactions- '. $config['CompanyName']);
$ui->assign('_st', 'Transactions');
$ui->assign('_sysfrm_menu', 'transactions');
$action = $routes['1'];
$user = User::_info();
$ui->assign('user', $user);
$mdate = date('Y-m-d');
switch ($action) {
    case 'deposit':
        $d = ORM::for_table('sys_accounts')->find_many();
       // $p = ORM::for_table('sys_payers')->find_many();
        $p = ORM::for_table('crm_accounts')->find_many();
        $ui->assign('p', $p);
        $ui->assign('d', $d);
        $cats = ORM::for_table('sys_cats')->where('type','Income')->order_by_asc('sorder')->find_many();
        $ui->assign('cats', $cats);
        $pms = ORM::for_table('sys_pmethods')->find_many();
        $ui->assign('pms', $pms);
        $ui->assign('mdate', $mdate);
        $ui->assign('xheader', '
<link rel="stylesheet" type="text/css" href="' . $_theme . '/lib/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="' . $_theme . '/lib/dp/dist/datepicker.min.css"/>
');
        $ui->assign('xfooter', '
<script type="text/javascript" src="' . $_theme . '/lib/select2/select2.min.js"></script>
<script type="text/javascript" src="' . $_theme . '/lib/dp/dist/datepicker.min.js"></script>
<script type="text/javascript" src="' . $_theme . '/lib/numeric.js"></script>
<script type="text/javascript" src="' . $_theme . '/lib/deposit.js"></script>
');
        $ui->assign('xjq', '
 $("#account").select2();
 $("#cats").select2();
  $("#pmethod").select2();
  $("#payer").select2();

 ');
       //find latest income
       $tr = ORM::for_table('sys_transactions')->where('type','Income')->order_by_desc('id')->limit('20')->find_many();
        $ui->assign('tr', $tr);
        $ui->display('deposit.tpl');

        break;



    case 'deposit-post':
        $account = _post('account');
        $date = _post('date');
        $amount = _post('amount');
        $amount = str_replace(',','',$amount);
        $payerid = _post('payer');
        $ref = _post('ref');
        $pmethod = _post('pmethod');

        $amount = str_replace($config['currency_code'],'',$amount);
        $amount = str_replace(',','',$amount);
        $cat = _post('cats');
        $tags = _post('tags');


if($payerid == ''){
    $payerid = '0';
}
        $description = _post('description');
        $msg = '';
        if ($description == '') {
            $msg .= $_L['description_error'] . '<br>';
        }

        if (Validator::Length($account, 100, 1) == false) {
            $msg .= 'Please choose an Account' . '<br>';
        }


        if (is_numeric($amount) == false) {
            $msg .= $_L['amount_error'] . '<br>';
        }

        if ($msg == '') {
            if($tags != ''){
                $pieces = explode(',', $tags);
                foreach($pieces as $element)
                {
                    $tg = ORM::for_table('sys_tags')->where('text',$element)->find_one();
                    if(!$tg){
                        $tc = ORM::for_table('sys_tags')->create();
                        $tc->text = $element;
                        $tc->type = 'Income';
                        $tc->save();
                    }
                }
            }
            //find the current balance for this account
            $a = ORM::for_table('sys_accounts')->where('account',$account)->find_one();
            $cbal = $a['balance'];
            $nbal = $cbal+$amount;
            $a->balance=$nbal;
            $a->save();
            $d = ORM::for_table('sys_transactions')->create();
            $d->account = $account;
            $d->type = 'Income';
            $d->payerid =  $payerid;
            $d->tags =  $tags;
            $d->amount = $amount;
            $d->category = $cat;
            $d->method = $pmethod;
            $d->ref = $ref;

            $d->description = $description;
            $d->date = $date;
            $d->dr = '0.00';
            $d->cr = $amount;
            $d->bal = $nbal;
            $d->save();
            $tid = $d->id();
            _log('New Deposit: '.$description.' [TrID: '.$tid.' | Amount: '.$amount.']','Admin',$user['id']);
            _msglog('s','Transaction Added Successfully');
           echo $tid;
        } else {
           echo $msg;
        }
        break;

    case 'expense':
        $d = ORM::for_table('sys_accounts')->find_many();
        $p = ORM::for_table('crm_accounts')->find_many();
        $ui->assign('p', $p);
        $ui->assign('d', $d);
        $cats = ORM::for_table('sys_cats')->where('type','Expense')->order_by_asc('sorder')->find_many();
        $ui->assign('cats', $cats);
        $pms = ORM::for_table('sys_pmethods')->find_many();
        $ui->assign('pms', $pms);
        $ui->assign('mdate', $mdate);
        $ui->assign('xheader', '
<link rel="stylesheet" type="text/css" href="' . $_theme . '/lib/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="' . $_theme . '/lib/dp/dist/datepicker.min.css"/>
');
        $ui->assign('xfooter', '
<script type="text/javascript" src="' . $_theme . '/lib/select2/select2.min.js"></script>
<script type="text/javascript" src="' . $_theme . '/lib/dp/dist/datepicker.min.js"></script>
<script type="text/javascript" src="' . $_theme . '/lib/numeric.js"></script>
<script type="text/javascript" src="' . $_theme . '/lib/expense.js"></script>
');
        $ui->assign('xjq', '
 $("#account").select2();
 $("#cats").select2();
  $("#pmethod").select2();
  $("#payee").select2();

 ');
        //find latest income
        $tr = ORM::for_table('sys_transactions')->where('type','Expense')->order_by_desc('id')->limit('20')->find_many();
        $ui->assign('tr', $tr);

        $ui->display('expense.tpl');

        break;



    case 'expense-post':
        $account = _post('account');
        $date = _post('date');
        $amount = _post('amount');
        $payer = _post('payer');
        $ref = _post('ref');
        $pmethod = _post('pmethod');

        $amount = str_replace($config['currency_code'],'',$amount);
        $amount = str_replace(',','',$amount);
        $cat = _post('cats');
        $tags = _post('tags');



        $description = _post('description');
        $msg = '';
        if ($description == '') {
            $msg .= $_L['description_error'] . '<br>';
        }

        if (Validator::Length($account, 100, 1) == false) {
            $msg .= 'Please choose an Account' . '<br>';
        }


        if (is_numeric($amount) == false) {
            $msg .= $_L['amount_error'] . '<br>';
        }

        if ($msg == '') {
            if($tags != ''){
                $pieces = explode(',', $tags);
                foreach($pieces as $element)
                {
                    $tg = ORM::for_table('sys_tags')->where('text',$element)->find_one();
                    if(!$tg){
                        $tc = ORM::for_table('sys_tags')->create();
                        $tc->text = $element;
                        $tc->type = 'Expense';
                        $tc->save();
                    }
                }
            }
            //find the current balance for this account
            $a = ORM::for_table('sys_accounts')->where('account',$account)->find_one();
            $cbal = $a['balance'];
            $nbal = $cbal-$amount;
            $a->balance=$nbal;
            $a->save();
            $d = ORM::for_table('sys_transactions')->create();
            $d->account = $account;
            $d->type = 'Expense';
            $d->payer =  $payer;
            $d->tags =  $tags;
            $d->amount = $amount;
            $d->category = $cat;
            $d->method = $pmethod;
            $d->ref = $ref;

            $d->description = $description;
            $d->date = $date;
            $d->dr = $amount;
            $d->cr = '0.00';
            $d->bal = $nbal;
            $d->save();
            $tid = $d->id();
            _log('New Expense: '.$description.' [TrID: '.$tid.' | Amount: '.$amount.']','Admin',$user['id']);
            _msglog('s','Transaction Added Successfully');
            echo $tid;
        } else {
            echo $msg;
        }
        break;

    case 'transfer':
        $d = ORM::for_table('sys_accounts')->find_many();
        $ui->assign('p', $d);
        $ui->assign('d', $d);

        $pms = ORM::for_table('sys_pmethods')->find_many();
        $ui->assign('pms', $pms);
        $ui->assign('mdate', $mdate);
        $ui->assign('xheader', '
<link rel="stylesheet" type="text/css" href="' . $_theme . '/lib/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="' . $_theme . '/lib/dp/dist/datepicker.min.css"/>
');
        $ui->assign('xfooter', '
<script type="text/javascript" src="' . $_theme . '/lib/select2/select2.min.js"></script>
<script type="text/javascript" src="' . $_theme . '/lib/dp/dist/datepicker.min.js"></script>
<script type="text/javascript" src="' . $_theme . '/lib/numeric.js"></script>
<script type="text/javascript" src="' . $_theme . '/lib/transfer.js"></script>
');
        $ui->assign('xjq', '
 $("#faccount").select2();
 $("#taccount").select2();
  $("#pmethod").select2();
 ');
        //find latest income
        $tr = ORM::for_table('sys_transactions')->where('type','Transfer')->order_by_desc('id')->limit('20')->find_many();
        $ui->assign('tr', $tr);
        $ui->display('transfer.tpl');

        break;



    case 'transfer-post':
        $faccount = _post('faccount');
        $taccount = _post('taccount');
        $date = _post('date');
        $amount = _post('amount');
        $amount = str_replace($config['currency_code'],'',$amount);
        $amount = str_replace(',','',$amount);
        $pmethod = _post('pmethod');
        $ref = _post('ref');

        $description = _post('description');
        $msg = '';
        if (Validator::Length($faccount, 100, 2) == false) {
            $msg .= 'Please choose an Account' . '<br>';
        }

        if (Validator::Length($taccount, 100, 2) == false) {
            $msg .= 'Please choose the Traget Account' . '<br>';
        }

        if ($description == '') {
            $msg .= $_L['description_error'] . '<br>';
        }

        if (is_numeric($amount) == false) {
            $msg .= $_L['amount_error'] . '<br>';
        }

        //check if from account & target account is same

        if($faccount == $taccount){
            $msg .= $_L['same_account_error'] . '<br>';
        }

        $tags = _post('tags');

        if($tags != ''){
            $pieces = explode(',', $tags);
            foreach($pieces as $element)
            {
                $tg = ORM::for_table('sys_tags')->where('text',$element)->find_one();
                if(!$tg){
                    $tc = ORM::for_table('sys_tags')->create();
                    $tc->text = $element;
                    $tc->type = 'Transfer';
                    $tc->save();
                }
            }
        }


        if ($msg == '') {
            $a = ORM::for_table('sys_accounts')->where('account',$faccount)->find_one();
            $cbal = $a['balance'];
            $nbal = $cbal-$amount;
            $a->balance=$nbal;
            $a->save();
            $a = ORM::for_table('sys_accounts')->where('account',$taccount)->find_one();
            $cbal = $a['balance'];
            $tnbal = $cbal+$amount;
            $a->balance=$tnbal;
            $a->save();
            $d = ORM::for_table('sys_transactions')->create();
            $d->account = $faccount;
            $d->type = 'Transfer';

            $d->amount = $amount;

            $d->method = $pmethod;
            $d->ref = $ref;
            $d->tags = $tags;

            $d->description = $description;
            $d->date = $date;
            $d->dr = $amount;
            $d->cr = '0.00';
            $d->bal = $nbal;
            $d->save();
            //transaction for target account
            $d = ORM::for_table('sys_transactions')->create();
            $d->account = $taccount;
            $d->type = 'Transfer';

            $d->amount = $amount;

            $d->method = $pmethod;
            $d->ref = $ref;
            $d->tags = $tags;
            $d->description = $description;
            $d->date = $date;
            $d->dr = '0.00';
            $d->cr = $amount;
            $d->bal = $tnbal;
            $d->save();
            _msglog('s','Transaction Added Successfully');
           echo '1';
        } else {
            echo $msg;
        }
        break;


    case 'list':

        $paginator = Paginator::bootstrap('sys_transactions');
        $d = ORM::for_table('sys_transactions')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('date')->find_many();
        $ui->assign('d',$d);
        $ui->assign('paginator',$paginator);
        $ui->display('transactions.tpl');
        break;

    case 'list-income':
        $ui->assign('_sysfrm_menu', 'reports');
        $paginator = Paginator::bootstrap('sys_transactions','type','Income');
        $d = ORM::for_table('sys_transactions')->where('type','Income')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('date')->find_many();
        $ui->assign('d',$d);
        $ui->assign('paginator',$paginator);
        $ui->display('transactions.tpl');
        break;

    case 'list-expense':

        $ui->assign('_sysfrm_menu', 'reports');
        $paginator = Paginator::bootstrap('sys_transactions','type','Expense');
        $d = ORM::for_table('sys_transactions')->where('type','Expense')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('date')->find_many();
        $ui->assign('d',$d);
        $ui->assign('paginator',$paginator);
        $ui->display('transactions.tpl');
        break;

    case 'manage':
        $id = $routes['2'];
        $t = ORM::for_table('sys_transactions')->find_one($id);
        if ($t) {
            $p = ORM::for_table('crm_accounts')->find_many();
            $ui->assign('p', $p);
            $ui->assign('t', $t);
            $d = ORM::for_table('sys_accounts')->find_many();
            $ui->assign('d', $d);
            $icat = '1';
            if(($t['type']) == 'Income'){
                $cats = ORM::for_table('sys_cats')->where('type','Income')->find_many();
            }
            elseif(($t['type']) == 'Expense'){
                $cats = ORM::for_table('sys_cats')->where('type','Expense')->find_many();
            }
            else{
                $cats = '0';
                $icat = '0';
            }
            $ui->assign('icat', $icat);
            $ui->assign('cats', $cats);
            $pms = ORM::for_table('sys_pmethods')->find_many();
            $ui->assign('pms', $pms);

            $ui->assign('mdate', $mdate);
            $ui->assign('xheader', '
<link rel="stylesheet" type="text/css" href="' . $_theme . '/lib/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="' . $_theme . '/lib/dp/dist/datepicker.min.css"/>
');
            $ui->assign('xfooter', '
<script type="text/javascript" src="' . $_theme . '/lib/select2/select2.min.js"></script>
<script type="text/javascript" src="' . $_theme . '/lib/dp/dist/datepicker.min.js"></script>
<script type="text/javascript" src="' . $_theme . '/lib/numeric.js"></script>
<script type="text/javascript" src="' . $_theme . '/lib/tr-manage.js"></script>
');
            $ui->assign('xjq', '
 $("#account").select2();
 $("#cats").select2();
  $("#pmethod").select2();
  $(".s2").select2();
 ');
            $ui->display('manage-transaction.tpl');
        } else {
            r2(U . 'transactions/list', 'e', $_L['Transaction_Not_Found']);
        }

        break;
    case 'edit-post':
        $id = _post('id');
        $d = ORM::for_table('sys_transactions')->find_one($id);
        if($d){
            $cat = _post('cats');
            $pmethod = _post('pmethod');
            $ref = _post('ref');
            $date = _post('date');
            $payer = _post('payer');
            $payee = _post('payee');
            $description = _post('description');
            $msg = '';
            if ($description == '') {
                $msg .= $_L['description_error'] . '<br>';
            }



            $tags = _post('tags');


            if ($msg == '') {
                //find the current balance for this account

                if($tags != ''){
                    $pieces = explode(',', $tags);
                    foreach($pieces as $element)
                    {
                        $tg = ORM::for_table('sys_tags')->where('text',$element)->find_one();
                        if(!$tg){
                            $tc = ORM::for_table('sys_tags')->create();
                            $tc->text = $element;
                            $tc->type = $d->type;
                            $tc->save();
                        }
                    }
                }

                $d->category = $cat;
                $d->payerid = $payer;
                $d->payeeid = $payee;
                $d->method = $pmethod;
                $d->ref = $ref;

                $d->description = $description;
                $d->date = $date;

                $d->save();
                echo $d->id();
            } else {
                echo $msg;
            }
        }
        else{
            echo 'Transaction Not Found';
        }




        break;
    case 'delete-post':

        $id = _post('id');
        if(Transaction::delete($id)){
            r2(U . 'transactions/list', 's', $_L['transaction_delete_successful']);
        }
        else{
            r2(U . 'transactions/list', 'e', $_L['an_error_occured']);
        }
        break;
    case 'post':

        break;

    default:
        echo 'action not defined';
}