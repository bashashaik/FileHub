
<?php
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

<?php
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
	$dest_addr= "C:\dev\www\uploads";
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