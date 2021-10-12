<?Php
include "include/session.php";
include "config.php";

@$count=$dbo->prepare("update plus_login set status='OFF' where userid='$_SESSION[userid]'");
@$count->execute();

session_unset();
session_destroy();

header("Location:login.php");
?>