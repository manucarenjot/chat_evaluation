-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le : ven. 08 avr. 2022 à 13:07
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `rpm03_chat`
--

-- --------------------------------------------------------

--
-- Structure de la table `rpm03_messages`
--

DROP TABLE IF EXISTS `rpm03_messages`;
CREATE TABLE IF NOT EXISTS `rpm03_messages` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `message` varchar(255) NOT NULL,
  `user_fk` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_message_idx` (`user_fk`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `rpm03_messages`
--

INSERT INTO `rpm03_messages` (`id`, `message`, `user_fk`) VALUES
(2, ':message', ':user_fk'),
(3, ':message', ':user_fk'),
(4, ':message', ':user_fk'),
(5, 'Vive la sapologie', 'bydie'),
(6, 'Vive la sapologie', 'bydie'),
(7, 'Vive la sapologie', 'bydie'),
(8, 'Vive la sapologie', 'bydie'),
(9, 'Vive la sapologie', 'bydie'),
(10, 'sdsdsq', 'bydie'),
(11, 'sdsdsq', 'bydie'),
(12, 'sdsdsq', 'bydie'),
(13, '', 'bydie'),
(14, '', 'bydie'),
(15, 'Vive la sapologie', 'bydie'),
(16, 'Vive la sapologie', 'bydie');

-- --------------------------------------------------------

--
-- Structure de la table `rpm03_user`
--

DROP TABLE IF EXISTS `rpm03_user`;
CREATE TABLE IF NOT EXISTS `rpm03_user` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mail_UNIQUE` (`mail`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `rpm03_user`
--

INSERT INTO `rpm03_user` (`id`, `username`, `mail`, `password`) VALUES
(1, 'bydie', 'admin@admin.org', '$2y$10$1p7CB1drT/SmpzEJIS4nFeilvNzPhpUcAqXUL.NN.CxRdvNvcDtw6');

-- --------------------------------------------------------

--
-- Structure de la table `rpm03_user_online`
--

DROP TABLE IF EXISTS `rpm03_user_online`;
CREATE TABLE IF NOT EXISTS `rpm03_user_online` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_fk` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
