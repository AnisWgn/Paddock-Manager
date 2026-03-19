-- phpMyAdmin SQL Dump
-- version 6.0.0-dev+20251215.aa153def95
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 19, 2026 at 11:03 AM
-- Server version: 9.4.0
-- PHP Version: 8.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paddock_manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20260317185633', '2026-03-17 18:56:56', 408),
('DoctrineMigrations\\Version20260317214251', '2026-03-17 21:43:08', 29),
('DoctrineMigrations\\Version20260317215704', '2026-03-17 21:57:12', 22),
('DoctrineMigrations\\Version20260317220207', '2026-03-17 22:02:10', 77),
('DoctrineMigrations\\Version20260318152823', '2026-03-18 15:28:47', 35),
('DoctrineMigrations\\Version20260318154641', '2026-03-18 15:46:54', 27),
('DoctrineMigrations\\Version20260318155639', '2026-03-18 15:56:44', 26),
('DoctrineMigrations\\Version20260318161234', '2026-03-18 16:12:40', 27),
('DoctrineMigrations\\Version20260318170530', '2026-03-18 17:05:36', 140),
('DoctrineMigrations\\Version20260318172556', '2026-03-18 17:26:01', 28),
('DoctrineMigrations\\Version20260318172715', '2026-03-18 17:27:15', 102),
('DoctrineMigrations\\Version20260318174111', '2026-03-18 17:41:14', 11),
('DoctrineMigrations\\Version20260318195241', '2026-03-18 19:52:53', 27),
('DoctrineMigrations\\Version20260318205819', '2026-03-18 20:58:26', 237),
('DoctrineMigrations\\Version20260318214758', '2026-03-18 21:48:03', 52),
('DoctrineMigrations\\Version20260319095007', '2026-03-19 09:50:21', 24),
('DoctrineMigrations\\Version20260319100437', '2026-03-19 10:04:49', 40),
('DoctrineMigrations\\Version20260319104357', '2026-03-19 10:44:10', 46);

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `id` int NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `number` int NOT NULL,
  `code` varchar(3) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `is_alive` tinyint NOT NULL,
  `is_retired` tinyint NOT NULL,
  `team_id` int DEFAULT NULL,
  `description` longtext,
  `quotes` varchar(255) DEFAULT NULL,
  `image_biography` varchar(255) DEFAULT NULL,
  `quotes_from` varchar(255) DEFAULT NULL,
  `footer_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`id`, `first_name`, `last_name`, `nationality`, `birth_date`, `number`, `code`, `photo`, `is_alive`, `is_retired`, `team_id`, `description`, `quotes`, `image_biography`, `quotes_from`, `footer_image`) VALUES
(2, 'Verstappen', 'Max', 'Netherlands', '1997-09-30', 3, 'Ver', 'https://media.formula1.com/image/upload/c_fill,w_720/q_auto/v1740000001/common/f1/2026/redbullracing/maxver01/2026redbullracingmaxver01right.webp', 1, 0, 1, '', '', '', '', ''),
(3, 'George', 'Russell', 'United Kingdom', '1998-02-15', 63, 'RUS', 'https://media.formula1.com/image/upload/c_fill,w_720/q_auto/v1740000001/common/f1/2026/mercedes/georus01/2026mercedesgeorus01right.webp', 1, 0, 1, 'He’s the driver with the motto: “If in doubt, go flat out”.\n\nGeorge Russell has lived by it throughout his F1 career to date, out-qualifying seasoned team mate Robert Kubica at all 21 Grands Prix in his rookie season, putting Williams back on the podium in 2021, and landing his first race win with Mercedes in 2022.\n\nThat brilliant baseline speed served Russell well as he totted up titles on his way to Formula 1. The Briton stormed to the 2017 GP3 championship and delivered the 2018 Formula 2 crown under immense pressure.\n\nSpotting his potential, world champions Mercedes swooped to sign him to their junior programme in 2017, when Russell already had a DTM deal on the table. He banked more experience with practice sessions with Force India and tests for the Silver Arrows, before landing his Mercedes-powered Williams race drive.\n\nA refusal to cede ground to his rivals - and commitment to a tricky pass – underpins Russell’s winning mentality. And it’s what got him the call-up to replace Lewis Hamilton for a one-off Mercedes appearance for Sakhir 2020 when the reigning champ was struck down by Covid-19.\n\nThat star turn saw Russell miss out on pole by just 0.026s and then outrace Mercedes stalwart Valtteri Bottas. Only a bungled pit stop and a heart-breaking late puncture prevented a near-certain maiden win for the up-and-coming super-sub.\n\nHe kept his head down at Williams in 2021, scoring his first points and podium, all the while keeping his eye on the bigger prize. Having proved himself a hard worker and a tenacious talent, that prize arrived in the form of a chance to take on compatriot and seven-time champion Hamilton in identical machinery.\n\nIt was an opportunity Russell relished, and he took his first F1 win – and Mercedes’ only 2022 victory – in Brazil. The 2023 season proved tougher, but he was again atop the podium twice in 2024, and in 2025 it was his turn to lead the team following Hamilton\'s departure for Ferrari.\n\nRussell proved to be a natural, steering the Silver Arrows to two race wins in a season when Max Verstappen was the only other driver to beat the all-conquering McLarens. If Mercedes can now grab the high ground for 2026 and its all-new regulations, a title bid surely beckons - a huge challenge, but as always, ‘Russell the Rocket’ will be going flat out.', 'ON GEORGE, YOU CAN RELY ON HIM WHEN IT COMES TO LAP TIMES AND RACING, SO SPIRITS ARE HIGH.', 'https://video.formula1.com/assets/studio-templates/e5c4249b-c664-062a-fe92-3a19eb24e921/3a203bb0-7581-72d3-f6e6-3a19eb24e921/e112d02c-3389-9dfc-ebc6-3a19eb5d3d1f/thumbnail_medium.jpeg', 'Toto Wolff', 'https://media.formula1.com/image/upload/t_16by9South/c_lfill,w_3392/q_auto/v1740000001/trackside-images/2025/Formula_1_Testing_in_Bahrain___Day_3/2202532072.webp');

-- --------------------------------------------------------

--
-- Table structure for table `driver_rating`
--

CREATE TABLE `driver_rating` (
  `id` int NOT NULL,
  `overall` int NOT NULL,
  `pace` int NOT NULL,
  `experience` int NOT NULL,
  `racecraft` int NOT NULL,
  `awareness` int NOT NULL,
  `driver_id` int DEFAULT NULL,
  `game_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `driver_rating`
