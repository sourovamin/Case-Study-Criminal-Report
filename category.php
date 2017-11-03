<?php include("includes/db_connect.php");?>
<?php include("includes/functions.php"); 
			include("includes/header.php");
			if(!loggedin()) {
	header("location:index.php?not_logged_in");}
	else {
?>

    <style>
        #case{
margin-top:10px;
margin-bottom:10px;
margin-right:150px;
margin-left:500px;
border:3px solid #a1a1a1;
padding:9px 35px; 
width:180px;border-radius:20px;
box-shadow: 7px 7px 6px;
		}
#button{
width:200px;
height:40px;
font-weight:bold;
font-size:20px;
background:#ff0000;
margin-left:auto;
margin-right:auto;
display:block;
}		
	</style>

<?php
$query=mysql_query("select * from category");
confirm_connection($query);
while($result=mysql_fetch_array($query)) {
	$cat_id=$result['cat_id'];
	$cat_name=$result['cat_name'];
 ?>
 <div id="case">
			<form method="POST" action="category1.php">
<input type="hidden" name="cat" value="<?php echo $cat_id ?>">
<input id="button" type="submit" value="<?php echo $cat_name;?>" />
</form>
 </div>

 
<?php }?>
<?php } include("includes/db_disconnect.php"); ?>