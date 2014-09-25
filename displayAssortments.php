<?php
include "functions.php";
?>
<!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=0.7" />
      <title>M Chocolat Inventory Management System</title>
      <link rel="stylesheet" href="css/foundation.css" />
      <script src="js/vendor/modernizr.js"></script>
</head>
<body>
      <script src="/js/vendor/jquery.js"></script>
      <script src="/js/vendor/fastclick.js"></script>
      <script src="/js/foundation.min.js"></script>

<div class="row">
<dl class="tabs" data-tab>
  <dd class="active"><a href="#panel1">Assortments</a></dd>
  <dd><a href="#panel2">Batches</a></dd>
  <dd><a href="#panel3">Raw Ingredients</a></dd>
  <dd><a href="#panel4">Final Products</a></dd>
</dl>
<div class="tabs-content">
  <div class="content active" id="panel1">
    <h2>Assortments </h2>
  
    <?php
    table_displayAllAssortments();
    echo "function worked";
    ?>


    <form action="/insertAssortments" method="post" width="25">
    quantitytes: <input type="int" name="quantity"><br>
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

  </div>
  <div class="content" id="panel3">
    <p>This is the third panel of the basic tab example. This is the third panel of the basic tab example.</p>
  </div>
  <div class="content" id="panel4">
    <p>This is the fourth panel of the basic tab example. This is the fourth panel of the basic tab example.</p>
  </div>
</div>
</div>

<script>
  $(document).foundation();
</script>
</body>
</html>
