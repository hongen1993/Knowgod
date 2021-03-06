<?Php
include "../languages/configuration.php"; 
include "../include/config.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $lang['forgotPass'] ?></title>
	<link rel="stylesheet" type="text/css" href="/src/assets/css/login.css" media="screen">
	<link rel="stylesheet" type="text/css" href="/src/assets/css/header.css" media="screen"/>
	<link rel="stylesheet" type="text/css" href="/src/assets/css/footer.css" media="screen"/>
</head>
  <body>
    <header>
        <?php include('../include/header.php') ?>
    </header>
    <main>
<?Php
  if(isset($_SESSION['userid'])){
    echo 
    "<div class='forgotPassLogged'>
        <p> "
          .$lang['alreadyLogged'] . $_SESSION['userid'] . $lang['alreadyLogged2'].
        "</p>
      </div>";
    }else {

    if (isset($_GET['error'])) { 
      echo "<p class='error'>". $_GET['error']; "</p>";
    } echo "

    <div class='forgotPassForm'>

      <form action='forgot-passwordck.php' method=post>

        <h2>". $lang['forgotPass'] ."</h2>
        
        <h4>". $lang['enterEmail'] ."</h4><br>

        <label>". $lang['signUpEmail'] ."</label>
        <input type ='text' class='bginput' name='email' ><br>

        <input id='forgotPassSubmit' type='submit' name='check-email' value='". $lang['send'] ."'>
        <a href=../account/login.php>". $lang['cancel'] ."</a>

      <form>

    </div>";
  }
?>

</main>
    <footer class="main-footer">
      <?php include('../include/footer.php') ?>
    </footer>
      <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
      <script src="https://kit.fontawesome.com/c469a8b399.js" crossorigin="anonymous"></script>
      <script src="/src/assets/js/headerMenu.js"></script>

  </body>
</html>
