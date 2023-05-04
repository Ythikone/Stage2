-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 08 fév. 2023 à 15:48
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestioncourrier2`
--

-- --------------------------------------------------------

--
-- Structure de la table `courrier`
--

DROP TABLE IF EXISTS `courrier`;
CREATE TABLE IF NOT EXISTS `courrier` (
  `id` int NOT NULL AUTO_INCREMENT,
  `contenu` varchar(3000) NOT NULL,
  `provenance` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `courrier`
--

INSERT INTO `courrier` (`id`, `contenu`, `provenance`) VALUES
(1, 'Lidzjoah ihiadh dhzahd auhd zadhzahpdknj sh dzhpidop aoid jaio poiqzjdizq dj izhdhza d fuez fzp fojdok,az di zjdoip zad iazopd azjoid oazijdza odh fzeopzejd zeodh z', 'mail'),
(2, 'a', 'mail'),
(3, 'a', 'mail'),
(4, 'a', 'mail'),
(5, 'b', 'mail'),
(6, 'b', 'mail'),
(7, 'zzz', 'mail'),
(8, 'eee', 'mail'),
(9, 'ttt', 'mail'),
(10, 'ttt', 'mail'),
(11, 'yyy', 'mail'),
(12, 'sss', 'mail'),
(13, 'iii', 'mail'),
(14, 'a', 'mail'),
(15, 'aaa', 'depotEnMairie'),
(16, 'aaa', 'postal');

-- --------------------------------------------------------

--
-- Structure de la table `destinataire`
--

DROP TABLE IF EXISTS `destinataire`;
CREATE TABLE IF NOT EXISTS `destinataire` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `destinataire`
--

INSERT INTO `destinataire` (`id`, `nom`, `prenom`) VALUES
(1, 'urbanisme', NULL),
(2, 'dynamisation', NULL),
(3, 'etatCivilComptabilite', NULL),
(4, 'maire', NULL),
(5, 'adjoint', NULL),
(6, 'a', NULL),
(7, 'a', NULL),
(8, 'b', NULL),
(9, 'b', NULL),
(10, 'zzz', NULL),
(11, 'eee', NULL),
(12, 'ttt', 'ttt'),
(13, 'ttt', NULL),
(14, 'yyy', 'yyy'),
(15, 'sss', NULL),
(16, 'iii', 'iii'),
(17, 'a', NULL),
(18, 'aaa', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `entrant`
--

DROP TABLE IF EXISTS `entrant`;
CREATE TABLE IF NOT EXISTS `entrant` (
  `id` int NOT NULL,
  `dateReception` date NOT NULL,
  `urgenceTraitement` varchar(50) NOT NULL,
  `etat` varchar(50) NOT NULL,
  `contenu` varchar(3000) NOT NULL,
  `provenance` varchar(50) NOT NULL,
  `id_Destinataire` int NOT NULL,
  `id_raisonCloture` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `entrant_Destinataire0_FK` (`id_Destinataire`),
  KEY `entrant_raisonCloture1_FK` (`id_raisonCloture`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `entrant`
--

INSERT INTO `entrant` (`id`, `dateReception`, `urgenceTraitement`, `etat`, `contenu`, `provenance`, `id_Destinataire`, `id_raisonCloture`) VALUES
(1, '2023-01-04', 'normal', 'nouveau', 'Lidzjoah ihiadh dhzahd auhd zadhzahpdknj sh dzhpidop aoid jaio poiqzjdizq dj izhdhza d fuez fzp fojdok,az di zjdoip zad iazopd azjoid oazijdza odh fzeopzejd zeodh z', 'mail', 4, NULL),
(14, '2023-01-01', 'normal', 'nouveau', 'a', 'mail', 2, NULL),
(16, '2023-01-01', 'urgent', 'cloture', 'aaa', 'postal', 2, 1);

--
-- Déclencheurs `entrant`
--
DROP TRIGGER IF EXISTS `nouveauCourrier`;
DELIMITER $$
CREATE TRIGGER `nouveauCourrier` BEFORE INSERT ON `entrant` FOR EACH ROW BEGIN
INSERT INTO courrier VALUES(new.id, new.contenu, new.provenance);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `expediteur`
--

DROP TABLE IF EXISTS `expediteur`;
CREATE TABLE IF NOT EXISTS `expediteur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `expediteur`
--

