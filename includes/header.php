<?php error_reporting(0); ?>


<html>
<body>
<div id="container">
<div id="hello" style="background-color:#952A0C;height:50px;float:right;font-size:20px;">
    <br/>
    <font color="white">Hello, <a href="accounts.php?token=<?php echo $_SESSION['id'];?>" style="color:#C7D7EE"><?php echo $_SESSION['username'];?></a> !</font>
    <br/>
    <a href="index.php?logout" style="color:#C7D7EE">Logout</a>
</div>
    
<div id="header" style="background-color:#952A0C;height:100px;text-align:center">
<br/>
    <h1 style="margin-bottom:0;"><font color="white">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Case Study & Criminal Report</font></h1></div>
<div id="search" style="background-color:#F3F4F5;height:40px;float:none;text-align:center;font-size:25px;">
<b>Search by:</b>&nbsp;&nbsp;&nbsp;
<a href="searchbyid.php" style="color:#952A0C;text-decoration: none;">Case ID</a>&nbsp;&nbsp;&nbsp;
<a href="searchbydate.php" style="color:#952A0C;text-decoration: none;">Date</a>&nbsp;&nbsp;&nbsp;
<a href="searchbycname.php" style="color:#952A0C;text-decoration: none;">Criminal Name</a>&nbsp;&nbsp;&nbsp;
</div>
<div id="menu" style="background-color:#952A0C;height:40px;float:none;text-align:center;font-size:25px;">
    <a href="userdefault.php" style="color:#EFF9F9;text-decoration: none;">Home</a>&nbsp;&nbsp;&nbsp;
    <a href="category.php" style="color:#EFF9F9;text-decoration: none;">Categories</a>&nbsp;&nbsp;&nbsp;
    <a href="mwl.php" style="color:#EFF9F9;text-decoration: none;">Most Wanted List</a>&nbsp;&nbsp;&nbsp;
    <a href="phonebook.php" style="color:#EFF9F9;text-decoration: none;">Phonebook</a>&nbsp;&nbsp;&nbsp;
    <a href="accounts.php?token=<?php echo $_SESSION['id'];?>" style="color:#EFF9F9;text-decoration: none;">Account</a>&nbsp;&nbsp;
</div>
</div>
</body>
</html>

<?php
if($_SESSION['admin']=='1'){
    include("includes/adminpanel.php");
}
?>