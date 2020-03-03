-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.6-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for db_keyland
CREATE DATABASE IF NOT EXISTS `db_keyland` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_keyland`;

-- Dumping structure for table db_keyland.city_municipality
CREATE TABLE IF NOT EXISTS `city_municipality` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `province_id` int(11) NOT NULL,
  `city_municipality` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_keyland.city_municipality: ~101 rows (approximately)
/*!40000 ALTER TABLE `city_municipality` DISABLE KEYS */;
INSERT INTO `city_municipality` (`id`, `province_id`, `city_municipality`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Alburquerque', '2019-12-23 12:17:31', '2019-12-23 12:17:31'),
	(2, 1, 'Alicia', '2019-12-23 12:17:46', '2019-12-23 12:17:48'),
	(3, 1, 'Anda', '2019-12-23 12:17:56', '2019-12-23 12:17:56'),
	(4, 1, 'Antequera', '2019-12-23 12:18:08', '2019-12-23 12:18:08'),
	(5, 1, 'Baclayon', '2019-12-23 12:18:19', '2019-12-23 12:18:19'),
	(6, 1, 'Balilihan', '2019-12-23 12:18:47', '2019-12-23 12:18:48'),
	(7, 1, 'Batuan', '2019-12-23 12:19:19', '2019-12-23 12:19:19'),
	(8, 1, 'Bien Unido', '2019-12-23 12:19:31', '2019-12-23 12:19:31'),
	(9, 1, 'Bilar', '2019-12-23 12:19:40', '2019-12-23 12:19:40'),
	(10, 1, 'Buenavista', '2019-12-23 12:19:44', '2019-12-23 12:19:44'),
	(11, 1, 'Calape', '2019-12-23 12:20:12', '2019-12-23 12:20:13'),
	(12, 1, 'Candijay', '2019-12-23 12:20:22', '2019-12-23 12:20:23'),
	(13, 1, 'Carmen', '2019-12-23 12:20:29', '2019-12-23 12:20:29'),
	(14, 1, 'Catigbian', '2019-12-23 12:20:37', '2019-12-23 12:20:38'),
	(15, 1, 'Clarin', '2019-12-23 12:20:51', '2019-12-23 12:20:51'),
	(16, 1, 'Corella', '2019-12-23 12:21:32', '2019-12-23 12:21:33'),
	(17, 1, 'Cortes', '2019-12-23 12:21:35', '2019-12-23 12:21:36'),
	(18, 1, 'Dagohoy', '2019-12-23 12:22:05', '2019-12-23 12:22:05'),
	(19, 1, 'Danao', '2019-12-23 12:22:11', '2019-12-23 12:22:12'),
	(20, 1, 'Dauis', '2019-12-23 12:22:19', '2019-12-23 12:22:19'),
	(21, 1, 'Dimiao', '2019-12-23 12:22:55', '2019-12-23 12:22:56'),
	(22, 1, 'Duero', '2019-12-23 12:23:01', '2019-12-23 12:23:01'),
	(23, 1, 'Garcia Hernandez', '2019-12-23 12:23:06', '2019-12-23 12:23:06'),
	(24, 1, 'Guindulman', '2019-12-23 12:23:15', '2019-12-23 12:23:15'),
	(25, 1, 'Inabanga', '2019-12-23 12:23:24', '2019-12-23 12:23:24'),
	(26, 1, 'Jagna', '2019-12-23 12:23:29', '2019-12-23 12:23:29'),
	(27, 1, 'Jetafe', '2019-12-23 12:23:37', '2019-12-23 12:23:37'),
	(28, 1, 'Lila', '2019-12-23 12:23:41', '2019-12-23 12:23:41'),
	(29, 1, 'Loay', '2019-12-23 12:23:45', '2019-12-23 12:23:45'),
	(30, 1, 'Loboc', '2019-12-23 12:23:51', '2019-12-23 12:23:51'),
	(31, 1, 'Loon', '2019-12-23 12:26:23', '2019-12-23 12:26:23'),
	(32, 1, 'Mabini', '2019-12-23 12:26:27', '2019-12-23 12:26:27'),
	(33, 1, 'Maribojoc', '2019-12-23 12:26:31', '2019-12-23 12:26:31'),
	(34, 1, 'Panglao', '2019-12-23 12:26:35', '2019-12-23 12:26:35'),
	(35, 1, 'Pilar', '2019-12-23 12:26:39', '2019-12-23 12:26:39'),
	(36, 1, 'Pitogo', '2019-12-23 12:26:43', '2019-12-23 12:26:43'),
	(37, 1, 'Sagbayan', '2019-12-23 12:26:48', '2019-12-23 12:26:48'),
	(38, 1, 'San Isidro', '2019-12-23 12:28:04', '2019-12-23 12:28:05'),
	(39, 1, 'San Miquel', '2019-12-23 12:28:11', '2019-12-23 12:28:11'),
	(40, 1, 'Sevilla', '2019-12-23 12:28:14', '2019-12-23 12:28:15'),
	(41, 1, 'Sierra Bullones', '2019-12-23 12:28:18', '2019-12-23 12:28:20'),
	(42, 1, 'Sikatuna', '2019-12-23 12:28:24', '2019-12-23 12:28:24'),
	(43, 1, 'Tagbilaran', '2019-12-23 12:28:28', '2019-12-23 12:28:28'),
	(44, 1, 'Talibon', '2019-12-23 12:28:32', '2019-12-23 12:28:33'),
	(45, 1, 'Trinidad', '2019-12-23 12:28:40', '2019-12-23 12:28:40'),
	(46, 1, 'Tubigon', '2019-12-23 12:28:44', '2019-12-23 12:28:44'),
	(47, 1, 'Ubay', '2019-12-23 12:28:49', '2019-12-23 12:28:49'),
	(48, 1, 'Valencia', '2019-12-23 12:31:01', '2019-12-23 12:31:01'),
	(49, 2, 'Alcantara', '2019-12-23 12:37:14', '2019-12-23 12:37:14'),
	(50, 2, 'Alcoy', '2019-12-23 12:37:20', '2019-12-23 12:37:20'),
	(51, 2, 'Alegria', '2019-12-23 12:37:24', '2019-12-23 12:37:24'),
	(52, 2, 'Aloguinsan', '2019-12-23 12:37:28', '2019-12-23 12:37:29'),
	(53, 2, 'Argao', '2019-12-23 12:37:33', '2019-12-23 12:37:33'),
	(54, 2, 'Asturias', '2019-12-23 12:37:40', '2019-12-23 12:37:40'),
	(55, 2, 'Badian', '2019-12-23 12:37:47', '2019-12-23 12:37:47'),
	(56, 2, 'Balamban', '2019-12-23 12:37:51', '2019-12-23 12:37:52'),
	(57, 2, 'Bantayan', '2019-12-23 12:37:56', '2019-12-23 12:37:56'),
	(58, 2, 'Barili', '2019-12-23 12:38:01', '2019-12-23 12:38:01'),
	(59, 2, 'Boljoon', '2019-12-23 12:38:06', '2019-12-23 12:38:06'),
	(60, 2, 'Borbon', '2019-12-23 12:38:11', '2019-12-23 12:38:11'),
	(61, 2, 'Carmen', '2019-12-23 12:38:15', '2019-12-23 12:38:15'),
	(62, 2, 'Catmon', '2019-12-23 12:38:20', '2019-12-23 12:38:21'),
	(63, 2, 'Cebu City', '2019-12-23 12:38:25', '2019-12-23 12:38:25'),
	(64, 2, 'City of Bogo', '2019-12-23 12:38:29', '2019-12-23 12:38:30'),
	(65, 2, 'City of Carcar', '2019-12-23 12:38:34', '2019-12-23 12:38:34'),
	(66, 2, 'City of Naga', '2019-12-23 12:38:38', '2019-12-23 12:38:38'),
	(67, 2, 'City of Talisay', '2019-12-23 12:38:43', '2019-12-23 12:38:43'),
	(68, 2, 'Compostela', '2019-12-23 12:38:48', '2019-12-23 12:38:48'),
	(69, 2, 'Consolacion', '2019-12-23 12:38:56', '2019-12-23 12:38:56'),
	(70, 2, 'Cordova', '2019-12-23 12:39:00', '2019-12-23 12:39:01'),
	(71, 2, 'Daanbantayan', '2019-12-23 12:42:42', '2019-12-23 12:42:42'),
	(72, 2, 'Dalaguete', '2019-12-23 12:42:48', '2019-12-23 12:42:49'),
	(73, 2, 'Danao City', '2019-12-23 12:42:52', '2019-12-23 12:42:52'),
	(74, 2, 'Dumanjug', '2019-12-23 12:42:56', '2019-12-23 12:42:57'),
	(75, 2, 'Ginatilan', '2019-12-23 12:43:00', '2019-12-23 12:43:00'),
	(76, 2, 'Lapu-lapu City', '2019-12-23 12:43:04', '2019-12-23 12:43:04'),
	(77, 2, 'Liloan', '2019-12-23 12:43:08', '2019-12-23 12:43:08'),
	(78, 2, 'Madridejos', '2019-12-23 12:43:12', '2019-12-23 12:43:12'),
	(79, 2, 'Malabuyoc', '2019-12-23 12:43:15', '2019-12-23 12:43:15'),
	(80, 2, 'Mandaue City', '2019-12-23 12:43:21', '2019-12-23 12:43:21'),
	(81, 2, 'Medellin', '2019-12-23 12:43:31', '2019-12-23 12:43:31'),
	(82, 2, 'Minglanilla', '2019-12-23 12:43:35', '2019-12-23 12:43:35'),
	(83, 2, 'Moalboal', '2019-12-23 12:43:38', '2019-12-23 12:43:39'),
	(84, 2, 'Oslob', '2019-12-23 12:43:43', '2019-12-23 12:43:43'),
	(85, 2, 'Pilar', '2019-12-23 12:43:47', '2019-12-23 12:43:47'),
	(86, 2, 'Pinamungahan', '2019-12-23 12:43:51', '2019-12-23 12:43:51'),
	(87, 2, 'Poro', '2019-12-23 12:43:55', '2019-12-23 12:43:57'),
	(88, 2, 'Ronda', '2019-12-23 12:44:01', '2019-12-23 12:44:01'),
	(89, 2, 'Samboan', '2019-12-23 12:44:05', '2019-12-23 12:44:06'),
	(90, 2, 'San Fernando', '2019-12-23 12:44:09', '2019-12-23 12:44:10'),
	(91, 2, 'San Francisco', '2019-12-23 12:48:50', '2019-12-23 12:48:50'),
	(92, 2, 'San Remigio', '2019-12-23 12:48:54', '2019-12-23 12:48:54'),
	(93, 2, 'Santa Fe', '2019-12-23 12:48:59', '2019-12-23 12:48:59'),
	(94, 2, 'Santander', '2019-12-23 12:49:03', '2019-12-23 12:49:04'),
	(95, 2, 'Sibonga', '2019-12-23 12:49:07', '2019-12-23 12:49:08'),
	(96, 2, 'Sogod', '2019-12-23 12:49:12', '2019-12-23 12:49:12'),
	(97, 2, 'Tabugon', '2019-12-23 12:49:17', '2019-12-23 12:49:17'),
	(98, 2, 'Tabuelan', '2019-12-23 12:49:21', '2019-12-23 12:49:21'),
	(99, 2, 'Toledo City', '2019-12-23 12:49:26', '2019-12-23 12:49:26'),
	(100, 2, 'Tuburan', '2019-12-23 12:49:31', '2019-12-23 12:49:31'),
	(101, 2, 'Tudela', '2019-12-23 12:49:36', '2019-12-23 12:49:36');
/*!40000 ALTER TABLE `city_municipality` ENABLE KEYS */;

-- Dumping structure for table db_keyland.history
CREATE TABLE IF NOT EXISTS `history` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_keyland.history: ~107 rows (approximately)
/*!40000 ALTER TABLE `history` DISABLE KEYS */;
INSERT INTO `history` (`id`, `user_id`, `description`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Keyland Realty added new agent named <strong>Joseph Deliman</strong> with email <i><a href=\'mailto:deliman200@gmail.com\'>deliman200@gmail.com</a></i>.', '2019-12-24 07:19:16', '2019-12-24 07:19:16'),
	(2, 1, 'Keyland Realty posted new property in title <strong>House and Lot for Sale</strong>.', '2019-12-24 07:20:26', '2019-12-24 07:20:26'),
	(3, 1, 'Keyland Realty posted new property in title <strong>Lady bed spacer for rent</strong>.', '2019-12-25 00:58:29', '2019-12-25 00:58:29'),
	(4, 1, 'Keyland Realty added new agent named <strong>Vince Quinaging</strong> with email <i><a href=\'mailto:vince@gmail.com\'>vince@gmail.com</a></i>.', '2019-12-26 04:06:39', '2019-12-26 04:06:39'),
	(5, 1, 'Assign <strong>Joseph Deliman</strong> as agent on House and Lot for Sale property', '2019-12-29 09:20:55', '2019-12-29 09:20:55'),
	(6, 1, 'Assign <strong>Vince Quinaging</strong> as agent on House and Lot for Sale property', '2019-12-29 09:20:55', '2019-12-29 09:20:55'),
	(7, 1, 'Assign <strong>Joseph Deliman</strong> as agent on Lady bed spacer for rent property', '2019-12-29 10:32:19', '2019-12-29 10:32:19'),
	(8, 1, 'Property <strong>Lady bed spacer for rent</strong> status is set to Rented', '2019-12-29 10:32:25', '2019-12-29 10:32:25'),
	(9, 1, 'Property <strong>Lady bed spacer for rent</strong> status is set to Rent', '2019-12-29 10:32:32', '2019-12-29 10:32:32'),
	(10, 1, 'New photo has been added on <strong>Lady bed spacer for rent</strong> property.', '2019-12-29 10:32:46', '2019-12-29 10:32:46'),
	(11, 1, 'Update profile information.', '2019-12-29 10:33:10', '2019-12-29 10:33:10'),
	(12, 1, 'Keyland Realty added new agent named <strong>Dan Degamo</strong> with email <i><a href=\'mailto:dj.degamo.p@gmail.com\'>dj.degamo.p@gmail.com</a></i>.', '2019-12-29 10:33:44', '2019-12-29 10:33:44'),
	(13, 1, 'Keyland Realty added new agent named <strong>Norman Karl Deliman</strong> with email <i><a href=\'mailto:ndeliman@gmail.com\'>ndeliman@gmail.com</a></i>.', '2019-12-30 01:59:39', '2019-12-30 01:59:39'),
	(14, 1, '<strong>Norman Karl Deliman\'s</strong> Profile has been updated.', '2019-12-30 02:04:17', '2019-12-30 02:04:17'),
	(15, 1, '<strong>Dan Degamo\'s</strong> Profile has been updated.', '2019-12-30 02:05:46', '2019-12-30 02:05:46'),
	(16, 1, '<strong>Dummy Dummy\'s</strong> Application is approved.', '2020-01-10 01:30:33', '2020-01-10 01:30:33'),
	(17, 1, '<strong>Dummy Dummy\'s</strong> Application has been declined.', '2020-01-10 01:36:23', '2020-01-10 01:36:23'),
	(18, 1, '<strong>Norman Karl Deliman\'s</strong> Application has been approved.', '2020-01-10 01:36:49', '2020-01-10 01:36:49'),
	(19, 1, '<strong>Dan Degamo\'s</strong> Application has been approved.', '2020-01-10 01:37:04', '2020-01-10 01:37:04'),
	(20, 1, '<strong>Vince Quinaging\'s</strong> Application has been approved.', '2020-01-10 01:37:09', '2020-01-10 01:37:09'),
	(21, 1, '<strong>Joseph Deliman\'s</strong> Application has been approved.', '2020-01-10 01:37:12', '2020-01-10 01:37:12'),
	(22, 1, '<strong>Norman Karl Deliman\'s</strong> status is set to Inactive.', '2020-01-10 02:11:52', '2020-01-10 02:11:52'),
	(23, 1, '<strong>Norman Karl Deliman\'s</strong> status is set to Active.', '2020-01-10 02:14:19', '2020-01-10 02:14:19'),
	(24, 1, 'Keyland Realty added new agent named <strong>Dummy Dummy</strong> with email <i><a href=\'mailto:dsad@gmail.com\'>dsad@gmail.com</a></i>.', '2020-01-10 02:29:04', '2020-01-10 02:29:04'),
	(25, 1, '<strong>Dummy Dummy\'s</strong> Profile has been updated.', '2020-01-10 02:37:22', '2020-01-10 02:37:22'),
	(26, 1, '<strong>Dummy Dummy\'s</strong> Profile has been updated.', '2020-01-10 02:38:06', '2020-01-10 02:38:06'),
	(27, 1, 'Keyland Realty posted new property in title <strong>test</strong>.', '2020-01-10 04:12:50', '2020-01-10 04:12:50'),
	(28, 1, 'Delete some photo\'s of <strong>test</strong>. property', '2020-01-10 04:24:38', '2020-01-10 04:24:38'),
	(29, 1, 'New photo has been added on <strong>test</strong> property.', '2020-01-10 04:24:38', '2020-01-10 04:24:38'),
	(30, 1, 'Property <strong>test</strong> status is set to Sold', '2020-01-10 04:29:59', '2020-01-10 04:29:59'),
	(31, 1, 'Property <strong>test</strong> status is set to Sell', '2020-01-10 04:30:11', '2020-01-10 04:30:11'),
	(32, 1, 'Assign <strong>Dan Degamo</strong> as agent on test property', '2020-01-10 04:33:20', '2020-01-10 04:33:20'),
	(33, 1, 'Assign <strong>Dummy Dummy</strong> as agent on test property', '2020-01-10 04:33:20', '2020-01-10 04:33:20'),
	(34, 1, 'Assign <strong>Joseph Deliman</strong> as agent on test property', '2020-01-10 04:33:20', '2020-01-10 04:33:20'),
	(35, 1, 'Assign <strong>Norman Karl Deliman</strong> as agent on test property', '2020-01-10 04:33:20', '2020-01-10 04:33:20'),
	(36, 1, 'Assign <strong>Vince Quinaging</strong> as agent on test property', '2020-01-10 04:33:20', '2020-01-10 04:33:20'),
	(37, 1, 'Remove <strong>Dan Degamo</strong> as agent on <strong>test</strong> property.', '2020-01-10 04:33:29', '2020-01-10 04:33:29'),
	(38, 1, 'Assign <strong>Dan Degamo</strong> as agent on Lady bed spacer for rent property', '2020-01-10 04:33:55', '2020-01-10 04:33:55'),
	(39, 1, 'Assign <strong>Norman Karl Deliman</strong> as agent on Lady bed spacer for rent property', '2020-01-10 04:33:55', '2020-01-10 04:33:55'),
	(40, 1, 'Remove <strong>Dummy Dummy</strong> as agent on <strong>test</strong> property.', '2020-01-10 04:36:18', '2020-01-10 04:36:18'),
	(41, 1, 'Remove <strong>Vince Quinaging</strong> as agent on <strong>test</strong> property.', '2020-01-10 04:36:25', '2020-01-10 04:36:25'),
	(42, 1, 'Remove <strong>Dan Degamo</strong> as agent on <strong>test</strong> property.', '2020-01-10 04:36:33', '2020-01-10 04:36:33'),
	(43, 1, 'Remove <strong>Joseph Deliman</strong> as agent on <strong>test</strong> property.', '2020-01-10 04:36:35', '2020-01-10 04:36:35'),
	(44, 1, 'Remove <strong>Norman Karl Deliman</strong> as agent on <strong>test</strong> property.', '2020-01-10 04:36:38', '2020-01-10 04:36:38'),
	(45, 1, 'Assign <strong>Vince Quinaging</strong> as agent on test property', '2020-01-10 04:36:54', '2020-01-10 04:36:54'),
	(46, 1, 'Assign <strong>Dummy Dummy</strong> as agent on test property', '2020-01-10 04:37:00', '2020-01-10 04:37:00'),
	(47, 1, 'Assign <strong>Norman Karl Deliman</strong> as agent on test property', '2020-01-10 04:37:00', '2020-01-10 04:37:00'),
	(48, 1, 'Remove <strong>Vince Quinaging</strong> as agent on <strong>test</strong> property.', '2020-01-10 04:37:03', '2020-01-10 04:37:03'),
	(49, 1, '<strong>Test dummy for sale</strong> details has been updated.', '2020-01-10 04:41:34', '2020-01-10 04:41:34'),
	(50, 1, '<strong>Dummy Dummy\'s</strong> Profile has been updated.', '2020-01-10 10:44:41', '2020-01-10 10:44:41'),
	(51, 1, '<strong>Vince Quinaging\'s</strong> Profile has been updated.', '2020-01-10 10:48:40', '2020-01-10 10:48:40'),
	(52, 1, '<strong>Norman Karl Deliman\'s</strong> Profile has been updated.', '2020-01-10 11:23:42', '2020-01-10 11:23:42'),
	(53, 1, '<strong>Norman Karl Deliman\'s</strong> Profile has been updated.', '2020-01-10 11:23:59', '2020-01-10 11:23:59'),
	(54, 1, '<strong>Dummy Dummy\'s</strong> status is set to Inactive.', '2020-01-10 12:04:01', '2020-01-10 12:04:01'),
	(55, 1, '<strong>Dummy Dummy\'s</strong> status is set to Active.', '2020-01-10 12:04:13', '2020-01-10 12:04:13'),
	(56, 1, '<strong>Mark Escabas\'s</strong> Application has been approved.', '2020-01-10 12:05:23', '2020-01-10 12:05:23'),
	(57, 1, '<strong>potangina potangina\'s</strong> Application has been declined.', '2020-01-10 12:10:49', '2020-01-10 12:10:49'),
	(58, 1, '<strong>Mark Escabas\'s</strong> Application has been declined.', '2020-01-10 12:14:35', '2020-01-10 12:14:35'),
	(59, 1, '<strong>Dummy Dummy\'s</strong> Application has been declined.', '2020-01-10 12:14:54', '2020-01-10 12:14:54'),
	(60, 1, '<strong>Vince Quinaging\'s</strong> Application has been approved.', '2020-01-10 12:15:06', '2020-01-10 12:15:06'),
	(61, 1, 'Update profile information.', '2020-01-11 04:04:39', '2020-01-11 04:04:39'),
	(62, 1, 'Update profile information.', '2020-01-11 04:04:42', '2020-01-11 04:04:42'),
	(63, 1, 'Update profile information.', '2020-01-11 04:13:36', '2020-01-11 04:13:36'),
	(64, 1, 'Changed password.', '2020-01-11 04:15:11', '2020-01-11 04:15:11'),
	(65, 1, 'Remove <strong>Joseph Deliman</strong> as agent on <strong>Test dummy for sale</strong> property.', '2020-01-11 04:32:25', '2020-01-11 04:32:25'),
	(66, 1, 'Remove <strong>Norman Karl Deliman</strong> as agent on <strong>Test dummy for sale</strong> property.', '2020-01-11 04:32:27', '2020-01-11 04:32:27'),
	(67, 4, 'Dan Degamo posted new property in title <strong>Condo Unit For Sale</strong>.', '2020-01-11 08:48:57', '2020-01-11 08:48:57'),
	(68, 4, 'New photo has been added on <strong>Condo Unit For Sale</strong> property.', '2020-01-11 08:50:52', '2020-01-11 08:50:52'),
	(69, 4, 'Dan Degamo posted new property in title <strong>Apartment for rent</strong>.', '2020-01-11 08:55:02', '2020-01-11 08:55:02'),
	(70, 4, 'Dan Degamo posted new property in title <strong>Commercial Lot for Rent</strong>.', '2020-01-11 08:58:55', '2020-01-11 08:58:55'),
	(71, 1, 'Assign <strong>Dan Degamo</strong> as agent on House and Lot for Sale property', '2020-01-11 11:58:02', '2020-01-11 11:58:02'),
	(72, 1, 'Delete some photo\'s of <strong>Lady bed spacer for rent</strong>. property', '2020-01-11 22:27:44', '2020-01-11 22:27:44'),
	(73, 1, '<strong>Lady bed spacer for rent</strong> details has been updated.', '2020-01-11 22:27:44', '2020-01-11 22:27:44'),
	(74, 1, 'Assign <strong>Dan Degamo</strong> as agent on Apartment for rent property', '2020-01-11 22:49:50', '2020-01-11 22:49:50'),
	(75, 1, 'Assign <strong>Dan Degamo</strong> as agent on Condo Unit For Sale property', '2020-01-11 22:50:01', '2020-01-11 22:50:01'),
	(76, 1, '<strong>Vince Quinaging\'s</strong> Application has been approved.', '2020-01-12 02:45:12', '2020-01-12 02:45:12'),
	(77, 1, '<strong>Commercial Lot for Rent</strong> property has been approved', '2020-01-13 02:24:55', '2020-01-13 02:24:55'),
	(78, 1, '<strong>Condo Unit For Sale</strong> property has been approved', '2020-01-13 02:25:10', '2020-01-13 02:25:10'),
	(79, 1, 'Changed password.', '2020-01-13 07:28:02', '2020-01-13 07:28:02'),
	(80, 1, '<strong>Norman Karl Deliman\'s</strong> status is set to Inactive.', '2020-01-17 06:04:21', '2020-01-17 06:04:21'),
	(81, 1, '<strong>Norman Karl Deliman\'s</strong> status is set to Active.', '2020-01-17 06:04:48', '2020-01-17 06:04:48'),
	(82, 1, '<strong>Dan Degamo\'s</strong> status is set to Inactive.', '2020-01-19 02:18:42', '2020-01-19 02:18:42'),
	(83, 1, '<strong>Vince Quinaging\'s</strong> Application has been declined.', '2020-01-19 02:23:34', '2020-01-19 02:23:34'),
	(84, 1, '<strong>Joseph Deliman\'s</strong> status is set to Inactive.', '2020-01-19 02:34:59', '2020-01-19 02:34:59'),
	(85, 1, '<strong>Vince Quinaging\'s</strong> Application has been declined.', '2020-01-19 03:05:22', '2020-01-19 03:05:22'),
	(86, 1, '<strong>Dan Degamo\'s</strong> status is set to Inactive.', '2020-01-19 03:11:39', '2020-01-19 03:11:39'),
	(87, 1, '<strong>Dan Degamo\'s</strong> status is set to Inactive.', '2020-01-19 03:19:30', '2020-01-19 03:19:30'),
	(88, 1, '<strong>Dan Degamo\'s</strong> status is set to Active.', '2020-01-19 03:25:12', '2020-01-19 03:25:12'),
	(89, 1, '<strong>Dan Degamo\'s</strong> status is set to Inactive.', '2020-01-19 03:25:48', '2020-01-19 03:25:48'),
	(90, 1, '<strong>Dummy Dummy\'s</strong> Application has been declined.', '2020-01-19 03:26:39', '2020-01-19 03:26:39'),
	(91, 1, '<strong>Dummy Dummy\'s</strong> Application has been approved.', '2020-01-19 03:28:27', '2020-01-19 03:28:27'),
	(92, 1, '<strong>Dummy Dummy\'s</strong> status is set to Inactive.', '2020-01-19 03:34:08', '2020-01-19 03:34:08'),
	(93, 1, '<strong>Dummy Dummy\'s</strong> status is set to Active.', '2020-01-19 03:39:20', '2020-01-19 03:39:20'),
	(94, 1, '<strong>Dummy Dummy\'s</strong> status is set to Inactive.', '2020-01-19 03:40:52', '2020-01-19 03:40:52'),
	(95, 1, '<strong>Dummy Dummy\'s</strong> status is set to Active.', '2020-01-19 03:41:01', '2020-01-19 03:41:01'),
	(96, 1, '<strong>Vince Quinaging\'s</strong> Application has been approved.', '2020-01-19 03:41:32', '2020-01-19 03:41:32'),
	(97, 1, '<strong>Vince Quinaging\'s</strong> status is set to Inactive.', '2020-01-19 03:41:54', '2020-01-19 03:41:54'),
	(98, 1, '<strong>tang ina motae ka\'s</strong> Application has been declined.', '2020-01-19 03:42:26', '2020-01-19 03:42:26'),
	(99, 1, 'Changed password.', '2020-01-19 04:20:12', '2020-01-19 04:20:12'),
	(100, 1, '<strong>Condo Unit For Sale</strong> property has been approved', '2020-01-20 07:44:29', '2020-01-20 07:44:29'),
	(101, 1, '<strong>Commercial Lot for Rent</strong> property has been declined', '2020-01-20 07:50:32', '2020-01-20 07:50:32'),
	(102, 1, '<strong>Apartment for rent</strong> property has been removed', '2020-01-20 07:51:28', '2020-01-20 07:51:28'),
	(103, 1, '<strong>Apartment for rent</strong> property has been archive', '2020-01-20 07:59:03', '2020-01-20 07:59:03'),
	(104, 1, '<strong>Apartment for rent</strong> property has been removed', '2020-01-20 07:59:44', '2020-01-20 07:59:44'),
	(105, 1, '<strong>Apartment for rent</strong> property has been archive', '2020-01-20 07:59:51', '2020-01-20 07:59:51'),
	(106, 1, '<strong>Apartment for rent</strong> property has been removed', '2020-01-20 08:12:22', '2020-01-20 08:12:22'),
	(107, 1, '<strong>Apartment for rent</strong> property has been archive', '2020-01-20 08:12:38', '2020-01-20 08:12:38');
/*!40000 ALTER TABLE `history` ENABLE KEYS */;

-- Dumping structure for table db_keyland.mails
CREATE TABLE IF NOT EXISTS `mails` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `to` int(10) unsigned NOT NULL,
  `code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `fname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `interested` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valid_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_location` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_lotsize` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_read` int(11) NOT NULL DEFAULT 0,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `date_sent` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_keyland.mails: ~7 rows (approximately)
