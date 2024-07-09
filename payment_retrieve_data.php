<html>
<head>
    <link rel="stylesheet" type="text/css" href="payment_retrieve_data.css">
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

$sql = "SELECT * FROM Payment";
$result = mysqli_query($conn, $sql);

// Display data in a table
echo "<table border='1'>
<tr>
<th>Customer ID</th>
<th>Payment Date</th>
<th>Payment Amount</th>
<th>Action</th>
</tr>";

while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td><input type='number' name='CustomerID' value='" . $row['CustomerID'] . "'></td>";
  echo "<td><input type='date' name='paymentdate' value='" . $row['paymentdate'] . "'></td>";
  echo "<td><input type='text' name='paymentamount' value='" . $row['paymentamount'] . "'></td>";
  echo "<td><a href='payment_delete.php?id=" . $row['CustomerID'] . "'>Delete</a> | <a href='payment_update.php?id=" . $row['CustomerID'] . "'>Update</a></td>";
  echo "</tr>";
}

echo "</table>";

// Close connection
mysqli_close($conn);
?>
</body>
</html>