<?php
include "_header.php";
?>
<html>
	<body>
		<div class="row">
			<h2>Recipes</h2>

			<?php
            table_displayAllRecipes();
            ?>

            <form action="../insert/insertRecipe.php" method="post" width="25">
            RecipeName: <input type="int" name="RecipeName"><br>
            Steps: <input type="text" name="Steps">
            <input type="submit">
            </form>
		</div>
	</body>
</html>