-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 29 mai 2023 à 15:51
-- Version du serveur :  5.7.24
-- Version de PHP : 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `equestreproject`
--

-- --------------------------------------------------------

--
-- Structure de la table `cheval`
--

CREATE TABLE `cheval` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `naissance` date DEFAULT NULL,
  `sir` int(11) DEFAULT NULL,
  `photo` varchar(225) DEFAULT NULL,
  `idRobe` int(11) NOT NULL,
  `actif` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cheval`
--

INSERT INTO `cheval` (`id`, `nom`, `naissance`, `sir`, `photo`, `idRobe`, `actif`) VALUES
(12, 'Hope', '2023-03-10', 222, '64234eb047fe73.81696598.png', 4, 1),
(13, 'Tulip', '2021-04-26', 2332, '642e61a8b66865.01738898.png', 7, 1),
(14, 'Patronus', '2015-11-05', 2335, '642e61c10dd9f4.25829420.png', 7, 1),
(15, 'Test Unitaire', '2023-05-12', 12932, '645164d9874e17.79687570.png', 6, 0);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `sujet` varchar(255) DEFAULT NULL,
  `commentaire` text,
  `dateContact` date DEFAULT NULL,
  `actif` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `nom`, `prenom`, `mail`, `sujet`, `commentaire`, `dateContact`, `actif`) VALUES
(14, 'Diaz', 'Samuel', 'smy@gmail.com', 'Inscription Junior', 'Bonjour,\r\n\r\nJe suis intéressé à inscrire mon enfant junior au centre équestre. J\'ai entendu de bonnes choses à propos de votre établissement et j\'aimerais en savoir plus sur les options disponibles.\r\n\r\nPouvez-vous s\'il vous plaît me fournir des informations sur les cours pour les enfants juniors ainsi que sur les coûts associés ?\r\n\r\nMerci d\'avance pour votre aide.\r\n\r\nCordialement.', '2023-04-16', 1),
(15, 'Dupont', 'Jean', ' jean.dupont@email.com', 'Inscription Senior', 'Bonjour,\r\n\r\nJe suis intéressé à inscrire une personne senior au centre équestre. J\'aimerais savoir si vous offrez des cours adaptés aux personnes âgées et quelles sont les options disponibles.\r\n\r\nPouvez-vous s\'il vous plaît me fournir des informations sur les cours pour les seniors ainsi que sur les coûts associés ?\r\n\r\nMerci d\'avance pour votre aide.\r\n\r\nCordialement.', '2023-04-06', 1);

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `startEvent` datetime NOT NULL,
  `end_event` datetime NOT NULL,
  `color` varchar(191) NOT NULL,
  `text_color` varchar(191) NOT NULL,
  `idRecurrence` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `events`
--

INSERT INTO `events` (`id`, `title`, `startEvent`, `end_event`, `color`, `text_color`, `idRecurrence`) VALUES
(406, 'Cours Junior', '2023-05-01 10:00:00', '2023-05-01 12:00:00', '#4ad668', '#ffffff', 406),
(407, 'Cours Junior', '2023-05-08 10:00:00', '2023-05-08 12:00:00', '#4ad668', '#ffffff', 406),
(408, 'Cours Junior', '2023-05-15 10:00:00', '2023-05-15 12:00:00', '#4ad668', '#ffffff', 406),
(409, 'Cours Junior', '2023-05-22 10:00:00', '2023-05-22 12:00:00', '#4ad668', '#ffffff', 406),
(410, 'Cours Junior', '2023-05-29 10:00:00', '2023-05-29 12:00:00', '#4ad668', '#ffffff', 406),
(411, 'Cours Junior', '2023-06-05 10:00:00', '2023-06-05 12:00:00', '#4ad668', '#ffffff', 406),
(412, 'Cours Junior', '2023-06-12 10:00:00', '2023-06-12 12:00:00', '#4ad668', '#ffffff', 406),
(413, 'Cours Junior', '2023-06-19 10:00:00', '2023-06-19 12:00:00', '#4ad668', '#ffffff', 406),
(414, 'Cours Junior', '2023-06-26 10:00:00', '2023-06-26 12:00:00', '#4ad668', '#ffffff', 406),
(415, 'Cours Junior', '2023-07-03 10:00:00', '2023-07-03 12:00:00', '#4ad668', '#ffffff', 406),
(416, 'Cours Junior', '2023-07-10 10:00:00', '2023-07-10 12:00:00', '#4ad668', '#ffffff', 406),
(417, 'Cours Junior', '2023-07-17 10:00:00', '2023-07-17 12:00:00', '#4ad668', '#ffffff', 406),
(418, 'Cours Junior', '2023-07-24 10:00:00', '2023-07-24 12:00:00', '#4ad668', '#ffffff', 406),
(419, 'Cours Junior', '2023-07-31 10:00:00', '2023-07-31 12:00:00', '#4ad668', '#ffffff', 406),
(420, 'Cours Junior', '2023-08-07 10:00:00', '2023-08-07 12:00:00', '#4ad668', '#ffffff', 406),
(421, 'Cours Junior', '2023-08-14 10:00:00', '2023-08-14 12:00:00', '#4ad668', '#ffffff', 406),
(422, 'Cours Junior', '2023-08-21 10:00:00', '2023-08-21 12:00:00', '#4ad668', '#ffffff', 406),
(423, 'Cours Junior', '2023-08-28 10:00:00', '2023-08-28 12:00:00', '#4ad668', '#ffffff', 406),
(424, 'Cours Junior', '2023-09-04 10:00:00', '2023-09-04 12:00:00', '#4ad668', '#ffffff', 406),
(425, 'Cours Junior', '2023-09-11 10:00:00', '2023-09-11 12:00:00', '#4ad668', '#ffffff', 406),
(426, 'Cours Junior', '2023-09-18 10:00:00', '2023-09-18 12:00:00', '#4ad668', '#ffffff', 406),
(427, 'Cours Junior', '2023-09-25 10:00:00', '2023-09-25 12:00:00', '#4ad668', '#ffffff', 406),
(428, 'Cours Junior', '2023-10-02 10:00:00', '2023-10-02 12:00:00', '#4ad668', '#ffffff', 406),
(429, 'Cours Junior', '2023-10-09 10:00:00', '2023-10-09 12:00:00', '#4ad668', '#ffffff', 406),
(430, 'Cours Junior', '2023-10-16 10:00:00', '2023-10-16 12:00:00', '#4ad668', '#ffffff', 406),
(431, 'Cours Junior', '2023-10-23 10:00:00', '2023-10-23 12:00:00', '#4ad668', '#ffffff', 406),
(432, 'Cours Junior', '2023-10-30 10:00:00', '2023-10-30 12:00:00', '#4ad668', '#ffffff', 406),
(433, 'Cours Junior', '2023-11-06 10:00:00', '2023-11-06 12:00:00', '#4ad668', '#ffffff', 406),
(434, 'Cours Junior', '2023-11-13 10:00:00', '2023-11-13 12:00:00', '#4ad668', '#ffffff', 406),
(435, 'Cours Junior', '2023-11-20 10:00:00', '2023-11-20 12:00:00', '#4ad668', '#ffffff', 406),
(436, 'Cours Junior', '2023-11-27 10:00:00', '2023-11-27 12:00:00', '#4ad668', '#ffffff', 406),
(437, 'Cours Junior', '2023-12-04 10:00:00', '2023-12-04 12:00:00', '#4ad668', '#ffffff', 406),
(438, 'Cours Junior', '2023-12-11 10:00:00', '2023-12-11 12:00:00', '#4ad668', '#ffffff', 406),
(439, 'Cours Junior', '2023-12-18 10:00:00', '2023-12-18 12:00:00', '#4ad668', '#ffffff', 406),
(440, 'Cours Junior', '2023-12-25 10:00:00', '2023-12-25 12:00:00', '#4ad668', '#ffffff', 406),
(441, 'Cours Junior', '2024-01-01 10:00:00', '2024-01-01 12:00:00', '#4ad668', '#ffffff', 406),
(442, 'Cours Junior', '2024-01-08 10:00:00', '2024-01-08 12:00:00', '#4ad668', '#ffffff', 406),
(443, 'Cours Junior', '2024-01-15 10:00:00', '2024-01-15 12:00:00', '#4ad668', '#ffffff', 406),
(444, 'Cours Junior', '2024-01-22 10:00:00', '2024-01-22 12:00:00', '#4ad668', '#ffffff', 406),
(445, 'Cours Junior', '2024-01-29 10:00:00', '2024-01-29 12:00:00', '#4ad668', '#ffffff', 406),
(446, 'Cours Junior', '2024-02-05 10:00:00', '2024-02-05 12:00:00', '#4ad668', '#ffffff', 406),
(447, 'Cours Junior', '2024-02-12 10:00:00', '2024-02-12 12:00:00', '#4ad668', '#ffffff', 406),
(448, 'Cours Junior', '2024-02-19 10:00:00', '2024-02-19 12:00:00', '#4ad668', '#ffffff', 406),
(449, 'Cours Junior', '2024-02-26 10:00:00', '2024-02-26 12:00:00', '#4ad668', '#ffffff', 406),
(450, 'Cours Junior', '2024-03-04 10:00:00', '2024-03-04 12:00:00', '#4ad668', '#ffffff', 406),
(451, 'Cours Junior', '2024-03-11 10:00:00', '2024-03-11 12:00:00', '#4ad668', '#ffffff', 406),
(452, 'Cours Junior', '2024-03-18 10:00:00', '2024-03-18 12:00:00', '#4ad668', '#ffffff', 406),
(453, 'Cours Junior', '2024-03-25 10:00:00', '2024-03-25 12:00:00', '#4ad668', '#ffffff', 406),
(454, 'Cours Junior', '2024-04-01 10:00:00', '2024-04-01 12:00:00', '#4ad668', '#ffffff', 406),
(455, 'Cours Senior', '2023-05-10 10:00:00', '2023-05-10 12:00:00', '#4aacd6', '#ffffff', 455),
(456, 'Cours Senior', '2023-05-17 10:00:00', '2023-05-17 12:00:00', '#4aacd6', '#ffffff', 455),
(457, 'Cours Senior', '2023-05-24 10:00:00', '2023-05-24 12:00:00', '#4aacd6', '#ffffff', 455),
(458, 'Cours Senior', '2023-05-31 10:00:00', '2023-05-31 12:00:00', '#4aacd6', '#ffffff', 455),
(459, 'Cours Senior', '2023-06-07 10:00:00', '2023-06-07 12:00:00', '#4aacd6', '#ffffff', 455),
(460, 'Cours Senior', '2023-06-14 10:00:00', '2023-06-14 12:00:00', '#4aacd6', '#ffffff', 455),
(461, 'Cours Senior', '2023-06-21 10:00:00', '2023-06-21 12:00:00', '#4aacd6', '#ffffff', 455),
(462, 'Cours Senior', '2023-06-28 10:00:00', '2023-06-28 12:00:00', '#4aacd6', '#ffffff', 455),
(463, 'Cours Senior', '2023-07-05 10:00:00', '2023-07-05 12:00:00', '#4aacd6', '#ffffff', 455),
(464, 'Cours Senior', '2023-07-12 10:00:00', '2023-07-12 12:00:00', '#4aacd6', '#ffffff', 455),
(465, 'Cours Senior', '2023-07-19 10:00:00', '2023-07-19 12:00:00', '#4aacd6', '#ffffff', 455),
(466, 'Cours Senior', '2023-07-26 10:00:00', '2023-07-26 12:00:00', '#4aacd6', '#ffffff', 455),
(467, 'Cours Senior', '2023-08-02 10:00:00', '2023-08-02 12:00:00', '#4aacd6', '#ffffff', 455),
(468, 'Cours Senior', '2023-08-09 10:00:00', '2023-08-09 12:00:00', '#4aacd6', '#ffffff', 455),
(469, 'Cours Senior', '2023-08-16 10:00:00', '2023-08-16 12:00:00', '#4aacd6', '#ffffff', 455),
(470, 'Cours Senior', '2023-08-23 10:00:00', '2023-08-23 12:00:00', '#4aacd6', '#ffffff', 455),
(471, 'Cours Senior', '2023-08-30 10:00:00', '2023-08-30 12:00:00', '#4aacd6', '#ffffff', 455),
(472, 'Cours Senior', '2023-09-06 10:00:00', '2023-09-06 12:00:00', '#4aacd6', '#ffffff', 455),
(473, 'Cours Senior', '2023-09-13 10:00:00', '2023-09-13 12:00:00', '#4aacd6', '#ffffff', 455),
(474, 'Cours Senior', '2023-09-20 10:00:00', '2023-09-20 12:00:00', '#4aacd6', '#ffffff', 455),
(475, 'Cours Senior', '2023-09-27 10:00:00', '2023-09-27 12:00:00', '#4aacd6', '#ffffff', 455),
(476, 'Cours Senior', '2023-10-04 10:00:00', '2023-10-04 12:00:00', '#4aacd6', '#ffffff', 455),
(477, 'Cours Senior', '2023-10-11 10:00:00', '2023-10-11 12:00:00', '#4aacd6', '#ffffff', 455),
(478, 'Cours Senior', '2023-10-18 10:00:00', '2023-10-18 12:00:00', '#4aacd6', '#ffffff', 455),
(479, 'Cours Senior', '2023-10-25 10:00:00', '2023-10-25 12:00:00', '#4aacd6', '#ffffff', 455);

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE `inscription` (
  `ID_Inscription` int(11) NOT NULL,
  `annee` date DEFAULT NULL,
  `CotisationFFE` int(11) DEFAULT NULL,
  `CotisationCentre` int(11) DEFAULT NULL,
  `ID_Personne` int(11) NOT NULL,
  `actif` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `inscription`
--

INSERT INTO `inscription` (`ID_Inscription`, `annee`, `CotisationFFE`, `CotisationCentre`, `ID_Personne`, `actif`) VALUES
(1, '2022-12-10', 23, 21, 1075, 1),
(2, '2022-12-17', 43, 11, 1074, 1),
(3, '2023-02-10', 2000, 200, 1077, 1),
(4, '2031-06-02', 2000, 200, 1078, 1),
(5, '2023-03-03', 123, 122, 1097, 1),
(6, '2023-04-12', 332, 223, 1103, 1),
(7, '2023-04-13', 500, 100, 1101, 1);

-- --------------------------------------------------------

--
-- Structure de la table `inscription_cours`
--

CREATE TABLE `inscription_cours` (
  `idP` int(11) NOT NULL,
  `idC` int(11) NOT NULL,
  `presence` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `inscription_cours`
--

INSERT INTO `inscription_cours` (`idP`, `idC`, `presence`) VALUES
(1101, 455, 1),
(1101, 456, 1),
(1101, 457, 1),
(1101, 458, 1),
(1101, 459, 0),
(1101, 460, 1),
(1101, 461, 0),
(1101, 462, 1),
(1101, 463, 1),
(1101, 464, 1),
(1101, 465, 1),
(1101, 466, 1),
(1101, 467, 1),
(1101, 468, 1),
(1101, 469, 0),
(1101, 470, 1),
(1101, 471, 1),
(1101, 472, 1),
(1101, 473, 1),
(1101, 474, 1),
(1101, 475, 1),
(1101, 476, 1),
(1101, 477, 1),
(1101, 478, 1),
(1101, 479, 1);

-- --------------------------------------------------------

--
-- Structure de la table `pension`
--

CREATE TABLE `pension` (
  `ID_Pension` int(11) NOT NULL,
  `ID_TP` int(11) DEFAULT NULL,
  `ID_Tarif` int(11) DEFAULT NULL,
  `ID_Cheval` int(11) DEFAULT NULL,
  `dateDebut` date DEFAULT NULL,
  `dateFin` date DEFAULT NULL,
  `actif` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pension`
