-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 05, 2020 lúc 05:39 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nshop_database`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(5) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `profile` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `profile`) VALUES
(1, 'NhanPham', 'nhan123', '../anh/profile.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(5) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `price` int(50) DEFAULT NULL,
  `quantum` int(50) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `idKind` varchar(10) DEFAULT NULL,
  `color` varchar(10) DEFAULT NULL,
  `size` varchar(50) NOT NULL,
  `iduser` int(5) DEFAULT NULL,
  `idproduct` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detailorders`
--

CREATE TABLE `detailorders` (
  `id` int(5) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `price` int(50) DEFAULT NULL,
  `quantum` int(50) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `idKind` varchar(10) DEFAULT NULL,
  `color` varchar(10) DEFAULT NULL,
  `size` varchar(10) NOT NULL,
  `idorders` int(5) DEFAULT NULL,
  `iduser` int(5) NOT NULL,
  `idproduct` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `detailorders`
--

INSERT INTO `detailorders` (`id`, `name`, `price`, `quantum`, `image`, `idKind`, `color`, `size`, `idorders`, `iduser`, `idproduct`) VALUES
(33, 'Áo Tee SS', 1100000, 1, './uploads/ta03.PNG', 'ta', 'đen', 'M', 22, 11, 66),
(34, 'Áo Tee SS', 1100000, 3, './uploads/ta03.PNG', 'ta', 'đen', 'S', 22, 11, 66),
(35, 'Giày Stan Smith', 2400000, 1, './uploads/a02.PNG', 'a', 'trắng', '38', 23, 11, 20),
(36, 'Giày Chuck 70 black', 2100000, 1, './uploads/c02.PNG', 'c', 'đen', '38', 23, 11, 38),
(37, 'Balo mikkor Re', 500000, 1, './uploads/b04.PNG', 'b', 'đỏ', 'free', 23, 11, 76),
(38, 'Giày NMD_R1', 3400000, 1, './uploads/a39.PNG', 'a', 'đỏ', '38', 24, 11, 111),
(39, 'Giày ZX 4000 4D', 9000000, 4, './uploads/a38.PNG', 'a', 'đen', '38', 24, 11, 110),
(40, 'Áo Tee SS', 1100000, 1, './uploads/ta03.PNG', 'ta', 'đen', 'M', 24, 11, 66),
(41, 'Giày Stan Smith', 2400000, 6, './uploads/a02.PNG', 'a', 'trắng', '38', 25, 11, 20),
(42, 'Áo Pastel Tee - white', 9100000, 2, './uploads/ta06.PNG', 'ta', 'trắng', 'S', 26, 11, 69),
(43, 'Giày Chuck 70 Green', 2200000, 1, './uploads/c01.PNG', 'c', 'lục', '38', 26, 11, 37),
(44, 'Giày Fortarun', 1100000, 3, './uploads/a03.PNG', 'a', 'đen', '38', 27, 11, 21),
(45, 'Balo simplecarry ', 3800000, 4, './uploads/b08.PNG', 'b', 'xanh', 'free', 27, 11, 80),
(46, 'Giày stan smith W', 2400000, 3, './uploads/a23.PNG', 'a', 'trắng', '38', 28, 11, 95),
(47, 'Áo Unisex Tee', 1200000, 1, './uploads/ta08.PNG', 'ta', 'trắng', 'M', 28, 11, 71),
(48, 'Giày Pan vigor', 5250000, 1, './uploads/f02.PNG', 'f', 'đen', '38', 29, 11, 56),
(49, 'Áo Pastel tee - gray', 900000, 4, './uploads/ta04.PNG', 'ta', 'xám', 'XL', 29, 11, 67),
(50, 'Giày ZX 4000 4D', 9000000, 10, './uploads/a38.PNG', 'a', 'đen', '43', 30, 11, 110),
(51, 'Balo mikkor ellla ', 500000, 2, './uploads/b03.PNG', 'b', 'đen', 'free', 30, 11, 75);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(5) NOT NULL,
  `dateproducts` datetime DEFAULT NULL,
  `priceproducts` int(30) DEFAULT NULL,
  `status` int(5) NOT NULL,
  `address` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `note` tinytext DEFAULT NULL,
  `iduser` int(5) DEFAULT NULL,
  `nameuser` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `dateproducts`, `priceproducts`, `status`, `address`, `phone`, `note`, `iduser`, `nameuser`) VALUES
