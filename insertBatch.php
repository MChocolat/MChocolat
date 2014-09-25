<?php
include "functions.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Batch Inserted</title>
</head>
<body>
	<?php
		echo "connected... ";

		// escape variables for security
		$RecipeName = mysqli_real_escape_string($con, $_POST['RecipeName']);

		add2Batch($RecipeName);

		echo "1 record added <br />";
		echo "Added: <br />";
		echo "RecipeName: $RecipeName <br />";
	?>

	<form action="/displayAssortments" method="get">
	<input type="submit" value="Return to displayAssortments">
	</form>

</body>
</html>
