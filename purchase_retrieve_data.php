<html>
<head>
    <link rel="stylesheet" type="text/css" href="purchase_retrieve_data.css">
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

$sql = "SELECT * FROM Purchase";
$result = mysqli_query($conn, $sql);

// Display data in a table
echo "<table border='1'>
<tr>
<th>Purchase ID</th>
<th>Brand Name</th>
<th>Suppllier Name</th>
<th>Number of Suits Purchased</th>
<th>Total Amount Paid</th>
<th>Date of Purchase</th>
<th>Action</th>
</tr>";

while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['PurchaseID'] . "</td>";
  echo "<td><input type='text' name='Brandname' value='" . $row['Brandname'] . "'></td>";
  echo "<td><input type='text' name='Suppliername' value='" . $row['Suppliername'] . "'></td>";
  echo "<td><input type='text' name='No_ofSuitsPurchased' value='" . $row['No_ofSuitsPurchased'] . "'></td>";
  echo "<td><input type='number' name='totalamountpaid' value='" . $row['totalamountpaid'] . "'></td>";
  echo "<td><input type='date' name='DateOfPurchase' value='" . $row['DateOfPurchase'] . "'></td>";
  echo "<td><a href='purchase_delete.php?id=" . $row['PurchaseID'] . "'>Delete</a> | <a href='purchase_update.php?id=" . $row['PurchaseID'] . "'>Update</a></td>";
  echo "</tr>";
}

echo "</table>";

// Close connection
mysqli_close($conn);
?>
</body>
</html>