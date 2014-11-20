<html>
	<script src="http://jqueryjs.googlecode.com/files/jquery-1.3.2.js"></script>
	<script src="/js/jquery.barcode.0.3.js"></script>
	<meta charset="utf-8" />
	<div data-param="foo" class="barcodeI25" style="width:153px;height:25px;border:1px solid red;">
		<?php SELECT IngrID FROM ingredients WHERE UPC = $UPC ORDER BY IngrID DESC LIMIT 1; ?>
	</div>
	
	<script>
   $(document).ready(function(){
		
				generateI25 = function(){
					$('.barcodeI25').barcode({code:'I25'});
				};}
				
				var IRID = getUrlParameter('param');
				
	);
	
	function getUrlParameter(sParam){
		var sPageURL = window.location.search.substring(1);
		var sURLVariables = sPageURL.split('&');
		for (var i = 0; i < sURLVariables.length; i++) 
		{
			var sParameterName = sURLVariables[i].split('=');
			if (sParameterName[0] == sParam) 
			{
				return sParameterName[1];
			}
		}
	} 
	window.print();
    </script>
	<meta http-equiv="refresh" content="0; url=/display/addIngredient.php" />
</html>