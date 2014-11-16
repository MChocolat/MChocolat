<?php include("header.php");?>
<?php include("navigation.php");?>

<html class="no-js" lang="en">
	<head>    	
		<link rel="stylesheet" type="text/css" href="/css/dataTables.foundation.css"/>
		<script src="/js/jquery.dataTables.js"></script>
		<script type="text/javascript" language="javascript" src="/js/dataTables.foundation.js"></script>
		<script type="text/javascript" src="/js/ingredients.js"></script>
  	</head>
  
  	<body>
		<div class="row">
			<!-- Search Bar / Inventory Table -->
			<a id="deleteIngredientButton" class="tiny button">Delete Selected</a>

  			<div class="small-12 small-center column">
				<table id="ingredientsTable" class="display large-center">
				 	<thead>
					    <tr>
							<th>IngrID</th>
					    	<th>Name</th>
							<th>UPC</th>
							<th>Date of Purchase</th>
							<th>Expiration Date</th>
							<th>Lot Number</th>
							<th>Sub Ingredients</th>							    
						</tr>
				 	</thead>
				</table>
			</div>
			
		</div>

	<script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script> $(document).foundation(); </script>

  	</body>
</html>