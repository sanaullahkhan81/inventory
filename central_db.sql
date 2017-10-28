-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2017 at 03:54 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `central_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(256) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `created_date`) VALUES
(1, 'Baked Goods & Mixes', '2017-02-22 17:17:33'),
(2, 'Beverages', '2017-02-22 17:17:33'),
(3, 'Candy', '2017-02-22 17:17:33'),
(4, 'Canned Fruit & Vegetables', '2017-02-22 17:17:33'),
(5, 'Canned Meat', '2017-02-22 17:17:33'),
(6, 'Cereal', '2017-02-22 17:17:33'),
(7, 'Chips', '2017-02-22 17:17:33'),
(8, 'Condiments', '2017-02-22 17:17:33'),
(9, 'Dairy Products', '2017-02-22 17:17:33'),
(10, 'Dried Fruit & Nuts', '2017-02-22 17:17:33'),
(11, 'Grains', '2017-02-22 17:17:33'),
(12, 'Jams & Preserves', '2017-02-22 17:17:33'),
(13, 'Pasta', '2017-02-22 17:17:33'),
(14, 'Sauces', '2017-02-22 17:17:33'),
(15, 'Snacks', '2017-02-22 17:17:33'),
(16, 'Soups', '2017-02-22 17:17:33'),
(17, 'Oils', '2017-02-22 17:17:33'),
(18, 'test cate updated', '2017-03-17 07:42:26'),
(19, 'qaz', '2017-03-17 08:13:38');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `company` varchar(150) DEFAULT NULL,
  `last_name` varchar(150) DEFAULT NULL,
  `first_name` varchar(150) DEFAULT NULL,
  `email_address` varchar(150) DEFAULT NULL,
  `job_title` varchar(200) DEFAULT NULL,
  `business_phone` varchar(20) DEFAULT NULL,
  `home_phone` varchar(20) DEFAULT NULL,
  `mobile_phone` varchar(20) DEFAULT NULL,
  `fax_number` varchar(20) DEFAULT NULL,
  `address` varchar(256) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `web_page` varchar(256) DEFAULT NULL,
  `notes` text,
  `attachments` text,
  `customer_name` varchar(150) DEFAULT NULL,
  `file_as` varchar(150) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `company`, `last_name`, `first_name`, `email_address`, `job_title`, `business_phone`, `home_phone`, `mobile_phone`, `fax_number`, `address`, `city`, `state`, `zip`, `country`, `web_page`, `notes`, `attachments`, `customer_name`, `file_as`) VALUES
(1, 'Company A', 'Bedecs', 'Anni', 'asd', 'Owner', '(123)555-0100', 'dasd', 'asdas', '(123)555-0101', '123 1st Street', 'Seattle', 'WA', '98052', 'USA', NULL, 'asdas', NULL, 'Anna Bedecs', 'Bedecs, Anna'),
(2, 'Company B', 'Gratacos Solsona', 'Antonio', NULL, 'Owner', '(123)555-0100', NULL, NULL, '(123)555-0101', '123 2nd Street', 'Boston', 'MA', '98112', 'USA', NULL, NULL, NULL, 'Antonio Gratacos Solsona', 'Gratacos Solsona, Antonio'),
(3, 'Company C', 'Axen', 'Thomas', NULL, 'Purchasing Representative', '(123)555-0100', NULL, NULL, '(123)555-0101', '123 3rd Street', 'Los Angeles', 'CA', '98052', 'USA', NULL, NULL, NULL, 'Thomas Axen', 'Axen, Thomas'),
(4, 'Company D', 'Lee', 'Christina', NULL, 'Purchasing Manager', '(123)555-0100', NULL, NULL, '(123)555-0101', '123 4th Street', 'New York', 'NY', '98052', 'USA', NULL, NULL, NULL, 'Christina Lee', 'Lee, Christina'),
(5, 'Company E', 'O’Donnell', 'Martin', NULL, 'Owner', '(123)555-0100', NULL, NULL, '(123)555-0101', '123 5th Street', 'Minneapolis', 'MN', '98012', 'USA', NULL, NULL, NULL, 'Martin O’Donnell', 'O’Donnell, Martin'),
(6, 'Company F', 'Pérez-Olaeta', 'Francisco', NULL, 'Purchasing Manager', '(123)555-0100', NULL, NULL, '(123)555-0101', '123 6th Street', 'Milwaukee', 'WI', '98004', 'USA', NULL, NULL, NULL, 'Francisco Pérez-Olaeta', 'Pérez-Olaeta, Francisco'),
(7, 'Company G', 'Xie', 'Ming-Yang', NULL, 'Owner', '(123)555-0100', NULL, NULL, '(123)555-0101', '123 7th Street', 'Boise', 'ID', '98007', 'USA', NULL, NULL, NULL, 'Ming-Yang Xie', 'Xie, Ming-Yang'),
(8, 'Company H', 'Andersen', 'Elizabeth', NULL, 'Purchasing Representative', '(123)555-0100', NULL, NULL, '(123)555-0101', '123 8th Street', 'Portland', 'OR', '98052', 'USA', NULL, NULL, NULL, 'Elizabeth Andersen', 'Andersen, Elizabeth'),
(9, 'Company I', 'Mortensen', 'Sven', NULL, 'Purchasing Manager', '(123)555-0100', NULL, NULL, '(123)555-0101', '123 9th Street', 'Salt Lake City', 'UT', '98052', 'USA', NULL, NULL, NULL, 'Sven Mortensen', 'Mortensen, Sven'),
(10, 'Company J', 'Wacker', 'Roland', NULL, 'Purchasing Manager', '(123)555-0100', NULL, NULL, '(123)555-0101', '123 10th Street', 'Chicago', 'IL', '98052', 'USA', NULL, NULL, NULL, 'Roland Wacker', 'Wacker, Roland'),
(11, 'Company K', 'Krschne', 'Peter', NULL, 'Purchasing Manager', '(123)555-0100', NULL, NULL, '(123)555-0101', '123 11th Street', 'Miami', 'FL', '99999', 'USA', NULL, NULL, NULL, 'Peter Krschne', 'Krschne, Peter'),
(12, 'Company L', 'Edwards', 'John', NULL, 'Purchasing Manager', '(123)555-0100', NULL, NULL, '(123)555-0101', '123 12th Street', 'Las Vegas', 'NV', '99999', 'USA', NULL, NULL, NULL, 'John Edwards', 'Edwards, John'),
(13, 'Company M', 'Ludick', 'Andre', NULL, 'Purchasing Representative', '(123)555-0100', NULL, NULL, '(123)555-0101', '456 13th Street', 'Memphis', 'TN', '99999', 'USA', NULL, NULL, NULL, 'Andre Ludick', 'Ludick, Andre'),
(14, 'Company N', 'Grilo', 'Carlos', NULL, 'Purchasing Representative', '(123)555-0100', NULL, NULL, '(123)555-0101', '456 14th Street', 'Denver', 'CO', '99999', 'USA', NULL, NULL, NULL, 'Carlos Grilo', 'Grilo, Carlos'),
(15, 'Company O', 'Kupkova', 'Helena', NULL, 'Purchasing Manager', '(123)555-0100', NULL, NULL, '(123)555-0101', '456 15th Street', 'Honolulu', 'HI', '99999', 'USA', NULL, NULL, NULL, 'Helena Kupkova', 'Kupkova, Helena'),
(16, 'Company P', 'Goldschmidt', 'Daniel', NULL, 'Purchasing Representative', '(123)555-0100', NULL, NULL, '(123)555-0101', '456 16th Street', 'San Francisco', 'CA', '99999', 'USA', NULL, NULL, NULL, 'Daniel Goldschmidt', 'Goldschmidt, Daniel'),
(17, 'Company Q', 'Bagel', 'Jean Philippe', NULL, 'Owner', '(123)555-0100', NULL, NULL, '(123)555-0101', '456 17th Street', 'Seattle', 'WA', '99999', 'USA', NULL, NULL, NULL, 'Jean Philippe Bagel', 'Bagel, Jean Philippe'),
(18, 'Company R', 'Autier Miconi', 'Catherine', NULL, 'Purchasing Representative', '(123)555-0100', NULL, NULL, '(123)555-0101', '456 18th Street', 'Boston', 'MA', '99999', 'USA', NULL, NULL, NULL, 'Catherine Autier Miconi', 'Autier Miconi, Catherine'),
(19, 'Company S', 'Eggerer', 'Alexander', NULL, 'Accounting Assistant', '(123)555-0100', NULL, NULL, '(123)555-0101', '789 19th Street', 'Los Angeles', 'CA', '99999', 'USA', NULL, NULL, NULL, 'Alexander Eggerer', 'Eggerer, Alexander'),
(20, 'Company T', 'Li', 'George', NULL, 'Purchasing Manager', '(123)555-0100', NULL, NULL, '(123)555-0101', '789 20th Street', 'New York', 'NY', '99999', 'USA', NULL, NULL, NULL, 'George Li', 'Li, George'),
(21, 'Company U', 'Tham', 'Bernard', NULL, 'Accounting Manager', '(123)555-0100', NULL, NULL, '(123)555-0101', '789 21th Street', 'Minneapolis', 'MN', '99999', 'USA', NULL, NULL, NULL, 'Bernard Tham', 'Tham, Bernard'),
(22, 'Company V', 'Ramos', 'Luciana', NULL, 'Purchasing Assistant', '(123)555-0100', NULL, NULL, '(123)555-0101', '789 22th Street', 'Milwaukee', 'WI', '99999', 'USA', NULL, NULL, NULL, 'Luciana Ramos', 'Ramos, Luciana'),
(23, 'Company W', 'Entin', 'Michael', NULL, 'Purchasing Manager', '(123)555-0100', NULL, NULL, '(123)555-0101', '789 23th Street', 'Portland', 'OR', '99999', 'USA', NULL, NULL, NULL, 'Michael Entin', 'Entin, Michael'),
(24, 'Company X', 'Hasselberg', 'Jonas', NULL, 'Owner', '(123)555-0100', NULL, NULL, '(123)555-0101', '789 24th Street', 'Salt Lake City', 'UT', '99999', 'USA', NULL, NULL, NULL, 'Jonas Hasselberg', 'Hasselberg, Jonas'),
(25, 'Company Y', 'Rodman', 'John', NULL, 'Purchasing Manager', '(123)555-0100', NULL, NULL, '(123)555-0101', '789 25th Street', 'Chicago', 'IL', '99999', 'USA', NULL, NULL, NULL, 'John Rodman', 'Rodman, John'),
(26, 'Company Z', 'Liu', 'Run', NULL, 'Accounting Assistant', '(123)555-0100', NULL, NULL, '(123)555-0101', '789 26th Street', 'Miami', 'FL', '99999', 'USA', NULL, NULL, NULL, 'Run Liu', 'Liu, Run'),
(27, 'ASD', 'Yasir', 'M', 'asd', 'asd', 'ASDF', 'DSFAD', 'SFAS', 'ASDFA', 'ADSF', 'ASDF', 'ASDF', 'ASDF', 'SDFAD', NULL, 'SF', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `full_name` varchar(150) DEFAULT NULL,
  `login` varchar(150) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `email`, `full_name`, `login`, `date_created`) VALUES
(1, 'nancy@northwindtraders.com', 'Nancy Freehafer', 'NancyF', '2017-02-22 18:04:17'),
(2, 'andrew@northwindtraders.com', 'A Sample User', 'AndrewC', '2017-02-22 18:04:17'),
(3, 'jan@northwindtraders.com', 'Jan Kotas', 'JanK', '2017-02-22 18:04:17'),
(4, 'mariya@northwindtraders.com', 'Mariya Sergienko', 'MariyaS', '2017-02-22 18:04:17'),
(5, 'steven@northwindtraders.com', 'Steven Thorpe', 'StevenT', '2017-02-22 18:04:17'),
(6, 'michael@northwindtraders.com', 'Michael Neipper', 'MichaelN', '2017-02-22 18:04:17'),
(7, 'robert@northwindtraders.com', 'Robert Zare', 'RobertZ', '2017-02-22 18:04:17'),
(8, 'laura@northwindtraders.com', 'Laura Giussani', 'LauraG', '2017-02-22 18:04:17'),
(9, 'anne@northwindtraders.com', 'Anne Hellung-Larsen', 'AnneH', '2017-02-22 18:04:17');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `reorder_level` int(11) DEFAULT '0',
  `target_level` int(11) DEFAULT '0',
  `min_reorder_quantity` int(11) DEFAULT '0',
  `received` int(11) DEFAULT '0',
  `on_order` int(11) DEFAULT '0',
  `shrinkage` int(11) DEFAULT '0',
  `shipped` int(11) DEFAULT '0',
  `allocated` int(11) DEFAULT '0',
  `back_ordered` int(11) DEFAULT '0',
  `initial_level` int(11) DEFAULT '0',
  `on_hand` int(11) DEFAULT '0',
  `available` int(11) DEFAULT '0',
  `current_level` int(11) DEFAULT '0',
  `below_target_level` int(11) DEFAULT '0',
  `reorder_quantity` int(11) DEFAULT '0',
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `product_id`, `reorder_level`, `target_level`, `min_reorder_quantity`, `received`, `on_order`, `shrinkage`, `shipped`, `allocated`, `back_ordered`, `initial_level`, `on_hand`, `available`, `current_level`, `below_target_level`, `reorder_quantity`, `created_date`) VALUES
(1, 1, 10, 40, 80, 0, 50, 7, 0, 75, 0, 200, 193, 118, 168, 0, 0, '2017-02-22 18:22:32'),
(2, 2, 25, 100, 25, 0, 0, 0, 15, 0, 0, 300, 285, 285, 285, 0, 0, '2017-02-22 18:22:32'),
(3, 3, 10, 40, 10, 0, 0, 0, 0, 0, 0, 400, 400, 400, 400, 0, 0, '2017-02-22 18:22:32'),
(4, 4, 10, 40, 10, 0, 0, 0, 0, 0, 0, 200, 200, 200, 200, 0, 0, '2017-02-22 18:22:32'),
(5, 5, 25, 100, 25, 0, 0, 0, 5, 0, 0, 150, 145, 145, 145, 0, 0, '2017-02-22 18:22:32'),
(6, 6, 10, 40, 10, 0, 0, 0, 0, 0, 0, 100, 100, 100, 100, 0, 0, '2017-02-22 18:22:32'),
(7, 7, 10, 40, 10, 0, 0, 0, 0, 0, 0, 100, 100, 100, 100, 0, 0, '2017-02-22 18:22:32'),
(8, 8, 10, 40, 10, 0, 0, 0, 0, 10, 0, 50, 50, 40, 40, 0, 0, '2017-02-22 18:22:32'),
(9, 9, 10, 40, 10, 0, 0, 0, 10, 0, 0, 50, 40, 40, 40, 0, 0, '2017-02-22 18:22:32'),
(10, 10, 5, 20, 5, 0, 0, 0, 20, 0, 0, 100, 80, 80, 80, 0, 0, '2017-02-22 18:22:32'),
(11, 11, 10, 40, 10, 0, 0, 0, 0, 5, 0, 50, 50, 45, 45, 0, 0, '2017-02-22 18:22:32'),
(12, 12, 5, 20, 5, 0, 0, 0, 0, 0, 0, 75, 75, 75, 75, 0, 0, '2017-02-22 18:22:32'),
(13, 13, 15, 60, 15, 0, 0, 0, 0, 0, 0, 100, 100, 100, 100, 0, 0, '2017-02-22 18:22:32'),
(14, 14, 30, 120, 30, 0, 0, 0, 15, 8, 0, 200, 185, 177, 177, 0, 0, '2017-02-22 18:22:32'),
(15, 15, 10, 40, 10, 0, 0, 0, 0, 0, 0, 55, 55, 55, 55, 0, 0, '2017-02-22 18:22:32'),
(16, 16, 25, 100, 25, 0, 0, 0, 0, 5, 0, 150, 150, 145, 145, 0, 0, '2017-02-22 18:22:32'),
(17, 17, 25, 100, 25, 0, 0, 0, 15, 0, 0, 150, 135, 135, 135, 0, 0, '2017-02-22 18:22:32'),
(18, 18, 10, 40, 10, 0, 0, 0, 0, 0, 0, 100, 100, 100, 100, 0, 0, '2017-02-22 18:22:32'),
(19, 19, 25, 100, 25, 0, 0, 0, 0, 0, 0, 100, 100, 100, 100, 0, 0, '2017-02-22 18:22:32'),
(20, 20, 30, 120, 30, 0, 30, 0, 0, 0, 0, 100, 100, 100, 130, 0, 0, '2017-02-22 18:22:32'),
(21, 21, 20, 80, 20, 0, 0, 0, 0, 0, 0, 100, 100, 100, 100, 0, 0, '2017-02-22 18:22:32'),
(22, 22, 10, 40, 10, 0, 0, 0, 0, 0, 0, 50, 50, 50, 50, 0, 0, '2017-02-22 18:22:32'),
(23, 23, 20, 80, 20, 0, 0, 0, 0, 0, 0, 100, 100, 100, 100, 0, 0, '2017-02-22 18:22:32'),
(24, 24, 10, 40, 10, 0, 0, 0, 0, 0, 0, 50, 50, 50, 50, 0, 0, '2017-02-22 18:22:32'),
(25, 25, 5, 20, 5, 0, 0, 0, 70, 10, 0, 100, 30, 20, 20, 0, 0, '2017-02-22 18:22:32'),
(26, 26, 15, 60, 15, 0, 0, 0, 0, 0, 0, 50, 50, 50, 50, 10, 15, '2017-02-22 18:22:32'),
(27, 27, 50, 75, 25, 0, 0, 0, 0, 0, 0, 100, 100, 100, 100, 0, 0, '2017-02-22 18:22:32'),
(28, 28, 100, 125, 25, 0, 0, 0, 0, 0, 0, 120, 120, 120, 120, 5, 25, '2017-02-22 18:22:32'),
(29, 29, 20, 100, 0, 0, 50, 0, 0, 0, 0, 50, 50, 50, 100, 0, 0, '2017-02-22 18:22:32'),
(30, 30, 30, 200, 0, 0, 0, 0, 0, 0, 0, 50, 50, 50, 50, 150, 150, '2017-02-22 18:22:32'),
(31, 31, 10, 20, 5, 0, 0, 0, 0, 0, 0, 50, 50, 50, 50, 0, 0, '2017-02-22 18:22:32'),
(32, 32, 10, 20, 5, 0, 0, 0, 0, 0, 0, 50, 50, 50, 50, 0, 0, '2017-02-22 18:22:32'),
(33, 33, 20, 50, 0, 0, 0, 0, 0, 0, 0, 50, 50, 50, 50, 0, 0, '2017-02-22 18:22:32'),
(34, 34, 10, 40, 0, 0, 0, 0, 0, 0, 0, 50, 50, 50, 50, 0, 0, '2017-02-22 18:22:32'),
(35, 35, 10, 40, 0, 0, 0, 0, 0, 0, 0, 50, 50, 50, 50, 0, 0, '2017-02-22 18:22:32'),
(36, 36, 10, 40, 0, 0, 0, 0, 0, 0, 0, 50, 50, 50, 50, 0, 0, '2017-02-22 18:22:32'),
(37, 37, 10, 40, 0, 0, 0, 0, 0, 0, 0, 55, 55, 55, 55, 0, 0, '2017-02-22 18:22:32'),
(38, 38, 10, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 40, 40, '2017-02-22 18:22:32'),
(39, 39, 10, 40, 0, 0, 0, 0, 0, 0, 0, 100, 100, 100, 100, 0, 0, '2017-02-22 18:22:32'),
(40, 40, 10, 40, 0, 0, 0, 0, 0, 0, 0, 50, 50, 50, 50, 0, 0, '2017-02-22 18:22:32'),
(41, 41, 30, 50, 0, 0, 0, 0, 0, 0, 0, 50, 50, 50, 50, 0, 0, '2017-02-22 18:22:32'),
(42, 42, 30, 50, 0, 0, 0, 0, 0, 0, 0, 50, 50, 50, 50, 0, 0, '2017-02-22 18:22:32'),
(43, 43, 50, 200, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 200, 200, '2017-02-22 18:22:32'),
(44, 44, 100, 200, 0, 0, 0, 0, 0, 0, 0, 120, 120, 120, 120, 80, 80, '2017-02-22 18:22:32'),
(45, 45, 100, 200, 0, 0, 0, 0, 0, 50, 0, 500, 500, 450, 450, 0, 0, '2017-02-22 18:22:32'),
(46, 46, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2017-02-22 18:22:32');

-- --------------------------------------------------------

--
-- Table structure for table `inventoryshrinkage`
--

DROP TABLE IF EXISTS `inventoryshrinkage`;
CREATE TABLE `inventoryshrinkage` (
  `id` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `reason` text,
  `product_id` int(11) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventoryshrinkage`
