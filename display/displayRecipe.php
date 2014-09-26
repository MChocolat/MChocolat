<?php
include "_header.php";
?>
<html>
	<body>
		<div class="row">
			<h1>Recipes</h1>

			<?php
            table_displayAllIngredients();
            ?>
<!--
            <form action="/insertRecipe" method="post" width="25">
            <?php dropdown_RecipeNames(); ?>
            <input type="submit">
            </form>-->
		</div>
	</body>
</html>