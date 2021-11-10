<?php 
include "./languages/configuration.php"; 
include "config.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title><?php echo $lang['termsTitle'] ?></title>
	<link rel="stylesheet" type="text/css" href="/src/assets/css/terms.css" media="screen"/>
     <link rel="stylesheet" type="text/css" href="/src/assets/css/footer.css" media="screen"/>
     <link rel="stylesheet" type="text/css" href="/src/assets/css/header.css" media="screen"/>
</head>
<body>
     <header>
        <?php include('header.php') ?>
    </header>
    <main>
        <div class="terms">
            <h3><?php echo $lang['termsH3'] ?></h3>
                <p><?php echo $lang['termsP'] ?></p>
            <h3><?php echo $lang['termsH3B'] ?></h2>
                <p><?php echo $lang['termsPB'] ?></p>
            <h3><?php echo $lang['termsH3C'] ?></h3>
                <p><?php echo $lang['termsPC'] ?></p>
            <h3><?php echo $lang['termsH3D'] ?></h2>
                <p><?php echo $lang['termsPD'] ?></p>
            <h3><?php echo $lang['termsH3E'] ?></h3>
                <p><?php echo $lang['termsPE'] ?></p>
        </div>
    </main>
     <footer class="main-footer">
        <?php include('footer.php') ?>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://kit.fontawesome.com/c469a8b399.js" crossorigin="anonymous"></script>

</body>
</html>