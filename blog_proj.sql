SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `tblemployee` (
  `Emp_ID` int(11) NOT NULL,
  `Emp_Name` varchar(50) NOT NULL,
  `Emp_Age` int(11) DEFAULT NULL,
  `Position` varchar(40) NOT NULL,
  `Salary` decimal(22,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tblemployee` (`Emp_ID`, `Emp_Name`, `Emp_Age`, `Position`, `Salary`) VALUES
(1, 'Johnson', 30, 'Challenger', '500.0000');

CREATE TABLE `tbl_blog` (
  `fld_bid` int(11) NOT NULL,
  `fld_btitle` varchar(128) NOT NULL,
  `fld_bcontent` text NOT NULL,
  `fld_bpict` varchar(128) NOT NULL,
  `fld_bdate` date NOT NULL DEFAULT current_timestamp(),
  `fld_uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tbl_blog` (`fld_bid`, `fld_btitle`, `fld_bcontent`, `fld_bpict`, `fld_bdate`, `fld_uid`) VALUES
(1, 'Maris Racal unleashes fury against creator of her and Sue Ramirez\'s edited photos', '- Maris Racal took to Instagram and echoed the calls of Sue Ramirez calling out the still unnamed perpetrator of their fake photos\r\n\r\n- The controversial photo showed the two stars showing their upper body without clothes on\r\n\r\n- The actress was obviously fuming in her post, and appealed to people to help them find where the photos initially appeared\r\n\r\n- She said, \"Itigil na ang pambababoy ng katawan ng mga babae\"', '1611740963BB1d7RGz.jfif', '2021-01-27', 2),
(3, 'Ian Veneracion posts cryptic message following rumor linking him to Sue Ramirez', 'Sa pamamagitan ng isang cryptic post, sinagot ni Ian Veneracion ang pag-uugnay sa kanya sa aktres na si Sue Ramirez.\r\n\r\nNag-ugat ito sa pagpapangalan ng ilang netizens kina Ian at Sue na siya diumanong tinutukoy sa blind item ng PEP Troika tungkol sa isang guwapong aktor na tila hilwalay na raw sa asawa at pinatos ang isang magandang starlet.\r\n\r\nNilinaw naman ng PEP Troika na hindi sina Ian at Sue ang laman ng kanilang blind item na lumabas noong January 24.', '1611764554BB1d8KtA.jfif', '2021-01-28', 2),
(5, 'List of awards and nominations received by Dua Lipa		', 'English singer Dua Lipa is the recipient of numerous awards.[1] Lipa signed a record deal with Warner Music Group in 2015 and released her self-titled debut album in 2017, which earned her nominations for Album of the Year at the 2017 BBC Music Awards, British Album of the Year at the 2018 Brit Awards, and won International Album of the Year at the thirteenth edition of the LOS40 Music Awards.\r\n\r\nHer song \"New Rules\", from her self-titled album, earned nominations for British Single of the Year and Best British Video at the 2018 Brit Awards, Best Music Video at the 2018 iHeartRadio Music Awards and Song of the Year at the 2018 MTV Video Music Awards. The song won Direction for Music Videos at the 2018 D&AD Awards and Best Song To Lip Sync To at the 2018 Radio Disney Music Awards. \"One Kiss\", a collaboration with Scottish record producer Calvin Harris, and \"IDGAF\" were also nominated for British Single of the Year and Best British Video at the 2019 Brit Awards. Lipa won Best New Artist and Best Dance Recording for \"Electricity\", a collaboration with British-American duo Silk City, at the 61st Annual Grammy Awards.[2]\r\n\r\nLipa has been nominated for ten Brit Awards, eight Grammy Awards and seven NME Awards, winning three, two and one respectively. She became the first female artist to receive five nominations in a single year at the Brit Awards.[3]', '1611989494220px-191125_Dua_Lipa_at_the_2019_American_Music_Awards.png', '2021-01-30', 2);

CREATE TABLE `tbl_feedback` (
  `fld_fid` int(11) NOT NULL,
  `fld_username` varchar(64) NOT NULL,
  `fld_feedback` text NOT NULL,
  `fld_bid` int(11) NOT NULL,
  `fld_uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tbl_feedback` (`fld_fid`, `fld_username`, `fld_feedback`, `fld_bid`, `fld_uid`) VALUES
(3, 'vinz2100', 'asdfsdfasdfasdf', 1, 3),
(4, 'vinz2100', 'hellow!', 1, 3),
(5, 'vinz2100', 'asdasdawdasd', 1, 3),
(6, 'vinz2100', 'asdasdawdasdawdas', 1, 3),
(7, 'brand005', 'adasdawda', 1, 2),
(8, 'vinz2100', 'dasdasd', 1, 3),
(9, 'brand005', 'Hellow World', 1, 2),
(10, 'brand005', 'hello!', 0, 2),
(11, 'vinz2100', 'adfasd', 0, 3),
(12, 'brand005', 'hello', 0, 2),
(13, 'brand005', 'afasdf', 0, 2),
(14, 'vinz2100', 'asdasd', 0, 3),
(15, 'brand005', 'asdawdas', 1, 2),
(16, 'brand005', 'hello!', 1, 2),
(17, 'brand005', 'hi!', 1, 2),
(18, 'brand005', 'welcome', 0, 2),
(19, 'brand005', 'welcome', 1, 2),
(20, 'brand005', 'she looks like a guys', 5, 2);

CREATE TABLE `tbl_login` (
  `fld_uid` int(11) NOT NULL,
  `fld_username` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fld_password` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fld_act_type` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'reader',
  `fld_useremail` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `tbl_login` (`fld_uid`, `fld_username`, `fld_password`, `fld_act_type`, `fld_useremail`) VALUES
(2, 'brand005', '24724f929a873169d3110f8185a1cadf631f17bf', 'editor', 'vincent_merioles@yahoo.com'),
(3, 'vinz2100', '1514bf43762049a7c981b0d9fd82c58107c497c0', 'reader', 'vinz.devera001@gmail.com'),
(4, 'mairar111', '24724f929a873169d3110f8185a1cadf631f17bf', 'reader', 'myrabogatecornejo@yahoo.com'),
(5, 'admin123', 'f865b53623b121fd34ee5426c792e5c33af8c227', 'editor', 'admin@yahoo.com');


ALTER TABLE `tblemployee`
  ADD PRIMARY KEY (`Emp_ID`);

ALTER TABLE `tbl_blog`
  ADD PRIMARY KEY (`fld_bid`);

ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`fld_fid`);

ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`fld_uid`);


ALTER TABLE `tblemployee`
  MODIFY `Emp_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `tbl_blog`
  MODIFY `fld_bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

ALTER TABLE `tbl_feedback`
  MODIFY `fld_fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

ALTER TABLE `tbl_login`
  MODIFY `fld_uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
