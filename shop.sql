-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 20, 2018 lúc 01:53 PM
-- Phiên bản máy phục vụ: 10.1.31-MariaDB
-- Phiên bản PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `Id` int(11) UNSIGNED NOT NULL,
  `Username` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Password` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`Id`, `Username`, `Password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `Id` int(11) UNSIGNED NOT NULL,
  `Ten` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Gia` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MoTa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TheLoaiId` int(11) UNSIGNED DEFAULT NULL,
  `Anh1` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Anh2` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Anh3` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`Id`, `Ten`, `Gia`, `MoTa`, `TheLoaiId`, `Anh1`, `Anh2`, `Anh3`) VALUES
(9, 'Sản phẩm A', '10$', 'Mô tả A', 2, 'images/Chrysanthemum.jpg', 'images/Desert.jpg', 'images/Hydrangeas.jpg'),
(10, 'Sản phẩm B', '12$', 'Mô tả sản phẩm B', 3, 'images/Koala.jpg', 'images/Lighthouse.jpg', 'images/Penguins.jpg'),
(11, 'Sản phẩm C', '14$', 'Mô tả sản phẩm C', 2, 'images/0Lighthouse.jpg', 'images/0Penguins.jpg', 'images/Jellyfish.jpg'),
(12, 'Tên 1', '1$', 'Tên 1', 3, 'images/1Penguins.jpg', 'images/1Lighthouse.jpg', 'images/0Hydrangeas.jpg'),
(13, 'Tên 2', '12$', 'Tên 2', 3, 'images/0Jellyfish.jpg', 'images/1Hydrangeas.jpg', 'images/0Desert.jpg'),
(14, 'Tên 3', '3$', 'Tên 3', 2, 'images/1Desert.jpg', 'images/2Hydrangeas.jpg', 'images/1Jellyfish.jpg'),
(15, 'Tên 4', '4$', 'Tên 4', 3, 'images/2Jellyfish.jpg', 'images/3Hydrangeas.jpg', 'images/2Desert.jpg'),
(16, 'Tên 6', 'Tên 6', 'Tên 6', 3, 'images/Tulips.jpg', 'images/2Penguins.jpg', 'images/2Lighthouse.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloai`
--

CREATE TABLE `theloai` (
  `Id` int(11) UNSIGNED NOT NULL,
  `Ten` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `theloai`
--

INSERT INTO `theloai` (`Id`, `Ten`) VALUES
(2, 'Túi sách'),
(3, 'Giày');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `SanPhamId` (`TheLoaiId`);

--
-- Chỉ mục cho bảng `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `Id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `Id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `theloai`
--
ALTER TABLE `theloai`
  MODIFY `Id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`TheLoaiId`) REFERENCES `theloai` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
