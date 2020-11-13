-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Dim 01 Novembre 2020 à 16:06
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `pweb_projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `Id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `mdp` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `entreprise`
--

INSERT INTO `entreprise` (`Id`, `nom`, `mdp`, `email`) VALUES
(1, 'root', 'root', 'root');

-- --------------------------------------------------------

--
-- Structure de la table `facturation`
--

CREATE TABLE `facturation` (
  `ID` int(11) NOT NULL,
  `ide` int(11) NOT NULL,
  `idv` int(11) NOT NULL,
  `dateD` date NOT NULL,
  `dateF` date NOT NULL,
  `valeur` int(11) NOT NULL,
  `etat` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

CREATE TABLE `vehicule` (
  `ID` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `caract` varchar(255) DEFAULT NULL,
  `location` varchar(30) NOT NULL,
  `photo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `facturation`
--
ALTER TABLE `facturation`
  ADD PRIMARY KEY (`ID`,`ide`,`idv`),
  ADD KEY `ide` (`ide`,`idv`),
  ADD KEY `FK_Vehicule_Facturation` (`idv`);

--
-- Index pour la table `vehicule`
--
ALTER TABLE `vehicule`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `facturation`
--
ALTER TABLE `facturation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `vehicule`
--
ALTER TABLE `vehicule`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `facturation`
--
ALTER TABLE `facturation`
  ADD CONSTRAINT `FK_Entreprise_Facturation` FOREIGN KEY (`ide`) REFERENCES `entreprise` (`Id`),
  ADD CONSTRAINT `FK_Vehicule_Facturation` FOREIGN KEY (`idv`) REFERENCES `vehicule` (`ID`);
  
  
  ALTER TABLE `facturation` DROP FOREIGN KEY `FK_Entreprise_Facturation`; ALTER TABLE `facturation` ADD CONSTRAINT `FK_Entreprise_Facturation` FOREIGN KEY (`ide`) REFERENCES `entreprise`(`Id`) ON DELETE CASCADE ON UPDATE RESTRICT; ALTER TABLE `facturation` DROP FOREIGN KEY `FK_Vehicule_Facturation`; ALTER TABLE `facturation` ADD CONSTRAINT `FK_Vehicule_Facturation` FOREIGN KEY (`idv`) REFERENCES `vehicule`(`ID`) ON DELETE CASCADE ON UPDATE RESTRICT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
