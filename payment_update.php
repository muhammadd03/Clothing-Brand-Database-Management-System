<html>
<head>
    <link rel="stylesheet" type="text/css" href="payment_update.css">
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
$customerid = $_GET['id'];

// Retrieve the record from biodata table
$sql = "SELECT * FROM Payment WHERE CustomerID=$customerid";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

// Display the record in editable form
echo "<form action='payment_update_data.php' method='post'>
<input type='hidden' name='CustomerID' value='" . $row['CustomerID'] . "'>
<table border='1'>
<tr>
<th>Payment Date</th>
<td><input type='date' name='paymentdate' value='" . $row['paymentdate'] . "'></td>
</tr>
<th>Payment Amount</th>
<td><input type='number' name='paymentamount' value='" . $row['paymentamount'] . "'></td>
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