<?php
if($_SESSION['admin']=='1'){
include("adduser.php");
?>
<html>
<p style="text-align:center">***Fill the Form Correctly!***</br></p>
<p style="text-align:center">1.Password Must Contains At Least 5 Characters!</br></p>
<p style="text-align:center">2.Username & Password Field Must be filled.</br></p>
</html>
<?php } ?>