-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2017 at 01:46 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doan`
--

-- --------------------------------------------------------

--
-- Table structure for table `chuyenbay`
--

CREATE TABLE `chuyenbay` (
  `maChuyenBay` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ngayKhoiHanh` date NOT NULL,
  `ngayDen` date NOT NULL,
  `gioKhoiHanh` time NOT NULL,
  `gioDen` time NOT NULL,
  `trangThai` tinyint(1) NOT NULL,
  `maHangMayBay` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `maTuyenBay` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chuyenbay`
--

INSERT INTO `chuyenbay` (`maChuyenBay`, `ngayKhoiHanh`, `ngayDen`, `gioKhoiHanh`, `gioDen`, `trangThai`, `maHangMayBay`, `maTuyenBay`) VALUES
('VNA01', '2017-12-13', '2017-12-13', '13:00:00', '14:00:00', 1, 'VNA', 'BN-BG'),
('VNA02', '2017-12-13', '2017-12-13', '00:30:00', '13:30:00', 1, 'VNA', 'SG-HN'),
('VNA03', '2017-12-23', '2017-12-23', '13:00:00', '16:00:00', 1, 'VNA', 'HN-SG'),
('VNA04', '2017-12-24', '2017-12-24', '13:00:00', '16:00:00', 1, 'VNA', 'SG-HN'),
('VNA05', '2017-12-23', '2017-12-23', '06:30:00', '08:15:00', 1, 'VNA', 'HN-SG'),
('VNA07', '2017-12-24', '2017-12-24', '13:30:00', '15:00:00', 1, 'VNA', 'SG-HN');

-- --------------------------------------------------------

--
-- Table structure for table `hangmaybay`
--

CREATE TABLE `hangmaybay` (
  `maHangMayBay` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `tenHangMayBay` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hangmaybay`
--

INSERT INTO `hangmaybay` (`maHangMayBay`, `tenHangMayBay`) VALUES
('JS', 'Jetstar'),
('VJ', 'VietJet'),
('VNA', 'Vietnam Airline');

-- --------------------------------------------------------

--
-- Table structure for table `hangve`
--

