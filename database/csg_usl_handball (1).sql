-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : dim. 17 déc. 2023 à 08:14
-- Version du serveur : 5.7.39
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `csg_usl_handball`
--

-- --------------------------------------------------------

--
-- Structure de la table `actualites`
--

CREATE TABLE `actualites` (
  `actu_id` int(11) NOT NULL,
  `actu_type` varchar(50) NOT NULL,
  `actu_date` varchar(50) NOT NULL,
  `actu_title` varchar(50) NOT NULL,
  `actu_text` varchar(150) NOT NULL,
  `actu_pictures` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `actualites`
--

INSERT INTO `actualites` (`actu_id`, `actu_type`, `actu_date`, `actu_title`, `actu_text`, `actu_pictures`) VALUES
(10, 'Événements', '24/12/2023', 'Téléthon', 'Venez nous rejoindre à notre tournoi au profit du Téléthon', '65670c1b47a90.webp');

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `adm_id` int(11) NOT NULL,
  `adm_login` varchar(50) NOT NULL,
  `adm_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`adm_id`, `adm_login`, `adm_password`) VALUES
(1, 'csghandball', '$2y$10$TsYAN4ExSruN467MRUJVneTJT.MtSCUWEMxj73mIp9li.WiPyIFi2');

-- --------------------------------------------------------

--
-- Structure de la table `album`
--

CREATE TABLE `album` (
  `alb_id` int(11) NOT NULL,
  `alb_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `battle`
--

CREATE TABLE `battle` (
  `bat_id` int(11) NOT NULL,
  `score_equipe1` int(11) DEFAULT NULL,
  `score_equipe2` int(11) DEFAULT NULL,
  `mat_id` int(11) NOT NULL,
  `equ_id` int(11) NOT NULL,
  `equ_id_equipes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `battle`
--

INSERT INTO `battle` (`bat_id`, `score_equipe1`, `score_equipe2`, `mat_id`, `equ_id`, `equ_id_equipes`) VALUES
(51, 27, 21, 56, 14, 3),
(56, 20, 10, 61, 1, 4),
(60, 20, 10, 65, 14, 14);

-- --------------------------------------------------------

--
-- Structure de la table `categories_equipes`
--

CREATE TABLE `categories_equipes` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories_equipes`
--

INSERT INTO `categories_equipes` (`cat_id`, `cat_name`) VALUES
(1, 'séniors M'),
(2, '-17M'),
(3, '-15M'),
(4, '-13M'),
(5, '-11M'),
(6, 'Loisirs'),
(7, 'séniors F'),
(8, '-17F'),
(9, '-15F'),
(10, '-13F'),
(11, '-11F');

-- --------------------------------------------------------

--
-- Structure de la table `competitions`
--

CREATE TABLE `competitions` (
  `com_id` int(11) NOT NULL,
  `com_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `competitions`
--

INSERT INTO `competitions` (`com_id`, `com_name`) VALUES
(1, '+16 Prénationale'),
(2, '+16 Région Honneur'),
(3, '+16 Coupe Normandie'),
(4, 'Coupe de France Régionale'),
(5, '4eme Division Territoriale'),
(6, '1ere Division Territoriale'),
(7, 'Coupe 76'),
(8, 'Amical');

-- --------------------------------------------------------

--
-- Structure de la table `equipes`
--

CREATE TABLE `equipes` (
  `equ_id` int(11) NOT NULL,
  `equ_name` varchar(50) NOT NULL,
  `equ_logo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `equipes`
--

INSERT INTO `equipes` (`equ_id`, `equ_name`, `equ_logo`) VALUES
(1, 'CSGravenchon /USL', 'https://media-logos-clubs.ffhandball.fr/128/2015-07-22-221685d7-41c2-49cc-9009-b93728a16d16.webp'),
(2, 'Caen Venoix', 'https://media-logos-clubs.ffhandball.fr/128/2015-04-24-3d9559be-6e22-47e4-b4c5-11cfd6a0ac4a.webp'),
(3, 'RC.Bolbec', 'https://media-logos-clubs.ffhandball.fr/128/2018-06-14-69f86b4a-e5a4-4b0f-b207-70cd6fd0efa0.webp'),
(4, 'Rouen', 'https://media-logos-clubs.ffhandball.fr/64/2017-04-27-d0571b58-aa8b-45d0-80ec-28249c073b8f.webp'),
(5, 'AS Carsix', 'https://media-logos-clubs.ffhandball.fr/64/2015-08-12-51dc573b-aeff-4170-897c-629d3c9b43b8.webp'),
(6, 'CL Tourlaville', 'https://media-logos-clubs.ffhandball.fr/64/2019-06-23-fd7306fa-717f-4b31-a532-f2bfd27b8d00.webp'),
(7, 'E.Val de reuil louviers HB', 'https://media-logos-clubs.ffhandball.fr/64/2019-09-06-6d85e8a7-5f5b-4211-b8b2-6d0527464158.webp'),
(8, 'HBC EU', 'https://media-logos-clubs.ffhandball.fr/64/2021-05-17-95d48f36-7428-4c56-bd1a-d33d1f98a7f9.webp'),
(9, 'E.Avranches/Granville', 'https://media-logos-clubs.ffhandball.fr/64/2015-04-24-93ddea8f-f634-480d-94dc-5f930df18175.webp'),
(10, 'SMV Vernon - Saint Marcel', 'https://media-logos-clubs.ffhandball.fr/64/2021-07-07-7a9c7a0b-a91f-485b-b170-757a8a779236.webp'),
(11, 'HBC Roumois', 'https://media-logos-clubs.ffhandball.fr/64/2023-07-11-94daab80-28d8-4ce6-8431-b361e8b54e5a.webp'),
(12, 'AL Deville', 'https://media-logos-clubs.ffhandball.fr/64/2019-06-24-2015dd9f-e4a0-450c-928c-0990f3d759b7.webp'),
(13, 'Cerisy Coutances HB', 'https://media-logos-clubs.ffhandball.fr/64/2017-06-30-f26906b4-1f76-4524-8bf2-2ba9a2774e41.webp'),
(14, 'USLillebonne / CSG', 'https://media-logos-clubs.ffhandball.fr/64/2023-06-04-8287137a-8e0e-44b5-85e3-aeafcb8be129.webp'),
(15, 'AS Goderville HB', 'https://media-logos-clubs.ffhandball.fr/64/2015-04-24-c86530af-ff74-4a8e-9c02-251afc4af7a0.webp'),
(16, 'FJEP Fleury / Andelle', 'https://media-logos-clubs.ffhandball.fr/64/2016-06-14-49b025a5-308f-4a08-b83b-3161674f7ca6.webp'),
(17, 'E.Fecamp / St Leonard (us fecampoise hb)', 'https://media-logos-clubs.ffhandball.fr/64/2017-07-07-df8e8d4f-581c-43ea-b871-bd2d034ef9ce.webp'),
(18, 'SEP Blangy Bouttencourt', 'https://media-logos-clubs.ffhandball.fr/64/2017-07-18-cb9f753f-2fb0-4bef-a2fc-5e6010f39981.webp'),
(19, 'GCO Bihorel', 'https://media-logos-clubs.ffhandball.fr/64/2021-07-12-0391a4cd-f5f8-4e97-83c6-5df417264f8a.webp'),
(20, 'Montivilliers', 'https://media-logos-clubs.ffhandball.fr/64/2020-09-16-febae6f6-8b91-4c57-ab92-cd1119ca5ab0.webp'),
(21, 'CA Pont Audemer / Beuzeville', 'https://media-logos-clubs.ffhandball.fr/64/2016-06-28-e6733c0a-d0ac-405c-a67a-4b27dcaefc02.webp'),
(22, 'C.S. Honfleur HB', 'https://media-logos-clubs.ffhandball.fr/64/2016-07-01-1383a770-d0e4-464f-89fd-494c4f1c03bf.webp'),
(23, 'A.Malaunay / Le Houlme HB', 'https://media-logos-clubs.ffhandball.fr/64/2023-06-12-b4108615-ed83-41da-8eed-db1d6f2bf26a.webp'),
(24, 'ALCL Grand Quevilly', 'https://media-logos-clubs.ffhandball.fr/64/2018-07-05-6372cae9-86c5-41b4-b778-fb47778d922c.webp'),
(25, 'HBC Brotonne-le Trait', 'https://media-logos-clubs.ffhandball.fr/64/2023-06-05-daac120a-c4e3-4d60-99ec-fccbcc29e872.webp'),
(26, 'HBC Auffay-TOTES', 'https://media-logos-clubs.ffhandball.fr/64/2018-06-22-3cf684b9-ee10-45b8-97eb-c7ed56c13566.webp'),
(27, 'E ST Leonard / Fecamp', 'https://media-logos-clubs.ffhandball.fr/64/2015-08-29-4bf919ff-46bd-46ce-84c3-fd88e1388328.webp'),
(28, 'US Stephanaise HB', 'https://media-logos-clubs.ffhandball.fr/64/2019-03-04-d6728cea-814a-4756-aefd-f4948d28a873.webp'),
(29, 'AL Buquet-Elbeuf HB', 'https://media-logos-clubs.ffhandball.fr/64/2015-07-06-c46d819e-a5c7-4d27-91a9-6046cf1ba5c5.webp'),
(30, 'ES Arques', 'https://media-logos-clubs.ffhandball.fr/64/2023-09-21-c644ecad-4c73-4d72-b0b3-6f78a0db04dc.webp'),
(31, 'AS Harfleur', ''),
(32, 'Montville', 'https://media-logos-clubs.ffhandball.fr/64/2023-02-26-3f9113b4-9f9d-44b4-9063-e8ec9d1b2716.webp'),
(33, 'ST Nicolas D\'Aliermont HBC', 'https://media-logos-clubs.ffhandball.fr/64/2022-09-14-aa4286c2-5fff-4565-9787-469b4d8449f1.webp'),
(34, 'Suisse Normande HBC', 'https://media-logos-clubs.ffhandball.fr/128/2017-03-09-04bace5d-bdb2-4952-b798-18ec7e2d51f9.webp');

-- --------------------------------------------------------

--
-- Structure de la table `matchs`
--

CREATE TABLE `matchs` (
  `mat_id` int(11) NOT NULL,
  `mat_date` datetime NOT NULL,
  `mat_place` varchar(50) NOT NULL,
  `com_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `matchs`
--

INSERT INTO `matchs` (`mat_id`, `mat_date`, `mat_place`, `com_id`, `cat_id`) VALUES
(56, '2023-11-11 19:00:00', 'Gymnase Micheline Ostermeyer', 2, 1),
(61, '2023-11-28 19:15:00', 'lillebonne', 4, 3),
(65, '2023-11-29 11:00:00', 'lillebonne', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `photos`
--

CREATE TABLE `photos` (
  `pho_id` int(11) NOT NULL,
  `pho_name` varchar(50) NOT NULL,
  `alb_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `sponsors`
--

CREATE TABLE `sponsors` (
  `spo_id` int(11) NOT NULL,
  `spo_name` varchar(50) NOT NULL,
  `spo_logo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `actualites`
--
ALTER TABLE `actualites`
  ADD PRIMARY KEY (`actu_id`);

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Index pour la table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`alb_id`);

--
-- Index pour la table `battle`
--
ALTER TABLE `battle`
  ADD PRIMARY KEY (`bat_id`),
  ADD KEY `battle_equipes0_FK` (`equ_id`),
  ADD KEY `battle_equipes1_FK` (`equ_id_equipes`),
  ADD KEY `battle_matchs_FK` (`mat_id`);

--
-- Index pour la table `categories_equipes`
--
ALTER TABLE `categories_equipes`
  ADD PRIMARY KEY (`cat_id`);

--
-- Index pour la table `competitions`
--
ALTER TABLE `competitions`
  ADD PRIMARY KEY (`com_id`);

--
-- Index pour la table `equipes`
--
ALTER TABLE `equipes`
  ADD PRIMARY KEY (`equ_id`);

--
-- Index pour la table `matchs`
--
ALTER TABLE `matchs`
  ADD PRIMARY KEY (`mat_id`),
  ADD KEY `matchs_competitions_FK` (`com_id`),
  ADD KEY `matchs_categories_equipes0_FK` (`cat_id`);

--
-- Index pour la table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`pho_id`),
  ADD KEY `photos_album_FK` (`alb_id`);

--
-- Index pour la table `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`spo_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `actualites`
--
ALTER TABLE `actualites`
  MODIFY `actu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `adm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `album`
--
ALTER TABLE `album`
  MODIFY `alb_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `battle`
--
ALTER TABLE `battle`
  MODIFY `bat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT pour la table `categories_equipes`
--
ALTER TABLE `categories_equipes`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `competitions`
--
ALTER TABLE `competitions`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `equipes`
--
ALTER TABLE `equipes`
  MODIFY `equ_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `matchs`
--
ALTER TABLE `matchs`
  MODIFY `mat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT pour la table `photos`
--
ALTER TABLE `photos`
  MODIFY `pho_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `spo_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `battle`
--
ALTER TABLE `battle`
  ADD CONSTRAINT `battle_equipes0_FK` FOREIGN KEY (`equ_id`) REFERENCES `equipes` (`equ_id`),
  ADD CONSTRAINT `battle_equipes1_FK` FOREIGN KEY (`equ_id_equipes`) REFERENCES `equipes` (`equ_id`),
  ADD CONSTRAINT `battle_matchs_FK` FOREIGN KEY (`mat_id`) REFERENCES `matchs` (`mat_id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `matchs`
--
ALTER TABLE `matchs`
  ADD CONSTRAINT `matchs_categories_equipes0_FK` FOREIGN KEY (`cat_id`) REFERENCES `categories_equipes` (`cat_id`),
  ADD CONSTRAINT `matchs_competitions_FK` FOREIGN KEY (`com_id`) REFERENCES `competitions` (`com_id`);

--
-- Contraintes pour la table `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_album_FK` FOREIGN KEY (`alb_id`) REFERENCES `album` (`alb_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
