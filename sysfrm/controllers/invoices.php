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
$ui->assign('_sysfrm_menu', 'invoices');
$ui->assign('_st', 'Invoices');
$ui->assign('_title', 'Sales- '. $config['CompanyName']);
$action = $routes['1'];
$user = User::_info();
$ui->assign('user', $user);
switch ($action) {
    case 'add':
//find all clients.
        if(isset($routes['2']) AND ($routes['2'] == 'recurring')){
            $recurring = true;
        }
        else{
            $recurring = false;
        }
        $ui->assign('recurring', $recurring);
    $ui->assign('_st', 'Add Invoice');
    $c = ORM::for_table('crm_accounts')->select('id')->select('account')->select('company')->order_by_desc('id')->find_many();
    $ui->assign('c',$c);

    $t = ORM::for_table('sys_tax')->find_many();
    $ui->assign('t',$t);

//default idate ddate
    $ui->assign('idate',date('Y-m-d'));

    $ui->assign('xheader', '
<link rel="stylesheet" type="text/css" href="' . $_theme . '/lib/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="' . $_theme . '/css/modal.css"/>
<link rel="stylesheet" type="text/css" href="' . $_theme . '/lib/dp/dist/datepicker.min.css"/>

');
    $ui->assign('xfooter', '
<script type="text/javascript" src="' . $_theme . '/lib/select2/select2.min.js"></script>
<script type="text/javascript" src="' . $_theme . '/lib/dp/dist/datepicker.min.js"></script>
<script type="text/javascript" src="' . $_theme . '/lib/invoice.js"></script>
<script type="text/javascript" src="' . $_theme . '/lib/modal.js"></script>

');
    $ui->assign('xjq', '



 ');

    $ui->display('add-invoice.tpl');



    break;


    case 'edit':
        $id = $routes['2'];
        $d = ORM::for_table('sys_invoices')->find_one($id);
        if($d){

            $ui->assign('i', $d);
            $items = ORM::for_table('sys_invoiceitems')->where('invoiceid',$id)->order_by_asc('id')->find_many();
            $ui->assign('items',$items);
//find the user
            $a = ORM::for_table('crm_accounts')->find_one($d['userid']);
            $ui->assign('a',$a);
            $ui->assign('d',$d);
            $ui->assign('_st', 'Add Invoice');
            $c = ORM::for_table('crm_accounts')->select('id')->select('account')->select('company')->find_many();
            $ui->assign('c',$c);

            $t = ORM::for_table('sys_tax')->find_many();
            $ui->assign('t',$t);

//default idate ddate
            $ui->assign('idate',date('Y-m-d'));

            $ui->assign('xheader', '
<link rel="stylesheet" type="text/css" href="' . $_theme . '/lib/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="' . $_theme . '/lib/dp/dist/datepicker.min.css"/>

');
            $ui->assign('xfooter', '
<script type="text/javascript" src="' . $_theme . '/lib/select2/select2.min.js"></script>
<script type="text/javascript" src="' . $_theme . '/lib/dp/dist/datepicker.min.js"></script>
<script type="text/javascript" src="' . $_theme . '/lib/edit-invoice.js"></script>

');
            $ui->assign('xjq', '



 ');

            $ui->display('edit-invoice.tpl');

        }
        else{
            echo 'Invoice Not Found';
        }
//find all clients.



        break;


    case 'view':
        $id  = $routes['2'];
        $d = ORM::for_table('sys_invoices')->find_one($id);
        if($d){

            //find all activity for this user
            $items = ORM::for_table('sys_invoiceitems')->where('invoiceid',$id)->order_by_asc('id')->find_many();
            $ui->assign('items',$items);
            //find related transactions
            $trs_c = ORM::for_table('sys_transactions')->where('iid',$id)->count();

            $trs = ORM::for_table('sys_transactions')->where('iid',$id)->order_by_desc('id')->find_many();


            $ui->assign('trs',$trs);
            $ui->assign('trs_c',$trs_c);

            $emls_c = ORM::for_table('sys_email_logs')->where('iid',$id)->count();

            $emls = ORM::for_table('sys_email_logs')->where('iid',$id)->order_by_desc('id')->find_many();


            $ui->assign('emls',$emls);
            $ui->assign('emls_c',$emls_c);
//find the user
            $a = ORM::for_table('crm_accounts')->find_one($d['userid']);
            $ui->assign('a',$a);
            $ui->assign('d',$d);

            $ui->assign('xheader', '
            <link rel="stylesheet" type="text/css" href="' . $_theme . '/lib/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="' . $_theme . '/lib/dp/dist/datepicker.min.css"/>

<link rel="stylesheet" type="text/css" href="ui/lib/sn/summernote.css"/>
<link rel="stylesheet" type="text/css" href="ui/lib/sn/summernote-bs3.css"/>
<link rel="stylesheet" type="text/css" href="' . $_theme . '/css/modal.css"/>
<link rel="stylesheet" type="text/css" href="ui/lib/sn/summernote-sysfrm.css"/>
');
            $ui->assign('xfooter', '
            <script type="text/javascript" src="' . $_theme . '/lib/select2/select2.min.js"></script>
<script type="text/javascript" src="' . $_theme . '/lib/dp/dist/datepicker.min.js"></script>
<script type="text/javascript" src="' . $_theme . '/lib/numeric.js"></script>
 <script type="text/javascript" src="' . $_theme . '/lib/modal.js"></script>
 <script type="text/javascript" src="ui/lib/sn/summernote.min.js"></script>
<script type="text/javascript" src="ui/lib/jslib/invoice-view.js"></script>
');


            $ui->display('invoice-view.tpl');

        }
        else{
            r2(U . 'customers/list', 'e', $_L['Account_Not_Found']);
        }

        break;

    case 'add-post':
        $cid = _post('cid');
        //find user with cid
        $u = ORM::for_table('crm_accounts')->find_one($cid);

        $msg = '';
        if ($cid==''){
$msg .= 'Please select a Contact <br> ';
        }

        $notes = _post('notes');



       if(isset($_POST['amount'])){
           $amount = $_POST['amount'];
       }

        else{
            $msg .= 'At least one item is required <br> ';
        }

        $idate = _post('idate');
        $its = strtotime($idate);
        $duedate = _post('duedate');
        $dd = '';
        if($duedate == 'due_on_receipt'){
            $dd = $idate;
        }
        elseif($duedate == 'days3'){
            $dd = date('Y-m-d',strtotime('+3 days',$its));

        }
        elseif($duedate == 'days5'){
            $dd = date('Y-m-d',strtotime('+5 days',$its));
        }
        elseif($duedate == 'days7'){
            $dd = date('Y-m-d',strtotime('+7 days',$its));
        }
        elseif($duedate == 'days10'){
            $dd = date('Y-m-d',strtotime('+10 days',$its));
        }
        elseif($duedate == 'days15'){
            $dd = date('Y-m-d',strtotime('+15 days',$its));
        }
        elseif($duedate == 'days30'){
            $dd = date('Y-m-d',strtotime('+30 days',$its));
        }
        elseif($duedate == 'days45'){
            $dd = date('Y-m-d',strtotime('+45 days',$its));
        }
        elseif($duedate == 'days60'){
            $dd = date('Y-m-d',strtotime('+60 days',$its));
        }
        else{

            $msg .= 'Invalid Date <br> ';

        }
        if(!$dd){
            $msg .= 'Date Parsing Error <br> ';
        }


        $repeat = _post('repeat');
        $nd = $idate;
        if($repeat == '0'){
            $r = '0';
        }
        elseif($repeat == 'week1'){
            $r = '+1 week';
            $nd = date('Y-m-d',strtotime('+1 week',$its));
        }
        elseif($repeat == 'weeks2'){
            $r = '+2 weeks';
            $nd = date('Y-m-d',strtotime('+2 weeks',$its));
        }
        elseif($repeat == 'month1'){


            $r = '+1 month';
            $nd = date('Y-m-d',strtotime('+1 month',$its));

        }
        elseif($repeat == 'months2'){
            $r = '+2 months';
            $nd = date('Y-m-d',strtotime('+2 months',$its));
        }
        elseif($repeat == 'months3'){
            $r = '+3 months';
            $nd = date('Y-m-d',strtotime('+3 months',$its));
        }
        elseif($repeat == 'months6'){
            $r = '+6 months';
            $nd = date('Y-m-d',strtotime('+6 months',$its));
        }
        elseif($repeat == 'year1'){
            $r = '+1 year';
            $nd = date('Y-m-d',strtotime('+1 year',$its));
        }
        elseif($repeat == 'years2'){
            $r = '+2 years';
            $nd = date('Y-m-d',strtotime('+2 years',$its));
        }
        elseif($repeat == 'years3'){
            $r = '+3 years';
            $nd = date('Y-m-d',strtotime('+3 years',$its));
        }
        else{
            $msg .= 'Date Parsing Error <br> ';
        }

        if($msg == ''){

            $qty = $_POST['qty'];
            $sTotal='0';
            $i = '0';
            foreach ($amount as $samount){
                $amount[$i] = $samount;

                $sTotal += $samount*($qty[$i]);
                $i++;
            }



            $tax = _post('tid');
            $taxval = '0.00';
            $taxname = '';
            $taxrate = '0.00';
            $fTotal = $sTotal;
            if ($tax!=''){
                $dt = ORM::for_table('sys_tax')->find_one($tax);
                $taxrate = $dt['rate'];
                $taxname = $dt['name'];
                $taxtype = $dt['type'];
                //
                $taxval = ($sTotal*$taxrate)/100;
                $fTotal = $fTotal+$taxval;

            }

            $vtoken = _raid(10);
            $ptoken = _raid(10);
            $d = ORM::for_table('sys_invoices')->create();
            $d->userid = $cid;
            $d->account = $u['account'];
            $d->date = $idate;
            $d->duedate = $dd;
            $d->subtotal = $sTotal;
            $d->total = $fTotal;
            $d->tax = $taxval;
            $d->taxname = $taxname;
            $d->taxrate = $taxrate;
            $d->vtoken = $vtoken;
            $d->ptoken = $ptoken;
            $d->status = 'Unpaid';
            $d->notes = $notes;
            $d->r = $r;
            $d->nd = $nd;
            $d->save();
            $invoiceid= $d->id();
            $description = $_POST['desc'];
          //  $qty = $_POST['qty'];
            $taxed = $_POST['taxed'];
            $i='0';

            foreach ($description as $item){
                $ltotal = ($amount[$i])*($qty[$i]);
                $d = ORM::for_table('sys_invoiceitems')->create();
                $d->invoiceid = $invoiceid;
                $d->userid = $cid;
                $d->description = $item;
                $d->qty = $qty[$i];
                $d->amount = $amount[$i];
                $d->total = $ltotal;

                if(($taxed[$i]) == 'Yes'){
                    $d->taxed = '1';
                }
                else{
                    $d->taxed = '0';
                }
                $d->save();
                $i++;
            }

            echo $invoiceid;
        }
        else{
            echo $msg;
        }


        break;

    case 'list':
        $paginator = Paginator::bootstrap('sys_invoices');
        $d = ORM::for_table('sys_invoices')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
        $ui->assign('d',$d);
        $ui->assign('paginator',$paginator);
        $ui->assign('xjq', '
$(".cdelete").click(function (e) {
        e.preventDefault();
        var id = this.id;
        bootbox.confirm("Are you sure?", function(result) {
           if(result){
               var _url = $("#_url").val();
               window.location.href = _url + "delete/invoice/" + id;
           }
        });
    });



 ');
        $ui->display('list-invoices.tpl');
        break;

    case 'list-recurring':

        $d = ORM::for_table('sys_invoices')->where_not_equal('r','0')->order_by_desc('id')->find_many();
        $ui->assign('d',$d);
        $ui->assign('xjq', '
$(".cdelete").click(function (e) {
        e.preventDefault();
        var id = this.id;
        bootbox.confirm("Are you sure?", function(result) {
           if(result){
               var _url = $("#_url").val();
               window.location.href = _url + "delete/invoice/" + id;
           }
        });
    });

     $(".cstop").click(function (e) {
        e.preventDefault();
        var id = this.id;
        bootbox.confirm("Are you sure? This will prevent future invoice generation from this invoice.", function(result) {
           if(result){
               var _url = $("#_url").val();
               window.location.href = _url + "invoices/stop_recurring/" + id;
           }
        });
    });

 ');
        $ui->display('list-recurring-invoices.tpl');
        break;

    case 'edit-post':
        $cid = _post('cid');
$iid = _post('iid');
        //find user with cid
        $u = ORM::for_table('crm_accounts')->find_one($cid);

        $msg = '';
        if ($cid==''){
            $msg .= 'Please select a Contact <br> ';
        }

        $notes = _post('notes');



        if(isset($_POST['amount'])){
            $amount = $_POST['amount'];
        }

        else{
            $msg .= 'At least one item is required <br> ';
        }


        if($msg == ''){
            $qty = $_POST['qty'];
            $sTotal='0';
            $i = '0';
            foreach ($amount as $samount){
                $amount[$i] = $samount;

                $sTotal += $samount*($qty[$i]);
                $i++;
            }



            $tax = _post('tid');
            $taxval = '0.00';
            $taxname = '';
            $taxrate = '0.00';
            $fTotal = $sTotal;
            if ($tax!=''){
                $dt = ORM::for_table('sys_tax')->find_one($tax);
                $taxrate = $dt['rate'];
                $taxname = $dt['name'];
                $taxtype = $dt['type'];
                //
                $taxval = ($sTotal*$taxrate)/100;
                $fTotal = $fTotal+$taxval;
//            if ($taxtype=='Excluded'){
//                $taxval = ($sTotal*$taxrate)/100;
//                $fTotal = $fTotal+$taxval;
//
//            }
//            else {
//                $taxval = ($sTotal*$taxrate)/100;
//                $sTotal = $fTotal-$taxval;
//            }
//update the tax val in database
//$d = ORM::for_table('accounts')->find_one(101);
//$d->balance = $d['balance']+$taxval;
//$d->save();

            }
            $idate = _post('idate');
            $its = strtotime($idate);
            $duedate = _post('ddate');
            $repeat = _post('repeat');
            $nd = $idate;
            if($repeat == '0'){
                $r = '0';
            }
            elseif($repeat == 'week1'){
                $r = '+1 week';
                $nd = date('Y-m-d',strtotime('+1 week',$its));
            }
            elseif($repeat == 'weeks2'){
                $r = '+2 weeks';
                $nd = date('Y-m-d',strtotime('+2 weeks',$its));
            }
            elseif($repeat == 'month1'){


                $r = '+1 month';
                $nd = date('Y-m-d',strtotime('+1 month',$its));

            }
            elseif($repeat == 'months2'){
                $r = '+2 months';
                $nd = date('Y-m-d',strtotime('+2 months',$its));
            }
            elseif($repeat == 'months3'){
                $r = '+3 months';
                $nd = date('Y-m-d',strtotime('+3 months',$its));
            }
            elseif($repeat == 'months6'){
                $r = '+6 months';
                $nd = date('Y-m-d',strtotime('+6 months',$its));
            }
            elseif($repeat == 'year1'){
                $r = '+1 year';
                $nd = date('Y-m-d',strtotime('+1 year',$its));
            }
            elseif($repeat == 'years2'){
                $r = '+2 years';
                $nd = date('Y-m-d',strtotime('+2 years',$its));
            }
            elseif($repeat == 'years3'){
                $r = '+3 years';
                $nd = date('Y-m-d',strtotime('+3 years',$its));
            }
            else{
                $msg .= 'Date Parsing Error <br> ';
            }
           // $vtoken = _raid(10);
           // $ptoken = _raid(10);
            $d = ORM::for_table('sys_invoices')->find_one($iid);
            if($d){
                $d->userid = $cid;
                $d->account = $u['account'];
                $d->date = $idate;
                $d->duedate = $duedate;
                $d->subtotal = $sTotal;
                $d->total = $fTotal;
                $d->tax = $taxval;
                $d->taxname = $taxname;
                $d->taxrate = $taxrate;
                $d->notes = $notes;
                $d->r = $r;
                $d->nd = $nd;
                /*
                 * $d->userid = $cid;
            $d->account = $u['account'];
            $d->date = $idate;
            $d->duedate = $dd;
            $d->subtotal = $sTotal;
            $d->total = $fTotal;
            $d->tax = $taxval;
            $d->taxname = $taxname;
            $d->taxrate = $taxrate;
            $d->vtoken = $vtoken;
            $d->ptoken = $ptoken;
            $d->status = 'Unpaid';
            $d->notes = $notes;
            $d->r = $r;
            $d->nd = $nd;
                 */

              //  $d->status = 'Unpaid';
                $d->save();
                $invoiceid= $iid;
                $description = $_POST['desc'];

                $taxed = $_POST['taxed'];
                $i='0';
// first delete all related items
                $x = ORM::for_table('sys_invoiceitems')->where('invoiceid',$iid)->delete_many();
                foreach ($description as $item){
                    $ltotal = ($amount[$i])*($qty[$i]);
                    $d = ORM::for_table('sys_invoiceitems')->create();
                    $d->invoiceid = $invoiceid;
                    $d->userid = $cid;
                    $d->description = $item;
                    $d->qty = $qty[$i];
                    $d->amount = $amount[$i];
                    $d->total = $ltotal;

                    if(($taxed[$i]) == 'Yes'){
                        $d->taxed = '1';
                    }
                    else{
                        $d->taxed = '0';
                    }
                    $d->save();
                    $i++;
                }

                echo $invoiceid;
            }

            else{

                // invoice not found
            }

        }
        else{
            echo $msg;
        }

        break;
    case 'delete':
        $id = $routes['2'];
        if($_app_stage == 'Demo'){
            r2(U . 'accounts/list', 'e', 'Sorry! Deleting Account is disabled in the demo mode.');
        }
        $d = ORM::for_table('crm_accounts')->find_one($id);
        if($d){
            $d->delete();
            r2(U . 'accounts/list', 's', $_L['account_delete_successful']);
        }

        break;



    case 'print':
    $id  = $routes['2'];
    $d = ORM::for_table('sys_invoices')->find_one($id);
    if($d){

        //find all activity for this user
        $items = ORM::for_table('sys_invoiceitems')->where('invoiceid',$id)->order_by_asc('id')->find_many();

//find the user
        $a = ORM::for_table('crm_accounts')->find_one($d['userid']);

        require 'sysfrm/vendors/invoices/render.php';

    }
    else{
        r2(U . 'customers/list', 'e', $_L['Account_Not_Found']);
    }

    break;

    case 'pdf':
        $id  = $routes['2'];


        $d = ORM::for_table('sys_invoices')->find_one($id);
        if($d){

            //find all activity for this user
            $items = ORM::for_table('sys_invoiceitems')->where('invoiceid',$id)->order_by_asc('id')->find_many();

//find the user
            $a = ORM::for_table('crm_accounts')->find_one($d['userid']);
//            ob_start();
//            require 'sysfrm/vendors/invoices/pdf-default.php';
//            $html = ob_get_contents();
//            ob_end_clean();
//            echo $html;
//            exit;
            require ('sysfrm/vendors/tcpdf/config/lang/eng.php');
            require ('sysfrm/vendors/tcpdf/tcpdf.php');
            // create new PDF document
            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
            $pdf->SetCreator('SysFrm');
            $pdf->SetAuthor('sysfrm.com');
            $pdf->SetTitle('invoice titla');
            $pdf->SetSubject('invoice subject');

            $pdf->SetPrintHeader(false);
// set default header data
         //   $pdf->SetHeaderData('', '', $title, "Generated on ".date('d/m/Y')." \nby ".$aadmin);

// set header and footer fonts
         //   $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
         //   $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
//$pdf->SetFont('freesans', '', 10);
// set default monospaced font
         //   $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
//            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
//        //    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
//         //   $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
//
////set auto page breaks
//            $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
//
////set image scale factor
//            $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
            //  $pdf->setLanguageArray();

// ---------------------------------------------------------

// set font
            $pdf->AddPage();
            require 'sysfrm/vendors/invoices/pdf-x1.php';

           // $pdf->writeHTML($html, true, false, true, false, '');

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// reset pointer to the last page
         //   $pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
            if(isset($routes['3']) AND ($routes['3'] == 'dl')){
                $pdf->Output(date('Y-m-d')._raid(4).'.pdf', 'D'); # D
            }
            else{
                $pdf->Output(date('Y-m-d')._raid(4).'.pdf', 'I'); # D
            }

        }
        else{
            r2(U . 'customers/list', 'e', $_L['Account_Not_Found']);
        }

        break;

    case 'markpaid':
        $iid = _post('iid');
$d = ORM::for_table('sys_invoices')->find_one($iid);
        if($d){
           $d->status = 'Paid';
            $d->save();
            _msglog('s','Invoice marked as Paid');
        }
        else{
            _msglog('e','Invoice not found');
        }
        break;

    case 'markunpaid':
        $iid = _post('iid');
        $d = ORM::for_table('sys_invoices')->find_one($iid);
        if($d){
            $d->status = 'Unpaid';
            $d->save();
            _msglog('s','Invoice marked as Un Paid');
        }
        else{
            _msglog('e','Invoice not found');
        }
        break;

    case 'markcancelled':
        $iid = _post('iid');
        $d = ORM::for_table('sys_invoices')->find_one($iid);
        if($d){
            $d->status = 'Cancelled';
            $d->save();
            _msglog('s','Invoice marked as Cancelled');
        }
        else{
            _msglog('e','Invoice not found');
        }
        break;

    case 'markpartiallypaid':
        $iid = _post('iid');
        $d = ORM::for_table('sys_invoices')->find_one($iid);
        if($d){
            $d->status = 'Partially Paid';
            $d->save();
            _msglog('s','Invoice marked as Partially Paid');
        }
        else{
            _msglog('e','Invoice not found');
        }
        break;


    case 'add-payment':

        $sid = $routes['2'];
        $d = ORM::for_table('sys_invoices')->find_one($sid);

        if($d){

          $itotal = $d['total'];
            $ic = $d['credit'];
            $np = $itotal-$ic;
$a_opt = '';
            // <option value="{$ds['account']}">{$ds['account']}</option>
            $a = ORM::for_table('sys_accounts')->find_many();
            foreach ($a as $acs){
               $a_opt .= '<option value="'.$acs['account'].'">'.$acs['account'].'</option>';
            }

$pms_opt = '';
            // <option value="{$pm['name']}">{$pm['name']}</option>
            $pms = ORM::for_table('sys_pmethods')->find_many();
            foreach($pms as $pm){
                $pms_opt .= '<option value="'.$pm['name'].'">'.$pm['name'].'</option>';
            }

            $cats_opt = '';

            $cats = ORM::for_table('sys_cats')->where('type','Income')->order_by_asc('sorder')->find_many();

            foreach($cats as $cat){
                $cats_opt .=  '<option value="'.$cat['name'].'">'.$cat['name'].'</option>';
            }


            echo '
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h3>Invoice #'.$d['id'].'</h3>
</div>
<div class="modal-body">

<form class="form-horizontal" role="form" id="form_add_payment" method="post">
<div class="form-group">
    <label for="subject" class="col-sm-2 control-label">Account</label>
    <div class="col-sm-10">
       <select id="account" name="account">
                            <option value="">Choose an Account</option>

'.$a_opt.'

                        </select>
    </div>
  </div>

<div class="form-group">
    <label for="date" class="col-sm-2 control-label">Date</label>
    <div class="col-sm-10">
      <input type="text" class="form-control datepicker"  value="'.date('Y-m-d').'" name="date" id="date" datepicker data-date-format="yyyy-mm-dd" data-auto-close="true">
    </div>
  </div>

<div class="form-group">
    <label for="description" class="col-sm-2 control-label">Description</label>
    <div class="col-sm-10">
      <input type="text" id="description" name="description" class="form-control" value="Invoice '.$d['id'].' Payment">
    </div>
  </div>
<div class="form-group">
    <label for="amount" class="col-sm-2 control-label">Amount</label>
    <div class="col-sm-10">
      <input type="text" id="amount" name="amount" class="form-control amount"   data-a-sign="'.$config['currency_code'].' " data-d-group="2" value="'.$np.'">
    </div>
  </div>
<div class="form-group">
    <label for="cats" class="col-sm-2 control-label">Category</label>
    <div class="col-sm-10">
       <select id="cats" name="cats">
                             <option value="Uncategorized">Uncategorized</option>

'.$cats_opt.'

                        </select>
    </div>
  </div>
  <div class="form-group">
    <label for="payer_name" class="col-sm-2 control-label">Payer</label>
    <div class="col-sm-10">
      <input type="text" id="payer_name" name="payer_name" class="form-control" value="'.$d['account'].'" disabled>
    </div>
  </div>

   <div class="form-group">
    <label for="subject" class="col-sm-2 control-label">Method</label>
    <div class="col-sm-10">
      <select id="pmethod" name="pmethod">
                                <option value="">Select Payment Method</option>


                                '.$pms_opt.'


                            </select>
    </div>
  </div>


</form>

</div>
<div class="modal-footer">
<input type="hidden" id="payer" name="payer" value="'.$d['userid'].'">
	<button id="save_payment" class="btn btn-primary">Save</button>

		<button type="button" data-dismiss="modal" class="btn">Close</button>
</div>';
        }
        else{
            exit('Invoice Not Found');
        }



        break;


    case 'mail_invoice_':

        $sid = $routes['2'];
        $etpl = $routes['3'];

        $d = ORM::for_table('sys_invoices')->find_one($sid);

        if($etpl == 'created'){
          $e = ORM::for_table('sys_email_templates')->where('tplname','Invoice:Invoice Created')->find_one();
        }
        elseif($etpl == 'reminder'){
            $e = ORM::for_table('sys_email_templates')->where('tplname','Invoice:Invoice Payment Reminder')->find_one();
        }
        elseif($etpl == 'overdue'){
            $e = ORM::for_table('sys_email_templates')->where('tplname','Invoice:Invoice Overdue Notice')->find_one();
        }
        elseif($etpl == 'confirm'){
            $e = ORM::for_table('sys_email_templates')->where('tplname','Invoice:Invoice Payment Confirmation')->find_one();
        }
        elseif($etpl == 'refund'){
            $e = ORM::for_table('sys_email_templates')->where('tplname','Invoice:Invoice Refund Confirmation')->find_one();
        }
        else{
$d = false;
            $e = false;
        }

        if($d){

            $a = ORM::for_table('crm_accounts')->find_one($d['userid']);

            //parse template

            $subject = new Template($e['subject']);
            $subject->set('business_name', $config['CompanyName']);
            $subj = $subject->output();
            $message = new Template($e['message']);
            $message->set('name', $a['account']);
            $message->set('business_name', $config['CompanyName']);
            $message->set('invoice_url', U.'client/iview/'.$d['id'].'/token_'.$d['vtoken']);
            $message->set('invoice_id', $d['id']);
            $message->set('invoice_due_date', date( $config['df'], strtotime($d['duedate'])));
            $message->set('invoice_date', date( $config['df'], strtotime($d['date'])));
            $message->set('invoice_amount', $d['total']);
            $message_o = $message->output();


            echo '
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h3>Invoice #'.$d['id'].'</h3>
</div>
<div class="modal-body">

<form class="form-horizontal" role="form" id="email_form" method="post">


<div class="form-group">
    <label for="subject" class="col-sm-2 control-label">To</label>
    <div class="col-sm-10">
      <input type="text" id="toemail" name="toemail" class="form-control" value="'.$a['email'].'">
    </div>
  </div>

    <div class="form-group">
    <label for="subject" class="col-sm-2 control-label">Subject</label>
    <div class="col-sm-10">
      <input type="text" id="subject" name="subject" class="form-control" value="'.$subj.'">
    </div>
  </div>

  <div class="form-group">
    <label for="subject" class="col-sm-2 control-label">Message</label>
    <div class="col-sm-10">
      <textarea class="form-control sysedit" rows="3" name="message" id="message">'.$message_o.'</textarea>
      <input type="hidden" id="toname" name="toname" value="'.$a['account'].'">
      <input type="hidden" id="i_cid" name="i_cid" value="'.$a['id'].'">
      <input type="hidden" id="i_iid" name="i_iid" value="'.$d['id'].'">
    </div>
  </div>



</form>

</div>
<div class="modal-footer">
	<button id="send" class="btn btn-primary">Send</button>

		<button type="button" data-dismiss="modal" class="btn">Close</button>
</div>';
        }
        else{
            exit('Invoice Not Found');
        }



        break;


    case 'send_email':
        $msg = '';
        $email = _post('toemail');
        $subject = _post('subject');
        $toname = _post('toname');
        $cid = _post('i_cid');
        $iid = _post('i_iid');
        $message = $_POST['message'];

if(!Validator::Email($email)){
    $msg .= 'Invalid Email <br>';
}
        if($subject == ''){
            $msg .= 'Subject is Required <br>';
        }

        if($message == ''){
            $msg .= 'Message is Required <br>';
        }

        if($msg == ''){

            //now send email

            Notify_Email::_send($toname,$email,$subject,$message,$cid,$iid);

            echo '<div class="alert alert-success fade in">Mail Sent!</div>';
        }
        else{
            echo '<div class="alert alert-danger fade in">'.$msg.'</div>';
        }





        break;

    case 'stop_recurring':
        $id = $routes['2'];
        $id = str_replace('sid','',$id);
        $d = ORM::for_table('sys_invoices')->find_one($id);
        if($d){

            $d->r = '0';
            $d->save();
            r2(U.'invoices/list-recurring','s','Recurring Disabled for Invoice: '.$id);

        }
        else{
            echo 'Invoice not found';
        }
        break;


    case 'add-payment-post':
        $msg = '';
        $account = _post('account');
        $date = _post('date');
        $amount = _post('amount');
        $amount = str_replace(',','',$amount);
        $payerid = _post('payer');
        $pmethod = _post('pmethod');

        $amount = str_replace($config['currency_code'],'',$amount);
        $amount = str_replace(',','',$amount);
        if(!is_numeric($amount)){
            $msg .= 'Invalid Amount' . '<br>';
        }
        $cat = _post('cats');
        $iid = _post('iid');


        if($payerid == ''){
            $msg .= 'Payer Not Found' . '<br>';
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

            $d->amount = $amount;
            $d->category = $cat;
            $d->method = $pmethod;


            $d->description = $description;
            $d->date = $date;
            $d->dr = '0.00';
            $d->cr = $amount;
            $d->bal = $nbal;
            $d->iid = $iid;
            $d->save();
            $tid = $d->id();
            _log('New Deposit: '.$description.' [TrID: '.$tid.' | Amount: '.$amount.']','Admin',$user['id']);
            _msglog('s','Transaction Added Successfully');
            //now work with invoice
            $i = ORM::for_table('sys_invoices')->find_one($iid);
            if($i){
                $pc = $i['credit'];
                $it = $i['total'];
                $dp = $it-$pc;
                if(($dp == $amount) OR (($dp < $amount))){
                    $i->status = 'Paid';

                }
                else{

                    $i->status = 'Partially Paid';
                }
                $i->credit = $pc+$amount;
                $i->save();

            }
            echo $tid;
        } else {
            echo '<div class="alert alert-danger fade in">'.$msg.'</div>';
        }

        break;

    default:
        echo 'action not defined';
}