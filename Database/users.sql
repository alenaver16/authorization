-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 16 2018 г., 11:14
-- Версия сервера: 5.7.20
-- Версия PHP: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `users`
--

-- --------------------------------------------------------

--
-- Структура таблицы `confirm_users`
--

CREATE TABLE `confirm_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(50) NOT NULL,
  `token` varchar(255) NOT NULL,
  `date_registr` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `confirm_users`
--

INSERT INTO `confirm_users` (`id`, `email`, `token`, `date_registr`) VALUES
(1, 'alona.vereshchaka@hneu.net', 'e69636790037c7385f44586baf8e2459', 1523866158);

-- --------------------------------------------------------

--
-- Структура таблицы `registr`
--

CREATE TABLE `registr` (
  `id` int(11) UNSIGNED NOT NULL,
  `login` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `email_status` tinyint(1) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `date_registr` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `registr`
--

INSERT INTO `registr` (`id`, `login`, `email`, `email_status`, `password_hash`, `date_registr`) VALUES
(54, 'q', 'alona.vereshchaka@hneu.net', 1, '$2y$10$6xx20sDNYU/Z4yS1n9YUgeiVzQWC8mSQYeMWeoa0rCciXSp9iUrfi', 1523739164),
(55, 'a', 'alona.vereshchaka@hneu.net', 1, '$2y$10$Hz5Ke5xXUdrt2m3TvR320uRMvFM3h6HraEdbF3L.LS0QIyKY9m14.', 1523804781),
(56, 'w', 'alona.vereshchaka@hneu.net', 0, '$2y$10$Mxken4WsSO0pjJxKjps4UOdKHlXEp1lcTwhUMbqqVq5TQh3SA5MSe', 1523866157);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `confirm_users`
--
ALTER TABLE `confirm_users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `registr`
--
ALTER TABLE `registr`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `confirm_users`
--
ALTER TABLE `confirm_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `registr`
--
ALTER TABLE `registr`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
