-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jun 2021 pada 06.02
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uaspinet`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Site Administrator'),
(2, 'user', 'Regular User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups_permissions`
--

INSERT INTO `auth_groups_permissions` (`group_id`, `permission_id`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'admin1', 1, '2021-06-10 05:36:22', 0),
(2, '::1', 'yandrizal299@gmail.com', 3, '2021-06-10 05:57:14', 0),
(3, '::1', 'admin1', 1, '2021-06-10 09:48:01', 0),
(4, '::1', 'admin1@gmail.com', NULL, '2021-06-10 09:50:15', 0),
(5, '::1', 'yandrizal299@gmail.com', 4, '2021-06-10 10:36:41', 1),
(6, '::1', 'yandrizal299@gmail.com', 4, '2021-06-10 10:38:06', 1),
(7, '::1', 'yandrizal299@gmail.com', 4, '2021-06-10 10:40:52', 1),
(8, '::1', 'yandrizal299@gmail.com', 4, '2021-06-10 11:04:56', 1),
(9, '::1', 'admin1@gmail.com', 3, '2021-06-10 11:05:13', 1),
(10, '::1', 'admin1@gmail.com', 3, '2021-06-10 11:05:14', 1),
(11, '::1', 'yandrizal299@gmail.com', 4, '2021-06-10 11:09:20', 1),
(12, '::1', 'admin1', NULL, '2021-06-10 11:10:00', 0),
(13, '::1', 'admin1', NULL, '2021-06-10 11:10:09', 0),
(14, '::1', 'admin1@gmail.com', 3, '2021-06-10 11:10:18', 1),
(15, '::1', 'yandrizal299@gmail.com', 4, '2021-06-10 11:14:23', 1),
(16, '::1', 'admin1', NULL, '2021-06-10 11:25:51', 0),
(17, '::1', 'admin1@gmail.com', 3, '2021-06-10 11:26:01', 1),
(18, '::1', 'imbul21@gmail.com', 6, '2021-06-10 11:27:39', 1),
(19, '::1', 'admin1@gmail.com', 3, '2021-06-10 11:59:03', 1),
(20, '::1', 'admin1@gmail.com', 3, '2021-06-10 11:59:04', 1),
(21, '::1', 'yandrizal299@gmail.com', 4, '2021-06-10 11:59:36', 1),
(22, '::1', 'admin1@gmail.com', 3, '2021-06-10 12:34:58', 1),
(23, '::1', 'admin1@gmail.com', 3, '2021-06-10 12:34:59', 1),
(24, '::1', 'yandrizal299@gmail.com', 4, '2021-06-10 12:51:10', 1),
(25, '::1', 'admin1', NULL, '2021-06-10 12:54:44', 0),
(26, '::1', 'admin1', NULL, '2021-06-10 12:54:53', 0),
(27, '::1', 'admin1@gmail.com', 3, '2021-06-10 12:55:01', 1),
(28, '::1', 'yandrizal299@gmail.com', 4, '2021-06-10 12:56:34', 1),
(29, '::1', 'yandrizal299@gmail.com', 4, '2021-06-11 02:05:52', 1),
(30, '::1', 'yandrizal299@gmail.com', 4, '2021-06-11 02:05:53', 1),
(31, '::1', 'admin1@gmail.com', 3, '2021-06-11 03:07:49', 1),
(32, '::1', 'admin1@gmail.com', 3, '2021-06-11 04:10:17', 1),
(33, '::1', 'admin1@gmail.com', 3, '2021-06-11 08:02:38', 1),
(34, '::1', 'yandrizal299@gmail.com', 4, '2021-06-11 17:21:54', 1),
(35, '::1', 'admin1@gmail.com', 3, '2021-06-11 18:04:25', 1),
(36, '::1', 'yandrizal775@gmail.com', 7, '2021-06-11 19:20:00', 1),
(37, '::1', 'admin1@gmail.com', 3, '2021-06-11 19:56:51', 1),
(38, '::1', 'yandrizal299@gmail.com', 4, '2021-06-11 21:14:44', 1),
(39, '::1', 'yandrizal299@gmail.com', 4, '2021-06-11 21:26:41', 1),
(40, '::1', 'admin1@gmail.com', 3, '2021-06-11 21:43:00', 1),
(41, '::1', 'yandrizal299@gmail.com', 4, '2021-06-11 21:45:13', 1),
(42, '::1', 'admin1', NULL, '2021-06-11 21:45:31', 0),
(43, '::1', 'admin1@gmail.com', 3, '2021-06-11 21:45:39', 1),
(44, '::1', 'yandrizal299@gmail.com', 4, '2021-06-11 21:47:41', 1),
(45, '::1', 'admin1@gmail.com', 3, '2021-06-11 21:48:58', 1),
(46, '::1', 'admin1@gmail.com', 3, '2021-06-11 22:12:55', 1),
(47, '::1', 'yandrizal299@gmail.com', 4, '2021-06-11 22:17:45', 1),
(48, '::1', 'admin1@gmail.com', 3, '2021-06-11 22:18:31', 1),
(49, '::1', 'yandrizal299@gmail.com', 4, '2021-06-11 22:41:39', 1),
(50, '::1', 'admin1@gmail.com', 3, '2021-06-11 22:43:17', 1),
(51, '::1', 'yandrizal299@gmail.com', 4, '2021-06-11 22:49:16', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_permissions`
--

INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
(1, 'manage-data', 'Mana All Data'),
(2, 'view-upload-data', 'View and Upload Data');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `calon`
--

CREATE TABLE `calon` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama_calon` varchar(255) NOT NULL,
  `alamat_calon` varchar(255) NOT NULL,
  `nama_loker` varchar(255) NOT NULL,
  `jenis_loker` varchar(255) NOT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `sampul` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `calon`
--

INSERT INTO `calon` (`id`, `username`, `nama_calon`, `alamat_calon`, `nama_loker`, `jenis_loker`, `nama_perusahaan`, `sampul`, `created_at`, `updated_at`) VALUES
(2, 'yanddd', 'Yandrizal', 'Bangkinang', 'Manajer Komunikasi', 'Manajer', 'Google', '1623346427_05f1a92c3baabe5bc1e3.jpg', '2021-06-10 12:33:47', '2021-06-10 12:33:47'),
(3, 'yanddd', 'Arif', 'Bangkinang', 'Manajer Komunikasi', 'Manajer', 'Google', 'default2.jpg', '2021-06-10 12:54:27', '2021-06-10 12:54:27'),
(5, 'yanddd', 'Iqbal', 'Panam', 'Manajer Komunikasi', 'Manajer', 'Google', '1623348249_e19adf5adb659b446aea.jpg', '2021-06-10 13:04:09', '2021-06-10 13:04:09'),
(6, 'yandri29', 'Arif', 'Bangkinang', 'Manajer Komunikasi', 'Manajer', 'Google', 'default2.jpg', '2021-06-11 19:24:46', '2021-06-11 19:24:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `loker`
--

CREATE TABLE `loker` (
  `id` int(11) NOT NULL,
  `nama_loker` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `jenis_loker` varchar(255) NOT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `sampul` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `loker`
--

INSERT INTO `loker` (`id`, `nama_loker`, `slug`, `jenis_loker`, `nama_perusahaan`, `sampul`, `created_at`, `updated_at`) VALUES
(1, 'Manajer Komunikasi', 'manajer-komunikasi', 'Manajer', 'Google', 'google.jpg', '2021-06-10 04:43:07', '2021-06-10 04:43:07'),
(3, 'Koki', 'koki', 'Juru Masak', 'KFC', '1623294403_1cb0a39daa23f00f7c73.jpeg', '2021-06-09 22:06:43', '2021-06-09 22:06:43'),
(8, 'Ojek Online', 'ojek-online', 'Ojek', 'GO-Jek', '1623348011_123443c5b938609a4006.jpg', '2021-06-10 13:00:11', '2021-06-10 13:00:59'),
(9, 'hjghjghj', 'hjghjghj', 'hjghj', 'hgjghj', 'default.jpg', '2021-06-11 03:19:50', '2021-06-11 03:19:50'),
(10, 'hjhjh', 'hjhjh', 'jghhgjhjj', 'hgjhj', 'default.jpg', '2021-06-11 03:19:59', '2021-06-11 03:19:59'),
(11, 'hgjhjhg', 'hgjhjhg', 'jhgjhgjh', 'gjghj', 'default.jpg', '2021-06-11 03:20:08', '2021-06-11 03:20:08'),
(12, 'hgfhgg', 'hgfhgg', 'ghgfh', 'ghgfh', 'default.jpg', '2021-06-11 03:20:32', '2021-06-11 03:20:32'),
(13, 'ghfghg', 'ghfghg', 'gh', 'gfhfgh', 'default.jpg', '2021-06-11 03:20:43', '2021-06-11 03:20:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1623314201, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'admin1@gmail.com', 'admin1', '$2y$10$KeiUVZ1Iwr1Nv.SefVj4SOQEiy6kdpKQO7HYgzKyDI/6O9HMmfEKG', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-06-10 10:35:16', '2021-06-10 10:35:16', NULL),
(4, 'yandrizal299@gmail.com', 'yanddd', '$2y$10$MOU7JL9nsqJ5RQh4gzihquQv3bGSQDJ3NyP2iRUuu7VlhbidPGmZ2', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-06-10 10:36:14', '2021-06-10 10:36:14', NULL),
(5, 'arif31@gmail.com', 'Arifmuttakin', '$2y$10$59dIgyObbECvj1xLmGQHdOhOfvsBLyESCluwcAIl/rxCUhzusf4kW', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-06-10 10:59:13', '2021-06-10 10:59:13', NULL),
(6, 'imbul21@gmail.com', 'Njir557', '$2y$10$IR1127DfHg3lOOc37Wl0EOYvEAMDyr7GnaIAKKX1anEWa7p5CGOjq', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-06-10 11:27:02', '2021-06-10 11:27:02', NULL),
(7, 'yandrizal775@gmail.com', 'yandri29', '$2y$10$57ATsYpQ03SD12jq4p.S6O0shHwdsM2NcqTt81tqUy1g5kZtfgRQe', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-06-11 19:19:47', '2021-06-11 19:19:47', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indeks untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indeks untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indeks untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indeks untuk tabel `calon`
--
ALTER TABLE `calon`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `loker`
--
ALTER TABLE `loker`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `calon`
--
ALTER TABLE `calon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `loker`
--
ALTER TABLE `loker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
