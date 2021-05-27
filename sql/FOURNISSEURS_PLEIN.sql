CREATE TABLE `fournisseurs` (
  `idf` int(100) NOT NULL PRIMARY KEY AUTO_INCREMENT ,
  `login` varchar(100) NOT NULL,
  `societe` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
  
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


 INSERT INTO `fournisseurs` (`idf`, `login`, `societe`, `password`) VALUES
('$_POST['idf']', '$_POST['login']','$_POST['societe']', '$_POST['password']');