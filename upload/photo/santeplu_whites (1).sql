-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 07 juil. 2020 à 14:39
-- Version du serveur :  5.7.28
-- Version de PHP : 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `santeplu_whites`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `idcommentaire` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `message` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `idinfo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`idcommentaire`, `id_user`, `message`, `created_at`, `idinfo`) VALUES
(1, 1, 'merci pour  ça', '2020-05-31 14:59:10', 2),
(2, 1, 'ouais! ', '2020-05-31 14:59:45', 1),
(3, 3, 'merci beaucoup full stack patrôna', '2020-05-31 15:06:11', 2),
(4, 4, 'Vraiment tres importante formation          \r\n                                                  ', '2020-05-31 17:16:09', 2),
(5, 4, '                                                    Super!                                 ', '2020-06-11 11:09:31', 3);

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
  `idcours` int(11) NOT NULL,
  `nomcours` varchar(700) DEFAULT NULL,
  `description` text,
  `image` varchar(300) DEFAULT NULL,
  `niveau` varchar(300) DEFAULT NULL,
  `idformation` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`idcours`, `nomcours`, `description`, `image`, `niveau`, `idformation`, `created_at`) VALUES
(1, 'Ajax', 'Ajax est une architecture informatique qui permet de construire des applications Web et des sites web dynamiques interactifs sur le poste client en se servant de différentes technologies ajoutées aux navigateurs web entre 1995 et 2005. Ajax est l\'acronyme d\'asynchronous JavaScript and XML : JavaScript et XML asynchrones.\r\n\r\nAjax combine JavaScript et DOM, qui permettent de modifier l\'information présentée dans le navigateur en respectant sa structure, les API Fetch et XMLHttpRequest, qui servent au dialogue asynchrone avec le serveur Web ; ainsi qu\'un format de données (XML ou JSON), afin d\'améliorer maniabilité et confort d\'utilisation des applications internet riches. XML, cité dans l\'acronyme, était historiquement le moyen privilégié pour structurer les informations transmises entre serveur Web et navigateur, de nos jours le JSON tend à le remplacer pour cet usage.\r\n\r\nL\'usage d\'Ajax fonctionne sur tous les navigateurs Web courants : Google Chrome, Safari, Mozilla Firefox, Internet Explorer, Microsoft Edge, Opera, etc.', '1811808854.png', 'moyen', 4, '2020-06-01 17:04:09'),
(2, 'Jquery', 'jQuery est une bibliothèque JavaScript libre et multiplateforme créée pour faciliter l\'écriture de scripts côté client dans le code HTML des pages web2. La première version est lancée en janvier 2006 par John Resig.\r\n\r\nLe but de la bibliothèque étant le parcours et la modification du DOM (y compris le support des sélecteurs CSS 1 à 3 et un support basique de XPath), elle contient de nombreuses fonctionnalités ; notamment des animations, la manipulation des feuilles de style en cascade (accessibilité des classes et attributs), la gestion des évènements, etc. L\'utilisation d\'Ajax est facilitée et de nombreux plugins sont présents.\r\n\r\nDepuis sa création en 2006 et notamment à cause de la complexification croissante des interfaces Web, jQuery a connu un large succès auprès des développeurs Web et son apprentissage est aujourd\'hui un des fondamentaux de la formation aux technologies du Web. Il est à l\'heure actuelle la bibliothèque front-end la plus utilisée au monde (plus de la moitié des sites Internet en ligne intègrent jQuery).\r\n\r\nCependant, son utilisation devient moins pertinente avec l\'émergence de nouvelles bibliothèques telles que React (JavaScript) et Vue.js qui la remplacent dans la construction d\'Application web monopage.', '2079787745.png', 'moyen', 4, '2020-06-01 17:04:43'),
(3, 'laravel', 'Laravel\r\nSauter à la navigationSauter à la recherche\r\nLaravel\r\nDescription de l\'image LaravelLogo.png.\r\nDescription de l\'image Laravel post-install screen.png.\r\nInformations\r\nCréateur	Taylor Otwell\r\nDéveloppé par	Équipe de développement Laravel\r\nPremière version	15 juin 2011\r\nDernière version	7.9 (28 avril 2020)\r\nDépôt	github.com/laravel/laravel\r\nAssurance qualité	Intégration continue\r\nÉcrit en	PHP\r\nSystème d\'exploitation	Multiplateforme\r\nEnvironnement	Multiplate-forme\r\nLangues	Multilingue\r\nType	Framework\r\nLicence	MIT\r\nSite web	laravel.com\r\nmodifier - modifier le code - voir Wikidata (aide)Consultez la documentation du modèle\r\n\r\nLaravel est un framework web open-source écrit en PHP1 respectant le principe modèle-vue-contrôleur et entièrement développé en programmation orientée objet. Laravel est distribué sous licence MIT, avec ses sources hébergées sur GitHub.\r\n\r\nLaravel a été créé par Taylor Otwell en juin 20112.\r\n\r\nLe référentiel Laravel/laravel présent sur le site GitHub contient le code source des premières versions de Laravel. À partir de la cinquième version, le framework est développé au sein du référentiel Laravel/framework.\r\n\r\nEn peu de temps, une communauté d\'utilisateurs du framework s\'est constituée1, et il est devenu en 2016 le projet PHP le mieux noté de GitHub3.\r\n\r\nLaravel reste pourtant basé sur son grand frère Symfony, pour au moins 30 % de ses lignes (utilisation de \"Symfony component\")4.', '1672293076.png', 'professionnele', 4, '2020-06-08 14:28:32'),
(5, 'Bonjour voulez-vous apprendre le C#', 'Le C# est un language de programmation develloppant plus des applications multiples', '1337135028.jpg', 'professionnele', 3, '2020-06-11 11:15:47');

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE `evenement` (
  `id` int(11) NOT NULL,
  `message` text,
  `debit_event` date DEFAULT NULL,
  `fin_event` date DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`id`, `message`, `debit_event`, `fin_event`, `created_at`) VALUES
(1, 'la poo de PHP', '2020-06-01', '2020-06-05', '2020-05-31 14:55:51'),
(2, 'POO DE JAVA', '2020-06-02', '2020-06-12', '2020-06-02 03:52:01'),
(3, '			POO DE C#				\r\n						', '2020-06-02', '2020-06-12', '2020-06-02 03:52:38');

-- --------------------------------------------------------

--
-- Structure de la table `favories`
--

CREATE TABLE `favories` (
  `idfovorie` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `idcours` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `favories`
--

INSERT INTO `favories` (`idfovorie`, `id_user`, `idcours`, `created_at`) VALUES
(1, 1, 1, '2020-06-01 17:17:14'),
(2, 28, 3, '2020-06-28 12:35:58'),
(3, 28, 3, '2020-06-28 12:36:50');

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE `formation` (
  `idformation` int(11) NOT NULL,
  `nomformation` varchar(800) DEFAULT NULL,
  `description` text,
  `image` varchar(300) DEFAULT NULL,
  `iduser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`idformation`, `nomformation`, `description`, `image`, `iduser`) VALUES
