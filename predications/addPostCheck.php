<?php 
include "../languages/configuration.php"; 
include "../include/config.php";

$title = $_POST['title'];
$link = $_POST['link'];
$todo=$_POST['todo'];
$content = $_POST['content'];

    if (isset($todo) and $todo=="post") {
        $status = "OK";

        if (!isset($title)) {
            header("Location:../predications/addPost.php?error=". $lang['postError']);
            exit();
            $status= "NOTOK";
        }

        $count=$dbo->prepare("SELECT title FROM post WHERE title='$title'");
        $count->bindParam(":title", $title);
        $count->execute();
        $no=$count->rowCount();

        if (!isset($link)) {
            header("Location:../predications/addPost.php?error=". $lang['postError2']);
            exit();
            $status= "NOTOK";
        }

        $count=$dbo->prepare("SELECT link FROM post WHERE link='$link'");
        $count->bindParam(":link", $link);
        $count->execute();
        $no=$count->rowCount();

        if (!isset($content)) {
            header("Location:../predications/addPost.php?error=". $lang['postError2']);
            exit();
            $status= "NOTOK";
        }

        if ($no >0) {
            header("Location:../predications/addPost.php?error=". $lang['postError4']);
            exit();
            $status= "NOTOK";
        }

        if ($status=="OK") {
            $sql=$dbo->prepare("insert into post(title, link, content)values(:title, :link, :content)");
            $sql->bindParam(':title', $title, PDO::PARAM_STR);
            $sql->bindParam(':link', $link, PDO::PARAM_STR);
            $sql->bindParam(':content', $content, PDO::PARAM_STR);
            
            if ($sql->execute()) {
                header("Location:../predications/addPost.php?success=". $lang['postSuccess']);
                exit();
            } else {
                header("Location:../predications/addPost.php?error=". $lang['postError5']);
                exit();
            }
        } else {
            print_r($sql->errorInfo());
            header("Location:../predications/addPost.php");
            exit();
        }
    }