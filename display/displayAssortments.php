<?php
include "_header.php";
?>
<!DOCTYPE html>
<html>
<body>
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


</body>
</html>
