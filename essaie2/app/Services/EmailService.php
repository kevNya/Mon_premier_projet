<?php

namespace App\Services;
use PHPMailer\PHPMailer\PHPMailer;

class EmailService{
    protected $app_name;
    protected $username;
    protected $password;
    protected $port;
    protected $host;

    function __construct(){//ces variables se trouvent à la base dans le fichiers "env" donc on aurait pu juste mettre <<env('APP_NAME', ''),>> par exemple

        $this->app_name= config('app.name');//'name' => env('APP_NAME', ''),
        $this->host= config('app.mail_host');//'mail_host' => env('MAIL_HOST', ''),
        $this->port=  env('MAIL_PORT'); //exemple avec juste env
        $this->username= config('app.mail_username');//'mail_username' => env('MAIL_USERNAME', ''),
        $this->password= config('app.mail_password');//'mail_password' => env('MAIL_PASSWORD', ''),
    }

    public function sendEmail($subject, $emailUser, $nameUser, $isHtml, $message){
        $mail= new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->Host = $this->host;
        $mail->Port = $this->port;
        $mail->Username = $this->username;
        $mail->Password = $this->password;
        $mail->SMTPAuth = true;
        $mail->Subject = $subject;
        $mail->setFrom($this->app_name, $this->app_name);
        $mail->addReplyTo($this->app_name, $this->app_name);
        $mail->addAddress($emailUser, $nameUser);
        $mail->isHTML($isHtml);
        $mail->Body = $message;
        $mail->send();
    }


}
