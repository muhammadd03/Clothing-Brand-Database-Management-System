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
$purchaseid = $_POST['PurchaseID'];
$Brandname = $_POST['Brandname'];
$Suppliername = $_POST['Suppliername'];
$No_ofSuitsPurchased = $_POST['No_ofSuitsPurchased'];
$totalamountpaid = $_POST['totalamountpaid'];
$DateOfPurchase = $_POST['DateOfPurchase'];

// Update the record in biodata table
$sql = "UPDATE Purchase SET Brandname='$Brandname', Suppliername='$Suppliername', No_ofSuitsPurchased='$No_ofSuitsPurchased', totalamountpaid='$totalamountpaid', DateOfPurchase='$DateOfPurchase' WHERE PurchaseID=$purchaseid";
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