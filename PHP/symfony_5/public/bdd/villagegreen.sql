-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 28 fév. 2021 à 20:25
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
-- Base de données : `villagegreen`
--

-- --------------------------------------------------------

--
-- Structure de la table `address`
--

DROP TABLE IF EXISTS `address`;
CREATE TABLE IF NOT EXISTS `address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D4E6F81A76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `address`
--

INSERT INTO `address` (`id`, `user_id`, `name`, `firstname`, `lastname`, `company`, `address`, `postal`, `city`, `country`, `phone`) VALUES
(2, 1, 'Bordeaux gavé bieng', 'Jean', 'Castex', NULL, '51, rue Henri IV', '33000', 'Bordeaux', 'FR', '0679313131'),
(3, 1, 'Afpa City', 'Jean', 'Bon', NULL, '78, rue de l\'afpa', '80000', 'Moncuq', 'FR', '0679313131'),
(6, 1, 'Bordeaux gavé bieng2', 'Jean', 'Castex', NULL, '51, rue Henri IV', '65455', 'Bordeaux', 'BI', '0679313131'),
(7, 14, 'Domicile', 'Jérémy', 'Kessous', NULL, '118 rue riolan', '80000', 'Amiens', 'FR', '0685981013');

-- --------------------------------------------------------

--
-- Structure de la table `carrier`
--

DROP TABLE IF EXISTS `carrier`;
CREATE TABLE IF NOT EXISTS `carrier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `carrier`
--

INSERT INTO `carrier` (`id`, `name`, `description`, `price`) VALUES
(1, 'Colissimo', 'Profitez d\'une livraison premium avec une livraison chez vous dans les 72h.', 590),
(2, 'Chronopost', 'Faites vous livrer votre colis en 24h.', 1490);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Guitare Electrique'),
(2, 'Guitare Sèche'),
(4, 'Violon');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210219210012', '2021-02-21 22:28:57', 200),
('DoctrineMigrations\\Version20210221224805', '2021-02-21 22:48:24', 232),
('DoctrineMigrations\\Version20210221225832', '2021-02-21 22:58:39', 1776),
('DoctrineMigrations\\Version20210224043859', '2021-02-24 04:39:12', 1322),
('DoctrineMigrations\\Version20210224101011', '2021-02-24 10:10:23', 630),
('DoctrineMigrations\\Version20210224212422', '2021-02-24 21:24:38', 363),
('DoctrineMigrations\\Version20210224213721', '2021-02-24 21:37:32', 1015),
('DoctrineMigrations\\Version20210225030505', '2021-02-25 03:05:18', 274),
('DoctrineMigrations\\Version20210225193720', '2021-02-25 19:37:33', 464),
('DoctrineMigrations\\Version20210225201230', '2021-02-25 20:12:41', 457),
('DoctrineMigrations\\Version20210228101815', '2021-02-28 10:18:32', 318),
('DoctrineMigrations\\Version20210228181754', '2021-02-28 18:18:10', 116),
('DoctrineMigrations\\Version20210228185936', '2021-02-28 18:59:55', 47);

-- --------------------------------------------------------

--
-- Structure de la table `header`
--

DROP TABLE IF EXISTS `header`;
CREATE TABLE IF NOT EXISTS `header` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `btn_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `btn_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `illustration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `header`
--

INSERT INTO `header` (`id`, `title`, `content`, `btn_title`, `btn_url`, `illustration`) VALUES
(1, 'Voyagez à deux !', 'Découvrez nos guitares acoustiques pour ne jamais être à court de musique.', 'Découvrir', '/nos-produits?string=&categories%5B%5D=2&submit=&_token=rrV2knhQboJGYDREw_26xfTu6RTgqhkOvu-qDbK9ssQ', '846e17a6c40bef8e5397ba7eefad4f1596ca89c5.jpg'),
(2, 'Du gros son en perspective !', 'Faites trembler les murs avec notre nouvelle sélection de guitares électriques, oreilles sensibles, s\'abstenir !', 'Découvrir', '/nos-produits?string=&categories%5B%5D=1&submit=&_token=rrV2knhQboJGYDREw_26xfTu6RTgqhkOvu-qDbK9ssQ', '4d61eb12932aa64b7e56a964793bcc91a0fed9f4.jpg'),
(3, 'Jouez sur la corde sensible !', 'Découvrez notre large choix de violons réalisés par des luthiers d\'exeptions, il y en a pour tous les prix', 'Découvrir', '/nos-produits?string=&categories%5B%5D=4&submit=&_token=rrV2knhQboJGYDREw_26xfTu6RTgqhkOvu-qDbK9ssQ', 'fb026e6762c1050e1b9ab4ecd202548677de1ea1.jpg'),
(4, 'La musique adoucie les moeurs !', 'Chez Village Green, il y en a pour tous les goûts, du classique au metal le plus hardcore, que vous soyez adepte des soirées feux de camps, des chateaux  baroques ou des pogos sur-vitaminés, nous avons l\'instrument qu\'il vous faut !', 'Découvrir', '/nos-produits', 'eca37917338a8c3e3b1f5be326b37a9ec5a03841.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `carrier_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `carrier_price` double NOT NULL,
  `delivery` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_session_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_F5299398A76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `order`
--

