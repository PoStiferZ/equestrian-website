-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 02, 2023 at 04:31 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `equestreproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `cheval`
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
-- Dumping data for table `cheval`
--

INSERT INTO `cheval` (`id`, `nom`, `naissance`, `sir`, `photo`, `idRobe`, `actif`) VALUES
(12, 'Hopes', '2023-03-10', 222, '64234eb047fe73.81696598.png', 2, 1),
(13, 'Tulip', '2021-04-26', 2332, '642e61a8b66865.01738898.png', 7, 1),
(14, 'Patronus', '2015-11-05', 2335, '642e61c10dd9f4.25829420.png', 7, 1),
(15, 'Test Unitaire', '2023-05-12', 12932, '645164d9874e17.79687570.png', 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
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
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `nom`, `prenom`, `mail`, `sujet`, `commentaire`, `dateContact`, `actif`) VALUES
(14, 'Diaz', 'Samuel', 'smy@gmail.com', 'Inscription Junior', 'Bonjour,\r\n\r\nJe suis intéressé à inscrire mon enfant junior au centre équestre. J\'ai entendu de bonnes choses à propos de votre établissement et j\'aimerais en savoir plus sur les options disponibles.\r\n\r\nPouvez-vous s\'il vous plaît me fournir des informations sur les cours pour les enfants juniors ainsi que sur les coûts associés ?\r\n\r\nMerci d\'avance pour votre aide.\r\n\r\nCordialement.', '2023-04-16', 1),
(15, 'Dupont', 'Jean', ' jean.dupont@email.com', 'Inscription Senior', 'Bonjour,\r\n\r\nJe suis intéressé à inscrire une personne senior au centre équestre. J\'aimerais savoir si vous offrez des cours adaptés aux personnes âgées et quelles sont les options disponibles.\r\n\r\nPouvez-vous s\'il vous plaît me fournir des informations sur les cours pour les seniors ainsi que sur les coûts associés ?\r\n\r\nMerci d\'avance pour votre aide.\r\n\r\nCordialement.', '2023-04-06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `startEvent` date NOT NULL,
  `end_event` date NOT NULL,
  `color` varchar(191) NOT NULL,
  `text_color` varchar(191) NOT NULL,
  `idRecurrence` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `startEvent`, `end_event`, `color`, `text_color`, `idRecurrence`) VALUES
(554, 'Cours Junior', '2023-06-01', '2023-06-01', '#509338', '#ffffff', 554),
(555, 'Cours Junior', '2023-06-08', '2023-06-08', '#509338', '#ffffff', 554),
(556, 'Cours Junior', '2023-06-15', '2023-06-15', '#509338', '#ffffff', 554),
(557, 'Cours Junior', '2023-06-22', '2023-06-22', '#509338', '#ffffff', 554),
(558, 'Cours Junior', '2023-06-29', '2023-06-29', '#509338', '#ffffff', 554),
(559, 'Cours Junior', '2023-07-06', '2023-07-06', '#509338', '#ffffff', 554),
(560, 'Cours Junior', '2023-07-13', '2023-07-13', '#509338', '#ffffff', 554),
(561, 'Cours Junior', '2023-07-20', '2023-07-20', '#509338', '#ffffff', 554),
(562, 'Cours Junior', '2023-07-27', '2023-07-27', '#509338', '#ffffff', 554),
(563, 'Cours Junior', '2023-08-03', '2023-08-03', '#509338', '#ffffff', 554),
(564, 'Cours Junior', '2023-08-10', '2023-08-10', '#509338', '#ffffff', 554),
(565, 'Cours Junior', '2023-08-17', '2023-08-17', '#509338', '#ffffff', 554),
(566, 'Cours Junior', '2023-08-24', '2023-08-24', '#509338', '#ffffff', 554),
(567, 'Cours Junior', '2023-08-31', '2023-08-31', '#509338', '#ffffff', 554),
(568, 'Cours Junior', '2023-09-07', '2023-09-07', '#509338', '#ffffff', 554),
(569, 'Cours Junior', '2023-09-14', '2023-09-14', '#509338', '#ffffff', 554),
(570, 'Cours Junior', '2023-09-21', '2023-09-21', '#509338', '#ffffff', 554),
(571, 'Cours Junior', '2023-09-28', '2023-09-28', '#509338', '#ffffff', 554),
(572, 'Cours Junior', '2023-10-05', '2023-10-05', '#509338', '#ffffff', 554),
(573, 'Cours Junior', '2023-10-12', '2023-10-12', '#509338', '#ffffff', 554),
(574, 'Cours Junior', '2023-10-19', '2023-10-19', '#509338', '#ffffff', 554),
(575, 'Cours Junior', '2023-10-26', '2023-10-26', '#509338', '#ffffff', 554),
(576, 'Cours Junior', '2023-11-02', '2023-11-02', '#509338', '#ffffff', 554),
(577, 'Cours Junior', '2023-11-09', '2023-11-09', '#509338', '#ffffff', 554),
(578, 'Cours Junior', '2023-11-16', '2023-11-16', '#509338', '#ffffff', 554),
(579, 'Cours Junior', '2023-11-23', '2023-11-23', '#509338', '#ffffff', 554),
(580, 'Cours Junior', '2023-11-30', '2023-11-30', '#509338', '#ffffff', 554),
(581, 'Cours Junior', '2023-12-07', '2023-12-07', '#509338', '#ffffff', 554),
(582, 'Cours Junior', '2023-12-14', '2023-12-14', '#509338', '#ffffff', 554),
(583, 'Cours Junior', '2023-12-21', '2023-12-21', '#509338', '#ffffff', 554),
(584, 'Cours Junior', '2023-12-28', '2023-12-28', '#509338', '#ffffff', 554),
(585, 'Cours Junior', '2024-01-04', '2024-01-04', '#509338', '#ffffff', 554),
(586, 'Cours Junior', '2024-01-11', '2024-01-11', '#509338', '#ffffff', 554),
(587, 'Cours Junior', '2024-01-18', '2024-01-18', '#509338', '#ffffff', 554),
(588, 'Cours Junior', '2024-01-25', '2024-01-25', '#509338', '#ffffff', 554),
(589, 'Cours Junior', '2024-02-01', '2024-02-01', '#509338', '#ffffff', 554),
(590, 'Cours Junior', '2024-02-08', '2024-02-08', '#509338', '#ffffff', 554),
(591, 'Cours Junior', '2024-02-15', '2024-02-15', '#509338', '#ffffff', 554),
(592, 'Cours Junior', '2024-02-22', '2024-02-22', '#509338', '#ffffff', 554),
(593, 'Cours Junior', '2024-02-29', '2024-02-29', '#509338', '#ffffff', 554),
(594, 'Cours Junior', '2024-03-07', '2024-03-07', '#509338', '#ffffff', 554),
(595, 'Cours Junior', '2024-03-14', '2024-03-14', '#509338', '#ffffff', 554),
(596, 'Cours Junior', '2024-03-21', '2024-03-21', '#509338', '#ffffff', 554),
(597, 'Cours Junior', '2024-03-28', '2024-03-28', '#509338', '#ffffff', 554),
(598, 'Cours Junior', '2024-04-04', '2024-04-04', '#509338', '#ffffff', 554),
(599, 'Cours Junior', '2024-04-11', '2024-04-11', '#509338', '#ffffff', 554),
(600, 'Cours Junior', '2024-04-18', '2024-04-18', '#509338', '#ffffff', 554),
(601, 'Cours Junior', '2024-04-25', '2024-04-25', '#509338', '#ffffff', 554),
(602, 'Cours Junior', '2024-05-02', '2024-05-02', '#509338', '#ffffff', 554),
(603, 'Cours Débutant', '2023-06-02', '2023-06-02', '#db78d1', '#ffffff', 603),
(604, 'Cours Débutant', '2023-06-09', '2023-06-09', '#db78d1', '#ffffff', 603),
(605, 'Cours Débutant', '2023-06-16', '2023-06-16', '#db78d1', '#ffffff', 603),
(606, 'Cours Débutant', '2023-06-23', '2023-06-23', '#db78d1', '#ffffff', 603),
(607, 'Cours Débutant', '2023-06-30', '2023-06-30', '#db78d1', '#ffffff', 603),
(608, 'Cours Débutant', '2023-07-07', '2023-07-07', '#db78d1', '#ffffff', 603),
(609, 'Cours Débutant', '2023-07-14', '2023-07-14', '#db78d1', '#ffffff', 603),
(610, 'Cours Débutant', '2023-07-21', '2023-07-21', '#db78d1', '#ffffff', 603),
(611, 'Cours Débutant', '2023-07-28', '2023-07-28', '#db78d1', '#ffffff', 603),
(612, 'Cours Débutant', '2023-08-04', '2023-08-04', '#db78d1', '#ffffff', 603),
(613, 'Cours Débutant', '2023-08-11', '2023-08-11', '#db78d1', '#ffffff', 603),
(614, 'Cours Débutant', '2023-08-18', '2023-08-18', '#db78d1', '#ffffff', 603),
(615, 'Cours Débutant', '2023-08-25', '2023-08-25', '#db78d1', '#ffffff', 603),
(641, 'Cours Découverte', '2023-06-06', '2023-06-06', '#e99a53', '#ffffff', 641),
(642, 'Cours Découverte', '2023-06-13', '2023-06-13', '#e99a53', '#ffffff', 641),
(643, 'Cours Découverte', '2023-06-20', '2023-06-20', '#e99a53', '#ffffff', 641),
(644, 'Cours Découverte', '2023-06-27', '2023-06-27', '#e99a53', '#ffffff', 641),
(645, 'Cours Découverte', '2023-07-04', '2023-07-04', '#e99a53', '#ffffff', 641),
(646, 'Cours Découverte', '2023-07-11', '2023-07-11', '#e99a53', '#ffffff', 641),
(647, 'Cours Découverte', '2023-07-18', '2023-07-18', '#e99a53', '#ffffff', 641),
(648, 'Cours Découverte', '2023-07-25', '2023-07-25', '#e99a53', '#ffffff', 641),
(649, 'Cours Découverte', '2023-08-01', '2023-08-01', '#e99a53', '#ffffff', 641),
(650, 'Cours Découverte', '2023-08-08', '2023-08-08', '#e99a53', '#ffffff', 641),
(651, 'Cours Découverte', '2023-08-15', '2023-08-15', '#e99a53', '#ffffff', 641),
(652, 'Cours Découverte', '2023-08-22', '2023-08-22', '#e99a53', '#ffffff', 641),
(653, 'Cours Découverte', '2023-08-29', '2023-08-29', '#e99a53', '#ffffff', 641),
(654, 'Cours Découverte', '2023-09-05', '2023-09-05', '#e99a53', '#ffffff', 641),
(655, 'Cours Découverte', '2023-09-12', '2023-09-12', '#e99a53', '#ffffff', 641),
(656, 'Cours Découverte', '2023-09-19', '2023-09-19', '#e99a53', '#ffffff', 641),
(657, 'Cours Découverte', '2023-09-26', '2023-09-26', '#e99a53', '#ffffff', 641),
(658, 'Cours Découverte', '2023-10-03', '2023-10-03', '#e99a53', '#ffffff', 641),
(659, 'Cours Découverte', '2023-10-10', '2023-10-10', '#e99a53', '#ffffff', 641),
(660, 'Cours Découverte', '2023-10-17', '2023-10-17', '#e99a53', '#ffffff', 641),
(661, 'Cours Découverte', '2023-10-24', '2023-10-24', '#e99a53', '#ffffff', 641),
(662, 'Cours Découverte', '2023-10-31', '2023-10-31', '#e99a53', '#ffffff', 641),
(663, 'Cours Découverte', '2023-11-07', '2023-11-07', '#e99a53', '#ffffff', 641),
(664, 'Cours Découverte', '2023-11-14', '2023-11-14', '#e99a53', '#ffffff', 641),
(665, 'Cours Découverte', '2023-11-21', '2023-11-21', '#e99a53', '#ffffff', 641),
(666, 'Cours Découverte', '2023-11-28', '2023-11-28', '#e99a53', '#ffffff', 641),
(667, 'Cours Découverte', '2023-12-05', '2023-12-05', '#e99a53', '#ffffff', 641),
(668, 'Cours Découverte', '2023-12-12', '2023-12-12', '#e99a53', '#ffffff', 641),
(669, 'Cours Découverte', '2023-12-19', '2023-12-19', '#e99a53', '#ffffff', 641),
(670, 'Cours Découverte', '2023-12-26', '2023-12-26', '#e99a53', '#ffffff', 641),
(671, 'Cours Découverte', '2024-01-02', '2024-01-02', '#e99a53', '#ffffff', 641),
(672, 'Cours Découverte', '2024-01-09', '2024-01-09', '#e99a53', '#ffffff', 641),
(673, 'Cours Découverte', '2024-01-16', '2024-01-16', '#e99a53', '#ffffff', 641);

-- --------------------------------------------------------

--
-- Table structure for table `inscription`
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
-- Dumping data for table `inscription`
--

INSERT INTO `inscription` (`ID_Inscription`, `annee`, `CotisationFFE`, `CotisationCentre`, `ID_Personne`, `actif`) VALUES
(1, '2022-12-10', 23, 21, 1075, 1),
(2, '2022-12-17', 43, 11, 1074, 1),
(3, '2023-02-10', 2000, 200, 1077, 1),
(4, '2031-06-02', 2000, 200, 1078, 1),
(5, '2023-03-03', 123, 122, 1097, 1),
(6, '2023-04-12', 332, 223, 1103, 0),
(7, '2023-04-12', 500, 100, 1101, 1),
(8, '2023-05-10', 232332, 1212, 1103, 1),
(9, '2023-05-07', 100000, 1212, 1104, 1);

-- --------------------------------------------------------

--
-- Table structure for table `inscription_cours`
--

CREATE TABLE `inscription_cours` (
  `idP` int(11) NOT NULL,
  `idC` int(11) NOT NULL,
  `presence` tinyint(1) NOT NULL,
  `idRecurrence` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inscription_cours`
