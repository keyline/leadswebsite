<?php

namespace App\Helpers;

// Include PHPMailer classes directly
var_dump(file_exists('/vendor/phpmailer/phpmailer/src/PHPMailer.php'));
die('end');
require_once 'vendor/phpmailer/src/PHPMailer.php';
require_once 'vendor/phpmailer/src/SMTP.php';
require_once 'vendor/phpmailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

class SmtpMail
{

    public static function send($to, $toName, $subject, $body)
    {

        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP(); // Send using SMTP
            $mail->Host       = SMTP_HOST;
            $mail->SMTPAuth   = true; // Enable SMTP authentication
            $mail->Username   = SMTP_USER;
            $mail->Password   = SMTP_PASS;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;  #ENCRYPTION_STARTTLS // Enable TLS encryption
            $mail->Port       = '465';

            // Recipients
            $mail->setFrom(SET_FROM,SET_NAME);
            $mail->addAddress($to, $toName); // Add a recipient

            // Content
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $body;

            $mail->send();
            return true; // Email sent successfully
        } catch (Exception $e) {
            error_log("Message could not be sent. Mailer Error: {$mail->ErrorInfo}. Exception: {$e->getMessage()}");
            throw $e; // Email sending failed
        }
    }

    // GOOGLE SMTP
    // public static function send($to, $toName, $subject, $body)
    // {
    //     $mail = new PHPMailer(true);

    //     try {
    //         // Server settings
    //         $mail->SMTPDebug = 2;
    //         $mail->isSMTP();                                     // Send using SMTP
    //         $mail->Host       = 'smtp.gmail.com';                // Gmail SMTP server
    //         $mail->SMTPAuth   = false;                            // Enable SMTP authentication
    //         $mail->Username   = 'shubhadip.sinha@keylines.net';          // Your Gmail address
    //         $mail->Password   = 'shubhadip@123';                 // Your Gmail password (or App Password)
    //         $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // Enable TLS encryption (use ENCRYPTION_SMTPS for SSL)
    //         $mail->Port       = '587';                             // TCP port to connect to (use 465 for SSL)

    //         // Recipients
    //         $mail->setFrom('shubhadip.sinha@keylines.net', 'shubha');  // Sender's email and name
    //         $mail->addAddress($to, $toName);                     // Add a recipient

    //         // Content
    //         $mail->isHTML(true);                                 // Set email format to HTML
    //         $mail->Subject = $subject;
    //         $mail->Body    = $body;

    //         // Send the email
    //         $mail->send();
    //         return true; // Email sent successfully
    //     } catch (Exception $e) {
    //         error_log("Message could not be sent. Mailer Error: {$mail->ErrorInfo}. Exception: {$e->getMessage()}");
    //         throw $e; // Email sending failed
    //     }
    // }
}
