-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th7 20, 2022 lúc 04:07 PM
-- Phiên bản máy phục vụ: 8.0.29
-- Phiên bản PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `medical`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `temp_user`
--

CREATE TABLE `temp_user` (
  `id` int NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone_number` varchar(40) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone_number` varchar(40) DEFAULT NULL,
  `is_admin` tinyint DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `fullname`, `address`, `phone_number`, `is_admin`, `created`, `modified`) VALUES
(3, 'dochu4@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'Chu Thành Đô', 'Long Bien, Ha Noi, Viet Nam', '0354324599', 1, '2022-05-20 03:11:26', '2022-05-20 03:11:26'),
(11, 'dochu8@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Chu Do', 'Long Bien, Ha Noi, Viet Nam', '0354324599', NULL, '2022-05-22 17:27:16', '2022-05-22 17:27:16'),
(14, 'dochu2@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Chu Do', 'Long Bien, Ha Noi, Viet Nam', '0', NULL, '2022-06-07 17:01:33', '2022-06-07 17:01:33'),
(15, 'dochu12@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Chu Do', 'Long Bien, Ha Noi, Viet Nam', '0', NULL, '2022-07-02 14:11:08', '2022-07-02 14:11:08'),
(16, 'dochu1@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Chu Do', 'Long Bien, Ha Noi, Viet Nam', '0', NULL, '2022-07-02 14:20:35', '2022-07-02 14:20:35'),
(17, 'dochu3@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Chu Do', 'Long Bien, Ha Noi, Viet Nam', '0354324599', NULL, '2022-07-07 15:24:00', '2022-07-07 15:24:00'),
(20, 'dochu88@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Chu Do', 'Long Bien, Ha Noi, Viet Nam', '0354324599', 0, '2022-07-09 08:56:16', '2022-07-09 08:56:16'),
(21, 'dochu86@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Chu Do', 'Long Bien, Ha Noi, Viet Nam', '123', 1, '2022-07-13 10:35:21', '2022-07-13 10:35:21'),
(22, 'dochu22@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Chu Do', 'Long Bien, Ha Noi, Viet Nam', '0354324599', 0, '2022-07-13 12:54:27', '2022-07-13 12:54:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_buy_log`
--

CREATE TABLE `wp_buy_log` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `medicine_id` int DEFAULT NULL,
  `tool_id` int DEFAULT NULL,
  `price` varchar(20) DEFAULT NULL,
  `number` smallint DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `total_price` bigint UNSIGNED DEFAULT NULL,
  `transport` varchar(50) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Đang đổ dữ liệu cho bảng `wp_buy_log`
--

INSERT INTO `wp_buy_log` (`id`, `user_id`, `medicine_id`, `tool_id`, `price`, `number`, `created`, `total_price`, `transport`, `code`) VALUES
(3, 3, 9, 0, '550000', 1, '2022-07-20 14:07:43', 550000, 'Express', '59'),
(4, 3, 12, 0, '150000', 1, '2022-07-20 14:09:02', 150000, 'Express', 'VMLJ0'),
(5, 3, 12, 0, '150000', 1, '2022-07-20 14:09:53', 150000, 'Express', 'BFB1L'),
(6, 3, 9, 0, '550000', 1, '2022-07-20 14:11:15', 550000, 'Express', 'J5J7K'),
(7, 3, 12, 0, '150000', 1, '2022-07-20 14:15:41', 150000, 'Express', 'RBC23'),
(8, 3, 12, 0, '150000', 1, '2022-07-20 14:18:18', 150000, 'Express', '9D1AN'),
(9, 3, 12, 0, '150000', 2, '2022-07-20 14:20:34', 300000, 'Express', '0EJRE'),
(10, 3, 0, 6, '1050000', 1, '2022-07-20 14:20:34', 1050000, 'Express', '0EJRE'),
(11, 3, 9, 0, '550000', 1, '2022-07-20 14:22:09', 550000, 'Express', 'SNA5U'),
(12, 3, 9, 0, '550000', 2, '2022-07-20 14:23:49', 1100000, 'Express', '85VHQ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_manufacturer`
--

CREATE TABLE `wp_manufacturer` (
  `id` int NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(12) CHARACTER SET utf8mb3 COLLATE utf8_general_ci DEFAULT NULL,
  `specialization` varchar(50) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Đang đổ dữ liệu cho bảng `wp_manufacturer`
--

INSERT INTO `wp_manufacturer` (`id`, `name`, `address`, `phone`, `specialization`, `created`, `modified`) VALUES
(4, 'Chu Do', 'Long Bien, Ha Noi, Viet Nam', '0354324599', '123', '2022-05-14 15:37:14', '2022-05-14 15:37:14'),
(5, 'Chu Do', 'Long Bien, Ha Noi, Viet Nam', '0354324599', '123', '2022-05-21 16:12:38', '2022-05-21 16:12:38'),
(6, '12321', 'Long Bien, Ha Noi, Viet Nam', '0354324599', '123', '2022-05-21 16:12:42', '2022-05-21 16:12:42'),
(7, 'Phamacy', 'Thanh Xuan, Ha Noi, Viet Nam', '0975346789', '123', '2022-07-19 16:12:42', '2022-07-19 16:12:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_medicine`
--

CREATE TABLE `wp_medicine` (
  `id` int NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `price` int DEFAULT NULL,
  `remain_number` int NOT NULL,
  `bought_number` int DEFAULT '0',
  `type` varchar(50) DEFAULT NULL,
  `HSD` int DEFAULT NULL,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8_general_ci,
  `manual` text CHARACTER SET utf8mb3 COLLATE utf8_general_ci,
  `described` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `manufacturer_id` tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Đang đổ dữ liệu cho bảng `wp_medicine`
--

INSERT INTO `wp_medicine` (`id`, `name`, `price`, `remain_number`, `bought_number`, `type`, `HSD`, `description`, `manual`, `described`, `created`, `modified`, `manufacturer_id`) VALUES
(1, 'Humasis COVID-19 Ag Home Test Kit', 450000, 108, 12, '22', 18, 'Hộp 5 test, gồm:\r\n\r\nKhay thử, đựng riêng trong túi: 5 khay\r\nỐng nghiệm dùng 1 lần chứa dung dịch đệm chiết mẫu: 5 ống\r\nNắp lọc: 5 cái\r\nTăm bông tiệt trùng để lấy mẫu xét nghiệm: 5 cái\r\n\r\nHoạt chất\r\n• Kháng thể đơn dòng kháng SARS-CoV-2Nucleocapsid\r\n• Kháng thể đơn dòng đặc hiệu với RBD SpikeProtein của SARS-CoV-2\r\n• Kháng thể dê kháng IgG chuột\r\n\r\n', 'Khuyến cáo trước khi dùng\r\n- Đọc kĩ hướng dẫn sử dụng và thực hiện đúng theo từng bước ở phần hướng dẫn chi tiết\r\n- Rửa tay thật kĩ trước khi sử dụng bộ xét nghiệm\r\n- Nếu bộ xét nghiệm được giữ lạnh, để ở nhiệt độ phòng 30 phút trước khi sử dụng\r\n- Nếu người sử dụng từ 3-14 tuổi, phải có sự giám sát của người giám hộ.\r\n\r\nLấy mẫu\r\n1) Sử dụng tăm bông được cung cấp trong bộ xét nghiệm để lấy mẫu dịch ngoáy mũi.\r\n2) Đưa tăm bông vào lỗ mũi trái đến khoảng 2cm và chà mạnh vào thành mũi theo chuyển động tròn 5 lần hoặc ít nhất 15 giây. Tiến hành làm tương tự cho lỗ mũi bên phải với cùng một cây tăm bông.\r\n*Sau khi lấy mẫu, nên xét nghiệm ngay để có kết quả chính xác nhất.', 'Thử covid', '2022-07-05 08:54:27', '2022-07-05 08:54:27', 4),
(2, 'blue dose', 123123, 126, 16, '22', 13, 'ádasd', 'ádasd', NULL, '2022-07-06 08:58:05', '2022-07-06 08:58:05', 5),
(3, 'Panadol Extra', 25000, 250, 20, '23', 24, ' Caffeine, Paracetamol', 'Uống trực tiếp theo HDSD', 'thuốc được dùng để điều trị hầu hết các triệu chứng đau từ nhẹ đến trung bình và hạ sốt.', '2022-07-20 13:24:50', '2022-07-20 13:24:50', 7),
(4, 'Viên Sủi Optimax', 120000, 200, 10, '24', 24, 'Vitamin C, Vitamin D, Kẽm', 'Hòa tan với nước', 'giúp bổ sung vitamin C, vitamin D, kẽm và mangan cho cơ thể, giúp tăng cường sức đề kháng', '2022-07-20 13:25:02', '2022-07-20 13:25:02', 7),
(5, 'Hoạt huyết dưỡng não', 150000, 99, 21, '25', 24, 'Nattokinase, Cao bạch quả, Đương quy', 'Uống theo đơn ', 'giúp hoạt huyết, tăng cường tuần hoàn não, hỗ trợ giảm nguy cơ hình thành cục máu đông,\r\nhỗ trợ làm giảm các triệu chứng: khó ngủ, mất ngủ, đau đầu, chóng mặt,\r\nsuy giảm trí nhớ, đau mỏi vai gáy, hội chứng tiền đình \r\ndo thiểu năng tuần hoàn não.', '2022-07-20 13:25:14', '2022-07-20 13:25:14', 7),
(6, 'Viên Uống Maxpremum Naga Plus', 155000, 200, 30, '25', 24, 'Acerola, DHA, Calcium, Vitamin các loại', 'Uống sau bữa ăn', 'Giúp tăng cường sức khỏe và sức đề kháng cho cơ thể.', '2022-07-20 13:25:31', '2022-07-20 13:25:31', 7),
(7, 'Thuốc Kháng Sinh Augtipha 625Mg', 200000, 148, 27, '26', 24, 'Amoxicillin, Clavulanic acid', 'Dùng theo chỉ định của bác sĩ', 'thuốc dùng để trị nhiễm khuẩn', '2022-07-20 13:25:45', '2022-07-20 13:25:45', 7),
(8, 'Thuốc Kháng Sinh Zinnat 500Mg', 175000, 125, 16, '26', 24, 'Cefuroxime', 'Dùng theo chỉ định của bác sĩ', 'thuốc dùng để điều trị những nhiễm khuẩn do vi khuẩn nhạy cảm gây ra', '2022-07-20 13:26:02', '2022-07-20 13:26:02', 7),
(9, 'Đông Trùng Hạ Thảo Pure Cordyceps', 550000, 244, 56, '25', 24, 'Đông trùng hạ thảo', 'Uống theo HDSD', 'tăng cường sức đề kháng, của cơ thể, giúp cơ thể khỏe mạnh.', '2022-07-20 13:26:14', '2022-07-20 13:26:14', 7),
(10, 'Dung Dịch Uống Calcium Corbiere', 200000, 220, 30, '24', 24, 'Canxi gluconat, Canxi lactate', 'Pha loãng với nước để sử dụng', 'bổ sung canxi trong hỗ trợ điều trị loãng xương, tình trạng thiếu canxi,\r\nđặc biệt trong các trường hợp có nhu cầu canxi cao', '2022-07-20 13:26:31', '2022-07-20 13:26:31', 7),
(11, 'Viên Ngậm Dorithricin Hyphens', 50000, 100, 10, '26', 24, 'Tyrothricin, Benzalkonium, Benzocaine', 'Ngậm để viên thuốc tan từ từ trong miệng.', 'điều trị các triệu chứng nhiễm khuẩn miệng - họng như đau họng, nuốt khó', '2022-07-20 13:26:46', '2022-07-20 13:26:46', 7),
(12, 'Thuốc Deslotid Opv', 150000, 93, 107, '25', 24, 'Desloratadine', 'Pha loãng với nước để sử dụng', 'thuốc dùng để điều trị viêm mũi dị ứng: Sổ mũi, hắt hơi, nghẹt mũi, ngứa mũi họng và ngứa, chảy nước mắt', '2022-07-20 13:27:01', '2022-07-20 13:27:01', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_medicine_type_s`
--

CREATE TABLE `wp_medicine_type_s` (
  `id` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8_general_ci DEFAULT NULL,
  `support` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Đang đổ dữ liệu cho bảng `wp_medicine_type_s`
--

INSERT INTO `wp_medicine_type_s` (`id`, `name`, `support`, `created`, `modified`) VALUES
(13, 'as', 'as', '2022-05-12 15:06:37', '2022-05-12 15:06:37'),
(17, 'asd', 'sad', '2022-05-12 15:40:03', '2022-05-12 15:40:03'),
(18, 'a', 'asd', '2022-05-12 15:41:53', '2022-05-12 15:41:53'),
(19, 'asd', 'asd', '2022-05-12 15:52:02', '2022-05-12 15:52:02'),
(20, 'asasdasd', 'asd', '2022-05-12 15:52:08', '2022-05-12 15:52:08'),
(21, '11', 'sadaf', '2022-05-13 04:28:06', '2022-05-13 04:28:06'),
(22, 'Bộ test thử nghiệm covid', 'Miệng, Mũi', '2022-06-16 07:30:21', '2022-06-16 07:30:21'),
(23, 'Thuốc giảm đau và hạ sốt', 'Giảm đau và hạ sốt', '2022-07-19 07:30:21', '2022-07-19 07:30:21'),
(24, 'Hỗ trợ miễn dịch', 'Tăng sức đề kháng', '2022-07-19 07:30:21', '2022-07-19 07:30:21'),
(25, 'Thực phẩm chức năng', 'Tăng cường sức khỏe', '2022-07-19 07:30:21', '2022-07-19 07:30:21'),
(26, 'Thuốc kháng sinh', 'Điều trị viêm, nhiễm', '2022-07-19 07:30:21', '2022-07-19 07:30:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_tool`
--

CREATE TABLE `wp_tool` (
  `id` int NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `price` int DEFAULT NULL,
  `remain_number` int NOT NULL,
  `bought_number` int NOT NULL,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8_general_ci,
  `manual` text,
  `described` text CHARACTER SET utf8mb3 COLLATE utf8_general_ci,
  `manufacturer_id` tinyint DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Đang đổ dữ liệu cho bảng `wp_tool`
--

INSERT INTO `wp_tool` (`id`, `name`, `price`, `remain_number`, `bought_number`, `description`, `manual`, `described`, `manufacturer_id`, `created`, `modified`) VALUES
(1, 'Máy Xông Khí Dung Microlife Neb200', 1050000, 11, 2, 'Phụ kiện máy bao gồm: 2 mask (người lớn và trẻ em), 1 cốc đựng thuốc, 1 càng xông họng, 1 càng xông mũi, 3 miếng lọc khí, dây dẫn khí, sách hướng dẫn sử dụng, phiếu bảo hành sản phẩm.', 'Nên làm sạch tất cả các thành phần của thiết bị trong lần lắp đặt đầu tiên:\r\n\r\nLắp ráp bộ phận máy phun sương. Đảm bảo rằng tất cả các bộ phận đã hoàn thành.\r\nĐổ đầy dung dịch hít vào máy phun sương theo hướng dẫn của bác sĩ. Đảm bảo rằng bạn không vượt quá mức tối đa.\r\nKết nối máy phun sương qua ống dẫn khí với máy nén và cắm cáp vào ổ điện (230V 50Hz AC).\r\nĐể bắt đầu điều trị, đặt nút ON/OFF ở vị trí «l».\r\nỐng xông miệng giúp đưa thuốc đến phổi tốt hơn.\r\n\r\nLựa chọn giữa mặt nạ dành cho người lớn hoặc trẻ em phù hợp, để vừa đủ bao trùm cả mũi và miệng.\r\n\r\nSử dụng các phụ kiện, kể cả ống xông mũi theo chỉ định của bác sĩ.\r\n\r\nTrong suốt quá trình xông, ngồi ở tư thế thoải mái với phần trên cơ thể thẳng đứng, không ngồi dựa lưng vào ghế để đề phòng việc dồn ép khí quản của bạn và làm giảm hiệu quả điều trị. Không nằm khi xông. Dừng quá trình xông nếu bạn cảm thấy có gì không ổn.\r\n\r\nSau khi hoàn thành giai đoạn hít thở mà bác sĩ khuyến nghị, chuyển công tắc ON/OFF sang vị trí «O» để tắt thiết bị và rút phích cắm khỏi ổ cắm.\r\n\r\nXả dung dịch còn lại khỏi máy phun sương và làm sạch thiết bị như mô tả trong phần “Làm sạch và Khử trùng”.\r\n\r\nĐối tượng sử dụng\r\n\r\nSản phẩm dùng cho bệnh nhân viêm mũi, viêm xoang, các bệnh nhân gặp phải vấn đề về đường hô hấp.', 'Máy xông khí dung Microlife NEB200 có các cải tiến về mặt công nghệ giúp người sử dụng dễ dàng hơn trong quá trình phòng và điều trị bệnh liên quan đến đường hô hấp. Sản phẩm được thiết kế nhỏ gọn, chất liệu cao cấp, dễ dàng vận hành và sử dụng, NEB200 đang dần trở thành giải pháp tối ưu trong quá trình phòng và điều trị bệnh.', 4, '2022-06-30 09:53:19', '2022-06-30 09:53:19'),
(2, 'Dung Dịch Xịt Mũi Nasodren Hartington Pharma Hỗ Trợ Điều Trị Viêm Xoang 50Mg', 495000, 100, 22, 'Nasodren chỉ được sử dụng cho mũi.\r\n\r\nLàm theo hướng dẫn bên dưới để trộn các thành phần của sản phẩm trước khi xịt vào mũi.\r\n\r\nCách chuẩn bị dung dịch:\r\n\r\nMở lọ có chứa bột bằng cách vặn nắp ngược chiều kim đồng hồ và tháo nút.\r\nMở chai nhựa chứa chất lỏng (nước) bằng cách bẻ phần trên ra.\r\nĐổ toàn bộ chất lỏng vào lọ với bột.\r\nVặn vòi xịt vào lọ và lắc nhẹ cho đến khi hòa tan hoàn toàn. Chờ cho đến khi không thấy bọt.\r\nTháo nắp bảo vệ khỏi vòi phun.\r\nTrước khi sử dụng lần đầu vào mũi, hãy nhấn vòi xịt 2 - 3 lần, hướng vòi xịt ra xa cơ thể vào không khí, tránh vào mắt.\r\nCách xịt Nasodren:\r\n\r\nGiữ đầu của bạn thẳng đứng; không nghiêng về phía trước hoặc phía sau. Đưa vòi xịt vào lỗ mũi bên phải. Hít vào sâu và nín thở trong thời gian ngắn (3 - 5 giây) và xịt dung dịch vào lỗ mũi bên phải bằng cách nhấn vòi xịt một lần duy nhất. Thở sâu bằng miệng một lần rồi thở bình thường. Không hít vào khi đang xịt dung dịch.\r\nSau đó lặp lại vào lỗ mũi bên trái.\r\nLau sạch vòi phun bằng khăn giấy sạch. Đậy nắp bảo vệ trên vòi phun.', '1 lọ chứa 50 mg bột đông khô thu được từ dịch chiết xuất cây Cyclamen Europaeum\r\n1 chai chứa 5 ml nước\r\n1 vòi phun', 'Dung dịch điều trị viêm xoang mũi Nasodren được chiết xuất tự nhiên 100% từ cây Cyclamen Europaeum. Nasodren là giải pháp điều trị dứt điểm chứng viêm xoang mũi một cách hiệu quả và an toàn, nhanh chóng làm giảm các triệu chứng viêm xoang chỉ trong vòng 7 ngày. ', 5, '2022-07-20 15:26:52', '2022-07-20 15:26:52'),
(3, 'Bình Xịt Mũi Muối Biển Nano Sea Spray Người Lớn Làm Thông Mũi Họng 75Ml', 27000, 5, 30, 'Muối biển đẳng trương (Sodium chloride, Sodium bicarbonate), nano bạc, methol, eucalyptol, potassium Sorbate, nước tinh khiết vừa đủ 75 ml.', 'Ấn nhanh và dứt khoát 2 - 3 lần vòi xịt mỗi lần xịt.\r\n\r\nTrường hợp viêm xoang, viêm mũi họng do nhiễm khuẩn, dị ứng:\r\n\r\nXịt ngày 4 - 6 lần.\r\n\r\nVệ sinh mũi hàng ngày:\r\n\r\nXịt ngày 3 - 4 lần.', 'Xịt Mũi Muối Biển Nano Sea Spray Người Lớn 75 ml giúp làm sạch và thông mũi họng hiệu quả trong các trường hợp: Viêm mũi họng, tắc ngạt mũi, phòng ngừa viêm xoang', 5, '2022-07-20 15:27:11', '2022-07-20 15:27:11'),
(4, 'Bình Xịt Mũi Muối Biển Nano Sea Baby Spray Vệ Sinh, Ngừa Sổ Mũi Cho Bé 75Ml', 27000, 55, 100, 'Muối biển đẳng trương (sodium chloride, Sodium bicarbon-ate), nano bạc, eucalyptol, potassium Sorbate, nước tinh khiết vừa đủ 75ml', 'Ấn nhanh và dứt khoát 2-3 lần vòi xịt mỗi lần xịt.\r\n\r\nBé đang bị các bệnh lý về mũi:\r\n\r\nXịt ngày 4-6 lần.\r\n\r\nVệ sinh mũi hàng ngày:\r\n\r\nXịt ngày 2-3 lần.', 'Xịt Mũi Muối Biển Nano Sea Baby Spray Trẻ Em 75 ml giúp làm sạch và ngừa sổ mũi cho bé, trong các trường hợp như: Chảy nước mũi, tắt ngạt mũi, vệ sinh mũi họng', 5, '2022-07-20 15:27:18', '2022-07-20 15:27:18'),
(5, 'Chai Hít Starbalm Sports Inhaler Giúp Thông Mũi, Hít Thở Sâu 1.1G', 35000, 20, 100, 'Giúp lưu thông đường hô hấp.\r\n\r\nGiúp hít thở sâu hơn, tăng cường trao đổi khí.\r\n\r\nTăng lượng oxi trong máu, giúp bạn phấn chấn và tăng năng suất hoạt động. \r\n\r\nTạo cảm giác nhẹ nhõm, thư thái nhờ sự kết hợp độc đáo của tinh dầu Khuynh Diệp và Bạc Hà', 'Menthol, Eucalyptus oil, Liquid Paraffin, Dementholised Mint Oil, Essential Oils', 'Chai Hít Starbalm Sports Inhaler Novum 1.1g với sự kết hợp giữa mùi hương Khuynh Diệp và Bạc Hà, giúp lưu thông đường hô hấp, giúp bạn hít thở sâu hơn, tăng cường trao đổi khí. Nhờ đó, lượng oxi trong máu được tăng lên, giúp bạn tỉnh táo và tăng năng suất hoạt động', 5, '2022-07-20 15:31:54', '2022-07-20 15:31:54'),
(6, 'Chai Xịt Mũi Kháng Virus Viraleze Giảm Phơi Nhiễm, Bệnh Do Virus 10Ml', 350000, 5, 10, 'Thành phần có trong Bình Xịt Mũi Kháng Virus Viraleze:\r\n\r\nNatri astodrimer\r\nNước tinh khiết\r\nGlycerol\r\nNatri hydroxit\r\nMetyl p – hydroxybenzoat\r\nPropylene glycol\r\nDinatri edetat\r\nCarbomer homopolymer loại B\r\nPropyl p- hydroxybenzoat', 'Mỗi lần xịt vào lỗ mũi theo yêu cầu, tối đa 4 lần mỗi ngày.\r\n\r\nBước 1: Xì mũi nhẹ nhàng để làm thông mũi.\r\n\r\nBước 2: Rửa tay bằng xà phòng và nước rồi lau khô bằng khăn sạch hoặc sử dụng nước rửa tay khô.\r\n\r\nBước 3: Tháo nắp bảo vệ, giữ chai bằng ngón trỏ và ngón giữa ở mỗi bên của chai và ngón cái dưới đáy chai.\r\n\r\nBước 4: Nếu cần, hãy xịt Viraleze một hoặc nhiều lần vào không khí hoặc vào khăn giấy cho đến khi tạo ra một lớp sương mịn.\r\n\r\nBước 5: Đóng một bên lỗ mũi bằng cách ấn vào bên mũi đó, và nhẹ nhàng đưa vòi vào lỗ mũi bên kia.\r\n\r\nBước 6: Giữ bình thẳng đứng, ấn vòi bơm để xả bình xịt trong khi nhẹ nhàng hít vào bằng mũi. Lặp lại bước 5 và 6 cho lỗ mũi còn lại.\r\n\r\nBước 7: Lau vòi bằng khăn giấy sạch và thay nắp bảo vệ sau khi sử dụng.', 'Bình Xịt Mũi Kháng Virus Viraleze 10ml có chứa 1% w/w natri astodrimer, đã được chứng minh trong các nghiên cứu ở phòng thí nghiệm giúp bất hoạt virus đường hô hấp, bao gồm trên 99.9% Coronavirus SARS-CoV-2, virus gây ra COVID-19, giúp giảm phơi nhiễm với mầm bệnh do virus.', 5, '2022-07-20 15:27:49', '2022-07-20 15:27:49'),
(7, 'Nước Muối Sinh Lý Fysoline Gifrer Vệ Sinh Mắt Mũi Cho Bé (20 Ống X 5Ml)', 168000, 30, 100, 'Dung dịch chứa khoảng 0.9g NaCl, polysorbate 80, chiết xuất Thyme, đồng sulfat pentahydrate, glycerol, nước tinh khiết vừa đủ 100ml. Ống đơn liều đóng 5ml.', 'Mở ống bằng cách xoay nắp nhựa.\r\nĐặt trẻ nằm ngang và giữ đầu nghiêng sang một bên. Đưa đầu ống vào lỗ mũi.\r\nBóp nhẹ nhàng thành từng giọt để có được liều cần thiết. Lặp lại quá trình trên với lỗ mũi còn lại nếu cần. Đối với trẻ sơ sinh, bóp nhẹ vào thành ống để dung dịch vào mũi với áp lực nhẹ vừa phải để tránh nguy cơ viêm tai giữa.\r\nĐể trẻ nằm yên một lát rồi cho trẻ ngồi dây. Nâng cao đầu trẻ và lau dịch chảy ra nếu có.', 'Fysoline Septinasal Gifrer là dung dịch rửa mũi dùng trong trường hợp cảm lạnh và sổ mũi do có chứa huyết thanh sinh lý kết hợp với chất làm loãng dịch nhầy, chiết xuất Thyme (giúp kháng khuẩn) và vi lượng đồng cải thiện triệu chứng trong các trường hợp cảm lạnh, viêm mũi, cảm cúm, giúp trẻ dễ thở hơn.', 5, '2022-07-20 15:27:59', '2022-07-20 15:27:59'),
(8, 'Chai Xịt Phun Sương Spray-C Nano Bạc Vệ Sinh Tai (15Ml)', 55000, 30, 60, 'Natri bicarbonat (BP/EP) 1000mg, Nano bạc, Glycerol (USP), Benzalkonium clori, nước cất.', 'Đặt vị trí đầu vòi phun cách cửa ống tai ít nhất 1cm.\r\n\r\nNgười lớn: Ngày dùng 1-2 lần, mỗi lần 3-5 nhát xịt.\r\n\r\nTrẻ em: Ngày dùng ít nhất 3 lần, mỗi lần 3-5 nhát xịt.\r\n\r\nGiữ dung dịch trong ống tai 5-10 phút, nghiêng đầu cho dung dịch chảy ra ngoài ống tai. Sau 3 ngày, nếu ráy tai còn ứ đọng trong ống tai, hãy đưa trẻ tới phòng khám để hút ra.', 'Vệ sinh tai dạng phun sương Spray C Nano Bạc Xịt Vệ Sinh Tai 15Ml giúp làm sạch ráy tai, phục hồi cơ chế tự làm sạch ráy, hết ngứa và ổn định thính giác.', 5, '2022-07-20 15:28:10', '2022-07-20 15:28:10'),
(9, 'Kim Lấy Máu Blood Lancets Greetmed Dùng Cho Máy Đo Đường Huyết 30G', 32000, 30, 30, 'Kim gồm hai phần: Thân bằng nhựa y tế.\r\n\r\nĐầu kim: Bằng kim loại tiệt trùng, được bảo vệ bằng chụp nhựa y tế tiệt trùng.', 'Lắp kim vào bút lấy máu để lấy máu thử đường huyết.\r\n\r\n', 'Kim Lấy Máu Dùng Cho Máy Tiểu Đường Greetmed 30G Hộp 100 Cái được dùng cho các loại bút lấy máu của máy đo đường huyết. Thân kim tròn, được tiệt trùng từng kim, hạn sử dụng lâu dài.', 5, '2022-07-20 15:28:21', '2022-07-20 15:28:21'),
(10, 'Thuốc Xịt Mũi Xisat Làm Sạch, Thông Mũi Cho Người Lớn 75Ml', 29000, 23, 55, 'Nước biển ở độ sâu 450m so với mạch nước biển chứa nhiều khoáng chất, đặc biệt có các nguyên tố vi lượng như Cu2+, Zn2+, tinh dầu bạc hà.\r\n\r\n', 'Xịt 3-5 lần mỗi bên mũi, xịt 3-6 lần mỗi ngày hoặc sử dụng nhiều hơn khi cần thiết.\r\n\r\n', 'Nước biển sâu xịt mũi Xisat 75ml người lớn giúp loại bỏ gỉ mũi, chất nhầy, giúp thông thoáng, dễ thở và tạo cảm giác mát dịu. Sát khuẩn, kháng viêm, phòng ngừa sổ mũi, ngạt mũi và viêm xoang.', 5, '2022-07-20 15:28:30', '2022-07-20 15:28:30'),
(11, 'Dung Dịch Xịt Mũi Stérimar Hegiène Du Nez Bébé Giảm Nghẹt Mũi Cho Bé 50Ml', 93000, 32, 76, 'Stérimar Baby chứa dung dịch nước biển tinh khiết đẳng trương, 100% tự nhiên và không chất bảo quản, giàu nguyên tố khoáng vi lượng có lợi cho mũi như kẽm, đồng, mangan, selenium..., an toàn khi sử dụng.\r\n\r\nDung dịch đẳng trương là dung dịch có nồng độ muối giống như nồng độ muối trong tế bào của cơ thể.\r\n\r\nNước biển 31.82ml, nước tinh khiết vừa đủ 100ml.', 'Xịt một lần đầu tiên để mồi hệ thống.\r\n\r\nĐặt bé nằm xuống và nghiêng đầu bé sang một bên.\r\n\r\nĐưa nhẹ vòi phun vào mũi cho vừa khít.\r\n\r\nXịt dứt khoát Stérimar Baby vào lỗ mũi bên trên.\r\n\r\nĐể dung dịch dư kéo theo chất nhầy chảy xuống, lau sạch mũi cho bé.\r\n\r\nNghiêng đầu bé qua bên kia và lặp lại thao tác này với mũi còn lại.\r\n\r\nTháo rời, rửa sạch vòi phun bằng xà bông, bằng nước sạch và lau khô.\r\n\r\nXịt vào mỗi bên mũi từ 2 đến 6 lần mỗi ngày hoặc nhiều hơn khi cần thiết.', 'Stérimar Baby 50Ml với hệ thống phun sương, giúp làm sạch chất nhầy bên trong mũi bé nhẹ nhàng, tăng cường hàng rào bảo vệ tự nhiên của mũi, giảm ngạt mũi và điều trị nhiều bệnh liên quan đến đường hô hấp.', 5, '2022-07-20 15:28:40', '2022-07-20 15:28:40');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `temp_user`
--
ALTER TABLE `temp_user`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `wp_buy_log`
--
ALTER TABLE `wp_buy_log`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `wp_manufacturer`
--
ALTER TABLE `wp_manufacturer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `wp_medicine`
--
ALTER TABLE `wp_medicine`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `wp_medicine_type_s`
--
ALTER TABLE `wp_medicine_type_s`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `wp_tool`
--
ALTER TABLE `wp_tool`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `temp_user`
--
ALTER TABLE `temp_user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `wp_buy_log`
--
ALTER TABLE `wp_buy_log`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `wp_manufacturer`
--
ALTER TABLE `wp_manufacturer`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `wp_medicine`
--
ALTER TABLE `wp_medicine`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `wp_medicine_type_s`
--
ALTER TABLE `wp_medicine_type_s`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `wp_tool`
--
ALTER TABLE `wp_tool`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
