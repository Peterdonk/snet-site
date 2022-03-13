-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2021 at 12:14 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vouchers`
--

-- --------------------------------------------------------

--
-- Table structure for table `cards_tbl`
--

CREATE TABLE `cards_tbl` (
  `card_id` int(100) NOT NULL,
  `card_pin` varchar(60) NOT NULL,
  `card_status` varchar(20) NOT NULL,
  `card_days` varchar(100) NOT NULL,
  `card_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cards_tbl`
--

INSERT INTO `cards_tbl` (`card_id`, `card_pin`, `card_status`, `card_days`, `card_timestamp`) VALUES
(1, ' XS4QBL3', 'used', '2days', '2021-10-09 01:30:44'),
(2, ' SBMY544', 'unused', '2days', '2021-10-09 01:30:44'),
(3, ' SB72ZH4', 'unused', '2days', '2021-10-09 01:30:44'),
(4, ' LYVDBR', 'unused', '2days', '2021-10-09 01:30:44'),
(5, ' NBQQNA3', 'unused', '2days', '2021-10-09 01:30:44'),
(6, ' DQDSP24', 'unused', '2days', '2021-10-09 01:30:44'),
(7, ' W6W46B', 'unused', '2days', '2021-10-09 01:30:44'),
(8, ' HLEMPF', 'unused', '2days', '2021-10-09 01:30:44'),
(9, ' L2SHUC', 'unused', '2days', '2021-10-09 01:30:44'),
(10, ' N7UCFL3', 'unused', '2days', '2021-10-09 01:30:44'),
(11, ' U6WMSQ', 'unused', '2days', '2021-10-09 01:30:44'),
(12, ' VASGEC', 'unused', '2days', '2021-10-09 01:30:44'),
(13, ' CX3PQ33', 'unused', '2days', '2021-10-09 01:30:44'),
(14, ' ST7ZHT', 'unused', '2days', '2021-10-09 01:30:44'),
(15, ' GAXP4', 'unused', '2days', '2021-10-09 01:30:44'),
(16, ' TKAJJB', 'unused', '2days', '2021-10-09 01:30:44'),
(17, ' SKEC463', 'unused', '2days', '2021-10-09 01:30:44'),
(18, ' TXAHZ54', 'unused', '2days', '2021-10-09 01:30:44'),
(19, ' EK8CUA4', 'unused', '2days', '2021-10-09 01:30:44'),
(20, ' ZRA55G3', 'unused', '2days', '2021-10-09 01:30:45');

-- --------------------------------------------------------

--
-- Table structure for table `card_price_tbl`
--

CREATE TABLE `card_price_tbl` (
  `price_id` int(100) NOT NULL,
  `card_price` varchar(60) NOT NULL,
  `card_price_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `card_price_tbl`
--

INSERT INTO `card_price_tbl` (`price_id`, `card_price`, `card_price_timestamp`) VALUES
(1, '8', '2021-02-26 21:53:46');

-- --------------------------------------------------------

--
-- Table structure for table `payment_tbl`
--

CREATE TABLE `payment_tbl` (
  `main_tranx_id` int(100) NOT NULL,
  `tranx_id` text NOT NULL,
  `tranx_status` text NOT NULL,
  `tranx_amount` text NOT NULL,
  `tranx_currency` text NOT NULL,
  `tranx_phone` text NOT NULL,
  `tranx_transaction_date` text NOT NULL,
  `tranx_reference` text NOT NULL,
  `my_tranx_reference` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_tbl`
--

INSERT INTO `payment_tbl` (`main_tranx_id`, `tranx_id`, `tranx_status`, `tranx_amount`, `tranx_currency`, `tranx_phone`, `tranx_transaction_date`, `tranx_reference`, `my_tranx_reference`) VALUES
(1, '1375610777', 'success', '200', 'GHS', '0552513405', '2021-10-09T01:32:59.000Z', 'utduu76emc', 'utduu76emc');

-- --------------------------------------------------------

--
-- Table structure for table `sold_cards_tbl`
--

CREATE TABLE `sold_cards_tbl` (
  `card_id` int(100) NOT NULL,
  `card_pin` varchar(60) NOT NULL,
  `card_status` varchar(20) NOT NULL,
  `card_days` varchar(100) NOT NULL,
  `card_timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `card_phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sold_cards_tbl`
--

INSERT INTO `sold_cards_tbl` (`card_id`, `card_pin`, `card_status`, `card_days`, `card_timestamp`, `card_phone`) VALUES
(1, ' XS4QBL3', 'used', '2days', '2021-10-09 01:33:09', '0552513405');

-- --------------------------------------------------------

--
-- Table structure for table `users_tbl`
--

CREATE TABLE `users_tbl` (
  `user_id` int(100) NOT NULL,
  `user_username` text NOT NULL,
  `user_password` text NOT NULL,
  `user_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_tbl`
--

INSERT INTO `users_tbl` (`user_id`, `user_username`, `user_password`, `user_timestamp`) VALUES
(1, 'gf', 'cfdfdf', '2021-10-09 07:27:48'),
(2, 'king', '$2y$10$YaYtpZn/rTcBPuQp7FNv6ee2AO0nvOXoeODoV6TgVbW0wEuJUT2BS', '2021-10-09 07:33:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cards_tbl`
--
ALTER TABLE `cards_tbl`
  ADD PRIMARY KEY (`card_id`);

--
-- Indexes for table `card_price_tbl`
--
ALTER TABLE `card_price_tbl`
  ADD PRIMARY KEY (`price_id`);

--
-- Indexes for table `payment_tbl`
--
ALTER TABLE `payment_tbl`
  ADD PRIMARY KEY (`main_tranx_id`);

--
-- Indexes for table `sold_cards_tbl`
--
ALTER TABLE `sold_cards_tbl`
  ADD PRIMARY KEY (`card_id`);

--
-- Indexes for table `users_tbl`
--
ALTER TABLE `users_tbl`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cards_tbl`
--
ALTER TABLE `cards_tbl`
  MODIFY `card_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `card_price_tbl`
--
ALTER TABLE `card_price_tbl`
  MODIFY `price_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment_tbl`
--
ALTER TABLE `payment_tbl`
  MODIFY `main_tranx_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sold_cards_tbl`
--
ALTER TABLE `sold_cards_tbl`
  MODIFY `card_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_tbl`
--
ALTER TABLE `users_tbl`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
