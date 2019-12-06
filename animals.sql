-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 06 2019 г., 17:49
-- Версия сервера: 5.7.25
-- Версия PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `animals`
--

-- --------------------------------------------------------

--
-- Структура таблицы `blocklist`
--

CREATE TABLE `blocklist` (
  `ip` varchar(40) NOT NULL,
  `attempts` int(2) NOT NULL DEFAULT '5',
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `blocklist`
--

INSERT INTO `blocklist` (`ip`, `attempts`, `date`) VALUES
('1.1.1.1', 5, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `ava` varchar(255) DEFAULT NULL,
  `token` text,
  `attempts` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `email`, `password`, `age`, `ava`, `token`, `attempts`) VALUES
(2, 'Vasyan', 'v@v.ua', '12345', 32, NULL, NULL, 0),
(6, 'Piter', 'a@a.ua', '123', 25, NULL, NULL, 0),
(7, 'Piter', 'a@a.ua', '123', 25, NULL, NULL, 0),
(8, 'Piter', 'a@a.ua', '123', 25, NULL, NULL, 0),
(9, 'Piter', 'a@a.ua', '123', 25, NULL, NULL, 0),
(10, 'Piter', 'a@a.ua', '123', 25, NULL, NULL, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `blocklist`
--
ALTER TABLE `blocklist`
  ADD UNIQUE KEY `ip` (`ip`);

--
-- Индексы таблицы `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
