-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2016 at 12:20 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phukienthoitrang`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `name`, `image`, `url`, `type`) VALUES
(1, 'women fashion', 'public/img/product/cms11.jpg', '', 1),
(2, 'men fashion', 'public/img/product/shope-add1.jpg', '', 2),
(3, 'bag fashion', 'public/img/product/shope-add2.jpg', '', 3),
(4, 'buttom fashion', 'public/img/product/one-helf1.jpg', '', 4),
(5, 'buttom left', 'public/img/product/one-helf2.jpg', '', 5);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'đồng hồ'),
(2, 'vòng tay');

-- --------------------------------------------------------

--
-- Table structure for table `detailproduct`
--

CREATE TABLE `detailproduct` (
  `id` int(10) UNSIGNED NOT NULL,
  `images` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `silebar_images` text COLLATE utf8_unicode_ci NOT NULL,
  `infomation` text COLLATE utf8_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data_sheet` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `productID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `detailproduct`
--

INSERT INTO `detailproduct` (`id`, `images`, `silebar_images`, `infomation`, `size`, `color`, `comment`, `data_sheet`, `productID`) VALUES
(1, 'public/img/product/sale/1.jpg,public/img/product/sale/2.jpg,public/img/product/sale/3.jpg,public/img/product/sale/4.jpg,public/img/product/sale/5.jpg', 'public/img/product/sidebar_product/1.jpg,public/img/product/sidebar_product/2.jpg,public/img/product/sidebar_product/3.jpg,public/img/product/sidebar_product/4.jpg,public/img/product/sidebar_product/5.jpg,public/img/product/sidebar_product/6.jpg,public/img/product/sidebar_product/2.jpg', 'Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which have since evolved into a full ready-to-wear collection in which every item is a vital part of a woman''s wardrobe. The result? Cool, easy, chic looks with youthful elegance and unmistakable signature style. All the beautiful pieces are made in Italy and manufactured with the greatest attention. Now Fashion extends to a range of accessories including shoes, hats, belts and more!', 's,m,l', 'red,black', 'jsoncomment', 'something data', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `root` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `root`, `name`, `url`) VALUES
(1, 0, 'women', ''),
(2, 0, 'men', ''),
(3, 0, 'clothing', ''),
(4, 0, 'tops', ''),
(5, 0, 't-shirts', ''),
(6, 0, 'delivery', ''),
(7, 0, 'about us', ''),
(8, 1, 'TOPS', ''),
(9, 1, 'new product', ''),
(10, 1, 'Prodect', ''),
(11, 1, 'best sale month', ''),
(12, 8, 'cài áo', ''),
(13, 8, 'kẹp tóc', ''),
(14, 9, 'dây chuyền', ''),
(15, 9, 'trâm cài', ''),
(16, 10, 'vòng tay', ''),
(17, 10, 'hoa tai', ''),
(18, 3, 'đồng hồ', ''),
(19, 3, 'hoa tai', ''),
(20, 3, 'móc khóa', ''),
(21, 3, 'trâm cài', ''),
(22, 18, 'đồng hồ dây chuyền', ''),
(23, 18, 'đồng hồ quả quýt', '');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_12_24_065352_crate_product_table', 1),
('2015_12_25_043339_create_munu_table', 1),
('2015_12_25_093224_create_slideshow_table', 2),
('2015_12_26_050011_create_news_table', 3),
('2015_12_26_143125_create_tab_category_table', 4),
('2015_12_27_034920_create_detail_product_table', 5),
('2015_12_27_102723_create_category_table', 6),
('2015_12_28_071808_create_ads_table', 7),
('2016_01_05_034315_crate_wishlist_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `view` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `name`, `image`, `description`, `content`, `user`, `view`, `created_at`) VALUES
(1, 'NEM đồng giá từ 199.000 đồng', 'public/img/latest-news/1.jpg', 'Từ 26/12 đến 29/12, NEM đồng giá toàn bộ sản phẩm tại các showroom với mức 199.000 đồng, 259.000 đồng, 399.000 đồng cùng nhiều ưu đãi.', 'Ngày 26/12 trên thế giới là "Ngày tặng quà - Boxing Day". Đây là thời điểm mà mọi người sẽ được nhận những món quà từ người thân của mình. Hòa vào không khí đó, các hãng thời trang trên thế giới cũng thường tri ân khách hàng bằng các chương trình mua sắm khuyến mãi dịp cuối năm.  Nhân dịp này, NEM tung ra chương trình "Big Sale" với những sản phẩm đồng giá 199.000 đồng, 259.000 đồng, 399.000 đồng… và ưu đãi tới 70%. Đây là dịp để bạn sở hữu những chiếc sơ mi, juyp, quần Âu thanh lịch, những chiếc váy đầm sang trọng với mức giá hấp dẫn… Ngoài ra, bạn còn nhận ưu đãi tới 70% cho bộ sưu tập mới của thương hiệu. Bên cạnh đó, khách hàng cũng có thể chọn những sản phẩm trong dòng sơ mi lịch lãm cho nam và NEM Kids cho các bé.   Một số sản phẩm trong chương trình:  polyad  polyad  polyad  polyad  polyad  polyad  polyad  polyad  polyad  polyad', '1', 0, '2015-12-09 00:00:00'),
(2, 'Rạng rỡ đón xuân với trang sức ngọc trai Akoya', 'public/img/latest-news/2.jpg', 'Với hình dạng tròn đều, tươi sáng, màu sắc trung tính ưa nhìn, trang sức ngọc trai Akoya được nhiều người yêu thích và lựa chọn.', 'Với hình dạng tròn đều, tươi sáng, màu sắc trung tính ưa nhìn, trang sức ngọc trai Akoya được nhiều người yêu thích và lựa chọn.\r\nNgọc trai Akoya được nuôi cấy từ loài trai có tên khoa học là Pinctada Martensii Fucata. Đây là loại ngọc trai cổ điển, là biểu tượng truyền thống của sự thanh lịch, vẻ đẹp thuần khiết.\r\n\r\nrang-ro-don-xuan-voi-trang-suc-ngoc-trai-xin-edit\r\nMỹ nhân Hollywood Katherine Heigl là người đam mê trang sức ngọc trai.\r\nAkoya hiện là loại ngọc trai biển nuôi thương mại có kích thước nhỏ nhất, trung bình chỉ 7mm và được thu hoạch với kích cỡ nhỏ từ 3mm đến 10-11mm (rất hiếm). Ngọc trai Akoya phổ biến với hình dạng tròn, màu trung tính nhưng lại sở hữu ánh sắc phong phú. Hầu hết các viên ngọc có màu trắng xám nhẹ với ánh hồng, xanh lá hay bạc, đôi khi, chúng có màu xanh bạc nhưng màu này rất hiếm. Loại ngọc này không có màu đen tự nhiên trừ khi được xử lý màu.\r\n\r\nNgọc trai Akoya được nuôi phổ biến tại Nhật Bản, Thái Lan, Australia và Việt Nam, trong đó tỷ lệ lớn là ở Nhật Bản. Tại Việt Nam, đây cũng là loại ngọc biển được nuôi nhiều và chủ yếu tập trung ở vùng biển Nha Trang.\r\n\r\nrang-ro-don-xuan-voi-trang-suc-ngoc-trai-xin-edit-1\r\nNhững viên ngọc trai Akoya tuyệt hảo được Hoàng Gia Pearl nuôi cấy tại Nha Trang và chế tác thành trang sức.\r\nKhông giống như ngọc trai nước ngọt, Akoya hiếm khi cho ra hơn hai viên ngọc trong một vụ thu hoạch trên một con trai, thời gian nuôi cũng lâu hơn, trung bình từ 3 năm nên chất lượng đảm bảo cả về màu sắc và ánh ngọc. Không chỉ có giá trị cao hơn ngọc trai nước ngọt, Akoya còn được yêu thích bởi sự hòa trộn các yếu tố: kích thước hợp lý, màu sắc dễ sử dụng, hình dạng tròn đều, ánh lung linh, bóng mịn như gương sâu.\r\n\r\nrang-ro-don-xuan-voi-trang-suc-ngoc-trai-xin-edit-2\r\nSở hữu một bộ trang sức ngọc trai để rạng rỡ đón xuân và năm mới an lành.\r\nĐể tìm hiểu vẻ đẹp và khám phá những mẫu trang sức ngọc trai Akoya mới, khách hàng có thể đến Hoàng Gia Pearl - thương hiệu ngọc trai uy tín, dẫn đầu công nghệ nuôi cấy ngọc trai tại Việt Nam với hệ thống nuôi cấy ngọc trai quy mô gần 100ha mặt biển, nuôi cấy hàng chục triệu con trai đang phát triển và tạo ngọc.\r\n\r\nNgọc trai Akoya xuất xứ từ Hoàng Gia Pearl đảm bảo đúng chuẩn quốc tế. Tìm hiểu thêm tại hệ thống showroom trên toàn quốc của công ty hoặc truy cập www.HoangGiaPearl.com để cảm nhận trực tiếp chất lượng ngọc. Hotline hỗ trợ 0909 66 22 31. Tham khảo tại facebook.com/ngoctraihoanggia.', '1', 4, '2015-12-31 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `promotion_price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `icon_status` text COLLATE utf8_unicode_ci NOT NULL,
  `user` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `menuID` int(11) NOT NULL,
  `tab_categoryID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `promotion_price`, `price`, `image`, `quantity`, `status`, `icon_status`, `user`, `view`, `categoryID`, `menuID`, `tab_categoryID`) VALUES
(1, 'đồng hồ đeo tay thời trang', '5000', '10000', 'public/img/product/sale/8.jpg', 5, 'new', 'new', 0, 15, 1, 0, 3),
(2, 'đồng hồ đeo tay thời trang', '5000', '10000', 'public/img/product/sale/8.jpg', 5, 'new', 'new', 0, 0, 1, 0, 3),
(3, 'đồng hồ đeo tay thời trang', '5000', '10000', 'public/img/product/sale/8.jpg', 5, 'new', 'new', 0, 0, 2, 0, 2),
(4, 'đồng hồ đeo tay thời trang', '5000', '10000', 'public/img/product/sale/8.jpg', 5, 'sale', 'sale', 0, 0, 2, 0, 3),
(5, 'giày dép thời trang', '5000', '10000', 'public/img/product/sale/12.jpg', 2, 'featured', 'new', 0, 0, 1, 0, 2),
(6, 'giày dép thời trang', '5000', '10000', 'public/img/product/sale/3.jpg', 5, 'bestseller', 'sale', 0, 0, 2, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `slideshow`
--

CREATE TABLE `slideshow` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `page` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slideshow`
--

