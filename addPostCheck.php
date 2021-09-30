<?php 
include "./languages/configuration.php"; 
include "config.php";

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
            header("Location:addPost.php?error=Escriba el titúlo de la predicación");
            exit();
        } elseif (empty($content)) {
            header("Location:addPost.php?error=Escriba breve contenido de la predicación");
            exit();
        } elseif (empty($link)) {
            header("Location:addPost.php?error=Escriba el link de la predicación");
            exit();
        }
     else {


        $mysqli = ("SELECT * FROM post WHERE title='$title' " );
        $result = mysqli_query($conex, $mysqli);

        if (mysqli_num_rows($result) > 0) {
            header("Location:addPost.php?error=El título escogido ya existe");
            exit();
        } else {
            $mysqli2 = "INSERT INTO post(title, content, link) VALUES('$title', '$content', '$link')";
            $result2 = mysqli_query($conex, $mysqli2);
            if ($result2) {
                header("Location:addPost.php?success=Su predicación ha sido añadido exitosamente");
                exit();
            } else {
                header("Location:addPost.php?error=Error desconocido");
                exit();
            }
        }
    }
 } else {
        header("Location:./addPost.php");
        exit();
    }