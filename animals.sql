-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Гру 07 2019 р., 13:10
-- Версія сервера: 5.6.43
-- Версія PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `animals`
--

-- --------------------------------------------------------

--
-- Структура таблиці `blocklist`
--

CREATE TABLE `blocklist` (
  `ip` varchar(40) NOT NULL,
  `attempts` int(2) NOT NULL DEFAULT '5',
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `blocklist`
--

INSERT INTO `blocklist` (`ip`, `attempts`, `date`) VALUES
('127.0.0.1', 4, NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `ava` varchar(255) DEFAULT NULL,
  `token` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `email`, `password`, `age`, `ava`, `token`) VALUES
(2, 'Vasyan', 'v@v.ua', '12345', 32, NULL, NULL),
(6, 'Piter', 'a@a.ua', '123', 25, NULL, NULL),
(7, 'Stepan', '22@a.ua', '123', 22, NULL, NULL),
(8, 'Pavel', 'af@a.ua', '123', 25, NULL, NULL),
(9, 'Ivan', 'a@a.ua', '123', 27, NULL, NULL),
(10, 'Valera', 'a@a.ua', '123', 25, NULL, NULL),
(11, 'Vasyan', 'a@a.ua', '123', 32, NULL, NULL),
(12, 'John', 'acvcv@a.ua', '123', 25, NULL, NULL),
(13, 'Felix', 'fdfdf@a.ua', '123', 25, NULL, NULL),
(14, 'Micael', 'a@a.ua', '123', 32, NULL, NULL);

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `blocklist`
--
ALTER TABLE `blocklist`
  ADD UNIQUE KEY `ip` (`ip`);

--
-- Індекси таблиці `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
