
--	BEGIN DEVELOPER COMMENTS:

--	--	--	--	--	--	--	--	--	--	--	--	--	--	--	--	--	--	--
--
-- ATTENTION! ACHTUNG!
-- THIS TEXT IS AN SQL COMMENT (AS ARE THE FOLLOWING SEVERAL LINES)
-- SQL comments are 2 dash symbols ( - ) appearing at columns 1 and 2 of a line
--
--		USE SQL COMMENTS TO TAILOR THE SQL FOR SPECIAL SITUATIONS
--
--	--	--	--	--	--	--	--	--	--	--	--	--	--	--	--	--	--	--
--
-- EXAMPLE #1: DATABASE EXISTS BUT WE WISH TO DESTROY EXISTING DATA.
--		USE "DROP ... IF EXISTS" SYNTAX LIKE SO:
--
--	DROP TABLE IF EXISTS `tablename_hasdata`;
--	CREATE TABLE ... (table details, etc.)
--
-- 		--		--		--		--		--		--		--		--		--
--
-- EXAMPLE #2: UNCERTAIN OF THE CONDITION OF EXISTING DB OR TABLES VS THE SQL
-- ... HOWEVER WE WISH TO MAINTAIN DATA IN TABLES WHICH MAY EXIST SERVER-SIDE
-- ... WE USE THE "CREATE ... IF NOT EXISTS" SYNTAX LIKE SO:
--
--	CREATE TABLE IF NOT EXISTS `tablename_hasdata`;
--
-- USE "IF NOT EXISTS" TO ENSURE ALL WEB APP REQUIRED TABLES ARE READY FOR USE
--	... WHILE AVOIDING UNNECESSARY DESTRUCTION OF DATA WHICH MAY BE PRESENT
--
--	--	--	--	--	--	--	--	--	--	--	--	--	--	--	--	--	--	--
-- CONSULT MYSQL.COM FOR THE COMPLETE DOCUMENTATION FOR YOUR VERSION OF MYSQL

--	:END DEVELOPER COMMENTS
--
--	--	--	--	--	--	--	--	--	--	--	--	--	--	--	--	--	--	--
-- Host: localhost
-- Generation Time: June 2011
-- Server version: 5.1.54
-- PHP Version: 5.3.5
-- MySQL dump 10.11
--
-- Host: localhost    Database: anniedebrowsa
-- ------------------------------------------------------
--

CREATE DATABASE IF NOT EXISTS `anniedebrowsa`;

USE `anniedebrowsa`;

GRANT SELECT, INSERT, UPDATE, DELETE, CREATE VIEW, SHOW VIEW ON * . * TO 'adbdba'@'localhost' IDENTIFIED BY 'iv3gqfsxt3n9'

-- SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `anniedebrowsa`
--

-- --------------------------------------------------------

--
-- Table structure for table `adb_settings`
--

-- TABLE ADB_SETTINGS IS THE KEY TO CUSTOMIZING ANNIEDEBROWSA FOR ANY DIRECTORY


