<?php

Class Notify_Email
{


    protected $contents;
    protected $values = array();

    public static function _init()
    {
        global $config;
        $sysEmail = $config['sysEmail'];
        $sysCompany = $config['CompanyName'];
        $mail = new PHPMailer();
        //check for smtp
        $e = ORM::for_table('sys_emailconfig')->find_one('1');
        if($e['method'] == 'smtp'){
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = $e['host'];  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = $e['username'];               // SMTP username
            $mail->Password = $e['password'];                        // SMTP password
            $mail->SMTPSecure = $e['secure'];                             // Enable TLS encryption, `ssl` also accepted
            $mail->Port = $e['port'];
        }
        $mail->SetFrom($sysEmail, $sysCompany);
        $mail->AddReplyTo($sysEmail, $sysCompany);
        return $mail;
    }


    public static function _log($userid, $email, $subject, $message, $iid='0')
    {
        $date = date('Y-m-d H:i:s');
        $d = ORM::for_table('sys_email_logs')->create();
        $d->userid = $userid;
        $d->email = $email;
        $d->subject = $subject;
        $d->message = $message;
        $d->date = $date;
        $d->iid = $iid;
        $d->save();
        $id = $d->id();
        return $id;

    }


    public static function _send($name,$to,$subject,$message,$uid='0',$iid='0'){
        $mail = self::_init();
        $mail->AddAddress($to, $name);
        $mail->Subject = $subject;
        $mail->MsgHTML($message);
        $mail->Send();
        //add log
        self::_log($uid,$to,$subject,$message,$iid);


    }

    public static function _test()
    {
        $mail = self::_init();
        $email = 'donotreply@bdinfosys.com';
        $mail_subject = 'Test Email';
        $name = 'Razib';
        $body = 'Hello this is test email body';
        $mail->AddAddress($email, $name);
        $mail->Subject = $mail_subject;
        $mail->MsgHTML($body);
        $mail->Send();

    }

    public static function _otp($otp,$name,$email)
    {
        $mail = self::_init();
        global $config;

        $sysCompany = $config['CompanyName'];
        $mail_subject = $sysCompany . ' OTP (One Time Password)';

        $body = 'Your '.$sysCompany.' password has been verified and OTP is required to proceed further. Your current session OTP is '.$otp.' and only valid for this session. If you didn\'t login, please contact us immediately.';
        $mail->AddAddress($email, $name);
        $mail->Subject = $mail_subject;
        $mail->MsgHTML($body);
        $mail->Send();

    }

   

   }