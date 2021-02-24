-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 12 oct. 2020 à 10:10
-- Version du serveur :  10.1.26-MariaDB
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `map_pro`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `idcat` int(11) NOT NULL,
  `nom` varchar(300) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`idcat`, `nom`, `created_at`) VALUES
(1, 'vaccination', '2020-09-30 12:56:35'),
(2, 'information', '2020-09-30 12:56:54'),
(3, 'communiqué', '2020-09-30 12:57:11');

-- --------------------------------------------------------

--
-- Structure de la table `ci_providers`
--

CREATE TABLE `ci_providers` (
  `user_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `fullname` varchar(40) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `email` varchar(254) NOT NULL,
  `adresse` varchar(300) DEFAULT NULL,
  `description` text,
  `telephone` varchar(300) DEFAULT NULL,
  `icone` varchar(300) DEFAULT NULL,
  `site_web` varchar(800) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ci_providers`
--

INSERT INTO `ci_providers` (`user_id`, `service_id`, `fullname`, `lat`, `lng`, `email`, `adresse`, `description`, `telephone`, `icone`, `site_web`) VALUES
(1, 1, 'centre de sante carmel', -1.669617, 29.206547, 'centrecarmel@gmail.com', 'goma quartier carmel', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '+243993315152', '1033766240.jpg', 'http://www.pat.com'),
(2, 2, 'centre de sante CbCE', -1.678813, 29.234547, 'cbce@gmail.com', 'Nord-kivu goma quartier virunga ', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '0819891527', '1187448218.jpg', 'http://www.cbce.com'),
(3, 1, 'centre de santé murara', -1.679161, 29.231886, 'murara@gmail.com', 'goma centre ville aproximative de lycée amani', 'est un centre de santé situé ...', '+243993315152', '565203616.jpg', ''),
(4, 1, 'Hopital Heal Africa', -1.688869, 29.235558, 'healafrica@gmail.com', 'goma centre ville no loin de ropoind bdgl', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n  			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n  			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n  			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n  			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n  			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '0819891527', '2007705571.jpg', 'http://www.healafrica.com'),
(5, 1, 'Hopital Charite Maternel', -1.686885, 29.239813, 'charitematernel@gmail.com', 'Nord-kivu goma quartier birere', 'C\'est un milieu qui est complètement cool , et il y\'a toujours des mouvement même pendant la nuit. Et nous ici dans une très bonne sécurité.\r\n  			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n  			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n  			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n  			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n  			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '0970524665', '1031098970.jpg', 'http://www.pat.com'),
(6, 3, 'entre de Santé Casop', -1.686890, 29.240438, 'casop@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n  			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n  			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n  			consequat. Duis aute irure dolor in reprehenderit in volupta', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n  			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n  			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n  			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n  			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n  			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '0819891527', '1552627143.jpg', 'http://www.pat.com'),
(7, 2, 'Centre de Santé Kahembe', -1.676556, 29.243111, 'kahembe', 'nord-kivu goma', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n  			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n  			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n  			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n  			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n  			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '+243993315152', '1157777475.jpg', 'http://www.pat.com'),
(9, 2, 'Hopital keshero', -1.660930, 29.181192, 'keshero@gmail.com', 'Goma quartier keshero', 'Goma, le 02 Février 2012 (caritasdev.cd): Keshero (à l’ouest de Goma) est un quartier éloigné des hôpitaux de la ville. Aujourd’hui, il est doté d’une structure de santé pouvant prendre en charge les urgences obstétricales, les maladies de l’enfance et les interventions chirurgicales.\r\n\r\nLes 48 000 habitants qui, la nuit, devaient difficilement atteindre les structures médicales de la ville ne sont plus isolés par rapport aux hôpitaux et centres de santé de référence. D’un petit dispensaire à deux pavillons financé par Terre Sans Frontières/Canada et Caritas Australie au centre hospitalier, Keshero, inauguré ce 28 janvier, est doté d’une maternité, d’un bloc opératoire, d’un service d’hospitalisation et des services spécialisés grâce à l’appui, entre autres, de Maison Generalis des Sœurs Pallotines et de Manos Unidas, une Ong espagnole.\r\n\r\nAlors qu’il doit normalement référer à l’hôpital général Charité maternelle, il était, jadis, difficile au centre hospitalier Keshero de faire parvenir tous les cas urgents à Charité maternelle, sa structure de tutelle dans la zone de santé de Goma, faute de moyen de transport adéquat. Aujourd’hui, employant deux médecins et une équipe de paramédicaux rodés, lesréférences nocturnes et les risques d’insécurité entre Keshero (ouest) et Charité maternelle (est) sont réduits, les malades satisfaits et les structures médicales de la Caritas Goma – Charité maternelle, Carmel et Keshero – sont équitablement reparties dans la zone de santé de Goma. Ainsi, la Caritas diocésaine donne une réponse adaptée aux besoins de rapprochement des soins aux malades pour une accessibilité géographique qui améliore la couverture sanitaire dans la partie sud du Nord-Kivu (le Diocèse de Goma) tant en milieu urbain que rural.\r\n\r\nA noter que cette inauguration a connu la participation de l’autorité politique, représentée par le président de l’Assemblée provinciale du Nord-Kivu et ecclésiale, avec la présence de l’Evêque de Goma. Une participation qui révèle un encouragement spécifique pour les actions de développement réalisées par le Bureau diocésaine des œuvres médicales de la Caritas Goma.[026/2012]', '0819891527', '597574930.jpg', 'http://www.pat.com'),
(10, 1, 'Hopital Docs', -1.660930, 29.181192, 'hdocs@gmail.com', 'Goma quartier keshero', 'Goma, 13 décembre 2011 – A travers ses Projets à Impact rapide, la Mission de l\'Organisation des Nations Unies pour la Stabilisation en République démocratique du Congo (MONUSCO) vient de doter le centre hospitalier Docs de Kyeshero à Goma, province du Nord Kivu, d\'un important lot d\'équipements médicaux. La cérémonie de remise officielle de ce matériel a eu lieu le mardi 13 décembre 2011 en présence du Ministre provincial de la santé, Mutete Mudinga, de l\'Administrateur de l\'hôpital, John Baelani, et du chef de Bureau de la MONUSCO, Hiroute Gebre Sellassie.\r\n\r\n«Les soins de santé occupent la première place dans la politique de notre pays, » a souligné l\'Administrateur de l\'hôpital. « Je vous assure que ce matériel est entre de bonnes mains et que nous saurons en prendre soin, » a-t-il ajouté.\r\n\r\nInitié par la Section médicale de la MONUSCO, ce projet a été financé à hauteur de 23 000 dollars américains. Le but est d\'équiper les services de réanimation, de maternité, et le bloc opératoire, en équipements appropriés. Il s\'agit notamment de deux extracteurs, cinq bonbonnes d\'oxygène, d\'une lampe scialytique, d\'un appareil d\'anesthésie, de matériel de réanimation, et d\'une table d\'accouchement.\r\n\r\nLe choix du centre hospitalier de Kyeshero pour recevoir ce don n\'est pas fortuit. De par sa situation géographique, ce centre est au cœur d\'une zone surpeuplée due à l\'éruption volcanique de 2002 qui avait fait de nombreux déplacés. En réalisant ce Projet à impact rapide, la Section médicale de la MONUSCO voudrait permettre à la population de cette zone périphérique de Goma d\'accéder à de meilleurs services de santé et à moindre coût. Par ailleurs, la Section médicale a mis sur pied une formation continue à l\'intention du corps médical du centre hospitalier Docs.', '0819891527', '790440175.jpg', 'http://www.pat.com'),
(11, 1, 'centre hospitalier bethesda', -1.651569, 29.189869, 'bethesda@gmail.com', 'Le CHB est situé à l\'ouest de la ville de Goma dans la commune portant le même nom, quartier Kyeshero, sise avenue de la conférence.\r\n\r\nIl est limité :\r\n\r\n- A l\'est : la ville de Goma (quartier Himbi II)\r\n\r\n- A l\'ouest : quartier Mugunga.\r\n\r\n- Au nord : Route Goma- Sake,\r\n\r\nAu sud : lac kivu au long', 'L\'éruption volcanique du 17 janvier 2002 ayant emporté avec lui plus de 75% de l\'infrastructure de l\'hôpital général de référence de Virunga et détruit plus de 90 % de son équipement, ce fait à suscité un besoin fondamental, celui de prendre en charge plus de 100 agents qui travaillaient dans cette structure sanitaire ainsi que la couverture de la population qui était desservie par l\'hôpital en déplacement de l\'Est vers l\'Ouest de la ville de Goma suite aux effets catastrophiques du volcan.\r\n\r\nCette situation a amené la CBCA à réfléchir sur les possibilités d\'encadrement sanitaire de cette population abonnée à son triste sort.\r\n\r\nC\'est dans cette démarche que le besoin d\'obtenir une place pour ériger un centre de santé a été canaliser par le Docteur MUMBERE auprès des amis de Rotary club Goma-Gisenyi qui n\'ont pas tardé à répondre favorablement à ce besoin fondamental de le rendre accessible les soins médicaux à la population ayant fait partie désormais de la partie Ouest de la ville de Goma.\r\n\r\nC\'est ainsi que le Rotary club a exprimé clairement la volonté de modifier la destination de son terrain de 0.900 hectare situé à Kyeshero en ville de Goma et décider de confier sa gestion à la CBCA qui gérait l\'hôpital de Virunga, un des hôpitaux les plus appréciés de la place.\r\n\r\nComme ce terrain était destiné pour un hôpital de campagne en faveur de la population sinistré de Goma. Au vu de ce terrain, Rotary Club en collaboration avec la CBCA, ont pensé construire un hôpital de bâches qui progressivement sera transformé en matériaux durables avec la CBCA et autres organismes.\r\n\r\nL\'UNICEF Goma, sensibilisé par Rotary Club, s\'est joint à cette aspiration en rendant disponible quelques bâches ; ce qui avait facilité la construction rapide d\'une tente avec l\'appui de la CBCA.\r\n\r\nEn avril 2002 avec la construction de ce centre et l\'acquisition par CBMI d\'une unité semi-mobil et quelques matériels, ont fait que les activités commencent au CH BETHESDA sous la gestion de la direction de l\'hôpital de virunga.', '0819891527', '553734186.jpg', 'http://www.pat.com'),
(12, 1, 'HOPITAL LA PROVIDENCE PALLOTTINE', -1.661091, 29.171459, 'providence@gmail.com', 'Nord-kivu goma', '', '0819891527', '1685651590.jpg', 'http://www.pat.com');

-- --------------------------------------------------------

--
-- Structure de la table `commune`
--

CREATE TABLE `commune` (
  `idcat` int(11) NOT NULL,
  `nom` varchar(300) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commune`
--

INSERT INTO `commune` (`idcat`, `nom`, `created_at`) VALUES
(1, 'goma', '2020-09-29 21:19:26'),
(2, 'karisimbi', '2020-09-29 21:19:50'),
(3, 'nyiragongo', '2020-09-29 21:20:06');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `nom` varchar(300) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `sujet` varchar(700) DEFAULT NULL,
  `message` text,
  `fichier` varchar(300) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `nom`, `email`, `sujet`, `message`, `fichier`, `created_at`) VALUES
(1, 'sefu clementine', 'sefu@gmail.com', 'sefu@gmail.com', '	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n  	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n  	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n  	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n  	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n  	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '963838663.txt', '2020-09-27 14:19:54'),
(4, 'sephora banze', 'sephora@gmail.com', 'information personnele sur  le cours de programmation', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '535634874.JPG', '2020-09-27 15:34:25'),
(5, 'cesard bodos', 'cesard@gmail.com', 'j\'aimerai savoir les informations sur...', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n										tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n										quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n										consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n										cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n										proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '506622315.png', '2020-10-01 14:50:33');

-- --------------------------------------------------------

--
-- Structure de la table `enfant`
--

CREATE TABLE `enfant` (
  `ide` int(11) NOT NULL,
  `nom` varchar(300) DEFAULT NULL,
  `nomdupere` varchar(300) DEFAULT NULL,
  `nomdelamere` varchar(300) DEFAULT NULL,
  `date_nais` date DEFAULT NULL,
  `adresse` varchar(300) DEFAULT NULL,
  `telephone` varchar(300) DEFAULT NULL,
  `nationnalite` varchar(300) DEFAULT NULL,
  `sexe` varchar(300) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `enfant`
--

INSERT INTO `enfant` (`ide`, `nom`, `nomdupere`, `nomdelamere`, `date_nais`, `adresse`, `telephone`, `nationnalite`, `sexe`, `created_at`) VALUES
(2, 'joel lula', 'mbussa lula', 'liliane masika', '2020-10-10', 'congolaise', '0819891527', 'congolaise', 'M', '2020-10-10 13:14:45'),
(3, 'emmanuel uwonda', 'uwonda', 'muke ', '2018-10-10', 'office 2', '+243993315152', 'congolaise', 'M', '2020-10-10 13:22:26'),
(4, 'James ciza', 'Ciza', 'jeanne', '2019-10-24', '	                     	\r\n	                     Q/murara', '+243818495548', 'congolaise', 'M', '2020-10-10 13:24:15'),
(5, 'Rachel jean', 'jean', 'emmanuella', '2020-04-18', '	     Majengo                	\r\n	                     ', '+243973971120', 'congolaise', 'F', '2020-10-10 13:25:32'),
(6, 'Nadege uwonda', 'uwonda', 'Uyera', '2019-03-02', '	                     	\r\n	                     office2', '+24397963757', 'congolaise', 'F', '2020-10-10 13:26:49'),
(7, 'Espoir baraka', 'Baraka', 'Bigega', '2019-07-25', 'majengo', '+24384595937', 'congolaise', 'M', '2020-10-10 13:28:00'),
(9, 'cool ok jumba', 'uwonda', 'liliane masika', '2020-10-10', 'cool', '0819891527', 'congolaise', 'M', '2020-10-10 13:33:31');

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
(1, 'vaccination des enfant de bas âge ', '2020-09-29', '2020-10-02', '2020-09-30 18:11:58'),
(2, 'contrôle physique des femmes enceintes', '2020-10-01', '2020-10-03', '2020-09-30 18:13:48'),
(3, 'évaluation cpn pour les femmes enceintes', '2020-10-08', '2020-11-04', '2020-09-30 18:14:43'),
(4, 'la campagne de vaccination aura lieu à partir du 20/10/200 à l\'hôpital docs keshero prière d\'être là et savoir plus d\'informations.', '2020-10-20', '2020-10-23', '2020-10-11 15:27:50');

-- --------------------------------------------------------

--
-- Structure de la table `information`
--

CREATE TABLE `information` (
  `idformation` int(11) NOT NULL,
  `nomf` varchar(300) DEFAULT NULL,
  `description` text,
  `icone` varchar(300) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `idcat` int(11) DEFAULT NULL,
  `code` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `information`
--

INSERT INTO `information` (`idformation`, `nomf`, `description`, `icone`, `created_at`, `idcat`, `code`) VALUES
(1, 'SUIVI DE GROSSESSE', 'Suivez votre grossesse pas à pas grâce au guide allobébé, de la fécondation jusqu\'à la naissance, vous retrouverez toutes les informations dont vous avez besoin dans le suivi de grossesse.\r\n\r\nDans ce guide de grossesse d\'allobébé vous retrouverez : des informations santé, des petites astuces pour calmer certains symptômes de grossesse, des informations sur la vie de bébé dans votre ventre, des mémos pour les consultations, les examens, les échographies… en bref, vous retrouverez tout ce qu\'il y a à savoir dans notre suivi de grossesse !', '923189216.jpg', '2020-09-30 13:39:35', 3, NULL),
(2, 'SUIVI DE GROSSESSE', 'Suivez votre grossesse pas à pas grâce au guide allobébé, de la fécondation jusqu\'à la naissance, vous retrouverez toutes les informations dont vous avez besoin dans le suivi de grossesse.\r\n\r\nDans ce guide de grossesse d\'allobébé vous retrouverez : des informations santé, des petites astuces pour calmer certains symptômes de grossesse, des informations sur la vie de bébé dans votre ventre, des mémos pour les consultations, les examens, les échographies… en bref, vous retrouverez tout ce qu\'il y a à savoir dans notre suivi de grossesse !', '923189216.jpg', '2020-09-30 14:44:35', 3, '89706195cfee28f'),
(3, 'SUIVI DE GROSSESSE', 'Suivez votre grossesse pas à pas grâce au guide allobébé, de la fécondation jusqu\'à la naissance, vous retrouverez toutes les informations dont vous avez besoin dans le suivi de grossesse.\r\n\r\nDans ce guide de grossesse d\'allobébé vous retrouverez : des informations santé, des petites astuces pour calmer certains symptômes de grossesse, des informations sur la vie de bébé dans votre ventre, des mémos pour les consultations, les examens, les échographies… en bref, vous retrouverez tout ce qu\'il y a à savoir dans notre suivi de grossesse !', '923189216.jpg', '2020-09-30 14:54:56', 3, '2492bd3b26274c2'),
(4, 'SUIVI DE GROSSESSE', 'Suivez votre grossesse pas à pas grâce au guide allobébé, de la fécondation jusqu\'à la naissance, vous retrouverez toutes les informations dont vous avez besoin dans le suivi de grossesse.\r\n\r\nDans ce guide de grossesse d\'allobébé vous retrouverez : des informations santé, des petites astuces pour calmer certains symptômes de grossesse, des informations sur la vie de bébé dans votre ventre, des mémos pour les consultations, les examens, les échographies… en bref, vous retrouverez tout ce qu\'il y a à savoir dans notre suivi de grossesse !', '923189216.jpg', '2020-09-30 14:57:04', 3, 'bb708b911192f12'),
(5, 'SUIVI DE GROSSESSE', 'Suivez votre grossesse pas à pas grâce au guide allobébé, de la fécondation jusqu\'à la naissance, vous retrouverez toutes les informations dont vous avez besoin dans le suivi de grossesse.\r\n\r\nDans ce guide de grossesse d\'allobébé vous retrouverez : des informations santé, des petites astuces pour calmer certains symptômes de grossesse, des informations sur la vie de bébé dans votre ventre, des mémos pour les consultations, les examens, les échographies… en bref, vous retrouverez tout ce qu\'il y a à savoir dans notre suivi de grossesse !', '923189216.jpg', '2020-09-30 14:58:20', 3, 'c65d9be116ccfea'),
(6, 'SUIVI DE GROSSESSE', 'Suivez votre grossesse pas à pas grâce au guide allobébé, de la fécondation jusqu\'à la naissance, vous retrouverez toutes les informations dont vous avez besoin dans le suivi de grossesse.\r\n\r\nDans ce guide de grossesse d\'allobébé vous retrouverez : des informations santé, des petites astuces pour calmer certains symptômes de grossesse, des informations sur la vie de bébé dans votre ventre, des mémos pour les consultations, les examens, les échographies… en bref, vous retrouverez tout ce qu\'il y a à savoir dans notre suivi de grossesse !', '923189216.jpg', '2020-09-30 15:00:39', 3, 'eaaabd2b78066d6'),
(7, 'SUIVI DE GROSSESSE', 'Suivez votre grossesse pas à pas grâce au guide allobébé, de la fécondation jusqu\'à la naissance, vous retrouverez toutes les informations dont vous avez besoin dans le suivi de grossesse.\r\n\r\nDans ce guide de grossesse d\'allobébé vous retrouverez : des informations santé, des petites astuces pour calmer certains symptômes de grossesse, des informations sur la vie de bébé dans votre ventre, des mémos pour les consultations, les examens, les échographies… en bref, vous retrouverez tout ce qu\'il y a à savoir dans notre suivi de grossesse !', '923189216.jpg', '2020-09-30 15:01:38', 3, '0b6a8014f6cb36b'),
(8, 'SUIVI DE GROSSESSE', 'Suivez votre grossesse pas à pas grâce au guide allobébé, de la fécondation jusqu\'à la naissance, vous retrouverez toutes les informations dont vous avez besoin dans le suivi de grossesse.\r\n\r\nDans ce guide de grossesse d\'allobébé vous retrouverez : des informations santé, des petites astuces pour calmer certains symptômes de grossesse, des informations sur la vie de bébé dans votre ventre, des mémos pour les consultations, les examens, les échographies… en bref, vous retrouverez tout ce qu\'il y a à savoir dans notre suivi de grossesse !', '923189216.jpg', '2020-09-30 15:04:53', 3, 'a74e8a051f07794'),
(9, 'SUIVI DE GROSSESSE', 'Suivez votre grossesse pas à pas grâce au guide allobébé, de la fécondation jusqu\'à la naissance, vous retrouverez toutes les informations dont vous avez besoin dans le suivi de grossesse.\r\n\r\nDans ce guide de grossesse d\'allobébé vous retrouverez : des informations santé, des petites astuces pour calmer certains symptômes de grossesse, des informations sur la vie de bébé dans votre ventre, des mémos pour les consultations, les examens, les échographies… en bref, vous retrouverez tout ce qu\'il y a à savoir dans notre suivi de grossesse !', '923189216.jpg', '2020-09-30 15:07:22', 3, '4616b59334b2e7a'),
(10, 'SUIVI DE GROSSESSE', 'Suivez votre grossesse pas à pas grâce au guide allobébé, de la fécondation jusqu\'à la naissance, vous retrouverez toutes les informations dont vous avez besoin dans le suivi de grossesse.\r\n\r\nDans ce guide de grossesse d\'allobébé vous retrouverez : des informations santé, des petites astuces pour calmer certains symptômes de grossesse, des informations sur la vie de bébé dans votre ventre, des mémos pour les consultations, les examens, les échographies… en bref, vous retrouverez tout ce qu\'il y a à savoir dans notre suivi de grossesse !', '923189216.jpg', '2020-09-30 15:10:12', 3, '8d36c34405d86e5'),
(11, 'SUIVI DE GROSSESSE', 'Suivez votre grossesse pas à pas grâce au guide allobébé, de la fécondation jusqu\'à la naissance, vous retrouverez toutes les informations dont vous avez besoin dans le suivi de grossesse.\r\n\r\nDans ce guide de grossesse d\'allobébé vous retrouverez : des informations santé, des petites astuces pour calmer certains symptômes de grossesse, des informations sur la vie de bébé dans votre ventre, des mémos pour les consultations, les examens, les échographies… en bref, vous retrouverez tout ce qu\'il y a à savoir dans notre suivi de grossesse !', '1988176407.jpg', '2020-09-30 15:10:59', 3, '41d4e994907c60d'),
(12, 'SUIVI DE GROSSESSE', 'Suivez votre grossesse pas à pas grâce au guide allobébé, de la fécondation jusqu\'à la naissance, vous retrouverez toutes les informations dont vous avez besoin dans le suivi de grossesse.\r\n\r\nDans ce guide de grossesse d\'allobébé vous retrouverez : des informations santé, des petites astuces pour calmer certains symptômes de grossesse, des informations sur la vie de bébé dans votre ventre, des mémos pour les consultations, les examens, les échographies… en bref, vous retrouverez tout ce qu\'il y a à savoir dans notre suivi de grossesse !', '923189216.jpg', '2020-09-30 15:11:38', 3, 'a134f776a893151'),
(13, 'BÉBÉ 5 MOIS', 'A 5 mois, bébé est dans une phase de découverte ! Plus de motricité, diversification alimentaire, éveil plus prononcé… Il est important de le connaître les grandes étapes de la vie de bébé afin de l’y accompagner le mieux possible. Pour cela, découvrez notre rubrique !', '1494055712.jpg', '2020-09-30 15:12:48', 2, '2a9b7006f2c25de'),
(14, 'BÉBÉ 6 MOIS', 'Bébé continue la diversification alimentaire et peut même manger solide ! Pour connaître quels aliments donner à bébé, découvrez notre rubrique.', '449529925.jpg', '2020-09-30 15:13:29', 2, '3f6620be39f5139'),
(15, 'Calendrier vaccinal', 'Certaines vaccinations sont obligatoires .\r\n\r\nSeuls trois vaccins sont obligatoires en France. Cette obligation ne concerne que les nourrissons (Pour les adultes, les rappels sont simplement recommandés) :\r\n\r\nLa diphtérie : avec la généralisation de la vaccination à partir de 1945, cette infection bactérienne, hautement contagieuse par voie aérienne (angine) ou cutanée, a disparu de France en 1989.\r\nLe Tétanos : Cette maladie spectaculaire (violentes contractions musculaires, blocage des muscles respiratoires) est due à une bactérie que l\'on retrouve principalement dans la terre.\r\nLa Poliomylélite  : Le dernier cas importé de cette infection virale en France a été recensé en 1995. La maladie est en voie d\'éradication mais elle continue néanmoins à circuler dans certains pays.\r\nTout parent doit se soumettre à cette obligation sous peine de s\'exposer à 3 750 € d\'amende et six mois de prison.', '2005031878.jpg', '2020-09-30 15:19:24', 1, '8b4703316b57c10'),
(16, 'Vaccinations recommandées : adultes ?', 'Le calendrier vaccinal indique pour chacun des vaccins proposés l\'âge et le nombre d\'injections nécessaires pour être protégé de ces maladies. Il émet aussi des recommandations vaccinales particulières propres à des conditions spéciales (risques accrus de complications, d’exposition ou de transmission) ou à des expositions professionnelles.\r\n\r\n 	18-24 ans	25 ans	45 ans	65 ans	>65 ans\r\nDiphtérie Tétanos Poliomyélite	 	X	X	X	X\r\nCoqueluche acellulaire (ca)	 	X	 	 	 \r\nGrippe	 	 	 	X	X\r\nZona	 	 	 	X	X\r\n \r\n\r\nEntre 15 et 23 ans ?\r\n\r\nPapillomavirus humains (HPV) : une injection de rattrapage est recommandée si le vaccin n\'a pas été administré à 14 ans, seulement pour les jeunes filles ou jeunes femmes qui n\'ont pas encore eu de rapport sexuel ou lorsque la vaccination se situe dans l\'année suivant le début de leur vie sexuelle.\r\n\r\nEntre 16 et 18 ans ?\r\n\r\n– Diphtérie, tétanos, poliomyélite : l’injection d’un rappel est recommandée à tous les adolescents. Une nouvelle injection devra être réalisée dix ans plus tard.\r\n\r\n– Coqueluche : une injection est recommandée pour les adolescents n\'ayant pas eu de rappel à l\'âge de 11 à 13 ans.\r\n\r\nA partir de 18 ans ?\r\n\r\n– Diphtérie, tétanos, poliomyélite : l’injection d’un rappel doit être réalisée tous les 10 ans.\r\n\r\n– Rubéole : cette vaccination est recommandée pour les femmes non vaccinées en âge de procréer.\r\n\r\n– Coqueluche : l’injection d’un rappel est recommandée pour les adultes susceptibles de devenir parents et n\'ayant pas été vaccinés depuis 10 ans.\r\n\r\n– Méningocoque : Dans l’attente d’une couverture vaccinale suffisante permettant la mise en place d’une immunité de groupe, une vaccination\r\nde rattrapage selon le schéma vaccinal à une dose est recommandée jusqu’à l’âge de 24 ans révolus.\r\n\r\nEntre 26 et 28 ans ?\r\n\r\nCoqueluche : l’injection d’un rappel est recommandée pour les adultes n\'ayant pas été vaccinés depuis 10 ans. Il peut être administré en association avec le rappel diphtérie, tétanos, poliomyélite.\r\n\r\nA 45 ans ?\r\n\r\n– Diphtérie, tétanos, poliomyélite, coqueluche : l’injection d’un rappel est recommandée\r\n\r\nAprès 65 ans ?\r\n\r\nGrippe : l’administration d’un vaccin est recommandée chaque année.\r\n\r\nZona : l’administration d’un vaccin est recommandée chaque année.\r\n\r\nDiphtérie, tétanos, poliomyélite, coqueluche : l’injection d’un rappel est recommandée chaque année.', '614617781.jpg', '2020-09-30 15:21:58', 1, '3d11d795d33ec39'),
(17, 'Communiquer à la femme enceinte: avantages, risques et incertitudesde la vaccination', 'Résumé\r\nCet article a pour but de revoir les recommandations vaccinales suisses en passant en revue les avantages, les risques et les limites des vaccinations courantes dans la population toute particulière des femmes enceintes, en raison de la crainte de risques éventuels maternels et malformatifs fœtaux. Nous aborderons quelques fausses croyances sur le sujet et des conseils sur la communication seront délivrés en fin d’article.\r\nINTRODUCTION\r\nLa majorité des femmes n’ont pas de couverture vaccinale satisfaisante pendant leur grossesse. En Suisse, le taux de vaccinations de la population générale est très bien étudié et suivi par l’Institut d’épidémiologie, de biostatistique et de prévention (EPBI) sur mandat de l’Office fédéral de la santé publique (OFSP), mais actuellement aucune donnée n’est disponible pour les femmes enceintes. Aux Etats-Unis, un article publié récemment estime la couverture vaccinale des femmes enceintes pour la diphtérie, le tétanos, et la coqueluche (dTpa) à 58,2?% et pour la grippe à 45,9?%.1 Les raisons de ce manque de couverture sont liées au fait que les vaccins sont souvent négligés durant le suivi de grossesse face aux multiples sujets à discuter et examens à effectuer. Une autre cause est également à rechercher dans les débats sur la sécurité. Evidemment, une vaccination complète avant la conception serait idéale. Toutefois, on ne peut s’assurer que les femmes soient toutes vaccinées. En effet, il peut s’agir de l’oubli d’une dose, de refus, de non-accès aux soins ou d’un manque d’informations délivrées par les professionnels de la santé.\r\n\r\nCet article a pour but de détailler les plus récentes recommandations vaccinales suisses pour la femme enceinte, et d’explorer les causes et les possibles remèdes à cette déplorable absence de protection. Il se distinguera d’un article paru dans cette revue en 2016 traitant également des recommandations vaccinales dans cette population,2 en mettant l’accent sur les stratégies de communication entre généraliste et patiente, que nous jugeons primordiales, pour résoudre en partie le problème.\r\n\r\nMIEUX SAVOIR POUR MIEUX RENSEIGNER\r\nLes maladies, telles que la rougeole, la rubéole, les oreillons, la grippe saisonnière et la coqueluche, sont très contagieuses et particulièrement graves si contractées pendant la grossesse. Plusieurs études ont déjà attribué à ces maladies infectieuses les risques de malformation fœtale, de comorbidité chez la femme enceinte et le nourrisson. Le but de la vaccination de la femme enceinte est donc double: protéger la mère et aussi l’enfant. Le concept du transfert des anticorps maternels acquis suite à une infection ou une vaccination, bien connu depuis la fin du XIXe siècle, permet de limiter les risques de malformation fœtale causée par la maladie contractée durant la grossesse, mais aussi de protéger le nouveau-né durant ses premiers mois de vie grâce à l’immunisation passive. En raison de l’exclusion des femmes enceintes des études cliniques, les connaissances concernant la sécurité des vaccins pendant la grossesse ont été acquises quasi exclusivement lors de vaccinations effectuées par inadvertance qui ont été signalées aux institutions nationales. Cela a mené à une lente évolution des recommandations vaccinales.\r\n\r\nVACCINS OFFICIELLEMENT RECOMMANDÉS\r\nTétanos\r\nLe vaccin contre le tétanos a été la première vaccination de la femme enceinte recommandée. Cette vaccination, qui a été introduite dans les années 1960 par l’Organisation mondiale de la santé (OMS), a permis une diminution de 90?% de la mortalité maternelle et néonatale durant les vingt dernières années.3\r\n\r\nGrippe saisonnière (vaccin inactivé)\r\nLa grippe saisonnière est associée à un haut risque de morbidité chez la femme enceinte (dernier trimestre et en post-partum), le fœtus et le nourrisson.4 Le vaccin inactivé peut être donné sans risque et doit être administré à chaque grossesse. La vaccination contre la grippe saisonnière peut se faire quel que soit le trimestre, mais au moins deux semaines avant l’accouchement pour permettre une immunisation chez le nouveau-né,5 sans risque démontré d’embryopathie.6\r\n\r\nCoqueluche\r\nLa vaccination contre la coqueluche permet de protéger les nourrissons de moins de trois mois, qui ne pourront bénéficier de leur propre vaccination qu’à partir de deux mois. Depuis 2017, cette vaccination est indiquée à chaque grossesse en raison de l’augmentation de l’incidence de cette maladie chez les adolescents et adultes avec apparition de cas graves de coqueluche chez des nourrissons. Une dose de dTpa (vaccin inactivé combiné contre la diphtérie, le tétanos et la coqueluche avec une dose réduite d’anatoxine diphtérique (d) et de coqueluche (pa)) au second trimestre (13e-26e semaine d’aménorrhée) est ainsi recommandée indépendamment de l’état vaccinal. En effet, l’immunité diminue avec le temps et cette vaccination permet une immunisation passive (transitoire) du nouveau-né durant ses premiers mois de vie,7 jusqu’à ce que la vaccination du nourrisson soit possible et efficace. En outre, la vaccination contre la coqueluche semble efficace et sûre.8,9\r\n\r\nVACCINS CONTRE-INDIQUÉS\r\nROR, varicelle et fièvre jaune\r\nLes femmes enceintes ne devraient en principe pas recevoir de vaccins vivants atténués, dont font partie ceux contre la rougeole, la rubéole, les oreillons, la varicelle et la fièvre jaune, en raison du risque théorique d’embryopathie, jusqu’ici pas encore démontré.7,9-11 Malheureusement, la plupart de ces maladies sont très contagieuses et graves si acquises durant la grossesse. Dans ce contexte, il s’agira tout particulièrement de veiller à la vaccination complète d’une femme en âge de procréer, lors d’une consultation et de la sensibiliser sur l’importance de la vaccination pour sa propre protection et celle d’un éventuel futur enfant. Une latence d’un mois après une vaccination contre les maladies susmentionnées est recommandée avant une conception,7,12 bien qu’aucun effet néfaste sur l’enfant n’ait été démontré en cas d’exposition par inadvertance.7 Selon les recommandations de l’OFSP, en cas de grossesse, il n’est pas nécessaire de réaliser les sérologies pour la rougeole et la rubéole si une ou deux doses de ces vaccins, respectivement, sont documentées. A noter, un risque de faux négatif pour les sérologies de la rougeole et de la varicelle, qui nécessite une vérification auprès d’un laboratoire spécialisé. En cas de vaccination incomplète (une seule dose du vaccin rougeole-oreillons-rubéole (ROR) et/ou varicelle et pas d’antécédent de maladie documentée), il conviendra de compléter la vaccination ROR et/ou contre la varicelle en post-partum. En cas d’absence de vaccination chez la femme enceinte, une recherche d’IgG spécifiques pour la rougeole, la rubéole et la varicelle est recommandée, servant de référence en cas de suspicion de maladie. La femme enceinte non immunisée devra ainsi éviter tout contact avec des personnes potentiellement atteintes par ces maladies et une vérification ou un complément des vaccinations de l’entourage doit être réalisé. En post-partum, une vaccination complète devra avoir lieu.\r\n\r\nVACCINS À CONSIDÉRER DANS CERTAINES CONDITIONS\r\nHépatites, maladies à pneumocoques ou méningocoques, polio, HPV, encéphalite à tique, typhus, rage\r\nPour les vaccins non vivants, aucun effet indésirable sur le fœtus n’a été rapporté. Le bénéfice maternel de l’immunisation peut ainsi justifier une vaccination durant la grossesse. Un résumé des recommandations et des vaccinations possibles chez la femme enceinte figure dans le tableau 1.\r\n\r\nTableau 1\r\nRécapitulatif des vaccinations durant la grossesse\r\n\r\ndTpa?: vaccin combiné contre la diphtérie, le tétanos et la coqueluche avec une dose réduite d’anatoxine diphtérique et de coqueluche?; dT?: vaccin combiné contre la diphtérie et le tétanos avec une dose réduite d’anatoxine diphtérique?; dTpa-IPV?: vaccin inactivé combiné contre la poliomyélite, la diphtérie, le tétanos et la coqueluche?; SA?: semaines d’aménorrhée.\r\n\r\n(Adapté de réf. 7,12,14-16)\r\n\r\nCAUSES D’HÉSITATION\r\nLes programmes de vaccination de l’OMS rencontrent de plus en plus de difficultés face à des réticences ou des hésitations à l’égard de la vaccination. Le phénomène est complexe, répandu et multifactoriel, nécessitant une évaluation individualisée des causes profondes et des croyances. Par ailleurs, une étude réalisée à Genève a mis en évidence, deux ans après la recommandation pour la vaccination contre la grippe chez les femmes enceintes, la présence de plusieurs barrières, dont un manque d’information de la part du personnel soignant, des fausses croyances sur la sécurité vaccinale, et la méconnaissance de la dangerosité de cette maladie pendant la grossesse.13 C’est pour cette raison que le rôle du médecin généraliste et du gynécologue/obstétricien dans le suivi des femmes en âge de procréer est primordial. Le taux des patientes vaccinées dépend non seulement des recommandations données, mais aussi de l’avis du médecin de confiance. Nous devons améliorer la qualité des informations que nous délivrons sur la sécurité des vaccins et les risques associés aux maladies, que les patientes ne connaissent plus. Le tableau 2 résume les risques liés aux maladies pour la femme enceinte et le fœtus, ainsi que l’évaluation de l’efficacité et la sécurité de certains vaccins.\r\n\r\nTableau 2\r\nRisques liés aux maladies pour les femmes enceintes sans protection vaccinale\r\n\r\nLe tableau indique aussi la sécurité et l’efficacité de certains vaccins.SA?: semaines d’aménorrhée?; RCIU?: retard de croissance intra-utérin.\r\n\r\n(Adapté de réf. 4,6-8,11,12,14,15,17-21)\r\n\r\nL’ART DE LA COMMUNICATION EFFICACE\r\nLa femme enceinte n’est pas une patiente comme les autres. C’est une interlocutrice particulière qui se préoccupe de son bien-être, mais également de celui de son futur enfant. Le rapport risque/bénéfice de toutes sortes d’examens, de thérapies, ou d’interventions devra être évalué pour elle et son enfant à naître. Dans cette perspective, la proposition d’une vaccination comporte des difficultés. A la différence des médicaments qui soignent une maladie avérée, la vaccination prévient une éventuelle infection qui n’aurait peut-être pas été contractée. En outre, la protection n’est pas de 100?%. Alors que les recommandations officielles deviennent plus strictes (par exemple, recommandation de vacciner la femme enceinte contre la coqueluche à chaque grossesse), de plus en plus de messages sur internet parlent en défaveur de la vaccination. Certaines fausses croyances peuvent altérer la prise de décision (tableau 3).\r\n\r\nTableau 3\r\nQuelques croyances concernant les vaccins durant la grossesse\r\n\r\n\r\n(Adapté de réf. 4,5,8,15,18,19 et du Compendium suisse des médicaments)\r\n\r\nEn choisissant de ne pas se faire vacciner, la femme enceinte prend des risques inutiles, puisque ces maladies ne sont pas anodines si contractées pendant la grossesse. L’objectif d’augmenter le taux de vaccinations chez les femmes enceintes est tellement ambitieux qu’une stratégie claire, facile, unique et certaine pour résoudre le problème n’existe pas. Dans ce contexte, il est évident que la communication entre la patiente et le personnel soignant qui gravite autour d’elle (médecin généraliste, gynécologue, sage-femme…) est fondamentale. Nous proposons ci-après quelques conseils pour mener au mieux la consultation.\r\n\r\nEn premier lieu, l’adaptation du contenu de la consultation est nécessaire afin qu’une dizaine de minutes soient consacrées exclusivement à ce sujet. Après avoir exploré les connaissances et les croyances de la patiente sur la vaccination, son opinion doit être sollicitée puis, un message clair et individualisé devrait être délivré par le professionnel de santé sur les recommandations actuelles et leur sécurité. Appuyé par les effets positifs de la vaccination, compte tenu de la protection de la femme enceinte, de l’immunisation passive du nouveau-né sans risque démontré, et de son remboursement, le professionnel de santé devrait pouvoir conseiller la vaccination à sa patiente. Une éventuelle documentation basée sur les recommandations de l’OFSP disponible sur le site infovac.ch (www.infovac.ch/fr/les-vaccins/vaccins-pour-les-risques-eleves/grossesse) peut également être remise à la femme enceinte en lui laissant un délai de réflexion avant une seconde consultation pour lui permettre de partager la décision avec son entourage, par exemple. Nous pourrions imaginer la présence de tels documents en salle d’attente afin d’inviter à la réflexion et d’éventuellement toucher aussi les femmes en âge de procréer pas encore enceinte. En cas de refus, malgré les explications fournies, la décision doit être bien documentée dans le dossier médical.\r\n\r\nCONCLUSION\r\nLe carnet de vaccination de chaque femme en âge de procréer doit être vérifié et complété si nécessaire, avant un éventuel désir de grossesse. A chaque grossesse, une vaccination contre la coqueluche et la grippe est maintenant recommandée et on sait qu’elle ne provoque pas d’embryopathie. Les vaccins vivants atténués ne doivent pas être administrés durant la grossesse et la vaccination doit se faire en post-partum immédiat. Néanmoins, une vaccination par inadvertance ne provoque aucun effet néfaste sur l’enfant à naître et la femme enceinte doit être rassurée.\r\n\r\nLa femme enceinte doit être particulièrement sensibilisée sur le fait que son choix de se faire vacciner ou non entraîne non seulement des risques sur sa santé mais également sur celle de son enfant à naître. Cela concerne également l’entourage de la femme enceinte et du nouveau-né.\r\n\r\nQuant aux techniques de communication, nous conseillons une approche individualisée. Le professionnel de santé, après avoir exploré les croyances et les connaissances de sa patiente, puis expliqué et recommandé la vaccination, doit laisser, si nécessaire, un délai de réflexion ainsi que de la documentation, à la femme enceinte.', '61826074.jpg', '2020-09-30 15:46:23', 3, '304f4803c54fd2f'),
(18, 'Information sur la campagne de vaccination', 'la campagne de vaccination aura lieu à partir du 20/10/200 à l\'hôpital docs keshero prière d\'être là et savoir plus d\'informations.', '848395687.jpg', '2020-10-11 15:28:42', 2, 'e3d29cf2a72b115');

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
  `code` longtext,
  `fichier` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `messagerie`
--

INSERT INTO `messagerie` (`idmessage`, `id_user`, `id_recever`, `message`, `created_at`, `code`, `fichier`) VALUES
(4, 2, 1, 'je vais bien merci et vous?', '2020-10-11 14:00:25', '60aa705cf0', NULL),
(5, 1, 2, 'ce bon!', '2020-10-11 14:02:23', '8f04778c11', NULL),
(7, 1, 8, 'bonjour!', '2020-10-11 14:40:28', 'c61e1cebed', NULL),
(8, 8, 1, 'oui bonjour!', '2020-10-11 14:40:38', 'bc750e94c0', NULL),
(9, 2, 1, 'ok merci!\r\nle programme de vaccination pour les enfants aura lieu quand?', '2020-10-11 14:57:58', '39a585857c', NULL),
(10, 1, 2, 'peut être la semaine prochaine.', '2020-10-11 14:58:38', 'edc718874a', NULL),
(11, 2, 1, 'ok merci', '2020-10-11 14:59:08', '58234c6226', '45dcf25fa6db2443425d1047b2be193agrossesse-femme-lit-110419-800px.jpg'),
(12, 1, 2, 'de rien!', '2020-10-11 14:59:26', '910c61b2e4', NULL),
(13, 2, 8, 'bonjour soeurette!', '2020-10-11 15:09:55', 'daac71e5cb', NULL),
(14, 8, 2, 'oui bonjour. comment va-tu?', '2020-10-11 15:10:28', '15fb4b0b9a', 'f97875326636f8cf3b8c78364dcd244agrossesse-femme-lit-110419-800px.jpg'),
(15, 2, 8, 'je veux bien merci, sauf de votre part seulement.', '2020-10-11 15:11:32', '6eaa745aa7', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `message` varchar(800) DEFAULT NULL,
  `url` varchar(800) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `icone` varchar(300) DEFAULT NULL,
  `titre` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `notification`
--

INSERT INTO `notification` (`id`, `message`, `url`, `id_user`, `created_at`, `icone`, `titre`) VALUES
(1, 'salut sumaili shabani roger vous a avez peut être raté une publication', 'admin/notification/89706195cfee28f', 1, '2020-09-30 14:44:35', 'fa fa-bell', 'nouvelle information'),
(2, 'salut sifa abeli vous a avez peut être raté une publication', 'user/notification/89706195cfee28f', 2, '2020-09-30 14:44:35', 'fa fa-bell', 'nouvelle information'),
(3, 'salut yuma kayanda vous a avez peut être raté une publication', 'user/notification/89706195cfee28f', 3, '2020-09-30 14:44:35', 'fa fa-bell', 'nouvelle information'),
(5, 'salut feza fataki sarah vous a avez peut être raté une publication', 'user/notification/89706195cfee28f', 5, '2020-09-30 14:44:35', 'fa fa-bell', 'nouvelle information'),
(6, 'salut rachel uwonda vous a avez peut être raté une publication', 'admin/notification/89706195cfee28f', 6, '2020-09-30 14:44:35', 'fa fa-bell', 'nouvelle information'),
(7, 'salut kasumba kipundula vous a avez peut être raté une publication', 'user/notification/89706195cfee28f', 7, '2020-09-30 14:44:35', 'fa fa-bell', 'nouvelle information'),
(8, 'salut sumaili shabani roger vous a avez peut être raté une publication', 'admin/notification/2492bd3b26274c2', 1, '2020-09-30 14:54:56', 'fa fa-bell', 'nouvelle information'),
(9, 'salut sifa abeli vous a avez peut être raté une publication', 'user/notification/2492bd3b26274c2', 2, '2020-09-30 14:54:56', 'fa fa-bell', 'nouvelle information'),
(10, 'salut yuma kayanda vous a avez peut être raté une publication', 'user/notification/2492bd3b26274c2', 3, '2020-09-30 14:54:56', 'fa fa-bell', 'nouvelle information'),
(12, 'salut feza fataki sarah vous a avez peut être raté une publication', 'user/notification/2492bd3b26274c2', 5, '2020-09-30 14:54:57', 'fa fa-bell', 'nouvelle information'),
(13, 'salut rachel uwonda vous a avez peut être raté une publication', 'admin/notification/2492bd3b26274c2', 6, '2020-09-30 14:54:57', 'fa fa-bell', 'nouvelle information'),
(14, 'salut kasumba kipundula vous a avez peut être raté une publication', 'user/notification/2492bd3b26274c2', 7, '2020-09-30 14:54:57', 'fa fa-bell', 'nouvelle information'),
(15, 'salut sumaili shabani roger vous a avez peut être raté une publication', 'admin/notification/bb708b911192f12', 1, '2020-09-30 14:57:04', 'fa fa-bell', 'nouvelle information'),
(16, 'salut sifa abeli vous a avez peut être raté une publication', 'user/notification/bb708b911192f12', 2, '2020-09-30 14:57:04', 'fa fa-bell', 'nouvelle information'),
(17, 'salut yuma kayanda vous a avez peut être raté une publication', 'user/notification/bb708b911192f12', 3, '2020-09-30 14:57:04', 'fa fa-bell', 'nouvelle information'),
(19, 'salut feza fataki sarah vous a avez peut être raté une publication', 'user/notification/bb708b911192f12', 5, '2020-09-30 14:57:04', 'fa fa-bell', 'nouvelle information'),
(20, 'salut rachel uwonda vous a avez peut être raté une publication', 'admin/notification/bb708b911192f12', 6, '2020-09-30 14:57:04', 'fa fa-bell', 'nouvelle information'),
(21, 'salut kasumba kipundula vous a avez peut être raté une publication', 'user/notification/bb708b911192f12', 7, '2020-09-30 14:57:04', 'fa fa-bell', 'nouvelle information'),
(22, 'salut sumaili shabani roger vous a avez peut être raté une publication', 'admin/notification/c65d9be116ccfea', 1, '2020-09-30 14:58:20', 'fa fa-bell', 'nouvelle information'),
(23, 'salut sifa abeli vous a avez peut être raté une publication', 'user/notification/c65d9be116ccfea', 2, '2020-09-30 14:58:21', 'fa fa-bell', 'nouvelle information'),
(24, 'salut yuma kayanda vous a avez peut être raté une publication', 'user/notification/c65d9be116ccfea', 3, '2020-09-30 14:58:21', 'fa fa-bell', 'nouvelle information'),
(26, 'salut feza fataki sarah vous a avez peut être raté une publication', 'user/notification/c65d9be116ccfea', 5, '2020-09-30 14:58:21', 'fa fa-bell', 'nouvelle information'),
(27, 'salut rachel uwonda vous a avez peut être raté une publication', 'admin/notification/c65d9be116ccfea', 6, '2020-09-30 14:58:21', 'fa fa-bell', 'nouvelle information'),
(28, 'salut kasumba kipundula vous a avez peut être raté une publication', 'user/notification/c65d9be116ccfea', 7, '2020-09-30 14:58:21', 'fa fa-bell', 'nouvelle information'),
(29, 'salut sumaili shabani roger vous a avez peut être raté une publication', 'admin/notification/eaaabd2b78066d6', 1, '2020-09-30 15:00:39', 'fa fa-bell', 'nouvelle information'),
(30, 'salut sifa abeli vous a avez peut être raté une publication', 'user/notification/eaaabd2b78066d6', 2, '2020-09-30 15:00:39', 'fa fa-bell', 'nouvelle information'),
(31, 'salut yuma kayanda vous a avez peut être raté une publication', 'user/notification/eaaabd2b78066d6', 3, '2020-09-30 15:00:39', 'fa fa-bell', 'nouvelle information'),
(33, 'salut feza fataki sarah vous a avez peut être raté une publication', 'user/notification/eaaabd2b78066d6', 5, '2020-09-30 15:00:39', 'fa fa-bell', 'nouvelle information'),
(34, 'salut rachel uwonda vous a avez peut être raté une publication', 'admin/notification/eaaabd2b78066d6', 6, '2020-09-30 15:00:39', 'fa fa-bell', 'nouvelle information'),
(35, 'salut kasumba kipundula vous a avez peut être raté une publication', 'user/notification/eaaabd2b78066d6', 7, '2020-09-30 15:00:39', 'fa fa-bell', 'nouvelle information'),
(36, 'salut sumaili shabani roger vous a avez peut être raté une publication', 'admin/notification/0b6a8014f6cb36b', 1, '2020-09-30 15:01:38', 'fa fa-bell', 'nouvelle information'),
(37, 'salut sifa abeli vous a avez peut être raté une publication', 'user/notification/0b6a8014f6cb36b', 2, '2020-09-30 15:01:38', 'fa fa-bell', 'nouvelle information'),
(38, 'salut yuma kayanda vous a avez peut être raté une publication', 'user/notification/0b6a8014f6cb36b', 3, '2020-09-30 15:01:38', 'fa fa-bell', 'nouvelle information'),
(40, 'salut feza fataki sarah vous a avez peut être raté une publication', 'user/notification/0b6a8014f6cb36b', 5, '2020-09-30 15:01:38', 'fa fa-bell', 'nouvelle information'),
(41, 'salut rachel uwonda vous a avez peut être raté une publication', 'admin/notification/0b6a8014f6cb36b', 6, '2020-09-30 15:01:38', 'fa fa-bell', 'nouvelle information'),
(42, 'salut kasumba kipundula vous a avez peut être raté une publication', 'user/notification/0b6a8014f6cb36b', 7, '2020-09-30 15:01:39', 'fa fa-bell', 'nouvelle information'),
(43, 'salut sumaili shabani roger vous a avez peut être raté une publication', 'admin/notification/a74e8a051f07794', 1, '2020-09-30 15:04:53', 'fa fa-bell', 'nouvelle information'),
(44, 'salut sifa abeli vous a avez peut être raté une publication', 'user/notification/a74e8a051f07794', 2, '2020-09-30 15:04:54', 'fa fa-bell', 'nouvelle information'),
(45, 'salut yuma kayanda vous a avez peut être raté une publication', 'user/notification/a74e8a051f07794', 3, '2020-09-30 15:04:54', 'fa fa-bell', 'nouvelle information'),
(47, 'salut feza fataki sarah vous a avez peut être raté une publication', 'user/notification/a74e8a051f07794', 5, '2020-09-30 15:04:54', 'fa fa-bell', 'nouvelle information'),
(48, 'salut rachel uwonda vous a avez peut être raté une publication', 'admin/notification/a74e8a051f07794', 6, '2020-09-30 15:04:54', 'fa fa-bell', 'nouvelle information'),
(49, 'salut kasumba kipundula vous a avez peut être raté une publication', 'user/notification/a74e8a051f07794', 7, '2020-09-30 15:04:54', 'fa fa-bell', 'nouvelle information'),
(50, 'salut sumaili shabani roger vous a avez peut être raté une publication', 'admin/notification/4616b59334b2e7a', 1, '2020-09-30 15:07:23', 'fa fa-bell', 'nouvelle information'),
(51, 'salut sifa abeli vous a avez peut être raté une publication', 'user/notification/4616b59334b2e7a', 2, '2020-09-30 15:07:23', 'fa fa-bell', 'nouvelle information'),
(52, 'salut yuma kayanda vous a avez peut être raté une publication', 'user/notification/4616b59334b2e7a', 3, '2020-09-30 15:07:23', 'fa fa-bell', 'nouvelle information'),
(54, 'salut feza fataki sarah vous a avez peut être raté une publication', 'user/notification/4616b59334b2e7a', 5, '2020-09-30 15:07:23', 'fa fa-bell', 'nouvelle information'),
(55, 'salut rachel uwonda vous a avez peut être raté une publication', 'admin/notification/4616b59334b2e7a', 6, '2020-09-30 15:07:23', 'fa fa-bell', 'nouvelle information'),
(56, 'salut kasumba kipundula vous a avez peut être raté une publication', 'user/notification/4616b59334b2e7a', 7, '2020-09-30 15:07:23', 'fa fa-bell', 'nouvelle information'),
(57, 'salut sumaili shabani roger vous a avez peut être raté une publication', 'admin/notification/8d36c34405d86e5', 1, '2020-09-30 15:10:12', 'fa fa-bell', 'nouvelle information'),
(59, 'salut yuma kayanda vous a avez peut être raté une publication', 'user/notification/8d36c34405d86e5', 3, '2020-09-30 15:10:12', 'fa fa-bell', 'nouvelle information'),
(61, 'salut feza fataki sarah vous a avez peut être raté une publication', 'user/notification/8d36c34405d86e5', 5, '2020-09-30 15:10:12', 'fa fa-bell', 'nouvelle information'),
(62, 'salut rachel uwonda vous a avez peut être raté une publication', 'admin/notification/8d36c34405d86e5', 6, '2020-09-30 15:10:12', 'fa fa-bell', 'nouvelle information'),
(63, 'salut kasumba kipundula vous a avez peut être raté une publication', 'user/notification/8d36c34405d86e5', 7, '2020-09-30 15:10:12', 'fa fa-bell', 'nouvelle information'),
(64, 'salut sumaili shabani roger vous a avez peut être raté une publication', 'admin/notification/41d4e994907c60d', 1, '2020-09-30 15:10:59', 'fa fa-bell', 'nouvelle information'),
(66, 'salut yuma kayanda vous a avez peut être raté une publication', 'user/notification/41d4e994907c60d', 3, '2020-09-30 15:10:59', 'fa fa-bell', 'nouvelle information'),
(68, 'salut feza fataki sarah vous a avez peut être raté une publication', 'user/notification/41d4e994907c60d', 5, '2020-09-30 15:10:59', 'fa fa-bell', 'nouvelle information'),
(69, 'salut rachel uwonda vous a avez peut être raté une publication', 'admin/notification/41d4e994907c60d', 6, '2020-09-30 15:10:59', 'fa fa-bell', 'nouvelle information'),
(70, 'salut kasumba kipundula vous a avez peut être raté une publication', 'user/notification/41d4e994907c60d', 7, '2020-09-30 15:10:59', 'fa fa-bell', 'nouvelle information'),
(71, 'salut sumaili shabani roger vous a avez peut être raté une publication', 'admin/notification/a134f776a893151', 1, '2020-09-30 15:11:38', 'fa fa-bell', 'nouvelle information'),
(72, 'salut sifa abeli vous a avez peut être raté une publication', 'user/notification/a134f776a893151', 2, '2020-09-30 15:11:38', 'fa fa-bell', 'nouvelle information'),
(73, 'salut yuma kayanda vous a avez peut être raté une publication', 'user/notification/a134f776a893151', 3, '2020-09-30 15:11:38', 'fa fa-bell', 'nouvelle information'),
(75, 'salut feza fataki sarah vous a avez peut être raté une publication', 'user/notification/a134f776a893151', 5, '2020-09-30 15:11:39', 'fa fa-bell', 'nouvelle information'),
(76, 'salut rachel uwonda vous a avez peut être raté une publication', 'admin/notification/a134f776a893151', 6, '2020-09-30 15:11:39', 'fa fa-bell', 'nouvelle information'),
(77, 'salut kasumba kipundula vous a avez peut être raté une publication', 'user/notification/a134f776a893151', 7, '2020-09-30 15:11:39', 'fa fa-bell', 'nouvelle information'),
(78, 'salut sumaili shabani roger vous a avez peut être raté une publication', 'admin/notification/2a9b7006f2c25de', 1, '2020-09-30 15:12:48', 'fa fa-bell', 'nouvelle information'),
(79, 'salut sifa abeli vous a avez peut être raté une publication', 'user/notification/2a9b7006f2c25de', 2, '2020-09-30 15:12:48', 'fa fa-bell', 'nouvelle information'),
(80, 'salut yuma kayanda vous a avez peut être raté une publication', 'user/notification/2a9b7006f2c25de', 3, '2020-09-30 15:12:48', 'fa fa-bell', 'nouvelle information'),
(82, 'salut feza fataki sarah vous a avez peut être raté une publication', 'user/notification/2a9b7006f2c25de', 5, '2020-09-30 15:12:48', 'fa fa-bell', 'nouvelle information'),
(83, 'salut rachel uwonda vous a avez peut être raté une publication', 'admin/notification/2a9b7006f2c25de', 6, '2020-09-30 15:12:48', 'fa fa-bell', 'nouvelle information'),
(84, 'salut kasumba kipundula vous a avez peut être raté une publication', 'user/notification/2a9b7006f2c25de', 7, '2020-09-30 15:12:48', 'fa fa-bell', 'nouvelle information'),
(85, 'salut sumaili shabani roger vous a avez peut être raté une publication', 'admin/notification/3f6620be39f5139', 1, '2020-09-30 15:13:29', 'fa fa-bell', 'nouvelle information'),
(86, 'salut sifa abeli vous a avez peut être raté une publication', 'user/notification/3f6620be39f5139', 2, '2020-09-30 15:13:29', 'fa fa-bell', 'nouvelle information'),
(87, 'salut yuma kayanda vous a avez peut être raté une publication', 'user/notification/3f6620be39f5139', 3, '2020-09-30 15:13:30', 'fa fa-bell', 'nouvelle information'),
(89, 'salut feza fataki sarah vous a avez peut être raté une publication', 'user/notification/3f6620be39f5139', 5, '2020-09-30 15:13:30', 'fa fa-bell', 'nouvelle information'),
(90, 'salut rachel uwonda vous a avez peut être raté une publication', 'admin/notification/3f6620be39f5139', 6, '2020-09-30 15:13:30', 'fa fa-bell', 'nouvelle information'),
(91, 'salut kasumba kipundula vous a avez peut être raté une publication', 'user/notification/3f6620be39f5139', 7, '2020-09-30 15:13:30', 'fa fa-bell', 'nouvelle information'),
(94, 'salut yuma kayanda vous a avez peut être raté une publication', 'user/notification/8b4703316b57c10', 3, '2020-09-30 15:19:25', 'fa fa-bell', 'nouvelle information'),
(96, 'salut feza fataki sarah vous a avez peut être raté une publication', 'user/notification/8b4703316b57c10', 5, '2020-09-30 15:19:25', 'fa fa-bell', 'nouvelle information'),
(97, 'salut rachel uwonda vous a avez peut être raté une publication', 'admin/notification/8b4703316b57c10', 6, '2020-09-30 15:19:25', 'fa fa-bell', 'nouvelle information'),
(98, 'salut kasumba kipundula vous a avez peut être raté une publication', 'user/notification/8b4703316b57c10', 7, '2020-09-30 15:19:25', 'fa fa-bell', 'nouvelle information'),
(100, 'salut sifa abeli vous a avez peut être raté une publication', 'user/notification/3d11d795d33ec39', 2, '2020-09-30 15:21:58', 'fa fa-bell', 'nouvelle information'),
(101, 'salut yuma kayanda vous a avez peut être raté une publication', 'user/notification/3d11d795d33ec39', 3, '2020-09-30 15:21:58', 'fa fa-bell', 'nouvelle information'),
(103, 'salut feza fataki sarah vous a avez peut être raté une publication', 'user/notification/3d11d795d33ec39', 5, '2020-09-30 15:21:58', 'fa fa-bell', 'nouvelle information'),
(104, 'salut rachel uwonda vous a avez peut être raté une publication', 'admin/notification/3d11d795d33ec39', 6, '2020-09-30 15:21:58', 'fa fa-bell', 'nouvelle information'),
(105, 'salut kasumba kipundula vous a avez peut être raté une publication', 'user/notification/3d11d795d33ec39', 7, '2020-09-30 15:21:58', 'fa fa-bell', 'nouvelle information'),
(108, 'salut yuma kayanda vous a avez peut être raté une publication', 'user/notification/05b047bdf0fd006', 3, '2020-09-30 15:25:41', 'fa fa-bell', 'nouvelle information'),
(110, 'salut feza fataki sarah vous a avez peut être raté une publication', 'user/notification/05b047bdf0fd006', 5, '2020-09-30 15:25:41', 'fa fa-bell', 'nouvelle information'),
(111, 'salut rachel uwonda vous a avez peut être raté une publication', 'admin/notification/05b047bdf0fd006', 6, '2020-09-30 15:25:41', 'fa fa-bell', 'nouvelle information'),
(112, 'salut kasumba kipundula vous a avez peut être raté une publication', 'user/notification/05b047bdf0fd006', 7, '2020-09-30 15:25:41', 'fa fa-bell', 'nouvelle information'),
(114, 'salut sifa abeli vous a avez peut être raté une publication', 'user/notification/304f4803c54fd2f', 2, '2020-09-30 15:46:23', 'fa fa-bell', 'nouvelle information'),
(115, 'salut yuma kayanda vous a avez peut être raté une publication', 'user/notification/304f4803c54fd2f', 3, '2020-09-30 15:46:23', 'fa fa-bell', 'nouvelle information'),
(117, 'salut feza fataki sarah vous a avez peut être raté une publication', 'user/notification/304f4803c54fd2f', 5, '2020-09-30 15:46:23', 'fa fa-bell', 'nouvelle information'),
(118, 'salut rachel uwonda vous a avez peut être raté une publication', 'admin/notification/304f4803c54fd2f', 6, '2020-09-30 15:46:23', 'fa fa-bell', 'nouvelle information'),
(119, 'salut kasumba kipundula vous a avez peut être raté une publication', 'user/notification/304f4803c54fd2f', 7, '2020-09-30 15:46:23', 'fa fa-bell', 'nouvelle information'),
(120, 'salut sumaili shabani roger vous a avez peut être raté une publication', 'admin/notification/e3d29cf2a72b115', 1, '2020-10-11 15:28:42', 'fa fa-bell', 'nouvelle information'),
(121, 'salut sifa abeli vous a avez peut être raté une publication', 'user/notification/e3d29cf2a72b115', 2, '2020-10-11 15:28:42', 'fa fa-bell', 'nouvelle information'),
(122, 'salut yuma kayanda vous a avez peut être raté une publication', 'user/notification/e3d29cf2a72b115', 3, '2020-10-11 15:28:42', 'fa fa-bell', 'nouvelle information'),
(123, 'salut feza fataki sarah vous a avez peut être raté une publication', 'user/notification/e3d29cf2a72b115', 5, '2020-10-11 15:28:42', 'fa fa-bell', 'nouvelle information'),
(124, 'salut rachel uwonda vous a avez peut être raté une publication', 'admin/notification/e3d29cf2a72b115', 6, '2020-10-11 15:28:42', 'fa fa-bell', 'nouvelle information'),
(125, 'salut kasumba kipundula vous a avez peut être raté une publication', 'user/notification/e3d29cf2a72b115', 7, '2020-10-11 15:28:42', 'fa fa-bell', 'nouvelle information'),
(126, 'salut jolie piana vous a avez peut être raté une publication', 'user/notification/e3d29cf2a72b115', 8, '2020-10-11 15:28:42', 'fa fa-bell', 'nouvelle information');

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
(1, 1, '2020-10-12 09:15:11');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `profile_hopial`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `profile_hopial` (
`user_id` int(11)
,`service_id` int(11)
,`fullname` varchar(40)
,`lat` float(10,6)
,`lng` float(10,6)
,`email` varchar(254)
,`adresse` varchar(300)
,`description` text
,`telephone` varchar(300)
,`icone` varchar(300)
,`site_web` varchar(800)
,`nom` varchar(300)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `profile_information`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `profile_information` (
`idformation` int(11)
,`nomf` varchar(300)
,`description` text
,`icone` varchar(300)
,`created_at` datetime
,`idcat` int(11)
,`code` varchar(300)
,`nom` varchar(300)
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
-- Doublure de structure pour la vue `profile_vaccination`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `profile_vaccination` (
`id` int(11)
,`idv` int(11)
,`ide` int(11)
,`created_at` datetime
,`annee` varchar(300)
,`nom` varchar(300)
,`designation` varchar(300)
,`categorie` varchar(300)
,`periode` varchar(300)
,`sexe` varchar(300)
);

-- --------------------------------------------------------

--
-- Structure de la table `recupere`
--

CREATE TABLE `recupere` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `verification_key` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `recupere`
--

INSERT INTO `recupere` (`id`, `email`, `verification_key`) VALUES
(1, 'sumailiroger681@gmail.com', 'b966dcfab2c63d9558375efaf5bd1737');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `idrole` int(11) NOT NULL,
  `nom` varchar(300) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`idrole`, `nom`, `created_at`) VALUES
(1, 'admin', '2020-09-14 15:51:36'),
(2, 'user', '2020-09-14 15:51:36');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_info`
--

CREATE TABLE `tbl_info` (
  `idinfo` int(11) NOT NULL,
  `nom_site` varchar(300) DEFAULT NULL,
  `icone` varchar(300) DEFAULT NULL,
  `tel1` varchar(300) DEFAULT NULL,
  `tel2` varchar(300) DEFAULT NULL,
  `adresse` text,
  `facebook` varchar(600) DEFAULT NULL,
  `twitter` varchar(600) DEFAULT NULL,
  `linkedin` varchar(600) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `termes` text,
  `confidentialite` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tbl_info`
--

INSERT INTO `tbl_info` (`idinfo`, `nom_site`, `icone`, `tel1`, `tel2`, `adresse`, `facebook`, `twitter`, `linkedin`, `email`, `termes`, `confidentialite`) VALUES
(1, 'Map santé', '1262550263.jpg', '+243817883541', '+243970524666', 'Nord-kivu goma quartier TMK', 'https://facebook.com/', 'https://twitter.com/', 'https://linkedin.com/', 'info.mapsanterdc@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.');

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
  `idrole` int(11) NOT NULL,
  `sexe` varchar(30) DEFAULT NULL,
  `facebook` varchar(900) DEFAULT NULL,
  `linkedin` varchar(900) DEFAULT NULL,
  `twitter` varchar(900) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `image`, `telephone`, `full_adresse`, `biographie`, `date_nais`, `passwords`, `idrole`, `sexe`, `facebook`, `linkedin`, `twitter`) VALUES
(1, 'sumaili shabani roger', 'patrôna', 'sumailiroger681@gmail.com', '80343806.jpg', '0817883541', 'Ulpgl goma', 'Fullstack web developer bringing solution in technology and digital                                                                        ', '1998-08-12', '9db09d6ae665e42340ef0b1ef1eb95b4', 1, 'M', 'https://www.facebook.com/patronat.shabanisumaili.9/', 'https://www.linkedin.com/in/sumaili-shabani-roger-patr%C3%B4na-7426a71a1/', 'https://twitter.com/RogerPatrona'),
(2, 'sifa abeli', 'blessing', 'sifa@gmail.com', '1279668361.jpeg', '+243993315152', 'Ulpgl goma', 'Si Dieu et avec moi qui sera contre moi? oh seigneur ta grâce me comble!', '1994-09-29', 'e10adc3949ba59abbe56e057f20f883e', 2, 'F', 'https://facebook.com/', 'https://linkedin.com/', 'https://twitter.com/'),
(3, 'yuma kayanda', NULL, 'yuma@gmail.com', 'icone-user.png', NULL, NULL, NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', 2, 'M', NULL, NULL, NULL),
(5, 'feza fataki sarah', 'abeli', 'feza@gmail.com', 'icone-user.png', '0819891527', 'Ulpgl goma', 'l\'unique à son genre!', '2000-09-30', 'e10adc3949ba59abbe56e057f20f883e', 2, 'F', NULL, NULL, NULL),
(6, 'rachel uwonda', NULL, 'rachel@gmail.com', 'icone-user.png', NULL, NULL, NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', 1, 'F', NULL, NULL, NULL),
(7, 'kasumba kipundula', NULL, 'kasumba@gmail.com', 'icone-user.png', NULL, NULL, NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', 2, 'M', NULL, NULL, NULL),
(8, 'jolie piana', 'prisca', 'jolie@gmail.com', '25858428.jpg', '0819891527', 'katoyi goma', 'je suis très simple', '2000-10-01', '25d55ad283aa400af464c76d713c07ad', 2, 'F', 'https://facebook.com/', 'https://linkedin.com/', 'https://twitter.com/');

-- --------------------------------------------------------

--
-- Structure de la table `vaccin`
--

CREATE TABLE `vaccin` (
  `idv` int(11) NOT NULL,
  `designation` varchar(300) DEFAULT NULL,
  `categorie` varchar(300) DEFAULT NULL,
  `periode` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vaccin`
--

INSERT INTO `vaccin` (`idv`, `designation`, `categorie`, `periode`) VALUES
(1, 'BCG', 'bcg', 'à la naissance'),
(2, 'VPob 0', 'vpo', 'à la naissance'),
(3, 'VPob 1', 'vpo', '6 semaines'),
(4, 'DTC-hep B-HIB 1', 'dtc hep-Bhip', '6 semaines'),
(5, 'preumo 1', 'preumo', '6 semaines'),
(6, 'Rota 1', 'rota', '6 semaines'),
(7, 'VPob 2', 'vpo', '10 semaines'),
(8, 'DTC-hep B-HIB 2', 'dtc hep-Bhip', '10 semaines'),
(9, 'preumo 2', 'preumo', '10 semaines'),
(10, 'Rota 2', 'rota', '10 semaines'),
(11, 'VPob 3', 'vpo', '14 semaines'),
(12, 'VPI', 'vpi', '14 semaines'),
(13, 'DTC-hep B-HIB 3', 'dtc hep-Bhip', '14 semaines'),
(14, 'preumo 3', 'preumo', '14 semaines'),
(15, 'VAR', 'var', '9 mois'),
(16, 'VAA', 'vaa', '9 mois'),
(17, 'Vit.A', 'Vit.A', '6 mois'),
(18, 'Rota 3', 'rota', '9 mois');

-- --------------------------------------------------------

--
-- Structure de la table `vaccination`
--

CREATE TABLE `vaccination` (
  `id` int(11) NOT NULL,
  `ide` int(11) DEFAULT NULL,
  `idv` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `annee` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vaccination`
--

INSERT INTO `vaccination` (`id`, `ide`, `idv`, `created_at`, `annee`) VALUES
(1, 7, 6, '2020-10-10 15:51:53', '2020'),
(2, 3, 6, '2020-10-10 15:53:54', '2020'),
(3, 7, 4, '2020-10-10 15:55:15', '2020'),
(4, 3, 4, '2020-10-10 15:56:15', '2020'),
(5, 4, 4, '2020-10-10 15:56:39', '2020'),
(6, 6, 4, '2020-10-10 15:57:27', '2020'),
(7, 5, 4, '2020-10-10 15:57:35', '2020'),
(8, 2, 1, '2020-10-10 15:57:57', '2020'),
(9, 5, 1, '2020-10-10 15:58:04', '2020'),
(10, 6, 1, '2020-10-10 15:58:12', '2020'),
(11, 4, 1, '2020-10-10 15:58:26', '2020'),
(12, 6, 8, '2020-10-10 15:59:33', '2020'),
(13, 7, 9, '2020-10-10 15:59:44', '2020'),
(14, 2, 9, '2020-10-10 15:59:51', '2020'),
(15, 2, 13, '2020-10-11 12:27:13', '2020');

-- --------------------------------------------------------

--
-- Structure de la vue `profile_hopial`
--
DROP TABLE IF EXISTS `profile_hopial`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `profile_hopial`  AS  select `ci_providers`.`user_id` AS `user_id`,`ci_providers`.`service_id` AS `service_id`,`ci_providers`.`fullname` AS `fullname`,`ci_providers`.`lat` AS `lat`,`ci_providers`.`lng` AS `lng`,`ci_providers`.`email` AS `email`,`ci_providers`.`adresse` AS `adresse`,`ci_providers`.`description` AS `description`,`ci_providers`.`telephone` AS `telephone`,`ci_providers`.`icone` AS `icone`,`ci_providers`.`site_web` AS `site_web`,`commune`.`nom` AS `nom` from (`ci_providers` join `commune` on((`commune`.`idcat` = `ci_providers`.`service_id`))) ;

-- --------------------------------------------------------

--
-- Structure de la vue `profile_information`
--
DROP TABLE IF EXISTS `profile_information`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `profile_information`  AS  select `information`.`idformation` AS `idformation`,`information`.`nomf` AS `nomf`,`information`.`description` AS `description`,`information`.`icone` AS `icone`,`information`.`created_at` AS `created_at`,`information`.`idcat` AS `idcat`,`information`.`code` AS `code`,`category`.`nom` AS `nom` from (`information` join `category` on((`category`.`idcat` = `information`.`idcat`))) ;

-- --------------------------------------------------------

--
-- Structure de la vue `profile_online`
--
DROP TABLE IF EXISTS `profile_online`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `profile_online`  AS  select `online`.`id` AS `reference`,`online`.`id_user` AS `id_user`,`online`.`created_at` AS `created_at`,`users`.`first_name` AS `first_name`,`users`.`last_name` AS `last_name`,`users`.`image` AS `image` from (`online` join `users` on((`online`.`id_user` = `users`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure de la vue `profile_vaccination`
--
DROP TABLE IF EXISTS `profile_vaccination`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `profile_vaccination`  AS  select `vaccination`.`id` AS `id`,`vaccination`.`idv` AS `idv`,`vaccination`.`ide` AS `ide`,`vaccination`.`created_at` AS `created_at`,`vaccination`.`annee` AS `annee`,`enfant`.`nom` AS `nom`,`vaccin`.`designation` AS `designation`,`vaccin`.`categorie` AS `categorie`,`vaccin`.`periode` AS `periode`,`enfant`.`sexe` AS `sexe` from ((`vaccination` join `enfant` on((`enfant`.`ide` = `vaccination`.`ide`))) join `vaccin` on((`vaccin`.`idv` = `vaccination`.`idv`))) ;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`idcat`);

--
-- Index pour la table `ci_providers`
--
ALTER TABLE `ci_providers`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Index pour la table `commune`
--
ALTER TABLE `commune`
  ADD PRIMARY KEY (`idcat`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `enfant`
--
ALTER TABLE `enfant`
  ADD PRIMARY KEY (`ide`);

--
-- Index pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`idformation`),
  ADD KEY `idcat` (`idcat`);

--
-- Index pour la table `messagerie`
--
ALTER TABLE `messagerie`
  ADD PRIMARY KEY (`idmessage`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_recever` (`id_recever`);

--
-- Index pour la table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `online`
--
ALTER TABLE `online`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `recupere`
--
ALTER TABLE `recupere`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`idrole`);

--
-- Index pour la table `tbl_info`
--
ALTER TABLE `tbl_info`
  ADD PRIMARY KEY (`idinfo`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idrole` (`idrole`);

--
-- Index pour la table `vaccin`
--
ALTER TABLE `vaccin`
  ADD PRIMARY KEY (`idv`);

--
-- Index pour la table `vaccination`
--
ALTER TABLE `vaccination`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ide` (`ide`),
  ADD KEY `idv` (`idv`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `idcat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `ci_providers`
--
ALTER TABLE `ci_providers`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `commune`
--
ALTER TABLE `commune`
  MODIFY `idcat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `enfant`
--
ALTER TABLE `enfant`
  MODIFY `ide` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `information`
--
ALTER TABLE `information`
  MODIFY `idformation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `messagerie`
--
ALTER TABLE `messagerie`
  MODIFY `idmessage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT pour la table `online`
--
ALTER TABLE `online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `recupere`
--
ALTER TABLE `recupere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `idrole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `tbl_info`
--
ALTER TABLE `tbl_info`
  MODIFY `idinfo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `vaccin`
--
ALTER TABLE `vaccin`
  MODIFY `idv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `vaccination`
--
ALTER TABLE `vaccination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ci_providers`
--
ALTER TABLE `ci_providers`
  ADD CONSTRAINT `ci_providers_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `commune` (`idcat`) ON DELETE CASCADE;

--
-- Contraintes pour la table `information`
--
ALTER TABLE `information`
  ADD CONSTRAINT `information_ibfk_1` FOREIGN KEY (`idcat`) REFERENCES `category` (`idcat`) ON DELETE CASCADE;

--
-- Contraintes pour la table `messagerie`
--
ALTER TABLE `messagerie`
  ADD CONSTRAINT `messagerie_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `messagerie_ibfk_2` FOREIGN KEY (`id_recever`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `online`
--
ALTER TABLE `online`
  ADD CONSTRAINT `online_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`idrole`) REFERENCES `role` (`idrole`) ON DELETE CASCADE;

--
-- Contraintes pour la table `vaccination`
--
ALTER TABLE `vaccination`
  ADD CONSTRAINT `vaccination_ibfk_1` FOREIGN KEY (`ide`) REFERENCES `enfant` (`ide`) ON DELETE CASCADE,
  ADD CONSTRAINT `vaccination_ibfk_2` FOREIGN KEY (`idv`) REFERENCES `vaccin` (`idv`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
