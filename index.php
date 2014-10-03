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
  
  	<body>
		<nav class="top-bar" data-topbar>
			<ul class="title-area">
				<li class="name">
					<img src="img/MchocIconLogo.png" height="30" alt="">
	  				<!-- <img src="http://lorempixel.com/45/45/" alt=""> -->
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
		    			<h4><a href="#Administrator">Administrator</a></h4>
		  			</div>
				</ul>
			</section>
		</nav>

	<div class = "twelve columns centered">
		<table>
			<tr>
				<th colspan = "2" class = "text-center" ><h2>Ingredients</h2></th>
				<th colspan = "2" class = "text-center" ><h2>Batches</h2></th>
			</tr>
			<tr>
				<td style="text-align: center;"><a href = "page" class = "large button">Add new</a></td>
				<td style="text-align: center;"><a href = "/display/displayIngredients.php" class = "large button">View/Search all</a></td>
				
				<td style="text-align: center;"><a href = "page" class="large button">Make new</a></td>
				<td style="text-align: center;"><a href = "page" class="large button">View/Search all</a></td>
			</tr>

			<tr>
				<th colspan = "2" class = "text-center" ><h2>Recipes</h2></th>
				<th colspan = "2" class = "text-center" ><h2>Box Labels</h2></th>
			</tr>
			<tr>
				<td style="text-align: center;"><a href = "page" class = "large button">Make new</a></td>
				<td style="text-align: center;"><a href = "page" class = "large button">View/Search all</a></td>

				<td style="text-align: center;"><a href = "page" class = "large button">Make new</a></td>
				<td style="text-align: center;"><a href = "page" class = "large button">View/Search all</a></td>
			</tr>
		</table>
	</div>

		

		<script src="js/vendor/jquery.js"></script>
	    <script src="js/foundation.min.js"></script>
	    <script> $(document).foundation(); </script>
 	 </body>
</html>