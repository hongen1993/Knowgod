<?php 
include "languages/configuration.php"; 
?>
<?php 

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

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
		<form action="change-p.php" method="post">
			<h2><?php echo $lang['editPerfil'] ?></h2>
			<?php if (isset($_GET['error'])) { ?>
				<p class="error"><?php echo $_GET['error']; ?></p>
			<?php } ?>

			<?php if (isset($_GET['success'])) { ?>
				<p class="success"><?php echo $_GET['success']; ?></p>
			<?php } ?>

			<label><?php echo $lang['oldPass'] ?></label>
			<input type="password" 
				name="op" >
				<br>

			<label><?php echo $lang['newPass'] ?></label>
			<input type="password" 
				name="np" >
				<br>

			<label><?php echo $lang['newPass'] ?></label>
			<input type="password" 
				name="c_np" >
				<br>

			<button type="submit"><?php echo $lang['edit'] ?></button>
			<a href="perfil.php" class="ca"><?php echo $lang['cancel'] ?></a>
		</form>
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
     header("Location: login.php");
     exit();
}
 ?>