INSERT INTO `order` (`id`, `user_id`, `created_at`, `carrier_name`, `carrier_price`, `delivery`, `reference`, `stripe_session_id`, `state`) VALUES
(1, 1, '2021-02-25 03:39:23', 'Chronopost', 14.9, '<br/>FR', '', NULL, 0),
(2, 1, '2021-02-25 20:24:49', 'Colissimo', 9.9, 'Jean Castex<br/>0679313131<br/>51, rue Henri IV<br/>33000 Bordeaux<br/>FR', '25022021-6038079110633', NULL, 0),
(3, 1, '2021-02-25 20:25:06', 'Colissimo', 9.9, 'Jean Castex<br/>0679313131<br/>51, rue Henri IV<br/>33000 Bordeaux<br/>FR', '25022021-603807a2366b1', NULL, 0),
(4, 1, '2021-02-25 20:25:33', 'Colissimo', 9.9, 'Jean Castex<br/>0679313131<br/>51, rue Henri IV<br/>33000 Bordeaux<br/>FR', '25022021-603807bd83da8', NULL, 0),
(5, 1, '2021-02-25 20:27:39', 'Colissimo', 9.9, 'Jean Castex<br/>0679313131<br/>51, rue Henri IV<br/>33000 Bordeaux<br/>FR', '25022021-6038083b2a783', NULL, 0),
(6, 1, '2021-02-25 20:32:56', 'Colissimo', 9.9, 'Jean Castex<br/>0679313131<br/>51, rue Henri IV<br/>33000 Bordeaux<br/>FR', '25022021-60380978b8e68', NULL, 0),
(7, 1, '2021-02-25 20:34:20', 'Colissimo', 9.9, 'Jean Bon<br/>0679313131<br/>78, rue de l\'afpa<br/>80000 Moncuq<br/>FR', '25022021-603809ccc8594', NULL, 0),
(8, 1, '2021-02-25 20:36:31', 'Colissimo', 9.9, 'Jean Bon<br/>0679313131<br/>78, rue de l\'afpa<br/>80000 Moncuq<br/>FR', '25022021-60380a4f600e2', NULL, 0),
(9, 1, '2021-02-25 20:36:40', 'Colissimo', 9.9, 'Jean Bon<br/>0679313131<br/>78, rue de l\'afpa<br/>80000 Moncuq<br/>FR', '25022021-60380a586b35a', NULL, 0),
(10, 1, '2021-02-25 20:40:06', 'Chronopost', 14.9, 'Jean Bon<br/>0679313131<br/>78, rue de l\'afpa<br/>80000 Moncuq<br/>FR', '25022021-60380b2603e39', NULL, 0),
(11, 1, '2021-02-25 20:42:37', 'Chronopost', 14.9, 'Jean Bon<br/>0679313131<br/>78, rue de l\'afpa<br/>80000 Moncuq<br/>FR', '25022021-60380bbdc4d0c', NULL, 0),
(12, 1, '2021-02-25 20:42:46', 'Chronopost', 14.9, 'Jean Bon<br/>0679313131<br/>78, rue de l\'afpa<br/>80000 Moncuq<br/>FR', '25022021-60380bc632107', NULL, 0),
(13, 1, '2021-02-25 20:43:21', 'Colissimo', 9.9, 'Jean Castex<br/>0679313131<br/>51, rue Henri IV<br/>33000 Bordeaux<br/>FR', '25022021-60380be92ce1c', NULL, 0),
(14, 1, '2021-02-25 20:45:51', 'Colissimo', 9.9, 'Jean Castex<br/>0679313131<br/>51, rue Henri IV<br/>33000 Bordeaux<br/>FR', '25022021-60380c7f04a06', NULL, 0),
(15, 1, '2021-02-25 20:48:48', 'Colissimo', 9.9, 'Jean Castex<br/>0679313131<br/>51, rue Henri IV<br/>33000 Bordeaux<br/>FR', '25022021-60380d30ee72f', NULL, 0),
(16, 1, '2021-02-25 20:57:53', 'Colissimo', 9.9, 'Jean Castex<br/>0679313131<br/>51, rue Henri IV<br/>33000 Bordeaux<br/>FR', '25022021-60380f519e55b', NULL, 0),
(17, 1, '2021-02-25 21:03:11', 'Colissimo', 9.9, 'Jean Castex<br/>0679313131<br/>51, rue Henri IV<br/>33000 Bordeaux<br/>FR', '25022021-6038108f41c58', NULL, 0),
(18, 1, '2021-02-25 21:03:35', 'Colissimo', 9.9, 'Jean Castex<br/>0679313131<br/>51, rue Henri IV<br/>33000 Bordeaux<br/>FR', '25022021-603810a7e5061', NULL, 0),
(19, 1, '2021-02-25 21:03:49', 'Colissimo', 9.9, 'Jean Castex<br/>0679313131<br/>51, rue Henri IV<br/>33000 Bordeaux<br/>FR', '25022021-603810b512d67', NULL, 0),
(20, 1, '2021-02-25 21:03:49', 'Colissimo', 9.9, 'Jean Castex<br/>0679313131<br/>51, rue Henri IV<br/>33000 Bordeaux<br/>FR', '25022021-603810b5b8ac3', NULL, 0),
(21, 1, '2021-02-25 21:03:51', 'Colissimo', 9.9, 'Jean Castex<br/>0679313131<br/>51, rue Henri IV<br/>33000 Bordeaux<br/>FR', '25022021-603810b7584b8', NULL, 0),
(22, 1, '2021-02-25 21:03:51', 'Colissimo', 9.9, 'Jean Castex<br/>0679313131<br/>51, rue Henri IV<br/>33000 Bordeaux<br/>FR', '25022021-603810b7d889c', NULL, 0),
(23, 1, '2021-02-25 21:03:52', 'Colissimo', 9.9, 'Jean Castex<br/>0679313131<br/>51, rue Henri IV<br/>33000 Bordeaux<br/>FR', '25022021-603810b861e88', NULL, 0),
(24, 1, '2021-02-25 21:03:52', 'Colissimo', 9.9, 'Jean Castex<br/>0679313131<br/>51, rue Henri IV<br/>33000 Bordeaux<br/>FR', '25022021-603810b8d363f', NULL, 0),
(25, 1, '2021-02-25 21:03:53', 'Colissimo', 9.9, 'Jean Castex<br/>0679313131<br/>51, rue Henri IV<br/>33000 Bordeaux<br/>FR', '25022021-603810b971626', NULL, 0),
(26, 1, '2021-02-25 21:33:55', 'Colissimo', 9.9, 'Jean Castex<br/>0679313131<br/>51, rue Henri IV<br/>33000 Bordeaux<br/>FR', '25022021-603817c3181a5', NULL, 0),
(27, 1, '2021-02-25 21:38:14', 'Colissimo', 9.9, 'Jean Castex<br/>0679313131<br/>51, rue Henri IV<br/>33000 Bordeaux<br/>FR', '25022021-603818c6e8a88', NULL, 0),
(28, 1, '2021-02-25 21:41:47', 'Colissimo', 9.9, 'Jean Castex<br/>0679313131<br/>51, rue Henri IV<br/>33000 Bordeaux<br/>FR', '25022021-6038199b606ef', 'cs_test_b1HexCJjNjJR0z1fn5K9rmNmGxAQ25CU8JbxMZJVd2UdZ83rPCvzNzpdCD', 0),
(29, 1, '2021-02-25 22:17:59', 'Chronopost', 14.9, 'Jean Bon<br/>0679313131<br/>78, rue de l\'afpa<br/>80000 Moncuq<br/>FR', '25022021-60382217349a9', 'cs_test_b1c73fd9FX1Qj9JslecO8amX3wITjLLd7lR9ROQueY0fQjf10jOGSyde8k', 0),
(30, 1, '2021-02-25 22:37:48', 'Chronopost', 1490, 'Jean Bon<br/>0679313131<br/>78, rue de l\'afpa<br/>80000 Moncuq<br/>FR', '25022021-603826bc60155', NULL, 0),
(31, 1, '2021-02-25 22:38:24', 'Chronopost', 1490, 'Jean Bon<br/>0679313131<br/>78, rue de l\'afpa<br/>80000 Moncuq<br/>FR', '25022021-603826e0ba047', 'cs_test_b114KkvO58nxeuxz9n0Kt96poZ4BEfjON0TpJEfUqFKdDwNPtENERPfEcp', 0),
(32, 1, '2021-02-25 22:50:53', 'Chronopost', 1490, 'Jean Castex<br/>0679313131<br/>51, rue Henri IV<br/>33000 Bordeaux<br/>FR', '25022021-603829cd5a805', NULL, 0),
(33, 1, '2021-02-25 22:51:42', 'Chronopost', 1490, 'Jean Castex<br/>0679313131<br/>51, rue Henri IV<br/>33000 Bordeaux<br/>FR', '25022021-603829feeae77', NULL, 0),
(34, 1, '2021-02-25 22:52:10', 'Chronopost', 1490, 'Jean Castex<br/>0679313131<br/>51, rue Henri IV<br/>33000 Bordeaux<br/>FR', '25022021-60382a1a3a797', NULL, 0),
(35, 14, '2021-02-26 21:50:59', 'Colissimo', 590, 'Jérémy Kessous<br/>0685981013<br/>118 rue riolan<br/>80000 Amiens<br/>FR', '26022021-60396d43bc20c', 'cs_test_b1gQiGO5Ctzt4ozULFncK86b3EfjAliMYrmHMJJNNzMrgh6urD13ZOHL7r', 0),
(36, 14, '2021-02-26 22:00:18', 'Colissimo', 590, 'Jérémy Kessous<br/>0685981013<br/>118 rue riolan<br/>80000 Amiens<br/>FR', '26022021-60396f72539f7', 'cs_test_b1Dh3A30Pv49Rote0Srkt7fMYXQ7BxmspV4mnlnCxkK81SBQEpeJaiYZHb', 0),
(37, 14, '2021-02-26 22:02:19', 'Chronopost', 1490, 'Jérémy Kessous<br/>0685981013<br/>118 rue riolan<br/>80000 Amiens<br/>FR', '26022021-60396feb5c37c', 'cs_test_b1JuopK957G28icwfviAAWJhPU0TIQIkRW2MnyDXbihr2o9atxg573gfLy', 0),
(38, 14, '2021-02-26 22:03:45', 'Chronopost', 1490, 'Jérémy Kessous<br/>0685981013<br/>118 rue riolan<br/>80000 Amiens<br/>FR', '26022021-603970412c1d9', 'cs_test_b14EXWamb9xo3tp48jYKP2n9T3bOGraZvc3bWFFJ9O0hCJ7YaiC3it7zcc', 0),
(39, 14, '2021-02-26 22:05:33', 'Colissimo', 590, 'Jérémy Kessous<br/>0685981013<br/>118 rue riolan<br/>80000 Amiens<br/>FR', '26022021-603970ad2ff8e', 'cs_test_b1tNDD2avjf5RTIf7k3OSKEDe9rSS9b22sof7M1lAcwAsgS48stAvIDtfU', 0),
(40, 14, '2021-02-26 22:06:43', 'Chronopost', 1490, 'Jérémy Kessous<br/>0685981013<br/>118 rue riolan<br/>80000 Amiens<br/>FR', '26022021-603970f3733cc', 'cs_test_b1PEsh1MuSMwYyocv9wR0QT3zBbyg0rPD38wmiUbY9g854HdcXKXTCcjDk', 0),
(41, 14, '2021-02-26 22:07:48', 'Colissimo', 590, 'Jérémy Kessous<br/>0685981013<br/>118 rue riolan<br/>80000 Amiens<br/>FR', '26022021-603971347df4f', 'cs_test_b19Jy4mj1QYRbY6datTXttqavA6ViM8xt6rrTu5QeYVXtvEg2KmbDl3iJs', 0),
(42, 14, '2021-02-26 22:08:46', 'Chronopost', 1490, 'Jérémy Kessous<br/>0685981013<br/>118 rue riolan<br/>80000 Amiens<br/>FR', '26022021-6039716e2c087', 'cs_test_b1gChSxuqoSCsDVzXtTTEXsa8rTepFJrKzKpp9yfUSVHrp8KJCKbKWa6EG', 0),
(43, 14, '2021-02-26 22:14:19', 'Colissimo', 590, 'Jérémy Kessous<br/>0685981013<br/>118 rue riolan<br/>80000 Amiens<br/>FR', '26022021-603972bbcea80', 'cs_test_b1IcFo94C4Qh4e5YYPOx9Sxl8DZYKlVhYFSNEzATIqZG2BsvVvGnzLPn0a', 2),
(44, 14, '2021-02-26 22:16:42', 'Colissimo', 590, 'Jérémy Kessous<br/>0685981013<br/>118 rue riolan<br/>80000 Amiens<br/>FR', '26022021-6039734ad122b', 'cs_test_b13h1m58zZ4hJSzidvfXr1Me1dvDcJ02CuwFolc3Xe2xWcC0SReZFbyG6l', 2),
(45, 14, '2021-02-28 10:30:07', 'Chronopost', 1490, 'Jérémy Kessous<br/>0685981013<br/>118 rue riolan<br/>80000 Amiens<br/>FR', '28022021-603b70af9dc3d', 'cs_test_b16bTfq2R6KldU4BdY7ln8XmJcL6DpDReyAfFfzYPNpRPGeUBVF96d3Daq', 3),
(46, 14, '2021-02-28 11:27:43', 'Colissimo', 590, 'Jérémy Kessous<br/>0685981013<br/>118 rue riolan<br/>80000 Amiens<br/>FR', '28022021-603b7e2f3876c', 'cs_test_b1Ae7W5rx4ed95M0gnGouN5XWontrD7Yau5oDCmxS8Nr5mEQMgFcKT5ZoH', 2),
(47, 14, '2021-02-28 11:28:54', 'Colissimo', 590, 'Jérémy Kessous<br/>0685981013<br/>118 rue riolan<br/>80000 Amiens<br/>FR', '28022021-603b7e768e503', 'cs_test_b1QQINGRLiejwPpS561fnMDFvTVBLBd4fnRn4cEjjZ2o0vHxs3shHQWzaB', 2),
(48, 14, '2021-02-28 11:44:26', 'Colissimo', 590, 'Jérémy Kessous<br/>0685981013<br/>118 rue riolan<br/>80000 Amiens<br/>FR', '28022021-603b821a6904d', 'cs_test_b17g2BG0ZeScwORGivN3lAvncFtzCKG9U5pXoKepQkjUxegpsrTNI3mrAO', 3),
(49, 14, '2021-02-28 16:12:11', 'Colissimo', 590, 'Jérémy Kessous<br/>0685981013<br/>118 rue riolan<br/>80000 Amiens<br/>FR', '28022021-603bc0dbb92e6', 'cs_test_b1z1h4LenlfDJD8lWfSqQEPSPeFyTYgC0WmKT1ZjYcarMwhG258pELtzqM', 0),
(50, 14, '2021-02-28 16:12:41', 'Colissimo', 590, 'Jérémy Kessous<br/>0685981013<br/>118 rue riolan<br/>80000 Amiens<br/>FR', '28022021-603bc0f9c94c3', 'cs_test_b1SmK7uhXwGZFJffrOdrGPhpFqNAvsGRFXYQWdJ8KRSpJltLyLWqE6RTeH', 3);

