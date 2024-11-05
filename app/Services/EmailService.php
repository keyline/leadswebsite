<?php

namespace App\Services;

use CodeIgniter\Email\Email;
use Exception;

class EmailService
{
    protected $email;

    public function __construct()
    {
        $this->email = \Config\Services::email();
        $this->email->SMTPHost = SMTP_HOST;
        $this->email->SMTPUser = SMTP_USER;
        $this->email->SMTPPass = SMTP_PASS;
        $this->email->SMTPPort = SMTP_PORT;
        $this->email->SMTPCrypto = 'tls';
        // $this->email->protocol = 'smtp';
        $this->email->mailType = 'html';
    }

    // public function sendEmail($to, $subject, $body)
    // {
    //     $this->email->setTo($to);
    //     $this->email->setCC(CLIENT_CC_MAIL);
    //     $this->email->setFrom(SET_FROM, SET_NAME);
    //     $this->email->setSubject($subject);
    //     $this->email->setMessage($body);

    //     try {
    //         return $this->email->send();
    //     } catch (Exception $error) {
    //         return $error;
    //     }
    // }

    public function sendEmail($to_email, $email_subject, $mailbody)
    {
        $email              = \Config\Services::email();
        $from_email         = 'no-reply@victoriatravels.com';
        $from_name          = 'Victoria Travels Pvt Ltd';
        $email->setFrom($from_email, $from_name);
        $email->setTo($to_email);
        $email->setCC('system@keylines.net', 'Victoria Travels');
        // $email->setCC('info@ecoex.market', 'Ecoex Portal');
        $email->setSubject($email_subject);
        $email->setMessage($mailbody);
        $email->send();
        return true;
    }
}
