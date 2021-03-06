<?php 
include "../languages/configuration.php"; 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $lang['predicationsTitle'] ?></title>
    <link rel="stylesheet" type="text/css" href="/src/assets/css/header.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="/src/assets/css/predications.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="/src/assets/css/footer.css" media="screen"/>
</head>
<body>
    <header>
        <?php include('../include/header.php') ?>
    </header>
    <main>
        
    <?php 
    
    require_once '../predications/model.php'; 
    $lastPredications = lastPredication();
    require '../predications/lastPredication.php'; 

    $posts = getPosts(); 
    require '../predications/list.php'; 
    ?>
    </main>
    <footer class="main-footer">
        <?php include('../include/footer.php') ?>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://kit.fontawesome.com/c469a8b399.js" crossorigin="anonymous"></script>
    <script src="/src/assets/js/languageSelect.js"></script>
    <script src="/src/assets/js/menu.js"></script>
    <script src="/src/assets/js/scrollIn.js"></script>
    <script src="/src/assets/js/headerMenu.js"></script>

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