--

INSERT INTO `driver_rating` (`id`, `overall`, `pace`, `experience`, `racecraft`, `awareness`, `driver_id`, `game_id`) VALUES
(1, 34, 23, 43, 23, 19, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `year` int NOT NULL,
  `platform` varchar(255) NOT NULL,
  `description` longtext,
  `image` varchar(255) NOT NULL,
  `editeur` varchar(255) NOT NULL,
  `date_de_sortie` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`id`, `title`, `year`, `platform`, `description`, `image`, `editeur`, `date_de_sortie`) VALUES
(1, 'F1 25', 2025, 'PC PS5', NULL, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `game_plateforme`
--

CREATE TABLE `game_plateforme` (
  `game_id` int NOT NULL,
  `plateforme_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `game_plateforme`
--

INSERT INTO `game_plateforme` (`game_id`, `plateforme_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint NOT NULL,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plateforme`
--

CREATE TABLE `plateforme` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `manufacturer` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `plateforme`
--

INSERT INTO `plateforme` (`id`, `name`, `manufacturer`, `color`, `logo`) VALUES
(1, 'PS5', 'Sony', '#0037AE', 'playstation'),
(2, 'PS4', 'Sony', '#0037AE', 'playstation'),
(3, 'PS3', 'Sony', '#0037AE', 'playstation'),
(4, 'PS2', 'Sony', '#0037AE', 'playstation'),
(5, 'PS1', 'Sony', '#0037AE', 'playstation');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `car_image` varchar(255) DEFAULT NULL,
  `background_color` varchar(7) DEFAULT NULL,
  `description` longtext,
  `full_team_name` varchar(255) NOT NULL,
  `base` varchar(255) NOT NULL,
  `team_chief` varchar(255) NOT NULL,
  `technical_chief` varchar(255) NOT NULL,
  `chassis` varchar(255) NOT NULL,
  `power_unit` varchar(255) NOT NULL,
  `reserve_driver` varchar(255) NOT NULL,
  `first_team_entry` varchar(255) NOT NULL,
  `image_biography` varchar(255) NOT NULL,
  `footer_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `name`, `country`, `logo`, `car_image`, `background_color`, `description`, `full_team_name`, `base`, `team_chief`, `technical_chief`, `chassis`, `power_unit`, `reserve_driver`, `first_team_entry`, `image_biography`, `footer_image`) VALUES
(1, 'RedBull', 'Idk', 'YES', '', '', NULL, '', '', '', '', '', '', '', '', '', ''),
(2, 'erg', 'erg', 'rege', 'ergerg', '#ff0000', NULL, '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `email` varchar(180) NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`) VALUES
(1, 'admin@example.com', '[]', '$2y$13$4WgO5pngnjVz/NFhzvOreeYr.II6y3Q7nssES3MTYlVeun0J25efe'),
(3, 'aniswagner6@gmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$jqUQi5a6caRnT2ERtap5ReOaFfS2uvFQ/aWQQ6YT4HF/S3q9Fq7Ey');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_11667CD9296CD8AE` (`team_id`);

--
-- Indexes for table `driver_rating`
--
ALTER TABLE `driver_rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_9DD6F89AC3423909` (`driver_id`),
  ADD KEY `IDX_9DD6F89AE48FD905` (`game_id`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `game_plateforme`
--
ALTER TABLE `game_plateforme`
  ADD PRIMARY KEY (`game_id`,`plateforme_id`),
  ADD KEY `IDX_D2DECBFCE48FD905` (`game_id`),
  ADD KEY `IDX_D2DECBFC391E226B` (`plateforme_id`);

--
-- Indexes for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0E3BD61CE16BA31DBBF396750` (`queue_name`,`available_at`,`delivered_at`,`id`);

--
-- Indexes for table `plateforme`
--
ALTER TABLE `plateforme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `driver_rating`
--
ALTER TABLE `driver_rating`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plateforme`
--
ALTER TABLE `plateforme`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `driver`
--
ALTER TABLE `driver`
  ADD CONSTRAINT `FK_11667CD9296CD8AE` FOREIGN KEY (`team_id`) REFERENCES `team` (`id`);

--
-- Constraints for table `driver_rating`
--
ALTER TABLE `driver_rating`
  ADD CONSTRAINT `FK_9DD6F89AC3423909` FOREIGN KEY (`driver_id`) REFERENCES `driver` (`id`),
  ADD CONSTRAINT `FK_9DD6F89AE48FD905` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`);

--
-- Constraints for table `game_plateforme`
--
ALTER TABLE `game_plateforme`
  ADD CONSTRAINT `FK_D2DECBFC391E226B` FOREIGN KEY (`plateforme_id`) REFERENCES `plateforme` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_D2DECBFCE48FD905` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
