<?php
include("includes/functions.php"); 
include("includes/header.php");
if(!loggedin()) {
	header("location:index.php?not_logged_in");}
	else {
?>
  <style>
        #searchbyid{
margin-top:100px;
margin-bottom:150px;
margin-right:150px;
margin-left:450px;
border:3px solid #a1a1a1;
padding:9px 35px; 
width:250px;border-radius:20px;
box-shadow: 7px 7px 6px;
}
#button{
width:100px;
height:30px;
font-weight:bold;
font-size:20px
}
    </style>
    
<div id="searchbyid">
    <fieldset style="width:30%"><legend>Search by Case Id</legend>
<form method="POST" action="search.php">
    Case ID <br><input type="number" name="caseid" min="1"><br>
    <br><input id="button" type="submit" name="submit" value="Search">
    </form>
</fieldset>
</div>
</body>
</html>
<?php }?>