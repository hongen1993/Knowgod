<?php 
include "languages/configuration.php"; 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $lang['login'] ?></title>
	<link rel="stylesheet" type="text/css" href="/src/assets/css/login.css" media="screen">
	<link rel="stylesheet" type="text/css" href="/src/assets/css/header.css" media="screen"/>
	<link rel="stylesheet" type="text/css" href="/src/assets/css/footer.css" media="screen"/>
</head>
<body>
	<header>
        <?php include('dropdownMenu.php') ?>
    </header>
	<main>
		<div class="signInForm">
			<form action="loginUser.php" method="post">
				<h2><?php echo $lang['login'] ?></h2>
				<?php if (isset($_GET['error'])) { ?>
					<p class="error"><?php echo $_GET['error']; ?></p>
				<?php } ?>
				<label><?php echo $lang['account'] ?></label>
				<input type="text" name="uname" placeholder="<?php echo $lang['account'] ?>"><br>

				<label><?php echo $lang['password'] ?></label>
				<input type="password" name="password" placeholder="<?php echo $lang['password'] ?>"><br>

				<button type="submit"><?php echo $lang['loginB'] ?></button>
				<a href="signup.php" class="ca"><?php echo $lang['createACC'] ?></a>
			</form>
		</div>
	</main>
	<footer class="main-footer">
        <?php include('footer.php') ?>
    </footer>
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://kit.fontawesome.com/c469a8b399.js" crossorigin="anonymous"></script>
</body>
</html>