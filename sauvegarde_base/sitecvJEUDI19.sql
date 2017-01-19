-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 19 Janvier 2017 à 12:35
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
CREATE TABLE IF NOT EXISTS `t_competences` (
  `id_competence` int(11) NOT NULL AUTO_INCREMENT,
  `competence` text,
  `utilisateur_id` int(11) NOT NULL,
  PRIMARY KEY (`id_competence`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `t_competences`
--

INSERT INTO `t_competences` (`id_competence`, `competence`, `utilisateur_id`) VALUES
(1, 'HTML 50', 1),
(10, 'JavaScript', 2),
(12, 'bonnet de nuit', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_contacts`
--

DROP TABLE IF EXISTS `t_contacts`;
CREATE TABLE IF NOT EXISTS `t_contacts` (
  `id_contact` int(11) NOT NULL AUTO_INCREMENT,
  `prenom_c` varchar(50) DEFAULT NULL,
  `nom_c` varchar(50) NOT NULL,
  `email_c` varchar(50) NOT NULL,
  `message_c` text NOT NULL,
  `utilisateur_id` int(11) NOT NULL,
  PRIMARY KEY (`id_contact`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `t_experiences`
--

DROP TABLE IF EXISTS `t_experiences`;
CREATE TABLE IF NOT EXISTS `t_experiences` (
  `id_experience` int(11) NOT NULL AUTO_INCREMENT,
  `titre_e` varchar(45) NOT NULL,
  `sous_titre_e` varchar(45) DEFAULT NULL,
  `dates_e` varchar(45) DEFAULT NULL,
  `description_e` text NOT NULL,
  `utilisateur_id` int(11) NOT NULL,
  PRIMARY KEY (`id_experience`),
  KEY `id_competence` (`utilisateur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `t_experiences`
--

INSERT INTO `t_experiences` (`id_experience`, `titre_e`, `sous_titre_e`, `dates_e`, `description_e`, `utilisateur_id`) VALUES
(4, 'titre', 'sous titre', '2015', '<p>Longtemps, je me suis couch&eacute; de bonne heure. Parfois, &agrave; peine ma bougie &eacute;teinte, mes yeux se fermaient si vite que je n&rsquo;avais pas le temps de</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<blockquote>\r\n<p>me dire : &laquo; Je m&rsquo;endors. &raquo; Et, une demi-heure apr&egrave;s, la pens&eacute;e qu&rsquo;il &eacute;tait temps de chercher le sommeil m&rsquo;&eacute;veillait ; je voulais poser le volume que je croyais avoir encore dans les mains et souffler ma lumi&egrave;re ; je n&rsquo;avais pas cess&eacute; en dormant de faire des r&eacute;</p>\r\n</blockquote>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>flexions sur ce que je venais de lire, mais ces r&eacute;flexions avaient pris un tour un peu particulier ; il me semblait que j&rsquo;&eacute;tais moi-m&ecirc;me ce dont parlait l&rsquo;ouvrage : une &eacute;glise, un quatuor, la rivalit&eacute; de Fran&ccedil;ois Ier et de Charles Quint.</p>\r\n', 1),
(5, 'titre ckeditor', 'sous titre ckeditor', '2016', '<hr />\r\n<p><strong>Longtemps</strong>, je me suis couch&eacute; de bonne heure. Parfois, &agrave; peine ma bougie &eacute;teinte, mes yeux se fermaient si vite que je n&rsquo;avais pas le temps de me dire : &laquo; Je m&rsquo;endors. &raquo; Et, une demi-heure apr&egrave;s, la pens&eacute;e</p>\r\n\r\n<blockquote>\r\n<p>qu&rsquo;il &eacute;tait temps de chercher le sommeil m&rsquo;&eacute;veillait ; je voulais poser le volume que je croyais avoir encore dans les mains et souffler ma lumi&egrave;re ; je n&rsquo;avais pas cess&eacute; en dormant de faire des r&eacute;flexions sur ce que je venais de lire, mais ces r&eacute;flexions avaient</p>\r\n</blockquote>\r\n\r\n<p>pris un tour un peu particulier ; il me semblait que j&rsquo;&eacute;tais moi-m&ecirc;me ce dont parlait l&rsquo;ouvrage :</p>\r\n\r\n<ul>\r\n	<li>une &eacute;glise,</li>\r\n	<li>un quatuor,</li>\r\n	<li>la rivalit&eacute; de Fran&ccedil;ois Ier et de Charles Quint.</li>\r\n</ul>\r\n', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_formations`
--

DROP TABLE IF EXISTS `t_formations`;
CREATE TABLE IF NOT EXISTS `t_formations` (
  `id_formation` int(11) NOT NULL AUTO_INCREMENT,
  `titre_f` varchar(45) NOT NULL,
  `sous_titres_f` varchar(45) NOT NULL,
  `dates_f` varchar(45) NOT NULL,
  `description_f` text NOT NULL,
  `utilisateur_id` int(11) NOT NULL,
  PRIMARY KEY (`id_formation`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `t_loisirs`
--

DROP TABLE IF EXISTS `t_loisirs`;
CREATE TABLE IF NOT EXISTS `t_loisirs` (
  `id_loisir` int(11) NOT NULL AUTO_INCREMENT,
  `loisir` text NOT NULL,
  `utilisateur_id` int(11) NOT NULL,
  PRIMARY KEY (`id_loisir`)
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
  `id_portfolio` int(11) NOT NULL AUTO_INCREMENT,
  `nom_img` varchar(45) DEFAULT NULL,
  `utilisateur_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_portfolio`),
  KEY `utilisateur_id_idx` (`utilisateur_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `t_realisations`
--

DROP TABLE IF EXISTS `t_realisations`;
CREATE TABLE IF NOT EXISTS `t_realisations` (
  `id_realisation` int(11) NOT NULL AUTO_INCREMENT,
  `titre_r` varchar(45) DEFAULT NULL,
  `sous_titre_r` varchar(45) DEFAULT NULL,
  `dates_r` varchar(45) DEFAULT NULL,
  `description_r` varchar(45) DEFAULT NULL,
  `utilisateur_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_realisation`),
  KEY `utilisateur_id_idx` (`utilisateur_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `t_titres`
--

DROP TABLE IF EXISTS `t_titres`;
CREATE TABLE IF NOT EXISTS `t_titres` (
  `id_titres` int(11) NOT NULL AUTO_INCREMENT,
  `titre_01` varchar(45) DEFAULT NULL,
  `titre_03` varchar(45) DEFAULT NULL,
  `titre_04` varchar(45) DEFAULT NULL,
  `titre_05` varchar(45) DEFAULT NULL,
  `titre_06` varchar(45) DEFAULT NULL,
  `utilisateur_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_titres`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `t_titre_cv`
--

DROP TABLE IF EXISTS `t_titre_cv`;
CREATE TABLE IF NOT EXISTS `t_titre_cv` (
  `id_titre_cv` smallint(6) NOT NULL AUTO_INCREMENT,
  `titre_cv` text NOT NULL,
  `accroche` text NOT NULL,
  `logo` varchar(50) NOT NULL,
  `utilisateur_id` int(11) NOT NULL,
  PRIMARY KEY (`id_titre_cv`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `t_titre_cv`
--

INSERT INTO `t_titre_cv` (`id_titre_cv`, `titre_cv`, `accroche`, `logo`, `utilisateur_id`) VALUES
(1, 'Formateur en infographie', 'coucou', 'test', 1),
(2, 'Formateur en langages web et infographie', 'coucou aussi', 'test', 2);

-- --------------------------------------------------------

--
-- Structure de la table `t_utilisateurs`
--

DROP TABLE IF EXISTS `t_utilisateurs`;
CREATE TABLE IF NOT EXISTS `t_utilisateurs` (
  `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
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
  `note` varchar(20) NOT NULL,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `t_utilisateurs`
--

INSERT INTO `t_utilisateurs` (`id_utilisateur`, `prenom`, `nom`, `email`, `telephone`, `mdp`, `pseudo`, `avatar`, `age`, `date_naissance`, `sexe`, `etat_civil`, `statut_marital`, `adresse`, `code_postal`, `ville`, `pays`, `note`) VALUES
(1, 'Patrick', 'Isola', 'patrick.isola@lepoles.com', '06 63 74 11 35', '123456', 'pisola', '', 52, '1964-11-18', 'Homme', 'M.', 'célibataire', '16, avenue de Laumière', '75019', 'Paris', 'France', 'ras'),
(2, 'Philippe', 'Allouche', 'fil5@netcourrier.com', '07 68 55 86 30', 'pass', 'fil', 'test', 56, '1960-02-27', 'Homme', 'M.', 'célibataire', '35, rue Doudeauville', '75018', 'Paris', 'France', 'ras');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `t_portfolio`
--
ALTER TABLE `t_portfolio`
  ADD CONSTRAINT `utilisateur_id` FOREIGN KEY (`utilisateur_id`) REFERENCES `t_utilisateurs` (`id_utilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `t_realisations`
--
ALTER TABLE `t_realisations`
  ADD CONSTRAINT `id_utilisateur` FOREIGN KEY (`utilisateur_id`) REFERENCES `t_utilisateurs` (`id_utilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
