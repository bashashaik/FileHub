<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php   
session_start(); //Session start
if(isset($_SESSION["username"],$_SESSION["password"]))
{
	$email =$_SESSION["username"];
}
else
{
	header("Location:login_form.php");	
}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home</title>
<!-- Java Script  -->
<script type= "text/javascript">
function fileupload()
{
	var file =document.getElementById("file");
	if(file.value=="")
	{
		alert("File not selected. ");
		return false;
	}
}
</script>
</head>




<?php   //Database connection 
$fname;
$statement;
$sno;
$conn=oci_connect("system","123456","localhost/XE");
if(!$conn)
{
	echo "Could not connect to database. ";
}
else
{
	global $statement, $conn, $email, $sno;
	$statement =oci_parse($conn," select sno,fname from users where email='$email' ");
	oci_execute($statement);
	while($row=oci_fetch_array($statement))
	{
		global $fname, $sno;
		$sno=$row[0];
		$fname= $row[1];
		$_SESSION["sno"]=$sno;

	}

}
?>



<?php // Connection to FTP server 
/*
$ftp_conn= ftp_connect("localhost");
$ftp_login= ftp_login($ftp_conn, "Basha Shaik", "BASHA@2009");
if(!$ftp_conn || !$ftp_login)
{
	echo"Not connected to ftp server. ";
}

else
{
	ftp_close($ftp_conn);
}
*/
?>


<body>
<p align="right"><a href="logout.php">Log Out</a></p>
<h1>Welcome <?php echo $fname; ?> </h1>
<form name="uploadform" id="uploadform" action="file_upload.php" enctype="multipart/form-data"  method="post" onsubmit="return fileupload()">
<input type="file"  name="file" id="file" autofocus="autofocus" />
<input type="submit" value="Upload" />
</form>
<form action="download_file.php" method="post">
<?php
$down_path="C:\dev\www\uploads\\";
$down_path.=$sno;
$down_entry;
$down_handler=opendir($down_path);
while(($down_entry=readdir($down_handler))!==false)
{
	if($down_entry!="." && $down_entry !=="..")
	{
		//echo $entry.'<br />';
		echo '<input type="radio" name="selected_file" value="'.$down_entry.'"'.'/>'.$down_entry.'<br>';
	}
}
?>
<input type="submit" value="Download" />
</form>
</body>
</html>