-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 10, 2019 lúc 04:55 AM
-- Phiên bản máy phục vụ: 10.1.33-MariaDB
-- Phiên bản PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlpt_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `electric_water`
--

CREATE TABLE `electric_water` (
  `ID` int(11) NOT NULL,
  `PRICE_ELECTRIC` double NOT NULL,
  `PRICE_WATER` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `electric_water`
--

INSERT INTO `electric_water` (`ID`, `PRICE_ELECTRIC`, `PRICE_WATER`) VALUES
(1, 3000, 20000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history_money`
--

CREATE TABLE `history_money` (
  `ID` int(11) NOT NULL,
  `ID_ROOM` int(11) NOT NULL,
  `ID_RENTER` int(11) NOT NULL,
  `DATE_PAY` text NOT NULL,
  `DECRIPTION` text NOT NULL,
  `PRICE` float NOT NULL,
  `PAY_OTHER` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `list_room`
--

CREATE TABLE `list_room` (
  `ID` int(11) NOT NULL,
  `NAME_ROOM` varchar(50) NOT NULL,
  `PRICE` double NOT NULL,
  `NUMBER_ELECTRIC` int(11) NOT NULL,
  `NUMBER_WATER` int(11) NOT NULL,
  `DECRIPTION` text NOT NULL,
  `STATUS` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `list_room`
--

INSERT INTO `list_room` (`ID`, `NAME_ROOM`, `PRICE`, `NUMBER_ELECTRIC`, `NUMBER_WATER`, `DECRIPTION`, `STATUS`) VALUES
(1, 'Phòng 1', 1000000, 0, 0, 'phong moi', 1),
(2, 'Phòng 2', 1100000, 0, 0, 'phong moi', 1),
(3, 'Phòng 3', 1000000, 0, 0, 'phong moi', 0),
(4, 'Phòng 4', 1100000, 0, 0, 'phong moi', 0),
(5, 'Phòng 5', 1100000, 0, 0, 'phong moi', 0),
(6, 'Phòng 6', 1100000, 0, 0, 'phong moi', 0),
(7, 'Phòng 7', 1100000, 0, 0, 'phong moi', 0),
(8, 'Phòng 8', 1100000, 0, 0, 'phong moi', 0),
(9, 'Phòng 9', 1100000, 0, 0, 'phong moi', 0),
(10, 'Phòng 10', 1100000, 0, 0, 'phong moi', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lits_renter_rom`
--

CREATE TABLE `lits_renter_rom` (
  `ID` int(11) NOT NULL,
  `ID_ROOM` int(11) NOT NULL,
  `ID_RENTER` int(11) NOT NULL,
  `DAY_IN` varchar(10) DEFAULT NULL,
  `DAY_OUT` varchar(10) DEFAULT NULL,
  `ELECTRIC_OLD` int(11) DEFAULT NULL,
  `WATER_OLD` int(11) DEFAULT NULL,
  `ELECTRIC_NEW` int(11) DEFAULT NULL,
  `WATER_NEW` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `lits_renter_rom`
--

INSERT INTO `lits_renter_rom` (`ID`, `ID_ROOM`, `ID_RENTER`, `DAY_IN`, `DAY_OUT`, `ELECTRIC_OLD`, `WATER_OLD`, `ELECTRIC_NEW`, `WATER_NEW`) VALUES
(1, 1, 1, '12062019', NULL, 0, 0, 20, 2),
(2, 2, 2, '20022019', NULL, 2, 1, 3, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `room_renter`
--

CREATE TABLE `room_renter` (
  `ID` int(11) NOT NULL,
  `Full_name` varchar(200) NOT NULL,
  `SCMND` varchar(50) NOT NULL,
  `PhoneNumber` varchar(50) NOT NULL,
  `Decription` text,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `room_renter`
--

INSERT INTO `room_renter` (`ID`, `Full_name`, `SCMND`, `PhoneNumber`, `Decription`, `Status`) VALUES
(1, 'Nguyen Văn A', '123456789', '0123456789', 'độc thân, lm nghe lương thiện', 0),
(2, 'NGUYỄN VĂN C', '987654310', '9638527410', 'người đặc biệt của công chúng', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `USER_NAME` varchar(100) NOT NULL,
  `PASSWORK` varchar(100) NOT NULL,
  `DECRIPTION` varchar(200) DEFAULT NULL,
  `FULL_NAME` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`ID`, `USER_NAME`, `PASSWORK`, `DECRIPTION`, `FULL_NAME`) VALUES
(1, 'admin', '123456', 'nguoi chu cua tro', 'chu tro');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `electric_water`
--
ALTER TABLE `electric_water`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `history_money`
--
ALTER TABLE `history_money`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `list_room`
--
ALTER TABLE `list_room`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `lits_renter_rom`
--
ALTER TABLE `lits_renter_rom`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `room_renter`
--
ALTER TABLE `room_renter`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `electric_water`
--
ALTER TABLE `electric_water`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `history_money`
--
ALTER TABLE `history_money`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `list_room`
--
ALTER TABLE `list_room`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `lits_renter_rom`
--
ALTER TABLE `lits_renter_rom`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `room_renter`
--
ALTER TABLE `room_renter`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
