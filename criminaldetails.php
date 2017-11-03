<?php
include("includes/db_connect.php");
include("includes/functions.php");
include("includes/header.php");
if(!loggedin()) {
	header("location:index.php?not_logged_in");}
?>    


    <style>
        #case{
margin-top:10px;
margin-bottom:50px;
margin-right:150px;
margin-left:350px;
border:3px solid #a1a1a1;
padding:9px 35px; 
width:500px;border-radius:20px;
box-shadow: 7px 7px 6px;
		}

	</style>


<?php

				 						$criminal_id=$_POST['cr_id'];
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
	  
    
    
    <br><br><h3><center><b>CRIMINAL DETAILS</b></center></h3>
    <div id="case">
    <i>Criminal ID:</i>	<?php echo $crm_id;?><br>				
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

 
 <?php } ?>
 <?php }?>

 
 </div>
