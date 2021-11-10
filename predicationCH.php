<?php if(isset($_GET{'id'})){
    include 'languages/configuration.php';
    require_once 'config.php'; 
    if (isset($_SESSION['userid'])) {
        $user = $_SESSION['userid'];
        $sql = "SELECT * FROM users WHERE userid ='$user'";

        $id = mysqli_real_escape_string($conn, $_GET['id']);
        $sqlPredication = "SELECT * FROM post WHERE id='$id'";
        $resultPredication = mysqli_query($conn, $sqlPredication) or die('Bad Query: $sqlPredication');
        $rowPredication = mysqli_fetch_array($resultPredication); 
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
        <?php include('header.php') ?>
    </header>
    <main>
        <div class="predications">
            <h3 class="predicationTitle"><?php echo $rowPredication['title'] ?></h3>
            <?php if ($result = mysqli_query($conn, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    if ($row['user_type']!=="2") {
                        echo "
                            <div class='predicationEdit'>
                                <a href='editPredication.php?id=".$rowPredication['id']."'>
                                    <i class='far fa-edit'></i>                
                                </a>
                            </div>";
                    } else {
                    }
                }
                mysqli_free_result($result);

                    }else {
                        echo "No records matching your query were found.";
                    }
                }else{
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                }
        
                mysqli_close($conn);
                 ?>
            <div>
                <iframe
                    frameborder='0' allowfullscreen='' scrolling='no' height='200' src="
                        <?php echo $rowPredication['link'] ?>
                    " style='border:1px solid #EEE; box-sizing:border-box; width:100%;'>
                </iframe>
            </div>
            <div class="predicationContent">
                 <?php echo $rowPredication['content'] ?>
            </div>
             <div class="predicationDate">
                 <?php echo $rowPredication['date'] ?>
             </div>
             <hr>
         </div>
    </main>
    <footer class="main-footer">
        <?php include('footer.php') ?>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://kit.fontawesome.com/c469a8b399.js" crossorigin="anonymous"></script>
    <script src="/src/assets/js/languageSelect.js"></script>
    <script src="/src/assets/js/menu.js"></script>
    <script src="/src/assets/js/scrollIn.js"></script>
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
<?php
        } else {
            header("Location:login.php");
            exit();
        }
    }
 ?>