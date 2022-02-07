-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 07 fév. 2022 à 09:31
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `epub`
--

-- --------------------------------------------------------

--
-- Structure de la table `agent`
--

DROP TABLE IF EXISTS `agent`;
CREATE TABLE IF NOT EXISTS `agent` (
  `id_agt` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_agt`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `boutique`
--

DROP TABLE IF EXISTS `boutique`;
CREATE TABLE IF NOT EXISTS `boutique` (
  `id_prod` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `campagnes`
--

DROP TABLE IF EXISTS `campagnes`;
CREATE TABLE IF NOT EXISTS `campagnes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `auteur` varchar(100) NOT NULL,
  `dates` date DEFAULT NULL,
  `entreprise` varchar(50) NOT NULL,
  `localisation` varchar(100) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `categorie` varchar(100) DEFAULT NULL,
  `prix` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `id_auteur` int(11) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `campagnes`
--

INSERT INTO `campagnes` (`id`, `auteur`, `dates`, `entreprise`, `localisation`, `titre`, `description`, `categorie`, `prix`, `email`, `phone`, `id_auteur`, `image`) VALUES
(11, 'Foupoua', '2021-03-01', 'Login', 'Yaoundé', 'insertion-image', 'hfjghfkjgbklhlmjmlkjmjkjmljjn,kl:,;', 'Informatique ', '54000 FCFA', 'foupouamohamed@yahoo.fr', '5507347898', 18, 'insertion-image.jpg'),
(14, 'MAURICIO', '2021-03-21', 'LOGITEEK', 'Yaoundé', 'test-image2', 'HDFHFVJJHKLJKJLMKJHMKM%KMLMLKML', 'Immobilier', '25000 FCFA', 'info@nfestructural.com', '6537648798', 9, 'test-image2.jpg'),
(19, 'Foupoua', '2021-03-22', 'Newtech', 'Kribi', 'premiere annonce', 'il s\'agit d\'un test de verification pour le projet', 'Electronique', '25000 FCFA', 'info@nfestructural.com', '48967985734', 22, 'premiere annonce.jpg'),
(21, 'Foupoua', '2021-03-22', 'Login', 'Douala', 'OpenSUKU', 'Plateforme de e-learning gratuit pendant les 30 premiers jours d\'utilislisation', 'formations-Education', '20000 FCFA', 'info@nfestructural.com', '48967985734', 22, 'OpenSUKU.jpg'),
(23, 'Foupoua', '2021-03-22', 'Boa SARL', 'Yaoundé', 'Recrutement vendeur', 'Bao sarl est une structure base a yaoundé . Nous rechechons un vendeur pour le developp', 'Offre Emplois-Stages', '25000 FCFA', 'mbakop3@gmail.com', '6537648798', 22, 'Recrutement vendeur.jpg'),
(24, 'Foupoua', '2021-03-22', 'Login', 'Douala', 'Formation  en aglais', 'Login est une structure qui contient un centre de formation en anglais', 'formations-Education', '25000 FCFA', 'info@nfestructural.com', '6537648798', 22, 'Formation  en aglais.jpeg'),
(25, 'Foupoua', '2021-03-24', 'LOGITEEK', 'Bafoussam', 'HKHGKJJJBLLMIMGJGFVJHVB', 'HGVJ?HLJMIOUJIHJKVBKBJJKBKLJKJBHV BN N', 'Loisirs-Sports', '25000000 FCFA', 'foupouamohamed@yahoo.fr', '48967985734', 22, 'HKHGKJJJBLLMIMGJGFVJHVB.jpg'),
(26, 'Foupoua', '2021-03-24', 'LOGITEEK', 'Bafoussam', 'HKHGKJJJBLLMIMGJGFVJHVB', 'HGVJ?HLJMIOUJIHJKVBKBJJKBKLJKJBHV BN N', 'Loisirs-Sports', '25000000 FCFA', 'foupouamohamed@yahoo.fr', '48967985734', 22, 'HKHGKJJJBLLMIMGJGFVJHVB.jpg'),
(27, 'MAWED', '2021-03-24', 'SDK', 'Kribi', 'Publications 1', 'test de la publication numéro 1', 'Autres', '300000 FCFA', 'mbakop3@gmail.com', '48967985734', 25, 'Publications 1.jpg'),
(30, 'Foupoua', '2021-03-25', 'Login', 'Yaoundé', 'GHEHGFKJGHKJHGJ', 'FBGFDHTJGKUYK.HNH?GHFDGSGFHGFJKGHJGHJ', 'Offre Emplois-Stages', '25000 FCFA', 'info@nfestructural.com', '48967985734', 22, 'GHEHGFKJGHKJHGJ.png'),
(31, 'Foupoua', '2021-03-25', 'SDK', 'Ebolowa', 'HCFJHGFKHYL', 'DFDFXGFJ?HUK.ULOIOMPKVNVGHDGF', 'Immobilier', '25000 FCFA', 'info@nfestructural.com', '6537648798', 22, 'HCFJHGFKHYL.jpg'),
(32, 'dave', '2021-03-30', 'Login', 'Douala', 'Emploi', 'Recrutement d\'un developpeur web avec 2 ans d\'expérience minimun', 'Offre Emplois-Stages', '100.000 FCFA', 'info@nfestructural.com', '48967985734', 32, 'Emploi.jpg'),
(33, 'dave', '2021-03-30', 'LOGITEEK', 'Yaoundé', 'Ordinateur poratable', 'Nous mettons à votre disposition des PC avec de très bonnes carctéristiques telles que:\r\nRAM: 8Go,\r\nDisque Dur: 500Go,\r\nMarque: Huawei', 'Informatique', '250.000 FCFA', 'foupouamohamed@yahoo.fr', '48967985734', 32, 'Ordinateur poratable.jpg'),
(34, 'dave', '2021-03-30', 'Newtech', 'Kribi', 'Smartphone', 'Nous mettons à votre disposition des smartphone avec de très bonnes carctéristiques telles que:\r\nRAM: 8Go,\r\ncapacité de stockage: 64Go,\r\nMarque: Samsung', 'Electronique', '180.000 FCFA', 'info@nfestructural.com', '48967985734', 32, 'Smartphone.jpg'),
(35, 'dave', '2021-03-30', 'Beauty Shop', 'Douala', 'Accessoires de maquillage', 'Nous proposons ce pack de maquillage composé de plusieurs accessoires', 'Beauté-Santé', '25000 FCFA', 'mbakop3@gmail.com', '48967985734', 32, 'Accessoires de maquillage.jpg'),
(36, 'dave', '2021-03-30', 'LOGITEEK', 'Bafoussam', 'Iphone', '\r\nNous mettons à votre disposition des Iphones avec de très bonnes carctéristiques telles que: RAM: 16Go, capacité de stockage: 128Go, Marque: IPHONE X', 'Electronique', '420.000 FCFA', 'mbakop3@gmail.com', '48967985734', 32, 'Iphone.jpg'),
(37, 'MAWED', '2021-04-06', 'Login', 'Douala', 'FRUITS DE MER', 'FHJFJKLJLK HGFGV', 'Autres', '25000 FCFA', 'foupouamohamed@yahoo.fr', '48967985734', 25, 'FRUITS DE MER.png'),
(38, 'Foupoua', '2021-04-15', 'Login', 'Yaoundé', 'test123', 'bonjour chgfghvhjgujkhjkhbbkjk', 'Informatique', '25000 FCFA', 'foupouamohamed@yahoo.fr', '5507341634', 36, 'test123.png'),
(39, 'mboukeu', '2021-06-16', 'Login', 'Douala', 'nouvautés', 'trstrxddytccfyugvuivbjhbhuii_ghihiugè-r', 'Informatique', '25000 FCFA', 'mboukeuv@gmail.com', '48967985734', 44, 'nouvautés.jpg'),
(40, 'Foupoua', '2021-11-21', 'Login', 'Douala', 'nouvautés12345', 'GYFYGFVHJBJBHKNBBNBVBNB K', 'Electronique', '20.000', 'arthur12@yahoo.fr', '654769823', 22, 'nouvautés12345.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `auteur` varchar(30) DEFAULT NULL,
  `message` varchar(240) DEFAULT NULL,
  `dates` datetime DEFAULT NULL,
  `image` text,
  `id_auteurs` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `auteur`, `message`, `dates`, `image`, `id_auteurs`) VALUES
(2, 'mbakop', 'salut  je suis très satisfait par les services que propose epub+', '2021-03-18 00:00:00', 'Max.png', 0),
(24, 'aaa', 'Je vous recommande vivement cette plateforme pour passer vos annonces publicitaires.', '2021-03-23 00:00:00', 'aaa.png', 26),
(26, 'mboukeu', 'bonjour j\'ai bien aimé le dynamisme de votre site', '2021-06-16 00:00:00', 'vieri.jpg', 44),
(7, 'mbakop', 'salut  je suis très satisfait par les services que propose epub+', '2021-03-18 00:00:00', 'Max.png', 0),
(25, 'MAWED', 'Grace ePUB+ j\'ai pu augmenter mes révenus de plus 20%. Je le recommande vivement', '2021-03-24 00:00:00', '25.png', 25),
(21, 'Mbackop', 'Bonjour tous le monde , cette plateforme est le meilleur en plus c\'est gratuit !!', '2021-03-19 00:00:00', 'Mbackop.jpg', 21),
(22, 'MAURICIUS', 'JE DESIRE DES CHOSES IMPORTANTES QUE L\'ARGE?T', '2021-03-19 00:00:00', 'MAURICIUS.jpg', 23),
(23, 'Foupoua', 'Slt je vous recommande cette plate pour passer vos annonces                                                        ', '2021-03-21 00:00:00', 'moustapha.jpg', 22);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `message` text,
  `nom_auteur` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `nom`, `email`, `phone`, `message`, `nom_auteur`) VALUES
