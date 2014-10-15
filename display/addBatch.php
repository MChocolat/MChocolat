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
	<div id="addBatchSection" class="large-12 columns panel">

		  			<div class="h3">Add Batch</div>
					<p></p>
					
					<div class="row ">
						<div class="large-12 columns panel">
							<div class="row ">
								<select id="recipes">
								</select>
								<a id="addIngredients" class="tiny button">Select</a>
							</div>
						</div>
					</div>
					
					<div class="row ">
						<div id="ingredientsList" class="large-12 columns panel">	
						</div>
					</div>
					
					  
					<p></p>

					<div class="row ">
					  	<ul class="button-group medium-centered columns">
						  <li><a id="clearButton" class="tiny button disabled ">Clear</a></li>
						  <li><a id="barcodeButton" class="tiny button">Barcode</a></li>
						  <li><a id="addBatchButton" class="tiny button">Add Batch</a></li>
						</ul>
					<div class="row ">
	</div>
	</div>
			
 </body>
</html>