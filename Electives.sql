-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 08 月 08 日 16:50
-- 服务器版本: 5.5.32
-- PHP 版本: 5.4.6-1ubuntu1.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `Electives`
--

-- --------------------------------------------------------

--
-- 表的结构 `collection`
--

CREATE TABLE IF NOT EXISTS `collection` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `course_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `course_id` (`course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- 转存表中的数据 `collection`
--

INSERT INTO `collection` (`id`, `user_id`, `course_id`) VALUES
(25, 4, 12),
(26, 4, 6);

-- --------------------------------------------------------

--
-- 表的结构 `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `course_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `kickname` varchar(25) DEFAULT NULL,
  `content` text COMMENT '评论内容',
  `exam_form` varchar(20) NOT NULL COMMENT '考试形式',
  `interest_grade` tinyint(2) NOT NULL COMMENT '趣味性',
  `exam_grade` tinyint(2) NOT NULL COMMENT '考试难度',
  `comment_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '评论时间',
  PRIMARY KEY (`id`),
  KEY `course_id` (`course_id`),
  KEY `user_id` (`user_id`),
  KEY `kickname` (`kickname`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `comment`
--

INSERT INTO `comment` (`id`, `course_id`, `user_id`, `kickname`, `content`, `exam_form`, `interest_grade`, `exam_grade`, `comment_time`) VALUES
(1, 1, 3, 'sayue-w', '不怎么点名，但是经常叫人起来回答问题，课的话一般吧。考试写论文，而且到交论文的时候，他会随机抽一些同学上次对自己的论文进行演讲。分数的话一会太高吧。', '写论文', 2, 3, '2013-08-04 03:21:05'),
(2, 1, 3, 'sayue-w', 'dsfasdfasf', 'sdfa', 1, 2, '2013-08-05 09:36:29'),
(3, 2, 3, 'sayue-w', '还行吧', '写论文', 3, 2, '2013-08-06 05:11:31'),
(4, 2, 3, 'sayue-w', '还行吧', '写论文', 3, 2, '2013-08-06 05:15:52'),
(5, 2, 3, 'sayue-w', '还行吧', '写论文', 3, 2, '2013-08-06 05:17:48'),
(6, 3, 3, 'sayue-w', '容易过，但比较枯燥！', '当堂考试', 1, 4, '2013-08-06 05:56:15'),
(7, 3, 3, 'sayue-w', '容易过，但比较枯燥！', '当堂考试', 1, 4, '2013-08-06 05:57:06'),
(8, 3, 3, 'sayue-w', 'OK', '写论文', 4, 5, '2013-08-06 06:00:51'),
(9, 3, 3, 'sayue-w', 'not bad', '写论文', 1, 1, '2013-08-06 06:01:40'),
(10, 3, 3, 'sayue-w', 'xxx', '论文', 3, 3, '2013-08-06 06:05:19'),
(11, 6, 4, 'hello-w', '老师听不错的！', '写论文', 2, 4, '2013-08-06 06:40:43');

-- --------------------------------------------------------

--
-- 表的结构 `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL COMMENT '课程名',
  `campus` varchar(50) NOT NULL COMMENT '课程所属校区',
  `kind` varchar(30) NOT NULL COMMENT '课程归属',
  `code` varchar(15) NOT NULL COMMENT '课程编号',
  `teacher` varchar(20) NOT NULL COMMENT '任课老师',
  `email` varchar(50) DEFAULT NULL COMMENT '联系邮箱',
  `phone` varchar(15) DEFAULT NULL COMMENT '联系电话',
  `intro` text COMMENT '简介',
  `interest_grade` tinyint(2) NOT NULL DEFAULT '0' COMMENT '趣味性',
  `exam_grade` tinyint(2) NOT NULL DEFAULT '0' COMMENT '考试难度',
  `multiple_grade` tinyint(2) NOT NULL DEFAULT '0' COMMENT '综合星级',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `course`
--

