<?php
include "_header.php";
?>
<!DOCTYPE html>
<html>
<body>
        <div class="row">
                <h2>Assortments </h2>
              
                <?php
                table_displayAllAssortments();
                ?>


                <form action="../insert/insertAssortments.php" method="post" width="25">
                quantity: <input type="int" name="quantity"><br>
                contents: <input type="text" name="contents"><br>
                <input type="submit">
                </form>
        </div>


</body>
</html>
