<?php include("header.php");?>
<?php include("navigation.php");?>

<html class="no-js" lang="en">
	<head>    	
		<link rel="stylesheet" type="text/css" href="/css/dataTables.foundation.css"/>
		<script src="/js/jquery.dataTables.js"></script>
		<script type="text/javascript" language="javascript" src="/js/dataTables.foundation.js"></script>
		<script type="text/javascript" src="/js/recipes.js"></script>
  	</head>
  
  	<body>
		<!-- Edit Recipe -->
			<div id="editRecipeSection" class="large-4 hidden"> <!-- class="large-4 columns hidden"> -->
		  		<div class="panel">
		  			<div class="h3">Edit Recipe</div>
		  			<p></p>
		  			<div class="row">
						<div class="large-12 medium-4 columns">
					  		<input id="editIdInput" type = "text" placeholder = "ID">
					  	</div>
					</div>

					<div class="row">
						<div class="large-12 medium-4 columns">
					  		<input id="editNameInput" type = "text" placeholder = "Name">
					  	</div>
					</div>

					<div class="row">
						<div class="large-12 medium-4 columns">
					  		<input id="editStepsInput" type = "text" placeholder = "Steps">
					  	</div>
					</div>
					  
					<p></p>

					<div class="row ">
					  	<ul class="button-group medium-centered columns">
						  <li><a href="#clear" class="tiny button disabled ">Clear</a></li>
						  <li><a href="#barcode" class="tiny button">Barcode</a></li>
						  <li><a id="updateRecipeButton" class="tiny button">Update Recipe</a></li>
						</ul>
					</div>
		  		</div>
		  	</div>
	
			<!-- Search Bar / Inventory Table --> 
		  			<div class="large-7 medium-4 columns">
						<table id="recipesTable" class="display">
						 	<thead>
							    <tr>
									<th>ID</th>
									<th>Name</th>
									<th>Steps</th>							    
								</tr>
						 	</thead>
						</table>
					</div>
  	</body>
</html>