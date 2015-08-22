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
		<div class="bodyContent">
		<div class="row">
			<!-- Search Bar / Inventory Table -->
			<a id="editIngredientButton" class="tiny button" data-reveal-id="dialog">Edit Selected</a>
			<a id="deleteIngredientButton" class="tiny button">Delete Selected</a>
			<a id="printIngredientButton" class="tiny button">Print Barcode for Selected</a>
			
			<div class="reveal-modal small" id="dialog" data-reveal="">
				<h3>Edit Ingredient</h3>
				<a class="close-reveal-modal">×</a>
				<div class="row">
					<div class="large-12 columns">
						<div class="panel">
							<div class="row">
							<div class="large-12 medium-4 columns">
								<input id="editNameInput" type = "text" placeholder = "Name (Temp)">
							</div>
						</div>

						<div class="row">
							<div class="large-12 medium-4 columns">
								<input id="editUpcInput" type = "text" placeholder = "UPC (only numbers)">
							</div>
						</div>

						<div class="row">
							<div class="large-12 medium-4 columns">
								<input id="editExpInput" type = "text" placeholder = "Expiration Date">
							</div>
						</div>

						<div class="row">
							<div class="large-12 medium-4 columns">
								<input id="editLotNumInput" type = "text" placeholder = "Lot #">
							</div>
						</div>

						<div class="row">
							<div class="large-12 medium-4 columns">
								<input id="editSubInput" type = "text" placeholder = "Sub Ingredients">
							</div>
						</div>
						  
						<p></p>


						<div class="">
							<div class="small-11 small-centered columns">
									<a id="updateIngredientButton" class="tiny button">Update Ingredient</a>

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
		</div>

	<!--<script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script> -->
    <script> $(document).foundation(); </script>

  	</body>
</html>