-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 11 juil. 2022 à 22:08
-- Version du serveur : 5.7.36
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `loca`
--

-- --------------------------------------------------------

--
-- Structure de la table `circuit`
--

DROP TABLE IF EXISTS `circuit`;
CREATE TABLE IF NOT EXISTS `circuit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locality` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `relationship` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullcontent` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `modified_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `stage` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destination` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `circuit`
--

INSERT INTO `circuit` (`id`, `image`, `title`, `locality`, `content`, `relationship`, `duration`, `price`, `fullcontent`, `created_at`, `modified_at`, `stage`, `destination`) VALUES
(43, 'circuit1-62cc6e40ef689209229536.png', 'test', 'test', 'test', 'test', 'test', 'ets', 'test', NULL, NULL, 'test', 'test'),
(44, 'circuit1-62cc9af8d0032480574335.png', 'test', 'test', 'test', 'test', 'test', 'test', 'test', NULL, NULL, 'test', 'test');

-- --------------------------------------------------------

--
-- Structure de la table `circuit_filter`
--

DROP TABLE IF EXISTS `circuit_filter`;
CREATE TABLE IF NOT EXISTS `circuit_filter` (
  `circuit_id` int(11) NOT NULL,
  `filter_id` int(11) NOT NULL,
  PRIMARY KEY (`circuit_id`,`filter_id`),
  KEY `IDX_7A076D78CF2182C8` (`circuit_id`),
  KEY `IDX_7A076D78D395B25E` (`filter_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `circuit_filter`
--

INSERT INTO `circuit_filter` (`circuit_id`, `filter_id`) VALUES
(43, 4),
(44, 3);

-- --------------------------------------------------------

--
-- Structure de la table `discover`
--

DROP TABLE IF EXISTS `discover`;
CREATE TABLE IF NOT EXISTS `discover` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `modified_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `discover`
--

INSERT INTO `discover` (`id`, `image`, `content`, `created_at`, `modified_at`) VALUES
(6, 'circuit-3-62cc9b2741c03755683163.png', 'test', '2017-01-01 00:00:00', '2017-01-01 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `discover_circuit`
--

DROP TABLE IF EXISTS `discover_circuit`;
CREATE TABLE IF NOT EXISTS `discover_circuit` (
  `discover_id` int(11) NOT NULL,
  `circuit_id` int(11) NOT NULL,
  PRIMARY KEY (`discover_id`,`circuit_id`),
  KEY `IDX_B7357ACB98537D7C` (`discover_id`),
  KEY `IDX_B7357ACBCF2182C8` (`circuit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `discover_circuit`
--

INSERT INTO `discover_circuit` (`discover_id`, `circuit_id`) VALUES
(6, 44);

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
('DoctrineMigrations\\Version20220706085742', '2022-07-06 08:58:49', 397),
('DoctrineMigrations\\Version20220706095150', '2022-07-06 09:52:11', 197),
('DoctrineMigrations\\Version20220706133117', '2022-07-06 13:32:55', 112),
('DoctrineMigrations\\Version20220707090236', '2022-07-07 09:03:35', 99),
('DoctrineMigrations\\Version20220707103042', '2022-07-07 10:31:07', 194),
('DoctrineMigrations\\Version20220707121510', '2022-07-07 12:15:25', 209),
('DoctrineMigrations\\Version20220707122659', '2022-07-07 12:27:10', 151),
('DoctrineMigrations\\Version20220707122846', '2022-07-07 12:28:59', 123),
('DoctrineMigrations\\Version20220707123059', '2022-07-07 12:31:07', 170),
('DoctrineMigrations\\Version20220707123932', '2022-07-07 12:39:43', 227),
('DoctrineMigrations\\Version20220707124513', '2022-07-07 12:45:22', 223),
('DoctrineMigrations\\Version20220707124931', '2022-07-07 12:49:38', 134),
('DoctrineMigrations\\Version20220707130059', '2022-07-07 13:01:08', 150),
('DoctrineMigrations\\Version20220708121208', '2022-07-08 12:12:28', 252),
('DoctrineMigrations\\Version20220708124102', '2022-07-08 12:41:16', 466),
('DoctrineMigrations\\Version20220708195019', '2022-07-08 19:52:06', 88),
('DoctrineMigrations\\Version20220708212232', '2022-07-08 21:24:02', 87),
('DoctrineMigrations\\Version20220710150832', '2022-07-10 15:09:18', 140),
('DoctrineMigrations\\Version20220710154943', '2022-07-10 16:33:53', 139),
('DoctrineMigrations\\Version20220710155133', '2022-07-10 16:33:53', 9),
('DoctrineMigrations\\Version20220710155519', '2022-07-10 16:33:53', 10),
('DoctrineMigrations\\Version20220710155616', '2022-07-10 16:33:53', 10),
('DoctrineMigrations\\Version20220710164008', '2022-07-10 16:42:04', 103),
('DoctrineMigrations\\Version20220711171511', '2022-07-11 17:15:57', 111),
('DoctrineMigrations\\Version20220711181532', '2022-07-11 18:16:09', 191),
('DoctrineMigrations\\Version20220711181914', '2022-07-11 18:20:05', 137);

