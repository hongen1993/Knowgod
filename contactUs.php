<?php 
include "languages/configuration.php"; 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $lang['contactUsTitle'] ?></title>
    <link rel="stylesheet" type="text/css" href="/src/assets/css/header.css" media="screen"/></head>
    <link rel="stylesheet" type="text/css" href="/src/assets/css/contactUs.css" media="screen"/></head>
<body>
    <header>
        <?php include('header.php') ?>
    </header>
  <div class="wrapper">
    <h1><?php echo $lang['contactUs'] ?></h1>
    <form class="contact-box" action="/action.php" target="_self" method="post">
      <ul>
        <li class="stepOne">
          <label for="name"><?php echo $lang['contactUsName'] ?></label>
          <input type="text" id="name" class="input-text" placeholder="<?php echo $lang['contactUsNameInput'] ?>" required></input>
          <div class="button next "><?php echo $lang['contactUsNameNext'] ?></div>
        </li>
        <li class="stepTwo">
          <label for="email"><?php echo $lang['contactUsEmail'] ?></label>
          <input type="email" id="email" class="input-text" placeholder="<?php echo $lang['contactUsEmailInput'] ?>" required></input>
          <div class="button back"><?php echo $lang['contactUsEmailBack'] ?></div>
          <div class="button nextB"><?php echo $lang['contactUsEmailNext'] ?></div>
        </li>
        <li class="stepThree">
          <label label="message"><?php echo $lang['contactUsMessage'] ?></label><br>
          <textarea rows="6" id="message" placeholder="<?php echo $lang['contactUsMessageInput'] ?>" required></textarea>
          <div class="button backB"><?php echo $lang['contactUsEmailBack'] ?></div>
          <button class="formButton"><?php echo $lang['contactUsMessageButton'] ?></button>
        </li>
      </ul>
    </form>
  </div>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://kit.fontawesome.com/c469a8b399.js" crossorigin="anonymous"></script>
    <script src="/src/assets/js/languageSelect.js"></script>
    <script src="/src/assets/js/menu.js"></script>
    <script src="/src/assets/js/scrollIn.js"></script>
    <script src="/src/assets/js/contactUsForm.js"></script>
    <!--Start of Tawk.to Script-->
<!--     <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/60d36e177f4b000ac039311c/1f8suc38h';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script> -->
    <!--End of Tawk.to Script-->
</body>
</html>