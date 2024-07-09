<?php
$conn = mysqli_connect('localhost', 'root', '', 'muhammad_bsse4_a_finalproject');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$customerSearch = '';

if (isset($_POST['customer_search'])) {
    $customerSearch = $_POST['customer_search'];
}

$sql = "
SELECT 
    c.CustomerID,
    c.firstname,
    c.lastname,
    IFNULL(SUM(s.Sellingprice), 0) AS TotalPurchases,
    IFNULL((SELECT SUM(p.paymentamount) FROM payment p WHERE p.CustomerID = c.CustomerID), 0) AS TotalPayments,
    IFNULL(SUM(s.Sellingprice), 0) - IFNULL((SELECT SUM(p.paymentamount) FROM payment p WHERE p.CustomerID = c.CustomerID), 0) AS RemainingAmount
FROM 
    customer c
LEFT JOIN 
    sell s ON c.CustomerID = s.CustomerID
WHERE 
    c.CustomerID LIKE '$customerSearch%' OR
    c.firstname LIKE '$customerSearch%' OR
    c.lastname LIKE '$customerSearch%'
GROUP BY 
    c.CustomerID, c.firstname, c.lastname
ORDER BY 
    c.CustomerID;
";
// c.firstname, c.lastname;
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <title>Query 14</title>
   <link rel="stylesheet" href="sharedquery2.css">
   <script src="loadheader.js" defer></script>
</head>
<body>
<div id="header-placeholder"></div>
<div class="query-table">
<div class="admin-product-form-container">
   <form method="post" class="customer-search-form">
 
      <input type="text" class='box' name="customer_search" placeholder="Enter Customer ID or Name" value="<?php echo ($customerSearch); ?>" required>
      <input type="submit" class='btn' value="Search">
   </form>
</div>
   <div class="product-display">
   <h1>The remaining amount of individual customers.</h1>
      <table class="product-display-table">
         <thead>
         <tr>
            <th>Customer ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Total Purchases</th>
            <th>Total Payments</th>
            <th>Remaining Amount</th>
         </tr>
         </thead>
         <tbody>
         <?php if (mysqli_num_rows($result) > 0) {
             while($row = mysqli_fetch_assoc($result)) { ?>
         <tr>
            <td><?php echo $row['CustomerID']; ?></td>
            <td><?php echo $row['firstname']; ?></td>
            <td><?php echo $row['lastname']; ?></td>
            <td><?php echo $row['TotalPurchases']; ?></td>
            <td><?php echo $row['TotalPayments']; ?></td>
            <td><?php echo $row['RemainingAmount']; ?></td>
         </tr>
         <?php } } else { ?>
         <tr>
            <td colspan="6">No customer data found.</td>
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
