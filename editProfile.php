<?php 
include "languages/configuration.php"; 
if (isset($_SESSION['id']) && isset($_SESSION['userid'])) {
	require  "config.php";
	$user = $_SESSION['userid'];
	$query = mysqli_query($conn, "SELECT * FROM users WHERE userid = '$user'") or die(mysqli_error());
	$row = mysqli_fetch_array($query);
 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title><?php echo $lang['editPerfil'] ?></title>
	 <link rel="stylesheet" type="text/css" href="login.css">
     <link rel="stylesheet" type="text/css" href="/src/assets/css/footer.css" media="screen"/>
     <link rel="stylesheet" type="text/css" href="/src/assets/css/header.css" media="screen"/>
</head>
<body>
	<header>
        <?php include('header.php') ?>
    </header>
	<main>
		
		<form method="post">
			<h2><?php echo $lang['editPerfil'] ?></h2>
<!-- 			<?php if (isset($_GET['error'])) { ?>
				<p class="error"><?php echo $_GET['error']; ?></p>
			<?php } ?>

			<?php if (isset($_GET['success'])) { ?>
				<p class="success"><?php echo $_GET['success']; ?></p>
			<?php } ?> -->

			<label><?php echo $lang['signUpName'] ?></label>
			<input  type="text" 
					name="name"
					value="<?php echo $row['name'] ?>">
				<br>

			<label><?php echo $lang['signUpSurname'] ?></label>
			<input  type="text" 
					name="surname" 
					value="<?php echo $row['surname'] ?>">
				<br>

			<label><?php echo $lang['signUpAddress'] ?></label>
			<input  type="text" 
					name="address" 
					value="<?php echo $row['address'] ?>">
				<br>

            <label><?php echo $lang['signUpEmail'] ?></label>
			<input  type="email" 
					name="email"
					value="<?php echo $row['email'] ?>">
				<br>

			<input type="submit" name="submit"><?php echo $lang['edit'] ?>
			<a href="perfil.php" class="ca"><?php echo $lang['cancel'] ?></a>
		</form>
	</main>
	<footer class="main-footer">
        <?php include('footer.php') ?>
    </footer>
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://kit.fontawesome.com/c469a8b399.js" crossorigin="anonymous"></script>
	alert("Update Successfull.");
</body>
</html>

<?php 

    if (isset($_POST['submit'])) {

        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $address = $_POST['address'];
        $email = $_POST['email'];

			$query ="UPDATE 
							users 
						SET 
							 name = '$name',
							 surname = '$sname',
							 address = '$address',
							 email = '$email',
						WHERE 
							id = '$id'";
			$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
						
  /*           $id = $_SESSION['id'];
            $uname = $_SESSION['user_name'];

            $sqlUsername = "SELECT name, surname, address, email
                        FROM users WHERE
                        id='$id' AND user_name='$uname'";
            $result = mysqli_query($conn, $sqlUsername);
            if (mysqli_num_rows($result) === 1) {
                
                $sqlEdit = "UPDATE users 
                            SET 
                                name='$name',
                                surname='$sname',
                                address='$address',
                                email='$email', 
                            WHERE id='$id' AND user_name='$uname'";
                mysqli_query($conn, $sqlEdit);
                header("Location:editProfile.php?success=Your profile has been changed successfully");
                exit();
            } else {
                header("Location:editProfile.php?error=ERROR");
                exit();
            } */
        }
    }
 ?>