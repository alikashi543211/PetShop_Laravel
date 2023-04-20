-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2020 at 03:11 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thepetshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` bigint(20) NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'dummy.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `text_style` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `name`, `sort_order`, `content`, `link`, `image`, `created_at`, `updated_at`, `text_style`, `status`) VALUES
(1, 'Welcome To <br> Thepetshop', 2, 'See how your users experience your website in realtime or view<br> trends to see any changes in performance over time.', '#', 'banners_953.nirzar-pangarkar-sDpmnfv-KRk-unsplash.jpg', '2020-02-27 00:29:33', '2020-08-25 06:55:57', 'text-left', 1),
(2, 'Welcome To <br> Thepetshop', 1, 'See how your users experience your website in realtime or view<br> trends to see any changes in performance over time.', '#', 'banners_987.dorothea-oldani-Hhm_fL04bE8-unsplash.jpg', '2020-02-27 00:52:12', '2020-08-25 06:55:36', 'text-center', 1),
(3, 'Welcome To <br> Thepetshop', 3, 'See how your users experience your website in realtime or view<br> trends to see any changes in performance over time.', '#', 'banners_939.carol-magalhaes-MV13o_rnEMw-unsplash.jpg', '2020-02-27 00:54:31', '2020-08-25 06:55:48', 'text-right', 1);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `product_name`, `product_color`, `product_code`, `size`, `price`, `quantity`, `user_email`, `session_id`, `created_at`, `updated_at`) VALUES
(74, 2, 'Cat House cum Bed', 'no-color', '823947', '0', 2500, 1, 'user@user.com', '', '2020-08-26 08:07:32', '2020-08-26 08:07:32');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'dummy.png',
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `slug`, `description`, `created_at`, `updated_at`, `thumbnail`, `status`) VALUES
(1, 0, 'Dogs', 'dogs', 'women', '2020-03-01 01:33:50', '2020-08-19 16:14:32', 'dummy.png', 1),
(2, 0, 'Cats', 'cats', 'men', '2020-03-01 01:38:25', '2020-08-19 16:15:13', 'dummy.png', 1),
(3, 0, 'Parrots', 'parrots', 'parrots', '2020-03-01 01:40:30', '2020-08-24 01:11:05', 'dummy.png', 1),
(4, 0, 'Other Pets', 'other-pets', 'Other Pets', '2020-03-01 01:41:45', '2020-08-24 01:11:54', 'dummy.png', 1),
(5, 1, 'DOG BEDS & MATS', 'dogs-dog-beds-&-mats', 'DOG BEDS & MATS', '2020-03-01 01:47:07', '2020-08-24 01:14:01', 'dummy.png', 0),
(6, 1, 'DOG BOWLS', 'dogs-dog-bowls', 'DOG BOWLS', '2020-03-01 01:48:08', '2020-08-24 01:14:36', 'dummy.png', 1),
(7, 1, 'DOG CARRIERS', 'dogs-dog-carriers', 'DOG CARRIERS', '2020-03-01 01:49:49', '2020-08-24 01:15:15', 'dummy.png', 1),
(8, 1, 'DOG TOYS', 'dogs-dog-toys', 'DOG TOYS', '2020-03-01 01:50:32', '2020-08-24 01:28:13', 'dummy.png', 1),
(9, 2, 'CAT BEDS & HOUSES', 'cats-cat-beds-&-houses', 'CAT BEDS & HOUSES', '2020-03-01 01:54:33', '2020-08-24 01:15:58', 'dummy.png', 1),
(10, 2, 'CAT BOWLS & DISPENSER', 'cats-cat-bowls-&-dispenser', 'CAT BOWLS & DISPENSER', '2020-03-01 01:57:22', '2020-08-24 01:16:43', 'dummy.png', 1),
(11, 2, 'CAT CARRIERS', 'cats-cat-carriers', 'CAT CARRIERS', '2020-03-01 01:58:52', '2020-08-24 01:17:22', 'dummy.png', 1),
(12, 2, 'CAT FOOD & TREATS', 'cats-cat-food-&-treats', 'CAT FOOD & TREATS', '2020-03-01 01:59:40', '2020-08-24 01:18:11', 'dummy.png', 1),
(13, 3, 'COCKATOO - MACAW', 'parrots-cockatoo---macaw', 'COCKATOO - MACAW', '2020-03-01 02:02:47', '2020-08-24 01:19:02', 'dummy.png', 1),
(14, 3, 'COCKTAIL - RINGNECK', 'parrots-cocktail---ringneck', 'COCKTAIL - RINGNECK', '2020-03-01 02:03:24', '2020-08-24 01:21:18', 'dummy.png', 1),
(15, 3, 'FINCHES - LOVEBIRDS', 'parrots-finches---lovebirds', 'FINCHES - LOVEBIRDS', '2020-03-01 02:04:09', '2020-08-24 01:21:48', 'dummy.png', 1),
(16, 3, 'PARROT FEED & CARE', 'parrots-parrot-feed-&-care', 'PARROT FEED & CARE', '2020-03-01 02:04:44', '2020-08-24 01:24:00', 'dummy.png', 1),
(17, 4, 'FISH', 'other pets-fish', 'FISH', '2020-03-01 02:05:47', '2020-08-24 01:24:32', 'dummy.png', 1),
(18, 4, 'HAMSTER', 'other pets-hamster', 'HAMSTER', '2020-03-01 02:06:36', '2020-08-24 01:24:59', 'dummy.png', 1),
(19, 4, 'RABBIT', 'other pets-rabbit', 'RABBIT', '2020-03-01 02:07:19', '2020-08-24 01:25:25', 'dummy.png', 1),
(20, 4, 'REPTILE', 'other pets-reptile', 'REPTILE', '2020-03-01 02:08:47', '2020-08-24 01:26:30', 'dummy.png', 1),
(22, 3, 'RAW - AMAZON - GREY', 'parrots-raw---amazon---grey', 'RAW - AMAZON - GREY', '2020-03-01 05:43:21', '2020-08-24 01:27:16', 'dummy.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `country_name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'DS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua and Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegovina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei Darussalam'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CG', 'Congo'),
(50, 'CK', 'Cook Islands'),
(51, 'CR', 'Costa Rica'),
(52, 'HR', 'Croatia (Hrvatska)'),
(53, 'CU', 'Cuba'),
(54, 'CY', 'Cyprus'),
(55, 'CZ', 'Czech Republic'),
(56, 'DK', 'Denmark'),
(57, 'DJ', 'Djibouti'),
(58, 'DM', 'Dominica'),
(59, 'DO', 'Dominican Republic'),
(60, 'TP', 'East Timor'),
(61, 'EC', 'Ecuador'),
(62, 'EG', 'Egypt'),
(63, 'SV', 'El Salvador'),
(64, 'GQ', 'Equatorial Guinea'),
(65, 'ER', 'Eritrea'),
(66, 'EE', 'Estonia'),
(67, 'ET', 'Ethiopia'),
(68, 'FK', 'Falkland Islands (Malvinas)'),
(69, 'FO', 'Faroe Islands'),
(70, 'FJ', 'Fiji'),
(71, 'FI', 'Finland'),
(72, 'FR', 'France'),
(73, 'FX', 'France, Metropolitan'),
(74, 'GF', 'French Guiana'),
(75, 'PF', 'French Polynesia'),
(76, 'TF', 'French Southern Territories'),
(77, 'GA', 'Gabon'),
(78, 'GM', 'Gambia'),
(79, 'GE', 'Georgia'),
(80, 'DE', 'Germany'),
(81, 'GH', 'Ghana'),
(82, 'GI', 'Gibraltar'),
(83, 'GK', 'Guernsey'),
(84, 'GR', 'Greece'),
(85, 'GL', 'Greenland'),
(86, 'GD', 'Grenada'),
(87, 'GP', 'Guadeloupe'),
(88, 'GU', 'Guam'),
(89, 'GT', 'Guatemala'),
(90, 'GN', 'Guinea'),
(91, 'GW', 'Guinea-Bissau'),
(92, 'GY', 'Guyana'),
(93, 'HT', 'Haiti'),
(94, 'HM', 'Heard and Mc Donald Islands'),
(95, 'HN', 'Honduras'),
(96, 'HK', 'Hong Kong'),
(97, 'HU', 'Hungary'),
(98, 'IS', 'Iceland'),
(99, 'IN', 'India'),
(100, 'IM', 'Isle of Man'),
(101, 'ID', 'Indonesia'),
(102, 'IR', 'Iran (Islamic Republic of)'),
(103, 'IQ', 'Iraq'),
(104, 'IE', 'Ireland'),
(105, 'IL', 'Israel'),
(106, 'IT', 'Italy'),
(107, 'CI', 'Ivory Coast'),
(108, 'JE', 'Jersey'),
(109, 'JM', 'Jamaica'),
(110, 'JP', 'Japan'),
(111, 'JO', 'Jordan'),
(112, 'KZ', 'Kazakhstan'),
(113, 'KE', 'Kenya'),
(114, 'KI', 'Kiribati'),
(115, 'KP', 'Korea, Democratic People\'s Republic of'),
(116, 'KR', 'Korea, Republic of'),
(117, 'XK', 'Kosovo'),
(118, 'KW', 'Kuwait'),
(119, 'KG', 'Kyrgyzstan'),
(120, 'LA', 'Lao People\'s Democratic Republic'),
(121, 'LV', 'Latvia'),
(122, 'LB', 'Lebanon'),
(123, 'LS', 'Lesotho'),
(124, 'LR', 'Liberia'),
(125, 'LY', 'Libyan Arab Jamahiriya'),
(126, 'LI', 'Liechtenstein'),
(127, 'LT', 'Lithuania'),
(128, 'LU', 'Luxembourg'),
(129, 'MO', 'Macau'),
(130, 'MK', 'Macedonia'),
(131, 'MG', 'Madagascar'),
(132, 'MW', 'Malawi'),
(133, 'MY', 'Malaysia'),
(134, 'MV', 'Maldives'),
(135, 'ML', 'Mali'),
(136, 'MT', 'Malta'),
(137, 'MH', 'Marshall Islands'),
(138, 'MQ', 'Martinique'),
(139, 'MR', 'Mauritania'),
(140, 'MU', 'Mauritius'),
(141, 'TY', 'Mayotte'),
(142, 'MX', 'Mexico'),
(143, 'FM', 'Micronesia, Federated States of'),
(144, 'MD', 'Moldova, Republic of'),
(145, 'MC', 'Monaco'),
(146, 'MN', 'Mongolia'),
(147, 'ME', 'Montenegro'),
(148, 'MS', 'Montserrat'),
(149, 'MA', 'Morocco'),
(150, 'MZ', 'Mozambique'),
(151, 'MM', 'Myanmar'),
(152, 'NA', 'Namibia'),
(153, 'NR', 'Nauru'),
(154, 'NP', 'Nepal'),
(155, 'NL', 'Netherlands'),
(156, 'AN', 'Netherlands Antilles'),
(157, 'NC', 'New Caledonia'),
(158, 'NZ', 'New Zealand'),
(159, 'NI', 'Nicaragua'),
(160, 'NE', 'Niger'),
(161, 'NG', 'Nigeria'),
(162, 'NU', 'Niue'),
(163, 'NF', 'Norfolk Island'),
(164, 'MP', 'Northern Mariana Islands'),
(165, 'NO', 'Norway'),
(166, 'OM', 'Oman'),
(167, 'PK', 'Pakistan'),
(168, 'PW', 'Palau'),
(169, 'PS', 'Palestine'),
(170, 'PA', 'Panama'),
(171, 'PG', 'Papua New Guinea'),
(172, 'PY', 'Paraguay'),
(173, 'PE', 'Peru'),
(174, 'PH', 'Philippines'),
(175, 'PN', 'Pitcairn'),
(176, 'PL', 'Poland'),
(177, 'PT', 'Portugal'),
(178, 'PR', 'Puerto Rico'),
(179, 'QA', 'Qatar'),
(180, 'RE', 'Reunion'),
(181, 'RO', 'Romania'),
(182, 'RU', 'Russian Federation'),
(183, 'RW', 'Rwanda'),
(184, 'KN', 'Saint Kitts and Nevis'),
(185, 'LC', 'Saint Lucia'),
(186, 'VC', 'Saint Vincent and the Grenadines'),
(187, 'WS', 'Samoa'),
(188, 'SM', 'San Marino'),
(189, 'ST', 'Sao Tome and Principe'),
(190, 'SA', 'Saudi Arabia'),
(191, 'SN', 'Senegal'),
(192, 'RS', 'Serbia'),
(193, 'SC', 'Seychelles'),
(194, 'SL', 'Sierra Leone'),
(195, 'SG', 'Singapore'),
(196, 'SK', 'Slovakia'),
(197, 'SI', 'Slovenia'),
(198, 'SB', 'Solomon Islands'),
(199, 'SO', 'Somalia'),
(200, 'ZA', 'South Africa'),
(201, 'GS', 'South Georgia South Sandwich Islands'),
(202, 'SS', 'South Sudan'),
(203, 'ES', 'Spain'),
(204, 'LK', 'Sri Lanka'),
(205, 'SH', 'St. Helena'),
(206, 'PM', 'St. Pierre and Miquelon'),
(207, 'SD', 'Sudan'),
(208, 'SR', 'Suriname'),
(209, 'SJ', 'Svalbard and Jan Mayen Islands'),
(210, 'SZ', 'Swaziland'),
(211, 'SE', 'Sweden'),
(212, 'CH', 'Switzerland'),
(213, 'SY', 'Syrian Arab Republic'),
(214, 'TW', 'Taiwan'),
(215, 'TJ', 'Tajikistan'),
(216, 'TZ', 'Tanzania, United Republic of'),
(217, 'TH', 'Thailand'),
(218, 'TG', 'Togo'),
(219, 'TK', 'Tokelau'),
(220, 'TO', 'Tonga'),
(221, 'TT', 'Trinidad and Tobago'),
(222, 'TN', 'Tunisia'),
(223, 'TR', 'Turkey'),
(224, 'TM', 'Turkmenistan'),
(225, 'TC', 'Turks and Caicos Islands'),
(226, 'TV', 'Tuvalu'),
(227, 'UG', 'Uganda'),
(228, 'UA', 'Ukraine'),
(229, 'AE', 'United Arab Emirates'),
(230, 'GB', 'United Kingdom'),
(231, 'US', 'United States'),
(232, 'UM', 'United States minor outlying islands'),
(233, 'UY', 'Uruguay'),
(234, 'UZ', 'Uzbekistan'),
(235, 'VU', 'Vanuatu'),
(236, 'VA', 'Vatican City State'),
(237, 'VE', 'Venezuela'),
(238, 'VN', 'Vietnam'),
(239, 'VG', 'Virgin Islands (British)'),
(240, 'VI', 'Virgin Islands (U.S.)'),
(241, 'WF', 'Wallis and Futuna Islands'),
(242, 'EH', 'Western Sahara'),
(243, 'YE', 'Yemen'),
(244, 'ZR', 'Zaire'),
(245, 'ZM', 'Zambia'),
(246, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `coupens`
--

CREATE TABLE `coupens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupen_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` bigint(20) NOT NULL,
  `expiry_date` date NOT NULL,
  `amount_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupens`
--

INSERT INTO `coupens` (`id`, `coupen_code`, `amount`, `expiry_date`, `amount_type`, `status`, `created_at`, `updated_at`) VALUES
(5, 'YM53K4', 400, '2020-04-24', 'Fixed', 1, '2020-03-05 02:12:31', '2020-04-07 01:29:17'),
(6, 'YM53K5', 250, '2020-03-02', 'Fixed', 1, '2020-03-05 02:12:31', '2020-03-05 05:37:54'),
(7, 'YM53K6', 300, '2020-03-05', 'Fixed', 1, '2020-03-05 02:12:31', '2020-03-05 05:41:43'),
(8, 'YM53K7', 10, '2020-03-09', 'Percentage', 1, '2020-03-05 02:12:31', '2020-03-05 02:12:31');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_addresses`
--

CREATE TABLE `delivery_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_addresses`
--

INSERT INTO `delivery_addresses` (`id`, `user_id`, `user_email`, `name`, `address`, `city`, `state`, `country`, `mobile`, `zip`, `created_at`, `updated_at`) VALUES
(1, 2, 'generic@generic.com', 'Generic User', 'Suraj Miani Choak', 'Multan', 'Punjab', 'Pakistan', '03077456132', '66000', '2020-04-07 05:53:48', '2020-04-07 05:53:48'),
(2, 1, 'admin@admin.com', 'Admin User', 'Alamdar Choak', 'Multan', 'Punjab', 'Pakistan', '03057502419', '66000', '2020-04-07 13:53:06', '2020-04-07 13:53:06'),
(3, 16, 'danishhsafiq129@gmail.com', 'DAnish', 'Suraj Miani', 'Multan', 'Multan', 'Pakistan', '03098978789', '66000', '2020-06-08 07:27:36', '2020-06-08 07:27:36'),
(4, 20, 'alikashi@alikashi.com', 'Ali Kashi', 'Suraj Miani Choak', 'Multan', 'Punjab', 'Pakistan', '03077456132', '66000', '2020-08-18 14:23:44', '2020-08-18 14:23:44'),
(5, 21, 'kashif@ali.com', 'Kashif Ali Siddiqui', 'xcvcxv', 'xcvcxv', 'xcvcx', 'Andorra', '34534', '34534534', '2020-08-19 16:05:39', '2020-08-19 16:05:39'),
(6, 23, 'admin@admin.com', 'Hamza Ali', 'pjo', 'hjk', 'hjk', 'Albania', '7878', '787', '2020-08-23 22:06:49', '2020-08-25 07:43:45'),
(7, 24, 'uzair@gmail.com', 'Uzair Khaki', 'Azhar Floor Mills', 'Multan', 'Punjab', 'Pakistan', '03077656453', '66000', '2020-08-26 00:53:57', '2020-08-26 00:53:57');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_02_20_052131_create_products_table', 2),
(5, '2020_02_21_063214_create_categories_table', 3),
(6, '2020_02_21_094814_change_status_field_of_categories_table', 4),
(7, '2020_02_22_031240_add_category_id_field_in_products_table', 5),
(8, '2020_02_22_031720_change_category_id_field_in_products_table', 6),
(9, '2020_02_22_032156_delete_and_create_category_id_field_in_products_table', 7),
(10, '2020_02_22_032505_new_create_category_id_field_in_products_table', 8),
(11, '2020_02_24_042830_add_status_column_in_products_table', 9),
(12, '2020_02_24_102413_add_thumbnail_column_in_category_table', 10),
(13, '2020_02_24_103110_change_status_column_of_categories_table', 11),
(14, '2020_02_24_103634_add_status_field_in_categories_table', 12),
(15, '2020_02_26_161507_create_banners_table', 13),
(16, '2020_02_26_165124_change_image_field_in_banners_table', 14),
(17, '2020_02_26_182810_change_text_style_field_in_banners_table', 15),
(18, '2020_02_27_020520_add_text_style_field_again_in_banners_table', 16),
(19, '2020_02_27_020830_delete_status_field_in_banners_table_again', 17),
(20, '2020_02_27_020944_add_status_column_again_in_banners_table_with_boolean_type', 18),
(21, '2020_02_27_174655_create_product__attributes_table', 19),
(22, '2020_02_29_060009_create_product_images_table', 20),
(23, '2020_02_29_060350_add_product_id_field_in_product_images_table', 21),
(24, '2020_03_01_044513_add_featured_products_column_in_products_table', 22),
(25, '2020_03_01_062037_change_url_field_in_category_table', 23),
(26, '2020_03_01_062547_change_slug_field_in_category_table', 24),
(27, '2020_03_04_063336_create_carts_table', 25),
(28, '2020_03_04_071518_add_column_in_carts_table', 26),
(29, '2020_03_04_164718_create_coupens_table', 27),
(30, '2020_03_05_051325_add_new_column_in_coupens_table', 28),
(31, '2020_03_05_054458_change_status_column_in_coupens_table', 29),
(32, '2020_03_07_153236_add_new_column_in_products_table', 30),
(33, '2020_03_07_153814_change_care_column_in_products_table', 31),
(34, '2020_03_07_154210_add_new_column_in_products_table', 32),
(35, '2020_03_30_034116_create_roles_table', 33),
(36, '2020_03_30_034842_create_role_user_table', 34),
(37, '2020_03_30_045856_create_permissions_table', 35),
(38, '2020_03_30_050013_create_permission_role_table', 36),
(39, '2020_04_03_031239_add_title_field_in_permissions_table', 37),
(40, '2020_04_05_114818_create_delivery_addresses_table', 38),
(41, '2020_04_05_122434_create_shipping_addresses_table', 39),
(42, '2020_04_06_063135_change_shipping_addresses_table', 40),
(43, '2020_04_06_062900_change_delivery_addresses_table', 41),
(44, '2020_04_07_111912_create_orders_table', 42),
(45, '2020_04_07_111944_create_order_products_table', 43);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_charges` double(8,2) NOT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_amount` double(8,2) NOT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grand_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `user_email`, `name`, `address`, `city`, `state`, `zip`, `country`, `mobile`, `shipping_charges`, `coupon_code`, `coupon_amount`, `order_status`, `payment_method`, `grand_total`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin@admin.com', 'Admin User', 'Alamdar Choak', 'Multan', 'Punjab', '66000', 'Pakistan', '', 0.00, '', 0.00, 'New', 'COD', '2600', '2020-04-08 01:35:51', '2020-04-08 01:35:51'),
(2, 1, 'admin@admin.com', 'Admin User', 'Alamdar Choak', 'Multan', 'Punjab', '66000', 'Pakistan', '03057502419', 0.00, '', 0.00, 'New', 'COD', '2600', '2020-04-08 01:36:51', '2020-04-08 01:36:51'),
(3, 1, 'admin@admin.com', 'Admin User', 'Alamdar Choak', 'Multan', 'Punjab', '66000', 'Pakistan', '03057502419', 0.00, '', 0.00, 'New', 'COD', '2600', '2020-04-08 01:38:52', '2020-04-08 01:38:52'),
(4, 1, 'admin@admin.com', 'Admin User', 'Alamdar Choak', 'Multan', 'Punjab', '66000', 'Pakistan', '03057502419', 0.00, '', 0.00, 'New', 'COD', '2600', '2020-04-08 01:38:55', '2020-04-08 01:38:55'),
(5, 1, 'admin@admin.com', 'Admin User', 'Alamdar Choak', 'Multan', 'Punjab', '66000', 'Pakistan', '03057502419', 0.00, '', 0.00, 'New', 'COD', '2600', '2020-04-08 01:43:37', '2020-04-08 01:43:37'),
(6, 1, 'admin@admin.com', 'Admin User', 'Alamdar Choak', 'Multan', 'Punjab', '66000', 'Pakistan', '03057502419', 0.00, '', 0.00, 'New', 'COD', '2600', '2020-04-08 01:51:21', '2020-04-08 01:51:21'),
(7, 1, 'admin@admin.com', 'Admin User', 'Alamdar Choak', 'Multan', 'Punjab', '66000', 'Pakistan', '03057502419', 0.00, '', 0.00, 'New', 'COD', '2600', '2020-04-08 02:10:57', '2020-04-08 02:10:57'),
(8, 1, 'admin@admin.com', 'Admin User', 'Alamdar Choak', 'Multan', 'Punjab', '66000', 'Pakistan', '03057502419', 0.00, '', 0.00, 'New', 'COD', '2600', '2020-04-08 02:22:28', '2020-04-08 02:22:28'),
(9, 1, 'admin@admin.com', 'Admin User', 'Alamdar Choak', 'Multan', 'Punjab', '66000', 'Pakistan', '03057502419', 0.00, '', 0.00, 'New', 'COD', '2600', '2020-04-08 02:24:54', '2020-04-08 02:24:54'),
(10, 1, 'admin@admin.com', 'Admin User', 'Alamdar Choak', 'Multan', 'Punjab', '66000', 'Pakistan', '03057502419', 0.00, '', 400.00, 'New', 'COD', '3700', '2020-04-08 05:47:33', '2020-04-08 05:47:33'),
(11, 1, 'admin@admin.com', 'Admin User', 'Alamdar Choak', 'Multan', 'Punjab', '66000', 'Pakistan', '03057502419', 0.00, '', 0.00, 'New', 'COD', '3299', '2020-04-12 01:38:14', '2020-04-12 01:38:14'),
(12, 16, 'danishhsafiq129@gmail.com', 'DAnish', 'Suraj Miani', 'Multan', 'Multan', '66000', 'Pakistan', '03098978789', 0.00, '', 0.00, 'New', 'COD', '2400', '2020-06-08 07:27:56', '2020-06-08 07:27:56'),
(13, 20, 'alikashi@alikashi.com', 'Ali Kashi', 'Suraj Miani Choak', 'Multan', 'Punjab', '66000', 'Pakistan', '03077456132', 0.00, '', 0.00, 'New', 'COD', '35.91', '2020-08-18 14:42:36', '2020-08-18 14:42:36'),
(15, 21, 'kashif@ali.com', 'Kashif Ali Siddiqui', 'xcvcxv', 'xcvcxv', 'xcvcx', '34534534', 'Andorra', '34534', 0.00, '', 0.00, 'completed', 'COD', '1600', '2020-08-19 16:05:52', '2020-08-19 16:10:39'),
(16, 23, 'hamza@gmail.com', 'Hamza Ali', 'pjo', 'hjk', 'hjk', '787', 'Albania', '7878', 0.00, '', 0.00, 'pending', 'COD', '14000', '2020-08-23 22:07:08', '2020-08-23 22:07:08'),
(17, 23, 'admin@admin.com', 'Hamza Ali', 'pjo', 'hjk', 'hjk', '787', 'Albania', '7878', 0.00, '', 0.00, 'pending', 'COD', '4800', '2020-08-25 07:53:32', '2020-08-25 07:53:32'),
(18, 23, 'admin@admin.com', 'Hamza Ali', 'pjo', 'hjk', 'hjk', '787', 'Albania', '7878', 0.00, '', 0.00, 'pending', 'COD', '450', '2020-08-25 08:11:20', '2020-08-25 08:11:20'),
(19, 24, 'uzair@gmail.com', 'Uzair Khaki', 'Azhar Floor Mills', 'Multan', 'Punjab', '66000', 'Pakistan', '03077656453', 0.00, '', 0.00, 'pending', 'COD', '3500', '2020-08-26 02:27:49', '2020-08-26 02:27:49'),
(20, 23, 'admin@admin.com', 'Hamza Ali', 'pjo', 'hjk', 'hjk', '787', 'Albania', '7878', 0.00, '', 0.00, 'pending', 'Stripe', '2500', '2020-08-26 07:58:37', '2020-08-26 07:58:37'),
(21, 23, 'admin@admin.com', 'Hamza Ali', 'pjo', 'hjk', 'hjk', '787', 'Albania', '7878', 0.00, '', 0.00, 'pending', 'Stripe', '2500', '2020-08-26 07:59:26', '2020-08-26 07:59:26'),
(22, 24, 'uzair@gmail.com', 'Uzair Khaki', 'Azhar Floor Mills', 'Multan', 'Punjab', '66000', 'Pakistan', '03077656453', 0.00, '', 0.00, 'pending', 'Stripe', '2500', '2020-08-26 08:08:28', '2020-08-26 08:08:28');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double(8,2) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `user_id`, `order_id`, `product_id`, `product_code`, `product_name`, `product_size`, `product_color`, `product_price`, `product_qty`, `created_at`, `updated_at`) VALUES
(1, 1, 8, 2, '823947', 'Adidas Entrada 18 Senior Soccer Jersey Navy', 'MD', 'Red', 1200.00, 1, '2020-04-08 02:22:28', '2020-04-08 02:22:28'),
(2, 1, 8, 5, '23648', 'Adidas Senior Tiro 17 Training Jacket Blue', 'LG', 'Blue', 1400.00, 1, '2020-04-08 02:22:28', '2020-04-08 02:22:28'),
(3, 1, 9, 2, '823947', 'Adidas Entrada 18 Senior Soccer Jersey Navy', 'MD', 'Red', 1200.00, 1, '2020-04-08 02:24:54', '2020-04-08 02:24:54'),
(4, 1, 9, 5, '23648', 'Adidas Senior Tiro 17 Training Jacket Blue', 'LG', 'Blue', 1400.00, 1, '2020-04-08 02:24:54', '2020-04-08 02:24:54'),
(5, 1, 10, 5, '23648', 'Adidas Senior Tiro 17 Training Jacket Blue', 'MD', 'Blue', 1300.00, 1, '2020-04-08 05:47:33', '2020-04-08 05:47:33'),
(6, 1, 10, 2, '823947', 'Adidas Entrada 18 Senior Soccer Jersey Navy', 'MD', 'Red', 1200.00, 2, '2020-04-08 05:47:33', '2020-04-08 05:47:33'),
(7, 1, 11, 2, '823947', 'Adidas Entrada 18 Senior Soccer Jersey Navy', 'MD', 'Red', 1200.00, 2, '2020-04-12 01:38:14', '2020-04-12 01:38:14'),
(8, 1, 11, 6, '782734', 'Adidas Mens Core Slim Bottoms', 'MD', 'No Color', 899.00, 1, '2020-04-12 01:38:14', '2020-04-12 01:38:14'),
(9, 16, 12, 2, '823947', 'Adidas Entrada 18 Senior Soccer Jersey Navy', 'MD', 'Red', 1200.00, 2, '2020-06-08 07:27:56', '2020-06-08 07:27:56'),
(10, 23, 17, 3, '26486', 'Double Bowl', '0', 'Black-Red', 300.00, 2, '2020-08-25 07:53:33', '2020-08-25 07:53:33'),
(11, 23, 17, 6, '782734', 'Josera Kitten 2KG', '0', 'no-color', 2100.00, 2, '2020-08-25 07:53:33', '2020-08-25 07:53:33'),
(12, 23, 18, 15, 'no-code', 'Pet Medicine Feeding Kit', '0', 'no-color', 450.00, 1, '2020-08-25 08:11:21', '2020-08-25 08:11:21'),
(13, 24, 19, 2, '823947', 'Cat House cum Bed', '0', 'no-color', 2500.00, 1, '2020-08-26 02:27:49', '2020-08-26 02:27:49'),
(14, 24, 19, 5, '23648', 'Pet Carrier Purse', '0', 'no-color', 1000.00, 1, '2020-08-26 02:27:49', '2020-08-26 02:27:49'),
(15, 23, 20, 2, '823947', 'Cat House cum Bed', '0', 'no-color', 2500.00, 1, '2020-08-26 07:58:37', '2020-08-26 07:58:37'),
(16, 24, 22, 2, '823947', 'Cat House cum Bed', '0', 'no-color', 2500.00, 1, '2020-08-26 08:08:29', '2020-08-26 08:08:29');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `for` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `for`, `status`, `created_at`, `updated_at`) VALUES
(1, 'add-product', 'product', 0, '2020-04-03 02:06:44', '2020-04-03 02:06:44'),
(2, 'update-product', 'product', 0, '2020-04-03 02:06:44', '2020-04-03 02:06:44'),
(3, 'delete-product', 'product', 0, '2020-04-03 02:06:44', '2020-04-03 02:06:44'),
(6, 'Banner CRUD', 'banner', 0, '2020-04-03 06:34:00', '2020-04-03 08:18:41'),
(8, 'Category CRUD', 'category', 0, '2020-04-03 07:21:51', '2020-04-03 08:19:00'),
(9, 'Coupons CRUD', 'coupon', 0, '2020-04-03 07:25:15', '2020-04-03 08:19:17'),
(10, 'Permissions CRUD', 'permission', 0, '2020-04-03 07:26:10', '2020-04-03 08:19:33'),
(11, 'Roles CRUD', 'role', 0, '2020-04-03 07:26:32', '2020-04-03 08:19:49'),
(12, 'add-user', 'user', 0, '2020-04-03 07:45:54', '2020-04-03 07:45:54'),
(13, 'edit user', 'user', 0, '2020-04-03 07:47:17', '2020-04-03 07:47:17'),
(14, 'delete-user', 'user', 0, '2020-04-03 07:47:46', '2020-04-03 07:47:46');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) NOT NULL,
  `role_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 2, 3, NULL, NULL),
