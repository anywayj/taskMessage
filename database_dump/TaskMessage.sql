-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 16 2020 г., 05:48
-- Версия сервера: 5.5.57
-- Версия PHP: 7.0.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `TaskMessage`
--

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `record_user`
--

CREATE TABLE `record_user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `record_user`
--

INSERT INTO `record_user` (`id`, `firstname`, `lastname`) VALUES
(1, 'Валерий', 'Гриценко');

-- --------------------------------------------------------

--
-- Структура таблицы `task`
--

CREATE TABLE `task` (
  `task_id` int(11) NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `task_description` text NOT NULL,
  `task_type` int(11) NOT NULL,
  `task_start` datetime NOT NULL,
  `task_end` datetime NOT NULL,
  `task_status` smallint(6) NOT NULL DEFAULT '1',
  `task_created_at` datetime NOT NULL,
  `task_updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `task`
--

INSERT INTO `task` (`task_id`, `task_name`, `task_description`, `task_type`, `task_start`, `task_end`, `task_status`, `task_created_at`, `task_updated_at`) VALUES
(1, 'add 1 task', 'task message', 1, '2020-02-01 00:00:00', '2020-02-02 00:00:00', 0, '2020-02-16 04:10:39', '2020-02-16 00:00:00'),
(2, 'add 2 task', 'task message', 2, '2020-02-02 00:00:00', '2020-02-04 00:00:00', 1, '2020-02-16 04:10:52', '2020-02-16 00:00:00'),
(3, 'add 3 task', 'task message', 1, '2020-02-02 00:00:00', '2020-02-04 00:00:00', 0, '2020-02-16 04:13:09', '2020-02-16 04:13:09'),
(4, 'add 4 task', 'task message', 3, '2020-02-02 00:00:00', '2020-02-15 00:00:00', 1, '2020-02-16 04:14:00', '2020-02-16 00:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `task_type`
--

CREATE TABLE `task_type` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `task_type`
--

INSERT INTO `task_type` (`id`, `type`) VALUES
(1, 'Важная'),
(2, 'Менее важная'),
(3, 'Не важная');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', '_Ru6FTJSId3ESFfLrDiwBo-ODY79EbgN', '$2y$13$G.meUrdPvef/NQEcpsve9eWfoxpl2APD7vu7LDuooTTl7EnW0ANKe', 1, '2020-02-16 04:09:21', '2020-02-16 04:09:21');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `record_user`
--
ALTER TABLE `record_user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`task_id`),
  ADD KEY `task_type` (`task_type`);

--
-- Индексы таблицы `task_type`
--
ALTER TABLE `task_type`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `record_user`
--
ALTER TABLE `record_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `task`
--
ALTER TABLE `task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `task_type`
--
ALTER TABLE `task_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
