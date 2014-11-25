<html>
	<script src="http://jqueryjs.googlecode.com/files/jquery-1.3.2.js"></script>
	<script src="/js/jquery.barcode.0.3.js"></script>
	<meta charset="utf-8" />
	<div class="barcodeI25" style="width:153px;height:25px;border:1px solid red;"></div>
	<div id="date"></div>
	<div id="ingredients"></div>
	
	
	<script>
   $(document).ready(function(){
   
			var data = {"BID":getUrlParameter('param')};
			
			$.ajax({
				type: 'POST',
				url: '/functions.php',
				cache: false,
				data: {'action': 'getBatchIngredients', 'data': data},
				success: function (data, status) {
					var ingredientsList = jQuery.parseJSON(data);
					for (var i = 0; i < ingredientsList.length; i++){
					//document.write(ingredientsList[i]['IngrName']);
						$('#ingredients').text($('#ingredients').text() + ingredientsList[i]['IngrName']);
					}
				}
			});
		
				var generateI25 = function(){
					$('.barcodeI25').barcode({code:'I25'});
				}
				
				var IRID = getUrlParameter('param');
				$('.barcodeI25').text(IRID);
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
	<!--<meta http-equiv="refresh" content="0; url=/display/addBatch.php" />-->
</html>