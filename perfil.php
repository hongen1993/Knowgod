<?php 
include "languages/configuration.php"; 
include "db_conn.php";
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

?>  
<!DOCTYPE html>
<html>
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
        <?php include('dropdownMenu.php') ?>
    </header>
    <main>
         
          <?php 
               // Attempt select query execution
               $sql = "SELECT * FROM users";
               if($resulta = mysqli_query($conn, $sql)){
               if(mysqli_num_rows($resulta) > 0){
                    while($row = mysqli_fetch_array($resulta)){
                         echo "
                              <div class='profile'>
                                   <div class='profileContent'>
                                   <h1>".$lang['perfil']."</h1>
                              <div>
                              ";
                         echo "<p>".$lang['signUpUsername'].":<br>".$row['user_name']."</p>";
                         echo "<p>".$lang['signUpName'].":<br>".$row['name']."</p>";
                         echo "<p>".$lang['signUpSurname'].":<br>".$row['surname']."</p>";
                         echo "<p>".$lang['signUpAddress'].":<br>".$row['address']."</p>";
                         echo "<p>".$lang['signUpEmail'].":<br>".$row['email']."</p>";
                         echo "<a href='addPost.php'>".$lang['addPredication']."</a>";
                         echo "</div>";

                    }
                    // Free result set
                    mysqli_free_result($resulta);
               } else{
                    echo "No records matching your query were found.";
               }
               } else{
               echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
               }
               
               // Close connection
               mysqli_close($conn);
          ?>       
          <nav class="home-nav">
     	<a href="change-password.php"><?php echo $lang['editPerfil'] ?></a>
        <a href="logout.php"><?php echo $lang['logout'] ?></a>
     </nav>     
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


<!-- http://www.smashingmagazine.com/2013/08/08/release-livestyle-css-live-reload/ -->
     
    </main>
     <footer class="main-footer">
        <?php include('footer.php') ?>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://kit.fontawesome.com/c469a8b399.js" crossorigin="anonymous"></script>
</body>
</html>

<?php 
}else{
     header("Location:login.php");
     exit();
}
 ?>