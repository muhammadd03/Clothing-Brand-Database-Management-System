<?php
$conn = mysqli_connect('localhost', 'root', '', 'muhammad_bsse4_a_finalproject');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$startDate = '';
$endDate = '';

if (isset($_POST['start_date']) && isset($_POST['end_date'])) {
    $startDate = $_POST['start_date'];
    $endDate = $_POST['end_date'];
}

$sql = "
SELECT 
    SUM(p.paymentamount) AS TotalReceivedAmount
FROM 
    payment p
WHERE 
    p.paymentdate BETWEEN '$startDate' AND '$endDate';
";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <title>Query 9</title>
   <link rel="stylesheet" href="sharedquery2.css">
   <script src="loadheader.js" defer></script>
</head>
<body>
<div id="header-placeholder"></div>
<div class="query-table">
<div class="admin-product-form-container">
<h1>Total received amounts between two dates.</h1>   
   <form method="post" class="date-range-form">
   
      <input type="date" class='box' name="start_date" value="<?php echo ($startDate); ?>" required>
      
      <input type="date" class='box' name="end_date" value="<?php echo ($endDate); ?>" required>

      <input type="submit" class='btn'>
      
   </form>
</div>
   <div class="product-display">
     
      <table class="product-display-table">
         <thead>
         <tr>
            <th>Total Received Amount</th>
         </tr>
         </thead>
         <tbody>
         <?php if ($row) { ?>
         <tr>
            <td><?php echo $row['TotalReceivedAmount'] !== null ? $row['TotalReceivedAmount'] : 0; ?></td>
         </tr>
         <?php } else { ?>
         <tr>
            <td>No results found for the selected date range.</td>
         </tr>
         <?php } ?>
         </tbody>
      </table>
   </div>
</div>

</body>
</html>
