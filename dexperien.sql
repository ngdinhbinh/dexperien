-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2014 at 11:53 AM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

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
`idEntity` int(11) NOT NULL,
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
  `strGoogleTokenId` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tblentity`
--

INSERT INTO `tblentity` (`idEntity`, `strName`, `strIDNo`, `strEmail`, `strURL`, `strMobileNo`, `strAddress1`, `strAddress2`, `strAddress3`, `strCity`, `strState`, `strCountry`, `strBillingContact`, `strBillingEmail`, `strTechnicalContact`, `strTechnicalEmail`, `intDXPEmailGateway`, `decEmailCost`, `strSMTP`, `strEmailUser`, `strEmailPassword`, `intDXPSMSGateway`, `decSMSCost`, `strGatewayAddress`, `strSMSUser`, `strSMSPassword`, `strAndroidAppId`, `striOSAppid`, `strFBUserId`, `strFBTokenId`, `strTwitterUserId`, `strTwitterTokenId`, `strGoogleUserId`, `strGoogleTokenId`) VALUES
(1, 'Supper Admin', '680402075712', 'binhk32xp@gmail.com', '', '84907668625', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', ''),
(2, 'RentsMore', '680402075711', 'rents@gmail.com', 'www.rentsmore.com', '0907668625', 'address1', 'address2', 'address3', 'ha noi', 'vietnam', 'vietnam', 'binh', 'binhk32xp@gmail.com', 'binh', 'binhk32xp@gmail.com', 0, 1, 'smtp', 'userid', 'password', 0, 1, 'sms http', 'userid', 'password', '', '', '', '', '', '', '', ''),
(3, 'TripsMore', '680402075712', 'trips@gmail.com', 'www.tripsmore.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblentityuser`
--

