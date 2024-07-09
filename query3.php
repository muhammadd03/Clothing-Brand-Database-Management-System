<?php
$conn = mysqli_connect('localhost', 'root', '', 'muhammad_bsse4_a_finalproject');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Initialize search variable
$search = '';

if (isset($_GET['search'])) {
    $search = $_GET['search'];
}

// SQL Query with search functionality
$sql = "
SELECT 
    c.CustomerID,
    c.firstname AS CustomerFirstName,
    c.lastname AS CustomerLastName,
    COUNT(s.ProductID) AS NumberOfSuits,
    SUM(s.Sellingprice) AS TotalCost,
    IFNULL(SUM(p.paymentamount), 0) AS TotalAmountPaid,
    (SUM(s.Sellingprice) - IFNULL(SUM(p.paymentamount), 0)) AS RemainingAmount
FROM 
    customer c
LEFT JOIN 
    sell s ON c.CustomerID = s.CustomerID
LEFT JOIN 
    payment p ON c.CustomerID = p.CustomerID
WHERE 
    c.firstname LIKE '$search%' OR c.lastname LIKE '$search%'
GROUP BY 
    c.CustomerID, c.firstname, c.lastname;
";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <title>Query 3</title>
     <link rel="stylesheet" href="sharedquery2.css">
     <script src="loadheader.js" defer></script>
</head>
<body>
<div id="header-placeholder"></div>
<?php
?>

<div class="query-table">

<div class="admin-product-form-container">
<h1>List of all the customers with details of Numbers of suits they have bought, total cost of
purchased suits ,the total amount they have paid and the total amount that is left with name search functionality</h1>
        
    <form action="" method="GET">
        <input type="text" name="search" class="box" placeholder="Search by Customer Name" value="<?php echo htmlspecialchars($search); ?>">
        <input type="submit" class="btn" >
    </form>

</div>

<div class="product-display">
    <table class="product-display-table">
    <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Number Of Suits</th>
                <th>Total Amount</th>
                <th>Paid Amount</th>
                <th>Remaining Amount</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                    <td>{$row['CustomerFirstName']}</td>
                    <td>{$row['CustomerLastName']}</td>
                    <td>{$row['NumberOfSuits']}</td>
                    <td>{$row['TotalCost']}</td>
                    <td>{$row['TotalAmountPaid']}</td>
                    <td>{$row['RemainingAmount']}</td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No results found</td></tr>";
        }
        ?>
        </tbody>
    </table>
</div>
    </div>
</body>
</html>

<?php
mysqli_close($conn);
?>
