<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="insert.css">
    <script src="loadheader.js" defer></script>
</head>
<div id="header-placeholder"></div>
<div class='success'>
<body>
    <?php

    $conn = mysqli_connect("localhost", "root", "", "muhammad_bsse4_a_finalproject");

    // Check connection

    if (!$conn) {

    die("Connection failed: " . mysqli_connect_error());

    }

    
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $datejoined = mysqli_real_escape_string($conn, $_POST['datejoined']);
    $remarks = mysqli_real_escape_string($conn, $_POST['remarks']);

    $sql = "insert into Customer (firstname, lastname, email, phone, address, gender, datejoined, remarks) VALUES ('$firstname', '$lastname', '$email', '$phone', '$address', '$gender', '$datejoined', '$remarks')";
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