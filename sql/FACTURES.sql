CREATE TABLE `factures` (
  `id` int(11) NOT NULL  PRIMARY KEY AUTO_INCREMENT,
  `Nboc` varchar(100) NOT NULL,
  `Societe` varchar(255) NOT NULL,
  `Montant` decimal(10,3) NOT NULL,
  `Creation` date DEFAULT NULL,
  `Etape` varchar(255) NOT NULL,
  `Ordonnanceur` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;