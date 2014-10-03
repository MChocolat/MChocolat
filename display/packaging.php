<!doctype html>
<html class="no-js" lang="en">
	<head>
    	<meta charset="utf-8" />
    	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    	<title>Raw Materials</title>
		
    	<link rel="stylesheet" href="/css/foundation.css"/>
		<link rel="stylesheet" type="text/css" href="/css/dataTables.foundation.css"/>

  
		<script src="/js/vendor/jquery.js"></script>
		<script src="/js/jquery.dataTables.js"></script>
		<script type="text/javascript" language="javascript" src="/js/dataTables.foundation.js"></script>
    	<script src="/js/vendor/modernizr.js"></script>
		<script type="text/javascript" src="/js/packaging.js"></script>
		
  	</head>
  
  	<body>
		<?php include("/includes/header.php"); ?>
		<?php include("/includes/navigation.php"); ?>

		<!-- Edit Raw Material -->
			<div id="editRawMaterialSection" class="large-4 columns hidden">
		  		<div class="panel">
		  			<div class="h3">Edit Raw Material</div>
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
					  	<ul class="button-group medium-centered columns">
						  <li><a href="#clear" class="tiny button disabled ">Clear</a></li>
						  <li><a href="#barcode" class="tiny button">Barcode</a></li>
						  <li><a id="updateRawMaterialButton" class="tiny button">Update Ingredient</a></li>
						</ul>
					</div>
		  		</div>
		  	</div>
		<!-- Add Raw Material -->
			<div id="addRawMaterialSection" class="large-4 columns">
		  		<div id="addRawMaterialSection" class="panel">
		  			<div class="h3">New Raw Material</div>
		  			<p></p>
		  			<div class="row">
						<div class="large-12 medium-4 columns">
					  		<input id="addIdInput" type = "text" placeholder = "ID">
					  	</div>
					</div>

					<div class="row">
						<div class="large-12 medium-4 columns">
					  		<input id="addUpcInput" type = "text" placeholder = "UPC">
					  	</div>
					</div>

					<div class="row">
						<div class="large-12 medium-4 columns">
					  		<input id="addDopInput" type = "text" placeholder = "Date of Purchase">
					  	</div>
					</div>

					<div class="row">
					  	<div class="large-12 medium-4 columns">
					  		<input id="addExpInput" type = "text" placeholder = "Purchase Date">
					  	</div>
					</div>
					
					<div class="row">
					  	<div class="large-12 medium-4 columns">
					  		<input id="addPriceInput" type = "text" placeholder = "Price">
					  	</div>
					</div>

					<div class="row">
					  	<div class="large-12 medium-4 columns">
					  		<input id="addDistInput" type = "text" placeholder = "Distributor">
					  	</div>
					</div>

					<div class="row">
					  	<div class="large-12 medium-4 columns">
					  		<input id="addSubInput" type = "text" placeholder = "Sub Ingredients">
					  	</div>
					</div>
					  
					<p></p>

					<div class="row ">
					  	<ul class="button-group medium-centered columns">
						  <li><a href="#clear" class="tiny button disabled ">Clear</a></li>
						  <li><a href="#barcode" class="tiny button">Barcode</a></li>
						  <li><a id="addRawMaterialButton" class="tiny button">Add Material</a></li>
						</ul>
					</div>
		  		</div>
			</div>
	
			<!-- Search Bar / Inventory Table --> 
			
	  			
		  			<div class="large-7 medium-4 columns">
						<table id="rawMaterialsTable" class="display">
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
  		

		
	    <script src="js/foundation.min.js"></script>
	    <script>$(document).foundation();</script>
  	</body>
</html>