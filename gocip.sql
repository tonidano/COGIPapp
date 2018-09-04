-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 04 sep. 2018 à 09:19
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gocip`
--

-- --------------------------------------------------------

--
-- Structure de la table `annuaire`
--

DROP TABLE IF EXISTS `annuaire`;
CREATE TABLE IF NOT EXISTS `annuaire` (
  `idannuaire` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `telephone` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  PRIMARY KEY (`idannuaire`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `annuaire`
--

INSERT INTO `annuaire` (`idannuaire`, `nom`, `prenom`, `telephone`, `email`) VALUES
(1, 'kulasec', 'Jean', 496406705, 'Jean.kulasec@hotmail.com'),
(2, 'Afritt', 'Barack ', 488964212, 'Barack.Afritt@hotmail.com'),
(3, 'Horris', 'Clint', 45676896, 'Clint.horris@gmail.com'),
(4, 'Houinkca', 'Cécile', 4797984, 'Cécil.houinkca@gmail.com'),
(5, 'Léssin-Halerre', 'Ella', 45472269, 'Ella.léssin.halerre@gmail.com'),
(6, 'Touille', 'Sacha', 42471086, 'Sacha.Touille@gmail.com'),
(7, 'kivala', 'Ela', 43272836, 'Ela.kivala@gmail.com'),
(8, 'Provist', 'Alain', 48877306, 'Alain.provist@gmail.com'),
(9, 'Cho', 'Jay', 48877306, 'Jay.cho@gmail.com'),
(10, 'kapÃ©', 'Andy', 4373860, 'Andy.caper@gmail.com'),
(12, 'Delmarmole', 'Christiane', 456789123, 'del@kk.com');

-- --------------------------------------------------------

--
-- Structure de la table `annuaire_has_societes`
--

DROP TABLE IF EXISTS `annuaire_has_societes`;
CREATE TABLE IF NOT EXISTS `annuaire_has_societes` (
  `annuaire_idannuaire` int(10) UNSIGNED NOT NULL,
  `societes_idsocietes` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`annuaire_idannuaire`,`societes_idsocietes`),
  KEY `fk_annuaire_has_societes_societes1_idx` (`societes_idsocietes`),
  KEY `fk_annuaire_has_societes_annuaire1_idx` (`annuaire_idannuaire`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `annuaire_has_societes`
--

INSERT INTO `annuaire_has_societes` (`annuaire_idannuaire`, `societes_idsocietes`) VALUES
(7, 1),
(10, 2),
(6, 3),
(5, 4),
(3, 5),
(2, 6),
(9, 7),
(4, 8),
(1, 9),
(8, 10);

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

DROP TABLE IF EXISTS `facture`;
CREATE TABLE IF NOT EXISTS `facture` (
  `idfacture` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `numero` int(11) NOT NULL,
  `date_facture` date NOT NULL,
  `motif_prestation` varchar(45) NOT NULL,
  `societes_idsocietes` int(10) UNSIGNED NOT NULL,
  `annuaire_idannuaire` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`idfacture`),
  KEY `fk_facture_societes1_idx` (`societes_idsocietes`),
  KEY `fk_facture_annuaire1_idx` (`annuaire_idannuaire`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `facture`
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
-- Structure de la table `societes`
--

DROP TABLE IF EXISTS `societes`;
CREATE TABLE IF NOT EXISTS `societes` (
  `idsocietes` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom_societe` varchar(45) NOT NULL,
  `adresse` varchar(60) NOT NULL,
  `pays` varchar(45) NOT NULL,
  `telephone_societe` bigint(18) NOT NULL,
  `num_tva` bigint(18) UNSIGNED NOT NULL,
  `type_idtype` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`idsocietes`),
  KEY `fk_societes_type1_idx` (`type_idtype`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `societes`
--

INSERT INTO `societes` (`idsocietes`, `nom_societe`, `adresse`, `pays`, `telephone_societe`, `num_tva`, `type_idtype`) VALUES
(1, 'Banana Moule', 'Rue des Mauvais-Garçons 69, 3615 PoileSurViroin', 'Belgique', 422731789, 8000000003, 2),
(2, 'Kot Kot Kot', 'Champs Elysee 09, 75000 Paris', 'France', 4447190000, 909444090, 2),
(3, 'P. En Lère', 'Chemin de Lanusse 01, 31200 Toulouse', 'France', 30303030303, 333033303, 1),
(4, 'Ponet Academie', 'Avenue du Brise lame 38, 3615 Outsiplou', 'Belgique', 6969696969, 422731789, 2),
(5, 'Rowenta', 'Boulvard du Bon Air 23, 2124320 Guangzhou', 'Chine', 100010101, 233222333223, 1),
(6, 'Telecon', 'Rue des charmes 23, 76533 Paris', 'France', 2346895380, 5353853773, 1),
(7, 'Ko Chonet', 'Rue de la truie qui file 08, 72100 Le Mans', 'France', 6868686868, 468287878, 2),
(8, 'Anchois chez moi', 'Rue du cul du putois 03, 39230 Mantry', 'France', 37303730373, 730707073, 1),
(9, 'Lucie-Fer', 'Rue de l’enfer 666, 63450 Saint-Saturnin', 'France', 666666666, 136667777777, 1),
(10, 'Boule d\'or', 'Rue des Deux-Boules 08, 75000 Paris', 'France', 8800880000, 380000380, 2),
(11, 'Huileagency', 'rue x à y', 'Belgique', 478797574, 2356478, 0);

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `idtype` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` varchar(45) NOT NULL,
  PRIMARY KEY (`idtype`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`idtype`, `type`) VALUES
(1, 'fournisseur'),
(2, 'client');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(60) NOT NULL,
  `user_type` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `username`, `password`, `user_type`) VALUES
(1, 'J-C', '9770d1c99cd356280d7bb78b97bdbe4bf25ff1da', 'godmode'),
(2, 'Mumu', 'f2ff241eac83db641cadb1c8af3b0d8ca9fa7160', 'modomode');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `annuaire_has_societes`
--
ALTER TABLE `annuaire_has_societes`
  ADD CONSTRAINT `fk_annuaire_has_societes_annuaire1` FOREIGN KEY (`annuaire_idannuaire`) REFERENCES `annuaire` (`idannuaire`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_annuaire_has_societes_societes1` FOREIGN KEY (`societes_idsocietes`) REFERENCES `societes` (`idsocietes`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `facture`
--
ALTER TABLE `facture`
  ADD CONSTRAINT `fk_facture_annuaire1` FOREIGN KEY (`annuaire_idannuaire`) REFERENCES `annuaire` (`idannuaire`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_facture_societes1` FOREIGN KEY (`societes_idsocietes`) REFERENCES `societes` (`idsocietes`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `societes`
--
ALTER TABLE `societes`
  ADD CONSTRAINT `fk_societes_type1` FOREIGN KEY (`type_idtype`) REFERENCES `type` (`idtype`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
