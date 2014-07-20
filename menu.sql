-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2014-07-20 17:04:57
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
(1, '货', '', '蓝织-点餐系统', '', 'COPYRIGHT@软件部. ');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `menu_order`
--

CREATE TABLE IF NOT EXISTS `menu_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `note` text CHARACTER SET utf8 NOT NULL,
  `status` enum('pending','submit','return','paid','cancel') CHARACTER SET utf8 DEFAULT NULL,
  `pay` int(11) NOT NULL,
  `addtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- 转存表中的数据 `menu_order`
--

INSERT INTO `menu_order` (`id`, `uid`, `note`, `status`, `pay`, `addtime`) VALUES
(9, 10, '', 'paid', 6, '2014-07-19 04:51:10'),
(23, 6, '', 'paid', 6, '2014-07-20 10:49:37'),
(25, 6, '', 'submit', 6, '2014-07-20 11:50:25'),
(26, 6, '订单信息', 'pending', 0, '2014-07-20 11:50:37'),
(27, 6, '订单信息', 'pending', 0, '2014-07-20 11:50:44'),
(28, 6, '订单信息', 'submit', 6, '2014-07-20 11:50:50'),
(29, 6, '订单信息', 'pending', 0, '2014-07-20 11:52:21'),
(30, 6, '订单信息', 'paid', 11, '2014-07-20 11:52:27'),
(32, 12, '', 'submit', 12, '2014-07-20 13:23:25'),
(35, 12, '', 'pending', 0, '2014-07-20 13:43:11');

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
  `addtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=119 ;

--
-- 转存表中的数据 `menu_order_detail`
--

INSERT INTO `menu_order_detail` (`id`, `oid`, `iid`, `title`, `price`, `addtime`) VALUES
(29, 7, 2, '豆腐', 10, '2014-07-19 02:22:20'),
(30, 7, 1, '小炒肉', 10, '2014-07-19 02:22:20'),
(32, 7, 5, '西红柿', 5, '2014-07-19 02:22:20'),
(35, 8, 3, '随便', 100, '2014-07-19 04:21:31'),
(36, 8, 4, '青菜', 20, '2014-07-19 04:21:31'),
(37, 9, 1, '小炒肉', 10, '2014-07-19 04:51:10'),
(38, 9, 2, '豆腐', 10, '2014-07-19 04:51:10'),
(39, 9, 3, '随便', 100, '2014-07-19 04:51:10'),
(40, 10, 1, '小炒肉', 10, '2014-07-19 04:52:06'),
(41, 10, 2, '豆腐', 10, '2014-07-19 04:52:06'),
(42, 10, 4, '青菜', 20, '2014-07-19 04:52:06'),
(43, 11, 1, '小炒肉', 10, '2014-07-19 04:52:42'),
(44, 11, 3, '随便', 100, '2014-07-19 04:52:42'),
(45, 12, 1, '小炒肉', 10, '2014-07-19 04:53:02'),
(46, 12, 2, '豆腐', 10, '2014-07-19 04:53:02'),
(47, 12, 3, '随便', 100, '2014-07-19 04:53:02'),
(48, 13, 6, '蛋炒饭', 10, '2014-07-19 04:54:01'),
(49, 13, 7, '鸡柳', 15, '2014-07-19 04:54:01'),
(50, 13, 5, '西红柿', 5, '2014-07-19 04:54:01'),
(51, 14, 2, '豆腐', 10, '2014-07-20 05:47:02'),
(52, 14, 1, '小炒肉', 10, '2014-07-20 05:47:02'),
(53, 15, 1, '小炒肉', 10, '2014-07-20 10:33:43'),
(54, 15, 2, '豆腐', 10, '2014-07-20 10:33:43'),
(55, 15, 3, '随便', 100, '2014-07-20 10:33:43'),
(56, 15, 4, '青菜', 20, '2014-07-20 10:33:43'),
(57, 16, 1, '小炒肉', 10, '2014-07-20 10:33:55'),
(58, 16, 2, '豆腐', 10, '2014-07-20 10:33:55'),
(59, 16, 3, '随便', 100, '2014-07-20 10:33:55'),
(60, 16, 4, '青菜', 20, '2014-07-20 10:33:55'),
(61, 17, 6, '蛋炒饭', 10, '2014-07-20 10:34:13'),
(62, 17, 5, '西红柿', 5, '2014-07-20 10:34:13'),
(63, 17, 9, '猪红', 20, '2014-07-20 10:34:13'),
(64, 18, 2, '豆腐', 10, '2014-07-20 10:44:27'),
(65, 18, 3, '随便', 100, '2014-07-20 10:44:27'),
(66, 18, 4, '青菜', 20, '2014-07-20 10:44:27'),
(67, 19, 7, '鸡柳', 15, '2014-07-20 10:44:34'),
(68, 19, 6, '蛋炒饭', 10, '2014-07-20 10:44:34'),
(69, 19, 5, '西红柿', 5, '2014-07-20 10:44:34'),
(70, 20, 9, '猪红', 20, '2014-07-20 10:44:41'),
(71, 20, 6, '蛋炒饭', 10, '2014-07-20 10:44:41'),
(72, 20, 5, '西红柿', 5, '2014-07-20 10:44:41'),
(73, 21, 2, '豆腐', 10, '2014-07-20 10:48:20'),
(74, 21, 1, '小炒肉', 10, '2014-07-20 10:48:20'),
(75, 21, 3, '随便', 100, '2014-07-20 10:48:20'),
(76, 22, 4, '青菜', 20, '2014-07-20 10:48:25'),
(77, 22, 7, '鸡柳', 15, '2014-07-20 10:48:25'),
(78, 22, 6, '蛋炒饭', 10, '2014-07-20 10:48:25'),
(79, 23, 1, '小炒肉', 10, '2014-07-20 10:49:37'),
(80, 23, 2, '豆腐', 10, '2014-07-20 10:49:37'),
(81, 23, 3, '随便', 100, '2014-07-20 10:49:37'),
(82, 23, 4, '青菜', 20, '2014-07-20 10:49:37'),
(83, 24, 6, '蛋炒饭', 10, '2014-07-20 10:49:42'),
(84, 24, 7, '鸡柳', 15, '2014-07-20 10:49:42'),
(85, 24, 8, '红烧鱼', 20, '2014-07-20 10:49:42'),
(86, 25, 1, '小炒肉', 10, '2014-07-20 11:50:25'),
(87, 25, 2, '豆腐', 10, '2014-07-20 11:50:25'),
(88, 25, 5, '西红柿', 5, '2014-07-20 11:50:25'),
(89, 25, 3, '随便', 100, '2014-07-20 11:50:25'),
(90, 26, 5, '西红柿', 5, '2014-07-20 11:50:37'),
(91, 26, 6, '蛋炒饭', 10, '2014-07-20 11:50:37'),
(92, 26, 7, '鸡柳', 15, '2014-07-20 11:50:37'),
(93, 26, 8, '红烧鱼', 20, '2014-07-20 11:50:37'),
(94, 27, 6, '蛋炒饭', 10, '2014-07-20 11:50:44'),
(95, 27, 9, '猪红', 20, '2014-07-20 11:50:44'),
(96, 28, 3, '随便', 100, '2014-07-20 11:50:50'),
(97, 29, 6, '蛋炒饭', 10, '2014-07-20 11:52:21'),
(98, 29, 7, '鸡柳', 15, '2014-07-20 11:52:21'),
(99, 29, 8, '红烧鱼', 20, '2014-07-20 11:52:21'),
(100, 30, 3, '随便', 100, '2014-07-20 11:52:27'),
(101, 30, 2, '豆腐', 10, '2014-07-20 11:52:27'),
(102, 30, 1, '小炒肉', 10, '2014-07-20 11:52:27'),
(103, 31, 2, '豆腐', 10, '2014-07-20 11:54:15'),
(104, 31, 3, '随便', 100, '2014-07-20 11:54:15'),
(105, 32, 1, '小炒肉', 10, '2014-07-20 13:23:25'),
(106, 32, 2, '豆腐', 10, '2014-07-20 13:23:25'),
(107, 32, 3, '随便', 100, '2014-07-20 13:23:25'),
(108, 33, 6, '蛋炒饭', 10, '2014-07-20 13:24:06'),
(109, 33, 8, '红烧鱼', 20, '2014-07-20 13:24:06'),
(110, 33, 4, '青菜', 20, '2014-07-20 13:24:06'),
(111, 34, 8, '红烧鱼', 20, '2014-07-20 13:24:27'),
(112, 34, 7, '鸡柳', 15, '2014-07-20 13:24:27'),
(113, 34, 6, '蛋炒饭', 10, '2014-07-20 13:24:27'),
(114, 35, 1, '小炒肉', 10, '2014-07-20 13:43:11'),
(115, 35, 2, '豆腐', 10, '2014-07-20 13:43:11'),
(116, 35, 3, '随便', 100, '2014-07-20 13:43:11'),
(117, 35, 9, '猪红', 20, '2014-07-20 13:43:11'),
(118, 35, 7, '鸡柳', 15, '2014-07-20 13:43:11');

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
-- 表的结构 `menu_users`
--

CREATE TABLE IF NOT EXISTS `menu_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(16) NOT NULL,
  `password` varchar(32) NOT NULL,
  `name` varchar(20) NOT NULL,
  `tel` varchar(11) NOT NULL,
  `qq` varchar(12) NOT NULL,
  `skype` varchar(20) NOT NULL,
  `alipay` varchar(50) NOT NULL,
  `addtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `menu_users`
--

INSERT INTO `menu_users` (`id`, `username`, `password`, `name`, `tel`, `qq`, `skype`, `alipay`, `addtime`) VALUES
(12, 'soothion', '8a5f1b8a54db96cec95bf3e67c7ae6f5', 'doraprince', '18617185201', '', '', 'asdfasdf@sina.com', '2014-07-20 12:40:43'),
(13, 'doraprince', '8a5f1b8a54db96cec95bf3e67c7ae6f5', 'xiaoxiaoyi', '', '', '', '', '2014-07-20 12:51:44'),
(14, 'afafasdf', 'adca4977cb42016071530fb8888105c7', 'asdfasdf', '', '', '', '', '2014-07-20 12:54:38');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
