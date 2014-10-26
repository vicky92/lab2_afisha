-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 26 2014 г., 17:57
-- Версия сервера: 5.6.12-log
-- Версия PHP: 5.5.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `afisha`
--
CREATE DATABASE IF NOT EXISTS `afisha` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `afisha`;

-- --------------------------------------------------------

--
-- Структура таблицы `cinema`
--

CREATE TABLE IF NOT EXISTS `cinema` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(120) NOT NULL,
  `city_id` int(11) NOT NULL,
  `adress` varchar(180) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `cinema`
--

INSERT INTO `cinema` (`id`, `title`, `city_id`, `adress`) VALUES
(4, 'Домжур', 1, 'г. Москва, Никитский б-р, 8а '),
(5, 'Мультиплекс', 5, 'ул. Павлодарского');

-- --------------------------------------------------------

--
-- Структура таблицы `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(120) NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `city`
--

INSERT INTO `city` (`city_id`, `city_name`) VALUES
(1, 'Москва'),
(5, 'Санкт Петербург');

-- --------------------------------------------------------

--
-- Структура таблицы `films`
--

CREATE TABLE IF NOT EXISTS `films` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `films`
--

INSERT INTO `films` (`id`, `title`) VALUES
(2, 'Титаник'),
(3, 'Рио'),
(4, 'Матрица');

-- --------------------------------------------------------

--
-- Структура таблицы `films_relations`
--

CREATE TABLE IF NOT EXISTS `films_relations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cinema_id` int(11) NOT NULL,
  `film_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `films_relations`
--

INSERT INTO `films_relations` (`id`, `cinema_id`, `film_id`, `date`) VALUES
(2, 4, 2, '2014-10-25 00:00:00'),
(4, 4, 2, '2014-10-26 18:00:00'),
(5, 5, 3, '2014-10-26 05:00:00'),
(6, 5, 2, '2014-10-26 19:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
