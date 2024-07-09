<html>
  <head>
      <link rel="stylesheet" type="text/css" href="customer_retrieve_data.css">
      <script src="loadheader.js" defer></script>
  </head>
  <body>
  <div id="header-placeholder"></div>
    <?php
      $conn = mysqli_connect("localhost", "root", "", "muhammad_bsse4_a_finalproject");

      // Check connection
      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());    
      }

      $sql = "SELECT * FROM Customer";
      $result = mysqli_query($conn, $sql);

      // Display data in a table
      echo "<table border='1'>
      <tr>
      <th>Customer ID</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Address</th>
      <th>Gender</th>
      <th>Date Joined</th>
      <th>Remarks</th>
      <th>Action</th>
      </tr>";

      while($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['CustomerID'] . "</td>";
        echo "<td><input type='text' name='firstname' value='" . $row['firstname'] . "'></td>";
        echo "<td><input type='text' name='lastname' value='" . $row['lastname'] . "'></td>";
        echo "<td><input type='text' name='email' value='" . $row['email'] . "'></td>";
        echo "<td><input type='text' name='phone' value='" . $row['phone'] . "'></td>";
        echo "<td><input type='text' name='address' value='" . $row['address'] . "'></td>";
        echo "<td><input type='text' name='gender' value='" . $row['gender'] . "'></td>";
        echo "<td><input type='date' name='datejoined' value='" . $row['datejoined'] . "'></td>";
        echo "<td><input type='text' name='remarks' value='" . $row['remarks'] . "'></td>";
        echo "<td><a href='customer_delete.php?id=" . $row['CustomerID'] . "'>Delete</a> | <a href='customer_update.php?id=" . $row['CustomerID'] . "'>Update</a></td>";
        echo "</tr>";
      }

      echo "</table>";

      // Close connection
      mysqli_close($conn);
    ?>
</body>
</html>