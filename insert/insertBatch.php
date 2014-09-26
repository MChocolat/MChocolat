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
		$RecipeID = mysqli_real_escape_string($con, $_POST['RecipeID']);

		add2Batch($RecipeID);

		echo "1 record added <br />";
		echo "Added: <br />";
		echo "RecipeID: $RecipeID <br /> ";
	?>

	<form action="../display/displayBatch.php" method="get">
	<input type="submit" value="Return to Assortments">
	</form>

</body>
</html>
