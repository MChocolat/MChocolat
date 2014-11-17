<?php
include "_header.php";
?>

<html>
	<script src="http://jqueryjs.googlecode.com/files/jquery-1.3.2.js"></script>
	<script src="jquery.barcode.0.3.js"></script>
	<meta charset="utf-8" />
	<style type="text/css" media="print">
		.no-print { display: none; }
	</style>
	<body>
		<div class="barcodeI25" style="width:153px;height:25px;border:1px solid red;">
			123456789
		</div>
		<div class="row no-print">
			<h2>Ingredients</h2>

			<?php table_displayAllIngredients(); 
			
			?>


			<form action="../insert/insertIngredients.php" method="post" width="25">
                UPC: <input type="int" name="UPC"><br>
                Expiration Date: <input type="text" name="Exp"><br>
                Price: <input type="number" name="Price"><br>
                Distributor: <input type="text" name="Distributor"><br>
                SubIngr: <input type="textarea" name="SubIngr"><br>
                <input type="submit generateI25()"><!--This may break everything-->
            </form>
		</div>
	<script>
    $(document).ready(function(){
		generateI25 = function(){
			$('.barcodeI25').barcode({code:'I25'});
		};	
	});
	window.print();
    </script>
	</body>
</html>