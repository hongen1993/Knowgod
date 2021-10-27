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

    $subject = $_POST['subject'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    //Create instance of PHPMailer
    $mail = new PHPMailer();
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
    $mail->setFrom('knowgodweb@gmail.com');
    //Enable HTML
    $mail->isHTML(true);
    //Attachment
    $mail->addAttachment('img/attachment.png');
    //Content
    $mail->isHTML(true);                                  
    //Set email format to HTML
    $mail->Body    = $message;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    //Add recipient
    $mail->addAddress('hongen1993@gmail.com');
    //Finally send email

    if ($mail->send()) {
      header("location: contactUs.php?success=".$lang['Success4']);
      exit();
    } else {
      header("location: contactUs.php?error=".$lang['Error23']);
    }
    //Closing smtp connection
    $mail->smtpClose();
    }else{
        header('location:contactUs.php');
    }
?>