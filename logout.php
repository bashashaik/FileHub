<?php  // Session Verification
session_start();
if(isset($_SESSION["username"],$_SESSION["password"]))
{
	$email =$_SESSION["username"];
}
else
{
	header("Location: login_form.php");
}
?>


<?php    // Close session
session_destroy();
header("Location: login_form.php");
?>