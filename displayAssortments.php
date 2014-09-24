<?php
include "_header.php";
?>
<!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>M Chocolat Inventory Management System</title>
      <link rel="stylesheet" href="css/foundation.css" />
      <script src="js/vendor/modernizr.js"></script>
</head>
<body>
<ul class="tabs" data-tab role="tablist">
  <li class="tab-title active" role="presentational" ><a href="#panel2-1" role="tab" tabindex="0" aria-selected="true" controls="panel2-1">Tab 1</a></li>
  <li class="tab-title" role="presentational" ><a href="#panel2-2" role="tab" tabindex="0"aria-selected="false" controls="panel2-2">Tab 2</a></li>
  <li class="tab-title" role="presentational"><a href="#panel2-3" role="tab" tabindex="0" aria-selected="false" controls="panel2-3">Tab 3</a></li>
  <li class="tab-title" role="presentational" ><a href="#panel2-4" role="tab" tabindex="0" aria-selected="false" controls="panel2-4">Tab 4</a></li>
</ul>
<div class="tabs-content">
  <section role="tabpanel" aria-hidden="false" class="content active" id="panel2-1">
    <h2>First panel content goes here...</h2>
 
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

 </section>
  <section role="tabpanel" aria-hidden="true" class="content" id="panel2-2">
    <h2>Second panel content goes here...</h2>
  </section>
  <section role="tabpanel" aria-hidden="true" class="content" id="panel2-3">
    <h2>Third panel content goes here...</h2>
  </section>
  <section role="tabpanel" aria-hidden="true" class="content" id="panel2-4">
    <h2>Fourth panel content goes here...</h2>
  </section>
</div>

</body>
</html>
