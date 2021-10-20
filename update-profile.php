<?Php
include "languages/configuration.php"; 
if (isset($_SESSION['id']) && isset($_SESSION['userid'])) {
    require  "config.php";
    $user = $_SESSION['userid'];
    $query = mysqli_query($conn, "SELECT * FROM users WHERE userid = '$user'") or die(mysqli_error());
    $row = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="es">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title><?php echo $lang['editPerfil'] ?></title>
     <link rel="stylesheet" type="text/css" href="/src/assets/css/footer.css" media="screen"/>
     <link rel="stylesheet" type="text/css" href="/src/assets/css/profile.css" media="screen"/>
     <link rel="stylesheet" type="text/css" href="/src/assets/css/header.css" media="screen"/>
</head>
<body>
	<header>
        <?php include('header.php') ?>
    </header>
	<main>
        <div class='profile'>
            <div class='profileContent'>
                <?php
                $count=$dbo->prepare("select * from users where userid='$_SESSION[userid]'");
                    if (!($count->execute())) {
                        echo "Database Problem ";
                        exit;
                    } else {
                        $row = $count->fetch(PDO::FETCH_OBJ);
                    }
                    switch ($row->gender) {
                case 'male':
                $ck1='checked';
                $ck2='';
                break;
                case 'female':
                $ck1='';
                $ck2='checked';
                break;
                }
                $ckb="<input type='radio' value=male  name='gender' $ck1>Male
                      <input type='radio' value=female  name='gender' $ck2>Female";

                    echo "<form action='update-profileck.php' method=post>
                            <input type=hidden name=todo value=update-profile>
                            <h2>". $lang['editPerfil']."</h2>
                            ";if (isset($_GET['error'])){ 
                    echo 
                        "<p class='error'>". $_GET['error']; 
                    echo 
                        "</p>";} 
                    echo"
                        <label>". $lang['signUpName'] .":</label>
                        <input type=text name=name value='$row->name'><br>
                            
                        <label>". $lang['signUpSurname'] .":</label>
                        <input type=text name=surname value='$row->surname'><br>

                        <label>". $lang['signUpAddress'] .":</label>
                        <input type=text name=address value='$row->address'><br>
                            
                        <label>". $lang['signUpEmail'] .":</label>
                        <input type=text name=email value='$row->email'><br>

                        <label>". $lang['signUpGender'] .":</label><br>
                        $ckb<br>
                        <a href='change-password.php'>". $lang['changePassword'] ."</a><br>
                            
                         <input type=submit value=".$lang['edit'].">
                        <a href='perfil.php' class='ca'>". $lang['cancel']."</a>
                        </form>
                        ";
                ?>
            </div>
        </div>
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
    header("location:login.php");
} ?>