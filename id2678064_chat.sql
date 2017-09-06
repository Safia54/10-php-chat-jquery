-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  mer. 23 août 2017 à 19:34
-- Version du serveur :  5.7.19-0ubuntu0.16.04.1
-- Version de PHP :  7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `id2678064_chat`
--

-- --------------------------------------------------------

--
-- Structure de la table `identifiants`
--

CREATE TABLE `identifiants` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) DEFAULT NULL,
  `email` text,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `identifiants`
--

INSERT INTO `identifiants` (`id`, `pseudo`, `email`, `password`) VALUES
(8, 'safia', 'safia@safia.com', 'safia'),
(17, 'Brigitte', 'brigitte@brigitte.com', 'bardot'),
(18, 'Nordine', 'nordine@gmail.com', 'SAIDI');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(255) NOT NULL,
  `messageEnvoi` varchar(255) NOT NULL,
  `pseudo_identifiants` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `messageEnvoi`, `pseudo_identifiants`) VALUES
(17, 'yoooo', 'safia'),
(19, 'salut ', 'safia'),
(20, 'retourne dans ton pays', 'Brigitte'),
(21, 'purée', 'Brigitte'),
(22, 'restez polie', 'safia'),
(23, 'lalalal', 'Nordine'),
(24, 'je vous met dans ma pièce Brigitte !', 'Nordine'),
(27, 'J accepte !', 'Brigitte'),
(29, 'c est pour jouer une grosse raciste défleurie', 'Nordine'),
(30, ':(', 'Brigitte'),
(31, 'Ben quoi, ca vous irait non ?', 'safia'),
(32, 'Comme un gant !', 'Nordine'),
(33, 'hahah\r\n', 'safia'),
(34, 'Je regrette', 'Brigitte'),
(35, 'Hello', 'safia'),
(36, 'tout le monde va bien', 'safia'),
(38, '?', 'safia'),
(40, 'Oui, ca va mieux...', 'Brigitte');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `identifiants`
--
ALTER TABLE `identifiants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pseudo` (`pseudo`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_identifiants` (`pseudo_identifiants`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `identifiants`
--
ALTER TABLE `identifiants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`pseudo_identifiants`) REFERENCES `identifiants` (`pseudo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
