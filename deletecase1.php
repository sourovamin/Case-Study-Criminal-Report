<?php
include("includes/db_connect.php");
include("includes/header.php");
include("includes/functions.php");

if($_SESSION['admin']=='1'){
$delid=$_POST['delid'];
?>

<style>
#button{
width:200px;
height:50px;
font-weight:bold;
font-size:25px;
background:#ff0000;
margin-left:auto;
margin-right:auto;
display:block;
}
</style>
<h1><center>Are You Sure, You Want To Remove This Case?</center></h1>
<form method="POST">
<input id="button" type="button" value="No" onClick="history.go(-1);return true;">
</form>

<form method="POST" action="deletecase2.php">
<input type="hidden" name="delid" value="<?php echo $delid ?>">
<input id="button" type="submit" name="yes" value="Yes">
</form>

<?php } ?>