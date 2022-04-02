-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 02 Kwi 2022, 13:52
-- Wersja serwera: 10.4.22-MariaDB
-- Wersja PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `online_shop`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `brand` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `brands`
--

INSERT INTO `brands` (`id`, `brand`) VALUES
(1, 'Rolex'),
(2, 'Omega');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `date`, `price`) VALUES
(5, 5, '2022-03-31', 532456),
(6, 5, '2022-03-31', 150000),
(7, 5, '2022-03-31', 89453),
(8, 5, '2022-03-31', 89453),
(9, 5, '2022-03-31', 62740),
(10, 5, '2022-03-31', 26713),
(11, 5, '2022-03-31', 116166);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `orders_products`
--

CREATE TABLE `orders_products` (
  `orders_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `orders_products`
--

INSERT INTO `orders_products` (`orders_id`, `product_id`, `amount`) VALUES
(5, 3, 1),
(5, 4, 2),
(6, 4, 1),
(7, 2, 1),
(7, 1, 1),
(8, 2, 1),
(8, 1, 1),
(9, 1, 1),
(10, 2, 1),
(11, 2, 2),
(11, 1, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `amount` int(20) NOT NULL,
  `image` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `products`
--

INSERT INTO `products` (`id`, `name`, `brand_id`, `price`, `amount`, `image`) VALUES
(1, 'Cellini', 1, 62740, 206, 'cellini.png'),
(2, 'Seamaster 300', 2, 26713, 697, 'seamaster300.png'),
(3, 'Daytona', 1, 232456, 118, 'daytona.png'),
(4, 'Speedmaster', 2, 150000, 93, 'speedmaster.png');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `type` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `role`
--

INSERT INTO `role` (`id`, `type`) VALUES
(1, 'administrator'),
(2, 'moderator'),
(3, 'user');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nickname` varchar(40) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `nickname`, `password`, `email`, `role_id`) VALUES
(1, 'admin', '$2y$10$xP4os3vTyVO8WHf9e8aCpeb6u.7UNifY1SNN.zam3/i6mQUYSacmG', 'admin@gmail.com', 1),
(3, 'moderator', '$2y$10$5LTJc.l0cRVvm8dEVpxLPOp9oinNvlbOLzxTG5tMTzasuQzZlu8s2', 'moderator@gmail.com', 2),
(5, 'kowalski', '$2y$10$fwWwvlp9gcAYetpKojGYouxogj7DSehYHUGJdPWrVwz8MIj51XCZ.', 'kowalski@gmail.com', 3);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeksy dla tabeli `orders_products`
--
ALTER TABLE `orders_products`
  ADD KEY `product_id` (`product_id`),
  ADD KEY `orders_id` (`orders_id`);

--
-- Indeksy dla tabeli `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand` (`brand_id`);

--
-- Indeksy dla tabeli `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_type` (`role_id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT dla tabeli `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT dla tabeli `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `orders_products`
--
ALTER TABLE `orders_products`
  ADD CONSTRAINT `orders_products_ibfk_1` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `orders_products_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`);

--
-- Ograniczenia dla tabeli `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
