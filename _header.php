<?php
/*
$con=new mysqli(null, 'root', '', 'test', null, '/cloudsql/inventorymchocolat:mchocolat');

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

date_default_timezone_set('EST');
ini_set('display_errors', 'On');
*/
echo "testing...";

include "functions.php";
echo "";
?>
<head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=0.7" />
      <title>M Chocolat Inventory Management System</title>
      <link rel="stylesheet" href="css/foundation.css" />
      <script src="js/vendor/modernizr.js"></script>
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
   <div>
</head>

<script>
  $(document).foundation();
</script>