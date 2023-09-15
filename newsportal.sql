-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 14, 2023 at 11:31 PM
-- Server version: 10.3.39-MariaDB
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `icarenqc_news`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `id` int(11) NOT NULL,
  `AdminUserName` varchar(255) DEFAULT NULL,
  `AdminPassword` varchar(255) DEFAULT NULL,
  `AdminEmailId` varchar(255) DEFAULT NULL,
  `userType` int(11) DEFAULT NULL,
  `CreatedDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdatedDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`id`, `AdminUserName`, `AdminPassword`, `AdminEmailId`, `userType`, `CreatedDate`, `UpdatedDate`) VALUES
(1, 'admin', 'c4ca4238a0b923820dcc509a6f75849b', 'ravkdl@gmail.com', 1, '2021-05-26 18:30:00', '0000-00-00 00:00:00'),
(3, 'ravi', '0cc175b9c0f1b6a831c399e269772661', 'ravi@gmail.com', 0, '2021-11-10 18:28:11', '2023-09-14 10:18:39'),
(11, 'nischal', '354b28c72430b1b5380fa28fd26acd4c', 'nischal@gmail.com', 0, '2023-09-05 06:31:09', '2023-09-14 07:09:38');

-- --------------------------------------------------------

--
-- Table structure for table `tbladvertisement`
--

CREATE TABLE `tbladvertisement` (
  `Id` int(11) NOT NULL,
  `Location` int(11) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `URL` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `CreatedDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbladvertisement`
--

INSERT INTO `tbladvertisement` (`Id`, `Location`, `Description`, `URL`, `Image`, `CreatedDate`) VALUES
(4, 1, 'Subishu Internet Offer', 'https://www.ravikandel.com.np', 'ae232959f582523f13c017d2cc838553.gif', '2023-09-08 04:30:38'),
(6, 2, 'Woolworth', 'http://www.woolworths.com.au', '856a78b314be230abb82e11d560a1dbd.gif', '2023-09-09 10:01:34'),
(7, 3, 'Nepal Life Insurance', 'https://nlic.com.np', 'cca65db8f273fb39417a2d4043b35c3f.gif', '2023-09-09 10:03:42');

-- --------------------------------------------------------

--
-- Table structure for table `tblagencyinfo`
--

CREATE TABLE `tblagencyinfo` (
  `Id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `RegisteredNo` varchar(100) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `ContactNo` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `FacebookUrl` varchar(200) NOT NULL,
  `TwitterUrl` varchar(200) NOT NULL,
  `YoutubeUrl` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblagencyinfo`
--

INSERT INTO `tblagencyinfo` (`Id`, `Name`, `RegisteredNo`, `Address`, `ContactNo`, `Email`, `FacebookUrl`, `TwitterUrl`, `YoutubeUrl`) VALUES
(1, 'International Media Pvt. Ltd', '123 123 1342', '1/21-23 Gordon St, Hurstville', '0420509002', 'contact@khabarpatra.com', 'https://www.facebook.com', 'https://www.twitter.com', 'https://www.youtube.com');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `Id` int(11) NOT NULL,
  `CategoryName` varchar(200) DEFAULT NULL,
  `CategoryDescription` mediumtext DEFAULT NULL,
  `CreatedDate` timestamp NULL DEFAULT current_timestamp(),
  `ModifiedDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `IsActive` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`Id`, `CategoryName`, `CategoryDescription`, `CreatedDate`, `ModifiedDate`, `IsActive`) VALUES
