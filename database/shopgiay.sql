-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 23, 2021 lúc 06:06 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shoplaravel`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `ID_Admin` int(10) NOT NULL,
  `Email_Admin` varchar(255) NOT NULL,
  `Password_Admin` varchar(255) NOT NULL,
  `Name_Admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`ID_Admin`, `Email_Admin`, `Password_Admin`, `Name_Admin`) VALUES
(1, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Admin'),
(3, 'vodangkhoa2207@gmail.com', '9f3c6c054a9aa8da6daf9a533d43565c', 'Vo Dang Khoa');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `ID_ChiTiet` int(10) NOT NULL,
  `ID_DonHang` int(10) NOT NULL,
  `ID_SP` int(10) NOT NULL,
  `Ten_SP` varchar(255) NOT NULL,
  `Gia_SP` float NOT NULL,
  `SoLuong_DaMua_SP` int(10) NOT NULL,
  `TongTien_ChiTiet` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`ID_ChiTiet`, `ID_DonHang`, `ID_SP`, `Ten_SP`, `Gia_SP`, `SoLuong_DaMua_SP`, `TongTien_ChiTiet`) VALUES
(1, 12, 6, 'Giày thể thao Adidas Falcon Trắng', 790000, 2, 0),
(2, 13, 7, 'Giày Thể Thao Nike M2K Tekno Nâu Nhạt', 980000, 2, 0),
(3, 15, 7, 'Giày Thể Thao Nike M2K Tekno Nâu Nhạt', 980000, 2, 0),
(4, 16, 9, 'Giày Thể Thao Nike M2K Tekno Màu Trắng Đế Đen', 1980000, 3, 0),
(6, 19, 7, 'Giày Thể Thao Nike M2K Tekno Nâu Nhạt', 980000, 1, 980000),
(7, 19, 8, 'Giày Thể Thao Adidas EQT Blue', 680000, 2, 1360000),
(8, 19, 6, 'Giày thể thao Adidas Falcon Trắng', 790000, 5, 3950000),
(9, 19, 9, 'Giày Thể Thao Nike M2K Tekno Màu Trắng Đế Đen', 660000, 4, 2640000),
(10, 20, 8, 'Giày Thể Thao Adidas EQT Blue', 680000, 2, 1360000),
(11, 20, 7, 'Giày Thể Thao Nike M2K Tekno Nâu Nhạt', 980000, 1, 980000),
(12, 21, 8, 'Giày Thể Thao Adidas EQT Blue', 680000, 1, 680000),
(14, 23, 9, 'Giày Thể Thao Nike M2K Tekno Màu Trắng Đế Đen', 660000, 16, 10560000),
(15, 24, 9, 'Giày Thể Thao Nike M2K Tekno Màu Trắng Đế Đen', 660000, 3, 1980000),
(16, 24, 8, 'Giày Thể Thao Adidas EQT Blue', 680000, 2, 1360000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `ID_DonHang` int(10) NOT NULL,
  `ID_KhachHang` int(10) DEFAULT NULL,
  `ID_VanChuyen` int(10) NOT NULL,
  `ID_ThanhToan` int(10) DEFAULT NULL,
  `Tong_DonHang` varchar(50) DEFAULT NULL,
  `TrangThai_DonHang` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`ID_DonHang`, `ID_KhachHang`, `ID_VanChuyen`, `ID_ThanhToan`, `Tong_DonHang`, `TrangThai_DonHang`) VALUES
