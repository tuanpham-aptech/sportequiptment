DROP TABLEadmin;

CREATE TABLE `admin` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `password` varchar(32) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

INSERT INTO admin VALUES("1","admin","202cb962ac59075b964b07152d234b70","1");



DROP TABLEbrands;

CREATE TABLE `brands` (
  `brand_id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

INSERT INTO brands VALUES("1","RayBan","1");
INSERT INTO brands VALUES("2","Zakoban","1");
INSERT INTO brands VALUES("3","Adidas","1");
INSERT INTO brands VALUES("5","PAHAMA","1");
INSERT INTO brands VALUES("6","NIKITO","1");
INSERT INTO brands VALUES("7","BuKuHaRam","1");
INSERT INTO brands VALUES("8","Fuco","1");



DROP TABLEcategories;

CREATE TABLE `categories` (
  `cat_id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

INSERT INTO categories VALUES("1","Găng tay boxing","1");
INSERT INTO categories VALUES("2","Dụng cụ bảo vệ chân","1");
INSERT INTO categories VALUES("3","Trụ đấm ","1");
INSERT INTO categories VALUES("4","Côn nhị khúc ","1");
INSERT INTO categories VALUES("5","Mũ bảo vệ đầu","1");
INSERT INTO categories VALUES("6","Giáp bảo vệ ","1");



DROP TABLEcomments;

CREATE TABLE `comments` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `member_id` int(5) NOT NULL,
  `product_id` int(5) NOT NULL,
  `date` datetime NOT NULL,
  `content` tinytext COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

INSERT INTO comments VALUES("1","2","4","2021-08-04 23:22:10","Hoa trạng nguyên mua đích đấm nhẹ ","1");
INSERT INTO comments VALUES("2","2","2","2021-08-04 23:24:27","Côn nhị khúc tôi cần video hướng dẫn sử dụng sản phẩm cảm ơn !!!","0");
INSERT INTO comments VALUES("3","3","5","2021-08-04 23:26:49","Mũ va đập tốt mọi người nên mua ","1");
INSERT INTO comments VALUES("4","3","5","2021-08-04 23:27:36","Nếu có nhiều hơn tôi sẽ ủng hộ shop!","0");
INSERT INTO comments VALUES("5","4","0","2021-08-05 08:50:21","Hoa sinh sắc ","0");
INSERT INTO comments VALUES("6","4","2","2021-08-05 09:32:58","Côn nhị khúc quang sắc","1");
INSERT INTO comments VALUES("7","1","4","2021-08-05 09:36:11","Hoa Bình Minh Trắng Trong","0");
INSERT INTO comments VALUES("8","1","5","2021-08-05 09:40:30","Mũ chất liệu sốp hay cao su dẻo ad?","0");
INSERT INTO comments VALUES("9","7","1","2021-12-02 17:12:34","Hàng tốt ","0");



DROP TABLEmembers;

CREATE TABLE `members` (
  `member_id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `password` varchar(32) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `fullname` varchar(32) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `mobile` varchar(12) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `address` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(32) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

INSERT INTO members VALUES("2","tinh","d4d27bce5ab910a53c3abdeca59af6fe","Tỉnh Nguyễn ","091337968","Thái Bình ","tinh1502@gmail.com","1");
INSERT INTO members VALUES("3","loc","25f9e794323b453885f5181f1b624d0b","Đỗ Bá Lộc ","0864213221","Phong Hoá Thái Nguyên ","loclt1201@uneti.edu.vn","1");
INSERT INTO members VALUES("7","tuan","25d55ad283aa400af464c76d713c07ad","Phạm Tuân","091337968","Yên Bái ","tuan.etc.764@apt.edu.vn","1");
INSERT INTO members VALUES("8","thanh","25d55ad283aa400af464c76d713c07ad","Phạm Thanh Nga ","091337968","Thái Bình ","tinh1502@gmail.com","1");
INSERT INTO members VALUES("37","Filipino for Grade 7 - Spiral Fi","3","","47","2013-2014","First","1");
INSERT INTO members VALUES("38","English for Grade 7","3","","47","2013-2014","First","1");
INSERT INTO members VALUES("39","Mathematics for Grade 7 - Spiral","3","","47","2013-2014","First","0");
INSERT INTO members VALUES("40","Science for Grade 7","3","","47","2013-2014","First","0");
INSERT INTO members VALUES("41","Telmo","fcea920f7412b5da7be0cf42b8c93759","Telmo","47","Cộng hoà công gô ","telmo219@gmail.com","1");
INSERT INTO members VALUES("42","Araling Panlipunan for Grade 7","3","","47","2013-2014","First","1");



DROP TABLEorderdetail;

CREATE TABLE `orderdetail` (
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`product_id`,`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

INSERT INTO orderdetail VALUES("1","14","1","3200000");
INSERT INTO orderdetail VALUES("2","14","2","210000");
INSERT INTO orderdetail VALUES("2","15","2","210000");
INSERT INTO orderdetail VALUES("2","16","1","210000");
INSERT INTO orderdetail VALUES("3","15","1","1200000");
INSERT INTO orderdetail VALUES("3","16","2","1200000");
INSERT INTO orderdetail VALUES("4","15","1","250000");



DROP TABLEordermethod;

CREATE TABLE `ordermethod` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

INSERT INTO ordermethod VALUES("1","Trực tiếp cho người giao hàng ","1");
INSERT INTO ordermethod VALUES("2","Chuyển khoản","1");
INSERT INTO ordermethod VALUES("3","Thanh toán tại shop","1");
INSERT INTO ordermethod VALUES("4","Paypal","1");



DROP TABLEorders;

CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_method_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `orderdate` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1: Chưa xử lý; 2: Đang xử lý; 3: Đã xử lý; 4: Huỷ ',
  `name` varchar(25) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `address` varchar(32) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `mobile` varchar(10) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `note` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

INSERT INTO orders VALUES("14","1","7","2021-11-04 16:12:59","3","Phạm Tuân","Yên Bái ","091337968","tuan.etc.764@apt.edu.vn","Hàng hậu mãi ");
INSERT INTO orders VALUES("15","3","8","2021-11-04 16:47:43","1","Phạm Thanh Nga ","Hải dương","091337968","thanhnga@gmail.com","Giao đúng hẹn nhé ");
INSERT INTO orders VALUES("16","1","7","2021-12-02 17:14:46","1","Phạm Tuân","Yên Bái ","091337968","tuan.etc.764@apt.edu.vn","Mua hàng giá rẻ ");



DROP TABLEproducts;

CREATE TABLE `products` (
  `product_id` int(5) NOT NULL AUTO_INCREMENT,
  `product_cat` int(5) NOT NULL,
  `product_brand` int(5) NOT NULL,
  `name` varchar(32) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `description` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

INSERT INTO products VALUES("1","3","8","Trụ đấm bốc cao su ","3200000","1635959674_trudamAX.jpg","Trụ đấm cao su hàng chất lượng cao giá cả hợp lý nhất hiện nay chỉ có tại cửa hàng Tuân Phạm 
","1");
INSERT INTO products VALUES("2","4","2","Côn nhị khúc ","210000","1635959686_connhikhuclapgay.jpg","Côn nhị khúc giá mềm","1");
INSERT INTO products VALUES("3","6","3","Bóng đàn hồi ","1200000","bongdanhoi.jpg","Bóng đàn hồi giúp tăng độ phản xạ ","1");
INSERT INTO products VALUES("4","2","2","Đích đấm ","250000","dichdam.jpg","Đích đấm tăng cơ chân","1");
INSERT INTO products VALUES("5","5","5","Mũ bảo vệ ","900000","mubaove.jpg","Mũ bảo vệ giúp đầu khỏi chấn thương của đối thủ gây ra","1");
INSERT INTO products VALUES("6","5","3","Trụ đấm ","670000","1627830030_dungcubaoho.jpg","<p>Trụ đấm boxing l&agrave; loại bền nhất</p>
","1");
INSERT INTO products VALUES("8","1","1","Găng tay boxing T4","120000000","1628069310_gangtayTCL.jpg","<p>Găng tay boxing c&ograve;n nhiều&nbsp; gi&aacute; trị&nbsp;</p>
","1");