/*!40000 ALTER TABLE `mails` DISABLE KEYS */;
INSERT INTO `mails` (`id`, `to`, `code`, `fname`, `lname`, `email`, `phone`, `title`, `subject`, `message`, `interested`, `valid_id`, `property_location`, `property_lotsize`, `is_read`, `is_deleted`, `date_sent`, `created_at`, `updated_at`) VALUES
	(1, 1, '00006mXPvN', 'Merry', 'Jane', 'merry@gmail.com', NULL, 'contact us', '<h5>Contact Us</h5>', 'this is dummy message from contact us footer', NULL, NULL, NULL, NULL, 1, 0, '2020-01-12 07:49:05', '2020-01-11 23:49:05', '2020-01-12 00:10:41'),
	(2, 1, '00006lNhsI', 'Mark', 'Churo', 'markchuro@gmail.com', '092236232', 'sell your properties', '<h5>List your property with us!</h5>', 'this is dummy text from contact us and well get your career started.', NULL, NULL, 'cordova cebu', '123', 1, 0, '2020-01-12 07:53:36', '2020-01-11 23:53:36', '2020-01-12 00:10:45'),
	(3, 1, '00006TQF1C', 'Dan', 'Degamo', 'dj.degamo.p@gmail.com', '09223763288', 'be our agents', '<h5>Be one of our Real Estate Professionals!</h5>', 'this is application message', NULL, NULL, NULL, NULL, 1, 0, '2020-01-12 07:55:00', '2020-01-11 23:55:00', '2020-01-12 00:11:32'),
	(4, 1, '00006DfCMZ', 'Dan', 'Degamo', 'degamojudylyn@gmail.com', '3213213', 'we\'d love to hear from you', '<h5>We\'d love to hear from you.</h5>', 'dsadsadsadsa', 'Partner Broker Program', NULL, NULL, NULL, 1, 0, '2020-01-12 07:56:11', '2020-01-11 23:56:11', '2020-01-12 02:33:41'),
	(5, 1, '00006iZKZo', 'Testing', 'Potan', 'testing@gmail.com', NULL, 'ask about property', '<h5>Asking about property - Test dummy for sale</h5>', 'dsadsadsa', NULL, NULL, NULL, NULL, 1, 0, '2020-01-12 07:59:33', '2020-01-11 23:59:33', '2020-01-12 02:26:46'),
	(6, 4, '00006p8U0L', 'Dummy', 'Dummy', 'dummy@gmail.com', NULL, 'ask about property', '<h5>Asking about property - Apartment for rent</h5>', 'dsadsadsa', NULL, NULL, NULL, NULL, 1, 0, '2020-01-12 08:01:40', '2020-01-12 00:01:40', '2020-01-12 01:38:38'),
	(7, 1, '00006SW0yr', 'Test', 'Quinaging', 'testing@gmail.com', '09223763288', 'ask about property', '<h5>Asking about property - Test dummy for sale</h5>', 'dsadsadsad dsa das', NULL, NULL, NULL, NULL, 1, 0, '2020-01-12 10:27:45', '2020-01-12 02:27:45', '2020-01-12 02:27:52');
