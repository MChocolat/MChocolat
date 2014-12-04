<?php
$con=new mysqli(null, 'root', '', 'test', null, '/cloudsql/inventorymchocolat:mchocolat');

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

date_default_timezone_set('EST');
ini_set('display_errors', 'On');


if(isset($_POST['action'])) {
	if(isset($_POST['data'])){
		$function = $_POST['action'];
		$function($_POST['data']);
	}
	else{
		$function = $_POST['action'];
		$function();
	}
}

/*
{"mData": 'Name' },
{"mData": 'UPC' },
{"mData": 'DOP' },
{"mData": 'Exp' },
{"mData": 'Lot' },
{"mData": 'SubIngr' }
*/
function getIngredients(){
	$sql = "SELECT ingredients.IngrID, 
				ingredients.IngrName,
				uniqueIngr.UPC, 
				ingredients.DOP,
				ingredients.Exp,
				ingredients.Lot,
				uniqueIngr.SubIngr
			FROM ingredients
			left JOIN uniqueIngr
			ON ingredients.UPC = uniqueIngr.UPC;";
	$result = runQuery($sql);
	$finalResult = array();
	while ($row = $result->fetch_assoc()){
	  $finalResult[] = $row;
	}
	echo json_encode($finalResult);
}

function ingrUPCLookup($data){
	global $con;
	$UPC = mysqli_real_escape_string($con, $data);
	$sql = "SELECT * FROM uniqueIngr WHERE UPC = '$UPC' LIMIT 1;";
	$result = runQuery($sql);
	$finalResult = array();
	while ($row = $result->fetch_assoc()){
		$finalResult[] = $row;
	}
	echo json_encode($finalResult);
}

/*
This method takes data about an ingredient from the form and inserts it into the DB.
If there is no UPC on the ingredient, the user enters a 0. In that case, the name
has the sub-ingredients attached to it.
*/
function addIngredient($data){
	global $con;
	$IngrName = mysqli_real_escape_string($con, $data['IngrName']);
	$UPC = mysqli_real_escape_string($con, $data['UPC']);
	$exp = mysqli_real_escape_string($con, $data['Exp']);
	$lotNum = mysqli_real_escape_string($con, $data['LotNum']);
	$subIngr = mysqli_real_escape_string($con, $data['SubIngr']);

	$date = date("Y-m-d");
	

	$sql = "INSERT IGNORE INTO uniqueIngr (UPC, IngrName, SubIngr)
		VALUES('$UPC', '$IngrName', '$subIngr');";
	$result = runQuery($sql); 
	
	if ($UPC == 0){
		$IngrName = $IngrName . " (" . $subIngr . ")";
	}
	$sql2 = "INSERT INTO ingredients (IngrID, UPC, DOP, Exp, Lot, IngrName)
		VALUES(null, '$UPC', '$date', '$exp', '$lotNum', '$IngrName');";
	$result2 = runQuery($sql2); 
	
	echo $result2;
}

function deleteIngredient($data){
	global $con;
	$IngrName = mysqli_real_escape_string($con, $data['IngrName']);
	$IngrID = mysqli_real_escape_string($con, $data['IngrID']);
	
	$sql = "DELETE FROM ingredients WHERE IngrID = '$IngrID';";
	$result = runQuery($sql); 
}

function updateIngredient($data){
	global $con;
	$IngrID = mysqli_real_escape_string($con, $data['IngrID']);
	$IngrName = mysqli_real_escape_string($con, $data['IngrName']);
	$UPC = mysqli_real_escape_string($con, $data['UPC']);
	$exp = mysqli_real_escape_string($con, $data['Exp']);
	$lotNum = mysqli_real_escape_string($con, $data['LotNum']);
	$subIngr = mysqli_real_escape_string($con, $data['SubIngr']);

	$date = date("Y-m-d");
	
	$sql = "INSERT IGNORE INTO uniqueIngr (UPC, IngrName, SubIngr)
		VALUES('$UPC', '$IngrName', '$subIngr');";
	$result = runQuery($sql); 

	$sql2 = "UPDATE ingredients SET UPC = '$UPC', DOP = '$date', Exp = '$exp', Lot = '$lotNum'  WHERE IngrID = '$IngrID';";
	$result2 = runQuery($sql2); 
	
	echo $result2;
}

