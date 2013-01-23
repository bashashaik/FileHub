
<?php //Session 
session_start();
if(isset($_SESSION["username"],$_SESSION["password"]))
{
	$email=$_SESSION["username"];
}
else
{
	header("Location: login_form.php");
}
?>

<?php //Connection to Oracle for SNO
$conn=oci_connect("system","123456","localhost/XE");
$statement=oci_parse($conn,"select sno from users where email='$email'");
oci_execute($statement);
	while($row=oci_fetch_array($statement))
	{
		$sno=$row[0];
	}
?>

<?php // File Upload
if($_FILES["file"]["error"]>0)
{
	echo "Error: " . $_FILES["file"]["error"];
}
else
{
	$filename= $_FILES["file"]["name"];
	$filetype= $_FILES["file"]["type"];
	$filesize= $_FILES["file"]["size"];
	$temp_name=$_FILES["file"]["tmp_name"];
	$dest_addr= "C:\dev\www\uploads\\";
	$dest_addr.=$sno;
	$moved=move_uploaded_file($temp_name,"$dest_addr/$filename");
	if(!$moved)
	{
		echo "File Upload failed, contact admin. ";
	}
	else
	{
		header("Location: home.php");
	}
}

?>