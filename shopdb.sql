-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2015 at 04:23 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shopdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `authority` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `block` tinyint(1) NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `login` datetime NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=32 ;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `username`, `email`, `password`, `fullname`, `phone`, `address`, `authority`, `block`, `url`, `login`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(26, 'admin', 'nt.quan1704@gmail.com', '$2y$10$x7wkEcNDozlspInw4qnR0egAKBOAh5x6Ymx9/jojBJEd7H9ui5l36', 'Nguyen Thanh Quan', '', '', 'admin', 0, 'img\\avatar\\user.jpg', '2015-05-21 01:58:18', '9VdJ8IBwEjn8nWit9SvbKyvYbz2Wkr6trsyxNXn33aNpaIo3IaYeqSllnUQt', '2015-05-20 04:47:14', '2015-05-20 18:58:18', '0000-00-00 00:00:00'),
(27, 'ntq170493', 'quan1704@gmail.com', '$2y$10$PNOW9RH7DWq8DTerziMH7OYEiEdlMmRsRBit5.OWyQrstU1tpChBG', 'Nguyen Thanh Quan', '', '', 'user', 0, 'img\\avatar\\user.jpg', '2015-05-20 11:05:14', NULL, '2015-05-20 04:47:14', '2015-05-20 04:47:14', '0000-00-00 00:00:00'),
(28, 'ddasda', 'asdasd@gmail.com', '$2y$10$XHJ9XqeXpBUXcRWqobRlMOGlGARGliFHpFbuzu39fUeYnsWwaiOKa', 'Nguyen Thanh Quan', '', '', 'user', 0, 'img\\avatar\\user.jpg', '2015-05-20 11:05:15', NULL, '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(29, 'dasdasd', 'nt.asdasdasd@gmail.com', '$2y$10$/H07/qiHMYlEfgS1CBXLluWUBWeya2.hzGtDrK4ht6pb/deby0Nnq', 'Nguyen Thanh Quan', '', '', 'user', 0, 'img\\avatar\\user.jpg', '2015-05-20 11:05:15', NULL, '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(30, 'asdasdad', 'nt.asdasdasd@gmail.com', '$2y$10$iSU9pfx9BdPBL.K9HBKQL.GSGhVAW2X4Pb9gAuOUZwz99jxDUwnkG', 'asdasdasdad', '', '', 'user', 0, 'img\\avatar\\user.jpg', '2015-05-20 11:05:15', NULL, '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(31, 'quantobu', 'ntq1231@gmail.com', '$2y$10$zjwZLDWeF9M3UEv61uj5NeKvXqS.sGtPf3oM9caHZwUhE17mDemBu', 'Nguyen Thanh Quan', '0904751868', 'adksdkasdjnasd', 'user', 0, 'img\\avatar\\user.jpg', '2015-05-21 01:30:56', 'Ex89cro4Gb9IPozsoDW1cK6bzwSUxqLIbTbebJsseC0DY5nyPyz646jGItlr', '2015-05-20 18:30:30', '2015-05-20 18:36:20', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE IF NOT EXISTS `authors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bio` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `bio`, `created_at`, `updated_at`) VALUES
(1, 'Nguyen Thanh Quan', 'Author!!!...', '2015-05-19 19:05:59', '2015-05-19 19:05:59'),
(2, 'Lam Hoang Vu', 'Author 2!!!...', '2015-05-19 19:05:59', '2015-05-19 19:05:59'),
(3, 'Do Pham Quang Tri', 'Author 3!!!...', '2015-05-19 19:05:59', '2015-05-19 19:05:59'),
(4, 'Pham Nguyen Thanh Cong', 'Author 4!...', '2015-05-19 19:05:59', '2015-05-19 19:05:59');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `brand` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=56 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `brand`, `url`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Sennheiser', 'img\\brand\\Sennheiser509.jpg', '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(47, 'Audio Technica', 'img\\brand\\Audio-Technica.jpg', '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(48, 'Bose', 'img\\brand\\logo-bose.jpg', '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(49, 'Philips', 'img\\brand\\Philips.jpg', '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(50, 'Apple', 'img\\brand\\Apple-logo4876.jpg', '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(51, 'Lehman Audio', 'img\\brand\\lehmannaudio_logo.gif', '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(52, 'Astelln Kern', 'img\\brand\\AstellnKern.gif', '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(53, 'Braven', 'img\\brand\\BRAVEN-logo5783.jpg', '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(54, 'NuForce', 'img\\brand\\Nuforce-K-1.jpg', '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(55, 'Shure', 'img\\brand\\shure-logo.gif', '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `category_type`
--

CREATE TABLE IF NOT EXISTS `category_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned NOT NULL,
  `type_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `category_type_category_id_index` (`category_id`),
  KEY `category_type_type_id_index` (`type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=90 ;

--
-- Dumping data for table `category_type`
--

INSERT INTO `category_type` (`id`, `category_id`, `type_id`, `created_at`, `updated_at`) VALUES
(76, 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, 47, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, 48, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, 48, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, 49, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(81, 49, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(82, 50, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, 50, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(84, 51, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, 52, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(86, 53, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, 54, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, 54, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, 55, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `customer_message`
--

CREATE TABLE IF NOT EXISTS `customer_message` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `customer_message`
--

INSERT INTO `customer_message` (`id`, `name`, `email`, `phone`, `text`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'asdas', 'sad', '1212', 'sadsdasda', '2015-05-19 19:08:58', '2015-05-19 19:08:58', '0000-00-00 00:00:00'),
(2, 'asdad', 'asdasdasdafasfasfas', 'asdasd', 'asdasdasdsada', '2015-05-19 19:10:21', '2015-05-19 19:10:21', '0000-00-00 00:00:00'),
(3, 'asdad', 'asdasdasdafasfasfas', 'asdasd', 'asdasdasdsada', '2015-05-19 19:11:35', '2015-05-19 19:11:35', '0000-00-00 00:00:00'),
(4, 'asdad', 'asdasdasdafasfasfas', 'asdasd', 'asdasdasdsada', '2015-05-19 19:12:12', '2015-05-19 19:12:12', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2015_03_16_071108_create_authors_table', 1),
('2015_03_16_071804_add_author', 1),
('2015_03_17_155759_CreateCategoryTable', 1),
('2015_03_17_160843_CreateAccountTable', 1),
('2015_03_17_161231_CreatOrderItemTable', 1),
('2015_03_17_161730_CreatOrderTable', 1),
('2015_03_17_162125_CreatProductTable', 1),
('2015_05_12_031458_CreateMessageTable', 1),
('2015_05_16_020745_CreatePageTable', 1),
('2015_05_19_054545_CreateTypeTable', 1),
('2015_05_19_065322_create_category_type_table', 1),
('2015_05_20_015127_CreateCustomerMessage', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `account_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `account_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(12, 26, '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(14, 26, '2015-05-20 06:41:34', '2015-05-20 06:41:34', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE IF NOT EXISTS `order_item` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float(8,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=33 ;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(30, 12, 271, 3, 99.99, '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(31, 12, 264, 3, 228.77, '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(32, 14, 296, 1, 349.00, '2015-05-20 06:41:34', '2015-05-20 06:41:34', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `view` int(11) NOT NULL,
  `login` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `view`, `login`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 129, 7, '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `origin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `weight` float(8,2) NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `guarantee` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `price` float(8,2) NOT NULL,
  `buytime` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=302 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `url`, `origin`, `weight`, `color`, `guarantee`, `stock`, `price`, `buytime`, `description`, `category_id`, `type_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(252, 'Sennheiser MX 686G', 'img/product/Sennheiser/mx686g.jpg', 'Germany', 23.00, 'Green', 2, 1, 69.95, 19, 'MX 686G SPORTS – Tai nghe Ear-bud bền bỉ, được thiết kế dành cho những người có phong cách sống năng động.\r\nMX 686G SPORTS - Tai nghe được thiết kế chuyên cho tập luyện thể thao, chống nước cấp độ IPX4, chống mồ hôi, với các cặp tips chất liệu silicon khá', 1, 3, '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(253, 'Sennheiser Momentum', 'img/product/Sennheiser/momentum.jpg', 'Germany', 16.00, 'Red and Black', 2, 10, 99.95, 32, 'Tai Nghe Sennheiser Momentum in-ear- M2IEi cuốn hút giới trẻ không chỉ ở thiết kế trẻ trung mà còn là sản phẩm dành riêng cho hệ điều hành IOS. Momentum in-ear- M2IEi có dải tần 15 - 22000 Hz, trở kháng 18ohm, độ nhạy 118dB cho chất lượng âm thanh stereo ', 1, 3, '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(254, 'Sennheiser CX200', 'img/product/Sennheiser/cx200-streetII.jpg', 'Germany', 5.00, 'Black', 2, 7, 35.00, 6, 'Tai Nghe Sennheiser CX 200 Street II\r\n\r\nVới  Sennheiser CX 200 Street  II âm bass là thế mạnh rất với chất lượng rõ ràng, không chỉ tốc độ được kiểm soát khá tốt mà đánh cũng rất có lực, xuống được khá sâu với một không gian bass rộng mở nghe rất hợp với ', 1, 3, '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(255, 'Sennheiser HDR 120', 'img/product/Sennheiser/HDR120.jpg', 'Germany', 229.00, 'Black', 2, 3, 69.00, 34, 'Tai nghe không dây Sennheiser HDR 120  RF là thiết bị giá rẻ, tần số hoạt động trong khoảng 863MHz đến 926MHz , và được thiết kế để sử dụng với Sennheiser RS 120 Hi-Fi hoặc TV hoặc các thiết bị đa phương tiện không dây khác. Tai nghe có khả năng mở rộng c', 1, 3, '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(256, 'Sennheiser HD 280 Pro', 'img/product/Sennheiser/HD280Pro.jpg', 'Germany', 220.00, 'Black', 2, 7, 80.00, 27, 'Tai nghe Sennheiser HD 280 Pro, dòng tai nghe cao cấp dành cho người dùng chuyên nghiệp, chất lượng âm thanh cực tốt, bass mạnh mẽ, dãy băng tần cực rộng (8-25000Hz), khả năng chống ồn tốt cũng như thiết kế nhẹ nhàng đem lại sự thoải mái ngay cả khi hoạt ', 1, 3, '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(257, 'ATH-M50x', 'img/product/AudioTechnica/ATH-M50X.jpg', 'Japan', 285.00, 'Black', 2, 25, 173.99, 29, 'Phiên bản đặc biệt Limited Edition với màu xanh phối với màu da thật thời trang và cá tính\r\nSản phẩm được các kỹ sư âm thanh và các nhà phê bình âm thanh chuyên nghiệp đánh giá cao\r\nDriver độc quyền có đường kính lớn 45 mm được làm từ nam châm quý và chứa', 47, 3, '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(258, 'ATH-M30x', 'img/product/AudioTechnica/ATH-M30X.jpg', 'Japan', 220.00, 'Black', 2, 35, 69.00, 31, 'Chất lượng sản xuất tiên tiến\r\nDriver 40 mm được làm từ nam châm quý hiếm và có dây lõi nhôm mạ đồng\r\nĐược điều chỉnh để nâng cao khả năng hoạt động với tần số thấp\r\nVòng tai được thiết kế ôm khít tai, đồng thời có khả năng cách âm vượt trội ở môi trường ', 47, 3, '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(259, 'ATH-SPORT 3', 'img/product/AudioTechnica/ATH-SPORT3.jpg', 'Japan', 9.50, 'Black and Silver', 2, 15, 49.50, 10, 'KẾT KHOANG PHỤ với vỏ bao được làm bằng nhôm giúp tăng cường chất lượng âm thanh\r\nCông nghệ TRỞ KHÁNG ÂM THANH (AR) mang lại âm bass mạnh mẽ, sống động\r\nTRỤ 2 KHẤC giúp người dùng thoải mái điều chỉnh đệm tai ở hai vị trí khác nhau để vừa khít vào tai và ', 47, 3, '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(260, 'ATH-M40x', 'img/product/AudioTechnica/ATH-M40X.jpg', 'Japan', 240.00, 'Black', 2, 35, 124.00, 35, 'Audio-Technica ATH-M40x-Tai nghe kiểm âm studio của Audio-Technica, là sản phẩm mới nhất với chất lượng tốt để sử dụng cho mixing và DJ chuyên nghiệp.', 47, 3, '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(261, 'ATH-IM50', 'img/product/AudioTechnica/ATH-IM50.jpg', 'Japan', 3.00, 'Black', 2, 31, 57.70, 26, 'Audio Technica ATH IM50\r\n- Tai nghe dạng IEM \r\n- Tai nghe sử dụng 2 Driver Dynamic trong 1 bên tai\r\n- Dây dẫn có thể tháo rời\r\n- Đi kèm túi đựng tai nghe\r\n- Sản phẩm được sản xuất tại Nhật Bản', 47, 3, '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(262, 'Bose IE2 In-Ear', 'img/product/Bose/IE2.jpg', 'US', 18.40, 'Black and White', 2, 11, 120.00, 12, 'Tai nghe Bose IE2 thiết kế dạng inear, tích hợp công nghệ Bose TriPort ® với âm thanh tonally cho âm thanh tuyệt vời, rõ ràng từ thấp đến cao. Tai nghe sử dụng jack cắm 3.5mm tương thích với nhiều thiết bị như Smartphone, máy tính bảng, máy nghe nhạc và n', 48, 3, '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(263, 'Bose SIE2', 'img/product/Bose/SIE2.jpg', 'US', 17.00, 'Green', 2, 14, 70.00, 12, 'Tai nghe Bose SIE2 là một sản phẩm tuyệt vời cho những ai thường xuyên chơi thể thao. Tai nghe có khả năng chống chịu nước, mồ hôi và bụi bẩn, đi kèm 1 băng thể dục Reebok để bạn có thể bỏ chiếc iPod hay iPhone vào khi hoạt động thể thao. Bose SIE2i được ', 48, 3, '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(264, 'Bose QC25', 'img/product/Bose/QC25.jpg', 'US', 195.00, 'Black', 2, 54, 228.77, 37, ' Công nghệ Noise Cancelling giúp loại hẳn 90% các âm thanh khó chịu từ bên ngoài khi nghe nhạc. Rất thích hợp để sử dụng mỗi khi máy bay cất, hạ cánh nhằm làm giảm cảm giác khó chịu vì bị ù tai.\r\n- Âm thanh của tai nghe mang đậm phong cách Bose với dãi ba', 48, 3, '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(265, 'BOSE Bluetooth Player', 'img/product/Bose/SoundlinkMini.jpg', 'US', 680.00, 'Grey', 2, 19, 175.00, 6, 'Thiết kế đột phá mới của Bose giúp bạn tận hưởng âm thanh trung thực, đầy đặn chỉ từ một chiếc loa nhỏ gọn trong lòng bàn tay.\r\nBộ tản âm thụ động được đặt chính giữa loa giúp nén hơi nhiều hơn, giúp tái tạo tiếng bass sâu trầm mạnh mẽ hơn.\r\nHai driver si', 48, 1, '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(266, 'BOSE Companion 2', 'img/product/Bose/companion.jpg', 'US', 1800.00, 'Black', 2, 18, 99.95, 22, 'Nếu bạn là người sử dụng máy vi tính như một công cụ giải trí chính trong phòng làm việc có kích thước tương đối thì việc trang bị một bộ loa ví tính là điều rất cần thiết. Với nhiều nhãn hiệu và mẫu mã của loa vi tính trên thị trường hiện nay thì người d', 48, 1, '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(267, 'Phillips Fidelio', 'img/product/Phillips/fidelio.jpg', 'Netherlands', 166.00, 'Black', 2, 7, 229.99, 18, 'Tai nghe có mic Dynamic Bass Philips SHE3595 (Đen)\r\n - Được thiết kế nhỏ gọn với âm bass cực kì sống dộng, cùng với nút đệm tai mềm tạo nên sự thoải mái cho bạn khi sử dụng lâu. Ngoài ra tai nghe SHE3595 còn được tích hợp thêm Mic giúp bạn có thể đàm thoạ', 49, 3, '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(268, 'Phillips SHE3595PP/28', 'img/product/Phillips/SHE3595PP.jpg', 'Netherlands', 10.95, 'Purple', 2, 75, 99.99, 27, 'Kiểu dáng gọn nhẹ, thích hợp cho tập thể dục. Có các tính năng:\r\n- Xem ảnh\r\n- Nghe nhạc\r\n- Ghi âm\r\n- Multi EQ mode\r\n- Đài FM\r\n- Xem phim', 49, 3, '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(269, 'Phillips Vibe', 'img/product/Phillips/vibe-mp3.jpg', 'Netherlands', 33.00, 'Black', 2, 45, 49.99, 35, ' Kích thước nhỏ gọn, có Arm Band đeo máy ở tay rất thích hợp cho thể thao vận động thể thao. Giá phù hợp cho mọi đối tượng.\r\nCó bao đeo tay rất tiện lợi\r\nCông nghệ Fullsoud\r\nThời lượng pin lên đến 15h\r\nCông nghệ sạc 6p nghe được 1h\r\nKiểu dáng thời trang,c', 49, 3, '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(270, 'Phillips Raga', 'img/product/Phillips/raga-mp3.jpg', 'Netherlands', 33.00, 'Blue or Black', 2, 17, 39.99, 39, 'Kiểu dáng gọn nhẹ, thích hợp cho tập thể dục. Có các tính năng:\r\n• Ghi âm từ FM\r\n• Lưu giữ liệu\r\n• Multi EQ mode\r\n• Đài FM\r\n• Xem ảnh\r\n• Nghe nhạc\r\n• Xem phim\r\n• Ghi âm', 49, 2, '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(271, 'Phillips Ariaz', 'img/product/Phillips/ariaz-mp3.jpg', 'Netherlands', 65.00, 'Black', 2, 37, 99.99, 20, 'Ipod shuffle  2GB có thiết kế siêu nhỏ gọn, chỉ lớn hơn đồng xu một tý, có clip cài áo thuận tiện cho người hay di chuyển. Đặc biệt lớp sơn phủ aluminum ánh kim với nhiều màu sắc khác nhau biến chiếc iPod Shuffle của bạn không những sang trọng hơn hẳn mà ', 49, 2, '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(272, 'Apple iPod Shuffle', 'img/product/Apple/ipod-shuffle.jpg', 'US', 12.50, 'Multiple Colors', 2, 79, 49.00, 26, 'Không lâu sau khi ra mắt iPhone 5, vào cuối 2012, “quả táo khuyết” lại tiếp tục làm mới các dòng máy nghe nhạc, vốn là thứ góp phần cơ bản tạo nên thành công của Apple ngày hôm nay bằng cách tích hợp vào đó thêm nhiều tính năng ưu việt, hoặc chỉ đơn giản ', 50, 2, '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(273, 'Apple iPod Nano', 'img/product/Apple/ipod-nano.jpg', 'US', 31.00, 'Multiple Colors', 2, 53, 149.00, 32, 'Không lâu sau khi ra mắt iPhone 5, vào cuối 2012, “quả táo khuyết” lại tiếp tục làm mới dòng máy nghe nhạc iPod Touch bằng cách cho ra mắt thế hệ mới hơn iPod Touch 5th Gen; tích hợp thêm nhiều tính năng ưu việt cũng như thay đổi về thiết kế, thổi vào đó ', 50, 2, '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(274, 'Apple iPod Touch', 'img/product/Apple/ipod-touch.jpg', 'US', 88.00, 'Multiple Colors', 2, 99, 199.00, 13, 'Không lâu sau khi ra mắt iPhone 5, vào cuối 2012, “quả táo khuyết” lại tiếp tục làm mới dòng máy nghe nhạc iPod Touch bằng cách cho ra mắt thế hệ mới hơn iPod Touch 5th Gen; tích hợp thêm nhiều tính năng ưu việt cũng như thay đổi về thiết kế, thổi vào đó ', 50, 2, '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(275, 'Apple EarPods', 'img/product/Apple/earpods.jpg', 'US', 10.00, 'White', 2, 11, 29.00, 6, 'Bạn thường có thói quen thưởng thức âm nhạc một mình và muốn tận hưởng trọn vẹn âm thanh của từng bản nhạc, chiếc tai nghe nhét tai Apple EarPods sẽ là một chọn lựa hoàn hảo cho chiếc iPhone 5 của bạn. Dây phone nhét tai Apple EarPods cấu tạo hai màng loa', 50, 3, '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(276, 'Apple In-Ear', 'img/product/Apple/headphones.jpg', 'US', 10.20, 'White', 2, 61, 79.00, 40, 'TAI NGHE APPLE IN-EAR HEADPHONES WITH REMOTE AND MIC MA850G/B\r\nTần số tai nghe: 5 - 21000 Hz\r\nCông nghệ kết nối có dây\r\nChiều dài dây 1.065 mét\r\nPhụ kiện Apple chính hãng\r\nXuất xứ Trung Quốc', 50, 3, '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(277, 'LehmanAudio Linear', 'img/product/LehmanAudio/linear.jpg', 'Germany', 1500.00, 'Black', 2, 11, 399.00, 8, 'Ranh giới giữa máy tính và hệ thống âm thanh hi end ngày càng gần, khi mà trước đây 2 dòng sản phẩm có mục đích sử dụng hoàn toàn khác nhau, 1 thứ sinh ra để làm việc, 1 thứ khác sinh ra để trình diễn âm thanh ... nhưng giờ  đây khi mà nhu cầu thưởng thức', 51, 1, '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(278, 'LehmanAudio Traveller', 'img/product/LehmanAudio/traveller.jpg', 'Germany', 196.00, 'Black', 2, 16, 599.00, 38, 'Traveller là sản phẩm giành được giải thưởng  Best product of the year 2014  Design  High Quality Innovation  tại   Plus X Award.\r\nĐây là một headphone amplifier thuần Analog được thiết kế nhỏ, gọn , chắc chắn, trọng lượng chỉ có 196grams,với 2 đường vào ', 51, 1, '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(279, 'LehmanAudio black cube', 'img/product/LehmanAudio/black-cube.jpg', 'Germany', 400.00, 'Black', 2, 6, 799.00, 40, '', 51, 1, '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(280, 'Lehman Audio Rhinelander', 'img/product/LehmanAudio/rhinelander.jpg', 'Germany', 400.00, 'Silver', 2, 3, 529.00, 27, 'Loa nhỏ rõ ràng là một xu hướng mới, thường được dùng để trong phòng nghe thứ hai hay đơn giản để trên bàn, đỡ tốn diện tích. Chất lượng loa nhỏ cũng ngày càng tiến bộ dần lên, chất tiếng của nó không khác gì những loa lớn ngoài thị trường. Nhưng “phối, g', 51, 1, '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(281, 'Lehman Audio linear-se', 'img/product/LehmanAudio/linear-se.png', 'Germany', 2200.00, 'Silver', 2, 11, 799.00, 40, 'Linear SE USB là một headphone amplifier có hỗ trợ cả kết nối digital qua cổng cắm USB từ máy tính và cả kết nối analog qua cổng cắm RCA từ CD Player. \r\nRanh giới giữa máy tính và hệ thống âm thanh hi end ngày càng gần, khi mà trước đây 2 dòng sản phẩm có', 51, 1, '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(282, 'AK 120', 'img/product/AstellandKern/ak120.jpg', 'South Korea', 143.00, 'Black', 2, 18, 789.00, 6, 'Máy nghe nhạc cao cấp thương hiệu Astell&Kern\r\nThiết kế cao cấp với khung được làm bằng nhôm nguyên khối\r\nSử dụng màn hình cảm ứng AMOLED rộng 3.31 (480 x 800 pixel)\r\nHỗ trợ bộ đôi khuyếch đại kỹ thuật số Cirrus Logic CS4398 (Dual DAC)\r\nHỗ trợ các định dạ', 52, 2, '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(283, 'AK 240', 'img/product/AstellandKern/ak240.jpg', 'South Korea', 185.00, 'Black', 2, 8, 1189.00, 31, 'Máy nghe nhạc cao cấp thương hiệu Astell&Kern\r\nThiết kế vỏ nhôm, mặt lưng vân các bon sang trọng với các đường thẳng cứng cáp.\r\nSở hữu màn hình AMOLED 3,31 (800 x 480 pixel)\r\nHỗ trợ bộ đôi khuyếch đại kỹ thuật số Cirrus Logic CS4398 (Dual DAC)\r\nHỗ trợ các', 52, 2, '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(284, 'AK 500N', 'img/product/AstellandKern/ak500n.jpg', 'South Korea', 11385.00, 'Black', 2, 20, 10000.00, 27, 'Astell&Kern AK500N mang thiết kế rất lạ mắt với tổng thể thiết kế hình hộp vuông bằng nhôm kích thước 21,4 x 24,3 x 23,8 cm (tương đương với khoảng 5 cái Mac Mini xếp chồng lên nhau). Mặt trước là bề mặt trang trí với các đường nét kiểu dáng kim cương, ph', 52, 2, '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(285, 'AK JR', 'img/product/AstellandKern/akjr.jpg', 'South Korea', 93.00, 'White', 2, 38, 894.00, 8, 'Astell&Kern vừa giới thiệu mẫu máy nghe nhạc hi-res AK Jr có giá rẻ nhất của mình ở mức 500 USD. Tuy nhiên điểm nhấn lại nằm ở thiết kế mỏng 8,9mm và nặng chỉ 93 g khiến sản phẩm tạo ra tính di động cao, trong khi nó vẫn có khả năng phát nhạc hi-res chất ', 52, 2, '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(286, 'AK 100 II', 'img/product/AstellandKern/ak100.jpg', 'South Korea', 122.00, 'Black', 2, 13, 699.00, 40, 'Máy nghe nhạc cao cấp thương hiệu Astell&Kern\r\nThiết kế cao cấp với khung được làm bằng nhôm nguyên khối\r\nSử dụng màn hình cảm ứng AMOLED rộng 3.31" (480 x 800 pixel)\r\nHỗ trợ bộ khếch đại kỹ thuật số Cirrus Logic CS4398 (Single DAC)\r\nHỗ trợ các định dạng ', 52, 2, '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(287, 'Braven BRV HD', 'img/product/Braven/brv-hd.png', 'US', 1820.00, 'Black', 2, 22, 299.99, 35, 'Braven BRV-X là chiếc loa di động có khả năng hoạt động ngoài trời tốt nhất thế giới\r\nThiết kế hầm hố, mạnh mẽ với chuẩn chống sốc và chống nước cao cấp chuẩn IPX7. Ngoài ra, loa còn có khả năng chống chọi tốt với môi trường khắc nghiệt, ẩm ướt, thích hợp', 53, 1, '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(288, 'Braven 805', 'img/product/Braven/805.png', 'US', 1270.00, 'Multiple Colors', 2, 12, 199.99, 32, 'Braven 805 thiết kế để sử dụng ở nhà hoặc tiện lợi cho việc di chuyển. Ngoài ra Braven 805 còn được tích hợp công nghệ ''SRS WOW HD bass-enhanced music setting'' để tăng cường dải trầm, cho âm thanh tổng thể trở nên sống động phấn khích hơn. Tích hợp bên tr', 53, 1, '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(289, 'Braven 770', 'img/product/Braven/770.png', 'US', 907.00, 'Black', 2, 22, 149.99, 8, 'Không phải ngày nào bạn cũng được tiếp cận những chiếc loa có khả năng chống nước, và một trong số những món “hàng hiếm” đó là Braven BRV-1 BT với tính di động cao, có thể mang đi bất cứ đâu để giải trí thông qua kết nối bluetooth.', 53, 1, '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(290, 'Braven 570', 'img/product/Braven/570.png', 'US', 312.00, 'Blue', 2, 14, 99.99, 16, 'BRAVEN 570 cho phép bạn kết nối với thế giới xung quanh bạn bằng cách chia sẻ âm nhạc, phim ảnh, trò chơi, và nhiều hơn nữa. Công suất 6 watt và thời lượng pin nghe liên tục 10 giờ, âm thanh di động này sẽ mang âm nhạc đến bất cứ nơi nào bạn đi ! Có cổng ', 53, 1, '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(291, 'Braven BRV Bank', 'img/product/Braven/braven-bank.png', 'US', 278.00, 'Black', 2, 22, 99.99, 17, 'Không phải ngày nào bạn cũng được tiếp cận những chiếc loa có khả năng chống nước, và một trong số những món “hàng hiếm” đó là Braven BRV-1 BT với tính di động cao, có thể mang đi bất cứ đâu để giải trí thông qua kết nối bluetooth.', 53, 1, '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(292, 'NuForce Primo 8', 'img/product/NuForce/primo8.jpg', 'Japan', 19.30, 'Black and Blue', 2, 42, 499.00, 26, 'Tai nghe cao cấp dành cho điện thoại di động\r\nThiết kế dạng in-ear với kiểu dáng độc đáo, sang trọng, trẻ trung\r\nSử dụng hệ thống driver BA (Balanced Armature) cho chất lượng âm thanh trong trẻo, chi tiết\r\n4 drivers BA trong mỗi tai nghe mang lại sự mượt ', 54, 3, '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(293, 'NuForce NE750M', 'img/product/NuForce/NE750M.jpg', 'Japan', 14.00, 'Black and Red', 2, 23, 99.00, 22, 'Tai nghe cao cấp dành cho điện thoại di động\r\nThiết kế in-ear với chất lượng âm thanh Stereo, âm bass mạnh mẽ\r\nSử dụng công nghệ tiên tiến với trình điều khiển lớn\r\nNút điều khiển nhạc và mircophone được tích hợp ngay trên dây cáp\r\nDây cáp được thiết kế d', 54, 3, '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(294, 'NuForce NE800M', 'img/product/NuForce/NE800M.jpg', 'Japan', 18.00, 'Black and Gold', 2, 72, 169.00, 29, 'Tai nghe dành cho điện thoại di động\r\nThiết kế dạng in-ear cho chất lượng âm thanh tuyệt vời\r\nMàng loa được phủ Titanium cho chất âm trong trẻo, Bass rộng, sâu\r\nThiết kế trong khung nhôm nhằm giảm thiểu tối đa sự rung động và sự dội tiếng\r\nTích hợp microp', 54, 3, '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(295, 'NuForce uDAC3', 'img/product/NuForce/uDAC3.jpg', 'Japan', 250.00, 'Red', 2, 53, 129.00, 32, '24bit/96kHz USB Digital Audio Converter (DAC) cho phép bạn kết nối nhạc số từ máy tính của bạn đến tai nghe, hệ thống âm thanh, Loa,...qua uDAC3 với những công \r\nnghệ mới nhất asynchronous USB, giải mã Direct-Stream Digital (DSD), giảm nhiễu jitter . Cho ', 54, 1, '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(296, 'NuForce HA-200', 'img/product/NuForce/ha-200.jpg', 'Japan', 2200.00, 'Black', 2, 9, 349.00, 39, 'Thiết kế hình lập phương nhỏ gọn với vỏ ngoài sử dụng chất liệu kim loại\r\nSử dụng màng loa cao cấp, Cube cho chất lượng âm thanh chi tiết, có chiều sâu trong không gian rộng\r\nSử dụng jack cắm tai nghe 3.5mm sử dụng cho tất cả các dòng điện thoại di động, ', 54, 1, '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(297, 'Shure SRH940', 'img/product/Shure/srh940.jpg', 'US', 320.00, 'Black', 2, 19, 299.99, 15, 'Shure SE315 là tai nghe dạng earphone được thiết kế với kiểu dáng độc đáo và màu sắc cá tính\r\nSản phẩm được trang bị công nghệ âm thanh tiên tiến, đáp ứng dải tần rộng và có nút đệm tai êm ái giúp tái tạo âm sắc đa dạng nên phù hợp cho cả nghe nhạc lẫn xe', 55, 3, '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(298, 'Shure SE846', 'img/product/Shure/se846.jpg', 'US', 30.00, 'White', 2, 109, 999.00, 23, 'Tai nghe của Shure nổi bật với chật lượng âm thanh tuyệt đỉnh, vượt trội so với các đối thủ trong tầm giá\r\nThiết kế dạng earbud nhưng SE215 là tai nghe nhét sâu trong ống tai IEM\r\nMột điểm nổi bật nữa ở SE215 có khả năng tái tạo âm thanh và loại bỏ tạp âm', 55, 3, '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(299, 'Shure SE112', 'img/product/Shure/se112.jpg', 'US', 32.00, 'Black', 2, 35, 49.99, 18, 'Tai nghe Shure SE112m+ thực chất là SE112 bổ sung thêm micro và các nút control để bạn có thể nhận cuộc gọi hay chỉ đơn giản là chuyển nhạc và hỗ trợ tốt cho những sản phẩm của Apple như iPhone 6 Plus, iPhone 6, iPhone 5s, iPhone 5c...\r\nSE112 luôn mang lạ', 55, 3, '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(300, 'Shure SE535LTD', 'img/product/Shure/se535ltd.jpg', 'US', 48.00, 'Red', 2, 14, 549.99, 25, 'Shure được biết đến là một hãng âm thanh chuyên nghiệp của Mỹ. Hãng cho ra đời dòng in-ear SE, được các ca sĩ chuyên nghiệp rất ưa chuộng, trong đó có mẫu SE535 vô cùng nổi tiếng trong tầm 10tr. Một vài năm trước đây Shure SE535 Special Edition được phát ', 55, 3, '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(301, 'Shure SRH750DJ', 'img/product/Shure/srh750dj.jpg', 'US', 227.00, 'Black', 2, 21, 149.99, 5, 'Các SRH750DJ Headphones từ Shure cung cấp đẳng cấp thế giới hiệu suất âm thanh, thoải mái, và độ bền cho đến chuyên nghiệp của DJ.\r\nTrở kháng cao và tối ưu hóa xử lý điện năng tối ưu hóa tai nghe để sử dụng trên sản lượng cao máy trộn DJ. Thoải mái, ly ta', 55, 3, '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE IF NOT EXISTS `types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `types_category_id_index` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `category_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Loa và Âm li', 0, '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(2, 'Máy nghe nhạc', 0, '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(3, 'Tai nghe', 0, '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00'),
(4, 'Khác', 0, '2015-05-20 04:47:15', '2015-05-20 04:47:15', '0000-00-00 00:00:00');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category_type`
--
ALTER TABLE `category_type`
  ADD CONSTRAINT `category_type_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_type_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
