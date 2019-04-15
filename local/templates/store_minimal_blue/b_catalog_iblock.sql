-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 12, 2019 at 10:46 AM
-- Server version: 5.7.25-log
-- PHP Version: 7.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ng`
--

-- --------------------------------------------------------

--
-- Table structure for table `b_catalog_iblock`
--

CREATE TABLE `b_catalog_iblock` (
  `IBLOCK_ID` int(11) NOT NULL,
  `YANDEX_EXPORT` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `SUBSCRIPTION` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `VAT_ID` int(11) DEFAULT '0',
  `PRODUCT_IBLOCK_ID` int(11) NOT NULL DEFAULT '0',
  `SKU_PROPERTY_ID` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `b_catalog_iblock`
--

INSERT INTO `b_catalog_iblock` (`IBLOCK_ID`, `YANDEX_EXPORT`, `SUBSCRIPTION`, `VAT_ID`, `PRODUCT_IBLOCK_ID`, `SKU_PROPERTY_ID`) VALUES
(11, 'N', 'N', 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `b_catalog_iblock`
--
ALTER TABLE `b_catalog_iblock`
  ADD PRIMARY KEY (`IBLOCK_ID`),
  ADD KEY `IXS_CAT_IB_PRODUCT` (`PRODUCT_IBLOCK_ID`),
  ADD KEY `IXS_CAT_IB_SKU_PROP` (`SKU_PROPERTY_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
