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
			<!-- left -->
			<div id="right" class="large-6 columns">
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
						<div id="ingredientsList" class="large-12 columns">	
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

			<!-- right -->
	  		<div id="left" class="large-6 columns">
				<div class="panel">
		  			<div class="h3">New Recipe</div>
		  			<p></p>

					<div class="row">
						<div class="large-2 medium-2 small-2 columns">
					  		<img src="/img/chocolate.jpg" width="300" height="300">
					  	</div>
						<div class="large-10 columns">
					  		<input id="addNameInput" type = "text" placeholder = "Name">
					  	</div>
					</div>

					<div class="row">
						<div class="large-12 columns">
						  <label>
							<textarea id="addStepsInput" rows="10" placeholder="Steps"></textarea>
						  </label>
						</div>
					</div>
				</div>
				<p></p>
	  		</div>
		</div>

	<script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script> $(document).foundation(); </script>

  	</body>
</html>