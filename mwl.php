<?php
include("includes/db_connect.php");
include("includes/header.php");
include("includes/functions.php");
if(!loggedin()) {
	header("location:index.php?not_logged_in");}
    
$query="SELECT * FROM criminal WHERE mwl='1'";
$result=mysql_query($query);

while($r1=mysql_fetch_array($result)){
								$crm_id=$r1['criminal_id'];
										$cFnm=$r1['Fname'];					
										$cMnm=$r1['Mname'];					
										$cLnm=$r1['Lname'];					
										$cPub=$r1['public_name'];
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
		#button1{
width:160px;
height:30px;
font-weight:bold;
font-size:13px;
background:#ff0000;
margin-left:auto;
margin-right:auto;
}
		</style>
								
								<div id="case">
								<i></i>Criminal ID:</i>	<?php echo $crm_id;?></a><br>	
								<i>First Name: </i>		<?php echo $cFnm;?><br>		
							<i>Middle Name: </i>		<?php echo $cMnm;?><br>
							<i>Last Name: </i>		<?php echo $cLnm;?><br>
							<i>Public Name: </i>		<?php echo $cPub;?><br>
							<form method="post" action="criminaldetails.php">
									<input type="hidden" name="cr_id" value="<?php echo $crm_id ?>">
									<input id="button1" type="submit" name="submit" value="CRIMINAL DETAILS"/>
							</form>	
                                </div>
    
<?php } ?>