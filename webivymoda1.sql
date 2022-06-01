-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 01, 2022 lúc 05:21 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webivymoda1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cartegory`
--

CREATE TABLE `cartegory` (
  `id` int(11) NOT NULL,
  `cate_name` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(11) NOT NULL,
  `ma_danhmuc` int(11) NOT NULL,
  `ten_danhmuc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `ma_danhmuc`, `ten_danhmuc`) VALUES
(1, 1, 'NỮ'),
(2, 2, 'NAM'),
(5, 3, 'TRẺ EM'),
(6, 4, 'FINAL SALE'),
(8, 5, 'BỘ SƯU TẬP'),
(9, 6, 'TIN TỨC'),
(10, 7, 'LIÊN HỆ'),
(11, 8, 'ADMIN');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `images` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `sdt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`id`, `user_id`, `product_name`, `name`, `quantity`, `images`, `price`, `address`, `sdt`) VALUES
(1, 4, 'ZUÝP BÚT CHÌ CẠP NHÚN', 'Đình Phong', 1, 'sp5.jfif', 350000, '218 Lạc Long Quân', 343061257),
(10, 4, 'Đầm dài hồng', 'Hoàng Long', 1, 'sp14.jfif', 550000, '123 Âu Cơ', 978048261),
(13, 6, 'ZUÝP BÚT CHÌ DÀI CẠP NÂU', 'Đình Phong', 2, 'sp16.jfif', 650000, '218 Lạc Long Quân', 3463065),
(18, 6, 'ZUÝP BÚT CHÌ DÀI CẠP NÂU', 'nguyễn văn A', 2, 'sp16.jfif', 650000, '235 Hoàng quốc Việt', 34301257),
(19, 6, 'ZUÝP BÚT CHÌ CẠP NÂU', 'Đức Nguyễn', 2, 'sp10.jfif', 550000, 'Hai Bà Trưng', 123456789),
(22, 3, 'ZUÝP BÚT CHÌ CẠP NÂU', 'Nhật', 1, 'sp10.jfif', 550000, '123 Âu Cơ', 2147483647),
(23, 3, 'ZUÝP BÚT CHÌ DÀI CẠP NÂU', 'Nhật', 3, 'sp16.jfif', 650000, '123 Âu Cơ', 2147483647),
(24, 3, 'Đầm dài hồng', 'Nhật', 2, 'sp14.jfif', 550000, '123 Âu Cơ', 2147483647),
(27, 3, 'ZUÝP BÚT CHÌ DÀI CẠP NÂU', 'Đình Phong', 1, 'sp16.jfif', 650000, '218 Lạc Long Quân', 2147483647),
(28, 3, 'Đầm dài hồng', 'Đình Phong', 3, 'sp14.jfif', 550000, '218 Lạc Long Quân', 2147483647);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id`, `product_id`, `user_id`, `quantity`) VALUES
(47, 74, 6, 1),
(59, 73, 3, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `Tensp` varchar(255) NOT NULL,
  `Anh_sp` varchar(255) NOT NULL,
  `Gia_sp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `cate_id`, `Tensp`, `Anh_sp`, `Gia_sp`) VALUES
(64, 0, 'QUẦN LỬNG KHAKI DÁNG REGULAR MS 21E3016', 'sp1.1.jfif', 150000),
(65, 0, 'Váy công sở', 'sp1.jfif', 950000),
(67, 0, 'ZUÝP BÚT CHÌ CẠP NHÚN', 'sp5.jfif', 350000),
(68, 0, 'ZUÝP BÚT CHÌ CẠP NÂU', 'sp10.jfif', 550000),
(72, 0, 'Đầm dài hồng', 'sp14.jfif', 550000),
(73, 0, 'ZUÝP BÚT CHÌ DÀI CẠP NÂU', 'sp16.jfif', 650000),
(74, 0, 'ĐẦM DÀI VÀNG', 'sp15.jfif', 550000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

CREATE TABLE `tintuc` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tintuc`
--

INSERT INTO `tintuc` (`id`, `title`, `content`, `image`) VALUES
(2, 'Black Friday !', 'Black Friday (ngày 26/11 tới đây) là dịp mà hầu hết các thương hiệu và shop thời trang đều giảm giá cực sâu, giúp chị em tha hồ mua sắm tiết kiệm. Đứng trước những items thời trang có giá thấp chưa từng thấy, hẳn là chị em nào cũng muốn rinh càng nhiều đồ', 'Black-Friday-2019-Thuong-hieu-thoi-trang-YODY-Fashion.jpg'),
(3, 'SALE 12/12', 'Hằng năm, những người đóng vai trò bán hàng và phân phối hàng đều cho ra nhiều ý tưởng mới để giảm giá sản phẩm nhằm tăng lượng mua hàng của khách hàng. Ở Việt Nam cũng vậy, các thương hiệu mua sắm lớn như Shopee, Tiki, Lazada,.. đều chọn những ngày đẹp c', '12-12-shopping-day-sale-poster-flyer-design_32996-359.jpg'),
(5, 'Đa dạng phong cách cùng áo tay lỡ cực chất cho phái mạnh', 'Áo thun tay lỡ được mệnh danh là item kinh điển của giới trẻ đặc biệt là gen Z yêu thích sự phá cách, trẻ trung và năng động. Hãy cùng IVY moda khám phá những mẫu áo tay lỡ đẹp và cách phối đồ cực chất dành cho phái mạnh qua bài viết này nhé!', '86ee5dd26b1a922c823d97c21226317c.jpg'),
(6, '7 mẫu áo thun màu vàng độc đáo cho phái mạnh', 'Không chỉ tập trung vào kiểu dáng và thiết kế sang trong cùng màu sắc tươi sáng, áo thun màu vàng được coi là item “cứu cánh” cho phái mạnh trong những ngày “không biết mặc gì”. Cùng IVY moda khám phá những mẫu áo thun màu vàng tươi sáng cho một ngày tràn', '67bafe3a9997033c2630ec22929a1311.jpg'),
(7, 'Top những mẫu áo thun thể thao nam tạo nên đẳng cấp phái mạnh', 'Lấy cảm hứng từ phong cách Sporty Chic năng động và cá tính, áo thun thể thao nam sẽ mang đến cho chàng sự sôi nổi và biến tấu phong cách thời trang linh hoạt thời thượng. Nếu chàng đang băn khoăn mặc gì cho ngày dài năng động thì hãy cùng IVY moda  khám ', '5eca8435c0c88047c1f69245223d48f9.jpg'),
(8, 'Gợi ý 10 set đồ cực đẹp với chân váy trắng mà nàng không nên bỏ lỡ', 'Những chiếc chân váy trắng nhẹ nhàng, trang nhã luôn chiếm được cảm lớn từ các chị em phái đẹp. Sắc trắng dễ chịu luôn mang lại cảm giác an toàn, thoải mái cho người diện. Hãy cùng IVY moda khám phá 12 set đồ cực ấn tượng với chân váy trắng ngay nhé!', 'ee67767b6d04822be346ad79ef2bb1af.png'),
(9, 'Bùng nổ xu hướng thời trang phái mạnh cùng áo thun Unisex', 'Áo thun Unisex là xu hướng thời trang mới của giới trẻ đặc biệt là nam giới với những thành công vượt ngoài tầm với. Không chỉ là xu hướng thời trang được các chàng trai yêu thích nó còn mang đến phong cách nổi bật và không bao giờ bị lỗi mốt cho các chàn', '81867c0b47fc4b43a4a8ef04207a8310.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `images`, `email`, `password`) VALUES
(3, 'admin', '', 'phamdinhphong12@gmail.com', '$2y$10$d4NziDmCv1TX0JtD91WxM.p3Ygurp16x3cltDxQdZkqBeNOzt9hRS'),
(6, 'admin', '', 'admin310@gmail.com', '$2y$10$R6vmiMwTO/NzBgjv01EyuOoCEP4aKaSDw3iLpt6yhFUw01f8cByXe');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cartegory`
--
ALTER TABLE `cartegory`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tintuc`
--
ALTER TABLE `tintuc`
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
-- AUTO_INCREMENT cho bảng `cartegory`
--
ALTER TABLE `cartegory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
