-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1
-- 生成日期: 2013 年 09 月 23 日 23:00
-- 服务器版本: 5.5.27
-- PHP 版本: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `test`
--

-- --------------------------------------------------------

--
-- 表的结构 `device_manage`
--

CREATE TABLE IF NOT EXISTS `device_manage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adddate` date DEFAULT NULL,
  `updatedate` date DEFAULT NULL,
  `room` int(11) DEFAULT NULL,
  `position` varchar(10) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `ip` varchar(100) DEFAULT NULL,
  `devname` tinytext,
  `sysname` tinytext,
  `detail` tinytext,
  `projnum` varchar(30) DEFAULT NULL,
  `projname` tinytext,
  `assetnum` varchar(30) DEFAULT NULL,
  `objnum` varchar(30) DEFAULT NULL,
  `memo` tinytext,
  `belongdep` varchar(60) DEFAULT NULL,
  `usingdep` varchar(60) DEFAULT NULL,
  `manager` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- 转存表中的数据 `device_manage`
--

INSERT INTO `device_manage` (`id`, `adddate`, `updatedate`, `room`, `position`, `status`, `ip`, `devname`, `sysname`, `detail`, `projnum`, `projname`, `assetnum`, `objnum`, `memo`, `belongdep`, `usingdep`, `manager`) VALUES
(2, '2013-09-16', '2013-09-16', 4, 'A5-H111', '在用', '202.103.160.33', NULL, '1', 'dul-core cpu\r\n4G RAM\r\n55', '25846', '虚拟主机', '02156625553', '025544525636', '屋', '政企客户支撑中心', 'IT室', '陈永鑫'),
(3, '2013-09-16', '2013-09-16', 4, 'A5-H111', '在用', '202.103.160.33', NULL, '1', 'dul-core cpu\r\n4G RAM\r\n55', '25846', '虚拟主机', '02156625553', '025544525636', '屋', '政企客户支撑中心', 'IT室', '陈永鑫'),
(4, '2013-09-16', '2013-09-16', 4, 'H7-A10', '在用', '10.5.10.5', 'SUN server', '计费系统', '2\r\n4\r\n73G HD', '2545', '25421', '12545', '22552542', '申迪维保', 'noc', 'noc', 'cc'),
(7, '2013-09-17', '2013-09-17', 1, 'A5-H111', '在用', '202.103.160.33', '', '1', 'dul-core cpu\r\n4G RAM\r\n55', '25846', '虚拟主机', '02156625553', '025544525636', '屋', '政企客户支撑中心', 'IT室', '陈永鑫'),
(8, '2013-09-17', '2013-09-17', 0, 'A5-H11', '在用', '202.103.160.33', '', '1', 'dul-core cpu\r\n4G RAM\r\n55', '25846', '虚拟主机', '02156625553', '025544525636', '2013-9-17 0:15:37\r\n陈永鑫 编辑', '政企客户支撑中心', 'IT室', '陈永鑫'),
(10, '2013-09-17', '2013-09-17', 4, 'H7-A10', '在用', '202.103.160.33', 'DELL 380 G4', '1', 'dul-core cpu\r\n4G RAM\r\n55', '25846', '虚拟主机', '02156625553', '025544525636', '2013-9-17 0:15:37\r\n陈永鑫 编辑', '政企客户支撑中心', 'IT室', '陈永鑫'),
(20, '2013-09-18', '2013-09-18', 3, '22', '在用', '202.103.152.36', '', '', '', '', '', '5525', '25', '', '', '', ''),
(21, '2013-09-18', '2013-09-18', 1, 'H7-A10', '在用', '10.25.32.33', '525222', '1252', '', '', '', '252456', '', '', '', '', ''),
(22, '2013-09-18', '2013-09-19', 2, 'H7-A10', '在用', '10.25.32.31', '', '253253', '452', '', '', '252456', '', '', '', '', ''),
(23, '2013-09-18', '2013-09-18', 0, 'H7-A10', '在用', '10.25.32.33', '123456789', '258', '', '', '', '252456', '', '', '', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
