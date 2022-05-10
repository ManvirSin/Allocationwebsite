-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2022-05-09 01:54:41
-- 服务器版本： 10.4.24-MariaDB
-- PHP 版本： 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `allocate system`
--

-- --------------------------------------------------------

--
-- 表的结构 `adminaccount`
--

CREATE TABLE `adminaccount` (
  `AdminID` int(20) NOT NULL,
  `AdminEmail` varchar(50) DEFAULT NULL,
  `AdminPassword` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `adminaccount`
--

INSERT INTO `adminaccount` (`AdminID`, `AdminEmail`, `AdminPassword`) VALUES
(1, 'admin@bradford.ac.uk', 'admin');

-- --------------------------------------------------------

--
-- 表的结构 `allocatesystemforstudent`
--

CREATE TABLE `allocatesystemforstudent` (
  `StudentID` int(20) NOT NULL,
  `StudentEmail` varchar(50) DEFAULT NULL,
  `SupID` int(20) DEFAULT NULL,
  `SupervisorEmail` varchar(50) DEFAULT NULL,
  `SupervisorProjectName` varchar(50) DEFAULT NULL,
  `SupervisorProjectInfo` varchar(500) DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `studentaccountinformation`
--

CREATE TABLE `studentaccountinformation` (
  `StudentID` int(20) NOT NULL,
  `StudentEmail` varchar(50) DEFAULT NULL,
  `StudentPassword` int(50) DEFAULT NULL,
  `First_Name` varchar(30) DEFAULT NULL,
  `Last_Name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `studentaccountinformation`
--

INSERT INTO `studentaccountinformation` (`StudentID`, `StudentEmail`, `StudentPassword`, `First_Name`, `Last_Name`) VALUES
(1, 'stu1@bradford.ac.uk', 123, 'stu1', 'stu2'),
(2, 'stu2@bradford.ac.uk', 123, 'stu2', 'stu2'),
(3, 'stu3@bradford.ac.uk', 123, 'stu3', 'stu3'),
(4, 'stu4@bradford.ac.uk', 123, 'stu4', 'stu4'),
(5, 'stu5@bradford.ac.uk', 123, 'stu5', 'stu5');

-- --------------------------------------------------------

--
-- 表的结构 `studentprojects`
--

CREATE TABLE `studentprojects` (
  `StudentID` int(20) NOT NULL,
  `StudentEmail` varchar(50) DEFAULT NULL,
  `StudentProjectName` varchar(50) DEFAULT NULL,
  `StudentProjectInfo` varchar(500) DEFAULT NULL,
  `Status` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `studentprojects`
--

INSERT INTO `studentprojects` (`StudentID`, `StudentEmail`, `StudentProjectName`, `StudentProjectInfo`, `Status`) VALUES
(1, 'stu1@bradford.ac.uk', 'stu1 projects', 'stu1 projects', 'pending ');

-- --------------------------------------------------------

--
-- 表的结构 `supervisoraccount`
--

CREATE TABLE `supervisoraccount` (
  `SupID` int(20) NOT NULL,
  `SupervisorEmail` varchar(50) DEFAULT NULL,
  `SupervisorPassword` varchar(50) DEFAULT NULL,
  `First_Name` varchar(50) DEFAULT NULL,
  `Last_Name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `supervisoraccount`
--

INSERT INTO `supervisoraccount` (`SupID`, `SupervisorEmail`, `SupervisorPassword`, `First_Name`, `Last_Name`) VALUES
(1, 'sup1@bradford.ac.uk', '123', 'sup1', 'sup1'),
(2, 'sup2@bradford.ac.uk', '123', 'sup2', 'sup2'),
(3, 'sup3@bradford.ac.uk', '123', 'sup3', 'sup3'),
(4, 'sup4@bradford.ac.uk', '123', 'sup4', 'sup4'),
(5, 'sup5@bradford.ac.uk', '123', 'sup5', 'sup5');

-- --------------------------------------------------------

--
-- 表的结构 `supervisorprojects`
--

CREATE TABLE `supervisorprojects` (
  `SupID` int(20) NOT NULL,
  `SupervisorEmail` varchar(50) DEFAULT NULL,
  `SupervisorProjectName` varchar(50) DEFAULT NULL,
  `SupervisorProjectInfo` varchar(50) DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `supervisorprojects`
--

INSERT INTO `supervisorprojects` (`SupID`, `SupervisorEmail`, `SupervisorProjectName`, `SupervisorProjectInfo`, `Status`) VALUES
(1, 'sup1@bradford.ac.uk', 'stu1 projects', 'stu1 projects', '0'),
(2, 'sup2@bradford.ac.uk', 'sup2projects', 'this is project for sup2@bradford.ac.uk', '0'),
(3, 'sup3@bradford.ac.uk', 'stu1 project', 'This is my project for stu1@bradford.ac.uk', '0');

--
-- 转储表的索引
--

--
-- 表的索引 `adminaccount`
--
ALTER TABLE `adminaccount`
  ADD PRIMARY KEY (`AdminID`);

--
-- 表的索引 `allocatesystemforstudent`
--
ALTER TABLE `allocatesystemforstudent`
  ADD PRIMARY KEY (`StudentID`),
  ADD KEY `FK supemail` (`SupervisorEmail`),
  ADD KEY `FK supprojectname` (`SupervisorProjectName`),
  ADD KEY `FK supprojectinfo` (`SupervisorProjectInfo`),
  ADD KEY `FK allote studentid email` (`StudentEmail`,`StudentID`),
  ADD KEY `FK supid` (`SupID`);

--
-- 表的索引 `studentaccountinformation`
--
ALTER TABLE `studentaccountinformation`
  ADD PRIMARY KEY (`StudentID`),
  ADD UNIQUE KEY `studentaccountinformation_StudentEmail_uindex` (`StudentEmail`);

--
-- 表的索引 `studentprojects`
--
ALTER TABLE `studentprojects`
  ADD PRIMARY KEY (`StudentID`),
  ADD KEY `FK STUDENTID EMAIL` (`StudentEmail`,`StudentID`);

--
-- 表的索引 `supervisoraccount`
--
ALTER TABLE `supervisoraccount`
  ADD PRIMARY KEY (`SupID`),
  ADD UNIQUE KEY `supervisoraccount_SupervisorEmail_uindex` (`SupervisorEmail`);

--
-- 表的索引 `supervisorprojects`
--
ALTER TABLE `supervisorprojects`
  ADD PRIMARY KEY (`SupID`),
  ADD UNIQUE KEY `supervisorprojects_SupervisorProjectInfo_uindex` (`SupervisorProjectInfo`),
  ADD UNIQUE KEY `supervisorprojects_SupervisorProjectName_uindex` (`SupervisorProjectName`),
  ADD KEY `FK Supemail id` (`SupervisorEmail`,`SupID`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `adminaccount`
--
ALTER TABLE `adminaccount`
  MODIFY `AdminID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `studentaccountinformation`
--
ALTER TABLE `studentaccountinformation`
  MODIFY `StudentID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用表AUTO_INCREMENT `supervisoraccount`
--
ALTER TABLE `supervisoraccount`
  MODIFY `SupID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 限制导出的表
--

--
-- 限制表 `allocatesystemforstudent`
--
ALTER TABLE `allocatesystemforstudent`
  ADD CONSTRAINT `FK allote studentid email` FOREIGN KEY (`StudentEmail`,`StudentID`) REFERENCES `studentaccountinformation` (`StudentEmail`, `StudentID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK supemail` FOREIGN KEY (`SupervisorEmail`) REFERENCES `supervisorprojects` (`SupervisorEmail`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK supid` FOREIGN KEY (`SupID`) REFERENCES `supervisoraccount` (`SupID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK supprojectinfo` FOREIGN KEY (`SupervisorProjectInfo`) REFERENCES `supervisorprojects` (`SupervisorProjectInfo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK supprojectname` FOREIGN KEY (`SupervisorProjectName`) REFERENCES `supervisorprojects` (`SupervisorProjectName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `studentprojects`
--
ALTER TABLE `studentprojects`
  ADD CONSTRAINT `FK STUDENTID EMAIL` FOREIGN KEY (`StudentEmail`,`StudentID`) REFERENCES `studentaccountinformation` (`StudentEmail`, `StudentID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `supervisorprojects`
--
ALTER TABLE `supervisorprojects`
  ADD CONSTRAINT `FK Supemail id` FOREIGN KEY (`SupervisorEmail`,`SupID`) REFERENCES `supervisoraccount` (`SupervisorEmail`, `SupID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
