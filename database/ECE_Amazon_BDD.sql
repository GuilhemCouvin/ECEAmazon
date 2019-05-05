-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 29 avr. 2019 à 13:06
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ece_amazon`
--

-- --------------------------------------------------------

--
-- Structure de la table `acheteur`
--

DROP TABLE IF EXISTS `acheteur`;
CREATE TABLE IF NOT EXISTS `acheteur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `nom`varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `profil` varchar(50) NOT NULL DEFAULT 'ece.jpg',
  `couverture` varchar(50) NOT NULL DEFAULT 'ece.jpg',
  `trn_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`,`username`)
) ENGINE=innoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `acheteur`
--

DROP TABLE IF EXISTS `vendeur`;
CREATE TABLE IF NOT EXISTS `vendeur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `profil` varchar(50) NOT NULL DEFAULT 'ece.jpg',
  `couverture` varchar(50) NOT NULL DEFAULT 'ece.jpg',
  `trn_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`,`username`)
) ENGINE=innoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vendeur`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `profil` varchar(50) NOT NULL DEFAULT 'ece.jpg',
  `couverture` varchar(50) NOT NULL DEFAULT 'ece.jpg',
  `trn_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`,`username`)
) ENGINE=innoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `id_vendeur` varchar(50) NOT NULL,
  `categorie` varchar(50) NOT NULL,
  `taille` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `photo` varchar(50) NOT NULL DEFAULT 'ece.jpg',
  `trn_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=innoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit`
--

DROP TABLE IF EXISTS `produit_stock`;
CREATE TABLE IF NOT EXISTS `produit_stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `id_vendeur` varchar(50) NOT NULL,
  `categorie` varchar(50) NOT NULL,
  `taille` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `photo` varchar(50) NOT NULL DEFAULT 'ece.jpg',
  `trn_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=innoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `stock_produit`
--

DROP TABLE IF EXISTS `produit_vendu`;
CREATE TABLE IF NOT EXISTS `produit_vendu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `id_vendeur` varchar(50) NOT NULL,
  `id_acheteur` varchar(50) NOT NULL,
  `categorie` varchar(50) NOT NULL,
  `taille` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `photo` varchar(50) NOT NULL DEFAULT 'ece.jpg',
  `trn_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=innoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit_vendu`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `id_produit` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `id_vendeur` varchar(50) NOT NULL,
  `id_acheteur` varchar(50) NOT NULL,
  `categorie` varchar(50) NOT NULL,
  `taille` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `photo` varchar(50) NOT NULL DEFAULT 'ece.jpg',
  `trn_date` datetime NOT NULL
) ENGINE=innoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `panier`
--

DROP TABLE IF EXISTS `produit_vente_flash`;
CREATE TABLE IF NOT EXISTS `produit_vente_flash` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `id_vendeur` varchar(50) NOT NULL,
  `categorie` varchar(50) NOT NULL,
  `taille` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `photo` varchar(50) NOT NULL DEFAULT 'ece.jpg',
  `trn_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=innoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vente_flash`
--

DROP TABLE IF EXISTS `cb`;
CREATE TABLE IF NOT EXISTS `cb` (
  `numero` varchar(50) NOT NULL,
  `mois` varchar(50) NOT NULL,
  `annee` varchar(50) NOT NULL,
  `codeS` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cb`
--

INSERT INTO `cb` (`numero`, `mois`, `annee`, `codeS`) VALUES
('abeac07d3c28c1bef9e730002c753ed4', 'c20ad4d76fe97759aa27a0c99bff6710', '7b7a53e239400a13bd6be6c91c4f6c4e', '202cb962ac59075b964b07152d234b70');

INSERT INTO `cb` (`numero`, `mois`, `annee`, `codeS`) VALUES
('9d299b6a4b2b1cdcf8bc4e7dd7e050fb', '96a3be3cf272e017046d1b2674a52bd3', '7b7a53e239400a13bd6be6c91c4f6c4e', 'caf1a3dfb505ffed0d024130f58c5cfa');


INSERT INTO `admin` (`id`, `username`, `email`, `password`, `nom`, `prenom`, `profil`, `couverture`, `trn_date`) 
VALUES (1,'adminGC','admin1@gmail.com','81dc9bdb52d04dc20036dbd8313ed055','Couvin','Guilhem','','','2019-04-29 12:07:52');

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `nom`, `prenom`, `profil`, `couverture`, `trn_date`) 
VALUES (2,'adminAD','admin2@gmail.com','81dc9bdb52d04dc20036dbd8313ed055','Daubignard','Adrien','','','2019-04-29 12:07:52');


INSERT INTO `acheteur` (`id`, `username`, `email`, `password`, `nom`, `prenom`, `adresse`, `profil`, `couverture`, `trn_date`) VALUES
(1, 'GuilhemC', 'guilhemc75@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Couvin', 'Guilhem', '37 quai de Grenelle 75015 Paris', '', '', '2019-04-29 12:07:52');

