-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Mer 11 Janvier 2017 à 23:11
-- Version du serveur :  5.5.42
-- Version de PHP :  5.6.10

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
CREATE TABLE IF NOT EXISTS `t_competences` (
  `id_competence` int(11) NOT NULL,
  `competence` text,
  `utilisateur_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `t_competences`
--

INSERT INTO `t_competences` (`id_competence`, `competence`, `utilisateur_id`) VALUES
(1, 'HTML 5', 0),
(2, 'coucou', 0),
(3, 'hello', 0),
(4, 'grrr', 0),
(5, 'grrrr', 0),
(6, 'qsdfqsf', 0),
(7, 'qsdfqsdf', 0),
(8, 'qsdfsdf', 0),
(9, 'HTLM 5', 1),
(10, 'JavaScript', 2);

-- --------------------------------------------------------

--
-- Structure de la table `t_experiences`
--

DROP TABLE IF EXISTS `t_experiences`;
CREATE TABLE IF NOT EXISTS `t_experiences` (
  `id_experience` int(11) NOT NULL,
  `titre_e` varchar(45) NOT NULL,
  `sous_titre_e` varchar(45) DEFAULT NULL,
  `dates_f` varchar(45) DEFAULT NULL,
  `description_f` text NOT NULL,
  `competence_id` int(11) NOT NULL,
  `utilisateur_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `t_experiences`
--

INSERT INTO `t_experiences` (`id_experience`, `titre_e`, `sous_titre_e`, `dates_f`, `description_f`, `competence_id`, `utilisateur_id`) VALUES
(1, 'qsfqsdf', 'qsdfsdf', 'qsdfqsf', 'qsdf', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `t_formations`
--

DROP TABLE IF EXISTS `t_formations`;
CREATE TABLE IF NOT EXISTS `t_formations` (
  `id_formation` int(11) NOT NULL,
  `titre_f` varchar(45) NOT NULL,
  `sous_titres_f` varchar(45) NOT NULL,
  `dates_f` varchar(45) NOT NULL,
  `description_f` text NOT NULL,
  `utilisateur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `t_loisirs`
--

DROP TABLE IF EXISTS `t_loisirs`;
CREATE TABLE IF NOT EXISTS `t_loisirs` (
  `id_loisir` int(11) NOT NULL,
  `loisir` text NOT NULL,
  `utilisateur_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `t_loisirs`
--

INSERT INTO `t_loisirs` (`id_loisir`, `loisir`, `utilisateur_id`) VALUES
(1, 'Cinéma', 1),
(2, 'Guitare', 2);

-- --------------------------------------------------------

--
-- Structure de la table `t_portfolio`
--

DROP TABLE IF EXISTS `t_portfolio`;
CREATE TABLE IF NOT EXISTS `t_portfolio` (
  `id_portfolio` int(11) NOT NULL,
  `nom_img` varchar(45) DEFAULT NULL,
  `utilisateur_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `t_titres`
--

DROP TABLE IF EXISTS `t_titres`;
CREATE TABLE IF NOT EXISTS `t_titres` (
  `id_titres` int(11) NOT NULL,
  `titre_01` varchar(45) DEFAULT NULL,
  `titre_03` varchar(45) DEFAULT NULL,
  `titre_04` varchar(45) DEFAULT NULL,
  `titre_05` varchar(45) DEFAULT NULL,
  `titre_06` varchar(45) DEFAULT NULL,
  `utilisateur_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `t_titre_cv`
--

DROP TABLE IF EXISTS `t_titre_cv`;
CREATE TABLE IF NOT EXISTS `t_titre_cv` (
  `id_titre_cv` smallint(6) NOT NULL,
  `titre_cv` text NOT NULL,
  `accroche` text NOT NULL,
  `logo` varchar(50) NOT NULL,
  `utilisateur_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `t_titre_cv`
--

INSERT INTO `t_titre_cv` (`id_titre_cv`, `titre_cv`, `accroche`, `logo`, `utilisateur_id`) VALUES
(1, 'Formateur en infographie', 'coucou', 'test', 1),
(2, 'Formateur en langages web et infographie', 'coucou aussi', 'test', 2);

-- --------------------------------------------------------

--
-- Structure de la table `t_utilisateur`
--

DROP TABLE IF EXISTS `t_utilisateur`;
CREATE TABLE IF NOT EXISTS `t_utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `t_utilisateur`
--

INSERT INTO `t_utilisateur` (`id_utilisateur`, `prenom`, `nom`, `email`, `telephone`, `mdp`, `pseudo`, `avatar`, `age`, `date_naissance`, `sexe`, `etat_civil`, `statut_marital`, `adresse`, `code_postal`, `ville`, `pays`, `note`) VALUES
(1, 'Patrick', 'Isola', 'patrick.isola@lepoles.com', '06 63 74 11 35', '1234678', 'pisola', '', 52, '1964-11-18', 'Homme', 'M.', 'célibataire', '16, avenue de Laumière', '75019', 'Paris', 'France', 'ras'),
(2, 'Philippe', 'Allouche', 'fil5@netcourrier.com', '07 68 55 86 30', 'pass', 'fil', 'test', 56, '1960-02-27', 'Homme', 'M.', 'célibataire', '35, rue Doudeauville', '75018', 'Paris', 'France', 'ras');

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
  ADD KEY `id_competence` (`utilisateur_id`);

--
-- Index pour la table `t_formations`
--
ALTER TABLE `t_formations`
  ADD PRIMARY KEY (`id_formation`);

--
-- Index pour la table `t_loisirs`
--
ALTER TABLE `t_loisirs`
  ADD PRIMARY KEY (`id_loisir`);

--
-- Index pour la table `t_portfolio`
--
ALTER TABLE `t_portfolio`
  ADD PRIMARY KEY (`id_portfolio`),
  ADD KEY `utilisateur_id_idx` (`utilisateur_id`);

--
-- Index pour la table `t_titres`
--
ALTER TABLE `t_titres`
  ADD PRIMARY KEY (`id_titres`);

--
-- Index pour la table `t_titre_cv`
--
ALTER TABLE `t_titre_cv`
  ADD PRIMARY KEY (`id_titre_cv`);

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
  MODIFY `id_competence` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `t_experiences`
--
ALTER TABLE `t_experiences`
  MODIFY `id_experience` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `t_formations`
--
ALTER TABLE `t_formations`
  MODIFY `id_formation` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `t_loisirs`
--
ALTER TABLE `t_loisirs`
  MODIFY `id_loisir` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `t_portfolio`
--
ALTER TABLE `t_portfolio`
  MODIFY `id_portfolio` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `t_titres`
--
ALTER TABLE `t_titres`
  MODIFY `id_titres` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `t_titre_cv`
--
ALTER TABLE `t_titre_cv`
  MODIFY `id_titre_cv` smallint(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `t_utilisateur`
--
ALTER TABLE `t_utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `t_portfolio`
--
ALTER TABLE `t_portfolio`
  ADD CONSTRAINT `utilisateur_id` FOREIGN KEY (`utilisateur_id`) REFERENCES `t_utilisateur` (`id_utilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
