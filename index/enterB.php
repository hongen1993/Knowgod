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
<!-- boxes -->

  <div class="boxOn"></div>
  <div class="boxOn-B"></div>

      <div class="crossDisplayOn">

<!-- cross -->

        <div class="crossPointA"></div>
            <div class="crossPointB"></div>
            <div class="crossPointC"></div>
            <div class="crossPointD"></div>

            <div class="crossA-A"></div>
            <div class="crossA-B"></div>

            <div class="crossB-A"></div>
            <div class="crossB-B"></div>
            <div class="crossB-C"></div>

            <div class="crossC-A"></div>
            <div class="crossC-B"></div>

            <div class="crossD-A"></div>
            <div class="crossD-B"></div>
            <div class="crossD-C"></div>

<!-- backCross -->

            <div class="backCrossPointA"></div>
            <div class="backCrossPointB"></div>
            <div class="backCrossPointC"></div>
            <div class="backCrossPointD"></div>

            <div class="backCrossA-A"></div>
            <div class="backCrossA-B"></div>

            <div class="backCrossB-A"></div>

            <div class="backCrossC-A"></div>
            <div class="backCrossC-B"></div>

            <div class="backCrossD-A"></div>

<!-- whitecross -->

            <div class="verticalLine"></div>
            <div class="horizontalLine"></div>
            <div class="secondVerticalLine"></div>
            <div class="secondHorizontalLine"></div>

      </div>
<!-- languages -->

  <!-- Chinese -->

  <div class="chineseVerse">

<!--     <div class="chinese-A"></div>
    <div class="chinese-A2"></div>

    <div class="chinese-B"></div>
    <div class="chinese-B2"></div>

    <div class="chinese-C"></div>
    <div class="chinese-C2"></div> -->
  
  </div>

  <!-- Spanish -->
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
  <div class="spanishVerse">
<!--     <div class="spanish-A">Aunque</div>
    <div class="spanish-A2">ande en valle de </div>

    <div class="spanish-B">sombra</div>
    <div class="spanish-B2">de muerte, no </div>

    <div class="spanish-C">temeré</div>
    <div class="spanish-C2">mal alguno, porque tú</div>

    <div class="spanish-D">estas</div>
    <div class="spanish-D2">conmigo;<span>Sl 23:4</span></div> -->
    
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
  