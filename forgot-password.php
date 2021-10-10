<?Php
include "include/session.php";

?>
<!doctype html public "-//w3c//dtd html 3.2//en">

<html>

<head>
<title>Forgot password </title>

</head>

<?Php
if(isset($_SESSION['userid'])){
echo " You have login as $_SESSION[userid], you can <a href=logout.php>logout</a> here";
}else {

echo "<body>

<form action='forgot-passwordck.php' method=post>
<table border='0' cellspacing='0' cellpadding='0' align=center>
 <tr bgcolor='#f1f1f1' > <td colspan='2' align='center'><font face='verdana, arial, helvetica' size='2' align='center'>&nbsp;Forgot Password ?<BR>Enter your email address</font></td> </tr>
 <tr id='cat'>
  <tr bgcolor='#ffffff'> <td><font face='verdana, arial, helvetica' size='2' align='center'>  &nbsp;Email  &nbsp; &nbsp;
</font></td> <td  align='center'><font face='verdana, arial, helvetica' size='2' >
<input type ='text' class='bginput' name='email' ></font></td></tr>


<tr bgcolor='#f1f1f1'> <td  colspan='2' align='center'><font face='verdana, arial, helvetica' size='2' align='center'>  
<input type='submit' value='Submit'> <input type='reset' value='Reset'>
</font></td> </tr>

<tr> <td bgcolor='#ffffff' ><font face='verdana, arial, helvetica' size='2' align='center'> &nbsp;<a href=login.php>Login</a></font></td> <td bgcolor='#ffffff' align='center'><font face='verdana, arial, helvetica' size='2' ><a href='signup.php'>New Member Sign UP</a></font></td></tr>



</table></center></form>";
}
?>

</body>

</html>