(12, 4, 9, 15, '1,580,000', 'Đang chờ xử lý'),
(13, 4, 10, 16, '1,960,000', 'Đang chờ xử lý'),
(14, 4, 11, 17, '1,960,000', 'Hủy đơn hàng'),
(15, 4, 11, 18, '1,960,000', 'Đã hoàn thành'),
(16, 4, 12, 19, '1,980,000', 'Hủy đơn hàng'),
(19, 5, 14, 22, '8,930,000', 'Đã hoàn thành'),
(20, 5, 15, 23, '2,340,000', 'Đã hoàn thành'),
(21, 5, 16, 24, '680,000', 'Đã hoàn thành'),
(22, 5, 17, 25, '150,000,000', 'Đã hoàn thành'),
(23, 5, 18, 26, '10,560,000', 'Đã hoàn thành'),
(24, 4, 19, 27, '3,340,000', 'Đang chờ xử lý');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `ID_KhachHang` int(10) NOT NULL,
  `Email_KhachHang` varchar(255) NOT NULL,
  `MatKhau_KhachHang` varchar(255) NOT NULL,
  `HoTen_KhachHang` varchar(255) NOT NULL,
  `DiaChi_KhachHang` varchar(255) NOT NULL,
  `SDT_KhachHang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`ID_KhachHang`, `Email_KhachHang`, `MatKhau_KhachHang`, `HoTen_KhachHang`, `DiaChi_KhachHang`, `SDT_KhachHang`) VALUES
(4, 'vodangkhoa2207@gmail.com', '9eedaefe3294a5a077a8735ef83932a0', 'Võ Đăng Khoa', '11/7 Mậu Thân -  Cần Thơ', '0918183723'),
(5, 'haha@gmail.com', '202cb962ac59075b964b07152d234b70', 'KH1', '11/7 Mậu Thân -  Cần Thơ', '0859453620'),
(6, 'hihi@gmail.com', '202cb962ac59075b964b07152d234b70', 'Hi Hi', 'Cần Thơ', '0919191919');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `ID_LoaiSP` int(10) NOT NULL,
  `Ten_LoaiSP` varchar(255) NOT NULL,
  `MoTa_LoaiSP` text NOT NULL,
  `TrangThai_LoaiSP` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `loaisanpham`
--

INSERT INTO `loaisanpham` (`ID_LoaiSP`, `Ten_LoaiSP`, `MoTa_LoaiSP`, `TrangThai_LoaiSP`) VALUES
(7, 'Giày Nam', 'GN', 0),
(8, 'Giày Nữ', 'Giày Nữ', 1),
(9, 'Giày Lười', 'Giày Lười', 0),
(10, 'Giày Sandal & Dép', 'Giày Sandal & Dép', 0),
(11, 'Giày Sapo', 'Giày Sapo', 1),
(12, 'Giày Sneaker', 'Giày Sneaker', 0),
(13, 'Giày Tây', 'Giày Tây', 0),
(14, 'Giày Boot', 'Giày Boot', 0),
(15, 'Giày V1', 'Đế cứng, Độ bền chống chịu tốt', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `ID_SP` int(10) NOT NULL,
  `Ten_SP` varchar(255) NOT NULL,
  `ID_LoaiSP` int(10) NOT NULL,
  `ID_ThuongHieu` int(10) NOT NULL,
  `HinhAnh_SP` varchar(255) NOT NULL,
  `SoLuong_SP` int(10) NOT NULL,
  `Gia_SP` int(10) NOT NULL,
  `NoiDung_SP` text NOT NULL,
  `MoTa_SP` text NOT NULL,
  `TrangThai_SP` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`ID_SP`, `Ten_SP`, `ID_LoaiSP`, `ID_ThuongHieu`, `HinhAnh_SP`, `SoLuong_SP`, `Gia_SP`, `NoiDung_SP`, `MoTa_SP`, `TrangThai_SP`) VALUES
(6, 'Giày thể thao Adidas Falcon Trắng', 12, 4, 'giay_thỂ_thao_adidas_falcon_trẮng-570x57028.jpg', 990, 790000, 'Giày thể thao Adidas Falcon Trắng', 'Giày thể thao Adidas Falcon Trắng', 0),
(7, 'Giày Thể Thao Nike M2K Tekno Nâu Nhạt', 12, 5, 'giay_thỂ_thao_nike_m2k_tekno_nau_nhẠt-570x57053.jpg', 995, 980000, 'Giày Thể Thao Nike M2K Tekno Nâu Nhạt', 'Giày Thể Thao Nike M2K Tekno Nâu Nhạt', 0),
(8, 'Giày Thể Thao Adidas EQT Blue', 12, 4, 'giay_eqt_blue_giay_thể_thao_adidas_eqt_basketball_adv_blue-570x57087.jpg', 993, 680000, 'Giày Thể Thao Adidas EQT Blue', 'Giày Thể Thao Adidas EQT Blue', 0),
(9, 'Giày Thể Thao Nike M2K Tekno Màu Trắng Đế Đen', 12, 5, 'giay_thỂ_thao_nike_m2k_tekno_trẮng_ĐẾ_Đen-570x57010.jpg', 976, 660000, 'Giày Thể Thao Nike M2K Tekno Màu Trắng Đế Đen', 'Giày Thể Thao Nike M2K Tekno Màu Trắng Đế Đen', 0),
(11, 'Giày V', 15, 8, 'giay_thỂ_thao_nike_m2k_tekno_nau_nhẠt-570x57038.jpg', 20, 900000, 'Giày V thuộc giày V1 mang nhãn hiệu cao cấp của  nhãn hàng nổi tiếng Vans', 'Giày V thuộc giày V1 mang nhãn hiệu cao cấp của  nhãn hàng nổi tiếng Vans', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhtoan`
--

