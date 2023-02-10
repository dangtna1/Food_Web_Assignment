drop database if exists foodweb_db;
create database foodweb_db;

create table foodweb_db.users(
	id          int             not null AUTO_INCREMENT, 
    username    varchar(30)     ,
    password    varchar(30)     ,
	name 		varchar(30) 	,
    yearOfBirth int,
    phone 		varchar(15),
    roleId      int,
    primary key (id)
);

create table foodweb_db.foodtype(
	id          int             not null AUTO_INCREMENT, 
	name 		varchar(30) 	,
    primary key (id)
);


create table foodweb_db.food(
	id          int             not null AUTO_INCREMENT, 
	name 		varchar(30) 	,
    cost        int,
    image 		varchar(1000),
    foodtypeId      int,
    primary key (id),
    Foreign key (foodtypeId) references foodweb_db.foodtype(id)
);

create table foodweb_db.orders(
	id           int             not null AUTO_INCREMENT, 
    total        int,
    address 	 varchar(70),
    status       bool ,
    userId       int,
    primary key (id),
    Foreign key (userId) references foodweb_db.users(id)
);

create table foodweb_db.content(
	id          int             not null AUTO_INCREMENT, 
	name 		varchar(30) 	,
    cost        int,
    image 		varchar(1000),
    quantity    int,
    orderId      int,
    primary key (id),
    Foreign key (orderId) references foodweb_db.orders(id)
);

CREATE TABLE publicinfo (
  id int(11) NOT NULL,
  field varchar(15) DEFAULT NULL,
  infor varchar(40) DEFAULT NULL
);

INSERT INTO publicinfo (id, field, infor) VALUES
(1, 'Phone', '0948632152');

INSERT INTO publicinfo (id, field, infor) VALUES
(2, 'Email', 'contact-delifood@gmail.com');

INSERT INTO foodweb_db.users VALUES (1, 'admin' , '123456', 'admin', 2001, '0939546798', 1);
INSERT INTO foodweb_db.users VALUES (2, 'user1' , '123456', 'user1', 2001, '0945546799', 0);
INSERT INTO foodweb_db.users VALUES (3, 'user2' , '123456', 'user2', 2008, '0939512399', 0);


INSERT INTO foodweb_db.publicInfo VALUES (1, '0909123456', 'food@gmail.com' );

INSERT INTO `foodtype` (`id`, `name`) VALUES
(1, 'Cơm'),
(2, 'Canh'),
(3, 'Cháo'),
(4, 'Ăn kèm'),
(5, 'Hải sản'),
(6, 'Món gà và chim'),
(7, 'Đồ uống');