(22, '2020-01-05 16:06:02', 4400000, 1, 'A46, đường số 11, khu dân cư Long Thịnh, P.Phú Thứ', '0902505669', 'hehehe', 11, 'Park Chae-young '),
(23, '2020-01-05 16:29:15', 5000000, 4, 'A46, đường số 11, khu dân cư Long Thịnh, P.Phú Thứ', '0902505669', 'uhuhu', 11, 'Park Chae-young '),
(24, '2020-02-05 16:30:23', 40500000, 3, 'A46, đường số 11, khu dân cư Long Thịnh, P.Phú Thứ', '0902505669', 'hyh', 11, 'Park Chae-young '),
(25, '2020-02-05 17:58:17', 14400000, 1, 'A46, đường số 11, khu dân cư Long Thịnh, P.Phú Thứ', '0902505669', 'hehe', 11, 'Park Chae-young '),
(26, '2020-02-05 18:46:14', 20400000, 1, 'A46, đường số 11, khu dân cư Long Thịnh, P.Phú Thứ', '0902505669', 'hihihi', 11, 'Park Chae-young '),
(27, '2020-03-05 18:46:53', 18500000, 2, 'A46, đường số 11, khu dân cư Long Thịnh, P.Phú Thứ', '0902505669', 'hehehehe', 11, 'Park Chae-young '),
(28, '2020-04-05 18:49:18', 8400000, 3, '', '0902505669', '', 11, 'Park Chae-young '),
(29, '2020-05-05 18:50:15', 8850000, 4, '', '0902505669', '', 11, 'Park Chae-young '),
(30, '2020-06-05 18:54:19', 91000000, 1, 'A46, đường số 11, khu dân cư Long Thịnh, P.Phú Thứ', '0902505669', 'hihihi', 11, 'Park Chae-young ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(5) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `price` int(50) DEFAULT NULL,
  `quantum` int(50) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `idKind` varchar(10) DEFAULT NULL,
  `color` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `quantum`, `image`, `idKind`, `color`) VALUES
