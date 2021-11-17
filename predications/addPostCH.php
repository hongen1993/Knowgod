<?php 
include "./languages/configuration.php"; 
include "config.php";
if (isset($_SESSION['id']) && isset($_SESSION['userid']) && ['user_type']!="2") {

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $lang['admin'] ?></title>
	<link rel="stylesheet" type="text/css" href="/src/assets//css/addPostCH.css" media="screen">
    <link rel="stylesheet" type="text/css" href="/src/assets/css/header.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="/src/assets/css/footer.css" media="screen"/>
</head>
<body>
   
     <header>
          <?php include('./header.php') ?>
    </header>
    <main>
         <div class="postFormError">
               <?php if (isset($_GET['error'])) { ?>
                         <p class="error"><?php echo $_GET['error']; ?></p>
                    <?php } ?>

                    <?php if (isset($_GET['success'])) { ?>
                         <p class="success"><?php echo $_GET['success']; ?></p>
                    <?php } ?>
          </div>
     <div class="addPostForm">
               <form action="addPostCheckCH.php" method="post">

                    <h2><?php echo $lang['addPredication'] ?></h2>

                    <input type=hidden name=todo value=post>

                    <label><?php echo $lang['titleForPredication'] ?></label>
                    <input type="text" name="title"><br>

               
                    <label><?php echo $lang['linkForPredication'] ?></label>
                    <input type="text" name="link"><br>

                    <label><?php echo $lang['descriptionForPredication'] ?></label>
                    <input type="text" name="content"><br>

                    <button type="submit"><?php echo $lang['addPost'] ?></button>
                    <a href="perfil.php" class="ca"><?php echo $lang['cancel'] ?></a>
               </form>
          </div>
    </main>
    <footer class="main-footer">
        <?php include('./footer.php') ?>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://kit.fontawesome.com/c469a8b399.js" crossorigin="anonymous"></script>
</body>
</html>

<?php 
}else{
     header("Location:login.php");
     exit();
}
 ?>