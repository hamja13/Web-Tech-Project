CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `picture` varchar(100) NOT NULL DEFAULT 'defaullt-admin-picture.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `car` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `location` varchar(100) NOT NULL DEFAULT 'Dhaka',
  `cartype` varchar(100) NOT NULL DEFAULT 'luxury',
  `name` varchar(100) NOT NULL DEFAULT 'None',
  `picture` varchar(100) NOT NULL DEFAULT 'car.png',
  `status` varchar(100) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `salary` int(11) NOT NULL DEFAULT 0,
  `position` varchar(100) NOT NULL DEFAULT 'junior',
  `status` varchar(100) NOT NULL DEFAULT 'active',
  `picture` varchar(100) NOT NULL DEFAULT 'defaullt-employee-picture.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `driver` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'active',
  `picture` varchar(100) NOT NULL DEFAULT 'defaullt-driver-picture.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `voucher` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `code` varchar(100) DEFAULT NULL,
  `discount_percent` int(11) NOT NULL DEFAULT 0,
  `min_price` int(11) NOT NULL DEFAULT 0,
  `max_discount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `admin` (`id`, `password`, `name`, `email`, `phone`, `address`, `picture`) VALUES
(1, 'crms7894', 'Controller Of CRMS', 'admin@hotmail.com', '01244666350', 'American International University Of Bangladesh', '1680402503.2972hulk.png');

INSERT INTO `car` (`id`, `location`, `cartype`, `name`, `picture`, `status`) VALUES
(4, 'Sylhet', 'jeep', 'suzuki', '1678809013.564pexels-s-von-hoerst-2676096.jpg', 'active'),
(5, 'Barishal', 'sports', 'toyota', '1678815103.2419pexels-yurii-hlei-1545743.jpg', 'active'),
(6, 'Chittagong', 'luxury', 'suzuki', '1678819716.2396pexels-jesse-zheng-1213294.jpg', 'blocked'),
(7, 'Rajshahi', 'luxury', 'toyota', '1678898574.7756pexels-stephan-louis-5381501.jpg', 'active'),
(8, 'Sylhet', 'jeep', 'Yamaha', '1679216141.5784pexels-viktor-lundberg-754595.jpg', 'active');


INSERT INTO `employee` (`id`, `password`, `name`, `email`, `phone`, `address`, `salary`, `position`, `status`, `picture`) VALUES
(1, 'hamjahassan', 'Hamja Hasan', 'hassan@mail.com', '01666666787', 'Fakirapul', 10000, 'leader', 'blocked', 'defaullt-employee-picture.png'),
(4, 'safuat', 'Muhammed Islam Safuat', 'mdsaf@mail.com', '01232351465', 'Chittagong', 200000, 'leader', 'active', 'defaullt-employee-picture.png');

INSERT INTO `driver` (`id`, `password`, `name`, `email`, `phone`, `address`, `status`, `picture`) VALUES
(1, 'towkmah4567', 'Towkir Mahbub', 'towk@yahoo.com', '01313213132', 'Basabo', 'active', '1680404909.3692avatar.png'),
(2, 'nishfer89789', 'Nishi Ferdous', 'nishi@hotmail.com', '01641651551', 'Gulistan', 'active', 'defaullt-driver-picture.png'),
(3, 'hasjahan', 'Hasan Jahangir', 'jhasan@yahoo.com', '01651651651;', 'Bogura', 'blocked', 'defaullt-driver-picture.png')