INSERT INTO `expediteur` (`id`, `nom`, `prenom`) VALUES
(1, 'urbanisme', ''),
(2, 'dynamisation', ''),
(3, 'etatCivilCommptabilite', ''),
(4, 'maire', ''),
(5, 'adjoint', ''),
(6, 'eee', ''),
(7, 'ttt', 'ttt'),
(8, 'ttt', 'ttt'),
(9, 'yyy', ''),
(10, 'sss', 'sss');

-- --------------------------------------------------------

--
-- Structure de la table `raisoncloture`
--

DROP TABLE IF EXISTS `raisoncloture`;
CREATE TABLE IF NOT EXISTS `raisoncloture` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(500) NOT NULL,
  `cloturerLe` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `raisoncloture`
--

INSERT INTO `raisoncloture` (`id`, `libelle`, `cloturerLe`) VALUES
(1, 'aa', '2023-01-01');

-- --------------------------------------------------------

--
-- Structure de la table `sortant`
--

DROP TABLE IF EXISTS `sortant`;
CREATE TABLE IF NOT EXISTS `sortant` (
  `id` int NOT NULL,
  `typeEnvoi` varchar(50) NOT NULL,
  `dateEnvoi` varchar(50) NOT NULL,
  `contenu` varchar(3000) NOT NULL,
  `provenance` varchar(50) NOT NULL,
  `id_Destinataire` int NOT NULL,
  `id_expediteur` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sortant_Destinataire0_FK` (`id_Destinataire`),
  KEY `sortant_expediteur1_FK` (`id_expediteur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `sortant`
--

INSERT INTO `sortant` (`id`, `typeEnvoi`, `dateEnvoi`, `contenu`, `provenance`, `id_Destinataire`, `id_expediteur`) VALUES
(3, 'mail', '2022-12-31', 'a', 'mail', 6, 1),
(4, 'mail', '2022-12-31', 'a', 'mail', 7, 1),
(5, 'mail', '2023-01-01', 'b', 'mail', 8, 1),
(6, 'mail', '2023-01-01', 'b', 'mail', 9, 1),
(7, 'mail', '2023-01-06', 'zzz', 'mail', 10, 2),
(8, 'mail', '2023-01-01', 'eee', 'mail', 11, 6),
(9, 'mail', '2022-12-31', 'ttt', 'mail', 12, 7),
(10, 'mail', '2023-01-01', 'ttt', 'mail', 13, 8),
(11, 'mail', '2023-01-01', 'yyy', 'mail', 14, 9),
(12, 'mail', '2022-12-31', 'sss', 'mail', 15, 10),
(13, 'mail', '2023-01-14', 'iii', 'mail', 16, 1),
(15, 'postal', '2023-01-01', 'aaa', 'depotEnMairie', 18, 5);

--
-- Déclencheurs `sortant`
--
DROP TRIGGER IF EXISTS `nouveauCourrier2`;
DELIMITER $$
CREATE TRIGGER `nouveauCourrier2` BEFORE INSERT ON `sortant` FOR EACH ROW BEGIN
INSERT INTO courrier VALUES(new.id, new.contenu, new.provenance);
END
$$
DELIMITER ;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `entrant`
--
ALTER TABLE `entrant`
  ADD CONSTRAINT `entrant_courrier_FK` FOREIGN KEY (`id`) REFERENCES `courrier` (`id`),
  ADD CONSTRAINT `entrant_Destinataire0_FK` FOREIGN KEY (`id_Destinataire`) REFERENCES `destinataire` (`id`),
  ADD CONSTRAINT `entrant_raisonCloture1_FK` FOREIGN KEY (`id_raisonCloture`) REFERENCES `raisoncloture` (`id`);

--
-- Contraintes pour la table `sortant`
--
ALTER TABLE `sortant`
  ADD CONSTRAINT `sortant_courrier_FK` FOREIGN KEY (`id`) REFERENCES `courrier` (`id`),
  ADD CONSTRAINT `sortant_Destinataire0_FK` FOREIGN KEY (`id_Destinataire`) REFERENCES `destinataire` (`id`),
  ADD CONSTRAINT `sortant_expediteur1_FK` FOREIGN KEY (`id_expediteur`) REFERENCES `expediteur` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