CREATE TABLE IF NOT EXISTS `tblentityuser` (
`idUser` int(11) NOT NULL,
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
  `intUserType` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tblentityuser`
--

INSERT INTO `tblentityuser` (`idUser`, `idEntity`, `strLoginId`, `strName`, `strEmail`, `strMobileNo`, `strAndroidId`, `striOSId`, `strPassword`, `intStatus`, `strCreateBy`, `dtCreateDate`, `strLastModBy`, `dtLastModDate`, `intUserType`) VALUES
(1, 1, 'admin', 'Supper Admin', 'binhk32xp@gmail.com', '84907668625', '1900', '1900', '21232f297a57a5a743894a0e4a801fc3', 0, 'admin', NULL, 'admin', NULL, 0),
(5, 2, 'chinh', 'nmc0987', 'nmc0987', '0907668625', '1900', '1080', '21232f297a57a5a743894a0e4a801fc3', 0, 'admin', NULL, 'nmc0987', NULL, 1),
(7, 2, 'binh', 'binh nguyen', 'binhk32xp@gmail.com', '+84907668625', '1004', '1004', '21232f297a57a5a743894a0e4a801fc3', 0, 'chinh', NULL, 'chinh', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tblentityuseraccess`
--

CREATE TABLE IF NOT EXISTS `tblentityuseraccess` (
`idUserAccess` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idModule` int(11) NOT NULL,
  `intAccess` int(11) NOT NULL,
  `strLastModBy` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dtLastModDate` datetime DEFAULT NULL,
  `intView` int(11) DEFAULT NULL,
  `intAdd` int(11) DEFAULT NULL,
  `intDelete` int(11) DEFAULT NULL,
  `intEdit` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1290 ;

--
-- Dumping data for table `tblentityuseraccess`
--

INSERT INTO `tblentityuseraccess` (`idUserAccess`, `idUser`, `idModule`, `intAccess`, `strLastModBy`, `dtLastModDate`, `intView`, `intAdd`, `intDelete`, `intEdit`) VALUES
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
(596, 1, 37, 1, 'admin', '2014-11-06 14:01:23', 0, 0, 0, 0),
(1198, 5, 2, 1, 'nmc0987', '2014-11-06 17:57:21', 1, 1, 1, 1),
(1199, 5, 3, 1, 'nmc0987', '2014-11-06 17:57:21', 1, 1, 1, 1),
(1200, 5, 4, 1, 'nmc0987', '2014-11-06 17:57:21', 1, 1, 1, 1),
(1201, 5, 5, 1, 'nmc0987', '2014-11-06 17:57:21', 1, 1, 1, 1),
(1269, 1, 2, 1, 'admin', '2014-11-08 02:25:36', 1, 1, 1, 1),
(1270, 1, 3, 1, 'admin', '2014-11-08 02:25:36', 1, 1, 1, 1),
(1271, 1, 4, 1, 'admin', '2014-11-08 02:25:36', 1, 1, 1, 1),
(1272, 1, 5, 1, 'admin', '2014-11-08 02:25:36', 1, 1, 1, 1),
(1273, 1, 7, 1, 'admin', '2014-11-08 02:25:36', 1, 1, 1, 1),
(1274, 1, 8, 1, 'admin', '2014-11-08 02:25:36', 1, 1, 1, 1),
(1275, 1, 9, 1, 'admin', '2014-11-08 02:25:36', 1, 1, 1, 1),
(1276, 1, 10, 1, 'admin', '2014-11-08 02:25:36', 1, 1, 1, 1),
(1277, 1, 11, 1, 'admin', '2014-11-08 02:25:36', 1, 1, 1, 1),
(1281, 7, 2, 1, 'chinh', '2014-11-08 03:33:08', 1, 1, 1, 1),
(1282, 7, 3, 1, 'chinh', '2014-11-08 03:33:08', 0, 0, 0, 0),
(1283, 7, 4, 1, 'chinh', '2014-11-08 03:33:08', 1, 1, 1, 1),
(1284, 7, 5, 1, 'chinh', '2014-11-08 03:33:08', 0, 0, 0, 0),
(1285, 7, 7, 1, 'chinh', '2014-11-08 03:33:08', 0, 0, 0, 0),
(1286, 7, 8, 1, 'chinh', '2014-11-08 03:33:08', 0, 0, 0, 0),
(1287, 7, 9, 1, 'chinh', '2014-11-08 03:33:08', 0, 0, 0, 0),
(1288, 7, 10, 1, 'chinh', '2014-11-08 03:33:08', 0, 0, 0, 0),
(1289, 7, 11, 1, 'chinh', '2014-11-08 03:33:08', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblmodule`
--

CREATE TABLE IF NOT EXISTS `tblmodule` (
`idModule` int(11) NOT NULL,
  `strModuleName` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strModuleUrl` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `intModuleParent` int(11) DEFAULT NULL,
  `intSort` int(11) DEFAULT NULL,
  `intActive` int(11) DEFAULT NULL,
  `strModuleUrlParent` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=74 ;

--
-- Dumping data for table `tblmodule`
--

INSERT INTO `tblmodule` (`idModule`, `strModuleName`, `strModuleUrl`, `intModuleParent`, `intSort`, `intActive`, `strModuleUrlParent`) VALUES
(1, 'Entity', 'entity', NULL, 1, 1, NULL),
(2, 'Entity Profile', 'entity', 1, 1, 1, 'entity'),
(3, 'Module Activation', 'module', 1, 2, 1, 'entity'),
(4, 'Billing & Invoicing', 'billing-invoicing', 1, 3, 1, 'entity'),
(5, 'Users', 'entity-user', 1, 4, 1, 'entity'),
(6, 'Members', 'Members', NULL, 2, 1, NULL),
(7, 'Leads', 'Leads', 6, 1, 1, 'Members'),
(8, 'Conversion Rule', 'Conversion Rule', 6, 2, 1, 'Members'),
(9, 'Member', 'Member', 6, 3, 1, 'Members'),
(10, 'List', 'List', 6, 4, 1, 'Members'),
(11, 'Profile Field', 'Profile Field', 6, 5, 1, 'Members'),
(12, 'Marketing Campaigns', 'Marketing Campaigns', NULL, 3, 0, NULL),
(13, 'Campaign Management', 'Campaign Management', 12, 1, 0, 'Marketing Campaigns'),
(14, 'E-Mail Marketing', 'E-Mail Marketing', 12, 2, 0, 'Marketing Campaigns'),
(15, 'SMS Marketing', 'SMS Marketing', 12, 3, 0, 'Marketing Campaigns'),
(16, 'Social Media', 'Social Media', 12, 4, 0, 'Marketing Campaigns'),
(17, 'Advertisement', 'Advertisement', 12, 5, 0, 'Marketing Campaigns'),
(18, 'Promotion', 'Promotion', 12, 6, 0, 'Marketing Campaigns'),
(19, 'Marketing Videos', 'Marketing Videos', 12, 7, 0, 'Marketing Campaigns'),
(20, 'E-Magazine', 'E-Magazine', 12, 8, 0, 'Marketing Campaigns'),
(21, 'Referral Program', 'Referral Program', 12, 9, 0, 'Marketing Campaigns'),
(22, 'E-Voucher', 'E-Voucher', 12, 10, 0, 'Marketing Campaigns'),
(23, 'Survey', 'Survey', 12, 11, 0, 'Marketing Campaigns'),
(24, 'Reports', 'Reports', NULL, 4, 0, NULL),
(25, 'Master Data', 'Master Data', NULL, 5, 0, NULL),
(26, 'Country', 'Country', 25, 1, 0, 'Master Data'),
(27, 'Region', 'Region', 25, 2, 0, 'Master Data'),
(28, 'State', 'State', 25, 3, 0, 'Master Data'),
(29, 'City', 'City', 25, 4, 0, 'Master Data'),
(30, 'Industry', 'Industry', 25, 5, 0, 'Master Data'),
(31, 'IPCountry', 'IPCountry', 25, 6, 0, 'Master Data'),
(32, 'IPBlacklist', 'IPBlacklist', 25, 7, 0, 'Master Data'),
(33, 'Language', 'Language', 25, 8, 0, 'Master Data'),
(34, 'Security Rights', 'Security Rights', NULL, 6, 0, NULL),
(35, 'User Profile', 'User Profile', 34, 1, 0, 'Security Rights'),
(36, 'User Group', 'User Group', 34, 2, 0, 'Security Rights'),
(37, 'Access Rights', 'Access Rights', 34, 3, 0, 'Security Rights');

-- --------------------------------------------------------

--
-- Table structure for table `tbluserprofile`
--

CREATE TABLE IF NOT EXISTS `tbluserprofile` (
`idUser` int(11) NOT NULL,
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
  `strPicture` longblob
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
`idUserType` int(11) NOT NULL,
  `strUserTypeName` varchar(20) NOT NULL,
  `intStatus` int(11) NOT NULL,
  `strCreatedBy` varchar(20) NOT NULL,
  `dtCreatedDate` datetime NOT NULL,
  `strLastModBy` varchar(20) NOT NULL,
  `dtLastModDate` datetime NOT NULL
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
`id` int(11) NOT NULL,
  `user_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pass_word` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `pass_word`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblentity`
--
ALTER TABLE `tblentity`
 ADD PRIMARY KEY (`idEntity`);

--
-- Indexes for table `tblentityuser`
--
ALTER TABLE `tblentityuser`
 ADD PRIMARY KEY (`idUser`), ADD KEY `idEntity` (`idEntity`);

--
-- Indexes for table `tblentityuseraccess`
--
ALTER TABLE `tblentityuseraccess`
 ADD PRIMARY KEY (`idUserAccess`), ADD KEY `tblEntityUserAccess_idUser` (`idUser`), ADD KEY `tblEntityUserAccess_idModule` (`idModule`);

--
-- Indexes for table `tblmodule`
--
ALTER TABLE `tblmodule`
 ADD PRIMARY KEY (`idModule`);

--
-- Indexes for table `tbluserprofile`
--
ALTER TABLE `tbluserprofile`
 ADD PRIMARY KEY (`idUser`);

--
-- Indexes for table `tblusertype`
--
ALTER TABLE `tblusertype`
 ADD PRIMARY KEY (`idUserType`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblentity`
--
ALTER TABLE `tblentity`
MODIFY `idEntity` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tblentityuser`
--
ALTER TABLE `tblentityuser`
MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tblentityuseraccess`
--
ALTER TABLE `tblentityuseraccess`
MODIFY `idUserAccess` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1290;
--
-- AUTO_INCREMENT for table `tblmodule`
--
ALTER TABLE `tblmodule`
MODIFY `idModule` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `tbluserprofile`
--
ALTER TABLE `tbluserprofile`
MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tblusertype`
--
ALTER TABLE `tblusertype`
MODIFY `idUserType` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
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
