-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 13 2021 г., 17:27
-- Версия сервера: 8.0.19
-- Версия PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `lesson5`
--

-- --------------------------------------------------------

--
-- Структура таблицы `pictures`
--

CREATE TABLE `pictures` (
  `id` smallint NOT NULL,
  `filename` varchar(255) NOT NULL,
  `path_large` varchar(255) NOT NULL,
  `path_small` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `upload_date` datetime NOT NULL,
  `views` smallint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `pictures`
--

INSERT INTO `pictures` (`id`, `filename`, `path_large`, `path_small`, `description`, `upload_date`, `views`) VALUES
(1, '01.jpg', 'images/gallery_large', 'images/gallery_small', 'space', '2021-05-10 00:00:00', 0),
(2, '02.jpg', 'images/gallery_large', 'images/gallery_small', 'earth space', '2021-05-10 00:00:00', 1),
(3, '03.jpg', 'images/gallery_large', 'images/gallery_small', 'space all around', '2021-05-10 00:00:00', 6),
(4, '04.jpg', 'images/gallery_large', 'images/gallery_small', 'space in the clouds', '2021-05-10 00:00:00', 4),
(5, '05.jpg', 'images/gallery_large', 'images/gallery_small', 'no reason to be real', '2021-05-10 00:00:00', 5),
(6, '06.jpg', 'images/gallery_large', 'images/gallery_small', 'space from space', '2021-05-10 00:00:00', 0),
(7, '07.jpg', 'images/gallery_large', 'images/gallery_small', 'green river under sky', '2021-05-10 00:00:00', 0),
(8, '08.jpg', 'images/gallery_large', 'images/gallery_small', 'the tower in darkness', '2021-05-10 00:00:00', 0),
(9, '09.jpg', 'images/gallery_large', 'images/gallery_small', 'sailing through the oceans', '2021-05-10 00:00:00', 2),
(10, '10.jpg', 'images/gallery_large', 'images/gallery_small', 'in the midway', '2021-05-10 00:00:00', 0),
(11, '11.jpg', 'images/gallery_large', 'images/gallery_small', 'just stars', '2021-05-10 00:00:00', 0),
(12, '12.jpg', 'images/gallery_large', 'images/gallery_small', 'some dreams in the space', '2021-05-10 00:00:00', 0),
(13, '13.jpg', 'images/gallery_large', 'images/gallery_small', 'the bridge', '2021-05-10 00:00:00', 0),
(14, '14.jpg', 'images/gallery_large', 'images/gallery_small', 'long long tower wall in China', '2021-05-10 00:00:00', 0),
(15, '15.jpg', 'images/gallery_large', 'images/gallery_small', 'Euffel the great', '2021-05-10 00:00:00', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` smallint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
