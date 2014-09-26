<?php
include "_header.php";
?>
<html>
	<body>
		<div class="row">
			<h2>Ingredients</h2>

			<?php table_displayAllIngredients(); 
			
			?>


			<form action="../insert/insertIngredients.php" method="post" width="25">
                UPC: <input type="int" name="UPC"><br>
                Expiration Date: <input type="text" name="Exp">
                Price: <input type="number" name="Price"><br>
                Distributor: <input type="text" name="Distributor"><br>
                SubIngr: <input type="textarea" name="SubIngr"><br>
                <input type="submit">
            </form>

		</div>
	</body>
</html>