(3, 'National', 'This is a collection page for national news.', '2021-06-05 18:30:00', '2023-08-31 02:13:12', 1),
(5, 'World', 'This is a collection page for World news.', '2021-06-13 18:30:00', '2023-08-31 02:14:24', 1),
(6, 'Politics', 'This is a collection page for Politics news', '2021-06-21 18:30:00', '2023-08-31 02:15:34', 1),
(7, 'Business', 'This is a collection page for Business news.', '2021-06-21 18:30:00', '2023-08-31 02:15:47', 1),
(8, 'Sport', 'This is a collection page for Sport news.', '2021-11-07 18:17:28', '2023-08-31 02:16:31', 1),
(9, 'Entertainment', 'This is a collection page for Entertainment news.', '2023-08-31 02:18:05', '2023-08-31 04:47:28', 1),
(10, 'Lifestyle', 'This is a collection page for lifestyle news.', '2023-08-31 02:18:05', '2023-08-31 04:47:31', 0),
(11, 'Technology', 'This is a collection page for technology news.', '2023-08-31 02:20:22', '2023-08-31 04:47:34', 1),
(12, 'Others', 'This is a collection page for others news.', '2023-08-31 02:20:22', '2023-09-14 07:37:30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblcomments`
--

CREATE TABLE `tblcomments` (
  `id` int(11) NOT NULL,
  `postId` int(11) DEFAULT NULL,
  `name` varchar(120) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `comment` mediumtext DEFAULT NULL,
  `createdDate` timestamp NULL DEFAULT current_timestamp(),
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblcomments`
--

INSERT INTO `tblcomments` (`id`, `postId`, `name`, `email`, `comment`, `createdDate`, `status`) VALUES
(1, 12, 'Anuj', 'anuj@gmail.com', 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.', '2021-11-20 18:30:00', 1),
(9, 12, 'Ravi Kandel', 'ravkdl@gmail.com', 'This is the test Comment.', '2023-09-04 09:07:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblpages`
--

CREATE TABLE `tblpages` (
  `id` int(11) NOT NULL,
  `PageName` varchar(200) DEFAULT NULL,
  `PageTitle` mediumtext DEFAULT NULL,
  `Description` longtext DEFAULT NULL,
  `CreatedDate` timestamp NULL DEFAULT current_timestamp(),
  `ModifiedDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblpages`
--

INSERT INTO `tblpages` (`id`, `PageName`, `PageTitle`, `Description`, `CreatedDate`, `ModifiedDate`) VALUES
(1, 'aboutus', 'About Us', '<p>News Portal is Australia’s most trusted source of news and current affairs. Nine’s experienced team has delivered breaking news, features and exclusive news from around Australia and the world into homes since 1956.</p><p>Since the very first news bulletin Channel Nine has continued to broadcast more hours of news and current affairs than any other Australian commercial TV network.</p><p>The TCN-9 television tower and studios at Willoughby – where the Nine Entertainment Company is still based to this day – were built in 1956, in preparation for television’s launch. TCN-9 began broadcasting regularly on October 27.</p><p>That first bulletin may have been broadcast over 60 years ago but the values and philosophy of Nine News remain the same to this day - accurate, authentic and trusted reporting.&nbsp;</p>', '2021-06-29 18:30:00', '2023-09-14 08:47:42'),
(2, 'contactus', 'Contact Us', '<p>Please consult with our management team and ask quotation about price, size and placement of advertisemenst.</p>', '2021-06-29 18:30:00', '2023-09-14 08:52:32');

-- --------------------------------------------------------

--
-- Table structure for table `tblposts`
--

CREATE TABLE `tblposts` (
  `Id` int(11) NOT NULL,
  `PostTitle` longtext DEFAULT NULL,
  `CategoryId` int(11) DEFAULT NULL,
  `SubCategoryId` int(11) DEFAULT NULL,
  `PostDetails` longtext CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `CreatedDate` timestamp NULL DEFAULT current_timestamp(),
  `ModifiedDate` timestamp NULL DEFAULT NULL,
  `IsActive` int(1) DEFAULT NULL,
  `PostUrl` mediumtext DEFAULT NULL,
  `PostImage` varchar(255) DEFAULT NULL,
  `ViewCounter` int(11) DEFAULT 0,
  `PostedBy` varchar(255) DEFAULT NULL,
  `LastUpdatedBy` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblposts`
--

INSERT INTO `tblposts` (`Id`, `PostTitle`, `CategoryId`, `SubCategoryId`, `PostDetails`, `CreatedDate`, `ModifiedDate`, `IsActive`, `PostUrl`, `PostImage`, `ViewCounter`, `PostedBy`, `LastUpdatedBy`) VALUES
(7, 'Jasprit Bumrah ruled out of T20I series', 8, 4, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', '2021-07-07 18:30:00', '2021-11-10 18:42:01', 1, 'Jasprit-Bumrah-ruled-out-of-T20I-series', '6d08a26c92cf30db69197a1fb7230626.jpg', 29, 'admin', 'admin'),
(10, 'Smoke haze to clear for Sydney Marathon, firies say', 3, 3, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', '2021-06-30 18:30:00', '2021-11-10 18:41:20', 1, 'Smoke-haze-to-clear-for-Sydney-Marathon,-firies-say', '4a47a0db6e60853dedfcfdf08a5ca249.png', 18, 'admin', 'admin'),
(11, 'Job surge keeps unemployment rate flat, smashes market', 3, 3, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', '2021-06-30 18:30:00', '2021-11-10 18:41:22', 1, 'Job-surge-keeps-unemployment-rate-flat,-smashes-market', '27095ab35ac9b89abb8f32ad3adef56a.jpg', 38, 'admin', 'admin'),
(12, 'Shah holds meeting with NSW states leaders', 3, 3, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', '2021-06-30 18:30:00', '2021-11-10 19:00:27', 1, 'Shah-holds-meeting-with-NSW-states-leaders', '7fdc1a630c238af0815181f9faa190f5.jpg', 153, 'admin', 'admin'),
(13, 'T20 World Cup 2021: England vs New Zealand', 8, 4, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', '2021-11-10 18:50:09', '2021-11-10 18:59:43', 1, 'T20-World-Cup-2021:-England-vs-New-Zealand', '8bc5c30be91dca9d07c1db858c60e39f.jpg', 35, 'admin', 'admin'),
(16, 'US to arm Kyiv with depleted uranium tank', 5, 19, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', '2023-09-07 03:44:00', NULL, 1, 'US-to-arm-Kyiv-with-depleted-uranium-tank', 'ebabb85bfa71b47773dab8d54debc9ad.jpg', 2, 'nischal', 'admin'),
(17, 'Trump’s first 100 days on the global stage', 5, 21, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', '2023-09-07 03:54:54', NULL, 1, 'Trump’s-first-100-days-on-the-global-stage', 'eff60af78d1ded9d62fcff68f84370eejpeg', 1, 'nischal', 'admin'),
(19, 'Trump dumps Russia, woos China instead', 5, 26, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', '2023-09-07 04:09:36', NULL, 1, 'Trump-dumps-Russia,-woos-China-instead', '67e633b9a98cf4347d4fd095e8872859.jpg', 3, 'nischal', 'admin'),
(21, 'Will Alan Joyce receive his full exit bonus from Qantas ', 7, 22, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', '2023-09-07 04:15:49', NULL, 1, 'Will-Alan-Joyce-receive-his-full-exit-bonus-from-Qantas-', 'fb5c81ed3a220004b71069645f112867.png', NULL, 'nischal', 'admin'),
(22, 'Won’t survive the day’: Star’s alarming selfie', 9, 24, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', '2023-09-07 04:21:42', NULL, 1, 'Won’t-survive-the-day’:-Star’s-alarming-selfie', 'd2f0c80d20958b0fd6e7875d936d07c8jpeg', NULL, 'nischal', NULL),
(23, 'China Demands Tech Firms Reveal Hackable Flaws in Their Products', 11, 25, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', '2023-09-07 04:26:01', NULL, 1, 'China-Demands-Tech-Firms-Reveal-Hackable-Flaws-in-Their-Products', '898e30455f58772557c1ab65af3575e9jpeg', NULL, 'nischal', 'admin'),
(24, 'Apple announces iPhone 15 with new charging port', 11, 25, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', '2023-09-12 06:27:30', NULL, 1, 'Apple-announces-iPhone-15-with-new-charging-port', '10fb15c77258a991b0028080a64fb42d.png', NULL, 'ravi', 'admin'),
(25, 'The Future of Artificial Intelligence in Healthcare', 11, 25, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', '2023-09-12 06:27:54', NULL, 1, 'The-Future-of-Artificial-Intelligence-in-Healthcare', '85d799795395aa87ffc022d46198baa6jpeg', 2, 'ravi', NULL),
(26, 'Elon Musk isnt serious about cage fight, Mark Zuckerberg', 11, 25, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', '2023-09-14 04:12:42', NULL, 1, 'Elon-Musk-isnt-serious-about-cage-fight,-Mark-Zuckerberg', '09dd8c2662b96ce14928333f055c5580.png', 0, 'admin', NULL),
(27, 'Australias population hits 265 million in postpandemic migration', 3, 3, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', '2023-09-14 04:28:22', NULL, 1, 'Australias-population-hits-265-million-in-postpandemic-migration', '8266e4bfeda1bd42d8f9794eb4ea0a13.png', 0, 'admin', NULL),
(28, 'Third person charged after mans body found on Melbourne street', 3, 6, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', '2023-09-14 04:32:25', NULL, 1, 'Third-person-charged-after-mans-body-found-on-Melbourne-street', 'f19c9085129709ee14d013be869df69b.png', 0, 'admin', NULL),
(29, 'Free high school teaching degrees in Victoria', 3, 6, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', '2023-09-14 04:34:21', NULL, 1, 'Free-high-school-teaching-degrees-in-Victoria', '9eb9cd58b9ea5e04c890326b5c1f471f.png', 0, 'admin', 'admin'),
(30, 'Sydney Marathon to continue as air quality drops', 3, 3, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', '2023-09-14 04:37:59', NULL, 1, 'Sydney-Marathon-to-continue-as-air-quality-drops', '602e8f042f463dc47ebfdf6a94ed5a6d.png', 1, 'admin', NULL),
(31, 'Nurse who tampered with COVID19 vaccines guilty of misconduct', 3, 3, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', '2023-09-14 04:39:34', NULL, 1, 'Nurse-who-tampered-with-COVID19-vaccines-guilty-of-misconduct', '7afbb1602613ec52b265d7a54ad27330.png', 0, 'admin', NULL),
(32, 'The friendship mixers breaking through the loneliness epidemic', 3, 3, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', '2023-09-14 04:40:44', NULL, 1, 'The-friendship-mixers-breaking-through-the-loneliness-epidemic', '586e508f161f26ce94633729ac56c602.png', 1, 'admin', NULL),
(33, 'Trio arrested over death of Sara Sharif and flown to UK', 5, 21, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', '2023-09-14 04:42:41', NULL, 1, 'Trio-arrested-over-death-of-Sara-Sharif-and-flown-to-UK', '59b2900aa03cb2182a51cdb520b535b6.png', 0, 'admin', NULL),
(34, 'Elon Musk and Grimes reveal bizarre name for third child', 5, 19, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', '2023-09-14 04:44:01', NULL, 1, 'Elon-Musk-and-Grimes-reveal-bizarre-name-for-third-child', '9eb60bc8bf2b004e4db7d1cc0d5f1d8c.png', 0, 'admin', NULL),
(35, 'The foldable mat that revolutionised my fitness', 12, 17, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', '2023-09-14 04:47:47', NULL, 1, 'The-foldable-mat-that-revolutionised-my-fitness', 'c00b57557743e709b8b96933432e0dfa.png', 0, 'admin', NULL),
(36, 'Align your chakras with these yoga mats', 12, 18, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', '2023-09-14 04:49:08', NULL, 1, 'Align-your-chakras-with-these-yoga-mats', '7b6fbd4c592d356e087a0f1053751007.png', 0, 'admin', NULL),
(37, 'Our honest thoughts on the desk treadmill', 12, 18, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', '2023-09-14 04:50:29', NULL, 1, 'Our-honest-thoughts-on-the-desk-treadmill', 'd642f8c3d2d6c1ab174d170d2dc8ed78.png', 1, 'admin', NULL),
(38, 'The best foam rollers to save you a visit to the physio', 12, 18, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', '2023-09-14 04:51:32', NULL, 1, 'The-best-foam-rollers-to-save-you-a-visit-to-the-physio', '1e412544122065c25107eadecd8208c7.png', 6, 'admin', NULL),
(39, 'South Australias top cop handed six figure pay rise', 6, 20, '<p>d</p>', '2023-09-14 09:13:50', NULL, 1, 'South-Australias-top-cop-handed-six-figure-pay-rise', '32d3ca5e23f4ccf1e4c8660c40e75f33.png', 2, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubcategory`
--

CREATE TABLE `tblsubcategory` (
  `SubCategoryId` int(11) NOT NULL,
  `CategoryId` int(11) DEFAULT NULL,
  `SubCategoryName` varchar(255) DEFAULT NULL,
  `SubCategoryDescription` mediumtext DEFAULT NULL,
  `CreatedDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `ModifiedDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `IsActive` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblsubcategory`
--

INSERT INTO `tblsubcategory` (`SubCategoryId`, `CategoryId`, `SubCategoryName`, `SubCategoryDescription`, `CreatedDate`, `ModifiedDate`, `IsActive`) VALUES
(3, 3, 'NSW', 'New South Wales', '2021-06-21 18:30:00', '2023-08-31 04:52:28', 1),
(4, 8, 'Cricket', 'Cricket\r\n\r\n', '2021-06-29 18:30:00', '2023-08-31 04:49:55', 1),
(5, 8, 'Football', 'Football', '2021-06-29 18:30:00', '2023-08-31 04:50:00', 1),
(6, 3, 'VIC', 'Victoria', '2021-06-30 18:30:00', '2023-08-31 04:52:35', 1),
(7, 3, 'QLD', 'Queensland', '2021-06-30 18:30:00', '2023-08-31 04:52:40', 1),
(8, 3, 'SA', 'South Australia', '2021-06-30 18:30:00', '2023-08-31 04:52:46', 1),
(9, 3, 'WA', 'Western Australia', '2021-06-30 18:30:00', '2023-08-31 04:52:51', 1),
(10, 8, 'Tennis', 'Tennis', '2021-11-07 18:18:25', NULL, 1),
(11, 3, 'TAS', 'Tasmania', '2023-08-31 13:16:04', NULL, 1),
(12, 3, 'NT', 'Northern Territory', '2023-08-31 13:16:51', NULL, 1),
(13, 3, 'ACT', 'Australia Capital Territory', '2023-08-31 13:17:18', NULL, 1),
(14, 8, 'Rugby', 'Rugby', '2023-08-31 13:19:08', NULL, 1),
(17, 12, 'Education', 'This is for Education sub category', '2023-09-05 04:12:42', NULL, 1),
(18, 12, 'Health', 'This is health subcategory', '2023-09-05 04:13:16', NULL, 1),
(19, 5, 'Europe', 'Latest news on Europe only on News portal !', '2023-09-07 03:38:54', NULL, 1),
(20, 6, 'US', 'Politcs in US', '2023-09-07 03:54:18', NULL, 1),
(21, 5, 'North America', 'Northamerica news', '2023-09-07 03:55:27', NULL, 1),
(22, 7, 'Aviation', 'Sky', '2023-09-07 04:12:02', '2023-09-14 08:07:31', 1),
(23, 7, 'Real state', 'lands', '2023-09-07 04:16:36', NULL, 1),
(24, 9, 'Billboard', 'Billboard', '2023-09-07 04:19:44', NULL, 1),
(25, 11, 'Tech-development', 'Technology', '2023-09-07 04:23:01', '2023-09-14 08:06:33', 1),
(26, 5, 'China', 'This is for china news only', '2023-09-14 03:58:51', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `AdminUserName` (`AdminUserName`);

--
-- Indexes for table `tbladvertisement`
--
ALTER TABLE `tbladvertisement`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblagencyinfo`
--
ALTER TABLE `tblagencyinfo`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblcomments`
--
ALTER TABLE `tblcomments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `postId` (`postId`);

--
-- Indexes for table `tblpages`
--
ALTER TABLE `tblpages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblposts`
--
ALTER TABLE `tblposts`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `id` (`Id`),
  ADD KEY `postcatid` (`CategoryId`),
  ADD KEY `postsucatid` (`SubCategoryId`),
  ADD KEY `subadmin` (`PostedBy`);

--
-- Indexes for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  ADD PRIMARY KEY (`SubCategoryId`),
  ADD KEY `catid` (`CategoryId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbladvertisement`
--
ALTER TABLE `tbladvertisement`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblagencyinfo`
--
ALTER TABLE `tblagencyinfo`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tblcomments`
--
ALTER TABLE `tblcomments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tblpages`
--
ALTER TABLE `tblpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblposts`
--
ALTER TABLE `tblposts`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  MODIFY `SubCategoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblcomments`
--
ALTER TABLE `tblcomments`
  ADD CONSTRAINT `pid` FOREIGN KEY (`postId`) REFERENCES `tblposts` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tblposts`
--
ALTER TABLE `tblposts`
  ADD CONSTRAINT `postcatid` FOREIGN KEY (`CategoryId`) REFERENCES `tblcategory` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `postsucatid` FOREIGN KEY (`SubCategoryId`) REFERENCES `tblsubcategory` (`SubCategoryId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `subadmin` FOREIGN KEY (`PostedBy`) REFERENCES `tbladmin` (`AdminUserName`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  ADD CONSTRAINT `catid` FOREIGN KEY (`CategoryId`) REFERENCES `tblcategory` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
