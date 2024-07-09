<html>
<head>
    <link rel="stylesheet" type="text/css" href="expenditure_retrieve_data.css">
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

$sql = "SELECT * FROM Expenditure";
$result = mysqli_query($conn, $sql);

// Display data in a table
echo "<table border='1'>
<tr>
<th>Expenditure ID</th>
<th>Date</th>
<th>Amount</th>
<th>Remarks</th>
<th>Action</th>
</tr>";

while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['ExpenditureID'] . "</td>";
  echo "<td><input type='text' name='expdate' value='" . $row['expdate'] . "'></td>";
  echo "<td><input type='text' name='amount' value='" . $row['amount'] . "'></td>";
  echo "<td><input type='text' name='remarks' value='" . $row['remarks'] . "'></td>";
  echo "<td><a href='expenditure_delete.php?id=" . $row['ExpenditureID'] . "'>Delete</a> | <a href='expenditure_update.php?id=" . $row['ExpenditureID'] . "'>Update</a></td>";
  echo "</tr>";
}

echo "</table>";

// Close connection
mysqli_close($conn);
?>
</body>
</html>