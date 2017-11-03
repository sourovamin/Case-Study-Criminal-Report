<?php
include("includes/db_connect.php");
include("includes/header.php");
include("includes/functions.php");

$delid=$_POST['delid'];
if($_SESSION['admin']=='1'){
$query1 = "DELETE FROM crime_case WHERE crime_id='$delid'";
$result1 = mysql_query($query1);
if(!$result1){
    die ("Database access failed: " . mysql_error());
}
else{
    echo "Case has been removed successfully!";
}

$query2 = "DELETE FROM case_status WHERE crime_id='$delid'";
$result2 = mysql_query($query2);
if(!$resul2){
    die ("Database access failed: " . mysql_error());
}
}
?>