<?php
$conn = mysqli_connect('localhost', 'root', '', 'muhammad_bsse4_a_finalproject');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "
SELECT 
    COUNT(s.ProductID) AS TotalSuitsSold, 
    SUM(s.Sellingprice) AS TotalSaleAmount
FROM 
    sell s;
";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <title>Query 7</title>
   <link rel="stylesheet" href="sharedquery2.css">
   <script src="loadheader.js" defer></script>
</head>
<body>
<div id="header-placeholder"></div>
<div class="query-table">
   <div class="product-display">
      
      <table class="product-display-table">
      <h1>Total Number of suits sold and the total sale amount.</h1>
         <thead>
         <tr>
            <th>Total Suits Sold</th>
            <th>Total Sale Amount</th>
         </tr>
         </thead>
         <tbody>
         <tr>
            <td><?php echo $row['TotalSuitsSold']; ?></td>
            <td><?php echo $row['TotalSaleAmount']; ?></td>
         </tr>
         </tbody>
      </table>
   </div>
</div>

</body>
</html>
