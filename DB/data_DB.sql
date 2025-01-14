-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Gen 14, 2025 alle 17:56
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

--
-- Dump dei dati per la tabella `carrelli`
--

INSERT INTO `carrelli` (`id`, `user_id`) VALUES
(2, 1),
(4, 1),
(5, 1);

--
-- Dump dei dati per la tabella `corsi`
--

INSERT INTO `corsi` (`id`, `nome`, `descrizione`, `obiettivi`, `prezzo`) VALUES
(1, 'Prova corso 1', 'Descrizione prova corso 1', 'portare la squadra TRM (dopo ti dico come si pronuncia) di Francesco Marzano alla vittoria', 29.9),
(3, 'Prova corso 2', 'Descrizione prova corso 2', 'Credevi fosse per qualcosa di diverso?\r\nNO, TRM for life', 69.9),
(5, 'Prova corso 3', 'Descrizione prova corso 3', 'Sempre gli stessi', 99.9);

--
-- Dump dei dati per la tabella `gadgets`
--

INSERT INTO `gadgets` (`id`, `tipologia`, `descrizione`, `prezzo`) VALUES
(1, 'Prova gadget 1', 'Descrizione prova gadget 1', 9.9),
(2, 'Prova gadget 1', 'Descrizione prova gadget 1', 6.9),
(3, 'Prova gadget 2', 'Descrizione prova gadget 2', 5),
(4, 'Prova gadget 2', 'Descrizione prova gadget 2', 11.9);

--
-- Dump dei dati per la tabella `ordini`
--

INSERT INTO `ordini` (`id`, `carrelli_id`, `data`, `totale_ordine`) VALUES
(1, 2, '2024-04-12', 159),
(2, 4, '2025-06-11', 99),
(3, 5, '2024-07-09', 177),
(8, 2, '2025-01-14', 49.8),
(10, 2, '2025-01-14', 9.9);

--
-- Dump dei dati per la tabella `preferiti`
--

INSERT INTO `preferiti` (`id`, `user_id`, `totale_articoli`) VALUES
(2, 1, NULL);

--
-- Dump dei dati per la tabella `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('Lmxl2dn0UMijHxc4mB80cBi2t0PcfImUC9QP66Wi', 1, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.2 Safari/605.1.15', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoidUswbnNBTTUweFhtcXRmS2V2S1NXMjdVZ2FkaXhFSXhQVFV1OXdxeiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvb3JkZXIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1736873213);

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `usertype`, `phone`, `address`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'user00', 'fsamd', 'user00@gmail.com', 'user', '3221313131', 'dasd', NULL, '$2y$12$g3X59x29h1lsypXGo8WA1uCKkOZZst8zXU.3vW9Cd.G1rNOdu/E4i', NULL, '2024-12-09 16:22:36', '2024-12-09 16:22:36'),
(3, 'admin00', 'add', 'admin00@gmail.com', 'admin', '321321321', 'admin00@gmail.com', NULL, '$2y$12$izU2V.VtO2M/LJVzf7xxxe1sfxifRBXdYblIlBmfq17U2AAk6g5IO', NULL, '2025-01-07 16:52:27', '2025-01-07 16:52:27');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
