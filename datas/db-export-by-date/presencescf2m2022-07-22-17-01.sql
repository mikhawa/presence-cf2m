-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le : ven. 22 juil. 2022 à 15:00
-- Version du serveur : 10.3.35-MariaDB
-- Version de PHP : 8.1.8

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `presencescf2m`
--
CREATE DATABASE IF NOT EXISTS `presencescf2m` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `presencescf2m`;

-- --------------------------------------------------------

--
-- Structure de la table `attendancesheets`
--

DROP TABLE IF EXISTS `attendancesheets`;
CREATE TABLE IF NOT EXISTS `attendancesheets` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `promotions_id` int(10) UNSIGNED NOT NULL,
  `file` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `startingweekdate` date NOT NULL,
  `endingweekdate` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_FFE2C73C10007789` (`promotions_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
('DoctrineMigrations\\Version20220624094333', '2022-06-28 10:43:17', 167),
('DoctrineMigrations\\Version20220624114100', '2022-06-28 10:48:10', 131),
('DoctrineMigrations\\Version20220701093701', '2022-07-01 09:39:04', 874),
('DoctrineMigrations\\Version20220701100648', '2022-07-01 10:07:19', 565),
('DoctrineMigrations\\Version20220706083802', '2022-07-06 08:38:43', 467),
('DoctrineMigrations\\Version20220706085333', '2022-07-06 08:54:31', 674),
('DoctrineMigrations\\Version20220706090527', '2022-07-06 09:07:04', 62),
('DoctrineMigrations\\Version20220706103515', '2022-07-06 10:37:00', 1252),
('DoctrineMigrations\\Version20220706135525', '2022-07-06 13:56:39', 763),
('DoctrineMigrations\\Version20220714130652', '2022-07-14 13:08:28', 1396),
('DoctrineMigrations\\Version20220715093208', '2022-07-15 09:32:23', 2131),
('DoctrineMigrations\\Version20220715114423', '2022-07-15 11:44:31', 110),
('DoctrineMigrations\\Version20220715123020', '2022-07-15 12:30:35', 1655),
('DoctrineMigrations\\Version20220718072702', '2022-07-18 07:28:03', 3822),
('DoctrineMigrations\\Version20220718090903', '2022-07-18 09:09:25', 993),
('DoctrineMigrations\\Version20220722143508', '2022-07-22 14:37:22', 1624);

-- --------------------------------------------------------

--
-- Structure de la table `followups`
--

