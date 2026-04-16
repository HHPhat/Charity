-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 16, 2026 lúc 12:36 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `charity`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `account` varchar(50) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`account`, `password`, `status`, `creation_date`, `role`) VALUES
('phat123', '$2y$10$6h0KuoX356kJjt.9aVhiw.XRiHefnBum5QHUM4g6lMKzaW5j1ddI6', 'Active', '2026-04-04 11:46:13', 'Admin'),
('thanh123', '$2y$10$lvHrsTY8PYI.x70mFAKp9.cz0bNvt7.347NYhb12GMrsAYHkJr.lq', 'Active', '2026-04-04 11:35:49', 'Donor'),
('thien123', '$2y$10$I/7h4C3LViGb.y/hnkpzXO9TMCRfzbmJIhV0gkNAIDQocEPu7IGNW', 'Active', '2026-04-04 12:17:12', 'Donor');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `area`
--

CREATE TABLE `area` (
  `id_area` int(11) NOT NULL,
  `name_area` varchar(255) DEFAULT NULL,
  `id_ward` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `area`
--

INSERT INTO `area` (`id_area`, `name_area`, `id_ward`) VALUES
(1, 'KV1', 1),
(2, 'KV2', 2),
(3, 'KV3', 3),
(4, 'KV4', 4),
(5, 'KV5', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `beneficiary`
--

CREATE TABLE `beneficiary` (
  `beneficiary_id` int(11) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `citizen_id` varchar(20) DEFAULT NULL,
  `wallet_address` varchar(255) DEFAULT NULL,
  `id_area` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `beneficiary`
--

INSERT INTO `beneficiary` (`beneficiary_id`, `full_name`, `citizen_id`, `wallet_address`, `id_area`) VALUES
(1, 'Nam', '111', '0xAA...11', 1),
(2, 'Hoa', '222', '0xBB...22', 2),
(3, 'Quang', '333', '0xCC...33', 3),
(4, 'Hà', '444', '0xDD...44', 4),
(5, 'Tùng', '555', '0xEE...55', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `charitycampaign`
--

CREATE TABLE `charitycampaign` (
  `campaign_id` int(11) NOT NULL,
  `campaign_name` varchar(255) DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `target_amount` decimal(18,2) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `org_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `charitycampaign`
--

INSERT INTO `charitycampaign` (`campaign_id`, `campaign_name`, `short_description`, `description`, `target_amount`, `start_date`, `end_date`, `status`, `org_id`) VALUES
(1, 'Lũ lụt', NULL, 'Hỗ trợ vùng lũ', 100000000.00, '2024-04-01 00:00:00', '2024-05-01 00:00:00', 'Ongoing', 1),
(2, 'Trường học', NULL, 'Xây trường', 500.00, '2024-05-10 00:00:00', '2024-08-10 00:00:00', 'Upcoming', 2),
(3, 'Bữa cơm', NULL, 'Hỗ trợ nghèo', 200.00, '2024-01-01 00:00:00', '2024-12-31 00:00:00', 'Ongoing', 1),
(4, 'Mắt sáng', NULL, 'Phẫu thuật mắt', 300.00, '2024-06-01 00:00:00', '2024-07-01 00:00:00', 'Upcoming', 5),
(5, 'Nước sạch', NULL, 'Máy lọc nước', 150.00, '2024-04-15 00:00:00', '2024-06-15 00:00:00', 'Ongoing', 2),
(6, 'Cấp cứu người bị tai nạn giao thông', NULL, 'Tóm tắt:\n1111\n\nChi tiết:\n1111', 100000000.00, '2026-04-07 02:14:38', '2026-08-04 23:59:59', 'ongoing', 1),
(8, 'Cứu trợ đồng bào miền Trung', NULL, 'Tóm tắt:\náefafdasfasf\n\nChi tiết:\nấdfdfsdfsafafafa', 10000000.00, '2026-04-07 02:20:02', '2027-12-12 23:59:59', 'ongoing', 1),
(9, 'Cứu trợ đồng bào miền Trung', NULL, 'Tóm tắt:\náefafdasfasf\n\nChi tiết:\nấdfdfsdfsafafafa', 10000000.00, '2026-04-07 02:20:15', '2027-12-12 23:59:59', 'ongoing', 1),
(10, 'Giúp đỡ Bé Bắp', 'Tóm tắt:\nbé bắp', '\nChi tiết:\nbé bắp bị bênh', 14000000000.00, '2026-04-07 03:20:00', '2028-01-01 23:59:59', 'ongoing', 4),
(11, 'Saving light', 'Tóm tắt:\nánh sáng cứu rỗi', '\nChi tiết:\nádasdfasfasfdsafsaf', 10000000.00, '2026-04-07 03:25:15', '2026-12-12 23:59:59', 'ongoing', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `charityorganization`
--

CREATE TABLE `charityorganization` (
  `org_id` int(11) NOT NULL,
  `org_name` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  `tax_code` varchar(50) DEFAULT NULL,
  `wallet_address` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `account` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

ALTER TABLE `charityorganization`
  ADD PRIMARY KEY (`org_id`),
  ADD KEY `account` (`account`);


ALTER TABLE `charityorganization`
  MODIFY `org_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `charityorganization`
  ADD CONSTRAINT `charityorganization_ibfk_1` FOREIGN KEY (`account`) REFERENCES `account` (`account`);

--
-- Đang đổ dữ liệu cho bảng `charityorganization`
--

INSERT INTO `charityorganization` (`org_id`, `org_name`, `status`, `tax_code`, `wallet_address`, `created_date`, `account`) VALUES
(1, 'Hội Chữ Thập Đỏ', 1, 'T001', '0x71...1a', '2024-01-05 00:00:00', 'phat123'),
(2, 'Quỹ Hy Vọng', 1, 'T002', '0x82...2b', '2024-03-01 00:00:00', 'thanh123'),
(3, 'Quỹ Trẻ Em', 1, 'T003', '0x93...3c', '2024-03-05 00:00:00', 'thien123'),
(4, 'Tâm Nguyện', 1, 'T004', '0xA4...4d', '2024-03-10 00:00:00', 'phat123'),
(5, 'Ánh Sáng', 1, 'T005', '0xB5...5e', '2024-03-15 00:00:00', 'phat123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `city`
--

CREATE TABLE `city` (
  `id_city` int(11) NOT NULL,
  `name_city` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `city`
--

INSERT INTO `city` (`id_city`, `name_city`) VALUES
(1, 'TP. HCM'),
(2, 'Hà Nội'),
(3, 'Đà Nẵng'),
(4, 'Cần Thơ'),
(5, 'Huế');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `deliverynote`
--

CREATE TABLE `deliverynote` (
  `id_dn` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `note` text DEFAULT NULL,
  `id_ps` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `deliverynote`
--

INSERT INTO `deliverynote` (`id_dn`, `date`, `note`, `id_ps`) VALUES
(1, '2024-04-15 00:00:00', 'Giao đợt 1', 1),
(2, '2024-04-15 00:00:00', 'Giao đợt 1', 2),
(3, '2024-01-25 00:00:00', 'Tại phường', 3),
(4, '2024-04-28 00:00:00', 'Tận nơi', 4),
(5, '2024-02-10 00:00:00', 'Nhà văn hóa', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detectiondetails`
--

CREATE TABLE `detectiondetails` (
  `id_dd` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `id_dn` int(11) DEFAULT NULL,
  `beneficiary_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `detectiondetails`
--

INSERT INTO `detectiondetails` (`id_dd`, `quantity`, `id_dn`, `beneficiary_id`) VALUES
(1, 1, 1, 1),
(2, 250, 2, 2),
(3, 100, 3, 3),
(4, 10, 4, 4),
(5, 50, 5, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donation`
--

CREATE TABLE `donation` (
  `donation_id` int(11) NOT NULL,
  `amount` decimal(18,2) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `donation_time` datetime DEFAULT NULL,
  `donor_id` int(11) DEFAULT NULL,
  `campaign_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `donation`
--

INSERT INTO `donation` (`donation_id`, `amount`, `message`, `donation_time`, `donor_id`, `campaign_id`) VALUES
(1, 10.00, NULL, '2024-04-02 00:00:00', 1, 1),
(2, 5.00, NULL, '2024-04-03 00:00:00', 2, 1),
(3, 2.00, NULL, '2024-01-15 00:00:00', 4, 3),
(4, 1.00, NULL, '2024-04-20 00:00:00', 5, 5),
(5, 0.50, NULL, '2024-04-21 00:00:00', 1, 3),
(2108878363, 500000.00, 'aqsdwfasf', '2026-04-06 10:32:05', 2, 5),
(2147483647, 3600000.00, 'bon voyage', '2026-04-05 20:28:02', 2, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donor`
--

CREATE TABLE `donor` (
  `donor_id` int(11) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `citizen_id` varchar(20) DEFAULT NULL,
  `wallet_address` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `verification_status` varchar(50) DEFAULT NULL,
  `account` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `donor`
--

INSERT INTO `donor` (`donor_id`, `full_name`, `citizen_id`, `wallet_address`, `email`, `phone`, `verification_status`, `account`) VALUES
(1, 'Nguyễn Văn Thanh', '3021342134', '', 'thanh@gmail.com', '203525', 'Unverified', 'thanh123'),
(2, 'Huỳnh Hiệp Phát', '111111111', '', 'hiepphat989@gmail.com', '+84706317921', 'Unverified', 'phat123'),
(3, 'Nguyễn Hữu Thiện', '213123131', '', 'thien@gmail.com', '+841214488444', 'Unverified', 'thien123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `fundallocation`
--

CREATE TABLE `fundallocation` (
  `allocation_id` int(11) NOT NULL,
  `amount` decimal(18,2) DEFAULT NULL,
  `allocation_date` datetime DEFAULT NULL,
  `campaign_id` int(11) DEFAULT NULL,
  `beneficiary_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `fundallocation`
--

INSERT INTO `fundallocation` (`allocation_id`, `amount`, `allocation_date`, `campaign_id`, `beneficiary_id`) VALUES
(1, 50.00, '2024-04-10 00:00:00', 1, 1),
(2, 50.00, '2024-04-10 00:00:00', 1, 2),
(3, 10.00, '2024-01-20 00:00:00', 3, 3),
(4, 30.00, '2024-04-25 00:00:00', 5, 4),
(5, 5.00, '2024-02-01 00:00:00', 3, 5),
(6, 100000000.00, '2026-08-04 23:59:59', 6, 1),
(7, 10000000.00, '2027-12-12 23:59:59', 8, 3),
(8, 10000000.00, '2027-12-12 23:59:59', 9, 1),
(9, 14000000000.00, '2028-01-01 23:59:59', 10, 1),
(10, 10000000.00, '2026-12-12 23:59:59', 11, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `nam_product` varchar(255) DEFAULT NULL,
  `unit` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id_product`, `nam_product`, `unit`) VALUES
(1, 'Gạo', 'Tấn'),
(2, 'Mì', 'Thùng'),
(3, 'Nước', 'Thùng'),
(4, 'Dầu', 'Chai'),
(5, 'Sách', 'Bộ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `productdetail`
--

CREATE TABLE `productdetail` (
  `id_product` int(11) NOT NULL,
  `id_shop` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `productdetail`
--

INSERT INTO `productdetail` (`id_product`, `id_shop`) VALUES
(1, 1),
(2, 1),
(2, 2),
(3, 5),
(5, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `proof`
--

CREATE TABLE `proof` (
  `proof_id` int(11) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `ipfs_hash` varchar(255) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `signature` varchar(255) DEFAULT NULL,
  `gps_location` varchar(100) DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL,
  `allocation_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `proof`
--

INSERT INTO `proof` (`proof_id`, `type`, `note`, `ipfs_hash`, `image_url`, `signature`, `gps_location`, `timestamp`, `allocation_id`) VALUES
(1, 'Image', 'Ảnh quà', 'QmX', 'http://i1', 's01', '10,106', '2024-04-15 00:00:00', 1),
(2, 'Video', 'Video', 'QmZ', 'http://i2', 's02', '10,106', '2024-04-15 00:00:00', 2),
(3, 'Doc', 'Biên bản', 'QmY', 'http://i3', 's03', '21,105', '2024-01-25 00:00:00', 3),
(4, 'Image', 'Ảnh máy', 'QmW', 'http://i4', 's04', '10,105', '2024-04-28 00:00:00', 4),
(5, 'Image', 'Ảnh cơm', 'QmA', 'http://i5', 's05', '16,108', '2024-02-10 00:00:00', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `purchaseorderdetails`
--

CREATE TABLE `purchaseorderdetails` (
  `id_pod` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(18,2) DEFAULT NULL,
  `into_money` decimal(18,2) DEFAULT NULL,
  `id_ps` int(11) DEFAULT NULL,
  `id_product` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `purchaseorderdetails`
--

INSERT INTO `purchaseorderdetails` (`id_pod`, `quantity`, `price`, `into_money`, `id_ps`, `id_product`) VALUES
(0, 20, 80000.00, 1600000.00, 6, 2),
(1, 2, 20.00, 40.00, 1, 1),
(2, 500, 0.09, 45.00, 2, 2),
(3, 100, 0.09, 9.00, 3, 2),
(4, 10, 2.80, 28.00, 4, 3),
(5, 50, 0.09, 4.50, 5, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `purchaseslip`
--

CREATE TABLE `purchaseslip` (
  `id_ps` int(11) NOT NULL,
  `purchase_date` datetime DEFAULT NULL,
  `total_amount` decimal(18,2) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `allocation_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `purchaseslip`
--

INSERT INTO `purchaseslip` (`id_ps`, `purchase_date`, `total_amount`, `note`, `allocation_id`) VALUES
(1, '2024-04-12 00:00:00', 45.00, 'Mua gạo', 1),
(2, '2024-04-12 00:00:00', 45.00, 'Mua mì', 2),
(3, '2024-01-22 00:00:00', 9.00, 'Thực phẩm', 3),
(4, '2024-04-26 00:00:00', 28.00, 'Máy lọc', 4),
(5, '2024-02-05 00:00:00', 4.50, 'Nhu yếu phẩm', 5),
(6, '2026-04-06 21:20:08', 1600000.00, 'Shop ID [5] - .', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shop`
--

CREATE TABLE `shop` (
  `id_shop` int(11) NOT NULL,
  `name_shop` varchar(255) DEFAULT NULL,
  `id_area` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `shop`
--

INSERT INTO `shop` (`id_shop`, `name_shop`, `id_area`) VALUES
(1, 'Shop A', 1),
(2, 'Shop B', 2),
(3, 'Shop C', 3),
(4, 'Shop D', 4),
(5, 'Shop E', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `verification`
--

CREATE TABLE `verification` (
  `verification_id` int(11) NOT NULL,
  `verifier` varchar(255) DEFAULT NULL,
  `signature` varchar(255) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `proof_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `verification`
--

INSERT INTO `verification` (`verification_id`, `verifier`, `signature`, `status`, `proof_id`) VALUES
(1, 'NV', 'v01', 'Verified', 1),
(2, 'TC', 'v02', 'Verified', 2),
(3, 'UB', 'v03', 'Verified', 3),
(4, 'KT', 'v04', 'Verified', 4),
(5, 'TV', 'v05', 'Pending', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ward`
--

CREATE TABLE `ward` (
  `id_ward` int(11) NOT NULL,
  `name_ward` varchar(255) DEFAULT NULL,
  `id_city` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `ward`
--

INSERT INTO `ward` (`id_ward`, `name_ward`, `id_city`) VALUES
(1, 'Bến Nghé', 1),
(2, 'Hàng Trống', 2),
(3, 'Hải Châu I', 3),
(4, 'Ninh Kiều', 4),
(5, 'Phú Hội', 5);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account`);

--
-- Chỉ mục cho bảng `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id_area`),
  ADD KEY `id_ward` (`id_ward`);

--
-- Chỉ mục cho bảng `beneficiary`
--
ALTER TABLE `beneficiary`
  ADD PRIMARY KEY (`beneficiary_id`),
  ADD KEY `id_area` (`id_area`);

--
-- Chỉ mục cho bảng `charitycampaign`
--
ALTER TABLE `charitycampaign`
  ADD PRIMARY KEY (`campaign_id`),
  ADD KEY `org_id` (`org_id`);

--
-- Chỉ mục cho bảng `charityorganization`
--

--
-- Chỉ mục cho bảng `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id_city`);

--
-- Chỉ mục cho bảng `deliverynote`
--
ALTER TABLE `deliverynote`
  ADD PRIMARY KEY (`id_dn`),
  ADD KEY `id_ps` (`id_ps`);

--
-- Chỉ mục cho bảng `detectiondetails`
--
ALTER TABLE `detectiondetails`
  ADD PRIMARY KEY (`id_dd`),
  ADD KEY `id_dn` (`id_dn`),
  ADD KEY `beneficiary_id` (`beneficiary_id`);

--
-- Chỉ mục cho bảng `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`donation_id`),
  ADD KEY `donor_id` (`donor_id`),
  ADD KEY `campaign_id` (`campaign_id`);

--
-- Chỉ mục cho bảng `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`donor_id`),
  ADD KEY `account` (`account`);

--
-- Chỉ mục cho bảng `fundallocation`
--
ALTER TABLE `fundallocation`
  ADD PRIMARY KEY (`allocation_id`),
  ADD KEY `campaign_id` (`campaign_id`),
  ADD KEY `beneficiary_id` (`beneficiary_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`);

--
-- Chỉ mục cho bảng `productdetail`
--
ALTER TABLE `productdetail`
  ADD PRIMARY KEY (`id_product`,`id_shop`),
  ADD KEY `id_shop` (`id_shop`);

--
-- Chỉ mục cho bảng `proof`
--
ALTER TABLE `proof`
  ADD PRIMARY KEY (`proof_id`),
  ADD KEY `allocation_id` (`allocation_id`);

--
-- Chỉ mục cho bảng `purchaseorderdetails`
--
ALTER TABLE `purchaseorderdetails`
  ADD PRIMARY KEY (`id_pod`),
  ADD KEY `id_ps` (`id_ps`),
  ADD KEY `id_product` (`id_product`);

--
-- Chỉ mục cho bảng `purchaseslip`
--
ALTER TABLE `purchaseslip`
  ADD PRIMARY KEY (`id_ps`),
  ADD KEY `allocation_id` (`allocation_id`);

--
-- Chỉ mục cho bảng `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id_shop`),
  ADD KEY `id_area` (`id_area`);

--
-- Chỉ mục cho bảng `verification`
--
ALTER TABLE `verification`
  ADD PRIMARY KEY (`verification_id`),
  ADD KEY `proof_id` (`proof_id`);

--
-- Chỉ mục cho bảng `ward`
--
ALTER TABLE `ward`
  ADD PRIMARY KEY (`id_ward`),
  ADD KEY `id_city` (`id_city`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `charitycampaign`
--
ALTER TABLE `charitycampaign`
  MODIFY `campaign_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `charityorganization`
--

--
-- AUTO_INCREMENT cho bảng `donation`
--
ALTER TABLE `donation`
  MODIFY `donation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT cho bảng `fundallocation`
--
ALTER TABLE `fundallocation`
  MODIFY `allocation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `purchaseslip`
--
ALTER TABLE `purchaseslip`
  MODIFY `id_ps` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `shop`
--
ALTER TABLE `shop`
  MODIFY `id_shop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `area`
--
ALTER TABLE `area`
  ADD CONSTRAINT `area_ibfk_1` FOREIGN KEY (`id_ward`) REFERENCES `ward` (`id_ward`);

--
-- Các ràng buộc cho bảng `beneficiary`
--
ALTER TABLE `beneficiary`
  ADD CONSTRAINT `beneficiary_ibfk_1` FOREIGN KEY (`id_area`) REFERENCES `area` (`id_area`);

--
-- Các ràng buộc cho bảng `charitycampaign`
--
ALTER TABLE `charitycampaign`
  ADD CONSTRAINT `charitycampaign_ibfk_1` FOREIGN KEY (`org_id`) REFERENCES `charityorganization` (`org_id`);

--
-- Các ràng buộc cho bảng `charityorganization`
--

--
-- Các ràng buộc cho bảng `deliverynote`
--
ALTER TABLE `deliverynote`
  ADD CONSTRAINT `deliverynote_ibfk_1` FOREIGN KEY (`id_ps`) REFERENCES `purchaseslip` (`id_ps`);

--
-- Các ràng buộc cho bảng `detectiondetails`
--
ALTER TABLE `detectiondetails`
  ADD CONSTRAINT `detectiondetails_ibfk_1` FOREIGN KEY (`id_dn`) REFERENCES `deliverynote` (`id_dn`),
  ADD CONSTRAINT `detectiondetails_ibfk_2` FOREIGN KEY (`beneficiary_id`) REFERENCES `beneficiary` (`beneficiary_id`);

--
-- Các ràng buộc cho bảng `donation`
--
ALTER TABLE `donation`
  ADD CONSTRAINT `donation_ibfk_1` FOREIGN KEY (`donor_id`) REFERENCES `donor` (`donor_id`),
  ADD CONSTRAINT `donation_ibfk_2` FOREIGN KEY (`campaign_id`) REFERENCES `charitycampaign` (`campaign_id`);

--
-- Các ràng buộc cho bảng `donor`
--
ALTER TABLE `donor`
  ADD CONSTRAINT `donor_ibfk_1` FOREIGN KEY (`account`) REFERENCES `account` (`account`);

--
-- Các ràng buộc cho bảng `fundallocation`
--
ALTER TABLE `fundallocation`
  ADD CONSTRAINT `fundallocation_ibfk_1` FOREIGN KEY (`campaign_id`) REFERENCES `charitycampaign` (`campaign_id`),
  ADD CONSTRAINT `fundallocation_ibfk_2` FOREIGN KEY (`beneficiary_id`) REFERENCES `beneficiary` (`beneficiary_id`);

--
-- Các ràng buộc cho bảng `productdetail`
--
ALTER TABLE `productdetail`
  ADD CONSTRAINT `productdetail_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`),
  ADD CONSTRAINT `productdetail_ibfk_2` FOREIGN KEY (`id_shop`) REFERENCES `shop` (`id_shop`);

--
-- Các ràng buộc cho bảng `proof`
--
ALTER TABLE `proof`
  ADD CONSTRAINT `proof_ibfk_1` FOREIGN KEY (`allocation_id`) REFERENCES `fundallocation` (`allocation_id`);

--
-- Các ràng buộc cho bảng `purchaseorderdetails`
--
ALTER TABLE `purchaseorderdetails`
  ADD CONSTRAINT `purchaseorderdetails_ibfk_1` FOREIGN KEY (`id_ps`) REFERENCES `purchaseslip` (`id_ps`),
  ADD CONSTRAINT `purchaseorderdetails_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`);

--
-- Các ràng buộc cho bảng `purchaseslip`
--
ALTER TABLE `purchaseslip`
  ADD CONSTRAINT `purchaseslip_ibfk_1` FOREIGN KEY (`allocation_id`) REFERENCES `fundallocation` (`allocation_id`);

--
-- Các ràng buộc cho bảng `shop`
--
ALTER TABLE `shop`
  ADD CONSTRAINT `shop_ibfk_1` FOREIGN KEY (`id_area`) REFERENCES `area` (`id_area`);

--
-- Các ràng buộc cho bảng `verification`
--
ALTER TABLE `verification`
  ADD CONSTRAINT `verification_ibfk_1` FOREIGN KEY (`proof_id`) REFERENCES `proof` (`proof_id`);

--
-- Các ràng buộc cho bảng `ward`
--
ALTER TABLE `ward`
  ADD CONSTRAINT `ward_ibfk_1` FOREIGN KEY (`id_city`) REFERENCES `city` (`id_city`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
