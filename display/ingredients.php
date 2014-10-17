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
		<!-- Edit Ingredient -->
		<div class="row">
			<div id="editIngredientSection" class="large-5 columns"> <!-- class="large-4 columns hidden"> -->
		  		<div class="panel">
		  			<div class="h3">Edit Ingredient</div>
		  			<p></p>
		  			<div class="row">
						<div class="large-12 medium-4 columns">
					  		<input id="editIdInput" type = "text" placeholder = "Name">
					  	</div>
					</div>

					<div class="row">
						<div class="large-12 medium-4 columns">
					  		<input id="editUpcInput" type = "text" placeholder = "Product ID Number">
					  	</div>
					</div>

					<div class="row">
						<div class="large-12 medium-4 columns">
					  		<input id="editDopInput" type = "text" placeholder = "Quantity">
					  	</div>
					</div>

					<div class="row">
					  	<div class="large-12 medium-4 columns">
					  		<input id="editExpInput" type = "text" placeholder = "Purchase Date">
					  	</div>
					</div>
					
					<div class="row">
					  	<div class="large-12 medium-4 columns">
					  		<input id="editPriceInput" type = "text" placeholder = "Expiration Date">
					  	</div>
					</div>

					<div class="row">
					  	<div class="large-12 medium-4 columns">
					  		<input id="editDistInput" type = "text" placeholder = "Manufacturer">
					  	</div>
					</div>

					<div class="row">
					  	<div class="large-12 medium-4 columns">
					  		<input id="editSubInput" type = "text" placeholder = "Price">
					  	</div>
					</div>
					  
					<p></p>

					<div class="row ">
						<div class="small-8 large-centered columns">
						  	<ul class="button-group">
							  <li><a href="#clear" class="tiny button disabled ">Clear</a></li>
							  <li><a href="#barcode" class="tiny button">Scan Barcode</a></li>
							  <li><a id="updateIngredientButton" class="tiny button">Update Ingredient</a></li>
							</ul>
						</div>
					</div>
		  		</div>
		  	</div>
	
			<!-- Search Bar / Inventory Table --> 
  			<div class="large-7 medium-4 columns">
				<table id="ingredientsTable" class="display">
				 	<thead>
					    <tr>
							<th>ID</th>
							<th>UPC</th>
							<th>Date of Purchase</th>
							<th>Expiration Date</th>
							<th>Price</th>
							<th>Distributor</th>
							<th>Sub Ingredients</th>							    
						</tr>
				 	</thead>
				</table>
			</div>
		</div>
  	</body>
</html>