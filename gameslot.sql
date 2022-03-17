-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2022 at 12:45 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gameslot`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `genre_id` bigint(20) UNSIGNED NOT NULL,
  `pegi_rating` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `title`, `image`, `description`, `price`, `genre_id`, `pegi_rating`, `created_at`, `updated_at`) VALUES
(3, 'Cooking Mama', '1642631311.jpg', 'Cooking Mama is a Japanese video game series and media franchise owned by Cooking Mama Limited. The series is a cookery simulation-styled minigame compilation of many video games and adventures for Nintendo gaming platforms', 50, 9, 7, '2022-01-19 12:00:27', '2022-01-19 14:28:31'),
(4, 'Counter-Strike: Global Offensive', '1642631250.jpg', 'Counter-Strike: Global Offensive (CS: GO) expands upon the team-based action gameplay that it pioneered when it was launched 19 years ago. CS: GO features new maps, characters, weapons, and game modes, and delivers updated versions of the classic CS content (de_dust2, etc.).', 0, 12, 16, '2022-01-19 14:25:10', '2022-01-19 14:30:43'),
(5, 'Empire Earth III', '1642631407.jpg', 'Empire Earth III is a real-time strategy video game developed by Mad Doc Software and published by Vivendi Games, released on November 6, 2007. It is the latest installment of the Empire Earth series. Empire Earth III contains five epochs, fewer than other games in the series but covering roughly the same time period', 100, 10, 12, '2022-01-19 14:30:07', '2022-01-19 14:30:54'),
(6, 'Minecraft', '1642634757.jpg', 'Minecraft is a sandbox construction video game developed by Mojang Studios where players interact with a fully modifiable three-dimensional environment made of blocks and entities. Its diverse gameplay lets players choose the way they play, allowing for countless possibilities.', 25, 13, 0, '2022-01-19 15:25:57', '2022-01-19 15:25:57'),
(7, 'Trackmania', '1642634884.webp', 'TrackMania is a series of racing games for Windows, PlayStation 4, Xbox One, Nintendo DS and Wii developed by Nadeo and Firebrand Games.', 0, 6, 0, '2022-01-19 15:28:04', '2022-01-19 15:28:04'),
(8, 'Project Zomboid', '1642634976.jpg', 'Project Zomboid is an open world isometric survival horror video game in development by British and Canadian independent developer The Indie Stone. The game is set in a post-apocalyptic, zombie-infested world where the player is challenged to survive for as long as possible.', 7, 14, 18, '2022-01-19 15:29:36', '2022-01-19 15:29:36'),
(9, 'Rimworld', '1642635134.jpg', 'A sci-fi colony sim driven by an intelligent AI storyteller. Generates stories by simulating psychology, ecology, gunplay, melee combat, climate, biomes, diplomacy, interpersonal relationships, art, medicine, trade, and more.', 5, 8, 12, '2022-01-19 15:32:14', '2022-01-19 15:32:14'),
(10, '7 Days to Die', '1642635200.jpg', '7 Days to Die is an early access survival horror video game set in an open world developed by The Fun Pimps. It was released through Early Access on Steam for Microsoft Windows and Mac OS X on December 13, 2013, and for Linux on November 22, 2014.', 10, 14, 18, '2022-01-19 15:33:20', '2022-01-19 15:33:20'),
(11, 'Dark Souls', '1642635270.jpg', 'Dark Souls is a 2011 action role-playing game developed by FromSoftware and published by Namco Bandai Games. A spiritual successor to FromSoftware\'s Demon\'s Souls, the game is the second installment in the Souls series.', 100, 7, 16, '2022-01-19 15:34:30', '2022-01-19 15:35:36'),
(12, 'The Elder Scrolls V: Skyrim', '1642635327.png', 'The Elder Scrolls V: Skyrim is an open-world action role-playing video game developed by Bethesda Game Studios and published by Bethesda Softworks.', 50, 7, 16, '2022-01-19 15:35:27', '2022-01-19 15:35:27'),
(13, 'Fallout', '1642635455.jpg', 'Fallout is a series of post-apocalyptic role-playing video games—and later action role-playing games—created by Interplay Entertainment', 75, 7, 16, '2022-01-19 15:37:35', '2022-01-19 15:37:35');

-- --------------------------------------------------------

--
-- Table structure for table `game_genres`
--

CREATE TABLE `game_genres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `game_genres`
--

