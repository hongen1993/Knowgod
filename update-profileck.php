<?Php
include "languages/configuration.php"; 
include "config.php";

$todo=$_POST['todo'];
$name=$_POST['name'];
$surname=$_POST['surname'];
$address=$_POST['address'];
$email=$_POST['email'];
$gender=$_POST['gender'];

    if (isset($todo) and $todo=="update-profile") {

        $status = "OK";

        if (strlen($name) < 1) {
            header("Location:update-profile.php?error=". $lang['Error5']);
            $status= "NOTOK";
        }else if(strlen($surname) < 1){
            header("Location:update-profile.php?error=". $lang['Error6']);
            $status= "NOTOK";
        }else if(strlen($address) < 1){
            header("Location:update-profile.php?error=". $lang['Error7']);
            $status= "NOTOK";
        }else if(strlen($email) < 1){
            header("Location:update-profile.php?error=". $lang['Error8']);
            $status= "NOTOK";
        }
        // you can add email validation here if required.
        // The code for email validation is available at www.plus2net.com

        if ($status=="OK") {

            $sql=$dbo->prepare("update users set name=:name,surname=:surname,address=:address,email=:email,gender=:gender where userid='$_SESSION[userid]'");
            
            $sql->bindParam(':name', $name, PDO::PARAM_STR, 25);
            $sql->bindParam(':surname',$surname,PDO::PARAM_STR);
            $sql->bindParam(':address',$address,PDO::PARAM_STR);
            $sql->bindParam(':email', $email, PDO::PARAM_STR, 15);
            $sql->bindParam(':gender',$gender,PDO::PARAM_STR);

            if ($sql->execute()) {
                header("Location:perfil.php?success=". $lang['Success2']);
                exit();    
            }
            else {
                print_r($sql->errorInfo());
                header("Location:update-profile.php?error=". $lang['Error4']);
            }
        }
    }

?>