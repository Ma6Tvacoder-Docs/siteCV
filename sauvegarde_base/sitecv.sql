-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 06 Janvier 2017 à 17:20
-- Version du serveur :  10.1.8-MariaDB
-- Version de PHP :  5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `sitecv`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_competences`
--

DROP TABLE IF EXISTS `t_competences`;
CREATE TABLE `t_competences` (
  `id_competence` int(11) NOT NULL,
  `competence` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `t_competences`
--

INSERT INTO `t_competences` (`id_competence`, `competence`) VALUES
(1, 'HTML 5'),
(2, 'coucou'),
(3, 'hello'),
(4, 'grrr'),
(5, 'grrrr'),
(6, 'qsdfqsf'),
(7, 'qsdfqsdf'),
(8, 'qsdfsdf');

-- --------------------------------------------------------

--
-- Structure de la table `t_experiences`
--

DROP TABLE IF EXISTS `t_experiences`;
CREATE TABLE `t_experiences` (
  `id_experience` int(11) NOT NULL,
  `titre_e` text NOT NULL,
  `sous_titre_e` text,
  `dates` text,
  `description` text NOT NULL,
  `id_competence` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `t_experiences`
--

INSERT INTO `t_experiences` (`id_experience`, `titre_e`, `sous_titre_e`, `dates`, `description`, `id_competence`) VALUES
(1, 'qsfqsdf', 'qsdfsdf', 'qsdfqsf', 'qsdf', 0);

-- --------------------------------------------------------

--
-- Structure de la table `t_loisir`
--

DROP TABLE IF EXISTS `t_loisir`;
CREATE TABLE `t_loisir` (
  `id_loisir` int(11) NOT NULL,
  `loisir` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `t_loisirs`
--

DROP TABLE IF EXISTS `t_loisirs`;
CREATE TABLE `t_loisirs` (
  `id_loisir` int(11) NOT NULL,
  `loisir` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `t_titre`
--

DROP TABLE IF EXISTS `t_titre`;
CREATE TABLE `t_titre` (
  `id_titre` smallint(6) NOT NULL,
  `titre_cv` text NOT NULL,
  `accroche` text NOT NULL,
  `logo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `t_utilisateur`
--

DROP TABLE IF EXISTS `t_utilisateur`;
CREATE TABLE `t_utilisateur` (
  `id_utilisateur` smallint(5) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telephone` varchar(20) NOT NULL COMMENT 'varchar car 0 n''est pas un entier',
  `mdp` varchar(13) NOT NULL,
  `pseudo` varchar(13) NOT NULL,
  `avatar` varchar(13) NOT NULL,
  `age` smallint(5) NOT NULL,
  `date_naissance` date NOT NULL,
  `sexe` enum('Femme','Homme') NOT NULL,
  `etat_civil` enum('M.','Mme') NOT NULL,
  `statut_marital` varchar(13) NOT NULL,
  `adresse` text NOT NULL,
  `code_postal` varchar(5) NOT NULL,
  `ville` varchar(20) NOT NULL,
  `pays` varchar(25) NOT NULL,
  `note` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `t_utilisateur`
--

INSERT INTO `t_utilisateur` (`id_utilisateur`, `prenom`, `nom`, `email`, `telephone`, `mdp`, `pseudo`, `avatar`, `age`, `date_naissance`, `sexe`, `etat_civil`, `statut_marital`, `adresse`, `code_postal`, `ville`, `pays`, `note`) VALUES
(1, 'Patrick', 'Isola', 'patrick.isola@lepoles.com', '06 63 74 11 35', 'dexvagw52', 'pisola', '', 52, '1964-11-18', 'Homme', 'M.', 'célibataire', '16, avenue de Laumière', '75019', 'Paris', 'France', 'ras');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `t_competences`
--
ALTER TABLE `t_competences`
  ADD PRIMARY KEY (`id_competence`);

--
-- Index pour la table `t_experiences`
--
ALTER TABLE `t_experiences`
  ADD PRIMARY KEY (`id_experience`),
  ADD KEY `id_competence` (`id_competence`);

--
-- Index pour la table `t_loisir`
--
ALTER TABLE `t_loisir`
  ADD PRIMARY KEY (`id_loisir`);

--
-- Index pour la table `t_loisirs`
--
ALTER TABLE `t_loisirs`
  ADD PRIMARY KEY (`id_loisir`);

--
-- Index pour la table `t_titre`
--
ALTER TABLE `t_titre`
  ADD PRIMARY KEY (`id_titre`);

--
-- Index pour la table `t_utilisateur`
--
ALTER TABLE `t_utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `t_competences`
--
ALTER TABLE `t_competences`
  MODIFY `id_competence` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `t_experiences`
--
ALTER TABLE `t_experiences`
  MODIFY `id_experience` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `t_utilisateur`
--
ALTER TABLE `t_utilisateur`
  MODIFY `id_utilisateur` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
