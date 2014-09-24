<?php
include "_header.php";
?>
<!DOCTYPE html>
<html>
<body>
<?php


global $con;

echo 'connected';

// escape variables for security
$quantity = mysqli_real_escape_string($con, $_POST['quantity']);
$contents = mysqli_real_escape_string($con, $_POST['contents']);
$date = date("Y-m-d");

echo "got data";
echo "{$date}";
$sql="INSERT INTO assortments (AID, DOC, quantity, contents)
VALUES (null, '$date', '$quantity', '$contents');";

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
echo "1 record added";

mysqli_close($con);

echo "something";
?>
</body>
</html>
