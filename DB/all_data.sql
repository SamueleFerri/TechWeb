-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Gen 15, 2025 alle 16:35
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
(1, 'Album 1', 'Descrizione album 1', 19.9),
(2, 'Album 2', 'Descrizione prova album 2', 29.9),
(3, 'Album 3', 'Descrizione prova album 3', 15.9),
(4, 'Album 4', 'Quarto album, descrizione prova album 4', 11.9),
(5, 'Album 5', 'Quinto album, descrizione prova album 5', 90),
(6, 'Album 6', 'Descrizione album 6', 42.9);

--
-- Dump dei dati per la tabella `carrelli`
--

INSERT INTO `carrelli` (`id`, `user_id`) VALUES
(1, 1),
(2, 2);

--
-- Dump dei dati per la tabella `corsi`
--

INSERT INTO `corsi` (`id`, `nome`, `descrizione`, `obiettivi`, `prezzo`) VALUES
(1, 'Corso 1', 'Descrizione prova corso 1', 'Obbiettivo di prova per corso 1', 29.9),
(3, 'Corso 2', 'Descrizione prova corso 2', 'Obbiettivo di prova per corso 2', 69.9),
(5, 'Corso 3', 'Descrizione prova corso 3', 'Obbiettivo di prova per corso 3', 99.9);

--
-- Dump dei dati per la tabella `gadgets`
--

INSERT INTO `gadgets` (`id`, `tipologia`, `descrizione`, `prezzo`) VALUES
(1, 'Prova gadget 1', 'Descrizione prova gadget 1', 9.9),
(2, 'Prova gadget 2', 'Descrizione prova gadget 2', 6.9),
(3, 'Prova gadget 3', 'Descrizione prova gadget 3', 5),
(4, 'Prova gadget 4', 'Descrizione prova gadget 4', 11.9);

--
-- Dump dei dati per la tabella `notifiche`
--

INSERT INTO `notifiche` (`id`, `user_id`, `tipologia`, `note`, `stato`, `annullato`) VALUES
(5, 1, 'Nuovo Ordine', 'Id Ordine: 17', 1, NULL),
(6, 1, 'Nuovo Ordine', 'Id Ordine: 18', 1, NULL),
(7, 2, 'Nuovo Ordine', 'Id Ordine: 19', 1, NULL),
(8, 2, 'Nuovo Ordine', 'Id Ordine: 20', 1, NULL),
(9, 1, 'Nuovo Ordine', 'Id Ordine: 22', 1, NULL);

--
-- Dump dei dati per la tabella `ordini`
--

INSERT INTO `ordini` (`id`, `carrelli_id`, `data`, `totale_ordine`) VALUES
(11, 1, '2021-01-08', 17.99),
(12, 2, '2022-05-07', 11.99),
(13, 1, '2022-01-11', 9.99),
(14, 1, '2022-01-13', 135.99),
(15, 2, '2023-01-28', 64.99),
(16, 1, '2023-01-18', 125.99),
(17, 1, '2025-01-15', 56.7),
(18, 1, '2025-01-15', 16.8),
(19, 2, '2025-01-15', 164.7),
(20, 2, '2025-01-15', 199.7),
(22, 1, '2025-01-15', 134.8),
(23, 1, '2024-01-11', 45.99),
(24, 2, '2024-02-03', 69.99),
(25, 2, '2024-03-09', 55.99);

--
-- Dump dei dati per la tabella `preferiti`
--

INSERT INTO `preferiti` (`id`, `user_id`, `totale_articoli`) VALUES
(1, 1, NULL),
(2, 2, NULL);

--
-- Dump dei dati per la tabella `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('P9mkUikonFIvD6i4JrLqB7xXNu0X7VeFREouUW9E', 3, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.2 Safari/605.1.15', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUWZySHB5bXBEUGJzTFNYb29EY0lkTFZIWHFnOHZKMWZXZjJqUXExaCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9ub3RpZmljYXRpb25zIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mzt9', 1736955265);

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `usertype`, `phone`, `address`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'samuele', 'ferri', 'samuele@gmail.com', 'user', '3445445556', 'via n24', NULL, '$2y$12$AR6D4bDm0xlUw.WYncII5eI97yUhOoN1g20KT85aEiAJ28WU.Dhcq', NULL, '2025-01-15 13:45:11', '2025-01-15 13:45:11'),
(2, 'nicola', 'strada', 'nicola@gmail.com', 'user', '3557886995', 'via n47', NULL, '$2y$12$sGD5Ohso8uGQZwOb05aeXew95E5XXMnyHqQow0RNjPUzYFOBYnSKK', NULL, '2025-01-15 13:46:47', '2025-01-15 13:46:47'),
(3, 'admin00', 'add', 'admin00@gmail.com', 'admin', '321321321', 'admin00@gmail.com', NULL, '$2y$12$izU2V.VtO2M/LJVzf7xxxe1sfxifRBXdYblIlBmfq17U2AAk6g5IO', NULL, '2025-01-07 16:52:27', '2025-01-07 16:52:27');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
