-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 16 déc. 2019 à 18:07
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `livreor`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commentaire` text NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `commentaire`, `id_utilisateur`, `date`) VALUES
(1, 'bonjour ', 2, '2019-12-11 00:00:00'),
(2, 'LOLOLO', 2, '2019-12-11 14:51:57'),
(3, 'bonjour\r\n', 5, '2019-12-11 15:03:17'),
(4, 'bonjour\r\n', 5, '2019-12-11 15:05:53'),
(5, 'bonjour\r\n', 2, '2019-12-11 15:30:25'),
(6, 'bonjourbonjour\r\n', 2, '2019-12-11 17:01:17'),
(7, 'hh\r\n', 2, '2019-12-12 09:02:10'),
(8, 'Bonjour\r\nBonsoir\r\naurevoir\r\nadios\r\nbla\r\nbla\r\nbla\r\nbla', 6, '2019-12-12 13:45:38'),
(9, 'bibi', 7, '2019-12-13 17:14:57'),
(10, 'ttt-ttttt\r\n', 10, '2019-12-13 17:58:23');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'baba23', 'baba'),
(3, 'zaza', 'zaza'),
(4, 'tata', '$2y$12$4PQM1MTTt0TdHLzi2Oty8.q3b5m025z4XpVtgQtk07tHVWbqKCFjq'),
(5, 'zozo', '$2y$12$DWKXKzhxwCS.3vNN3sg.IOi.Jfy3K.edw9V4SSKaSVRE8NTxCzSHi'),
(6, 'serge', '$2y$12$7lmvh5V4Oa0FSjzBsCqvNuhvKaEp7.0CFGuQ1lcoASFyFkVPP32cK'),
(7, 'bebe', '$2y$12$5MQc5edybVfKQD2k0yJQi.AfzKo6p6Xss0bbr1jzMMDrU1IlM0/Xm'),
(8, 'aza', 'aza'),
(9, 'a', 'a'),
(10, 'qss', 'qss');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
