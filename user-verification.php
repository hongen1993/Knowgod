<?Php
include "./languages/configuration.php"; 
include "config.php";
  $email = $_SESSION['email'];

    if($email == false){
        header('Location: login.php');
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
        <?php include('./header.php') ?>
    </header>
    <main>

      <?php if (isset($_GET['success'])) { ?>
        <p class="success"><?php echo $_GET['success']; ?></p>
      <?php } ?>

      <div class="codeVerification">
            <form action="user-verificationck.php" method="POST" autocomplete="off">
                <h2 class="text-center"><?php echo $lang['verificationCode'] ?></h2>
                <input type="number" name="otp" placeholder="<?php echo $lang['enterCode']?>" required>
                <input type="submit" name="check" value="<?php echo $lang['confirm']?>">
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