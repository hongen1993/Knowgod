<?Php
include "languages/configuration.php"; 
include "config.php";

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
            header("Location:perfil.php?success=". $lang['Success']);
            exit();
        }else{
            header("Location:change-password.php?error=". $lang['Error4']);
            exit();
        }
    }
}

?>