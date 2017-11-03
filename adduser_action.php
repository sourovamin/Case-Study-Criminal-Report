<?php
include("includes/db_connect.php");
include("includes/header.php");
include("includes/functions.php"); 

if(!loggedin()) {
	header("location:index.php?not_logged_in");}

if($_SESSION['admin']=='1'){     
$id=$_POST['id'];
$user=$_POST['user'];
$email=$_POST['email'];
$pass=$_POST['pass'];
$salt=$_POST['salt'];
$admin=$_POST['admin'];
if(strlen($pass)>4 && strlen($user)>0){
$query="INSERT INTO admin VALUES('$id','$user','$email','$pass','$salt','$admin')";
            $result=mysql_query($query);
if (!$result){
    die ("Database access failed: " . mysql_error());
}
else{
    echo "Record Added Successfully";
}
}
else{
    header("location:addusererror.php");
}
}
?>
     