-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018 年 12 月 24 日 13:17
-- 伺服器版本: 10.1.37-MariaDB
-- PHP 版本： 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `hair`
--

-- --------------------------------------------------------

--
-- 資料表結構 `barber`
--

CREATE TABLE `barber` (
  `barber_ID` int(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `cellphone` varchar(20) DEFAULT NULL,
  `salary` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `barber`
--

INSERT INTO `barber` (`barber_ID`, `name`, `gender`, `cellphone`, `salary`) VALUES
(10001, 'Ανδρέας', 'F', '(09)13164122', 20000),
(10002, 'Θωμάς', 'M', '(09)66616454', 23000),
(10003, 'Ματθαίος', 'M', '(09)79863116', 18000),
(10004, 'Σίμων', 'F', '(09)13132303', 40000),
(10005, 'Ισκαριώτης', 'F', '(09)02316123', 100000),
(10006, 'Θαδδαίος', 'F', NULL, 5000);

-- --------------------------------------------------------

--
-- 資料表結構 `customer`
--

CREATE TABLE `customer` (
  `customer_ID` int(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `IsNotVIP` varchar(5) DEFAULT NULL,
  `gender` varchar(5) NOT NULL,
  `barber_ID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `customer`
--

INSERT INTO `customer` (`customer_ID`, `name`, `telephone`, `IsNotVIP`, `gender`, `barber_ID`) VALUES
(20001, '張三', '(09)87654321', '1', 'F', 10003),
(20002, '陳菜雞', NULL, NULL, 'M', 10005),
(20003, '王帥哥', '(09)78471933', '1', 'M', 10002),
(20004, '老鄭', NULL, NULL, 'M', 10001),
(20005, '老王', '(09)51113135', '1', 'M', 10005),
(20006, '老趙', NULL, NULL, 'M', 10005),
(20007, '李四', '(09)89461316', '1', 'F', 10003);

-- --------------------------------------------------------

--
-- 資料表結構 `hairstyle`
--

CREATE TABLE `hairstyle` (
  `customer_ID` int(5) NOT NULL,
  `style` varchar(20) NOT NULL,
  `shampoo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `hairstyle`
--

INSERT INTO `hairstyle` (`customer_ID`, `style`, `shampoo`) VALUES
(20001, '平頭', '薄荷'),
(20002, '飛機頭', '薰衣草'),
(20003, '無造型', '檸檬'),
(20004, '光頭', NULL),
(20005, '無造型', '薄荷'),
(20006, '無造型', '玫瑰'),
(20007, '光頭', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `shampoo`
--

CREATE TABLE `shampoo` (
  `type` varchar(10) NOT NULL,
  `amount` int(5) NOT NULL,
  `in_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `shampoo`
--

INSERT INTO `shampoo` (`type`, `amount`, `in_date`) VALUES
('檸檬', 1, '2018/05/26'),
('玫瑰', 10, '2018/11/11'),
('薄荷', 5, '2018/07/11'),
('薰衣草', 3, '2018/10/09');

-- --------------------------------------------------------

--
-- 資料表結構 `vip`
--

CREATE TABLE `vip` (
  `customer_ID` int(5) NOT NULL,
  `point` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `vip`
--

INSERT INTO `vip` (`customer_ID`, `point`) VALUES
(20001, 100),
(20003, 50),
(20005, 330),
(20007, 100);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `barber`
--
ALTER TABLE `barber`
  ADD PRIMARY KEY (`barber_ID`);

--
-- 資料表索引 `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_ID`),
  ADD KEY `barber_ID` (`barber_ID`);

--
-- 資料表索引 `hairstyle`
--
ALTER TABLE `hairstyle`
  ADD PRIMARY KEY (`customer_ID`),
  ADD KEY `shampoo` (`shampoo`);

--
-- 資料表索引 `shampoo`
--
ALTER TABLE `shampoo`
  ADD PRIMARY KEY (`type`);

--
-- 資料表索引 `vip`
--
ALTER TABLE `vip`
  ADD PRIMARY KEY (`customer_ID`);

--
-- 已匯出資料表的限制(Constraint)
--

--
-- 資料表的 Constraints `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`barber_ID`) REFERENCES `barber` (`barber_ID`);

--
-- 資料表的 Constraints `hairstyle`
--
ALTER TABLE `hairstyle`
  ADD CONSTRAINT `hairstyle_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_ID`),
  ADD CONSTRAINT `hairstyle_ibfk_2` FOREIGN KEY (`shampoo`) REFERENCES `shampoo` (`type`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
