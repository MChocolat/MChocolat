<?php
include "_header.php";
?>
<!DOCTYPE html>
<html>
<head>
<title>Title of the document</title>
</head>
<body>

<?php
global $con;

$result = mysqli_query($con,"SELECT * FROM assortments");

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


?>



<form action="/insertAssortments" method="post">
quantity: <input type="int" name="quantity">
contents: <input type="text" name="contents">
<input type="submit">
</form>


</body>
</html>
