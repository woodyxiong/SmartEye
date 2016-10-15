-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016-10-15 19:43:26
-- 服务器版本: 5.5.49-0ubuntu0.14.04.1
-- PHP 版本: 5.5.9-1ubuntu4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `data`
--

-- --------------------------------------------------------

--
-- 表的结构 `camera`
--

CREATE TABLE IF NOT EXISTS `camera` (
  `cameraid` tinyint(5) NOT NULL,
  `cameraname` varchar(20) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `gps` varchar(100) NOT NULL,
  `status` varchar(4) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`cameraid`),
  KEY `camerauser` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `camera`
--

INSERT INTO `camera` (`cameraid`, `cameraname`, `userid`, `gps`, `status`, `time`) VALUES
(1, 'TTK-N', 'clever', '1', 'on', '2016-10-05 17:55:22'),
(2, 'TTK-S', 'clever', '2', 'on', '2016-10-05 16:45:13'),
(3, 'TTK-CENTER', 'clever', '3', 'on', '2016-10-06 09:29:32'),
(4, 'TTK-MOUNTAIN', 'clever', '4', 'on', '2016-10-06 09:30:00'),
(5, 'TTK-YX', 'clever', '5', 'on', '2016-10-06 09:29:41');

-- --------------------------------------------------------

--
-- 表的结构 `data`
--

