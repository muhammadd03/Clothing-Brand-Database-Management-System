<?php
$conn = mysqli_connect('localhost', 'root', '', 'muhammad_bsse4_a_finalproject');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$search = '';
if (isset($_POST['search'])) {
    $search = $_POST['search'];
}

$sql = "
SELECT 
    c.CustomerID, 
    c.firstname, 
    c.lastname, 
    s.ProductID, 
    b.Brandname,
    s.dateofpurchase 
FROM 
    customer c
JOIN 
    sell s ON c.CustomerID = s.CustomerID
JOIN 
    product p ON s.ProductID = p.productID
JOIN 
    brand b ON p.Brandname = b.BrandID
WHERE 
    CONCAT(c.FirstName, ' ', c.LastName) LIKE '$search%'
ORDER BY 
    c.CustomerID, s.DateOfPurchase;
";

$select = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <title>Query 5</title>
   <link rel="stylesheet" href="sharedquery2.css">
   <script src="loadheader.js" defer></script>
</head>
<body>
<div id="header-placeholder"></div>
<?php

?>

<div class="query-table">

<div class="admin-product-form-container">
<h1>List of the all the customers with details of their purchase i.e. all the products purchased with name search funtionality</h1>
   <form method="post" class="search-form">
      <input type="text" class='box' name="search" placeholder="Search by customer name" value="<?php echo ($search); ?>">
      <input type="submit" class="btn" >
   </form>
</div>

   <div class="product-display">
      <table class="product-display-table">
         <thead>
         <tr>
            <th>Customer ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Product ID</th>
            <th>Brand</th>
            <th>Date Of Purchase</th>
         </tr>
         </thead>
         <?php while ($row = mysqli_fetch_assoc($select)) { ?>
         <tr>
            <td><?php echo $row['CustomerID']; ?></td>
            <td><?php echo $row['firstname']; ?></td>
            <td><?php echo $row['lastname']; ?></td>
            <td><?php echo $row['ProductID']; ?></td>
            <td><?php echo $row['Brandname']; ?></td>
            <td><?php echo $row['dateofpurchase']; ?></td>
         </tr>
         <?php } ?>
      </table>
   </div>
</div>
</body>
</html>
