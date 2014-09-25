<?php
include "_header.php";
?>
<!DOCTYPE html>
<html>
<body>
    <div class="tabs-content">
      <div class="content active" id="panel1">
        <h2>Assortments </h2>
      
        <?php
        table_displayAllAssortments();
        echo "function worked";
        ?>


        <form action="/insertAssortments" method="post" width="25">
        quantity: <input type="int" name="quantity"><br>
        contents: <input type="text" name="contents">
        <input type="submit">
        </form>

      </div>
      <div class="content" id="panel2">
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
      <div class="content" id="panel3">
        <p>This is the third panel of the basic tab example. This is the third panel of the basic tab example.</p>
      </div>
      <div class="content" id="panel4">
        <p>This is the fourth panel of the basic tab example. This is the fourth panel of the basic tab example.</p>
      </div>
    </div><!-- close tabs-content -->

</body>
</html>
