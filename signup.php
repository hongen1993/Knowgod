<?Php

include "config.php"; // database connection details stored here

?>
<!doctype html public "-//w3c//dtd html 3.2//en">

<html>

<head>
<title></title>
<script type="text/javascript">
function validate(form) {
if (!document.form1.agree.checked) { alert("Please Read the guidlines and check the box below  .");
 return false; }
return true;
}
</script>

</head>

<body>

<table border='0' width='50%' cellspacing='0' cellpadding='0' align=center><form name=form1 method=post action=signupck.php onsubmit='return validate(this)'><input type=hidden name=todo value=post>

<tr bgcolor='#f1f1f1'><td align=center colspan=2><font face='Verdana' size='2' ><b>Signup</b></td></tr>
<tr ><td >&nbsp;<font face='Verdana' size='2' >User ID (alphanumeric  chars only)</td><td ><font face='Verdana' size='2'><input type=text name=userid></td></tr>

<tr bgcolor='#f1f1f1'><td >&nbsp;<font face='Verdana' size='2' >Password</td><td ><font face='Verdana' size='2'><input type=password name='password'></td></tr>
<tr ><td >&nbsp;<font face='Verdana' size='2' >Re-enter Password</td><td ><font face='Verdana' size='2'><input type=password name='password2'></td></tr>


<tr bgcolor='#f1f1f1'><td ><font face='Verdana' size='2' >&nbsp;Email</td><td  ><input type=text name=email></td></tr>
<tr ><td >&nbsp;<font face='Verdana' size='2' >Name</td><td ><font face='Verdana' size='2'><input type=text name=name></td></tr>

<tr ><td >&nbsp;<font face='Verdana' size='2' >surname</td><td ><font face='Verdana' size='2'><input type=text name=surname></td></tr>

<tr ><td >&nbsp;<font face='Verdana' size='2' >address</td><td ><font face='Verdana' size='2'><input type=text name=address></td></tr>


<tr bgcolor='#f1f1f1'><td >&nbsp;<font face='Verdana' size='2' >Gender</td><td ><font face='Verdana' size='2'>  <input type='radio' value=male checked name='gender'>Male <input type='radio' value=female  name='gender'>Female </td> </tr>

<tr ><td >&nbsp;<font face='Verdana' size='2' >I agree to terms and conditions</td><td ><font face='Verdana' size='2'><input type=checkbox name=agree value='yes'></td></tr>

<tr bgcolor='#f1f1f1'><td align=center colspan=2><a href=login.php>Login</a> <input type=submit value=Signup></td></tr>
</table>

</body>

</html>
