<html>
	<script src="http://jqueryjs.googlecode.com/files/jquery-1.3.2.js"></script>
	<script src="/js/jquery.barcode.0.3.js"></script>
	<meta charset="utf-8" />
	<div data-param="foo" class="barcodeI25" style="width:150px;height:30px;border:2px solid red;"></div>
	<style> 
</style>
	<script>
   $(document).ready(function(){ //The function reads in the IRID from the data passed in from addingridients.js and generates a barcode in the foo div and then prints
		
				var generateI25 = function(){
					$('.barcodeI25').barcode({code:'I25'});
				};
				
				var IRID = getUrlParameter('param');
				$('.barcodeI25').text(IRID);  //The IRID is passed into the gemerateI25 function in order to create a barcode that represents the IRID value
				generateI25();
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
	<!--<meta http-equiv="refresh" content="0; url=/display/addIngredient.php" /> <!--Redirects back to page user came from-->
</html>