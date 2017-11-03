<?php
include("includes/functions.php"); 
include("includes/header.php");
if(!loggedin()) {
	header("location:index.php?not_logged_in");}
	else {
?>
    <style>
        #searchbydate{
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
    
<div id="searchbydate">
    <fieldset style="width:30%"><legend>Search by Date</legend>
<form method="POST" action="search.php">
    Starting Date <br><input type="date" name="start" min="2000-01-01"><br>
    Ending Date <br><input type="date" name="end" ><br>
    
    <br><input id="button" type="submit" name="submit" value="Search">
    </form>
</fieldset>
</div>
</body>
</html>
<?php }?>