(4, 'Arthur Dogue', 'arthur12@yahoo.fr', '654769823', 'BESOIN D\'un article', 'Foupoua'),
(3, 'steven', 'foupouamohamed@yahoo.fr', '6537648798', 'ngxjhcvlkgblh:!ljlkv;,b ;nvvvbjklhjkl:', 'Foupoua');

-- --------------------------------------------------------

--
-- Structure de la table `newsletter`
--

DROP TABLE IF EXISTS `newsletter`;
CREATE TABLE IF NOT EXISTS `newsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `auteur` varchar(25) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `email_auteur` varchar(25) DEFAULT NULL,
  `phone_auteur` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `newsletter`
--

INSERT INTO `newsletter` (`id`, `auteur`, `email`, `email_auteur`, `phone_auteur`) VALUES
(1, 'Foupoua', 'Jefftom@yahoo.fr', 'foupouamohamed3@gmail.com', '5507341634'),
(2, 'Foupoua', 'Jefftom@yahoo.fr', 'foupouamohamed3@gmail.com', '5507341634'),
(3, 'Foupoua', 'Jefftom@yahoo.fr', 'foupouamohamed3@gmail.com', '5507341634'),
(4, 'Foupoua', 'foupouah@otmail.fr', 'foupouamohamed3@gmail.com', '5507341634'),
(5, 'Foupoua', 'steven@hotmail.fr', 'foupouamohamed3@gmail.com', '5507341634'),
(6, 'aaa', 'steven@hotmail.fr', 'aaa@aaa.aaa', 'aaaa'),
(7, 'Foupoua', 'foupouah123@otmail.fr', 'foupouamohamed3@gmail.com', '5507341634');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `auteur` varchar(30) NOT NULL,
  `id_auteur` varchar(30) NOT NULL,
  `dates` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` text,
  PRIMARY KEY (`id_post`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id_post`, `titre`, `message`, `auteur`, `id_auteur`, `dates`, `image`) VALUES
(1, 'Evaluation', 'Le contole de connaissance !!!', 'MAWED', '1', '2021-03-04 00:00:00', NULL),
(5, 'Travaux dirigés 3', 'ffffffffffffffffduuuuuuuuuuuuuuuugfvcf', 'MAWED', '1', '2021-03-04 00:00:00', NULL),
(6, 'Travaux dirigés 3', 'ffffffffffffffffduuuuuuuuuuuuuuuugfvcf', 'MAWED', '1', '2021-03-04 00:00:00', NULL),
(7, 'Travaux dirigés 3', 'Besoin d\'aide sur nos travaux dirigés', 'Foupoua', '12', '2021-03-04 00:00:00', NULL),
(8, 'Travaux dirigés 3', 'Besoin d\'aide sur nos travaux dirigés', 'Foupoua', '5', '2021-03-05 00:00:00', NULL),
(9, 'Travaux dirigés 3', 'Besoin d\'aide sur nos travaux dirigés', 'Foupoua', '5', '2021-03-05 00:00:00', NULL),
(10, 'Travaux dirigés 3', 'Besoin d\'aide sur nos travaux dirigés', 'Foupoua', '5', '2021-03-05 00:00:00', NULL),
(11, 'phone', 'j\'ai besoin d\'un iphone8 plus !!', 'mbakop', '21', '2021-03-18 00:00:00', 'Max.png'),
(12, 'phone', 'j\'ai besoin d\'un iphone8 plus !!', 'mbakop', '21', '2021-03-18 00:00:00', 'Max.png'),
(13, 'Travaux dirigés 3', 'Controle continu pour demain', 'MAURICIO', '23', '2021-03-19 00:00:00', 'djontu.jpg'),
(15, '\"Travaux dirigés 3', 'l\'epreuve de maths', 'aaa', '26', '2021-03-22 00:00:00', 'aaa.png'),
(16, 'test2', 'Slt je suis arthur ', 'modjo', '26', '2021-03-23 00:00:00', 'modjo.png'),
(17, 'Travaux dirigés 3', 'jfdghf,jhjh;lkuj:lokl:,klhjgthjfgtdgf', 'Foupoua', '22', '2021-03-24 00:00:00', '22.jpg'),
(18, 'Présentation', 'Slt je suis MWD je sui nouneau sur cette plateforme !!', 'MAWED', '25', '2021-03-24 00:00:00', '25.png');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `fonction` varchar(25) NOT NULL DEFAULT 'utilisateur',
  `password` varchar(255) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `email`, `phone`, `fonction`, `password`, `image`) VALUES
(27, 'MBAKOB', 'Maxwell', 'mbakobmaxwell.33@gmail.com', '654916212', 'utilisateur', '148095119c0fcabea1af14e93c27e1a878c88a49', 'Maxwell.png'),
(34, 'LAME', 'FREDGI', 'lame@yahoo.fr', '48967985734', 'utilisateur', '8cb2237d0679ca88db6464eac60da96345513964', 'FREDGI.jpg'),
(24, 'Madiesse', 'Berile', 'berilelaure@yahoo.fr', '48967985734', 'agent', '8cb2237d0679ca88db6464eac60da96345513964', '24.jpg'),
(22, 'Foupoua', 'moustapha', 'foupouamohamed3@gmail.com', '5507341634', 'administrateur', '8cb2237d0679ca88db6464eac60da96345513964', '22.jpg'),
(23, 'MAURICIUS', 'djontU', 'mauricioDJONTU@gmail.com', '695548062', 'utilisateur', '7c222fb2927d828af22f592134e8932480637c0d', 'MAURICIUS.jpg'),
(45, 'Admin', 'admin', 'admin@admin.com', '0000000', 'administrateur', '8cb2237d0679ca88db6464eac60da96345513964', 'admin.png'),
(33, 'Foupoua', 'moustapha', 'foupouamohamed2@yahoo.fr', '48967985734', 'utilisateur', '8cb2237d0679ca88db6464eac60da96345513964', 'moustapha.jpg'),
(32, 'dave', 'jack', 'dave@yahoo.fr', '48967985734', 'administrateur', '7c4a8d09ca3762af61e59520943dc26494f8941b', '32.jpg'),
(31, 'CARTER', 'Max', 'Mwdesign@yahoo.fr', '6537648798', 'utilisateur', '8cb2237d0679ca88db6464eac60da96345513964', 'Max.jpg'),
(35, 'foupa', 'Jeff', 'jef12@yahoo.fr', '48967985734', 'utilisateur', '8cb2237d0679ca88db6464eac60da96345513964', 'Jeff.png'),
(36, 'Foupoua', 'moustapha', 'info@nfestructural.com', '5507341634', 'utilisateur', '8cb2237d0679ca88db6464eac60da96345513964', 'moustapha.jpeg'),
(37, 'Foupoua', 'moustapha', 'mbakop334@gmail.com', '5507341634', 'utilisateur', '8cb2237d0679ca88db6464eac60da96345513964', 'moustapha.jpg'),
(38, 'MAWED', 'moustapha', 'info@cvnfestructural.com', '5507341634', 'utilisateur', '8cb2237d0679ca88db6464eac60da96345513964', 'moustapha.jpg'),
(39, 'Foupoua', 'moustapha', 'info@nfestructuralA.com', '48967985734', 'utilisateur', '8cb2237d0679ca88db6464eac60da96345513964', 'moustapha.png'),
(40, 'Foupoua', 'moustapha', 'info@nfestructuralSS.com', '48967985734', 'utilisateur', '8cb2237d0679ca88db6464eac60da96345513964', 'moustapha.jpg'),
(42, 'MAI', 'steven', 'mai@yahoo.fr', '6537648798', 'utilisateur', '8cb2237d0679ca88db6464eac60da96345513964', 'steven.jpg'),
(44, 'mboukeu', 'vieri', 'mboukeuv@gmail.com', '651053559', 'utilisateur', 'a2b6d48d5647e5ce677559255d8af8a23a9b7b80', 'vieri.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
