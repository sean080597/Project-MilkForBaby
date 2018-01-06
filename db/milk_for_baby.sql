-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2018 at 03:34 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `milk_for_baby`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `MaHH` char(12) NOT NULL,
  `ip_add` varchar(250) DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `TenHH` varchar(50) NOT NULL,
  `HinhAnh` varchar(300) NOT NULL,
  `DVT` varchar(15) NOT NULL,
  `qty` int(10) NOT NULL,
  `GiaBan` bigint(20) UNSIGNED NOT NULL,
  `TongTien` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ck_hd`
--

CREATE TABLE `ck_hd` (
  `MaHDB` char(12) NOT NULL,
  `MaLoaiKM` char(2) NOT NULL,
  `LuongKM` bigint(20) NOT NULL,
  `TienKM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ck_hh`
--

CREATE TABLE `ck_hh` (
  `MaHH` char(12) NOT NULL,
  `MaLoaiKM` char(2) NOT NULL,
  `LuongKM` bigint(20) NOT NULL,
  `TienKM` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ck_hh`
--

INSERT INTO `ck_hh` (`MaHH`, `MaLoaiKM`, `LuongKM`, `TienKM`) VALUES
('SB01', '1', 10, 5000),
('SB02', '1', 10, 1800),
('SB01', '2', 10000, 10000),
('SB02', '2', 10000, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `ct_hdban`
--

CREATE TABLE `ct_hdban` (
  `MaHDB` char(12) NOT NULL,
  `MaHH` char(12) NOT NULL,
  `DonGia` bigint(20) UNSIGNED NOT NULL,
  `SoLuong` int(11) UNSIGNED NOT NULL,
  `KhuyenMai` bigint(20) UNSIGNED DEFAULT NULL,
  `Vat` bigint(20) UNSIGNED DEFAULT NULL,
  `ThanhTien` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ct_hdban`
--

INSERT INTO `ct_hdban` (`MaHDB`, `MaHH`, `DonGia`, `SoLuong`, `KhuyenMai`, `Vat`, `ThanhTien`) VALUES
('mfb17_dfarbl', 'SB01', 50000, 3, NULL, NULL, 150000),
('mfb17_dfarbl', 'SB02', 18000, 1, NULL, NULL, 18000),
('mfb17_dfarbl', 'SU05', 28000, 1, NULL, NULL, 28000),
('mfb17_r2uWI1', 'SB01', 50000, 3, NULL, NULL, 150000),
('mfb17_r2uWI1', 'SO02', 70000, 1, NULL, NULL, 70000),
('mfb17_r2uWI1', 'SU02', 42000, 3, NULL, NULL, 126000),
('mfb17_y9fL54', 'SB02', 18000, 2, NULL, NULL, 36000),
('mfb17_y9fL54', 'SO02', 70000, 1, NULL, NULL, 70000);

-- --------------------------------------------------------

--
-- Table structure for table `ct_hdnhap`
--

CREATE TABLE `ct_hdnhap` (
  `MaHDN` char(12) NOT NULL,
  `MaHH` char(12) NOT NULL,
  `DonGia` bigint(20) UNSIGNED NOT NULL,
  `SoLuong` int(11) UNSIGNED NOT NULL,
  `ThanhTien` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hanghoa`
--

CREATE TABLE `hanghoa` (
  `MaHH` char(12) NOT NULL,
  `TenHH` varchar(50) NOT NULL,
  `GiaBan` bigint(20) UNSIGNED NOT NULL,
  `DVT` varchar(15) NOT NULL,
  `HinhAnh` varchar(300) NOT NULL,
  `TinhTrang` varchar(20) DEFAULT NULL,
  `MaLoai` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hanghoa`
--

INSERT INTO `hanghoa` (`MaHH`, `TenHH`, `GiaBan`, `DVT`, `HinhAnh`, `TinhTrang`, `MaLoai`) VALUES
('SB01', 'Sữa NAN', 35000, 'Hộp', 'http://localhost:8888/Project-MilkForBaby/imgs/sua_nan.jpg', 'Chắc còn', 'SB'),
('SB02', 'Sữa Nutifood', 18000, 'Hộp', 'http://localhost:8888/Project-MilkForBaby/imgs/sua-bot-nutifood-grow-plus.jpg', 'Còn bán', 'SB'),
('SB143', 'Sữa PureMilk', 25000, 'Hộp', 'http://localhost:8888/Project-MilkForBaby/imgs/images.jpg', 'Còn bán', 'SB'),
('SH42', 'Sữa Dutch Lady', 15000, 'Hộp', 'http://localhost:8888/Project-MilkForBaby/imgs/fresh-plain.jpg', 'null', 'SH'),
('SO02', 'Sữa Aplus', 70000, 'Hộp', 'http://localhost:8888/Project-MilkForBaby/imgs/sua_aplus.jpg', 'Còn bán', 'SO'),
('SO04', 'Sữa Enfamil', 70000, 'Hộp', 'http://localhost:8888/Project-MilkForBaby/imgs/sua_enfamil.jpg', 'Còn bán', 'SO'),
('SU01', 'Sữa Ông Thọ', 26000, 'Hộp', 'http://localhost:8888/Project-MilkForBaby/imgs/sua_ong_tho.jpg', 'Còn bán', 'SU'),
('SU02', 'Sữa Sure', 42000, 'Hộp', 'http://localhost:8888/Project-MilkForBaby/imgs/sure-milk.jpg', 'Còn bán', 'SU'),
('SU05', 'Sữa Ông Trùm', 28000, 'Hộp', 'http://localhost:8888/Project-MilkForBaby/imgs/sua_ong_trum.jpg', 'Còn bán', 'SU');

-- --------------------------------------------------------

--
-- Table structure for table `hangtonkho`
--

CREATE TABLE `hangtonkho` (
  `MaHH` char(12) NOT NULL,
  `SoLuong` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hangtonkho`
--

INSERT INTO `hangtonkho` (`MaHH`, `SoLuong`) VALUES
('SB01', 12),
('SB02', 22),
('SH42', 50),
('SO02', 31),
('SO04', 21),
('SU01', 33),
('SU02', 11),
('SU05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `hdban`
--

CREATE TABLE `hdban` (
  `MaHDB` char(12) NOT NULL,
  `NgayLap` datetime NOT NULL,
  `ThanhTien` bigint(20) UNSIGNED NOT NULL,
  `ChietKhau` bigint(20) UNSIGNED NOT NULL,
  `TongThanhTien` bigint(20) UNSIGNED NOT NULL,
  `MaTK` char(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hdban`
--

INSERT INTO `hdban` (`MaHDB`, `NgayLap`, `ThanhTien`, `ChietKhau`, `TongThanhTien`, `MaTK`) VALUES
('mfb17_dfarbl', '2018-01-02 01:22:56', 196000, 0, 196000, NULL),
('mfb17_r2uWI1', '2018-01-01 18:56:54', 346000, 0, 346000, NULL),
('mfb17_y9fL54', '2018-01-01 18:14:34', 106000, 0, 106000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hdnhap`
--

CREATE TABLE `hdnhap` (
  `MaHDN` char(12) NOT NULL,
  `NgayLap` datetime NOT NULL,
  `MaTK` char(7) NOT NULL,
  `TongTien` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `loaihang`
--

CREATE TABLE `loaihang` (
  `MaLoai` char(2) NOT NULL,
  `TenLoaiH` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loaihang`
--

INSERT INTO `loaihang` (`MaLoai`, `TenLoaiH`) VALUES
('BB', 'Sữa Bịch'),
('SB', 'Sữa cho em bé'),
('SH', 'Sữa Hộp'),
('SL', 'Sữa lon'),
('SO', 'Sữa Ông Thọ'),
('SU', 'Sữa gì ko biết');

-- --------------------------------------------------------

--
-- Table structure for table `loaikhuyenmai`
--

CREATE TABLE `loaikhuyenmai` (
  `MaLoaiKM` char(2) NOT NULL,
  `TenLoaiKM` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loaikhuyenmai`
--

INSERT INTO `loaikhuyenmai` (`MaLoaiKM`, `TenLoaiKM`) VALUES
('1', 'Phần trăm'),
('2', 'Tiền');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `MaTK` char(7) NOT NULL,
  `Passwords` varchar(20) NOT NULL,
  `Ten` varchar(50) NOT NULL,
  `DiaChi` varchar(200) NOT NULL,
  `CMND` varchar(15) NOT NULL,
  `SDT` varchar(15) NOT NULL,
  `TinhTrang` varchar(50) NOT NULL,
  `MaVaiTro` char(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`MaTK`, `Passwords`, `Ten`, `DiaChi`, `CMND`, `SDT`, `TinhTrang`, `MaVaiTro`) VALUES
('adminbb', 'adminbb', 'Luu Cuong', '141 D5, Binh Thanh, HCM', '241687972', '01292507800', 'Còn làm việc', 'ad'),
('nv00001', 'nv00001', 'Truong Cam', 'Quan 12, HCM', '243512345', '01292507800', 'Còn làm việc', 'nv');

-- --------------------------------------------------------

--
-- Table structure for table `thamso`
--

CREATE TABLE `thamso` (
  `STT` smallint(6) NOT NULL,
  `TenTS` varchar(50) NOT NULL,
  `GiaTri` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `vaitro`
--

CREATE TABLE `vaitro` (
  `MaVaiTro` char(7) NOT NULL,
  `CN_HD_Nhap` bit(1) DEFAULT b'0',
  `CN_HD_Ban` bit(1) DEFAULT b'0',
  `QLBanHang` bit(1) DEFAULT b'0',
  `QL_TT_NV` bit(1) DEFAULT b'0',
  `PhanQuyen` bit(1) DEFAULT b'0',
  `TK_HangBan` bit(1) DEFAULT b'0',
  `TK_HangTon` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vaitro`
--

INSERT INTO `vaitro` (`MaVaiTro`, `CN_HD_Nhap`, `CN_HD_Ban`, `QLBanHang`, `QL_TT_NV`, `PhanQuyen`, `TK_HangBan`, `TK_HangTon`) VALUES
('ad', b'1', b'1', b'1', b'1', b'1', b'1', b'1'),
('nv', b'1', b'1', b'1', b'0', b'0', b'0', b'0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`MaHH`);

--
-- Indexes for table `ck_hd`
--
ALTER TABLE `ck_hd`
  ADD PRIMARY KEY (`MaHDB`,`MaLoaiKM`),
  ADD KEY `MaLoaiKM` (`MaLoaiKM`);

--
-- Indexes for table `ck_hh`
--
ALTER TABLE `ck_hh`
  ADD PRIMARY KEY (`MaLoaiKM`,`MaHH`),
  ADD KEY `MaHH` (`MaHH`);

--
-- Indexes for table `ct_hdban`
--
ALTER TABLE `ct_hdban`
  ADD PRIMARY KEY (`MaHDB`,`MaHH`),
  ADD KEY `MaHH` (`MaHH`);

--
-- Indexes for table `ct_hdnhap`
--
ALTER TABLE `ct_hdnhap`
  ADD PRIMARY KEY (`MaHDN`,`MaHH`),
  ADD KEY `MaHH` (`MaHH`);

--
-- Indexes for table `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`MaHH`),
  ADD KEY `hanghoa_ibfk_1` (`MaLoai`);

--
-- Indexes for table `hangtonkho`
--
ALTER TABLE `hangtonkho`
  ADD PRIMARY KEY (`MaHH`);

--
-- Indexes for table `hdban`
--
ALTER TABLE `hdban`
  ADD PRIMARY KEY (`MaHDB`),
  ADD KEY `MaTK` (`MaTK`);

--
-- Indexes for table `hdnhap`
--
ALTER TABLE `hdnhap`
  ADD PRIMARY KEY (`MaHDN`),
  ADD KEY `MaTK` (`MaTK`);

--
-- Indexes for table `loaihang`
--
ALTER TABLE `loaihang`
  ADD PRIMARY KEY (`MaLoai`);

--
-- Indexes for table `loaikhuyenmai`
--
ALTER TABLE `loaikhuyenmai`
  ADD PRIMARY KEY (`MaLoaiKM`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`MaTK`),
  ADD KEY `MaVaiTro` (`MaVaiTro`);

--
-- Indexes for table `thamso`
--
ALTER TABLE `thamso`
  ADD PRIMARY KEY (`STT`);

--
-- Indexes for table `vaitro`
--
ALTER TABLE `vaitro`
  ADD PRIMARY KEY (`MaVaiTro`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ck_hd`
--
ALTER TABLE `ck_hd`
  ADD CONSTRAINT `ck_hd_ibfk_1` FOREIGN KEY (`MaHDB`) REFERENCES `hdban` (`MaHDB`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ck_hd_ibfk_2` FOREIGN KEY (`MaLoaiKM`) REFERENCES `loaikhuyenmai` (`MaLoaiKM`) ON UPDATE CASCADE;

--
-- Constraints for table `ck_hh`
--
ALTER TABLE `ck_hh`
  ADD CONSTRAINT `ck_hh_ibfk_1` FOREIGN KEY (`MaHH`) REFERENCES `hanghoa` (`MaHH`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ck_hh_ibfk_2` FOREIGN KEY (`MaLoaiKM`) REFERENCES `loaikhuyenmai` (`MaLoaiKM`) ON UPDATE CASCADE;

--
-- Constraints for table `ct_hdban`
--
ALTER TABLE `ct_hdban`
  ADD CONSTRAINT `ct_hdban_ibfk_1` FOREIGN KEY (`MaHDB`) REFERENCES `hdban` (`MaHDB`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ct_hdban_ibfk_2` FOREIGN KEY (`MaHH`) REFERENCES `hanghoa` (`MaHH`) ON UPDATE CASCADE;

--
-- Constraints for table `ct_hdnhap`
--
ALTER TABLE `ct_hdnhap`
  ADD CONSTRAINT `ct_hdnhap_ibfk_1` FOREIGN KEY (`MaHDN`) REFERENCES `hdnhap` (`MaHDN`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ct_hdnhap_ibfk_2` FOREIGN KEY (`MaHH`) REFERENCES `hanghoa` (`MaHH`) ON UPDATE CASCADE;

--
-- Constraints for table `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD CONSTRAINT `hanghoa_ibfk_1` FOREIGN KEY (`MaLoai`) REFERENCES `loaihang` (`MaLoai`) ON UPDATE CASCADE;

--
-- Constraints for table `hangtonkho`
--
ALTER TABLE `hangtonkho`
  ADD CONSTRAINT `hangtonkho_ibfk_1` FOREIGN KEY (`MaHH`) REFERENCES `hanghoa` (`MaHH`) ON UPDATE CASCADE;

--
-- Constraints for table `hdban`
--
ALTER TABLE `hdban`
  ADD CONSTRAINT `hdban_ibfk_1` FOREIGN KEY (`MaTK`) REFERENCES `taikhoan` (`MaTK`) ON UPDATE CASCADE;

--
-- Constraints for table `hdnhap`
--
ALTER TABLE `hdnhap`
  ADD CONSTRAINT `hdnhap_ibfk_2` FOREIGN KEY (`MaTK`) REFERENCES `taikhoan` (`MaTK`) ON UPDATE CASCADE;

--
-- Constraints for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `taikhoan_ibfk_1` FOREIGN KEY (`MaVaiTro`) REFERENCES `vaitro` (`MaVaiTro`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
