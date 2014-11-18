<!doctype html>
<html class="no-js" lang="en">
	<head>
    	<meta charset="utf-8" />
    	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    	<title>Information Management System</title>
    	<link rel="stylesheet" href="css/foundation.css" />
    	<script src="js/vendor/modernizr.js"></script>
  	</head>

	<body>
		
		<div class="small-12 columns">
			<header>
				<h3>MChocolat Inventory Management</h3>
				<p>Please enter your username and password to enter the application.</p>
			</header>
		</div>

		<!-- Weak Hacky way to draw login near middle of page -->
		<div class="small-12 columns">
			<header>
				<h1></h1>
				<p></p>
			</header>
		</div>
		<div class="small-12 columns">
			<header>
				<h1></h1>
				<p></p>
			</header>
		</div>
		<div class="small-12 columns">
			<header>
				<h1></h1>
				<p></p>
			</header>
		</div>
		<div class="small-12 columns">
			<header>
				<h1></h1>
				<p></p>
			</header>
		</div>
		<div class="small-12 columns">
			<header>
				<h1></h1>
				<p></p>
			</header>
		</div>
		<div class="small-12 columns">
			<header>
				<h1></h1>
				<p></p>
			</header>
		</div>
		<div class="small-12 columns">
			<header>
				<h1></h1>
				<p></p>
			</header>
		</div>

		<!--Actual login area-->
		<div class="small-12 columns">
			<!--compare to // LOOK MORE INTO FORM ACTION-->
		   <form action="/display/ingredients.php" method="post">
		      <div class="row">
		         <div class="small-12 medium-6 large-6 columns">
		         	<label for="username">Username</label><input type="text" id="username" name="_username" value="" placeholder="Please enter your username" class="textInput medium required" autocomplete="off" style="cursor: auto; background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH3QsPDhss3LcOZQAAAU5JREFUOMvdkzFLA0EQhd/bO7iIYmklaCUopLAQA6KNaawt9BeIgnUwLHPJRchfEBR7CyGWgiDY2SlIQBT/gDaCoGDudiy8SLwkBiwz1c7y+GZ25i0wnFEqlSZFZKGdi8iiiOR7aU32QkR2c7ncPcljAARAkgckb8IwrGf1fg/oJ8lRAHkR2VDVmOQ8AKjqY1bMHgCGYXhFchnAg6omJGcBXEZRtNoXYK2dMsaMt1qtD9/3p40x5yS9tHICYF1Vn0mOxXH8Uq/Xb389wff9PQDbQRB0t/QNOiPZ1h4B2MoO0fxnYz8dOOcOVbWhqq8kJzzPa3RAXZIkawCenHMjJN/+GiIqlcoFgKKq3pEMAMwAuCa5VK1W3SAfbAIopum+cy5KzwXn3M5AI6XVYlVt1mq1U8/zTlS1CeC9j2+6o1wuz1lrVzpWXLDWTg3pz/0CQnd2Jos49xUAAAAASUVORK5CYII=); background-attachment: scroll; background-position: 100% 50%; background-repeat: no-repeat;">
		         </div>
		         <div class="small-12 medium-6 large-6 columns">
		         	<label for="password">Password</label><input type="password" id="password" name="_password" class="textInput medium required" placeholder="Please enter your password" autocomplete="off" style="background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH3QsPDhss3LcOZQAAAU5JREFUOMvdkzFLA0EQhd/bO7iIYmklaCUopLAQA6KNaawt9BeIgnUwLHPJRchfEBR7CyGWgiDY2SlIQBT/gDaCoGDudiy8SLwkBiwz1c7y+GZ25i0wnFEqlSZFZKGdi8iiiOR7aU32QkR2c7ncPcljAARAkgckb8IwrGf1fg/oJ8lRAHkR2VDVmOQ8AKjqY1bMHgCGYXhFchnAg6omJGcBXEZRtNoXYK2dMsaMt1qtD9/3p40x5yS9tHICYF1Vn0mOxXH8Uq/Xb389wff9PQDbQRB0t/QNOiPZ1h4B2MoO0fxnYz8dOOcOVbWhqq8kJzzPa3RAXZIkawCenHMjJN/+GiIqlcoFgKKq3pEMAMwAuCa5VK1W3SAfbAIopum+cy5KzwXn3M5AI6XVYlVt1mq1U8/zTlS1CeC9j2+6o1wuz1lrVzpWXLDWTg3pz/0CQnd2Jos49xUAAAAASUVORK5CYII=); background-attachment: scroll; background-position: 100% 50%; background-repeat: no-repeat;">
		         </div>
		      </div>
		      <div class="row">
		      	<div class="small-12 medium-6 large-6 columns end">
		      		<input type="submit" id="_submit" class="button expand" name="_submit" value="Login">
		      		
		      		<!-- If token values match, continue with login-->
		      		<input type="hidden" name="_csrf_token" value="c6ac910840cc80e84e997e906361dd88217d654a">
		      		<input type="hidden" name="ezxform_token" value="c6ac910840cc80e84e997e906361dd88217d654a"> <!--af14ab20a73f2b30614441b28ece1ec768881909-->

		      		<!--Use Modal if incorrect login-->
		      		<input type="hidden" name="_login_modal" value="0">
		      		<!--Forgot Password screen -->
		      		<!--<input type="hidden" name="_login_sender" value="0"><a href="/en/user/resetting/request" target="_top">Forgot your password?</a>-->
		      	</div>
		      </div>
		   </form>
		</div>

		<script src="js/vendor/jquery.js"></script>
	    <script src="js/foundation.min.js"></script>
	    <script> $(document).foundation(); </script>
 	 </body>
</html>