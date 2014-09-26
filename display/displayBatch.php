<?php
include "_header.php";
?>
<html>
	<body>
        <h2>Batches </h2>
        <?php
        table_displayAllBatches();
        echo "function worked";
        ?>

        <form action="/insertBatch" method="post" width="25">
        <?php dropdown_RecipeNames(); ?>
        <input type="submit">
        </form>
    </body>
</html>
