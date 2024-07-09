<html>
<head>
    <link rel="stylesheet" type="text/css" href="uppdate_data.css">
    <script src="loadheader.js" defer></script>
</head>
<body>
<div id="header-placeholder"></div>
<dic class='success'>
<?php
$conn = mysqli_connect("localhost", "root", "", "muhammad_bsse4_a_finalproject");

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Get the ID, name, and city from the form
$customerid = $_POST['CustomerID'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$gender = $_POST['gender'];
$datejoined = $_POST['datejoined'];
$remarks = $_POST['remarks'];

// Update the record in biodata table
$sql = "UPDATE Customer SET firstname='$firstname', lastname='$lastname', email='$email', phone='$phone', address='$address', gender='$gender', datejoined='$datejoined', remarks='$remarks' WHERE CustomerID=$customerid";
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