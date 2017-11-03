<?php
include("includes/db_connect.php");
include("includes/functions.php");
include("includes/header.php");
if(!loggedin()) {
	header("location:index.php?not_logged_in");}
	else {
if(isset($_POST['submit'])) {
if($_POST['caseid']) {
	$crime=$_POST['caseid'];
				$query="select * from crime_case where crime_id='$crime'";
				$result=mysql_query($query);
			if(mysql_num_rows($result) > 0) {
						while($ro=mysql_fetch_array($result)) {
								$cr_id=$ro['crime_id'];
								$crm_name=$ro['crime_name'];
								$d_t=$ro['date&time'];
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
							
			<div id="case">
			Crime Name:	<a href="details.php?cid=<?php echo $ro['crime_id']; ?>">	<?php echo $crm_name;?></a><br>
			ID:	<a href="details.php?cid=<?php echo $ro['crime_id']; ?>">	<?php echo $cr_id;?></a><br>
			Date & Time:	<a href="details.php?c_d=<?php echo $d_t; ?>">	<?php echo $d_t;?></a><br>
						<hr>
			</div>
					  <?php }}
					else {
							echo 'No result found';
						}	
				}
			/*-------------------end of search by case id-----------------------------------------------------------
				
				
			--------------------start of search by case date-----------------------------------------------------------*/
			?>		
			<?php
				if($_POST['start']&&$_POST['end']) {
					$st=$_POST['start'];				
					$end=$_POST['end'];
					$query1="select *  from crime_case where `date` between '$st' and '$end'";
				$result1=mysql_query($query1);
			if(mysql_num_rows($result1) > 0) {
						while($r1=mysql_fetch_array($result1)) {
								$cr_id=$r1['crime_id'];
								$crm_name=$r1['crime_name'];
								$d_t=$r1['date'];
								?>		
								<div id="case">
								Crime Name:	<a href="details.php?cid=<?php echo $cr_id; ?>">	<?php echo $crm_name;?></a><br>
								ID:	<a href="details.php?cid=<?php echo $cr_id; ?>">	<?php echo $cr_id;?></a><br>
								Date & Time:	<a href="details.php?c_d=<?php echo $d_t; ?>">	<?php echo $d_t;?></a><br><hr></div>
				<?php
					}
				}
				else {
							echo 'No result found';
						}	
				}
				
				/*-------------------end of search by case date-----------------------------------------------------------
				
				
			--------------------start of search by case name-----------------------------------------------------------*/
				?>
				<?php
				if($_POST['cname']) {
					$cname=$_POST['cname'];	
					$name="%".$cname."%";			
					$query2="select *  from criminal where (public_name like '$name' or Fname like '$name' or Mname like '$name' or Lname like '$name')LIMIT 0 , 30";
				$result2=mysql_query($query2);
			if(mysql_num_rows($result2) > 0) {
						while($r1=mysql_fetch_array($result2)) {
								$crm_id=$r1['criminal_id'];
										$cFnm=$r1['Fname'];					
										$cMnm=$r1['Mname'];					
										$cLnm=$r1['Lname'];					
										$cPub=$r1['public_name'];					
										$cAge=$r1['age'];					
										$cSex=$r1['sex'];		
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
				<?php
					}
				}
				else {
							echo 'No result found';
						}	
				}
				
				/*-------------------end of search by case name-----------------------------------------------------------*/
				?>
<?php
//----------------------------------------------------------------------------------------------
				
	}
	else {
					
						echo 'Please Enter a search query';
			  }
}
?>
<?php include("includes/db_disconnect.php");
?>