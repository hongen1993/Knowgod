<?Php
include "./languages/configuration.php"; 
include "config.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $lang['signUp'] ?></title>
	<link rel="stylesheet" type="text/css" href="/src/assets//css/signUp.css" media="screen">
    <link rel="stylesheet" type="text/css" href="/src/assets/css/header.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="/src/assets/css/footer.css" media="screen"/>
</head>
<body>
     <header>
          <?php include('header.php') ?>
    </header>
    <main>
        <div class="formError">
            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
        </div>
        <div class="signUpForm">

            <form name=form1 method=post action=signupck.php onsubmit='return validate(this)'>

                <h2><?php echo $lang['createACC'] ?></h2>

                <input type=hidden name=todo value=post>

                <label><?php echo $lang['signUpUsername'] ?></label>
                <input type=text name=userid><br>

                <label><?php echo $lang['signUpPass'] ?></label>
                <input type=password name='password'><br>

                <label><?php echo $lang['signUpPassB'] ?></label>
                <input type=password name='password2'><br>

                <label><?php echo $lang['signUpEmail'] ?></label>
                <input type=text name=email><br>

                <label><?php echo $lang['signUpName'] ?></label>
                <input type=text name=name><br>

                <label><?php echo $lang['signUpSurname'] ?></label>
                <input type=text name=surname><br>

                <label><?php echo $lang['signUpAddress'] ?></label>
                <input type=text name=address><br>

                <label><?php echo $lang['signUpGender'] ?></label><br>

                <div class="gender">
                    <input id="gender" type='radio' value=male checked name='gender'>
                    <label id="genderLabel"><?php echo $lang['signUpMale'] ?></label>
                    
                    <input id="gender" type='radio' value=female  name='gender'>
                    <label id="genderLabel"><?php echo $lang['signUpFemale'] ?></label><br>
                </div>

                <div class="terms">
                    <input id="inputTerms" type=checkbox name=agree value='yes'>            
                    <label id="terms"><?php echo $lang['signUpTerms'] ?></label><br>
                </div>

                <div class="signUpButton">
                    <button type=submit ><?php echo $lang['signUp'] ?></button>
                    <a href="login.php" class="ca"><?php echo $lang['signUpAlreadyACC'] ?></a>
                </div>

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
