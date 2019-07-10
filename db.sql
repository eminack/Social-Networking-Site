-- Host: localhost


SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` text NOT NULL,
  `date_created` varchar(50) NOT NULL,
  `member_id` varchar(30) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=174 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `comment`, `date_created`, `member_id`) VALUES
(132, 'sdsdssf', '1328613060', '43'),
(133, 'dsdsdsdds', '1328613067', '43'),
(135, 'sds', '1328617260', '50'),
(171, 'awy', '1329664979', '46'),
(103, 'john', '1328370831', '50'),
(155, 'sdsdsd', '1329278523', '43'),
(160, 'sds', '1329283209', '43'),
(161, 'jlsfjjfjjjk', '1329458863', '43'),
(162, 'sdsd', '1329664332', '45'),
(163, 'aaa', '1329664356', '45'),
(172, 'sddd', '1329664988', '46'),
(173, 'dsdsd', '1329665017', '46');

-- Table structure for table `friends`

CREATE TABLE IF NOT EXISTS `friends` (
  `member_id` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `status` varchar(11) NOT NULL,
  `friends_with` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`member_id`, `datetime`, `status`, `friends_with`) VALUES
(43, '2012-02-19 18:53:14', 'conf', 46);

-- --------------------------------------------------------
--
-- Table structure for table `likes`

CREATE TABLE IF NOT EXISTS `likes` (
  `like_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int NOT NULL,
  `remarksby` int NOT NULL,
  PRIMARY KEY (`like_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(10) NOT NULL,
  `Password` varchar(80) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `ContactNo` varchar(14) NOT NULL,
  `Url` varchar(100) NOT NULL,
  `Birthdate` varchar(20) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `DateAdded` datetime NOT NULL,
  `profImage` varchar(200) NOT NULL,
  `curcity` varchar(50) NOT NULL,
  `hometown` varchar(50) NOT NULL,
  `Interested` varchar(30) NOT NULL,
  `language` varchar(30) NOT NULL,
  `college` varchar(100) NOT NULL,
  `highschool` varchar(200) NOT NULL,
  `experiences` varchar(200) NOT NULL,
  `arts` text NOT NULL,
  `aboutme` text NOT NULL,
  `month` varchar(20) NOT NULL,
  `day` varchar(2) NOT NULL,
  `year` varchar(4) NOT NULL,
  `Stats` varchar(30) NOT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `UserName`, `Password`, `FirstName`, `LastName`, `Address`, `ContactNo`, `Url`, `Birthdate`, `Gender`, `DateAdded`, `profImage`, `curcity`, `hometown`, `Interested`, `language`, `college`, `highschool`, `experiences`, `arts`, `aboutme`, `month`, `day`, `year`, `Stats`) VALUES
(34, 'js', '32981a13284db7a0', 'jorgielyn', 'Serfino', 'ilog', '09096520595', 'twinkle_serfino@yahoo.com', 'October/16/1993', 'Female', '0000-00-00 00:00:00', 'upload/p.jpg', 'ilog', '', '', '', '', '', '', '', '', 'October', '16', '1993', ''),
(41, 's', '03c7c0ace395d80182db07ae2c30f034', 's', 's', 's', 's', 's@fgh.com', 'January/1/2012', 'Female', '0000-00-00 00:00:00', 'upload/a.jpg', 's', '', '', '', '', '', '', '', '', 'January', '1', '2012', 'Single'),
(43, 'k', '8ce4b16b22b58894aa86c421e8759df3', 'kevin', 'Lorayna', 'Bago City', '09466651154', 'kevin_lorayna@yahoo.com', '12/24/1993', 'Male', '0000-00-00 00:00:00', 'upload/iron-man-2.jpg', 'k', '', 'Women', 'Hiligaynon', 'CHMSC', 'Our Lady of the Pillar Academy', '', '', 'Simple Lang', '', '', '', 'Single'),
(44, 'shehe', '52fa0118a02429506778c063f5d1638f', 'shiera mae', 'tuting', 'talisay city', '09127730611', 'kyziel_me@yahoo.com', 'February/1/2012', 'Female', '0000-00-00 00:00:00', 'upload/Between_Darkness_and_Wonder_Black_Purity_HD_Wallpaper.jpg', 'talisay city', '', 'Men', 'c++, c, vb6, php, html', 'chmsc', 'chmsc', '', '', 'iam me', 'February', '1', '2012', 'Single'),
(45, 'emoblazz', '827ccb0eea8a706c4c34a16891f84e7b', 'Honeylee', 'Magbanua', 'Bago City', '123456789', 'emoblazz@yahoo.com', 'October/14/1989', 'Female', '0000-00-00 00:00:00', 'upload/a.jpg', 'Bago City', '', '', '', '', '', '', '', '', 'October', '14', '1989', ''),
(46, 'js', '32981a13284db7a021131df49e6cd203', 'twinkle', 'serfino', 'js', '90909', 'js@yahoo.com', 'January/1/2012', 'Female', '0000-00-00 00:00:00', 'upload/p.jpg', 'js', '', '', '', '', '', '', '', '', '', '', '', ''),
(50, 'jk', '051a9911de7b5bbc610b76f4eda834a0', 'john kevin amos', 'lorayna', 'Bago City', '09127730611', 'kevin_lorayna@yahoo.com', 'January/1/2012', 'Female', '0000-00-00 00:00:00', 'upload/a.jpg', 'Bago City', '', '', '', '', '', '', '', '', '', '', '', ''),
(48, 'kj', '771f01104d905386a134a676167edccc', 'kent john', 'lorayna', 'Bago City', '90908989', 'kevin_lorayna@yahoo.com', 'January/1/2012', 'Female', '0000-00-00 00:00:00', 'upload/p.jpg', 'Bago City', '', '', '', '', '', '', '', '', 'January', '1', '2012', ''),
(49, 'jk', '051a9911de7b5bbc610b76f4eda834a0', 'jk', 'jk', 'jk', 'jk', 'js@yahoo.com', 'January/1/2012', 'Female', '0000-00-00 00:00:00', 'upload/p.jpg', 'jk', '', '', '', '', '', '', '', '', 'January', '1', '2012', ''),
(51, 'jam', '5275cb415e5bc3948e8f2cd492859f26', 'maricon', 'itona', 'victorias city', '09468282747', 'mariconitona@gmail.com', 'July/11/1992', 'Female', '0000-00-00 00:00:00', 'upload/p.jpg', 'victorias city', '', '', '', '', '', '', '', '', 'July', '11', '1992', '');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `receiver` varchar(40) NOT NULL,
  `recipient` varchar(40) NOT NULL,
  `datetime` datetime NOT NULL,
  `content` varchar(100) NOT NULL,
  `status` varchar(6) NOT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Table structure for table `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
  `photo_id` int(11) NOT NULL AUTO_INCREMENT,
  `location` varchar(200) NOT NULL,
  `member_id` int(11) NOT NULL,
  PRIMARY KEY (`photo_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`photo_id`, `location`, `member_id`) VALUES
(20, 'upload/[large][AnimePaper]wallpapers_Mobile-Suit-Gundam-Seed-Destiny_Rukawa11(1.33)__THISRES__72873.jpg', 43),
(28, 'upload/Iron_Man_Movie_by_anaheim_420.jpg', 43),
(29, 'upload/bleach_48_640.jpg', 46),
(30, 'upload/Jellyfish.jpg', 43);


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
