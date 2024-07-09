<?php

$conn = mysqli_connect('localhost','root','','muhammad_bsse4_a_finalproject');

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <title>Query 1</title>
   <link rel="stylesheet" type="text/css" href="sharedquery2.css">
   <script src="loadheader.js" defer></script>

</head>
<body>

<div id="header-placeholder"></div>
<?php


?>
   


   <?php

   $select = mysqli_query($conn, "SELECT firstname , lastname, phone , address FROM customer");
   
   ?>
   <div class="query-table">
    <div class="admin-product-form-container">
    <div class="product-display">
      <table class="product-display-table">
      <h1>Detailed List of all the customers with their contact number and city.</h1>
         <thead>
         <tr>
            <th>First Name</th>
            <th>Last Name</th>
            
            <th>Contact</th>
            <th>Address</th>
           
         </tr>
         </thead>
         <?php while($row = mysqli_fetch_assoc($select)){ ?>
         <tr>
            <td><?php echo $row['firstname']; ?></td>
            <td><?php echo $row['lastname']; ?></td>
            
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['address']; ?></td>
           
          
         </tr>
      <?php } ?>
      </table>
   </div>

</div>

</div>
</body>
</html>