-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 05 fév. 2021 à 11:58
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `espace_membre`
--

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(40) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(40) COLLATE utf8_bin NOT NULL,
  `tel` varchar(20) COLLATE utf8_bin NOT NULL,
  `email` varchar(40) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `tel`, `email`) VALUES
(1, 'Kessous', 'Jérémy', '0685981013', 'jeremykessous@yahoo.fr'),
(2, 'Kessous', 'Jérémy', '0685981013', 'jeremykessous@yahoo.fr'),
(4, 'Kessous', 'Jérémy', '0685981013', 'jeremykessous@yahoo.fr'),
(5, 'Kessous', 'Jérémy', '0685981013', 'jeremykessous@yahoo.fr'),
(6, 'Kessous', 'Jérémy', '0685981013', 'jeremykessous@yahoo.fr'),
(7, 'Toto', 'Tata', '061548752', 'ja@tot.fr'),
(8, 'Toto', 'Tata', '061548752', 'ja@tot.fr'),
(9, 'Jeea', 'gtrhtb', 'hythyyt', 'j@zea.fr'),
(10, 'Jeea', 'gtrhtb', 'hythyyt', 'j@zea.fr'),
(11, 'Jeea', 'gtrhtb', 'hythyyt', 'j@zea.fr'),
(12, 'Jeea', 'gtrhtb', 'hythyyt', 'j@zea.fr'),
(13, 'Jeanne', 'Douchet', '0322414057', 'douchet@google.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
