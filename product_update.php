<html>
<head>
    <link rel="stylesheet" type="text/css" href="product_update.css">
    <script src="loadheader.js" defer></script>
</head>
<body>
<div id="header-placeholder"></div>
<?php
$conn = mysqli_connect("localhost", "root", "", "muhammad_bsse4_a_finalproject");

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Get the ID from the URL parameter
$productid = $_GET['id'];

// Retrieve the record from product table
$sql = "SELECT * FROM Product WHERE ProductID=$productid";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

// Display the record in editable form
echo "<form action='product_update_data.php' method='post'>
<input type='hidden' name='ProductID' value='" . $row['ProductID'] . "'>
<table border='1'>
<tr>
<th>Brand Name</th>
<td><input type='text' name='Brandname' value='" . $row['Brandname'] . "'></td>
</tr>
<tr>
<th>Category</th>
<td><input type='text' name='category' value='" . $row['category'] . "'></td>
</tr>
<tr>
<th>Buying Price</th>
<td><input type='number' name='buyingprice' value='" . $row['buyingprice'] . "'></td>
</tr>
<tr>
<th>Fabric Material</th>
<td><input type='text' name='fabricmaterial' value='" . $row['fabricmaterial'] . "'></td>
</tr>
<tr>
<th>Color</th>
<td><input type='text' name='color' value='" . $row['color'] . "'></td>
</tr>
<tr>
<th>Supplier Name</th>
<td><input type='text' name='Suppliername' value='" . $row['Suppliername'] . "'></td>
</tr>
<tr>
<th>Description</th>
<td><input type='text' name='product_description' value='" . $row['product_description'] . "'></td>
</tr>
<th>Type</th>
<td><input type='text' name='product_type' value='" . $row['product_type'] . "'></td>
</tr>
<tr>
<td colspan='2'><input type='submit' value='Update'></td>
</tr>
</table>
</form>";

// Close connection
mysqli_close($conn);
?>
</body>
</html>