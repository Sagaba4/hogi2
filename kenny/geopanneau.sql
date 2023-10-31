-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 31 oct. 2023 à 14:18
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `geopanneau`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `idCategorie` int(10) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `son` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`idCategorie`, `nom`, `image`, `son`) VALUES
(1, 'STOP', 'dosdane.JPG', 'allebus.MP3'),
(2, 'ALLE BUS', 'allebus.JPG', 'allebus.MP3'),
(3, 'DON DANE', 'dosdane.JPG', 'allebus.MP3'),
(4, 'FEU ROUGE', 'feurouge.JPG', 'allebus.MP3');

-- --------------------------------------------------------

--
-- Structure de la table `coordonne`
--

CREATE TABLE `coordonne` (
  `idLocalisation` int(10) NOT NULL,
  `longitude` varchar(50) DEFAULT NULL,
  `latitude` varchar(50) DEFAULT NULL,
  `idCategorie` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `coordonne`
--

INSERT INTO `coordonne` (`idLocalisation`, `longitude`, `latitude`, `idCategorie`) VALUES
(1, '-3.37', '29.35', 1),
(2, '-2.37', '28.35', 2),
(3, '-3.35', '29.35', 3),
(4, '-3.37', '29.35', 4),
(5, '-3.37', '29.35', 1),
(6, '-3.37', '29.35', 2),
(7, '-3.37', '29.35', 3);

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

CREATE TABLE `menu` (
  `idMenu` int(10) NOT NULL,
  `nomMenu` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `menu`
--

INSERT INTO `menu` (`idMenu`, `nomMenu`) VALUES
(1, 'Geopanneau'),
(2, 'Compte'),
(3, 'Historique'),
(4, 'Logout');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `idUtilisateur` int(10) NOT NULL,
  `login` varchar(50) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `etat` int(1) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telephone` varchar(10) DEFAULT NULL,
  `pwd` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`idUtilisateur`, `login`, `role`, `etat`, `email`, `telephone`, `pwd`) VALUES
(1, 'kevine', 'ADMIN', 1, 'angekevinen@gmail.com', '68639307', '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 'dorine', 'USER', 0, 'dorine@gmail.com', '77664019', '81dc9bdb52d04dc20036dbd8313ed055'),
(3, 'parfait', 'USER', 1, 'parfait@gmail.com', '79996024', '81dc9bdb52d04dc20036dbd8313ed055'),
(4, 'user1', 'USER', 0, 'user1@gmail.com', '68639307', '81dc9bdb52d04dc20036dbd8313ed055'),
(5, 'user7', 'USER', 0, 'user7@gmail.com', '77664019', '827ccb0eea8a706c4c34a16891f84e7b'),
(6, 'kime', 'USER', 0, 'kim@gmail.com', '79001002', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`idCategorie`);

--
-- Index pour la table `coordonne`
--
ALTER TABLE `coordonne`
  ADD PRIMARY KEY (`idLocalisation`),
  ADD KEY `idCategorie` (`idCategorie`);

--
-- Index pour la table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`idMenu`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`idUtilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `idCategorie` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `coordonne`
--
ALTER TABLE `coordonne`
  MODIFY `idLocalisation` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `menu`
--
ALTER TABLE `menu`
  MODIFY `idMenu` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `idUtilisateur` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `coordonne`
--
ALTER TABLE `coordonne`
  ADD CONSTRAINT `coordonne_ibfk_1` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`idCategorie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
