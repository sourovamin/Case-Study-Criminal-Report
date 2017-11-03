<?php include("includes/db_connect.php");?>
<?php include("includes/functions.php"); 
			include("includes/header.php");
			if(!loggedin()) {
	header("location:index.php?not_logged_in");}
	else {
?>

<style>
#button{
width:400px;
height:50px;
font-weight:bold;
font-size:30px;
background:#ff0000;
margin-left:auto;
margin-right:auto;
display:block;
}
#button1{
width:160px;
height:30px;
font-weight:bold;
font-size:13px;
background:#ff0000;
margin-left:auto;
margin-right:auto;
}
        #case{
margin-top:20px;
margin-bottom:40px;
margin-right:150px;
margin-left:290px;
border:3px solid #a1a1a1;
padding:9px 35px; 
width:600px;border-radius:20px;
box-shadow: 7px 7px 6px;
		}
	</style>
<?php
$rec=$_GET['cid'];
if($_SESSION['admin']=='1'){
?>
<br><br>
<form method="POST" action="edit.php">
<input type="hidden" name="edid" value="<?php echo $rec ?>">
<input id="button" type="submit" name="delcase" value="EDIT THIS CASE" />
</form>

<form method="POST" action="deletecase1.php">
<input type="hidden" name="delid" value="<?php echo $rec ?>">
<input id="button" type="submit" name="delcase" value="DELETE THIS CASE" />
</form>
<?php } ?>

