<?php
include "_header.php";
?>
<html>
	<body>
		<div class="row">
			<h2>Ingredients</h2>

			<?php table_displayAllIngredients(); 
			
			?>


			<form action="insert/insertIngredients.php" method="post" width="25">
                UPC: <input type="int" name="quantity"><br>
                Expiration Date: <input type="text" name="contents">
                Price: <input type="number" name="quantity"><br>
                Distributor: <input type="text" name="quantity"><br>
                SubIngr: <input type="textarea" name="quantity"><br>
                <input type="submit">
            </form>

		</div>
	</body>
</html>