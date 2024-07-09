<html>
    <head>
        <link rel="stylesheet" type="text/css" href="sell_update.css">
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
$sellid = $_GET['id'];

// Retrieve the record from sell table
$sql = "SELECT * FROM Sell WHERE SellID=$sellid";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

// Display the record in editable form
echo "<form action='sell_update_data.php' method='post'>
<input type='hidden' name='SellID' value='" . $row['SellID'] . "'>
<table border='1'>
<tr>
<th>Customer ID</th>
<td><input type='number' name='CustomerID' value='" . $row['CustomerID'] . "'></td>
</tr>
<tr>
<th>Product ID</th>
<td><input type='number' name='ProductID' value='" . $row['ProductID'] . "'></td>
</tr>
<tr>
<th>Selling Price</th>
<td><input type='number' name='sellingprice' value='" . $row['sellingprice'] . "'></td>
</tr>
<tr>
<th>Date of Purchase</th>
<td><input type='date' name='dateofpurchase' value='" . $row['dateofpurchase'] . "'></td>
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