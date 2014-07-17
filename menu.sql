-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2014-07-17 11:59:51
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `menu`
--

-- --------------------------------------------------------

--
-- 表的结构 `menu_admins`
--

CREATE TABLE IF NOT EXISTS `menu_admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` char(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=48 ;

--
-- 转存表中的数据 `menu_admins`
--

INSERT INTO `menu_admins` (`id`, `username`, `password`) VALUES
(1, 'soothion', '8a5f1b8a54db96cec95bf3e67c7ae6f5');

-- --------------------------------------------------------

--
-- 表的结构 `menu_config`
--

CREATE TABLE IF NOT EXISTS `menu_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) CHARACTER SET utf8 NOT NULL,
  `keyword` varchar(100) CHARACTER SET utf8 NOT NULL,
  `des` varchar(250) CHARACTER SET utf8 NOT NULL,
  `tag` varchar(250) CHARACTER SET utf8 NOT NULL,
  `copyright` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `menu_config`
--

INSERT INTO `menu_config` (`id`, `title`, `keyword`, `des`, `tag`, `copyright`) VALUES
(1, '饭否', '', '蓝织-点餐系统', '', 'COPYRIGHT@软件部. ');

-- --------------------------------------------------------

--
-- 表的结构 `menu_item`
--

CREATE TABLE IF NOT EXISTS `menu_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rid` int(11) NOT NULL,
  `title` varchar(50) CHARACTER SET utf8 NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(100) CHARACTER SET utf8 NOT NULL,
  `hots` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `menu_item`
--

INSERT INTO `menu_item` (`id`, `rid`, `title`, `price`, `image`, `hots`) VALUES
(1, 1, '小炒肉', 10, '', 0),
(2, 1, '豆腐', 10, '', 0),
(3, 1, '随便', 100, '', 0),
(4, 1, '青菜', 20, '', 0),
(5, 2, '西红柿', 5, '', 0),
(6, 2, '蛋炒饭', 10, '', 0),
(7, 1, '鸡柳', 15, '', 0),
(8, 2, '红烧鱼', 20, '', 0),
(9, 1, '猪红', 20, '', 0);

-- --------------------------------------------------------

--
-- 表的结构 `menu_module`
--

CREATE TABLE IF NOT EXISTS `menu_module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- 表的结构 `menu_order`
--

CREATE TABLE IF NOT EXISTS `menu_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `status` enum('pending','submit','return','paid','cancel') CHARACTER SET utf8 DEFAULT NULL,
  `pay` int(11) NOT NULL,
  `addtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `menu_order`
--

INSERT INTO `menu_order` (`id`, `uid`, `status`, `pay`, `addtime`) VALUES
(1, 1, 'pending', 0, '2014-07-17 07:49:15');

-- --------------------------------------------------------

--
-- 表的结构 `menu_order_detail`
--

CREATE TABLE IF NOT EXISTS `menu_order_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `oid` int(11) NOT NULL,
  `iid` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `addtime` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `menu_restaurant`
--

CREATE TABLE IF NOT EXISTS `menu_restaurant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `tel` varchar(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `name` varchar(10) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `menu_restaurant`
--

INSERT INTO `menu_restaurant` (`id`, `title`, `tel`, `address`, `name`, `sort`) VALUES
(1, '一品佳 ', '123456789', '深圳123', '一品佳', 10),
(2, '翠竹园', '5465132', '', '', 0);

-- --------------------------------------------------------

--
-- 表的结构 `menu_user`
--

CREATE TABLE IF NOT EXISTS `menu_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(16) NOT NULL,
  `password` varchar(32) NOT NULL,
  `name` varchar(20) NOT NULL,
  `tel` varchar(11) NOT NULL,
  `qq` varchar(12) NOT NULL,
  `skype` varchar(20) NOT NULL,
  `addtime` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `menu_user`
--

INSERT INTO `menu_user` (`id`, `username`, `password`, `name`, `tel`, `qq`, `skype`, `addtime`) VALUES
(1, 'soothion', 'xiaoxiaoyi', 'Vincent', '', '', '', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
