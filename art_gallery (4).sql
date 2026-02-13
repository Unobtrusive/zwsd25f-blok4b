-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: mariadb
-- Gegenereerd op: 13 feb 2026 om 12:25
-- Serverversie: 10.4.34-MariaDB-1:10.4.34+maria~ubu2004
-- PHP-versie: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `art_gallery`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `street` varchar(255) NOT NULL,
  `housenumber` varchar(20) NOT NULL,
  `zipcode` varchar(20) NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `mobile` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Gegevens worden geëxporteerd voor tabel `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `street`, `housenumber`, `zipcode`, `city`, `country`, `phone`, `mobile`) VALUES
(1, 1, 'Kunststraat', '12A', '1234AB', 'Amsterdam', 'Nederland', '0201234567', '0612345678'),
(5, 9, 'blauw', '75', '2222xc', 'haarlem', 'nederland', '0632434424', '0342424324242');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `artworks`
--

CREATE TABLE `artworks` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `artist` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `medium` varchar(100) DEFAULT NULL,
  `year_created` int(4) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `dimensions` varchar(100) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `added_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Gegevens worden geëxporteerd voor tabel `artworks`
--

INSERT INTO `artworks` (`id`, `title`, `artist`, `description`, `medium`, `year_created`, `price`, `dimensions`, `image`, `added_at`) VALUES
(5, 'Zonsondergang', 'Piet Mondriaan', 'Een kleurrijk abstract landschap', 'Olieverf', 1925, 1500.00, '50x70 cm', 'https://www.kunstkopie.nl/kunst/piet_mondrian_11026/thm_Komposition-mit-Rot-Gelb-Blau-und-Schwarz-1.jpg', '2026-01-14 08:10:58'),
(6, 'Stilleven met bloemen', 'Vincent van Gogh', 'Levendige bloemen in een vaas', 'Olieverf', 1886, 2200.00, '60x80 cm', 'https://m.media-amazon.com/images/I/71IucLRgUbL.jpg', '2026-01-14 08:10:58'),
(7, 'Moderne compositie', 'Karel Appel', 'Expressieve kleuren en vormen', 'Acryl', 1958, 1800.00, '70x90 cm', 'https://www.simonis-buunk.nl/images/art/metlijst/large/25136.jpg', '2026-01-14 08:10:58'),
(10, 'Zonsopgang boven de Rede', 'Jan van Velde', 'Een klassiek zeegezicht met rijke texturen.', 'Olieverf', 2023, 1250.00, '80x100 cm', 'https://i.etsystatic.com/14523567/r/il/3ce89c/3394021884/il_fullxfull.3394021884_bx5s.jpg', '2026-01-17 11:19:59'),
(11, 'Portret van een Onbekende', 'Elena Rossi', 'Gedetailleerd portret met focus op expressie.', 'Olieverf', 2024, 2100.00, '60x60 cm', 'https://upload.wikimedia.org/wikipedia/commons/c/ce/Kramskoy_Portrait_of_a_Woman.jpg', '2026-01-17 11:19:59'),
(12, 'Stedelijke Chaos', 'Marcus de Bruin', 'Abstracte weergave van een drukke stad.', 'Acryl', 2025, 850.00, '120x90 cm', 'https://www.kunstvoorinhuis.nl/assets/kvih/productimage/_m/2780-stadschaos-abstract-chaotic-schilderij-in-rood-zwart-grijs-foto-1.jpg', '2026-01-17 11:19:59'),
(13, 'Neon Nacht', 'Sophie Sterken', 'Modern werk met sneldrogende lagen.', 'Acryl', 2024, 725.00, '50x70 cm', 'https://www.paulkenton.com/wp-content/uploads/2025/04/PK-NS25_neon-surge-original-art-painting-paul-kenton-basic-780x1174.jpg', '2026-01-17 11:19:59'),
(14, 'Mistig Bos', 'Lise Meijer', 'Zachte, transparante weergave van een bos.', 'Aquarel', 2023, 450.00, '40x50 cm', 'https://images.fineartamerica.com/images/artworkimages/mediumlarge/1/fog-in-the-forest-alessandro-andreuccetti.jpg', '2026-01-17 11:19:59'),
(15, 'Lente in de Polder', 'Bram de Graaf', 'Minimalistisch landschap met focus op water.', 'Aquarel', 2025, 380.00, '30x40 cm', 'https://cdn.shoptrader.com/shop54085/images/productimages/big/voorspoels-lente-in-de-polder-d.webp', '2026-01-17 11:19:59');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `employees`
--

CREATE TABLE `employees` (
  `user_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `job_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `members`
--

CREATE TABLE `members` (
  `user_id` int(11) NOT NULL,
  `member_number` varchar(50) NOT NULL,
  `last_login_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Gegevens worden geëxporteerd voor tabel `members`
--

INSERT INTO `members` (`user_id`, `member_number`, `last_login_date`) VALUES
(1, 'M-1001', '2026-01-13 08:38:06');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('member','employee') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `username`, `password`, `role`) VALUES
(1, 'rood', 'Jansenrood', 'rood@rood.com', 'rood', '$2y$10$DhkN1hiUBucSWVi4RLVpU.Q5kCT7D0KrNLNRc4WKD.ZvgJuKWFepW', 'member'),
(9, 'blauw', 'blauw', 'blauw@blauw.com', 'blauw', '$2y$10$cUjbIY5lIwA2HQsSsBxIqeaZ4MyD6Um1wwdg5xFIsj4ib8titInU.', 'employee');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexen voor tabel `artworks`
--
ALTER TABLE `artworks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`,`artist`);

--
-- Indexen voor tabel `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexen voor tabel `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `member_number` (`member_number`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `artworks`
--
ALTER TABLE `artworks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Beperkingen voor tabel `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Beperkingen voor tabel `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