CREATE TABLE IF NOT EXISTS `adb_settings` (
  `set_id` int(11) NOT NULL AUTO_INCREMENT,
  `set_substr` varchar(254) NOT NULL COMMENT 'Use substring to manipulate adb handling of nav items by trimming chars from filename to affect Navlist Sort (e.g. substr($string,N,N)',
  `set_url` mediumtext NOT NULL COMMENT 'DB Row applicable to this URL only',
  `set_comm` text COMMENT 'Add comments specific to the settings for a URL (i.e. choping first 4 chars of filenames to better sort-by char[0+n])',
  `set_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'record timestamp on entry for historical research',
  PRIMARY KEY (`set_id`),
  FULLTEXT KEY `set_substr` (`set_substr`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `adb_settings`
--

INSERT INTO `adb_settings` VALUES(1, 'ch', '', 'ignore any ''ch'' which leads a filename', '2011-06-05 08:23:51');
INSERT INTO `adb_settings` VALUES(2, '', '/M', 'ignore any part of the URL which is "forwardsolidus M"', '2011-06-05 08:24:40');
INSERT INTO `adb_settings` VALUES(3, '', 'http://localhost/sata160/', 'set base URL to localhost/sata160', '2011-06-05 08:25:48');

-- --------------------------------------------------------

--
-- Table structure for table `urls_localhost`
--

CREATE TABLE IF NOT EXISTS `urls_localhost` (
  `url_id` int(11) NOT NULL AUTO_INCREMENT,
  `url_addr` varchar(255) NOT NULL,
  `url_auth` blob,
  `url_comm` mediumtext NOT NULL,
  `url_name` varchar(60) NOT NULL,
  `url_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `url_tags` text,
  PRIMARY KEY (`url_id`),
  KEY `url_addr` (`url_addr`),
  KEY `url_added` (`url_stamp`),
  KEY `url_name` (`url_name`),
  FULLTEXT KEY `url_comm` (`url_comm`),
  FULLTEXT KEY `url_tags` (`url_tags`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Links to Local web site projects' AUTO_INCREMENT=6 ;

--
-- Dumping data for table `urls_localhost`
--

INSERT INTO `urls_localhost` VALUES(1, 'http://localhost/', NULL, 'typical localhost http testing server URL', 'localhost root', '2009-10-11 21:01:37', 'localhost, root, home, htdocs, public_html');
INSERT INTO `urls_localhost` VALUES(2, 'http://localhost/phpMyAdmin/index.php', '', 'Address saved because it''s cool to have quick access to the database administration application', 'phpMyAdmin', '2010-04-07 18:55:04', '');
INSERT INTO `urls_localhost` VALUES(3, 'http://localhost/AnnieDeBrowsa/index.php', '', 'Desire to have easy access to adb on localhost', 'AnnieDeBrowsa', '2010-04-18 06:35:27', 'anniedebrowsa, adb, localhost, svn, development, testing');
INSERT INTO `urls_localhost` VALUES(4, 'http://localhost/my_Testies/JS_Object-Method_Db/CHM_JScompleteRef/LiB0178.html', '', 'huge JavaScript Object and Methods reference', 'JS Definitive Obj Meth Ref', '2010-07-21 18:15:27', 'localhost, javascript');
INSERT INTO `urls_localhost` VALUES(5, 'http://localhost/pma/index.php', '', 'phpMyAdmin is a universally essential tool for the web developer who works with MySQL RDBMS, conveniently available at no cost, accessible via common web browser URL''s, and may be installed at virtually any HTTP server configured to use mysql and PHP', 'phpMyAdmin at pma', '2011-03-21 11:26:31', 'phpmyadmin, mysql, admin, manage, backup, save, data, database, priority, important, most used');

-- --------------------------------------------------------

--
-- Table structure for table `urls_online`
--

CREATE TABLE IF NOT EXISTS `urls_online` (
  `url_id` int(11) NOT NULL AUTO_INCREMENT,
  `url_addr` varchar(255) NOT NULL,
  `url_auth` blob,
  `url_comm` mediumtext NOT NULL,
  `url_name` varchar(60) NOT NULL,
  `url_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `url_tags` text,
  PRIMARY KEY (`url_id`),
  KEY `url_addr` (`url_addr`),
  KEY `url_added` (`url_stamp`),
  KEY `url_name` (`url_name`),
  FULLTEXT KEY `url_comm` (`url_comm`),
  FULLTEXT KEY `url_tags` (`url_tags`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Links to on-line web sites' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `urls_online`
--

INSERT INTO `urls_online` VALUES(1, 'http://exalead.com/search/', NULL, 'Choose a new search engine: Exalead!', 'Search Engine: Exalead', '2009-10-11 21:00:31', 'search engine, search, exalead');
