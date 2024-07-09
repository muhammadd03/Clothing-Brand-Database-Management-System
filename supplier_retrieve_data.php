<html>
    <head>
        <link rel="stylesheet" type="text/css" href="supplier_retrieve_data.css">
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

$sql = "SELECT * FROM Supplier";
$result = mysqli_query($conn, $sql);

// Display data in a table
echo "<table border='1'>
<tr>
<th>Supplier ID</th>
<th>Supplier Name</th>
<th>supplier Location</th>
<th>Supplier Contact</th>
<th>Action</th>
</tr>";

while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['SupplierID'] . "</td>";
  echo "<td><input type='text' name='suppliername' value='" . $row['suppliername'] . "'></td>";
  echo "<td><input type='text' name='supplierlocation' value='" . $row['supplierlocation'] . "'></td>";
  echo "<td><input type='number' name='suppliercontact' value='" . $row['suppliercontact'] . "'></td>";
  echo "<td><a href='supplier_delete.php?id=" . $row['SupplierID'] . "'>Delete</a> | <a href='supplier_update.php?id=" . $row['SupplierID'] . "'>Update</a></td>";
  echo "</tr>";
}

echo "</table>";

// Close connection
mysqli_close($conn);
?>
</body>
</html>