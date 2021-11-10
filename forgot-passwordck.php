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
                //Set UTF8
                $subject = utf8_decode($subject);
                $mail->Subject = $subject;
                $mail->CharSet = 'UTF-8';
				//Email subject
				$mail->Subject = $lang['passResetCode'];
				//Set sender email
				$mail->setFrom('knowgodweb@gmail.com');
				//Enable HTML
				$mail->isHTML(true);
				//Attachment
				$mail->addAttachment('img/attachment.png');
				//Email body
				$mail->Body = $lang['passResetCodeBody'] . "$code</p>";
				//Add recipient
				$mail->addAddress($email);
				//Finally send email
				if ($mail->send()) {
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

//If user click check reset otp button

    if (isset($_POST['check-reset-otp'])) {
        $otp_code = mysqli_real_escape_string($conn, $_POST['otp']);
        $check_code = "SELECT * FROM users WHERE code = $otp_code";
        $code_res = mysqli_query($conn, $check_code);
        if (mysqli_num_rows($code_res) > 0) {
            $fetch_data = mysqli_fetch_assoc($code_res);
            $email = $fetch_data['email'];
            $_SESSION['email'] = $email;
			header("Location:new-password.php?success=". $lang['Success6']);
            exit();
        } else {
			header("Location:forgot-password.php?error=". $lang['Error22']);
			exit();
        }
    }



//If user click change password button

    if(isset($_POST['change-password'])){
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $password2 = mysqli_real_escape_string($conn, $_POST['password2']);
        if($password !== $password2){
			header("Location:new-password.php?error=". $lang['Error3']);
			exit();
        }else{
            $code = 0;
            $email = $_SESSION['email']; //getting this email using session
			$password=md5($password);
            $update_pass = "UPDATE users SET code = $code, password = '$password' WHERE email = '$email'";
            $run_query = mysqli_query($conn, $update_pass);
            if($run_query){
				header("Location:login.php?success=". $lang['Success']);
            	exit();
            }else{
                $errors['db-error'] =  $lang['emailPassFail'];
				header("Location:new-password.php?error=". $lang['Error4']);
				exit();
            }
        }
    }

    if(isset($_POST['checkC'])){
        $email = $_SESSION['email'];
    
        $checkUser = "SELECT * FROM users WHERE email='$email'";
        $run_sql = mysqli_query($conn, $checkUser);
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
                    //Set UTF8
                    $subject = utf8_decode($subject);
                    $mail->Subject = $subject;
                    $mail->CharSet = 'UTF-8';
                    //Email subject
                    $mail->Subject = $lang['passResetCode'];
                    //Set sender email
                    $mail->setFrom('knowgodweb@gmail.com');
                    //Enable HTML
                    $mail->isHTML(true);
                    //Attachment
                    $mail->addAttachment('img/attachment.png');
                    //Email body
                    $mail->Body = $lang['passResetCodeBody'] . "$code</p>";
                    //Add recipient
                    $mail->addAddress('hongen1993@gmail.com');
                    //Finally send email
                    if ($mail->send()) {
                        $_SESSION['email'] = $email;
                        header("location:reset-code.php?success=". $lang['Success5']);
                        exit();
                    } else {
                        header("location:reset-code.php?error=". $lang['Error22']);
                    }
                    //Closing smtp connection
                    $mail->smtpClose();
                } else {
                    header("location:reset-code.php?error=". $lang['Error20']);
                        exit();
                }
        }else{
            header("Location:reset-code.php?error=". $lang['Error18']);
            exit();
        }
    }
?>