<?php
$con=mysql_connect(':cloudsql/inventorymchocolat:mchocolat',"root","");
mysql_select_db('test');
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

date_default_timezone_set('EST');
ini_set('display_errors', 'On');
?>