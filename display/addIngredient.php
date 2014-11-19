<?php include("header.php");?>
<?php include("navigation.php");?>
<html class="no-js" lang="en">
	<script src="http://jqueryjs.googlecode.com/files/jquery-1.3.2.js"></script>
	<script src="/js/jquery.barcode.0.3.js"></script>
	<meta charset="utf-8" />
	<style type="text/css" media="print">
				.no-print { display: none; }
	</style>
	<head>    	
		<link rel="stylesheet" type="text/css" href="/css/dataTables.foundation.css"/>
		<script src="/js/jquery.dataTables.js"></script>
		<script type="text/javascript" language="javascript" src="/js/dataTables.foundation.js"></script>
		<script type="text/javascript" src="/js/addIngredients.js"></script>
  	</head>
  
  	<body>
		<div class="row">
			<div id="addIngredientSection" class="large-6 large-centered columns">
		  		<div id="addIngredientSection" class="panel">
		  			<div class="h3">Add New Ingredient</div>
		  			<p></p>

					<div class="row">
						<div class="large-12 medium-4 columns">
					  		<input id="addNameInput" type = "text" placeholder = "Name (Temp)">
					  	</div>
					</div>

					<div class="row">
						<div class="large-12 medium-4 columns">
					  		<input id="addUpcInput" type = "text" placeholder = "UPC">
					  	</div>
					</div>

					<div class="row">
					  	<div class="large-12 medium-4 columns">
					  		<input id="addExpInput" type = "text" placeholder = "Expiration Date">
					  	</div>
					</div>

					<div class="row">
					  	<div class="large-12 medium-4 columns">
					  		<input id="addLotNumInput" type = "text" placeholder = "Lot #">
					  	</div>
					</div>

					<div class="row">
					  	<div class="large-12 medium-4 columns">
					  		<input id="addSubInput" type = "text" placeholder = "Sub Ingredients">
					  	</div>
					</div>
					  
					<p></p>


					<div class="">
					  	<div class="small-11 small-centered columns">
						    <ul class="button-group even-3">
						  		<li><a href="#clear" class="tiny button">Clear Entries</a></li>
						  		<li><a href="#" data-reveal-id="barcode" class="tiny button">Scan Barcode</a></li>
						  		<li><a id="addIngredientButton" class="tiny button" onclick="generateI25();">Add Ingredient</a></li>
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
		</div>
		
		<div class="barcodeI25" style="width:153px;height:25px;border:1px solid red;">
			123456789
		</div>
	<script>
   $(document).ready(function(){
				generateI25 = function(){
					$('.barcodeI25').barcode({code:'I25'});
				};}
	);
    </script>
	<script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script> $(document).foundation(); </script>

  	</body>
</html>