--

INSERT INTO `pension` (`ID_Pension`, `ID_TP`, `ID_Tarif`, `ID_Cheval`, `dateDebut`, `dateFin`, `actif`) VALUES
(35, 3, 6, 12, '2023-03-28', '2023-04-09', 1),
(36, 1, 2, 13, '2023-04-08', '2023-04-27', 1),
(37, 3, 6, 14, '2023-04-13', '2023-04-20', 1),
(38, 2, 6, 12, '2023-04-08', '2023-04-29', 1);

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
  `idPersonne` int(11) NOT NULL,
  `nom` varchar(222) DEFAULT NULL,
  `prenom` varchar(222) DEFAULT NULL,
  `dateNaissance` date DEFAULT NULL,
  `mail` varchar(222) DEFAULT NULL,
  `telephone` varchar(222) DEFAULT NULL,
  `photo` varchar(222) DEFAULT NULL,
  `niveauGalop` int(11) DEFAULT NULL,
  `numeroLicence` varchar(222) DEFAULT NULL,
  `rue` varchar(222) DEFAULT NULL,
  `complementAdresse` varchar(222) DEFAULT NULL,
  `codePostal` varchar(222) DEFAULT NULL,
  `ville` varchar(222) DEFAULT NULL,
  `ID_Responsable` int(11) DEFAULT NULL,
  `actif` tinyint(1) NOT NULL,
  `mdp` varchar(255) DEFAULT NULL,
  `admin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`idPersonne`, `nom`, `prenom`, `dateNaissance`, `mail`, `telephone`, `photo`, `niveauGalop`, `numeroLicence`, `rue`, `complementAdresse`, `codePostal`, `ville`, `ID_Responsable`, `actif`, `mdp`, `admin`) VALUES
(1101, 'Samys', 'Scooby', '1998-01-08', 'user', '0663727273', '641f42d57fac02.18828704.png', 3, 'AAADE335', NULL, NULL, NULL, NULL, NULL, 1, 'user', 0),
(1103, 'Hochard', 'Lucas', '1993-02-26', 'lucas@gmail.com', '0637727217', '642e8c8c421240.53918184.png', 4, 'ASEDI321', NULL, NULL, NULL, NULL, NULL, 1, 'user', 0),
(1104, 'Diazz', 'Poxy', '2023-03-12', 'admin', '0637288212', '6421b5ee43eb13.32421152.png', 2, 'AAADE335', NULL, NULL, NULL, NULL, NULL, 1, 'admin', 1);

-- --------------------------------------------------------

--
-- Structure de la table `robe`
--

CREATE TABLE `robe` (
  `ID_Robe` int(11) NOT NULL,
  `libelleRobe` varchar(255) DEFAULT NULL,
  `actif` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `robe`
--

INSERT INTO `robe` (`ID_Robe`, `libelleRobe`, `actif`) VALUES
(1, 'Marron', 0),
(2, 'Rouge', 1),
(3, 'Blanc', 1),
(4, 'Vert', 1),
(5, 'Violet', 1),
(6, 'Marron', 1),
(7, 'Noir', 0),
(8, 'Magenta', 0),
(9, '', 0),
(10, 'tesss', 0),
(11, 'TEST', 0),
(12, NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `signe`
--

CREATE TABLE `signe` (
  `ID_Pension` int(11) NOT NULL,
  `ID_Personne` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `signe`
--

INSERT INTO `signe` (`ID_Pension`, `ID_Personne`) VALUES
(28, 1076),
(29, 1072),
(30, 1078),
(31, 1097),
(32, 1101),
(33, 1101),
(34, 1101),
(35, 1103),
(36, 1101),
(37, 1104),
(38, 1101);

-- --------------------------------------------------------

--
-- Structure de la table `tarif`
--

CREATE TABLE `tarif` (
  `ID_Tarif` int(11) NOT NULL,
  `libelleTarif` varchar(255) DEFAULT NULL,
  `prixMois` float DEFAULT NULL,
  `actif` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tarif`