INSERT INTO `game_genres` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Somehting', '2022-01-19 09:15:47', '2022-01-19 10:20:59'),
(2, 'Adventure', '2022-01-19 09:15:47', '2022-01-19 09:15:47'),
(3, 'Casual', '2022-01-19 09:15:47', '2022-01-19 09:15:47'),
(4, 'Indie', '2022-01-19 09:15:47', '2022-01-19 09:15:47'),
(5, 'MMO', '2022-01-19 09:15:47', '2022-01-19 09:15:47'),
(6, 'Racing', '2022-01-19 09:15:47', '2022-01-19 09:15:47'),
(7, 'RPG', '2022-01-19 09:15:47', '2022-01-19 09:15:47'),
(8, 'Simulation', '2022-01-19 09:15:47', '2022-01-19 09:15:47'),
(9, 'Sports', '2022-01-19 09:15:47', '2022-01-19 09:15:47'),
(10, 'Strategy', '2022-01-19 09:15:47', '2022-01-19 09:15:47'),
(12, 'First Person Shooter', '2022-01-19 14:24:30', '2022-01-19 14:24:30'),
(13, 'Open World', '2022-01-19 15:25:57', '2022-01-19 15:25:57'),
(14, 'Zombies', '2022-01-19 15:29:36', '2022-01-19 15:29:36');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2022_01_19_151916_create_game_genres_table', 2),
(8, '2022_01_19_151941_create_games_table', 2),
(9, '2022_01_19_214438_create_transactions_table', 3),
(11, '2022_01_19_214602_create_transaction_items_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@gmail.com', '$2y$10$BNdflZI6Sjin/C3nSi/QNuBdvzWUqIsD/OJPZXj/1HwV.T4LN0gO2', '2022-01-19 01:23:15');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(9, 1, '2022-01-19 14:03:22', '2022-01-19 14:03:22'),
(10, 1, '2022-01-19 15:39:34', '2022-01-19 15:39:34');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_items`
--

CREATE TABLE `transaction_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction_items`
--

INSERT INTO `transaction_items` (`id`, `transaction_id`, `title`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(2, 9, 'Cooking Mama', 0, 1, '2022-01-19 14:03:22', '2022-01-19 14:03:22'),
(3, 10, '7 Days to Die', 10, 4, '2022-01-19 15:39:34', '2022-01-19 15:39:34'),
(4, 10, 'Cooking Mama', 50, 1, '2022-01-19 15:39:34', '2022-01-19 15:39:34'),
(5, 10, 'Counter-Strike: Global Offensive', 0, 4, '2022-01-19 15:39:34', '2022-01-19 15:39:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no_image.png',
  `gender` enum('male','female') COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `dob`, `image`, `gender`, `admin`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '2000-01-01', '1642634301.jpg', 'female', 1, NULL, '$2y$10$sseMqErLPSjE7bOmME2Qh.oLNnFPX8qQO7EVq8cO1c.sRT59U2Pk.', NULL, '2022-01-19 01:00:01', '2022-01-19 15:18:21'),
(2, 'My banes', 'mybane@gmail.com', '2009-01-07', 'no_image.png', 'male', 0, NULL, '$2y$10$ZixdjrHnHrRN1bXxvHATOOJTPSASWzjT76XuqQ3Sid01yC72MGjSG', NULL, '2022-01-19 04:45:31', '2022-01-19 05:56:24'),
(4, 'Maya', 'maya@gmail.com', '2009-01-19', 'no_image.png', 'female', 0, NULL, '$2y$10$2Z.MygGwQGuswxEmFOfT3uyoB76w3fFdR3yNcefrj0CEPy7KwQa2G', NULL, '2022-01-19 15:21:17', '2022-01-19 15:21:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`),
  ADD KEY `games_genre_id_foreign` (`genre_id`);

--
-- Indexes for table `game_genres`
--
ALTER TABLE `game_genres`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `game_genres_name_unique` (`name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`);

--
-- Indexes for table `transaction_items`
--
ALTER TABLE `transaction_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_items_transaction_id_foreign` (`transaction_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `game_genres`
--
ALTER TABLE `game_genres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transaction_items`
--
ALTER TABLE `transaction_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `games_genre_id_foreign` FOREIGN KEY (`genre_id`) REFERENCES `game_genres` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `transaction_items`
--
ALTER TABLE `transaction_items`
  ADD CONSTRAINT `transaction_items_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