--

INSERT INTO `inventoryshrinkage` (`id`, `date`, `quantity`, `reason`, `product_id`, `created_date`) VALUES
(9, '2017-03-23 00:00:00', 3, 'gghhh', 1, '2017-03-22 13:45:24'),
(8, '2017-03-21 00:00:00', 4, 'testing', 1, '2017-03-22 13:45:24');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

DROP TABLE IF EXISTS `invoices`;
CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `invoice_date` datetime DEFAULT NULL,
  `due_date` datetime DEFAULT NULL,
  `tax` float DEFAULT NULL,
  `shipping` float DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `sub_total` float DEFAULT NULL,
  `amount_due` float DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `invoice_date`, `due_date`, `tax`, `shipping`, `order_id`, `sub_total`, `amount_due`, `created_date`) VALUES
(1, '2010-11-28 00:00:00', NULL, 31.875, 50, 2, 637.5, 719.375, '2017-02-22 20:20:19'),
(2, '2010-12-15 00:00:00', NULL, 29.3125, 50, 3, 586.25, 665.562, '2017-02-22 20:20:19'),
(3, '2010-12-20 00:00:00', NULL, 29.8, 50, 4, 596, 675.8, '2017-02-22 20:20:19'),
(4, '2010-12-23 00:00:00', NULL, 8.625, 20, 6, 172.5, 201.125, '2017-02-22 20:20:19'),
(5, '2010-11-25 00:00:00', NULL, 23.86, 50, 1, 477.2, 551.06, '2017-02-22 20:20:19'),
(6, '2017-01-26 00:00:00', NULL, 0, 50, 8, 487.5, 537.5, '2017-02-22 20:20:19'),
(7, '2017-01-26 00:00:00', NULL, 0, 0, 5, 334, 334, '2017-02-22 20:20:19');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_date` datetime DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `shipped_date` datetime DEFAULT NULL,
  `ship_address` text,
  `ship_city` varchar(100) DEFAULT NULL,
  `ship_state` varchar(100) DEFAULT NULL,
  `ship_zip` varchar(10) DEFAULT NULL,
  `ship_country` varchar(150) DEFAULT NULL,
  `shipping_fee` float DEFAULT NULL,
  `tax` float DEFAULT NULL,
  `payment_type` varchar(100) DEFAULT NULL,
  `payment_date` datetime DEFAULT NULL,
  `notes` text,
  `tax_rate` float DEFAULT NULL,
  `order_month` int(11) DEFAULT NULL,
  `order_year` int(11) DEFAULT NULL,
  `order_sub_total` float DEFAULT NULL,
  `order_total` float DEFAULT NULL,
  `closed_date` datetime DEFAULT NULL,
  `order_qtr` float DEFAULT NULL,
  `ship_name` varchar(150) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `new` tinyint(1) DEFAULT NULL,
  `ship_via` int(11) DEFAULT NULL,
  `completed` tinyint(1) DEFAULT NULL,
  `shipped` tinyint(1) DEFAULT NULL,
  `invoiced` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_date`, `employee_id`, `shipped_date`, `ship_address`, `ship_city`, `ship_state`, `ship_zip`, `ship_country`, `shipping_fee`, `tax`, `payment_type`, `payment_date`, `notes`, `tax_rate`, `order_month`, `order_year`, `order_sub_total`, `order_total`, `closed_date`, `order_qtr`, `ship_name`, `status`, `status_id`, `new`, `ship_via`, `completed`, `shipped`, `invoiced`, `active`, `customer_id`, `created_date`) VALUES
