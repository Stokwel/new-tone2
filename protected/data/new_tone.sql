-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Май 23 2013 г., 02:21
-- Версия сервера: 5.5.31
-- Версия PHP: 5.4.15-1~precise+1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `new_tone`
--

-- --------------------------------------------------------

--
-- Структура таблицы `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `isMain` tinyint(1) NOT NULL DEFAULT '0',
  `level` int(10) NOT NULL DEFAULT '0',
  `name` text NOT NULL,
  `url` text,
  `content` text,
  `title` text,
  `description` text,
  `keywords` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `page`
--

INSERT INTO `page` (`id`, `isMain`, `level`, `name`, `url`, `content`, `title`, `description`, `keywords`) VALUES
(4, 1, 0, '432423', '234234234', '<p>2342343234<br></p>', '2343', '23432', '345456'),
(8, 0, 0, 'ОЛОЛОЛООО', 'ОЛОЛОЛОЛОЛОЛ', '<p>ыфваываываывыва<br></p>', '111', '2222', '33333'),
(9, 1, 0, 'Страница из админки', 'Страница из админки', '<p>Страница из админки<br></p>', 'Страница из админки1', 'Страница из админки2', 'Страница из админки3');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nick` text NOT NULL,
  `email` text NOT NULL,
  `pass` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `nick`, `email`, `pass`) VALUES
(1, 'admin', '', '12345');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
