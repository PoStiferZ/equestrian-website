-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 02, 2023 at 07:37 PM
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
(12, 'Hope', '2023-03-10', 222, '64234eb047fe73.81696598.png', 4, 1),
(13, 'Tulip', '2021-04-26', 2332, '642e61a8b66865.01738898.png', 7, 1),
(14, 'Patronus', '2015-11-05', 2335, '642e61c10dd9f4.25829420.png', 7, 1),
(15, 'Test Unitaire', '2023-05-12', 12932, '645164d9874e17.79687570.png', 6, 1);

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
  `title` text NOT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL,
  `color` varchar(191) NOT NULL,
  `text_color` varchar(191) NOT NULL,
  `ID_Recurrence` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `start_event`, `end_event`, `color`, `text_color`, `ID_Recurrence`) VALUES
(63, 'Débutant - Vip +', '2023-03-01 10:15:00', '2023-03-01 12:15:00', '#6056ae', '#ffffff', 63),
(64, 'Débutant - Vip +', '2023-03-08 10:15:00', '2023-03-08 12:15:00', '#6056ae', '#ffffff', 63),
(65, 'Débutant - Vip +', '2023-03-15 10:15:00', '2023-03-15 12:15:00', '#6056ae', '#ffffff', 63),
(66, 'Débutant - Vip +', '2023-03-22 10:15:00', '2023-03-22 12:15:00', '#6056ae', '#ffffff', 63),
(67, 'Débutant - Vip +', '2023-03-29 10:15:00', '2023-03-29 12:15:00', '#6056ae', '#ffffff', 63),
(68, 'Débutant - Vip +', '2023-04-05 10:15:00', '2023-04-05 12:15:00', '#6056ae', '#ffffff', 63),
(69, 'Débutant - Vip +', '2023-04-12 10:15:00', '2023-04-12 12:15:00', '#6056ae', '#ffffff', 63),
(70, 'Débutant - Vip +', '2023-04-19 10:15:00', '2023-04-19 12:15:00', '#6056ae', '#ffffff', 63),
(71, 'Débutant - Vip +', '2023-04-26 10:15:00', '2023-04-26 12:15:00', '#6056ae', '#ffffff', 63),
(72, 'Débutant - Vip +', '2023-05-03 10:15:00', '2023-05-03 12:15:00', '#6056ae', '#ffffff', 63),
(73, 'Débutant - Vip +', '2023-05-10 10:15:00', '2023-05-10 12:15:00', '#6056ae', '#ffffff', 63),
(74, 'Débutant - Vip +', '2023-05-17 10:15:00', '2023-05-17 12:15:00', '#6056ae', '#ffffff', 63),
(75, 'Débutant - Vip +', '2023-05-24 10:15:00', '2023-05-24 12:15:00', '#6056ae', '#ffffff', 63),
(76, 'Débutant - Vip +', '2023-05-31 10:15:00', '2023-05-31 12:15:00', '#6056ae', '#ffffff', 63),
(77, 'Débutant - Vip +', '2023-06-07 10:15:00', '2023-06-07 12:15:00', '#6056ae', '#ffffff', 63),
(78, 'Débutant - Vip +', '2023-06-14 10:15:00', '2023-06-14 12:15:00', '#6056ae', '#ffffff', 63),
(79, 'Débutant - Vip +', '2023-06-21 10:15:00', '2023-06-21 12:15:00', '#6056ae', '#ffffff', 63),
(80, 'Débutant - Vip +', '2023-06-28 10:15:00', '2023-06-28 12:15:00', '#6056ae', '#ffffff', 63),
(81, 'Débutant - Vip +', '2023-07-05 10:15:00', '2023-07-05 12:15:00', '#6056ae', '#ffffff', 63),
(82, 'Débutant - Vip +', '2023-07-12 10:15:00', '2023-07-12 12:15:00', '#6056ae', '#ffffff', 63),
(83, 'Débutant - Vip +', '2023-07-19 10:15:00', '2023-07-19 12:15:00', '#6056ae', '#ffffff', 63),
(84, 'Débutant - Vip +', '2023-07-26 10:15:00', '2023-07-26 12:15:00', '#6056ae', '#ffffff', 63),
(85, 'Débutant - Vip +', '2023-08-02 10:15:00', '2023-08-02 12:15:00', '#6056ae', '#ffffff', 63),
(86, 'Débutant - Vip +', '2023-08-09 10:15:00', '2023-08-09 12:15:00', '#6056ae', '#ffffff', 63),
(87, 'Débutant - Vip +', '2023-08-16 10:15:00', '2023-08-16 12:15:00', '#6056ae', '#ffffff', 63),
(88, 'Expert - Utimate', '2023-03-01 00:00:00', '2023-03-02 00:00:00', '#1e194b', '#ffffff', 88),
(89, 'Expert - Utimate', '2023-03-08 00:00:00', '2023-03-09 00:00:00', '#1e194b', '#ffffff', 88),
(90, 'Expert - Utimate', '2023-03-15 00:00:00', '2023-03-16 00:00:00', '#1e194b', '#ffffff', 88),
(91, 'Expert - Utimate', '2023-03-22 00:00:00', '2023-03-23 00:00:00', '#1e194b', '#ffffff', 88),
(92, 'Expert - Utimate', '2023-03-29 00:00:00', '2023-03-30 00:00:00', '#1e194b', '#ffffff', 88),
(93, 'Expert - Utimate', '2023-04-05 00:00:00', '2023-04-06 00:00:00', '#1e194b', '#ffffff', 88),
(94, 'Expert - Utimate', '2023-04-12 00:00:00', '2023-04-13 00:00:00', '#1e194b', '#ffffff', 88),
(95, 'Expert - Utimate', '2023-04-19 00:00:00', '2023-04-20 00:00:00', '#1e194b', '#ffffff', 88),
(96, 'Expert - Utimate', '2023-04-26 00:00:00', '2023-04-27 00:00:00', '#1e194b', '#ffffff', 88),
(97, 'Cours 3', '2023-04-06 10:00:00', '2023-04-06 15:00:00', '#76e953', '#ffffff', 97),
(98, 'Cours 3', '2023-04-13 10:00:00', '2023-04-13 15:00:00', '#76e953', '#ffffff', 97),
(99, 'Cours 3', '2023-04-20 10:00:00', '2023-04-20 15:00:00', '#76e953', '#ffffff', 97),
(100, 'Cours 3', '2023-04-27 10:00:00', '2023-04-27 15:00:00', '#76e953', '#ffffff', 97),
(101, 'Cours 3', '2023-05-04 10:00:00', '2023-05-04 15:00:00', '#76e953', '#ffffff', 97),
(102, 'Cours 3', '2023-05-11 10:00:00', '2023-05-11 15:00:00', '#76e953', '#ffffff', 97),
(103, 'Cours 3', '2023-05-18 10:00:00', '2023-05-18 15:00:00', '#76e953', '#ffffff', 97),
(104, 'Cours 3', '2023-05-25 10:00:00', '2023-05-25 15:00:00', '#76e953', '#ffffff', 97),
(105, 'Cours 3', '2023-06-01 10:00:00', '2023-06-01 15:00:00', '#76e953', '#ffffff', 97),
(106, 'Cours 3', '2023-06-08 10:00:00', '2023-06-08 15:00:00', '#76e953', '#ffffff', 97),
(107, 'Cours 3', '2023-06-15 10:00:00', '2023-06-15 15:00:00', '#76e953', '#ffffff', 97),
(108, 'Cours 3', '2023-06-22 10:00:00', '2023-06-22 15:00:00', '#76e953', '#ffffff', 97),
(109, 'Cours 3', '2023-06-29 10:00:00', '2023-06-29 15:00:00', '#76e953', '#ffffff', 97),
(110, 'Cours 3', '2023-07-06 10:00:00', '2023-07-06 15:00:00', '#76e953', '#ffffff', 97),
(111, 'Cours 3', '2023-07-13 10:00:00', '2023-07-13 15:00:00', '#76e953', '#ffffff', 97),
(112, 'Cours 3', '2023-07-20 10:00:00', '2023-07-20 15:00:00', '#76e953', '#ffffff', 97),
(113, 'Cours 3', '2023-07-27 10:00:00', '2023-07-27 15:00:00', '#76e953', '#ffffff', 97),
(114, 'Cours 3', '2023-08-03 10:00:00', '2023-08-03 15:00:00', '#76e953', '#ffffff', 97),
(115, 'Cours 3', '2023-08-10 10:00:00', '2023-08-10 15:00:00', '#76e953', '#ffffff', 97),
(116, 'Cours 3', '2023-08-17 10:00:00', '2023-08-17 15:00:00', '#76e953', '#ffffff', 97),
(117, 'Cours 3', '2023-08-24 10:00:00', '2023-08-24 15:00:00', '#76e953', '#ffffff', 97),
(118, 'Cours 3', '2023-08-31 10:00:00', '2023-08-31 15:00:00', '#76e953', '#ffffff', 97),
(119, 'Cours 3', '2023-09-07 10:00:00', '2023-09-07 15:00:00', '#76e953', '#ffffff', 97),
(120, 'Cours 3', '2023-09-14 10:00:00', '2023-09-14 15:00:00', '#76e953', '#ffffff', 97),
(121, 'Cours 3', '2023-09-21 10:00:00', '2023-09-21 15:00:00', '#76e953', '#ffffff', 97),
(122, 'Cours 3', '2023-09-28 10:00:00', '2023-09-28 15:00:00', '#76e953', '#ffffff', 97),
(123, 'Cours 3', '2023-10-05 10:00:00', '2023-10-05 15:00:00', '#76e953', '#ffffff', 97),
(124, 'Cours 3', '2023-10-12 10:00:00', '2023-10-12 15:00:00', '#76e953', '#ffffff', 97),
(125, 'Cours 3', '2023-10-19 10:00:00', '2023-10-19 15:00:00', '#76e953', '#ffffff', 97),
(126, 'Linéraire', '2023-04-25 00:00:00', '2023-04-26 00:00:00', '#6453e9', '#ffffff', 126),
(127, 'Linéraire', '2023-05-02 00:00:00', '2023-05-03 00:00:00', '#6453e9', '#ffffff', 126),
(128, 'Linéraire', '2023-05-09 00:00:00', '2023-05-10 00:00:00', '#6453e9', '#ffffff', 126),
(129, 'Linéraire', '2023-05-16 00:00:00', '2023-05-17 00:00:00', '#6453e9', '#ffffff', 126),
(130, 'Linéraire', '2023-05-23 00:00:00', '2023-05-24 00:00:00', '#6453e9', '#ffffff', 126),
(131, 'Linéraire', '2023-05-30 00:00:00', '2023-05-31 00:00:00', '#6453e9', '#ffffff', 126),
(132, 'Linéraire', '2023-06-06 00:00:00', '2023-06-07 00:00:00', '#6453e9', '#ffffff', 126),
(133, 'Linéraire', '2023-06-13 00:00:00', '2023-06-14 00:00:00', '#6453e9', '#ffffff', 126),
(134, 'Linéraire', '2023-06-20 00:00:00', '2023-06-21 00:00:00', '#6453e9', '#ffffff', 126),
(135, 'Linéraire', '2023-06-27 00:00:00', '2023-06-28 00:00:00', '#6453e9', '#ffffff', 126),
(136, 'Linéraire', '2023-07-04 00:00:00', '2023-07-05 00:00:00', '#6453e9', '#ffffff', 126),
(137, 'Linéraire', '2023-07-11 00:00:00', '2023-07-12 00:00:00', '#6453e9', '#ffffff', 126),
(138, 'Linéraire', '2023-07-18 00:00:00', '2023-07-19 00:00:00', '#6453e9', '#ffffff', 126),
(139, 'Linéraire', '2023-07-25 00:00:00', '2023-07-26 00:00:00', '#6453e9', '#ffffff', 126),
(140, 'Linéraire', '2023-08-01 00:00:00', '2023-08-02 00:00:00', '#6453e9', '#ffffff', 126),
(141, 'Linéraire', '2023-08-08 00:00:00', '2023-08-09 00:00:00', '#6453e9', '#ffffff', 126),
(142, 'Linéraire', '2023-08-15 00:00:00', '2023-08-16 00:00:00', '#6453e9', '#ffffff', 126),
(143, 'Linéraire', '2023-08-22 00:00:00', '2023-08-23 00:00:00', '#6453e9', '#ffffff', 126),
(144, 'Linéraire', '2023-08-29 00:00:00', '2023-08-30 00:00:00', '#6453e9', '#ffffff', 126),
(145, 'Linéraire', '2023-09-05 00:00:00', '2023-09-06 00:00:00', '#6453e9', '#ffffff', 126),
(146, 'Linéraire', '2023-09-12 00:00:00', '2023-09-13 00:00:00', '#6453e9', '#ffffff', 126),
(147, 'Linéraire', '2023-09-19 00:00:00', '2023-09-20 00:00:00', '#6453e9', '#ffffff', 126),
(148, 'Linéraire', '2023-09-26 00:00:00', '2023-09-27 00:00:00', '#6453e9', '#ffffff', 126),
(149, 'Linéraire', '2023-10-03 00:00:00', '2023-10-04 00:00:00', '#6453e9', '#ffffff', 126),
(150, 'Linéraire', '2023-10-10 00:00:00', '2023-10-11 00:00:00', '#6453e9', '#ffffff', 126),
(151, 'Linéraire', '2023-10-17 00:00:00', '2023-10-18 00:00:00', '#6453e9', '#ffffff', 126),
(152, 'Linéraire', '2023-10-24 00:00:00', '2023-10-25 00:00:00', '#6453e9', '#ffffff', 126),
(153, 'Linéraire', '2023-10-31 00:00:00', '2023-11-01 00:00:00', '#6453e9', '#ffffff', 126),
(154, 'Linéraire', '2023-11-07 00:00:00', '2023-11-08 00:00:00', '#6453e9', '#ffffff', 126);

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
(6, '2023-04-12', 332, 223, 1103, 1),
(7, '2023-04-13', 500, 100, 1101, 1);

