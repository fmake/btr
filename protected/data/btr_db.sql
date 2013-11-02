-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 02 2013 г., 16:44
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `btr_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `balance_accounting`
--

CREATE TABLE IF NOT EXISTS `balance_accounting` (
  `id_user` int(11) NOT NULL COMMENT 'id позователя',
  `id_operation` int(11) NOT NULL COMMENT 'id операции',
  `balance_old` int(11) NOT NULL COMMENT 'старый баланс',
  `balance_new` int(11) NOT NULL COMMENT 'новый баланс',
  `date_create` int(11) NOT NULL COMMENT 'дата изменения'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `id_city` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT 'название',
  `description` text NOT NULL COMMENT 'описание',
  `active` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_city`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `id_company` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT 'Название',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT 'сайт',
  `phone` varchar(255) NOT NULL COMMENT 'телефон',
  `description` text NOT NULL COMMENT 'описание',
  `logo` varchar(255) NOT NULL DEFAULT '' COMMENT 'логотип',
  `date_create` int(11) NOT NULL COMMENT 'дата создания',
  `rating` int(11) NOT NULL COMMENT 'рейтинг',
  `active` enum('1','0') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_company`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `company`
--

INSERT INTO `company` (`id_company`, `name`, `url`, `phone`, `description`, `logo`, `date_create`, `rating`, `active`) VALUES
(1, 'Future', 'future-group.ru', '1234567', 'Какое то описание', '', 1383383608, 0, '0'),
(2, 'dsadasdas', 'asdsadsa', 'dasdsad', 'asdsa', '', 1383384778, 0, '0'),
(3, 'sadsad', 'dasdsad', 'asdsa', 'asdsa', '', 1383393736, 0, '1'),
(4, 'Future2', 'sdsdsadsa', '1234567', 'sadas', '', 1383393906, 0, '1');

-- --------------------------------------------------------

--
-- Структура таблицы `operation`
--

CREATE TABLE IF NOT EXISTS `operation` (
  `id_operation` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT 'название',
  `description` text NOT NULL COMMENT 'описание',
  `active` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_operation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id_order` int(11) NOT NULL AUTO_INCREMENT,
  `i_need_to` varchar(255) NOT NULL DEFAULT '' COMMENT 'мне нужно',
  `description` text NOT NULL COMMENT 'описание',
  `date_completion` varchar(255) NOT NULL DEFAULT '' COMMENT 'Дата исполнения заказа',
  `time_completion` varchar(255) NOT NULL DEFAULT '' COMMENT 'Время исполнения заказа',
  `id_city` int(11) NOT NULL COMMENT 'id города',
  `address` varchar(255) NOT NULL COMMENT 'Адрес',
  `metro` varchar(255) NOT NULL COMMENT 'Метро',
  `i_willing_to_pay` varchar(255) NOT NULL COMMENT 'Я готов заплатить',
  `price_buy_company` varchar(255) NOT NULL COMMENT 'стоимость заявки',
  `name` varchar(255) NOT NULL COMMENT 'Имя',
  `email` varchar(255) NOT NULL COMMENT 'email',
  `phone` varchar(255) NOT NULL COMMENT 'телефон',
  `id_type_work` int(11) NOT NULL COMMENT 'id типа работы',
  `url_referer` varchar(255) NOT NULL DEFAULT '' COMMENT 'страница с какой пришел',
  `date_create` int(11) NOT NULL COMMENT 'дата создания',
  `count_buy` int(11) NOT NULL COMMENT 'колличество купленных',
  `active` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_order`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id_page` int(11) NOT NULL AUTO_INCREMENT,
  `parent` int(11) NOT NULL COMMENT 'id родителя',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT 'title',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT 'description',
  `keywords` varchar(255) NOT NULL DEFAULT '' COMMENT 'keywords',
  `redir` varchar(255) NOT NULL COMMENT 'для формирования ЧПУ',
  `text` text NOT NULL COMMENT 'анонс новости',
  `date` int(11) NOT NULL COMMENT 'дата в формате int',
  `active` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_page`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `relations_user_order`
--

CREATE TABLE IF NOT EXISTS `relations_user_order` (
  `id_user` int(11) NOT NULL COMMENT 'id позователя',
  `id_order` int(11) NOT NULL COMMENT 'id заказа',
  `buy_date` int(11) NOT NULL COMMENT 'дата покупки заказа'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `type_work`
--

CREATE TABLE IF NOT EXISTS `type_work` (
  `id_type_work` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT 'название',
  `description` text NOT NULL COMMENT 'описание',
  `active` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_type_work`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `role` int(1) NOT NULL,
  `login` varchar(255) NOT NULL DEFAULT '' COMMENT 'логин',
  `password` varchar(255) NOT NULL DEFAULT '' COMMENT 'пароль',
  `name` varchar(255) NOT NULL COMMENT 'Имя',
  `comment` text NOT NULL COMMENT 'Комментарий о себе',
  `date` int(11) NOT NULL COMMENT 'дата рождения',
  `date_create` int(11) NOT NULL COMMENT 'дата создания',
  `id_company` int(11) NOT NULL COMMENT 'привязка к компании',
  `balance` int(11) NOT NULL COMMENT 'баланс денег',
  `active` enum('1','0') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id_user`, `role`, `login`, `password`, `name`, `comment`, `date`, `date_create`, `id_company`, `balance`, `active`) VALUES
(1, 1, 'admin', '', 'admin', '', 0, 0, 0, 0, '0'),
(2, 0, 'info@future-group.ru', 'd8578edf8458ce06fbc5bb76a58c5ca4', '', '', 0, 1383383609, 1, 0, '0'),
(3, 0, 'asdsads@mail.ru', 'c91c03ea6c46a86cbc019be3d71d0a1a', '', '', 0, 1383384778, 2, 0, '0'),
(4, 0, 'mamaev.a@future-group.ru', '9a78a0e4cc8cbb15d1b85e65247ecfac', '', '', 0, 1383393906, 4, 0, '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
