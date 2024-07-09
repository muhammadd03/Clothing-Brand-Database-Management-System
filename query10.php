<?php
$conn = mysqli_connect('localhost', 'root', '', 'muhammad_bsse4_a_finalproject');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "
SELECT 
    SUM(p.totalamountpaid) AS TotalPurchaseAmount
FROM 
    purchase p;
";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <title>Query 10</title>
   <link rel="stylesheet" href="sharedquery2.css">
   <script src="loadheader.js" defer></script>
</head>
<body>
<div id="header-placeholder"></div>
<div class="query-table">
   <div class="product-display">
      
      <table class="product-display-table">
      <h1>Total Purchase amount done so far.</h1>
         <thead>
         <tr>
            <th>Total Purchase Amount</th>
         </tr>
         </thead>
         <tbody>
         <?php if ($row) { ?>
         <tr>
            <td><?php echo $row['TotalPurchaseAmount'] !== null ? $row['TotalPurchaseAmount'] : 0; ?></td>
         </tr>
         <?php } else { ?>
         <tr>
            <td>No purchase data found.</td>
         </tr>
         <?php } ?>
         </tbody>
      </table>
   </div>
</div>

</body>
</html>
