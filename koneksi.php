<?php 



global $mysqli;    
$dbserver="localhost";     
$dbusername="tori";     
$dbpassword="12345";     
$dbname="makanapaya";     
$mysqli = mysqli_connect($dbserver, $dbusername, $dbpassword, $dbname);
mysql_select_db($dbname);



?> 