(2, 3, 3, NULL, NULL),
(3, 1, 1, NULL, NULL),
(4, 2, 1, NULL, NULL),
(5, 1, 4, NULL, NULL),
(6, 2, 4, NULL, NULL),
(7, 3, 4, NULL, NULL),
(8, 12, 5, NULL, NULL),
(9, 13, 5, NULL, NULL),
(10, 14, 5, NULL, NULL),
(11, 1, 5, NULL, NULL),
(12, 2, 5, NULL, NULL),
(13, 3, 5, NULL, NULL),
(14, 8, 5, NULL, NULL),
(15, 9, 5, NULL, NULL),
(16, 11, 5, NULL, NULL),
(17, 10, 5, NULL, NULL),
(18, 12, 1, NULL, NULL),
(19, 13, 1, NULL, NULL),
(20, 14, 1, NULL, NULL),
(21, 3, 1, NULL, NULL),
(22, 8, 1, NULL, NULL),
(23, 9, 1, NULL, NULL),
(24, 11, 1, NULL, NULL),
(25, 10, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `care` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock_in` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `stock_out` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `stock_remaining` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `featured_products` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `code`, `color`, `description`, `care`, `price`, `image`, `stock_in`, `stock_out`, `stock_remaining`, `created_at`, `updated_at`, `status`, `featured_products`) VALUES
(1, 5, 'Cat Dog Folding House', '12200', 'Black', 'Colors : Red and Orange\r\n\r\nSize : width 16″ x length 18″ x height 18″ \r\n\r\nfor cats and small size toy breed dogs\r\n\r\n \r\n\r\nCourier charges will vary according to city\r\n\r\nDelivery time 2-4 working days\r\n\r\nFor any inquiry please Call / WhatsApp 0333 3811332', '', '1500', 'products_10.92781343_660435174747398_425595005214654464_n-300x300.jpg', '5', '0', '0', '2020-03-01 02:17:06', '2020-08-25 07:30:58', 1, 1),
(2, 5, 'Cat House cum Bed', '823947', 'Red', 'Colors : Blue Red Pink Purple & Leopard print\r\n\r\nlarge : width 36cm x length 36cm x height 40cm \r\n\r\nExtra large : width 43cm x length 43cm x height 46cm \r\n\r\nfor cats and small size toy breed dogs\r\n\r\n \r\n\r\nCourier charges will vary according to city\r\n\r\nDelivery time 2-4 working days\r\n\r\nFor any inquiry please Call / WhatsApp 0333 3811332', '', '2500', 'products_614.66512578_432777967307952_2209568521250144256_n-600x600.jpg', '5', '3', '0', '2020-03-01 02:26:20', '2020-08-26 08:08:29', 1, 1),
(3, 6, 'Double Bowl', '26486', 'Black-Red', 'Size: width 5.5″  x  length 9.5″  x  height 2″\r\n\r\nColor : Blue Pink Green\r\n\r\nmaterial : plastic\r\n\r\n \r\n\r\nDelivery time 2-4 working days\r\n\r\nFor any inquiry please Call / WhatsApp 0333 3811332', '', '300', 'products_196.66854661_358868838119337_5968901971795509248_n-600x600.jpg', '0', '2', '0', '2020-03-01 04:20:23', '2020-08-25 07:53:33', 1, 1),
(4, 7, 'Pet Carrier Large', '27384', 'Black', 'Adidas Senior Core Hoodie Sweatshirt Jumper Hooded Top Fleece Pullover Black are available in different Color & sizes.', '', '4500', 'products_254.IMG_20181011_133131-600x800.jpg', '20', '0', '0', '2020-03-01 04:28:08', '2020-08-25 06:52:50', 1, 1),
(5, 7, 'Pet Carrier Purse', '23648', 'Blue', 'Best for cats and small dogs\r\nSize : 45cm x 21cm x 22 cm \r\nColor : Camo Green\r\n \r\n\r\nDelivery time 2-4 working days\r\n\r\nFor any inquiry please Call / WhatsApp 0333 3811332', '', '1000', 'products_285.b1-600x505.jpg', '12', '1', '0', '2020-03-01 04:39:29', '2020-08-26 02:27:49', 1, 1),
(6, 12, 'Josera Kitten 2KG', '782734', 'No Color', 'Optimal nutrition is especially important while the cat is growing up and later in pregnancy and during lactation. JOSERA Minette is a high-energy, easily digestible and particularly tasty feed for growing cats.\r\n\r\nExcellent for the first year of your Cat?s life and during pregnancy and lactation\r\n With plenty of energy for the special needs in the most crucial phases of life\r\n Easy to digest\r\n Contains dietary fibre to help prevent hairball formation', '', '2100', 'products_485.josera-minette-cat-food-package.png', '1', '2', '0', '2020-03-01 04:51:51', '2020-08-25 07:53:33', 1, 1),
(7, 16, 'VITON Electro Plus', '978688', 'Black', 'Birds Nutritional Supplements\r\nQuantity: 80 gms\r\nfor parrot use only\r\n \r\n\r\nDelivery time 2-4 working days\r\n\r\nFor any inquiry please Call / WhatsApp 0333 3811332', '', '200', 'products_540.98011357_170210341034793_4702398772850720768_n-600x600.jpg', '15', '0', '0', '2020-03-01 05:06:58', '2020-08-25 06:53:34', 1, 1),
(13, 17, 'Optimum Fish Food', '432224', 'purple', 'Company : Optimum\r\n\r\nQuantity : 100 gms\r\n\r\nHighly Nutritious Food for all Aquarium Fish\r\n\r\n \r\n\r\nDelivery time 2-4 working days\r\n\r\nFor any inquiry please Call / WhatsApp 0333 3811332', '', '200', 'products_379.44-600x600.jpg', '40', '0', '0', '2020-08-24 02:07:24', '2020-08-25 06:53:48', 1, 1),
(14, 19, 'Cat Harness with leash set', '345435', 'multi color', 'Colors : Blue Red Green Pink\r\n\r\nNote : Random color will be send\r\n\r\n \r\n\r\nDelivery time 2-4 working days\r\n\r\nFor any inquiry please Call / WhatsApp 0333 3811332', '', '450', 'products_283.IMG_20180901_231339.jpg', '0', '0', '0', '2020-08-24 02:09:38', '2020-08-24 02:11:17', 1, 1),
(15, 6, 'Pet Medicine Feeding Kit', 'no-code', 'no-color', 'Material: Plastic+Silica\r\nColor: RED & BLUE\r\nWeight: 30g\r\nSize: Length 15cm Width 6cm', 'no-material&care', '450', 'products_349.HTB1BDvpaUT1gK0jSZFhq6yAtVXaD-600x600.jpg', '4', '1', '5', '2020-08-25 06:31:39', '2020-08-25 08:11:21', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(22, 8, 'products_865.0051754_under-armour-mens-curved-cap-red.jpeg', '2020-03-01 05:23:12', '2020-03-01 05:23:12'),
(23, 1, 'products_153.92403033_224117588817864_6623848509789437952_n-300x300.jpg', '2020-08-24 01:42:17', '2020-08-24 01:42:17'),
(24, 1, 'products_194.92544860_826481834521311_5042387400454569984_n.jpg', '2020-08-24 01:42:18', '2020-08-24 01:42:18'),
(25, 1, 'products_305.92779697_1781662258625044_1807506573858177024_n (1).jpg', '2020-08-24 01:42:19', '2020-08-24 01:42:19'),
(26, 1, 'products_455.92779697_1781662258625044_1807506573858177024_n.jpg', '2020-08-24 01:42:20', '2020-08-24 01:42:20'),
(27, 2, 'products_972.47076715_2197325473620447_5382916566872489984_n.jpg', '2020-08-24 01:47:49', '2020-08-24 01:47:49'),
(28, 2, 'products_746.47084968_568679270242430_7489796392920023040_n.jpg', '2020-08-24 01:47:50', '2020-08-24 01:47:50'),
(29, 2, 'products_128.LogoLicious_20181204_065810.jpg', '2020-08-24 01:47:51', '2020-08-24 01:47:51'),
(30, 2, 'products_723.LogoLicious_20181204_065848.jpg', '2020-08-24 01:47:52', '2020-08-24 01:47:52'),
(31, 2, 'products_458.LogoLicious_20181204_070128.jpg', '2020-08-24 01:47:53', '2020-08-24 01:47:53'),
(32, 3, 'products_716.66854661_358868838119337_5968901971795509248_n-600x600.jpg', '2020-08-24 01:52:18', '2020-08-24 01:52:18'),
(33, 3, 'products_534.67303992_725228541245955_6806196684985466880_n.jpg', '2020-08-24 01:52:19', '2020-08-24 01:52:19'),
(34, 3, 'products_982.67314186_457014285097275_8479020089532743680_n.jpg', '2020-08-24 01:52:19', '2020-08-24 01:52:19'),
(35, 4, 'products_954.54417696_428990634536599_716428694188457984_n.jpg', '2020-08-24 01:55:16', '2020-08-24 01:55:16'),
(36, 4, 'products_833.54800276_2222012181400878_892326408326479872_n.jpg', '2020-08-24 01:55:17', '2020-08-24 01:55:17'),
(37, 4, 'products_801.55498074_321507008504882_2387492665382928384_n.jpg', '2020-08-24 01:55:17', '2020-08-24 01:55:17'),
(38, 5, 'products_298.70216423_428288704470987_152474830816411648_n.jpg', '2020-08-24 01:58:44', '2020-08-24 01:58:44'),
(39, 5, 'products_195.70265288_399459074334489_635291977373450240_n.jpg', '2020-08-24 01:58:45', '2020-08-24 01:58:45'),
(40, 5, 'products_33.70446149_441550946706457_100021108194934784_n.jpg', '2020-08-24 01:58:46', '2020-08-24 01:58:46'),
(41, 5, 'products_944.b1-600x505.jpg', '2020-08-24 01:58:46', '2020-08-24 01:58:46'),
(42, 5, 'products_853.b2.jpg', '2020-08-24 01:58:46', '2020-08-24 01:58:46'),
(43, 5, 'products_107.b3.jpg', '2020-08-24 01:58:46', '2020-08-24 01:58:46'),
(44, 7, 'products_882.97387119_522637781740433_5880443503971926016_n.jpg', '2020-08-24 02:03:59', '2020-08-24 02:03:59'),
(45, 13, 'products_182.44-600x600.jpg', '2020-08-24 02:07:47', '2020-08-24 02:07:47'),
(46, 14, 'products_913.1.jpg', '2020-08-24 02:10:32', '2020-08-24 02:10:32'),
(47, 14, 'products_306.2.jpg', '2020-08-24 02:10:34', '2020-08-24 02:10:34'),
(48, 14, 'products_30.IMG_20180901_231256.jpg', '2020-08-24 02:10:35', '2020-08-24 02:10:35'),
(49, 14, 'products_781.IMG_20180901_231339.jpg', '2020-08-24 02:10:36', '2020-08-24 02:10:36'),
(50, 15, 'products_83.72525705_927216177660180_2287332395952635904_n.jpg', '2020-08-25 06:35:30', '2020-08-25 06:35:30'),
(51, 15, 'products_166.72816499_1465828733568058_8524783382683451392_n.jpg', '2020-08-25 06:35:31', '2020-08-25 06:35:31'),
(52, 15, 'products_543.HTB1HN2qaQL0gK0jSZFtq6xQCXXat.jpg', '2020-08-25 06:35:32', '2020-08-25 06:35:32'),
(53, 15, 'products_71.HTB116nqaO_1gK0jSZFqq6ApaXXaI.jpg', '2020-08-25 06:35:32', '2020-08-25 06:35:32');

-- --------------------------------------------------------

--
-- Table structure for table `product__attributes`
--

CREATE TABLE `product__attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `stock` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product__attributes`
--

INSERT INTO `product__attributes` (`id`, `product_id`, `sku`, `size`, `price`, `stock`, `created_at`, `updated_at`) VALUES
(1, 1, '4058031570227', 'SM', 500, 10, '2020-03-01 02:20:45', '2020-03-01 02:20:45'),
(2, 1, '40580315702223', 'MD', 700, 10, '2020-03-01 02:20:45', '2020-03-01 02:20:45'),
(3, 1, '40580315702734', 'LG', 900, 10, '2020-03-01 02:20:45', '2020-03-01 02:20:45'),
(4, 1, '40580315702766', 'XL', 1000, 10, '2020-03-01 02:20:45', '2020-03-01 02:20:45'),
(5, 2, '4058031604760', 'SM', 1000, 10, '2020-03-01 02:29:23', '2020-03-01 02:29:23'),
(6, 2, '40580316047623', 'MD', 1200, 10, '2020-03-01 02:29:23', '2020-03-01 02:29:23'),
(7, 2, '405803160476878', 'LG', 1400, 10, '2020-03-01 02:29:23', '2020-03-01 02:29:23'),
(8, 2, '4058031604766', 'XL', 1600, 10, '2020-03-01 02:29:24', '2020-03-01 02:29:24'),
(9, 3, '4054074734329', 'SM', 1400, 10, '2020-03-01 04:21:45', '2020-03-01 04:21:45'),
(10, 3, '4054074734333', 'MD', 1600, 10, '2020-03-01 04:21:45', '2020-03-01 04:21:45'),
(11, 3, '40540747343290', 'LG', 1800, 10, '2020-03-01 04:21:45', '2020-03-01 04:21:45'),
(12, 3, '40540747343234', 'XL', 2000, 10, '2020-03-01 04:21:45', '2020-03-01 04:21:45'),
(13, 4, '9823742938472349', 'SM', 3000, 10, '2020-03-01 04:29:53', '2020-03-01 04:29:53'),
(14, 4, '23947923832974', 'MD', 3400, 10, '2020-03-01 04:29:53', '2020-03-01 04:29:53'),
(15, 4, '9237493247923', 'LG', 3600, 10, '2020-03-01 04:29:53', '2020-03-01 04:29:53'),
(16, 4, '72938473894729', 'XL', 4000, 10, '2020-03-01 04:29:53', '2020-03-01 04:29:53'),
(17, 5, '4057288169062', 'SM', 1200, 10, '2020-03-01 04:41:29', '2020-03-01 04:41:29'),
(18, 5, '40572881690623', 'MD', 1300, 10, '2020-03-01 04:41:29', '2020-03-01 04:41:29'),
(19, 5, '40572881690688', 'LG', 1400, 10, '2020-03-01 04:41:29', '2020-03-01 04:41:29'),
(20, 5, '4057288169000', 'XL', 1500, 10, '2020-03-01 04:41:29', '2020-03-01 04:41:29'),
(21, 6, '0993084723498', 'SM', 700, 10, '2020-03-01 04:53:42', '2020-03-01 04:53:42'),
(22, 6, '93847329847', 'MD', 899, 5, '2020-03-01 04:53:42', '2020-03-01 04:53:42'),
(23, 6, '8923749837498', 'LG', 999, 4, '2020-03-01 04:53:42', '2020-03-01 04:53:42'),
(24, 6, '9827394837384', 'XL', 1099, 10, '2020-03-01 04:53:43', '2020-03-01 04:53:43'),
(25, 7, '92837498832947', 'LG', 800, 5, '2020-03-01 05:08:13', '2020-03-01 05:08:13'),
(26, 7, '29837489', 'XL', 900, 2, '2020-03-01 05:08:13', '2020-03-01 05:08:13');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', '', '2020-04-03 02:06:45', '2020-04-04 11:18:37'),
(2, 'user', '', '2020-04-03 02:06:45', '2020-04-04 11:23:57'),
(3, 'Admin', '', '2020-04-03 02:06:45', '2020-04-04 11:24:15');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 2, NULL, NULL),
(3, 3, 3, NULL, NULL),
(5, 2, 4, NULL, NULL),
(6, 3, 4, NULL, NULL),
(8, 2, 5, NULL, NULL),
(9, 3, 6, NULL, NULL),
(10, 4, 6, NULL, NULL),
(11, 1, 4, NULL, NULL),
(12, 4, 4, NULL, NULL),
(13, 2, 7, NULL, NULL),
(14, 2, 9, NULL, NULL),
(15, 2, 10, NULL, NULL),
(16, 2, 11, NULL, NULL),
(17, 2, 12, NULL, NULL),
(18, 2, 13, NULL, NULL),
(19, 2, 14, NULL, NULL),
(20, 2, 15, NULL, NULL),
(21, 2, 16, NULL, NULL),
(22, 2, 19, NULL, NULL),
(23, 2, 20, NULL, NULL),
(24, 2, 21, NULL, NULL),
(25, 2, 22, NULL, NULL),
(26, 1, 23, NULL, NULL),
(27, 2, 24, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_addresses`
--

CREATE TABLE `shipping_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_addresses`
--

INSERT INTO `shipping_addresses` (`id`, `user_id`, `user_email`, `name`, `address`, `city`, `state`, `country`, `mobile`, `zip`, `created_at`, `updated_at`) VALUES
(1, 2, 'generic@generic.com', 'Generic User', 'Suraj Miani Choak', 'Multan', 'Punjab', 'Pakistan', '03077456132', '77000', '2020-04-07 05:53:48', '2020-04-07 05:56:24'),
(2, 1, 'admin@admin.com', 'Admin User', 'Alamdar Choak', 'Multan', 'Punjab', 'Pakistan', '03057502419', '66000', '2020-04-07 13:53:06', '2020-04-07 13:53:06'),
(3, 16, 'danishhsafiq129@gmail.com', 'DAnish', 'Suraj Miani', 'Multan', 'Multan', 'Pakistan', '03098978789', '66000', '2020-06-08 07:27:36', '2020-06-08 07:27:36'),
(4, 20, 'alikashi@alikashi.com', 'Ali Kashi', 'Suraj Miani Choak', 'Multan', 'Punjab', 'Pakistan', '03077456132', '66000', '2020-08-18 14:23:44', '2020-08-18 14:23:44'),
(5, 21, 'kashif@ali.com', 'Kashif Ali Siddiqui', 'xcvcxv', 'xcvcxv', 'xcvcx', 'Andorra', '34534', '34534534', '2020-08-19 16:05:39', '2020-08-19 16:05:39'),
(6, 23, 'admin@admin.com', 'Hamza Ali', 'pjo', 'hjk', 'hjk', 'Albania', '7878', '787', '2020-08-23 22:06:49', '2020-08-25 07:43:45'),
(7, 24, 'uzair@gmail.com', 'Uzair Khaki', 'Azhar Floor Mills', 'Multan', 'Punjab', 'Pakistan', '03077656453', '66000', '2020-08-26 00:53:57', '2020-08-26 00:53:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Generic User', 'generic@generic.com', NULL, '$2y$10$N7r1hnvqJerLXek/R5PbqOZGx1rBjEmeKfUxf/jbOLRUf9MeKteqS', NULL, '2020-04-03 02:06:47', '2020-04-03 02:06:47'),
(3, 'Sub Admin subAdmin', 'subadmin@subadmin.com', NULL, '$2y$10$7shcjzKSR6me1oIbqQAjOeaNi4pmix.BorezloMaTNfptRkcy9xeO', NULL, '2020-04-03 02:06:48', '2020-04-03 02:06:48'),
(4, 'Super Admin 1', 'superadmin1@superadmin1.com', NULL, '$2y$10$JiwfqWEHHLRX/8IbdD2qJu6FnxDRilcn6iU76tvG5heXUguZZhcim', NULL, '2020-04-04 10:22:18', '2020-04-04 10:50:04'),
(7, 'kashif@gmail.com', '', NULL, '$2y$10$mkCvNZappoKgOMeqNKKsAussAiXKEs1GngCpJ72RCchp4MIssGsFG', NULL, '2020-04-05 02:10:22', '2020-04-05 02:10:22'),
(9, 'salman', 'salman@gmail.com', NULL, '$2y$10$xuJb4/atiWKYVkNW2/K1vuVWsi00CdsUADn7jU34yZiDHiUh74mcq', NULL, '2020-04-05 02:13:32', '2020-04-05 02:13:32'),
(10, 'Kumail Ali', 'kumail@kumail.com', NULL, '$2y$10$teL6TdOF.dKS1d5RUqFUpOfWGCSJqV6SYzUJ0du7euh.uxzLaIqtm', NULL, '2020-04-05 02:14:30', '2020-04-05 02:14:30'),
(11, 'Mohammad Zeeshan', 'zeeshan@zeeshan.com', NULL, '$2y$10$1oS1/ORGurPg2iVrm/UqauNBZYKfVXfmL7qxOsxtVLXkauhfZhHVS', NULL, '2020-04-05 02:15:07', '2020-04-05 02:15:07'),
(12, 'Ali Abbas', 'aliabbas@gmail.com', NULL, '$2y$10$I9wP6yShUTkZhziTfuwQUecEP6Hj0DioAA3PYF5uKR7rB3E5a0rci', NULL, '2020-04-05 02:15:46', '2020-04-05 02:15:46'),
(13, 'haider ali', 'haider@haider.com', NULL, '$2y$10$CJ/R/s5LCHLIboFi7BZpseCO0egSqRST95tQnI3/MrEp3R0bG42FC', NULL, '2020-04-05 02:22:51', '2020-04-05 02:22:51'),
(14, 'Sajjad Ijaz', 'sajjadmola@sajjadmola.com', NULL, '$2y$10$nyJh9/BHpFfCgh9GwCelfOnKQ2UvFcYjUtSb.FXGYJpwzShW8Y4D6', NULL, '2020-04-05 02:29:42', '2020-04-05 02:29:42'),
(15, 'kashifali', 'kashif@kashif.com', NULL, '$2y$10$zGywByfuhduZGg3xPk/sdegZX5ogBawjN6tqfX7rMZWeowNcZL7pW', NULL, '2020-05-05 11:31:16', '2020-05-05 11:31:16'),
(16, 'DAnish', 'danishhsafiq129@gmail.com', NULL, '$2y$10$vW/Jmqon7ibkHLpCnfH9xOy8vzjNW8FmCCXIvOBzl.24JYTp4uFGu', NULL, '2020-06-08 07:13:28', '2020-06-08 07:13:28'),
(19, 'Kashif User', 'kashif@kashif2.com', NULL, '$2y$10$NaNYJNV8wAyPVXFosw424OcOIy.DGLXqgDgjdznyD0LuV/ktcG6Tu', NULL, '2020-08-16 15:55:14', '2020-08-16 15:55:14'),
(20, 'Siddiqui Kashif', 'siddiqui@gmail.com', NULL, '$2y$10$Ktwbw/3WAAbuyOHtk27iTe7SnHsTzg/V6dCXc9dtafHPQrKTA/UAi', NULL, '2020-08-18 02:46:34', '2020-08-18 17:03:10'),
(21, 'Kashif Ali Siddiqui', 'kashif@ali.com', NULL, '$2y$10$6MGe3gMorW5JFO646xSHf.6l8fPMju6ZID/EoEO55HaJyR6eaMYq2', NULL, '2020-08-19 15:06:32', '2020-08-19 15:06:32'),
(22, 'User', 'user@user.com', NULL, '$2y$10$DSCVh5W84eDaqrh/P7/6k.1E0iUNhkdtTESvgvUsXiwE2pCjXpo9y', NULL, '2020-08-20 05:00:07', '2020-08-24 05:28:33'),
(23, 'Admin', 'admin@admin.com', NULL, '$2y$10$qZhC2H70/TuzI0lNaNuBsOEjvgAo6S0nfrHd/0sCQWD0LsSve5PnG', NULL, '2020-08-23 22:02:41', '2020-08-25 08:50:45'),
(24, 'Uzair Khaki', 'uzair@gmail.com', NULL, '$2y$10$Qh/Wkhe9hexfti6Kqc6xIuM2K5l0U9rKuCJLvuM.Jgfl2TrBvme6O', NULL, '2020-08-26 00:51:41', '2020-08-26 00:51:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupens`
--
ALTER TABLE `coupens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_addresses`
--
ALTER TABLE `delivery_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
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
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product__attributes`
--
ALTER TABLE `product__attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
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
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `coupens`
--
ALTER TABLE `coupens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `delivery_addresses`
--
ALTER TABLE `delivery_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `product__attributes`
--
ALTER TABLE `product__attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
