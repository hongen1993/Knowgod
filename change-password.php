<?Php
include "languages/configuration.php"; 
include "config.php";
if (isset($_SESSION['id']) && isset($_SESSION['userid'])) {
    ?>
<!DOCTYPE html>
<html lang="es">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title><?php echo $lang['editPerfil'] ?></title>
     <link rel="stylesheet" type="text/css" href="/src/assets/css/profile.css" media="screen"/>
     <link rel="stylesheet" type="text/css" href="/src/assets/css/footer.css" media="screen"/>
     <link rel="stylesheet" type="text/css" href="/src/assets/css/header.css" media="screen"/>
</head>
<body>
	<header>
        <?php include('header.php') ?>
    </header>
	<main>
        <div class='profile'>
            <div class='profileContent'>
                <?php

                echo "<form action='change-passwordck.php' method=post>
                        <h2>". $lang['changePassword']."</h2>
                        ";if (isset($_GET['error'])) {
                echo
                    "<p class='error'>". $_GET['error'];
                echo    
                    "</p>";}
                echo "
                    <input type=hidden name=todo value=change-password>

                    <label>". $lang['oldPass'] .":</label>
                    <input type ='password' class='bginput' name='old_password'><br>

                    <label>". $lang['newPass'] .":</label>
                    <input type ='password' class='bginput' name='password'><br>

                    <label>". $lang['confirmNewPass'] .":</label>
                    <input type ='password' class='bginput' name='password2'><br>

                    <input type=submit value='". $lang['confirm'] ."'>
                    <a href='update-profile.php' class='ca'>". $lang['cancel']."</a>
                    "; 
                ?>
            </div>
</div>
    </main>
	<footer class="main-footer">
        <?php include('footer.php') ?>
    </footer>
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://kit.fontawesome.com/c469a8b399.js" crossorigin="anonymous"></script>
</body>

</html>

</body>

</html>
<?php
}else{
    header("location:login.php");
} ?>