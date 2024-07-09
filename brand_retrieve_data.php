<!DOCTYPE html>
<html lang="en">
<head>
    <title>Query Results</title>
    <link rel="stylesheet" type="text/css" href="brand_retrieve_data.css">
    <script src="loadheader.js" defer></script>
</head>
<body>
    <div id="header-placeholder"></div>
    <div class="container">
        <?php
        $conn = mysqli_connect("localhost", "root", "", "muhammad_bsse4_a_finalproject");

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM Brand";
        $result = mysqli_query($conn, $sql);

        // Display data in a table
        echo "<table border='1'>
        <tr>
        <th>Brand ID</th>
        <th>Brand Name</th>
        <th>Contact</th>
        <th>Action</th>
        </tr>";

        while($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['BrandID'] . "</td>";
            echo "<td><input type='text' name='brandname' value='" . $row['brandname'] . "'></td>";
            echo "<td><input type='text' name='contact' value='" . $row['contact'] . "'></td>";
            echo "<td><a href='brand_delete.php?id=" . $row['BrandID'] . "'>Delete</a> | <a href='brand_update.php?id=" . $row['BrandID'] . "'>Update</a></td>";
            echo "</tr>";
        }

        echo "</table>";

        // Close connection
        mysqli_close($conn);
        ?>
    </div>
</body>
</html>
