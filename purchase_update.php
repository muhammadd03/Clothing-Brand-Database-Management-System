<html>
<head>
    <link rel="stylesheet" type="text/css" href="purchase_update.css">
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
$purchaseid = $_GET['id'];

// Retrieve the record from biodata table
$sql = "SELECT * FROM Purchase WHERE PurchaseID=$purchaseid";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

// Display the record in editable form
echo "<form action='purchase_update_data.php' method='post'>
<input type='hidden' name='PurchaseID' value='" . $row['PurchaseID'] . "'>
<table border='1'>
<tr>
<th>Brand Name</th>
<td><input type='text' name='Brandname' value='" . $row['Brandname'] . "'></td>
</tr>
<tr>
<th>Supplier Name</th>
<td><input type='text' name='Suppliername' value='" . $row['Suppliername'] . "'></td>
</tr>
<tr>
<th>Number of Suits Purchased</th>
<td><input type='number' name='No_ofSuitsPurchased' value='" . $row['No_ofSuitsPurchased'] . "'></td>
</tr>
<tr>
<th>Total Amount Paid</th>
<td><input type='number' name='totalamountpaid' value='" . $row['totalamountpaid'] . "'></td>
</tr>
<tr>
<th>DateOfPurchase</th>
<td><input type='date' name='DateOfPurchase' value='" . $row['DateOfPurchase'] . "'></td>
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