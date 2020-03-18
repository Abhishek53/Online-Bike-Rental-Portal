

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartmetro`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `ADMIN` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(100) DEFAULT NULL,
  `admin_password` varchar(100) NOT NULL
  
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `ADMIN` (`admin_id`, `admin_name`, `admin_email`,`admin_password`) VALUES(1, 'Abhishek','abhi@gmail.com', 'aaa');
INSERT INTO `ADMIN` (`admin_id`, `admin_name`, `admin_email`,`admin_password`) VALUES(2, 'Ameen','amn@gmail.com', 'aaa');

-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `USER` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `user_name` varchar(120) DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `user_password` varchar(100) DEFAULT NULL,
  `user_phone` varchar(11) DEFAULT NULL,
  `user_dob` date DEFAULT NULL,
  `user_gender` varchar(100) DEFAULT NULL,
  `user_city` varchar(50) DEFAULT NULL,
  `user_balance` float(11) DEFAULT 0.0
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;


INSERT INTO `USER` (`user_id`, `user_name`, `user_email`,`user_password`,`user_phone`,`user_dob`,`user_gender`,`user_city`,`user_balance`) VALUES(1, 'user1','user1@gmail.com', '34819d7beeabb9260a5c854bc85b3e44','123456487','Male','1998-05-5','Bangalore',100);
-- --------------------------------------------------------



CREATE TABLE IF NOT EXISTS `tblbooking` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `VehicleId` int(11) references tblvehicles(id),
  `user_email` varchar(120) references user(user_email),
  `FromDate` varchar(120) DEFAULT NULL,
  `ToDate` varchar(120) DEFAULT NULL,
  `days` int(11) DEFAULT 0,
  `Status` int(11) DEFAULT 0,
  `DStatus` int(11) DEFAULT 0
 ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `tblbrands` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `BrandName` varchar(120) NOT NULL,
  `CreationDate` varchar(11) DEFAULT NULL 
  ) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbrands`
--

INSERT INTO `tblbrands` (`id`, `BrandName`, `CreationDate`) VALUES
(1, 'KTM', '2017-06-18 16:24:34' ),
(2, 'Bajaj', '2017-06-18 16:24:50'),
(3, 'Honda', '2017-06-18 16:25:03'),
(4, 'Suzuki', '2017-06-18 16:25:13'),
(5, 'Yamaha', '2017-06-18 16:25:24'),
(7, 'Ducati', '2017-06-19 06:22:13');

-- --------------------------------------------------------
-- --------------------------------------------------------

--
-- Table structure for table `tblvehicles`
--

CREATE TABLE IF NOT EXISTS `tblvehicles` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `dealer` int(11) references dealer(dealer_id),
  `VehiclesTitle` varchar(150) DEFAULT NULL,
  `VehiclesBrand` int(11) DEFAULT NULL,
  `PricePerDay` int(11) DEFAULT NULL,
  `FuelType` varchar(100) DEFAULT NULL,
  `ModelYear` int(6) DEFAULT NULL,
  `Vimage1` varchar(120) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblvehicles`
--

INSERT INTO `tblvehicles` (`id`, `VehiclesTitle`, `VehiclesBrand`,  `PricePerDay`, `FuelType`, `ModelYear`, `Vimage1`,  `status`) VALUES
(1, 'SS400', 2, 600, 'sports', 2017, 'knowledges_base_bg.jpg','1' ),
(2, 'RS200', 2, 859, 'sports', 2015, 'bike_755x430.png','1'),
(3, 'R1', 4,1563, 'sports', 2012,  'featured-img-300.jpg','1'),
(4, 'Duke390', 1, 1200, 'street', 2012,  'featured-img-3000.jpg','1'),
(5, 'R1', 5, 1345, 'sports', 2010, 'bikes_755x430.png','1');

--

-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `dealer` (
  `dealer_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `dealer_name` varchar(120) DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `dealer_phone` varchar(11) DEFAULT NULL,
  `dealer_city` varchar(50) DEFAULT NULL,
  `admin_id` int(11) references admin(admin_id)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;