function getRecipes(){
	$sql = "SELECT * FROM recipes";
	$result = runQuery($sql);
	$finalResult = array();
	while ($row = $result->fetch_assoc()){
	  $finalResult[] = $row;
	}
	echo json_encode($finalResult);
}

function getRecipeIngredients($data){
	global $con;
	$RecipeID = mysqli_real_escape_string($con, $data['RecipeID']);
	$sql = "SELECT * FROM ingrRecipe WHERE RecipeID = '$RecipeID';";
	$result = runQuery($sql);
	$finalResult = array();
	while ($row = $result->fetch_assoc()){
	  $finalResult[] = $row;
	}
	echo json_encode($finalResult);
}

function addRecipe($data){
	global $con;
	$name = mysqli_real_escape_string($con, $data['RecipeName']);
	$sql = "INSERT INTO recipes (RecipeID, RecipeName)
		VALUES(null, '$name');";
	$result = runQuery($sql); 
	echo $result;
}

function addRecipeIngredients($data){
	global $con;
	$ingredients = array();    
	for($i=0; $i<count($data); $i++){
	   $RecipeID = mysqli_real_escape_string($con, $data[$i]['RecipeID']);
	   $IngrName = mysqli_real_escape_string($con, $data[$i]['IngrName']);
	   //$M_unit = $data[$i]['M_unit'];
	   $Amount = mysqli_real_escape_string($con, $data[$i]['Amount']);

	   //$ingredients[] = "(null,'$RecipeID','$IngrName','$M_unit','$Amount')";
	   $ingredients[] = "(null,'$RecipeID','$IngrName','$Amount')";
	}

	//$sql = "INSERT INTO ingrRecipe (IRID, RecipeID, IngrName, M_unit, Amount) VALUES " . implode(', ', $ingredients);
	$sql = "INSERT INTO ingrRecipe (IRID, RecipeID, IngrName, Amount) VALUES " . implode(', ', $ingredients);

	$result = runQuery($sql);
	
	echo $sql;
}

function deleteRecipe($data){
	global $con;
	$RecipeID = mysqli_real_escape_string($con, $data['RecipeID']);
	
	$sql = "DELETE FROM ingrRecipe WHERE RecipeID = '$RecipeID';";
	$result = runQuery($sql); 
	
	$sql2 = "DELETE FROM recipes WHERE RecipeID = '$RecipeID';";
	$result2 = runQuery($sql2); 
}

function updateRecipe($data){
	global $con;
	$RecipeID = mysqli_real_escape_string($con, $data['RecipeID']);	
	$name = mysqli_real_escape_string($con, $data['RecipeName']);
	
	$sql = "UPDATE recipes SET RecipeName = '$name' WHERE RecipeID = '$RecipeID';";
	$result = runQuery($sql); 
}

function updateRecipeIngredients($data){
	global $con;
	$RecipeID = mysqli_real_escape_string($con, $data[0]['RecipeID']);
	$ingredients = array();    
	for($i=0; $i<count($data); $i++){
	   $RecipeID = mysqli_real_escape_string($con, $data[$i]['RecipeID']);
	   $IngrName = mysqli_real_escape_string($con, $data[$i]['IngrName']);
	   $Amount = mysqli_real_escape_string($con, $data[$i]['Amount']);

	   $ingredients[] = "(null,'$RecipeID','$IngrName','$Amount')";
	}

	$sql = "DELETE FROM ingrRecipe WHERE RecipeID = '$RecipeID';";
	$result = runQuery($sql);

	$sql2 = "INSERT INTO ingrRecipe (IRID, RecipeID, IngrName, Amount) VALUES " . implode(', ', $ingredients);
	$result2 = runQuery($sql2);
	
	echo $sql;
}

function getBatches(){
	$sql = "SELECT BID, batches.DOC, recipes.RecipeID, recipes.RecipeName FROM batches INNER JOIN recipes ON batches.RecipeID = recipes.RecipeID";
	$result = runQuery($sql);
	$finalResult = array();
	while ($row = $result->fetch_assoc()){
	  $finalResult[] = $row;
	}
	echo json_encode($finalResult);
}

