<?php 
include "../languages/configuration.php"; 
?>
 
 <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Know God</title>
    <link rel="stylesheet" type="text/css" href="/src/assets/css/main.css" media="screen"/>
</head>
<body>
  <header>
    <div class="logoIntro">
      <a href="enterB.php">
        <img src="/src/assets/img/knowgodlogo.jpg" alt="logo"/>
      </a>
    </div>
  </header>
  <main>
  <!-- boxes -->

    <div class="boxOn"></div>
    <div class="boxOn-B"></div>

    <div class="efectoMB">
      <p class="line lineborder anim-typewriterB" id="textWritter"><?php echo $lang['salmos-A'] ?></p>
    </div>
    <div class="efectoMTB">
        <p class="lineTwo lineborderTwo anim-typewriterTwoB" id="textWritterTwo"><?php echo $lang['salmos-B'] ?></p>
    </div>
    <div class="efectoMThreeB">
        <p class="lineThree lineborderThree anim-typewriterThreeB" id="textWritterThree"><?php echo $lang['salmos-C'] ?></p>
    </div>
    <div class="efectoMFB" >
        <p class="lineFour lineborderFour anim-typewriterFourB" id="textWritterFour"><?php echo $lang['salmos-D'] ?></p>
    </div>
    <div id="skipB">
      Saltar
    </div>
    <!-- Menu -->
    <div class="selectMenu">

      <button id="whoIs" class="whoIs">
          <p><?php echo $lang['menu-A'] ?></p>
      </button>
      <button class="listenTo">
          <p><?php echo $lang['menu-B'] ?></p>
      </button>
      <button class="contactUs">
          <p><?php echo $lang['menu-C'] ?></p>
      </button>
      <button class="aboutUs">
          <p><?php echo $lang['menu-D'] ?></p>
      </button>
  </div>
  </main>

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="/src/assets/js/enterB.js"></script>
    <script src="/src/assets/js/menu.js"></script>
    <script src="/src/assets/js/skip.js"></script>

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
  