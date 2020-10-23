-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 22-Out-2020 às 13:01
-- Versão do servidor: 10.4.10-MariaDB
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdfilms`
--
CREATE DATABASE IF NOT EXISTS `bdfilms` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `bdfilms`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `film`
--

DROP TABLE IF EXISTS `film`;
CREATE TABLE IF NOT EXISTS `film` (
  `PK_ID_Film` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `prix` float NOT NULL,
  `categorie` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `realisateur` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `pochette` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`PK_ID_Film`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `film`
--

INSERT INTO `film` (`PK_ID_Film`, `titre`, `prix`, `categorie`, `realisateur`, `description`, `pochette`) VALUES
(28, 'Teste data film', 3, 'Romance', 'AAAAAA', 'eeeeeeeeee', NULL),
(29, 'Teste data film', 3, 'Romance', 'AAAAAA', 'dvvsdvadsvb', NULL),
(30, 'casa', 6, 'Romance', 'yjyj', 'rtttttttttttttttttttt', NULL),
(31, 'Rambo', 8, 'Action', 'Rambo', 'Rambo', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `film_location`
--

DROP TABLE IF EXISTS `film_location`;
CREATE TABLE IF NOT EXISTS `film_location` (
  `PK_ID_Film` int(11) NOT NULL,
  `PK_ID_Location` int(11) NOT NULL,
  KEY `PK_ID_Film` (`PK_ID_Film`),
  KEY `PK_ID_Location` (`PK_ID_Location`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `film_location`
--

INSERT INTO `film_location` (`PK_ID_Film`, `PK_ID_Location`) VALUES
(1, 1),
(1, 7),
(2, 3),
(2, 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `location`
--

DROP TABLE IF EXISTS `location`;
CREATE TABLE IF NOT EXISTS `location` (
  `PK_ID_Location` int(11) NOT NULL AUTO_INCREMENT,
  `dateDebut` date DEFAULT NULL,
  `dateFin` date DEFAULT NULL,
  `PK_ID_Membre` int(11) NOT NULL,
  PRIMARY KEY (`PK_ID_Location`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `location`
--

INSERT INTO `location` (`PK_ID_Location`, `dateDebut`, `dateFin`, `PK_ID_Membre`) VALUES
(2, '2020-10-20', '2020-10-20', 1),
(4, '2020-10-20', '2020-10-20', 2),
(5, '2020-10-20', '2020-10-20', 2),
(7, '2020-10-20', '2020-10-20', 2),
(8, '2020-10-20', '2020-10-20', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `membre`
--

DROP TABLE IF EXISTS `membre`;
CREATE TABLE IF NOT EXISTS `membre` (
  `PK_ID_Membre` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `profil` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `courriel` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `tel_membre` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `MDP_membre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`PK_ID_Membre`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `membre`
--

INSERT INTO `membre` (`PK_ID_Membre`, `nom`, `prenom`, `profil`, `courriel`, `tel_membre`, `MDP_membre`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@gmail.com', '5145466655', '1234'),
(2, 'Tavares', 'Antonio', 'membre', 'membre@gmail.com', '5148840478', '1234'),
(3, 'Racine', 'Janie', 'membre', 'janie@gmail.com', '5148848459', '1234'),
(50, 'Janie ', 'Racine', 'membre', 'j@gmail.com', '5145457788', '1234'),
(51, 'Santos', 'Luis', 'membre', 'tennis.bresil@gmail.com', '5145460521', '5555');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
