<html>
	<script src="http://jqueryjs.googlecode.com/files/jquery-1.3.2.js"></script>
	<script src="/js/jquery.barcode.0.3.js"></script>
	<meta charset="utf-8" />
	<div class="barcodeI25" style="width:153px;height:25px;border:1px solid red;"></div>
	<div class="recipeName"></div>
	<div class="date"></div>	
	
	
	<script>
   $(document).ready(function(){<!--The function reads in the BID and recipeName from the data passed in from addBatch.js and generates a barcode barcodeI25 div. It also adds the recipe name and current date to the page before printing-->
   
			var data = {"BID":getUrlParameter('param')};
					
				var generateI25 = function(){
					$('.barcodeI25').barcode({code:'I25'});//The BID is passed into the gemerateI25 function in order to create a barcode that represents the BID value
				}
				
				var IRID = getUrlParameter('param');
				$('.barcodeI25').text(IRID);
				generateI25();
				var recipeName=getUrlParameter('param2');
				recipeName=decodeURIComponent(recipeName);
				$('.recipeName').text(recipeName);
				var today = new Date();
				var dd = today.getDate();
				var mm = today.getMonth()+1; //January is 0!
				var yyyy = today.getFullYear();

				if(dd<10) {	
					dd='0'+dd
				} 

				if(mm<10) {
					mm='0'+mm
				} 

				today = mm+'/'+dd+'/'+yyyy;
				$('.date').text(today);
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
	<meta http-equiv="refresh" content="0; url=/display/addBatch.php" /><!--Redirects back to page user came from-->
</html>