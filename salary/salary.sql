# Host: localhost  (Version: 5.5.53)
# Date: 2020-02-03 17:50:05
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "salary"
#

DROP TABLE IF EXISTS `salary`;
CREATE TABLE `salary` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `money` varchar(255) DEFAULT NULL COMMENT '工资',
  `notice` varchar(255) DEFAULT NULL COMMENT '备注',
  `dtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '时间戳',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='工资';

#
# Data for table "salary"
#

/*!40000 ALTER TABLE `salary` DISABLE KEYS */;
/*!40000 ALTER TABLE `salary` ENABLE KEYS */;
