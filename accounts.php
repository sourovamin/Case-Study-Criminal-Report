<?php
include("includes/db_connect.php");
include("includes/functions.php");
include("includes/header.php");
if(!loggedin()) {
	header("location:index.php?not_logged_in");
	}
?>
	<?php
			if(isset($_GET['token'])) {
			$id=$_GET['token'];			
			$query = mysql_query("SELECT * FROM admin where id='$id'");
			$row=mysql_fetch_array($query);	
		?>
		
	<style>
		        #case{
margin-top:50px;
margin-bottom:40px;
margin-right:150px;
margin-left:400px;
border:3px solid #a1a1a1;
padding:9px 35px; 
width:400px;border-radius:20px;
box-shadow: 7px 7px 6px;
		}
		#button{
width:140px;
height:30px;
font-weight:bold;
font-size:13px;
background:#ff0000;
margin-left:auto;
margin-right:auto;
}
	</style>
		
		<div id="case">
		<form method="POST" action="accounts.php?edit">
    Username <br><input type="text" name="user" value="<?php echo $row['user']?>" size="40"><br>
   Email <br><input type="text" name="email" value="<?php echo $row['email']?>" size="40"><br>
 Previous password <br><input type="password" name="pass" size="40"><br>
 New password <br><input type="password" name="newpass" size="40"><br><br>
    <input id="button" type="submit" name="submit" value="UPDATE">
    </form>
		</div>
			<?php }	?>
			<?php
			if(isset($_GET['edit'])) {
			$user=$_POST['user'];			
			$pass=$_POST['pass'];			
			$email=$_POST['email'];
			$newpass=$_POST['newpass'];
			$id=$_SESSION['id'];
			$query =mysql_query("select pass from admin where id='$id'"); 
			$dpass=mysql_fetch_array($query);
			mysql_query("update admin set user='$user',`email`='$email',pass='$newpass' where `pass` ='$pass' and id='$id'");
		if($dpass['pass']==$pass)
		 {
			header("location:index.php?logout");
		}
		else echo 'accounts update failed';
	}
		?>
	
