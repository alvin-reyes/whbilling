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
$ui->assign('_title', 'Settings- '. $config['CompanyName']);
$ui->assign('_pagehead', '<i class="fa fa-cogs lblue"></i> Settings');
$ui->assign('_st', 'Settings');
$ui->assign('_sysfrm_menu', 'settings');
$action = $routes['1'];
$user = User::_info();
$ui->assign('user', $user);
$ui->assign('_user', $user);
if($user['user_type'] != 'Admin'){
    r2(U."dashboard",'e','You do not have permission to access this page');
}
switch ($action) {
    case 'expense-categories':
        if($user['user_type'] != 'Admin'){
            r2(U."dashboard",'e','You do not have permission to access this page');
        }

        $d = ORM::for_table('sys_cats')->where('type','Expense')->order_by_asc('sorder')->find_many();
        $ui->assign('d',$d);
        $ui->assign('xheader', '
<link rel="stylesheet" type="text/css" href="' . $_theme . '/css/liststyle.css"/>
');
        $ui->assign('xjq', Reorder::js('sys_cats'));
        $ui->display('expense-categories.tpl');


        break;

    case 'expense-categories-post':
        if($user['user_type'] != 'Admin'){
            r2(U."dashboard",'e','You do not have permission to access this page');
        }
        $name = _post('name');
        if($name == ''){
            r2(U."settings/expense-categories",'e',$_L['name_error']);
        }
        //check categories already exist
        $c = ORM::for_table('sys_cats')->where('name',$name)->where('type','Expense')->find_one();
        if($c){
            r2(U."settings/expense-categories",'e',$_L['name_exist_error']);
        }
        if($_app_stage == 'Demo'){
            r2(U . 'settings/expense-categories', 'e', 'Sorry! This option is disabled in the demo mode.');
        }
        $d = ORM::for_table('sys_cats')->create();

        $d->name = $name;
        $d->type = 'Expense';
        $d->save();
        r2(U."settings/expense-categories",'s',$_L['added_successful']);
        break;

    case 'income-categories':
        if($user['user_type'] != 'Admin'){
            r2(U."dashboard",'e','You do not have permission to access this page');
        }

        $d = ORM::for_table('sys_cats')->where('type','Income')->order_by_asc('sorder')->find_many();
        $ui->assign('d',$d);
        $ui->assign('xheader', '
<link rel="stylesheet" type="text/css" href="' . $_theme . '/css/liststyle.css"/>
');

        $ui->assign('xjq', Reorder::js('sys_cats'));
        $ui->display('income-categories.tpl');


        break;

    case 'income-categories-post':
        if($user['user_type'] != 'Admin'){
            r2(U."dashboard",'e','You do not have permission to access this page');
        }
        $name = _post('name');
        if($name == ''){
            r2(U."settings/income-categories",'e',$_L['name_error']);
        }
        $c = ORM::for_table('sys_cats')->where('name',$name)->where('type','Income')->find_one();
        if($c){
            r2(U."settings/income-categories",'e',$_L['name_exist_error']);
        }
        if($_app_stage == 'Demo'){
            r2(U . 'settings/income-categories', 'e', 'Sorry! This option is disabled in the demo mode.');
        }
        $d = ORM::for_table('sys_cats')->create();

        $d->name = $name;
        $d->type = 'Income';
        $d->save();
        r2(U."settings/income-categories",'s',$_L['added_successful']);
        break;

    case 'categories-manage':
        if($user['user_type'] != 'Admin'){
            r2(U."dashboard",'e','You do not have permission to access this page');
        }

        $id = $routes[2];
        $d = ORM::for_table('sys_cats')->find_one($id);
        if($d){
            $ui->assign('c',$d);
            $ui->display('categories-edit.tpl');
        }






        break;

    case 'categories-edit-post':
        if($user['user_type'] != 'Admin'){
            r2(U."dashboard",'e','You do not have permission to access this page');
        }
        $id = _post('id');
        $d = ORM::for_table('sys_cats')->find_one($id);
        if($_app_stage == 'Demo'){
            r2(U . 'settings/expense-categories', 'e', 'Sorry! This option is disabled in the demo mode.');
        }
        if($d){
            $otype = $d['type'];
            $rd = strtolower($otype);
            $name = _post('name');
            $c = ORM::for_table('sys_cats')->where('name',$name)->where('type',$otype)->find_one();
            if($c){
                r2(U."settings/$rd-categories",'e',$_L['name_exist_error']);
            }
            $oname = $d['name'];
            $type = $d['type'];
            if($name == ''){
                r2(U."settings/categories-manage/$id",'e',$_L['name_error']);
            }
            else{
                $d->name = $name;
                $d->save();
                //update payee in transactions
                ORM::for_table('sys_transactions')->raw_execute("update sys_transactions set category='$name' where (category='$oname' AND type='$type')");
                r2(U."settings/categories-manage/$id",'s',$_L['edit_successful']);
            }
        }
        break;


    case 'categories-delete':
        if($user['user_type'] != 'Admin'){
            r2(U."dashboard",'e','You do not have permission to access this page');
        }
        $id = $routes[2];
        $d = ORM::for_table('sys_cats')->find_one($id);
        if($d){
            if($_app_stage == 'Demo'){
                r2(U . 'settings/expense-categories', 'e', 'Sorry! This option is disabled in the demo mode.');
            }
            //find all transaction in this category
            $name = $d['name'];
            $type = $d['type'];

            ORM::for_table('sys_transactions')->raw_query("update sys_transactions set category=:cat where category='$name' AND type='$type'", array('cat' => 'Uncategorized'));
            $d->delete();
            if($type == 'Income'){
                r2(U."settings/income-categories",'s',$_L['delete_successful']);
            }
            else{
                r2(U."settings/expense-categories",'s',$_L['delete_successful']);
            }


        }
        break;

    case 'payee':
        if($user['user_type'] != 'Admin'){
            r2(U."dashboard",'e','You do not have permission to access this page');
        }

        $d = ORM::for_table('sys_payee')->order_by_asc('sorder')->find_many();
        $ui->assign('d',$d);
        $ui->assign('xheader', '
<link rel="stylesheet" type="text/css" href="' . $_theme . '/css/liststyle.css"/>
');
        $ui->assign('xfooter', '
<script type="text/javascript" src="' . $_theme . '/js/jquery-ui-1.10.2.custom.min.js"></script>
');
        $ui->assign('xjq', Reorder::js('sys_payee'));
        $ui->display('payee.tpl');


        break;

    case 'payee-manage':
        if($user['user_type'] != 'Admin'){
            r2(U."dashboard",'e','You do not have permission to access this page');
        }

        $id = $routes[2];
        $d = ORM::for_table('sys_payee')->find_one($id);
        if($d){
            $ui->assign('c',$d);
            $ui->display('payee-manage.tpl');
        }


        break;

    case 'payee-edit-post':
        if($user['user_type'] != 'Admin'){
            r2(U."dashboard",'e','You do not have permission to access this page');
        }
        if($_app_stage == 'Demo'){
            r2(U . 'settings/payee', 'e', 'Sorry! This option is disabled in the demo mode.');
        }
        $id = _post('id');
        $d = ORM::for_table('sys_payee')->find_one($id);
        if($d){
            $name = _post('name');
            $c = ORM::for_table('sys_payee')->where('name',$name)->find_one();
            if($c){
                r2(U."settings/payee",'e',$_L['name_exist_error']);
            }

            $oname = $d['name'];

            if($name == ''){
                r2(U."settings/payee-manage/$id",'e',$_L['name_error']);
            }
            else{
                $d->name = $name;
                $d->save();
                //update payee in transactions
                ORM::for_table('sys_transactions')->raw_query("update sys_transactions set payee=:payee where payee='$oname'", array('payee' => $name));
                r2(U."settings/payee-manage/$id",'s',$_L['edit_successful']);
            }
        }

        break;

    case 'payee-post':
        if($user['user_type'] != 'Admin'){
            r2(U."dashboard",'e','You do not have permission to access this page');
        }
        $name = _post('name');
        if($_app_stage == 'Demo'){
            r2(U . 'settings/payee', 'e', 'Sorry! This option is disabled in the demo mode.');
        }
        if($name == ''){
            r2(U."settings/payee",'e',$_L['name_error']);
        }

        $c = ORM::for_table('sys_payee')->where('name',$name)->find_one();
        if($c){
            r2(U."settings/payee",'e',$_L['name_exist_error']);
        }

        $d = ORM::for_table('sys_payee')->create();

        $d->name = $name;

        $d->save();
        r2(U."settings/payee",'s',$_L['added_successful']);
        break;


    case 'payee-delete':
        if($user['user_type'] != 'Admin'){
            r2(U."dashboard",'e','You do not have permission to access this page');
        }
        if($_app_stage == 'Demo'){
            r2(U . 'settings/payee', 'e', 'Sorry! This option is disabled in the demo mode.');
        }
        $id = $routes[2];
        $d = ORM::for_table('sys_payee')->find_one($id);
        if($d){


            $d->delete();


            r2(U."settings/payee",'s',$_L['delete_successful']);
        }
        break;


    case 'payer':

        if($user['user_type'] != 'Admin'){
            r2(U."dashboard",'e','You do not have permission to access this page');
        }
        $d = ORM::for_table('sys_payers')->order_by_asc('sorder')->find_many();
        $ui->assign('d',$d);
        $ui->assign('xheader', '
<link rel="stylesheet" type="text/css" href="' . $_theme . '/css/liststyle.css"/>
');
        $ui->assign('xfooter', '
<script type="text/javascript" src="' . $_theme . '/js/jquery-ui-1.10.2.custom.min.js"></script>
');
        $ui->assign('xjq', Reorder::js('sys_payers'));
        $ui->display('payer.tpl');


        break;

    case 'payer-manage':
        if($user['user_type'] != 'Admin'){
            r2(U."dashboard",'e','You do not have permission to access this page');
        }

        $id = $routes[2];
        $d = ORM::for_table('sys_payers')->find_one($id);
        if($d){
            $ui->assign('c',$d);
            $ui->display('payer-manage.tpl');
        }


        break;

    case 'payer-edit-post':
        if($user['user_type'] != 'Admin'){
            r2(U."dashboard",'e','You do not have permission to access this page');
        }
        if($_app_stage == 'Demo'){
            r2(U . 'settings/payer', 'e', 'Sorry! This option is disabled in the demo mode.');
        }
        $id = _post('id');
        $d = ORM::for_table('sys_payers')->find_one($id);
        if($d){
            $name = _post('name');
            $c = ORM::for_table('sys_payers')->where('name',$name)->find_one();
            if($c){
                r2(U."settings/payer",'e',$_L['name_exist_error']);
            }

            $oname = $d['name'];

            if($name == ''){
                r2(U."settings/payer-manage/$id",'e',$_L['name_error']);
            }
            else{
                $d->name = $name;
                $d->save();

                ORM::for_table('sys_transactions')->raw_query("update sys_transactions set payer=:payer where payer='$oname'", array('payer' => $name));
                r2(U."settings/payer-manage/$id",'s',$_L['edit_successful']);
            }
        }

        break;

    case 'payer-post':
        if($user['user_type'] != 'Admin'){
            r2(U."dashboard",'e','You do not have permission to access this page');
        }
        if($_app_stage == 'Demo'){
            r2(U . 'settings/payer', 'e', 'Sorry! This option is disabled in the demo mode.');
        }
        $name = _post('name');
        if($name == ''){
            r2(U."settings/payer",'e',$_L['name_error']);
        }

        $c = ORM::for_table('sys_payers')->where('name',$name)->find_one();
        if($c){
            r2(U."settings/payer",'e',$_L['name_exist_error']);
        }

        $d = ORM::for_table('sys_payers')->create();

        $d->name = $name;

        $d->save();
        r2(U."settings/payer",'s',$_L['added_successful']);
        break;

    case 'payer-delete':
        if($user['user_type'] != 'Admin'){
            r2(U."dashboard",'e','You do not have permission to access this page');
        }
        if($_app_stage == 'Demo'){
            r2(U . 'settings/payer', 'e', 'Sorry! This option is disabled in the demo mode.');
        }
        $id = $routes[2];
        $d = ORM::for_table('sys_payers')->find_one($id);
        if($d){


            $d->delete();


            r2(U."settings/payer",'s',$_L['delete_successful']);
        }
        break;
    case 'pmethods':
        if($user['user_type'] != 'Admin'){
            r2(U."dashboard",'e','You do not have permission to access this page');
        }

        $d = ORM::for_table('sys_pmethods')->order_by_asc('sorder')->find_many();
        $ui->assign('d',$d);
        $ui->assign('xheader', '
<link rel="stylesheet" type="text/css" href="' . $_theme . '/css/liststyle.css"/>
');
        $ui->assign('xfooter', '
<script type="text/javascript" src="' . $_theme . '/js/jquery-ui-1.10.2.custom.min.js"></script>
');
        $ui->assign('xjq', Reorder::js('sys_pmethods'));
        $ui->display('pmethods.tpl');


        break;

    case 'pmethods-manage':
        if($user['user_type'] != 'Admin'){
            r2(U."dashboard",'e','You do not have permission to access this page');
        }

        $id = $routes[2];
        $d = ORM::for_table('sys_pmethods')->find_one($id);
        if($d){
            $ui->assign('c',$d);
            $ui->display('pmethods-manage.tpl');
        }


        break;

    case 'pmethods-edit-post':
        if($user['user_type'] != 'Admin'){
            r2(U."dashboard",'e','You do not have permission to access this page');
        }
        if($_app_stage == 'Demo'){
            r2(U . 'settings/pmethods', 'e', 'Sorry! This option is disabled in the demo mode.');
        }
        $id = _post('id');
        $d = ORM::for_table('sys_pmethods')->find_one($id);
        if($d){
            $name = _post('name');
            $c = ORM::for_table('sys_pmethods')->where('name',$name)->find_one();
            if($c){
                r2(U."settings/pmethods",'e',$_L['name_exist_error']);
            }

            $oname = $d['name'];

            if($name == ''){
                r2(U."settings/pmethods-manage/$id",'e',$_L['name_error']);
            }
            else{
                $d->name = $name;
                $d->save();

                ORM::for_table('sys_transactions')->raw_query("update sys_transactions set pmethod=:pmethod where pmethod='$oname'", array('pmethod' => $name));
                r2(U."settings/pmethods-manage/$id",'s',$_L['edit_successful']);
            }
        }

        break;

    case 'pmethods-post':
        if($user['user_type'] != 'Admin'){
            r2(U."dashboard",'e','You do not have permission to access this page');
        }
        if($_app_stage == 'Demo'){
            r2(U . 'settings/pmethods', 'e', 'Sorry! This option is disabled in the demo mode.');
        }
        $name = _post('name');
        if($name == ''){
            r2(U."settings/pmethods",'e',$_L['name_error']);
        }

        $c = ORM::for_table('sys_pmethods')->where('name',$name)->find_one();
        if($c){
            r2(U."settings/pmethods",'e',$_L['name_exist_error']);
        }

        $d = ORM::for_table('sys_pmethods')->create();

        $d->name = $name;

        $d->save();
        r2(U."settings/pmethods",'s',$_L['added_successful']);
        break;


    case 'pmethods-delete':
        if($user['user_type'] != 'Admin'){
            r2(U."dashboard",'e','You do not have permission to access this page');
        }
        if($_app_stage == 'Demo'){
            r2(U . 'settings/pmethods', 'e', 'Sorry! This option is disabled in the demo mode.');
        }
        $id = $routes[2];
        $d = ORM::for_table('sys_pmethods')->find_one($id);
        if($d){


            $d->delete();


            r2(U."settings/pmethods",'s',$_L['delete_successful']);
        }
        break;


    case 'app':
        if($user['user_type'] != 'Admin'){
            r2(U."dashboard",'e','You do not have permission to access this page');
        }
        $timezonelist = Timezone::timezoneList();
        $ui->assign('tlist',$timezonelist);

        //find email settings

        $e = ORM::for_table('sys_emailconfig')->find_one('1');
        $ui->assign('e',$e);

        $ui->assign('xheader', '
<link rel="stylesheet" type="text/css" href="' . $_theme . '/lib/select2/select2.css"/>
');
        $ui->assign('xfooter', '
<script type="text/javascript" src="' . $_theme . '/lib/select2/select2.min.js"></script>
');

        $ui->assign('xjq', '

        function _check_e_method(){
        var emethod = $( "#email_method" ).val();
        if(emethod == "phpmail"){
         $("#a_hide").hide();
        }
        else{
         $("#a_hide").show();
        }
        }
_check_e_method();
$( "#email_method" ).change(function() {
 _check_e_method();
});
 $("#tzone").select2();


 ');

        $ui->display('app-settings.tpl');

        break;

    case 'users':
        if($user['user_type'] != 'Admin'){
            r2(U."dashboard",'e','You do not have permission to access this page');
        }
        $ui->assign('xfooter', '
<script type="text/javascript" src="ui/lib/c/users.js"></script>
');
        $d = ORM::for_table('sys_users')->find_many();
        $ui->assign('d',$d);
        $ui->display('users.tpl');

        break;

    case 'users-add':
        if($user['user_type'] != 'Admin'){
            r2(U."dashboard",'e','You do not have permission to access this page');
        }

        $ui->display('users-add.tpl');

        break;

    case 'users-edit':
        $ui->assign('_sysfrm_menu', 'my_account');

        $id  = $routes['2'];
        $d = ORM::for_table('sys_users')->find_one($id);
        if($d){

            $ui->assign('d',$d);
            $ui->display('users-edit.tpl');

        }
        else{
            r2(U . 'settings/users', 'e', $_L['Account_Not_Found']);
        }

        break;

    case 'users-delete':


        $id  = $routes['2'];
        //prevent self delete
        if(($user['id']) == $id){
            r2(U . 'settings/users', 'e', 'Sorry You can\'t delete yourself');
        }
        $d = ORM::for_table('sys_users')->find_one($id);
        if($d){

            $d->delete();
            r2(U . 'settings/users', 's', 'User deleted Successfully');
        }
        else{
            r2(U . 'settings/users', 'e', $_L['Account_Not_Found']);
        }

        break;

    case 'users-post':


        $username = _post('username');
        $fullname = _post('fullname');
        $password = _post('password');
        $cpassword = _post('cpassword');
        $user_type = _post('user_type');
        $msg = '';
        if(Validator::Email($username) == false){
            $msg .= 'Please use a valid Email address as Username'. '<br>';
        }
        if(Validator::Length($fullname,26,2) == false){
            $msg .= 'Full Name should be between 3 to 25 characters'. '<br>';
        }
        if(!Validator::Length($password,15,5)){
            $msg .= 'Password should be between 6 to 15 characters'. '<br>';

        }
        if($password != $cpassword){
            $msg .= 'Passwords does not match'. '<br>';
        }
//check with same name account is exist
        $d = ORM::for_table('sys_users')->where('username',$username)->find_one();
        if($d){
            $msg .= $_L['account_already_exist']. '<br>';
        }




        if($msg == ''){

            $password = Password::_crypt($password);
            // Add Account
            $d = ORM::for_table('sys_users')->create();
            $d->username = $username;
            $d->password = $password;
            $d->fullname = $fullname;
            $d->user_type = $user_type;
            $d->save();
            r2(U . 'settings/users', 's', $_L['account_created_successfully']);
        }
        else{
            r2(U . 'settings/users-add', 'e', $msg);
        }

        break;


    case 'users-edit-post':


        $username = _post('username');
        $fullname = _post('fullname');
        $password = _post('password');
        $cpassword = _post('cpassword');



        $msg = '';
        if(Validator::Email($username) == false){
            $msg .= 'Please use a valid Email address as Username'. '<br>';
        }
        if(Validator::Length($fullname,26,2) == false){
            $msg .= 'Full Name should be between 3 to 25 characters'. '<br>';
        }
        if($password != ''){
            if(!Validator::Length($password,15,5)){
                $msg .= 'Password should be between 6 to 15 characters'. '<br>';

            }
            if($password != $cpassword){
                $msg .= 'Passwords does not match'. '<br>';
            }
        }
        //find this user
        $id = _post('id');
        $d = ORM::for_table('sys_users')->find_one($id);
        if($d){

        }
        else{
            $msg .= 'Username Not Found'. '<br>';
        }
//check with same name account is exist
        if($d['username'] != $username){
            $c = ORM::for_table('sys_users')->where('username',$username)->find_one();
            if($c){
                $msg .= $_L['account_already_exist']. '<br>';
            }
        }






        if($msg == ''){


            // Add Account

            $d->username = $username;
            if($password != ''){
                $password = Password::_crypt($password);
                $d->password = $password;
            }

            $d->fullname = $fullname;
            if(($user['id']) != $id){
                $user_type = _post('user_type');
                $d->user_type = $user_type;
            }

            $d->save();
            r2(U . 'settings/users', 's', 'User Updated Successfully');
        }
        else{
            r2(U . 'settings/users-edit/'.$id, 'e', $msg);
        }

        break;

    case 'app-post':
        if($_app_stage == 'xDemo'){
            r2(U . 'settings/app', 'e', 'Sorry! This option is disabled in the demo mode.');
        }
        $company = _post('company');
        $theme = _post('theme');

        $nstyle = _post('nstyle');
        if($company == '' OR $theme == '' OR $nstyle == ''){
            r2(U.'settings/app','e','All Fields are Required');
        }

        //check if email is posted as smtp


        else{
            $d = ORM::for_table('sys_appconfig')->where('setting','CompanyName')->find_one();
            $d->value = $company;
            $d->save();

            $d = ORM::for_table('sys_appconfig')->where('setting','theme')->find_one();
            $d->value = $theme;
            $d->save();

            $d = ORM::for_table('sys_appconfig')->where('setting','nstyle')->find_one();
            $d->value = $nstyle;
            $d->save();



            $caddress = $_POST['caddress'];
            $d = ORM::for_table('sys_appconfig')->where('setting','caddress')->find_one();
            $d->value = $caddress;
            $d->save();

            r2(U.'settings/app','s','Settings Saved Successfully');
        }


        break;

    case 'eml-post':
        if($_app_stage == 'xDemo'){
            r2(U . 'settings/app', 'e', 'Sorry! This option is disabled in the demo mode.');
        }



        $sysemail = _post('sysemail');
        if(Validator::Email($sysemail) == false){
            r2(U.'settings/emls/','e','Invalid System Email');
        }

        $d = ORM::for_table('sys_appconfig')->where('setting','sysEmail')->find_one();
        $d->value = $sysemail;
        $d->save();
        $email_method = _post('email_method');
        $e = ORM::for_table('sys_emailconfig')->find_one('1');
        if($email_method == 'smtp'){

            $smtp_user = _post('smtp_user');
            $smtp_host = _post('smtp_host');
            $smtp_password = _post('smtp_password');
            $smtp_port = _post('smtp_port');
            $smtp_secure = _post('smtp_secure');
            if($smtp_user == '' OR $smtp_password == '' OR $smtp_port == '' OR $smtp_host == ''){
                r2(U.'settings/emls/','e','SMTP Username, Password and Port is required');
            }
            else{
                $e->method = 'smtp';
                $e->host = $smtp_host;
                $e->username = $smtp_user;
                $e->password = $smtp_password;
                $e->port = $smtp_port;
                $e->secure = $smtp_secure;
            }
        }
        else{
            $e->method = 'phpmail';
        }
        $e->save();
        r2(U.'settings/emls/','s','Settings Saved Successfully');



        break;

    case 'lc-post':
        if($_app_stage == 'xDemo'){
            r2(U . 'settings/app', 'e', 'Sorry! This option is disabled in the demo mode.');
        }

        $rtl = _post('rtl');

        if($rtl != '1'){
            $rtl = '0';
        }

        $tzone = _post('tzone');
        $d = ORM::for_table('sys_appconfig')->where('setting','timezone')->find_one();
        $d->value = $tzone;
        $d->save();

        $country = _post('country');
        $d = ORM::for_table('sys_appconfig')->where('setting','country')->find_one();
        $d->value = $country;
        $d->save();

        $dec_point = $_POST['dec_point'];
        if(strlen($dec_point) == '1'){
            $d = ORM::for_table('sys_appconfig')->where('setting','dec_point')->find_one();
            $d->value = $dec_point;
            $d->save();
        }

        $thousands_sep = $_POST['thousands_sep'];
        if(strlen($thousands_sep) == '1'){
            $d = ORM::for_table('sys_appconfig')->where('setting','thousands_sep')->find_one();
            $d->value = $thousands_sep;
            $d->save();
        }

        $currency_code = $_POST['currency_code'];

        $d = ORM::for_table('sys_appconfig')->where('setting','currency_code')->find_one();
        $d->value = $currency_code;
        $d->save();

        $d = ORM::for_table('sys_appconfig')->where('setting','rtl')->find_one();
        $d->value = $rtl;
        $d->save();

        $df = _post('df');
        $d = ORM::for_table('sys_appconfig')->where('setting','df')->find_one();
        $d->value = $df;
        $d->save();

        $lan = _post('lan');
        $d = ORM::for_table('sys_appconfig')->where('setting','language')->find_one();
        $d->value = $lan;
        $d->save();


        r2(U.'settings/localisation/','s','Settings Saved Successfully');



        break;

    case 'change-password':
        $ui->assign('_sysfrm_menu', 'my_account');
        $ui->display('change-password.tpl');

        break;

    case 'change-password-post':

        $password = _post('password');
        if($password != ''){
            $d = ORM::for_table('sys_users')->where('username',$user['username'])->find_one();
            if($d){
                $d_pass = $d['password'];
                if(Password::_verify($password,$d_pass) == true){

                    $npass = _post('npass');
                    $cnpass = _post('cnpass');
                    if(!Validator::Length($npass,15,5)){
                        r2(U.'settings/change-password','e','New Password must be 6 to 14 character');

                    }
                    if($npass != $cnpass){
                        r2(U.'settings/change-password','e','Both Password should be same');
                    }

                    if($_app_stage == 'xDemo'){
                        r2(U.'settings/change-password','e','Sorry! Changing Password is disabled in the demo mode.');
                    }

                    $npass = Password::_crypt($npass);
                    $d->password = $npass;
                    $d->save();
                    _msglog('s','Password changed successfully, Please login again');

                    r2(U.'login');

                }
                else{
                    r2(U.'settings/change-password','e','Incorrect Current Password');
                }
            }
            else{

                r2(U.'settings/change-password','e','Incorrect Current Password');
            }
        }
        else{
            r2(U.'settings/change-password','e','Incorrect Current Password');
        }


        break;

    case 'networth_goal':

        $goal = _post('goal');

        if((is_numeric($goal)) AND $goal != ''){
            $d = ORM::for_table('sys_appconfig')->where('setting','networth_goal')->find_one();
            $d->value = $goal;
            $d->save();
            _msglog('s','New Goal has been set.');
        }
        else{
            _msglog('e','Invalid Number');
        }

        break;

    case 'email-templates':
        $d = ORM::for_table('sys_email_templates')->find_many();
        $ui->assign('d',$d);
        $ui->assign('xheader', '
<link rel="stylesheet" type="text/css" href="ui/lib/sn/summernote.css"/>
<link rel="stylesheet" type="text/css" href="ui/lib/sn/summernote-bs3.css"/>
<link rel="stylesheet" type="text/css" href="' . $_theme . '/css/modal.css"/>
<link rel="stylesheet" type="text/css" href="ui/lib/sn/summernote-sysfrm.css"/>
');
        $ui->assign('xfooter', '
 <script type="text/javascript" src="' . $_theme . '/lib/modal.js"></script>
  <script type="text/javascript" src="ui/lib/sn/summernote.min.js"></script>
 <script type="text/javascript" src="ui/lib/jslib/email-templates.js"></script>
');
        $ui->display('email-templates.tpl');
        break;

    case 'email-templates-view':

        $sid = $routes['2'];
        $d = ORM::for_table('sys_email_templates')->find_one($sid);
        if($d){
            $ui->assign('d',$d);

            $s_yes = '';
            $s_no = '';
            if(($d['send']) == 'No'){
                $s_no = 'selected="selected"';
            }

            if(($d['send']) == 'Yes'){
                $s_yes = 'selected="selected"';
            }

            echo '
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h3>'.$d['tplname'].'</h3>
</div>
<div class="modal-body">

<form class="form-horizontal" role="form" id="edit_form" method="post">

<div class="form-group">
    <label for="subject" class="col-sm-2 control-label">Subject</label>
    <div class="col-sm-10">
      <input type="text" id="subject" name="subject" class="form-control" value="'.$d['subject'].'">
    </div>
  </div>


   <div class="form-group">
    <label for="message" class="col-sm-2 control-label">Message Body</label>
    <div class="col-sm-10">
      <textarea id="message" name="message" class="form-control sysedit" rows="10">'.$d['message'].'</textarea>
      <input type="hidden" id="sid" name="id" value="'.$d['id'].'">
    </div>
  </div>
  <div class="form-group">
    <label for="name" class="col-sm-2 control-label">Send</label>
    <div class="col-sm-10">
      <select name="send" id="send" class="form-control">
                              <option value="Yes" '.$s_yes.'>Yes</option>
                              <option value="No" '.$s_no.'>No</option>

                          </select>
    </div>
  </div>
</form>

</div>
<div class="modal-footer">
	<button id="update" class="btn btn-primary">Save</button>

		<button type="button" data-dismiss="modal" class="btn">Close</button>
</div>';
        }
        else{
            exit('Template Not Found');
        }





        break;

    case 'update-email-template':
        $id = _post('id');
        $d = ORM::for_table('sys_email_templates')->find_one($id);
        if($d){
            $message = $_POST['message'];
            $subject = $_POST['subject'];
            $send = _post('send');
            if($message == '' OR $subject == ''){
                echo 'Invalid Data';
            }
            else{
                $d->subject = $subject;
                $d->send = $send;
                $d->message = $message;

                $d->save();
                echo 'Data Updated';
            }

        }
        else{
            echo 'Sorry Data not Found';
        }

        break;

    case 'tags':

        $d = ORM::for_table('sys_tags')->find_many();
        $ui->assign('d',$d);

        $ui->assign('xjq', '
$(".cdelete").click(function (e) {
        e.preventDefault();
        var id = this.id;
        bootbox.confirm("Are you sure?", function(result) {
           if(result){
               var _url = $("#_url").val();
               window.location.href = _url + "delete/tags/" + id;
           }
        });
    });

 ');


        $ui->display('tags.tpl');


        break;

    case 'features':


        break;

    case 'logo-post':

        $validextentions = array("jpeg", "jpg", "png");
        $temporary = explode(".", $_FILES["file"]["name"]);
        $file_extension = end($temporary);
        $file_name = '';
        if(($_FILES["file"]["type"] == "image/png")){
            $file_name = 'logo-tmp.png';
        }
        elseif(($_FILES["file"]["type"] == "image/jpg")){
            $file_name = 'logo-tmp.jpg';
        }
        elseif(($_FILES["file"]["type"] == "image/jpeg")){
            $file_name = 'logo-tmp.jpeg';
        }
        elseif(($_FILES["file"]["type"] == "image/gif")){
            $file_name = 'logo-tmp.gif';
        }
        else{

        }
        if ((($_FILES["file"]["type"] == "image/png")
                || ($_FILES["file"]["type"] == "image/jpg")
                || ($_FILES["file"]["type"] == "image/jpeg"))
            && ($_FILES["file"]["size"] < 1000000)//approx. 100kb files can be uploaded
            && in_array($file_extension, $validextentions)){
            move_uploaded_file($_FILES["file"]["tmp_name"], 'sysfrm/uploads/system/'. $file_name);
            $image = new Image();
            $image->source_path = 'sysfrm/uploads/system/'. $file_name;
            $image->target_path = 'sysfrm/uploads/system/logo.png';
            $image->resize('0','40',ZEBRA_IMAGE_BOXED,'-1');

            //now delete the tmp image

            unlink('sysfrm/uploads/system/'. $file_name);

            r2(U.'settings/app','s','Settings Saved Successfully');
        }

        else{

            r2(U.'settings/app','e','Invalid Logo File');

        }


        break;


    case 'localisation':

        if($user['user_type'] != 'Admin'){
            r2(U."dashboard",'e','You do not have permission to access this page');
        }
        $ui->assign('countries',Countries::all($config['country'])); // may add this $config['country_code']
        $timezonelist = Timezone::timezoneList();
        $ui->assign('tlist',$timezonelist);



        $ui->assign('xheader', '
<link rel="stylesheet" type="text/css" href="' . $_theme . '/lib/select2/select2.css"/>
');
        $ui->assign('xfooter', '
<script type="text/javascript" src="' . $_theme . '/lib/select2/select2.min.js"></script>
');

        $ui->assign('xjq', '
 $("#tzone").select2();
 $("#country").select2();

 ');

        $ui->display('localisation.tpl');

        break;


    case 'emls':

        if($user['user_type'] != 'Admin'){
            r2(U."dashboard",'e','You do not have permission to access this page');
        }


        //find email settings

        $e = ORM::for_table('sys_emailconfig')->find_one('1');
        $ui->assign('e',$e);


        $ui->assign('xjq', '

        function _check_e_method(){
        var emethod = $( "#email_method" ).val();
        if(emethod == "phpmail"){
         $("#a_hide").hide();
        }
        else{
         $("#a_hide").show();
        }
        }
_check_e_method();
$( "#email_method" ).change(function() {
 _check_e_method();
});
 ');

        $ui->display('emls.tpl');

        break;


    case 'automation':

        if($user['user_type'] != 'Admin'){
            r2(U."dashboard",'e','You do not have permission to access this page');
        }


        $cs = ORM::for_table('sys_schedule')->find_many();
        foreach($cs as $rcs)
        {
            $arcs[$rcs['cname']]=$rcs['val'];
        }
        $ui->assign('arcs',$arcs);

        $ui->assign('xheader', '
<link rel="stylesheet" type="text/css" href="ui/lib/bootstrap-switch/bootstrap-switch.css"/>
');
        $ui->assign('xfooter', '
<script type="text/javascript" src="ui/lib/bootstrap-switch/bootstrap-switch.min.js"></script>
');

        $ui->assign('xjq', '
            $(".sys_csw").bootstrapSwitch();
 ');


        $ui->display('automation.tpl');

        break;


    case 'pg':

        if($user['user_type'] != 'Admin'){
            r2(U."dashboard",'e','You do not have permission to access this page');
        }




        $d = ORM::for_table('sys_pg')->order_by_asc('sorder')->find_many();
        $ui->assign('d',$d);

        $ui->assign('xheader', '
<link rel="stylesheet" type="text/css" href="' . $_theme . '/lib/select2/select2.css"/>
');
        $ui->assign('xfooter', '
<script type="text/javascript" src="' . $_theme . '/lib/select2/select2.min.js"></script>
');

        $ui->assign('xjq', '


 ');

        $ui->display('pg.tpl');

        break;


    case 'pg-conf':
        $pg = $routes['2'];
        $d = ORM::for_table('sys_pg')->find_one($pg);
        if($d){
            $ui->assign('xfooter', '
<script type="text/javascript" src="' . $_theme . '/lib/pg.js"></script>
');
            $ui->assign('d',$d);
            $ui->display('pg-conf.tpl');

        }
        else{
            echo 'PG Not Found';
        }

        break;


    case 'pg-post':
        $pg = _post('pgid');
        $d = ORM::for_table('sys_pg')->find_one($pg);
        if($d){
            $d->value = _post('value');
            $d->status = _post('status');
            $d->c1 = _post('c1');
            $d->c2 = _post('c2');
            $d->c3 = _post('c3');
            $d->c4 = _post('c4');
            $d->c5 = _post('c5');
            $d->save();
            _msglog('s','Data Updated!');
            echo $pg;
        }
        else{
            echo 'PG Not Found';
        }

        break;

    case 'add-tax':

        $ui->display('add-tax.tpl');
        break;

    case 'add-tax-post':
        $taxname = _post('taxname');
        $taxrate = _post('taxrate');
        if($taxname == '' OR $taxrate ==''){
            r2(U.'settings/add-tax/','e','All Fields is Required.');
        }
        if(!is_numeric($taxrate)){
            r2(U.'settings/add-tax/','e','Invalid TAX Rate.');
        }

        $d = ORM::for_table('sys_tax')->create();
        $d->name = $taxname;
        $d->rate = $taxrate;
        $d->save();
        r2(U.'tax/list/','s','New TAX Added.');
        break;

    case 'edit-tax':
        $tid = $routes['2'];
        $d = ORM::for_table('sys_tax')->find_one($tid);
        if($d){
            $ui->assign('d',$d);
            $ui->display('edit-tax.tpl');
        }
        else{
            r2(U.'tax/list/','e','TAX Not Found');
        }

        break;

    case 'edit-tax-post':

        $tid = _post('tid');
        $d = ORM::for_table('sys_tax')->find_one($tid);
        if($d){
            $taxname = _post('taxname');
            $taxrate = _post('taxrate');
            if($taxname == '' OR $taxrate ==''){
                r2(U.'settings/edit-tax/'.$tid.'/','e','All Fields is Required.');
            }
            if(!is_numeric($taxrate)){
                r2(U.'settings/edit-tax/'.$tid.'/','e','Invalid TAX Rate.');
            }

            $d->name = $taxname;
            $d->rate = $taxrate;
            $d->save();
            r2(U.'settings/edit-tax/'.$tid.'/','s','TAX Saved.');
        }
        else{
            r2(U.'tax/list/','e','TAX Not Found');
        }

        break;

    case 'consolekey_regen':

        $nkey = _raid('10');

        $d = ORM::for_table('sys_appconfig')->where('setting','ckey')->find_one();
        $d->value = $nkey;
        $d->save();
        r2(U.'settings/automation/','s','New Key Generated. Please Make Sure to Update The CRON Jobs.');
        break;

    case 'automation-post':
        $accounting_snapshot = _post('accounting_snapshot');
        $d = ORM::for_table('sys_schedule')->where('cname', 'accounting_snapshot')->find_one();
        if ($accounting_snapshot == 'on') {
            $d->val = 'Active';
        } else {
            $d->val = 'Inactive';
        }
        $d->save();

        $recurring_invoice = _post('recurring_invoice');
        $d = ORM::for_table('sys_schedule')->where('cname', 'recurring_invoice')->find_one();
        if ($recurring_invoice == 'on') {
            $d->val = 'Active';
        } else {
            $d->val = 'Inactive';
        }
        $d->save();

        $notify = _post('notify');
        $notifyemail = _post('notifyemail');
        if($notify == 'on'){
            //need valid notify email
            if(Validator::Email($notifyemail) == false){
                r2(U.'settings/automation/','e','Please Use a valid Email Address to enable Notification');
            }
        }
        $d = ORM::for_table('sys_schedule')->where('cname', 'notify')->find_one();
        if ($notify == 'on') {
            $d->val = 'Active';
        } else {
            $d->val = 'Inactive';
        }
        $d->save();


        $d = ORM::for_table('sys_schedule')->where('cname', 'notifyemail')->find_one();
        $d->val = $notifyemail;
        $d->save();

        r2(U.'settings/automation/','s','Settings Saved Successfully.');
        break;

    default:
        echo 'action not defined';
}