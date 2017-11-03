<?php
include("includes/db_connect.php");
include("includes/functions.php");
include("includes/header.php");

?>

    <style>
        #case{
margin-top:10px;
margin-bottom:10px;
margin-right:150px;
margin-left:290px;
border:3px solid #a1a1a1;
padding:9px 35px; 
width:600px;border-radius:20px;
box-shadow: 7px 7px 6px;
		}		
	</style>

<?php
							if(isset($_POST["cat"])){
								$cat_id = $_POST["cat"];
	 										 	$query=mysql_query("select * from crime_case where cat_id=$cat_id ");
	 										 	confirm_connection($query);
	 										 	if(mysql_num_rows($query)>0) {
	 										 	while($ro=mysql_fetch_array($query)) {
								$cr_id=$ro['crime_id'];
								$crm_name=$ro['crime_name'];
								$d_t=$ro['date&time'];
					  ?>
			<div id="case">
            Crime Name:	<a href="details.php?cid=<?php echo $ro['crime_id']; ?>">	<?php echo $crm_name;?></a><br>
			ID:	<a href="details.php?cid=<?php echo $ro['crime_id']; ?>">	<?php echo $cr_id;?></a><br>
			Date & Time:	<a href="details.php?c_d=<?php echo $d_t; ?>">	<?php echo $d_t;?></a><br>
						<hr></div>
<?php
																}
							}
							}
							else {
								echo 'no entry found';
							}
?>