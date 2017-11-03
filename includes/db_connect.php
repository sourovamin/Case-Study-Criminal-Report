<?php
define('DB_HOST','localhost:3306');
define('DB_NAME','criminal_case');
define('DB_USER','root');
define('DB_PASSWORD','');
$connection=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
if(mysql_error($connection)){
	die("Database connection Failed".mysql_error()."(".mysql_errno().")");
}
mysql_query("USE criminal_case");
 ?>