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

    $customerid = mysqli_real_escape_string($conn, $_POST['CustomerID']);
    $paymentdate = mysqli_real_escape_string($conn, $_POST['paymentdate']);
    $paymentamount = mysqli_real_escape_string($conn, $_POST['paymentamount']);

    $sql = "insert into Payment (CustomerID, paymentdate, paymentamount) VALUES ('$customerid','$paymentdate', '$paymentamount')";
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