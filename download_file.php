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
$to_download=$_POST["selected_file"];
$down_path="C:\dev\www\uploads";
$filename=$to_download;
$finalpath="$down_path/$filename";
if (file_exists($finalpath)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($finalpath));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($finalpath));
    ob_clean();
    flush();
    readfile($finalpath);
	header("Location: home.php");
    exit;
}
?>
?>
