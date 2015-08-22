<html>
	<script src="http://jqueryjs.googlecode.com/files/jquery-1.3.2.js"></script>
	<script src="/js/jquery.barcode.0.3.js"></script>
	<meta charset="utf-8" />
	<div data-param="foo" class="barcodeC39" style="width:150px;height:30px;border:2px solid red;"></div>
	<div class="name"></div>
	<div class="date"></div>	
	<style> 
</style>
	<script>
   $(document).ready(function(){ //The function reads in the IRID from the data passed in from addingridients.js and generates a barcode in the foo div and then prints
		
				var generateC39 = function(){
					$('.barcodeC39').barcode({code:'code39'});
				}
				
				var IRID = getUrlParameter('param');
				$('.barcodeC39').text(IRID);  //The IRID is passed into the gemerateC39 function in order to create a barcode that represents the IRID value
				generateC39();
				var name = getUrlParameter('param2');

				name=decodeURIComponent(name);
				$('.name').text(name);
				var today = getUrlParameter('param3');
				todat = decodeURIComponent(today)
				$('.date').text(today);
				window.print();
	});
	
	function getUrlParameter(sParam){ // The data from addingridients.js is parsed in order to find the IRID-->
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
	
    </script>
	<meta http-equiv="refresh" content="0; url=/display/addIngredient.php" /> <!--Redirects back to page user came from-->
</html>