<html>
    <head>
        <link rel="stylesheet" type="text/css" href="sell_retrieve_data.css">
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

$sql = "SELECT * FROM Sell";
$result = mysqli_query($conn, $sql);

// Display data in a table
echo "<table border='1'>
<tr>
<th>Sell ID</th>
<th>Customer ID</th>
<th>Product ID</th>
<th>Selling Price</th>
<th>Date of Purchase</th>
<th>Action</th>
</tr>";

while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['SellID'] . "</td>";
  echo "<td><input type='number' name='CustomerID' value='" . $row['CustomerID'] . "'></td>";
  echo "<td><input type='number' name='ProductID' value='" . $row['ProductID'] . "'></td>";
  echo "<td><input type='number' name='sellingprice' value='" . $row['sellingprice'] . "'></td>";
  echo "<td><input type='text' name='dateofpurchase' value='" . $row['dateofpurchase'] . "'></td>";
  echo "<td><a href='sell_delete.php?id=" . $row['CustomerID'] . "'>Delete</a> | <a href='sell_update.php?id=" . $row['CustomerID'] . "'>Update</a></td>";
  echo "</tr>";
}

echo "</table>";

// Close connection
mysqli_close($conn);
?>
</body>
</html>