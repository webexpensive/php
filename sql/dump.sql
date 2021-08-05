SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` int NOT NULL,
  `author_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `author_id`, `name`, `text`, `created_at`) VALUES
(1, 1, 'Новая статья', 'Проверка функционала', '2021-08-05 11:16:59'),
(2, 1, 'Вторая статья', 'Описание и текст этой статьи', '2021-08-05 11:17:18'),
(3, 1, 'Третья статья', 'Выпускаем новую статью', '2021-08-05 11:17:31');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `auth_token` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `email`, `role`, `password_hash`, `auth_token`, `created_at`) VALUES
(1, 'admin', 'admin@admin.ru', 'admin', '$2y$10$X4qBuFC22RLadQFOdILWte7pEyH3u/bDVfzuWzwJEKPz7U2U8iioC', '943006f6b89ac7beecfeab6e7117299be914a1fb4246fd4b18ea79549e5bbd59e44d72906597bb11', '2021-08-02 21:05:05'),
(2, 'user', 'user@user.ru', 'user', '$2y$10$LuSog0E0PhXqrJkHtxTr6uUumN2qvI04Cg4mRiWaV.Ddi...gtQv6', '8ae59f59d031e12f03fb9dfafa4dd9fb89f12b160ddf2e232cba8da5fdbe60333b39ece410e27972', '2021-08-02 21:05:32'),
(3, 'name', 'name@name.ru', 'user', '$2y$10$jJJHIfDfWp0AMpI1xoTI/.da/b4HpvKImplI7rh22xxmJXs219ok.', '27b6e57f632e54d6e9a130b591b62c0221110c32f243e2a14b6b728c874b528f1a50f7e0d56509b2', '2021-08-04 13:30:12');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nickname` (`login`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
