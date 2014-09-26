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

include "functions.php";
?>
<head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=0.7" />
      <title>M Chocolat Inventory Management System</title>
      <link rel="stylesheet" href="/css/foundation.css" />
      <script src="/js/vendor/modernizr.js"></script>
      <script src="/js/vendor/jquery.js"></script>
      <script src="/js/vendor/fastclick.js"></script>
      <script src="/js/foundation.min.js"></script>

      <nav class="top-bar" data-topbar>
      <ul class="title-area">
        <li class="name">
          <!--<img src="img/MchocIconLogo.png" height="30" alt="">-->
           <img src="http://lorempixel.com/45/45/" alt="">
        </li>
      </ul>
      <section class="top-bar-section">
        <!-- Right Nav Section -->
        <ul class="right">
            <li><a href="#Logout">Logout</a></li>
            <li><a href="#Settings">Settings</a></li>
        </ul>

        <!-- Left Nav Section -->
        <ul class="left">
            <div class="large-1 columns">  
              <h4><a href="#Administrator">M Chocolat</a></h4>
            </div>
        </ul>
      </section>
    </nav>

        <div class="small-8 large-centered columns">
        <p></p>
        <div class="button-bar">
        <ul class="button-group">
            <li><a href="displayAssortments.php" class="small button">Raw Materials</a></li> <!--Currently points to displayAssortments as main page-->
            <li><a href="displayRecipe.php" class="small button">Recipes</a></li>
            <li><a href="displayBatch.php" class="small button">Batches</a></li>
            <li><a href="displayAssortments.php" class="small button">Assortments</a></li>
            </ul>
        </div>
        </div>
    </div>
<!--
  <div class="row">
      <a href="/display/displayIngredients.php">Raw Ingredients</a>
      <a href="/display/displayBatch.php">Batches</a>
      <a href="/display/displayRecipes.php">Recipes</a>
      <a href="/display/displayAssortments.php">Assortments</a>
   <div>
   -->


</head>

<script>
  $(document).foundation();
</script>