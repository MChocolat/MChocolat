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
			<div id="selectNumberSection" class="large-6 columns">
				<div class="panel">
		  			<div class="h3">Is this working? How many chocolates are in your box?</div>
					<p></p>
						
					<div class="row">
						<div class="small-9 columns">
							<select id="numberSelect"></select>
						</div>
						
					</div>

					<div class="h3">Would you like to scan the batch barcodes or select them from a dropdown menu?</div>
					<p></p>
					<div class="">
					  	<div class="small-11 small-centered columns">
						    <ul class="button-group even-2">
						  		<li><a id="scanButton" class="tiny button">Scan</a></li>
						  		<li><a id="selectButton" class="tiny button">Select</a></li>
							</ul>
						</div>
					</div>
					<p></p>
				</div>
			</div>

			
			<div id="batchesDiv" class="large-6 columns panel">	</div>
		</div>		

	<script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script> $(document).foundation(); </script>

  	</body>
</html>