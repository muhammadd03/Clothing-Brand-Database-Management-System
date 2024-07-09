<html>
<head>
    <link rel="stylesheet" type="text/css" href="product_retrieve_data.css">
    <script src="loadheader.js" defer></script>
</head>
<div id="header-placeholder"></div>
<body>
<?php
$conn = mysqli_connect("localhost", "root", "", "muhammad_bsse4_a_finalproject");

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM Product";
$result = mysqli_query($conn, $sql);

// Display data in a table
echo "<table border='1'>
<tr>
<th>Product ID</th>
<th>Brand Name</th>
<th>Category</th>
<th>Buying Price</th>
<th>Fabric Material</th>
<th>Color</th>
<th>Supplier Name</th>
<th>Description</th>
<th>Type</th>
<th>Action</th>
</tr>";

while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['ProductID'] . "</td>";
  echo "<td><input type='text' name='Brandname' value='" . $row['Brandname'] . "'></td>";
  echo "<td><input type='text' name='category' value='" . $row['category'] . "'></td>";
  echo "<td><input type='text' name='buyingprice' value='" . $row['buyingprice'] . "'></td>";
  echo "<td><input type='text' name='fabricmaterial' value='" . $row['fabricmaterial'] . "'></td>";
  echo "<td><input type='text' name='color' value='" . $row['color'] . "'></td>";
  echo "<td><input type='text' name='Suppliername' value='" . $row['Suppliername'] . "'></td>";
  echo "<td><input type='date' name='product_description' value='" . $row['product_description'] . "'></td>";
  echo "<td><input type='text' name='product_type' value='" . $row['product_type'] . "'></td>";
  echo "<td><a href='product_delete.php?id=" . $row['ProductID'] . "'>Delete</a> | <a href='product_update.php?id=" . $row['ProductID'] . "'>Update</a></td>";
  echo "</tr>";
}

echo "</table>";

// Close connection
mysqli_close($conn);
?>
</body>
</html>