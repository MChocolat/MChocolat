<?php include("/includes/header.php"); ?>
<html class="no-js" lang="en">

	<head>
    	<meta charset="utf-8" />
    	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    	<title>M Chocolat Inventory Management System</title>
    	<link rel="stylesheet" href="css/foundation.css" />
    	<link rel="stylesheet" href="stylesheets/main.css"/>
    	<link rel="stylesheet" href="test.css"/>
    	<script src="js/vendor/modernizr.js"></script>
  	</head>

  	      <!-- Title Bar -->
    <nav class="top-bar foundation-bar" data-topbar>
      <ul class="title-area">
        <li class="name">
         <span data-tooltip class="has-tip" title="You are currently logged in as the Administrator."><h1 class="show-for-small-only"><a href="#">Administrator</a></h1></span>
         <span data-tooltip class="has-tip" title="You are currently logged in as the Administrator."><h1 class="show-for-medium-only"><a href="#">Administrator</a></h1></span>
         <span data-tooltip class="has-tip" title="You are currently logged in as the Administrator."><h1 class="show-for-large-only"><a href="#">Administrator</a></h1></span>
        </li>
      </ul>
      <section class="top-bar-section">
        <!-- Right Nav Section -->
        <ul class="right">
          <!-- Add link to Settings page -->
            <li><a  href=" ">Settings</a></li>
            <!-- Add link to Sign-in page -->
            <li><a  href="/login.php">Logout</a></li>
        </ul>
      </section>
    </nav>
  	
	<body>
		<div class = "small-12 columns">
			<table>
				<tr>
					<th colspan = "2" class = "text-center" ><h2>Ingredients</h2></th>
					<th colspan = "2" class = "text-center" ><h2>Batches</h2></th>
				</tr>
				<tr>
					<td style="text-align: center;"><a href = "/display/addIngredient.php" class = "large button">Add new</a></td>
					<td style="text-align: center;"><a href = "/display/ingredients.php" class = "large button">View/Search all</a></td>
					
					<td style="text-align: center;"><a href = "/display/addBatches.php" class="large button">Make new</a></td>
					<td style="text-align: center;"><a href = "/display/batches.php" class="large button">View/Search all</a></td>
				</tr>

				<tr>
					<th colspan = "2" class = "text-center" ><h2>Recipes</h2></th>
					<th colspan = "2" class = "text-center" ><h2>Box Labels</h2></th>
				</tr>
				<tr>
					<td style="text-align: center;"><a href = "/display/addRecipe.php" class = "large button">Make new</a></td>
					<td style="text-align: center;"><a href = "/display/recipes.php" class = "large button">View/Search all</a></td>
					
					<td style="text-align: center;"><a href = "/display/createBoxLabel.php" class = "large button">Make new</a></td>
					<td style="text-align: center;"><a href = "/display/boxLabels.php" class = "large button">View/Search all</a></td>
				</tr>
			</table>
		</div>

		<script src="js/vendor/jquery.js"></script>
	    <script src="js/foundation.min.js"></script>
	    <script> $(document).foundation(); </script>
 	 </body>
</html>