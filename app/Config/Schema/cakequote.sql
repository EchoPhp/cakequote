-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Lun 25 Février 2013 à 15:55
-- Version du serveur: 5.5.20
-- Version de PHP: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `cakequote`
--

-- --------------------------------------------------------

--
-- Structure de la table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `groups`
--

INSERT INTO `groups` (`id`, `name`) VALUES
(1, 'administrators'),
(2, 'moderators'),
(3, 'editors');

-- --------------------------------------------------------

--
-- Structure de la table `quotes`
--

CREATE TABLE IF NOT EXISTS `quotes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` char(15) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `body` text,
  `user_id` int(10) unsigned DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `updated` (`updated`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Contenu de la table `quotes`
--

INSERT INTO `quotes` (`id`, `slug`, `title`, `body`, `user_id`, `created`, `updated`) VALUES
(1, 'hasta', 'Kénophobie', 'Peur du noir', 1, '2013-02-19 14:06:17', '2013-02-23 12:16:08'),
(12, NULL, 'Implexe', 'Dont l''intrigue est compliquée', 8, '2013-02-21 20:54:50', '2013-02-23 12:14:03'),
(3, 'wtf', 'Oréade', 'Nymphe des montagnes et des bois', 2, '2013-02-19 15:21:22', '2013-02-23 12:15:45'),
(4, 'mieux-vaut', 'Nasarde', 'Pichenette sur le nez', 2, '2013-02-19 15:21:18', '2013-02-23 12:15:21'),
(5, 'i-am-your-fathe', 'Tétraktys', '10 points rangés en 4 rangés (1 puis 2, puis 3, puis 4) représentant un triangle, également appelé décade', 2, '2013-02-19 15:21:58', '2013-02-23 12:14:59'),
(7, NULL, 'Mirliflore', 'Jeune prétentieux', 5, '2013-02-20 14:33:03', '2013-02-23 12:14:28'),
(13, NULL, 'Ensiforme', 'En forme d''épée', 8, '2013-02-21 20:55:51', '2013-02-23 12:13:42'),
(18, NULL, 'Gonochorisme', ' Séparation complète des sexes dans des individus distincts', 4, '2013-02-23 12:16:44', '2013-02-23 12:18:48'),
(14, NULL, 'Acrimonie', 'mecontentement, amertume\r\n ', 8, '2013-02-21 20:56:59', '2013-02-23 12:13:17'),
(15, NULL, 'Achaler', 'Contrarier quelqu''un', 3, '2013-02-21 20:57:50', '2013-02-23 12:13:00'),
(19, NULL, 'Dispendieux', 'Qui exige une grande dépense', 8, '2013-02-23 12:17:05', '2013-02-23 12:18:41'),
(20, NULL, 'arachibutyrophobie', 'Phobie d''avoir du beurre de cacahuète collé sur le palais', 5, '2013-02-23 12:17:26', '2013-02-23 12:17:26'),
(21, NULL, 'Dynamogénie', 'Accroissement de la fonction d''un organe sous l''action d''une excitation', 7, '2013-02-23 12:17:55', '2013-02-23 12:18:35');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` char(50) NOT NULL,
  `password` char(50) DEFAULT NULL,
  `email` char(200) NOT NULL,
  `group_id` int(10) unsigned NOT NULL DEFAULT '3',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `group_id`, `created`, `updated`) VALUES
(1, 'admin', 'e010540e7c3c212c5c280fd3a63f75cdce9dd123', 'admin@admin.com', 1, '2013-02-19 13:42:43', '2013-02-22 13:34:09'),
(2, 'bob', '188b442b40b385f79ed0b1433a60a321f064263c', 'bob@bob.com', 2, '2013-02-19 15:19:59', '2013-02-20 16:09:21'),
(3, 'alice', '188b442b40b385f79ed0b1433a60a321f064263c', 'alice@alice.com', 3, '2013-02-19 15:20:16', '2013-02-20 16:09:11'),
(4, 'charlie', '188b442b40b385f79ed0b1433a60a321f064263c', 'charlie@charlie.com', 3, '2013-02-19 15:20:32', '2013-02-20 16:09:03'),
(5, 'Echo', '188b442b40b385f79ed0b1433a60a321f064263c', 'laugier.bertrand@gmail.com', 1, '2013-02-20 14:31:39', '2013-02-21 18:58:49'),
(6, 'modo', '188b442b40b385f79ed0b1433a60a321f064263c', 'modo@mail.com', 2, '2013-02-20 15:59:06', '2013-02-20 16:08:40'),
(7, 'modo2', '0444b995127394fd9a26583ec97257dd356f9c63', 'modo2@mail.com', 2, '2013-02-20 16:01:30', '2013-02-21 19:00:27'),
(8, 'Spongebob', '188b442b40b385f79ed0b1433a60a321f064263c', 'bob@bob.com', 3, '2013-02-21 19:09:28', '2013-02-21 19:09:28');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
