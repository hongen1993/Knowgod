<?php 
include "./languages/configuration.php"; 
include "db_conn.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
     <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $lang['signUp'] ?></title>
	<link rel="stylesheet" type="text/css" href="/src/assets//css/signUp.css" media="screen">
     <link rel="stylesheet" type="text/css" href="/src/assets/css/header.css" media="screen"/>
     <link rel="stylesheet" type="text/css" href="/src/assets/css/footer.css" media="screen"/>
</head>
<body>
     <header>
          <?php include('header.php') ?>
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
                    <h2><?php echo $lang['createACC'] ?></h2>
                    <div class="styled-input">
                         <label><?php echo $lang['signUpName'] ?></label>
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
                         <label><?php echo $lang['signUpSurname'] ?></label>
                         <?php if (isset($_GET['surname'])) { ?>
                              <input type="text" 
                                   name="surname" 
                                   value="<?php echo $_GET['surname']; ?>"><br>
                         <?php }else{ ?>
                              <input type="text" 
                                   name="surname"><br>
                         <?php }?>
                    </div>
               
                    <div class="styled-input">
                         <label><?php echo $lang['signUpAddress'] ?></label>
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
                         <label><?php echo $lang['signUpEmail'] ?></label>
                         <?php if (isset($_GET['email'])) { ?>
                              <input type="text" 
                                   name="email" 
                                   value="<?php echo $_GET['email']; ?>"><br>
                         <?php }else{ ?>
                              <input type="text" 
                                   name="email"><br>
                         <?php }?>
                    </div>

                    <div class="styled-input">
                         <label><?php echo $lang['signUpUsername'] ?></label>
                         <?php if (isset($_GET['uname'])) { ?>
                              <input type="text" 
                                   name="uname" 
                                   value="<?php echo $_GET['uname']; ?>"><br>
                         <?php }else{ ?>
                              <input type="text" 
                                   name="uname"><br>
                         <?php }?>
                    </div>

                    <div class="styled-input">
                         <label><?php echo $lang['signUpPass'] ?></label>
                         <input type="password" 
                              name="password"><br>

                         <label><?php echo $lang['signUpPassB'] ?></label>
                         <input type="password" 
                              name="re_password" ><br>
                    </div>

                    <button type="submit"><?php echo $lang['signUp'] ?></button>
                    <a href="login.php" class="ca"><?php echo $lang['signUpAlreadyACC'] ?></a>
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