--

INSERT INTO `inscription_cours` (`idP`, `idC`, `presence`, `idRecurrence`) VALUES
(1101, 603, 1, 603),
(1101, 604, 1, 603),
(1101, 605, 1, 603),
(1101, 606, 1, 603),
(1101, 607, 1, 603),
(1101, 608, 1, 603),
(1101, 609, 1, 603),
(1101, 610, 1, 603),
(1101, 611, 1, 603),
(1101, 612, 1, 603),
(1101, 613, 1, 603),
(1101, 614, 1, 603),
(1101, 615, 1, 603);

-- --------------------------------------------------------

--
-- Table structure for table `pension`
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
-- Dumping data for table `pension`
--

INSERT INTO `pension` (`ID_Pension`, `ID_TP`, `ID_Tarif`, `ID_Cheval`, `dateDebut`, `dateFin`, `actif`) VALUES
(35, 3, 6, 12, '2023-03-28', '2023-04-09', 0),
(36, 1, 2, 13, '2023-04-08', '2023-04-27', 0),
(37, 3, 6, 14, '2023-04-13', '2023-04-20', 0),
(38, 2, 6, 12, '2023-04-08', '2023-04-29', 0),
(39, 1, 5, 14, '2023-05-30', '2023-07-01', 0),
(40, 2, 6, 13, '2023-05-05', '2023-06-02', 0),
(41, 1, 12, 14, '2023-05-17', '2023-06-02', 0),
(42, 3, 6, 12, '2023-05-03', '2023-05-18', 0),
(43, 1, 12, 13, '2023-05-31', '2023-06-01', 0),
(44, 3, 12, 13, '2023-05-02', '2023-05-25', 0),
(45, 3, 12, 13, '2023-05-02', '2023-05-25', 0),
(46, 3, 12, 13, '2023-05-02', '2023-05-25', 0),
(47, 2, 2, 12, '2023-05-03', '2023-06-01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `personne`
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
-- Dumping data for table `personne`
--

INSERT INTO `personne` (`idPersonne`, `nom`, `prenom`, `dateNaissance`, `mail`, `telephone`, `photo`, `niveauGalop`, `numeroLicence`, `rue`, `complementAdresse`, `codePostal`, `ville`, `ID_Responsable`, `actif`, `mdp`, `admin`) VALUES
(1101, 'Samys', 'Scooby', '1998-01-08', 'user', '0663727273', '641f42d57fac02.18828704.png', 3, 'AAADE335', NULL, NULL, NULL, NULL, NULL, 1, 'a', 0),
(1103, 'Hochard', 'Lucas', '1993-02-26', 'user2', '0637727217', '642e8c8c421240.53918184.png', 4, 'ASEDI321', NULL, NULL, NULL, NULL, NULL, 1, 'a', 0),
(1104, 'Diazz', 'Poxy', '2023-03-12', 'admin', '0637288212', '6421b5ee43eb13.32421152.png', 2, 'AAADE335', NULL, NULL, NULL, NULL, NULL, 1, 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `robe`
--

CREATE TABLE `robe` (
  `ID_Robe` int(11) NOT NULL,
  `libelleRobe` varchar(255) DEFAULT NULL,
  `actif` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `robe`
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
-- Table structure for table `signe`
--

CREATE TABLE `signe` (
  `ID_Pension` int(11) NOT NULL,
  `ID_Personne` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `signe`
--

INSERT INTO `signe` (`ID_Pension`, `ID_Personne`) VALUES
(42, 1104),
(46, 1104),
(47, 1101);

-- --------------------------------------------------------

--
-- Table structure for table `tarif`
--

CREATE TABLE `tarif` (
  `ID_Tarif` int(11) NOT NULL,
  `libelleTarif` varchar(255) DEFAULT NULL,
  `prixMois` float DEFAULT NULL,
  `actif` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tarif`
--

INSERT INTO `tarif` (`ID_Tarif`, `libelleTarif`, `prixMois`, `actif`) VALUES
(2, 'Classiques', 2021, 1),
(5, 'Classique +', 49, 1),
(6, 'VIP +', 70, 1),
(7, 'Ultimate +', 222, 1),
(8, 'Ultra Premium', 400, 0),
(9, 'Eco +', NULL, 0),
(10, '5', NULL, 0),
(11, 'Eco +', 5, 0),
(12, 'test', 112, 1);

-- --------------------------------------------------------

--
-- Table structure for table `typepension`
--

CREATE TABLE `typepension` (
  `ID_TP` int(11) NOT NULL,
  `libelle_TP` varchar(255) DEFAULT NULL,
  `actif` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `typepension`
--

INSERT INTO `typepension` (`ID_TP`, `libelle_TP`, `actif`) VALUES
(1, 'Demi Pension', 1),
(2, 'Pension complète', 1),
(3, 'Pension Triple', 1),
(4, 'Croissant', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cheval`
--
ALTER TABLE `cheval`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ID_Robe` (`idRobe`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_recurrence` (`idRecurrence`);

--
-- Indexes for table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`ID_Inscription`),
  ADD KEY `ID_Personne` (`ID_Personne`);

--
-- Indexes for table `inscription_cours`
--
ALTER TABLE `inscription_cours`
  ADD PRIMARY KEY (`idP`,`idC`),
  ADD KEY `id_cours` (`idC`),
  ADD KEY `id_personne` (`idP`,`idC`),
  ADD KEY `idRecurrence` (`idRecurrence`);

--
-- Indexes for table `pension`
--
ALTER TABLE `pension`
  ADD PRIMARY KEY (`ID_Pension`),
  ADD KEY `ID_Cheval` (`ID_Cheval`),
  ADD KEY `ID_TP` (`ID_TP`),
  ADD KEY `ID_Tarif` (`ID_Tarif`,`ID_Cheval`);

--
-- Indexes for table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`idPersonne`);

--
-- Indexes for table `robe`
--
ALTER TABLE `robe`
  ADD PRIMARY KEY (`ID_Robe`);

--
-- Indexes for table `signe`
--
ALTER TABLE `signe`
  ADD PRIMARY KEY (`ID_Pension`,`ID_Personne`),
  ADD KEY `ID_Pension` (`ID_Pension`),
  ADD KEY `ID_Personne` (`ID_Personne`);

--
-- Indexes for table `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`ID_Tarif`);

--
-- Indexes for table `typepension`
--
ALTER TABLE `typepension`
  ADD PRIMARY KEY (`ID_TP`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cheval`
--
ALTER TABLE `cheval`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=674;

--
-- AUTO_INCREMENT for table `inscription`
--
ALTER TABLE `inscription`
  MODIFY `ID_Inscription` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pension`
--
ALTER TABLE `pension`
  MODIFY `ID_Pension` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `personne`
--
ALTER TABLE `personne`
  MODIFY `idPersonne` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1105;

--
-- AUTO_INCREMENT for table `robe`
--
ALTER TABLE `robe`
  MODIFY `ID_Robe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tarif`
--
ALTER TABLE `tarif`
  MODIFY `ID_Tarif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `typepension`
--
ALTER TABLE `typepension`
  MODIFY `ID_TP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cheval`
--
ALTER TABLE `cheval`
  ADD CONSTRAINT `cheval_ibfk_1` FOREIGN KEY (`idRobe`) REFERENCES `robe` (`ID_Robe`);

--
-- Constraints for table `inscription`
--
ALTER TABLE `inscription`
  ADD CONSTRAINT `inscription_ibfk_1` FOREIGN KEY (`ID_Personne`) REFERENCES `personne` (`idPersonne`);

--
-- Constraints for table `inscription_cours`
--
ALTER TABLE `inscription_cours`
  ADD CONSTRAINT `inscription_cours_ibfk_1` FOREIGN KEY (`idC`) REFERENCES `events` (`id`),
  ADD CONSTRAINT `inscription_cours_ibfk_2` FOREIGN KEY (`idP`) REFERENCES `personne` (`idPersonne`),
  ADD CONSTRAINT `inscription_cours_ibfk_3` FOREIGN KEY (`idRecurrence`) REFERENCES `events` (`idRecurrence`);

--
-- Constraints for table `pension`
--
ALTER TABLE `pension`
  ADD CONSTRAINT `pension_ibfk_1` FOREIGN KEY (`ID_Cheval`) REFERENCES `cheval` (`id`),
  ADD CONSTRAINT `pension_ibfk_2` FOREIGN KEY (`ID_Tarif`) REFERENCES `tarif` (`ID_Tarif`),
  ADD CONSTRAINT `pension_ibfk_3` FOREIGN KEY (`ID_TP`) REFERENCES `typepension` (`ID_TP`);

--
-- Constraints for table `signe`
--
ALTER TABLE `signe`
  ADD CONSTRAINT `signe_ibfk_1` FOREIGN KEY (`ID_Pension`) REFERENCES `pension` (`ID_Pension`),
  ADD CONSTRAINT `signe_ibfk_2` FOREIGN KEY (`ID_Personne`) REFERENCES `personne` (`idPersonne`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