--

INSERT INTO `tarif` (`ID_Tarif`, `libelleTarif`, `prixMois`, `actif`) VALUES
(2, 'Classique', 20, 1),
(5, 'Classique +', 49, 1),
(6, 'VIP +', 70, 1),
(7, 'Ultimate +', 222, 1),
(8, 'Ultra Premium', 400, 0),
(9, 'Eco +', NULL, 0),
(10, '5', NULL, 0),
(11, 'Eco +', 5, 0);

-- --------------------------------------------------------

--
-- Structure de la table `typepension`
--

CREATE TABLE `typepension` (
  `ID_TP` int(11) NOT NULL,
  `libelle_TP` varchar(255) DEFAULT NULL,
  `actif` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `typepension`
--

INSERT INTO `typepension` (`ID_TP`, `libelle_TP`, `actif`) VALUES
(1, 'Demi Pension', 1),
(2, 'Pension complète', 1),
(3, 'Pension Triple', 1),
(4, 'Croissant', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cheval`
--
ALTER TABLE `cheval`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ID_Robe` (`idRobe`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`ID_Inscription`),
  ADD KEY `ID_Personne` (`ID_Personne`);

--
-- Index pour la table `inscription_cours`
--
ALTER TABLE `inscription_cours`
  ADD PRIMARY KEY (`idP`,`idC`),
  ADD KEY `id_cours` (`idC`),
  ADD KEY `id_personne` (`idP`,`idC`);

--
-- Index pour la table `pension`
--
ALTER TABLE `pension`
  ADD PRIMARY KEY (`ID_Pension`),
  ADD KEY `ID_Cheval` (`ID_Cheval`),
  ADD KEY `ID_TP` (`ID_TP`),
  ADD KEY `ID_Tarif` (`ID_Tarif`,`ID_Cheval`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`idPersonne`);

--
-- Index pour la table `robe`
--
ALTER TABLE `robe`
  ADD PRIMARY KEY (`ID_Robe`);

--
-- Index pour la table `signe`
--
ALTER TABLE `signe`
  ADD PRIMARY KEY (`ID_Pension`,`ID_Personne`),
  ADD KEY `ID_Pension` (`ID_Pension`),
  ADD KEY `ID_Personne` (`ID_Personne`);

--
-- Index pour la table `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`ID_Tarif`);

--
-- Index pour la table `typepension`
--
ALTER TABLE `typepension`
  ADD PRIMARY KEY (`ID_TP`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cheval`
--
ALTER TABLE `cheval`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=480;

--
-- AUTO_INCREMENT pour la table `inscription`
--
ALTER TABLE `inscription`
  MODIFY `ID_Inscription` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `pension`
--
ALTER TABLE `pension`
  MODIFY `ID_Pension` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `personne`
--
ALTER TABLE `personne`
  MODIFY `idPersonne` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1105;

--
-- AUTO_INCREMENT pour la table `robe`
--
ALTER TABLE `robe`
  MODIFY `ID_Robe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `tarif`
--
ALTER TABLE `tarif`
  MODIFY `ID_Tarif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `typepension`
--
ALTER TABLE `typepension`
  MODIFY `ID_TP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cheval`
--
ALTER TABLE `cheval`
  ADD CONSTRAINT `cheval_ibfk_1` FOREIGN KEY (`idRobe`) REFERENCES `robe` (`ID_Robe`);

--
-- Contraintes pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD CONSTRAINT `inscription_ibfk_1` FOREIGN KEY (`ID_Personne`) REFERENCES `personne` (`idPersonne`);

--
-- Contraintes pour la table `inscription_cours`
--
ALTER TABLE `inscription_cours`
  ADD CONSTRAINT `inscription_cours_ibfk_1` FOREIGN KEY (`idC`) REFERENCES `events` (`id`),
  ADD CONSTRAINT `inscription_cours_ibfk_2` FOREIGN KEY (`idP`) REFERENCES `personne` (`idPersonne`);

--
-- Contraintes pour la table `pension`
--
ALTER TABLE `pension`
  ADD CONSTRAINT `pension_ibfk_1` FOREIGN KEY (`ID_Cheval`) REFERENCES `cheval` (`id`),
  ADD CONSTRAINT `pension_ibfk_2` FOREIGN KEY (`ID_Tarif`) REFERENCES `tarif` (`ID_Tarif`),
  ADD CONSTRAINT `pension_ibfk_3` FOREIGN KEY (`ID_TP`) REFERENCES `typepension` (`ID_TP`);

--
-- Contraintes pour la table `signe`
--
ALTER TABLE `signe`
  ADD CONSTRAINT `signe_ibfk_1` FOREIGN KEY (`ID_Pension`) REFERENCES `pension` (`ID_Pension`),
  ADD CONSTRAINT `signe_ibfk_2` FOREIGN KEY (`ID_Personne`) REFERENCES `personne` (`idPersonne`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
