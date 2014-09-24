<?php
<<<<<<< HEAD
$con=mysqli_connect("173.194.107.202","root","mchocolat","test");
=======
$con=mysql_connect(':cloudsql/inventorymchocolat:mchocolat',"root","");
mysql_select_db('test');
>>>>>>> parent of d17fa39... updated DB string again
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

date_default_timezone_set('EST');
ini_set('display_errors', 'On');
?>