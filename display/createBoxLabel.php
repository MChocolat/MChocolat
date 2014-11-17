<?php include("header.php");?>
<?php include("navigation.php");?>
<html class="no-js" lang="en">
	<head>    	
		<link rel="stylesheet" type="text/css" href="/css/dataTables.foundation.css"/>
		<script src="/js/jquery.dataTables.js"></script>
		<script type="text/javascript" language="javascript" src="/js/dataTables.foundation.js"></script>
		<script type="text/javascript" src="/js/createBoxLabel.js"></script>
	</head>
  
  	<body>
		<div class="row ">
			<div id="addBatchSection" class="large-6 columns">
				<div class="panel">
		  			<div class="h3">How many chocolates are in your box?</div>
					<p></p>
						
					<div class="row">
						<div class="small-9 columns">
							<select id="recipeSelect"></select>
						</div>
						<div class="small-3 columns">
							<a id="selectRecipeButton" class="tiny button">Select</a>
						</div>
					</div>
						
					<p></p>
				</div>
			</div>

			
			<div id="ingredientsDiv" class="large-6 columns panel">
			
			
			</div>
		</div>		

	<script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script> $(document).foundation(); </script>

  	</body>
</html>