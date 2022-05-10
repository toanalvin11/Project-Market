-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 10, 2022 lúc 11:51 AM
-- Phiên bản máy phục vụ: 10.4.20-MariaDB
-- Phiên bản PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `market`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `CategoryID` int(10) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`CategoryID`, `Name`, `Description`) VALUES
(1, 'Fruit', 'Trái cây tươi '),
(2, 'Green Vegetables', 'Rau củ vệ sinh thực phẩm'),
(3, 'Spices', 'Gia vị chế biến'),
(8, 'gà', 'con'),
(17, 'a', 'a');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `CustomerID` int(10) NOT NULL,
  `Password` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `Fullname` varchar(40) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `City` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`CustomerID`, `Password`, `Fullname`, `Address`, `City`) VALUES
(1, '2712', 'vongocminhtrang', 'TPHCM', 'TPHCM'),
(7, '2712', 'minhtrang2712', 'TPHCM', 'TPHCM'),
(9, '123', 'minhtrang', 'TPHCM', 'TPHCM'),
(10, '123', 'toan', 'abc', 'abc'),
(11, '1', 'g', '1', '1'),
(12, '1', 'r', '1', '1'),
(13, '1', 'q', '1', '1'),
(14, '1', 'u', '1', '1'),
(15, '1', 'z', '1', '1'),
(16, '1', '2', '1', '1'),
(17, '1', 's', '1', '1'),
(18, '1', '56', '1', '1'),
(19, '1', '789', '1', '1'),
(20, '4', '456', '4', '4');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetail`
--

CREATE TABLE `orderdetail` (
  `OrderID` int(10) UNSIGNED NOT NULL,
  `VegetableID` int(10) NOT NULL,
  `Quantity` tinyint(4) NOT NULL,
  `Price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orderdetail`
--

INSERT INTO `orderdetail` (`OrderID`, `VegetableID`, `Quantity`, `Price`) VALUES
(19, 9, 1, 30000),
(19, 10, 1, 60000),
(20, 8, 2, 120000),
(20, 16, 1, 10000),
(21, 8, 3, 180000),
(21, 9, 3, 90000),
(22, 8, 1, 60000),
(23, 9, 1, 30000),
(24, 10, 1, 60000),
(25, 12, 1, 15000),
(26, 13, 1, 20000),
(27, 14, 1, 8000),
(28, 10, 1, 60000),
(29, 8, 1, 60000),
(30, 12, 1, 15000),
(31, 9, 1, 30000),
(32, 8, 1, 60000),
(33, 12, 1, 15000),
(33, 15, 1, 17000),
(34, 14, 1, 8000),
(35, 10, 1, 60000),
(36, 8, 1, 60000),
(37, 8, 1, 60000),
(38, 18, 1, 120000),
(39, 9, 1, 30000),
(40, 9, 1, 30000),
(41, 9, 1, 30000),
(42, 8, 1, 60000),
(43, 9, 1, 30000),
(44, 10, 1, 60000),
(45, 9, 1, 30000),
(46, 10, 1, 60000),
(47, 10, 1, 60000),
(48, 8, 2, 120000),
(49, 8, 1, 30000),
(49, 9, 2, 70000),
(50, 8, 1, 30000),
(51, 9, 1, 35000),
(52, 10, 1, 80000),
(53, 8, 2, 60000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(10) UNSIGNED NOT NULL,
  `CustomerID` int(10) NOT NULL,
  `Date` date NOT NULL,
  `Total` float NOT NULL,
  `Note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`OrderID`, `CustomerID`, `Date`, `Total`, `Note`) VALUES
