<?php
$conn = mysqli_connect('localhost','root','','muhammad_bsse4_a_finalproject');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <title>Query 2</title>
     <link rel="stylesheet" href="sharedquery2.css">
     <script src="loadheader.js" defer></script>
</head>
<body>
<div id="header-placeholder"></div>
<?php

$select = mysqli_query($conn, "
SELECT 
    c.firstname AS CustomerFirstName,
    c.lastname AS CustomerLastName,
    COUNT(s.ProductID) AS NumberOfSuits,
    SUM(s.Sellingprice) AS TotalCost,
    IFNULL(p.TotalAmountPaid, 0) AS TotalAmountPaid,
    (SUM(s.Sellingprice) - IFNULL(p.TotalAmountPaid, 0)) AS RemainingAmount
FROM 
    customer c
LEFT JOIN 
    sell s ON c.CustomerID = s.CustomerID
LEFT JOIN 
    (SELECT CustomerID, SUM(paymentamount) AS TotalAmountPaid
     FROM payment
     GROUP BY CustomerID) p ON c.CustomerID = p.CustomerID
GROUP BY 
    c.CustomerID, c.firstname, c.lastname;
");
?>
<div class="query-table">

<div class="admin-product-form-container">
<div class="product-display">
   
   <table class="product-display-table">
   <h1>List of all the customers with details of Numbers of suits they have bought, total cost of
purchased suits ,the total amount they have paid and the total amount that is left</h1>
      <thead>
      <tr>
         <th>First Name</th>
         <th>Last Name</th>
         <th>No Of Suits</th>
         <th>Total Amount</th>
         <th>Paid Amount</th>
         <th>Remaining Amount</th>
      </tr>
      </thead>
      <?php while($row = mysqli_fetch_assoc($select)){ ?>
      <tr>
         <td><?php echo $row['CustomerFirstName']; ?></td>
         <td><?php echo $row['CustomerLastName']; ?></td>
         <td><?php echo $row['NumberOfSuits']; ?></td>
         <td><?php echo $row['TotalCost']; ?></td>
         <td><?php echo $row['TotalAmountPaid']; ?></td>
         <td><?php echo $row['RemainingAmount']; ?></td>
      </tr>
      <?php } ?>
   </table>
</div>
</div>
</body>
</html>
