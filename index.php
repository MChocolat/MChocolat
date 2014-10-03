<html class="no-js" lang="en">
	<?php include("/includes/header.php"); ?>
  

  	<body>

	<div class = "twelve columns centered">
		<table>
			<tr>
				<th colspan = "2" class = "text-center" ><h2>Ingredients</h2></th>
				<th colspan = "2" class = "text-center" ><h2>Batches</h2></th>
			</tr>
			<tr>
				<td style="text-align: center;"><a href = "/display/addIngredient.php" class = "large button">Add new</a></td>
				<td style="text-align: center;"><a href = "/display/ingredients.php" class = "large button">View/Search all</a></td>
				
				<td style="text-align: center;"><a href = "/display/addBatches.php" class="large button">Make new</a></td>
				<td style="text-align: center;"><a href = "/display/batches.php" class="large button">View/Search all</a></td>
			</tr>

			<tr>
				<th colspan = "2" class = "text-center" ><h2>Recipes</h2></th>
				<th colspan = "2" class = "text-center" ><h2>Box Labels</h2></th>
			</tr>
			<tr>
				<td style="text-align: center;"><a href = "/display/addRecipe.php" class = "large button">Make new</a></td>
				<td style="text-align: center;"><a href = "/display/recipes.php" class = "large button">View/Search all</a></td>
				
				<td style="text-align: center;"><a href = "/display/createBoxLabel.php" class = "large button">Make new</a></td>
				<td style="text-align: center;"><a href = "/display/boxLabels.php" class = "large button">View/Search all</a></td>
			</tr>
		</table>
	</div>

		

		<script src="js/vendor/jquery.js"></script>
	    <script src="js/foundation.min.js"></script>
	    <script> $(document).foundation(); </script>
 	 </body>
</html>