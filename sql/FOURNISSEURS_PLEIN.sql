CREATE TABLE `fournisseurs` (
  `idf` int(100) NOT NULL PRIMARY KEY AUTO_INCREMENT ,
  `login` varchar(100) NOT NULL,
  `societe` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
  
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `fournisseurs` (`idf`, `login`, `societe`, `password`) VALUES
(1, 'ara', 'ARABSOFT', '123456' ),
(2, 'ads', 'AFRICA DATA', '123456' ),
(3, 'top', 'TOP CHECK', '123456' ),
(4, 'cap', 'CAPSULE', '123456' ),
(5, 'menif', 'D.MENIF', '123456' ),
(6, 'kara', 'M.KARAZNADJI', '123456' ),
(7, 'dar', 'DAR ANWAR', '123456' ),
(8, 'sni', 'SNIPE', '123456' ),
(9, 'hot', 'H.NATIONAL', '123456' ),
(10,'wor', 'WORKGROUP', '123456' ),
(11,'ren', 'RENAULT', '123456' ),
(12,'etta', 'ETTAHSIN B.', '123456' ),
(13,'exc', 'EXCEL CONTROL', '123456' ),
(14,'tel', 'TELECOM', '123456' );