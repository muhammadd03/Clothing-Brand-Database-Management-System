-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2024 at 08:39 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `muhammad_bsse4_a_finalproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `BrandID` int(11) NOT NULL,
  `brandname` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL CHECK (`contact` regexp '^03[0-9]{9}$')
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`BrandID`, `brandname`, `contact`) VALUES
(2, 'Zara', '03123367890'),
(3, 'Khaadi', '03379670772'),
(6, 'GulAhmed', '03339646432'),
(7, 'Alkaram', '03123456789'),
(8, 'Nike', '03359969567'),
(9, 'UnderArmour', '03359969567'),
(10, 'Addidas', '03123123456'),
(12, 'CAT', '03124567839'),
(13, 'TriThreads', '03388977664'),
(17, 'Puma', '03355688996'),
(18, 'Versace', '03355688969'),
(19, 'Flexshop', '03355688996');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerID` int(4) NOT NULL,
  `firstname` varchar(500) NOT NULL,
  `lastname` varchar(500) NOT NULL,
  `email` varchar(100) NOT NULL CHECK (`email` regexp '^[a-zA-Z0-9]+@[a-zA-Z]+.(com)$'),
  `phone` varchar(20) NOT NULL CHECK (`phone` regexp '^03[0-9]{9}$'),
  `address` varchar(200) NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `datejoined` date DEFAULT curdate(),
  `remarks` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerID`, `firstname`, `lastname`, `email`, `phone`, `address`, `gender`, `datejoined`, `remarks`) VALUES
(2, 'jameel', 'Khan', 'jamkhan003@gmail.com', '03366689977', 'Phase3', 'male', '2024-05-19', 'Verygood'),
(4, 'Hassan', 'Khan', 'hassan003@gmail.com', '03344566778', 'Phase3', 'male', '2024-05-19', 'Verygood'),
(5, 'Saud', 'Afridi', 'saudafridi@gmail.com', '03399877664', 'Bara', 'male', '2024-05-19', 'Verygood'),
(6, 'Hamza', 'Ali', 'hamzaali90@gmail.com', '03255677443', 'Tahkal', 'male', '2024-05-19', 'Excellent'),
(7, 'Yahya', 'Shah', 'ytakur89@gmail.com', '03399876675', 'Saddar', 'male', '2024-05-19', 'Excellent'),
(8, 'Faisal', 'Abbas', 'faisalabbas34@gmail.com', '03399877889', 'Gulbahar', 'male', '2024-05-19', 'best'),
(9, 'Hilal', 'Ahmed', 'hilalahmed45@gmail.com', '03377655443', 'Police Colony', 'male', '2024-05-19', 'Best'),
(10, 'Sayed', 'Shabir', 'solo7@gmail.com', '03366544773', 'Phase2', 'male', '2024-05-19', 'Excellent'),
(11, 'Anas', 'Sohail', 'amassohail03@gmail.com', '03344788664', 'Hayatabad', 'male', '2024-05-19', 'Verygood'),
(12, 'Ahsan', 'Mustafa', 'ahsanmustafa09@gmail.com', '03344788996', 'Phase2', 'male', '2024-05-19', 'Excellent'),
(13, 'Sannan', 'Ahmed', 'sannanahmed45@gmail.com', '03399877665', 'Phase4', 'male', '2024-05-19', 'Verygood'),
(14, 'Sarah', 'Nowshid', 'sarahnowshid@gmail.com', '03399877665', 'Phase7', 'female', '2024-05-18', 'Excellent'),
(15, 'Maham', 'Gul', 'mahamgul89@gmail.com', '03398844645', 'Phase6', 'female', '2024-05-17', 'Verygood'),
(16, 'Amna', 'Muhammad', 'amnamuhammad@gmail.com', '03399788664', 'Phase3', 'female', '2024-05-16', 'Verygood'),
(17, 'Farishta', 'Khan', 'farishtakhan@gmail.com', '03344788665', 'Police Colony', 'female', '2024-05-20', 'Verygood'),
(18, 'Abdullah', 'Ahmed', 'syedmiqdadahmad911@gmail.com', '03387762001', '4-a/35 shafi build', 'male', '2000-09-11', 'hello howz u ?'),
(22, 'farasha', 'yahya', 'fari@gmail.com', '03407018885', 'sdfghj', 'male', '2024-06-05', 'beautiful');

-- --------------------------------------------------------

--
-- Table structure for table `expenditure`
--

CREATE TABLE `expenditure` (
  `ExpenditureID` int(11) NOT NULL,
  `expdate` date NOT NULL,
  `amount` int(10) NOT NULL,
  `remarks` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expenditure`
