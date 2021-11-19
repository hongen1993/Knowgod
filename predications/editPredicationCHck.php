<?Php
include "../languages/configuration.php"; 
include "../include/config.php";

$todo=$_POST['todo'];
$id=$_POST['id'];
$title=$_POST['title'];
$link=$_POST['link'];
$content=$_POST['content'];

    if (isset($todo) and $todo=="edit-predicationB") {

        $status = "OK";

        if (strlen($title) < 1) {
            header("Location:../predications/editPredicationCH.php?error=". $lang['Error24']);
            $status= "NOTOK";
        }else if(strlen($link) < 1){
            header("Location:../predications/editPredicationCH.php?error=". $lang['Error25']);
            $status= "NOTOK";
        }else if(strlen($content) < 1){
            header("Location:../predications/editPredicationCH.php?error=". $lang['Error26']);
            $status= "NOTOK";
        }

        if ($status=="OK") {

            $sqlPredication=$dbo->prepare("UPDATE postb SET title=:title,link=:link,content=:content WHERE id='$id'");
            $sqlPredication->bindParam(':title', $title, PDO::PARAM_STR);
            $sqlPredication->bindParam(':link',$link,PDO::PARAM_STR);
            $sqlPredication->bindParam(':content',$content,PDO::PARAM_STR);

            if ($sqlPredication->execute()) {            
                header("Location:../pages/predicationsCH.php?success=". $lang['Success8']);
                exit();    
            }
            else {
                print_r($sqlPredication->errorInfo());
                header("Location:../predications/editPredicationCH.php?error=". $lang['Error4']);
            }
        }
    }

?>