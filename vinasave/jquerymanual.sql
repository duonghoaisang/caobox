-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Nov 12, 2011 at 07:54 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `php_fw`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `php_category`
-- 

CREATE TABLE `php_category` (
  `id` int(11) NOT NULL auto_increment COMMENT 'system',
  `type` tinyint(3) default '0' COMMENT 'system',
  `parentid` int(5) default '0' COMMENT 'system',
  `icon` varchar(255) collate utf8_unicode_ci default NULL COMMENT 'system',
  `image` varchar(255) collate utf8_unicode_ci default NULL COMMENT 'system',
  `active` tinyint(1) default '1' COMMENT 'system',
  `order_id` int(5) default '0' COMMENT 'system',
  `timestamp` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP COMMENT 'system',
  `date` date default NULL COMMENT 'system',
  `code` varchar(255) collate utf8_unicode_ci default NULL,
  `price` varchar(255) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Category for dynadmic content' AUTO_INCREMENT=63 ;

-- 
-- Dumping data for table `php_category`
-- 

INSERT INTO `php_category` VALUES (1, 1, 0, '', '', 1, 0, '2011-11-10 15:08:04', '2011-11-10', NULL, NULL);
INSERT INTO `php_category` VALUES (2, 1, 0, '', '', 1, 1, '2011-11-10 15:08:05', '2011-11-10', NULL, NULL);
INSERT INTO `php_category` VALUES (3, 1, 0, '', '', 1, 2, '2011-11-10 15:08:07', '2011-11-10', NULL, NULL);
INSERT INTO `php_category` VALUES (4, 1, 0, '', '', 1, 3, '2011-11-10 15:08:09', '2011-11-10', NULL, NULL);
INSERT INTO `php_category` VALUES (5, 1, 0, '', '', 1, 4, '2011-11-10 15:08:16', '2011-11-10', NULL, NULL);
INSERT INTO `php_category` VALUES (6, 1, 0, '', '', 1, 5, '2011-11-10 15:08:16', '2011-11-10', NULL, NULL);
INSERT INTO `php_category` VALUES (7, 1, 0, '', '', 1, 6, '2011-11-10 15:08:18', '2011-11-10', NULL, NULL);
INSERT INTO `php_category` VALUES (8, 1, 0, '', '', 1, 8, '2011-11-10 15:08:23', '2011-11-10', NULL, NULL);
INSERT INTO `php_category` VALUES (9, 1, 0, '', '', 1, 7, '2011-11-10 15:08:20', '2011-11-10', NULL, NULL);
INSERT INTO `php_category` VALUES (10, 1, 0, '', '', 1, 9, '2011-11-10 15:08:24', '2011-11-10', NULL, NULL);
INSERT INTO `php_category` VALUES (11, 1, 0, '', '', 1, 10, '2011-11-10 15:08:24', '2011-11-10', NULL, NULL);
INSERT INTO `php_category` VALUES (12, 1, 1, '', '', 1, 0, '2011-11-10 15:38:34', '2011-11-10', NULL, NULL);
INSERT INTO `php_category` VALUES (13, 1, 1, '', '', 1, 1, '2011-11-10 15:38:36', '2011-11-10', NULL, NULL);
INSERT INTO `php_category` VALUES (14, 1, 1, '', '', 1, 2, '2011-11-10 15:38:39', '2011-11-10', NULL, NULL);
INSERT INTO `php_category` VALUES (15, 1, 1, '', '', 1, 3, '2011-11-10 15:38:40', '2011-11-10', NULL, NULL);
INSERT INTO `php_category` VALUES (16, 1, 1, '', '', 1, 4, '2011-11-10 15:38:40', '2011-11-10', NULL, NULL);
INSERT INTO `php_category` VALUES (17, 1, 2, '', '', 1, 8, '2011-11-10 15:11:58', '2011-11-10', NULL, NULL);
INSERT INTO `php_category` VALUES (18, 1, 2, '', '', 1, 7, '2011-11-10 15:11:58', '2011-11-10', NULL, NULL);
INSERT INTO `php_category` VALUES (19, 1, 2, '', '', 1, 6, '2011-11-10 15:11:58', '2011-11-10', NULL, NULL);
INSERT INTO `php_category` VALUES (20, 1, 2, '', '', 1, 5, '2011-11-10 15:11:58', '2011-11-10', NULL, NULL);
INSERT INTO `php_category` VALUES (21, 1, 2, '', '', 1, 4, '2011-11-10 15:11:58', '2011-11-10', NULL, NULL);
INSERT INTO `php_category` VALUES (22, 1, 2, '', '', 1, 3, '2011-11-10 15:11:58', '2011-11-10', NULL, NULL);
INSERT INTO `php_category` VALUES (23, 1, 2, '', '', 1, 2, '2011-11-10 15:11:58', '2011-11-10', NULL, NULL);
INSERT INTO `php_category` VALUES (24, 1, 2, '', '', 1, 1, '2011-11-10 15:11:58', '2011-11-10', NULL, NULL);
INSERT INTO `php_category` VALUES (25, 1, 2, '', '', 1, 0, '2011-11-10 15:11:58', '2011-11-10', NULL, NULL);
INSERT INTO `php_category` VALUES (26, 1, 3, '', '', 1, 4, '2011-11-10 15:12:57', '2011-11-10', NULL, NULL);
INSERT INTO `php_category` VALUES (27, 1, 3, '', '', 1, 3, '2011-11-10 15:12:57', '2011-11-10', NULL, NULL);
INSERT INTO `php_category` VALUES (28, 1, 3, '', '', 1, 2, '2011-11-10 15:12:57', '2011-11-10', NULL, NULL);
INSERT INTO `php_category` VALUES (29, 1, 3, '', '', 1, 1, '2011-11-10 15:12:57', '2011-11-10', NULL, NULL);
INSERT INTO `php_category` VALUES (30, 1, 3, '', '', 1, 0, '2011-11-10 15:12:57', '2011-11-10', NULL, NULL);
INSERT INTO `php_category` VALUES (31, 1, 4, '', '', 1, 2, '2011-11-10 15:14:18', '2011-11-10', NULL, NULL);
INSERT INTO `php_category` VALUES (32, 1, 4, '', '', 1, 1, '2011-11-10 15:14:18', '2011-11-10', NULL, NULL);
INSERT INTO `php_category` VALUES (33, 1, 4, '', '', 1, 0, '2011-11-10 15:14:18', '2011-11-10', NULL, NULL);
INSERT INTO `php_category` VALUES (34, 1, 5, '', '', 1, 6, '2011-11-10 15:16:08', '2011-11-10', NULL, NULL);
INSERT INTO `php_category` VALUES (35, 1, 5, '', '', 1, 5, '2011-11-10 15:16:08', '2011-11-10', NULL, NULL);
INSERT INTO `php_category` VALUES (36, 1, 5, '', '', 1, 4, '2011-11-10 15:16:08', '2011-11-10', NULL, NULL);
INSERT INTO `php_category` VALUES (37, 1, 5, '', '', 1, 3, '2011-11-10 15:16:08', '2011-11-10', NULL, NULL);
INSERT INTO `php_category` VALUES (38, 1, 5, '', '', 1, 2, '2011-11-10 15:16:08', '2011-11-10', NULL, NULL);
INSERT INTO `php_category` VALUES (39, 1, 5, '', '', 1, 1, '2011-11-10 15:16:08', '2011-11-10', NULL, NULL);
INSERT INTO `php_category` VALUES (40, 1, 5, '', '', 1, 0, '2011-11-10 15:16:08', '2011-11-10', NULL, NULL);
INSERT INTO `php_category` VALUES (41, 1, 6, '', '', 1, 2, '2011-11-10 15:17:42', '2011-11-10', NULL, NULL);
INSERT INTO `php_category` VALUES (42, 1, 6, '', '', 1, 1, '2011-11-10 15:17:42', '2011-11-10', NULL, NULL);
INSERT INTO `php_category` VALUES (43, 1, 6, '', '', 1, 0, '2011-11-10 15:17:42', '2011-11-10', NULL, NULL);
INSERT INTO `php_category` VALUES (44, 1, 7, '', '', 1, 4, '2011-11-10 15:19:29', '2011-11-10', NULL, NULL);
INSERT INTO `php_category` VALUES (45, 1, 7, '', '', 1, 3, '2011-11-10 15:19:29', '2011-11-10', NULL, NULL);
INSERT INTO `php_category` VALUES (46, 1, 7, '', '', 1, 2, '2011-11-10 15:19:29', '2011-11-10', NULL, NULL);
INSERT INTO `php_category` VALUES (47, 1, 7, '', '', 1, 1, '2011-11-10 15:19:29', '2011-11-10', NULL, NULL);
INSERT INTO `php_category` VALUES (48, 1, 7, '', '', 1, 0, '2011-11-10 15:19:29', '2011-11-10', NULL, NULL);
INSERT INTO `php_category` VALUES (49, 1, 9, '', '', 1, 4, '2011-11-10 15:36:29', '2011-11-10', NULL, NULL);
INSERT INTO `php_category` VALUES (50, 1, 9, '', '', 1, 3, '2011-11-10 15:36:29', '2011-11-10', NULL, NULL);
INSERT INTO `php_category` VALUES (51, 1, 9, '', '', 1, 2, '2011-11-10 15:36:29', '2011-11-10', NULL, NULL);
INSERT INTO `php_category` VALUES (52, 1, 9, '', '', 1, 1, '2011-11-10 15:36:29', '2011-11-10', NULL, NULL);
INSERT INTO `php_category` VALUES (53, 1, 9, '', '', 1, 0, '2011-11-10 15:36:29', '2011-11-10', NULL, NULL);
INSERT INTO `php_category` VALUES (54, 1, 8, '', '', 1, 2, '2011-11-10 15:37:10', '2011-11-10', NULL, NULL);
INSERT INTO `php_category` VALUES (55, 1, 8, '', '', 1, 1, '2011-11-10 15:37:10', '2011-11-10', NULL, NULL);
INSERT INTO `php_category` VALUES (56, 1, 8, '', '', 1, 0, '2011-11-10 15:37:10', '2011-11-10', NULL, NULL);
INSERT INTO `php_category` VALUES (57, 1, 10, '', '', 1, 4, '2011-11-10 15:38:07', '2011-11-10', NULL, NULL);
INSERT INTO `php_category` VALUES (58, 1, 10, '', '', 1, 3, '2011-11-10 15:38:07', '2011-11-10', NULL, NULL);
INSERT INTO `php_category` VALUES (59, 1, 10, '', '', 1, 2, '2011-11-10 15:38:07', '2011-11-10', NULL, NULL);
INSERT INTO `php_category` VALUES (60, 1, 10, '', '', 1, 1, '2011-11-10 15:38:07', '2011-11-10', NULL, NULL);
INSERT INTO `php_category` VALUES (61, 1, 10, '', '', 1, 0, '2011-11-10 15:38:07', '2011-11-10', NULL, NULL);
INSERT INTO `php_category` VALUES (62, 1, 11, '', '', 1, 0, '2011-11-10 15:38:26', '2011-11-10', NULL, NULL);

-- --------------------------------------------------------

-- 
-- Table structure for table `php_category_ln`
-- 

CREATE TABLE `php_category_ln` (
  `id` int(11) NOT NULL COMMENT 'system',
  `ln` varchar(2) collate utf8_unicode_ci NOT NULL COMMENT 'system',
  `ln_icon` varchar(255) collate utf8_unicode_ci default NULL COMMENT 'system',
  `ln_image` varchar(255) collate utf8_unicode_ci default NULL COMMENT 'system',
  `sef_url` varchar(255) collate utf8_unicode_ci default NULL COMMENT 'system',
  `name` varchar(255) collate utf8_unicode_ci default NULL,
  `intro` text collate utf8_unicode_ci,
  PRIMARY KEY  (`id`,`ln`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 
-- Dumping data for table `php_category_ln`
-- 

INSERT INTO `php_category_ln` VALUES (1, 'vn', '', '', NULL, 'Core', NULL);
INSERT INTO `php_category_ln` VALUES (2, 'vn', '', '', NULL, 'Selectors', NULL);
INSERT INTO `php_category_ln` VALUES (3, 'vn', '', '', NULL, 'Attributes', NULL);
INSERT INTO `php_category_ln` VALUES (4, 'vn', '', '', NULL, 'Traversing', NULL);
INSERT INTO `php_category_ln` VALUES (5, 'vn', '', '', NULL, 'Manipulation', NULL);
INSERT INTO `php_category_ln` VALUES (6, 'vn', '', '', NULL, 'CSS', NULL);
INSERT INTO `php_category_ln` VALUES (7, 'vn', '', '', NULL, 'Events', NULL);
INSERT INTO `php_category_ln` VALUES (8, 'vn', '', '', NULL, 'Ajax', NULL);
INSERT INTO `php_category_ln` VALUES (9, 'vn', '', '', NULL, 'Effects', NULL);
INSERT INTO `php_category_ln` VALUES (10, 'vn', '', '', NULL, 'Utilities', NULL);
INSERT INTO `php_category_ln` VALUES (11, 'vn', '', '', NULL, 'Internals', NULL);
INSERT INTO `php_category_ln` VALUES (12, 'vn', '', '', NULL, '$(...) The jQuery Function', NULL);
INSERT INTO `php_category_ln` VALUES (13, 'vn', '', '', NULL, 'jQuery Object Accessors', NULL);
INSERT INTO `php_category_ln` VALUES (14, 'vn', '', '', NULL, 'Data', NULL);
INSERT INTO `php_category_ln` VALUES (15, 'vn', '', '', NULL, 'Plugins', NULL);
INSERT INTO `php_category_ln` VALUES (16, 'vn', '', '', NULL, 'Interoperability', NULL);
INSERT INTO `php_category_ln` VALUES (17, 'vn', '', '', NULL, 'Basics', NULL);
INSERT INTO `php_category_ln` VALUES (18, 'vn', '', '', NULL, 'Hierarchy', NULL);
INSERT INTO `php_category_ln` VALUES (19, 'vn', '', '', NULL, 'Basic Filters', NULL);
INSERT INTO `php_category_ln` VALUES (20, 'vn', '', '', NULL, 'Content Filters', NULL);
INSERT INTO `php_category_ln` VALUES (21, 'vn', '', '', NULL, 'Visibility Filters', NULL);
INSERT INTO `php_category_ln` VALUES (22, 'vn', '', '', NULL, 'Attribute Filters', NULL);
INSERT INTO `php_category_ln` VALUES (23, 'vn', '', '', NULL, 'Child Filters', NULL);
INSERT INTO `php_category_ln` VALUES (24, 'vn', '', '', NULL, 'Forms', NULL);
INSERT INTO `php_category_ln` VALUES (25, 'vn', '', '', NULL, 'Form Filters', NULL);
INSERT INTO `php_category_ln` VALUES (26, 'vn', '', '', NULL, 'Attr', NULL);
INSERT INTO `php_category_ln` VALUES (27, 'vn', '', '', NULL, 'Class', NULL);
INSERT INTO `php_category_ln` VALUES (28, 'vn', '', '', NULL, 'HTML', NULL);
INSERT INTO `php_category_ln` VALUES (29, 'vn', '', '', NULL, 'Text', NULL);
INSERT INTO `php_category_ln` VALUES (30, 'vn', '', '', NULL, 'Value', NULL);
INSERT INTO `php_category_ln` VALUES (31, 'vn', '', '', NULL, 'Filtering', NULL);
INSERT INTO `php_category_ln` VALUES (32, 'vn', '', '', NULL, 'Finding', NULL);
INSERT INTO `php_category_ln` VALUES (33, 'vn', '', '', NULL, 'Chaining', NULL);
INSERT INTO `php_category_ln` VALUES (34, 'vn', '', '', NULL, 'Changing Contents', NULL);
INSERT INTO `php_category_ln` VALUES (35, 'vn', '', '', NULL, 'Inserting Inside', NULL);
INSERT INTO `php_category_ln` VALUES (36, 'vn', '', '', NULL, 'Inserting Outside', NULL);
INSERT INTO `php_category_ln` VALUES (37, 'vn', '', '', NULL, 'Inserting Around', NULL);
INSERT INTO `php_category_ln` VALUES (38, 'vn', '', '', NULL, 'Replacing', NULL);
INSERT INTO `php_category_ln` VALUES (39, 'vn', '', '', NULL, 'Removing', NULL);
INSERT INTO `php_category_ln` VALUES (40, 'vn', '', '', NULL, 'Copying', NULL);
INSERT INTO `php_category_ln` VALUES (41, 'vn', '', '', NULL, 'CSS', NULL);
INSERT INTO `php_category_ln` VALUES (42, 'vn', '', '', NULL, 'Positioning', NULL);
INSERT INTO `php_category_ln` VALUES (43, 'vn', '', '', NULL, 'Height and Width', NULL);
INSERT INTO `php_category_ln` VALUES (44, 'vn', '', '', NULL, 'Page Load', NULL);
INSERT INTO `php_category_ln` VALUES (45, 'vn', '', '', NULL, 'Event Handling', NULL);
INSERT INTO `php_category_ln` VALUES (46, 'vn', '', '', NULL, 'Live Events', NULL);
INSERT INTO `php_category_ln` VALUES (47, 'vn', '', '', NULL, 'Interaction Helpers', NULL);
INSERT INTO `php_category_ln` VALUES (48, 'vn', '', '', NULL, 'Event Helpers', NULL);
INSERT INTO `php_category_ln` VALUES (49, 'vn', '', '', NULL, 'Basics', NULL);
INSERT INTO `php_category_ln` VALUES (50, 'vn', '', '', NULL, 'Sliding', NULL);
INSERT INTO `php_category_ln` VALUES (51, 'vn', '', '', NULL, 'Fading', NULL);
INSERT INTO `php_category_ln` VALUES (52, 'vn', '', '', NULL, 'Custom', NULL);
INSERT INTO `php_category_ln` VALUES (53, 'vn', '', '', NULL, 'Settings', NULL);
INSERT INTO `php_category_ln` VALUES (54, 'vn', '', '', NULL, 'Ajax Requests', NULL);
INSERT INTO `php_category_ln` VALUES (55, 'vn', '', '', NULL, 'Ajax Events', NULL);
INSERT INTO `php_category_ln` VALUES (56, 'vn', '', '', NULL, 'Misc', NULL);
INSERT INTO `php_category_ln` VALUES (57, 'vn', '', '', NULL, 'Browser and Feature Detection', NULL);
INSERT INTO `php_category_ln` VALUES (58, 'vn', '', '', NULL, 'Array and Object operations', NULL);
INSERT INTO `php_category_ln` VALUES (59, 'vn', '', '', NULL, 'Test operations', NULL);
INSERT INTO `php_category_ln` VALUES (60, 'vn', '', '', NULL, 'String operations', NULL);
INSERT INTO `php_category_ln` VALUES (61, 'vn', '', '', NULL, 'URLs', NULL);
INSERT INTO `php_category_ln` VALUES (62, 'vn', '', '', NULL, 'Data Cache', NULL);

-- --------------------------------------------------------

-- 
-- Table structure for table `php_comment`
-- 

CREATE TABLE `php_comment` (
  `id` int(5) NOT NULL auto_increment,
  `module` varchar(20) collate utf8_unicode_ci default NULL,
  `pageid` int(5) default '0',
  `memid` int(5) default '0',
  `title` varchar(255) collate utf8_unicode_ci default NULL,
  `content` text collate utf8_unicode_ci,
  `timestamp` timestamp NULL default CURRENT_TIMESTAMP,
  `active` tinyint(1) default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Front end comment' AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `php_comment`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `php_configure`
-- 

CREATE TABLE `php_configure` (
  `code` varchar(20) collate utf8_unicode_ci NOT NULL,
  `name` varchar(255) collate utf8_unicode_ci default NULL,
  `value` text collate utf8_unicode_ci,
  `note` text collate utf8_unicode_ci,
  `group_id` int(5) default '1',
  `order_id` int(3) default '0',
  `use_function` varchar(255) collate utf8_unicode_ci default NULL,
  `set_function` varchar(255) collate utf8_unicode_ci default NULL,
  `is_system` tinyint(1) default '0',
  PRIMARY KEY  (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 
-- Dumping data for table `php_configure`
-- 

INSERT INTO `php_configure` VALUES ('web_title', 'Web Title', 'Generated by CMS!', 'The website title ', 1, 0, NULL, '', 0);
INSERT INTO `php_configure` VALUES ('web_keyword', 'Meta Keywords', 'website keywords', NULL, 1, 0, NULL, 'textarea(', 0);
INSERT INTO `php_configure` VALUES ('web_desc', 'Meta Description', 'website description', NULL, 1, 0, NULL, 'textarea(', 0);
INSERT INTO `php_configure` VALUES ('language_tab', 'Input languages', 'tab', NULL, 4, 0, NULL, 'radiobox(array(''list'',''tab''),', 1);
INSERT INTO `php_configure` VALUES ('ga_email', 'GA Email', 'w2ajax@gmail.com', 'Email to login GA ', 3, 0, NULL, NULL, 1);
INSERT INTO `php_configure` VALUES ('ga_pasw', 'GA Password', '', 'GA password', 3, 0, NULL, NULL, 1);
INSERT INTO `php_configure` VALUES ('skin_login', 'Login skin', 'default', NULL, 4, 0, NULL, 'skin_login(', 1);
INSERT INTO `php_configure` VALUES ('smtp_server', 'SMTP Server', 'mail.phpbasic.com', NULL, 2, 0, NULL, NULL, 1);
INSERT INTO `php_configure` VALUES ('smtp_usr', 'SMTP User', 'smtp@phpbasic.com', NULL, 2, 0, NULL, NULL, 1);
INSERT INTO `php_configure` VALUES ('smtp_psw', 'SMTP Password', 'basic753159', NULL, 2, 0, NULL, NULL, 1);
INSERT INTO `php_configure` VALUES ('smtp_auth', 'SMTP Auth', 'yes', NULL, 2, 0, NULL, 'radiobox(array(''yes'',''no''),', 0);
INSERT INTO `php_configure` VALUES ('smtp_from_email', 'SMTP From', 'no-reply@domain.com', NULL, 2, 0, NULL, NULL, 1);
INSERT INTO `php_configure` VALUES ('smtp_from_name', 'SMTP From Name', 'Webmaster', NULL, 2, 0, NULL, NULL, 1);
INSERT INTO `php_configure` VALUES ('smtp_port', 'SMTP Port', '25', NULL, 2, 0, NULL, NULL, 1);
INSERT INTO `php_configure` VALUES ('template', 'Templates', 'Default', NULL, 6, 0, NULL, 'templates(', 1);
INSERT INTO `php_configure` VALUES ('cookie_domain', 'Cookie Domain', 'localhost', NULL, 5, 0, NULL, NULL, 1);
INSERT INTO `php_configure` VALUES ('cookie_path', 'Cookie Path', '/', NULL, 5, 0, NULL, NULL, 1);
INSERT INTO `php_configure` VALUES ('save_log', 'User log', 'no', 'Save log user''s actions', 4, 0, NULL, 'radiobox(array(''yes'',''no''),', 1);
INSERT INTO `php_configure` VALUES ('cache_query', 'Cache Query', 'no', NULL, 4, 0, NULL, 'radiobox(array(''no'',''yes''),', 0);
INSERT INTO `php_configure` VALUES ('smtp_enable', 'SMTP Enable', 'yes', NULL, 2, 0, NULL, 'radiobox(array(''yes'',''no''),', 1);
INSERT INTO `php_configure` VALUES ('cache_tpl', 'Cache template', 'no', NULL, 4, 0, NULL, 'radiobox(array(''no'',''yes''),', 0);
INSERT INTO `php_configure` VALUES ('abc', 'Test new configure', '123', 'This is a test for function new configure from CMS', 1, 0, NULL, NULL, 0);
INSERT INTO `php_configure` VALUES ('address', 'Linh NMT', '23', 'Hahaha', 1, 0, NULL, NULL, 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `php_configure_group`
-- 

CREATE TABLE `php_configure_group` (
  `id` int(5) NOT NULL auto_increment,
  `name` varchar(255) collate utf8_unicode_ci default NULL,
  `active` tinyint(1) default '1',
  `order_id` int(5) default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

-- 
-- Dumping data for table `php_configure_group`
-- 

INSERT INTO `php_configure_group` VALUES (1, 'General', 1, 0);
INSERT INTO `php_configure_group` VALUES (2, 'SMTP server', 1, 0);
INSERT INTO `php_configure_group` VALUES (3, 'Google Analytics', 0, 0);
INSERT INTO `php_configure_group` VALUES (4, 'CMS system', 1, 0);
INSERT INTO `php_configure_group` VALUES (5, 'Cookies', 1, 0);
INSERT INTO `php_configure_group` VALUES (6, 'Design', 1, 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `php_configure_mod`
-- 

CREATE TABLE `php_configure_mod` (
  `module` varchar(20) collate utf8_unicode_ci NOT NULL COMMENT 'product,html,gallery',
  `typeid` int(3) NOT NULL,
  `name` varchar(255) collate utf8_unicode_ci default NULL,
  `content` text collate utf8_unicode_ci,
  `data` text collate utf8_unicode_ci,
  PRIMARY KEY  (`module`,`typeid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 
-- Dumping data for table `php_configure_mod`
-- 

INSERT INTO `php_configure_mod` VALUES ('content', 1, 'jquery', '', 'a:53:{s:6:"button";a:19:{s:4:"root";s:0:"";s:11:"header_name";s:0:"";s:11:"header_date";s:0:"";s:12:"header_order";s:0:"";s:13:"header_status";s:0:"";s:14:"header_actions";s:0:"";s:10:"tools_copy";s:0:"";s:8:"new_item";s:0:"";s:9:"edit_item";s:0:"";s:11:"delete_item";s:0:"";s:9:"move_item";s:0:"";s:11:"active_item";s:0:"";s:13:"inactive_item";s:0:"";s:17:"status_hover_item";s:0:"";s:12:"new_category";s:0:"";s:13:"edit_category";s:0:"";s:15:"delete_category";s:0:"";s:15:"new_subcategory";s:0:"";s:16:"status_hover_cat";s:0:"";}s:3:"act";a:8:{i:0;s:3:"new";i:1;s:6:"update";i:2;s:6:"delete";i:3;s:6:"newcat";i:4;s:9:"updatecat";i:5;s:9:"deletecat";i:6;s:7:"viewcat";i:7;s:12:"drapdrop_cat";}s:12:"comment_name";s:0:"";s:15:"featuredon_name";s:0:"";s:12:"sort_default";s:8:"order_id";s:18:"sort_default_order";s:0:"";s:9:"languages";s:1:"0";s:10:"extra_sort";s:0:"";s:11:"main_fields";a:4:{s:4:"home";a:7:{s:4:"name";s:0:"";s:4:"type";s:5:"input";s:14:"status_default";s:1:"0";s:6:"number";s:1:"0";s:11:"description";s:0:"";s:11:"require_msg";s:0:"";s:9:"sortorder";s:1:"0";}s:3:"top";a:7:{s:4:"name";s:0:"";s:4:"type";s:5:"input";s:14:"status_default";s:1:"0";s:6:"number";s:1:"0";s:11:"description";s:0:"";s:11:"require_msg";s:0:"";s:9:"sortorder";s:1:"0";}s:2:"ym";a:7:{s:4:"name";s:0:"";s:4:"type";s:5:"input";s:14:"status_default";s:1:"0";s:6:"number";s:1:"0";s:11:"description";s:0:"";s:11:"require_msg";s:0:"";s:9:"sortorder";s:1:"0";}s:4:"code";a:7:{s:4:"name";s:0:"";s:4:"type";s:5:"input";s:14:"status_default";s:1:"0";s:6:"number";s:1:"0";s:11:"description";s:0:"";s:11:"require_msg";s:0:"";s:9:"sortorder";s:1:"0";}}s:9:"ln_fields";a:3:{s:4:"name";a:6:{s:5:"chose";s:1:"1";s:4:"name";s:0:"";s:4:"type";s:5:"input";s:11:"description";s:0:"";s:11:"require_msg";s:0:"";s:9:"sortorder";s:1:"0";}s:5:"intro";a:6:{s:5:"chose";s:1:"1";s:4:"name";s:0:"";s:4:"type";s:5:"input";s:11:"description";s:0:"";s:11:"require_msg";s:0:"";s:9:"sortorder";s:1:"0";}s:7:"content";a:6:{s:5:"chose";s:1:"1";s:4:"name";s:0:"";s:4:"type";s:5:"input";s:11:"description";s:0:"";s:11:"require_msg";s:0:"";s:9:"sortorder";s:1:"0";}}s:7:"options";a:2:{i:0;s:1:"1";i:1;s:1:"2";}s:12:"options_type";a:2:{i:1;s:1:"0";i:2;s:1:"1";}s:18:"options_save_field";a:2:{i:1;s:0:"";i:2;s:0:"";}s:8:"tpl_view";s:11:"content.tpl";s:10:"tpl_update";s:18:"content.update.tpl";s:13:"rows_per_page";s:0:"";s:9:"nodel_ids";s:2:"-1";s:11:"thumb_field";s:0:"";s:10:"list_field";s:0:"";s:10:"sort_order";s:0:"";s:9:"main_icon";a:6:{s:1:"w";s:1:"0";s:1:"h";s:1:"0";s:4:"name";s:0:"";s:12:"force_resize";s:4:"true";s:7:"specify";s:4:"none";s:7:"orginal";s:1:"0";}s:8:"main_img";a:6:{s:1:"w";s:1:"0";s:1:"h";s:1:"0";s:4:"name";s:0:"";s:12:"force_resize";s:4:"true";s:7:"specify";s:4:"none";s:7:"orginal";s:1:"0";}s:10:"main_thumb";a:4:{s:1:"w";s:1:"0";s:1:"h";s:1:"0";s:12:"force_resize";s:4:"true";s:7:"specify";s:4:"none";}s:12:"ln_main_icon";a:6:{s:1:"w";s:1:"0";s:1:"h";s:1:"0";s:4:"name";s:0:"";s:12:"force_resize";s:4:"true";s:7:"specify";s:4:"none";s:7:"orginal";s:1:"0";}s:11:"ln_main_img";a:6:{s:1:"w";s:1:"0";s:1:"h";s:1:"0";s:4:"name";s:0:"";s:12:"force_resize";s:4:"true";s:7:"specify";s:4:"none";s:7:"orginal";s:1:"0";}s:13:"ln_main_thumb";a:4:{s:1:"w";s:1:"0";s:1:"h";s:1:"0";s:12:"force_resize";s:4:"true";s:7:"specify";s:4:"none";}s:12:"gallery_name";s:0:"";s:12:"gallery_sort";s:6:"id ASC";s:14:"gallery_fields";s:0:"";s:12:"gallery_icon";a:6:{s:1:"w";s:1:"0";s:1:"h";s:1:"0";s:4:"name";s:0:"";s:12:"force_resize";s:4:"true";s:7:"specify";s:4:"none";s:7:"orginal";s:1:"0";}s:11:"gallery_img";a:7:{s:5:"chose";s:1:"1";s:1:"w";s:1:"0";s:1:"h";s:1:"0";s:4:"name";s:0:"";s:12:"force_resize";s:4:"true";s:7:"specify";s:4:"none";s:7:"orginal";s:1:"0";}s:13:"gallery_thumb";a:4:{s:1:"w";s:1:"0";s:1:"h";s:1:"0";s:12:"force_resize";s:4:"true";s:7:"specify";s:4:"none";}s:8:"sub_name";s:0:"";s:15:"sub_show_fields";s:0:"";s:13:"cattpl_update";s:19:"category.update.tpl";s:13:"cat_languages";s:1:"0";s:6:"nlevel";s:2:"-1";s:15:"noproduct_level";s:2:"-1";s:13:"noproduct_cat";s:2:"-1";s:14:"nosubcat_level";s:2:"-1";s:12:"nosubcat_cat";s:2:"-1";s:12:"nodelcat_ids";s:2:"-1";s:17:"category_required";s:0:"";s:13:"list_catfield";s:0:"";s:10:"cat_fields";a:2:{s:4:"code";a:5:{s:4:"name";s:0:"";s:4:"type";s:5:"input";s:11:"description";s:0:"";s:11:"require_msg";s:0:"";s:9:"sortorder";s:1:"0";}s:5:"price";a:5:{s:4:"name";s:0:"";s:4:"type";s:5:"input";s:11:"description";s:0:"";s:11:"require_msg";s:0:"";s:9:"sortorder";s:1:"0";}}s:12:"ln_catfields";a:2:{s:4:"name";a:6:{s:5:"chose";s:1:"1";s:4:"name";s:4:"Name";s:4:"type";s:5:"input";s:11:"description";s:0:"";s:11:"require_msg";s:0:"";s:9:"sortorder";s:1:"0";}s:5:"intro";a:5:{s:4:"name";s:0:"";s:4:"type";s:5:"input";s:11:"description";s:0:"";s:11:"require_msg";s:0:"";s:9:"sortorder";s:1:"0";}}s:13:"catsort_order";s:0:"";s:11:"catimg_icon";a:6:{s:1:"w";s:1:"0";s:1:"h";s:1:"0";s:4:"name";s:0:"";s:12:"force_resize";s:4:"true";s:7:"specify";s:4:"none";s:7:"orginal";s:1:"0";}s:10:"catimg_img";a:6:{s:1:"w";s:1:"0";s:1:"h";s:1:"0";s:4:"name";s:0:"";s:12:"force_resize";s:4:"true";s:7:"specify";s:4:"none";s:7:"orginal";s:1:"0";}s:12:"catimg_thumb";a:4:{s:1:"w";s:1:"0";s:1:"h";s:1:"0";s:12:"force_resize";s:4:"true";s:7:"specify";s:4:"none";}s:14:"ln_catimg_icon";a:6:{s:1:"w";s:1:"0";s:1:"h";s:1:"0";s:4:"name";s:0:"";s:12:"force_resize";s:4:"true";s:7:"specify";s:4:"none";s:7:"orginal";s:1:"0";}s:13:"ln_catimg_img";a:6:{s:1:"w";s:1:"0";s:1:"h";s:1:"0";s:4:"name";s:0:"";s:12:"force_resize";s:4:"true";s:7:"specify";s:4:"none";s:7:"orginal";s:1:"0";}s:15:"ln_catimg_thumb";a:4:{s:1:"w";s:1:"0";s:1:"h";s:1:"0";s:12:"force_resize";s:4:"true";s:7:"specify";s:4:"none";}}');
INSERT INTO `php_configure_mod` VALUES ('options', 1, 'version', '', 'a:23:{s:9:"languages";s:1:"0";s:8:"tpl_view";s:11:"options.tpl";s:10:"tpl_update";s:18:"options.update.tpl";s:12:"sort_default";s:8:"order_id";s:18:"sort_default_order";s:0:"";s:6:"button";a:13:{s:4:"root";s:0:"";s:11:"header_name";s:0:"";s:11:"header_date";s:0:"";s:12:"header_order";s:0:"";s:13:"header_status";s:0:"";s:14:"header_actions";s:0:"";s:10:"tools_copy";s:0:"";s:8:"new_item";s:0:"";s:9:"edit_item";s:0:"";s:11:"delete_item";s:0:"";s:11:"active_item";s:0:"";s:13:"inactive_item";s:0:"";s:17:"status_hover_item";s:0:"";}s:11:"main_fields";a:2:{s:4:"code";a:5:{s:4:"name";s:0:"";s:4:"type";s:5:"input";s:11:"description";s:0:"";s:11:"require_msg";s:0:"";s:9:"sortorder";s:1:"0";}s:5:"price";a:5:{s:4:"name";s:0:"";s:4:"type";s:5:"input";s:11:"description";s:0:"";s:11:"require_msg";s:0:"";s:9:"sortorder";s:1:"0";}}s:9:"ln_fields";a:3:{s:4:"name";a:6:{s:5:"chose";s:1:"1";s:4:"name";s:4:"Name";s:4:"type";s:5:"input";s:11:"description";s:0:"";s:11:"require_msg";s:0:"";s:9:"sortorder";s:1:"0";}s:5:"intro";a:5:{s:4:"name";s:0:"";s:4:"type";s:5:"input";s:11:"description";s:0:"";s:11:"require_msg";s:0:"";s:9:"sortorder";s:1:"0";}s:7:"content";a:5:{s:4:"name";s:0:"";s:4:"type";s:5:"input";s:11:"description";s:0:"";s:11:"require_msg";s:0:"";s:9:"sortorder";s:1:"0";}}s:15:"required_fields";s:0:"";s:10:"list_field";s:0:"";s:10:"sort_order";s:0:"";s:9:"main_icon";a:6:{s:1:"w";s:1:"0";s:1:"h";s:1:"0";s:4:"name";s:0:"";s:12:"force_resize";s:4:"true";s:7:"specify";s:4:"none";s:7:"orginal";s:1:"0";}s:8:"main_img";a:6:{s:1:"w";s:1:"0";s:1:"h";s:1:"0";s:4:"name";s:0:"";s:12:"force_resize";s:4:"true";s:7:"specify";s:4:"none";s:7:"orginal";s:1:"0";}s:10:"main_thumb";a:4:{s:1:"w";s:1:"0";s:1:"h";s:1:"0";s:12:"force_resize";s:4:"true";s:7:"specify";s:4:"none";}s:12:"ln_main_icon";a:6:{s:1:"w";s:1:"0";s:1:"h";s:1:"0";s:4:"name";s:0:"";s:12:"force_resize";s:4:"true";s:7:"specify";s:4:"none";s:7:"orginal";s:1:"0";}s:11:"ln_main_img";a:6:{s:1:"w";s:1:"0";s:1:"h";s:1:"0";s:4:"name";s:0:"";s:12:"force_resize";s:4:"true";s:7:"specify";s:4:"none";s:7:"orginal";s:1:"0";}s:13:"ln_main_thumb";a:4:{s:1:"w";s:1:"0";s:1:"h";s:1:"0";s:12:"force_resize";s:4:"true";s:7:"specify";s:4:"none";}s:12:"gallery_name";s:0:"";s:12:"gallery_sort";s:6:"id ASC";s:14:"gallery_fields";s:0:"";s:12:"gallery_icon";a:5:{s:1:"w";s:1:"0";s:1:"h";s:1:"0";s:12:"force_resize";s:4:"true";s:7:"specify";s:4:"none";s:7:"orginal";s:1:"0";}s:11:"gallery_img";a:6:{s:5:"chose";s:1:"1";s:1:"w";s:1:"0";s:1:"h";s:1:"0";s:12:"force_resize";s:4:"true";s:7:"specify";s:4:"none";s:7:"orginal";s:1:"0";}s:13:"gallery_thumb";a:4:{s:1:"w";s:1:"0";s:1:"h";s:1:"0";s:12:"force_resize";s:4:"true";s:7:"specify";s:4:"none";}}');
INSERT INTO `php_configure_mod` VALUES ('options', 2, 'Data type', NULL, 'a:23:{s:9:"languages";s:1:"0";s:8:"tpl_view";s:11:"options.tpl";s:10:"tpl_update";s:18:"options.update.tpl";s:12:"sort_default";s:8:"order_id";s:18:"sort_default_order";s:0:"";s:6:"button";a:13:{s:4:"root";s:0:"";s:11:"header_name";s:0:"";s:11:"header_date";s:0:"";s:12:"header_order";s:0:"";s:13:"header_status";s:0:"";s:14:"header_actions";s:0:"";s:10:"tools_copy";s:0:"";s:8:"new_item";s:0:"";s:9:"edit_item";s:0:"";s:11:"delete_item";s:0:"";s:11:"active_item";s:0:"";s:13:"inactive_item";s:0:"";s:17:"status_hover_item";s:0:"";}s:11:"main_fields";a:2:{s:4:"code";a:5:{s:4:"name";s:0:"";s:4:"type";s:5:"input";s:11:"description";s:0:"";s:11:"require_msg";s:0:"";s:9:"sortorder";s:1:"0";}s:5:"price";a:5:{s:4:"name";s:0:"";s:4:"type";s:5:"input";s:11:"description";s:0:"";s:11:"require_msg";s:0:"";s:9:"sortorder";s:1:"0";}}s:9:"ln_fields";a:3:{s:4:"name";a:6:{s:5:"chose";s:1:"1";s:4:"name";s:4:"Name";s:4:"type";s:5:"input";s:11:"description";s:0:"";s:11:"require_msg";s:0:"";s:9:"sortorder";s:1:"0";}s:5:"intro";a:5:{s:4:"name";s:0:"";s:4:"type";s:5:"input";s:11:"description";s:0:"";s:11:"require_msg";s:0:"";s:9:"sortorder";s:1:"0";}s:7:"content";a:5:{s:4:"name";s:0:"";s:4:"type";s:5:"input";s:11:"description";s:0:"";s:11:"require_msg";s:0:"";s:9:"sortorder";s:1:"0";}}s:15:"required_fields";s:0:"";s:10:"list_field";s:0:"";s:10:"sort_order";s:0:"";s:9:"main_icon";a:6:{s:1:"w";s:1:"0";s:1:"h";s:1:"0";s:4:"name";s:0:"";s:12:"force_resize";s:4:"true";s:7:"specify";s:4:"none";s:7:"orginal";s:1:"0";}s:8:"main_img";a:6:{s:1:"w";s:1:"0";s:1:"h";s:1:"0";s:4:"name";s:0:"";s:12:"force_resize";s:4:"true";s:7:"specify";s:4:"none";s:7:"orginal";s:1:"0";}s:10:"main_thumb";a:4:{s:1:"w";s:1:"0";s:1:"h";s:1:"0";s:12:"force_resize";s:4:"true";s:7:"specify";s:4:"none";}s:12:"ln_main_icon";a:6:{s:1:"w";s:1:"0";s:1:"h";s:1:"0";s:4:"name";s:0:"";s:12:"force_resize";s:4:"true";s:7:"specify";s:4:"none";s:7:"orginal";s:1:"0";}s:11:"ln_main_img";a:6:{s:1:"w";s:1:"0";s:1:"h";s:1:"0";s:4:"name";s:0:"";s:12:"force_resize";s:4:"true";s:7:"specify";s:4:"none";s:7:"orginal";s:1:"0";}s:13:"ln_main_thumb";a:4:{s:1:"w";s:1:"0";s:1:"h";s:1:"0";s:12:"force_resize";s:4:"true";s:7:"specify";s:4:"none";}s:12:"gallery_name";s:0:"";s:12:"gallery_sort";s:6:"id ASC";s:14:"gallery_fields";s:0:"";s:12:"gallery_icon";a:5:{s:1:"w";s:1:"0";s:1:"h";s:1:"0";s:12:"force_resize";s:4:"true";s:7:"specify";s:4:"none";s:7:"orginal";s:1:"0";}s:11:"gallery_img";a:6:{s:5:"chose";s:1:"1";s:1:"w";s:1:"0";s:1:"h";s:1:"0";s:12:"force_resize";s:4:"true";s:7:"specify";s:4:"none";s:7:"orginal";s:1:"0";}s:13:"gallery_thumb";a:4:{s:1:"w";s:1:"0";s:1:"h";s:1:"0";s:12:"force_resize";s:4:"true";s:7:"specify";s:4:"none";}}');

-- --------------------------------------------------------

-- 
-- Table structure for table `php_content`
-- 

CREATE TABLE `php_content` (
  `id` int(5) NOT NULL auto_increment COMMENT 'system',
  `type` int(3) default '0' COMMENT 'system',
  `catid` int(5) default '0' COMMENT 'system',
  `userid` int(5) default '-1' COMMENT 'system',
  `icon` varchar(255) collate utf8_unicode_ci default NULL COMMENT 'system',
  `image` varchar(255) collate utf8_unicode_ci default NULL COMMENT 'system',
  `file_extra` text collate utf8_unicode_ci COMMENT 'system',
  `fields_extra` text collate utf8_unicode_ci COMMENT 'system',
  `active` tinyint(1) default '1' COMMENT 'system',
  `order_id` int(5) default '0' COMMENT 'system',
  `web_keyword` varchar(255) collate utf8_unicode_ci default NULL COMMENT 'system',
  `web_desc` text collate utf8_unicode_ci COMMENT 'system',
  `date` date default NULL COMMENT 'system',
  `timestamp` timestamp NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP COMMENT 'system',
  `visited` int(6) default '0' COMMENT 'system',
  `featuredon` varchar(255) collate utf8_unicode_ci default NULL COMMENT 'system',
  `home` tinyint(1) default '0',
  `top` tinyint(1) default '0',
  `ym` varchar(255) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Dynamic content' AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `php_content`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `php_content_ln`
-- 

CREATE TABLE `php_content_ln` (
  `id` int(5) NOT NULL COMMENT 'system',
  `ln` varchar(2) collate utf8_unicode_ci NOT NULL COMMENT 'system',
  `ln_fields_extra` text collate utf8_unicode_ci COMMENT 'system',
  `ln_icon` varchar(255) collate utf8_unicode_ci default NULL COMMENT 'system',
  `ln_image` varchar(255) collate utf8_unicode_ci default NULL COMMENT 'system',
  `sef_url` varchar(255) collate utf8_unicode_ci default NULL COMMENT 'system',
  `name` varchar(255) collate utf8_unicode_ci default NULL,
  `intro` text collate utf8_unicode_ci,
  `content` text collate utf8_unicode_ci,
  PRIMARY KEY  (`id`,`ln`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 
-- Dumping data for table `php_content_ln`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `php_content_options`
-- 

CREATE TABLE `php_content_options` (
  `page` varchar(20) collate utf8_unicode_ci NOT NULL,
  `content_id` int(5) NOT NULL,
  `options_id` int(5) NOT NULL,
  `options_type` int(5) NOT NULL default '0',
  PRIMARY KEY  (`page`,`content_id`,`options_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 
-- Dumping data for table `php_content_options`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `php_gallery`
-- 

CREATE TABLE `php_gallery` (
  `id` int(5) NOT NULL auto_increment,
  `page` varchar(20) collate utf8_unicode_ci default NULL,
  `pageid` int(5) default '0',
  `name` varchar(255) collate utf8_unicode_ci default NULL,
  `content` text collate utf8_unicode_ci,
  `icon` varchar(255) collate utf8_unicode_ci default NULL,
  `image` varchar(255) collate utf8_unicode_ci default NULL,
  `timestamp` timestamp NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `order_id` int(5) default '0',
  `date` date default NULL,
  `active` tinyint(1) default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `php_gallery`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `php_html`
-- 

CREATE TABLE `php_html` (
  `id` int(4) NOT NULL auto_increment COMMENT 'system',
  `icon` varchar(255) collate utf8_unicode_ci default NULL COMMENT 'system',
  `image` varchar(255) collate utf8_unicode_ci default NULL COMMENT 'system',
  `file_extra` text collate utf8_unicode_ci COMMENT 'system',
  `fields_extra` text collate utf8_unicode_ci COMMENT 'system',
  `web_keyword` varchar(255) collate utf8_unicode_ci default NULL COMMENT 'system',
  `web_desc` text collate utf8_unicode_ci COMMENT 'system',
  `timestamp` timestamp NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP COMMENT 'system',
  `date` date default NULL COMMENT 'system',
  `code` varchar(255) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Static content' AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `php_html`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `php_html_ln`
-- 

CREATE TABLE `php_html_ln` (
  `id` int(4) NOT NULL COMMENT 'system',
  `ln` varchar(2) collate utf8_unicode_ci NOT NULL COMMENT 'system',
  `ln_fields_extra` text collate utf8_unicode_ci COMMENT 'system',
  `ln_icon` varchar(255) collate utf8_unicode_ci default NULL COMMENT 'system',
  `ln_image` varchar(255) collate utf8_unicode_ci default NULL COMMENT 'system',
  `sef_url` varchar(255) collate utf8_unicode_ci default NULL COMMENT 'system',
  `name` varchar(255) collate utf8_unicode_ci default NULL,
  `content` text collate utf8_unicode_ci,
  PRIMARY KEY  (`id`,`ln`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 
-- Dumping data for table `php_html_ln`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `php_language`
-- 

CREATE TABLE `php_language` (
  `ln` varchar(2) collate utf8_unicode_ci NOT NULL,
  `ln_name` varchar(255) collate utf8_unicode_ci default NULL,
  `ln_alias` varchar(255) collate utf8_unicode_ci default NULL,
  `icon` varchar(255) collate utf8_unicode_ci default NULL,
  `is_default` tinyint(1) default '0',
  `active` tinyint(1) default '1',
  `order_id` int(3) default '0',
  PRIMARY KEY  (`ln`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 
-- Dumping data for table `php_language`
-- 

INSERT INTO `php_language` VALUES ('vn', 'Vietnamese', '', NULL, 1, 1, 0);
INSERT INTO `php_language` VALUES ('en', 'English', '', NULL, 0, 1, 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `php_module`
-- 

CREATE TABLE `php_module` (
  `id` tinyint(2) NOT NULL auto_increment,
  `module` varchar(50) collate utf8_unicode_ci default NULL,
  `active` tinyint(1) default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `php_module`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `php_module_ln`
-- 

CREATE TABLE `php_module_ln` (
  `id` tinyint(2) NOT NULL,
  `ln` varchar(2) collate utf8_unicode_ci NOT NULL,
  `name` varchar(255) collate utf8_unicode_ci default NULL,
  `module_name` varchar(50) collate utf8_unicode_ci default NULL,
  `web_title` text collate utf8_unicode_ci,
  `web_keyword` text collate utf8_unicode_ci,
  `web_desc` text collate utf8_unicode_ci,
  `meta_extra` text collate utf8_unicode_ci,
  PRIMARY KEY  (`id`,`ln`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 
-- Dumping data for table `php_module_ln`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `php_options`
-- 

CREATE TABLE `php_options` (
  `id` int(5) NOT NULL auto_increment COMMENT 'system',
  `type` int(5) default '0' COMMENT 'system',
  `active` tinyint(1) default '1' COMMENT 'system',
  `icon` varchar(255) collate utf8_unicode_ci default NULL COMMENT 'system',
  `image` varchar(255) collate utf8_unicode_ci default NULL COMMENT 'system',
  `order_id` int(5) default '0' COMMENT 'system',
  `timestamp` timestamp NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP COMMENT 'system',
  `date` date default NULL COMMENT 'system',
  `code` varchar(255) collate utf8_unicode_ci default NULL,
  `price` varchar(255) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

-- 
-- Dumping data for table `php_options`
-- 

INSERT INTO `php_options` VALUES (1, 1, 1, '', '', 4, '2011-11-10 15:05:15', '2011-11-10', NULL, NULL);
INSERT INTO `php_options` VALUES (2, 1, 1, '', '', 3, '2011-11-10 15:05:15', '2011-11-10', NULL, NULL);
INSERT INTO `php_options` VALUES (3, 1, 1, '', '', 2, '2011-11-10 15:05:15', '2011-11-10', NULL, NULL);
INSERT INTO `php_options` VALUES (4, 1, 1, '', '', 1, '2011-11-10 15:05:15', '2011-11-10', NULL, NULL);
INSERT INTO `php_options` VALUES (5, 1, 1, '', '', 0, '2011-11-10 15:05:15', '2011-11-10', NULL, NULL);
INSERT INTO `php_options` VALUES (6, 2, 1, '', '', 9, '2011-11-10 16:45:43', '2011-11-10', NULL, NULL);
INSERT INTO `php_options` VALUES (7, 2, 1, '', '', 8, '2011-11-10 16:45:43', '2011-11-10', NULL, NULL);
INSERT INTO `php_options` VALUES (8, 2, 1, '', '', 7, '2011-11-10 16:45:43', '2011-11-10', NULL, NULL);
INSERT INTO `php_options` VALUES (9, 2, 1, '', '', 6, '2011-11-10 16:45:43', '2011-11-10', NULL, NULL);
INSERT INTO `php_options` VALUES (10, 2, 1, '', '', 5, '2011-11-10 16:45:43', '2011-11-10', NULL, NULL);
INSERT INTO `php_options` VALUES (11, 2, 1, '', '', 4, '2011-11-10 16:45:43', '2011-11-10', NULL, NULL);
INSERT INTO `php_options` VALUES (12, 2, 1, '', '', 3, '2011-11-10 16:45:43', '2011-11-10', NULL, NULL);
INSERT INTO `php_options` VALUES (13, 2, 1, '', '', 2, '2011-11-10 16:45:43', '2011-11-10', NULL, NULL);
INSERT INTO `php_options` VALUES (14, 2, 1, '', '', 1, '2011-11-10 16:45:43', '2011-11-10', NULL, NULL);
INSERT INTO `php_options` VALUES (15, 2, 1, '', '', 0, '2011-11-10 16:45:43', '2011-11-10', NULL, NULL);

-- --------------------------------------------------------

-- 
-- Table structure for table `php_options_ln`
-- 

CREATE TABLE `php_options_ln` (
  `id` int(5) NOT NULL COMMENT 'system',
  `ln` varchar(2) collate utf8_unicode_ci NOT NULL default '0' COMMENT 'system',
  `ln_icon` varchar(255) collate utf8_unicode_ci default NULL COMMENT 'system',
  `ln_image` varchar(255) collate utf8_unicode_ci default NULL COMMENT 'system',
  `name` varchar(255) collate utf8_unicode_ci default NULL,
  `intro` text collate utf8_unicode_ci,
  `content` text collate utf8_unicode_ci,
  PRIMARY KEY  (`id`,`ln`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 
-- Dumping data for table `php_options_ln`
-- 

INSERT INTO `php_options_ln` VALUES (1, 'vn', '', '', 'V 1.0', NULL, NULL);
INSERT INTO `php_options_ln` VALUES (2, 'vn', '', '', 'V 1.2', NULL, NULL);
INSERT INTO `php_options_ln` VALUES (3, 'vn', '', '', 'V 1.3', NULL, NULL);
INSERT INTO `php_options_ln` VALUES (4, 'vn', '', '', 'V 1.4', NULL, NULL);
INSERT INTO `php_options_ln` VALUES (5, 'vn', '', '', 'V 1.5', NULL, NULL);
INSERT INTO `php_options_ln` VALUES (6, 'vn', '', '', 'jQuery', NULL, NULL);
INSERT INTO `php_options_ln` VALUES (7, 'vn', '', '', 'Number', NULL, NULL);
INSERT INTO `php_options_ln` VALUES (8, 'vn', '', '', 'String', NULL, NULL);
INSERT INTO `php_options_ln` VALUES (9, 'vn', '', '', 'Element', NULL, NULL);
INSERT INTO `php_options_ln` VALUES (10, 'vn', '', '', 'Array<Element>', NULL, NULL);
INSERT INTO `php_options_ln` VALUES (11, 'vn', '', '', 'Any', NULL, NULL);
INSERT INTO `php_options_ln` VALUES (12, 'vn', '', '', 'Array<Function>', NULL, NULL);
INSERT INTO `php_options_ln` VALUES (13, 'vn', '', '', 'Array<Element(s)>', NULL, NULL);
INSERT INTO `php_options_ln` VALUES (14, 'vn', '', '', 'Boolean', NULL, NULL);
INSERT INTO `php_options_ln` VALUES (15, 'vn', '', '', 'Function', NULL, NULL);

-- --------------------------------------------------------

-- 
-- Table structure for table `php_session`
-- 

CREATE TABLE `php_session` (
  `session_id` varchar(255) collate utf8_unicode_ci NOT NULL,
  `expires` int(10) unsigned NOT NULL default '0',
  `data` text collate utf8_unicode_ci,
  PRIMARY KEY  (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 
-- Dumping data for table `php_session`
-- 

INSERT INTO `php_session` VALUES ('72bc324e4d89832991bdf97880879c1d', 1321102255, 'cms_menu|s:3:"0.0";brc|a:2:{s:8:"-Hien Le";a:2:{s:3:"url";s:0:"";s:5:"title";s:7:"Hien Le";}s:19:"?mod=home-Dashboard";a:2:{s:3:"url";s:9:"?mod=home";s:5:"title";s:9:"Dashboard";}}admin_login|a:8:{s:2:"id";s:1:"1";s:8:"is_admin";s:1:"1";s:8:"fullname";s:13:"Administrator";s:8:"username";s:5:"admin";s:8:"password";s:32:"64fab82e39e0946c9d02b12a6aac0683";s:10:"permission";s:3:"ALL";s:4:"data";s:113:"a:3:{s:4:"skin";s:7:"default";s:4:"icon";s:7:"default";s:4:"menu";a:5:{i:0;i:1;i:1;i:1;i:2;i:1;i:3;i:1;i:4;i:1;}}";s:6:"active";s:1:"1";}');

-- --------------------------------------------------------

-- 
-- Table structure for table `php_user`
-- 

CREATE TABLE `php_user` (
  `id` int(5) NOT NULL auto_increment,
  `is_admin` tinyint(1) default '0',
  `fullname` varchar(255) collate utf8_unicode_ci default NULL,
  `username` varchar(255) collate utf8_unicode_ci default NULL,
  `password` varchar(255) collate utf8_unicode_ci default NULL,
  `permission` text collate utf8_unicode_ci,
  `data` text collate utf8_unicode_ci,
  `active` tinyint(1) default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Back end user' AUTO_INCREMENT=9 ;

-- 
-- Dumping data for table `php_user`
-- 

INSERT INTO `php_user` VALUES (1, 1, 'Administrator', 'admin', '64fab82e39e0946c9d02b12a6aac0683', 'ALL', 'a:3:{s:4:"skin";s:7:"default";s:4:"icon";s:7:"default";s:4:"menu";a:5:{i:0;i:1;i:1;i:1;i:2;i:1;i:3;i:1;i:4;i:1;}}', 1);
INSERT INTO `php_user` VALUES (5, 0, 'Linh NMT', 'linh.nguyen', '202cb962ac59075b964b07152d234b70', 'a:2:{s:6:"action";a:3:{s:3:"new";s:7:"checked";s:4:"edit";s:7:"checked";s:6:"delete";s:7:"checked";}s:3:"act";a:1:{i:0;a:2:{s:5:"check";s:4:"true";i:0;s:4:"true";}}}', 'a:3:{s:4:"skin";s:7:"default";s:4:"icon";s:7:"default";s:4:"menu";a:1:{i:0;i:1;}}', 1);
INSERT INTO `php_user` VALUES (6, 0, 'Trieu Linh', 'trieulinh', '202cb962ac59075b964b07152d234b70', 'ALL', 'a:3:{s:4:"skin";s:7:"default";s:4:"icon";s:7:"default";s:4:"menu";a:5:{i:3;i:1;i:2;i:1;i:1;i:1;i:0;i:1;i:4;i:1;}}', 1);
INSERT INTO `php_user` VALUES (7, 0, 'Linh Nguyen', 'linhnmt', '202cb962ac59075b964b07152d234b70', 'ALL', 'a:2:{s:4:"skin";s:7:"default";s:4:"icon";s:7:"default";}', 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `php_user_log`
-- 

CREATE TABLE `php_user_log` (
  `id` int(10) NOT NULL auto_increment,
  `type` varchar(255) collate utf8_unicode_ci default 'cms',
  `userid` int(5) default NULL,
  `ip` varchar(255) collate utf8_unicode_ci default NULL,
  `data` text collate utf8_unicode_ci,
  `timestamp` timestamp NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=42 ;

-- 
-- Dumping data for table `php_user_log`
-- 

INSERT INTO `php_user_log` VALUES (1, 'cms', 1, '127.0.0.1', 'Updated value: kakka for configure: ym', '2011-05-22 10:38:19');
INSERT INTO `php_user_log` VALUES (2, 'cms', 1, '127.0.0.1', 'Updated value: w2ajax@gmail.com for configure: email_contact', '2011-05-22 10:42:17');
INSERT INTO `php_user_log` VALUES (3, 'cms', 1, '127.0.0.1', 'Updated value: xboohb for configure: ym', '2011-05-22 13:54:35');
INSERT INTO `php_user_log` VALUES (4, 'cms', 1, '127.0.0.1', 'Administrator logged in', '2011-05-22 13:54:53');
INSERT INTO `php_user_log` VALUES (5, 'cms', 1, '127.0.0.1', 'Logged in', '2011-05-22 13:55:55');
INSERT INTO `php_user_log` VALUES (6, 'cms', 1, '127.0.0.1', 'Update profile', '2011-05-22 13:58:36');
INSERT INTO `php_user_log` VALUES (7, 'cms', 1, '127.0.0.1', 'Update user: Trieu Linh', '2011-05-22 13:58:57');
INSERT INTO `php_user_log` VALUES (8, 'cms', 1, '127.0.0.1', 'Deleted user: 4', '2011-05-22 14:00:03');
INSERT INTO `php_user_log` VALUES (9, 'cms', 1, '127.0.0.1', 'Set permission for userId: 5', '2011-05-22 14:02:10');
INSERT INTO `php_user_log` VALUES (10, 'cms', 1, '127.0.0.1', 'Reset password', '2011-05-22 14:06:17');
INSERT INTO `php_user_log` VALUES (11, 'cms', 1, '127.0.0.1', 'Reset password for userId: 5', '2011-05-22 14:07:12');
INSERT INTO `php_user_log` VALUES (12, 'cms', 1, '127.0.0.1', 'Logged in', '2011-05-22 14:07:45');
INSERT INTO `php_user_log` VALUES (13, 'cms', 5, '127.0.0.1', 'Logged in', '2011-05-22 14:08:02');
INSERT INTO `php_user_log` VALUES (14, 'cms', 5, '127.0.0.1', 'Update profile', '2011-05-22 14:08:24');
INSERT INTO `php_user_log` VALUES (15, 'cms', 1, '127.0.0.1', 'Logged in', '2011-05-22 14:11:18');
INSERT INTO `php_user_log` VALUES (16, 'cms', 1, '127.0.0.1', 'Update profile', '2011-05-22 14:11:53');
INSERT INTO `php_user_log` VALUES (17, 'cms', 1, '127.0.0.1', 'Reset password', '2011-05-22 14:12:16');
INSERT INTO `php_user_log` VALUES (18, 'cms', 1, '127.0.0.1', 'Logged in', '2011-05-22 14:12:22');
INSERT INTO `php_user_log` VALUES (19, 'cms', 1, '127.0.0.1', 'Updated value: no-reply@domain.com for configure: smtp_from_email', '2011-05-22 14:13:05');
INSERT INTO `php_user_log` VALUES (20, 'cms', 1, '127.0.0.1', 'Logged in', '2011-05-28 11:06:45');
INSERT INTO `php_user_log` VALUES (21, 'cms', 1, '127.0.0.1', 'Logged in', '2011-05-31 08:54:36');
INSERT INTO `php_user_log` VALUES (22, 'cms', 1, '127.0.0.1', 'Logged in', '2011-06-01 08:56:17');
INSERT INTO `php_user_log` VALUES (23, 'cms', 1, '127.0.0.1', 'Logged in', '2011-06-03 08:06:27');
INSERT INTO `php_user_log` VALUES (24, 'cms', 1, '127.0.0.1', 'Logged in', '2011-06-11 20:48:40');
INSERT INTO `php_user_log` VALUES (25, 'cms', 1, '127.0.0.1', 'Updated value: tab for configure: language_tab', '2011-06-11 20:49:34');
INSERT INTO `php_user_log` VALUES (26, 'cms', 1, '127.0.0.1', 'Logged in', '2011-06-13 22:12:03');
INSERT INTO `php_user_log` VALUES (27, 'cms', 1, '127.0.0.1', 'Logged in', '2011-07-15 08:52:49');
INSERT INTO `php_user_log` VALUES (28, 'cms', 1, '127.0.0.1', 'Logged in', '2011-07-15 22:20:36');
INSERT INTO `php_user_log` VALUES (29, 'cms', 1, '127.0.0.1', 'Logged in', '2011-07-31 09:45:39');
INSERT INTO `php_user_log` VALUES (30, 'cms', 1, '127.0.0.1', 'Logged in', '2011-08-12 08:59:20');
INSERT INTO `php_user_log` VALUES (31, 'cms', 1, '127.0.0.1', 'Logged in', '2011-08-13 09:29:17');
INSERT INTO `php_user_log` VALUES (32, 'cms', 1, '127.0.0.1', 'Set permission for userId: 5', '2011-08-13 11:06:03');
INSERT INTO `php_user_log` VALUES (33, 'cms', 1, '127.0.0.1', 'Reset password for userId: 5', '2011-08-13 11:06:23');
INSERT INTO `php_user_log` VALUES (34, 'cms', 5, '127.0.0.1', 'Logged in', '2011-08-13 11:08:22');
INSERT INTO `php_user_log` VALUES (35, 'cms', 1, '127.0.0.1', 'Logged in', '2011-08-15 08:59:22');
INSERT INTO `php_user_log` VALUES (36, 'cms', 1, '127.0.0.1', 'Logged in', '2011-08-15 20:54:24');
INSERT INTO `php_user_log` VALUES (37, 'cms', 1, '127.0.0.1', 'Logged in', '2011-08-17 23:25:37');
INSERT INTO `php_user_log` VALUES (38, 'cms', 1, '127.0.0.1', 'Logged in', '2011-08-22 23:10:54');
INSERT INTO `php_user_log` VALUES (39, 'cms', 1, '127.0.0.1', 'Logged in', '2011-08-27 20:40:55');
INSERT INTO `php_user_log` VALUES (40, 'cms', 1, '127.0.0.1', 'Updated value: no for configure: cache_query', '2011-08-27 21:05:19');
INSERT INTO `php_user_log` VALUES (41, 'cms', 1, '127.0.0.1', 'Updated value: yes for configure: cache_query', '2011-08-27 21:05:30');