(1, '2010-11-20 00:00:00', 1, '2010-12-20 00:00:00', '789 21th Street', 'Minneapolis', 'MN', '99999', 'USA', 50, 23.86, NULL, NULL, NULL, 0.05, 11, 2010, 477.2, 551.06, NULL, 4, 'Company U', 'Invoiced', 10, 0, 1, 0, 0, 1, 1, 21, '2017-02-22 21:10:44'),
(2, '2010-11-25 00:00:00', 1, '2010-11-30 00:00:00', '456 14th Street', 'Denver', 'CO', '99999', 'USA', 50, 31.875, '1', '1970-01-01 00:00:00', '', 0.05, 11, 2010, 637.5, 719.375, NULL, NULL, 'Company N', 'Shipped', 20, 1, 2, 0, 1, 1, 1, 14, '2017-02-22 21:10:44'),
(3, '2010-12-10 00:00:00', 1, '2010-12-16 00:00:00', '456 15th Street', 'Honolulu', 'HI', '99999', 'USA', 50, 29.3125, NULL, NULL, NULL, 0.05, 12, 2010, 586.25, 665.562, NULL, 4, 'Company O', 'Shipped', 20, 0, 1, 0, 1, 1, 1, 15, '2017-02-22 21:10:44'),
(4, '2010-12-15 00:00:00', 2, '2010-12-21 00:00:00', '789 20th Street', 'New York', 'NY', '99999', 'USA', 50, 29.8, NULL, NULL, NULL, 0, 2010, 0, 0.05, 12, NULL, 2010, '596', 'Completed', 30, 4, 0, 0, 30, 0, 1, 1, '2017-02-22 21:10:44'),
(5, '2010-12-20 00:00:00', 1, '2017-01-26 00:00:00', '123 1st Street', 'Seattle', 'WA', '98052', 'USA', 0, 0, NULL, NULL, NULL, 0, 12, 2010, 334, 334, NULL, 4, 'Company A', 'Completed', 30, 0, 1, 1, 1, 1, 1, 1, '2017-02-22 21:10:44'),
(6, '2010-12-21 00:00:00', 2, '2010-12-23 00:00:00', '123 4th Street', 'New York', 'NY', '98052', 'USA', 20, 8.625, '1', '1970-01-01 00:00:00', '', 0.05, 12, 2010, 172.5, 201.125, NULL, NULL, 'Company D', 'Shipped', 20, 1, 1, 0, 1, 1, 1, 4, '2017-02-22 21:10:44'),
(7, '2010-12-22 00:00:00', 1, '1970-01-01 00:00:00', 'Seattle', 'WA', '98052', 'USA', '0', 73.4375, 0.05, '1', '1970-01-01 00:00:00', 'test', 12, 12, 2010, 1542.19, 4, NULL, NULL, 'New', 'Shipped', 20, 1, 1, 0, 1, 1, 1, 1, '2017-02-22 21:10:44'),
(8, '2017-01-26 00:00:00', 2, '2017-01-30 00:00:00', '789 19th Street', 'Los Angeles', 'CA', '99999', 'USA', 50, 0, NULL, NULL, NULL, 0, 2017, 0, 1, 2017, NULL, 487.5, '537.5', 'Completed', 30, 0, 0, 30, 0, 1, 1, 1, '2017-02-22 21:10:44'),
(9, '2017-03-24 00:00:00', 1, '2017-03-25 00:00:00', '\'test\'', '\'test\'', '\'test\'', '\'test\'', '\'test\'', 3, 1.25, '1', '2017-03-25 00:00:00', '\'test\'', 4, 3, 2017, 10, 14.25, NULL, NULL, '\'test\'', 'Completed', 30, 1, 1, 1, 1, 1, 1, 1, '2017-03-24 11:18:22'),
(10, '2017-03-24 00:00:00', 1, '2017-03-25 00:00:00', '\'test\'', '\'test\'', '\'test\'', '\'test\'', '\'test\'', 3, 1.25, '1', '2017-03-25 00:00:00', '\'test\'', 4, 3, 2017, 31.24, 35.49, NULL, NULL, '\'test\'', 'Completed', 30, 1, 1, 1, 1, 1, 1, 1, '2017-03-24 11:23:24'),
(11, '2017-03-24 00:00:00', 1, '2017-03-24 00:00:00', 'yasir', 'yasir', 'yasir', 'yasir', 'yasir', 5, 0.47, '1', '2017-03-24 00:00:00', 'yasir', 5, 3, 2017, 9.5, 14.97, NULL, NULL, 'yasir', 'Shipped', 20, 1, 1, 0, 1, 1, 1, 1, '2017-03-24 11:28:55'),
(12, '2017-03-24 00:00:00', 2, '2017-03-24 00:00:00', 'Hassan', 'Hassan', 'Hassan', 'Hassan', 'Hassan', 1, 0.39, '1', '2017-03-24 00:00:00', 'Hassan', 1, 3, 2017, 48.65, 50.04, NULL, NULL, 'Hassan', 'Completed', 30, 1, 1, 1, 1, 1, 1, 2, '2017-03-24 11:33:45'),
(13, '2017-03-24 00:00:00', 2, '2017-03-24 00:00:00', 'Hassan', 'Hassan', 'Hassan', 'Hassan', 'Hassan', 1, 0.39, '1', '2017-03-24 00:00:00', 'Hassan', 1, 3, 2017, 39, 40.39, NULL, NULL, 'Hassan', 'Invoiced', 10, 1, 1, 0, 0, 1, 1, 2, '2017-03-24 11:36:11'),
(14, '2017-03-24 00:00:00', 2, '2017-03-24 00:00:00', 'Mohsin', 'Mohsin', 'Mohsin', 'Mohsin', 'Mohsin', 0, 0, '1', '2017-03-10 00:00:00', 'Mohsin', 0, 3, 2017, 40, 40, NULL, NULL, 'Mohsin', 'Completed', 30, 1, 1, 1, 1, 1, 1, 3, '2017-03-24 11:37:20'),
(15, '2017-03-16 00:00:00', 1, '2017-03-14 00:00:00', 'asd', 'asd', 'asd', 'asd', 'asd', 1, 0, '1', '2017-03-09 00:00:00', 'asd', 0, 3, 2017, 9.65, 10.65, NULL, NULL, 'asd', 'Invoiced', 10, 1, 1, 0, 0, 1, 1, 1, '2017-03-24 11:39:59'),
(16, '2017-01-01 00:00:00', 1, '1970-01-01 00:00:00', 'sdas', 'das', 'dasd', 'asdas', 'dasd', 0, 0, '1', '1970-01-01 00:00:00', '', 0, 1, 2017, 9.65, 9.65, NULL, NULL, 'asda', 'Shipped', 20, 1, 2, 0, 1, 1, 1, 1, '2017-03-29 11:03:08'),
(17, '2017-01-12 00:00:00', 1, '1970-01-01 00:00:00', 'asd', 'fgfsd', 'gfdg', 'gfdgfd', 'fdgfd', 0, 0, '2', '2017-01-20 00:00:00', 'mhjfg', 0, 1, 2017, 26.75, 26.75, NULL, NULL, 'ads', 'Completed', 30, 1, 1, 1, 1, 1, 1, 1, '2017-03-29 12:59:08'),
(18, '1970-01-01 00:00:00', 1, '1970-01-01 00:00:00', '', '', '', '', '', 0, 0, '1', '1970-01-01 00:00:00', '', 0, 1, 1970, 184, 184, NULL, NULL, '', 'New', 0, 1, 1, 0, 0, 0, 1, 1, '2017-03-30 07:21:37'),
(19, '1970-01-01 00:00:00', 1, '1970-01-01 00:00:00', '', '', '', '', '', 0, 0, '1', '1970-01-01 00:00:00', '', 0, 1, 1970, 0, 0, NULL, NULL, '', 'New', 0, 1, 1, 0, 0, 0, 1, 1, '2017-03-30 07:24:09'),
(20, '1970-01-01 00:00:00', 1, '1970-01-01 00:00:00', '', '', '', '', '', 0, 0, '1', '1970-01-01 00:00:00', '', 0, 1, 1970, 0, 0, NULL, NULL, '', 'Invoiced', 10, 1, 0, 0, 0, 1, 1, 1, '2017-03-30 07:37:04'),
(21, '1970-01-01 00:00:00', 1, '1970-01-01 00:00:00', '', '', '', '', '', 0, 0, '1', '1970-01-01 00:00:00', '', 0, 1, 1970, 0, 0, NULL, NULL, '', 'Invoiced', 10, 1, 0, 0, 0, 1, 1, 1, '2017-03-30 07:41:52'),
(22, '1970-01-01 00:00:00', 1, '1970-01-01 00:00:00', '', '', '', '', '', 0, 0, '1', '1970-01-01 00:00:00', '', 0, 1, 1970, 0, 0, NULL, NULL, '', 'Invoiced', 10, 1, 0, 0, 0, 1, 1, 1, '2017-03-30 07:42:07'),
(23, '1970-01-01 00:00:00', 1, '1970-01-01 00:00:00', '', '', '', '', '', 0, 0, '1', '1970-01-01 00:00:00', '', 0, 1, 1970, 0, 0, NULL, NULL, '', 'Invoiced', 10, 1, 0, 0, 0, 1, 1, 1, '2017-03-30 07:43:00'),
(24, '1970-01-01 00:00:00', 1, '1970-01-01 00:00:00', '', '', '', '', '', 0, 0, '1', '1970-01-01 00:00:00', '', 0, 1, 1970, 0, 0, NULL, NULL, '', 'Invoiced', 10, 1, 1, 0, 0, 1, 1, 1, '2017-03-30 07:43:44'),
(25, '1970-01-01 00:00:00', 1, '1970-01-01 00:00:00', '', '', '', '', '', 0, 0, '1', '1970-01-01 00:00:00', '', 0, 1, 1970, 0, 0, NULL, NULL, '', 'Invoiced', 10, 1, 1, 0, 0, 1, 1, 2, '2017-03-30 08:13:36'),
(26, '1970-01-01 00:00:00', 1, '1970-01-01 00:00:00', '', '', '', '', '', 0, 0, '1', '1970-01-01 00:00:00', '', 0, 1, 1970, 0, 0, NULL, NULL, '', 'Invoiced', 10, 1, 1, 0, 0, 1, 1, 2, '2017-03-30 08:14:36'),
(27, '1970-01-01 00:00:00', 1, '1970-01-01 00:00:00', '', '', '', '', '', 0, 0, '1', '1970-01-01 00:00:00', '', 0, 1, 1970, 32.4, 32.4, NULL, NULL, '', 'Invoiced', 10, 1, 2, 0, 0, 1, 1, 3, '2017-03-30 08:16:35'),
(28, '2017-03-31 00:00:00', 1, '2017-03-31 00:00:00', '789 21th Street', 'Minneapolis', 'MN', '99999', 'USA', 0, 0, '1', '2017-03-31 00:00:00', '', 0, 3, 2017, 477.2, 477.2, NULL, NULL, 'Bernard Tham', 'Invoiced', 10, 1, 1, 0, 0, 1, 1, 21, '2017-03-31 06:55:25'),
(29, '2017-03-31 00:00:00', 1, '2017-03-31 00:00:00', '123 2nd Street', 'Boston', 'MA', '98112', 'USA', 0, 0, '1', '2017-03-31 00:00:00', '', 0, 3, 2017, 0, 0, NULL, NULL, 'Antonio Gratacos Solsona', 'New', 0, 1, 0, 0, 0, 0, 1, 2, '2017-03-31 08:49:22');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `unit_price` float DEFAULT NULL,
  `discount` float DEFAULT NULL,
  `extended_price` float DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `no_stock` tinyint(1) DEFAULT NULL,
  `allocated` tinyint(1) DEFAULT NULL,
  `invoiced` tinyint(1) DEFAULT NULL,
  `shipped` tinyint(1) DEFAULT NULL,
  `back_ordered` tinyint(1) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `unit_price`, `discount`, `extended_price`, `status_id`, `status`, `no_stock`, `allocated`, `invoiced`, `shipped`, `back_ordered`, `created_date`) VALUES
