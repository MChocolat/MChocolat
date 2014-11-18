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
		<div class="bodyContent">
		<div class="row">
			<!-- Search Bar / Inventory Table -->
			<a id="editBatchButton" class="tiny button" data-reveal-id="dialog">View Ingredients of Batch</a>
			<a id="deleteBatchButton" class="tiny button">Delete Selected</a>
			
			<div class="reveal-modal small" id="dialog" data-reveal="">
				<h3>View Batch</h3>
				<a class="close-reveal-modal">×</a>
				<div class="row">
					<div class="large-12 columns">
						<div class="panel">
							<div class="h2" id="batchNameHeader"></div>
							<div id="ingredientsDiv" >
							</div>
								
							<p></p>

							
								<!--<div class="small-11 small-centered columns">
									<ul class="button-group even-3">
										<li><a href="#clear" class="tiny button">Clear Entries</a></li>
										<li><a href="#" data-reveal-id="barcode" class="tiny button">Scan Barcode</a></li>
										<li><a href="addBatchButton" class="tiny button">Update Batch</a></li>
									</ul>

									<div id="barcode" class="reveal-modal" data-reveal>
									  <h2>Barocde Scanner.</h2>
									  <p>Please scan the barcode!</p>
									  <a class="close-reveal-modal">&#215;</a>
									</div>
								</div>
								-->
						</div>
					</div>
				</div>
			</div>

  			<div class="small-12 small-center column">
				<table id="batchesTable" class="display large-center">
				 	<thead>
					    <tr>
							<th>ID</th>
							<th>Recipe Name</th>
							<th>Date of Creation</th> 
						</tr>
				 	</thead>
				</table>
			</div>	
		</div>
		</div>

	<script src="/js/vendor/jquery.js"></script>
    <script src="/js/foundation.min.js"></script>
    <script> $(document).foundation(); </script>

  	</body>
</html>