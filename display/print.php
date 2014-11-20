<html>
	<script src="http://jqueryjs.googlecode.com/files/jquery-1.3.2.js"></script>
	<script src="/js/jquery.barcode.0.3.js"></script>
	<meta charset="utf-8" />
	<div data-param="foo" class="barcodeI25" style="width:153px;height:25px;border:1px solid red;">
	</div>
	
	<script>
   $(document).ready(function(){
		
				var generateI25 = function(){
					$('.barcodeI25').barcode({code:'I25'});
				}
				
				var IRID = getUrlParameter('param');
				$('.barcodeI25').text(IRID); //$(IRID).appendTo('.barcodeI25');
				generateI25();
				window.print();
	});
	
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
	
    </script>
	<!--<meta http-equiv="refresh" content="0; url=/display/addIngredient.php" />-->
</html>