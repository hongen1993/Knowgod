<?Php
include "./languages/configuration.php"; 
include "config.php";

$email = "";
$name = "";
$errors = array();

require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


if(isset($_POST['check-email'])){
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$check_email = "SELECT * FROM users WHERE email='$email'";
	$run_sql = mysqli_query($conn, $check_email);
	if(mysqli_num_rows($run_sql) > 0){
		$code = rand(999999, 111111);
		$insert_code = "UPDATE users SET code = $code WHERE email = '$email'";
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
				//Email subject
				$mail->Subject = "Password Reset Code";
				//Set sender email
				$mail->setFrom('knowgodweb@gmail.com');
				//Enable HTML
				$mail->isHTML(true);
				//Attachment
				$mail->addAttachment('img/attachment.png');
				//Email body
				$mail->Body = "<p>Your password reset code is $code</p>";
				//Add recipient
				$mail->addAddress('hongen1993@gmail.com');
				//Finally send email
				if ($mail->send()) {
					$_SESSION['email'] = $email;
					header("location:reset-code.php?error=". $lang['Error19']);
					exit();
				} else {
					$errors['otp-error'] = "Failed while sending code!";
				}
				//Closing smtp connection
				$mail->smtpClose();
			} else {
				$errors['db-error'] = "Something went wrong!";
			}
	}else{
		header("Location:forgot-password.php?error=". $lang['Error18']);
		exit();
	}
}

//If user click verification code submit button

	if(isset($_POST['check'])){
		$_SESSION['info'] = "";
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
				$_SESSION['name'] = $name;
				$_SESSION['email'] = $email;
				header('location: perfil.php');
				exit();
			}else{
				$errors['otp-error'] = "Failed while updating code!";
			}
		}else{
			$errors['otp-error'] = "You've entered incorrect code!";
		}
	}

?>