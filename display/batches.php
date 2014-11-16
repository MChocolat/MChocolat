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
		<div class="row ">
			<!-- Search Bar / Inventory Table --> 
  			<div class="large-7 columns">
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
			<a id="deleteBatchButton" class="tiny button">Delete Selected</a>
		</div>

	<script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script> $(document).foundation(); </script>

  	</body>
</html>