<?php 
if(isset($_GET['cid'])) {
	$receive=$_GET['cid'];
	$query="select * from crime_case,category where crime_case.crime_id='$receive' and category.cat_id=crime_case.cat_id";
$result=mysql_query($query);
confirm_connection($result);
		while($ro=mysql_fetch_array($result)) {
								$cr_id=$ro['crime_id'];
								$crm_name=$ro['crime_name'];
								$d_t=$ro['date&time'];
								$p_code=$ro['postal_code'];
								$street=$ro['stree_no'];
								$strt_n=$ro['stree_name'];
								$th=$ro['thana'];
								$ds=$ro['district'];
								$dv=$ro['division'];
								$cat=$ro['cat_name'];
					  ?>
					  <div id="case">
	<b>CASE DETAILS</b><hr><br>
	<i>Case ID: </i>	<?php echo $cr_id;?><br>
			<i>Case Name: </i>	<?php echo $crm_name;?><br>
			<i>Category Name: </i>	<?php echo $cat;?><br>
		<i>Date & Time: </i>		<?php echo $d_t;?><br>
			Location:<br>
			<i>Postal Code: </i>		<?php echo $p_code;?><br>
			<i>Street Name: </i>		<?php echo $strt_n;?><br>
			<i>Street No: </i>		<?php echo $street;?><br>
			<i>Thana: </i>		<?php echo $th;?><br>
			<i>District: </i>		<?php echo $ds;?><br>
			<i>Division: </i>		<?php echo $dv;?><br>
						<hr></div>
					
					<div id="case">
					<b>CRIMINALS</b><hr><br>
					<?php $query1=mysql_query("select * from criminal,criminalize where criminalize.crime_id='$cr_id'and criminalize.criminal_id=criminal.criminal_id");
								confirm_connection($query1);
									while($r1=mysql_fetch_array($query1)) {	
										$crm_id=$r1['criminal_id'];
										$cFnm=$r1['Fname'];					
										$cMnm=$r1['Mname'];					
										$cLnm=$r1['Lname'];					
										$cPub=$r1['public_name'];					
										$cAge=$r1['age'];					
										$cSex=$r1['sex'];					
									
					?>
					<ul>
						<li>
							<br>
							<i>Criminal ID:</i> <?php echo $crm_id;?><br>		
							<b>Criminal Name:</b><br>					
							<i>First Name: </i>		<?php echo $cFnm;?><br>		
							<i>Middle Name: </i>		<?php echo $cMnm;?><br>
							<i>Last Name: </i>		<?php echo $cLnm;?><br>
							<i>Sex: </i>		<?php echo $cSex;?><br>	
							<i>Age: </i>		<?php echo $cAge;?><br>
							<form method="post" action="criminaldetails.php">
									<input type="hidden" name="cr_id" value="<?php echo $crm_id ?>">
									<input id="button1" type="submit" name="submit" value="CRIMINAL DETAILS"/>
							</form>								
							
						</li>					
					</ul>
					  <?php }?>
					  <hr></div>
					
					
					  <div id="case">
					  <b>VICTIMS</b><hr><br>
					<?php $query2=mysql_query("select * from victim,victimize where victimize.crime_id='$cr_id'and victimize.victim_id=victim.victim_id");
								confirm_connection($query2);
									while($r2=mysql_fetch_array($query2)) {	
										$vctm_id=$r2['victim_id'];
										$vFnm=$r2['Fname'];					
										$vMnm=$r2['Mname'];					
										$vLnm=$r2['Lname'];										
										$vAge=$r2['age'];					
										$vSex=$r2['sex'];	
										$vPc=$r2['postal_code'];
										$vTh=$r2['thana'];
										$vDs=$r2['district'];
										$vDv=$r2['division'];					
									
					?>
					<ul>
						<li>
							<br>
							<i>Victim ID:</i>	 <?php echo $vctm_id;?><br>				
							Victim Name:<br>					
							<i>First Name: </i>		<?php echo $vFnm;?><br>		
							<i>Middle Name: </i>		<?php echo $vMnm;?><br>
							<i>Last Name: </i>		<?php echo $vLnm;?><br>
							<i>Sex: </i>		<?php echo $vSex;?><br>	
							<i>Age: </i>		<?php echo $vAge;?><br>	
							Address:<br>
							<i>Postal Code: </i>		<?php echo $vPc;?><br>
							<i>Thana: </i>		<?php echo $vTh;?><br>
							<i>District: </i>		<?php echo $vDs;?><br>
							<i>Division: </i>		<?php echo $vDv;?><br>									
						</li>					
					</ul>
					  <?php }?>
					  <hr></div>
					  
					  <div id="case">
					  <b>CASE STATUS</b><hr><br>
					<?php $query4=mysql_query("select * from crime_case,case_status where case_status.crime_id='$cr_id' and crime_case.crime_id='$cr_id'");
								confirm_connection($query4);
									while($r4=mysql_fetch_array($query4)) {	
										$sts_id=$r4['status_id'];
										$sts=$r4['status'];					
										$adNm=$r4['advocate_name'];					
										$ctOd=$r4['court_order'];					
										$stsAct=$r4['act'];					
										$stsJudge=$r4['judge'];					
										$stsInv=$r4['Investigator'];					
									
					?>
					<ul>
						<li>
							<br>
							<i>Status ID:</i>       <?php echo $sts_id;?><br>									
							<i>Status: </i>		<?php echo $sts;?><br>		
							<i>Advocate Name: </i>		<?php echo $adNm;?><br>
							<i>Act: </i>		<?php echo $stsAct;?><br>	
							<i>Judge: </i>		<?php echo $stsJudge;?><br>	
							<i>Investigator: </i>		<?php echo $stsInv;?><br>
							<i>Court Order: </i>		<?php echo $ctOd;?><br>									
						</li>					
					</ul>
					  <?php }?>
					  <hr></div>
					  
					  <?php }?>
					  
					  
	 <?php }?>
	 
	
	 <?php
	 //----------------------------------start of criminal details-------------------------------------------------
	 				
				 if(isset($_GET['cr_id'])) {
											echo '<h3 style="float:center;">:::::::::::::::::Details Of a Criminal::::::::::::::::::::::::::::: </h3>';				 						
				 						
				 						$criminal_id=$_GET['cr_id'];
									 	$query5=mysql_query("select * from criminal where criminal_id='$criminal_id'");
										confirm_connection($query5);
												while($r5=mysql_fetch_array($query5)) {	
													$crm_id=$r5['criminal_id'];
													$cFnm=$r5['Fname'];					
													$cMnm=$r5['Mname'];					
													$cLnm=$r5['Lname'];					
													$cPub=$r5['public_name'];					
													$cAge=$r5['age'];					
													$cSex=$r5['sex'];	
													$cPc=$r5['postal_code'];
													$cTh=$r5['thana'];
													$cDs=$r5['district'];
													$cDv=$r5['division'];				
	?>	 	 
	<i>Criminal ID:</i><a href="details.php?cr_id=<?php echo $crm_id; ?>">	<?php echo $crm_id;?></a><br>				
							<b>Criminal Name:</b><br><br>					
							<i>First Name: </i>		<?php echo $cFnm;?><br>		
							<i>Middle Name: </i>		<?php echo $cMnm;?><br>
							<i>Last Name: </i>		<?php echo $cLnm;?><br>
							<i>Sex: </i>				<?php echo $cSex;?><br>	
							<i>Age: </i>				<?php echo $cAge;?><br>	<br>
							<b>Address:</b>
							<hr>
							<i>Postal Code:</i>				<?php echo $cPc;?><br>	
							<i>Thana:</i>				<?php echo $cTh;?><br>	
							<i>District:</i>				<?php echo $cDs;?><br>	
							<i>Division</i>				<?php echo $cDv;?><br>
							<b>Records:</b>
								<?php 
										$query6=mysql_query("select * from category,criminalize where criminalize.criminal_id='$criminal_id' and criminalize.cat_id=category.cat_id");
											confirm_connection($query6);			
												while($r6=mysql_fetch_array($query6)) {
													$cat_id=$r6['cat_id'];
													$cat_name=$r6['cat_name'];
													$crime_id=$r6['crime_id'];
													$query7=mysql_query("select crime_name from crime_case where crime_id='$crime_id'");
													confirm_connection($query7);	
								?>
								<ul>
										<li>Category:<?php echo $cat_name.":".$cat_id;?><br>
										</li>	
										<?php
										while($r7=mysql_fetch_array($query7)) { 
										$crime_name=$r7['crime_name']
										?>	
										<li>crime name:<a href="details.php?cid=<?php echo $crime_id; ?>"><?php echo $crime_name;?></a></li>																			
								</ul>	
 	 																																		<?php }?>
 	 																																		<?php }?>
 	 																				<?php }?>
	 										 <?php }
