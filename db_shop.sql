-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2017 at 10:12 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminPass` varchar(32) NOT NULL,
  `lebel` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `adminName`, `adminUser`, `adminEmail`, `adminPass`, `lebel`) VALUES
(1, 'khaled mahmud', 'khaled', 'khaled@gmail.com', '202cb962ac59075b964b07152d234b70', 0);

-- --------------------------------------------------------

--
-- Table structure for table `attend`
--

CREATE TABLE `attend` (
  `aId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `roll` varchar(255) NOT NULL DEFAULT '0',
  `attend` varchar(255) DEFAULT NULL,
  `att_date` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attend`
--

INSERT INTO `attend` (`aId`, `userId`, `name`, `roll`, `attend`, `att_date`) VALUES
(26, 8, 'gdfg', '00125', 'present', '2017-04-25'),
(25, 5, 'fe', '00123', 'present', '2017-04-05'),
(24, 7, 'hfh', '00124', 'absent', '2017-04-05'),
(23, 8, 'gdfg', '00125', 'present', '2017-04-05'),
(22, 5, 'fe', '00123', 'present', '2017-04-13'),
(21, 7, 'hfh', '00124', 'absent', '2017-04-13'),
(20, 8, 'gdfg', '00125', 'present', '2017-04-13'),
(19, 5, 'fe', '00123', 'present', '2017-04-03'),
(18, 7, 'hfh', '00124', 'present', '2017-04-03'),
(17, 8, 'gdfg', '00125', 'absent', '2017-04-03'),
(27, 7, 'hfh', '00124', 'present', '2017-04-25'),
(28, 5, 'fe', '00123', 'present', '2017-04-25');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brandId`, `brandName`) VALUES
(1, 'Acer'),
(2, 'Samsung');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartId` int(11) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartId`, `sId`, `productId`, `productName`, `price`, `quantity`, `image`) VALUES
(15, '99oggd3pvsl886jisefev5fkl4', 1, 'Camera mine', 500, 1, 'upload/aef0b028a9.png'),
(2, 'sqot298tvtid139p05u3fv94q3', 3, 'flower', 90, 5, 'upload/ac235ac821.png'),
(16, '29l72c8k97rcv10p6da9gkna24', 1, 'Camera mine', 500, 1, 'upload/aef0b028a9.png'),
(40, 'nto3b7c0gjoa0scss2pgofc2l2', 3, 'flower', 90, 1, 'upload/ac235ac821.png'),
(45, 'oo8klsag1596ir0inguvnidv43', 3, 'flower', 90, 1, 'upload/ac235ac821.png'),
(46, 'domqcea96b6mpp32hklfg00p15', 4, 'samsun225', 4000, 1, 'upload/d797f7b6b6.jpg'),
(47, 'domqcea96b6mpp32hklfg00p15', 3, 'flower', 90, 1, 'upload/ac235ac821.png'),
(48, 'mkplpm75muus08ope60s9r7l27', 4, 'samsun225', 4000, 1, 'upload/d797f7b6b6.jpg'),
(49, '5bu9sdbmgdlmm6bsqdel6qc053', 4, 'samsun225', 4000, 1, 'upload/d797f7b6b6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catId`, `catName`) VALUES
(1, 'Desktop'),
(2, 'Laptop'),
(3, 'Mobile Phone'),
(5, 'tablet'),
(6, 'cloths'),
(7, 'home');

-- --------------------------------------------------------

--
-- Table structure for table `compare`
--

CREATE TABLE `compare` (
  `comId` int(11) NOT NULL,
  `cusId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` int(10) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contactid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobileNo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contactid`, `name`, `mobileNo`, `email`, `body`, `status`, `date`) VALUES
(1, 'khaled', 'mahmud', 'ss@c.com', 'bbbbb', 1, '2017-02-13 11:28:07'),
(5, 'mojjamel', 'haque', 'dnight950@gmail.com', 'iiuuuuuuuuuuuuuuuuuu\r\nkkkkkkkkkkkkk', 0, '2017-02-13 18:13:36'),
(4, 'salauddin', 'rahman', 'kh@d.co', 'fdfdsagdfgdfg dfdafgsd dfgadfg', 1, '2017-02-13 17:50:39'),
(6, 'md khaled', '8976867', 'kh@d.co', 'yygbyhhb', 0, '2017-03-03 02:37:18');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `zip` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `address`, `city`, `district`, `zip`, `phone`, `email`, `password`) VALUES
(1, 'kld', 'address', 'city', 'district', 'zip', 'phone', 'email', '123'),
(2, 'sha', 'sirajgong', 'comilla', 'bangladesh', '22', '016712245656', 'shawon@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `cus_order`
--

CREATE TABLE `cus_order` (
  `orderId` int(11) NOT NULL,
  `cusId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cus_order`
--

INSERT INTO `cus_order` (`orderId`, `cusId`, `productId`, `productName`, `quantity`, `price`, `image`, `date`, `status`) VALUES
(19, 2, 4, 'samsun225', 1, 4000, 'upload/d797f7b6b6.jpg', '2017-02-08 15:17:10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `catId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `body` text NOT NULL,
  `price` float NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `productName`, `catId`, `brandId`, `body`, `price`, `image`, `type`) VALUES
(1, 'Camera mine', 7, 1, '<p>vb cbcb</p>', 500, 'upload/aef0b028a9.png', 0),
(2, 'mmmmmmmmmm', 7, 2, '<p>nngdgd dhdhd&nbsp; amabaretd afswwatgd?</p>', 400, 'upload/f1904a7823.jpg', 1),
(3, 'flower', 7, 1, '<p>bafhjasfkafjaf;ufefjk f fjsfshfkfljffoieffhvvha;lfqpf f hjfjh jahf&nbsp; fhfhsf ffjfhffhffsf f fshfsafas ffhsa</p>\r\n<p>fajfjsafjfafadfhhgdfvdfv;dfk;h</p>\r\n<p>&nbsp;kafjflafl</p>\r\n<p>bafhjasfkafjaf;ufefjk f fjsfshfkfljffoieffhvvha;lfqpf f hjfjh jahf&nbsp; fhfhsf ffjfhffhffsf f fshfsafas ffhsa</p>\r\n<p>fajfjsafjfafadfhhgdfvdfv;dfk;h</p>\r\n<p>&nbsp;kafjflafl</p>', 90, 'upload/ac235ac821.png', 1),
(4, 'samsun225', 3, 2, '<p>shfslkfjadshfas f asfsad &gt;</p>', 4000, 'upload/d797f7b6b6.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `employeeid` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `typeofuser` varchar(255) DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `name`, `employeeid`, `address`, `city`, `country`, `zip`, `phone`, `email`, `password`, `typeofuser`, `role`) VALUES
(1, 'khaled', NULL, 'bi-baria,dkhaka', 'dhaka', 'bangladesh', '20-d', '6475675474', 'Khaled@gmail.com', '7090e33ca1bd2d705bd9f47ae741cb74', 'General', 1),
(2, 'shawon', NULL, 'sirajgong', 'comilla', 'bangladesh', '22', '016712245656', 'shawon@gmail.com', '202cb962ac59075b964b07152d234b70', 'General', 1),
(3, 'khaled', NULL, '&lt;p&gt;dhaka, bangladesh&lt;/p&gt;', '', '', '', '', 'mahmud@gmail.com', '202cb962ac59075b964b07152d234b70', 'admin', 0),
(5, 'fe', '00123', '&lt;p&gt;b-baria&lt;/p&gt;', NULL, NULL, NULL, NULL, 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 'admin', 2),
(7, 'hfh', '00124', NULL, NULL, NULL, NULL, NULL, 'abc@g.com', '202cb962ac59075b964b07152d234b70', 'fghf', 3),
(8, 'gdfg', '00125', NULL, NULL, NULL, NULL, NULL, 'ab@g.v', '202cb962ac59075b964b07152d234b70', 'dfgd', 2);

-- --------------------------------------------------------

--
-- Table structure for table `wlist`
--

CREATE TABLE `wlist` (
  `wId` int(11) NOT NULL,
  `cusId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `attend`
--
ALTER TABLE `attend`
  ADD PRIMARY KEY (`aId`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `compare`
--
ALTER TABLE `compare`
  ADD PRIMARY KEY (`comId`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contactid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cus_order`
--
ALTER TABLE `cus_order`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `wlist`
--
ALTER TABLE `wlist`
  ADD PRIMARY KEY (`wId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `attend`
--
ALTER TABLE `attend`
  MODIFY `aId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `compare`
--
ALTER TABLE `compare`
  MODIFY `comId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contactid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cus_order`
--
ALTER TABLE `cus_order`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `wlist`
--
ALTER TABLE `wlist`
  MODIFY `wId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