DROP TABLE IF EXISTS `followups`;
CREATE TABLE IF NOT EXISTS `followups` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `meetingdate` datetime NOT NULL,
  `punctuality` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `evolution` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tests` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `behaviour` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `followups`
--

INSERT INTO `followups` (`id`, `meetingdate`, `punctuality`, `evolution`, `tests`, `behaviour`) VALUES
(1, '2022-07-19 09:38:39', '', '', '', ''),
(2, '2022-07-19 09:57:17', '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `holidays`
--

DROP TABLE IF EXISTS `holidays`;
CREATE TABLE IF NOT EXISTS `holidays` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `day` date NOT NULL,
  `holidayperiod` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `holidays_promotions`
--

DROP TABLE IF EXISTS `holidays_promotions`;
CREATE TABLE IF NOT EXISTS `holidays_promotions` (
  `holidays_id` int(10) UNSIGNED NOT NULL,
  `promotions_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`holidays_id`,`promotions_id`),
  KEY `IDX_FEA484FF7C9675AB` (`holidays_id`),
  KEY `IDX_FEA484FF10007789` (`promotions_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Structure de la table `options`
--

DROP TABLE IF EXISTS `options`;
CREATE TABLE IF NOT EXISTS `options` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `optionname` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acronym` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picto` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` smallint(5) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `options`
--

INSERT INTO `options` (`id`, `optionname`, `acronym`, `color`, `picto`, `active`) VALUES
(1, 'Développeur Web', 'webdev', '', '', 1),
(2, 'Digital Designer', 'DD', '', '', 1);

-- --------------------------------------------------------

--
-- Structure de la table `promotions`
--

DROP TABLE IF EXISTS `promotions`;
CREATE TABLE IF NOT EXISTS `promotions` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `promoname` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acronym` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `startingdate` date DEFAULT NULL,
  `endingdate` date DEFAULT NULL,
  `nbdays` smallint(5) UNSIGNED DEFAULT NULL,
  `active` smallint(5) UNSIGNED NOT NULL,
  `options_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_EA1B30343ADB05F1` (`options_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `promotions`
--

INSERT INTO `promotions` (`id`, `promoname`, `acronym`, `startingdate`, `endingdate`, `nbdays`, `active`, `options_id`) VALUES
(1, 'Webdev 2021-2022', 'web21', '2021-05-10', '2022-06-17', 435, 1, 1),
(2, 'Digital Designer 2021 - 2022', 'DD21', '2021-05-10', '2022-06-17', 435, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `proofofabsences`
--

DROP TABLE IF EXISTS `proofofabsences`;
CREATE TABLE IF NOT EXISTS `proofofabsences` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `specialevents_id` int(10) UNSIGNED DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstdaycovered` date NOT NULL,
  `lastdaycovered` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_82DD998F33173E92` (`specialevents_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `proofofabsences`
--

INSERT INTO `proofofabsences` (`id`, `specialevents_id`, `file`, `firstdaycovered`, `lastdaycovered`) VALUES
(1, 1, '1', '2022-07-19', '2022-07-19'),
(2, 2, '2', '2022-07-19', '2022-07-19');

-- --------------------------------------------------------

--
-- Structure de la table `registrations`
--

DROP TABLE IF EXISTS `registrations`;
CREATE TABLE IF NOT EXISTS `registrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `users_id` int(10) UNSIGNED DEFAULT NULL,
  `active` smallint(5) UNSIGNED NOT NULL DEFAULT 1,
  `startingdate` datetime DEFAULT current_timestamp(),
  `endingdate` datetime DEFAULT NULL,
  `promotions_id` int(10) UNSIGNED DEFAULT NULL,
  `followups_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_53DE51E76CA9C868` (`followups_id`),
  KEY `IDX_53DE51E767B3B43D` (`users_id`),
  KEY `IDX_53DE51E710007789` (`promotions_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `registrations`
--

INSERT INTO `registrations` (`id`, `users_id`, `active`, `startingdate`, `endingdate`, `promotions_id`, `followups_id`) VALUES
(1, 1, 1, '2021-05-10 11:38:52', NULL, 1, 1),
(2, 7, 1, '2021-05-10 11:59:35', NULL, 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `specialevents`
--

DROP TABLE IF EXISTS `specialevents`;
CREATE TABLE IF NOT EXISTS `specialevents` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `registrations_id` int(10) UNSIGNED NOT NULL,
  `eventdate` datetime NOT NULL,
  `remote` smallint(5) UNSIGNED DEFAULT NULL,
  `eventperiod` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `arrivaltime` time DEFAULT NULL,
  `departuretime` time DEFAULT NULL,
  `message` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specialeventtype_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_758115978279080` (`registrations_id`),
  KEY `IDX_758115979BDE7D14` (`specialeventtype_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `specialevents`
--

INSERT INTO `specialevents` (`id`, `registrations_id`, `eventdate`, `remote`, `eventperiod`, `arrivaltime`, `departuretime`, `message`, `specialeventtype_id`) VALUES
(1, 1, '2022-07-19 14:12:54', NULL, 1, NULL, NULL, 'je m\'étais endormis', 2),
(2, 1, '2022-07-19 14:13:41', NULL, 2, '16:13:41', NULL, 'je m\'étais endormis', 1);

-- --------------------------------------------------------

--
-- Structure de la table `specialeventtype`
--

DROP TABLE IF EXISTS `specialeventtype`;
CREATE TABLE IF NOT EXISTS `specialeventtype` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `eventname` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `specialeventtype`
--

INSERT INTO `specialeventtype` (`id`, `eventname`) VALUES
(1, 'retard'),
(2, 'absence');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thename` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thesurname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `themail` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `theuid` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thestatus` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`),
  UNIQUE KEY `UNIQ_8D93D649405C2D18` (`themail`),
  UNIQUE KEY `UNIQ_8D93D64928110ADD` (`theuid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `roles`, `password`, `thename`, `thesurname`, `themail`, `theuid`, `thestatus`) VALUES
(1, 'util1', '[\"ROLE_USER\"]', '$2y$13$sZ2rWIqI37dUCkC5uQkn5.5C91WuXqG19FYN7fQKZGmhE6XFWwVMK', 'Util', 'Un', 'util1@cf2m.be', '62d1a011b40c82.68871385', 1),
(2, 'perso1', '[\"ROLE_USER\",\"ROLE_PERSO\"]', '$2y$13$O8xaIECsZuyniB53IcSoUeRTMgB5bgM7NU99..t5K.oDiVxdDd47O', 'Formateur', 'Un', 'form@cf2m.be', '62c17fd0c96ee9.44589091', 1),
(3, 'encode1', '[\"ROLE_USER\",\"ROLE_PERSO\",\"ROLE_ENCODE\"]', '$2y$13$qRPI/dvHLEbXh6m2TqHHf.Yuf9BG8MA/XFe4UibVG.KY0FtRNrpyW', 'Encode', 'Mister', 'encode@cf2m.be', '62c29b139f3a51.05502823', 1),
(4, 'format1', '[\"ROLE_USER\",\"ROLE_PERSO\",\"ROLE_FORMAT\"]', '$2y$13$VumT2eim34mS0ozalEbhEeJsG4FEglXP.5iPP2sw0PK1FQ1swfu0y', 'Formateur', 'Un', 'format@cf2m.be', '62c2a043841800.30373161', 1),
(5, 'pedago1', '[\"ROLE_USER\",\"ROLE_PERSO\",\"ROLE_FORMAT\",\"ROLE_ENCODE\",\"ROLE_PEDAGO\"]', '$2y$13$fPMsbaU9xqRPEck2BJPL7OPR3UlJfo6FO1dICY41LCB2i6yt9z8kC', 'Pédagogique', 'Un', 'peda@cf2m.be', '62c2a1dd1539a6.95623362', 1),
(6, 'admin1', '[\"ROLE_USER\",\"ROLE_PERSO\",\"ROLE_FORMAT\",\"ROLE_ENCODE\",\"ROLE_PEDAGO\",\"ROLE_ADMIN\"]', '$2y$13$3gk47VWvm.VosRdHgeUSCe6uDbOADlhygXCQja3AU/sxtjRYsoFoe', 'Admin', 'Un', 'admin@cf2m.be', '62d577a6b07170.27712802', 1),
(7, 'util2', '[\"ROLE_USER\"]', '$2y$10$S09lGJc497EYYhde8fxbvuyP9rIYab2egsClVHYuL6BFuL0WnJqrC', 'Util', 'Deux', 'util2@cf2m.be', '62d67fdc707b16.51422118', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `attendancesheets`
--
ALTER TABLE `attendancesheets`
  ADD CONSTRAINT `FK_FFE2C73C10007789` FOREIGN KEY (`promotions_id`) REFERENCES `promotions` (`id`);

--
-- Contraintes pour la table `holidays_promotions`
--
ALTER TABLE `holidays_promotions`
  ADD CONSTRAINT `FK_FEA484FF10007789` FOREIGN KEY (`promotions_id`) REFERENCES `promotions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_FEA484FF7C9675AB` FOREIGN KEY (`holidays_id`) REFERENCES `holidays` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `promotions`
--
ALTER TABLE `promotions`
  ADD CONSTRAINT `FK_EA1B30343ADB05F1` FOREIGN KEY (`options_id`) REFERENCES `options` (`id`);

--
-- Contraintes pour la table `proofofabsences`
--
ALTER TABLE `proofofabsences`
  ADD CONSTRAINT `FK_82DD998F33173E92` FOREIGN KEY (`specialevents_id`) REFERENCES `specialevents` (`id`);

--
-- Contraintes pour la table `registrations`
--
ALTER TABLE `registrations`
  ADD CONSTRAINT `FK_53DE51E710007789` FOREIGN KEY (`promotions_id`) REFERENCES `promotions` (`id`),
  ADD CONSTRAINT `FK_53DE51E767B3B43D` FOREIGN KEY (`users_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_53DE51E76CA9C868` FOREIGN KEY (`followups_id`) REFERENCES `followups` (`id`);

--
-- Contraintes pour la table `specialevents`
--
ALTER TABLE `specialevents`
  ADD CONSTRAINT `FK_758115978279080` FOREIGN KEY (`registrations_id`) REFERENCES `registrations` (`id`),
  ADD CONSTRAINT `FK_758115979BDE7D14` FOREIGN KEY (`specialeventtype_id`) REFERENCES `specialeventtype` (`id`);
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
