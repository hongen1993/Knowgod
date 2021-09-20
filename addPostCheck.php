<?php 
include "languages/configuration.php"; 
include "db_conn.php";

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

    } else {
        header("Location:addPost.php");
        exit();
    }