/*!40000 ALTER TABLE `mails` ENABLE KEYS */;

-- Dumping structure for table db_keyland.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_keyland.migrations: ~12 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_11_30_101136_create_roles_table', 1),
	(4, '2019_11_30_101250_create_property_table', 1),
	(5, '2019_11_30_101948_create_property_type_table', 1),
	(6, '2019_11_30_102045_create_property_photo_table', 1),
	(7, '2019_11_30_102118_create_property_status_table', 1),
	(8, '2019_12_09_074804_create_history_table', 1),
	(9, '2019_12_17_042907_create_property_agent_table', 1),
	(10, '2019_12_19_104552_create_province_table', 2),
	(11, '2019_12_19_104736_create_city_table', 2),
	(12, '2019_12_27_015040_create_mails_table', 3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table db_keyland.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_keyland.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table db_keyland.property
CREATE TABLE IF NOT EXISTS `property` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `offer_type` enum('buy','rent') COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bedrooms` int(11) DEFAULT NULL,
  `bathrooms` int(11) DEFAULT NULL,
  `floor_area` float DEFAULT NULL,
  `land_size` float DEFAULT NULL,
  `building_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `block_lotnum` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `developer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `furnished` enum('Fully Furnished','Semi Furnished','Unfurnished','Bare') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rooms` int(11) DEFAULT NULL,
  `car_space` int(11) DEFAULT NULL,
  `build_year` int(11) DEFAULT NULL,
  `deposit_bond` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` float NOT NULL,
  `price_condition` enum('monthly','yearly') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_barangay` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_municipality` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `map` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_featured` int(11) NOT NULL DEFAULT 0,
  `is_approved` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_keyland.property: ~6 rows (approximately)
/*!40000 ALTER TABLE `property` DISABLE KEYS */;
INSERT INTO `property` (`id`, `code`, `offer_type`, `type_id`, `status_id`, `name`, `about`, `bedrooms`, `bathrooms`, `floor_area`, `land_size`, `building_name`, `block_lotnum`, `developer`, `furnished`, `rooms`, `car_space`, `build_year`, `deposit_bond`, `price`, `price_condition`, `street_barangay`, `city_municipality`, `province`, `map`, `is_featured`, `is_approved`, `created_by`, `created_at`, `updated_at`) VALUES
	(1, '0001VY5Az', 'buy', 1, 1, 'House and Lot for Sale', '<div>Easy access on supermarket, malls, church, highway</div>', 3, 1, 130, NULL, NULL, NULL, 'Homebuilders', 'Fully Furnished', NULL, NULL, NULL, NULL, 1200000, NULL, 'gaudalupe', 'Cebu City', 'Cebu', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15701.024362108195!2d123.87315369999999!3d10.3213787!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a99ecedffd4d93%3A0x6c00a0cf0efb2913!2sGuadalupe%2C%20Cebu%20City%2C%20Cebu!5e0!3m2!1sen!2sph!4v1577172009446!5m2!1sen!2sph" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>', 1, 1, 3, '2019-12-24 07:20:25', '2019-12-24 07:20:25'),
	(2, '0002ErJqJ', 'rent', 3, 2, 'Lady bed spacer for rent', '<div>Located near in Mepz 1 pusok lapu-lapu city, easy access in mactan island mall.</div>', 2, 1, 60, NULL, NULL, NULL, 'Ajoya', 'Semi Furnished', NULL, NULL, NULL, NULL, 3000, 'monthly', 'pusok', 'Lapu-lapu City', 'Cebu', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7850.497948677073!2d123.97218344999999!3d10.321949049999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a999d680997be1%3A0x888ed11028d84b4d!2sPusok%2C%20Lapu-Lapu%20City%2C%20Cebu!5e0!3m2!1sen!2sph!4v1577235485601!5m2!1sen!2sph" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>', 1, 1, 2, '2019-12-25 00:58:29', '2019-12-29 10:32:32'),
	(3, '000322s7A', 'buy', 1, 1, 'Test dummy for sale', '<div>test</div>', 1, 1, NULL, NULL, '2', NULL, NULL, 'Fully Furnished', NULL, NULL, NULL, NULL, 12300000, NULL, 'Bangkal', 'Batuan', 'Bohol', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d52897.58158231411!2d124.09766165372075!3d9.796811361295909!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33aa3dd61ac93845%3A0xd0d3ef95e16478f8!2sBatuan%20Hammock%20Hostel!5e0!3m2!1sen!2sph!4v1578629528092!5m2!1sen!2sph" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>', 1, 1, 1, '2020-01-10 04:12:50', '2020-01-10 04:41:34'),
	(4, '0004BXekD', 'buy', 2, 1, 'Condo Unit For Sale', '<div>Easy access in Ayala Malls, Business company, Historical churches, Universities. Has a high standard equipement for building.&nbsp;</div>', 3, 1, 130, NULL, 'One World', 'Unit 34, 5th Floor', NULL, 'Fully Furnished', NULL, NULL, NULL, NULL, 2300000, NULL, 'Cardinal Rosales Ave', 'Cebu City', 'Cebu', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3925.3470368219782!2d123.90626011562195!3d10.314086767190558!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a999408a7237ad%3A0x3252001444c95068!2s2Quad%20Building!5e0!3m2!1sen!2sph!4v1578732519312!5m2!1sen!2sph" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>', 1, 1, 4, '2020-01-11 08:48:57', '2020-01-20 07:44:29'),
	(5, '0005tLIXq', 'rent', 3, 2, 'Apartment for rent', '<div>Lady bed spacer near MEPZ 1 pusok, lapu-lapu city.</div>', 2, 1, 50, NULL, NULL, NULL, NULL, 'Semi Furnished', NULL, NULL, NULL, NULL, 4000, 'monthly', 'Pusok', 'Lapu-lapu City', 'Cebu', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1962.6171207795132!2d123.97183850707479!3d10.323129757312627!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a999d5848a64ed%3A0xd61caa9326d90203!2sKennah%20Eatery!5e0!3m2!1sen!2sph!4v1578732887332!5m2!1sen!2sph" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>', 0, 1, 4, '2020-01-11 08:55:02', '2020-01-20 08:12:38'),
	(6, '0006V2ros', 'buy', 5, 1, 'Commercial Lot for Rent', '<span>The property’s Talomo neighbourhood enjoys close proximity to the Land Transportation Office Bus Station, less than 4km away. Plus, it’s home to the Davao Crocodile Park, a conservation centre and zoo where you can also enjoy panoramic views from the zipline. For those with a fascination for nature, there are 650 animal skeletons, including the world’s tallest bird, at the D\' Bone Collector Museum, a 15-minute taxi ride away. For conveniently located offices in an action-packed location, this premium property is the perfect choice.</span>', 3, 1, 129, NULL, 'Tumolak Building', 'Blck. 3 Lot 4', NULL, 'Fully Furnished', NULL, NULL, NULL, NULL, 1800000, NULL, 'Gun-ob', 'Lapu-lapu City', 'Cebu', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15702.069140317557!2d123.9531816!3d10.3004228!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a999ed793cfa7f%3A0xe15026a7c2a928d6!2sGun-ob%2C%20Lapu-Lapu%20City%2C%20Cebu!5e0!3m2!1sen!2sph!4v1578733115486!5m2!1sen!2sph" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>', 1, 2, 4, '2020-01-11 08:58:55', '2020-01-20 07:50:32');
/*!40000 ALTER TABLE `property` ENABLE KEYS */;

-- Dumping structure for table db_keyland.property_agent
CREATE TABLE IF NOT EXISTS `property_agent` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `property_id` int(11) NOT NULL,
  `agent_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_keyland.property_agent: ~9 rows (approximately)
/*!40000 ALTER TABLE `property_agent` DISABLE KEYS */;
INSERT INTO `property_agent` (`id`, `property_id`, `agent_id`, `created_at`, `updated_at`) VALUES
	(1, 1, '2', '2019-12-29 09:20:55', '2019-12-29 09:20:55'),
	(2, 1, '3', '2019-12-29 09:20:55', '2019-12-29 09:20:55'),
	(3, 2, '2', '2019-12-29 10:32:19', '2019-12-29 10:32:19'),
	(10, 2, '4', '2020-01-10 04:33:55', '2020-01-10 04:33:55'),
	(11, 2, '5', '2020-01-10 04:33:55', '2020-01-10 04:33:55'),
	(15, 6, '4', '2020-01-11 08:58:55', '2020-01-11 08:58:55'),
	(16, 1, '4', '2020-01-11 11:58:02', '2020-01-11 11:58:02'),
	(17, 5, '4', '2020-01-11 22:49:50', '2020-01-11 22:49:50'),
	(18, 4, '4', '2020-01-11 22:50:01', '2020-01-11 22:50:01');
/*!40000 ALTER TABLE `property_agent` ENABLE KEYS */;

-- Dumping structure for table db_keyland.property_photo
CREATE TABLE IF NOT EXISTS `property_photo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `property_id` int(11) NOT NULL,
  `filename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_keyland.property_photo: ~11 rows (approximately)
/*!40000 ALTER TABLE `property_photo` DISABLE KEYS */;
INSERT INTO `property_photo` (`id`, `property_id`, `filename`, `created_at`, `updated_at`) VALUES
	(1, 1, '15771720259ed9a451f267a1a9460939f799397537_featured_v2.jpg', '2019-12-24 07:20:25', '2019-12-24 07:20:25'),
	(2, 1, '1577172025san-fernando-house-lot-carriagepod.jpg', '2019-12-24 07:20:25', '2019-12-24 07:20:25'),
	(6, 3, '1578629570images.jpg', '2020-01-10 04:12:50', '2020-01-10 04:12:50'),
	(8, 3, '1578630278AP-Condos-pros-and-cons.jpg', '2020-01-10 04:24:38', '2020-01-10 04:24:38'),
	(9, 4, '1578732536AP-Condos-pros-and-cons.jpg', '2020-01-11 08:48:56', '2020-01-11 08:48:56'),
	(10, 4, '1578732536images.jpg', '2020-01-11 08:48:57', '2020-01-11 08:48:57'),
	(11, 4, '1578732537PAJASA_Service_Apartment_Mumbai.jpg', '2020-01-11 08:48:57', '2020-01-11 08:48:57'),
	(12, 4, '1578732652download.jpg', '2020-01-11 08:50:52', '2020-01-11 08:50:52'),
	(13, 5, '15787329011f1557edb8b7bc.jpg', '2020-01-11 08:55:01', '2020-01-11 08:55:01'),
	(14, 5, '1578732901d55ae3c081db67.jpg', '2020-01-11 08:55:01', '2020-01-11 08:55:01'),
	(15, 6, '15787331353cce05f8df8025.jpg', '2020-01-11 08:58:55', '2020-01-11 08:58:55');
/*!40000 ALTER TABLE `property_photo` ENABLE KEYS */;

-- Dumping structure for table db_keyland.property_status
CREATE TABLE IF NOT EXISTS `property_status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_keyland.property_status: ~6 rows (approximately)
/*!40000 ALTER TABLE `property_status` DISABLE KEYS */;
INSERT INTO `property_status` (`id`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Sell', '2019-12-04 10:42:20', '2019-12-04 10:42:20'),
	(2, 'Rent', '2019-12-04 10:42:29', '2019-12-04 10:42:30'),
	(3, 'Sold', '2019-12-04 10:42:39', '2019-12-04 10:42:39'),
	(4, 'Rented', '2019-12-04 10:42:48', '2019-12-04 10:42:48'),
	(5, 'Reserved', '2019-12-04 10:42:58', '2019-12-04 10:42:58'),
	(6, 'Cancelled', '2019-12-13 10:10:26', '2019-12-13 10:10:26');
/*!40000 ALTER TABLE `property_status` ENABLE KEYS */;

-- Dumping structure for table db_keyland.property_type
CREATE TABLE IF NOT EXISTS `property_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_keyland.property_type: ~5 rows (approximately)
/*!40000 ALTER TABLE `property_type` DISABLE KEYS */;
INSERT INTO `property_type` (`id`, `type`, `created_at`, `updated_at`) VALUES
	(1, 'House and Lot', '2019-12-04 10:41:00', '2019-12-04 10:41:00'),
	(2, 'Lot Only', '2019-12-04 10:41:08', '2019-12-04 10:41:08'),
	(3, 'Commercial Space', '2019-12-04 10:41:15', '2019-12-04 10:41:17'),
	(4, 'Forclosure', '2019-12-04 10:41:29', '2019-12-04 10:41:30'),
	(5, 'Condominium', '2019-12-04 10:41:37', '2019-12-04 10:41:37');
/*!40000 ALTER TABLE `property_type` ENABLE KEYS */;

-- Dumping structure for table db_keyland.province
CREATE TABLE IF NOT EXISTS `province` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `province` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_keyland.province: ~2 rows (approximately)
/*!40000 ALTER TABLE `province` DISABLE KEYS */;
INSERT INTO `province` (`id`, `province`, `created_at`, `updated_at`) VALUES
	(1, 'Bohol', '2019-12-23 12:15:37', '2019-12-23 12:15:37'),
	(2, 'Cebu', '2019-12-23 12:15:41', '2019-12-23 12:15:41');
/*!40000 ALTER TABLE `province` ENABLE KEYS */;

-- Dumping structure for table db_keyland.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_keyland.roles: ~2 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', '2019-12-17 12:36:55', '2019-12-17 12:36:55'),
	(2, 'Agent', '2019-12-17 12:37:00', '2019-12-17 12:37:01');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table db_keyland.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teamlead_id` int(11) DEFAULT NULL,
  `is_teamlead` int(11) DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `profile` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `socialmedia` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_approved` int(11) DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_keyland.users: ~8 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `code`, `teamlead_id`, `is_teamlead`, `role_id`, `profile`, `email`, `password`, `fname`, `lname`, `phone`, `socialmedia`, `status`, `email_verified_at`, `is_approved`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, '0000k3yLAnd', NULL, NULL, 1, '1578716015vIqzOHXj.jpg', 'admin@keylandrealty.com', '$2y$10$Q/Rv9T6aW4HWPjhsru6HDeluenhUO8I4y1lhBwU6taeNAULEk6VJq', 'Keyland', 'Realty', '0912435624859', 'https://www.facebook.com/keylandrealty.brokerage.7', 'active', NULL, 1, 'NDfxyYaYyow6Waqfc422N38eNnlxK8pFM88W9059CZ8Y9JhQNfom4V3UDLQw', '2019-12-23 12:35:25', '2020-01-19 04:20:12'),
	(2, '00028IrA', NULL, 1, 2, '1577171955download.jpg', 'deliman200@gmail.com', '$2y$10$Kada3cjBFfvk8Bxp5Bo/8.n9GYdtRiC7thzByTqWrrofdrFaUGGiK', 'Joseph', 'Deliman', '09123456789', 'https://www.facebook.com/jojo', 'active', NULL, 1, 'DNPdmG7cZAYAKvDEE7T722Deo5yHp0VcoO2O6NzUX5U3lq3yDQiza4V7yF30', '2019-12-24 07:19:16', '2020-01-19 02:34:59'),
	(3, '0003rlwZ', 5, NULL, 2, NULL, 'vince@gmail.com', '$2y$10$2zT4WtrgaNE0UIj7xEhSY.fglV1IL.3Br8YFvRhtnVOL39DxIUL7O', 'Vince', 'Quinaging', '09123456789', 'https://www.facebook.com/vince', 'inactive', NULL, 1, NULL, '2019-12-26 04:06:39', '2020-01-19 03:41:54'),
	(4, '00049SLk', 2, NULL, 2, '1577671546dummy.jpg', 'dj.degamo.p@gmail.com', '$2y$10$nE/mP9LiMiJh0pYM8T9LkubNgda20Z90HsBlTwuk767Crdxnt/RxW', 'Dan', 'Degamo', '09223763288', 'https://www.facebook.com/dan', 'inactive', NULL, 1, 'l7zfg3izzxbkaHyPLZbuEDytvmtsPAPUQyOgqAn2HLvUvWq5YQ9CZBkFu8xz', '2019-12-29 10:33:44', '2020-01-19 03:25:48'),
	(5, '0005MJ8M', NULL, 1, 2, '1578655439keyland.jpg', 'ndeliman@gmail.com', '$2y$10$q6umQp2V7Iccc5n8/x3Ukev2u7uXz0Rwz2GjmbOu.RYlwy9EOMJlO', 'Norman Karl', 'Deliman', '09223763288', 'https://www.facebook.com/norman.deliman', 'active', NULL, 1, 'TQcRykJuyW0kWzOPXows4cOoid1PeW69zefnCPrZNpwzPJJFQE0Pjj4oYA1x', '2019-12-30 01:59:39', '2020-01-17 06:04:48'),
	(10, '0006JWos', NULL, NULL, 2, NULL, 'dummy@gmail.com', '$2y$10$gUOuq7DbCYNf/e4VjJ39L.6JCcyMRLiTtby9GcQXmOYkG3gUcTegi', 'Dummy', 'Dummy', '09235632455', 'https://www.facebook.com/vince', 'active', NULL, 1, NULL, '2020-01-19 03:16:40', '2020-01-19 03:41:01'),
	(11, '0011T3i9', NULL, NULL, 2, NULL, 'tangin@gmail.com', '$2y$10$nE/mP9LiMiJh0pYM8T9LkubNgda20Z90HsBlTwuk767Crdxnt/RxW', 'tang ina', 'motae ka', '09223763288', 'https://www.facebook.com/NvrMore', 'inactive', NULL, 2, NULL, '2020-01-19 03:42:17', '2020-01-19 03:42:26'),
	(12, '0012TC1C', NULL, NULL, 2, NULL, 'mercy@gmail.com', '$2y$10$jFQnhbhGNr65IyNwp3Jm/OnoXQYD3PJcB3yZ46JoUM3a6UfDh3/8.', 'mercyditha', 'sumagang', '09223763288', 'https://www.facebook.com/mercy', 'active', NULL, 0, NULL, '2020-01-19 04:09:43', '2020-01-19 04:09:43');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table db_keyland.wink_authors
CREATE TABLE IF NOT EXISTS `wink_authors` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `meta` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `wink_authors_slug_unique` (`slug`),
  UNIQUE KEY `wink_authors_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_keyland.wink_authors: ~1 rows (approximately)
/*!40000 ALTER TABLE `wink_authors` DISABLE KEYS */;
INSERT INTO `wink_authors` (`id`, `slug`, `name`, `email`, `password`, `bio`, `avatar`, `remember_token`, `created_at`, `updated_at`, `meta`) VALUES
	('8e4323b7-dc2c-45b5-bb30-134b74166142', 'regina-phalange', 'Regina Phalange', 'admin@mail.com', '$2y$10$n9DlIA3tWNfzyTAij.yE/On69U9xR4JaJDl.KGu7ooA3uejnLpBs2', 'This is me.', NULL, NULL, '2020-01-22 01:41:13', '2020-01-22 01:41:13', NULL);
/*!40000 ALTER TABLE `wink_authors` ENABLE KEYS */;

-- Dumping structure for table db_keyland.wink_pages
CREATE TABLE IF NOT EXISTS `wink_pages` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `meta` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `wink_pages_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_keyland.wink_pages: ~0 rows (approximately)
/*!40000 ALTER TABLE `wink_pages` DISABLE KEYS */;
/*!40000 ALTER TABLE `wink_pages` ENABLE KEYS */;

-- Dumping structure for table db_keyland.wink_posts
CREATE TABLE IF NOT EXISTS `wink_posts` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT 0,
  `publish_date` datetime NOT NULL DEFAULT '2018-10-10 00:00:00',
  `featured_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured_image_caption` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `meta` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `wink_posts_slug_unique` (`slug`),
  KEY `wink_posts_author_id_index` (`author_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_keyland.wink_posts: ~0 rows (approximately)
/*!40000 ALTER TABLE `wink_posts` DISABLE KEYS */;
/*!40000 ALTER TABLE `wink_posts` ENABLE KEYS */;

-- Dumping structure for table db_keyland.wink_posts_tags
CREATE TABLE IF NOT EXISTS `wink_posts_tags` (
  `post_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  UNIQUE KEY `wink_posts_tags_post_id_tag_id_unique` (`post_id`,`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_keyland.wink_posts_tags: ~0 rows (approximately)
/*!40000 ALTER TABLE `wink_posts_tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `wink_posts_tags` ENABLE KEYS */;

-- Dumping structure for table db_keyland.wink_tags
CREATE TABLE IF NOT EXISTS `wink_tags` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `meta` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `wink_tags_slug_unique` (`slug`),
  KEY `wink_tags_created_at_index` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_keyland.wink_tags: ~0 rows (approximately)
/*!40000 ALTER TABLE `wink_tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `wink_tags` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
