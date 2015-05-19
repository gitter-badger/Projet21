-- phpMyAdmin SQL Dump
-- version 4.2.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Apr 11, 2015 at 12:17 PM
-- Server version: 5.5.41-log
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ternoc`
--

-- --------------------------------------------------------

--
-- Table structure for table `comnews`
--

CREATE TABLE IF NOT EXISTS `comnews` (
`id` int(11) NOT NULL,
  `id_auteur` int(11) NOT NULL,
  `id_news` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `epingle` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `comnews`
--

INSERT INTO `comnews` (`id`, `id_auteur`, `id_news`, `date`, `contenu`, `epingle`) VALUES
(13, 1, 8, '19/02/2015 16h44', 'ses news*', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
`id` int(11) NOT NULL,
  `id_auteur` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `contenu` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `id_auteur`, `titre`, `date`, `image`, `contenu`) VALUES
(8, 1, 'To do list', '19/02/2015 16h39', 'http://www.denovahomes.com/blog/wp-content/uploads/2014/04/to-do-list.png', 'Modification de son profil (mail, mot de passe)<br />\r\nAjout sur le profil : Bio, ces news, dernier commentaires<br />\r\nForum avec sous forum<br />\r\nSystème de vote<br />\r\nCalendrier ');

-- --------------------------------------------------------

--
-- Table structure for table `user`
-- NOTICE : DO NOT USE PASSWORD CLAIR ! IT USED FOR DEV !
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `pseudo_min` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `password_clair` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gravatar` varchar(255) NOT NULL,
  `groupe` varchar(255) NOT NULL,
  `date_inscription` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `pseudo`, `pseudo_min`, `password`, `password_clair`, `email`, `gravatar`, `groupe`, `date_inscription`) VALUES
(1, 'Ternoc', 'ternoc', 'c6379ca9c9ea0ff05661916f7dd7a452', '', 'exemple@exemple.org', 'gravatar@exemple.org', 'administrateur', '06/02/2015 19h31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comnews`
--
ALTER TABLE `comnews`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comnews`
--
ALTER TABLE `comnews`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
