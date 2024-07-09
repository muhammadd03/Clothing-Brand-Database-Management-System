<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="insert.css">
    <script src="loadheader.js" defer></script>
</head>
<div id="header-placeholder"></div>
<body>

<div class='success'>
    <?php

    $conn = mysqli_connect("localhost", "root", "", "muhammad_bsse4_a_finalproject");

    // Check connection

    if (!$conn) {

    die("Connection failed: " . mysqli_connect_error());

    }

    
    // $prdocutid = mysqli_real_escape_string($conn, $_POST['ProductID']);
    $BrandName = mysqli_real_escape_string($conn, $_POST['BrandName']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $buyingprice = mysqli_real_escape_string($conn, $_POST['buyingprice']);
    $fabricmaterial = mysqli_real_escape_string($conn, $_POST['fabricmaterial']);
    $color = mysqli_real_escape_string($conn, $_POST['color']);
    $Suppliername = mysqli_real_escape_string($conn, $_POST['Suppliername']);
    $description = mysqli_real_escape_string($conn, $_POST['product_description']);
    $Type = mysqli_real_escape_string($conn, $_POST['product_type']);

    $sql = "INSERT into Product (BrandName, category, buyingprice, fabricmaterial, color, Suppliername, product_description, product_type) VALUES ('$BrandName', '$category', '$buyingprice', '$fabricmaterial', '$color', '$Suppliername', '$description', '$Type')";
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