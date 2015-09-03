-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2015 年 09 月 03 日 15:21
-- 服务器版本: 5.5.20
-- PHP 版本: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `student_system`
--
CREATE DATABASE `student_system` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `student_system`;

-- --------------------------------------------------------

--
-- 表的结构 `stu_class`
--

CREATE TABLE IF NOT EXISTS `stu_class` (
  `class_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '班级ID',
  `class_name` tinytext NOT NULL COMMENT '班级名称',
  `major_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- 转存表中的数据 `stu_class`
--

INSERT INTO `stu_class` (`class_id`, `class_name`, `major_id`) VALUES
(11, '123', 1),
(17, '31231', 1);

-- --------------------------------------------------------

--
-- 表的结构 `stu_course`
--

CREATE TABLE IF NOT EXISTS `stu_course` (
  `course_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '课程ID',
  `course_name` tinytext NOT NULL COMMENT '课程名称',
  PRIMARY KEY (`course_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `stu_course`
--

INSERT INTO `stu_course` (`course_id`, `course_name`) VALUES
(1, 'PS'),
(3, '3213');

-- --------------------------------------------------------

--
-- 表的结构 `stu_department`
--

CREATE TABLE IF NOT EXISTS `stu_department` (
  `department_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '院系ID',
  `department_name` tinytext CHARACTER SET utf8 NOT NULL COMMENT '院系名称',
  PRIMARY KEY (`department_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `stu_department`
--

INSERT INTO `stu_department` (`department_id`, `department_name`) VALUES
(3, '计算机系'),
(4, '12312');

-- --------------------------------------------------------

--
-- 表的结构 `stu_major`
--

CREATE TABLE IF NOT EXISTS `stu_major` (
  `major_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '专业ID',
  `major_name` tinytext CHARACTER SET utf8 NOT NULL COMMENT '专业名称',
  `department_id` int(10) unsigned NOT NULL COMMENT '院系ID(外键)',
  PRIMARY KEY (`major_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `stu_major`
--

INSERT INTO `stu_major` (`major_id`, `major_name`, `department_id`) VALUES
(1, '计算机专业', 0),
(2, '312312', 0),
(3, '12312', 1);

-- --------------------------------------------------------

--
-- 表的结构 `stu_student`
--

CREATE TABLE IF NOT EXISTS `stu_student` (
  `student_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '学生ID',
  `student_name` tinytext NOT NULL COMMENT '学生名字',
  `student_number` tinytext NOT NULL COMMENT '学号',
  `student_gender` char(1) NOT NULL COMMENT '性别',
  `student_birth` int(10) unsigned NOT NULL COMMENT '出生日期',
  `student_id_card` varchar(18) NOT NULL COMMENT '身份证',
  `student_phone` char(11) NOT NULL COMMENT '手机号码',
  `student_year` int(10) unsigned NOT NULL COMMENT '入学年份',
  `student_major_id` int(10) unsigned NOT NULL COMMENT '专业ID(外键)',
  `student_department_id` int(10) unsigned NOT NULL COMMENT '院系ID(外键)',
  `student_class_id` int(11) unsigned NOT NULL COMMENT '班级ID(外键)',
  `student_point` varchar(3) NOT NULL COMMENT '分数',
  `stu_course_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `stu_student`
--

INSERT INTO `stu_student` (`student_id`, `student_name`, `student_number`, `student_gender`, `student_birth`, `student_id_card`, `student_phone`, `student_year`, `student_major_id`, `student_department_id`, `student_class_id`, `student_point`, `stu_course_id`) VALUES
(1, 'Jeffery', 'wd1511', '1', 1439337600, '11111111111111', '11111111111', 1439251200, 0, 0, 0, '100', 0),
(2, 'Merry', 'b1512', '1', 123123123, '222222222222222222', '12321312312', 13123123, 1, 1, 2, '100', 0),
(3, '3123123', '21313213', '1', 1442448000, '11111111111111', '11111111111', 1443052800, 1, 2, 2, '600', 0),
(4, 'Query', 'wd123123', '1', 1442966400, '22222222222222', '22222222222', 1442966400, 2, 2, 5, '300', 0),
(6, '12312312', '123', '1', 1441756800, '123123', '312', 1441238400, 1, 3, 11, '312', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
