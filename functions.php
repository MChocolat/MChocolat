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
*/

function add2Assortments($date, $quantity, $contents){

	$sql="INSERT INTO assortments (AID, DOC, quantity, contents)
		VALUES (null, '$date', '$quantity', '$contents');";

	$result = runQuery($sql);
}

//Date and RID are made here. Don't do it on front end.
function add2batch($recipeName){
	$RecipeID = getRecipeIDbyName($recipeName);
	$date = date("Y-m-d");
	$sql = "INSERT INTO batch (BID, DOC, RecipeID) VALUES (null, '$date', '$RecipeID');";
	$result = runQuery($sql);
}

function add2batchIngr($BID, $IngrID){
	$sql = "INSERT INTO batchIngr (BID, IngrID) VALUES ('$BID', '$IngrID');";
	runQuery($sql);
}

//ID and Date are made here.
//Pre: exp is string, price is double, distributor is string, subIngr is string
function add2ingredients($UPC, $exp, $price, $distr, $subIngr){
	$date = date("Y-m-d");
	$sql = "INSERT INTO ingredients (IngrID, UPC, DOP, Exp, Price, Distributor, SubIngr)
			VALUES(null, '$UPC', '$date', '$exp', '$price', '$distr', 'subIngr');";
	runQuery($sql);
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
	<th>RecipeName</th>
	<th>RecipeID</th>
	</tr>";

	while($row = mysqli_fetch_array($result)) {
	  echo "<tr>";
	  echo "<td>" . $row['BID'] . "</td>";
	  echo "<td>" . $row['DOC'] . "</td>";
	  echo "<td>" . getRecipeNamebyID($row['RecipeID']) . "</td>";
	  echo "<td>" . $row['RecipeID'] . "</td>";
	  echo "</tr>";
	}

	echo "</table>";
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
