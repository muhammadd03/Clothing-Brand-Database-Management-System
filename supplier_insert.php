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

    
    $supplierid = mysqli_real_escape_string($conn, $_POST['SupplierID']);
    $suppliername = mysqli_real_escape_string($conn, $_POST['suppliername']);
    $supplierlocation = mysqli_real_escape_string($conn, $_POST['supplierlocation']);
    $suppliercontact = mysqli_real_escape_string($conn, $_POST['suppliercontact']);

    $sql = "insert into Supplier (SupplierID, suppliername, supplierlocation, suppliercontact) VALUES ('$supplierid', '$suppliername', '$supplierlocation', '$suppliercontact')";
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