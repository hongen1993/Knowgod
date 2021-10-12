<?Php
include "./languages/configuration.php"; 
include "config.php";

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

      $sql=$dbo->prepare("insert into users(userid,password,email,name,surname,address,gender) values(:userid,:password,:email,:name,:surname,:address,:gender)");
      $sql->bindParam(':userid',$userid,PDO::PARAM_STR, 15);
      $sql->bindParam(':password',$password,PDO::PARAM_STR, 32);
      $sql->bindParam(':email',$email,PDO::PARAM_STR, 75);
      $sql->bindParam(':name',$name,PDO::PARAM_STR);
      $sql->bindParam(':surname',$surname,PDO::PARAM_STR);
      $sql->bindParam(':address',$address,PDO::PARAM_STR);
      $sql->bindParam(':gender',$gender,PDO::PARAM_STR);
      
      if($sql->execute()){
    /////////////////Posting confirmation mail ///////////////

        $em="netflix1993hsb@gmail.com";
        $headers4=$em;
        $headers="";
        $headers.="Reply-to: $headers4\n";
        $headers .= "From: $headers4\n";
        $headers .= "Errors-to: $headers4\n";
        $headers = "Content-Type: text/html; charset=iso-8859-1\n".$headers;

        $content="Your login details from ******  \n\n";
        $content .="User ID= $userid \n";
        $content .="Password = $password_original \n";

        $sub="Your login details";
        //mail($email,"$sub",$content,$headers);

        header("Location:login.php?success=". $lang['Success3']);

      }else{
        print_r($sql->errorInfo()); 
        header("Location:signup.php?error=". $lang['Error4']);

      }
    }
  }
?>