(1, 1, 25, 10, 10, 0, 100, 40, 'Invoiced', 0, 1, 1, 0, 0, '2017-02-22 20:38:37'),
(2, 1, 16, 5, 46, 0, 230, 40, 'Invoiced', 0, 1, 1, 0, 0, '2017-02-22 20:38:37'),
(3, 1, 14, 8, 18, 0, 147, 40, 'Invoiced', 0, 1, 1, 0, 0, '2017-02-22 20:38:37'),
(55, 2, 8, 10, 23, 0, 233, 50, 'Shipped', 0, 0, 0, 1, 0, '2017-03-28 14:45:17'),
(54, 2, 11, 5, 81, 0, 405, 50, 'Shipped', 0, 0, 0, 1, 0, '2017-03-28 14:45:17'),
(7, 3, 17, 15, 13, 0, 191, 50, 'Shipped', 0, 1, 1, 0, 0, '2017-02-22 20:38:37'),
(8, 3, 25, 20, 10, 0, 200, 50, 'Shipped', 0, 1, 1, 0, 0, '2017-02-22 20:38:37'),
(9, 3, 9, 5, 39, 0, 195, 50, 'Shipped', 0, 1, 1, 0, 0, '2017-02-22 20:38:37'),
(10, 4, 14, 15, 18, 0, 276, 50, 'Shipped', 0, 1, 1, 0, 0, '2017-02-22 20:38:37'),
(11, 4, 5, 5, 25, 0, 125, 50, 'Shipped', 0, 1, 1, 0, 0, '2017-02-22 20:38:37'),
(12, 4, 9, 5, 39, 0, 195, 50, 'Shipped', 0, 1, 1, 0, 0, '2017-02-22 20:38:37'),
(13, 5, 2, 15, 10, 0, 150, 50, 'Shipped', 0, 1, 1, 0, 0, '2017-02-22 20:38:37'),
(14, 5, 10, 20, 9, 0, 184, 50, 'Shipped', 0, 1, 1, 0, 0, '2017-02-22 20:38:37'),
(58, 6, 1, 75, 1, 0, 75, 50, 'Shipped', 0, 0, 0, 1, 0, '2017-03-29 11:47:10'),
(57, 6, 45, 50, 2, 0, 98, 50, 'Shipped', 0, 0, 0, 1, 0, '2017-03-29 11:47:10'),
(34, 7, 16, 25, 46, 0, 1150, 0, 'None', 0, 0, 0, 0, 0, '2017-03-24 15:21:21'),
(33, 7, 17, 25, 13, 0, 319, 0, 'None', 0, 0, 0, 0, 0, '2017-03-24 15:21:21'),
(19, 8, 25, 50, 10, 0, 488, 50, 'Shipped', 0, 1, 1, 0, 0, '2017-02-22 20:38:37'),
(40, 10, 15, 1, 10, 2, 9, 0, 'None', 0, 0, 0, 0, 0, '2017-03-24 15:24:44'),
(39, 10, 3, 1, 22, 1, 22, 0, 'None', 0, 0, 0, 0, 0, '2017-03-24 15:24:44'),
(51, 12, 9, 1, 39, 0, 39, 50, 'Shipped', 0, 0, 0, 1, 0, '2017-03-24 15:39:26'),
(52, 13, 9, 1, 39, 0, 39, 40, 'Invoiced', 0, 0, 1, 0, 0, '2017-03-24 15:39:56'),
(43, 14, 7, 1, 40, 0, 40, 0, 'None', 0, 0, 0, 0, 0, '2017-03-24 15:25:44'),
(53, 15, 15, 1, 10, 0, 10, 40, 'Invoiced', 0, 0, 1, 0, 0, '2017-03-24 15:44:05'),
(30, 9, 2, 1, 10, 0, 10, 0, 'None', 0, 0, 0, 0, 0, '2017-03-24 15:04:05'),
(45, 11, 2, 1, 10, 5, 10, 50, 'Shipped', 0, 0, 0, 1, 0, '2017-03-24 15:37:41'),
(50, 12, 15, 1, 10, 0, 10, 50, 'Shipped', 0, 0, 0, 1, 0, '2017-03-24 15:39:26'),
(74, 16, 15, 1, 10, 0, 10, 50, 'Shipped', 0, 0, 0, 1, 0, '2017-03-29 13:49:15'),
(69, 17, 17, 1, 13, 0, 13, 50, 'Shipped', 0, 0, 0, 1, 0, '2017-03-29 13:06:31'),
(68, 17, 13, 1, 14, 0, 14, 50, 'Shipped', 0, 0, 0, 1, 0, '2017-03-29 13:06:31'),
(75, 26, 12, 0, 10, 0, 0, 40, 'Invoiced', 0, 0, 1, 0, 0, '2017-03-30 08:14:36'),
(76, 26, 12, 0, 10, 0, 0, 40, 'Invoiced', 0, 0, 1, 0, 0, '2017-03-30 08:14:36'),
(77, 27, 14, 1, 18, 0, 18, 40, 'Invoiced', 0, 0, 1, 0, 0, '2017-03-30 08:16:35'),
(78, 27, 13, 1, 14, 0, 14, 40, 'Invoiced', 0, 0, 1, 0, 0, '2017-03-30 08:16:35'),
(83, 28, 16, 5, 46, 0, 230, 40, 'Invoiced', 0, 0, 1, 0, 0, '2017-03-31 06:56:14'),
(82, 28, 25, 10, 10, 0, 100, 40, 'Invoiced', 0, 0, 1, 0, 0, '2017-03-31 06:56:14'),
(84, 28, 14, 8, 18.4, 0, 147.2, 40, 'Invoiced', 0, 0, 1, 0, 0, '2017-03-31 06:56:14'),
(85, 18, 10, 20, 9.2, 0, 184, 0, 'None', 0, 0, 0, 0, 0, '2017-03-31 14:41:36');

