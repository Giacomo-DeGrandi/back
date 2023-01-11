-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 04 jan. 2023 à 17:05
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
-- Base de données : `backend`
--

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `prix` float NOT NULL,
  `description` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `img_url` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `titre`, `prix`, `description`, `date`, `img_url`) VALUES
(1, 'Another Title', 123, 'Fourth', '2023-01-04', 'https://www.nicepng.com/png/full/308-3081994_aesthetic-transparent-white-flower-gardening-flower-transparent-aesthetic.png'),
(4, 'Third but fourth (now the second)', 123, 'lastone', '2023-01-04', 'https://www.nicepng.com/png/full/308-3081994_aesthetic-transparent-white-flower-gardening-flower-transparent-aesthetic.png'),
(5, 'Another lastone', 45, 'another', '2023-01-04', 'https://www.nicepng.com/png/full/308-3081994_aesthetic-transparent-white-flower-gardening-flower-transparent-aesthetic.png'),
(6, 'TestLast', 15, 'Testretest', '2023-01-04', 'https://www.nicepng.com/png/full/308-3081994_aesthetic-transparent-white-flower-gardening-flower-transparent-aesthetic.png');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mdp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mdp`) VALUES
(1, 'test', 'test@test.io', '12345678'),
(9, 'mina', 'mina@mina.io', '12345678');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
