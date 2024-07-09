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

    
    $CustomerID = mysqli_real_escape_string($conn, $_POST['CustomerID']);
    $ProductID = mysqli_real_escape_string($conn, $_POST['ProductID']);
    $Sellingprice = mysqli_real_escape_string($conn, $_POST['sellingprice']);
    $dateofpurchase = mysqli_real_escape_string($conn, $_POST['dateofpurchase']);

    $sql = "insert into sell (CustomerID, ProductID, sellingprice, dateofpurchase) VALUES ('$CustomerID', '$ProductID', '$Sellingprice', '$dateofpurchase')";
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