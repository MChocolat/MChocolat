<?php
include "_header.php";
?>
<html>
	<body>
        <div class="row">
            <h2>Batches </h2>
            <?php
            table_displayAllBatches();
            echo "function worked";
            ?>

            <form action="/insertBatch" method="post" width="25">
            <?php dropdown_RecipeNames(); ?>
            <input type="submit">
            </form>
        </div>
    </body>
</html>