(19, 'Giày Ultraboost 20', 5000000, 10, './uploads/a01.PNG', 'a', 'xám'),
(20, 'Giày Stan Smith', 2400000, 7, './uploads/a02.PNG', 'a', 'trắng'),
(21, 'Giày Fortarun', 1100000, 20, './uploads/a03.PNG', 'a', 'đen'),
(22, 'Giày Archivo', 1500000, 20, './uploads/a04.PNG', 'a', 'đen'),
(23, 'Giày NMD_R1', 3000000, 20, './uploads/a05.PNG', 'a', 'đen'),
(24, 'Giày Superstart', 2900000, 20, './uploads/a06.PNG', 'a', 'trắng'),
(25, 'Giày Senseboost Go', 3200000, 20, './uploads/a07.PNG', 'a', 'xám'),
(26, 'Giày Marathon Tech', 3000000, 20, './uploads/a08.PNG', 'a', 'đen'),
(27, 'Giày Doramo 9', 1190000, 20, './uploads/a09.PNG', 'a', 'cam'),
(28, 'Giày Air Force', 3900000, 20, './uploads/n01.PNG', 'n', 'trắng'),
(29, 'Giày Air Max 97', 4600000, 20, './uploads/n02.PNG', 'n', 'nâu'),
(30, 'Giày Air 95 GS', 3900000, 20, './uploads/n03.PNG', 'n', 'xám'),
(31, 'Giày Air Force 107', 2400000, 20, './uploads/n04.PNG', 'n', 'trắng'),
(32, 'Giày Air Max 270', 3900000, 20, './uploads/n05.PNG', 'n', 'trắng'),
(33, 'Giày Nike Zoom Pegas', 4600000, 20, './uploads/n06.PNG', 'n', 'đen'),
(34, 'Giày Air Force Shadow', 4800000, 20, './uploads/n07.PNG', 'n', 'trắng'),
(35, 'Giày Air Max 720', 4900000, 20, './uploads/n08.PNG', 'n', 'đen'),
(36, 'Giày Monarch IV', 2900000, 20, './uploads/n09.PNG', 'n', 'trắng'),
(37, 'Giày Chuck 70 Green', 2200000, 10, './uploads/c01.PNG', 'c', 'lục'),
(38, 'Giày Chuck 70 black', 2100000, 10, './uploads/c02.PNG', 'c', 'đen'),
(39, 'Giày Chuck 70 blue', 2300000, 10, './uploads/c03.PNG', 'c', 'xanh'),
(40, 'Giày Chuck Parchment', 1900000, 10, './uploads/c04.PNG', 'c', 'trắng'),
(41, 'Giày Chuck 70 Hi Top', 2000000, 10, './uploads/c05.PNG', 'c', 'trắng'),
(42, 'Giày Taylor Textile', 1500000, 10, './uploads/c06.PNG', 'c', 'xám'),
(43, 'Giày Twisted Black', 1600000, 10, './uploads/c07.PNG', 'c', 'đen'),
(44, 'Giày Twisted White', 1600000, 10, './uploads/c08.PNG', 'c', 'trắng'),
(45, 'Giày Taylor camo', 1350000, 10, './uploads/c09.PNG', 'c', 'lục'),
(55, 'Giày Predator', 5200000, 10, './uploads/f01.PNG', 'f', 'đỏ'),
(56, 'Giày Pan vigor', 5250000, 10, './uploads/f02.PNG', 'f', 'đen'),
(57, 'Giày Predator 16.1', 5000000, 10, './uploads/f03.PNG', 'f', 'đỏ'),
(58, 'Giày Phantom', 5000000, 10, './uploads/f04.PNG', 'f', 'trắng'),
(59, 'Giày Nemeziz', 5100000, 10, './uploads/f05.PNG', 'f', 'trắng'),
(60, 'Giày Magista', 5000000, 10, './uploads/f06.PNG', 'f', 'lục'),
(61, 'Giày Predator 20.3', 5650000, 10, './uploads/f07.PNG', 'f', 'trắng'),
(62, 'Giày Vigoles', 5500000, 10, './uploads/f08.PNG', 'f', 'xám'),
(63, 'Giày Mercurial valbo', 6000000, 10, './uploads/f09.PNG', 'f', 'trắng'),
(64, 'Áo M pack heavy T', 900000, 10, './uploads/ta01.PNG', 'ta', 'trắng'),
(65, 'Áo phông Trefoil', 700000, 10, './uploads/ta02.PNG', 'ta', 'trắng'),
(66, 'Áo Tee SS', 1100000, 10, './uploads/ta03.PNG', 'ta', 'đen'),
(67, 'Áo Pastel tee - gray', 900000, 10, './uploads/ta04.PNG', 'ta', 'xám'),
(68, 'Áo Pastel Tee - pink', 910000, 10, './uploads/ta05.PNG', 'ta', 'hồng'),
(69, 'Áo Pastel Tee - white', 9100000, 10, './uploads/ta06.PNG', 'ta', 'trắng'),
(70, 'Áo Z.N.E', 1200000, 10, './uploads/ta07.PNG', 'ta', 'đen'),
(71, 'Áo Unisex Tee', 1200000, 10, './uploads/ta08.PNG', 'ta', 'trắng'),
(72, 'Áo White adidas', 700000, 10, './uploads/ta09.PNG', 'ta', 'trắng'),
(73, 'Balo mikkor ellla', 500000, 10, './uploads/b01.PNG', 'b', 'xanh'),
(74, 'Balo mikkor Or', 500000, 10, './uploads/b02.PNG', 'b', 'cam'),
(75, 'Balo mikkor ellla ', 500000, 10, './uploads/b03.PNG', 'b', 'đen'),
(76, 'Balo mikkor Re', 500000, 10, './uploads/b04.PNG', 'b', 'đỏ'),
(77, 'Balo simplecarry Gr', 390000, 10, './uploads/b05.PNG', 'b', 'xám'),
(78, 'Balo simplecarry Ny', 3800000, 10, './uploads/b06.PNG', 'b', 'xanh'),
(79, 'Balo simplecarry ', 400000, 10, './uploads/b07.PNG', 'b', 'đen'),
(80, 'Balo simplecarry ', 3800000, 10, './uploads/b08.PNG', 'b', 'xanh'),
(81, 'Balo Cris 8', 500000, 10, './uploads/b09.PNG', 'b', 'xám'),
(82, 'Giày adidas sleek', 2300000, 12, './uploads/a10.PNG', 'a', 'đen'),
(83, 'Giày human pharell', 6500000, 12, './uploads/a11.PNG', 'a', 'trắng'),
(84, 'Giày nite jogger', 3600000, 12, './uploads/a12.PNG', 'a', 'trắng-đen'),
(85, 'Giày Sl andridge', 2700000, 12, './uploads/a13.PNG', 'a', 'cam'),
(86, 'Giày supercourt', 2700000, 12, './uploads/a14.PNG', 'a', 'trắng'),
(87, 'Giày SC premiere', 3000000, 12, './uploads/a15.PNG', 'a', 'trắng'),
(88, 'Giày supercourt', 2700000, 12, './uploads/a16.PNG', 'a', 'trắng'),
(89, 'Giày X_PLR S', 1800000, 12, './uploads/a17.PNG', 'a', 'bạc'),
(90, 'Giày superstart ', 2400000, 12, './uploads/a18.PNG', 'a', 'trắng-đỏ'),
(91, 'Giày NMD_R1 V2', 3400000, 12, './uploads/a19.PNG', 'a', 'xám'),
(92, 'Giày superstart bold W', 2900000, 12, './uploads/a21.PNG', 'a', 'hồng'),
(93, 'Giày nite jogger', 3600000, 12, './uploads/a20.PNG', 'a', 'đen'),
(94, 'Giày SL 7200', 2700000, 12, './uploads/a22.PNG', 'a', 'xám'),
(95, 'Giày stan smith W', 2400000, 12, './uploads/a23.PNG', 'a', 'trắng'),
(96, 'Giày NMD_R1 V2', 3400000, 12, './uploads/a24.PNG', 'a', 'đen'),
(97, 'Giày nite jogger', 3600000, 12, './uploads/a25.PNG', 'a', 'xám-lục'),
(98, 'Giày superstar', 2300000, 12, './uploads/a26.PNG', 'a', 'trắng-đỏ'),
(99, 'Giày Prophere', 3100000, 12, './uploads/a27.PNG', 'a', 'đen'),
(100, 'Giày Prophere', 3100000, 12, './uploads/a28.PNG', 'a', 'camo'),
(101, 'Giày superstart', 3200000, 12, './uploads/a29.PNG', 'a', 'trắng'),
(102, 'Giày superstart', 3200000, 12, './uploads/a30.PNG', 'a', 'trắng'),
(103, 'Giày Nite jogger', 3600000, 12, './uploads/a31.PNG', 'a', 'đen-đỏ'),
(104, 'Giày Nite jogger', 3600000, 12, './uploads/a32.PNG', 'a', 'xám'),
(105, 'Giày Continental 80 ', 2500000, 12, './uploads/a33.PNG', 'a', 'nude'),
(106, 'Giày Stan smith', 2400000, 12, './uploads/a34.PNG', 'a', 'bạc'),
(107, 'Giày Ozeweego', 3100000, 12, './uploads/a35.PNG', 'a', 'trắng'),
(108, 'Giày Ozeweego', 3100000, 12, './uploads/a36.PNG', 'a', 'nâu-xám'),
(109, 'Giày ZX Torsion', 3200000, 12, './uploads/a37.PNG', 'a', 'xám'),
(110, 'Giày ZX 4000 4D', 9000000, 12, './uploads/a38.PNG', 'a', 'đen'),
(111, 'Giày NMD_R1', 3400000, 12, './uploads/a39.PNG', 'a', 'đỏ'),
(112, 'Giày Sambarose', 2900000, 12, './uploads/a40.PNG', 'a', 'trắng-nâu');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `phone`, `name`) VALUES
(11, 'RoseBP', 'edbbfaa068944f62bf5b57c21dbc6ab3', 'rose3699@gmail.com', '0902505669', 'Park Chae-young '),
(12, 'nhanpham', '10e40f5cfcfa1b5b6225bfa844a92642', 'nhan@gmail.com', '0902505669', 'Phạm Phươc Nhân');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iduser` (`iduser`),
  ADD KEY `idproduct` (`idproduct`);

--
-- Chỉ mục cho bảng `detailorders`
--
ALTER TABLE `detailorders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idorders` (`idorders`),
  ADD KEY `iduser` (`iduser`),
  ADD KEY `idproduct` (`idproduct`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iduser` (`iduser`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;

--
-- AUTO_INCREMENT cho bảng `detailorders`
--
ALTER TABLE `detailorders`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`idproduct`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `detailorders`
--
ALTER TABLE `detailorders`
  ADD CONSTRAINT `detailorders_ibfk_1` FOREIGN KEY (`idorders`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `detailorders_ibfk_2` FOREIGN KEY (`iduser`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `detailorders_ibfk_3` FOREIGN KEY (`idproduct`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
