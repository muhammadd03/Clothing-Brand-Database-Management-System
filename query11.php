<?php
$conn = mysqli_connect('localhost', 'root', '', 'muhammad_bsse4_a_finalproject');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "
SELECT 
    p.PurchaseID AS PurchaseID, 
    b.Brandname, 
    s.Suppliername, 
    p.No_ofSuitsPurchased AS NoOfSuitsPurchased, 
    p.totalamountpaid AS TotalAmountPaid, 
    p.DateOfPurchase AS DateOfPurchase
FROM 
    purchase p
JOIN 
    brand b ON p.Brandname = b.BrandID
JOIN 
    supplier s ON p.Suppliername = s.SupplierID
ORDER BY 
    p.DateOfPurchase DESC;
";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <title>Query 11</title>
   <link rel="stylesheet" href="sharedquery2.css">
   <script src="loadheader.js" defer></script>
</head>
<body>
<div id="header-placeholder"></div>
<div class="query-table">
   <div class="product-display">

      <table class="product-display-table">
      <h1>List and details of all the purchase done.</h1>
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
            <td colspan="6">No purchase data found.</td>
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
