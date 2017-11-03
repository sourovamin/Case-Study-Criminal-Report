<?php
include("includes/db_connect.php");
include("includes/functions.php");
$query="select * from crime_case order by crime_id desc";
//where crime_case.crime_id=victimize.crime_id and criminal.criminal_id=victimize.criminal_id and victim.victim_id=victimize.victim_id and case_status.crime_id=crime_case.crime_id"
$result=mysql_query($query);
confirm_connection($result);
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
margin-left:290px;
border:3px solid #a1a1a1;
padding:9px 35px; 
width:600px;border-radius:20px;
box-shadow: 7px 7px 6px;
		}		
	</style>
<br>	  
					  <?php
						while($ro=mysql_fetch_array($result)) {
								$cr_id=$ro['crime_id'];
								$crm_name=$ro['crime_name'];
								$d_t=$ro['date&time'];
								
					  ?>
					  
					  
					  <div id="case">
			Crime Name:	<a href="details.php?cid=<?php echo $ro['crime_id']; ?>">	<?php echo $crm_name;?></a><br>
			ID:	<a href="details.php?cid=<?php echo $ro['crime_id']; ?>">	<?php echo $cr_id;?></a><br>
			Date & Time:		<?php echo $d_t;?><br>
						<hr></div>
					  <?php
					  }
					  }
					  ?>
				
					    
<?php include("includes/db_disconnect.php");
?>