/*------------------------------------------------------end of criminal          details=---------------------------	

--------------------                      start of date---------
 */										 
	 										 ?>
	 										 <?php
	 										 if(isset($_GET['c_d'])) {
	 										 	$date = $_GET['c_d'];
	 										 	$query7=mysql_query("select * from crime_case where `date`='$date'");
											confirm_connection($query7);			
												while($r7=mysql_fetch_array($query7)) {
													$cr_id=$r7['crime_id'];
													$crm_name=$r7['crime_name'];
													$d_t=$r7['date'];
					  ?>
			Crime Name:	<a href="details.php?cid=<?php echo $cr_id; ?>">	<?php echo $crm_name;?></a><br>
			ID:	<a href="details.php?cid=<?php echo $cr_id; ?>">	<?php echo $cr_id;?></a><br>
			Date & Time:	<a href="details.php?c_d=<?php echo $d_t; ?>">	<?php echo $d_t;?></a><br>
									<hr>				
													<?php
												}
	 										 }
	 										 
 /*------------------------------------------------------end of date-     ---------------------------------------	

--------------------                      start of  category     ------------------------------------------------------------
 */
?>
<?php
		if(isset($_GET['cat'])) {
	 										 	$cat_id = $_GET['cat'];
	 										 	$query=mysql_query("select * from crime_case where cat_id='$cat_id'");
	 										 	confirm_connection($query);
	 										 	if(mysql_num_rows($query)>0) {
	 										 	while($ro=mysql_fetch_array($query)) {
								$cr_id=$ro['crime_id'];
								$crm_name=$ro['crime_name'];
								$d_t=$ro['date'];
					  ?>
			Crime Name:	<a href="details.php?cid=<?php echo $ro['crime_id']; ?>">	<?php echo $crm_name;?></a><br>
			ID:	<a href="details.php?cid=<?php echo $ro['crime_id']; ?>">	<?php echo $cr_id;?></a><br>
			Date & Time:	<a href="details.php?c_d=<?php echo $d_t; ?>">	<?php echo $d_t;?></a><br>
						<hr>
<?php
																}
							}
							else {
								echo 'no entry found';
							}
}
/*------------------------------------------------------end of category    ---------------------------------------	

--------------------                      start of       ------------------------------------------------------------
 */
?>
<?php } include("includes/db_disconnect.php"); ?>