-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2023 at 04:33 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_akhir`
--

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `keranjangid` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `total_harga` int(10) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` int(3) NOT NULL,
  `catatanorder` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`keranjangid`, `username`, `total_harga`, `productid`, `quantity`, `catatanorder`) VALUES
(1, 'andra', 8000000, 1, 2, 'bang'),
(14, 'user', 19500, 1, 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `orderstatus`
--

CREATE TABLE `orderstatus` (
  `orderstatusid` int(11) NOT NULL,
  `waktu` datetime NOT NULL,
  `username` varchar(20) NOT NULL,
  `total_harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderstatus`
--

INSERT INTO `orderstatus` (`orderstatusid`, `waktu`, `username`, `total_harga`) VALUES
(1, '2022-11-26 16:56:18', 'user', 12000000),
(2, '2022-11-26 17:17:49', 'user', 6000000),
(4, '2023-05-30 16:52:54', 'user', 12000000),
(5, '2023-05-31 09:18:30', 'user', 6500),
(10, '2023-05-31 10:06:33', 'agil', 80000),
(11, '2023-05-31 17:57:38', 'Agil', 375500),
(13, '2023-05-31 18:00:25', 'Agil', 7000),
(14, '2023-06-02 21:27:13', 'dani', 21000);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productid` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` int(10) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productid`, `name`, `price`, `foto`) VALUES
(1, 'Isi Ulang', 7000, 'isi ulang.jpg'),
(2, 'Aqua Galon', 21000, 'aqua.jpg'),
(11, 'Vit Galon', 18500, 'vit.jpg'),
(14, 'Le Mineral Galon', 21500, 'le mineral.jpg'),
(15, 'Tabung Gas 3 Kg', 22500, 'gas 3kg.jpeg'),
(16, 'Tabung Gas 12 Kg', 225000, 'gas 12kg.jpg'),
(17, 'Gas Kaleng', 7000, 'gas kaleng.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `telp` int(20) NOT NULL,
  `alamat` text NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `telp`, `alamat`, `level`) VALUES
('123', '123', 123, '123', ''),
('a', 'abc', 2147483647, 'rhaisa', ''),
('admin', 'admin', 812345678, 'wates, kulon progo', 'admin'),
('Agil', 'agil', 2147483647, 'Kurang Paham', ''),
('andra', '123', 123, '123', ''),
('dani', 'pancongoreo', 2147483647, 'Hendrokilo, RT 05/RW 02 Nepen, Teras, Boyolali, Jawa Tengah', ''),
('user', 'user', 82131414, 'jepara, jawa tengah', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`keranjangid`),
  ADD KEY `username` (`username`),
  ADD KEY `productid` (`productid`);

--
-- Indexes for table `orderstatus`
--
ALTER TABLE `orderstatus`
  ADD PRIMARY KEY (`orderstatusid`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `keranjangid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `orderstatus`
--
ALTER TABLE `orderstatus`
  MODIFY `orderstatusid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_ibfk_2` FOREIGN KEY (`username`) REFERENCES `user` (`username`),
  ADD CONSTRAINT `keranjang_ibfk_3` FOREIGN KEY (`productid`) REFERENCES `product` (`productid`);

--
-- Constraints for table `orderstatus`
--
ALTER TABLE `orderstatus`
  ADD CONSTRAINT `orderstatus_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
