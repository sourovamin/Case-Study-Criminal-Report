<?php
include("includes/db_connect.php");
include("includes/functions.php");
include("includes/header.php");
if(!loggedin()) {
	header("location:index.php?not_logged_in");}
    
    if($_SESSION['admin']=='1'){
        
	$status_id = $_POST['status'];
	$crime_id=$_POST['crmid'];
	$status = $_POST['stat'];
	$advocate_name = $_POST['adv_name'];
	$court_order = $_POST['court_order'];
	$act = $_POST['act'];
	$judge = $_POST['judge'];
	$Investigator = $_POST['investigator'];
	
if(strlen($status)>0){
$query3="UPDATE `criminal_case`.`case_status` SET `status_id` = '$status_id',
`status` = '$status',
`advocate_name` = '$advocate_name',
`court_order` = '$court_order',
`act` = '$act',
`judge` = '$judge',
`Investigator` = '$Investigator',
`crime_id` = '$crime_id' WHERE `case_status`.`status_id` ='$status_id';";
	$result3=mysql_query($query3);
	if (!$result3) {
		die ("Database access failed: " . mysql_error());
	}
    else {
		echo "data updated successfully";
	}
}
    }
    ?>