-- --------------------------------------------------------

--
-- Table structure for table `order_details_status`
--

DROP TABLE IF EXISTS `order_details_status`;
CREATE TABLE `order_details_status` (
  `id` int(11) NOT NULL,
  `status_id` int(11) DEFAULT NULL,
  `status_text` varchar(100) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details_status`
--

INSERT INTO `order_details_status` (`id`, `status_id`, `status_text`, `created_date`) VALUES
(1, 0, 'None', '2017-02-22 20:45:03'),
(2, 10, 'No Stock', '2017-02-22 20:45:03'),
(3, 20, 'Back Ordered', '2017-02-22 20:45:03'),
(4, 30, 'Allocated', '2017-02-22 20:45:03'),
(5, 40, 'Invoiced', '2017-02-22 20:45:03'),
(6, 50, 'Shipped', '2017-02-22 20:45:03');

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

DROP TABLE IF EXISTS `order_status`;
CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `status_id` int(11) DEFAULT NULL,
  `status_text` varchar(50) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `status_id`, `status_text`, `created_date`) VALUES
(1, 0, 'New', '2017-02-22 23:15:30'),
(2, 10, 'Invoiced', '2017-02-22 23:15:30'),
(3, 20, 'Shipped', '2017-02-22 23:15:30'),
(4, 30, 'Completed', '2017-02-22 23:15:30');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_code` varchar(100) DEFAULT NULL,
  `product_name` varchar(256) DEFAULT NULL,
  `standard_cost` float DEFAULT NULL,
  `list_price` float DEFAULT NULL,
  `quantity_per_unit` varchar(256) DEFAULT NULL,
  `discontinue` tinyint(1) DEFAULT NULL,
  `attachments` text,
  `description` text,
  `supplier_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_code`, `product_name`, `standard_cost`, `list_price`, `quantity_per_unit`, `discontinue`, `attachments`, `description`, `supplier_id`, `category_id`, `created_date`) VALUES
