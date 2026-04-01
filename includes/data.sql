
INSERT INTO City VALUES (1, 'TP. HCM'), (2, 'Hà Nội'), (3, 'Đà Nẵng'), (4, 'Cần Thơ'), (5, 'Huế');

INSERT INTO Ward VALUES (1, 'Bến Nghé', 1), (2, 'Hàng Trống', 2), (3, 'Hải Châu I', 3), (4, 'Ninh Kiều', 4), (5, 'Phú Hội', 5);

INSERT INTO Area VALUES (1, 'KV1', 1), (2, 'KV2', 2), (3, 'KV3', 3), (4, 'KV4', 4), (5, 'KV5', 5);

INSERT INTO Account VALUES 
('admin_01', 'p@ss1', 'Active', '2024-01-01', 'Admin'),
('org_red', 'p@ss2', 'Active', '2024-01-05', 'Organization'),
('donor_an', 'p@ss3', 'Active', '2024-02-10', 'Donor'),
('donor_binh', 'p@ss4', 'Active', '2024-02-15', 'Donor'),
('org_hope', 'p@ss5', 'Active', '2024-03-01', 'Organization');

INSERT INTO CharityOrganization VALUES 
(1, 'Hội Chữ Thập Đỏ', 'L001', 'T001', '0x71...1a', '2024-01-05', 'org_red'),
(2, 'Quỹ Hy Vọng', 'L002', 'T002', '0x82...2b', '2024-03-01', 'org_hope'),
(3, 'Quỹ Trẻ Em', 'L003', 'T003', '0x93...3c', '2024-03-05', 'admin_01'),
(4, 'Tâm Nguyện', 'L004', 'T004', '0xA4...4d', '2024-03-10', 'admin_01'),
(5, 'Ánh Sáng', 'L005', 'T005', '0xB5...5e', '2024-03-15', 'admin_01');

INSERT INTO Donor VALUES 
(1, 'Nguyễn An', '123', '0x11...aa', 'an@m.com', '0901', 'Verified', 'donor_an'),
(2, 'Trần Bình', '987', '0x22...bb', 'bi@m.com', '0907', 'Verified', 'donor_binh'),
(3, 'Lê Cường', '456', '0x33...cc', 'cu@m.com', '0912', 'Pending', NULL),
(4, 'Phạm Đức', '321', '0x44...dd', 'du@m.com', '0987', 'Verified', NULL),
(5, 'Hoàng Thủy', '654', '0x55...ee', 'th@m.com', '0933', 'Verified', NULL);

INSERT INTO CharityCampaign VALUES 
(1, 'Lũ lụt', 'Hỗ trợ vùng lũ', 1000, '2024-04-01', '2024-05-01', 'Ongoing', 1),
(2, 'Trường học', 'Xây trường', 500, '2024-05-10', '2024-08-10', 'Upcoming', 2),
(3, 'Bữa cơm', 'Hỗ trợ nghèo', 200, '2024-01-01', '2024-12-31', 'Ongoing', 1),
(4, 'Mắt sáng', 'Phẫu thuật mắt', 300, '2024-06-01', '2024-07-01', 'Upcoming', 5),
(5, 'Nước sạch', 'Máy lọc nước', 150, '2024-04-15', '2024-06-15', 'Ongoing', 2);

INSERT INTO Donation VALUES 
(1, 10, '2024-04-02', 1, 1),
(2, 5, '2024-04-03', 2, 1),
(3, 2, '2024-01-15', 4, 3),
(4, 1, '2024-04-20', 5, 5),
(5, 0.5, '2024-04-21', 1, 3);

INSERT INTO Product VALUES (1, 'Gạo', 'Tấn'), (2, 'Mì', 'Thùng'), (3, 'Nước', 'Thùng'), (4, 'Dầu', 'Chai'), (5, 'Sách', 'Bộ');

INSERT INTO Shop VALUES (1, 'Shop A', 1), (2, 'Shop B', 2), (3, 'Shop C', 3), (4, 'Shop D', 4), (5, 'Shop E', 5);

INSERT INTO ProductDetail VALUES (1, 1), (2, 1), (2, 2), (3, 5), (5, 4);

INSERT INTO Beneficiary VALUES 
(1, 'Nam', '111', '0xAA...11', 1),
(2, 'Hoa', '222', '0xBB...22', 2),
(3, 'Quang', '333', '0xCC...33', 3),
(4, 'Hà', '444', '0xDD...44', 4),
(5, 'Tùng', '555', '0xEE...55', 5);

INSERT INTO FundAllocation VALUES 
(1, 50, '2024-04-10', 1, 1),
(2, 50, '2024-04-10', 1, 2),
(3, 10, '2024-01-20', 3, 3),
(4, 30, '2024-04-25', 5, 4),
(5, 5, '2024-02-01', 3, 5);

INSERT INTO PurchaseSlip VALUES 
(1, '2024-04-12', 45, 'Mua gạo', 1),
(2, '2024-04-12', 45, 'Mua mì', 2),
(3, '2024-01-22', 9, 'Thực phẩm', 3),
(4, '2024-04-26', 28, 'Máy lọc', 4),
(5, '2024-02-05', 4.5, 'Nhu yếu phẩm', 5);

INSERT INTO PurchaseOrderDetails VALUES 
(1, 2, 20, 40, 1, 1),
(2, 500, 0.09, 45, 2, 2),
(3, 100, 0.09, 9, 3, 2),
(4, 10, 2.8, 28, 4, 3),
(5, 50, 0.09, 4.5, 5, 2);

INSERT INTO DeliveryNote VALUES 
(1, '2024-04-15', 'Giao đợt 1', 1),
(2, '2024-04-15', 'Giao đợt 1', 2),
(3, '2024-01-25', 'Tại phường', 3),
(4, '2024-04-28', 'Tận nơi', 4),
(5, '2024-02-10', 'Nhà văn hóa', 5);

INSERT INTO DetectionDetails VALUES (1, 1, 1, 1), (2, 250, 2, 2), (3, 100, 3, 3), (4, 10, 4, 4), (5, 50, 5, 5);

INSERT INTO Proof VALUES 
(1, 'Image', 'Ảnh quà', 'QmX', 'http://i1', 's01', '10,106', '2024-04-15', 1),
(2, 'Video', 'Video', 'QmZ', 'http://i2', 's02', '10,106', '2024-04-15', 2),
(3, 'Doc', 'Biên bản', 'QmY', 'http://i3', 's03', '21,105', '2024-01-25', 3),
(4, 'Image', 'Ảnh máy', 'QmW', 'http://i4', 's04', '10,105', '2024-04-28', 4),
(5, 'Image', 'Ảnh cơm', 'QmA', 'http://i5', 's05', '16,108', '2024-02-10', 5);

INSERT INTO Verification VALUES 
(1, 'NV', 'v01', 'Verified', 1),
(2, 'TC', 'v02', 'Verified', 2),
(3, 'UB', 'v03', 'Verified', 3),
(4, 'KT', 'v04', 'Verified', 4),
(5, 'TV', 'v05', 'Pending', 5);

