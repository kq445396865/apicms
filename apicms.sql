-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2018 年 09 月 18 日 16:22
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
(1, 'admin', 'ef74f212234fd4ef280efad5df91c2e2', '127.0.0.1', 1537250630, 0, 1, 1536135712, 1537250630),
(2, 'admin123', 'ef74f212234fd4ef280efad5df91c2e2', '127.0.0.1', 1536304880, 0, 1, 1536304811, 1536304880),
(3, 'ceshi', '1192720a4552c4e7d5c5b8c3703abd80', '', 0, 0, 1, 1537250968, 1537250968);

-- --------------------------------------------------------

--
-- 表的结构 `kq_category`
--

CREATE TABLE IF NOT EXISTS `kq_category` (
  `cat_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(30) NOT NULL COMMENT '栏目名称',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '栏目类型：0栏目列表1单页',
  `parentid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '上级栏目id',
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `kq_category`
--

INSERT INTO `kq_category` (`cat_id`, `cat_name`, `type`, `parentid`) VALUES
(1, '中国', 0, 0),
(2, '美国', 0, 0),
(3, '加拿大', 0, 0),
(4, '韩国', 1, 0),
(5, '太原', 0, 1),
(6, '华盛顿', 0, 2),
(7, '纽约', 0, 2),
(8, '杏花岭区', 0, 5),
(9, '五一路', 0, 8),
(10, '尖草坪区', 0, 5),
(11, '迎泽区', 0, 5),
(12, '晋源区', 0, 5),
(13, '胜利街', 0, 8),
(14, '迎泽大街', 0, 11);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
