<?php
$conn = mysqli_connect('localhost', 'root', '', 'muhammad_bsse4_a_finalproject');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query to get total expenditure done till date
$sql_total_expenditure = "
SELECT 
    SUM(amount) AS TotalExpenditure
FROM 
    expenditure;
";

$result_total_expenditure = mysqli_query($conn, $sql_total_expenditure);
$row_total_expenditure = mysqli_fetch_assoc($result_total_expenditure);
$total_expenditure = $row_total_expenditure['TotalExpenditure'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <title>Query 19</title>
   <link rel="stylesheet" href="sharedquery2.css">
   <script src="loadheader.js" defer></script>
</head>
<body>
<div id="header-placeholder"></div>
<div class="query-table">
   <div class="product-display">
      <h1>Total Expenditure Done Till Date</h1>
      <table class="product-display-table">
         <thead>
         <tr>
            <th>Total Expenditure</th>
         </tr>
         </thead>
         <tbody>
         <tr>
            <td><?php echo $total_expenditure !== null ? $total_expenditure : 0; ?></td>
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