(1, 'NWTB-1', 'Northwind Traders Chai', 0, 0, '1', 0, NULL, 'test', 1, 13, '2017-02-22 23:27:54'),
(2, 'NWTCO-3', 'Northwind Traders Syrup', 7.5, 10, '12 - 550 ml bottles', 0, NULL, NULL, 10, 8, '2017-02-22 23:27:54'),
(3, 'NWTCO-4', 'Northwind Traders Cajun Seasoning', 16.5, 22, '48 - 6 oz jars', 0, NULL, NULL, 10, 8, '2017-02-22 23:27:54'),
(4, 'NWTO-5', 'Northwind Traders Olive Oil', 16.0125, 21.35, '36 boxes', 0, NULL, NULL, 10, 17, '2017-02-22 23:27:54'),
(5, 'NWTJP-6', 'Northwind Traders Boysenberry Spread', 18.75, 25, '12 - 8 oz jars', 0, NULL, NULL, 2, 12, '2017-02-22 23:27:54'),
(6, 'NWTDFN-7', 'Northwind Traders Dried Pears', 22.5, 30, '12 - 1 lb pkgs.', 0, NULL, NULL, 2, 10, '2017-02-22 23:27:54'),
(7, 'NWTS-8', 'Northwind Traders Curry Sauce', 30, 40, '12 - 12 oz jars', 0, NULL, NULL, 8, 14, '2017-02-22 23:27:54'),
(8, 'NWTDFN-14', 'Northwind Traders Walnuts', 17.4375, 23.25, '40 - 100 g pkgs.', 0, NULL, NULL, 2, 10, '2017-02-22 23:27:54'),
(9, 'NWTCFV-17', 'Northwind Traders Fruit Cocktail', 29.25, 39, '15.25 OZ', 0, NULL, NULL, 6, 4, '2017-02-22 23:27:54'),
(10, 'NWTBGM-19', 'Northwind Traders Chocolate Biscuits Mix', 6.9, 9.2, '10 boxes x 12 pieces', 0, NULL, NULL, 2, 1, '2017-02-22 23:27:54'),
(11, 'NWTJP-7', 'Northwind Traders Marmalade', 60.75, 81, '30 gift boxes', 0, NULL, NULL, 6, 12, '2017-02-22 23:27:54'),
(12, 'NWTBGM-21', 'Northwind Traders Scones', 7.5, 10, '24 pkgs. x 4 pieces', 0, NULL, NULL, 2, 1, '2017-02-22 23:27:54'),
(13, 'NWTB-34', 'Northwind Traders Beer', 10.5, 14, '24 - 12 oz bottles', 0, NULL, NULL, 4, 2, '2017-02-22 23:27:54'),
(14, 'NWTCM-40', 'Northwind Traders Crab Meat', 13.8, 18.4, '24 - 4 oz tins', 0, NULL, NULL, 7, 5, '2017-02-22 23:27:54'),
(15, 'NWTSO-41', 'Northwind Traders Clam Chowder', 7.2375, 9.65, '12 - 12 oz cans', 0, NULL, NULL, 6, 16, '2017-02-22 23:27:54'),
(16, 'NWTB-43', 'Northwind Traders Coffee', 34.5, 46, '16 - 500 g tins', 0, NULL, NULL, 3, 2, '2017-02-22 23:27:54'),
(17, 'NWTCA-48', 'Northwind Traders Chocolate', 9.5625, 12.75, '10 pkgs', 0, NULL, NULL, 10, 3, '2017-02-22 23:27:54'),
(18, 'NWTDFN-51', 'Northwind Traders Dried Apples', 39.75, 53, '50 - 300 g pkgs.', 0, NULL, NULL, 2, 10, '2017-02-22 23:27:54'),
(19, 'NWTG-52', 'Northwind Traders Long Grain Rice', 5.25, 7, '16 - 2 kg boxes', 0, NULL, NULL, 2, 11, '2017-02-22 23:27:54'),
(20, 'NWTP-56', 'Northwind Traders Gnocchi', 28.5, 38, '24 - 250 g pkgs.', 0, NULL, NULL, 2, 13, '2017-02-22 23:27:54'),
(21, 'NWTP-57', 'Northwind Traders Ravioli', 14.625, 19.5, '24 - 250 g pkgs.', 0, NULL, NULL, 2, 13, '2017-02-22 23:27:54'),
(22, 'NWTS-65', 'Northwind Traders Hot Pepper Sauce', 15.7875, 21.05, '32 - 8 oz bottles', 0, NULL, NULL, 8, 14, '2017-02-22 23:27:54'),
(23, 'NWTS-66', 'Northwind Traders Tomato Sauce', 12.75, 17, '24 - 8 oz jars', 0, NULL, NULL, 8, 14, '2017-02-22 23:27:54'),
(24, 'NWTD-72', 'Northwind Traders Mozzarella', 26.1, 34.8, '24 - 200 g pkgs.', 0, NULL, NULL, 5, 9, '2017-02-22 23:27:54'),
(25, 'NWTDFN-74', 'Northwind Traders Almonds', 7.5, 10, '5 kg pkg.', 0, NULL, NULL, 6, 10, '2017-02-22 23:27:54'),
(26, 'NWTCO-77', 'Northwind Traders Mustard', 9.75, 13, '12 boxes', 0, NULL, NULL, 10, 8, '2017-02-22 23:27:54'),
(27, 'NWTDFN-80', 'Northwind Traders Dried Plums', 3, 3.5, '1 lb bag', 0, NULL, NULL, 2, 10, '2017-02-22 23:27:54'),
(28, 'NWTB-81', 'Northwind Traders Green Tea', 2, 2.99, '20 bags per box', 0, NULL, NULL, 3, 2, '2017-02-22 23:27:54'),
(29, 'NWTC-82', 'Northwind Traders Granola', 2, 4, '1 item', 0, NULL, NULL, 3, 6, '2017-02-22 23:27:54'),
(30, 'NWTCS-83', 'Northwind Traders Potato Chips', 0.5, 1.8, '1 item', 0, NULL, NULL, 9, 15, '2017-02-22 23:27:54'),
(31, 'NWTBGM-85', 'Northwind Traders Brownie Mix', 9, 12.49, '3 boxes', 0, NULL, NULL, 4, 1, '2017-02-22 23:27:54'),
(32, 'NWTBGM-86', 'Northwind Traders Cake Mix', 10.5, 15.99, '4 boxes', 0, NULL, NULL, 8, 1, '2017-02-22 23:27:54'),
(33, 'NWTB-87', 'Northwind Traders Tea', 2, 4, '100 count per box', 0, NULL, NULL, 7, 2, '2017-02-22 23:27:54'),
(34, 'NWTCFV-88', 'Northwind Traders Pears', 1, 1.3, '15.25 OZ', 0, NULL, NULL, 6, 4, '2017-02-22 23:27:54'),
(35, 'NWTCFV-89', 'Northwind Traders Peaches', 1, 1.5, '15.25 OZ', 0, NULL, NULL, 6, 4, '2017-02-22 23:27:54'),
(36, 'NWTCFV-90', 'Northwind Traders Pineapple', 1, 1.8, '15.25 OZ', 0, NULL, NULL, 6, 4, '2017-02-22 23:27:54'),
(37, 'NWTCFV-91', 'Northwind Traders Cherry Pie Filling', 1, 2, '15.25 OZ', 0, NULL, NULL, 6, 4, '2017-02-22 23:27:54'),
(38, 'NWTCFV-92', 'Northwind Traders Green Beans', 1, 1.2, '14.5 OZ', 0, NULL, NULL, 6, 4, '2017-02-22 23:27:54'),
(39, 'NWTCFV-93', 'Northwind Traders Corn', 1, 1.2, '14.5 OZ', 1, NULL, NULL, 6, 4, '2017-02-22 23:27:54'),
(40, 'NWTCFV-94', 'Northwind Traders Peas', 1, 1.5, '14.5 OZ', 0, NULL, NULL, 6, 4, '2017-02-22 23:27:54'),
(41, 'NWTCM-95', 'Northwind Traders Tuna Fish', 0.5, 2, '5 oz', 0, NULL, NULL, 7, 5, '2017-02-22 23:27:54'),
(42, 'NWTCM-96', 'Northwind Traders Smoked Salmon', 2, 4, '5 oz', 0, NULL, NULL, 7, 5, '2017-02-22 23:27:54'),
(43, 'NWTC-83', 'Northwind Traders Hot Cereal', 3, 5, '1 item', 0, NULL, NULL, 10, 6, '2017-02-22 23:27:54'),
(44, 'NWTSO-98', 'Northwind Traders Vegetable Soup', 1, 1.89, '', 1, NULL, '', 6, 16, '2017-02-22 23:27:54'),
(45, 'NWTSO-99', 'Northwind Traders Chicken Soup', 1, 1.95, '1 item', 0, NULL, NULL, 6, 16, '2017-02-22 23:27:54'),
(46, '14dg51', 'Test product', 10, 12, '3 item', 0, NULL, NULL, 0, 3, '2017-02-22 23:27:54'),
(47, 'Y-001', 'Y Product', 5, 8, '1', NULL, NULL, 'just test insert entry', 10, 3, '2017-03-15 14:04:57'),
(48, 'asdas', 'asd', 4, 10, '1', NULL, NULL, 'asdas', 8, 11, '2017-03-15 14:07:25'),
(49, 'asdas', 'asd', 4, 10, '1', NULL, NULL, 'asdas', 8, 11, '2017-03-15 14:08:21'),
(50, 'sdfs', 'sdf', 1, 1, '1', NULL, NULL, 'sdf', 9, 2, '2017-03-15 14:12:29'),
(51, 'sdfs', 'sdf', 1, 1, '1', NULL, NULL, 'sdf', 9, 2, '2017-03-15 14:12:41'),
(52, 'asd', 'ad', 1, 1, '1', NULL, NULL, 'asdas', 2, 11, '2017-03-15 14:17:57'),
(53, 'sdfs', 'qwerty', 1, 1, '1', NULL, NULL, 'sdf', 9, 3, '2017-03-15 14:19:21'),
(54, 'sdfsdfs', 'aassddff', 1, 1, '1', NULL, NULL, 'sdfsdf', 9, 1, '2017-03-15 14:21:37'),
(55, 'aaa', 'aaa', 1, 1, '1', 1, NULL, 'asdasd', 7, 11, '2017-03-15 14:23:45');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_orders`
--

DROP TABLE IF EXISTS `purchase_orders`;
CREATE TABLE `purchase_orders` (
  `id` int(11) NOT NULL,
  `order_date` datetime DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `expected_date` datetime DEFAULT NULL,
  `shipping_fee` float DEFAULT NULL,
  `taxes` float DEFAULT NULL,
  `payment_date` datetime DEFAULT NULL,
  `payment_amount` float DEFAULT NULL,
  `payment_method` varchar(100) DEFAULT NULL,
  `notes` text,
  `order_sub_total` float DEFAULT NULL,
  `order_total` float DEFAULT NULL,
  `submitted_by` int(11) DEFAULT NULL,
  `submitted_date` datetime DEFAULT NULL,
  `closed_by` int(11) DEFAULT NULL,
  `closed_date` datetime DEFAULT NULL,
  `completed` tinyint(1) DEFAULT NULL,
  `submitted` tinyint(1) DEFAULT NULL,
  `new` tinyint(1) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_orders`
