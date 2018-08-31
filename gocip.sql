-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 31, 2018 at 10:49 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gocip`
--

-- --------------------------------------------------------

--
-- Table structure for table `annuaire`
--

CREATE TABLE `annuaire` (
  `idannuaire` int(10) UNSIGNED NOT NULL,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `telephone` int(11) NOT NULL,
  `email` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `annuaire`
--

INSERT INTO `annuaire` (`idannuaire`, `nom`, `prenom`, `telephone`, `email`) VALUES
(1, 'kulasec', 'Jean', 496406705, 'Jean.kulasec@hotmail.com'),
(2, 'Afritt', 'Barack ', 488964212, 'Barack.Afritt@hotmail.com'),
(3, 'Horris', 'Clint', 45676896, 'Clint.horris@gmail.com'),
(4, 'Houinkca', 'Cécile', 4797984, 'Cécil.houinkca@gmail.com'),
(5, 'Lésin-Halerre', 'Ella', 45472269, 'Ella.léssin.halerre@gmail.com'),
(6, 'Touille', 'Sacha', 42471086, 'Sacha.Touille@gmail.com'),
(7, 'kivala', 'Ela', 43272836, 'Ela.kivala@gmail.com'),
(8, 'Provist', 'Alain', 48877306, 'Alain.provist@gmail.com'),
(9, 'Cho', 'Jay', 48877306, 'Jay.cho@gmail.com'),
(10, 'kapé', 'Andy', 4373860, 'Andy.caper@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `annuaire_has_societes`
--

CREATE TABLE `annuaire_has_societes` (
  `annuaire_idannuaire` int(10) UNSIGNED NOT NULL,
  `societes_idsocietes` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `annuaire_has_societes`
--

INSERT INTO `annuaire_has_societes` (`annuaire_idannuaire`, `societes_idsocietes`) VALUES
(1, 9),
(2, 6),
(3, 5),
(4, 8),
(5, 4),
(6, 3),
(7, 1),
(8, 10),
(9, 7),
(10, 2);

-- --------------------------------------------------------

--
-- Table structure for table `facture`
--

CREATE TABLE `facture` (
  `idfacture` int(10) UNSIGNED NOT NULL,
  `numero` int(11) NOT NULL,
  `date_facture` date NOT NULL,
  `motif_prestation` varchar(45) NOT NULL,
  `societes_idsocietes` int(10) UNSIGNED NOT NULL,
  `annuaire_idannuaire` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `facture`
--

INSERT INTO `facture` (`idfacture`, `numero`, `date_facture`, `motif_prestation`, `societes_idsocietes`, `annuaire_idannuaire`) VALUES
(1, 1, '2018-03-23', 'chauffage', 9, 1),
(2, 2, '2018-04-18', 'téléphone', 6, 2),
(3, 3, '2018-05-06', 'électricité', 5, 3),
(4, 4, '2018-06-15', 'eau', 8, 4),
(5, 5, '2018-07-23', 'centre équestre', 4, 5),
(6, 6, '2018-08-18', 'gaz', 3, 6),
(7, 7, '2018-08-19', 'Restaurant', 1, 7),
(8, 8, '2018-08-21', 'vente', 10, 8),
(9, 9, '2018-08-23', 'boucherie', 7, 9),
(10, 10, '2018-08-28', 'volailler', 2, 10);

-- --------------------------------------------------------

--
-- Table structure for table `societes`
--

CREATE TABLE `societes` (
  `idsocietes` int(10) UNSIGNED NOT NULL,
  `nom_societe` varchar(45) NOT NULL,
  `adresse` varchar(45) NOT NULL,
  `pays` varchar(45) NOT NULL,
  `telephone_societe` bigint(18) NOT NULL,
  `num_tva` bigint(18) NOT NULL,
  `type_idtype` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `societes`
--

INSERT INTO `societes` (`idsocietes`, `nom_societe`, `adresse`, `pays`, `telephone_societe`, `num_tva`, `type_idtype`) VALUES
(1, 'Banana Moule', 'Rue des Mauvais-Garçons 69, 3615 PoileSurVir', 'Belgique', 422731789, 2147483647, 2),
(2, 'Kot Kot Kot', 'Champs Elysee 09, 75000 Paris', 'France', 2147483647, 909444090, 2),
(3, 'P. En Lère', 'Chemin de Lanusse 01, 31200 Toulouse', 'France', 2147483647, 333033303, 1),
(4, 'Ponet Academie', 'Avenue du Brise lame 38, 3615 Outsiplou', 'Belgique', 2147483647, 422731789, 2),
(5, 'Rowenta', 'Boulvard du Bon Air 23, 2124320 Guangzhou', 'Chine', 100010101, 2147483647, 1),
(6, 'Telecon', 'Rue des charmes 23, 76533 Paris', 'France', 2147483647, 2147483647, 1),
(7, 'Ko Chonet', 'Rue de la truie qui file 08, 72100 Le Mans', 'France', 2147483647, 468287878, 2),
(8, 'Anchois chez moi', 'Rue du cul du putois 03, 39230 Mantry', 'France', 2147483647, 730707073, 1),
(9, 'Lucie-Fer', 'Rue de l\'enfer 777, 63450 Saint-Saturnin', 'France', 666666666, 2147483647, 1),
(10, 'Boule d\'or', 'Rue des Deux-Boules 08, 75000 Paris', 'France', 2147483647, 380000380, 2);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `idtype` int(10) UNSIGNED NOT NULL,
  `type` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`idtype`, `type`) VALUES
(1, 'fournisseur'),
(2, 'client');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `annuaire`
--
ALTER TABLE `annuaire`
  ADD PRIMARY KEY (`idannuaire`);

--
-- Indexes for table `annuaire_has_societes`
--
ALTER TABLE `annuaire_has_societes`
  ADD PRIMARY KEY (`annuaire_idannuaire`,`societes_idsocietes`),
  ADD KEY `fk_annuaire_has_societes_societes1_idx` (`societes_idsocietes`),
  ADD KEY `fk_annuaire_has_societes_annuaire1_idx` (`annuaire_idannuaire`);

--
-- Indexes for table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`idfacture`),
  ADD KEY `fk_facture_societes1_idx` (`societes_idsocietes`),
  ADD KEY `fk_facture_annuaire1_idx` (`annuaire_idannuaire`);

--
-- Indexes for table `societes`
--
ALTER TABLE `societes`
  ADD PRIMARY KEY (`idsocietes`),
  ADD KEY `fk_societes_type1_idx` (`type_idtype`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`idtype`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `annuaire`
--
ALTER TABLE `annuaire`
  MODIFY `idannuaire` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `facture`
--
ALTER TABLE `facture`
  MODIFY `idfacture` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `societes`
--
ALTER TABLE `societes`
  MODIFY `idsocietes` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `idtype` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `annuaire_has_societes`
--
ALTER TABLE `annuaire_has_societes`
  ADD CONSTRAINT `fk_annuaire_has_societes_annuaire1` FOREIGN KEY (`annuaire_idannuaire`) REFERENCES `annuaire` (`idannuaire`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_annuaire_has_societes_societes1` FOREIGN KEY (`societes_idsocietes`) REFERENCES `societes` (`idsocietes`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `facture`
--
ALTER TABLE `facture`
  ADD CONSTRAINT `fk_facture_annuaire1` FOREIGN KEY (`annuaire_idannuaire`) REFERENCES `annuaire` (`idannuaire`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_facture_societes1` FOREIGN KEY (`societes_idsocietes`) REFERENCES `societes` (`idsocietes`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `societes`
--
ALTER TABLE `societes`
  ADD CONSTRAINT `fk_societes_type1` FOREIGN KEY (`type_idtype`) REFERENCES `type` (`idtype`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