CREATE TABLE `thanhtoan` (
  `ID_ThanhToan` int(10) NOT NULL,
  `PhuongPhap_ThanhToan` varchar(255) NOT NULL,
  `TrangThai_ThanhToan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `thanhtoan`
--

INSERT INTO `thanhtoan` (`ID_ThanhToan`, `PhuongPhap_ThanhToan`, `TrangThai_ThanhToan`) VALUES
(1, '2', 'Đang chờ xử lý'),
(2, '2', 'Đang chờ xử lý'),
(3, '2', 'Đang chờ xử lý'),
(4, '1', 'Đang chờ xử lý'),
(5, '1', 'Đang chờ xử lý'),
(6, '1', 'Đang chờ xử lý'),
(7, '2', 'Đang chờ xử lý'),
(8, '2', 'Đang chờ xử lý'),
(9, '1', 'Đang chờ xử lý'),
(10, '2', 'Đang chờ xử lý'),
(11, '2', 'Đang chờ xử lý'),
(12, '2', 'Đang chờ xử lý'),
(13, '2', 'Đang chờ xử lý'),
(14, '2', 'Đang chờ xử lý'),
(15, '2', 'Đang chờ xử lý'),
(16, '2', 'Đang chờ xử lý'),
(17, '2', 'Đang chờ xử lý'),
(18, '2', 'Đang chờ xử lý'),
(19, '2', 'Đang chờ xử lý'),
(20, '2', 'Đang chờ xử lý'),
(21, '2', 'Đang chờ xử lý'),
(22, '2', 'Đang chờ xử lý'),
(23, '2', 'Đang chờ xử lý'),
(24, '2', 'Đang chờ xử lý'),
(25, '2', 'Đang chờ xử lý'),
(26, '2', 'Đang chờ xử lý'),
(27, '2', 'Đang chờ xử lý');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuonghieusp`
--

CREATE TABLE `thuonghieusp` (
  `ID_ThuongHieu` int(10) NOT NULL,
  `Ten_ThuongHieu` varchar(255) NOT NULL,
  `MoTa_ThuongHieu` text NOT NULL,
  `TrangThai_ThuongHieu` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `thuonghieusp`
--

INSERT INTO `thuonghieusp` (`ID_ThuongHieu`, `Ten_ThuongHieu`, `MoTa_ThuongHieu`, `TrangThai_ThuongHieu`) VALUES
(4, 'Adidas', 'Nói về các thương hiệu giày đình đám trong làng thể thao thế giới, được nhiều người sử dụng hiện nay thì chắc chắn là Adidas. Tính đến nay, Adidas đã góp mặt trên thị trường gần một thế kỷ nhưng cái tên này chưa bao giờ hết hot. Bất chợt bạn hỏi ai đó về thương hiệu giày thể thao nổi tiếng mà họ thích hay đang sở hữu. Không quá bất ngờ khi 80% người trả lời đều nói rằng đó là giày của Adidas.', 0),
(5, 'Nike', 'Cũng giống như Adidas, Nike đang sở hữu hệ thống cửa hàng rộng lớn ở mọi nơi trên thế giới. Với câu slogan kinh điển “Just Do It”, thương hiệu với dấu “swoosh” đặc trưng này luôn biết cách chiếm trọn cảm tình của đông đảo khách hàng qua tốc độ đổi mới công nghệ. Luôn luôn là những công nghệ tiên tiến được áp dụng mong muốn đem đến trải nghiệm tuyệt vời cho người đi.', 0),
(6, 'Converse', 'Converse là một trong những cái tên không thể không nhắc đến trong các thương hiệu giày thể thao nổi tiếng thế giới. Bạn biết không, theo nhiều cuộc khảo sát, có đến 60% người Mỹ đều sở hữu ít nhất 1 đôi giày Converse trong tủ đồ của mình. Điều này đủ để thấy họ yêu thích những đôi giày vải với kiểu dáng basic và mang đậm hơi hướng cổ điển này như thế nào.', 0),
(7, 'Puma', 'Nếu nói về lịch sử thì Adidas và Puma vừa là anh em vừa là kẻ thù khi anh của nhà sáng lập Adidas lại là Founder của Puma. Trùng hợp thay, hai công ty chỉ cách nhau một dòng sông. Lý giải về logo con báo nhảy, vị Founder chia sẻ rằng báo là biểu tượng của sức mạnh và tốc độ vượt trội dành cho các vận động viên nhanh nhất.', 0),
(8, 'Vans', 'Vans chắc hẳn đã không còn lạ lẫm với chúng ta đúng không? Tương tự như Adidas và Nike, với những ai yêu mến và có sự hiểu biết nhất định về thế giới giày thể thao, khi nhắc đến Converse thì người ta nghĩ ngay đến Vans và ngược lại.\r\n\r\nTrong các hãng giày thể thao nổi tiếng hiện nay, Vans chiếm một phần không nhỏ bởi những sản phẩm của thương hiệu này đơn giản, thoải mái, ứng dụng cao và không kém phần thời trang. Một số mẫu giày tiêu biểu của Vans phải kể đến như Old School, Classic Authentic, Slip On, …', 0),
(9, 'New Balance', 'Về tên gọi New Balance, người sáng lập William J. Riley chia sẻ ông muốn đem tới cho người dùng giày sự “cân bằng mới” khi đi những đôi giày mà hãng sản xuất. Thuở ban đầu, New Balance chỉ sản xuất miếng lót giày đặc biệt giúp khắc phục những khuyến điểm của bàn chân, tạo cảm giác dễ chịu nhất cho người đi.', 0),
(10, 'Balenciaga', 'Thương hiệu giày độc đáo và khác biệt', 0),
(12, 'Asics', 'Asics là thương hiệu giày thể thao nổi tiếng có tuổi đời lâu dài và bề dày văn hóa của Nhật Bản. Không chỉ sản xuất giày, Asics còn cung cấp nhiều thiết bị khác được thiết kế chuyên dụng cho những bộ môn thể thao khác nhau như điền kinh, chạy, bóng đá, …', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vanchuyen`
--

CREATE TABLE `vanchuyen` (
  `ID_VanChuyen` int(10) NOT NULL,
  `Ten_VanChuyen` varchar(255) NOT NULL,
  `Email_VanChuyen` varchar(255) NOT NULL,
  `SDT_VanChuyen` varchar(10) NOT NULL,
  `DiaChi_VanChuyen` text NOT NULL,
  `GhiChu_VanChuyen` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `vanchuyen`
--

INSERT INTO `vanchuyen` (`ID_VanChuyen`, `Ten_VanChuyen`, `Email_VanChuyen`, `SDT_VanChuyen`, `DiaChi_VanChuyen`, `GhiChu_VanChuyen`) VALUES
(1, 'Võ Đăng Khoa', 'vodangkhoa2207@gmail.com', '0918183723', '11/7 Mậu Thân -  Cần Thơ', 'Giao đúng hạn'),
(2, 'Võ Đăng Khoa', 'vodangkhoa2207@gmail.com', '0918183723', '11/7 Mậu Thân -  Cần Thơ', 'Giao đúng hạn'),
(3, 'Võ Đăng Khoa', 'vodangkhoa2207@gmail.com', '0918183723', '11/7 Mậu Thân -  Cần Thơ', 'Giao trong ngày'),
(4, 'Võ Đăng Khoa', 'vodangkhoa2207@gmail.com', '0918183723', '11/7 Mậu Thân -  Cần Thơ', NULL),
(5, 'Võ Đăng Khoa', 'vodangkhoa2207@gmail.com', '0918183723', '11/7 Mậu Thân -  Cần Thơ', NULL),
(6, 'Võ Đăng Khoa', 'vodangkhoa2207@gmail.com', '0918183723', '11/7 Mậu Thân -  Cần Thơ', NULL),
(7, 'Võ Đăng Khoa', 'vodangkhoa2207@gmail.com', '0918183723', '11/7 Mậu Thân -  Cần Thơ', 'Giao đúng hạn'),
(8, 'Võ Đăng Khoa', 'vodangkhoa2207@gmail.com', '0918183723', '11/7 Mậu Thân -  Cần Thơ', NULL),
(9, 'Võ Đăng Khoa', 'vodangkhoa2207@gmail.com', '0918183723', '11/7 Mậu Thân -  Cần Thơ', 'Giao hàng nhanh'),
(10, 'Võ Đăng Khoa', 'vodangkhoa2207@gmail.com', '0918183723', '11/7 Mậu Thân -  Cần Thơ', 'Giao đúng hạn'),
(11, 'Võ Đăng Khoa', 'vodangkhoa2207@gmail.com', '0918183723', '11/7 Mậu Thân -  Cần Thơ', 'fsafsaa'),
(12, 'Võ Đăng Khoa', 'vodangkhoa2207@gmail.com', '0918183723', '11/7 Mậu Thân -  Cần Thơ', 'segssags'),
(13, 'Võ Đăng Khoa', 'vodangkhoa2207@gmail.com', '0918183723', '11/7 Mậu Thân -  Cần Thơ', 'sdfsafsf'),
(14, 'KH1', 'haha@gmail.com', '0859453620', '11/7 Mậu Thân -  Cần Thơ', 'dfgsdgd'),
(15, 'KH1', 'haha@gmail.com', '0859453620', 'Cà Mau', 'giao nhanh'),
(16, 'KH1', 'haha@gmail.com', '0859453620', '11/7 Mậu Thân -  Cần Thơ', 'giao hàng nhanh'),
(17, 'KH1', 'haha@gmail.com', '0859453620', '11/7 Mậu Thân -  Cần Thơ', 'dsfsdfgds'),
(18, 'KH1', 'haha@gmail.com', '0859453620', '11/7 Mậu Thân -  Cần Thơ', 'ádasfdsadsa'),
(19, 'Võ Đăng Khoa', 'vodangkhoa2207@gmail.com', '0918183723', '11/7 Mậu Thân -  Cần Thơ', 'Giao hàng nhanh');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID_Admin`);

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`ID_ChiTiet`),
  ADD KEY `chitietdonhang_ibfk_1` (`ID_DonHang`),
  ADD KEY `chitietdonhang_ibfk_3` (`ID_SP`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`ID_DonHang`),
  ADD KEY `FK_donhang_khachhang` (`ID_KhachHang`),
  ADD KEY `FK_donhang_vanchuyen` (`ID_VanChuyen`),
  ADD KEY `FK_donhang_thanhtoan` (`ID_ThanhToan`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`ID_KhachHang`);

--
-- Chỉ mục cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`ID_LoaiSP`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`ID_SP`),
  ADD KEY `sanpham_ibfk_1` (`ID_LoaiSP`),
  ADD KEY `sanpham_ibfk_2` (`ID_ThuongHieu`);

