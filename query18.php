<?php
$conn = mysqli_connect('localhost', 'root', '', 'muhammad_bsse4_a_finalproject');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query to get total sale done till date
$sql_total_sales = "
SELECT 
    SUM(Sellingprice) AS TotalSales
FROM 
    sell;
";

$result_total_sales = mysqli_query($conn, $sql_total_sales);
$row_total_sales = mysqli_fetch_assoc($result_total_sales);
$total_sales = $row_total_sales['TotalSales'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <title>Query 18</title>
   <link rel="stylesheet" href="sharedquery2.css">
   <script src="loadheader.js" defer></script>
</head>
<body>
<div id="header-placeholder"></div>
<div class="query-table">
   <div class="product-display">
   <h1>Total sale done till date.</h1>
      <table class="product-display-table">
         <thead>
         <tr>
            <th>Total Sales</th>
         </tr>
         </thead>
         <tbody>
         <tr>
            <td><?php echo $total_sales !== null ? $total_sales : 0; ?></td>
         </tr>
         </tbody>
      </table>
   </div>
</div>

</body>
</html>

<?php
mysqli_close($conn);
?>