-- --------------------------------------------------------

--
-- Table structure for table `inscription_cours`
--

CREATE TABLE `inscription_cours` (
  `id_personne` int(11) NOT NULL,
  `id_cours` int(11) NOT NULL,
  `presence` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inscription_cours`
--

INSERT INTO `inscription_cours` (`id_personne`, `id_cours`, `presence`) VALUES
(1101, 63, 1),
(1101, 64, 1),
(1101, 65, 1),
(1101, 66, 1),
(1101, 67, 1),
(1101, 68, 1),
(1101, 69, 1),
(1101, 70, 1),
(1101, 71, 0),
(1101, 72, 0),
(1101, 73, 1),
(1101, 74, 0),
(1101, 75, 1),
(1101, 76, 1),
(1101, 77, 0),
(1101, 78, 1),
(1101, 79, 1),
(1101, 80, 1),
(1101, 81, 0),
(1101, 82, 1),
(1101, 83, 1),
(1101, 84, 1),
(1101, 85, 1),
(1101, 86, 0),
(1101, 87, 0),
(1101, 88, 1),
(1101, 89, 1),
(1101, 90, 1),
(1101, 91, 1),
(1101, 92, 1),
(1101, 93, 1),
(1101, 94, 0),
(1101, 95, 0),
(1101, 96, 1),
(1103, 63, 1),
(1103, 64, 1),
(1103, 65, 1),
(1103, 66, 1),
(1103, 67, 1),
(1103, 68, 1),
(1103, 69, 1),
(1103, 70, 1),
(1103, 71, 1),
(1103, 72, 1),
(1103, 73, 1),
(1103, 74, 1),
(1103, 75, 1),
(1103, 76, 1),
(1103, 77, 1),
(1103, 78, 1),
(1103, 79, 1),
(1103, 80, 1),
(1103, 81, 1),
(1103, 82, 1),
(1103, 83, 1),
(1103, 84, 1),
(1103, 85, 1),
(1103, 86, 1),
(1103, 87, 1),
(1103, 88, 1),
(1103, 89, 1),
(1103, 90, 1),
(1103, 91, 1),
(1103, 92, 1),
(1103, 93, 1),
(1103, 94, 1),
(1103, 95, 1),
(1103, 96, 1),
(1103, 97, 1),
(1103, 98, 0),
(1103, 99, 1),
(1103, 100, 1),
(1103, 101, 1),
(1103, 102, 1),
(1103, 103, 1),
(1103, 104, 1),
(1103, 105, 1),
(1103, 106, 1),
(1103, 107, 1),
(1103, 108, 1),
(1103, 109, 1),
(1103, 110, 1),
(1103, 111, 1),
(1103, 112, 1),
(1103, 113, 1),
(1103, 114, 1),
(1103, 115, 1),
(1103, 116, 1),
(1103, 117, 1),
(1103, 118, 1),
(1103, 119, 1),
(1103, 120, 1),
(1103, 121, 1),
(1103, 122, 1),
(1103, 123, 1),
(1103, 124, 1),
(1103, 125, 1);

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
(35, 3, 6, 12, '2023-03-28', '2023-04-09', 1),
(36, 1, 2, 13, '2023-04-08', '2023-04-27', 1),
(37, 3, 6, 14, '2023-04-13', '2023-04-20', 1),
(38, 2, 6, 12, '2023-04-08', '2023-04-29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `personne`
--

CREATE TABLE `personne` (
  `ID_Personne` int(11) NOT NULL,
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

INSERT INTO `personne` (`ID_Personne`, `nom`, `prenom`, `dateNaissance`, `mail`, `telephone`, `photo`, `niveauGalop`, `numeroLicence`, `rue`, `complementAdresse`, `codePostal`, `ville`, `ID_Responsable`, `actif`, `mdp`, `admin`) VALUES
(1101, 'Samy', 'Scooby', '1998-01-08', 'user', '0663727273', '641f42d57fac02.18828704.png', 3, 'AAADE335', NULL, NULL, NULL, NULL, NULL, 1, 'user', 0),
(1103, 'Hochard', 'Lucas', '1993-02-26', 'lucas@gmail.com', '0637727217', '642e8c8c421240.53918184.png', 4, 'ASEDI321', NULL, NULL, NULL, NULL, NULL, 1, 'user', 0),
(1104, 'Diaz', 'Poxy', '2023-03-12', 'admin', '0637288212', '6421b5ee43eb13.32421152.png', 2, 'AAADE335', NULL, NULL, NULL, NULL, NULL, 1, 'admin', 1);

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
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id_personne`,`id_cours`),
  ADD KEY `id_cours` (`id_cours`),
  ADD KEY `id_personne` (`id_personne`,`id_cours`);

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
  ADD PRIMARY KEY (`ID_Personne`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `inscription`
--
ALTER TABLE `inscription`
  MODIFY `ID_Inscription` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pension`
--
ALTER TABLE `pension`
  MODIFY `ID_Pension` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `personne`
--
ALTER TABLE `personne`
  MODIFY `ID_Personne` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1105;

--
-- AUTO_INCREMENT for table `robe`
--
ALTER TABLE `robe`
  MODIFY `ID_Robe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tarif`
--
ALTER TABLE `tarif`
  MODIFY `ID_Tarif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  ADD CONSTRAINT `inscription_ibfk_1` FOREIGN KEY (`ID_Personne`) REFERENCES `personne` (`ID_Personne`);

--
-- Constraints for table `inscription_cours`
--
ALTER TABLE `inscription_cours`
  ADD CONSTRAINT `inscription_cours_ibfk_1` FOREIGN KEY (`id_cours`) REFERENCES `events` (`id`),
  ADD CONSTRAINT `inscription_cours_ibfk_2` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`ID_Personne`);

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
  ADD CONSTRAINT `signe_ibfk_2` FOREIGN KEY (`ID_Personne`) REFERENCES `personne` (`ID_Personne`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
