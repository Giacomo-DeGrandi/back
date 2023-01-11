-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 09 jan. 2023 à 09:10
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cards`
--

-- --------------------------------------------------------

--
-- Structure de la table `cards`
--

CREATE TABLE `cards` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `cards`
--

INSERT INTO `cards` (`id`, `title`, `price`, `description`) VALUES
(1, 'test', 10, 'test'),
(2, '2test', 10, 'test2'),
(3, '3test', 10, 'test3'),
(4, '4test', 10, 'test4'),
(5, '5test', 10, 'test5'),
(6, '6test', 10, 'test6'),
(26, 'what', 13, 'dsa'),
(27, 'testing now', 34, 'test for demo1'),
(28, 'testing now', 34, 'test for demo1'),
(29, 'is there an error?', 87, 'test'),
(30, 'is there an error?', 87, 'test');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
