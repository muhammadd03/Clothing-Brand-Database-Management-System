<html>
<head>
    <link rel="stylesheet" type="text/css" href="uppdate_data.css">
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

// Get the ID, name, and city from the form
$productid = $_POST['ProductID'];
$Brandname = $_POST['Brandname'];
$category = $_POST['category'];
$buyingprice = $_POST['buyingprice'];
$fabricmaterial = $_POST['fabricmaterial'];
$color = $_POST['color'];
$Suppliername = $_POST['Suppliername'];
$description = $_POST['product_description'];
$product_type = $_POST['product_type'];

// Update the record in product table
$sql = "UPDATE Product SET Brandname='$Brandname', category='$category', buyingprice='$buyingprice', fabricmaterial='$fabricmaterial', color='$color', Suppliername='$Suppliername', product_description='$description' WHERE ProductID=$productid";
if (mysqli_query($conn, $sql)) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>
</div>
</body>
</html>