--

INSERT INTO `expenditure` (`ExpenditureID`, `expdate`, `amount`, `remarks`) VALUES
(1, '2024-05-24', 800, 'Good Better Bestest'),
(2, '2024-05-26', 700, 'Excellent'),
(4, '2024-04-07', 600, 'Excellent'),
(5, '2024-04-14', 450, 'Excellent'),
(6, '2024-04-03', 1000, 'Best'),
(7, '2024-05-29', 651, 'Good');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `CustomerID` int(11) DEFAULT NULL,
  `paymentdate` date NOT NULL,
  `paymentamount` int(10) DEFAULT NULL CHECK (`paymentamount` > 0),
  `PaymentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`CustomerID`, `paymentdate`, `paymentamount`, `PaymentID`) VALUES
(2, '2024-05-24', 1001, 1),
(4, '2024-05-21', 500, 2),
(5, '2024-05-20', 1000, 3),
(6, '2024-05-19', 500, 4);

--
-- Triggers `payment`
--
DELIMITER $$
CREATE TRIGGER `before_payment_insert` BEFORE INSERT ON `payment` FOR EACH ROW BEGIN
    DECLARE purchase_count INT;

    SELECT COUNT(*) INTO purchase_count
    FROM purchase
    WHERE CustomerID = NEW.CustomerID;

    IF purchase_count = 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Customer has not made any purchases, therefore cannot make a payment.';
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_payment_insert_check` BEFORE INSERT ON `payment` FOR EACH ROW BEGIN
    DECLARE totalamountpaid DECIMAL(10, 2);
    DECLARE total_owed DECIMAL(10, 2);

    -- Calculate the total amount paid by the customer
    SELECT IFNULL(SUM(paymentamount), 0) INTO totalamountpaid
    FROM payments
    WHERE CustomerID = NEW.CustomerID;

    -- Calculate the total amount owed by the customer
    SELECT IFNULL(SUM(totalamountpaid), 0) INTO total_owed
    FROM purchase
    WHERE CustomerID = NEW.CustomerID;

    -- Check if the new payment would exceed the total amount owed
    IF (totalamountpaid + NEW.paymentamount) > total_owed THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Payment amount exceeds the remaining amount owed by the customer.';
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `check_paymentdate` BEFORE INSERT ON `payment` FOR EACH ROW BEGIN
    IF NEW.paymentdate IS NULL OR NEW.paymentdate > CURDATE() THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Payment date must be a valid date and cannot be in the future';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` int(11) NOT NULL,
  `Brandname` int(11) DEFAULT NULL,
  `category` enum('Stiched','Unstiched') NOT NULL,
  `buyingprice` int(10) DEFAULT NULL CHECK (`buyingprice` > 0 and `buyingprice` < 20000),
  `fabricmaterial` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `Suppliername` int(11) DEFAULT NULL,
  `product_description` text DEFAULT NULL,
  `product_type` enum('Plain','Designed','Embroidered') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `Brandname`, `category`, `buyingprice`, `fabricmaterial`, `color`, `Suppliername`, `product_description`, `product_type`) VALUES
(6, 12, 'Stiched', 1000, 'Cotton', 'Red', 2, 'Very Good', 'Plain'),
(7, 2, 'Stiched', 1000, 'Cotton', 'Black', 1, 'Good Better Best', 'Plain'),
(9, 3, 'Unstiched', 1000, 'Cotton', 'Black', 3, 'Good', 'Designed'),
(10, 2, 'Unstiched', 1000, 'Cotton', 'Black', 3, 'Very Good', 'Designed'),
(13, 3, 'Stiched', 1000, 'Cotton', 'Yellow', 2, 'Good', 'Designed'),
(14, 12, 'Unstiched', 1000, 'Cotton', 'Yellow', 1, 'Good', 'Embroidered');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `PurchaseID` int(11) NOT NULL,
  `Brandname` int(11) DEFAULT NULL,
  `Suppliername` int(11) DEFAULT NULL,
  `No_ofSuitsPurchased` int(11) DEFAULT NULL CHECK (`No_ofSuitsPurchased` > 0),
  `totalamountpaid` double NOT NULL,
  `DateOfPurchase` date NOT NULL,
  `CustomerID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`PurchaseID`, `Brandname`, `Suppliername`, `No_ofSuitsPurchased`, `totalamountpaid`, `DateOfPurchase`, `CustomerID`) VALUES
(2, 2, 2, 2, 1000, '2024-05-25', 2),
(3, 3, 3, 2, 500, '2024-05-22', 4),
(5, 6, 4, 2, 1000, '2024-05-29', 5),
(6, 8, 4, 2, 500, '2024-05-29', 6),
(8, 2, 2, 1, 1500, '2024-06-01', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sell`
--

