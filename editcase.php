<?php
include("includes/db_connect.php");
include("includes/functions.php");
include("includes/header.php");
if(!loggedin()) {
	header("location:index.php?not_logged_in");}
    
    if($_SESSION['admin']=='1'){
    $crime_id=$_POST['crime_id'];
    $crime_name = $_POST['crime_name'];
	$crime_date = $_POST['crime_date'];
	$crime_stree_name = $_POST['crime_stree_name'];
	$crime_stree_no = $_POST['crime_stree_no'];
	$crime_post=$_POST['crime_postal_code'];
	$crime_thana = $_POST['crime_thana'];
	$crime_district = $_POST['crime_district'];
	$crime_division = $_POST['crime_division'];
	$cat = $_POST['category'];
	
	if(strlen($crime_name)>0){
	$query = "UPDATE `criminal_case`.`crime_case` SET `date&time`='$crime_date',`cat_id`='$cat',`stree_name`='$crime_stree_name',`stree_no`='$crime_stree_no',`postal_code`='$crime_post',`thana`='$crime_thana',`district`='$crime_district',`division`='$crime_division',`crime_name`='$crime_name' WHERE `crime_case`.`crime_id`='$crime_id' ";
	$result = mysql_query($query);
	if (!$result) {
		die ("Database access failed: " . mysql_error());
	} else {
		echo "update successful";
	}
    }
    }
    ?>