-- --------------------------------------------------------

--
-- Structure de la table `editor`
--

DROP TABLE IF EXISTS `editor`;
CREATE TABLE IF NOT EXISTS `editor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_CCF1F1BAE7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `editor`
--

INSERT INTO `editor` (`id`, `email`, `roles`, `password`) VALUES
(1, 'admin@gmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$OcJ3jwqHIBczIZONQl85w.9laSPl3kYg00sfri5JOjQbjLba2BZNa');

-- --------------------------------------------------------

--
-- Structure de la table `filter`
--

DROP TABLE IF EXISTS `filter`;
CREATE TABLE IF NOT EXISTS `filter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `modified_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `filter`
--

INSERT INTO `filter` (`id`, `name`, `created_at`, `modified_at`) VALUES
(1, 'Gastronomie', NULL, NULL),
(2, 'Oenologie', NULL, NULL),
(3, 'Diner', NULL, NULL),
(4, 'Maison d’hôte', NULL, NULL),
(5, 'En amoureux', NULL, NULL),
(6, 'Solo', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
CREATE TABLE IF NOT EXISTS `messenger_messages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `producer`
--

DROP TABLE IF EXISTS `producer`;
CREATE TABLE IF NOT EXISTS `producer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `circuit_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `modified_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_976449DCCF2182C8` (`circuit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `producer`
--

INSERT INTO `producer` (`id`, `circuit_id`, `image`, `name`, `product`, `content`, `created_at`, `modified_at`) VALUES
(2, 44, 'circuit-3-62cc9b1723df4137610497.png', 'test', 'test', 'test', '2017-01-01 00:00:00', '2017-01-01 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `program`
--

DROP TABLE IF EXISTS `program`;
CREATE TABLE IF NOT EXISTS `program` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `circuit_id` int(11) NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `modified_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_92ED7784CF2182C8` (`circuit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `program`
--

INSERT INTO `program` (`id`, `circuit_id`, `content`, `created_at`, `modified_at`) VALUES
(1, 44, '<p>lziufhzosegfpeifgz</p>', '2017-01-01 00:00:00', '2017-01-01 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gender` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `modified_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `modified_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `circuit_filter`
--
ALTER TABLE `circuit_filter`
  ADD CONSTRAINT `FK_7A076D78CF2182C8` FOREIGN KEY (`circuit_id`) REFERENCES `circuit` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_7A076D78D395B25E` FOREIGN KEY (`filter_id`) REFERENCES `filter` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `discover_circuit`
--
ALTER TABLE `discover_circuit`
  ADD CONSTRAINT `FK_B7357ACB98537D7C` FOREIGN KEY (`discover_id`) REFERENCES `discover` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_B7357ACBCF2182C8` FOREIGN KEY (`circuit_id`) REFERENCES `circuit` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `producer`
--
ALTER TABLE `producer`
  ADD CONSTRAINT `FK_976449DCCF2182C8` FOREIGN KEY (`circuit_id`) REFERENCES `circuit` (`id`);

--
-- Contraintes pour la table `program`
--
ALTER TABLE `program`
  ADD CONSTRAINT `FK_92ED7784CF2182C8` FOREIGN KEY (`circuit_id`) REFERENCES `circuit` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