INSERT INTO `slideshow` (`id`, `name`, `image`, `content`, `url`, `page`) VALUES
(1, 'BEST THEMES', 'public/img/slider/2.jpg', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod ut laoreet dolore magna aliquam erat volutpat.', '', 'index'),
(2, 'BEST THEMES 1', 'public/img/slider/1.jpg', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod ut laoreet dolore magna aliquam erat volutpat. 2', '', 'index');

-- --------------------------------------------------------

--
-- Table structure for table `tab_category`
--

CREATE TABLE `tab_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tab_category`
--

INSERT INTO `tab_category` (`id`, `name`) VALUES
(1, 'women'),
(2, 'tops'),
(3, 'men');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `date`, `sex`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '1994-11-22', 1, 'admin', 'phanduong@gmail.com', 'admin', NULL, '2016-01-04 20:30:08', '2016-01-04 20:30:08');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(10) UNSIGNED NOT NULL,
  `userID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `userID`, `productID`, `created_at`, `updated_at`) VALUES
(409, 1, 1, '2016-01-05 00:47:12', '2016-01-05 00:47:12'),
(413, 1, 6, '2016-01-06 00:02:08', '2016-01-06 00:02:08'),
(414, 1, 5, '2016-01-06 00:24:02', '2016-01-06 00:24:02'),
(416, 1, 4, '2016-01-07 20:33:54', '2016-01-07 20:33:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detailproduct`
--
ALTER TABLE `detailproduct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slideshow`
--
ALTER TABLE `slideshow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tab_category`
--
ALTER TABLE `tab_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `detailproduct`
--
ALTER TABLE `detailproduct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `slideshow`
--
ALTER TABLE `slideshow`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tab_category`
--
ALTER TABLE `tab_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=417;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
