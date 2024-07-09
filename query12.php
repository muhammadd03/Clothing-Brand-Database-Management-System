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
    p.PurchaseID AS PurchaseID, 
    b.Brandname, 
    s.Suppliername, 
    p.No_ofSuitsPurchased AS NoOfSuitsPurchased, 
    p.totalamountpaid AS TotalAmountPaid, 
    p.dateofpurchase AS DateOfPurchase
FROM 
    purchase p
JOIN 
    brand b ON p.Brandname = b.BrandID
JOIN 
    supplier s ON p.Suppliername = s.SupplierID
WHERE 
    p.dateofpurchase BETWEEN '$startDate' AND '$endDate'
ORDER BY 
    p.dateofpurchase DESC;
";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <title>Query 12</title>
   <link rel="stylesheet" href="sharedquery2.css">
   <script src="loadheader.js" defer></script>
</head>
<body>
<div id="header-placeholder"></div>
<div class="query-table">
<div class="admin-product-form-container">
   <form method="post" class="date-range-form">

      <input type="date" class='box' name="start_date" value="<?php echo ($startDate); ?>" required>
   
      <input type="date" class='box' name="end_date" value="<?php echo ($endDate); ?>" required>
      <input type='submit' class='btn'>
   </form>
</div>
   <div class="product-display">
      <h1>List and details of all the purchase done between two dates.</h1>
      <table class="product-display-table">
         <thead>
         <tr>
            <th>Purchase ID</th>
            <th>Brand Name</th>
            <th>Supplier Name</th>
            <th>Number of Suits Purchased</th>
            <th>Total Amount Paid</th>
            <th>Date of Purchase</th>
         </tr>
         </thead>
         <tbody>
         <?php if (mysqli_num_rows($result) > 0) {
             while($row = mysqli_fetch_assoc($result)) { ?>
         <tr>
            <td><?php echo $row['PurchaseID']; ?></td>
            <td><?php echo $row['Brandname']; ?></td>
            <td><?php echo $row['Suppliername']; ?></td>
            <td><?php echo $row['NoOfSuitsPurchased']; ?></td>
            <td><?php echo $row['TotalAmountPaid']; ?></td>
            <td><?php echo $row['DateOfPurchase']; ?></td>
         </tr>
         <?php } } else { ?>
         <tr>
            <td colspan="6">No purchase data found for the selected date range.</td>
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
