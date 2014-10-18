<?php include("header.php");?>
<?php include("navigation.php");?>
<html class="no-js" lang="en">
	<head>    	
		<link rel="stylesheet" type="text/css" href="/css/dataTables.foundation.css"/>
		<script src="/js/jquery.dataTables.js"></script>
		<script type="text/javascript" language="javascript" src="/js/dataTables.foundation.js"></script>
		<script type="text/javascript" src="/js/addBatch.js"></script>
	</head>
  
  	<body>
		<div class="row ">
			<div id="addBatchSection" class="large-4 columns">
				<div class="panel">
		  			<div class="h3">Add Batch</div>
					<p></p>
						
					<div class="row ">
						<div class="large-9 columns">
							<select id="ingredientNum"></select>
						</div>
						<div class="large-2 columns">
							<a id="addIngredients" class="tiny button">Select</a>
						</div>
					</div>
						
					<p></p>

					<div class="row">
					  	<div class="large-11 small-centered columns">
						    <ul class="button-group even-3">
						  		<li><a href="#clear" class="tiny button">Clear Entries</a></li>
						  		<li><a href="#barcode" class="tiny button">Scan Barcode</a></li>
						  		<li><a id="addIngredientButton" class="tiny button">Add Batch</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div id="ingredientsList" class="large-7 columns"></div>
				<div class="panel">
					<div class="h3">Ingredients List</div>
					<p></p>
					<div class="row "></div>
				</div>
			</div>
		</div>		
 	</body>
</html>