-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2019 年 01 月 08 日 10:16
-- 服务器版本: 5.5.53
-- PHP 版本: 5.4.45

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `apicms`
--

-- --------------------------------------------------------

--
-- 表的结构 `kq_admin_user`
--

CREATE TABLE IF NOT EXISTS `kq_admin_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '' COMMENT '用户名',
  `password` char(32) NOT NULL DEFAULT '' COMMENT '密码',
  `last_login_ip` varchar(30) NOT NULL DEFAULT '' COMMENT '最后登录IP',
  `last_login_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  `listorder` int(8) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`),
  KEY `username` (`username`,`create_time`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='管理员表' AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `kq_admin_user`
--

INSERT INTO `kq_admin_user` (`id`, `username`, `password`, `last_login_ip`, `last_login_time`, `listorder`, `status`, `create_time`, `update_time`) VALUES
(1, 'admin', 'ef74f212234fd4ef280efad5df91c2e2', '127.0.0.1', 1546569460, 0, 1, 1536135712, 1546569460),
(2, 'admin123', 'ef74f212234fd4ef280efad5df91c2e2', '127.0.0.1', 1536304880, 0, 1, 1536304811, 1536304880),
(3, 'ceshi', '1192720a4552c4e7d5c5b8c3703abd80', '', 0, 0, 1, 1537250968, 1537250968);

-- --------------------------------------------------------

--
-- 表的结构 `kq_banner`
--

CREATE TABLE IF NOT EXISTS `kq_banner` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(80) NOT NULL,
  `thumb` varchar(100) NOT NULL,
  `url` varchar(255) NOT NULL,
  `type` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '图片类型0大图1小程序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `kq_banner`
--

INSERT INTO `kq_banner` (`id`, `title`, `thumb`, `url`, `type`) VALUES
(1, '小图1', '/upload/20181228/39892bd0ed47c92a70a1d99733f3a8ee.png', '', 1),
(2, '小图2', '/upload/20181226/5f117054adecf1b24eabaab8b1cd7fe8.png', '', 1),
(3, '大图', '/upload/20181227/84ac2bed6ca5d3e9f88380369a3ef6d0.jpg', '', 0);

-- --------------------------------------------------------

--
-- 表的结构 `kq_category`
--

CREATE TABLE IF NOT EXISTS `kq_category` (
  `cat_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(30) NOT NULL COMMENT '栏目名称',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '栏目类型：0栏目列表1单页',
  `parentid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '上级栏目id',
  `is_show` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '前端显示1显示0不显示',
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- 转存表中的数据 `kq_category`
--

INSERT INTO `kq_category` (`cat_id`, `cat_name`, `type`, `parentid`, `is_show`) VALUES
(1, '公司新闻', 0, 0, 1),
(2, '项目案例', 0, 0, 1),
(3, 'haha', 0, 0, 1),
(4, '阿伟', 0, 0, 1),
(5, '666', 0, 0, 1),
(6, '111', 0, 0, 1),
(7, '222', 0, 0, 1),
(9, '79787', 0, 1, 1),
(10, '4111', 0, 1, 1),
(11, '8888', 0, 9, 1),
(12, '88888', 0, 0, 1),
(13, '新闻', 0, 1, 1),
(14, '小程序', 0, 0, 1),
(15, '33333', 0, 0, 1),
(16, '哇哈哈哈1', 1, 0, 1);

-- --------------------------------------------------------

--
-- 表的结构 `kq_news`
--

CREATE TABLE IF NOT EXISTS `kq_news` (
  `news_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cat_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '栏目ID',
  `title` varchar(80) NOT NULL DEFAULT '',
  `keywords` char(20) NOT NULL DEFAULT '' COMMENT '关键词',
  `description` varchar(250) NOT NULL COMMENT '简介',
  `thumb` varchar(100) NOT NULL DEFAULT '' COMMENT '缩略图',
  `is_position` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1：推荐2：不推荐',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`news_id`),
  KEY `title_2` (`title`),
  KEY `create_time` (`create_time`),
  KEY `news_id` (`news_id`),
  FULLTEXT KEY `title` (`title`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- 转存表中的数据 `kq_news`
--

INSERT INTO `kq_news` (`news_id`, `cat_id`, `title`, `keywords`, `description`, `thumb`, `is_position`, `create_time`, `update_time`) VALUES
(1, 1, 'dawdaw', 'awdad', 'awdawd', '', 0, 1543546278, 1543546278),
(2, 1, 'awdawd', 'awd', 'awdawd', '', 0, 1543546704, 1543546704),
(3, 1, 'awd123', '123123', '123123', '', 0, 1543546796, 1543546796),
(4, 1, 'zxc', 'zxczxc', 'zxczxc', '', 0, 1543547464, 1543547464),
(5, 1, 'zxczxc', 'zxc', 'zxczxc', '', 0, 1543547624, 1543547624),
(6, 1, 'ghjghj', 'ghjgj', 'ghjghj', '', 0, 1543547788, 1543547788),
(7, 11, '哈哈哈', '哈哈哈', '哈哈哈哈哈哈哈哈哈', 'http://piw7mn7ws.bkt.clouddn.com/2018/11/f49b6201811301131076932.png', 0, 1543548676, 1543548676),
(8, 12, '啊啊啊啊', '啊啊啊啊', '啊啊啊啊啊啊啊啊啊啊啊啊', '', 0, 1543548932, 1543548932),
(9, 1, '不那么不那么', '不那么不那么', '不那么不那么', '', 0, 1543549114, 1543549114),
(10, 1, '就就就', '就就就', '就就就', '', 0, 1543549307, 1543549307),
(11, 1, '测试', '测试测试测试', '测试测试测试测试', 'http://piw7mn7ws.bkt.clouddn.com/2018/11/c0af8201811301151376355.png', 0, 1543549900, 1543549900),
(12, 13, '啪啪啪啪啪啪', '啪啪啪啪啪啪', '啪啪啪啪啪啪', '', 1, 1543564581, 1545275756),
(13, 2, 'qweqe', 'qweqwe', 'qweqwe', '', 1, 1544592689, 1544690001),
(14, 2, '推荐', '推荐', '推荐推荐推荐', '', 1, 1544594055, 1546574076),
(16, 2, '88855122', '啊呜大碗大', '瓦达问答问答', '/upload/20181226/ed718ebf9316fca92ea1c08d725e68ab.png', 1, 1545803197, 1545803197);

-- --------------------------------------------------------

--
-- 表的结构 `kq_news_data`
--

CREATE TABLE IF NOT EXISTS `kq_news_data` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `news_id` mediumint(8) unsigned NOT NULL COMMENT '文章关联ID',
  `content` mediumtext NOT NULL COMMENT '内容',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `news_id` (`news_id`),
  FULLTEXT KEY `content` (`content`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `kq_news_data`
--

INSERT INTO `kq_news_data` (`id`, `news_id`, `content`, `create_time`, `update_time`) VALUES
(1, 1, '0', 1543546704, 1543546704),
(2, 1, '0', 1543546796, 1543546796),
(3, 1, '0', 1543547624, 1543547624),
(4, 1, '<p>ghjghjghj</p>', 1543547788, 1543547788),
(5, 1, '<p>哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈</p>', 1543548676, 1543548676),
(6, 10, '<p>就就就就就就</p>', 1543549307, 1543549307),
(7, 11, '<p>测试测试测试测试</p>', 1543549900, 1543549900),
(8, 12, '<p>啪啪啪啪啪啪啪啪啪啪啪啪啪啪啪啪啪啪</p>								', 1543564581, 1545275756),
(9, 13, '<p>wadawdawd</p>								', 1544592689, 1544690001),
(10, 14, '<p>321321321321<img src="http://api.com/ueditor/php/upload/image/20190104/1546574073878278.jpg" title="1546574073878278.jpg" alt="2.jpg"/></p>																												', 1544594055, 1546574076),
(11, 15, '<p>654654654111<br/></p>																																																																																																																																																', 1544595739, 1545190934),
(12, 16, '<p>啊万达万达万达万达</p>', 1545803197, 1545803197);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
