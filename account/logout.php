<?Php
include "../languages/configuration.php"; 
include "../include/config.php";

/* @$count=$dbo->prepare("UPDATE users SET status='OFF' WHERE userid='$_SESSION[userid]'");
@$count->execute(); */

session_unset();
session_destroy();

header("Location:../account/login.php");
?>