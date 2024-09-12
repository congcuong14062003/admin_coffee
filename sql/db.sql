create database ducthimobile;
use ducthimobile;

CREATE TABLE IF NOT EXISTS `User` (
  `UserId` int NOT NULL AUTO_INCREMENT,
  `UserName` varchar(200) NOT NULL,
  `UserPassword` varchar(200) NOT NULL,
  `UserEmail` varchar(200) NOT NULL,
  PRIMARY KEY (`UserId`)
);
create table if not exists `ProductProperty` (
	`ProdPropertyId` int not null AUTO_INCREMENT Primary key,
	`ProdCategoryName` varchar(250) not null,
	`ProdTitle` varchar(250) not null,
    `ProdPropertyName` varchar(250) not null
);
ALTER TABLE `ProductProperty`
ADD INDEX `idx_ProdCategoryName` (`ProdCategoryName`);







-- Chèn các đặc điểm của iPhone
INSERT INTO `ProductProperty` (`ProdCategoryName`, `ProdTitle`, `ProdPropertyName`) VALUES
('iPhone', 'Màu sắc', 'Trắng'),
('iPhone', 'Màu sắc', 'Đen'),
('iPhone', 'Màu sắc', 'Tím'),
('iPhone', 'Màu sắc', 'Gold'),
('iPhone', 'Dung lượng', '32GB'),
('iPhone', 'Dung lượng', '64GB'),
('iPhone', 'Dung lượng', '128GB'),
('iPhone', 'Dung lượng', '256GB');

-- Chèn các đặc điểm của iPad
INSERT INTO `ProductProperty` (`ProdCategoryName`, `ProdTitle`, `ProdPropertyName`) VALUES
('iPad', 'Màu sắc', 'Trắng'),
('iPad', 'Màu sắc', 'Đen'),
('iPad', 'Màu sắc', 'Tím'),
('iPad', 'Dung lượng', '32GB'),
('iPad', 'Dung lượng', '64GB'),
('iPad', 'Dung lượng', '128GB'),
('iPad', 'Dung lượng', '256GB'),
('iPad', 'Dung lượng', '1TB');

-- Chèn các đặc điểm của MacBook
INSERT INTO `ProductProperty` (`ProdCategoryName`, `ProdTitle`, `ProdPropertyName`) VALUES
('Macbook', 'Màu sắc', 'Trắng'),
('Macbook', 'Màu sắc', 'Hồng'),
('Macbook', 'Dung lượng', '8/128GB'),
('Macbook', 'Dung lượng', '8/256GB'),
('Macbook', 'Dung lượng', '8/1TB'),
('Macbook', 'Dung lượng', '16/1TB');

-- Chèn các đặc điểm của Phụ kiện
INSERT INTO `ProductProperty` (`ProdCategoryName`, `ProdTitle`, `ProdPropertyName`) VALUES
('Phụ kiện', 'Màu sắc', 'Đen'),
('Phụ kiện', 'Màu sắc', 'Bạc'),
('Phụ kiện', 'Màu sắc', 'Vàng'),
('Phụ kiện', 'Màu sắc', 'Bạch Kim');

-- Chèn các đặc điểm của AirPods
INSERT INTO `ProductProperty` (`ProdCategoryName`, `ProdTitle`, `ProdPropertyName`) VALUES
('AirPod', 'Màu sắc', 'Trắng'),
('AirPod', 'Màu sắc', 'Đen');

-- Chèn các đặc điểm của Thiết bị gia dụng
INSERT INTO `ProductProperty` (`ProdCategoryName`, `ProdTitle`, `ProdPropertyName`) VALUES
('Thiết bị gia dụng', 'Màu sắc', 'Xanh'),
('Thiết bị gia dụng', 'Màu sắc', 'Đỏ');



CREATE TABLE IF NOT EXISTS `Product` (
  `ProdId` int NOT NULL AUTO_INCREMENT,
  `ProdName` varchar(250) NOT NULL,
  `ProdDescription` varchar(4000) NOT NULL,
  `ProdImage` varchar(250) NOT NULL,
  `ProdPrice` decimal(18, 0) NOT NULL,
  `ProdPriceSale` decimal(18, 0) not null,
  `ProdQuantity` int NOT NULL,
  `ProdQuantityRemain` int default 0,
  `ProdCategoryName` varchar(250) not null,
  `UserId` int,
  PRIMARY KEY (`ProdId`),
  FOREIGN KEY (`ProdCategoryName`) REFERENCES `ProductProperty` (`ProdCategoryName`),
  FOREIGN KEY (`UserId`) REFERENCES `User` (`UserId`)
);


-- Bảng Order: 
CREATE TABLE IF NOT EXISTS `Orders` (
  `OrderId` int NOT NULL AUTO_INCREMENT primary key,
  `CusUserName` varchar(100) NOT NULL,
  `CusEmail` varchar(250) NOT NULL,
  `CusPhone` varchar(20) NOT NULL,
  `CusAddress` varchar(250) NOT NULL,
  `ProdId` int NOT NULL,
  `Prod_Property` varchar(500) ,
  `OrderQuantity` int NOT NULL,
  `OrderStatus` varchar(100) default "Chờ xác nhận",
  `Total_Price` decimal(12,0) default 0,
  `date_order` datetime default CURRENT_TIMESTAMP
);


DELIMITER $$

CREATE TRIGGER UpdateProdQuantityRemain
AFTER INSERT ON `Order`
FOR EACH ROW
BEGIN
  -- Lấy số lượng đặt hàng từ đơn đặt hàng mới
  DECLARE orderQuantity INT;
  SELECT NEW.OrderQuantity INTO orderQuantity;

  -- Cập nhật cột ProdQuantityRemain trong bảng Product
  UPDATE Product
  SET ProdQuantityRemain = ProdQuantityRemain + orderQuantity
  WHERE ProdId = NEW.ProdId;
END $$

DELIMITER ;


-- Bảng maintain:
CREATE TABLE IF NOT EXISTS `Maintain` (
  `MaintainId` int NOT NULL auto_increment primary key,
  `MaintainQuantity` int NOT NULL,
  `StatusBroken` varchar(1000) not null,
  `Url_Img` varchar(1000) not null,
  `StatusFix` varchar(1000) default "Đang nhận sửa chữa",
  `Price_Fix` decimal(18, 2) NOT NULL,
  `date_receive_fix` datetime default CURRENT_TIMESTAMP
);

