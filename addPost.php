<?php 
include "languages/configuration.php"; 
include "db_conn.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $lang['admin'] ?></title>
	<link rel="stylesheet" type="text/css" href="/src/assets//css/signUp.css" media="screen">
    <link rel="stylesheet" type="text/css" href="/src/assets/css/header.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="/src/assets/css/footer.css" media="screen"/>
</head>
<body>
     <header>
          <?php include('dropdownMenu.php') ?>
    </header>
    <main>
         <div class="formError">
               <?php if (isset($_GET['error'])) { ?>
                         <p class="error"><?php echo $_GET['error']; ?></p>
                    <?php } ?>

                    <?php if (isset($_GET['success'])) { ?>
                         <p class="success"><?php echo $_GET['success']; ?></p>
                    <?php } ?>
          </div>
     <div class="signUpForm">
               <form action="signup-check.php" method="post">

                    <h2><?php echo $lang['addPredication'] ?></h2>

                    <div class="styled-input">
                         <label><?php echo $lang['titleForPredication'] ?></label>
                         <?php if (isset($_GET['name'])) { ?>
                              <input type="text" 
                                   name="name"
                                   value="<?php echo $_GET['name']; ?>"><br>
                         <?php }else{ ?>
                              <input type="text" 
                                   name="name"><br>
                         <?php }?>
                    </div>

               
                    <div class="styled-input">
                         <label><?php echo $lang['linkForPredication'] ?></label>
                         <?php if (isset($_GET['address'])) { ?>
                              <input type="text" 
                                   name="address" 
                                   value="<?php echo $_GET['address']; ?>"><br>
                         <?php }else{ ?>
                              <input type="text" 
                                   name="address"><br>
                         <?php }?>
                    </div>

                    <div class="styled-input">
                         <label><?php echo $lang['descriptionForPredication'] ?></label>
                         <?php if (isset($_GET['email'])) { ?>
                              <input type="text" 
                                   name="email" 
                                   value="<?php echo $_GET['email']; ?>"><br>
                         <?php }else{ ?>
                              <input type="text" 
                                   name="email"><br>
                         <?php }?>
                    </div>

                    <button type="submit"><?php echo $lang['addPost'] ?></button>
                    <a href="perfil.php" class="ca"><?php echo $lang['cancel'] ?></a>
               </form>
          </div>
    </main>
    <footer class="main-footer">
        <?php include('footer.php') ?>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://kit.fontawesome.com/c469a8b399.js" crossorigin="anonymous"></script>
</body>
</html>