<?php
function  confirm_connection($result){
if(!$result) {
	die("Database query failed");
}
}

ob_start();
session_start();
$current_file=$_SERVER['SCRIPT_NAME'];
@$http_referer=$_SERVER['HTTP_REFERER'];

function loggedin(){
    if(isset($_SESSION['username'])&&!empty($_SESSION['username'])){
    return true;
    }
    else
        return false;
}

function adminloggedin(){
    if(isset($_SESSION['admin_id'])&&!empty($_SESSION['admin_id'])){
    return true;
    }
    else
        return false;
}


?>