function getBatchesByDate(){
	$sql = "SELECT BID, batches.RecipeID, recipes.RecipeName, DOC FROM batches 
		JOIN recipes WHERE batches.RecipeID = recipes.RecipeID 
		order by batches.DOC, batches.DOC ASC;";
	$result = runQuery($sql);
	$finalResult = array();
	while ($row = $result->fetch_assoc()){
	  $finalResult[] = $row;
	}
	echo json_encode($finalResult);
}

function addBatch($data){
	global $con;
	$RecipeID = mysqli_real_escape_string($con, $data['RecipeID']);
	$date = date("Y-m-d");
	$sql = "INSERT INTO batches (BID, DOC, RecipeID)
		VALUES(null, '$date', '$RecipeID');";
	$result = runQuery($sql); 
	echo $result;
}

function addBatchIngredients($data){
	global $con;
	$ingredients = array();    
	for($i=0; $i<count($data); $i++){
	   $BID = mysqli_real_escape_string($con, $data[$i]['BID']);
	   $IngrID = mysqli_real_escape_string($con, $data[$i]['IngrID']);
	   $Amount = mysqli_real_escape_string($con, $data[$i]['Amount']);

	   $ingredients[] = "('$BID', '$IngrID', '$Amount')";
	}

	$sql = "INSERT INTO batchIngr (BID, IngrID, Amount) VALUES " . implode(', ', $ingredients);

	$result = runQuery($sql);
	
	echo $BID;
}

function updateBatchIngredients($data){
	global $con;
	$ingredients = array();    
	for($i=0; $i<count($data); $i++){
	   $ID = mysqli_real_escape_string($con, $data[$i]['ID']);
	   $UPC = mysqli_real_escape_string($con, $data[$i]['UPC']);

	   $ingredients[] = "('$ID', '$UPC')";
	}

	//$sql = "UPDATE batchIngr2 SET UPC = '$UPC' WHERE ID = '$ID' VALUES " . implode(', ', $ingredients);
	
	//$result = runQuery($sql);
	
	echo $sql;
}

function deleteBatch($data){
	global $con;
	$BID = mysqli_real_escape_string($con, $data['BID']);
	
	$sql = "DELETE FROM batchIngr2 WHERE BID = '$BID';";
	$result = runQuery($sql); 
	
	$sql2 = "DELETE FROM batches WHERE BID = '$BID';";
	$result2 = runQuery($sql2); 
}

function getBatchIngredients($data){
	global $con;
	$BID = mysqli_real_escape_string($con, $data['BID']);

	$sql = "SELECT batchIngr.*, ingredients.IngrName FROM batchIngr INNER JOIN ingredients
			ON batchIngr.IngrID = ingredients.IngrID WHERE batchIngr.BID = '$BID';";
	$result = runQuery($sql);
	$finalResult = array();
	while ($row = $result->fetch_assoc()){
	  $finalResult[] = $row;
	}
	echo json_encode($finalResult);
}

function createSubIngredientList($data){
	global $con;
	$where = " WHERE batchIngr.BID = " . mysqli_real_escape_string($con, $data[0]);   
	for($i=1; $i<count($data); $i++){
	   $BID = mysqli_real_escape_string($con, $data[$i]);
	   $where = $where . ' OR batchIngr.BID = ' . $BID;
	}

	$sql = "SELECT uniqueIngr.SubIngr, ingredients.IngrName, SUM(batchIngr.Amount)
			from
			    ingredients
			        left join
			    uniqueIngr ON ingredients.UPC = uniqueIngr.UPC
						join batchIngr ON batchIngr.IngrID = ingredients.IngrID
						$where  
				GROUP by IngrName
				order by batchIngr.Amount;";
	$result = runQuery($sql);
	$finalResult = array();
	while ($row = $result->fetch_assoc()){
	  $finalResult[] = $row;
	}
	echo json_encode($finalResult);
}


function getBoxLabels(){
	$sql = "SELECT * FROM assortments";
	$result = runQuery($sql);
	$finalResult = array();
	while ($row = $result->fetch_assoc()){
	  $finalResult[] = $row;
	}
	echo json_encode($finalResult);
}


function runQuery($sql){
	global $con;
	$result = mysqli_query($con,$sql);
	if (!$result) {
	 	die('Error: ' . mysqli_error($con));
	 	} else{
			if(mysqli_insert_id($con)){
				return mysqli_insert_id($con);
			}
	 		else return $result;
	 	}
}