(19, 1, '2021-09-03', 90000, 'Đóng gói cẩn thận'),
(20, 10, '2021-09-07', 130000, ''),
(21, 7, '2021-09-07', 270000, ''),
(22, 7, '2021-09-07', 60000, ''),
(23, 10, '2021-09-08', 30000, ''),
(24, 10, '2021-09-08', 60000, ''),
(25, 10, '2021-09-08', 15000, ''),
(26, 10, '2021-09-08', 20000, ''),
(27, 10, '2021-09-08', 8000, ''),
(28, 10, '2021-09-08', 60000, ''),
(29, 10, '2021-09-08', 60000, ''),
(30, 10, '2021-09-08', 15000, ''),
(31, 10, '2021-09-08', 30000, ''),
(32, 10, '2021-09-08', 60000, ''),
(33, 10, '2021-09-08', 32000, ''),
(34, 10, '2021-09-08', 8000, ''),
(35, 10, '2021-09-08', 60000, ''),
(36, 10, '2021-09-08', 60000, ''),
(37, 10, '2021-09-08', 60000, ''),
(38, 10, '2021-09-08', 120000, ''),
(39, 10, '2021-09-08', 30000, ''),
(40, 10, '2021-09-08', 30000, ''),
(41, 10, '2021-09-08', 30000, ''),
(42, 10, '2021-09-08', 60000, ''),
(43, 10, '2021-09-08', 30000, ''),
(44, 10, '2021-09-08', 60000, ''),
(45, 10, '2021-09-08', 30000, 'gà'),
(46, 10, '2021-09-08', 60000, 'a'),
(47, 10, '2021-09-08', 60000, ''),
(48, 10, '2021-09-08', 120000, ''),
(49, 10, '2021-09-11', 100000, ''),
(50, 10, '2021-09-14', 30000, ''),
(51, 10, '2021-09-14', 35000, ''),
(52, 10, '2021-09-14', 80000, ''),
(53, 10, '2021-11-21', 60000, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vegetable`
--

CREATE TABLE `vegetable` (
  `VegetableID` int(10) NOT NULL,
  `CategoryID` int(10) NOT NULL,
  `VegetableName` varchar(30) NOT NULL,
  `Unit` varchar(20) NOT NULL,
  `Amount` int(10) NOT NULL,
  `Image` varchar(50) NOT NULL,
  `Price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `vegetable`
--

INSERT INTO `vegetable` (`VegetableID`, `CategoryID`, `VegetableName`, `Unit`, `Amount`, `Image`, `Price`) VALUES
(8, 1, 'Cà chua', 'Kg', 100, 'cachua.jpg', 30000),
(9, 1, 'Khoai tây', 'Kg', 100, 'khoaitay1.jpg', 35000),
(10, 1, 'Dưa hấu', 'Kg', 100, 'duahau.jpg', 80000),
(12, 2, 'Hành lá', 'Bó', 100, 'hanhla1.jpg', 15000),
(13, 2, 'Cải bó xôi', 'Bó', 100, 'caiboxoi.jpg', 20000),
(14, 1, 'Cà rốt', 'Củ', 100, 'carot1.jpg', 10000),
(15, 2, 'Khoai tây', 'Kg', 100, 'khoaitay.jpg', 17000),
(16, 3, 'Dấm trắng', 'Chai', 100, 'damtrang.jpg', 30000),
(17, 3, 'Đường', 'Kg', 100, 'duong1.jpg', 7500),
(18, 1, 'Bông cải xanh', 'Bó', 100, 'bongcaixanh.jpg', 30000),
(19, 3, 'Nước mắm', 'Chai', 100, 'nuocmam.jpg', 35000),
(20, 1, 'Xoài', 'Kg', 100, 'xoai.jpg', 25000),
(47, 1, 'trái', 'Kg', 1, 'tay.jpg', 1000),
(48, 1, 'p', 'Kg', 1, 'Cửa-hàng-trái-cây-sạch-tphcm.png', 1),
(49, 1, '5', 'Kg', 1, 'odd.jpg', 1),
(50, 1, 'h', 'Kg', 1, 'k.jpg', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Chỉ mục cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`OrderID`,`VegetableID`) USING BTREE,
  ADD KEY `VegetableID` (`VegetableID`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Chỉ mục cho bảng `vegetable`
--
ALTER TABLE `vegetable`
  ADD PRIMARY KEY (`VegetableID`),
  ADD KEY `CategoryID` (`CategoryID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `CategoryID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `CustomerID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT cho bảng `vegetable`
--
ALTER TABLE `vegetable`
  MODIFY `VegetableID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_ibfk_2` FOREIGN KEY (`VegetableID`) REFERENCES `vegetable` (`VegetableID`),
  ADD CONSTRAINT `orderdetail_ibfk_3` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`OrderID`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customers` (`CustomerID`);

--
-- Các ràng buộc cho bảng `vegetable`
--
ALTER TABLE `vegetable`
  ADD CONSTRAINT `vegetable_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `category` (`CategoryID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
