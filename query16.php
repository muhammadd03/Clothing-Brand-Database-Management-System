<?php
$conn = mysqli_connect('localhost', 'root', '', 'muhammad_bsse4_a_finalproject');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query to get total purchases made by each customer
$sql_total_purchases = "
SELECT 
    c.CustomerID,
    c.firstname,
    c.lastname,
    SUM(s.Sellingprice) AS TotalPurchases
FROM 
    customer c
LEFT JOIN 
    sell s ON c.CustomerID = s.CustomerID
GROUP BY 
    c.CustomerID, c.firstname, c.lastname
ORDER BY 
    c.CustomerID;
";
// c.firstname, c.lastname;
$result_total_purchases = mysqli_query($conn, $sql_total_purchases);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <title>Query 16</title>
   <link rel="stylesheet" href="sharedquery2.css">
   <script src="loadheader.js" defer></script>
</head>
<body>
<div id="header-placeholder"></div>
<div class="query-table">
   <div class="product-display">
   <h1>Total purchase made by each customer till now.</h1>
      <table class="product-display-table">
         <thead>
         <tr>
            <th>Customer ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Total Purchases</th>
         </tr>
         </thead>
         <tbody>
         <?php if (mysqli_num_rows($result_total_purchases) > 0) {
             while($row = mysqli_fetch_assoc($result_total_purchases)) { ?>
         <tr>
            <td><?php echo $row['CustomerID']; ?></td>
            <td><?php echo $row['firstname']; ?></td>
            <td><?php echo $row['lastname']; ?></td>
            <td><?php echo $row['TotalPurchases'] !== null ? $row['TotalPurchases'] : 0; ?></td>
         </tr>
         <?php } } else { ?>
         <tr>
            <td colspan="4">No customer data found.</td>
         </tr>
         <?php } ?>
         </tbody>
      </table>
   </div>
</div>

</body>
</html>

<?php
mysqli_close($conn);
?>
