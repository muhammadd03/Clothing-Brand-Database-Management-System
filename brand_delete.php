<html>
<head>
    <link rel="stylesheet" type="text/css" href="delete.css">
    <script src="loadheader.js" defer></script>
</head>
<body>
<div id="header-placeholder"></div>
<div class='success'>
<?php
$conn = mysqli_connect("localhost", "root", "", "muhammad_bsse4_a_finalproject");

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Get the ID from the URL parameter
$id = $_GET['id'];

// Delete the record from biodata table
$sql = "DELETE FROM Brand WHERE BrandID=$id";
if (mysqli_query($conn, $sql)) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>
<div>
</body>
</html>