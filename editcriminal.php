<?php
include("includes/db_connect.php");
include("includes/functions.php");
include("includes/header.php");
if(!loggedin()) {
	header("location:index.php?not_logged_in");}
    
    if($_SESSION['admin']=='1'){
	$criminal_id=$_POST['crmnl'];
	$criminal_fname = $_POST['crm_fname'];
	$criminal_mname = $_POST['crm_mname'];
	$criminal_lname = $_POST['crm_lname'];
	$criminal_age = $_POST['crm_age'];
	$crimina_sex = $_POST['crm_sex'];
	$crimina_pub = $_POST['crm_pubname'];
	$criminal_postal_code = $_POST['crm_postal_code'];
	$criminal_thana = $_POST['crm_thana'];
	$criminal_district = $_POST['crm_district'];
	$criminal_division = $_POST['crm_division'];
	$mwl=$_POST['mwl'];
	
	if(strlen($criminal_lname)>0){
$query = "UPDATE `criminal_case`.`criminal` SET `criminal_id` = '$criminal_id',
`Fname` = '$criminal_fname',
`Mname` = '$criminal_mname',
`Lname` = '$criminal_lname',
`age` = '$criminal_age',
`sex` = '$crimina_sex',
`public_name` = '$crimina_pub',
`postal_code` = '$criminal_postal_code',
`thana` = '$criminal_thana',
`district` ='$criminal_district',
`division` = '$criminal_division',
`mwl` = '$mwl' WHERE `criminal`.`criminal_id` ='$criminal_id'";

$result = mysql_query($query);
	if (!$result) {
		die ("Database access failed: " . mysql_error());
	}
    else {
		echo "update successful";
	}
    }
    }
    ?>