<?php
$conn = mysqli_connect('localhost', 'root', '', 'muhammad_bsse4_a_finalproject');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <title>Query 4</title>
     <link rel="stylesheet" href="sharedquery2.css">
     <script src="loadheader.js" defer></script>
</head>
<body>
<div id="header-placeholder"></div>
<?php

$select = mysqli_query($conn, "
SELECT 
    c.CustomerID, 
    c.firstname, 
    c.lastname, 
    s.ProductID, 
    b.Brandname,
    s.dateofpurchase 
FROM 
    customer c
JOIN 
    sell s ON c.CustomerID = s.CustomerID
JOIN 
    product p ON s.ProductID = p.productID
JOIN 
    brand b ON p.BrandName = b.BrandID
ORDER BY 
    c.CustomerID, s.dateofpurchase;
");
?>
<div class='query-table'>
<div class="product-display">
   <table class="product-display-table">
   <h1>List of the all the customers with details of their purchase i.e. all the products purchased</h1>
      <thead>
      <tr>
         <th>Customer ID</th>
         <th>First Name</th>
         <th>Last Name</th>
         <th>Product ID</th>
         <th>Brand</th>
         <th>Date Of Purchase</th>
      </tr>
      </thead>
      <?php while($row = mysqli_fetch_assoc($select)){ ?>
      <tr>
         <td><?php echo $row['CustomerID']; ?></td>
         <td><?php echo $row['firstname']; ?></td>
         <td><?php echo $row['lastname']; ?></td>
         <td><?php echo $row['ProductID']; ?></td>
         <td><?php echo $row['Brandname']; ?></td>
         <td><?php echo $row['dateofpurchase']; ?></td>
      </tr>
      <?php } ?>
   </table>
</div>
</div>
</body>
</html>
