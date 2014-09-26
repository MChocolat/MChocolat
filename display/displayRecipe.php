<?php
include "_header.php";
?>
<html>
	<body>
		<div class="row">
			<h1>Recipes</h1>

			<?php
            table_displayAllIngredients();
            echo "";
            ?>

            <form action="insert/insertRecipe" method="post" width="25">
            Recipe Name: <input type="int" name="RecipeName"><br>
            Steps: <input type="text" name="Steps">
            <input type="submit">
            </form>
		</div>
	</body>
</html>