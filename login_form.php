<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Log In</title>
</head>
<body>
<form action="login.php" method="post" id="loginform" onsubmit="return formvalidation()">
Enter your ID:  <input type="text" autocomplete="on" id="loginid" name="loginid" required="required" autofocus="autofocus" />

Enter your password: <input type="password" autocomplete="on" id="password" name="password" required="required" />
<br />
<br />
<input type="submit" value="Log In"/>
<input type="reset" value="Clear" />
</form>
<script type="text/javascript">
var id=document.getElementById("loginid");
var password=document.getElementById("password");
function formvalidation()
{
	if(id.value=="" ||id.value==" "|| password.value==" " || password.value=="")
	{
		alert("Please Enter valid details");
		return false;
	}
}
</script>
</body>
</html>