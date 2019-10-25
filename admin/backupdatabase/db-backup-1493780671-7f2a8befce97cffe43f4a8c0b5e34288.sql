DROP TABLE attend;nnCREATE TABLE `attend` (
  `aId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `roll` varchar(255) NOT NULL DEFAULT '0',
  `attend` varchar(255) DEFAULT NULL,
  `att_date` date DEFAULT NULL,
  PRIMARY KEY (`aId`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;nnINSERT INTO attend VALUES("26","8","gdfg","00125","absent","2017-04-25");nINSERT INTO attend VALUES("25","5","fe","00123","present","2017-04-05");nINSERT INTO attend VALUES("24","7","hfh","00124","absent","2017-04-05");nINSERT INTO attend VALUES("23","8","gdfg","00125","present","2017-04-05");nINSERT INTO attend VALUES("22","5","fe","00123","present","2017-04-13");nINSERT INTO attend VALUES("21","7","hfh","00124","absent","2017-04-13");nINSERT INTO attend VALUES("20","8","gdfg","00125","present","2017-04-13");nINSERT INTO attend VALUES("19","5","fe","00123","present","2017-04-03");nINSERT INTO attend VALUES("18","7","hfh","00124","present","2017-04-03");nINSERT INTO attend VALUES("17","8","gdfg","00125","absent","2017-04-03");nINSERT INTO attend VALUES("27","7","hfh","00124","present","2017-04-25");nINSERT INTO attend VALUES("28","5","fe","00123","absent","2017-04-25");nINSERT INTO attend VALUES("29","15","Md amanath shah","00125","present","2017-05-03");nINSERT INTO attend VALUES("30","14","jamal","00124","absent","2017-05-03");nINSERT INTO attend VALUES("31","5","fe","00123","present","2017-05-03");nnnnDROP TABLE brand;nnCREATE TABLE `brand` (
  `brandId` int(11) NOT NULL AUTO_INCREMENT,
  `brandName` varchar(255) NOT NULL,
  PRIMARY KEY (`brandId`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;nnINSERT INTO brand VALUES("1","Acer");nINSERT INTO brand VALUES("2","Samsung");nINSERT INTO brand VALUES("4","Walton");nINSERT INTO brand VALUES("5","LG");nnnnDROP TABLE cart;nnCREATE TABLE `cart` (
  `cartId` int(11) NOT NULL AUTO_INCREMENT,
  `sId` varchar(255) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`cartId`)
) ENGINE=MyISAM AUTO_INCREMENT=129 DEFAULT CHARSET=utf8;nnINSERT INTO cart VALUES("15","99oggd3pvsl886jisefev5fkl4","1","Camera mine","500","1","upload/aef0b028a9.png");nINSERT INTO cart VALUES("2","sqot298tvtid139p05u3fv94q3","3","flower","90","5","upload/ac235ac821.png");nINSERT INTO cart VALUES("16","29l72c8k97rcv10p6da9gkna24","1","Camera mine","500","1","upload/aef0b028a9.png");nINSERT INTO cart VALUES("40","nto3b7c0gjoa0scss2pgofc2l2","3","flower","90","1","upload/ac235ac821.png");nINSERT INTO cart VALUES("45","oo8klsag1596ir0inguvnidv43","3","flower","90","1","upload/ac235ac821.png");nINSERT INTO cart VALUES("46","domqcea96b6mpp32hklfg00p15","4","samsun225","4000","1","upload/d797f7b6b6.jpg");nINSERT INTO cart VALUES("47","domqcea96b6mpp32hklfg00p15","3","flower","90","1","upload/ac235ac821.png");nINSERT INTO cart VALUES("48","mkplpm75muus08ope60s9r7l27","4","samsun225","4000","1","upload/d797f7b6b6.jpg");nINSERT INTO cart VALUES("49","5bu9sdbmgdlmm6bsqdel6qc053","4","samsun225","4000","1","upload/d797f7b6b6.jpg");nINSERT INTO cart VALUES("59","2poclv5g7o6lia2q2r8uspgai4","4","samsun225","4000","1","upload/d797f7b6b6.jpg");nINSERT INTO cart VALUES("61","2l61qgq13a32bgidpvpvtp1gq6","3","flower","90","1","upload/ac235ac821.png");nINSERT INTO cart VALUES("62","i27lbbsism5md4an38c5ipv982","3","flower","90","1","upload/ac235ac821.png");nINSERT INTO cart VALUES("119","ni1q59l45b1t1958siva6ol361","6","mobile","4000","1","upload/65103d15d8.jpg");nINSERT INTO cart VALUES("118","22cmm6506fmcs381n8qi1elnv0","3","flower","90","1","upload/ac235ac821.png");nINSERT INTO cart VALUES("117","22cmm6506fmcs381n8qi1elnv0","6","mobile","4000","2","upload/65103d15d8.jpg");nINSERT INTO cart VALUES("120","ub1oaeru36e7mpflvvpem4reg0","3","flower","90","1","upload/ac235ac821.png");nnnnDROP TABLE category;nnCREATE TABLE `category` (
  `catId` int(11) NOT NULL AUTO_INCREMENT,
  `catName` varchar(255) NOT NULL,
  PRIMARY KEY (`catId`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;nnINSERT INTO category VALUES("1","Desktop");nINSERT INTO category VALUES("2","Laptop");nINSERT INTO category VALUES("3","Mobile Phone");nINSERT INTO category VALUES("5","tablet");nINSERT INTO category VALUES("6","cloths");nINSERT INTO category VALUES("7","Iphone");nnnnDROP TABLE compare;nnCREATE TABLE `compare` (
  `comId` int(11) NOT NULL AUTO_INCREMENT,
  `cusId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` int(10) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`comId`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;nnnnnDROP TABLE contact;nnCREATE TABLE `contact` (
  `contactid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `mobileNo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`contactid`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;nnINSERT INTO contact VALUES("7","Md. Hassan","01751238337","mahmud@gmail.com","product  is damage","0","2017-05-02 21:33:07");nINSERT INTO contact VALUES("5","mojjamel","haque","dnight950@gmail.com","iiuuuuuuuuuuuuuuuuuu
kkkkkkkkkkkkk","0","2017-02-14 00:13:36");nINSERT INTO contact VALUES("4","salauddin","rahman","kh@d.co","fdfdsagdfgdfg dfdafgsd dfgadfg","1","2017-02-13 23:50:39");nINSERT INTO contact VALUES("6","md khaled","8976867","kh@d.co","yygbyhhb","1","2017-03-03 08:37:18");nnnnDROP TABLE cus_order;nnCREATE TABLE `cus_order` (
  `orderId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`orderId`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;nnINSERT INTO cus_order VALUES("58","5","6","mobile","5","20000","upload/65103d15d8.jpg","2017-05-03 01:08:51","0");nINSERT INTO cus_order VALUES("50","9","3","flower","1","90","upload/ac235ac821.png","2017-04-20 03:59:48","1");nINSERT INTO cus_order VALUES("57","5","6","mobile","1","4000","upload/65103d15d8.jpg","2017-05-02 00:57:50","2");nnnnDROP TABLE page;nnCREATE TABLE `page` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `body` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;nnINSERT INTO page VALUES("2","About Us","sfdfgdshgdfghsf");nnnnDROP TABLE payment;nnCREATE TABLE `payment` (
  `pmId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `total_amount` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`pmId`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;nnINSERT INTO payment VALUES("1","9","1","10","5000","2017-04-07 20:39:49");nINSERT INTO payment VALUES("2","3","3","1","90","2017-04-18 00:57:40");nINSERT INTO payment VALUES("3","3","3","1","90","2017-04-18 00:57:49");nINSERT INTO payment VALUES("4","3","3","1","90","2017-04-18 01:03:48");nINSERT INTO payment VALUES("5","3","4","1","4000","2017-04-18 01:08:06");nINSERT INTO payment VALUES("6","9","6","3","12000","2017-04-18 21:27:03");nINSERT INTO payment VALUES("7","9","3","2","180","2017-04-18 21:31:17");nINSERT INTO payment VALUES("8","2","6","1","4000","2017-04-18 22:25:22");nINSERT INTO payment VALUES("9","2","3","1","90","2017-04-18 22:41:57");nINSERT INTO payment VALUES("10","2","3","1","90","2017-04-18 22:44:27");nINSERT INTO payment VALUES("11","7","6","1","4000","2017-04-18 22:45:46");nINSERT INTO payment VALUES("12","7","3","1","90","2017-04-18 22:47:37");nINSERT INTO payment VALUES("13","7","3","1","90","2017-04-18 22:49:17");nINSERT INTO payment VALUES("14","7","3","1","90","2017-04-18 22:51:03");nINSERT INTO payment VALUES("15","7","3","1","90","2017-04-18 23:30:06");nINSERT INTO payment VALUES("16","7","3","1","90","2017-04-18 23:34:33");nINSERT INTO payment VALUES("17","7","3","1","90","2017-04-18 23:38:32");nINSERT INTO payment VALUES("18","7","6","1","4000","2017-04-19 00:00:36");nINSERT INTO payment VALUES("19","7","3","1","90","2017-04-19 00:01:43");nINSERT INTO payment VALUES("20","7","6","1","4000","2017-04-19 00:03:24");nINSERT INTO payment VALUES("21","7","6","1","4000","2017-04-19 00:11:23");nINSERT INTO payment VALUES("22","7","6","1","4000","2017-04-19 00:29:42");nINSERT INTO payment VALUES("23","7","6","1","4000","2017-04-19 00:33:15");nINSERT INTO payment VALUES("24","7","6","1","4000","2017-04-19 01:22:23");nINSERT INTO payment VALUES("25","2","6","1","4000","2017-04-19 01:31:17");nINSERT INTO payment VALUES("26","9","6","1","4000","2017-04-20 03:56:40");nINSERT INTO payment VALUES("27","9","3","1","90","2017-04-20 03:59:48");nINSERT INTO payment VALUES("28","9","6","2","8000","2017-04-20 04:01:53");nINSERT INTO payment VALUES("29","9","6","3","12000","2017-04-20 04:03:40");nINSERT INTO payment VALUES("30","9","6","2","8000","2017-04-20 04:15:24");nINSERT INTO payment VALUES("31","9","6","1","4000","2017-04-21 22:34:16");nINSERT INTO payment VALUES("32","10","6","1","4000","2017-04-22 07:12:19");nINSERT INTO payment VALUES("33","2","6","1","4000","2017-04-29 12:56:57");nINSERT INTO payment VALUES("34","5","6","1","4000","2017-05-02 00:57:50");nINSERT INTO payment VALUES("35","5","6","5","20000","2017-05-03 01:08:51");nnnnDROP TABLE pro_delivery;nnCREATE TABLE `pro_delivery` (
  `did` int(11) NOT NULL AUTO_INCREMENT,
  `orderId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `total_amount` double NOT NULL,
  `serviceman` varchar(255) NOT NULL,
  `delivery_date` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`did`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;nnINSERT INTO pro_delivery VALUES("26","50","flower","1","90","90","jamal","2017-05-04");nINSERT INTO pro_delivery VALUES("25","50","flower","1","90","90","jamal","2017-05-03");nnnnDROP TABLE product;nnCREATE TABLE `product` (
  `productId` int(11) NOT NULL AUTO_INCREMENT,
  `productName` varchar(255) NOT NULL,
  `catId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `body` text NOT NULL,
  `netprice` float NOT NULL DEFAULT '0',
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `image` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`productId`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;nnINSERT INTO product VALUES("1","Camera mine","7","1","<p>vb cbcb</p>","50000","55000","5","upload/ba7f6e5a9f.jpg","0");nINSERT INTO product VALUES("2","mmmmmmmmmm","7","2","<p>nngdgd dhdhd&nbsp; amabaretd afswwatgd?</p>","300","400","5","upload/f1904a7823.jpg","1");nINSERT INTO product VALUES("3","flower","7","1","<p>bafhjasfkafjaf;ufefjk f fjsfshfkfljffoieffhvvha;lfqpf f hjfjh jahf&nbsp; fhfhsf ffjfhffhffsf f fshfsafas ffhsa</p>
<p>fajfjsafjfafadfhhgdfvdfv;dfk;h</p>
<p>&nbsp;kafjflafl</p>
<p>bafhjasfkafjaf;ufefjk f fjsfshfkfljffoieffhvvha;lfqpf f hjfjh jahf&nbsp; fhfhsf ffjfhffhffsf f fshfsafas ffhsa</p>
<p>fajfjsafjfafadfhhgdfvdfv;dfk;h</p>
<p>&nbsp;kafjflafl</p>","80","90","7","upload/ac235ac821.png","1");nINSERT INTO product VALUES("4","samsun225","3","2","<p>shfslkfjadshfas f asfsad &gt;</p>","3600","4000","5","upload/d797f7b6b6.jpg","0");nINSERT INTO product VALUES("6","mobile","3","2","<p>sfsdfsfsaf</p>","3500","4000","5","upload/65103d15d8.jpg","1");nINSERT INTO product VALUES("7","Walton mobile","7","4","<p>The Galaxy S7 edge features big screens in incredibly slim designs that fit comfortably in the palm of your hand. We&rsquo;ve perfected the S7 edge&rsquo;s curved screen, so all you need to do is swipe for instant updates.</p>","20000","25000","5","upload/c08b783ad1.jpg","0");nINSERT INTO product VALUES("8","LG_Laptop","2","5","<p>&nbsp; Standard volume 4 GB 1600 MHz RAM for simultaneous work with several applications.<br />&nbsp;&nbsp;&nbsp; 1 TB high volume hard disc for storing an impressive number of documents, mp3 files, films and photos.<br />&nbsp;&nbsp;&nbsp; DVD+/-RW CD/DVD reader/writer, for creating back-up copies of data and the use of CD/DVD.<br />&nbsp;&nbsp;&nbsp; WiFi 802.11ac card for wireless connections ensuring the possibility of wireless</p>","50000","55000","50","upload/1f42c0a125.jpg","1");nnnnDROP TABLE slogan;nnCREATE TABLE `slogan` (
  `sId` int(11) NOT NULL AUTO_INCREMENT,
  `sTitle` varchar(255) NOT NULL,
  `slogan` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  PRIMARY KEY (`sId`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;nnINSERT INTO slogan VALUES("1","BD Online Shop","BD","upload/logo.png");nnnnDROP TABLE social;nnCREATE TABLE `social` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `google` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;nnINSERT INTO social VALUES("1","http://facebook.com.bd","http://twitter.com","http://google.com");nnnnDROP TABLE theme;nnCREATE TABLE `theme` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `theme` varchar(255) NOT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;nnINSERT INTO theme VALUES("1","default");nnnnDROP TABLE track_visitor;nnCREATE TABLE `track_visitor` (
  `trackid` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `page` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`trackid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;nnnnnDROP TABLE users;nnCREATE TABLE `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `employeeid` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `typeofuser` varchar(255) DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`userId`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;nnINSERT INTO users VALUES("10","erer","","gdfg","d","dhaka","34534","1234567890","ss@g.com","202cb962ac59075b964b07152d234b70","","General","1");nINSERT INTO users VALUES("2","shawon","","sirajgong","comilla","bangladesh","22","016712245656","khaledmahmud44@gmail.com","f53b3ed5442f1e70f1ccab9b3156429f","","General","1");nINSERT INTO users VALUES("3","khaled","","&lt;p&gt;dhaka, bangladesh&lt;/p&gt;","","","","","childrenparty4u@gmail.com","202cb962ac59075b964b07152d234b70","upload/2cc44962ca.jpg","admin","0");nINSERT INTO users VALUES("5","fe","00123","&lt;p&gt;b-baria&lt;/p&gt;","","","","","admin@gmail.com","202cb962ac59075b964b07152d234b70","","admin","4");nINSERT INTO users VALUES("9","MD. Al Nafian Shawon","","east rajabazar","dhaka","Bangladesh","123456789","00335325","nafianshawon490@gmail.com","202cb962ac59075b964b07152d234b70","","General","1");nINSERT INTO users VALUES("11","khaled","","dhaka","dhaka","Bangladesh","rtt44","123456789","khalad@gmail.com","202cb962ac59075b964b07152d234b70","","General","1");nINSERT INTO users VALUES("12","Rakibul Alam","","East Rajabazar, Dhaka","dhaka","ban","1215","988776654","rasag@gmail.com","202cb962ac59075b964b07152d234b70","","General","1");nINSERT INTO users VALUES("14","jamal","00124","dhaka","","","","","jamal@gmail.com","202cb962ac59075b964b07152d234b70","upload/5b1f87981b.jpg","jamal","3");nnnnDROP TABLE wlist;nnCREATE TABLE `wlist` (
  `wId` int(11) NOT NULL AUTO_INCREMENT,
  `cusId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`wId`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;nnnnnDROP TABLE year;nnCREATE TABLE `year` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;nnINSERT INTO year VALUES("63","2017","40090");nnnn