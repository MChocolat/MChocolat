<?php include("header.php");?>
<?php include("navigation.php");?>
<html  lang="en">
	<head>    	
		<link rel="stylesheet" type="text/css" href="/css/dataTables.foundation.css"/>
		<script src="/js/jquery.dataTables.js"></script>
		<script type="text/javascript" language="javascript" src="/js/dataTables.foundation.js"></script>
		<script type="text/javascript" src="/js/addRecipe.js"></script>
  	</head>
  
  	<body>
	<div class="row">
			<!-- whole -->
			<div id="addRecipeSection" class="large-12 columns">
				<!-- left -->
		  		<div id="left" class="large-6 columns panel">
		  			<div class="h3">New Recipe</div>
		  			<p></p>

					<div class="row">
						<div class="large-2 columns">
					  		<img src="/img/chocolate.jpg" width="300" height="300">
					  	</div>
						<div class="large-10 columns">
					  		<input id="addNameInput" type = "text" placeholder = "Name">
					  	</div>
					</div>

					<div class="row">
						<div class="large-12 columns">
						  <label>
							<textarea rows="10" placeholder="Steps"></textarea>
						  </label>
						</div>
					</div>
					  
					<p></p>

		  		</div>
				
				<!-- right -->
				<div id="right" class="large-5 columns panel">

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
						<div id="ingredientsList" class="large-12 columns">	
						</div>
					</div>
					
					  
					<p></p>

					<div class="row ">
						<div class="small-8 large-centered columns">
						  	<ul class="button-group">
							  <li><a href="#clear" class="tiny button disabled ">Clear</a></li>
							  <li><a href="#barcode" class="tiny button">Barcode</a></li>
							  <li><a id="addRecipeButton" class="tiny button">Add Recipe</a></li>
							</ul>
						</div>
					</div>
		  		</div>
			</div>	
</div>			
  	</body>
</html>