CREATE TABLE `hangve` (
  `maHangVe` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `tenHangVe` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `moTa` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hangve`
--

INSERT INTO `hangve` (`maHangVe`, `tenHangVe`, `moTa`) VALUES
('PT', 'Phổ thông', 'Đối tượng phổ thông'),
('TG', 'Thương gia', 'Đối tượng cao cấp'),
('TK', 'Tiết kiệm', 'Đối tượng tiết kiệm');

-- --------------------------------------------------------

--
-- Table structure for table `hangve_chuyenbay`
--

CREATE TABLE `hangve_chuyenbay` (
  `ID` int(10) NOT NULL,
  `donGia` int(15) NOT NULL,
  `maPhieuDatCho` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maHangVe` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `maChuyenBay` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hangve_chuyenbay`
--

INSERT INTO `hangve_chuyenbay` (`ID`, `donGia`, `maPhieuDatCho`, `maHangVe`, `maChuyenBay`) VALUES
(8, 2500, NULL, 'PT', 'VNA02'),
(9, 3500, NULL, 'TG', 'VNA02'),
(13, 1500, NULL, 'PT', 'VNA01'),
(14, 1500, NULL, 'TK', 'VNA02'),
(15, 3000, NULL, 'TG', 'VNA01'),
(16, 1000, NULL, 'TK', 'VNA01'),
(17, 1500, NULL, 'PT', 'VNA03'),
(18, 2000, NULL, 'TG', 'VNA03'),
(19, 750, NULL, 'TK', 'VNA03'),
(20, 1500, NULL, 'PT', 'VNA04'),
(21, 2500, NULL, 'TG', 'VNA04'),
(22, 1000, NULL, 'TK', 'VNA04'),
(23, 25000, NULL, 'PT', 'VNA05'),
(24, 35000, NULL, 'TG', 'VNA05'),
(25, 20000, NULL, 'TK', 'VNA05'),
(26, 35000, NULL, 'PT', 'VNA07'),
(27, 45000, NULL, 'TG', 'VNA07'),
(28, 30000, NULL, 'TK', 'VNA07');

-- --------------------------------------------------------

--
-- Table structure for table `hanhkhach`
--

CREATE TABLE `hanhkhach` (
  `maCodeHanhKhach` int(10) NOT NULL,
  `hoTenHK` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `gioiTinhHK` tinyint(1) NOT NULL,
  `maPhieuDatCho` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hanhkhach`
--

INSERT INTO `hanhkhach` (`maCodeHanhKhach`, `hoTenHK`, `gioiTinhHK`, `maPhieuDatCho`) VALUES
(1, 'Nguyễn Văn Thằng', 1, '152522112017');

-- --------------------------------------------------------

--
-- Table structure for table `phieudatcho`
--

CREATE TABLE `phieudatcho` (
  `maPhieuDatCho` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ngayDatVe` date NOT NULL,
  `hoTen` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gioiTinh` tinyint(1) NOT NULL,
  `soDienThoai` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `trangThaiThanhToan` tinyint(1) NOT NULL,
  `idUser` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `phieudatcho`
--

INSERT INTO `phieudatcho` (`maPhieuDatCho`, `ngayDatVe`, `hoTen`, `email`, `gioiTinh`, `soDienThoai`, `trangThaiThanhToan`, `idUser`) VALUES
('152522112017', '0000-00-00', 'Nguyễn Văn Thăng', 'demo@gmail.com', 1, '0123456789', 1, 12);

-- --------------------------------------------------------

--
-- Table structure for table `sanbay`
--

CREATE TABLE `sanbay` (
  `maSanBay` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `tenSanBay` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `trangThai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanbay`
--

INSERT INTO `sanbay` (`maSanBay`, `tenSanBay`, `trangThai`) VALUES
('BG', 'Bắc Giang', 1),
('BN', 'Bắc Ninh', 1),
('DN', 'Đà Nẵng', 1),
('HN', 'Hà Nội', 1),
('HP', 'Hải Phòng', 1),
('HUE', 'Huế', 1),
('NT', 'Nha Trang', 1),
('QN', 'Quảng Ninh', 1),
('SG', 'TP Hồ Chí Minh', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tuyenbay`
--

CREATE TABLE `tuyenbay` (
  `maTuyenBay` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `noiDi` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `noiDen` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `trangThai` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tuyenbay`
--

INSERT INTO `tuyenbay` (`maTuyenBay`, `noiDi`, `noiDen`, `trangThai`) VALUES
('BG-BN', 'Bắc Giang', 'Bắc Ninh', 1),
('BG-HN', 'Bắc Giang', 'Hà Nội', 1),
('BG-HP', 'Bắc Giang', 'Hải Phòng', 1),
('BN-BG', 'Bắc Ninh', 'Bắc Giang', 1),
('DN-HN', 'Đà Nẵng', 'Hà Nội', 1),
('HN-DN', 'Hà Nội', 'Đà Nẵng', 1),
('HN-HP', 'Hà Nội', 'Hải Phòng', 1),
('HN-SG', 'Hà Nội', 'TP Hồ Chí Minh', 1),
('HP-HN', 'Hải Phòng', 'Hà Nội', 1),
('HUE-HP', 'Huế', 'Hải Phòng', 1),
('NT-QN', 'Nha Trang', 'Quảng Ninh', 1),
('QN-NT', 'Quảng Ninh', 'Nha Trang', 1),
('SG-HN', 'TP Hồ Chí Minh', 'Hà Nội', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tuyenbay_sanbay`
--

CREATE TABLE `tuyenbay_sanbay` (
  `maTuyenBay` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ID` int(10) NOT NULL,
  `maSanBay` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tuyenbay_sanbay`
--

INSERT INTO `tuyenbay_sanbay` (`maTuyenBay`, `ID`, `maSanBay`) VALUES
('DN-HN', 1, 'HN'),
('DN-HN', 2, 'DN'),
('BG-HN', 3, 'BG'),
('BG-HN', 4, 'HN'),
('BG-HP', 5, 'BG'),
('BG-HP', 6, 'HP'),
('HUE-HP', 7, 'HUE'),
('HUE-HP', 8, 'HP'),
('BN-BG', 9, 'BG'),
('BN-BG', 10, 'BN'),
('HP-HN', 11, 'HP'),
('HP-HN', 12, 'HN'),
('HN-DN', 13, 'HN'),
('HN-DN', 14, 'DN'),
('HN-HP', 15, 'HN'),
('HN-HP', 16, 'HP'),
('HN-SG', 17, 'HN'),
('HN-SG', 18, 'SG'),
('QN-NT', 64, 'QN'),
('QN-NT', 65, 'NT'),
('NT-QN', 66, 'NT'),
('NT-QN', 67, 'QN'),
('BG-BN', 68, 'BG'),
('BG-BN', 69, 'BN');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idUser` int(10) NOT NULL,
  `hoTen` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gioiTinh` tinyint(1) NOT NULL,
  `soDienThoai` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `thuocNhom` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUser`, `hoTen`, `password`, `gioiTinh`, `soDienThoai`, `thuocNhom`, `email`) VALUES
(12, 'demo', '202cb962ac59075b964b07152d234b70', 1, '123', '0', 'demo@gmail.com'),
(13, 'Nguyễn Văn Thắng', '202cb962ac59075b964b07152d234b70', 1, '01679837718', '1', 'thangnv@gmail.com'),
(16, 'demo2', '1066726e7160bd9c987c9968e0cc275a', 1, '122', '0', 'demo2@gmail.com'),
(17, 'demo1', '250cf8b51c773f3f8dc8b4be867a9a02', 1, '123', '0', 'demo1@gmail.com'),
(18, '1', '202cb962ac59075b964b07152d234b70', 1, '123', '0', 'demo@gmail.com'),
(19, '1', '202cb962ac59075b964b07152d234b70', 1, '123', '0', 'demo@gmail.com'),
(20, 'Nguyễn Văn Quyến', '202cb962ac59075b964b07152d234b70', 1, '01698319298', '0', 'quyendq@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chuyenbay`
--
ALTER TABLE `chuyenbay`
  ADD PRIMARY KEY (`maChuyenBay`),
  ADD KEY `maHangMayBay` (`maHangMayBay`),
  ADD KEY `maTuyenBay` (`maTuyenBay`);

--
-- Indexes for table `hangmaybay`
--
ALTER TABLE `hangmaybay`
  ADD PRIMARY KEY (`maHangMayBay`);

--
-- Indexes for table `hangve`
--
ALTER TABLE `hangve`
  ADD PRIMARY KEY (`maHangVe`);

--
-- Indexes for table `hangve_chuyenbay`
--
ALTER TABLE `hangve_chuyenbay`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `maPhieuDatCho` (`maPhieuDatCho`),
  ADD KEY `maHangVe` (`maHangVe`),
  ADD KEY `maChuyenBay` (`maChuyenBay`);

--
-- Indexes for table `hanhkhach`
--
ALTER TABLE `hanhkhach`
  ADD PRIMARY KEY (`maCodeHanhKhach`),
  ADD KEY `maPhieuDatCho` (`maPhieuDatCho`);

--
-- Indexes for table `phieudatcho`
--
ALTER TABLE `phieudatcho`
  ADD PRIMARY KEY (`maPhieuDatCho`),
  ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `sanbay`
--
ALTER TABLE `sanbay`
  ADD PRIMARY KEY (`maSanBay`);

--
-- Indexes for table `tuyenbay`
--
ALTER TABLE `tuyenbay`
  ADD PRIMARY KEY (`maTuyenBay`);

--
-- Indexes for table `tuyenbay_sanbay`
--
ALTER TABLE `tuyenbay_sanbay`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `maTuyenBay` (`maTuyenBay`),
  ADD KEY `maSanBay` (`maSanBay`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hangve_chuyenbay`
--
ALTER TABLE `hangve_chuyenbay`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `hanhkhach`
--
ALTER TABLE `hanhkhach`
  MODIFY `maCodeHanhKhach` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tuyenbay_sanbay`
--
ALTER TABLE `tuyenbay_sanbay`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `chuyenbay`
--
ALTER TABLE `chuyenbay`
  ADD CONSTRAINT `chuyenbay_ibfk_1` FOREIGN KEY (`maHangMayBay`) REFERENCES `hangmaybay` (`maHangMayBay`),
  ADD CONSTRAINT `chuyenbay_ibfk_2` FOREIGN KEY (`maTuyenBay`) REFERENCES `tuyenbay` (`maTuyenBay`);

--
-- Constraints for table `hangve_chuyenbay`
--
ALTER TABLE `hangve_chuyenbay`
  ADD CONSTRAINT `hangve_chuyenbay_ibfk_1` FOREIGN KEY (`maHangVe`) REFERENCES `hangve` (`maHangVe`),
  ADD CONSTRAINT `hangve_chuyenbay_ibfk_2` FOREIGN KEY (`maChuyenBay`) REFERENCES `chuyenbay` (`maChuyenBay`),
  ADD CONSTRAINT `hangve_chuyenbay_ibfk_3` FOREIGN KEY (`maPhieuDatCho`) REFERENCES `phieudatcho` (`maPhieuDatCho`);

--
-- Constraints for table `hanhkhach`
--
ALTER TABLE `hanhkhach`
  ADD CONSTRAINT `hanhkhach_ibfk_1` FOREIGN KEY (`maPhieuDatCho`) REFERENCES `phieudatcho` (`maPhieuDatCho`);

--
-- Constraints for table `phieudatcho`
--
ALTER TABLE `phieudatcho`
  ADD CONSTRAINT `phieudatcho_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`);

--
-- Constraints for table `tuyenbay_sanbay`
--
ALTER TABLE `tuyenbay_sanbay`
  ADD CONSTRAINT `tuyenbay_sanbay_ibfk_1` FOREIGN KEY (`maTuyenBay`) REFERENCES `tuyenbay` (`maTuyenBay`),
  ADD CONSTRAINT `tuyenbay_sanbay_ibfk_2` FOREIGN KEY (`maSanBay`) REFERENCES `sanbay` (`maSanBay`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
