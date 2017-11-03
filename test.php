<?php
include("includes/db_connect.php");
include("includes/functions.php");
$query="SELECT MAX(crime_id) AS id FROM crime_case";
$result=mysql_query($query);
$ro=mysql_fetch_array($result);
$id=$ro['id']+1;
echo $id;


?>