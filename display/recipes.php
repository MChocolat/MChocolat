<?php include("header.php");?>
<?php include("navigation.php");?>

<html class="no-js" lang="en">
	<head>    	
		<link rel="stylesheet" type="text/css" href="/css/dataTables.foundation.css"/>
		<script src="/js/jquery.dataTables.js"></script>
		<script type="text/javascript" language="javascript" src="/js/dataTables.foundation.js"></script>
		<script type="text/javascript" language="javascript" src="/js/jquery-ui-1.11.2/jquery-ui.min.js"></script>
		<script type="text/javascript" src="/js/recipes.js"></script>
  	</head>
  
  	<body>
		<!-- Edit Recipe -->
		<div class="row">
			<div id="dialog" class="dialog" title="Edit Recipe">
				<div class="row">
					<!-- left -->
					<div id="right" class="large-6 columns">
						<div class="large-10 columns">
									<input id="addNameInput" type = "text" placeholder = "Name">
						</div>
						<div class="panel">
							<div class="h3">Ingredients</div>
							<p></p>
							
							<div class="row ">
								<div class="large-10 columns">
									<select id="ingredientNum"></select>
								</div>
								<div class="large-2 columns">
									<a id="addIngredients" class="tiny button">Add</a>
								</div>
							</div>
							
							<div class="row ">
								<div id="ingredientsDiv" class="large-12 columns">	
								</div>
							</div>
							  
							<p></p>

							<div class="">
								<div class="small-11 small-centered columns">
									<ul class="button-group even-3">
										<li><a href="#clear" class="tiny button">Clear Entries</a></li>
										<li><a href="#" data-reveal-id="barcode" class="tiny button">Scan Barcode</a></li>
										<li><a id="addRecipeButton" class="tiny button">Add Recipe</a></li>
									</ul>

									<div id="barcode" class="reveal-modal" data-reveal>
									  <h2>Barocde Scanner.</h2>
									  <p>Please scan the barcode!</p>
									  <a class="close-reveal-modal">&#215;</a>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	
			<!--<a id="editRecipeButton" class="tiny button">Edit Selected</a>-->
			<a class="button small" href="#editRecipe" data-reveal-id="editRecipe">Fill Out A Form</a>
			<a id="deleteRecipeButton" class="tiny button">Delete Selected</a>

			<div class="reveal-modal small" id="editRecipe" data-reveal="">
				<h3>Edit Recipe</h3>
				Please contact me! I am lonely and need to hear from other people! I set this Foundation Reveal modal to <code>medium</code> and yes, this is a real form and it works.
				[Add form code here]
				<a class="close-reveal-modal">×</a>
			</div>

  			<div class="small-12 small-center column">
				<table id="recipesTable" class="display large-center">
				 	<thead>
					    <tr>
							<th>ID</th>
							<th>Name</th>						    
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