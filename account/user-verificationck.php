<?php 
include "../languages/configuration.php"; 
include "../include/config.php";

require '../includes/PHPMailer.php';
require '../includes/SMTP.php';
require '../includes/Exception.php';
//Define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//If user click verification code submit button

if(isset($_POST['check'])){
    $otp_code = mysqli_real_escape_string($conn, $_POST['otp']);
    $check_code = "SELECT * FROM users WHERE code = $otp_code";
    $code_res = mysqli_query($conn, $check_code);
    if(mysqli_num_rows($code_res) > 0){
        $fetch_data = mysqli_fetch_assoc($code_res);
        $fetch_code = $fetch_data['code'];
        $email = $fetch_data['email'];
        $code = 0;
        $status = 'verified';
        $update_otp = "UPDATE users SET code = $code, status = '$status' WHERE code = $fetch_code";
        $update_res = mysqli_query($conn, $update_otp);
        if($update_res){
            header("location: ../account/login.php?success=".$lang['Success7']);
            exit();
        }else{
    header("Location:../account/user-verification.php?error=". $lang['Error19']);
    exit();
        }
    }else{
  header("Location:../account/user-verification.php?error=". $lang['Error21']);
  exit();
    }
}

if(isset($_POST['checkB'])){
    $userid = $_SESSION['userid'];

	$checkUser = "SELECT * FROM users WHERE userid='$userid'";
	$run_sql = mysqli_query($conn, $checkUser);
	if(mysqli_num_rows($run_sql) > 0){
		$code = rand(999999, 111111);
		$insert_code = "UPDATE users SET code = $code WHERE userid = '$userid'";
		$run_query =  mysqli_query($conn, $insert_code);
		if($run_query){

				//Create instance of PHPMailer
				$mail = new PHPMailer();
				//Set mailer to use smtp
				$mail->isSMTP();
				//Define smtp host
				$mail->Host = "smtp.gmail.com";
				//Enable smtp authentication
				$mail->SMTPAuth = true;
				//Set smtp encryption type (ssl/tls)
				$mail->SMTPSecure = "tls";
				//Port to connect smtp
				$mail->Port = "587";
				//Set gmail username
				$mail->Username = "knowgodweb@gmail.com";
				//Set gmail password
				$mail->Password = "Jol@n520";
				//Set UTF8
                $subject = utf8_decode($subject);
                $mail->Subject = $subject;
                $mail->CharSet = 'UTF-8';
				//Email subject
				$mail->Subject = $lang['verificationCode'];
				//Set sender email
				$mail->setFrom('knowgodweb@gmail.com');
				//Enable HTML
				$mail->isHTML(true);
				//Attachment
				$mail->addAttachment('img/attachment.png');
				//Email body
				$mail->Body = 
					$lang['emailVerification1'] . 
					"$userid,</p>" . 
					$lang['emailVerification2'] .
					"$code</p>" .
					$lang['emailVerification3'];
				//Add recipient
				$mail->addAddress('hongen1993@gmail.com');
				//Finally send email
				if ($mail->send()) {
					$_SESSION['email'] = $email;
					header("location:../account/user-verification.php?success=". $lang['Success5']);
					exit();
				} else {
					header("location:../account/user-verification.php?error=". $lang['Error22']);
				}
				//Closing smtp connection
				$mail->smtpClose();
			} else {
				header("location:../account/user-verification.php?error=". $lang['Error20']);
					exit();
			}
	}else{
		header("Location:../account/user-verification.php?error=". $lang['Error18']);
		exit();
	}
}



?>
