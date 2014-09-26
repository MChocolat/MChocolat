<?php
include "functions.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ingredient Inserted</title>
</head>
<body>
	<?php

	function add2ingredients($UPC, $exp, $price, $distr, $subIngr){
	$date = date("Y-m-d");
	$sql = "INSERT INTO ingredients (IngrID, UPC, DOP, Exp, Price, Distributor, SubIngr)
			VALUES(null, '$UPC', '$date', '$exp', '$price', '$distr', 'subIngr');";
	runQuery($sql);
}
		echo "connected... ";

		// escape variables for security
		$UPC = mysqli_real_escape_string($con, $_POST['UPC']);
		$Exp = mysqli_real_escape_string($con, $_POST['Exp']);
		$Price = mysqli_real_escape_string($con, $_POST['Price']);
		$Distributor = mysqli_real_escape_string($con, $_POST['Distributor']);
		$SubIngr = mysqli_real_escape_string($con, $_POST['SubIngr']);

		add2ingredients($UPC, $Exp, $Price, $Distributor, $SubIngr);

		echo "1 record added <br />";
		echo "Added: <br />";
		echo "UPC: $UPC <br /> ";
		echo "Exp: $Exp <br /> ";
		echo "Price: $Price <br /> ";
		echo "Distributor: $Distributor <br /> ";
		echo "SubIngr: $SubIngr <br /> ";
	?>

	<form action="../display/displayAssortments.php" method="get">
	<input type="submit" value="Return to Assortments">
	</form>

</body>
</html>
