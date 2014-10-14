<?php include("header.php");?>

<!doctype html>
<html class="no-js" lang="en">
	<head>
    	<meta charset="utf-8" />
    	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    	<title>Information Management System</title>
    	<link rel="stylesheet" href="css/foundation.css" />
    	<script src="js/vendor/modernizr.js"></script>
  	</head>
  	
	<body>

		<div class="small-12 columns">
			<table>
				<div class="row">
					<thead>
						<tr>
							<th colspan = "2" class = "text-center" ><h3>Ingredients</h3></th>
							<th colspan = "2" class = "text-center" ><h3>Batches</h3></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td style="text-align: center;"><a href = "/display/addIngredient.php" class = "medium button">Add new</a></td>
							<td style="text-align: center;"><a href = "/display/ingredients.php" class = "medium button">View/Search all</a></td>
							
							<td style="text-align: center;"><a href = "/display/addBatch.php" class= "medium button">Make new</a></td>
							<td style="text-align: center;"><a href = "/display/batches.php" class= "medium button">View/Search all</a></td>
						</tr>
					</tbody>
					<thead>
						<tr>
							<th colspan = "2" class = "text-center" ><h3>Recipes</h3></th>
							<th colspan = "2" class = "text-center" ><h3>Box Labels</h3></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td style="text-align: center;"><a href = "/display/addRecipe.php" class = "medium button">Make new</a></td>
							<td style="text-align: center;"><a href = "/display/recipes.php" class = "medium button">View/Search all</a></td>
							
							<td style="text-align: center;"><a href = "/display/createBoxLabel.php" class = "medium button">Make new</a></td>
							<td style="text-align: center;"><a href = "/display/boxLabels.php" class = "medium button">View/Search all</a></td>
						</tr>
					</tbody>
				</div>
			</table>
		</div>

	<script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script> $(document).foundation();</script>
 	</body>
</html>
