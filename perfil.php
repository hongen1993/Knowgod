<?php 
include "./languages/configuration.php"; 
include "config.php";
if (isset($_SESSION['id']) && isset($_SESSION['userid'])) {
    $user = $_SESSION['userid'];


?>  
<!DOCTYPE html>
<html lang="es">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title><?php echo $lang['perfil'] ?></title>
	<link rel="stylesheet" type="text/css" href="/src/assets/css/profile.css" media="screen"/>
     <link rel="stylesheet" type="text/css" href="/src/assets/css/footer.css" media="screen"/>
     <link rel="stylesheet" type="text/css" href="/src/assets/css/header.css" media="screen"/>
</head>
<body>
     <header>
        <?php include('header.php') ?>
    </header>
    <main>
          <?php

               $sql = "SELECT * FROM users WHERE userid ='$user' ";
               
                    if ($result = mysqli_query($conn, $sql)) {
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                                if ($row['status']=="verified") {
                                    echo "
                                        <div class='profile'>
                                            <div class='profileContent'>
                                            <h1>".$lang['perfil']."</h1>                                   ";
                                    ;
                                        if (isset($_GET['success'])) {
                                            echo
                                                "<p class='success'>". $_GET['success'];
                                            echo "</p>
                                            ";
                                        }
                                    echo "<p>".$lang['signUpUsername'].":<br>".$row['userid']."</p>
                                            <p>".$lang['signUpName'].":<br>".$row['name']."</p>
                                            <p>".$lang['signUpSurname'].":<br>".$row['surname']."</p>
                                            <p>".$lang['signUpAddress'].":<br>".$row['address']."</p>
                                            <p>".$lang['signUpEmail'].":<br>".$row['email']."</p>
                                            <a href='update-profile.php'>". $lang['editPerfil'] ."</a>
                                            <a href='logout.php'>". $lang['logout'] ."</a>
                                       </div>
                                  </div>";
                                    
                                        if ($row['user_type']=="1") {
                                            echo "<a href='../addPost.php'>".$lang['addPredication']."</a><br>";
                                        } elseif ($row['user_type']=="1") {
                                            echo "<a href='../addPostCH.php'>".$lang['addPredication']."</a>";
                                        } else {
                                        }   
                                }else{
                                    echo "
                                            <div class='profile'>
                                                <div class='profileContent'>
                                                <p>".$lang['notVerified'].":<br></p>
                                                <button class='verify'><p>".$lang['verifyButton']."</p></button><br>
                                                <a href='update-profile.php'>". $lang['editPerfil'] ."</a>
                                                <a href='logout.php'>". $lang['logout'] ."</a>
                                                "
                                                ;
                                }
                            }
                                mysqli_free_result($result);
                            } else {
                                echo "No records matching your query were found.";
                            }
                        } else {
                            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                        }
               
                    mysqli_close($conn); ?>       

<!--      <div class="profile">
          <div class="content">
          <h1>Perfil</h1>
               <form action="">
                    <label for="avatar">Your Photo</label>
                    <span class="photo" title="Upload your Avatar!"></span>
                    <input type="file" class="btn"/>
                    <label for="fname">First Name</label>
                    <input type="text" id="fname"/>
                    <label for="lname">Last Name</label>
                    <input type="text" id="lname"/>
                    <label for="email">Email Address</label>
                    <input type="email" id="email"/>

                    <input type="button" class="Btn cancel" value="Cancel" />
                    <input type="submit" class="Btn" value="Save Changes" />
               </form>
          </div>
     </div> -->

    </main>
     <footer class="main-footer">
        <?php include('footer.php') ?>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://kit.fontawesome.com/c469a8b399.js" crossorigin="anonymous"></script>
    <script src="src/assets/js/menu.js"></script>

</body>
</html>

<?php
     } else {
     header("Location:login.php");
     exit();
}
 ?>