CREATE TABLE `sell` (
  `CustomerID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `sellingprice` int(10) DEFAULT NULL,
  `dateofpurchase` date NOT NULL,
  `SellID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sell`
--

INSERT INTO `sell` (`CustomerID`, `ProductID`, `sellingprice`, `dateofpurchase`, `SellID`) VALUES
(2, 7, 2500, '2024-05-24', 1),
(5, 6, 2500, '2024-05-01', 2),
(2, 9, 2000, '2024-06-01', 4),
(4, 10, 2000, '2024-06-01', 5),
(6, 13, 5000, '2024-06-01', 8);

--
-- Triggers `sell`
--
DELIMITER $$
CREATE TRIGGER `check_sellingprice_insert` BEFORE INSERT ON `sell` FOR EACH ROW BEGIN
    DECLARE buying_price INT;

    -- Get the buying price from the product table
    SELECT buyingprice INTO buying_price
    FROM product
    WHERE ProductID = NEW.ProductID;

    -- Check if the selling price is greater than the buying price
    IF NEW.sellingprice <= buying_price THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Selling price must be greater than buying price.';
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `check_sellingprice_update` BEFORE UPDATE ON `sell` FOR EACH ROW BEGIN
    DECLARE buying_price INT;

    -- Get the buying price from the product table
    SELECT buyingprice INTO buying_price
    FROM product
    WHERE ProductID = NEW.ProductID;

    -- Check if the selling price is greater than the buying price
    IF NEW.sellingprice <= buying_price THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Selling price must be greater than buying price.';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `SupplierID` int(11) NOT NULL,
  `suppliername` varchar(50) NOT NULL,
  `supplierlocation` varchar(100) NOT NULL,
  `suppliercontact` varchar(20) NOT NULL CHECK (`suppliercontact` regexp '^03[0-9]{9}$')
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`SupplierID`, `suppliername`, `supplierlocation`, `suppliercontact`) VALUES
(1, 'Jameel Ahmad', 'Tajabad', '03355677885'),
(2, 'Jameel Sherzad', 'Tajabad', '03399877665'),
(3, 'Sayed Shabir', 'Phase2', '03399877556'),
(4, 'Syed Muhammad Hashir', 'Hangu', '03344566786'),
(5, 'Sayed Sahbir', 'Laghman', '03355687834'),
(6, 'Haneef Ahmad', 'Hangu', '03345678994');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`BrandID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `expenditure`
--
ALTER TABLE `expenditure`
  ADD PRIMARY KEY (`ExpenditureID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PaymentID`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `Brandname` (`Brandname`),
  ADD KEY `Suppliername` (`Suppliername`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`PurchaseID`),
  ADD KEY `Brandname` (`Brandname`),
  ADD KEY `Suppliername` (`Suppliername`);

--
-- Indexes for table `sell`
--
ALTER TABLE `sell`
  ADD PRIMARY KEY (`SellID`),
  ADD KEY `ProductID` (`ProductID`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`SupplierID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `BrandID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `expenditure`
--
ALTER TABLE `expenditure`
  MODIFY `ExpenditureID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `PaymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `PurchaseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sell`
--
ALTER TABLE `sell`
  MODIFY `SellID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `SupplierID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `fk_customer_payment` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`),
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`Brandname`) REFERENCES `brand` (`BrandID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`Suppliername`) REFERENCES `supplier` (`SupplierID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `purchase_ibfk_1` FOREIGN KEY (`Brandname`) REFERENCES `brand` (`BrandID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchase_ibfk_2` FOREIGN KEY (`Suppliername`) REFERENCES `supplier` (`SupplierID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sell`
--
ALTER TABLE `sell`
  ADD CONSTRAINT `sell_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sell_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
