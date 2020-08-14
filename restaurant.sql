-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2020 at 05:34 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `orderid` int(11) NOT NULL,
  `billamount` int(11) NOT NULL,
  `paidamount` int(11) NOT NULL,
  `paymentmode` varchar(50) NOT NULL,
  `tip` int(11) NOT NULL,
  `enteredby` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `date`, `orderid`, `billamount`, `paidamount`, `paymentmode`, `tip`, `enteredby`, `status`) VALUES
(106, '2020-08-14 00:00:00', 285, 500, 500, 'cash', 0, 'reji', 0),
(107, '2020-08-14 00:00:00', 285, 40, 500, 'cash', 0, 'reji', 0),
(108, '2020-08-14 00:00:00', 284, 40, 40, 'card', 0, 'ravi', 0),
(109, '2020-08-21 00:00:00', 286, 100, 100, 'card', 50, 'reji', 0),
(110, '2020-08-21 00:00:00', 287, 195, 195, 'cash', 100, 'siva', 0),
(111, '2020-08-15 00:00:00', 290, 135, 135, 'card', 0, 'kala', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contactno` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `username`, `password`, `email`, `contactno`, `address`, `status`) VALUES
(16, 'Ram', 'ram', 'ram@gmail.com', 2147483647, 'jayanagar,bengaluru', 0),
(18, 'seema', 'seema', 'see@gmail.com', 876631070, 'kochi,kerala', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `image` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `category`, `quantity`, `price`, `description`, `image`, `status`) VALUES
(1, 'Masala Dosa', 'breakfast', 1, 40, 'Crispy Masala Dosa served with Coconut Chutney,Sambar & special potato masala.', 'masaladosa.png', 0),
(2, 'Ghee Roast', 'breakfast', 1, 50, ' Ghee Roast Served with chutneys & sambar.', 'Gheeroast.jpg', 0),
(3, 'Mutton Biriyani', 'lunch', 1, 500, 'Delicious Kolkata Style Mutton Biriyani...', 'muttonbiriyani.jpg', 0),
(4, 'Chapathi With Vegetable Kuruma.', 'dinner', 1, 40, '1 set Chapathi Served With Vegetable Kuruma & Cucumber Salad.', 'chapathi.jpg', 0),
(5, 'Idli with Chutneys & sambar.', 'breakfast', 4, 20, '4 Idlies served with coconut chutney & Delicious South Indaian Sambar.', 'idli.jpg', 0),
(6, 'Chicken Soup', 'starter', 1, 100, 'Cream of Chicken Soup', 'chickensoup.jpg', 0),
(7, 'Mutton Soup', 'starter', 1, 150, 'hot mutton leg soup...', 'muttonsoup.jpg', 0),
(8, 'vegetable Soup', 'starter', 1, 75, 'creamy vegetable soup enriched with healthy vegetables beans,carrot,broccoli etc...', 'vegsoup.jpg', 0),
(9, 'vegetable pulao', 'lunch', 1, 125, 'Healthy Vegetable Pulao Specially made for Vegetarians....', 'vegpulao.jpg', 0),
(10, 'kashmiri pulao', 'lunch', 1, 150, 'A sweet and unconventional pulao, loaded with the goodness of dry fruits, rich cream and few spices.', 'kashmiripulao.jpg', 0),
(11, 'egg fried rice', 'lunch', 1, 130, 'Fried rice with both egg & vegetables.', 'eggfriedrice.jpg', 0),
(12, 'South indian  veg meal', 'lunch', 1, 150, 'kerala style Vegeterian Onam sadya(Onam special) with 14 curries including sambar,kalan,erissery,...papad,pazham,onam chips & special payasam also served.', 'southindianmeal.jpg', 0),
(13, 'Fish curry', 'lunch', 1, 150, 'Malabar Style Fish Curry.', 'fishcurry.jpg', 0),
(14, 'vegetable kothu parotta', 'dinner', 1, 80, 'Vegetable kothu parotta with Capsicum and vegetables.Sidedish is not needed.', 'kothuparotta.jpeg', 0),
(15, 'Oats Upma', 'dinner', 1, 60, 'Protein riched \'Egg Scrambled\' Oats Upma.', 'oatsupma.jpg', 0),
(16, 'Vegetable salad', 'dinner', 1, 30, 'Raw Veggie Chopped Salad without any oil.good for Health. ', 'vegsalad.jpg', 0),
(17, 'pizza', 'snacks', 1, 60, 'vegetable pizza', 'pizza.jpg', 0),
(18, 'Chicken Burger', 'snacks', 1, 80, 'Crispy chicken Burger with cheese.', 'chicken burger.jpg', 0),
(19, 'veg sandwich', 'snacks', 1, 60, '\r\nSummer Veggie Sandwiche made of whole wheat bread filled with vegetable salad mixed with olive oil. ', 'vegsandwich.jpg', 0),
(20, 'potato puree & cutlet', 'snacks', 1, 75, '\r\ncombo of Potato puree & potato cutlet especially for kids.', 'potatocutlet.jpg', 0),
(21, 'dalgona coffee', 'drinks', 1, 60, 'The most trendy Coffee-\'Dalgona coffee\'.mix milk and enjoy...', 'dalgonacoffee.jpg', 0),
(22, 'fruit cocktail', 'drinks', 1, 50, '\r\nfruit cocktail drink(Coquetel de Frutas)\r\n is a refreshing and delicious blend of fruits blended with sweetened condensed fruit juices such as berries,orange,papaya & lime juice.', 'fruitcocktail.jpg', 0),
(23, 'coffee', 'drinks', 1, 30, 'Normal Indian Coffee.\r\n\r\n', 'coffee.jpg', 0),
(24, 'Tea', 'drinks', 1, 50, 'Chai/Chaya(Indian Tea) with milk.\r\n\r\n', 'tea.jpg', 0),
(25, 'Green Tea', 'drinks', 1, 40, 'A warm cup of green tea -source of antioxidants.\r\n\r\n', 'greentea.webp', 0),
(26, 'orange juice', 'drinks', 1, 50, 'Fresh orange Juice.\r\n\r\n', 'orangejuice.jpg', 0),
(27, 'butter fruit milkshake', 'drinks', 1, 70, 'Avacado milk shake', 'butterfruitmilkshake.jpeg', 0),
(28, 'strawberry icecream', 'drinks', 1, 60, '\r\nSoy milk strawberry icecream.', 'icecream.jpg', 0),
(29, 'chicken 65', 'starter', 1, 90, 'hot & spicy chicken 65.', 'chicken65.jpg', 0),
(30, 'mushroom ', 'starter', 1, 120, '\r\nbite size sausage stuffed mushrooms.', 'mushroom.jpg', 0),
(31, 'pasta', 'dinner', 1, 100, 'italian pasta with butter,sage and parmesan.', 'pasta.jpg', 0),
(32, 'Moong Dal Roti ', 'dinner', 1, 110, '\r\nsprouted Moong Dal Roti for diabetic patients.', 'roti.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `customerid` int(11) NOT NULL,
  `waiter` varchar(50) NOT NULL,
  `when` datetime NOT NULL,
  `amount` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `customerid`, `waiter`, `when`, `amount`, `status`) VALUES
(284, 18, 'raj', '2020-08-13 00:00:00', 40, 1),
(285, 18, 'praveen', '2020-08-20 00:00:00', 500, 1),
(286, 18, 'kk', '2020-08-29 00:00:00', 100, 1),
(287, 18, 'siva', '2020-08-19 00:00:00', 195, 1),
(288, 18, 'jayan', '2020-08-27 00:00:00', 300, 0),
(289, 18, 'raj', '2020-08-21 00:00:00', 90, 0),
(290, 18, 'anvar', '2020-08-14 00:00:00', 135, 1),
(291, 18, 'kumar', '2020-08-14 00:00:00', 30, 0),
(292, 18, 'kp', '2020-08-28 00:00:00', 210, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `menuid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `orderid`, `menuid`, `quantity`, `status`) VALUES
(88, 284, 4, 1, 0),
(89, 285, 3, 1, 0),
(90, 286, 6, 1, 0),
(91, 287, 8, 1, 0),
(92, 287, 30, 1, 0),
(93, 288, 10, 2, 0),
(94, 288, 13, 1, 0),
(95, 289, 15, 1, 0),
(96, 289, 16, 1, 0),
(97, 290, 17, 1, 0),
(98, 290, 20, 1, 0),
(99, 291, 23, 4, 0),
(100, 292, 29, 2, 0),
(101, 292, 30, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=293;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
