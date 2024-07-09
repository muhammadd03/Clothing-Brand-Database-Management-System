<?php
$conn = mysqli_connect('localhost', 'root', '', 'muhammad_bsse4_a_finalproject');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query to get total sales
$sql_total_sales = "
SELECT 
    SUM(Sellingprice) AS TotalSales
FROM 
    sell;
";

$result_total_sales = mysqli_query($conn, $sql_total_sales);
$row_total_sales = mysqli_fetch_assoc($result_total_sales);
$total_sales = $row_total_sales['TotalSales'];

// Query to get total expenditure
$sql_total_expenditure = "
SELECT 
    SUM(amount) AS TotalExpenditure
FROM 
    expenditure;
";

$result_total_expenditure = mysqli_query($conn, $sql_total_expenditure);
$row_total_expenditure = mysqli_fetch_assoc($result_total_expenditure);
$total_expenditure = $row_total_expenditure['TotalExpenditure'];

// Query to get total purchases
$sql_total_purchases = "
SELECT 
    SUM(totalamountpaid) AS TotalPurchases
FROM 
    purchase;
";

$result_total_purchases = mysqli_query($conn, $sql_total_purchases);
$row_total_purchases = mysqli_fetch_assoc($result_total_purchases);
$total_purchases = $row_total_purchases['TotalPurchases'];

// Calculate current account value
$current_account_value =  $total_sales - ($total_expenditure + $total_purchases);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <title>Query 20</title>
   <link rel="stylesheet" href="sharedquery2.css">
   <script src="loadheader.js" defer></script>
</head>
<body>
<div id="header-placeholder"></div>
<div class="query-table">
   <div class="product-display">
   <h1>Current Account Value.</h1>
      <table class="product-display-table">
         <thead>
         <tr>
            <th>Current Account Value</th>
         </tr>
         </thead>
         <tbody>
         <tr>
            <td><?php echo $current_account_value !== null ? $current_account_value : 0; ?></td>
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
