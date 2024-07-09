<html>
  <head>
  <link rel="stylesheet" type="text/css" href="brand_update.css">
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
$brandid = $_GET['id'];

// Retrieve the record from biodata table
$sql = "SELECT * FROM Brand WHERE BrandID=$brandid";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

// Display the record in editable form
echo "<form action='brand_update_data.php' method='post'>
<input type='hidden' name='BrandID' value='" . $row['BrandID'] . "'>
<table border='1'>
<tr>
<th>Brand Name</th>
<td><input type='text' name='brandname' value='" . $row['brandname'] . "'></td>
</tr>
<tr>
<th>Contact</th>
<td><input type='text' name='contact' value='" . $row['contact'] . "'></td>
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