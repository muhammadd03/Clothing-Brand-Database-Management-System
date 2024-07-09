<html>
<head>
    <link rel="stylesheet" type="text/css" href="uppdate_data.css">
    <script src="loadheader.js" defer></script>
</head>
<body>
<div id="header-placeholder"></div>
<div class="success">
<?php
$conn = mysqli_connect("localhost", "root", "", "muhammad_bsse4_a_finalproject");

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Get the ID, name, and city from the form
$customerid = $_POST['CustomerID'];
$paymentdate = $_POST['paymentdate'];
$paymentamount = $_POST['paymentamount'];

// Update the record in Payment table
$sql = "UPDATE Payment SET paymentdate='$paymentdate', paymentamount='$paymentamount' WHERE CustomerID=$customerid";
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