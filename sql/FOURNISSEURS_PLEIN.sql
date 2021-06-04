CREATE TABLE `fournisseurs` (
  `idf` int(100) NOT NULL PRIMARY KEY AUTO_INCREMENT ,
  `login` varchar(100) NOT NULL,
  `societe` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
  
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `fournisseurs` (`idf`, `login`, `societe`, `password`) VALUES
(1, 'ARA', 'ARABSOFT', 'ARAara' ),
(2, 'ADS', 'AFRICA DATA', 'ADSads' ),
(3, 'TOP', 'TOP CHECK', 'TOPtop' ),
(4, 'CAP', 'CAPSULE', 'CAPcap' ),
(5, 'MENI', 'D.MENIF', 'MENImeni' ),
(6, 'KARA', 'M.KARAZNADJI', 'KARAkara' ),
(7, 'DAR', 'DAR ANWAR', 'DARdar' ),
(8, 'SNI', 'SNIPE', 'SNIsni' ),
(9, 'HOT', 'H.NATIONAL', 'HOThot' ),
(10,'WOR', 'WORKGROUP', 'WORwor' ),
(11,'REN', 'RENAULT', 'RENren' ),
(12,'ETTA', 'ETTAHSIN B.', 'ETTAetta' ),
(13,'EXC', 'EXCEL CONTROL', 'EXCexc' ),
(14,'TEL', 'TELECOM', 'TELtel' );