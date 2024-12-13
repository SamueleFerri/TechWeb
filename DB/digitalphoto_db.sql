-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Dic 13, 2024 alle 16:12
-- Versione del server: 10.4.28-MariaDB
-- Versione PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digitalphoto`
--
CREATE DATABASE IF NOT EXISTS `digitalphoto` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `digitalphoto`;

-- --------------------------------------------------------

--
-- Struttura della tabella `albums`
--

CREATE TABLE `albums` (
  `id` int(11) NOT NULL,
  `titolo` varchar(90) DEFAULT NULL,
  `descrizione` varchar(1000) DEFAULT NULL,
  `prezzo` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `albums`
--

INSERT INTO `albums` (`id`, `titolo`, `descrizione`, `prezzo`) VALUES
(1, 'Primo album di prova', 'Primo album di prova, locandina, soggetti ritratti:  ', 19.9),
(2, 'Primo album di prova', 'Primo album di prova, locandina, soggetti ritratti:  ', 29.9),
(3, 'Secondo album ', 'squadra TRM, presidente Francesco Marazano, IL Maestro', 15.9),
(4, 'prova 2', 'Secondo album di prova, presenza di natura morta, dalla metà in poi foto inedite della squadra TRM con presidente Francesco Marazano, anche detto IL Maestro', 11.9),
(5, 'prova 5', 'descrizione prova 5', 90),
(6, 'prova 5', 'descrizione prova 5', 42.9);

-- --------------------------------------------------------

--
-- Struttura della tabella `albums_in_carrelli`
--

CREATE TABLE `albums_in_carrelli` (
  `carrelli_id` int(11) NOT NULL,
  `albums_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `albums_in_carrelli`
--

INSERT INTO `albums_in_carrelli` (`carrelli_id`, `albums_id`) VALUES
(1, 4);

-- --------------------------------------------------------

--
-- Struttura della tabella `albums_in_preferiti`
--

