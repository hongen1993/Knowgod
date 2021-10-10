<?Php
include "include/session.php";
 // We must have db connection to change the status of plus_login
include "config.php"; // database connection details stored here

//$q=mysql_query("update plus_login set status='OFF' where id='$_SESSION[id]'");

@$count=$dbo->prepare("update plus_login set status='OFF' where userid='$_SESSION[userid]'");
@$count->execute();

session_unset();
session_destroy();

?>
<!doctype html public "-//w3c//dtd html 3.2//en">

<html>

<head>
<title>Logout of plus signup script</title>

</head>

<body>
<?Php

echo "<center><font face='Verdana' size='2' >Successfully logged out. <a href=login.php>Login</a> again<br><br> </font></center>";

?>

</body>

</html>
