-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2014 at 02:43 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26 ;

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
  `dtLastModDate` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tblentityuser`
--

INSERT INTO `tblentityuser` (`idUser`, `idEntity`, `strLoginId`, `strName`, `strEmail`, `strMobileNo`, `strAndroidId`, `striOSId`, `strPassword`, `intStatus`, `strCreateBy`, `dtCreateDate`, `strLastModBy`, `dtLastModDate`) VALUES
(1, 3, 'admin', 'Administrator', 'binhk32xp@gmail.com', '84907668625', '', 'admin', 'admin', 0, 'admin', NULL, 'admin', NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tblentityuseraccess`
--

INSERT INTO `tblentityuseraccess` (`idUserAccess`, `idUser`, `idModule`, `intAccess`, `strLastModBy`, `dtLastModDate`, `intView`, `intAdd`, `intDelete`, `intEdit`) VALUES
(1, 1, 1, 1, 'admin', '2014-10-31 00:00:00', 1, 1, 1, 1),
(2, 1, 2, 1, 'admin', '2014-10-31 00:00:00', 1, 1, 1, 1),
(3, 1, 3, 1, 'admin', '2014-10-31 00:00:00', 1, 1, 1, 1),
(4, 1, 4, 1, 'admin', '2014-10-31 00:00:00', 1, 1, 1, 1),
(5, 1, 5, 1, 'admin', '2014-10-31 00:00:00', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblmodule`
--

CREATE TABLE IF NOT EXISTS `tblmodule` (
`idModule` int(11) NOT NULL,
  `strModuleName` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strModuleUrl` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `intModuleParent` int(11) DEFAULT NULL,
  `intSort` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tblmodule`
--

INSERT INTO `tblmodule` (`idModule`, `strModuleName`, `strModuleUrl`, `intModuleParent`, `intSort`) VALUES
(1, 'Entity', 'entity', NULL, 1),
(2, 'Entity Profile', 'entity-profile', 1, 1),
(3, 'Module Activation', 'module', 1, 2),
(4, 'Billing & Invoicing', 'billing-invoicing', 1, 3),
(5, 'Users', 'entity-user', 1, 4);

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
MODIFY `idEntity` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `tblentityuser`
--
ALTER TABLE `tblentityuser`
MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tblentityuseraccess`
--
ALTER TABLE `tblentityuseraccess`
MODIFY `idUserAccess` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tblmodule`
--
ALTER TABLE `tblmodule`
MODIFY `idModule` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
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
