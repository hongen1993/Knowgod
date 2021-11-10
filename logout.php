<?Php
include "./languages/configuration.php"; 
include "config.php";

@$count=$dbo->prepare("update users set status='OFF' where userid='$_SESSION[userid]'");
@$count->execute();

session_unset();
session_destroy();

header("Location:login.php");
?>