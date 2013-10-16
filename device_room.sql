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
-- 表的结构 `device_room`
--

CREATE TABLE IF NOT EXISTS `device_room` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adddate` date DEFAULT NULL,
  `roomname` varchar(50) DEFAULT NULL,
  `shelfrows` tinyint(4) DEFAULT NULL,
  `shelfcols` tinyint(4) DEFAULT NULL,
  `devsum` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `device_room`
--

INSERT INTO `device_room` (`id`, `adddate`, `roomname`, `shelfrows`, `shelfcols`, `devsum`) VALUES
(1, '2013-09-18', '大富机房', 10, 9, 2),
(2, '2013-09-18', '南庄机房', 5, 7, 1),
(3, '2013-09-18', '亲仁5楼IDC机房', 10, 8, 1),
(4, '2013-09-18', '信息大厦11楼IT信息机房Z03', 13, 17, 4);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
