<?php
include "functions.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Assortment Inserted</title>
</head>
<body>
	<?php
		echo "connected... ";

		// escape variables for security
		$quantity = mysqli_real_escape_string($con, $_POST['quantity']);
		$contents = mysqli_real_escape_string($con, $_POST['contents']);
		$date = date("Y-m-d");

		add2Assortments($date, $quantity, $contents);

		echo "1 record added <br />";
		echo "Added: <br />";
		echo "Date: $date <br />";
		echo "quantity: $quantity <br />";
		echo "contents: $contents <br />";
	?>

	<form action="/displayAssortments" method="get">
	<input type="submit" value="Return to displayAssortments">
	</form>

</body>
</html>
