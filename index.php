<?php error_reporting(0); ?>


<!DOCTYPE HTML>
<html>
<head>
<title>Welcome to crime DB</title>
<link rel="stylesheet" type="text/css" href="style-sign.css">
</head>
<body>
  <?php include("includes/functions.php");
  if(loggedin()) {
  	header("location:userdefault.php");
  	}
  ?>
  
<div id="header" style="background-color:#952A0C;height:150px;text-align:center">
<br/>
    <h1 style="margin-bottom:0;"><font color="white">Case Study & Criminal Report (CSCR)</font></h1>
    <p>© #amin</p>
</div>
  
  
<div id="Sign-In">
    <fieldset style="width:30%"><legend>LOGIN HERE</legend>
    <?php  $log=1;
		if($_GET['log']) {$log=$_GET['log'];}
    if($log>1) {echo '<font color="red">wrong user name or password</font>';}
    if(isset($_GET['not_logged_in'])) {
    	echo '<font color="red">please login first</font>';}
    if(isset($_GET['logout'])) {
    	session_start();
		unset($_SESSION['username']);
	  session_regenerate_id();
	  $_SESSION['username'] = '';
	 session_write_close();
    session_destroy();
    }
    ?>
<form method="POST" action="connectivity.php">
    Username <br><input type="text" name="user" size="40"><br>
    Password <br><input type="password" name="pass" size="40"><br><br>
    <input id="button" type="submit" name="submit" value="Login">
    </form>
</fieldset>
</div>
</body>
</html>