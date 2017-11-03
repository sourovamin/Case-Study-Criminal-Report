<?php include("includes/db_connect.php");
include("includes/functions.php");
include("includes/header.php");

if(!loggedin()) {
	header("location:index.php?not_logged_in");
    }
    
    
?>

    <style>
        #case{
margin-top:90px;
margin-bottom:50px;
margin-right:150px;
margin-left:350px;
border:3px solid #a1a1a1;
padding:9px 35px; 
width:500px;border-radius:20px;
box-shadow: 7px 7px 6px;
		}
#button{
width:200px;
height:40px;
font-weight:bold;
font-size:30px;
background:#ff0000;
margin-left:auto;
margin-right:auto;
display:block;
}
	</style>

<?php
$receive=$_POST['edid'];
	
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
        }
					  ?>
                      

                      
                      
                      
 <form  method="post" action="editcase.php">
	<div id="case">
    <fieldset>
		<legend>
			CRIME DETAILS
		</legend>
        <input type="hidden" name="crime_id" value="<?php echo $cr_id ?>">
		Crime Name :
		<input name="crime_name"type="text" size="70" maxlength="200" value="<?php echo htmlentities($crm_name);?>" />
		<br /><br>
		Date & Time :
		<input name="crime_date" type="datetime" value="<?php echo $d_t;?>" />
		<br />
		<br>
		Address:
		<ul>
			<li>
				street_name :
				<br><input name="crime_stree_name"type="text" size="50" maxlength="100" value="<?php echo $strt_n;?>"/>
			</li>
			<li>
				street_no :
				<br><input name="crime_stree_no"type="text" size="30" maxlength="30" value="<?php echo $street;?>"/>
			</li>
			<li>
				postal_code :
				<br><input name="crime_postal_code"type="text" min="1000" value="<?php echo $p_code;?>"/>
			</li>
			<li>
				Thana :
				<br><input name="crime_thana"type="text" size="30" maxlength="20" value="<?php echo $th;?>"/>
			</li>
			<li>
				District :
				<br><input name="crime_district"type="text" size="30" maxlength="20" value="<?php echo $ds;?>"/>
			</li>
			<li>
				division :
				<br><input name="crime_division"type="text" size="30" maxlength="20" value="<?php echo $dv;?>"/>
			</li>
		</ul>
		Category:
		<br><select name="category">
<option value="1">Murder</option>
<option value="2">Rape</option>
<option value="3">Kidnapping</option>
<option value="4">Theft</option>
<option value="5">Robbery</option>
<option value="6">Blackmailing</option>
<option value="7">Drug</option>
<option value="8">Cyber</option>
<option value="9">Vandalism</option>
<option value="10">Sexual Harassment</option>
<option value="11">Bombing</option>
<option value="12">Other</option>
</select>
	</fieldset>
	<input id="button" type="submit" name="submit" value="UPDATE"/>
    </div>
</form>



<?php
        $query1=mysql_query("select * from criminal,criminalize where criminalize.crime_id='$receive'and criminalize.criminal_id=criminal.criminal_id");
								confirm_connection($query1);
									while($r1=mysql_fetch_array($query1)) {	
										$crm_id=$r1['criminal_id'];
										$cFnm=$r1['Fname'];					
										$cMnm=$r1['Mname'];					
										$cLnm=$r1['Lname'];					
										$cPub=$r1['public_name'];					
										$cAge=$r1['age'];					
										$cSex=$r1['sex'];
										$cPc=$r1['postal_code'];
										$cTh=$r1['thana'];
										$cDs=$r1['district'];
										$cDv=$r1['division'];										
									?>
<form  method="post" action="editcriminal.php">
<div id="case">
	<fieldset>
		<legend>
			Criminal's Detail
		</legend>
		<input type="hidden" name="crmnl" value="<?php echo $crm_id ?>">
		First Name :
		<br><input name="crm_fname"type="text" size="50" maxlength="14" value="<?php echo $cFnm;  ?>" size="50" />
		<br />
		Middle Name :
		<br><input name="crm_mname"type="text" size="50" maxlength="14" value="<?php echo $cMnm;  ?>" size="50" />
		<br />
		Last Name :
		<br><input name="crm_lname"type="text" size="50" maxlength="14" value="<?php echo $cLnm;  ?>" size="50" />
		<br />
		Public Name :
		<br><input name="crm_pubname"type="text" size="50" maxlength="15" value="<?php echo $cPub;  ?>" size="50" />
		<br />
		Age :
		<br><input name="crm_age" type="text" value="<?php echo $cAge;  ?>" size="3"/>
		<br />
		<br>
		Sex :
        <br><select name="crm_sex">
<option value="male">Male</option>
<option value="female">Female</option>
<option value="other">Other</option>
</select>
		<br />
		<br>
		Address:
		<ul>
			<li>
				postal_code :
				<br><input name="crm_postal_code"type="text" min="1000" value="<?php echo $cPc;  ?>" />
			</li>
			<li>
				Thana :
				<br><input name="crm_thana"type="text" size="50" maxlength="20" value="<?php echo $cTh;  ?>"/>
			</li>
			<li>
				District :
				<br><input name="crm_district"type="text" size="50" maxlength="20" value="<?php echo $cDs;  ?>"/>
			</li>
			<li>
				division :
				<br><input name="crm_division"type="text" size="50" maxlength="20" value="<?php echo $cDv;  ?>"/>
			</li>
		</ul>
        <br>
Most Wanted List<br><select name="mwl">
<option value="0">No</option>
<option value="1">Yes</option>
</select>
		<br />
		<br>
	</fieldset>
	<input id="button" type="submit" name="submit" value="UPDATE" />
</div>
	</form>
    
    <?php } ?>



