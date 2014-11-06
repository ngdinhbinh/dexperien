-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2014 at 02:02 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dexperien`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblentity`
--

CREATE TABLE IF NOT EXISTS `tblentity` (
  `idEntity` int(11) NOT NULL AUTO_INCREMENT,
  `strName` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strIDNo` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strEmail` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strURL` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strMobileNo` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strAddress1` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strAddress2` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strAddress3` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strCity` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strState` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strCountry` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strBillingContact` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strBillingEmail` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strTechnicalContact` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strTechnicalEmail` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `intDXPEmailGateway` int(11) DEFAULT NULL,
  `decEmailCost` float DEFAULT NULL,
  `strSMTP` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strEmailUser` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strEmailPassword` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `intDXPSMSGateway` int(11) DEFAULT NULL,
  `decSMSCost` float DEFAULT NULL,
  `strGatewayAddress` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strSMSUser` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strSMSPassword` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strAndroidAppId` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `striOSAppid` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strFBUserId` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strFBTokenId` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strTwitterUserId` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strTwitterTokenId` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strGoogleUserId` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strGoogleTokenId` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idEntity`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tblentity`
--

INSERT INTO `tblentity` (`idEntity`, `strName`, `strIDNo`, `strEmail`, `strURL`, `strMobileNo`, `strAddress1`, `strAddress2`, `strAddress3`, `strCity`, `strState`, `strCountry`, `strBillingContact`, `strBillingEmail`, `strTechnicalContact`, `strTechnicalEmail`, `intDXPEmailGateway`, `decEmailCost`, `strSMTP`, `strEmailUser`, `strEmailPassword`, `intDXPSMSGateway`, `decSMSCost`, `strGatewayAddress`, `strSMSUser`, `strSMSPassword`, `strAndroidAppId`, `striOSAppid`, `strFBUserId`, `strFBTokenId`, `strTwitterUserId`, `strTwitterTokenId`, `strGoogleUserId`, `strGoogleTokenId`) VALUES
(1, 'Administrator', NULL, 'binhk32xp@gmail.com', NULL, '84907668625', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'RentsMore', '680402075711', 'rents@gmail.com', 'www.rentsmore.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'TripsMore', '680402075712', 'trips@gmail.com', 'www.tripsmore.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblentityuser`
--

CREATE TABLE IF NOT EXISTS `tblentityuser` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `idEntity` int(11) DEFAULT NULL,
  `strLoginId` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strName` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strEmail` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strMobileNo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strAndroidId` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `striOSId` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strPassword` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `intStatus` int(11) DEFAULT NULL,
  `strCreateBy` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dtCreateDate` datetime DEFAULT NULL,
  `strLastModBy` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dtLastModDate` datetime DEFAULT NULL,
  PRIMARY KEY (`idUser`),
  KEY `idEntity` (`idEntity`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tblentityuser`
--

INSERT INTO `tblentityuser` (`idUser`, `idEntity`, `strLoginId`, `strName`, `strEmail`, `strMobileNo`, `strAndroidId`, `striOSId`, `strPassword`, `intStatus`, `strCreateBy`, `dtCreateDate`, `strLastModBy`, `dtLastModDate`) VALUES
(1, 3, 'admin', 'Administrator', 'binhk32xp@gmail.com', '84907668625', '1900', '1900', '21232f297a57a5a743894a0e4a801fc3', 0, 'admin', NULL, 'admin', NULL),
(5, 1, 'binhk32xp', 'Binh Nguyen Dinh', 'binhk32xp@gmail.com', '0907668625', '1900', '1080', '', 0, 'admin', NULL, 'admin', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblentityuseraccess`
--

CREATE TABLE IF NOT EXISTS `tblentityuseraccess` (
  `idUserAccess` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `idModule` int(11) NOT NULL,
  `intAccess` int(11) NOT NULL,
  `strLastModBy` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dtLastModDate` datetime DEFAULT NULL,
  `intView` int(11) DEFAULT NULL,
  `intAdd` int(11) DEFAULT NULL,
  `intDelete` int(11) DEFAULT NULL,
  `intEdit` int(11) DEFAULT NULL,
  PRIMARY KEY (`idUserAccess`),
  KEY `tblEntityUserAccess_idUser` (`idUser`),
  KEY `tblEntityUserAccess_idModule` (`idModule`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=597 ;

--
-- Dumping data for table `tblentityuseraccess`
--

INSERT INTO `tblentityuseraccess` (`idUserAccess`, `idUser`, `idModule`, `intAccess`, `strLastModBy`, `dtLastModDate`, `intView`, `intAdd`, `intDelete`, `intEdit`) VALUES
(566, 1, 2, 1, 'admin', '2014-11-06 14:01:22', 1, 1, 1, 1),
(567, 1, 3, 1, 'admin', '2014-11-06 14:01:22', 1, 1, 1, 1),
(568, 1, 4, 1, 'admin', '2014-11-06 14:01:22', 1, 1, 1, 1),
(569, 1, 5, 1, 'admin', '2014-11-06 14:01:22', 1, 1, 1, 1),
(570, 1, 7, 1, 'admin', '2014-11-06 14:01:22', 1, 1, 1, 1),
(571, 1, 8, 1, 'admin', '2014-11-06 14:01:22', 1, 1, 1, 1),
(572, 1, 9, 1, 'admin', '2014-11-06 14:01:22', 1, 1, 1, 1),
(573, 1, 10, 1, 'admin', '2014-11-06 14:01:22', 1, 1, 1, 1),
(574, 1, 11, 1, 'admin', '2014-11-06 14:01:22', 1, 1, 1, 1),
(575, 1, 13, 1, 'admin', '2014-11-06 14:01:22', 1, 1, 1, 1),
(576, 1, 14, 1, 'admin', '2014-11-06 14:01:22', 1, 1, 1, 1),
(577, 1, 15, 1, 'admin', '2014-11-06 14:01:22', 1, 1, 1, 1),
(578, 1, 16, 1, 'admin', '2014-11-06 14:01:22', 1, 1, 1, 1),
(579, 1, 17, 1, 'admin', '2014-11-06 14:01:22', 1, 1, 1, 1),
(580, 1, 18, 1, 'admin', '2014-11-06 14:01:22', 1, 1, 1, 1),
(581, 1, 19, 1, 'admin', '2014-11-06 14:01:22', 1, 1, 1, 1),
(582, 1, 20, 1, 'admin', '2014-11-06 14:01:22', 1, 1, 1, 1),
(583, 1, 21, 1, 'admin', '2014-11-06 14:01:22', 1, 1, 1, 1),
(584, 1, 22, 1, 'admin', '2014-11-06 14:01:22', 1, 1, 1, 1),
(585, 1, 23, 1, 'admin', '2014-11-06 14:01:22', 1, 1, 1, 1),
(586, 1, 26, 1, 'admin', '2014-11-06 14:01:22', 1, 1, 1, 1),
(587, 1, 27, 1, 'admin', '2014-11-06 14:01:22', 1, 1, 1, 1),
(588, 1, 28, 1, 'admin', '2014-11-06 14:01:22', 1, 1, 1, 1),
(589, 1, 29, 1, 'admin', '2014-11-06 14:01:22', 1, 1, 1, 1),
(590, 1, 30, 1, 'admin', '2014-11-06 14:01:22', 1, 1, 1, 1),
(591, 1, 31, 1, 'admin', '2014-11-06 14:01:22', 1, 1, 1, 1),
(592, 1, 32, 1, 'admin', '2014-11-06 14:01:22', 1, 1, 1, 1),
(593, 1, 33, 1, 'admin', '2014-11-06 14:01:22', 1, 1, 1, 1),
(594, 1, 35, 1, 'admin', '2014-11-06 14:01:22', 0, 0, 0, 0),
(595, 1, 36, 1, 'admin', '2014-11-06 14:01:23', 0, 0, 0, 0),
(596, 1, 37, 1, 'admin', '2014-11-06 14:01:23', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblmodule`
--

CREATE TABLE IF NOT EXISTS `tblmodule` (
  `idModule` int(11) NOT NULL AUTO_INCREMENT,
  `strModuleName` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strModuleUrl` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `intModuleParent` int(11) DEFAULT NULL,
  `intSort` int(11) DEFAULT NULL,
  PRIMARY KEY (`idModule`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=38 ;

--
-- Dumping data for table `tblmodule`
--

INSERT INTO `tblmodule` (`idModule`, `strModuleName`, `strModuleUrl`, `intModuleParent`, `intSort`) VALUES
(1, 'Entity', 'entity', NULL, 1),
(2, 'Entity Profile', 'entity-profile', 1, 1),
(3, 'Module Activation', 'module', 1, 2),
(4, 'Billing & Invoicing', 'billing-invoicing', 1, 3),
(5, 'Users', 'entity-user', 1, 4),
(6, 'Members', 'member', NULL, 2),
(7, 'Leads', '', 6, 1),
(8, 'Conversion Rule', '', 6, 2),
(9, 'Member', '', 6, 3),
(10, 'List', '', 6, 4),
(11, 'Profile Field', '', 6, 5),
(12, 'Marketing Campaigns', NULL, NULL, 3),
(13, 'Campaign Management', '', 12, 1),
(14, 'E-Mail Marketing', '', 12, 2),
(15, 'SMS Marketing', '', 12, 3),
(16, 'Social Media', '', 12, 4),
(17, 'Advertisement', '', 12, 5),
(18, 'Promotion', '', 12, 6),
(19, 'Marketing Videos', '', 12, 7),
(20, 'E-Magazine', '', 12, 8),
(21, 'Referral Program', '', 12, 9),
(22, 'E-Voucher', '', 12, 10),
(23, 'Survey', '', 12, 11),
(24, 'Reports', NULL, NULL, 4),
(25, 'Master Data', NULL, NULL, 5),
(26, 'Country', '', 25, 1),
(27, 'Region', '', 25, 2),
(28, 'State', '', 25, 3),
(29, 'City', '', 25, 4),
(30, 'Industry', '', 25, 5),
(31, 'IPCountry', '', 25, 6),
(32, 'IPBlacklist', '', 25, 7),
(33, 'Language', '', 25, 8),
(34, 'Security Rights', NULL, NULL, 6),
(35, 'User Profile', '', 34, 1),
(36, 'User Group', '', 34, 2),
(37, 'Access Rights', '', 34, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbluserprofile`
--

CREATE TABLE IF NOT EXISTS `tbluserprofile` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `strUserId` varchar(100) NOT NULL,
  `strPassword` varchar(32) NOT NULL,
  `strName` varchar(100) NOT NULL,
  `strDepartment` varchar(100) NOT NULL,
  `strEmail` varchar(50) NOT NULL,
  `intPhoneNumber` varchar(20) NOT NULL,
  `intMobileNumber` varchar(20) NOT NULL,
  `dtLastLogin` datetime NOT NULL,
  `strLastLoginIP` varchar(20) NOT NULL,
  `intLoginFailed` int(11) NOT NULL,
  `dtLastLoginFailed` datetime NOT NULL,
  `strLastLoginFailedIP` varchar(20) NOT NULL,
  `intStatus` int(11) NOT NULL,
  `strCreatedBy` varchar(20) NOT NULL,
  `dtCreatedDate` datetime NOT NULL,
  `strLastModBy` varchar(20) NOT NULL,
  `dtLastModDate` datetime NOT NULL,
  `idUserType` int(11) NOT NULL,
  `strPicture` longblob,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbluserprofile`
--

INSERT INTO `tbluserprofile` (`idUser`, `strUserId`, `strPassword`, `strName`, `strDepartment`, `strEmail`, `intPhoneNumber`, `intMobileNumber`, `dtLastLogin`, `strLastLoginIP`, `intLoginFailed`, `dtLastLoginFailed`, `strLastLoginFailedIP`, `intStatus`, `strCreatedBy`, `dtCreatedDate`, `strLastModBy`, `dtLastModDate`, `idUserType`, `strPicture`) VALUES
(1, 'administrator', 'e10adc3949ba59abbe56e057f20f883e', 'administrator', '', 'nmc0987@gmail.com', '', '', '2014-10-21 09:32:25', '127.0.0.1', 0, '0000-00-00 00:00:00', '127.0.0.1', 0, '', '2014-10-21 09:32:25', '', '2014-10-21 09:32:25', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblusertype`
--

CREATE TABLE IF NOT EXISTS `tblusertype` (
  `idUserType` int(11) NOT NULL AUTO_INCREMENT,
  `strUserTypeName` varchar(20) NOT NULL,
  `intStatus` int(11) NOT NULL,
  `strCreatedBy` varchar(20) NOT NULL,
  `dtCreatedDate` datetime NOT NULL,
  `strLastModBy` varchar(20) NOT NULL,
  `dtLastModDate` datetime NOT NULL,
  PRIMARY KEY (`idUserType`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tblusertype`
--

INSERT INTO `tblusertype` (`idUserType`, `strUserTypeName`, `intStatus`, `strCreatedBy`, `dtCreatedDate`, `strLastModBy`, `dtLastModDate`) VALUES
(2, 'Manager', 0, '', '2014-10-21 15:34:33', '', '2014-10-21 15:34:33'),
(4, 'System', 0, '', '2014-10-31 17:24:29', '', '2014-10-31 17:24:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pass_word` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `pass_word`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblentityuser`
--
ALTER TABLE `tblentityuser`
  ADD CONSTRAINT `tblentityuser_ibfk_1` FOREIGN KEY (`idEntity`) REFERENCES `tblentity` (`idEntity`);

--
-- Constraints for table `tblentityuseraccess`
--
ALTER TABLE `tblentityuseraccess`
  ADD CONSTRAINT `tblEntityUserAccess_idModule` FOREIGN KEY (`idModule`) REFERENCES `tblmodule` (`idModule`),
  ADD CONSTRAINT `tblEntityUserAccess_idUser` FOREIGN KEY (`idUser`) REFERENCES `tblentityuser` (`idUser`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
