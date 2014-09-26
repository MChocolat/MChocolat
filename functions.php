<?php
$con=new mysqli(null, 'root', '', 'test', null, '/cloudsql/inventorymchocolat:mchocolat');

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

date_default_timezone_set('EST');
ini_set('display_errors', 'On');


/*
	convention for function names:
		Add an entry into a table: add2<table name>
		Display the entire table: table_displayAll<table name>
		Get id based a criteria: get<ID>by<criteria>
		Display a dropdown: dropdown_<what you're displaying>

	convention for variables:
		If referring to SQL table variables, use same cap. (All attributes start with
			capital letter. All tables start lowercase.);
*/

function add2Assortments($date, $quantity, $contents){

	$sql="INSERT INTO assortments (AID, DOC, quantity, contents)
		VALUES (null, '$date', '$quantity', '$contents');";

	$result = runQuery($sql);
}

//Date and RID are made here. Don't do it on front end.
function add2batch($RecipeID){
	$date = date("Y-m-d");
	$sql = "INSERT INTO batch (BID, DOC, RecipeID) VALUES (null, '$date', '$RecipeID');";
	$result = runQuery($sql);
}

function add2batchIngr($BID, $IngrID){
	$sql = "INSERT INTO batchIngr (BID, IngrID) VALUES ('$BID', '$IngrID');";
	$result = runQuery($sql);
}

//ID and Date are made here.
//Pre: exp is string, price is double, distributor is string, subIngr is string
function add2ingredients($UPC, $exp, $price, $distr, $subIngr){
	$date = date("Y-m-d");
	$sql = "INSERT INTO ingredients (IngrID, UPC, DOP, Exp, Price, Distributor, SubIngr)
			VALUES(null, '$UPC', '$date', '$exp', '$price', '$distr', '$subIngr');";
	$result = runQuery($sql);
}

function add2recipes($RecipeName, $Steps){
	$sql = "INSERT INTO recipe (RecipeID, RecipeName, Steps) VALUES (null, '$RecipeName', '$Steps');";
	$result = runQuery($sql);
}


function getRecipeIDbyName($recipeName){
	$sql = "SELECT RecipeID FROM recipe WHERE RecipeName = '$recipeName';";
	
	return runQuery($sql);
}

function getRecipeNamebyID($recipeID){
	$sql = "SELECT RecipeName FROM recipe WHERE RecipeID = '$recipeID';";

	return runQuery($sql);
}

function table_displayAllAssortments(){
	$sql = "SELECT * FROM assortments";
	$result = runQuery($sql);

	echo "<table border='1'>
	<tr>
	<th>AID</th>
	<th>DOC</th>
	<th>quantity</th>
	<th>contents</th>
	</tr>";

	while($row = mysqli_fetch_array($result)) {
	  echo "<tr>";
	  echo "<td>" . $row['AID'] . "</td>";
	  echo "<td>" . $row['DOC'] . "</td>";
	  echo "<td>" . $row['quantity'] . "</td>";
	  echo "<td>" . $row['contents'] . "</td>";
	  echo "</tr>";
	}

	echo "</table>";
}

function table_displayAllBatches(){
	$sql = "SELECT * FROM batch";
	$result = runQuery($sql);

	echo "<table border='1'>
	<tr>
	<th>BID</th>
	<th>DOC</th>
	<th>RecipeID</th>
	</tr>";

	while($row = mysqli_fetch_array($result)) {
	  echo "<tr>";
	  echo "<td>" . $row['BID'] . "</td>";
	  echo "<td>" . $row['DOC'] . "</td>";
	 // echo "<td>" . getRecipeNamebyID($row['RecipeID']) . "</td>";
	  echo "<td>" . $row['RecipeID'] . "</td>";
	  echo "</tr>";
	}

	echo "</table>";
}

function table_displayAllIngredients(){
	$sql = "SELECT * FROM ingredients";
	$result = runQuery($sql);

	$toPrint = "<table border = '1'>
		<tr>
		<th>IngrID</th>
		<th>UPC</th>
		<th>Date of Purchase</th>
		<th>Expiration Date</th>
		<th>Price</th>
		<th>Distributor</th>
		<th>Sub Ingredients</th>";

	foreach ($result as $row) {
		$IngrID = $row['IngrID'];
		$UPC = $row['UPC'];
		$DOP = $row['DOP'];
		$Exp = $row['Exp'];
		$Price = $row['Price'];
		$Distributor = $row['Distributor'];
		$SubIngr = $row['SubIngr'];

		$toPrint .= "<tr>";
	  	$toPrint .= "<td>'$IngrID'</td>";
	  	$toPrint .= "<td>'$UPC'</td>";
	  	$toPrint .= "<td>'$DOP'</td>";
	  	$toPrint .= "<td>'$Exp'</td>";
	  	$toPrint .= "<td>'$Price'</td>";
	  	$toPrint .= "<td>'$Distributor'</td>";
	  	$toPrint .= "<td>'$SubIngr'</td>";

	  	$toPrint .= "</tr>";
	}

	echo $toPrint;
	echo "</table>";
}

function table_displayAllRecipes(){
	$sql = "SELECT * FROM recipe";
	$result = runQuery($sql);

	$toPrint = "<table border = '1'>
		<tr>
		<th>RecipeID</th>
		<th>RecipeName</th>
		<th>Steps</th>";

	foreach ($result as $row) {
		$RecipeID = $row['RecipeID'];
		$RecipeName = $row['RecipeName'];
		$Steps = $row['Steps'];

		$toPrint .= "<tr>";
	  	$toPrint .= "<td>'$RecipeID'</td>";
	  	$toPrint .= "<td>'$RecipeName'</td>";
	  	$toPrint .= "<td>'$Steps'</td>";
	  	$toPrint .= "</tr>";
	}

	echo $toPrint;
	echo "</table>";
}

function dropdown_RecipeNames(){
	$toPrint = "<select name='RecipeID'>";

	$sql = "SELECT RecipeName, RecipeID FROM recipe;";
	$result = runQuery($sql);
	foreach ($result as $row) {
		$name = $row['RecipeName'];
		$id = $row['RecipeID'];
		$toPrint = $toPrint . "<option value=$id>$name</option>";
	}
	$toPrint = $toPrint . "</select>";
	echo $toPrint;
}

function runQuery($sql){
	global $con;

	$result = mysqli_query($con,$sql);
	if (!$result) {
	 	die('Error: ' . mysqli_error($con));
	 	} else{
	 		return $result;
	 	}
}
