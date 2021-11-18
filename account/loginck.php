<?Php
include "../languages/configuration.php"; 
include "../include/config.php";

$userid=$_POST['userid'];
$password=$_POST['password'];

$status='OK';

$count=$dbo->prepare("select password,mem_id,userid from users where userid=:userid");
$count->bindParam(":userid",$userid,PDO::PARAM_STR);

    if($count->execute()){
        $no=$count->rowCount();
        if($no <> 1 ) {
            header("Location:../account/login.php?error=". $lang['Error15']);
            exit();
        }else {
            $row = $count->fetch(PDO::FETCH_OBJ);
            if ($row->password==md5($password)) {
                $_SESSION['id']=session_id();
                $_SESSION['userid']=$row->userid;
                $_SESSION['mem_id']=$row->mem_id;
                header("Location:../account/perfil.php");
                exit();
            }else{
                header("Location:../account/login.php?error=". $lang['Error16']);
                exit();
            }
        }
    }else{
        header("Location:../account/login.php?error=". $lang['Error4']);
        exit();
    }
    ?>