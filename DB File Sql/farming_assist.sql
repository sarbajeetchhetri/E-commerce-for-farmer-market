-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2019 at 11:43 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farming_assist`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) UNSIGNED NOT NULL,
  `products_id` int(11) NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `session_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `farmerid` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `session_id` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `description`, `status`, `session_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 0, 'Crops', 'Rice falls under the cereals group and healthy product.', 1, 2, NULL, '2019-05-04 12:26:14', '2019-05-10 01:56:53'),
(3, 0, 'Vegetables', 'Vegetables are parts of plants that are consumed by humans or other animals as food. The original meaning is still commonly used and is applied to plants collectively to refer to all edible plant matter, including the flowers, fruits, stems, leaves, roots, and seeds.', 1, 2, NULL, '2019-05-10 01:43:57', '2019-05-10 01:43:57'),
(4, 0, 'Fruits', 'A fruit is the seed-bearing structure in flowering plants formed from the ovary after flowering. Fruits are the means by which angiosperms disseminate seeds', 1, 3, NULL, '2019-05-10 02:32:18', '2019-05-10 02:32:18');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `country_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `country_name`, `created_at`, `updated_at`) VALUES
(1, '+977', 'Nepal', '2019-05-04 12:11:10', '2019-05-04 12:11:10');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(10) UNSIGNED NOT NULL,
  `coupon_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `amount_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiry_date` date NOT NULL,
  `status` tinyint(4) NOT NULL,
  `session_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_code`, `amount`, `amount_type`, `expiry_date`, `status`, `session_id`, `created_at`, `updated_at`) VALUES
(1, 'LX1N', 5, 'Percentage', '2019-06-30', 1, '2', '2019-05-10 01:50:46', '2019-05-10 01:50:46');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_address`
--

