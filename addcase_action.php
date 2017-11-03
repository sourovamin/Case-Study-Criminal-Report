<?php
include("includes/db_connect.php");
include("includes/header.php");
include("includes/functions.php");

if(!loggedin()) {
	header("location:index.php?not_logged_in");}

$case_id=$_POST['case_id'];
$crime_name=$_POST['crime_name'];
$date=$_POST['date&time'];
$category=$_POST['category'];
$stree_name=$_POST['stree_name'];
$stree_no=$_POST['stree_no'];
$postal_code=$_POST['postal_code'];
$thana=$_POST['thana'];
$district=$_POST['district'];
$division=$_POST['division'];
if(strlen($crime_name)>0){
$query1="INSERT INTO crime_case VALUES('$case_id','$date','$category','$stree_name','$stree_no','$postal_code','$thana','$district','$division','$crime_name')";
            $result1=mysql_query($query1);
if (!$result1){
    die ("Database access failed: " . mysql_error());
}
else{
    echo "***Case Details Added to Database Successfully***";
}
}
else{
    header("location:addcase1.php");
}



$cri=$_POST['cri_num'];
$vic=$_POST['vic_num'];

for($num=0;$num<$cri;$num++){
$criminal_id[$num]=$_POST['criminal_id'][$num];
$cfname[$num]=$_POST['cfname'][$num];
$cmname[$num]=$_POST['cmname'][$num];
$clname[$num]=$_POST['clname'][$num];
$public_name[$num]=$_POST['public_name'][$num];
$cage[$num]=$_POST['cage'][$num];
$csex[$num]=$_POST['csex'][$num];
$cpostal_code[$num]=$_POST['cpostal_code'][$num];
$cthana[$num]=$_POST['cthana'][$num];
$cdistrict[$num]=$_POST['cdistrict'][$num];
$cdivision[$num]=$_POST['cdivision'][$num];
$mwl[$num]=$_POST['mwl'][$num];

if($criminal_id[$num]>0){
$query2="INSERT INTO criminal VALUES('$criminal_id[$num]','$cfname[$num]','$cmname[$num]','$clname[$num]','$cage[$num]','$csex[$num]','$public_name[$num]','$cpostal_code[$num]','$cthana[$num]','$cdistrict[$num]','$cdivision[$num]','$mwl[$num]')";
            $result2=mysql_query($query2);
if (!$result2){
    die ("Database access failed: " . mysql_error());
}
else{
    echo "***Criminal Details Added to Database Successfully***";
}
}
else{
    header("location:addcase1.php");
}

if($criminal_id[$num]>0 && $case_id>0){
$query3="INSERT INTO criminalize VALUES('$case_id','$criminal_id[$num]','$category')";
            $result3=mysql_query($query3);
if (!$result3){
    die ("Database access failed: " . mysql_error());
}
else{
    echo "***Relation Added.***";
}
}
else{
    header("location:addcase1.php");
}

}


for($num=0;$num<$vic;$num++){
$victim_id[$num]=$_POST['victim_id'][$num];
$vfname[$num]=$_POST['vfname'][$num];
$vmname[$num]=$_POST['vmname'][$num];
$vlname[$num]=$_POST['vlname'][$num];
$vage[$num]=$_POST['vage'][$num];
$vsex[$num]=$_POST['vsex'][$num];
$vpostal_code[$num]=$_POST['vpostal_code'][$num];
$vthana[$num]=$_POST['vthana'][$num];
$vdistrict[$num]=$_POST['vdistrict'][$num];
$vdivision[$num]=$_POST['vdivision'][$num];

if($victim_id[$num]>0){
$query4="INSERT INTO victim VALUES('$victim_id[$num]','$vfname[$num]','$vmname[$num]','$vlname[$num]','$vage[$num]','$vsex[$num]','$vpostal_code[$num]','$vthana[$num]','$vdistrict[$num]','$vdivision[$num]')";
            $result4=mysql_query($query4);
if (!$result4){
    die ("Database access failed: " . mysql_error());
}
else{
    echo "***Victim Details Added to Database Successfully";
}
}
else{
    header("location:addcase1.php");
}

if($victim_id[$num]>0 && $case_id>0){
$query5="INSERT INTO victimize VALUES('$case_id','$victim_id[$num]')";
            $result5=mysql_query($query5);
if (!$result5){
    die ("Database access failed: " . mysql_error());
}
else{
    echo "***Relation Added.***";
}
}
else{
    header("location:addcase1.php");
}

}



$status_id=$_POST['status_id'];
$status=$_POST['status'];
$advocate_name=$_POST['advocate_name'];
$court_order=$_POST['court_order'];
$act=$_POST['act'];
$judge=$_POST['judge'];
$investigator=$_POST['investigator'];
if($status_id>0){
$query6="INSERT INTO case_status VALUES('$status_id','$status','$advocate_name','$court_order','$act','$judge','$investigator','$case_id')";
            $result6=mysql_query($query6);
if (!$result1){
    die ("Database access failed: " . mysql_error());
}
else{
    echo "***Case Status Added to Database Successfully***";
}
}
else{
    header("location:addcase1.php");
}

?>