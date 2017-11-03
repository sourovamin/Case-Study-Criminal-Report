<?php
include("includes/db_connect.php");
include("includes/header.php");
include("includes/functions.php");

$delid=$_POST['delid'];
if($_SESSION['admin']=='1'){
$query1 = "DELETE FROM admin WHERE id='$delid'";
$result1 = mysql_query($query1);
if(!$result1){
    die ("Database access failed: " . mysql_error());
}
else{
    echo "User has been removed successfully!";
}

}
?>