CREATE DATABASE `sandeep` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sandeep`;

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE IF NOT EXISTS `authors` (
  `authorId` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `bookId` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `isbn` varchar(30) NOT NULL,
  `author` varchar(100) NOT NULL,
  `publisher` varchar(100) NOT NULL,
  `publishDate` date NOT NULL,
  PRIMARY KEY (`bookId`),
  UNIQUE KEY `isbn` (`isbn`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bookId`, `title`, `isbn`, `author`, `publisher`, `publishDate`) VALUES
(1, 'test', 'test', 'test', 'test', '2013-04-01'),
(2, 'demo', 'demo', 'demo', 'demo', '2013-04-03'),
(3, 'test', 'test1', 'test1', 'test1', '2013-04-01'),
(4, 'test2', 'test3', 'test4', 'test5', '2013-04-03'),
(5, 'ASDFASF', 'ASDFSDF', 'sandip ', 'sandip', '2013-04-16'),
(14, 'tj', 'tj', 'tj', 'tj', '2013-04-25'),
(18, ';lasjkdfasd', 's;dlfjaskdf', ';laskdjfasdljf', 'lskdjfasldfj', '2013-04-02');

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE IF NOT EXISTS `borrow` (
  `resId` varchar(50) NOT NULL,
  `readerId` int(20) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bDate` datetime NOT NULL,
  `rDate` datetime NOT NULL,
  `bookId` int(11) NOT NULL,
  `branchId` int(20) NOT NULL,
  UNIQUE KEY `resId` (`resId`),
  KEY `bookId` (`bookId`),
  KEY `readerId` (`readerId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`resId`, `readerId`, `timestamp`, `bDate`, `rDate`, `bookId`, `branchId`) VALUES
('13941bddb1399810f387f38dc7c775f0', 1, '2013-04-23 01:29:39', '2013-04-22 09:29:39', '2013-05-12 00:00:00', 1, 1),
('26c79831bb09706f44a4e975518b1997', 1, '2013-04-22 23:35:15', '2013-04-22 07:35:15', '2013-05-12 00:00:00', 1, 1),
('71029625d9350f1fe3ce2c6f2211b692', 1, '2013-04-22 23:28:24', '2013-04-22 07:28:24', '2013-05-12 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `branchdetails`
--

CREATE TABLE IF NOT EXISTS `branchdetails` (
  `branchId` int(20) NOT NULL,
  `bookId` int(50) NOT NULL,
  `numberOfBooks` int(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  KEY `fk_branch_id` (`branchId`),
  KEY `fk_book_id` (`bookId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branchdetails`
--

INSERT INTO `branchdetails` (`branchId`, `bookId`, `numberOfBooks`, `position`) VALUES
(1, 1, 39, 'AA001'),
(2, 3, 20, 'BB001'),
(1, 1, 70, 'CC333');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE IF NOT EXISTS `branches` (
  `branchId` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `location` varchar(200) NOT NULL,
  PRIMARY KEY (`branchId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`branchId`, `name`, `location`) VALUES
(1, 'nyit', 'new york,ny'),
(2, 'CUNY', 'new york,ny'),
(3, 'NJIT', 'New Jersey , NJ');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`, `timestamp`) VALUES
('a34d7587fa114ce756807b664c070134', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.64 Safari/537.11', 1366682406, 'a:3:{s:9:"user_data";s:0:"";s:9:"logged_in";b:0;s:8:"readerId";s:0:"";}', '2013-04-23 02:00:06');

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE IF NOT EXISTS `publisher` (
  `publisherId` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  PRIMARY KEY (`publisherId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