(2, 'Programmation A Java', 'Venez vivre la programmation avec une bonne technologie  tres avancée avec Java\r\n                          ', '1754390552.png', NULL),
(3, 'Programmation  A  C#', 'Vener Expérimenté Plus d\'experiences avec C# Vous etes le Bienvenue                          	\r\n                          ', '1578952613.jpg', NULL),
(4, 'Programmation de site web', 'Vous voulez crées et administrées des bon site web    venez a White-Fondation                       	\r\n                         ', '340529539.jpg', NULL),
(5, 'Programmation En Android', 'Vener apprendre une nouvelle technologie avec le devellopément android                         	\r\n                          ', '259277693.png', NULL),
(6, 'Venez apprendre la cartographie ', 'Vous voulez     connaitre comment crée la Carte d\'une Région  Venez à white-fondation                 	\r\n                          ', '1920991071.png', NULL),
(7, 'Géolocalisation', 'Venez Profités plus la formation comment reperé une region                          	\r\n                          ', '345207171.jpg', NULL),
(8, 'Sécurité Informatique', 'Pérfectionnez Plus la Securité Informatique de votre Entreprise Venez suivre la Formation  à white-fondation                 	\r\n                          ', '464819367.jpg', NULL),
(9, 'Analyse des Systeme des Informations ( MAI ET UML)', 'Venez suivre la Formation En Analyse de Système d\'information d\'une Entreprise Privée ou Public                          	\r\n                          ', '1897232369.png', NULL),
(10, 'Administration de Base de donnée Rélationnelle', 'Venez apprendre  Comment Créer et Administrer une Base de donnée Rélationnelle(SQL SERVEUR,MYSQL....)                          	\r\n                          ', '1327958282.jpg', NULL),
(11, 'Programmation VB.NET', 'Venez apprendre  Comment creer des Applications avec VB.NET\r\n                          ', '1994773885.png', NULL),
(12, 'Design ', 'Venez apprendre comment faire de Bon Design avec Photoshop,Illustrator.....(Carte,Document,Animation,Logo,Photo...                          	\r\n                          ', '1601398247.jpg', NULL),
(13, 'Bureautique ', 'Venez Comprendre   L\'administration de Bureaux avec le Microsoft Office(EXCEL,WORD,POWERPOINT,COBO,ODK,ACCESS....)                        	\r\n                          ', '166839434.png', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `information`
--

CREATE TABLE `information` (
  `idinfo` int(11) NOT NULL,
  `titre` varchar(900) DEFAULT NULL,
  `message` text,
  `image` varchar(300) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `information`
--

INSERT INTO `information` (`idinfo`, `titre`, `message`, `image`, `created_at`) VALUES
(1, 'nos sincères encouragements aux apprenants de le programmation web', 'nos sincères encouragements aux apprenants de le programmation web pour leur application de formation en ligne', '959375406.jpg', '2020-05-31 14:54:46'),
(2, 'félicitation', 'nos sincères encouragements aussi aux apprenants de le programmation desktop pour leur application supermarché', '710431597.jpg', '2020-05-31 14:58:23'),
(3, 'Nos Apprénants!!', 'Nous sommes au cours  de la fin de la Prémiere Edition déjà vers le 25/06/2020 venez voir l\'explosive démonstration  des applications(logiçiels) Créer par nos Ingenieurs Programmeurs Apprénants de white-fondation!  Si vous êtes interéssés Venez-vous être Formés! Pas d\'Ecrire sur papié mais Programmé toi même dans l\'ordinateur et Profité de la logique pour interpreter toi-même tes codes!! Déjà le 15/06/2020 au 27/06/2020 nous Proçedérons  par les Inscriptions de la 2eme Edition Vener Etre formé!!!', '1750703908.png', '2020-06-02 03:21:11');

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE `inscription` (
  `idinscription` int(11) NOT NULL,
  `idformation` int(11) DEFAULT NULL,
  `iduser` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `lesson`
--

CREATE TABLE `lesson` (
  `idlesson` int(11) NOT NULL,
  `titre` varchar(800) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `fichier` varchar(300) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `idsection` int(11) DEFAULT NULL,
  `type_fichier` varchar(900) DEFAULT NULL,
  `code` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `lesson`
--

INSERT INTO `lesson` (`idlesson`, `titre`, `description`, `fichier`, `created_at`, `idsection`, `type_fichier`, `code`) VALUES
(1, 'XMLHttpRequest', 'XMLHttpRequest (souvent abrégé XHR) est un objet du navigateur accessible en JavaScript qui permet d\'obtenir des données au format XML, JSON, mais aussi HTML, ou même un simple texte à l\'aide de requêtes HTTP.', '1333726620.mp4', '2020-06-01 17:15:20', 1, 'VIDEO', 'beaab8a45e');

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

CREATE TABLE `likes` (
  `idlike` int(11) NOT NULL,
  `idinfo` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `nombre` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `likes`
--

INSERT INTO `likes` (`idlike`, `idinfo`, `id_user`, `nombre`) VALUES
(2, 1, 1, 0),
(3, 2, 4, 0),
(4, 1, 11, 0),
(5, 2, NULL, 0),
(6, 2, 8, 0),
(7, 1, NULL, 0),
(8, 1, 8, 0),
(10, 3, 11, 0),
(12, 3, 21, 0),
(13, 3, 4, 0),
(14, 3, 25, 0);

-- --------------------------------------------------------

--
-- Structure de la table `messagerie`
--

CREATE TABLE `messagerie` (
  `idmessage` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_recever` int(11) DEFAULT NULL,
  `message` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `code` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `messagerie`
--

INSERT INTO `messagerie` (`idmessage`, `id_user`, `id_recever`, `message`, `created_at`, `code`) VALUES
(1, 8, 7, '	Bonjour !!			                  		\r\n						                  	', '2020-06-01 13:03:30', '3bd890af91'),
(2, 1, 4, 'salut honnoré! essaie un peu de vérifier tes orthographes stp!', '2020-06-01 17:02:22', '67cfb698fe'),
(3, 4, 7, 'Bsr Vous allez bien?				                  	', '2020-06-01 22:39:24', '9a7d932ce6'),
(4, 4, 1, 'Ok D\'accord!!!		                  	', '2020-06-01 23:10:15', '8ce2269c66'),
(5, 4, 1, '		J\'ai essayé hier d\'enregistré le cours ça refusé c\'etait quoi le problème??		                  		\r\n						                  	', '2020-06-01 23:12:23', '79dc4f20ce'),
(6, 11, 1, '				                  		\r\n						             Salut  frère    	', '2020-06-02 00:32:09', '51fc538120'),
(7, 4, 8, '				                  		\r\n			Ça marche Felix?			                  	', '2020-06-02 03:24:33', 'f1f557107a'),
(8, 4, 11, '		Bsr ça marche?		                  		\r\n						                  	', '2020-06-02 03:27:22', '31a36ed6c9'),
(9, 4, 1, '	Il faut que la création de puisse etre unique!!! Je vois dejà deux comptes crées	                  		\r\n						                  	', '2020-06-02 03:29:12', '87b874aeb8'),
(10, 4, 14, '		Bonjour fred?		                  		\r\n						                  	', '2020-06-02 14:06:19', '9d2fcd0dfd'),
(11, 1, 4, 'je ne sais pas. mais chez moi ça belle bien passé\r\n', '2020-06-02 17:25:07', 'ad227deb96'),
(12, 11, 4, '				                  		\r\n						                  Ouais vraiment 	', '2020-06-02 18:48:59', '5d24f6043b'),
(13, 4, 11, '		Super		                  		\r\n						                  	', '2020-06-02 23:34:24', 'be5f3f8d6d'),
(14, 4, 1, '				                  		\r\n				Chez moi ça ne passe pas on me dit de remplir tous les champs horque j\'ai tous rempli parcequ\'il ya une diplication de nom de formation et les elements		                  	', '2020-06-03 11:54:15', '277a1e0444'),
(15, 4, 9, 'Bjr monsieur cva?		                  		\r\n						                  	', '2020-06-03 11:55:39', 'f349709559'),
(16, 4, 13, 'Bjr monsieur vous allez bien? Bienvenu à whitefondation !!!			                  	', '2020-06-03 11:57:23', 'b2777fe96b'),
(17, 4, 10, 'Bjr mukubwa cva ! Et bienvenu à whitefondation !!!				                  	', '2020-06-03 11:58:50', 'f2824d1747'),
(18, 22, 11, '				                  		\r\n						                  	bjr', '2020-06-03 18:39:39', '95599507c3'),
(19, 4, 23, 'Bsr mukubwa Evariste?? Vous allez bien			                  		\r\n						                  	', '2020-06-03 22:39:52', '8bc2ea1fac'),
(20, 1, 4, 'mais chez moi ça passe bien\r\n', '2020-06-04 19:27:48', '90ee5ba5dc'),
(21, 1, 11, 'oui salut monsieur strong. comment allez-vous ce dernier temps?\r\n', '2020-06-04 19:28:45', '452d3b49a2'),
(22, 25, 4, '				                  		\r\n		Mon CEO.Félicitation pour le boulot				                  	', '2020-06-17 16:17:08', '35a18a9195'),
(23, 1, 4, 'je manque les sms ce dernier temps honoré  comprenez surtout mon silence', '2020-06-22 18:35:06', '60b71a01f6'),
(24, 28, 4, '				              Bonjour it!    		\r\n						                  	', '2020-06-28 12:28:00', 'fb271ac46b');

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `message` varchar(800) DEFAULT NULL,
  `url` varchar(800) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `notification`
--

INSERT INTO `notification` (`id`, `message`, `url`, `id_user`, `created_at`) VALUES
(1, 'kasumba pindula a aimé commenté une publication', 'student/dashbord', 1, '2020-05-31 15:06:10'),
(2, 'kasumba pindula a aimé commenté une publication', 'student/dashbord', 2, '2020-05-31 15:06:10'),
(3, 'kasumba pindula a aimé commenté une publication', 'student/dashbord', 3, '2020-05-31 15:06:11'),
(4, 'Mugisa a aimé une publication', 'student/dashbord', 1, '2020-05-31 17:14:25'),
(5, 'Mugisa a aimé une publication', 'student/dashbord', 2, '2020-05-31 17:14:25'),
(6, 'Mugisa a aimé une publication', 'student/dashbord', 3, '2020-05-31 17:14:25'),
(8, 'Mugisa a aimé commenté une publication', 'student/dashbord', 1, '2020-05-31 17:16:09'),
(9, 'Mugisa a aimé commenté une publication', 'student/dashbord', 2, '2020-05-31 17:16:09'),
(10, 'Mugisa a aimé commenté une publication', 'student/dashbord', 3, '2020-05-31 17:16:09'),
(12, 'nouvelle leçon: XMLHttpRequest', 'cours/view/detail_lesson/beaab8a45e', 1, '2020-06-01 17:15:19'),
(13, 'nouvelle leçon: XMLHttpRequest', 'cours/view/detail_lesson/beaab8a45e', 2, '2020-06-01 17:15:19'),
(14, 'nouvelle leçon: XMLHttpRequest', 'cours/view/detail_lesson/beaab8a45e', 3, '2020-06-01 17:15:19'),
(16, 'nouvelle leçon: XMLHttpRequest', 'cours/view/detail_lesson/beaab8a45e', 5, '2020-06-01 17:15:19'),
(17, 'nouvelle leçon: XMLHttpRequest', 'cours/view/detail_lesson/beaab8a45e', 6, '2020-06-01 17:15:20'),
(18, 'nouvelle leçon: XMLHttpRequest', 'cours/view/detail_lesson/beaab8a45e', 7, '2020-06-01 17:15:20'),
(19, 'nouvelle leçon: XMLHttpRequest', 'cours/view/detail_lesson/beaab8a45e', 8, '2020-06-01 17:15:20'),
(20, 'nouvelle leçon: XMLHttpRequest', 'cours/view/detail_lesson/beaab8a45e', 9, '2020-06-01 17:15:20'),
(21, 'Abdiel a aimé une publication', 'student/dashbord', 1, '2020-06-01 19:48:34'),
(22, 'Abdiel a aimé une publication', 'student/dashbord', 2, '2020-06-01 19:48:34'),
(23, 'Abdiel a aimé une publication', 'student/dashbord', 3, '2020-06-01 19:48:34'),
(25, 'Abdiel a aimé une publication', 'student/dashbord', 5, '2020-06-01 19:48:34'),
(26, 'Abdiel a aimé une publication', 'student/dashbord', 6, '2020-06-01 19:48:34'),
(27, 'Abdiel a aimé une publication', 'student/dashbord', 7, '2020-06-01 19:48:34'),
(28, 'Abdiel a aimé une publication', 'student/dashbord', 8, '2020-06-01 19:48:34'),
(29, 'Abdiel a aimé une publication', 'student/dashbord', 9, '2020-06-01 19:48:34'),
(30, 'Abdiel a aimé une publication', 'student/dashbord', 10, '2020-06-01 19:48:34'),
(31, 'Abdiel a aimé une publication', 'student/dashbord', 11, '2020-06-01 19:48:34'),
(32, 'Ebondo a aimé une publication', 'student/dashbord', 1, '2020-06-02 00:51:22'),
(33, 'Ebondo a aimé une publication', 'student/dashbord', 2, '2020-06-02 00:51:22'),
(34, 'Ebondo a aimé une publication', 'student/dashbord', 3, '2020-06-02 00:51:22'),
(35, 'Ebondo a aimé une publication', 'student/dashbord', 4, '2020-06-02 00:51:22'),
(36, 'Ebondo a aimé une publication', 'student/dashbord', 5, '2020-06-02 00:51:22'),
(37, 'Ebondo a aimé une publication', 'student/dashbord', 6, '2020-06-02 00:51:22'),
(38, 'Ebondo a aimé une publication', 'student/dashbord', 7, '2020-06-02 00:51:22'),
(39, 'Ebondo a aimé une publication', 'student/dashbord', 8, '2020-06-02 00:51:23'),
(40, 'Ebondo a aimé une publication', 'student/dashbord', 9, '2020-06-02 00:51:23'),
(41, 'Ebondo a aimé une publication', 'student/dashbord', 10, '2020-06-02 00:51:23'),
(42, 'Ebondo a aimé une publication', 'student/dashbord', 11, '2020-06-02 00:51:23'),
(43, 'Ebondo a aimé une publication', 'student/dashbord', 1, '2020-06-02 00:51:49'),
(44, 'Ebondo a aimé une publication', 'student/dashbord', 2, '2020-06-02 00:51:49'),
(45, 'Ebondo a aimé une publication', 'student/dashbord', 3, '2020-06-02 00:51:49'),
(46, 'Ebondo a aimé une publication', 'student/dashbord', 4, '2020-06-02 00:51:49'),
(47, 'Ebondo a aimé une publication', 'student/dashbord', 5, '2020-06-02 00:51:49'),
(48, 'Ebondo a aimé une publication', 'student/dashbord', 6, '2020-06-02 00:51:49'),
(49, 'Ebondo a aimé une publication', 'student/dashbord', 7, '2020-06-02 00:51:49'),
(50, 'Ebondo a aimé une publication', 'student/dashbord', 8, '2020-06-02 00:51:49'),
(51, 'Ebondo a aimé une publication', 'student/dashbord', 9, '2020-06-02 00:51:49'),
(52, 'Ebondo a aimé une publication', 'student/dashbord', 10, '2020-06-02 00:51:49'),
(53, 'Ebondo a aimé une publication', 'student/dashbord', 11, '2020-06-02 00:51:49'),
(54, 'Mugisa a aimé une publication', 'admin/dashbord', 1, '2020-06-02 03:33:05'),
(55, 'Mugisa a aimé une publication', 'admin/dashbord', 2, '2020-06-02 03:33:05'),
(56, 'Mugisa a aimé une publication', 'admin/dashbord', 3, '2020-06-02 03:33:05'),
(57, 'Mugisa a aimé une publication', 'admin/dashbord', 4, '2020-06-02 03:33:05'),
(58, 'Mugisa a aimé une publication', 'admin/dashbord', 5, '2020-06-02 03:33:06'),
(59, 'Mugisa a aimé une publication', 'admin/dashbord', 6, '2020-06-02 03:33:06'),
(60, 'Mugisa a aimé une publication', 'admin/dashbord', 7, '2020-06-02 03:33:06'),
(61, 'Mugisa a aimé une publication', 'admin/dashbord', 8, '2020-06-02 03:33:06'),
(62, 'Mugisa a aimé une publication', 'admin/dashbord', 9, '2020-06-02 03:33:06'),
(63, 'Mugisa a aimé une publication', 'admin/dashbord', 10, '2020-06-02 03:33:06'),
(64, 'Mugisa a aimé une publication', 'admin/dashbord', 11, '2020-06-02 03:33:06'),
(65, 'Mugisa a aimé une publication', 'admin/dashbord', 12, '2020-06-02 03:33:06'),
(66, 'Abdiel a aimé une publication', 'student/dashbord', 1, '2020-06-02 18:48:16'),
(67, 'Abdiel a aimé une publication', 'student/dashbord', 2, '2020-06-02 18:48:16'),
(68, 'Abdiel a aimé une publication', 'student/dashbord', 3, '2020-06-02 18:48:19'),
(69, 'Abdiel a aimé une publication', 'student/dashbord', 4, '2020-06-02 18:48:19'),
(70, 'Abdiel a aimé une publication', 'student/dashbord', 5, '2020-06-02 18:48:20'),
(71, 'Abdiel a aimé une publication', 'student/dashbord', 6, '2020-06-02 18:48:20'),
(72, 'Abdiel a aimé une publication', 'student/dashbord', 7, '2020-06-02 18:48:20'),
(73, 'Abdiel a aimé une publication', 'student/dashbord', 8, '2020-06-02 18:48:20'),
(74, 'Abdiel a aimé une publication', 'student/dashbord', 9, '2020-06-02 18:48:20'),
(75, 'Abdiel a aimé une publication', 'student/dashbord', 10, '2020-06-02 18:48:20'),
(76, 'Abdiel a aimé une publication', 'student/dashbord', 11, '2020-06-02 18:48:20'),
(77, 'Abdiel a aimé une publication', 'student/dashbord', 12, '2020-06-02 18:48:20'),
(78, 'Abdiel a aimé une publication', 'student/dashbord', 13, '2020-06-02 18:48:20'),
(79, 'Abdiel a aimé une publication', 'student/dashbord', 14, '2020-06-02 18:48:20'),
(80, 'Abdiel a aimé une publication', 'student/dashbord', 15, '2020-06-02 18:48:20'),
(81, 'Abdiel a aimé une publication', 'student/dashbord', 16, '2020-06-02 18:48:21'),
(82, 'Abdiel a aimé une publication', 'student/dashbord', 17, '2020-06-02 18:48:21'),
(83, 'Abdiel a aimé une publication', 'student/dashbord', 18, '2020-06-02 18:48:21'),
(84, 'Abdiel a aimé une publication', 'student/dashbord', 19, '2020-06-02 18:48:21'),
(85, 'Abdiel a aimé une publication', 'student/dashbord', 20, '2020-06-02 18:48:21'),
(86, 'Mugisa a aimé une publication', 'admin/dashbord', 1, '2020-06-02 23:29:47'),
(87, 'Mugisa a aimé une publication', 'admin/dashbord', 2, '2020-06-02 23:29:47'),
(88, 'Mugisa a aimé une publication', 'admin/dashbord', 3, '2020-06-02 23:29:47'),
(89, 'Mugisa a aimé une publication', 'admin/dashbord', 4, '2020-06-02 23:29:47'),
(90, 'Mugisa a aimé une publication', 'admin/dashbord', 5, '2020-06-02 23:29:47'),
(91, 'Mugisa a aimé une publication', 'admin/dashbord', 6, '2020-06-02 23:29:47'),
(92, 'Mugisa a aimé une publication', 'admin/dashbord', 7, '2020-06-02 23:29:47'),
(93, 'Mugisa a aimé une publication', 'admin/dashbord', 8, '2020-06-02 23:29:47'),
(94, 'Mugisa a aimé une publication', 'admin/dashbord', 9, '2020-06-02 23:29:47'),
(95, 'Mugisa a aimé une publication', 'admin/dashbord', 10, '2020-06-02 23:29:47'),
(96, 'Mugisa a aimé une publication', 'admin/dashbord', 11, '2020-06-02 23:29:47'),
(97, 'Mugisa a aimé une publication', 'admin/dashbord', 12, '2020-06-02 23:29:48'),
(98, 'Mugisa a aimé une publication', 'admin/dashbord', 13, '2020-06-02 23:29:48'),
(99, 'Mugisa a aimé une publication', 'admin/dashbord', 14, '2020-06-02 23:29:48'),
(100, 'Mugisa a aimé une publication', 'admin/dashbord', 15, '2020-06-02 23:29:48'),
(101, 'Mugisa a aimé une publication', 'admin/dashbord', 16, '2020-06-02 23:29:48'),
(102, 'Mugisa a aimé une publication', 'admin/dashbord', 17, '2020-06-02 23:29:48'),
(103, 'Mugisa a aimé une publication', 'admin/dashbord', 18, '2020-06-02 23:29:48'),
(104, 'Mugisa a aimé une publication', 'admin/dashbord', 19, '2020-06-02 23:29:48'),
(105, 'Mugisa a aimé une publication', 'admin/dashbord', 20, '2020-06-02 23:29:48'),
(106, 'Lomudi a aimé une publication', 'student/dashbord', 1, '2020-06-03 01:45:04'),
(107, 'Lomudi a aimé une publication', 'student/dashbord', 2, '2020-06-03 01:45:04'),
(108, 'Lomudi a aimé une publication', 'student/dashbord', 3, '2020-06-03 01:45:04'),
(109, 'Lomudi a aimé une publication', 'student/dashbord', 4, '2020-06-03 01:45:04'),
(110, 'Lomudi a aimé une publication', 'student/dashbord', 5, '2020-06-03 01:45:04'),
(111, 'Lomudi a aimé une publication', 'student/dashbord', 6, '2020-06-03 01:45:04'),
(112, 'Lomudi a aimé une publication', 'student/dashbord', 7, '2020-06-03 01:45:04'),
(113, 'Lomudi a aimé une publication', 'student/dashbord', 8, '2020-06-03 01:45:04'),
(114, 'Lomudi a aimé une publication', 'student/dashbord', 9, '2020-06-03 01:45:05'),
(115, 'Lomudi a aimé une publication', 'student/dashbord', 10, '2020-06-03 01:45:05'),
(116, 'Lomudi a aimé une publication', 'student/dashbord', 11, '2020-06-03 01:45:05'),
(117, 'Lomudi a aimé une publication', 'student/dashbord', 12, '2020-06-03 01:45:05'),
(118, 'Lomudi a aimé une publication', 'student/dashbord', 13, '2020-06-03 01:45:05'),
(119, 'Lomudi a aimé une publication', 'student/dashbord', 14, '2020-06-03 01:45:05'),
(120, 'Lomudi a aimé une publication', 'student/dashbord', 15, '2020-06-03 01:45:05'),
(121, 'Lomudi a aimé une publication', 'student/dashbord', 16, '2020-06-03 01:45:05'),
(122, 'Lomudi a aimé une publication', 'student/dashbord', 17, '2020-06-03 01:45:05'),
(123, 'Lomudi a aimé une publication', 'student/dashbord', 18, '2020-06-03 01:45:05'),
(124, 'Lomudi a aimé une publication', 'student/dashbord', 19, '2020-06-03 01:45:05'),
(125, 'Lomudi a aimé une publication', 'student/dashbord', 20, '2020-06-03 01:45:05'),
(126, 'Lomudi a aimé une publication', 'student/dashbord', 21, '2020-06-03 01:45:05'),
(127, 'Mugisa a aimé commenté une publication', 'admin/dashbord', 1, '2020-06-11 11:09:30'),
(128, 'Mugisa a aimé commenté une publication', 'admin/dashbord', 2, '2020-06-11 11:09:30'),
(129, 'Mugisa a aimé commenté une publication', 'admin/dashbord', 3, '2020-06-11 11:09:30'),
(130, 'Mugisa a aimé commenté une publication', 'admin/dashbord', 4, '2020-06-11 11:09:30'),
(131, 'Mugisa a aimé commenté une publication', 'admin/dashbord', 5, '2020-06-11 11:09:30'),
(132, 'Mugisa a aimé commenté une publication', 'admin/dashbord', 6, '2020-06-11 11:09:30'),
(133, 'Mugisa a aimé commenté une publication', 'admin/dashbord', 7, '2020-06-11 11:09:30'),
(134, 'Mugisa a aimé commenté une publication', 'admin/dashbord', 8, '2020-06-11 11:09:30'),
(135, 'Mugisa a aimé commenté une publication', 'admin/dashbord', 9, '2020-06-11 11:09:30'),
(136, 'Mugisa a aimé commenté une publication', 'admin/dashbord', 10, '2020-06-11 11:09:30'),
(137, 'Mugisa a aimé commenté une publication', 'admin/dashbord', 11, '2020-06-11 11:09:30'),
(138, 'Mugisa a aimé commenté une publication', 'admin/dashbord', 12, '2020-06-11 11:09:30'),
(139, 'Mugisa a aimé commenté une publication', 'admin/dashbord', 13, '2020-06-11 11:09:30'),
(140, 'Mugisa a aimé commenté une publication', 'admin/dashbord', 14, '2020-06-11 11:09:30'),
(141, 'Mugisa a aimé commenté une publication', 'admin/dashbord', 15, '2020-06-11 11:09:30'),
(142, 'Mugisa a aimé commenté une publication', 'admin/dashbord', 16, '2020-06-11 11:09:30'),
(143, 'Mugisa a aimé commenté une publication', 'admin/dashbord', 17, '2020-06-11 11:09:31'),
(144, 'Mugisa a aimé commenté une publication', 'admin/dashbord', 18, '2020-06-11 11:09:31'),
(145, 'Mugisa a aimé commenté une publication', 'admin/dashbord', 19, '2020-06-11 11:09:31'),
(146, 'Mugisa a aimé commenté une publication', 'admin/dashbord', 20, '2020-06-11 11:09:31'),
(147, 'Mugisa a aimé commenté une publication', 'admin/dashbord', 21, '2020-06-11 11:09:31'),
(148, 'Mugisa a aimé commenté une publication', 'admin/dashbord', 22, '2020-06-11 11:09:31'),
(149, 'Mugisa a aimé commenté une publication', 'admin/dashbord', 23, '2020-06-11 11:09:31'),
(150, 'Mugisa a aimé commenté une publication', 'admin/dashbord', 24, '2020-06-11 11:09:31'),
(151, 'Mugisa a aimé une publication', 'admin/dashbord', 1, '2020-06-11 11:09:46'),
(152, 'Mugisa a aimé une publication', 'admin/dashbord', 2, '2020-06-11 11:09:46'),
(153, 'Mugisa a aimé une publication', 'admin/dashbord', 3, '2020-06-11 11:09:46'),
(154, 'Mugisa a aimé une publication', 'admin/dashbord', 4, '2020-06-11 11:09:46'),
(155, 'Mugisa a aimé une publication', 'admin/dashbord', 5, '2020-06-11 11:09:46'),
(156, 'Mugisa a aimé une publication', 'admin/dashbord', 6, '2020-06-11 11:09:46'),
(157, 'Mugisa a aimé une publication', 'admin/dashbord', 7, '2020-06-11 11:09:46'),
(158, 'Mugisa a aimé une publication', 'admin/dashbord', 8, '2020-06-11 11:09:46'),
(159, 'Mugisa a aimé une publication', 'admin/dashbord', 9, '2020-06-11 11:09:46'),
(160, 'Mugisa a aimé une publication', 'admin/dashbord', 10, '2020-06-11 11:09:46'),
(161, 'Mugisa a aimé une publication', 'admin/dashbord', 11, '2020-06-11 11:09:46'),
(162, 'Mugisa a aimé une publication', 'admin/dashbord', 12, '2020-06-11 11:09:46'),
(163, 'Mugisa a aimé une publication', 'admin/dashbord', 13, '2020-06-11 11:09:46'),
(164, 'Mugisa a aimé une publication', 'admin/dashbord', 14, '2020-06-11 11:09:46'),
(165, 'Mugisa a aimé une publication', 'admin/dashbord', 15, '2020-06-11 11:09:46'),
(166, 'Mugisa a aimé une publication', 'admin/dashbord', 16, '2020-06-11 11:09:46'),
(167, 'Mugisa a aimé une publication', 'admin/dashbord', 17, '2020-06-11 11:09:46'),
(168, 'Mugisa a aimé une publication', 'admin/dashbord', 18, '2020-06-11 11:09:46'),
(169, 'Mugisa a aimé une publication', 'admin/dashbord', 19, '2020-06-11 11:09:46'),
(170, 'Mugisa a aimé une publication', 'admin/dashbord', 20, '2020-06-11 11:09:46'),
(171, 'Mugisa a aimé une publication', 'admin/dashbord', 21, '2020-06-11 11:09:46'),
(172, 'Mugisa a aimé une publication', 'admin/dashbord', 22, '2020-06-11 11:09:46'),
(173, 'Mugisa a aimé une publication', 'admin/dashbord', 23, '2020-06-11 11:09:46'),
(174, 'Mugisa a aimé une publication', 'admin/dashbord', 24, '2020-06-11 11:09:46'),
(175, 'Aza a aimé une publication', 'student/dashbord', 1, '2020-06-17 16:30:35'),
(176, 'Aza a aimé une publication', 'student/dashbord', 2, '2020-06-17 16:30:35'),
(177, 'Aza a aimé une publication', 'student/dashbord', 3, '2020-06-17 16:30:35'),
(178, 'Aza a aimé une publication', 'student/dashbord', 4, '2020-06-17 16:30:35'),
(179, 'Aza a aimé une publication', 'student/dashbord', 5, '2020-06-17 16:30:35'),
(180, 'Aza a aimé une publication', 'student/dashbord', 6, '2020-06-17 16:30:35'),
(181, 'Aza a aimé une publication', 'student/dashbord', 7, '2020-06-17 16:30:35'),
(182, 'Aza a aimé une publication', 'student/dashbord', 8, '2020-06-17 16:30:35'),
(183, 'Aza a aimé une publication', 'student/dashbord', 9, '2020-06-17 16:30:35'),
(184, 'Aza a aimé une publication', 'student/dashbord', 10, '2020-06-17 16:30:35'),
(185, 'Aza a aimé une publication', 'student/dashbord', 11, '2020-06-17 16:30:35'),
(186, 'Aza a aimé une publication', 'student/dashbord', 12, '2020-06-17 16:30:35'),
(187, 'Aza a aimé une publication', 'student/dashbord', 13, '2020-06-17 16:30:35'),
(188, 'Aza a aimé une publication', 'student/dashbord', 14, '2020-06-17 16:30:35'),
(189, 'Aza a aimé une publication', 'student/dashbord', 15, '2020-06-17 16:30:35'),
(190, 'Aza a aimé une publication', 'student/dashbord', 16, '2020-06-17 16:30:35'),
(191, 'Aza a aimé une publication', 'student/dashbord', 17, '2020-06-17 16:30:35'),
(192, 'Aza a aimé une publication', 'student/dashbord', 18, '2020-06-17 16:30:35'),
(193, 'Aza a aimé une publication', 'student/dashbord', 19, '2020-06-17 16:30:35'),
(194, 'Aza a aimé une publication', 'student/dashbord', 20, '2020-06-17 16:30:35'),
(195, 'Aza a aimé une publication', 'student/dashbord', 21, '2020-06-17 16:30:35'),
(196, 'Aza a aimé une publication', 'student/dashbord', 22, '2020-06-17 16:30:35'),
(197, 'Aza a aimé une publication', 'student/dashbord', 23, '2020-06-17 16:30:35'),
(198, 'Aza a aimé une publication', 'student/dashbord', 24, '2020-06-17 16:30:35'),
(199, 'Aza a aimé une publication', 'student/dashbord', 25, '2020-06-17 16:30:35');

-- --------------------------------------------------------

--
-- Structure de la table `online`
--

CREATE TABLE `online` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `online`
--

INSERT INTO `online` (`id`, `id_user`, `created_at`) VALUES
(59, 27, '2020-06-24 04:09:55');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `profile_cours`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `profile_cours` (
`idcours` int(11)
,`nomcours` varchar(700)
,`description` text
,`image` varchar(300)
,`niveau` varchar(300)
,`nomformation` varchar(800)
,`created_at` datetime
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `profile_favories`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `profile_favories` (
`idfovorie` int(11)
,`idcours` int(11)
,`created_at` datetime
,`nomcours` varchar(700)
,`image` varchar(300)
,`id_user` int(11)
);

-- --------------------------------------------------------

--
-- Structure de la table `profile_lesson`
--

CREATE TABLE `profile_lesson` (
  `idlesson` int(11) DEFAULT NULL,
  `titre` varchar(800) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `fichier` varchar(300) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `idsection` int(11) DEFAULT NULL,
  `type_fichier` varchar(900) DEFAULT NULL,
  `chapitre` varchar(800) DEFAULT NULL,
  `nomcours` varchar(700) DEFAULT NULL,
  `niveau` varchar(300) DEFAULT NULL,
  `image` varchar(300) DEFAULT NULL,
  `nomformation` varchar(800) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `profile_lesson2`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `profile_lesson2` (
`idlesson` int(11)
,`code` longtext
,`titre` varchar(800)
,`description` varchar(300)
,`fichier` varchar(300)
,`created_at` datetime
,`idsection` int(11)
,`type_fichier` varchar(900)
,`chapitre` varchar(800)
,`nomcours` varchar(700)
,`niveau` varchar(300)
,`image` varchar(300)
,`nomformation` varchar(800)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `profile_online`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `profile_online` (
`reference` int(11)
,`id_user` int(11)
,`created_at` datetime
,`first_name` varchar(300)
,`last_name` varchar(300)
,`image` varchar(300)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `profile_section`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `profile_section` (
`idsection` int(11)
,`titre` varchar(800)
,`nomcours` varchar(700)
,`description` text
,`created_at` datetime
);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `idrole` int(11) NOT NULL,
  `fonction` varchar(300) DEFAULT NULL,
  `token` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `section`
--

CREATE TABLE `section` (
  `idsection` int(11) NOT NULL,
  `titre` varchar(800) DEFAULT NULL,
  `idcours` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `section`
--

INSERT INTO `section` (`idsection`, `titre`, `idcours`) VALUES
(1, 'programmation et ajax', 1),
(2, 'Chap1: Introduction C#', 5);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(300) DEFAULT NULL,
  `last_name` varchar(300) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `image` varchar(300) DEFAULT NULL,
  `telephone` varchar(300) DEFAULT NULL,
  `full_adresse` text,
  `biographie` text,
  `date_nais` date DEFAULT NULL,
  `passwords` varchar(300) DEFAULT NULL,
  `idrole` int(11) DEFAULT NULL,
  `sexe` varchar(30) DEFAULT NULL,
  `temoignage1` text,
  `temoignage2` text,
  `temoignage3` text,
  `temoignage4` text,
  `temoignage5` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `image`, `telephone`, `full_adresse`, `biographie`, `date_nais`, `passwords`, `idrole`, `sexe`, `temoignage1`, `temoignage2`, `temoignage3`, `temoignage4`, `temoignage5`) VALUES
(1, 'patrôna shabani', 'sumaili', 'sumailiroger681@gmail.com', '76026601.JPG', '0817883541', 'rdc goma', '                                                          	on ne code pas pour son pays ni même pour les entreprises mais on code pour sois même en priorité; et quand on est forcé de le faire codons comme on respire                                                          ', '1998-08-12', '86ff097ee2b6522634f4922c0601e520', 1, 'M', NULL, NULL, NULL, NULL, NULL),
(2, 'honore', 'honore', 'honore@gmail.com', '2088237462.jpg', NULL, NULL, NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'kasumba pindula', 'bertin', 'kasumba@gmail.com', '1920017164.JPG', NULL, NULL, NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Mugisa', 'Honore', 'honoremugisa1995@gmail.com', '282603696.jpg', NULL, NULL, NULL, NULL, '62de9a39c09420e8a5ed64c72fe7f480', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Admin', 'Adm', 'admin@gmail.com', '435191108.jpeg', NULL, NULL, NULL, NULL, '92f969b833dce9ca16951b1061f79c81', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Muderhwa', 'Thierry', 'thiesar.mude@gmail.com', '1440120547.jpeg', NULL, NULL, NULL, NULL, 'acecfe0271bbc95009df177e686273c3', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'admin', 'vulembere', 'willsonantoine@gmail.com', '1014684542.jpg', NULL, NULL, NULL, NULL, 'e807f1fcf82d132f9bb018ca6738a19f', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'Ebondo', 'Félix', 'ebondofelix4@gmail.com', '1035418505.jpg', NULL, NULL, NULL, NULL, 'd847833028fb9ce1e79fb9d8709eb98d', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'Ramsey', 'Utshudi', 'ramseyutshudi16@gmail.com', '304097720.jpg', NULL, NULL, NULL, NULL, '26c5054755e6daedbb65b75ea1e28097', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Muhindo', 'Patriarche', 'muhindopatriarche2@gmail.com', '173041281.', NULL, NULL, NULL, NULL, '198e17454c8587434288108b5f80a883', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'Abdiel', 'Kisumba', 'strongabdiel@gmail.com', '1566917206.JPG', NULL, NULL, NULL, NULL, '7e58951f99352e53a23f8d0eb996acca', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'Mustapha', 'Albert', 'mustaphakamangu@gmail.com', '152412467.jpeg', NULL, NULL, NULL, NULL, 'f73f8a691c9eef09b71b65a9cbe7b253', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'Maki', 'Héritier', 'mklonema@gmail.com', '1593203033.JPG', NULL, NULL, NULL, NULL, 'b68bbd14fbf6862cb663d2202c60d213', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'Fitumukiza', 'Fred', 'slypalfred1996@gmail.com', '478761823.jpeg', NULL, NULL, NULL, NULL, '0f3dee77631cff54804ffea5f462eac5', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'KASHEMWA', 'JOEL', 'kashemwajoe@gmail.com', '1941078846.jpg', NULL, NULL, NULL, NULL, '5ae81ab2c0573b3108bfc7338acbc3ba', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'Simon', 'lubango', 'simonluga@gmeil.com', '234786745.JPG', NULL, NULL, NULL, NULL, '6e329d49f16a58748a6bec539f9a573b', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'Tresor', 'ASSANI', 't.assani@yahoo.com', '571059898.JPG', NULL, NULL, NULL, NULL, '1703b7813ee6228f2ec6e0f9d61ae090', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'Lomudi', 'Erick', 'lomudis@gmail.com', '1601680815.jpeg', NULL, NULL, NULL, NULL, 'd92618a359f6c81de8b6f1ca6ceaded3', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'ORNELIE', 'KABELE', 'nellakabele@gmail.com', '448825238.JPG', NULL, NULL, NULL, NULL, 'c7c5925dc26fa3cd770dc22603275290', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'JAKWONG\'A', 'Millénaire', 'jakwongamillenaire@gmail.com', '1944106868.jpg', NULL, NULL, NULL, NULL, 'c8b76dc17de24c7fc971cb10caa0d417', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'Lomudi', 'Sadock', 'lomudis123@gmail.com', '320433181.jpeg', NULL, NULL, NULL, NULL, 'd92618a359f6c81de8b6f1ca6ceaded3', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'Henry', 'polepole', 'polepolehenry@gmail.com', '169837817.jpg', NULL, NULL, NULL, NULL, '892efc398f66b95976e8294c2fcf96cd', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'Mwema', 'Evariste', 'evaristemwema@gmail.com', '366653938.jpg', NULL, NULL, NULL, NULL, 'd872678b10bfc1e9b918656ab1d648cd', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'Kavira', 'Judith', 'kavirajdt@gmail.com', '1265406014.jpg', NULL, NULL, NULL, NULL, 'b5a889fb5a89a2b8c8b38b5d077388f8', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'Aza', 'Flory', 'floriosaza@gmail.com', '1795884616.png', NULL, NULL, NULL, NULL, '72e090af1ec6b1864b288b91596f1c94', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'sifa', 'abeli', 'sifa@gmail.com', '871582470.jpg', '0819891527', 'Ulpgl goma', '                                                          	                                                          	je suis belle de toute la famille                                                          ', '1999-06-22', 'e10adc3949ba59abbe56e057f20f883e', 2, 'F', 'oui', 'oui                                                          	                                                          ', 'oui                                                          	                                                          ', 'oui                                                          	                                                          ', 'oui                                                          	                                                          '),
(27, 'Mbilizi', 'Leon', 'leon.mbilizi@gmail.com', '198348615.', NULL, NULL, NULL, NULL, '1a802b5bd3cfd8687b830d57555a4669', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'Madith', 'Benjamin', 'benjaminrwoth@gmail.com', '1264690102.jpg', NULL, NULL, NULL, NULL, '453086aced8de54e872bad14787e8a5b', 2, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la vue `profile_cours`
--
DROP TABLE IF EXISTS `profile_cours`;

CREATE ALGORITHM=UNDEFINED DEFINER=`santeplu`@`localhost` SQL SECURITY DEFINER VIEW `profile_cours`  AS  select `cours`.`idcours` AS `idcours`,`cours`.`nomcours` AS `nomcours`,`cours`.`description` AS `description`,`cours`.`image` AS `image`,`cours`.`niveau` AS `niveau`,`formation`.`nomformation` AS `nomformation`,`cours`.`created_at` AS `created_at` from (`cours` join `formation` on((`cours`.`idformation` = `formation`.`idformation`))) ;

-- --------------------------------------------------------

--
-- Structure de la vue `profile_favories`
--
DROP TABLE IF EXISTS `profile_favories`;

CREATE ALGORITHM=UNDEFINED DEFINER=`santeplu`@`localhost` SQL SECURITY DEFINER VIEW `profile_favories`  AS  select `favories`.`idfovorie` AS `idfovorie`,`favories`.`idcours` AS `idcours`,`favories`.`created_at` AS `created_at`,`cours`.`nomcours` AS `nomcours`,`cours`.`image` AS `image`,`favories`.`id_user` AS `id_user` from (`favories` join `cours` on((`favories`.`idcours` = `cours`.`idcours`))) ;

-- --------------------------------------------------------

--
-- Structure de la vue `profile_lesson2`
--
DROP TABLE IF EXISTS `profile_lesson2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`santeplu`@`localhost` SQL SECURITY DEFINER VIEW `profile_lesson2`  AS  select `lesson`.`idlesson` AS `idlesson`,`lesson`.`code` AS `code`,`lesson`.`titre` AS `titre`,`lesson`.`description` AS `description`,`lesson`.`fichier` AS `fichier`,`lesson`.`created_at` AS `created_at`,`lesson`.`idsection` AS `idsection`,`lesson`.`type_fichier` AS `type_fichier`,`section`.`titre` AS `chapitre`,`cours`.`nomcours` AS `nomcours`,`cours`.`niveau` AS `niveau`,`cours`.`image` AS `image`,`formation`.`nomformation` AS `nomformation` from (((`lesson` join `section` on((`lesson`.`idsection` = `section`.`idsection`))) join `cours` on((`section`.`idcours` = `cours`.`idcours`))) join `formation` on((`cours`.`idformation` = `formation`.`idformation`))) ;

-- --------------------------------------------------------

--
-- Structure de la vue `profile_online`
--
DROP TABLE IF EXISTS `profile_online`;

CREATE ALGORITHM=UNDEFINED DEFINER=`santeplu`@`localhost` SQL SECURITY DEFINER VIEW `profile_online`  AS  select `online`.`id` AS `reference`,`online`.`id_user` AS `id_user`,`online`.`created_at` AS `created_at`,`users`.`first_name` AS `first_name`,`users`.`last_name` AS `last_name`,`users`.`image` AS `image` from (`online` join `users` on((`online`.`id_user` = `users`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure de la vue `profile_section`
--
DROP TABLE IF EXISTS `profile_section`;

CREATE ALGORITHM=UNDEFINED DEFINER=`santeplu`@`localhost` SQL SECURITY DEFINER VIEW `profile_section`  AS  select `section`.`idsection` AS `idsection`,`section`.`titre` AS `titre`,`cours`.`nomcours` AS `nomcours`,`cours`.`description` AS `description`,`cours`.`created_at` AS `created_at` from (`section` join `cours` on((`section`.`idcours` = `cours`.`idcours`))) ;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`idcommentaire`);

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`idcours`);

--
-- Index pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `favories`
--
ALTER TABLE `favories`
  ADD PRIMARY KEY (`idfovorie`);

--
-- Index pour la table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`idformation`);

--
-- Index pour la table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`idinfo`);

--
-- Index pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`idinscription`);

--
-- Index pour la table `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`idlesson`);

--
-- Index pour la table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`idlike`);

--
-- Index pour la table `messagerie`
--
ALTER TABLE `messagerie`
  ADD PRIMARY KEY (`idmessage`);

--
-- Index pour la table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `online`
--
ALTER TABLE `online`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`idrole`);

--
-- Index pour la table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`idsection`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `idcommentaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `cours`
--
ALTER TABLE `cours`
  MODIFY `idcours` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `favories`
--
ALTER TABLE `favories`
  MODIFY `idfovorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `formation`
--
ALTER TABLE `formation`
  MODIFY `idformation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `information`
--
ALTER TABLE `information`
  MODIFY `idinfo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `inscription`
--
ALTER TABLE `inscription`
  MODIFY `idinscription` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `lesson`
--
ALTER TABLE `lesson`
  MODIFY `idlesson` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `likes`
--
ALTER TABLE `likes`
  MODIFY `idlike` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `messagerie`
--
ALTER TABLE `messagerie`
  MODIFY `idmessage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT pour la table `online`
--
ALTER TABLE `online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `idrole` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `section`
--
ALTER TABLE `section`
  MODIFY `idsection` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
