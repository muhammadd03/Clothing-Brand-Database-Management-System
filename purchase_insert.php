<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="insert.css">
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

    
    $Brandname = mysqli_real_escape_string($conn, $_POST['Brandname']);
    $Suppliername = mysqli_real_escape_string($conn, $_POST['Suppliername']);
    $No_ofSuitsPurchased = mysqli_real_escape_string($conn, $_POST['No_ofSuitsPurchased']);
    $TotalAmountPaid = mysqli_real_escape_string($conn, $_POST['totalamountpaid']);
    $DateOfPurchase = mysqli_real_escape_string($conn, $_POST['DateOfPurchase']);
    $CustomerID = mysqli_real_escape_string($conn, $_POST['CustomerID']);

    $sql = "insert into Purchase (Brandname, Suppliername, No_ofSuitsPurchased, totalamountpaid, DateOfPurchase) VALUES ('$Brandname', '$Suppliername', '$No_ofSuitsPurchased', '$TotalAmountPaid', '$DateOfPurchase')";
    if (mysqli_query($conn, $sql)) {

    echo "Data inserted successfully";

    } else {

    echo "Error inserting data: " . mysqli_error($conn);

    }

    // Close connection

    mysqli_close($conn);

    ?>
</div>
</body>
</html>