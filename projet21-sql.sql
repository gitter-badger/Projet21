SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


CREATE TABLE IF NOT EXISTS `comnews` (
`id` int(11) NOT NULL,
  `id_auteur` int(11) NOT NULL,
  `id_news` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `epingle` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

INSERT INTO `comnews` (`id`, `id_auteur`, `id_news`, `date`, `contenu`, `epingle`) VALUES
(1, 1, 1, '03/05/2015 17h58', 'ifhiu_rehgtireugohiuhaiuofdhapiufHJO8IEZQujfpoiJZGOPIJGOIREJSTOIGJERIOSGJHOT OIJGERIOGJEIROMSQJGOI JOPIQSEJRGIOQREJGOIQEJOIijgreoigjq', 1);

CREATE TABLE IF NOT EXISTS `news` (
`id` int(11) NOT NULL,
  `id_auteur` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `contenu` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

INSERT INTO `news` (`id`, `id_auteur`, `titre`, `date`, `image`, `contenu`) VALUES
(1, 1, 'Test', '03/05/2015 17h56', 'http://www.wallpaperup.com/uploads/wallpapers/2014/10/21/489485/big_thumb_b807c2282ab0a491bd5c5c1051c6d312.jpg', 'Bonjour ceci est un test');

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `pseudo_min` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `password_clair` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `bio` text NOT NULL,
  `gravatar` varchar(255) NOT NULL,
  `groupe` varchar(255) NOT NULL,
  `date_inscription` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

INSERT INTO `user` (`id`, `pseudo`, `pseudo_min`, `password`, `password_clair`, `email`, `bio`, `gravatar`, `groupe`, `date_inscription`) VALUES
(1, 'Ternoc', 'ternoc', '41c79636b7536104f8dc7d23087284cf', '', 'euvfteam.hhha2000@gmail.com', '(b)Tercode(/b) créateur du projet 21, développeur en chef et principal.<br />\r\n(link=http://github.com/projet21)GitHub(/link)', 'euvfteam.hhha2000@gmail.com', 'administrateur', '06/02/2015 19h31');


ALTER TABLE `comnews`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `news`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);


ALTER TABLE `comnews`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
ALTER TABLE `news`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
