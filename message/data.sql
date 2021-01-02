USE `mvc_study`;
CREATE TABLE `comment` (
  `id` int unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `poster` varchar(20) NOT NULL,
  `comment` text NOT NULL,
  `reply` text NOT NULL,
  `mail` varchar(60) NOT NULL,
  `ip` varchar(15) NOT NULL
) DEFAULT CHARSET=utf8;
CREATE TABLE `admin` (
  `id` int unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `salt` char(4) NOT NULL
) DEFAULT CHARSET=utf8;
