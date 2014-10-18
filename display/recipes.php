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
		<div class="row">
			<div id="editRecipeSection" class="large-4 columns">
		  		<div class="panel">
		  			<div class="h3">Update Recipe</div>
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

					<div class="">
					  	<div class="small-11 small-centered columns">
						    <ul class="button-group even-3">
						  		<li><a href="#clear" class="tiny button">Clear Entries</a></li>
						  		<li><a href="#barcode" class="tiny button">Scan Barcode</a></li>
						  		<li><a id="addIngredientButton" class="tiny button">Update Recipe</a></li>
							</ul>
						</div>
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
		</div>
  	</body>
</html>