<html>
	<script src="http://jqueryjs.googlecode.com/files/jquery-1.3.2.js"></script>
	<script src="/js/jquery.barcode.0.3.js"></script>
	<meta charset="utf-8" />
	<div class="Labeldiv"></div>
	
	</div>
	
	<script>
	$(document).ready(function(){
				var ingredients =getUrlParameter('param');
				ingredients = decodeURIComponent(ingredients);
				$('.Labeldiv').text(ingredients);
				
		window.print();
	});
	
	
	function getUrlParameter(sParam){<!-- The data from addBatch.js is parsed in order to find the BID and recipe name-->
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
	<meta http-equiv="refresh" content="0; url=/display/createBoxLabel.php" />
</html>