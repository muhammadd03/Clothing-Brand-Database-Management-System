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

// Query to get total payment received
$sql_total_payment_received = "
SELECT 
    SUM(paymentamount) AS TotalPaymentReceived
FROM 
    payment;
";

$result_total_payment_received = mysqli_query($conn, $sql_total_payment_received);
$row_total_payment_received = mysqli_fetch_assoc($result_total_payment_received);
$total_payment_received = $row_total_payment_received['TotalPaymentReceived'];

// Calculate total remaining amount
$total_remaining_amount = $total_sales - $total_payment_received  ;
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <title>Query 21</title>
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
            <th>Total Remaining Amount</th>
         </tr>
         </thead>
         <tbody>
         <tr>
            <td><?php echo $total_remaining_amount !== null ? $total_remaining_amount : 0; ?></td>
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
