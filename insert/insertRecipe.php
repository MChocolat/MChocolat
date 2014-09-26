<?php
include "functions.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Recipe Inserted</title>
</head>
<body>
	<?php
		echo "connected... ";

		// escape variables for security
		$RecipeName = mysqli_real_escape_string($con, $_POST['RecipeID']);
		$Steps = mysqli_real_escape_string($con, $_POST['Steps']);

		add2recipes($RecipeName, $Steps);

		echo "1 record added <br />";
		echo "Added: <br />";
		echo "Recipe Name: $RecipeName <br />"
		echo "Steps: $Steps <br />";
	?>

	<form action="/displayRecipe" method="get">
	<input type="submit" value="Return to Recipes">
	</form>

</body>
</html>