<?php
$query2=mysql_query("select * from victim,victimize where victimize.crime_id='$receive'and victimize.victim_id=victim.victim_id");
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
<form  method="post" action="editvictim.php">
<div id="case">
<fieldset>
		<legend>
			Victim's Detail
		</legend>
		<input type="hidden" name="vctm" value="<?php echo $vctm_id ?>">
		First Name :
		<br><input name="vctm_fname"type="text" size="50" maxlength="14" value="<?php echo $vFnm;?>"/>
		<br />
		Middle Name :
		<br><input name="vctm_mname"type="text" size="50" maxlength="14" value="<?php echo $vMnm;?>"/>
		<br />
		Last Name :
		<br><input name="vctm_lname"type="text" size="50" maxlength="14" value="<?php echo $vLnm;?>"/>
		<br />
		Age :
		<input name="vctm_age" type="text" min="1" max="150" value="<?php echo $vAge;?>"/>
		<br />
		<br>
		Sex :
        <br><select name="vctm_sex">
<option value="male">Male</option>
<option value="female">Female</option>
<option value="other">Other</option>
</select>
		<br />
		<br>
		Address:
		<ul>
			<li>
				postal_code :
				<br><input name="vctm_postal_code"type="text" min="1000" value="<?php echo $vPc;?>"/>
			</li>
			<li>
				Thana :
				<br><input name="vctm_thana"type="text" size="50" maxlength="20" value="<?php echo $vTh;?>"/>
			</li>
			<li>
				District :
				<br><input name="vctm_district"type="text" size="50" maxlength="20" value="<?php echo $vDs;?>"/>
			</li>
			<li>
				division :
				<br><input name="vctm_division"type="text" size="50" maxlength="20" value="<?php echo $vDv;?>"/>
			</li>
		</ul>
	</fieldset>
	<input id="button" type="submit" name="submit" value="UPDATE" />
</div>
</form>

<?php } ?>



<?php
$query4=mysql_query("select * from crime_case,case_status where case_status.crime_id='$receive' and crime_case.crime_id='$receive'");
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
<form  method="post" action="editstatus.php"> 
<div id="case">
<fieldset>
		<legend>
			Case Status
		</legend>
        <input type="hidden" name="status" value="<?php echo $sts_id ?>">
        <input type="hidden" name="crmid" value="<?php echo $receive ?>">
		Status :
		<br><input type="text" name="stat" size="50" maxlength="20" value="<?php echo $sts;?>"/>
		<br />
		Advocate Name :
		<br><input type="text" name="adv_name" size="60" maxlength="50" value="<?php echo $adNm;?>" />
		<br />
		Court Order :
		<br><input type="text" name="court_order" size="60" maxlength="100" value="<?php echo $ctOd;?>"/>
		<br />
		Act :
		<br><input type="text" name="act" size="60" maxlength="100" value="<?php echo $stsAct;?>"/>
		<br />
		Judge :
		<br><input type="text" name="judge" size="60" maxlength="40" value="<?php echo $stsJudge;?>"/>
		<br />
		Investigator :
		<br><input type="text" name="investigator" size="60" maxlength="40" value="<?php echo $stsInv;?>"/>
		<br />
	</fieldset>
	<input id="button" type="submit" value="UPDATE" name="submit" />
</div>
</form>

<?php } ?>
