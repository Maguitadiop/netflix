-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 13 avr. 2020 à 17:20
-- Version du serveur :  5.7.24
-- Version de PHP : 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `nantflix`
--

-- --------------------------------------------------------

--
-- Structure de la table `episode`
--

CREATE TABLE `episode` (
  `id_episode` int(11) NOT NULL,
  `ref_serie` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `episode`
--

INSERT INTO `episode` (`id_episode`, `ref_serie`) VALUES
(1, 1),
(2, 1),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 3),
(8, 3),
(9, 3),
(10, 3),
(11, 3);

-- --------------------------------------------------------

--
-- Structure de la table `regarder`
--

CREATE TABLE `regarder` (
  `id_reg` int(11) NOT NULL,
  `ref_util` int(11) DEFAULT NULL,
  `ref_episode` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `serie`
--

CREATE TABLE `serie` (
  `id_serie` int(11) NOT NULL,
  `intitule` varchar(40) NOT NULL,
  `nombre_episode` int(10) NOT NULL,
  `acteurs_principaux` varchar(255) NOT NULL,
  `realisateur` varchar(50) NOT NULL,
  `annee_de_sortie` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `serie`
--

INSERT INTO `serie` (`id_serie`, `intitule`, `nombre_episode`, `acteurs_principaux`, `realisateur`, `annee_de_sortie`) VALUES
(1, 'reine des neiges', 2, 'makh et pape', 'max', 2017),
(2, 'La cite de la peur', 4, 'Eudes et Tayeb', 'Pawlo', 2017),
(3, 'Orgueuil et prejuges', 5, 'Henry Dupont', 'Dubois', 2010),
(4, 'Retour vers le futur II', 3, 'Laura', 'Sana', 2016),
(5, 'Match point', 6, 'Sophian', 'Ourida', 2019);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_user` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `mot_de_passe` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `date_naissance` varchar(20) NOT NULL,
  `telephone` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_user`, `email`, `mot_de_passe`, `prenom`, `nom`, `date_naissance`, `telephone`) VALUES
(1, 'diopma221@gmail.com', 'MaxDiop9', 'Maguette', 'DIOP', '12/01/1999', 788452195),
(6, 'root@gmail.com', 'Kafatou21', 'Fatou', 'Gueye', '15/02/1993', 754856213),
(7, 'barr97@gamil.com', 'Barryaicha9', 'aissatou', 'barry', '14/09/2003', 748152120),
(8, 'Fayedella@gamail.com', 'Faye120197', 'Faye', 'Ndella', '15/02/1993', 645127895);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `episode`
--
ALTER TABLE `episode`
  ADD PRIMARY KEY (`id_episode`),
  ADD KEY `ref_serie` (`ref_serie`);

--
-- Index pour la table `regarder`
--
ALTER TABLE `regarder`
  ADD PRIMARY KEY (`id_reg`),
  ADD KEY `ref_util` (`ref_util`),
  ADD KEY `ref_episode` (`ref_episode`);

--
-- Index pour la table `serie`
--
ALTER TABLE `serie`
  ADD PRIMARY KEY (`id_serie`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `episode`
--
ALTER TABLE `episode`
  MODIFY `id_episode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `regarder`
--
ALTER TABLE `regarder`
  MODIFY `id_reg` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `serie`
--
ALTER TABLE `serie`
  MODIFY `id_serie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `episode`
--
ALTER TABLE `episode`
  ADD CONSTRAINT `episode_ibfk_1` FOREIGN KEY (`ref_serie`) REFERENCES `serie` (`id_serie`);

--
-- Contraintes pour la table `regarder`
--
ALTER TABLE `regarder`
  ADD CONSTRAINT `regarder_ibfk_1` FOREIGN KEY (`ref_util`) REFERENCES `utilisateur` (`id_user`),
  ADD CONSTRAINT `regarder_ibfk_2` FOREIGN KEY (`ref_episode`) REFERENCES `episode` (`id_episode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