--
-- Chỉ mục cho bảng `thanhtoan`
--
ALTER TABLE `thanhtoan`
  ADD PRIMARY KEY (`ID_ThanhToan`);

--
-- Chỉ mục cho bảng `thuonghieusp`
--
ALTER TABLE `thuonghieusp`
  ADD PRIMARY KEY (`ID_ThuongHieu`);

--
-- Chỉ mục cho bảng `vanchuyen`
--
ALTER TABLE `vanchuyen`
  ADD PRIMARY KEY (`ID_VanChuyen`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `ID_Admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `ID_ChiTiet` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `ID_DonHang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `ID_KhachHang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `ID_LoaiSP` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `ID_SP` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `thanhtoan`
--
ALTER TABLE `thanhtoan`
  MODIFY `ID_ThanhToan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `thuonghieusp`
--
ALTER TABLE `thuonghieusp`
  MODIFY `ID_ThuongHieu` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `vanchuyen`
--
ALTER TABLE `vanchuyen`
  MODIFY `ID_VanChuyen` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_ibfk_1` FOREIGN KEY (`ID_DonHang`) REFERENCES `donhang` (`ID_DonHang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chitietdonhang_ibfk_3` FOREIGN KEY (`ID_SP`) REFERENCES `sanpham` (`ID_SP`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `FK_donhang_khachhang` FOREIGN KEY (`ID_KhachHang`) REFERENCES `khachhang` (`ID_KhachHang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_donhang_thanhtoan` FOREIGN KEY (`ID_ThanhToan`) REFERENCES `thanhtoan` (`ID_ThanhToan`),
  ADD CONSTRAINT `FK_donhang_vanchuyen` FOREIGN KEY (`ID_VanChuyen`) REFERENCES `vanchuyen` (`ID_VanChuyen`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`ID_LoaiSP`) REFERENCES `loaisanpham` (`ID_LoaiSP`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`ID_ThuongHieu`) REFERENCES `thuonghieusp` (`ID_ThuongHieu`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
