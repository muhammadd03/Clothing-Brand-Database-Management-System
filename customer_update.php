<html>
<head>
    <link rel="stylesheet" type="text/css" href="customer_update.css">
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
$sql = "SELECT * FROM Customer WHERE CustomerID=$customerid";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

// Display the record in editable form
echo "<form action='customer_update_data.php' method='post'>
<input type='hidden' name='CustomerID' value='" . $row['CustomerID'] . "'>
<table border='1'>
<tr>
<th>First Name</th>
<td><input type='text' name='firstname' value='" . $row['firstname'] . "'></td>
</tr>
<tr>
<th>Last Name</th>
<td><input type='text' name='lastname' value='" . $row['lastname'] . "'></td>
</tr>
<tr>
<th>Email</th>
<td><input type='email' name='email' value='" . $row['email'] . "'></td>
</tr>
<tr>
<th>Phone</th>
<td><input type='text' name='phone' value='" . $row['phone'] . "'></td>
</tr>
<tr>
<th>Address</th>
<td><input type='text' name='address' value='" . $row['address'] . "'></td>
</tr>
<tr>
<th>Gender</th>
<td><input type='text' name='gender' value='" . $row['gender'] . "'></td>
</tr>
<tr>
<th>Date Joined</th>
<td><input type='date' name='datejoined' value='" . $row['datejoined'] . "'></td>
</tr>
<tr>
<th>Remarks</th>
<td><input type='text' name='remarks' value='" . $row['remarks'] . "'></td>
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