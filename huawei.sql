-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2014-07-21 17:08:24
-- 服务器版本： 5.1.73
-- PHP Version: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `huawei`
--
CREATE DATABASE IF NOT EXISTS `huawei` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `huawei`;

-- --------------------------------------------------------

--
-- 表的结构 `download`
--

CREATE TABLE IF NOT EXISTS `download` (
  `download_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  `create_time` datetime DEFAULT NULL,
  PRIMARY KEY (`download_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `download`
--

INSERT INTO `download` (`download_id`, `user_id`, `file_id`, `create_time`) VALUES
(1, 1, 2, '2014-07-15 00:00:00'),
(2, 1, 6, '2014-07-16 00:00:00'),
(3, 1, 5, '2014-07-18 00:00:00'),
(4, 1, 9, '2014-07-17 11:00:00');

-- --------------------------------------------------------

--
-- 表的结构 `file`
--

CREATE TABLE IF NOT EXISTS `file` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(45) NOT NULL,
  `file_path` varchar(45) NOT NULL,
  `file_size` int(11) NOT NULL,
  `create_time` datetime DEFAULT NULL,
  PRIMARY KEY (`file_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `file`
--

INSERT INTO `file` (`file_id`, `file_name`, `file_path`, `file_size`, `create_time`) VALUES
(1, '舌尖上的中国.txt', '舌尖上的中国.txt', 13, '2014-07-20 00:00:00'),
(2, '春光.png', '春光.png', 144, '2014-07-19 00:00:00'),
(3, '夏天.png', '夏天.png', 34, '2014-07-18 00:00:00'),
(4, '秋天.png', '秋天.png', 43, '2014-07-17 00:00:00'),
(5, '不要说话.mp3', '不要说话.mp3', 4534, '2014-07-16 00:00:00'),
(6, '十年.mp3', '十年.mp3', 345, '2014-07-15 00:00:00'),
(7, '一无所有.mp3', '一无所有.mp3', 454, '2014-07-14 00:00:00'),
(8, '一无所.mp3', '一无所.mp3', 454, '2014-07-14 00:00:00'),
(9, '神探夏洛克.rmvb', '神探夏洛克.rmvb', 56565, '2014-07-17 00:00:00'),
(10, '大师傅.cb', '大师傅.cb', 55, '2014-07-10 00:00:00'),
(11, '遇到的麻烦是当一个.doc', '遇到的麻烦是当一个.doc', 1, '2014-07-21 13:21:39'),
(12, '复仇者联盟.mp4', '复仇者联盟.mp4', 4, '2014-07-20 19:34:54');

-- --------------------------------------------------------

--
-- 表的结构 `file_relation`
--

CREATE TABLE IF NOT EXISTS `file_relation` (
  `file_relation_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL COMMENT 'file_id æˆ– folder_i',
  `type` tinyint(4) NOT NULL COMMENT '0 file',
  `locate` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0     æ ¹',
  PRIMARY KEY (`file_relation_id`),
  KEY `index_user` (`user_id`),
  KEY `index_folder` (`locate`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `file_relation`
--

INSERT INTO `file_relation` (`file_relation_id`, `user_id`, `file_id`, `type`, `locate`) VALUES
(1, 1, 1, 0, 0),
(2, 1, 2, 0, 0),
(3, 1, 3, 0, 0),
(4, 1, 4, 0, 1),
(5, 1, 5, 0, 0),
(6, 1, 6, 0, 0),
(7, 1, 7, 0, 0),
(8, 1, 8, 0, 0),
(9, 1, 9, 0, 0),
(10, 1, 10, 0, 0),
(11, 1, 1, 1, 0),
(12, 1, 11, 0, 0),
(13, 1, 12, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `file_sort`
--

CREATE TABLE IF NOT EXISTS `file_sort` (
  `file_sort_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  `file_type` tinyint(4) NOT NULL COMMENT '1 æ–‡æ¡£\n2 å›¾ç‰‡\n3',
  PRIMARY KEY (`file_sort_id`),
  KEY `index_user` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `file_sort`
--

INSERT INTO `file_sort` (`file_sort_id`, `user_id`, `file_id`, `file_type`) VALUES
(3, 1, 1, 1),
(4, 1, 2, 2),
(5, 1, 3, 2),
(6, 1, 4, 2),
(7, 1, 5, 3),
(8, 1, 6, 3),
(9, 1, 7, 3),
(10, 1, 8, 3),
(11, 1, 9, 4),
(12, 1, 10, 5),
(13, 1, 11, 1),
(14, 1, 12, 4);

-- --------------------------------------------------------

--
-- 表的结构 `folder`
--

CREATE TABLE IF NOT EXISTS `folder` (
  `folder_id` int(11) NOT NULL AUTO_INCREMENT,
  `folder_name` varchar(20) NOT NULL,
  `folder_size` int(11) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  PRIMARY KEY (`folder_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `folder`
--

INSERT INTO `folder` (`folder_id`, `folder_name`, `folder_size`, `create_time`) VALUES
(1, '新建文件夹', NULL, NULL),
(2, '娱乐', NULL, NULL),
(3, '学习', NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `upload`
--

CREATE TABLE IF NOT EXISTS `upload` (
  `upload_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  `create_time` datetime DEFAULT NULL,
  PRIMARY KEY (`upload_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `upload`
--

INSERT INTO `upload` (`upload_id`, `user_id`, `file_id`, `create_time`) VALUES
(1, 1, 1, '2014-07-08 00:00:00'),
(2, 1, 2, '2014-07-09 00:00:00'),
(3, 1, 5, '2014-07-16 00:00:00'),
(4, 1, 7, '2014-07-10 00:00:00'),
(5, 1, 9, '2014-07-11 00:00:00');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `password`) VALUES
(1, 'demo', 'demo'),
(2, 'test', 'test');

-- --------------------------------------------------------

--
-- 表的结构 `volume`
--

CREATE TABLE IF NOT EXISTS `volume` (
  `volume_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `volume_used` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`volume_id`),
  KEY `index_user` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `volume`
--

INSERT INTO `volume` (`volume_id`, `user_id`, `volume_used`) VALUES
(1, 1, 500000000),
(2, 2, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
