CREATE TABLE `agents` (
  `ida` int(100) NOT NULL  PRIMARY KEY AUTO_INCREMENT,
  `login` varchar(30) NOT NULL,
  `fonction` varchar(30) NOT NULL,
  `type`varchar(100) NOT NULL,
  `password` varchar(30) NOT NULL,
  `statut` INT(1) NOT NULL DEFAULT 0 ,
  
  UNIQUE (login)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `agents` (`ida`, `login`, `fonction`, `password` , `type`) VALUES
(1, 'ADMIN', 'ADMIN', 'ADMIN07admin' , 'Agent' );

-- --------------------------------------------------------

--
-- Table structure for table `login_builder`
--

