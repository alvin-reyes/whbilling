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
$ui->assign('_sysfrm_menu', 'accounts');
$ui->assign('_title', 'Accounts- '. $config['CompanyName']);
$ui->assign('_st', 'Accounts');
$action = $routes['1'];
$user = User::_info();
$ui->assign('user', $user);
switch ($action) {
    case 'add':

        $ui->assign('countries',Countries::all()); // may add this $config['country_code']
        $ui->assign('xheader', '
<link rel="stylesheet" type="text/css" href="' . $_theme . '/lib/select2/select2.css"/>

');
        $ui->assign('xfooter', '
<script type="text/javascript" src="' . $_theme . '/lib/select2/select2.min.js"></script>
<script type="text/javascript" src="' . $_theme . '/lib/add-account.js"></script>

');
        $ui->assign('xjq', '
 $("#country").select2();
 ');

        $ui->display('add-account.tpl');






        break;

    case 'summary':

        $cid = _post('cid');
        $d = ORM::for_table('crm_accounts')->find_one($cid);
        if($d){
            $ui->display('ajax.account-summary.tpl');
        }
        else{

        }


        break;

    case 'activity':


        $cid = _post('cid');
        $d = ORM::for_table('crm_accounts')->find_one($cid);
        if($d){
            $ac = ORM::for_table('sys_activity')->where('cid',$cid)->limit(20)->order_by_desc('id')->find_many();
            $ui->assign('ac',$ac);
            $ui->display('ajax.activity.tpl');
        }
        else{

        }


        break;


    case 'invoices':


        $cid = _post('cid');
        $d = ORM::for_table('crm_accounts')->find_one($cid);
        if($d){
            $ui->display('ajax.account-invoices.tpl');
        }
        else{

        }


        break;


    case 'transactions':


        $cid = _post('cid');
        $d = ORM::for_table('crm_accounts')->find_one($cid);
        if($d){
            $ui->display('ajax.account-summary.tpl');
        }
        else{

        }


        break;


    case 'edit':


        $cid = _post('cid');
        $d = ORM::for_table('crm_accounts')->find_one($cid);
        if($d){
            $ui->assign('countries',Countries::all($d['country']));
            $ui->assign('d',$d);
            $ui->display('ajax.account-edit.tpl');
        }
        else{

        }


        break;



    case 'add-activity-post':

        $cid = _post('cid');
        $msg = $_POST['msg'];
        $icon = $_POST['icon'];
        $icon = trim($icon);
        //<a href="#"><i class="fa fa-camera"></i></a>

        $icon = str_replace('<a href="#"><i class="','',$icon);
        $icon = str_replace('"></i></a>','',$icon);
        if($icon == ''){
            $icon = 'fa fa-check';
        }

        if(Validator::Length($msg,1000,5) == false){
            echo 'Message Should be between 5 to 1000 characters';
        }
        else{
            $d = ORM::for_table('sys_activity')->create();
            $d->cid = $cid;
            $d->msg = $msg;
            $d->icon = $icon;
            $d->stime = time();
            $d->sdate = date('Y-m-d');
            $d->o = $user['id'];
            $d->oname = $user['fullname'];
            $d->save();

            echo $cid;
        }

        break;


    case 'activity-delete':

        $id = $routes['3'];
        $d = ORM::for_table('sys_activity')->find_one($id);
        $d->delete();
        $cid = $routes['2'];
        r2(U.'accounts/view/'.$cid,'s','Deleted Successfully');
        break;

    case 'view':
        $id  = $routes['2'];
        $d = ORM::for_table('crm_accounts')->find_one($id);
        if($d){

            //find all activity for this user
            $ac = ORM::for_table('sys_activity')->where('cid',$id)->limit(20)->order_by_desc('id')->find_many();
            $ui->assign('ac',$ac);


            $ui->assign('xheader', '
<link rel="stylesheet" type="text/css" href="' . $_theme . '/lib/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="sysfrm/vendors/imgcrop/assets/css/croppic.css"/>

');
            $ui->assign('xfooter', '
<script type="text/javascript" src="' . $_theme . '/lib/select2/select2.min.js"></script>
<script type="text/javascript" src="sysfrm/vendors/imgcrop/croppic.js"></script>
<script type="text/javascript" src="' . $_theme . '/lib/profile.js"></script>

');

            $ui->assign('xjq', '


 ');
            $ui->assign('d',$d);
            $ui->display('account-profile-alt.tpl');

        }
        else{
            r2(U . 'customers/list', 'e', $_L['Account_Not_Found']);
        }

        break;

    case 'add-post':

        $account = _post('account');
        $email = _post('email');
        $phone = _post('phone');
        $tags = _post('tags');
        $address = _post('address');
        $city = _post('city');
        $state = _post('state');
        $zip = _post('zip');
        $country = _post('country');
        $msg = '';

//check if tag is already exisit



        if($account == ''){
            $msg .= 'Account Name is required <br>';
        }

//check account is already exist
        $chk = ORM::for_table('crm_accounts')->where('account',$account)->find_one();
        if($chk){
            $msg .= 'Account already exist <br>';
        }

//        if($address == ''){
//            $msg .= 'Address is required <br>';
//        }
//        if($city == ''){
//            $msg .= 'City is required <br>';
//        }
//        if($state == ''){
//            $msg .= 'State is required <br>';
//        }
//        if($zip == ''){
//            $msg .= 'ZIP is required <br>';
//        }
//        if($country == ''){
//            $msg .= 'Country is required <br>';
//        }
        if($email != ''){
            if(Validator::Email($email) == false){
                $msg .= 'Invalid Email <br>';
            }
            $f = ORM::for_table('sys_accounts')->where('email',$email)->find_one();

            if($f){
                $msg .= 'Email already exist <br>';
            }
        }
        if($phone != ''){
            if(!is_numeric($phone)){
                $msg .= 'Invalid Phone <br>';
            }
        }

        if($msg == ''){
            if($tags != ''){
                $pieces = explode(',', $tags);
                foreach($pieces as $element)
                {
                    $tg = ORM::for_table('sys_tags')->where('text',$element)->find_one();
                    if(!$tg){
                        $tc = ORM::for_table('sys_tags')->create();
                        $tc->text = $element;
                        $tc->type = 'Accounts';
                        $tc->save();
                    }
                }
            }

            $d = ORM::for_table('sys_accounts')->create();

            $d->account = $account;
            $d->email = $email;
            $d->phone = $phone;
            $d->address = $address;
            $d->city = $city;
            $d->zip = $zip;
            $d->state = $state;
            $d->country = $country;
            $d->save();
            echo $d->id();
        }
        else{
            echo $msg;
        }
        break;

    case 'list':
        $paginator = Paginator::bootstrap('sys_accounts');
        $d = ORM::for_table('sys_accounts')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
        $ui->assign('d',$d);
        $ui->assign('paginator',$paginator);
        $ui->assign('xheader', '
<link rel="stylesheet" type="text/css" href="' . $_theme . '/lib/gridster/jquery.gridster.min.css"/>

');
        $ui->assign('xfooter', '
<script type="text/javascript" src="' . $_theme . '/lib/gridster/jquery.gridster.min.js"></script>
<script type="text/javascript" src="' . $_theme . '/lib/notes.js"></script>

');
        $ui->display('notes.tpl');
        break;


    case 'edit-post':
        $id = _post('cid');
        $d = ORM::for_table('sys_accounts')->find_one($id);
        if($d){

            $account = _post('account');

            $email = _post('email');
            $tags = _post('tags');
            $phone = _post('phone');
            $address = _post('address');
            $city = _post('city');
            $state = _post('state');
            $zip = _post('zip');
            $country = _post('country');
            $msg = '';

            if($account == ''){
                $msg .= 'Account Name is required <br>';
            }
            if($tags != ''){
                $pieces = explode(',', $tags);
                foreach($pieces as $element)
                {
                    $tg = ORM::for_table('sys_tags')->where('text',$element)->find_one();
                    if(!$tg){
                        $tc = ORM::for_table('sys_tags')->create();
                        $tc->text = $element;
                        $tc->type = 'Accounts';
                        $tc->save();
                    }
                }
            }


            //check email already exist




//            if($address == ''){
//                $msg .= 'Address is required <br>';
//            }
//            if($city == ''){
//                $msg .= 'City is required <br>';
//            }
//            if($state == ''){
//                $msg .= 'State is required <br>';
//            }
//            if($zip == ''){
//                $msg .= 'ZIP is required <br>';
//            }
//            if($country == ''){
//                $msg .= 'Country is required <br>';
//            }
            if($email != ''){
                if($email != ($d['email'])){
                    $f = ORM::for_table('sys_accounts')->where('email',$email)->find_one();

                    if($f){
                        $msg .= 'Email already exist <br>';
                    }
                }
                if(Validator::Email($email) == false){
                    $msg .= 'Invalid Email <br>';
                }
            }
            if($phone != ''){
                if(!is_numeric($phone)){
                    $msg .= 'Invalid Phone <br>';
                }
            }

            if($msg == ''){


                $d = ORM::for_table('sys_accounts')->find_one($id);
                $d->account = $account;


                $d->email = $email;
                $d->tags = $tags;
                $d->phone = $phone;
                $d->address = $address;
                $d->city = $city;
                $d->zip = $zip;
                $d->state = $state;
                $d->country = $country;
                $d->save();
                echo $d->id();
            }
            else{
                echo $msg;
            }

        }
        else{
            r2(U . 'customers/list', 'e', $_L['Account_Not_Found']);
        }

        break;
    case 'delete':
        $id = $routes['2'];
        if($_app_stage == 'Demo'){
            r2(U . 'accounts/list', 'e', 'Sorry! Deleting Account is disabled in the demo mode.');
        }
        $d = ORM::for_table('sys_accounts')->find_one($id);
        if($d){
            $d->delete();
            r2(U . 'accounts/list', 's', $_L['account_delete_successful']);
        }

        break;


    case 'more':
        $cid = _post('cid');
        $d = ORM::for_table('sys_accounts')->find_one($cid);
        if($d){
            $ui->assign('countries',Countries::all($d['country']));
            $ui->assign('d',$d);
            $ui->display('ajax.account-more.tpl');
        }
        else{

        }


        break;

    case 'edit-more':

        $id = _post('cid');
        $d = ORM::for_table('sys_accounts')->find_one($id);
        if($d){
            $img = _post('picture');
            $facebook = _post('facebook');
            $google = _post('google');
            $linkedin = _post('linkedin');

            $msg = '';



            //check email already exist





            if($msg == ''){


                $d = ORM::for_table('sys_accounts')->find_one($id);

                $d->img = $img;
                $d->facebook = $facebook;
                $d->google = $google;
                $d->linkedin = $linkedin;
                $d->save();
                echo $d->id();
            }
            else{
                echo $msg;
            }

        }
        else{
            r2(U . 'customers/list', 'e', $_L['Account_Not_Found']);
        }


        break;


    case 'edit-notes':

        $id = _post('cid');
        $d = ORM::for_table('sys_accounts')->find_one($id);
        if($d){

            $notes = _post('notes');

            $msg = '';



            //check email already exist





            if($msg == ''){


                $d = ORM::for_table('sys_accounts')->find_one($id);


                $d->notes = $notes;
                $d->save();
                echo $d->id();
            }
            else{
                echo $msg;
            }

        }
        else{
            r2(U . 'customers/list', 'e', $_L['Account_Not_Found']);
        }


        break;

    case 'render-address':
        $cid = _post('cid');
        $d = ORM::for_table('sys_accounts')->find_one($cid);
        $address = $d['address'];
        $city = $d['city'];
        $state = $d['state'];
        $zip = $d['zip'];
        $country = $d['country'];
        echo "$address
$city
$state $zip
$country
";
        break;



    default:
        echo 'action not defined';
}