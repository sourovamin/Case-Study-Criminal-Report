<?php
include("includes/db_connect.php");
include("includes/functions.php");
include("includes/header.php");

if(!loggedin()) {
	header("location:index.php?not_logged_in");}
?>

<?php
if($_SESSION['admin']=='1'){
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
width:700px;
height:90px;
font-weight:bold;
font-size:70px;
background:#ff0000;
margin-left:auto;
margin-right:auto;
display:block;
}
	</style>


<?php
$query1="SELECT MAX(crime_id) AS id FROM crime_case";
$result1=mysql_query($query1);
$ro1=mysql_fetch_array($result1);
$id1=$ro1['id']+1;
?>

<form method="POST" action="addcase_action.php">
	
<div id="case">
    <fieldset style="width:30%"><legend>Case Details</legend>
	<pre>
*Case ID <br><input type="number" name="case_id" value="<?php echo $id1 ?>" min="0"><br>
*Case Title <br><input type="text" name="crime_name" size="70" maxlength="200"><br>
Date & Time <br><input type="datetime" name="date&time">

Category <br><select name="category">
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

Street Name <br><input type="text" name="stree_name" size="50" maxlength="100"><br>
Street No. <br><input type="text" name="stree_no" size="30" maxlength="30"><br>
Postal Code <br><input type="number" name="postal_code" min="1000"><br>
Thana <br><input type="text" name="thana" size="30" maxlength="20"><br>
District <br><input type="text" name="district" size="30" maxlength="20"><br>
Division <br><input type="text" name="division" size="30" maxlength="20"><br>
	    </pre>
</fieldset>
</div>


<?php
$query2="SELECT MAX(criminal_id) AS cri_id FROM criminal";
$result2=mysql_query($query2);
$ro2=mysql_fetch_array($result2);
$id2=$ro2['cri_id']+1;
?>

<br><p><center>***IF THE CRIMINAL ALREADY EXISTS IN DATABASE THEN JUST CHOOSE <b>CRIMINAL ID</b> AND LEAVE EVERYTHING BLANK***</center></p>
<?php
$criminal=$_POST['criminal'];
for($num=0;$num<$criminal;$num++){
?>


<div id="case">
    <fieldset style="width:30%"><legend>Criminal Details</legend>
	<pre>
*Criminal ID <br><input type="number" name="criminal_id[]" value="<?php echo $id2+$num ?>" min="0"><br>
First Name <br><input type="text" name="cfname[]" size="50" maxlength="14"><br>
Middle Name <br><input type="text" name="cmname[]" size="50" maxlength="14"><br>
Last Name <br><input type="text" name="clname[]" size="50" maxlength="14"><br>
Public Name <br><input type="text" name="public_name[]" size="50" maxlength="15"><br>
Age <br><input type="number" name="cage[]" min="1" max="150"><br>
Sex <br><select name="csex[]">
<option value="male">Male</option>
<option value="female">Female</option>
<option value="other">Other</option>
</select><br>
Postal Code <br><input type="number" name="cpostal_code[]" min="1000"><br>
Thana <br><input type="text" name="cthana[]" size="50" maxlength="20"><br>
District <br><input type="text" name="cdistrict[]" size="50" maxlength="20"><br>
Division <br><input type="text" name="cdivision[]" size="50" maxlength="20"><br>
Most Wanted List <br><select name="mwl[]">
<option value="0">No</option>
<option value="1">Yes</option>
</select><br>
	    </pre>
</fieldset>
</div>
<?php } ?>

<?php
$query3="SELECT MAX(victim_id) AS vic_id FROM victim";
$result3=mysql_query($query3);
$ro3=mysql_fetch_array($result3);
$id3=$ro3['vic_id']+1;
?>

<br><p><center>***IF THE VICTIM ALREADY EXISTS IN DATABASE THEN JUST CHOOSE <b>VICTIM ID</b> AND LEAVE EVERYTHING BLANK***</center></p>

<?php
$victim=$_POST['victim'];
for($num=0;$num<$victim;$num++){
?>

<div id="case">
    <fieldset style="width:30%"><legend>Victim Details</legend>
	<pre>
*Victim ID <br><input type="number" name="victim_id[]" value="<?php echo $id3+$num ?>" min="0"><br>
First Name <br><input type="text" name="vfname[]" size="50" maxlength="14"><br>
Middle Name <br><input type="text" name="vmname[]" size="50" maxlength="14"><br>
Last Name <br><input type="text" name="vlname[]" size="50" maxlength="14"><br>
Age <br><input type="number" name="vage[]" min="1" max="150"><br>
Sex <br><select name="vsex[]">
<option value="male">Male</option>
<option value="female">Female</option>
<option value="other">Other</option>
</select><br>
Postal Code <br><input type="number" name="vpostal_code[]" min="1000"><br>
Thana <br><input type="text" name="vthana[]" size="50" maxlength="20"><br>
District <br><input type="text" name="vdistrict[]" size="50" maxlength="20"><br>
Division <br><input type="text" name="vdivision[]" size="50" maxlength="20"><br>
	    </pre>
</fieldset>
</div>
<?php } ?>


<?php
$query4="SELECT MAX(status_id) AS sts_id FROM case_status";
$result4=mysql_query($query4);
$ro4=mysql_fetch_array($result4);
$id4=$ro4['sts_id']+1;
?>

<div id="case">
    <fieldset style="width:30%"><legend>Case Status</legend>
	<pre>
*Status ID <br><input type="number" name="status_id" value="<?php echo $id4 ?>" min="0"><br>
Status <br><input type="text" name="status" size="50" maxlength="20"><br>
Advocate Name <br><input type="text" name="advocate_name" size="60" maxlength="50"><br>
Court Order <br><input type="text" name="court_order" size="60" maxlength="100"><br>
Act <br><input type="text" name="act" size="60" maxlength="100"><br>
Judge <br><input type="text" name="judge" size="60" maxlength="40"><br>
Investigator <br><input type="text" name="investigator" size="60" maxlength="40"><br>

	    </pre>
</fieldset>
</div>


<input id="button" type="submit" name="add" value="SUBMIT CASE">

<input type="hidden" name="cri_num" value="<?php echo $criminal;?>">
<input type="hidden" name="vic_num" value="<?php echo $victim;?>">
</form>
	
<?php } ?>	