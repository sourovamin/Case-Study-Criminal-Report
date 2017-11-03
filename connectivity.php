<?php
include("includes/db_connect.php");
session_start();
unset($_SESSION['username']);
if(isset($_POST['submit'])){
$user=$_POST['user'];
$pass=$_POST['pass'];

$query = mysql_query("SELECT * FROM admin where user = '$user' AND pass = '$pass'");

$row=mysql_fetch_array($query);
if(!empty($row['user']) AND !empty($row['pass'])){
	session_regenerate_id();
	$_SESSION['username'] = $row['user'];
	$_SESSION['id'] = $row['id'];
	$_SESSION['admin'] = $row['admin'];
	session_write_close();
	header("location:userdefault.php");
} 
else{
header("location:index.php?log=2");
}

}
include("includes/db_disconnect.php");
?>