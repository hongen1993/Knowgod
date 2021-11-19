<?php 
include "../languages/configuration.php"; 
include "../include/config.php";

$conex = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME); 


    if (isset($_POST['title']) && isset($_POST['content'])
    && isset($_POST['link'])) {
        function validate($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $title = validate($_POST['title']);
        $content = validate($_POST['content']);
        $link = validate($_POST['link']);

        if (empty($title)) {
            header("Location:../predications/addPost.php?error=". $lang['postError']);
            exit();
        } elseif (empty($content)) {
            header("Location:../predications/addPost.php?error=". $lang['postError2']);
            exit();
        } elseif (empty($link)) {
            header("Location:../predications/addPost.php?error=". $lang['postError3']);
            exit();
        }
     else {


        $mysqli = ("SELECT * FROM postb WHERE title='$title' " );
        $result = mysqli_query($conex, $mysqli);

        if (mysqli_num_rows($result) > 0) {
            header("Location:../predications/addPostCH.php?error=El título escogido ya existe");
            exit();
        } else {
            $mysqli2 = "INSERT INTO postb(title, content, link) VALUES('$title', '$content', '$link')";
            $result2 = mysqli_query($conex, $mysqli2);
            if ($result2) {
                header("Location:../predications/addPostCH.php?success=Su predicación ha sido añadido exitosamente");
                exit();
            } else {
                header("Location:../predications/addPostCH.php?error=Error desconocido");
                exit();
            }
        }
    }
 } else {
        header("Location:../predications/addPost.php");
        exit();
    }