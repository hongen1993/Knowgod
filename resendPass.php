<?php 
include "./languages/configuration.php"; 
include "config.php";

$email = "";
$name = "";
$errors = array();

require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';
//Define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['check-reset-optB'])){
        $email = mysqli_real_escape_string($conn, $_SESSION['email']);
        $check_email = "SELECT * FROM users WHERE email='$email'";
        $run_sqlB = mysqli_query($conn, $check_email);
        if(mysqli_num_rows($run_sqlB) > 0){
            $codeB = rand(999999, 111111);
            $insert_codeB = "UPDATE users SET code = $codeB WHERE email = '$email'";
            $run_queryB =  mysqli_query($conn, $insert_codeB);
            if($run_queryB){
    
                    //Create instance of PHPMailer
                    $mailB = new PHPMailer();
                    //Set mailer to use smtp
                    $mailB->isSMTP();
                    //Define smtp host
                    $mailB->Host = "smtp.gmail.com";
                    //Enable smtp authentication
                    $mailB->SMTPAuth = true;
                    //Set smtp encryption type (ssl/tls)
                    $mailB->SMTPSecure = "tls";
                    //Port to connect smtp
                    $mailB->Port = "587";
                    //Set gmail username
                    $mailB->Username = "knowgodweb@gmail.com";
                    //Set gmail password
                    $mailB->Password = "Jol@n520";
                    //Email subject
                    $mailB->Subject = $lang['passResetCode'];
                    //Set sender email
                    $mailB->setFrom('knowgodweb@gmail.com');
                    //Enable HTML
                    $mailB->isHTML(true);
                    //Attachment
                    $mail->addAttachment('img/attachment.png');
                    //Email body
                    $mailB->Body = $lang['passResetCodeBody'] . "$code</p>";
                    //Add recipient
                    $mailB->addAddress('hongen1993@gmail.com');
                    //Finally send email
                    if ($mailB->send()) {
                        $_SESSION['email'] = $email;
                        header("location:reset-code.php?success=". $lang['Success5']);
                        exit();
                    } else {
                        header("location:forgot-password.php?error=". $lang['Error22']);
                    }
                    //Closing smtp connection
                    $mail->smtpClose();
                } else {
                    header("location:forgot-password.php?error=". $lang['Error20']);
                        exit();
                }
        }else{
            header("Location:forgot-password.php?error=". $lang['Error18']);
            exit();
        }
    }
	
	
?>