INSERT INTO `course` (`id`, `name`, `campus`, `kind`, `code`, `teacher`, `email`, `phone`, `intro`, `interest_grade`, `exam_grade`, `multiple_grade`) VALUES
(1, '电影怎样讲故事', '大学城校区', '人文社会科学类', '02144115', '田昊', 'haostep@sina.com', '31280412', '电影媒体显然与传统的印刷媒体有着很多的不同，电影讲故事与小说、戏剧也不尽一样，电影语言要比单纯的语言更精妙复杂。本课程的主要内容便是介绍如何以形象的画面来传达故事内容也就是对于电影语言的阐释。帮助学生在这个视觉文化兴起的时代，理解电影媒体的创造性方法和叙事潜力。', 1, 3, 4),
(2, '中外广告创意赏析', '大学城校区', '人文社会科学类', '02153115', '张丽平', 'pingping112@sina.com', '13763392567', '本课程主要从广告语、平面广告、电视广告等方面比较中外广告创意的不同，并试图总结优秀广告创意的元素。在本课程中，学生将欣赏到世界一流的广告作品，同时受到创意思维的训练。', 2, 3, 3),
(3, '现代汽车构造', '大学城校区', '工程技术基础类', '16100315', '李毓洲', 'medlyz@gdut.edu.cn', NULL, '本课程是为非车辆工程专业学生开设的全校性公共选修课程。通过本课程的学习，使学生获得汽车构造的基本知识，拓宽知识面。', 2, 3, 3),
(5, '21世纪高新技术', '东风路校区', '工程技术基础类', '04101915', '曹晓国', 'xgcao@gdut.edu.cn', '13570214124', NULL, 1, 1, 2),
(6, '世界文学名著欣赏', '东风路校区', '人文社会科学类', '02111015', '唐靓', 'tj1015@21cn.com', '13560449092', '本课程选取了从古希腊《荷马史诗》到当代的《老人与海》等八部世界经典名著，通过细致的文本分析来感受文学的无穷魅力，同时探讨了人生的种种话题，如爱情、婚姻、个人奋斗、挫折磨难等问题；并对人性的种种弱点：妒忌、自负、轻信、野心等进行了深刻剖析与反省。', 3, 4, 4),
(7, '世界美术名作欣赏', '龙洞校区', '人文社会科学类', '02110715', '金淑芳', 'lizdxxdh@yahoo.com.cn', NULL, '本课程全面介绍西方艺术发展风格流变和著名作品，让学生在美的世界中提升艺术的修养，洞悉艺术背后的世界人文历史。', 1, 3, 4),
(8, '文学与人生', '龙洞校区', '人文社会科学类', '02154615', '唐靓', 'tj1015@21cn.com', '13560449092', NULL, 3, 1, 4),
(9, '环境污染与控制', '大学城校区', '自然科学类', '11111', 'sss', NULL, NULL, NULL, 3, 2, 5),
(10, '环境质量评估', '龙洞校区', '工程技术基础类', '23232', '马晓国', NULL, NULL, NULL, 1, 2, 4),
(11, '微量元素与生命科学', '东风路校区', '自然科学类', '12112', 'sdf', NULL, NULL, NULL, 0, 0, 0),
(12, '美学原理', '东风路校区', '人文社会科学类', '3223', 'sdfs', NULL, NULL, NULL, 0, 0, 0),
(13, '人类生存环境与发展', '东风路校区', '工程技术基础类', '23322', '吴惠玲', NULL, NULL, NULL, 0, 0, 0),
(14, '韩国语', '龙洞校区', '自然科学类', '322323', 'sdfs', NULL, NULL, NULL, 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` varchar(11) NOT NULL COMMENT '学号',
  `password` varchar(100) NOT NULL COMMENT '密码',
  `campus` varchar(50) NOT NULL COMMENT '校区',
  `grade` varchar(10) NOT NULL COMMENT '年级',
  `kickname` varchar(25) DEFAULT NULL COMMENT '昵称',
  `img` varchar(100) DEFAULT NULL,
  `register_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '注册时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `student_id` (`student_id`),
  KEY `kickname` (`kickname`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `student_id`, `password`, `campus`, `grade`, `kickname`, `img`, `register_time`) VALUES
(3, '3111006048', '76f5bd06cabdb7b418d41734c7250e21', '大学城校区', '2011级', 'sayue-w', '8dc10aa3138de8ad2f3c6d78614f9f4e.jpg', '2013-08-04 01:29:41'),
(4, '3111006049', '76f5bd06cabdb7b418d41734c7250e21', '东风路校区', '2011级', 'hello-w', 'ce7d87e3c30395b2cb8cf0eb65a50b1b.jpg', '2013-08-05 06:03:05'),
(5, '3111006047', '76f5bd06cabdb7b418d41734c7250e21', '龙洞校区', '2011级', 'world-q', '22d521898646286977925970e0714886.jpg', '2013-08-05 06:03:05');

--
-- 限制导出的表
--

--
-- 限制表 `collection`
--
ALTER TABLE `collection`
  ADD CONSTRAINT `collection_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `collection_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`);

--
-- 限制表 `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
