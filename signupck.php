<?Php
include "./languages/configuration.php"; 
include "config.php";

//Include required PHPMailer files
require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';
//Define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$userid=$_POST['userid'];
$password=$_POST['password'];
$password2=$_POST['password2'];
$agree=$_POST['agree'];
$todo=$_POST['todo'];
$name=$_POST['name'];
$surname=$_POST['surname'];
$address=$_POST['address'];
$email=$_POST['email'];
$gender=$_POST['gender'];

  if(isset($todo) and $todo=="post"){

    $status = "OK";

    if(!isset($userid) or strlen($userid) <3){
      header("Location:signup.php?error=". $lang['Error9']);
      exit();
      $status= "NOTOK";
    }

    if(!ctype_alnum($userid)){
      header("Location:signup.php?error=". $lang['Error10']);
      exit();
      $status= "NOTOK";
    }

    $count=$dbo->prepare("select userid from users where userid=:userid");
    $count->bindParam(":userid",$userid);
    $count->execute();
    $no=$count->rowCount();

    if($no >0 ){
      header("Location:signup.php?error=". $lang['Error11']);
      exit();
      $status= "NOTOK";
    }

    $count=$dbo->prepare("select email from users where email=:email");
    $count->bindParam(":email",$email);
    $count->execute();
    $no=$count->rowCount();

    if($no >0 ){
      header("Location:signup.php?error=". $lang['Error12']);
      exit();
      $status= "NOTOK";
    }

    if ( strlen($password) < 3 ){
      header("Location:signup.php?error=". $lang['Error2']);
      exit();
      $status= "NOTOK";
    }

    if ( $password <> $password2 ){
      header("Location:signup.php?error=". $lang['Error3']);
      exit();    
      $status= "NOTOK";
    }

    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
      header("Location:signup.php?error=". $lang['Error13']);
      exit();
      $status="NOTOK";
    }

    if ($agree<>"yes") {
      header("Location:signup.php?error=". $lang['Error14']);
      exit();
      $status= "NOTOK";
    }

    if($status=="OK"){
      $password_original = $password;
      $password=md5($password);
      $code = rand(999999, 111111);
      $status = "notverified";

      $sql=$dbo->prepare("insert into users(userid, password, email, name, surname, address, gender, code, status)
                          values(:userid, :password, :email, :name, :surname, :address, :gender, :code, :status)");
      $sql->bindParam(':userid',$userid,PDO::PARAM_STR, 15);
      $sql->bindParam(':password',$password,PDO::PARAM_STR, 32);
      $sql->bindParam(':email',$email,PDO::PARAM_STR, 75);
      $sql->bindParam(':name',$name,PDO::PARAM_STR);
      $sql->bindParam(':surname',$surname,PDO::PARAM_STR);
      $sql->bindParam(':address',$address,PDO::PARAM_STR);
      $sql->bindParam(':gender',$gender,PDO::PARAM_STR);
      $sql->bindParam(':code',$code,PDO::PARAM_STR);
      $sql->bindParam(':status',$status,PDO::PARAM_STR);


      
      if($sql->execute()){
    /////////////////Posting confirmation mail ///////////////

        //Create instance of PHPMailer
        $mailVerification = new PHPMailer();
        //Set mailer to use smtp
        $mailVerification->isSMTP();
        //Define smtp host
        $mailVerification->Host = "smtp.gmail.com";
        //Enable smtp authentication
        $mailVerification->SMTPAuth = true;
        //Set smtp encryption type (ssl/tls)
        $mailVerification->SMTPSecure = "tls";
        //Port to connect smtp
        $mailVerification->Port = "587";
        //Set gmail username
        $mailVerification->Username = "knowgodweb@gmail.com";
        //Set gmail password
        $mailVerification->Password = "Jol@n520";
        //Set UTF8
        $subject = utf8_decode($subject);
        $mail->Subject = $subject;
        $mail->CharSet = 'UTF-8';
        //Email subject
        $mailVerification->Subject = $lang['verificationCode'];
        //Set sender email
        $mailVerification->setFrom('knowgodweb@gmail.com');
        //Enable HTML
        $mailVerification->isHTML(true);
        //Attachment
        $mailVerification->addAttachment('img/attachment.png');
        //Email body
        $mailVerification->Body = 
          $lang['emailVerification1'] . 
          "$userid,</p>" . 
          $lang['emailVerification2'] .
          "$code</p>" .
          $lang['emailVerification3'];
        //Add recipient
        $mailVerification->addAddress('hongen1993@gmail.com');
        //Finally send email

        if ($mailVerification->send()) {
          $_SESSION['userid'] = $userid;
          $_SESSION['password'] = $password;
          header("location: user-verification.php?success=".$lang['Success3']);
          exit();
        } else {
          header("location: signup.php?error=".$lang['Error22']);
        }
        //Closing smtp connection
        $mailVerification->smtpClose();
      }else{
        print_r($sql->errorInfo()); 
        header("Location:signup.php?error=". $lang['Error4']);

      }
    }
  }

?>
