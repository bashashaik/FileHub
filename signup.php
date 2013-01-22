<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Detalils Confirmation</title>
</head>

<body>
<?php 
$fname=$_POST["fname"];
$lname=$_POST['lname'];
$email=$_POST['email'];
$password=$_POST['password'];
$conn=oci_connect('system','123456','localhost/XE');
if(!$conn)
{
	echo 'Not connected to Database please try after some time.';
}
else
{
	echo'Connected ..';
	$statement= oci_parse($conn,"insert into users(sno,fname,lname,email,password,doj)
	 values(nvl((select max(sno)from users),785)+1,'$fname','$lname','$email','$password', sysdate)");
	oci_execute($statement);
	echo 'Welcome ' . $fname .' '. $lname;
	echo ' <br/> ';
	echo 'Your E-mail is '. $email .' this would be your log in ID' ;
	echo '<br />';
	echo 'Your password is '.$password . ' this would be your log in password';
	oci_close($conn);
}
?>
<br />
<form action="index.php" method="post">
<input type="submit" value="Home" autofocus="autofocus" />
</form>

</body>
</html>