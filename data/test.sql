-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 17 2019 г., 19:20
-- Версия сервера: 8.0.15
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `php2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `session_id` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id`, `session_id`, `product_id`) VALUES
(143, '1d8gopqrdca3u187njncqugn68mtrk4o', 2),
(144, '1d8gopqrdca3u187njncqugn68mtrk4o', 3),
(145, '1d8gopqrdca3u187njncqugn68mtrk4o', 112),
(146, '1d8gopqrdca3u187njncqugn68mtrk4o', 112),
(147, '1d8gopqrdca3u187njncqugn68mtrk4o', 113),
(148, '1d8gopqrdca3u187njncqugn68mtrk4o', 112),
(149, '1d8gopqrdca3u187njncqugn68mtrk4o', 112),
(150, '1d8gopqrdca3u187njncqugn68mtrk4o', 3),
(151, '1d8gopqrdca3u187njncqugn68mtrk4o', 2),
(183, 'fao3ujs0t60go034l8bh3unjon21buli', 2),
(184, 'fao3ujs0t60go034l8bh3unjon21buli', 3),
(185, 'fao3ujs0t60go034l8bh3unjon21buli', 112),
(186, 'fao3ujs0t60go034l8bh3unjon21buli', 113);

-- --------------------------------------------------------

--
-- Структура таблицы `confirm_carts`
--

CREATE TABLE `confirm_carts` (
  `id` int(11) NOT NULL,
  `session_id` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `confirm_carts`
--

INSERT INTO `confirm_carts` (`id`, `session_id`, `name`, `status`, `phone`) VALUES
(30, 'hh1grfckuu7cearussregakjcpsq2v6d', 'паврпва', 'disapproved', '44444'),
(31, 'bcmkmdjmofnfgejju1pqkpktq8p2secc', 'вася', 'disapproved', '4564645');

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `title` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `title`, `link`, `parent`) VALUES
(1, 'главная', '/', 0),
(2, 'каталог', '/catalog', 0),
(3, 'галлерея', '/gallery', 0),
(4, 'Сабменю1', '#', 0),
(5, 'главная', '/', 4),
(6, 'каталог', '/catalog', 4),
(7, 'сабменю2', '#', 4),
(8, 'главная', '/', 7),
(9, 'каталог', '/catalog', 7),
(10, 'Калькулятор', '/calculator', 0),
(11, 'Корзина', '/cart', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `full_desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `short_desc`, `full_desc`, `image`, `category`, `price`) VALUES
(2, 'Ноутбук', ' переносной персональный компьютер', 'К ноутбукам обычно относят лэптопы (часто употребляется «лаптоп»), выполненные в раскладном форм-факторе. Ноутбук переносят в сложенном виде, это позволяет защитить экран, клавиатуру и тачпад при транспортировке. Также это связано с удобством транспортировки (чаще всего ноутбук транспортируется в портфеле, что позволяет не держать его в руках, а повесить на плечо).', 'notebook.jpg', 'электроника', 1400),
(3, 'кошка', 'домашнее животное, одно из наиболее популярных', 'С точки зрения научной систематики, домашняя кошка — млекопитающее семейства кошачьих отряда хищных. Ранее домашнюю кошку нередко рассматривали как отдельный биологический вид. С точки зрения современной биологической систематики домашняя кошка (Felis silvestris catus) является подвидом лесной кошки', 'cat.jpg', 'животные', 3000),
(112, 'боты', 'lorem lorem', 'loremloremloremloremloremloremlorem', 'boots.jpg', 'одежда', 100),
(113, 'кепка', 'lorem lorem', 'loremloremloremloremloremloremlorem', 'head.jpg', 'одежда', 300);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hash` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `hash`) VALUES
(1, 'admin', '$2y$10$epnTaveZrF2nyyd0ePk4tOwHOlJC48JtBA1HoYs7BXC8MEzzOEcTW', '12890046245db1a4a56f2299.27209101'),
(2, 'user', '$2y$10$epnTaveZrF2nyyd0ePk4tOwHOlJC48JtBA1HoYs7BXC8MEzzOEcTW', '3682818575db1a4d79526e9.08916095');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `confirm_carts`
--
ALTER TABLE `confirm_carts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT для таблицы `confirm_carts`
--
ALTER TABLE `confirm_carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
