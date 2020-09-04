-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: sept. 04, 2020 la 11:04 AM
-- Versiune server: 10.4.13-MariaDB
-- Versiune PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `nan-team`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `grades`
--

CREATE TABLE `grades` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  `week` int(11) NOT NULL,
  `grade` decimal(11,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `type` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `skills`
--

INSERT INTO `skills` (`id`, `name`, `type`) VALUES
(1, 'HTML', 'HARD'),
(2, 'CSS', 'HARD'),
(3, 'TailwindCSS', 'HARD'),
(4, 'SCSS', 'HARD'),
(5, 'Javascript', 'HARD'),
(6, 'PHP', 'HARD'),
(8, 'VueJs', 'HARD'),
(9, 'Laravel', 'HARD'),
(10, 'Comunicare', 'SOFT'),
(11, 'Spirit de echipă', 'SOFT'),
(12, 'Creativitate', 'SOFT'),
(13, 'Organizare', 'SOFT'),
(14, 'Gândire logică', 'SOFT'),
(15, 'Flexibilitate', 'SOFT'),
(16, 'Punctualitate', 'SOFT'),
(17, 'Proactivitate', 'SOFT');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `teams`
--

INSERT INTO `teams` (`id`, `name`) VALUES
(1, 'NaN Team');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `rol` varchar(45) NOT NULL,
  `team_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `rol`, `team_id`) VALUES
(1, 'vlad.albescu', '1234', 'Vlad', 'Albescu', 'Full Stack Developer Intern', 1),
(2, 'adelina.lipsa', '1234', 'Adelina', 'Lipșa', 'Full Stack Developer Intern', 1),
(3, 'adi.alexiu', '1234', 'Adi', 'Alexiu', 'Team leader', 1),
(4, 'cristian.angheluta', '1234', 'Cristian', 'Angheluță', 'Full Stack Developer Intern', 1),
(5, 'alexandra.cismariu', '1234', 'Alexandra', 'Cismariu', 'Full Stack Developer Intern', 1);

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_foreign_key` (`user_id`),
  ADD KEY `skill_id_foreign_key` (`skill_id`);

--
-- Indexuri pentru tabele `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `team` (`team_id`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=302;

--
-- AUTO_INCREMENT pentru tabele `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pentru tabele `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pentru tabele `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `skill_id_foreign_key` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id_foreign_key` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constrângeri pentru tabele `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `team` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
