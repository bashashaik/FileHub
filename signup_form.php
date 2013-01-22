<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sign UP</title>
</head>

<body>
<form action="signup.php"  method="post" onsubmit="return formvalidation()">
  First Name:
  <input type="text" maxlength="15" id="fname" name="fname" />
  <br />
  Last Name:
  <input type ="text" maxlength="10" id="lname" name="lname"/>
  <br />
  E mail:
  <input type="email" id="email" name="email" />
  <br />
  Password:
  <input type="password" maxlength="15" id="password" name="password" />
  <br />
  Re-password
  <input type="password" maxlength="15" id="repassword" name="repassword" onchange="pasvalidation()"/>
  <br />
  <br />
  <input type="submit" value="Submit" />
  <input type="reset" value="Clear"  />
</form>
<script type="text/javascript">
function pasvalidation()
{
	var password= document.getElementById("password").value;
	var repassword= document.getElementById("repassword").value;
	if(password != repassword)
	{
	alert("Password do not match please retype the password!");
	document.getElementById("password").innerHTML= "";
	document.getElementById("repassword").innerHTML= "";
	}
}

function formvalidation()
{
	var fname= document.getElementById("fname").value;
	var lname= document.getElementById("lname").value;
	var email= document.getElementById("email").value;
	var password= document.getElementById("password").value;
	var repassword= document.getElementById("repassword").value;
	if(fname =="" || lname =="" || email =="" || password =="" || 
	repassword =="")
	{
		alert("Please fill all the above details");
		return false;
	}
	else if(password != repassword)
	{
		alert("Password do not match please retype the password!");
		document.getElementById("password").innerHTML="";
		document.getElementById("repassword").innerHTML="";
		return false;
	}
}

</script>
</body>
</html>