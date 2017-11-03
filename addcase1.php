<?php
include("includes/db_connect.php");
include("includes/functions.php");
include("includes/header.php");

if(!loggedin()) {
	header("location:index.php?not_logged_in");}
?>

    <style>
        #addcase{
margin-top:90px;
margin-bottom:50px;
margin-right:150px;
margin-left:500px;
border:3px solid #a1a1a1;
padding:9px 35px; 
width:200px;border-radius:20px;
box-shadow: 7px 7px 6px;
}
	</style>
<?php
if($_SESSION['admin']=='1'){
	?>

<div id="addcase">
    <fieldset style="width:30%"><legend>Criminal(s) & Victim(s)</legend>
	<form method="POST" action="addcase2.php"><pre>
*Number of Criminal(s)<br><input type="number" name="criminal" min="0"><br>
*Number of Victims(s)<br><input type="number" name="victim" min="0"><br>
    <input id="button" type="submit" name="proceed" value="PROCEED">
	</pre>
</form>
</fieldset>
</div>
<?php } ?>