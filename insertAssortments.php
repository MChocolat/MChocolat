<?php
include "_header.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Assortment Inserted</title>
</head>
<body>
<?php


global $con;

echo "connected... ";


// escape variables for security
$quantity = mysqli_real_escape_string($con, $_POST['quantity']);
$contents = mysqli_real_escape_string($con, $_POST['contents']);
$date = date("Y-m-d");

$sql="INSERT INTO assortments (AID, DOC, quantity, contents)
VALUES (null, '$date', '$quantity', '$contents');";

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
echo "1 record added <br />";
echo "Added: <br />";
echo "Date: $date <br />";
echo "quantity: $quantity <br />";
echo "contents: $contents <br />";

mysqli_close($con);

?>

<form action="/displayAssortments" method="get">
<input type="submit" value="Return to displayAssortments">
</form>

</body>
</html>
