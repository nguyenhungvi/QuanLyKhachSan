-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 30, 2020 lúc 08:25 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlkhachsan`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin', 1),
(2, 'tieptan', 'tieptan', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bookroom`
--

CREATE TABLE `bookroom` (
  `id` int(11) NOT NULL,
  `cus_code` int(11) NOT NULL,
  `received_date` date NOT NULL,
  `pay_date` date NOT NULL,
  `total` float NOT NULL,
  `number_adults` int(11) NOT NULL,
  `number_children` int(11) NOT NULL,
  `state` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bookroom`
--

INSERT INTO `bookroom` (`id`, `cus_code`, `received_date`, `pay_date`, `total`, `number_adults`, `number_children`, `state`) VALUES
(1, 29, '0000-00-00', '0000-00-00', 0, 1, 0, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `cus_code` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cmnd` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`cus_code`, `name`, `phone`, `address`, `cmnd`, `email`, `state`, `username`, `password`) VALUES
(20, 'Hoàng Thị Hiền', '123456', '11344', '', '', '0', NULL, NULL),
(23, 'Lê Minh Ngọc', '029822548', '01 Võ Văn Ngân', '', '', '0', NULL, NULL),
(25, 'Bùi Thanh Hương', '2552214', '15 Nguyễn Đình Chiểu', '', '', '0', NULL, NULL),
(26, 'Lý Thị Kim Oanh', '364753722', '05 Lê Chí Tôn, Thủ Đức, Tp. HCM', '', '', '0', NULL, NULL),
(27, 'kk', '343556', '11344', '', '', '0', NULL, NULL),
(28, 'Hoàng Thị Hiền', '123456', '11344', '', '', '0', NULL, NULL),
(29, 'hiền', '0356051555', '15a- đường số 6, p. Hiệp Phú, Quận 9', '124324234', 'hien@gmail.com', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detailbook`
--

CREATE TABLE `detailbook` (
  `booking_code` int(11) NOT NULL,
  `room_code` int(11) NOT NULL,
  `price` float NOT NULL,
  `number_room` int(11) NOT NULL,
  `date_set` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `roomNumber` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `typeCode` int(11) NOT NULL,
  `state` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `room`
--

INSERT INTO `room` (`id`, `roomNumber`, `image`, `typeCode`, `state`) VALUES
(1, 'p001', 'room-1.jpg', 1, ''),
(2, 'p011', 'room-2.jpg', 2, ''),
(3, 'p031', 'room-3.jpg', 1, ''),
(4, 'p004', 'room-4.jpg', 2, ''),
(5, 'p022', 'room-5.jpg', 1, ''),
(6, 'p013', 'room-6.jpg', 3, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roomdetail`
--

CREATE TABLE `roomdetail` (
  `id` int(11) NOT NULL,
  `room_code` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roomtype`
--

CREATE TABLE `roomtype` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roomtype`
--

INSERT INTO `roomtype` (`id`, `name`, `price`, `description`) VALUES
(1, 'Single', 0, ''),
(2, 'Double', 0, ''),
(3, 'Queen', 0, '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bookroom`
--
ALTER TABLE `bookroom`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cat` (`cus_code`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_code`);

--
-- Chỉ mục cho bảng `detailbook`
--
ALTER TABLE `detailbook`
  ADD PRIMARY KEY (`booking_code`),
  ADD KEY `fk_detail2` (`room_code`);

--
-- Chỉ mục cho bảng `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_room` (`typeCode`);

--
-- Chỉ mục cho bảng `roomdetail`
--
ALTER TABLE `roomdetail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_myKey` (`room_code`);

--
-- Chỉ mục cho bảng `roomtype`
--
ALTER TABLE `roomtype`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `bookroom`
--
ALTER TABLE `bookroom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `cus_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `roomdetail`
--
ALTER TABLE `roomdetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `roomtype`
--
ALTER TABLE `roomtype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bookroom`
--
ALTER TABLE `bookroom`
  ADD CONSTRAINT `fk_cat` FOREIGN KEY (`cus_code`) REFERENCES `customer` (`cus_code`);

--
-- Các ràng buộc cho bảng `detailbook`
--
ALTER TABLE `detailbook`
  ADD CONSTRAINT `FK_myKey2` FOREIGN KEY (`room_code`) REFERENCES `roomtype` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detail` FOREIGN KEY (`booking_code`) REFERENCES `bookroom` (`id`);

--
-- Các ràng buộc cho bảng `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `fk_room` FOREIGN KEY (`typeCode`) REFERENCES `roomtype` (`id`);

--
-- Các ràng buộc cho bảng `roomdetail`
--
ALTER TABLE `roomdetail`
  ADD CONSTRAINT `FK_myKey` FOREIGN KEY (`room_code`) REFERENCES `room` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
