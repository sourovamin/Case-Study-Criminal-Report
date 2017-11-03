<?php
include("includes/db_connect.php");
include("includes/functions.php");
include("includes/header.php");
if(!loggedin()) {
	header("location:index.php?not_logged_in");}
    
    if($_SESSION['admin']=='1'){
	$victim_id=$_POST['vctm'];
	$victim_fname = $_POST['vctm_fname'];
	$victim_mname = $_POST['vctm_mname'];
	$victim_lname = $_POST['vctm_lname'];
	$victim_age = $_POST['vctm_age'];
	$victim_sex = $_POST['vctm_sex'];
	$victim_postal_code = $_POST['vctm_postal_code'];
	$victim_thana = $_POST['vctm_thana'];
	$victim_district = $_POST['vctm_district'];
	$victim_division = $_POST['vctm_division'];
	
	if(strlen($victim_lname)>0){
	$query = "UPDATE `criminal_case`.`victim` SET `victim_id` = '$victim_id',
 `Fname` = '$victim_fname',
 `Mname` = '$victim_mname',
 `Lname` = '$victim_lname',
 `age` = '$victim_age',
 `sex` = '$victim_sex',
 `postal_code` = '$victim_postal_code',
 `thana` = '$victim_thana',
 `district` = '$victim_district',
 `division` = '$victim_division' WHERE `victim`.`victim_id` ='$victim_id'";
	$result= mysql_query($query);
	if (!$result) {
		die ("Database access failed: " . mysql_error());
	}
    else {
		echo "update successful";
	}
    }
    }
    ?>