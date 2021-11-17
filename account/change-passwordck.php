<?Php
include "languages/configuration.php"; 
include "config.php";

require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$todo=$_POST['todo'];
$password=$_POST['password'];
$password2=$_POST['password2'];
$old_password=$_POST['old_password'];

if(isset($todo) and $todo=="change-password"){

    $status = "OK";
                
    $count=$dbo->prepare("select password from users where userid=:userid");
    $count->bindParam(":userid",$_SESSION['userid'],PDO::PARAM_STR, 15);
    $count->execute();
    $row = $count->fetch(PDO::FETCH_OBJ);


    if($row->password<>md5($old_password)){
        header("Location:change-password.php?error=". $lang['Error1']);
        exit();
        $status= "NOTOK";
    }					

    if(strlen($password)<3){
        header("Location:change-password.php?error=". $lang['Error2']);
        exit();
        $status= "NOTOK";
    }					

    if($password<>$password2){
        header("Location:change-password.php?error=". $lang['Error3']);
        exit();
        $status= "NOTOK";
    }					

    if($status<>"OK"){ 
    }else{

    $password=md5($password);
    $sql=$dbo->prepare("update users set password=:password where userid='$_SESSION[userid]'");
    $sql->bindParam(':password',$password,PDO::PARAM_STR, 32);

        if($sql->execute()){
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
				$mail->Subject = $lang['emailPass'];
				//Set sender email
				$mail->setFrom('knowgodweb@gmail.com');
				//Enable HTML
				$mail->isHTML(true);
				//Attachment
				$mail->addAttachment('img/attachment.png');
				//Email body
				$mail->Body = 
                    $lang['emailPassBody'];
                    $lang['emailPassBody2'];
				//Add recipient
				$mail->addAddress($email);
				//Finally send email
				if ($mail->send()) {
					header("Location:perfil.php?success=". $lang['Success']);
                    exit();
				} else {
					header("location:change-passwordck.php?error=". $lang['Error22']);
				}
				//Closing smtp connection
				$mail->smtpClose();
            
        }else{
            header("Location:change-password.php?error=". $lang['Error4']);
            exit();
        }
    }
}

?>