INSERT INTO `food` (`id`, `name`, `cost`, `image`, `foodtypeId`) VALUES
(1, 'Cơm đảo thịt kho tàu', '105000', 'https://d1sag4ddilekf6.azureedge.net/compressed/items/VNITE2021031805371907371/photo/menueditor_item_aa698d0df546473aa2de9ce6e275848f_1616045807497647979.jpg', 1),
(2, 'Cơm đảo dưa xào lòng', '110000', 'https://d1sag4ddilekf6.azureedge.net/compressed/items/VNITE2020081417294377380/photo/menueditor_item_e3bf0829443c40edb051952fb7c79c84_1597426179835183736.jpg', 1),
(3, 'Cơm đảo gà rang', '100000', 'https://d1sag4ddilekf6.azureedge.net/compressed/items/5-CYLACZKGMBTCAX-CYLACZKGV36TRN/photo/menueditor_item_b790094fedb94344b1cebaee4c6179e2_1593706867438222743.jpg', 1),
(4, 'Cơm chim quay', '175000', 'https://d1sag4ddilekf6.azureedge.net/compressed/items/5-CYLACZKGMBTCAX-CYLACZKJCKJTT6/photo/c39a9d62b1cc43c5a3c95c2446b90cc4_1570353550065170236.jpeg', 1),
(5, 'Canh cải nấu ngao', '50000', 'https://d1sag4ddilekf6.azureedge.net/compressed/items/VNITE2020092713182815372/photo/menueditor_item_0e5afdac353940fbabaea624f0505b06_1601212695257515449.jpg', 2),
(6, 'Canh chua thịt băm', '50000', 'https://d1sag4ddilekf6.azureedge.net/compressed/items/5-CYLACZKGMBTCAX-CYLACZKJNNTAKE/photo/85842434d22241f891ce1e919e9d28df_1570354066247835152.jpeg', 2),
(7, 'Canh cải thịt', '50000', 'https://d1sag4ddilekf6.azureedge.net/compressed/items/5-CYLACZKGMBTCAX-CYLACZKJRKJZGX/photo/ad7aa72c4026445187fa424c2bcc3e20_1570354081785653677.jpeg', 2),
(8, 'Canh ngao chua', '70000', 'https://d1sag4ddilekf6.azureedge.net/compressed/items/5-CYLACZKGMBTCAX-CYLACZKJTYEYA6/photo/7d6d604bb38c45dba6a161bb4a55250f_1570354096551164225.jpeg', 2),
(9, 'Cháo bò băm', '50000', 'https://d1sag4ddilekf6.azureedge.net/compressed/items/5-CYLACZKGMBTCAX-CYLACZKJVK3WN6/photo/769a612bb67e44c8a500d34defa43fee_1570354116742278736.jpeg', 3),
(10, 'Cháo ngao', '55000', 'https://d1sag4ddilekf6.azureedge.net/compressed/items/5-CYLACZKGMBTCAX-CYLACZKKAKWXCT/photo/1ef6d3a02e4e4a739fd9cddbb26ee55f_1570354129329525888.jpeg', 3),
(11, 'Cháo tim bầu dục', '55000', 'https://d1sag4ddilekf6.azureedge.net/compressed/items/5-CYLACZKGMBTCAX-CYLACZKKCNTYGN/photo/1d334ec030d34e8e8a56d90913a0d78e_1570354141513224510.jpeg', 3),
(12, 'Cháo tôm', '77000', 'https://d1sag4ddilekf6.azureedge.net/compressed/items/5-CYLACZKGMBTCAX-CYLACZKKEKXXR2/photo/5defe1e013ed4c3d9c8a8ac4329675cb_1570354160392287147.jpeg', 3),
(13, 'Cải xào nấm', '45000', 'https://d1sag4ddilekf6.azureedge.net/compressed/items/5-CYLACZKGMBTCAX-CYLACZKKLKDWCX/photo/a1310dda830947b0b2c4d6052819810f_1570354297871533079.jpeg', 4),
(14, 'Trứng tráng óc', '72000', 'https://d1sag4ddilekf6.azureedge.net/compressed/items/5-CYLACZKGMBTCAX-CYLACZKKSBEWGA/photo/22fe66cf24214c7798b6a9dc5c309e79_1570354333178930606.jpeg', 4),
(15, 'Trứng đúc thịt', '60000', 'https://d1sag4ddilekf6.azureedge.net/compressed/items/5-CYLACZKGMBTCAX-CYLACZKKVBJJJT/photo/b6aa4654bd43467d985c3ea582c50c93_1570354368462034272.jpeg', 4),
(16, 'Dưa xào cà chua', '40000', 'https://d1sag4ddilekf6.azureedge.net/compressed/items/5-CYLACZKGMBTCAX-CYLACZKTELCARE/photo/58545cba8bd24f36abaea99f3b0e3fe1_1570354431770576158.jpeg', 4),
(17, 'Cua thịt hấp', '500000', 'https://d1sag4ddilekf6.azureedge.net/compressed/items/VNITE2021032304502307963/photo/menueditor_item_4dfbf4ab0a9945acae9d8bad2d26f765_1616475142827295038.jpg', 5),
(18, 'Mực hấp', '270000', 'https://d1sag4ddilekf6.azureedge.net/compressed/items/VNITE2020072512522457546/photo/menueditor_item_dbac549fb6934d3d8cb926d049c1c051_1595681540328381919.jpg', 5),
(19, 'Hàu nướng', '150000', 'https://d1sag4ddilekf6.azureedge.net/compressed/items/5-CYLACZKGMBTCAX-CYLACZKTLFWHEX/photo/9af44e7efce34c68b41a5c0429033c92_1570354520740892015.jpeg', 5),
(20, 'Tôm hấp 1 đĩa 0,5kg', '350000', 'https://d1sag4ddilekf6.azureedge.net/compressed/items/5-CYLACZKGMBTCAX-CYLACZKTELCARE/photo/58545cba8bd24f36abaea99f3b0e3fe1_1570354431770576158.jpeg', 5),
(21, 'Gà rán', '130000', 'https://d1sag4ddilekf6.azureedge.net/compressed/items/5-CYLACZKGMBTCAX-CYLACZKUTA4FTJ/photo/3f9dd282d9c64d158cbddcad3edb4812_1574764235366863519.jpg', 6),
(22, 'Gà ác tần', '90000', 'https://d1sag4ddilekf6.azureedge.net/compressed/items/5-CYLACZKGMBTCAX-CYLACZKVAAWZE6/photo/b31101bf4af3489eb08c7d110e1b2f54_1570355182676623374.jpeg', 6),
(23, 'Chim hầm nấm hạt sen', '165000', 'https://d1sag4ddilekf6.azureedge.net/compressed/items/VNITE2020081718331959759/photo/menueditor_item_6e361f7ef1c8413c92fe0c2831bed9c6_1597689198295242858.jpg', 6),
(24, 'Chim bồ câu quay', '165000', 'https://d1sag4ddilekf6.azureedge.net/compressed/items/5-CYLACZKGMBTCAX-CYLACZKURAUWCJ/photo/11f0a88b8f1748fdb88fd6143aae6d2d_1570354920182591215.jpeg', 6),
(25, 'Trà chanh', '15000', 'https://d1sag4ddilekf6.azureedge.net/compressed/items/VNITE2020092713154156755/photo/menueditor_item_fc20d74845134ed0a7cfe470774d1a74_1601212528897217160.jpg', 7),
(26, 'Nước ép dứa', '40000', 'https://d1sag4ddilekf6.azureedge.net/compressed/items/VNITE2020041114370060906/photo/menueditor_item_1768de793cf54052aa5bec7f0f33b451_1595681608933378155.jpg', 7),
(27, 'Nước cam vắt', '40000', 'https://d1sag4ddilekf6.azureedge.net/compressed/items/5-CYLACZKGMBTCAX-CYLACZKVEX2TTJ/photo/379e5d0a9b8d41d8ad69a7844fb34d9c_1570355250474878659.jpeg', 7),
(28, 'Nước dưa hấu', '40000', 'https://d1sag4ddilekf6.azureedge.net/compressed/items/5-CYLACZKGMBTCAX-CYLACZKVJAAYV2/photo/86fe03b97c864991b3272afaa828fedf_1570355263802996101.jpeg', 7);