CREATE TABLE IF NOT EXISTS `data` (
  `instrumentid` int(11) NOT NULL,
  `datatime` datetime NOT NULL,
  `data` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`instrumentid`,`datatime`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `data`
--

INSERT INTO `data` (`instrumentid`, `datatime`, `data`) VALUES
(1, '2016-07-22 00:53:09', '50'),
(1, '2016-07-22 00:53:12', '75'),
(1, '2016-07-22 01:53:14', '78'),
(1, '2016-09-02 01:19:37', '47'),
(1, '2016-09-02 02:00:00', '20'),
(1, '2016-09-02 02:01:00', '45'),
(1, '2016-09-04 03:14:10', '65'),
(1, '2016-09-04 03:14:15', '65'),
(1, '2016-09-04 03:14:16', '65'),
(1, '2016-09-04 03:14:24', '65'),
(1, '2016-09-04 08:27:34', '35'),
(1, '2016-09-04 08:27:52', '45'),
(1, '2016-09-04 10:09:00', '85'),
(1, '2016-09-04 10:09:01', '47'),
(1, '2016-09-04 10:09:03', '56'),
(1, '2016-09-04 10:09:04', '79'),
(1, '2016-09-04 10:09:06', '62'),
(1, '2016-09-04 10:09:07', '73'),
(1, '2016-09-04 10:09:08', '47'),
(1, '2016-09-04 10:09:09', '74'),
(1, '2016-09-04 10:09:11', '62'),
(1, '2016-09-04 10:09:12', '36'),
(1, '2016-09-04 10:09:14', '68'),
(1, '2016-09-04 10:09:15', '40'),
(1, '2016-09-04 10:09:16', '49'),
(1, '2016-09-04 10:09:17', '56'),
(1, '2016-09-04 10:09:18', '75'),
(1, '2016-09-04 10:09:19', '65'),
(1, '2016-09-04 10:09:20', '42'),
(1, '2016-09-04 10:09:21', '59'),
(1, '2016-09-04 10:09:22', '66'),
(1, '2016-09-04 10:09:23', '98'),
(1, '2016-09-04 10:09:26', '34'),
(1, '2016-09-04 10:09:27', '75'),
(1, '2016-09-04 10:09:28', '47'),
(1, '2016-09-04 10:09:29', '67'),
(1, '2016-09-04 10:09:30', '90'),
(1, '2016-09-04 10:09:31', '62'),
(1, '2016-09-04 10:09:32', '78'),
(1, '2016-09-04 10:09:33', '92'),
(1, '2016-09-04 10:09:34', '63'),
(1, '2016-09-04 10:09:35', '98'),
(1, '2016-09-04 10:09:36', '82'),
(1, '2016-09-04 10:09:37', '45'),
(1, '2016-09-04 10:09:41', '30'),
(1, '2016-09-04 10:09:42', '69'),
(1, '2016-09-04 10:09:43', '43'),
(1, '2016-09-04 10:09:45', '98'),
(1, '2016-09-04 10:09:47', '63'),
(1, '2016-09-04 10:09:48', '77'),
(1, '2016-09-04 10:09:49', '46'),
(1, '2016-09-04 10:09:50', '37'),
(1, '2016-09-04 10:09:51', '33'),
(1, '2016-09-04 10:09:52', '82'),
(1, '2016-09-04 10:09:53', '56'),
(1, '2016-09-28 15:39:55', '36'),
(1, '2016-09-28 15:40:56', '58'),
(1, '2016-09-28 15:41:58', '50'),
(1, '2016-09-28 15:42:01', '91'),
(2, '2016-09-04 10:09:11', '62'),
(2, '2016-09-04 10:09:12', '36'),
(2, '2016-09-04 10:09:14', '68'),
(2, '2016-09-04 10:09:15', '40'),
(2, '2016-09-04 10:09:16', '2'),
(5, '2016-09-04 10:09:11', '62'),
(5, '2016-09-04 10:09:12', '36'),
(5, '2016-09-04 10:09:14', '68'),
(5, '2016-09-04 10:09:15', '40'),
(5, '2016-09-04 10:09:16', '2'),
(12, '2016-10-11 23:30:34', '567');

-- --------------------------------------------------------

--
-- 表的结构 `error`
--

CREATE TABLE IF NOT EXISTS `error` (
  `instrumentid` int(11) NOT NULL,
  `errortime` datetime NOT NULL,
  `errordata` varchar(255) NOT NULL,
  `errordigit` tinyint(2) NOT NULL,
  PRIMARY KEY (`instrumentid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `instrument`
--

CREATE TABLE IF NOT EXISTS `instrument` (
  `instrumentid` int(11) NOT NULL,
  `cameraid` tinyint(5) NOT NULL,
  `judge` smallint(6) DEFAULT NULL,
  `digit` int(2) NOT NULL,
  `tobin` varchar(20) DEFAULT NULL,
  `threshold` smallint(6) DEFAULT NULL,
  `instrumentinfo` varchar(50) NOT NULL,
  `takeback` tinyint(1) DEFAULT NULL,
  `typeface` tinyint(4) DEFAULT NULL,
  `ltx` int(4) NOT NULL,
  `lty` int(4) NOT NULL,
  `rbx` int(4) NOT NULL,
  `rby` int(4) NOT NULL,
  `angle` double DEFAULT NULL,
  `unit` varchar(20) NOT NULL,
  `status` varchar(4) NOT NULL DEFAULT 'on',
  PRIMARY KEY (`instrumentid`,`cameraid`),
  KEY `instrumentcarera` (`cameraid`),
  KEY `instrumentid` (`instrumentid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `instrument`
--

INSERT INTO `instrument` (`instrumentid`, `cameraid`, `judge`, `digit`, `tobin`, `threshold`, `instrumentinfo`, `takeback`, `typeface`, `ltx`, `lty`, `rbx`, `rby`, `angle`, `unit`, `status`) VALUES
(1, 1, 0, 3, '2', 128, '', 1, 0, 127, 127, 127, 127, 0, 'mol/L', 'on'),
(2, 2, 0, 3, '2', 128, '', 1, 0, 127, 127, 127, 127, 0, 'mol/L', 'on'),
(3, 3, 0, 3, '2', 128, '', 1, 0, 127, 127, 127, 127, 0, 'mol/L', 'on'),
(4, 4, 0, 3, '2', 128, '', 1, 0, 127, 127, 127, 127, 0, 'mol/L', 'on'),
(5, 1, 0, 3, '2', 128, 'PM2.5', 1, 0, 127, 127, 127, 127, 0, ' ', 'on'),
(6, 2, 0, 3, '2', 128, 'PM2.5', 1, 0, 127, 127, 127, 127, 0, ' ', 'on'),
(7, 3, 0, 3, '2', 128, 'PM2.5', 1, 0, 127, 127, 127, 127, 0, ' ', 'on'),
(8, 4, 0, 3, '2', 128, 'PM2.5', 1, 0, 127, 127, 127, 127, 0, ' ', 'on'),
(9, 1, 0, 3, '2', 128, 'һ', 1, 0, 127, 127, 127, 127, 0, ' ', 'on'),
(10, 2, 0, 3, '2', 128, 'һ', 1, 0, 127, 127, 127, 127, 0, ' ', 'on'),
(11, 3, 0, 3, '2', 128, 'һ', 1, 0, 127, 127, 127, 127, 0, ' ', 'on'),
(12, 4, 0, 3, '2', 128, 'һ', 1, 0, 127, 127, 127, 127, 0, ' ', 'on'),
(13, 1, 0, 3, '2', 128, '', 1, 0, 127, 127, 127, 127, 0, '', 'on'),
(14, 2, 0, 3, '2', 128, '', 1, 0, 127, 127, 127, 127, 0, '', 'on'),
(15, 3, 0, 3, '2', 128, '', 1, 0, 127, 127, 127, 127, 0, '', 'on');

-- --------------------------------------------------------

--
-- 表的结构 `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `time` datetime NOT NULL,
  `userid` varchar(50) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `operation` varchar(50) NOT NULL,
  PRIMARY KEY (`time`,`userid`),
  KEY `loguser` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `log`
--

INSERT INTO `log` (`time`, `userid`, `ip`, `operation`) VALUES
('2016-10-04 15:18:17', 'clever', '127.0.0.1', ''),
('2016-10-04 23:49:55', 'clever', '127.0.0.1', ''),
('2016-10-04 23:51:02', 'clever', '127.0.0.1', ''),
('2016-10-04 23:59:32', 'clever', '127.0.0.1', ''),
('2016-10-05 00:02:11', 'clever', '127.0.0.1', ''),
('2016-10-05 00:03:15', 'clever', '127.0.0.1', ' '),
('2016-10-05 00:03:46', 'clever', '127.0.0.1', ''),
('2016-10-05 00:14:31', 'clever', '127.0.0.1', ''),
('2016-10-05 00:15:30', 'clever', '127.0.0.1', ''),
('2016-10-05 00:16:52', 'clever', '127.0.0.1', ''),
('2016-10-05 00:17:33', 'clever', '127.0.0.1', ''),
('2016-10-05 00:19:03', 'clever', '127.0.0.1', ''),
('2016-10-05 00:20:17', 'clever', '127.0.0.1', ''),
('2016-10-05 00:28:13', 'clever', '127.0.0.1', ''),
('2016-10-05 00:28:25', 'clever', '127.0.0.1', ''),
('2016-10-05 00:28:31', 'clever', '127.0.0.1', ''),
('2016-10-05 03:17:12', 'clever', '127.0.0.1', ''),
('2016-10-05 11:57:00', 'clever', '127.0.0.1', ''),
('2016-10-05 16:44:42', 'clever', '127.0.0.1', ''),
('2016-10-05 16:45:11', 'clever', '127.0.0.1', ''),
('2016-10-05 16:45:13', 'clever', '127.0.0.1', ''),
('2016-10-05 17:55:19', 'clever', '127.0.0.1', ''),
('2016-10-05 17:55:22', 'clever', '127.0.0.1', ''),
('2016-10-06 09:29:32', 'clever', '127.0.0.1', ''),
('2016-10-06 09:29:41', 'clever', '127.0.0.1', ''),
('2016-10-06 09:30:00', 'clever', '127.0.0.1', '');

-- --------------------------------------------------------

--
-- 表的结构 `study`
--

CREATE TABLE IF NOT EXISTS `study` (
  `instrumentid` int(11) NOT NULL,
  `studyid` int(11) NOT NULL,
  `errordata` char(255) NOT NULL,
  `smalldata` char(255) NOT NULL,
  `studytime` datetime DEFAULT NULL,
  `errordigit` tinyint(2) DEFAULT NULL,
  `errortime` datetime DEFAULT NULL,
  `frequency` int(10) unsigned zerofill DEFAULT NULL,
  PRIMARY KEY (`studyid`),
  KEY `studyinstrument` (`instrumentid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userid` varchar(50) NOT NULL,
  `password` varchar(80) NOT NULL,
  `username` varchar(50) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`userid`, `password`, `username`) VALUES
('clever', '58b21a134b22a29d4c7f0925d5974fce', 'clever');

--
-- 限制导出的表
--

--
-- 限制表 `camera`
--
ALTER TABLE `camera`
  ADD CONSTRAINT `camerauser` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- 限制表 `data`
--
ALTER TABLE `data`
  ADD CONSTRAINT `datainstrument` FOREIGN KEY (`instrumentid`) REFERENCES `instrument` (`instrumentid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- 限制表 `error`
--
ALTER TABLE `error`
  ADD CONSTRAINT `errorinstrument` FOREIGN KEY (`instrumentid`) REFERENCES `instrument` (`instrumentid`);

--
-- 限制表 `instrument`
--
ALTER TABLE `instrument`
  ADD CONSTRAINT `instrumentcamera` FOREIGN KEY (`cameraid`) REFERENCES `camera` (`cameraid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- 限制表 `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `loguser` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- 限制表 `study`
--
ALTER TABLE `study`
  ADD CONSTRAINT `studyinstrument` FOREIGN KEY (`instrumentid`) REFERENCES `instrument` (`instrumentid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
