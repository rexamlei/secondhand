-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2018 年 11 月 12 日 15:10
-- 服务器版本: 5.5.53
-- PHP 版本: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `second_hand`
--

-- --------------------------------------------------------

--
-- 表的结构 `s_admin`
--

CREATE TABLE IF NOT EXISTS `s_admin` (
  `aUser` varchar(50) NOT NULL,
  `aPwd` varchar(50) NOT NULL,
  `aIp` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`aUser`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `s_admin`
--

INSERT INTO `s_admin` (`aUser`, `aPwd`, `aIp`) VALUES
('admin', 'admin', '127.0.0.1');

-- --------------------------------------------------------

--
-- 表的结构 `s_detail`
--

CREATE TABLE IF NOT EXISTS `s_detail` (
  `dId` int(11) NOT NULL AUTO_INCREMENT,
  `dGid` int(11) NOT NULL,
  `dOid` varchar(20) NOT NULL,
  `dMoney` float NOT NULL,
  `dNum` int(11) NOT NULL,
  `dOther` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`dId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `s_goods`
--

CREATE TABLE IF NOT EXISTS `s_goods` (
  `gId` int(11) NOT NULL AUTO_INCREMENT,
  `gName` varchar(255) NOT NULL,
  `gPrice` float NOT NULL,
  `gNum` int(11) NOT NULL,
  `gImg` varchar(255) NOT NULL,
  `gQuality` varchar(50) DEFAULT NULL,
  `gColor` varchar(50) DEFAULT NULL,
  `gBrand` varchar(50) DEFAULT NULL,
  `gWeight` float DEFAULT NULL,
  `gState` int(11) DEFAULT '1',
  `gCreateTime` datetime DEFAULT NULL,
  `gUpdateTime` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `gText` text NOT NULL,
  PRIMARY KEY (`gId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `s_order`
--

CREATE TABLE IF NOT EXISTS `s_order` (
  `oId` varchar(20) NOT NULL,
  `oUid` int(11) NOT NULL,
  `oCreatetime` datetime DEFAULT NULL,
  `oUpdateTime` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `oState` int(11) DEFAULT '0',
  `oMoney` float NOT NULL,
  `oPstate` int(11) DEFAULT NULL COMMENT '商品是否缺货',
  `oOther` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`oId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `s_recharge`
--

CREATE TABLE IF NOT EXISTS `s_recharge` (
  `rId` int(11) NOT NULL AUTO_INCREMENT,
  `rOrder` varchar(100) NOT NULL,
  `rUid` int(11) NOT NULL,
  `rTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rState` int(11) NOT NULL DEFAULT '0',
  `rType` varchar(50) NOT NULL,
  `rMoney` float NOT NULL DEFAULT '0',
  `rOther` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`rId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `s_user`
--

CREATE TABLE IF NOT EXISTS `s_user` (
  `uId` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `uUserName` varchar(20) NOT NULL,
  `uName` varchar(10) NOT NULL DEFAULT 'NULL' COMMENT '姓名',
  `uPwd` varchar(20) NOT NULL COMMENT '密码',
  `uSex` varchar(2) DEFAULT NULL COMMENT '性别',
  `uState` int(11) DEFAULT '1' COMMENT '状态，默认1',
  `uMoney` float NOT NULL DEFAULT '0' COMMENT '余额',
  `uTel` varchar(11) DEFAULT NULL COMMENT '电话',
  `uEmail` varchar(30) NOT NULL COMMENT '电邮',
  `uAddress` varchar(100) NOT NULL COMMENT '地址',
  `uCreateTime` datetime NOT NULL COMMENT '创建时间',
  `uUpdateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '修改时间',
  `uText` text NOT NULL COMMENT '其他说明',
  PRIMARY KEY (`uId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
