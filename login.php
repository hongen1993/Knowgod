<?Php
include "./languages/configuration.php"; 
include "config.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $lang['login'] ?></title>
	<link rel="stylesheet" type="text/css" href="/src/assets/css/login.css" media="screen">
	<link rel="stylesheet" type="text/css" href="/src/assets/css/header.css" media="screen"/>
	<link rel="stylesheet" type="text/css" href="/src/assets/css/footer.css" media="screen"/>
</head>
  <body>
    <header>
        <?php include('./header.php') ?>
    </header>
    <main>

      <?php if (isset($_GET['success'])) { ?>
        <p class="success"><?php echo $_GET['success']; ?></p>
      <?php } ?>
      <?php if (isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
      <?php } ?>

      <div class="signInForm">

        <form action='loginck.php' method=post>

          <h2><?php echo $lang['login'] ?></h2>

          <label><?php echo $lang['account'] ?></label>
          <input type ='text' name='userid' placeholder="<?php echo $lang['account'] ?>" required>

          <input type ='password' name='password' placeholder="<?php echo $lang['password'] ?>" required>
          <button type="submit"><?php echo $lang['loginB'] ?></button>
          
          <a href='signup.php' class="ca"><?php echo $lang['createACC'] ?></a>
          <a href=forgot-password.php class="ca"><?php echo $lang['forgotPass']?></a>
        
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
