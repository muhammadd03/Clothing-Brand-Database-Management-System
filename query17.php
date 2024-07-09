<?php
$conn = mysqli_connect('localhost', 'root', '', 'muhammad_bsse4_a_finalproject');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query to get total investment done till date
$sql_total_investment = "
SELECT 
    SUM(totalamountpaid) AS TotalInvestment
FROM 
    purchase;
";

$result_total_investment = mysqli_query($conn, $sql_total_investment);
$row_total_investment = mysqli_fetch_assoc($result_total_investment);
$total_investment = $row_total_investment['TotalInvestment'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <title>Query 17</title>
   <link rel="stylesheet" href="sharedquery2.css">
   <script src="loadheader.js" defer></script>
</head>
<body>
<div id="header-placeholder"></div>
<div class="query-table">
   <div class="product-display">
   <h1>Total Investment done till date </h1>
      <table class="product-display-table">
         <thead>
         <tr>
            <th>Total Investment</th>
         </tr>
         </thead>
         <tbody>
         <tr>
            <td><?php echo $total_investment !== null ? $total_investment : 0; ?></td>
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
