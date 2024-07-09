<?php
$conn = mysqli_connect('localhost', 'root', '', 'muhammad_bsse4_a_finalproject');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query to get sum of total sales for each brand
$sql_brand_sales = "
SELECT 
    b.Brandname,
    SUM(s.Sellingprice) AS TotalSales
FROM 
    sell s
JOIN 
    product p ON s.ProductID = p.ProductID
JOIN 
    brand b ON p.Brandname = b.BrandID
GROUP BY 
    b.Brandname
ORDER BY 
    b.Brandname;
";

$result_brand_sales = mysqli_query($conn, $sql_brand_sales);

// Query to get sum of total sales for each customer
$sql_customer_sales = "
SELECT 
    c.CustomerID,
    c.firstname,
    c.lastname,
    SUM(s.Sellingprice) AS TotalSales
FROM 
    sell s
JOIN 
    customer c ON s.CustomerID = c.CustomerID
GROUP BY 
    c.CustomerID, c.firstname, c.lastname
ORDER BY 
    c.firstname, c.lastname;
";

$result_customer_sales = mysqli_query($conn, $sql_customer_sales);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <title>Query 15</title>
   <link rel="stylesheet" href="sharedquery2.css">
   <script src="loadheader.js" defer></script>
</head>
<body>
<div id="header-placeholder"></div>
<div class="query-table">
   <div class="product-display">
   <h1>Sum of total sale for each brand and each customer.</h1>
      <table class="product-display-table">
         <thead>
         <tr>
            <th>Brand Name</th>
            <th>Total Sales</th>
         </tr>
         </thead>
         <tbody>
         <?php if (mysqli_num_rows($result_brand_sales) > 0) {
             while($row = mysqli_fetch_assoc($result_brand_sales)) { ?>
         <tr>
            <td><?php echo $row['Brandname']; ?></td>
            <td><?php echo $row['TotalSales']; ?></td>
         </tr>
         <?php } } else { ?>
         <tr>
            <td colspan="2">No brand sales data found.</td>
         </tr>
         <?php } ?>
         </tbody>
      </table>
   </div>

   <div class="product-display">
   
      <table class="product-display-table">
         <thead>
         <tr>
            <th>Customer ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Total Sales</th>
         </tr>
         </thead>
         <tbody>
         <?php if (mysqli_num_rows($result_customer_sales) > 0) {
             while($row = mysqli_fetch_assoc($result_customer_sales)) { ?>
         <tr>
            <td><?php echo $row['CustomerID']; ?></td>
            <td><?php echo $row['firstname']; ?></td>
            <td><?php echo $row['lastname']; ?></td>
            <td><?php echo $row['TotalSales']; ?></td>
         </tr>
         <?php } } else { ?>
         <tr>
            <td colspan="4">No customer sales data found.</td>
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