CREATE TABLE `delivery_address` (
  `id` int(10) UNSIGNED NOT NULL,
  `users_id` int(11) NOT NULL,
  `users_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_address`
--

INSERT INTO `delivery_address` (`id`, `users_id`, `users_email`, `name`, `address`, `city`, `state`, `country`, `pincode`, `mobile`, `created_at`, `updated_at`) VALUES
(1, 7, 'Rajugurung@gmail.com', 'Raju Gurung', 'Thimi', 'Bhaktapur', '3', 'Nepal', '44600', '9843241425', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(10) UNSIGNED NOT NULL,
  `feedbacks` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `reply` text COLLATE utf8mb4_unicode_ci,
  `uid` int(11) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_user` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to_user` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `feedbacks`, `reply`, `uid`, `email`, `from_user`, `to_user`, `created_at`, `updated_at`) VALUES
(1, 'great', NULL, 7, 'Rajugurung@gmail.com', 'supplier', 'admin', '2019-05-09 13:35:10', '2019-05-09 13:35:10'),
(2, 'nice', 'Thank you!', 7, 'Rajugurung@gmail.com', 'supplier', 'farmer', '2019-05-09 13:40:30', '2019-05-09 13:40:30');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(74, '2019_04_24_113830_create_farmerinfo_table', 1),
(129, '2019_04_25_095352_create_farmerinfos_table', 2),
(131, '2014_10_12_000000_create_users_table', 3),
(132, '2014_10_12_100000_create_password_resets_table', 3),
(133, '2018_10_20_040609_create_categories_table', 3),
(134, '2018_10_24_075802_create_products_table', 3),
(135, '2018_11_08_024109_create_product_att_table', 3),
(136, '2018_11_20_055123_create_tblgallery_table', 3),
(137, '2018_11_26_070031_create_cart_table', 3),
(138, '2018_11_28_072535_create_coupons_table', 3),
(139, '2018_12_01_042342_create_countries_table', 3),
(140, '2018_12_03_043804_add_more_fields_to_users_table', 3),
(141, '2018_12_03_093548_create_delivery_address_table', 3),
(142, '2018_12_05_024718_create_orders_table', 3),
(143, '2019_05_02_173135_create_feedbacks_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `users_id` int(11) NOT NULL,
  `users_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(100) NOT NULL,
  `shipping_charges` double(8,2) NOT NULL,
  `coupon_code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_amount` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grand_total` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `farmer_id` int(11) NOT NULL,
  `products_id` int(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `users_id`, `users_email`, `name`, `address`, `city`, `state`, `pincode`, `country`, `mobile`, `product_name`, `quantity`, `shipping_charges`, `coupon_code`, `coupon_amount`, `order_status`, `payment_method`, `grand_total`, `farmer_id`, `products_id`, `created_at`, `updated_at`) VALUES
(1, 7, 'Rajugurung@gmail.com', 'Raju Gurung', 'Thimi', 'Bhaktapur', '3', '44600', 'Nepal', '9843241425', 'Basmati Rice', 1, 0.00, 'NO Coupon', '0', 'success', 'COD', '3000', 2, 1, '2019-05-09 13:29:12', '2019-05-09 13:29:12'),
(2, 7, 'Rajugurung@gmail.com', 'Raju Gurung', 'Thimi', 'Bhaktapur', '3', '44600', 'Nepal', '9843241425', 'Basmati Rice', 1, 0.00, 'NO Coupon', '0', 'success', 'Paypal', '3000', 2, 1, '2019-05-09 13:33:41', '2019-05-09 13:33:41'),
(3, 7, 'Rajugurung@gmail.com', 'Raju Gurung', 'Thimi', 'Bhaktapur', '3', '44600', 'Nepal', '9843241425', 'Potato', 1, 0.00, 'NO Coupon', '0', 'success', 'COD', '1250', 2, 2, '2019-05-10 03:40:34', '2019-05-10 03:40:34');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `categories_id` int(11) NOT NULL,
  `p_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `categories_id`, `p_name`, `description`, `price`, `image`, `session_id`, `created_at`, `updated_at`) VALUES
(1, 2, 'Basmati Rice', 'Healthy and Organic Basmati Rice.', 3000.00, '1556993632-basmati-rice.jpg', 2, '2019-05-04 12:28:53', '2019-05-04 12:28:53'),
(2, 3, 'Potato', 'They are slightly dense and creamy with a subtly sweet flavor. Their delicate, thin skins add just the right amount of texture to mashed&nbsp;<b>potatoes</b>&nbsp;without the need for peeling. Also try grilling&nbsp;<b>white potatoes</b>&nbsp;to bring out a more full-bodied flavor, or use them in soups and stews as they hold their shape well.', 1250.00, '1557473656-potato.jpg', 2, '2019-05-10 01:49:16', '2019-05-10 01:49:16'),
(3, 2, 'Maize', 'Maize, also known as corn, is a cereal grain first domesticated by indigenous peoples in southern Mexico about 10,000 years ago. The leafy stalk of the plant produces pollen inflorescence\'s&nbsp;and separate ovuliferous inflorescence\'s&nbsp;called ears that yield kernels or seeds, which are fruits.', 1000.00, '1557474351-maize.jpg', 2, '2019-05-10 02:00:51', '2019-05-10 02:00:51'),
(4, 4, 'Banana', 'Bananas are one of the most widely consumed fruits in the world for good reason. Eating them could help lower blood pressure and reduce the risks of cancer and asthma.', 2000.00, '1557476596-banana.jpg', 3, '2019-05-10 02:38:16', '2019-05-10 02:41:46'),
(5, 2, 'Gram (chana)', 'The chickpea or chick pea is an annual legume of the family Fabaceae, subfamily Faboideae. Its different types are variously known as gram or Bengal gram, garbanzo or garbanzo bean, and Egyptian pea. Chickpea seeds are high in protein.', 1500.00, '1557478105-gram-chana.jpg', 4, '2019-05-10 03:03:25', '2019-05-10 03:10:11'),
(6, 3, 'Peas', 'The pea is most commonly the small spherical seed or the seed-pod of the pod fruit Pisum sativum. Each pod contains several peas, which can be green or yellow. Pea pods are botanically fruit, since they contain seeds and develop from the ovary of a flower.', 1000.00, '1557478899-peas.jpg', 4, '2019-05-10 03:16:39', '2019-05-10 03:16:39'),
(7, 3, 'Cauliflower', 'Cauliflower is one of several vegetables in the species Brassica oleracea in the genus Brassica, which is in the family Brassicaceae. It is an annual plant that reproduces by seed. Typically, only the head is eaten – the edible white flesh sometimes called \"curd\".', 3000.00, '1557479355-cauliflower.jpg', 4, '2019-05-10 03:24:16', '2019-05-10 03:24:16'),
(8, 4, 'Mango', 'Mangoes are juicy stone fruit from numerous species of tropical trees belonging to the flowering plant genus Mangifera, cultivated mostly for their edible fruit. The majority of these species are found in nature as wild mangoes. The genus belongs to the cashew family Anacardiaceae.', 2000.00, '1557479676-mango.jpg', 3, '2019-05-10 03:29:36', '2019-05-10 03:29:36'),
(9, 4, 'Lychees', 'Lychee is the sole member of the genus Litchi in the soapberry family, Sapindaceae. It is a tropical tree native to the Guangdong and Fujian provinces of China, where cultivation is documented from 1059 AD.', 4000.00, '1557479921-lychees.jpg', 3, '2019-05-10 03:33:41', '2019-05-10 03:33:41');

-- --------------------------------------------------------

--
-- Table structure for table `product_att`
--

CREATE TABLE `product_att` (
  `id` int(10) UNSIGNED NOT NULL,
  `products_id` int(11) NOT NULL,
  `quality` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_att`
--

INSERT INTO `product_att` (`id`, `products_id`, `quality`, `weight`, `price`, `stock`, `created_at`, `updated_at`) VALUES
(1, 1, 'standard', '25 kg', 3000.00, 0, '2019-05-04 12:29:37', '2019-05-04 12:29:49'),
(2, 2, 'standard', '50 Kg', 1250.00, 3, '2019-05-10 01:50:01', '2019-05-10 01:50:05'),
(3, 4, 'standard', '25 dozen', 2000.00, 6, '2019-05-10 02:40:42', '2019-05-10 02:40:42'),
(4, 3, 'standard', '25 kg', 1300.00, 5, '2019-05-10 02:44:47', '2019-05-10 02:44:47'),
(5, 5, 'standard', '10 kg', 1500.00, 5, '2019-05-10 03:08:03', '2019-05-10 03:08:03'),
(6, 6, 'Standard', '15 kg', 1000.00, 3, '2019-05-10 03:19:31', '2019-05-10 03:19:31'),
(7, 8, 'Standard', '30', 2000.00, 10, '2019-05-10 03:30:38', '2019-05-10 03:30:38'),
(8, 9, 'Standard', '30', 4000.00, 5, '2019-05-10 03:34:31', '2019-05-10 03:34:31');

-- --------------------------------------------------------

--
-- Table structure for table `tblgallery`
--

CREATE TABLE `tblgallery` (
  `id` int(10) UNSIGNED NOT NULL,
  `products_id` int(11) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblgallery`
--

INSERT INTO `tblgallery` (`id`, `products_id`, `image`, `session_id`, `created_at`, `updated_at`) VALUES
(1, 4, '3060021557476606.jpg', 3, '2019-05-10 02:38:26', '2019-05-10 02:38:26'),
(2, 4, '8673291557476612.jpg', 3, '2019-05-10 02:38:32', '2019-05-10 02:38:32'),
(3, 4, '5496591557476628.jpg', 3, '2019-05-10 02:38:49', '2019-05-10 02:38:49'),
(4, 1, '6744621557477232.jpg', 2, '2019-05-10 02:48:52', '2019-05-10 02:48:52'),
(5, 1, '626011557477331.jpg', 2, '2019-05-10 02:50:32', '2019-05-10 02:50:32'),
(6, 1, '5632201557477353.jpg', 2, '2019-05-10 02:50:54', '2019-05-10 02:50:54'),
(7, 3, '1858241557477463.jpg', 2, '2019-05-10 02:52:43', '2019-05-10 02:52:43'),
(8, 3, '9168761557477472.jpg', 2, '2019-05-10 02:52:52', '2019-05-10 02:52:52'),
(9, 3, '3766961557477477.jpg', 2, '2019-05-10 02:52:58', '2019-05-10 02:52:58'),
(10, 2, '4181481557477609.jpg', 2, '2019-05-10 02:55:09', '2019-05-10 02:55:09'),
(11, 2, '6295861557477616.jpg', 2, '2019-05-10 02:55:17', '2019-05-10 02:55:17'),
(12, 2, '1519611557477622.jpg', 2, '2019-05-10 02:55:22', '2019-05-10 02:55:22'),
(13, 5, '5991311557478117.jpg', 4, '2019-05-10 03:03:37', '2019-05-10 03:03:37'),
(14, 5, '2886441557478169.jpg', 4, '2019-05-10 03:04:29', '2019-05-10 03:04:29'),
(15, 5, '8177521557478180.jpg', 4, '2019-05-10 03:04:40', '2019-05-10 03:04:40'),
(17, 6, '3463281557478976.jpg', 4, '2019-05-10 03:17:56', '2019-05-10 03:17:56'),
(18, 6, '4070811557478984.jpg', 4, '2019-05-10 03:18:05', '2019-05-10 03:18:05'),
(19, 6, '266891557479001.jpg', 4, '2019-05-10 03:18:21', '2019-05-10 03:18:21'),
(20, 7, '1452461557479416.jpg', 4, '2019-05-10 03:25:16', '2019-05-10 03:25:16'),
(21, 7, '7744391557479424.jpg', 4, '2019-05-10 03:25:24', '2019-05-10 03:25:24'),
(22, 7, '6148501557479429.jpg', 4, '2019-05-10 03:25:30', '2019-05-10 03:25:30'),
(23, 8, '4922441557479693.jpg', 3, '2019-05-10 03:29:53', '2019-05-10 03:29:53'),
(24, 8, '9166261557479702.jpg', 3, '2019-05-10 03:30:03', '2019-05-10 03:30:03'),
(25, 8, '6445931557479710.jpg', 3, '2019-05-10 03:30:10', '2019-05-10 03:30:10'),
(26, 9, '2740791557479985.jpg', 3, '2019-05-10 03:34:46', '2019-05-10 03:34:46'),
(27, 9, '2773471557479992.jpg', 3, '2019-05-10 03:34:52', '2019-05-10 03:34:52'),
(28, 9, '5256261557479999.jpg', 3, '2019-05-10 03:35:00', '2019-05-10 03:35:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` int(11) DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usertype` tinyint(4) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gfname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `faname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sfund` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `usertype`, `remember_token`, `created_at`, `updated_at`, `address`, `city`, `state`, `country`, `pincode`, `mobile`, `dob`, `gfname`, `faname`, `mname`, `sfund`, `image`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$siEmAobi8UFYe4pA6GjIFO/gBKw7vfUkK2WchNxip1KjhilpagWc6', 1, 'z8wh3xz9shlDnDnAw3JIsdJVWxe3eKHIP2JyaFqBvyMoFQZiCJIKewUK6G1a', '2019-05-04 12:00:16', '2019-05-04 12:00:16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'sanjeeb kc', 'sanjeebkc@gmail.com', 1, '$2y$10$jMpk9ZQzBfGDLh6vgzWlXuzC6zmW3SkbaFHRE3bmnb5g5bGtQ9gMG', 2, 'k7qihBBndZykLaXCnO8aoX0XjowBvQP7qdYTdCEL1HcIAcRY1joLY1LGc12y', '2019-05-04 12:02:55', '2019-05-10 01:40:50', 'Butwal-14', 'Butwal-14', 'Provision no 5', 'Nepal', '32900', '+9779816225602', '1976-06-15', 'Ram Bahadur Kc', 'Khem Bahadur Kc', 'Kamala Kc', 'farmer', '1557473235-9779816225602.jpg'),
(3, 'jag narayan chaudhary', 'jag@gmail.com', 1, '$2y$10$r4LCtMXXFmnzf9kPKI4h4.Av1nMWEKLXKXAbcjibFaPOCRas8NAX.', 2, 'qXiL4cg9w7Nbo8OGClrjrYK7f5lx1zL8487D6jSlJhsj8RkuNREvCN59R4bO', '2019-05-04 12:04:16', '2019-05-04 12:04:16', 'Butwal-16', 'Butwal', 'Provision no 5', 'Nepal', '32900', '+9779817275432', '1969-02-28', 'Narayan Chaudhary', 'Fuba Chaudhary', 'Ashma Chaudhary', 'farmer', '1557474568-9779817275432.jpg'),
(4, 'sagar chhetri', 'sagar@gmail.com', 1, '$2y$10$hF2PpSuaw3gqc7LqB6Ebleh1X6RE8qCFqI8bLqZzk7r7LURbulj92', 2, 'XQxs60Hl1RdsaKHU1ZVqkPAtLKAUdV1wOoRZy4qajmAz0oWN7vFmuYm7JUqU', '2019-05-04 12:05:16', '2019-05-04 12:05:16', 'Butwal-10', 'Butwal', 'Provision no 5', 'Nepal', '32900', '+9779846260423', '1975-11-11', 'Janaga Bahadur Chhetri', 'Keshar Bahadur Chhetri', 'Sakuntala Chhetri', 'farmer', '1557475679-9779846260423.jpg'),
(5, 'ghan shyam chaudhary', 'ghan@gmail.com', 1, '$2y$10$eHafdtVJFw6hCemDlDYyvuF2SnZK9zzwlcIoU8EF2oYDfIbuFtAZa', 2, 'KNKA3e4ZteDzztExSGGA3MrIuyYStkCOcGmpmEToqbxsaZOVintDAyoJB87E', '2019-05-04 12:06:30', '2019-05-04 12:06:30', 'Butwal-14', 'Butwal', 'Provision no 5', 'Nepal', '32900', '+9779826053486', '1984-06-13', 'Bhanu chaudhary', 'Chinak Chaudhary', 'Yasodha Chaudhary', 'farmer', '1557475973-9779826053486.jpg'),
(6, 'suraj kurmi', 'suraj@gmail.com', NULL, '$2y$10$MixaOqzGVZ1TtX6lFCDJu.nBLvexAjzjKMSoWwstmx0zNUYzsJLv6', 2, 'urakcDrKV5rGoUh0jg7Gp2OE8PqMQTmtfFR0cYWdzbso4VNxzz82lRZz0gcR', '2019-05-04 12:07:01', '2019-05-04 12:07:01', 'Butwal-12', 'Butwal', 'Provision no 5', 'Nepal', '32900', '+9779834243623', '1971-11-16', 'Narsingh Kurmi', 'Rambilas Kurmi', 'Manu Kurmi', 'farmer', '1557476115-9779834243623.jpg'),
(7, 'Raju Gurung', 'Rajugurung@gmail.com', NULL, '$2y$10$1jIvQeW58lMv/aWb3nj6hu4oNSpgH93HcUrG6emXYMV5WGN/QAWQ2', 3, 'xc0ou2L4nN3LdATKHyP1phIpZQ4x4hnr29KbPIFgICnMUQM9UhFBXVsqNiKI', '2019-05-09 12:05:21', '2019-05-09 13:34:54', 'Thimi', 'Bhaktapur', '3', 'Nepal', '44600', '9843241425', NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`name`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `countries_country_code_unique` (`country_code`),
  ADD UNIQUE KEY `countries_country_name_unique` (`country_name`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_coupon_code_unique` (`coupon_code`);

--
-- Indexes for table `delivery_address`
--
ALTER TABLE `delivery_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_att`
--
ALTER TABLE `product_att`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblgallery`
--
ALTER TABLE `tblgallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `delivery_address`
--
ALTER TABLE `delivery_address`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_att`
--
ALTER TABLE `product_att`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblgallery`
--
ALTER TABLE `tblgallery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