CREATE TABLE `albums_in_preferiti` (
  `preferiti_id` int(11) NOT NULL,
  `albums_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `albums_in_preferiti`
--

INSERT INTO `albums_in_preferiti` (`preferiti_id`, `albums_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `carrelli`
--

CREATE TABLE `carrelli` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `carrelli`
--

INSERT INTO `carrelli` (`id`, `user_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `corsi`
--

CREATE TABLE `corsi` (
  `id` int(11) NOT NULL,
  `nome` varchar(90) DEFAULT NULL,
  `descrizione` varchar(1000) DEFAULT NULL,
  `obiettivi` varchar(1000) DEFAULT NULL,
  `prezzo` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `corsi`
--

INSERT INTO `corsi` (`id`, `nome`, `descrizione`, `obiettivi`, `prezzo`) VALUES
(1, 'Prova corso 1', 'Descrizione prova corso 1', 'portare la squadra TRM (dopo ti dico come si pronuncia) di Francesco Marzano alla vittoria', 29.9),
(3, 'Prova corso 2', 'Descrizione prova corso 2', 'Credevi fosse per qualcosa di diverso?\r\nNO, TRM for life', 69.9),
(5, 'Prova corso 3', 'Descrizione prova corso 3', 'Sempre gli stessi', 99.9);

-- --------------------------------------------------------

--
-- Struttura della tabella `corsi_in_carrelli`
--

CREATE TABLE `corsi_in_carrelli` (
  `carrelli_id` int(11) NOT NULL,
  `corsi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `corsi_in_preferiti`
--

CREATE TABLE `corsi_in_preferiti` (
  `preferiti_id` int(11) NOT NULL,
  `corsi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `foto`
--

CREATE TABLE `foto` (
  `id` int(11) NOT NULL,
  `url` varchar(90) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `foto_in_albums`
--

CREATE TABLE `foto_in_albums` (
  `foto_id` int(11) NOT NULL,
  `albums_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `gadgets`
--

CREATE TABLE `gadgets` (
  `id` int(11) NOT NULL,
  `tipologia` varchar(90) DEFAULT NULL,
  `descrizione` varchar(1000) DEFAULT NULL,
  `prezzo` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `gadgets`
--

INSERT INTO `gadgets` (`id`, `tipologia`, `descrizione`, `prezzo`) VALUES
(1, 'Prova gadget 1', 'Descrizione prova gadget 1', 9.9),
(2, 'Prova gadget 1', 'Descrizione prova gadget 1', 6.9),
(3, 'Prova gadget 2', 'Descrizione prova gadget 2', 5),
(4, 'Prova gadget 2', 'Descrizione prova gadget 2', 11.9);

-- --------------------------------------------------------

--
-- Struttura della tabella `gadgets_in_carrelli`
--

CREATE TABLE `gadgets_in_carrelli` (
  `carrelli_id` int(11) NOT NULL,
  `gadgets_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `gadgets_in_preferiti`
--

CREATE TABLE `gadgets_in_preferiti` (
  `preferiti_id` int(11) NOT NULL,
  `gadgets_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `notifiche`
--

CREATE TABLE `notifiche` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `tipologia` varchar(45) DEFAULT NULL,
  `note` varchar(200) DEFAULT NULL,
  `stato` tinyint(4) DEFAULT NULL,
  `annullato` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `ordini`
--

CREATE TABLE `ordini` (
  `id` int(11) NOT NULL,
  `carrelli_id` int(11) NOT NULL,
  `data` date DEFAULT NULL,
  `totale_ordine` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `preferiti`
--

CREATE TABLE `preferiti` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `totale_articoli` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `preferiti`
--

INSERT INTO `preferiti` (`id`, `user_id`, `totale_articoli`) VALUES
(1, 1, NULL),
(2, 1, NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('3mTbUuG2si2pNl7yTknu928lzDGgsRSzBKMjyNgY', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.1.1 Safari/605.1.15', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibzZ6UjE5QWpDN0tvWUdJcFdjcll4ck1PcnB3Tmg1OUp0OElxNVNJYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hbGJ1bXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1734102586);

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL DEFAULT 'user',
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `usertype`, `phone`, `address`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'user00', 'fsamd', 'user00@gmail.com', 'user', '3221313131', 'dasd', NULL, '$2y$12$g3X59x29h1lsypXGo8WA1uCKkOZZst8zXU.3vW9Cd.G1rNOdu/E4i', NULL, '2024-12-09 16:22:36', '2024-12-09 16:22:36');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `albums_in_carrelli`
--
ALTER TABLE `albums_in_carrelli`
  ADD PRIMARY KEY (`carrelli_id`,`albums_id`),
  ADD KEY `fk_carrelli_has_albums_albums` (`albums_id`);

--
-- Indici per le tabelle `albums_in_preferiti`
--
ALTER TABLE `albums_in_preferiti`
  ADD PRIMARY KEY (`preferiti_id`,`albums_id`),
  ADD KEY `fk_preferiti_has_albums_albums` (`albums_id`);

--
-- Indici per le tabelle `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indici per le tabelle `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indici per le tabelle `carrelli`
--
ALTER TABLE `carrelli`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_carrelli_users` (`user_id`);

--
-- Indici per le tabelle `corsi`
--
ALTER TABLE `corsi`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `corsi_in_carrelli`
--
ALTER TABLE `corsi_in_carrelli`
  ADD PRIMARY KEY (`carrelli_id`,`corsi_id`),
  ADD KEY `fk_carrelli_has_corsi_corsi` (`corsi_id`);

--
-- Indici per le tabelle `corsi_in_preferiti`
--
ALTER TABLE `corsi_in_preferiti`
  ADD PRIMARY KEY (`preferiti_id`,`corsi_id`),
  ADD KEY `fk_preferiti_has_corsi_corsi` (`corsi_id`);

--
-- Indici per le tabelle `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indici per le tabelle `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `foto_in_albums`
--
ALTER TABLE `foto_in_albums`
  ADD PRIMARY KEY (`foto_id`,`albums_id`),
  ADD KEY `fk_foto_has_albums_albums` (`albums_id`);

--
-- Indici per le tabelle `gadgets`
--
ALTER TABLE `gadgets`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `gadgets_in_carrelli`
--
ALTER TABLE `gadgets_in_carrelli`
  ADD PRIMARY KEY (`carrelli_id`,`gadgets_id`),
  ADD KEY `fk_carrelli_has_gadgets_gadgets` (`gadgets_id`);

--
-- Indici per le tabelle `gadgets_in_preferiti`
--
ALTER TABLE `gadgets_in_preferiti`
  ADD PRIMARY KEY (`preferiti_id`,`gadgets_id`),
  ADD KEY `fk_preferiti_has_gadgets_gadgets` (`gadgets_id`);

--
-- Indici per le tabelle `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indici per le tabelle `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `notifiche`
--
ALTER TABLE `notifiche`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_notifiche_users` (`user_id`);

--
-- Indici per le tabelle `ordini`
--
ALTER TABLE `ordini`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ordini_carrelli` (`carrelli_id`);

--
-- Indici per le tabelle `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indici per le tabelle `preferiti`
--
ALTER TABLE `preferiti`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_preferiti_users` (`user_id`);

--
-- Indici per le tabelle `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la tabella `carrelli`
--
ALTER TABLE `carrelli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `corsi`
--
ALTER TABLE `corsi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT per la tabella `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `foto`
--
ALTER TABLE `foto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `gadgets`
--
ALTER TABLE `gadgets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `notifiche`
--
ALTER TABLE `notifiche`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `ordini`
--
ALTER TABLE `ordini`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `preferiti`
--
ALTER TABLE `preferiti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `albums_in_carrelli`
--
ALTER TABLE `albums_in_carrelli`
  ADD CONSTRAINT `albums_in_carrelli_ibfk_1` FOREIGN KEY (`carrelli_id`) REFERENCES `carrelli` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `albums_in_carrelli_ibfk_2` FOREIGN KEY (`albums_id`) REFERENCES `albums` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_carrelli_has_albums_albums` FOREIGN KEY (`albums_id`) REFERENCES `albums` (`id`),
  ADD CONSTRAINT `fk_carrelli_has_albums_carrelli` FOREIGN KEY (`carrelli_id`) REFERENCES `carrelli` (`id`);

--
-- Limiti per la tabella `albums_in_preferiti`
--
ALTER TABLE `albums_in_preferiti`
  ADD CONSTRAINT `albums_in_preferiti_ibfk_1` FOREIGN KEY (`preferiti_id`) REFERENCES `preferiti` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `albums_in_preferiti_ibfk_2` FOREIGN KEY (`albums_id`) REFERENCES `albums` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_preferiti_has_albums_albums` FOREIGN KEY (`albums_id`) REFERENCES `albums` (`id`),
  ADD CONSTRAINT `fk_preferiti_has_albums_preferiti` FOREIGN KEY (`preferiti_id`) REFERENCES `preferiti` (`id`);

--
-- Limiti per la tabella `carrelli`
--
ALTER TABLE `carrelli`
  ADD CONSTRAINT `fk_carrelli_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_carrelli_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limiti per la tabella `corsi_in_carrelli`
--
ALTER TABLE `corsi_in_carrelli`
  ADD CONSTRAINT `corsi_in_carrelli_ibfk_1` FOREIGN KEY (`carrelli_id`) REFERENCES `carrelli` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `corsi_in_carrelli_ibfk_2` FOREIGN KEY (`corsi_id`) REFERENCES `corsi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_carrelli_has_corsi_carrelli` FOREIGN KEY (`carrelli_id`) REFERENCES `carrelli` (`id`),
  ADD CONSTRAINT `fk_carrelli_has_corsi_corsi` FOREIGN KEY (`corsi_id`) REFERENCES `corsi` (`id`);

--
-- Limiti per la tabella `corsi_in_preferiti`
--
ALTER TABLE `corsi_in_preferiti`
  ADD CONSTRAINT `corsi_in_preferiti_ibfk_1` FOREIGN KEY (`preferiti_id`) REFERENCES `preferiti` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `corsi_in_preferiti_ibfk_2` FOREIGN KEY (`corsi_id`) REFERENCES `corsi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_preferiti_has_corsi_corsi` FOREIGN KEY (`corsi_id`) REFERENCES `corsi` (`id`),
  ADD CONSTRAINT `fk_preferiti_has_corsi_preferiti` FOREIGN KEY (`preferiti_id`) REFERENCES `preferiti` (`id`);

--
-- Limiti per la tabella `foto_in_albums`
--
ALTER TABLE `foto_in_albums`
  ADD CONSTRAINT `fk_foto_has_albums_albums` FOREIGN KEY (`albums_id`) REFERENCES `albums` (`id`),
  ADD CONSTRAINT `fk_foto_has_albums_foto` FOREIGN KEY (`foto_id`) REFERENCES `foto` (`id`),
  ADD CONSTRAINT `foto_in_albums_ibfk_1` FOREIGN KEY (`foto_id`) REFERENCES `foto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `foto_in_albums_ibfk_2` FOREIGN KEY (`albums_id`) REFERENCES `albums` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limiti per la tabella `gadgets_in_carrelli`
--
ALTER TABLE `gadgets_in_carrelli`
  ADD CONSTRAINT `fk_carrelli_has_gadgets_carrelli` FOREIGN KEY (`carrelli_id`) REFERENCES `carrelli` (`id`),
  ADD CONSTRAINT `fk_carrelli_has_gadgets_gadgets` FOREIGN KEY (`gadgets_id`) REFERENCES `gadgets` (`id`),
  ADD CONSTRAINT `gadgets_in_carrelli_ibfk_1` FOREIGN KEY (`carrelli_id`) REFERENCES `carrelli` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `gadgets_in_carrelli_ibfk_2` FOREIGN KEY (`gadgets_id`) REFERENCES `gadgets` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limiti per la tabella `gadgets_in_preferiti`
--
ALTER TABLE `gadgets_in_preferiti`
  ADD CONSTRAINT `fk_preferiti_has_gadgets_gadgets` FOREIGN KEY (`gadgets_id`) REFERENCES `gadgets` (`id`),
  ADD CONSTRAINT `fk_preferiti_has_gadgets_preferiti` FOREIGN KEY (`preferiti_id`) REFERENCES `preferiti` (`id`),
  ADD CONSTRAINT `gadgets_in_preferiti_ibfk_1` FOREIGN KEY (`preferiti_id`) REFERENCES `preferiti` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `gadgets_in_preferiti_ibfk_2` FOREIGN KEY (`gadgets_id`) REFERENCES `gadgets` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limiti per la tabella `notifiche`
--
ALTER TABLE `notifiche`
  ADD CONSTRAINT `fk_notifiche_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `notifiche_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limiti per la tabella `ordini`
--
ALTER TABLE `ordini`
  ADD CONSTRAINT `fk_ordini_carrelli` FOREIGN KEY (`carrelli_id`) REFERENCES `carrelli` (`id`),
  ADD CONSTRAINT `ordini_ibfk_1` FOREIGN KEY (`carrelli_id`) REFERENCES `carrelli` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limiti per la tabella `preferiti`
--
ALTER TABLE `preferiti`
  ADD CONSTRAINT `fk_preferiti_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `preferiti_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
