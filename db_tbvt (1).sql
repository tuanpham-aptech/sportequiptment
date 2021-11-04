-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2021 at 11:07 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tbvt`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(5) NOT NULL,
  `username` varchar(32) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `password` varchar(32) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `status`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 1);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(5) NOT NULL,
  `name` varchar(32) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `name`, `status`) VALUES
(1, 'RayBan', 1),
(2, 'Zakoban', 1),
(3, 'Adidas', 1),
(5, 'PAHAMA', 1),
(6, 'NIKITO', 1),
(7, 'BuKuHaRam', 1),
(8, 'Fuco', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(5) NOT NULL,
  `name` varchar(32) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `name`, `status`) VALUES
(1, 'Găng tay boxing', 1),
(2, 'Dụng cụ bảo vệ chân', 1),
(3, 'Trụ đấm ', 1),
(4, 'Côn nhị khúc ', 1),
(5, 'Mũ bảo vệ đầu', 1),
(6, 'Giáp bảo vệ ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(5) NOT NULL,
  `member_id` int(5) NOT NULL,
  `product_id` int(5) NOT NULL,
  `date` datetime NOT NULL,
  `content` tinytext COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `member_id`, `product_id`, `date`, `content`, `status`) VALUES
(1, 2, 4, '2021-08-04 23:22:10', 'Hoa trạng nguyên mua đích đấm nhẹ ', 0),
(2, 2, 2, '2021-08-04 23:24:27', 'Côn nhị khúc tôi cần video hướng dẫn sử dụng sản phẩm cảm ơn !!!', 0),
(3, 3, 5, '2021-08-04 23:26:49', 'Mũ va đập tốt mọi người nên mua ', 1),
(4, 3, 5, '2021-08-04 23:27:36', 'Nếu có nhiều hơn tôi sẽ ủng hộ shop!', 0),
(5, 4, 0, '2021-08-05 08:50:21', 'Hoa sinh sắc ', 0),
(6, 4, 2, '2021-08-05 09:32:58', 'Côn nhị khúc quang sắc', 1),
(7, 1, 4, '2021-08-05 09:36:11', 'Hoa Bình Minh Trắng Trong', 0),
(8, 1, 5, '2021-08-05 09:40:30', 'Mũ chất liệu sốp hay cao su dẻo ad?', 0);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `member_id` int(5) NOT NULL,
  `username` varchar(32) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `password` varchar(32) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `fullname` varchar(32) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `mobile` varchar(12) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `address` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(32) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `username`, `password`, `fullname`, `mobile`, `address`, `email`, `status`) VALUES
(2, 'tinh', 'd4d27bce5ab910a53c3abdeca59af6fe', 'Tỉnh Nguyễn ', '091337968', 'Thái Bình ', 'tinh1502@gmail.com', 1),
(3, 'loc', '25f9e794323b453885f5181f1b624d0b', 'Đỗ Bá Lộc ', '0864213221', 'Phong Hoá Thái Nguyên ', 'loclt1201@uneti.edu.vn', 1),
(7, 'tuan', '25d55ad283aa400af464c76d713c07ad', 'Phạm Tuân', '091337968', 'Yên Bái ', 'tuan.etc.764@apt.edu.vn', 1),
(8, 'thanh', '25d55ad283aa400af464c76d713c07ad', 'Phạm Thanh Nga ', '091337968', 'Thái Bình ', 'tinh1502@gmail.com', 1),
(37, 'Filipino for Grade 7 - Spiral Fi', '3', '', '47', '2013-2014', 'First', 1),
(38, 'English for Grade 7', '3', '', '47', '2013-2014', 'First', 1),
(39, 'Mathematics for Grade 7 - Spiral', '3', '', '47', '2013-2014', 'First', 0),
(40, 'Science for Grade 7', '3', '', '47', '2013-2014', 'First', 0),
(41, 'Telmo', 'fcea920f7412b5da7be0cf42b8c93759', 'Telmo', '47', 'Cộng hoà công gô ', 'telmo219@gmail.com', 1),
(42, 'Araling Panlipunan for Grade 7', '3', '', '47', '2013-2014', 'First', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`product_id`, `order_id`, `quantity`, `price`) VALUES
(1, 14, 1, 3200000),
(2, 14, 2, 210000),
(2, 15, 2, 210000),
(3, 15, 1, 1200000),
(4, 15, 1, 250000);

-- --------------------------------------------------------

--
-- Table structure for table `ordermethod`
--

CREATE TABLE `ordermethod` (
  `id` int(11) NOT NULL,
  `name` varchar(32) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `ordermethod`
--

INSERT INTO `ordermethod` (`id`, `name`, `status`) VALUES
(1, 'Trực tiếp cho người giao hàng ', 1),
(2, 'Chuyển khoản', 1),
(3, 'Thanh toán tại shop', 1),
(4, 'Paypal', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_method_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `orderdate` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1: Chưa xử lý; 2: Đang xử lý; 3: Đã xử lý; 4: Huỷ ',
  `name` varchar(25) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `address` varchar(32) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `mobile` varchar(10) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `note` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_method_id`, `member_id`, `orderdate`, `status`, `name`, `address`, `mobile`, `email`, `note`) VALUES
(14, 1, 7, '2021-11-04 16:12:59', 1, 'Phạm Tuân', 'Yên Bái ', '091337968', 'tuan.etc.764@apt.edu.vn', 'Hàng hậu mãi '),
(15, 3, 8, '2021-11-04 16:47:43', 1, 'Phạm Thanh Nga ', 'Hải dương', '091337968', 'thanhnga@gmail.com', 'Giao đúng hẹn nhé ');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(5) NOT NULL,
  `product_cat` int(5) NOT NULL,
  `product_brand` int(5) NOT NULL,
  `name` varchar(32) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `description` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `name`, `price`, `image`, `description`, `status`) VALUES
(1, 3, 8, 'Trụ đấm bốc cao su ', 3200000, '1635959674_trudamAX.jpg', 'Trụ đấm cao su hàng chất lượng cao giá cả hợp lý nhất hiện nay chỉ có tại cửa hàng Tuân Phạm \r\n', 1),
(2, 4, 2, 'Côn nhị khúc ', 210000, '1635959686_connhikhuclapgay.jpg', 'Côn nhị khúc giá mềm', 1),
(3, 6, 3, 'Bóng đàn hồi ', 1200000, 'bongdanhoi.jpg', 'Bóng đàn hồi giúp tăng độ phản xạ ', 1),
(4, 2, 2, 'Đích đấm ', 250000, 'dichdam.jpg', 'Đích đấm tăng cơ chân', 1),
(5, 5, 5, 'Mũ bảo vệ ', 900000, 'mubaove.jpg', 'Mũ bảo vệ giúp đầu khỏi chấn thương của đối thủ gây ra', 1),
(6, 5, 3, 'Trụ đấm ', 670000, '1627830030_dungcubaoho.jpg', '<p>Trụ đấm boxing l&agrave; loại bền nhất</p>\r\n', 1),
(8, 1, 1, 'Găng tay boxing T4', 120000000, '1628069310_gangtayTCL.jpg', '<p>Găng tay boxing c&ograve;n nhiều&nbsp; gi&aacute; trị&nbsp;</p>\r\n', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`product_id`,`order_id`);

--
-- Indexes for table `ordermethod`
--
ALTER TABLE `ordermethod`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `ordermethod`
--
ALTER TABLE `ordermethod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