INSERT INTO `acheteur` (`id`, `username`, `email`, `password`, `nom`, `prenom`, `adresse`, `profil`, `couverture`, `trn_date`) VALUES
(2, 'AdrienD', 'adrien.daubignard@edu.ece.fr', '81dc9bdb52d04dc20036dbd8313ed055', 'Daubignard', 'Adrien', '37 quai de Grenelle 75015 Paris', '', '', '2019-04-29 12:07:52');



INSERT INTO `vendeur` (`id`, `username`, `email`, `password`, `adresse`, `profil`, `couverture`, `trn_date`) VALUES
(1, 'Uniqlo', 'uniqlo@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '10 rue de Rennes Paris 75006', '', '', '2019-04-29 12:07:52');

INSERT INTO `vendeur` (`id`, `username`, `email`, `password`, `adresse`, `profil`, `couverture`, `trn_date`) VALUES
(2, 'Fnac', 'fnac@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '10 rue de Rennes Paris 75006', '', '', '2019-04-29 12:07:52');

INSERT INTO `vendeur` (`id`, `username`, `email`, `password`, `adresse`, `profil`, `couverture`, `trn_date`) VALUES
(3, 'Décathlon', 'dacathlon@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '12 rue de Rennes Paris 75006', '', '', '2019-04-29 12:07:52');



INSERT INTO `produit` (`id`, `name`, `price`, `id_vendeur`, `categorie`, `taille`, `description`, `genre`, `photo`,`trn_date`) VALUES
(8, 'Tshirt blanc', '24,99', '1', 'Vetements','M', 'tshirt 100% coton made in Népal', 'Homme', 'blanc.jpg', '2019-04-29 12:07:52');

INSERT INTO `produit` (`id`, `name`, `price`, `id_vendeur`, `categorie`, `taille`, `description`, `genre`, `photo`,`trn_date`) VALUES
(1, 'Tshirt rouge', '24,99', '1', 'Vetements','S', 'tshirt 100% coton made in Népal', 'Femme', 'rouge.jpg', '2019-04-29 12:07:52');

INSERT INTO `produit` (`id`, `name`, `price`, `id_vendeur`, `categorie`, `taille`, `description`, `genre`, `photo`,`trn_date`) VALUES
(2, 'Game of Thrones Tome 1', '9,99', '2', 'Livres','ND', 'Livre Game of Trones Tome 1 format Poche', 'ND', 'got1.jpg', '2019-04-29 12:07:52');

INSERT INTO `produit` (`id`, `name`, `price`, `id_vendeur`, `categorie`, `taille`, `description`, `genre`, `photo`,`trn_date`) VALUES
(3, 'Game of Thrones Tome 2', '9,99', '2', 'Livres','ND', 'Livre Game of Trones Tome 2 format Poche', 'ND', 'got2.jpg', '2019-04-29 12:07:52');

INSERT INTO `produit` (`id`, `name`, `price`, `id_vendeur`, `categorie`, `taille`, `description`, `genre`, `photo`,`trn_date`) VALUES
(4, 'Ballon de foot', '4,99', '3', 'Sports&Loisirs','ND', 'Ballon de foot rouge en cuir', 'ND', 'ballon.jpg', '2019-04-29 12:07:52');

INSERT INTO `produit` (`id`, `name`, `price`, `id_vendeur`, `categorie`, `taille`, `description`, `genre`, `photo`,`trn_date`) VALUES
(5, 'Balles de Tennis', '2,99', '3', 'Sports&Loisirs','ND', 'Balles de Tennis', 'ND', 'balles.jpg', '2019-04-29 12:07:52');

INSERT INTO `produit` (`id`, `name`, `price`, `id_vendeur`, `categorie`, `taille`, `description`, `genre`, `photo`,`trn_date`) VALUES
(6, 'Album Daft Punk - Discovery', '7,99', '2', 'Musique','ND', 'Album de musique électronique Daft Punk', 'ND', 'disco.jpg', '2019-04-29 12:07:52');

INSERT INTO `produit` (`id`, `name`, `price`, `id_vendeur`, `categorie`, `taille`, `description`, `genre`, `photo`,`trn_date`) VALUES
(7, 'Album PNL - Deux Frères', '7,99', '2', 'Musique','ND', 'Album musique Hip-Hop', 'ND', 'pnl.jpg', '2019-04-29 12:07:52');

INSERT INTO `produit` (`id`, `name`, `price`, `id_vendeur`, `categorie`, `taille`, `description`, `genre`, `photo`,`trn_date`) VALUES
(9, 'Drone - Parrot - BEBOP2', '335', '2', 'Sports&Loisirs','ND', 'Parrot - Drone Quadricoptère Bebop 2 - Camera HD', 'ND', 'drone.jpg', '2019-04-29 12:07:52');

INSERT INTO `produit` (`id`, `name`, `price`, `id_vendeur`, `categorie`, `taille`, `description`, `genre`, `photo`,`trn_date`) VALUES
(10, 'Enceinte - JBL - Flip4', '140', '2', 'Musique','ND', 'Enceinte Bluetooth JBL FLIP4', 'ND', 'enceinte.jpg', '2019-04-29 12:07:52');
COMMIT;










/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
