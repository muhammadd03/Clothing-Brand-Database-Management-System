<html>
    <head>
        <link rel="stylesheet" type="text/css" href="supplier_update.css">
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
$supplierid = $_GET['id'];

// Retrieve the record from biodata table
$sql = "SELECT * FROM Supplier WHERE SupplierID=$supplierid";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

// Display the record in editable form
echo "<form action='supplier_update_data.php' method='post'>
<input type='hidden' name='SupplierID' value='" . $row['SupplierID'] . "'>
<table border='1'>
<tr>
<th>Supplier Name</th>
<td><input type='text' name='suppliername' value='" . $row['suppliername'] . "'></td>
</tr>
<tr>
<th>Supplier Location</th>
<td><input type='text' name='supplierlocation' value='" . $row['supplierlocation'] . "'></td>
</tr>
<tr>
<th>Supplier Contact</th>
<td><input type='text' name='suppliercontact' value='" . $row['suppliercontact'] . "'></td>
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