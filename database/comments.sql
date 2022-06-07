-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Июн 07 2022 г., 00:49
-- Версия сервера: 8.0.27
-- Версия PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `comm_test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id_c` int NOT NULL,
  `name_c` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `phone_c` varchar(12) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email_c` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `rate_c` int NOT NULL,
  `date_c` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id_c`, `name_c`, `phone_c`, `email_c`, `rate_c`, `date_c`) VALUES
(1, 'Кочура Данил Ильич', '+79882811407', 'kochura2017@yandex.ru', 5, '2022-06-06 00:00:00'),
(6, 'Шамин Максим Сергеевич', '+79654589814', 'Max@sham.ru', 4, '2022-06-07 00:44:57'),
(7, 'Васнецов Алексей Игоревич', '+79882564565', 'al@vas.org', 4, '2022-06-07 03:03:21'),
(8, 'Колесников Богдан Валерьевич', '+79054654565', 'bog@kol.ru', 5, '2022-06-07 03:03:59'),
(9, 'Середа Максим Петрович', '+79653356545', 'ser@max.com', 5, '2022-06-07 03:04:41'),
(10, 'Коротков Дмитрий Петрович', '+79024561235', 'kor@dim.as', 3, '2022-06-07 03:05:20'),
(11, 'Лазарев Стас', '+79882562314', 'stas@laz.as', 4, '2022-06-07 03:26:16'),
(12, 'Киселев Максим Ильич', '+79564561235', 'maks@kis.ua', 4, '2022-06-07 03:27:54');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_c`),
  ADD KEY `com_dat` (`date_c`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id_c` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
