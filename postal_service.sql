-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 07 2021 г., 22:23
-- Версия сервера: 10.3.13-MariaDB-log
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
-- База данных: `postal_service`
--

-- --------------------------------------------------------

--
-- Структура таблицы `dispatch`
--

CREATE TABLE `dispatch` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `track_code` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `city_dispatch` varchar(255) NOT NULL,
  `city_destination` varchar(255) NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `dispatch`
--

INSERT INTO `dispatch` (`id`, `user_id`, `track_code`, `status`, `city_dispatch`, `city_destination`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, '5d7647e045c51eff45d7f02140461c4d', 'expects', 'Thielborough', 'Watersstad', 962105.00, '2021-01-03 12:32:18', '2021-01-06 10:24:05'),
(2, 1, 'b91a6d09f1c2f4bfadf3b85d2690d862', 'expects', 'East Loycebury', 'West Melodyburgh', 332865.00, '2021-01-03 12:32:18', '2021-01-07 07:21:25'),
(3, 1, 'ac4f99d8154201a793b81ee1bc2dbdd7', 'issued', 'Lake Claudeville', 'West Kaelyn', 511540.00, '2021-01-03 12:32:18', '2021-01-06 14:30:17'),
(4, 1, '2961bdade3a45511de91c87b48014885', 'expects', 'Lake Finn', 'West Alexandermouth', 756248.00, '2021-01-03 12:32:18', '2021-01-03 12:32:18'),
(5, 1, '89f47042d7b8878ba5f69bded10f0e0b', 'delivered', 'East Dashawnfurt', 'Wallaceside', 910956.00, '2021-01-03 12:32:18', '2021-01-06 14:31:11');

-- --------------------------------------------------------

--
-- Структура таблицы `dispatch_history`
--

CREATE TABLE `dispatch_history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dispatch_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL,
  `city_dispatch` varchar(255) NOT NULL,
  `city_destination` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `dispatch_history`
--

INSERT INTO `dispatch_history` (`id`, `dispatch_id`, `status`, `city_dispatch`, `city_destination`, `created_at`, `updated_at`) VALUES
(1, 1, 'expects', 'Thielborough', 'Watersstad', '2021-01-02 20:00:00', '2021-01-02 20:00:00'),
(3, 2, 'sent', 'East Loycebury', 'West Melodyburgh', '2021-01-06 10:39:37', '2021-01-06 10:39:37'),
(4, 3, 'delivered', 'Lake Claudeville', 'West Kaelyn', '2021-01-06 14:29:17', '2021-01-06 14:29:17'),
(5, 3, 'issued', 'Lake Claudeville', 'West Kaelyn', '2021-01-06 14:30:17', '2021-01-06 14:30:17'),
(6, 5, 'delivered', 'East Dashawnfurt', 'Wallaceside', '2021-01-06 14:31:11', '2021-01-06 14:31:11'),
(7, 2, 'expects', 'East Loycebury', 'West Melodyburgh', '2021-01-07 07:21:25', '2021-01-07 07:21:25');

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2019_08_19_000000_create_failed_jobs_table', 1),
(10, '2021_01_03_132717_add_role_for_users_table', 2),
(13, '2021_01_03_144104_create_dispatch_table', 3),
(14, '2021_01_03_162738_create_dispatch_history_table', 3),
(15, '2021_01_07_150520_add_api_key_to_users_table', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `api_key` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `admin`, `first_name`, `last_name`, `email`, `api_key`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'aleksey', 'silantiev', 'aleksey_7300@mail.ru', 'admin', NULL, '$2y$10$j2sSG0uuAy3mV9JAxCZUn.VaBTEzxqMhJHp3ATM/g0q9tQ9nesZZ6', NULL, '2021-01-03 09:12:47', '2021-01-03 17:57:34');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `dispatch`
--
ALTER TABLE `dispatch`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dispatch_track_code_unique` (`track_code`),
  ADD KEY `dispatch_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `dispatch_history`
--
ALTER TABLE `dispatch_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dispatch_history_dispatch_id_foreign` (`dispatch_id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `dispatch`
--
ALTER TABLE `dispatch`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `dispatch_history`
--
ALTER TABLE `dispatch_history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `dispatch`
--
ALTER TABLE `dispatch`
  ADD CONSTRAINT `dispatch_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `dispatch_history`
--
ALTER TABLE `dispatch_history`
  ADD CONSTRAINT `dispatch_history_dispatch_id_foreign` FOREIGN KEY (`dispatch_id`) REFERENCES `dispatch` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
