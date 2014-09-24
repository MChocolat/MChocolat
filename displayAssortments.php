<?php
include "_header.php";
?>
<!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=0.7" />
      <title>M Chocolat Inventory Management System</title>
      <link rel="stylesheet" href="css/foundation.css" />
      <script src="js/vendor/modernizr.js"></script>
</head>
<body>
      <script src="/js/vendor/jquery.js"></script>
      <script src="/js/vendor/fastclick.js"></script>
      <script src="/js/foundation.min.js"></script>

<dl class="tabs" data-tab>
  <dd class="active"><a href="#panel1">Tab 1</a></dd>
  <dd><a href="#panel2">Tab 2</a></dd>
  <dd><a href="#panel3">Tab 3</a></dd>
  <dd><a href="#panel4">Tab 4</a></dd>
</dl>
<div class="tabs-content">
  <div class="content active" id="panel1">
    <h2>Assortments </h2>
  
<?php
global $con;

$result = mysqli_query($con,"SELECT * FROM assortments");

echo "<table border='1' width="75%">
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


<form action="/insertAssortments" method="post" width="25%">
quantity: <input type="int" name="quantity">
contents: <input type="text" name="contents">
<input type="submit">
</form>

</div>
  <div class="content" id="panel2">
    <p>This is the second panel of the basic tab example. This is the second panel of the basic tab example.</p>
  </div>
  <div class="content" id="panel3">
    <p>This is the third panel of the basic tab example. This is the third panel of the basic tab example.</p>
  </div>
  <div class="content" id="panel4">
    <p>This is the fourth panel of the basic tab example. This is the fourth panel of the basic tab example.</p>
  </div>
</div>

<script>
  $(document).foundation();
</script>
</body>
</html>
