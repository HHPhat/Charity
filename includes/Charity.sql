--1. Nhóm quản lý Địa điểm (Location)
CREATE TABLE City (
    id_city INT PRIMARY KEY,
    name_city VARCHAR(255)
);

CREATE TABLE Ward (
    id_ward INT PRIMARY KEY,
    name_ward VARCHAR(255),
    id_city INT,
    FOREIGN KEY (id_city) REFERENCES City(id_city)
);

CREATE TABLE Area (
    id_area INT PRIMARY KEY,
    name_area VARCHAR(255),
    id_ward INT,
    FOREIGN KEY (id_ward) REFERENCES Ward(id_ward)
);
--2. Nhóm Tài khoản và Tổ chức (Users & Orgs)
CREATE TABLE Account (
    account VARCHAR(50) PRIMARY KEY,
    password VARCHAR(255),
    status VARCHAR(50),
    creation_date DATETIME,
    role VARCHAR(50)
);

CREATE TABLE CharityOrganization (
    org_id INT PRIMARY KEY,
    org_name VARCHAR(255),
    license VARCHAR(255),
    tax_code VARCHAR(50),
    wallet_address VARCHAR(255),
    created_date DATETIME,
    account VARCHAR(50),
    FOREIGN KEY (account) REFERENCES Account(account)
);

CREATE TABLE Donor (
    donor_id INT PRIMARY KEY,
    full_name VARCHAR(255),
    citizen_id VARCHAR(20),
    wallet_address VARCHAR(255),
    email VARCHAR(100),
    phone VARCHAR(20),
    verification_status VARCHAR(50),
    account VARCHAR(50),
    FOREIGN KEY (account) REFERENCES Account(account)
);
--3. Nhóm Chiến dịch và Quyên góp (Campaigns & Donations)
CREATE TABLE CharityCampaign (
    campaign_id INT PRIMARY KEY,
    campaign_name VARCHAR(255),
    description TEXT,
    target_amount DECIMAL(18, 2),
    start_date DATETIME,
    end_date DATETIME,
    status VARCHAR(50),
    org_id INT,
    FOREIGN KEY (org_id) REFERENCES CharityOrganization(org_id)
);

CREATE TABLE Donation (
    donation_id INT PRIMARY KEY,
    amount DECIMAL(18, 2),
    donation_time DATETIME,
    donor_id INT,
    campaign_id INT,
    FOREIGN KEY (donor_id) REFERENCES Donor(donor_id),
    FOREIGN KEY (campaign_id) REFERENCES CharityCampaign(campaign_id)
);
--4. Nhóm Sản phẩm và Cửa hàng (Inventory & Shops)
CREATE TABLE Product (
    id_product INT PRIMARY KEY,
    nam_product VARCHAR(255),
    unit VARCHAR(50)
);

CREATE TABLE Shop (
    id_shop INT PRIMARY KEY,
    name_shop VARCHAR(255),
    id_area INT,
    FOREIGN KEY (id_area) REFERENCES Area(id_area)
);

CREATE TABLE ProductDetail (
    id_product INT,
    id_shop INT,
    PRIMARY KEY (id_product, id_shop),
    FOREIGN KEY (id_product) REFERENCES Product(id_product),
    FOREIGN KEY (id_shop) REFERENCES Shop(id_shop)
);
--5. Nhóm Phân bổ và Giao nhận (Allocation & Delivery)
CREATE TABLE Beneficiary (
    beneficiary_id INT PRIMARY KEY,
    full_name VARCHAR(255),
    citizen_id VARCHAR(20),
    wallet_address VARCHAR(255),
    id_area INT,
    FOREIGN KEY (id_area) REFERENCES Area(id_area)
);

CREATE TABLE FundAllocation (
    allocation_id INT PRIMARY KEY,
    amount DECIMAL(18, 2),
    allocation_date DATETIME,
    campaign_id INT,
    beneficiary_id INT,
    FOREIGN KEY (campaign_id) REFERENCES CharityCampaign(campaign_id),
    FOREIGN KEY (beneficiary_id) REFERENCES Beneficiary(beneficiary_id)
);

CREATE TABLE PurchaseSlip (
    id_ps INT PRIMARY KEY,
    purchase_date DATETIME,
    total_amount DECIMAL(18, 2),
    note TEXT,
    allocation_id INT,
    FOREIGN KEY (allocation_id) REFERENCES FundAllocation(allocation_id)
);

CREATE TABLE PurchaseOrderDetails (
    id_pod INT PRIMARY KEY,
    quantity INT,
    price DECIMAL(18, 2),
    into_money DECIMAL(18, 2),
    id_ps INT,
    id_product INT,
    FOREIGN KEY (id_ps) REFERENCES PurchaseSlip(id_ps),
    FOREIGN KEY (id_product) REFERENCES Product(id_product)
);

CREATE TABLE DeliveryNote (
    id_dn INT PRIMARY KEY,
    date DATETIME,
    note TEXT,
    id_ps INT,
    FOREIGN KEY (id_ps) REFERENCES PurchaseSlip(id_ps)
);

CREATE TABLE DetectionDetails (
    id_dd INT PRIMARY KEY,
    quantity INT,
    id_dn INT,
    beneficiary_id INT,
    FOREIGN KEY (id_dn) REFERENCES DeliveryNote(id_dn),
    FOREIGN KEY (beneficiary_id) REFERENCES Beneficiary(beneficiary_id)
);
--6. Nhóm Xác thực và Minh chứng (Verification & Proof)
CREATE TABLE Proof (
    proof_id INT PRIMARY KEY,
    type VARCHAR(50),
    note TEXT,
    ipfs_hash VARCHAR(255),
    image_url VARCHAR(255),
    signature VARCHAR(255),
    gps_location VARCHAR(100),
    timestamp DATETIME,
    allocation_id INT,
    FOREIGN KEY (allocation_id) REFERENCES FundAllocation(allocation_id)
);

CREATE TABLE Verification (
    verification_id INT PRIMARY KEY,
    verifier VARCHAR(255),
    signature VARCHAR(255),
    status VARCHAR(50),
    proof_id INT,
    FOREIGN KEY (proof_id) REFERENCES Proof(proof_id)
);