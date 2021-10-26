<?php
include "languages/configuration.php"; 

//Include required PHPMailer files
require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';

//Define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


    if (isset($_POST['contactUs'])) {
    $mail = new PHPMailer(true);

    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    //Create instance of PHPMailer
    $mailVerification = new PHPMailer();
    //Set mailer to use smtp
    $mail->isSMTP();
    //Define smtp host
    $mail->Host = 'smtp.gmail.com';
    //Enable smtp authentication
    $mail->SMTPAuth = true;
    //Set smtp encryption type (ssl/tls)
    $mail->SMTPSecure = 'tls';
    //Port to connect smtp
    $mail->Port = "587";
    //Set gmail username
    $mail->Username = 'knowgodweb@gmail.com';
    //Set gmail password
    $mail->Password = 'Jol@n520';
    //Set UTF8
    $subject = utf8_decode($subject);
    $mail->Subject = $subject;
    $mail->CharSet = 'UTF-8';
    //Set sender email
    $mailVerification->setFrom('knowgodweb@gmail.com');
    //Enable HTML
    $mailVerification->isHTML(true);
    //Attachment
    $mailVerification->addAttachment('img/attachment.png');
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = $message;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    //Add recipient
    $mailVerification->addAddress('hongen1993@gmail.com');
    //Finally send email

    if ($mailVerification->send()) {
      header("location: contactUs.php?success=".$lang['Success8']);
      exit();
    } else {
      header("location: contactUs.php?error=".$lang['Error23']);
    }
    //Closing smtp connection
    $mailVerification->smtpClose();
    }else{
        header('location:contactUs.php');
    }
?>