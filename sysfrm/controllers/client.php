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
$ui->assign('_sysfrm_menu', 'invoices');
$ui->assign('_st', 'Invoices');
$ui->assign('_title', 'Accounts- '. $config['CompanyName']);
$action = $routes['1'];
switch ($action) {


    case 'iview':
        $id  = $routes['2'];
        $d = ORM::for_table('sys_invoices')->find_one($id);
        if($d){
            $token = $routes['3'];
            $token = str_replace('token_','',$token);
            $vtoken = $d['vtoken'];
            if($token != $vtoken){
                echo 'Sorry Token does not match!';
                exit;
            }


            $items = ORM::for_table('sys_invoiceitems')->where('invoiceid',$id)->order_by_asc('id')->find_many();
            $ui->assign('items',$items);
//find the user
            $a = ORM::for_table('crm_accounts')->find_one($d['userid']);
            $ui->assign('a',$a);
            $ui->assign('d',$d);
            $pgs = ORM::for_table('sys_pg')->where('status','Active')->order_by_asc('sorder')->find_many();
            $ui->assign('pgs',$pgs);
            $ui->display('client-iview.tpl');

        }
        else{
            r2(U . 'customers/list', 'e', $_L['Account_Not_Found']);
        }

        break;




    case 'iprint':
        $id  = $routes['2'];
        $d = ORM::for_table('sys_invoices')->find_one($id);
        if($d){

            $token = $routes['3'];
            $token = str_replace('token_','',$token);
            $vtoken = $d['vtoken'];
            if($token != $vtoken){
                echo 'Sorry Token does not match!';
                exit;
            }

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

    case 'ipdf':
        $id  = $routes['2'];
        $d = ORM::for_table('sys_invoices')->find_one($id);
        if($d){
            $token = $routes['3'];
            $token = str_replace('token_','',$token);
            $vtoken = $d['vtoken'];
            if($token != $vtoken){
                echo 'Sorry Token does not match!';
                exit;
            }
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
            $pdf->Output(date('Y-m-d')._raid(4).'.pdf', 'I'); # D
        }
        else{
            r2(U . 'customers/list', 'e', $_L['Account_Not_Found']);
        }

        break;


    case 'ipay':
        $id  = $routes['2'];
        $d = ORM::for_table('sys_invoices')->find_one($id);
        if($d){
            $token = $routes['3'];
            $token = str_replace('token_','',$token);
            $vtoken = $d['vtoken'];
            if($token != $vtoken){
                echo 'Sorry Token does not match!';
                exit;
            }

            //check pg
$ui->assign('d',$d);
            $amount = $d['total'];
            $invoiceid = $d['id'];
            $vtoken = $d['vtoken'];
$pg = _post('pg');

          switch ($pg){

              case 'paypal':

                  $p = ORM::for_table('sys_pg')->where('processor', 'paypal')->find_one();

                  if($p){

                      $ppemail = $p['value'];
//
                      $currency_code = $p['c1'];
                      $c2 = $p['c2'];
                      if(($c2 != '') AND (is_numeric($c2)) AND($c2 != '1')){
                          $amount = $amount/$c2;
                      }

                      $url = 'https://www.paypal.com/cgi-bin/webscr';

                      $params = array(
                          array('name' => "business",
                              'value' => $ppemail
                          ),
                          array('name' => "return",
                              'value' => APP_URL . "/index.php?_route=client/ipay_submitted/$invoiceid/token_$vtoken/",
                          ),
                          array('name' => "cancel_return",
                              'value' => APP_URL . "/index.php?_route=client/ipay_cancel/$invoiceid/token_$vtoken/",
                          ),
                          array('name' => "notify_url",
                              'value' => APP_URL . "/index.php?_route=client/ipay_ipn/$invoiceid/token_$vtoken/",
                          ),
                          array('name' => "item_name_1",
                              'value' => "Payment For INV # $invoiceid"
                          ),
                          array('name' => "amount_1",
                              'value' => $amount
                          ),
                          array('name' => "item_number_1",
                              'value' => $invoiceid
                          ),
                          array('name' => "quantity_1",
                              'value' => '1'
                          ),
                          array('name' => "upload",
                              'value' => '1'
                          ),
                          array('name' => "cmd",
                              'value' => '_cart'
                          ),
                          array('name' => "txn_type",
                              'value' => 'cart'
                          ),
                          array('name' => "num_cart_items",
                              'value' => '1'
                          ),
                          array('name' => "rm",
                              'value' => '2'
                          ),
                          array('name' => "payment_gross",
                              'value' => $amount
                          ),
                          array('name' => "currency_code",
                              'value' => $currency_code
                          )
                      );


                      Fsubmit::form($url, $params);

                  }

                  else{
                      echo 'Paypal is Not Found!';
                  }


                  break;


              case 'manualpayment':
                  $p = ORM::for_table('sys_pg')->where('processor', 'manualpayment')->find_one();

                  if($p){
                      $ui->assign('ins',$p['value']);
                      $ui->display('client-ipay.tpl');
                  }


                  break;

              case 'stripe':
                  $p = ORM::for_table('sys_pg')->where('processor', 'stripe')->find_one();

                  if($p){
                      $a = ORM::for_table('crm_accounts')->find_one($d['userid']);
                      $it = $d['total'];
                      $amount = $it*100;
                      $ins = ' <script
                                        src="https://checkout.stripe.com/v2/checkout.js" class="stripe-button"
                                        data-key="'.$p['value'].'"
                                        data-amount="'.$amount.'"
                                        data-name="INV #'.$d['id'].'"
                                        data-email="'.$a['email'].'"
                                        data-currency="'.$p['c1'].'"
                                        data-description="Payment for Invoice # '.$d['id'].'">
                                </script>';
                      $ui->assign('ins',$ins);
                      $ui->display('client-ipay.tpl');
                  }


                  break;


              case 'authorize_net':
                  $p = ORM::for_table('sys_pg')->where('processor', 'authorize_net')->find_one();

                  if($p){
                      $invoiceid = $d['id'];
                      $amount = $d['total'];
                      $url = 'https://secure.authorize.net/gateway/transact.dll';
                      $loginID = $p['value'];
                      $transactionKey = $p['c1'];

                      $description = "Invoice Payment - $invoiceid";

                      // an invoice is generated using the date and time
                      $invoice = $invoiceid;
// a sequence number is randomly generated
                      $sequence = rand(1, 1000);
// a timestamp is generated
                      $timeStamp = time();

                      $testMode = "false";
                      if (phpversion() >= '5.1.2') {
                          $fingerprint = hash_hmac("md5", $loginID . "^" . $sequence . "^" . $timeStamp . "^" . $amount . "^", $transactionKey);
                      } else {
                          $fingerprint = bin2hex(mhash(MHASH_MD5, $loginID . "^" . $sequence . "^" . $timeStamp . "^" . $amount . "^", $transactionKey));
                      }
                      $params = array(
                          array('name' => "x_login",
                              'value' => $loginID
                          ),
                          array('name' => "x_amount",
                              'value' => $amount
                          ),
                          array('name' => "x_description",
                              'value' => $description
                          ),
                          array('name' => "x_invoice_num",
                              'value' => $invoice
                          ),
                          array('name' => "x_fp_sequence",
                              'value' => $sequence
                          ),
                          array('name' => "x_fp_timestamp",
                              'value' => $timeStamp
                          ),
                          array('name' => "x_fp_hash",
                              'value' => $fingerprint
                          ),
                          array('name' => "x_test_request",
                              'value' => $testMode
                          ),
                          array('name' => "x_show_form",
                              'value' => "PAYMENT_FORM"
                          )
                      );

                      Fsubmit::form($url, $params);
                  }


                  break;



              default:
                  echo 'Payment Gateway Not Found!';

          }

        }
        else{
            echo 'Sorry Invoice Not Found!';
            exit;
        }

        break;


    case 'ipay_cancel':

        $id  = $routes['2'];
        $token = $routes['3'];
       r2(U."client/iview/$id/$token/",'e','Payment Cancelled!');

        break;

    default:
        echo 'action not defined';
}