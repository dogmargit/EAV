-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 24 2013 г., 11:26
-- Версия сервера: 5.1.68-community-log
-- Версия PHP: 5.4.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `kshop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `banners`
--

CREATE TABLE IF NOT EXISTS `banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `position` int(4) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `checked` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `banners`
--

INSERT INTO `banners` (`id`, `title`, `url`, `pic`, `position`, `created_at`, `updated_at`, `checked`) VALUES
(1, 'Peg Perego Gt3', 'http://gshop.kidbase.ru/products/peg-perego-gt3/1', 'c4b86c1e9cc9c48b9f1e6738a388a325.jpg', 1, NULL, '2013-09-20 15:09:19', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `banners_object`
--

CREATE TABLE IF NOT EXISTS `banners_object` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data_x` int(11) NOT NULL,
  `data_y` int(11) NOT NULL,
  `data_speed` int(11) NOT NULL,
  `data_start` int(11) NOT NULL,
  `data_easing` varchar(255) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `class` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `btn` varchar(255) NOT NULL,
  `banner_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `banners_object`
--

INSERT INTO `banners_object` (`id`, `data_x`, `data_y`, `data_speed`, `data_start`, `data_easing`, `pic`, `text`, `class`, `link`, `btn`, `banner_id`) VALUES
(1, 570, 50, 4000, 1000, 'easeOutElastic', 'dfdb3de036f349b4d0a885aee7ece8dc.png', '', 'lft ltt', '', 'btn-danger', 1),
(2, 400, 20, 2363, 3000, 'linear', 'd507582660af65498502db00b7458d3f.png', '', 'lfl str', '', 'btn-danger', 1),
(3, 870, 80, 4000, 1500, 'easeOutElastic', 'cf202a63d6d02a2e58caf768726683dd.png', '', 'lft ltt', '', 'btn-danger', 1),
(4, 120, 120, 1000, 500, 'easeInOutBack', '', 'With Webmarket, the Sky Is the Limit', 'lfl big_theme', '', 'btn-danger', 1),
(5, 120, 190, 1000, 700, 'easeInOutBack', '', 'Take a tour on Webmarket HTML Template', 'lfl small_theme', '', 'btn-danger', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `callback`
--

CREATE TABLE IF NOT EXISTS `callback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` int(11) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `meta_title` varchar(1000) NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keywords` varchar(1000) NOT NULL,
  `checked` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `title`, `description`, `url`, `parent_id`, `created_at`, `updated_at`, `meta_title`, `meta_description`, `meta_keywords`, `checked`) VALUES
(1, 'Детские коляски', 'Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации "Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст.." Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам "lorem ipsum" сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения. За прошедшие годы текст Lorem Ipsum получил много версий. Некоторые версии появились по ошибке, некоторые - намеренно (например, юмористические варианты)', 'detskie-kolyaski', 0, NULL, NULL, 'Детские коляски', 'orem ipsum" сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения. За прошедшие годы текст Lorem Ipsum получил много версий. Некоторые версии появились по ошибке, некоторые - намеренно (например, юмористические варианты)', 'Детские коляски', 1),
(2, 'Прогулочные коляски', 'Прогулочные коляски', 'progulichnie-kolyaski', 1, NULL, NULL, 'Прогулочные коляски', 'Прогулочные коляски', 'Прогулочные коляски', 1),
(3, 'Автокресла', 'Автокресла', 'avtokresla', 0, NULL, NULL, 'Автокресла', 'Автокресла', 'Автокресла', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `manufacturer`
--

CREATE TABLE IF NOT EXISTS `manufacturer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `meta_title` varchar(1000) NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keywords` varchar(1000) NOT NULL,
  `checked` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `manufacturer`
--

INSERT INTO `manufacturer` (`id`, `title`, `description`, `url`, `pic`, `created_at`, `updated_at`, `meta_title`, `meta_description`, `meta_keywords`, `checked`) VALUES
(1, 'Peg perego', '<p>\r\n	  Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации "Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст.." Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам "lorem ipsum" сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения. За прошедшие годы текст Lorem Ipsum получил много версий. Некоторые версии появились по ошибке, некоторые - намеренно (например, юмористические варианты)\r\n</p>', 'peg-perego', '', NULL, '2013-09-18 15:30:26', 'Peg perego', 'Peg perego', 'Peg perego', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `text` text NOT NULL,
  `checked` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `pic`, `url`, `created_at`, `updated_at`, `text`, `checked`) VALUES
(1, 'Первая новость', '', 'pervaya-novost', '2013-09-18 14:45:28', NULL, '<p>\r\n	<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum\r\n</p>', 1),
(2, 'Вторая новость', '', 'vtoraya-novost', '2013-09-18 14:48:10', NULL, '<p>\r\n	<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n</p>', 1),
(3, 'Третья новость', '', 'tretya-novost', '2013-09-18 15:03:13', NULL, '<p>\r\n	<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum\r\n</p>', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `user_address` text NOT NULL,
  `user_ip` varchar(255) NOT NULL,
  `user_comment` text NOT NULL,
  `status_id` int(11) NOT NULL,
  `note` text NOT NULL,
  `subtotal` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_name`, `user_email`, `user_id`, `user_phone`, `user_address`, `user_ip`, `user_comment`, `status_id`, `note`, `subtotal`, `created_at`, `updated_at`) VALUES
(7, 'Амиршаев Эдуард', 'spawn.cs@mail.ru', 0, '+79267838890', '', '', '', 0, '', 0, '2013-09-17 11:51:25', NULL),
(8, 'Амиршаев Эдуард', 'spawn.cs@mail.ru', 0, '+79267838890', '', '', '', 0, '', 0, '2013-09-17 11:53:03', NULL),
(9, 'Амиршаев Эдуард', 'spawn.cs@mail.ru', 0, '+79267838890', '', '', '', 0, '', 0, '2013-09-17 11:57:20', NULL),
(10, 'Амиршаев Эдуард', 'spawn.cs@mail.ru', 0, '+79267838890', '', '', '', 0, '', 0, '2013-09-17 11:59:11', NULL),
(11, 'Амиршаев Эдуард', 'spawn.cs@mail.ru', 0, '+79267838890', '', '', '', 0, '', 0, '2013-09-17 11:59:18', NULL),
(12, 'Амиршаев Эдуард', 'spawn.cs@mail.ru', 0, '+79267838890', '', '', '', 0, '', 0, '2013-09-17 11:59:23', NULL),
(13, 'Амиршаев Эдуард', 'spawn.cs@mail.ru', 0, '+79267838890', '', '', '', 0, '', 0, '2013-09-17 12:00:04', NULL),
(14, 'уцйуц', 'spawn.cs@mail.ru', 0, '2755988', '', '', '', 0, '', 0, '2013-09-17 12:00:25', NULL),
(15, 'dsa', 'dsa', 0, '+79267838890', '', '', '', 0, '', 0, '2013-09-17 12:16:57', NULL),
(16, 'dsa', 'dsa', 0, '+79267838890', '', '', '', 0, '', 0, '2013-09-17 12:17:09', NULL),
(17, 'dsa', 'dsa', 0, '+79267838890', '', '', '', 0, '', 0, '2013-09-17 12:18:03', NULL),
(18, 'dsa', 'dsa', 0, '+79267838890', '', '', '', 0, '', 0, '2013-09-17 12:18:27', NULL),
(19, 'dsa', 'dsa', 0, '+79267838890', '', '', '', 0, '', 0, '2013-09-17 12:19:13', NULL),
(20, 'dsa', 'dsa', 0, '+79267838890', '', '', '', 0, '', 0, '2013-09-17 12:19:15', NULL),
(21, 'dsa', 'mail@mail.ru', 0, '+79267838890', '', '', '', 0, '', 0, '2013-09-17 12:19:48', NULL),
(22, 'dsads', 'spawn.cs@mail.ru', 0, '2755988', '', '', '', 0, '', 0, '2013-09-18 16:58:11', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `orders_products`
--

CREATE TABLE IF NOT EXISTS `orders_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orders_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `products_name` varchar(255) NOT NULL,
  `options` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Дамп данных таблицы `orders_products`
--

INSERT INTO `orders_products` (`id`, `orders_id`, `products_id`, `products_name`, `options`, `quantity`, `price`, `subtotal`) VALUES
(5, 7, 0, 'Peg p3erego GT3', '', 1, 4500, 4500),
(6, 8, 0, 'Peg p3erego GT3', '', 1, 4500, 4500),
(7, 9, 0, 'Peg p3erego GT3', '', 1, 4500, 4500),
(8, 10, 0, 'Peg p3erego GT3', '', 1, 4500, 4500),
(9, 11, 0, 'Peg p3erego GT3', '', 1, 4500, 4500),
(10, 12, 0, 'Peg p3erego GT3', '', 1, 4500, 4500),
(11, 13, 0, 'Peg p3erego GT3', '', 1, 4500, 4500),
(12, 15, 0, 'Peg p3erego GT3', '', 1, 4500, 4500),
(13, 16, 0, 'Peg p3erego GT3', '', 1, 4500, 4500),
(14, 17, 0, 'Peg p3erego GT3', '', 1, 4500, 4500),
(15, 18, 0, 'Peg p3erego GT3', '', 1, 4500, 4500),
(16, 19, 0, 'Peg p3erego GT3', '', 1, 4500, 4500),
(17, 20, 0, 'Peg p3erego GT3', '', 1, 4500, 4500),
(18, 21, 0, 'Peg p3erego GT3', '', 1, 4500, 4500),
(19, 22, 0, 'Zooper Waltz Smart Ruby Storm', '', 1, 13500, 13500);

-- --------------------------------------------------------

--
-- Структура таблицы `orders_status`
--

CREATE TABLE IF NOT EXISTS `orders_status` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `meta_title` varchar(1000) NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keywords` varchar(1000) NOT NULL,
  `checked` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id`, `title`, `description`, `url`, `created_at`, `updated_at`, `meta_title`, `meta_description`, `meta_keywords`, `checked`) VALUES
(1, 'Контакты', 'Контакты', 'kontakti', NULL, NULL, 'Контакты', 'Контакты', 'Контакты', 1),
(2, 'О нас', '', 'o-nas', '2013-09-19 09:33:28', NULL, '', '', '', 1),
(3, 'Доставка', '', 'dostavka', '2013-09-19 09:40:21', NULL, '', '', '', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `brands_id` int(11) NOT NULL,
  `recomended` tinyint(1) NOT NULL,
  `special` tinyint(1) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `meta_title` varchar(1000) NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keywords` varchar(1000) NOT NULL,
  `checked` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `price`, `pic`, `url`, `brands_id`, `recomended`, `special`, `created_at`, `updated_at`, `meta_title`, `meta_description`, `meta_keywords`, `checked`) VALUES
(1, 'Peg perego GT3', '<p>\r\n	                        Давно <span style="font-weight: normal;">выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации "Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст.." Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам "lorem ipsum" сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения. За прошедшие годы текст Lorem Ipsum получил много версий. Некоторые версии появились по ошибке, некоторые - намеренно (например, юмористические варианты)</span>\r\n</p>', 17500, '796d8abc0337e384241b97c3c74b0eea.JPG', 'peg-perego-gt3', 1, 0, 0, NULL, '2013-09-21 14:15:21', 'Peg perego GT3', 'm в качестве текста по умолчанию, так что поиск по ключевым словам "lorem ipsum" сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рож', 'Peg perego GT3', 1),
(2, 'Zooper Waltz Smart Ruby Storm', '', 13500, '3ff962cbda0b3720c85b1af343fa23cd.JPG', 'zooper-waltz-smart-ruby-storm', 1, 0, 0, NULL, '2013-09-11 16:28:51', '', '', '', 1),
(3, 'Peg Perego Pliko P3 Completo', '', 12500, '42c4cabc3fbbc36dfddf5980ca9e9080.JPG', 'peg-perego-pliko-p3-completo', 1, 0, 0, '2013-09-11 16:07:23', '2013-09-11 17:18:59', '', '', '', 1),
(4, 'Peg Perego Pliko Switch Compact', '', 12979, '2938edebdf4515bea2e04cb8cfc244bb.JPG', 'peg-perego-pliko-switch-compact', 1, 0, 0, '2013-09-12 12:46:48', NULL, '', '', '', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `products_images`
--

CREATE TABLE IF NOT EXISTS `products_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `products_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `products_images`
--

INSERT INTO `products_images` (`id`, `title`, `pic`, `price`, `url`, `products_id`) VALUES
(2, 'Miele', 'b0f3af3517837b447fae58281f402386.JPG', 14500, 'qwe', 1),
(3, 'Fantasy beige', '25b295a5afa7e1aa1ef1cde2d84a73e2.JPG', 16455, 'asd', 1),
(4, 'Zooper', '7094eb26fdbbf7d2df772d20a0cd4dde.JPG', 7800, 'xzc', 1),
(5, 'Java', '8d96b605a139a592cc4e97b2a133e3f1.JPG', 16999, 'bvn', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `products_in_categories`
--

CREATE TABLE IF NOT EXISTS `products_in_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `products_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=101 ;

--
-- Дамп данных таблицы `products_in_categories`
--

INSERT INTO `products_in_categories` (`id`, `products_id`, `categories_id`) VALUES
(89, 2, 1),
(90, 2, 2),
(91, 3, 1),
(92, 3, 2),
(99, 1, 1),
(100, 1, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `products_related`
--

CREATE TABLE IF NOT EXISTS `products_related` (
  `products_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Дамп данных таблицы `products_related`
--

INSERT INTO `products_related` (`products_id`, `id`, `link_id`) VALUES
(1, 21, 1),
(1, 22, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `products_reviews`
--

CREATE TABLE IF NOT EXISTS `products_reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `review` text NOT NULL,
  `created_at` datetime NOT NULL,
  `products_id` int(11) NOT NULL,
  `checked` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `title`) VALUES
(1, 'pic_path', './images/', 'Путь до картинок'),
(2, 'pic_small_size', '270', 'Размер миниатюры'),
(3, 'email', 'spawn.cs@mail.ru', 'Email Интернет Магазина'),
(4, 'pic_small_path', './images/thumbs_160/', 'Путь миниатюр'),
(5, 'global_title', ' - Интернет магазин', 'Глобальный заголовок сайта'),
(6, 'default_order', 'price', 'Сортировка по умолчанию в каталоге'),
(7, 'per_page_catalog', '10', 'Кол-во товаров в каталоге'),
(8, 'site_title', 'Коляски.рф', 'Заголовок сайта'),
(9, 'site_link', 'http://www.сайт.рф/', 'Адрес сайта');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(1000) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `pic` varchar(255) NOT NULL,
  `group_id` int(3) NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `checked` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `password`, `email`, `username`, `phone`, `address`, `pic`, `group_id`, `role`, `created_at`, `updated_at`, `checked`) VALUES
(1, '2755988', 'spawn.cs@mail.ru', 'Эдуард', '2755988', 'Адрес', '', 1, 'administrator', NULL, '2013-08-29 23:54:30', 1),
(2, '852456', 'raficone@gshop.com', 'Виталий', '+7 911 890 67 56', 'Адресс мой такой=)', '', 0, 'administrator', NULL, '2013-08-31 18:59:34', 1),
(4, '2755988', 'dogmar_qwerty@mail.ru', 'Эд', '', '', '', 0, 'user', NULL, NULL, 0),
(5, '852456', 'test@gshop.com', 'Test', '', '', '', 0, 'user', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users_group`
--

CREATE TABLE IF NOT EXISTS `users_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `users_group`
--

INSERT INTO `users_group` (`id`, `role`, `description`) VALUES
(1, 'Admin', 'Администраотр'),
(2, 'Client', 'Клиент');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
