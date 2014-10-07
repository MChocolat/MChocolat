<?php include("header.php");?>
<?php include("navigation.php");?>
<html class="no-js" lang="en">
	<head>    	
		<link rel="stylesheet" type="text/css" href="/css/dataTables.foundation.css"/>
		<script src="/js/jquery.dataTables.js"></script>
		<script type="text/javascript" language="javascript" src="/js/dataTables.foundation.js"></script>
		<script type="text/javascript" src="/js/batches.js"></script>
  	</head>
  
  	<body>

<!-- Add Batch -->
			<div id="addBatchSection" class="large-4 columns">
		  		<div id="addBatchSection" class="panel">
		  			<div class="h3">New Batch</div>
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
					  		<input id="addSubInput" type = "text" placeholder = "Sub Batchs">
					  	</div>
					</div>
					  
					<p></p>

					<div class="row ">
					  	<ul class="button-group medium-centered columns">
						  <li><a href="#clear" class="tiny button disabled ">Clear</a></li>
						  <li><a href="#barcode" class="tiny button">Barcode</a></li>
						  <li><a id="addBatchButton" class="tiny button">Add Batch</a></li>
						</ul>
					</div>
		  		</div>
			</div>
			
  	</body>
</html>