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
    p.paymentdate, 
    p.paymentamount 
FROM 
    customer c
JOIN 
    payment p ON c.CustomerID = p.CustomerID
WHERE 
    CONCAT(c.firstname, ' ', c.lastname) LIKE '$search%'
ORDER BY 
    p.paymentdate;
";

$select = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <title>Query 6</title>
   <link rel="stylesheet" href="sharedquery2.css">
   <script src="loadheader.js" defer></script>
</head>
<body>
<div id="header-placeholder"></div>
<?php
if (isset($message)) {
   foreach ($message as $message) {
      echo '<span class="message">'.$message.'</span>';
   }
}
?>

<div class="query-table">
<div class="admin-product-form-container">
<h1>Date wise Details of all the installments/payments done by a single customer.</h1>
   <form method="post" class="search-form">
      <input type="text" name="search" class='box' placeholder="Search by customer name" value="<?php echo ($search); ?>">
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
            <th>Payment Date</th>
            <th>Payment Amount</th>
         </tr>
         </thead>
         <?php while ($row = mysqli_fetch_assoc($select)) { ?>
         <tr>
            <td><?php echo $row['CustomerID']; ?></td>
            <td><?php echo $row['firstname']; ?></td>
            <td><?php echo $row['lastname']; ?></td>
            <td><?php echo $row['paymentdate']; ?></td>
            <td><?php echo $row['paymentamount']; ?></td>
         </tr>
         <?php } ?>
      </table>
   </div>
</div>
</body>
</html>
