<?php
include("includes/db_connect.php");
include("includes/functions.php");
include("includes/header.php");
if(!loggedin()) {
	header("location:index.php?not_logged_in");}
    
if($_SESSION['admin']=='1'){
$query="SELECT * FROM admin WHERE admin='0'";
$result=mysql_query($query);
while($ro=mysql_fetch_array($result)){
    $id=$ro['id'];
    $user=$ro['user'];
    $email=$ro['email'];

?>
       <style>
        #case{
margin-top:20px;
margin-bottom:20px;
margin-right:150px;
margin-left:350px;
border:3px solid #a1a1a1;
padding:9px 35px; 
width:500px;border-radius:20px;
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
    <i>User ID: </i>		<?php echo $id;?><br>		
	<i>Username: </i>		<?php echo $user;?><br>
	<i>Email: </i>		<?php echo $email;?><br><hr>
    

    <form method="POST" action="useradmin1.php">
        <input type="hidden" name="user_id" value="<?php echo $id ?>">
<input id="button1" type="submit" value="MAKE ADMIN">
    </form>
	
    <form method="POST" action="deluser.php">
        <input type="hidden" name="user_id" value="<?php echo $id ?>">
<input id="button1" type="submit" value="DELETE USER">
    </form>
    
</div>

<?php } ?>
<?php } ?>