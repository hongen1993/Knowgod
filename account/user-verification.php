<?Php
include "../languages/configuration.php"; 
include "../include/config.php";

  $userid = $_SESSION['userid'];

  if($userid == false){
        header('Location: ../account/login.php');
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $lang['verificationUser'] ?></title>
	<link rel="stylesheet" type="text/css" href="/src/assets/css/login.css" media="screen">
	<link rel="stylesheet" type="text/css" href="/src/assets/css/header.css" media="screen"/>
	<link rel="stylesheet" type="text/css" href="/src/assets/css/footer.css" media="screen"/>
</head>
  <body>
    <header>
        <?php include('../include/header.php') ?>
    </header>
    <main>

      <?php if (isset($_GET['success'])) { ?>
        <p class="success"><?php echo $_GET['success']; ?></p>
      <?php } ?>
      <?php if (isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
      <?php } ?>

      <div class="codeVerification">
            <form action="user-verificationck.php" method="POST" autocomplete="off">
                <h2 class="text-center"><?php echo $lang['verificationCode'] ?></h2>
                <input type="number" name="otp" placeholder="<?php echo $lang['enterCode']?>" required>
                <input type="submit" style="color:green" name="check" value="<?php echo $lang['confirm']?>">
            </form>
            <form action="user-verificationck.php" method="POST">
                <input type="submit" style="color:blue" name="checkB" value="<?php echo $lang['resend']?>">
            </form>
            <button>
              <a href='../account/perfil.php'><?php echo $lang['cancel']?></a>
            </button>
        </div>
    </main>
    <footer class="main-footer">
      <?php include('../include/footer.php') ?>
    </footer>
      <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
      <script src="https://kit.fontawesome.com/c469a8b399.js" crossorigin="anonymous"></script>
      <script src="/src/assets/js/headerMenu.js"></script>

</body>
</html>