--

INSERT INTO `purchase_orders` (`id`, `order_date`, `supplier_id`, `created_by`, `creation_date`, `expected_date`, `shipping_fee`, `taxes`, `payment_date`, `payment_amount`, `payment_method`, `notes`, `order_sub_total`, `order_total`, `submitted_by`, `submitted_date`, `closed_by`, `closed_date`, `completed`, `submitted`, `new`, `status`, `created_date`) VALUES
(24, '2017-03-31 00:00:00', 1, 1, '2017-03-31 00:00:00', '2017-03-31 00:00:00', 0, 0, NULL, 0, '0', NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 1, 'New', '2017-03-31 16:16:08'),
(23, '2017-03-31 00:00:00', 3, 1, '2017-03-31 00:00:00', '2017-03-31 00:00:00', 0, 0, NULL, 2.99, '0', NULL, 2.99, 2.99, 1, '2017-03-31 00:00:00', NULL, NULL, 0, 1, 0, 'Submitted', '2017-03-31 13:57:05'),
(22, '2017-03-31 00:00:00', 1, 1, '2017-03-31 00:00:00', '2017-03-31 00:00:00', 0, 0, NULL, 0, '1', NULL, 0, 0, 1, '2017-03-31 00:00:00', NULL, NULL, 0, 1, 0, 'Submitted', '2017-03-31 13:11:00'),
(21, '2017-03-29 00:00:00', 1, 1, '2017-03-29 00:00:00', '2017-03-29 00:00:00', 0, 0, NULL, 0, '1', NULL, 0, 0, 1, '2017-03-31 00:00:00', NULL, NULL, 0, 1, 0, 'Submitted', '2017-03-29 21:12:29'),
(20, '1970-01-01 00:00:00', 1, 1, '1970-01-01 00:00:00', '2017-03-29 00:00:00', 0, 0, '2017-03-29 00:00:00', 0, '1', NULL, 0, 0, 1, '2017-03-29 00:00:00', 1, '2017-03-29 00:00:00', 1, 1, 0, 'Completed', '2017-03-29 21:11:28');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_details`
--

DROP TABLE IF EXISTS `purchase_order_details`;
CREATE TABLE `purchase_order_details` (
  `id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `unit_cost` float DEFAULT NULL,
  `extended_price` float DEFAULT NULL,
  `date_received` datetime DEFAULT NULL,
  `purchase_order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `posted_to_inventory` tinyint(1) DEFAULT NULL,
  `submitted` tinyint(1) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_order_details`
