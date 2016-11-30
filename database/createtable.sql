-- --------------------------------------------------------
-- ホスト:                          localhost
-- サーバのバージョン:                    5.5.47 - MySQL Community Server (GPL) by Remi
-- サーバー OS:                      Linux
-- HeidiSQL バージョン:               9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for entrancedata
CREATE DATABASE IF NOT EXISTS `entrancedata` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `entrancedata`;


-- Dumping structure for テーブル entrancedata.entrance_datas
CREATE TABLE IF NOT EXISTS `entrance_datas` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `RECORD_DATE` date NOT NULL COMMENT '日付',
  `ENT_NAME` varchar(40) COLLATE utf8_unicode_ci COMMENT '出社氏名',
  `ENT_TIME` time NOT NULL DEFAULT '08:00:00' COMMENT '出社時間',
  `ENT_COMMENT` varchar(400) COLLATE utf8_unicode_ci COMMENT 'コメント',
  `LEAVE_NAME` varchar(40) COLLATE utf8_unicode_ci COMMENT '退社氏名',
  `LEAVE_TIME` time NOT NULL DEFAULT '20:00:00' COMMENT '退社時間',
  `LEAVE_CLEAR` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT 'クリアデスク',
  `LEAVE_WINDOW` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT '窓の施錠',
  `LEAVE_PRINTER` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT 'プリンタOFF',
  `LEAVE_HUMID` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT '加湿器OFF',
  `LEAVE_AIRCLEANER` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT '空気清浄機OFF',
  `LEAVE_FAX` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT 'FAX・コピー確認',
  `LEAVE_AIRCON` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT 'エアコンOFF',
  `LEAVE_SEAIRCON` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT 'サーバー室エアコンON',
  `LEAVE_LIGHT` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT '全室の消灯',
  `LEAVE_KEY` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '使用した鍵',
  `LEAVE_COMMENT` varchar(100) COLLATE utf8_unicode_ci COMMENT 'その他のコメント',
  `MANAGER_CHECK` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT '管理者チェック',
  `CREATE_DATETIME` datetime COMMENT '作成日時',
  `UPDATE_DATETIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新日時',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='出退情報管理';



-- Dumping structure for テーブル entrancedata.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ユーザー名',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'パスワード',
  `created` datetime NOT NULL COMMENT '作成時間',
  `modified` datetime NOT NULL COMMENT '更新時間',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



-- Dumping structure for テーブル entrancedata.keys
CREATE TABLE IF NOT EXISTS `keys` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `key` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'キー',
  `val` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '値',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
CREATE UNIQUE INDEX `keys_udx` ON `keys` (`key`);
INSERT INTO `keys` VALUES (1, 'USEAGE_OFFICE', 'None'); /* Enable value is "4F", "7F", "LCM" only */

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
