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

    
    $expdate = mysqli_real_escape_string($conn, $_POST['expdate']);
    $amount = mysqli_real_escape_string($conn, $_POST['amount']);
    $remarks = mysqli_real_escape_string($conn, $_POST['remarks']);

    $sql = "insert into Expenditure (expdate, amount, remarks) VALUES ('$expdate', '$amount', '$remarks')";
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