--

INSERT INTO `purchase_order_details` (`id`, `quantity`, `unit_cost`, `extended_price`, `date_received`, `purchase_order_id`, `product_id`, `posted_to_inventory`, `submitted`, `created_date`) VALUES
(36, 1, 2.99, 2.99, NULL, 23, 28, 0, 1, '2017-03-31 08:57:45'),
(34, 1, 0, 0, NULL, 21, 1, 0, 1, '2017-03-31 06:34:15'),
(33, 1, 0, 0, '2017-03-01 00:00:00', 20, 1, 1, 1, '2017-03-29 17:33:08'),
(26, 1, 34.8, 34.8, NULL, 18, 24, 0, 0, '2017-03-29 16:02:43'),
(27, 1, 14, 14, NULL, 19, 13, 0, 0, '2017-03-29 16:07:14');

-- --------------------------------------------------------

--
-- Table structure for table `shippers`
--

DROP TABLE IF EXISTS `shippers`;
CREATE TABLE `shippers` (
  `id` int(11) NOT NULL,
  `company` varchar(256) DEFAULT NULL,
  `last_name` varchar(150) DEFAULT NULL,
  `first_name` varchar(150) DEFAULT NULL,
  `email_address` varchar(150) DEFAULT NULL,
  `job_title` varchar(150) DEFAULT NULL,
  `business_phone` varchar(20) DEFAULT NULL,
  `home_phone` varchar(20) DEFAULT NULL,
  `mobile_phone` varchar(20) DEFAULT NULL,
  `fax_number` varchar(20) DEFAULT NULL,
  `address` text,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL,
  `country` varchar(150) DEFAULT NULL,
  `web_page` varchar(500) DEFAULT NULL,
  `notes` text,
  `attachments` text,
  `shipper_name` varchar(150) DEFAULT NULL,
  `file_as` varchar(150) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shippers`
--

INSERT INTO `shippers` (`id`, `company`, `last_name`, `first_name`, `email_address`, `job_title`, `business_phone`, `home_phone`, `mobile_phone`, `fax_number`, `address`, `city`, `state`, `zip`, `country`, `web_page`, `notes`, `attachments`, `shipper_name`, `file_as`, `created_date`) VALUES
(1, 'Shipping Company A', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '123 Any Street', 'Memphis', 'TN', '99999', 'USA', NULL, NULL, NULL, 'Shipping Company A', 'Shipping Company A', NULL),
(2, 'Shipping Company B', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '123 Any Street', 'Memphis', 'TN', '99999', 'USA', NULL, NULL, NULL, 'Shipping Company B', 'Shipping Company B', NULL),
(3, 'Shipping Company C', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '123 Any Street', 'Memphis', 'TN', '99999', 'USA', NULL, NULL, NULL, 'Shipping Company C', 'Shipping Company C', NULL),
(4, 'qaz', 'qwe', 'qwe', 'qwe', 'qaz', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

DROP TABLE IF EXISTS `suppliers`;
CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `company` varchar(256) DEFAULT NULL,
  `last_name` varchar(150) DEFAULT NULL,
  `first_name` varchar(150) DEFAULT NULL,
  `email_address` varchar(150) DEFAULT NULL,
  `job_title` varchar(150) DEFAULT NULL,
  `business_phone` varchar(20) DEFAULT NULL,
  `home_phone` varchar(20) DEFAULT NULL,
  `mobile_phone` varchar(20) DEFAULT NULL,
  `fax_number` varchar(20) DEFAULT NULL,
  `address` text,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL,
  `country` varchar(150) DEFAULT NULL,
  `web_page` varchar(500) DEFAULT NULL,
  `notes` text,
  `attachments` text,
  `supplier_name` varchar(150) DEFAULT NULL,
  `file_as` varchar(150) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `company`, `last_name`, `first_name`, `email_address`, `job_title`, `business_phone`, `home_phone`, `mobile_phone`, `fax_number`, `address`, `city`, `state`, `zip`, `country`, `web_page`, `notes`, `attachments`, `supplier_name`, `file_as`, `created_date`) VALUES
(1, 'Supplier A', 'Andersen', 'Elizabeth A.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Elizabeth A. Andersen', 'Andersen, Elizabeth A.', NULL),
(2, 'Supplier B', 'Weiler', 'Cornelia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Cornelia Weiler', 'Weiler, Cornelia', NULL),
(3, 'Supplier C', 'Kelley', 'Madeleine', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Madeleine Kelley', 'Kelley, Madeleine', NULL),
(4, 'Supplier D', 'Sato', 'Naoki', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Naoki Sato', 'Sato, Naoki', NULL),
(5, 'Supplier E', 'Hernandez-Echevarria', 'Amaya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Amaya Hernandez-Echevarria', 'Hernandez-Echevarria, Amaya', NULL),
(6, 'Supplier F', 'Hayakawa', 'Satomi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Satomi Hayakawa', 'Hayakawa, Satomi', NULL),
(7, 'Supplier G', 'Glasson', 'Stuart', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Stuart Glasson', 'Glasson, Stuart', NULL),
(8, 'Supplier H', 'Dunton', 'Bryn Paul', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bryn Paul Dunton', 'Dunton, Bryn Paul', NULL),
(9, 'Supplier I', 'Sandberg', 'Mikael', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mikael Sandberg', 'Sandberg, Mikael', NULL),
(10, 'Supplier J', 'Sousa', 'Luis', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Luis Sousa', 'Sousa, Luis', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Hassan Latif', 'hassan230@gmail.com', '$2y$10$go79rgQNZj7eyqnPAmYe7OF/Koz7gxLVtep75NTWgAi0XVW.YcpQS', 'KPvVCPJMlIF6Dluy6BepQy3TkDSrTWZA4bVEjdun1idbzvhqSxFV60xO1bIs', '2017-01-24 03:24:00', '2017-02-22 10:25:26'),
(2, 'Mohsin', 'mohsin@gmail.com', '$2y$10$dARpqnCDq6Bp.BlVOgrg8.AD.WlccFdU5HuQtqFGNuvtnExtxrhVa', 'GqxzMJr93hlT6yi3ZMNmcpdTLNbNAaM46EF5WE2KCrCoMhiTRCuanHQs61jq', '2017-01-24 04:28:45', '2017-01-24 04:32:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventoryshrinkage`
--
ALTER TABLE `inventoryshrinkage`
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
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details_status`
--
ALTER TABLE `order_details_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_order_details`
--
ALTER TABLE `purchase_order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippers`
--
ALTER TABLE `shippers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `inventoryshrinkage`
--
ALTER TABLE `inventoryshrinkage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT for table `order_details_status`
--
ALTER TABLE `order_details_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `purchase_order_details`
--
ALTER TABLE `purchase_order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `shippers`
--
ALTER TABLE `shippers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