-- --------------------------------------------------------

--
-- Structure de la table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `my_order_id` int(11) NOT NULL,
  `product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `total` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_845CA2C1BFCDF877` (`my_order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `order_details`
--

INSERT INTO `order_details` (`id`, `my_order_id`, `product`, `quantity`, `price`, `total`) VALUES
(1, 1, 'Ibanez Signature Joe Satriani', 1, 100000, 100000),
(2, 1, 'E-II Horizon-III - reindeer blue', 1, 222200, 222200),
(3, 1, 'Player Stratocaster Gaucher (MEX, PF) - black', 1, 63900, 63900),
(4, 2, 'Ibanez Signature Joe Satriani', 1, 100000, 100000),
(5, 2, 'E-II Horizon-III - reindeer blue', 1, 222200, 222200),
(6, 2, 'Player Stratocaster Gaucher (MEX, PF) - black', 1, 63900, 63900),
(7, 3, 'Ibanez Signature Joe Satriani', 1, 100000, 100000),
(8, 3, 'E-II Horizon-III - reindeer blue', 1, 222200, 222200),
(9, 3, 'Player Stratocaster Gaucher (MEX, PF) - black', 1, 63900, 63900),
(10, 4, 'Player Stratocaster Gaucher (MEX, PF) - black', 1, 63900, 63900),
(11, 4, 'Kelly KEX - black', 1, 77900, 77900),
(12, 5, 'Player Stratocaster Gaucher (MEX, PF) - black', 1, 63900, 63900),
(13, 5, 'Kelly KEX - black', 1, 77900, 77900),
(14, 6, 'Player Stratocaster Gaucher (MEX, PF) - black', 1, 63900, 63900),
(15, 6, 'Kelly KEX - black', 1, 77900, 77900),
(16, 7, 'Player Stratocaster Gaucher (MEX, PF) - black', 1, 63900, 63900),
(17, 7, 'Kelly KEX - black', 1, 77900, 77900),
(18, 8, 'Player Stratocaster Gaucher (MEX, PF) - black', 1, 63900, 63900),
(19, 8, 'Kelly KEX - black', 1, 77900, 77900),
(20, 9, 'Player Stratocaster Gaucher (MEX, PF) - black', 1, 63900, 63900),
(21, 9, 'Kelly KEX - black', 1, 77900, 77900),
(22, 10, 'Player Stratocaster Gaucher (MEX, PF) - black', 1, 63900, 63900),
(23, 10, 'Kelly KEX - black', 1, 77900, 77900),
(24, 11, 'Player Stratocaster Gaucher (MEX, PF) - black', 1, 63900, 63900),
(25, 11, 'Kelly KEX - black', 1, 77900, 77900),
(26, 12, 'Player Stratocaster Gaucher (MEX, PF) - black', 1, 63900, 63900),
(27, 12, 'Kelly KEX - black', 1, 77900, 77900),
(28, 13, 'Player Stratocaster Gaucher (MEX, PF) - black', 1, 63900, 63900),
(29, 13, 'Kelly KEX - black', 1, 77900, 77900),
(30, 13, 'DV Little Guitar G1 - cherry red sunburst', 1, 59900, 59900),
(31, 14, 'DV Little Guitar G1 - cherry red sunburst', 1, 59900, 59900),
(32, 14, 'Violon Gliga Genial 1 gaucher', 1, 46500, 46500),
(33, 15, 'DV Little Guitar G1 - cherry red sunburst', 1, 59900, 59900),
(34, 15, 'Violon Gliga Genial 1 gaucher', 1, 46500, 46500),
(35, 16, 'DV Little Guitar G1 - cherry red sunburst', 1, 59900, 59900),
(36, 16, 'Violon Gliga Genial 1 gaucher', 1, 46500, 46500),
(37, 17, 'DV Little Guitar G1 - cherry red sunburst', 1, 59900, 59900),
(38, 17, 'Violon Gliga Genial 1 gaucher', 1, 46500, 46500),
(39, 18, 'DV Little Guitar G1 - cherry red sunburst', 1, 59900, 59900),
(40, 18, 'Violon Gliga Genial 1 gaucher', 1, 46500, 46500),
(41, 19, 'DV Little Guitar G1 - cherry red sunburst', 1, 59900, 59900),
(42, 19, 'Violon Gliga Genial 1 gaucher', 1, 46500, 46500),
(43, 20, 'DV Little Guitar G1 - cherry red sunburst', 1, 59900, 59900),
(44, 20, 'Violon Gliga Genial 1 gaucher', 1, 46500, 46500),
(45, 21, 'DV Little Guitar G1 - cherry red sunburst', 1, 59900, 59900),
(46, 21, 'Violon Gliga Genial 1 gaucher', 1, 46500, 46500),
(47, 22, 'DV Little Guitar G1 - cherry red sunburst', 1, 59900, 59900),
(48, 22, 'Violon Gliga Genial 1 gaucher', 1, 46500, 46500),
(49, 23, 'DV Little Guitar G1 - cherry red sunburst', 1, 59900, 59900),
(50, 23, 'Violon Gliga Genial 1 gaucher', 1, 46500, 46500),
(51, 24, 'DV Little Guitar G1 - cherry red sunburst', 1, 59900, 59900),
(52, 24, 'Violon Gliga Genial 1 gaucher', 1, 46500, 46500),
(53, 25, 'DV Little Guitar G1 - cherry red sunburst', 1, 59900, 59900),
(54, 25, 'Violon Gliga Genial 1 gaucher', 1, 46500, 46500),
(55, 26, 'DV Little Guitar G1 - cherry red sunburst', 1, 59900, 59900),
(56, 26, 'Violon Gliga Genial 1 gaucher', 1, 46500, 46500),
(57, 27, 'DV Little Guitar G1 - cherry red sunburst', 1, 59900, 59900),
(58, 27, 'Violon Gliga Genial 1 gaucher', 1, 46500, 46500),
(59, 28, 'DV Little Guitar G1 - cherry red sunburst', 1, 59900, 59900),
(60, 28, 'Violon Gliga Genial 1 gaucher', 1, 46500, 46500),
(61, 29, 'DV Little Guitar G1 - cherry red sunburst', 1, 59900, 59900),
(62, 29, 'Violon Gliga Genial 1 gaucher', 1, 46500, 46500),
(63, 30, 'DV Little Guitar G1 - cherry red sunburst', 1, 59900, 59900),
(64, 30, 'Violon Gliga Genial 1 gaucher', 1, 46500, 46500),
(65, 31, 'DV Little Guitar G1 - cherry red sunburst', 1, 59900, 59900),
(66, 31, 'Violon Gliga Genial 1 gaucher', 1, 46500, 46500),
(67, 32, 'Ibanez Signature Joe Satriani', 1, 100000, 100000),
(68, 33, 'Ibanez Signature Joe Satriani', 1, 100000, 100000),
(69, 34, 'Ibanez Signature Joe Satriani', 1, 100000, 100000),
(70, 35, 'DV Little Guitar G1 - cherry red sunburst', 1, 59900, 59900),
(71, 35, 'E-II Horizon-III - reindeer blue', 1, 222200, 222200),
(72, 36, 'DV Little Guitar G1 - cherry red sunburst', 1, 59900, 59900),
(73, 37, 'Player Stratocaster Gaucher (MEX, PF) - black', 1, 63900, 63900),
(74, 38, 'Ibanez Signature Joe Satriani', 1, 100000, 100000),
(75, 39, 'DV Little Guitar G1 - cherry red sunburst', 1, 59900, 59900),
(76, 40, 'E-II Horizon-III - reindeer blue', 1, 222200, 222200),
(77, 41, 'DV Little Guitar G1 - cherry red sunburst', 1, 59900, 59900),
(78, 41, 'Violon Gliga Genial 1 gaucher', 1, 46500, 46500),
(79, 42, 'Ibanez Signature Joe Satriani', 1, 100000, 100000),
(80, 43, 'Ibanez Signature Joe Satriani', 2, 100000, 200000),
(81, 44, 'DV Little Guitar G1 - cherry red sunburst', 1, 59900, 59900),
(82, 45, 'Player Stratocaster Gaucher (MEX, PF) - black', 1, 63900, 63900),
(83, 46, 'TW28 CSN Evolution - natural', 1, 26900, 26900),
(84, 47, 'DV Little Guitar G1 - cherry red sunburst', 1, 59900, 59900),
(85, 48, 'Player Stratocaster Gaucher (MEX, PF) - black', 1, 63900, 63900),
(86, 49, 'Ibanez Signature Joe Satriani', 1, 100000, 100000),
(87, 50, 'Ibanez Signature Joe Satriani', 1, 100000, 100000);

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `illustration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_best` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D34A04AD12469DE2` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `category_id`, `name`, `slug`, `illustration`, `description`, `price`, `subtitle`, `is_best`) VALUES
(1, 1, 'Ibanez Signature Joe Satriani', 'ibanez-signature-joe-satriani', '15ef910458a83d24bc2d4f65250c720c51e7df39.jpg', 'Lorem ipsum dolor', 100000, 'Lorem ipsum dolor', 0),
(2, 1, 'Player Stratocaster Gaucher (MEX, PF) - black', 'player-stratocaster-gaucher-mex-pf-black', 'fa598afae7c6f383acaf0b19b83b1c5f2e0cf364.jpg', 'La guitare électrique solidbody pour gaucher FENDER Player Stratocaster LH (0144513506) fait partie de l\'exhaustive gamme Player produite au Mexique et introduite en 2018, qui remplace la très populaire collection Standard mexicaine. De plus en plus performantes, les Player profitent de diverses améliorations telles que de nouveaux micros, des touches 22 frettes en Erable ou Pau Ferro, ou d\'un vibrato haute précision 2-Point Synchronized Tremolo.\r\nProposées à des tarifs attractifs et concurrentiels, les Player sont incontournables pour les musiciens qui cherchent un instrument fidèle à l\'esprit Fender original, avec un confort de jeu et un qualité de production modernes.', 63900, 'Lorem ipsum dolor', 1),
(3, 1, 'DV Little Guitar G1 - cherry red sunburst', 'dv-little-guitar-g1-cherry-red-sunburst', '0de556cdd30e008ce7dea1143a4dcdc0b397d6de.jpg', 'La guitare électrique solidbody de voyage DV MARK DV Little Guitar G1 (longueur totale 766 mm), dotée d’un manche en Acajou de longueur normale (24,75\"), d\'un corps en Acajou, d\'une configuration de micros HH, d\'un chevalet fixe et de mécaniques à blocage, a été conçue par le spécialiste de l’amplification compacte.\r\nHousse optionnelle DV Mark DV Litte Guitar Bag.', 59900, 'Lorem ipsum dolor', 0),
(4, 1, 'Kelly KEX - black', 'kelly-kex-black', '2b10ce170baba12a7ec4f09cef78e7d494f7fa23.jpg', 'La guitare électrique solidbody JACKSON X Series Kelly KEX (2916131503) possède toutes les caractéristiques indispensables pour le guitariste Heavy-Metal, qu\'il soit rythmique ou soliste : c\'est un modèle performant proposé à un prix très attractif, doté d\'une lutherie traditionnelle/moderne et agrémentée d\'un manche de style traversant, d\'une touche 24 frettes et de micros puissants et agressifs distillant de généreuses saturations.', 77900, 'Lorem ipsum dolor', 0),
(5, 1, 'AG85 BKF Artcore Expressionist - black flat', 'ag85-bkf-artcore-expressionist-black-flat', '571dfa75e15cceb6ede0341507c66ddda5bda720.jpg', 'Variante abordable de la célèbre George Benson, la guitare électrique hollow body IBANEZ Artcore Expressionist AG85 BKF, est dotée d\'une construction traditionnelle (caisse en Tilleul laminé, sans bloc central, manche collé en Nyatoh, touche Ebène 22 frettes), agrémentée de micros min-double bobinage aux sonorités à la fois dynamiques et expressives, extrêmement bien positionnée sur le segment Jazz fusion et les sons clairs feutrés en général.', 59900, 'Lorem ipsum dolor', 0),
(6, 1, 'E-II Horizon-III - reindeer blue', 'e-ii-horizon-iii-reindeer-blue', 'bd424c389dab50edb66637f35423191de4890d98.png', 'En 2013, ESP a réorganisé ses familles de produits sous 4 divisions distinctes : ESP Custom Shop Japon, E-II Japon (anciennement ESP), LTD Elite Japon (même usine de production qu\'ESP) et LTD.\r\n\r\nLa guitare électrique E-II Horizon-III, usinée au Japon, est une évolution de l\'Horizon originale avec une découpe retravaillée, qui facilite l\'accès aux notes aigües grâce à sa large échancrure.\r\nSes caractéristiques principales : corps Aulne avec table Erable, manche conducteur en Erable avec touche Ebène (24 frettes, diapason 25.5\" type Fender Stratocaster), micros Seymour Duncan SH-2 + SH-14, chevalet fixe cordes traversantes Gotoh, livrée en étui ESP.\r\nLe Seymour Duncan SH-14 AlNiCo 5 est un modèle parfaitement intermédiaire entre le SH-1 et le SH-11. moins vintage que le premier (basses plus consistantes), plus vintage que le second (moins de distorsion).', 222200, 'Lorem ipsum dolor', 0),
(7, 2, 'SJ-200 - antique natural', 'sj-200-antique-natural', '99d9f150313b96c1fcc1a6d23552794a15d9a2c1.jpg', 'Avec sa lutherie massive (table Epicéa Sitka, caisse Erable flammé), sa touche Palissandre et son pré-ampli LR Baggs VTC, la GIBSON SJ-200 Original (OCJB20AN) est une guitare folk électro-acoustique de style Super Jumbo aussi séduisante que fonctionnelle, combinant à la perfection caractéristiques traditionnelles et techniques de production modernes.\r\nProduite aux USA et livrée en étui luxe.\r\n\r\nDepuis le changement de direction en 2018, les bonne nouvelles s\'enchaînent chez Gibson : importants investissements pour réhabiliter l\'outil de production et offrir une qualité de production en hausse, homogène et constante, tarification revue à la baisse, gammes remaniées pour plus de lisibilité, et cerise sur le gâteau pas mal de nouveautés.\r\n\r\nEntretien\r\nLe verni nitrocellulose, comme sur les Gibson d\'époque, joue un rôle majeur dans la \'respiration\' de l\'instrument grâce à sa nature poreuse (les vibrations ne sont pas étouffées par la laque). Ce verni est par contre relativement sensible au contact des plastiques et mousses de certains stands, ainsi qu\'à certains produits d\'entretien trop détergents.\r\nPour éviter d\'endommager votre guitare, nous vous recommandons les stands Hercules dont les mousses ont une formule non-abrasive spécialement étudiée; pour l\'entretien, le Vintage Restoration Kit Gibson vous assure un nettoyage-lustrage efficace sans aucuns risques.', 422200, 'Lorem ipsum dolor', 1),
(8, 2, 'GS Mini-e Rosewood - natural satin', 'gs-mini-e-rosewood-natural-satin', '53ebdeb3507a8e58dc03c028a65d90b60e8bac4b.jpg', 'La guitare folk électro de voyage TAYLOR GS Mini-e Rosewood, avec un gabarit intermédiaire entre les Taylor GS Grand Symphony et les Baby Taylor, une table en Epicéa massif, un dos/éclisses en Palissandre laminé et une touche Ebène est surprenante de puissance et d\'amplitude.\r\n\r\nLe pré-ampli Taylor ES-B incorpore des éléments du Taylor Expression System 2 dans une version simplifiée, avec contrôles de volume et tonalité, accordeur chromatique, écran LED pour l\'accordeur et témoin d\'usure des piles.', 77700, 'Lorem ipsum dolor', 0),
(9, 2, 'TW28 CSN Evolution - natural', 'tw28-csn-evolution-natural', '8cbc41c48072b3032f400a381045ffbdfe948f3f.jpg', 'Tanglewood TW28 CSN\r\n\r\nGuitare folk de type Dreadnought issue de la série Evolution, avec table en Cèdre massif, dos et éclisses en Acajou laminé.\r\nLa Tanglewood TW28CSN est sans conteste une des guitares plus attractive dans sa gamme de prix, grâce à un excellent niveau de fabrication et des sonorités de belle qualité.\r\nL\'association du Cèdre et de l\'Acajou pourvoie un mariage de chaleur et de clarté fort agréable à l\'oreille.', 26900, 'Lorem ipsum dolor', 0),
(10, 2, 'VC203 3/4 - natura', 'vc203-34-natura', '9a63145461ecb2781c5078e74b6a8979b7d7c3c6.jpg', 'La guitare classique 3/4 pour débutant VALENCIA VC203 avec table Epicéa sitka et dos/éclisses Nato, vous surprendra par l\'équilibre et la dynamique de ses sonorités, remarquables pour un instrument aussi abordable.\r\nSa finition transparente satinée laisse paraître la beauté des essences employées.', 7500, 'Lorem ipsum dolor', 1),
(11, 2, 'CG192C - natural', 'cg192c-natural', '3bc6748fa808a69fe8334967fb2609d60b763035.jpg', 'La guitare classique 4/4 YAMAHA CG192C (table Cèdre massif, dos/éclisses Palissandre laminé, touche Ebène) appartient à la gamme CG, développée afin d\'offrir une excellente qualité sonore et une aisance de jeu des plus agréables. Nos maîtres luthiers ont spécialement dessiné les guitares CG avec des eclisses et un fond plus minces ainsi qu\'un vernis moins épais afin d\'obtenir une meilleure réponse acoustique de l\'instrument. Le galbe du manche de ces guitares est également plus plat pour une meilleure facilité de jeu. Grâce à leur poids plus léger, ces instruments ont une puissance importante tout en conservant un équilibre sonore. Dotées d\'un rapport qualité/prix imbattable, elles s\'avèrent être le choix idéal pour tous ceux qui veulent aborder la guitare avec sérieux.', 66500, 'Lorem ipsum dolor', 0),
(12, 4, 'Violon Prima P200 1/16', 'violon-prima-p200-116', '2c1f16f6a70209500999d2913ba0bb55a958fd72.jpg', 'Avec le Primavera P200, vous trouverez les cordes montées par nos soins, une colophane, un archet et un étui. Tout cet ensemble est compris dans le prix affiché. Vous pouvez en outre améliorer la qualité sonore du Primavera P200 en choisissant des options spécialement créées et testées dans notre atelier (\"Améliorer votre violon\", juste au-dessus du bouton \"Ajouter au panier\".)\r\n\r\nLes violons Prima conviennent aux débutants en écoles de musique.\r\n\r\nCaractéristiques :\r\n\r\nTaille 1/16 ( de 3 à 4 ans )\r\nTable en épicéa massif\r\nDos et éclisses en érable massif\r\nTouche en ébène, mentonnière TEKA et cordier en bois dur\r\nAccessoires livrés avec l\'instrument, avec l\'option \"améliorer votre violon\" :\r\n\r\nÉtui avec sangles pour transport sur le dos\r\nArchet Composite : Carbone et fibre de verre\r\nColophane de qualité Bernardel (avec option)\r\nCordes Thomastik Vision montées (avec option)', 21700, 'Lorem ipsum dolor', 1),
(13, 4, 'Violon Gliga Genial 1 gaucher', 'violon-gliga-genial-1-gaucher', '5b00184ce1ce9074ff2e27313a08720be75bc72e.jpg', 'Ce violon d’étude pour gaucher a été fabriqué sur les mêmes bases que le modèle pour droitier, c’est à dire une table en épicéa massif des Carpates, un dos et des éclisses en érable massif légèrement ondé des Carpates, une touche, une mentonnière, des chevilles et un cordier en ébène. Ce violon de forme classique Stradivari a été vernis à l’huile à la main. Il est accompagné de ses accessoires : un étui à sangles pour le transport, un bloc de colophane Bernardel, un archet en bois sélectionné du Brésil et un jeu de cordes Corelli Crystal déjà montées.\r\nFabriqué en Roumanie, ce violon n’est pas une adaptation mais bien un modèle spécialement conçu pour les gauchers, avec les inversions et modifications nécessaires. En outre, comme les modèles pour droitiers, il a reçu dans nos ateliers les réglages professionnels adéquats pour le rendre prêt à jouer dès réception : conicité et ajustement des chevilles, taille et ajustement du chevalet pour votre violon, redressage de la touche, changement d’âme et ajustement, réglage des sillets. Ce bel instrument est garanti 2 ans.\r\n\r\nUne option d\'amélioration de votre violon vous est proposée : il s\'agit du remplacement des chevilles d\'origine par des chevilles de précision Wittner. Grâce à leur cône immobile, l\'accordage est facilité et très rapide. Vous apprécierez leur simplicité d\'utilisation, la précision de l\'accordage ainsi que la rapidité avec laquelle vous parviendrez à accorder votre instrument. Plus besoin de quatre tendeurs, un seul suffit. Essayez-les, vous les adopterez à coup sûr !', 46500, 'Lorem ipsum dolor', 0),
(14, 4, 'Violon Gliga Gama Antique 4/4 gaucher', 'violon-gliga-gama-antique-44-gaucher', '80356e639dabffbbb5be0301fdc386025bca6ce1.jpg', 'Ce violon Professionnel Antique à dos 2 pièces a été fait à la main par les meilleurs artisans de la Lutherie Vasile Gliga. Professionnellement ajusté et adapté, ce violon est composé d’une table en épicéa massif et d’un corps en érable ondé. Sa touche, sa mentonnière, ses chevilles et son cordier sont en ébène.\r\n\r\nEt comme toujours les instruments Gliga sont garantis 2 ans. Ce violon est livré dans un étui muni de bretelles très pratiques pour le transport, accompagné d’un archet en pernambouc, d’un bloc de colophane Bernardel et il est déjà équipé d’un jeu de cordes Thomastik Dominant et d\'un chevalet spécialement taillé et ajusté pour votre violon par un luthier. Et pour en faire un instrument parfait, nous avons procédé à des réglages professionnels : ajustement et conicité des chevilles, redressage de la touche, changement et ajustement d’âme et enfin réglage des sillets afin de vous fournir un instrument prêt à jouer.', 169500, 'Lorem ipsum dolor', 0);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `first_name`, `last_name`, `phone`) VALUES
(1, 'camilledupont@mail.net', '[]', '$argon2id$v=19$m=65536,t=4,p=1$QjdjRUFnZzdtQnhtSGg3cw$zkpEeIVnw+BTe1sXQzi9O9RgPSsg8V+iL8YhCU6UnvQ', 'Camille', 'Dupont', NULL),
(14, 'jeremykessous@yahoo.fr', '[]', '$argon2id$v=19$m=65536,t=4,p=1$RGRpWkZKd1hEL2RWeUtrdw$v0V84SFIPOGmjaTG15BiNGvYmoVuN6DD/QKjWVJIfY0', 'jeremy', 'kessous', NULL),
(15, 'camilleclaudel@gmail.com', '[]', '$argon2id$v=19$m=65536,t=4,p=1$TnF3cC5tc1pVUGxWRDdxcA$StnI8vGX83GVLmJtDMSkkX0uKZNKu61s+Mnz1T1rhrM', 'Camille', 'Claudel', NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `FK_D4E6F81A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `FK_F5299398A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `FK_845CA2C1BFCDF877` FOREIGN KEY (`my_order_id`) REFERENCES `order` (`id`);

--
-- Contraintes pour la table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_D34A04AD12469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
