<?php
session_start();
$_SESSION["username"]=$_POST["loginid"];
$_SESSION["password"]=$_POST["password"];
$_SESSION["sno"];
?>
<?php
$conn= oci_connect("system","123456","localhost/XE");
$username=$_POST["loginid"];
$password=$_POST["password"];
$usernameindb;
$passwordindb;

if(!$conn)
{
	echo "Some problem was occured please try after some time..";
	$error=oci_error();
	echo "<br> Error occured " . $error["message"]."<br />".$error["sqltext"];
}
else 
{
	global $usernameindb;
	global $passwordindb;
	$statement=oci_parse($conn," select email,password from users where email='$username' and password= '$password' ");
	oci_execute($statement);
	while($row=oci_fetch_array($statement))
	{
		global $usernameindb;
		$usernameindb=$row[0];
		$passwordindb=$row[1];
	}
	if($username==$usernameindb && $password==$passwordindb)
	{
		header("Location: home.php");
		
	}
	else
	{
		echo "Username or Password do not match please again.";
		session_unset();
		session_destroy();
	}
	oci_close($conn);

}
?>