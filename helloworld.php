<html class="no-js" lang="en">
	<head>
    	<meta charset="utf-8" />
    	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    	<title>M Chocolat Inventory Management System</title>
    	<link rel="stylesheet" href="css/foundation.css" />
    	<script src="js/vendor/modernizr.js"></script>
  	</head>
  
  	<body>
		<nav class="top-bar" data-topbar>
			<ul class="title-area">
				<li class="name">
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
		    			<h4><a href="#Administrator">Administrator</a></h4>
		  			</div>
				</ul>
			</section>
		</nav>

  		<!-- Header -->
		<div class="row">
		
			<dl class="tabs" data-tab>
  <dd class="active"><a href="#panel1">Tab 1</a></dd>
  <dd><a href="#panel2">Tab 2</a></dd>
  <dd><a href="#panel3">Tab 3</a></dd>
  <dd><a href="#panel4">Tab 4</a></dd>
</dl>
<div class="tabs-content">
  <div class="content active" id="panel1">
    <p>This is the first panel of a basic tab example. This is the first panel of the basic tab example.</p>
  </div>
  <div class="content" id="panel2">
    <p>This is the second panel of a basic tab example. This is the second panel of the basic tab example.</p>
  </div>
  <div class="content" id="panel3">
    <p>This is the third panel of a basic tab example. This is the third panel of the basic tab example.</p>
  </div>
  <div class="content" id="panel4">
    <p>This is the fourth panel of a basic tab example. This is the fourth panel of the basic tab example.</p>
  </div>
</div>
		  	<div class="small-8 large-centered columns">
				<p></p>
				<div class="button-bar">
				<ul class="button-group">
			    	echo <li><a href="searchForRawMaterials.html" class="small button">Raw Materials</a></li>
			    	echo <li><a href="newRecipe.html" class="small button">Recipes</a></li>
			    	echo <li><a href="batchCreation.html" class="small button">Batches</a></li>
			    	<li><a href="#Packaging" class="small button">Packaging</a></li>
			    	<li><a href="#Final Product" class="small button">Final Product</a></li>
				  	</ul>
				</div>
		  	</div>
		</div>

		<!-- Add New Batch -->
		<div class="row">
	  		<div class="large-4 columns">
	  			<div class="panel">
	  				<div class="h3">New Batch</div>
	  				<p></p>
					<div class="row">
				  		<div class="large-12 medium-4 columns">
				  			<input type = "text" placeholder = "Name">
				  		</div>
				  	</div>

					<div class="row">
				  		<div class="large-12 medium-4 columns">
				  			<input type = "text" placeholder = "Batch ID Number">
				  		</div>
				  	</div>

				  	<div class="row">
				  		<div class="large-12 medium-4 columns">
				  			<input type = "text" placeholder = "Creation Date">
				  		</div>
				  	</div>

				  	<div class="row">
				  		<div class="large-7 medium-4 columns">
				  			<input type = "text" placeholder = "Add Ingredient">
				  		</div>

				  		<div class="large-5 medium-4 columns">
				  			<input type = "text" placeholder = "Quantity">
				  		</div>
				  	</div>
		  
		 			<p></p>

					<div class="row">
				  		<div class="large-12 columns">
		  				<div class="h3">Current Batch</div>
			  				<p></p>
		  					<table>
						  		<thead>
							    	<tr>
								      <th width="200">Operating System</th>
								      <th width="150">Quantity</th>
								    </tr>
								  </thead>
								  <tbody>
								    <tr>
								      <td>Linux</td>
								      <td>200</td>
								    </tr>
								    <tr>
								      <td>Windows</td>
								      <td>300</td>
								    </tr>
								    <tr>
								      <td>OS X</td>
								      <td>100</td>
							    	</tr>
							  	</tbody>
							</table>
						</div>
					</div>

				<div class="row large-centered columns">
				  	<div class="large-5 medium-4 columns">
				  		<a href="#clear" class="button tiny disabled">Clear</a>
				  	</div>

				  	<div class="large-7 medium-4 columns end">
				  		<a href="#addBatch" class="button tiny ">Add Batch</a>
				  	</div>
				</div>
	  		</div>
	  	</div>

		<!-- Search Bar / Inventory Table --> 
		<div class="row">
		  	<div class="row">
			  	<div class="large-7 medium-4 columns">
			  		<input type = "text" placeholder = "Search">
					<table>
						<thead>
						    <tr>
						      <th width="150" >Name</th>
						      <th width="150" >Date Added</th>
						      <th width="150" >Batch ID Number</th>
						      <th width="150" >Creation Date</th>
						    </tr>
						</thead>
						<tbody>
						    <tr>
						      <td>Name 1</td>
						      <td>Date Added 1</td>
						      <td>Batch ID Number 1</td>
						      <td>Creation Date 1</td>
						    </tr>
						    <tr>
						      <td>Name 2</td>
						      <td>Date Added 2</td>
						      <td>Batch ID Number 2</td>
						      <td>Creation Date 2</td>
						    </tr>
						    <tr>
						      <td>Name 3</td>
						      <td>Date Added 3</td>
						      <td>Batch ID Number 3</td>
						      <td>Creation Date 3</td>
						    </tr>
						    <tr>
						      <td>Name 4</td>
						      <td>Date Added 4</td>
						      <td>Batch ID Number 4</td>
						      <td>Creation Date 4</td>
						    </tr>
						    <tr>
						      <td>Name 5</td>
						      <td>Date Added 5</td>
						      <td>Batch ID Number 5</td>
						      <td>Creation Date 5</td>
						    </tr>
						    <tr>
						      <td>Name 6</td>
						      <td>Date Added 6</td>
						      <td>Batch ID Number 6</td>
						      <td>Creation Date 6</td>
						    </tr>
						    <tr>
						      <td>Name 7</td>
						      <td>Date Added 7</td>
						      <td>Batch ID Number 7</td>
						      <td>Creation Date 7</td>
						    </tr>
						</tbody>
					</table>
				</div>
			</div>
	  	</div>

		<script src="js/vendor/jquery.js"></script>
	    <script src="js/foundation.min.js"></script>
	    <script> $(document).foundation(); </script>
 	 </body>
</html>