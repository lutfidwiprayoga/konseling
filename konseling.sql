-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Sep 2022 pada 08.00
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `konseling`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bimbingans`
--

CREATE TABLE `bimbingans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `konseling_id` bigint(20) UNSIGNED NOT NULL,
  `jadwal_id` bigint(20) UNSIGNED DEFAULT NULL,
  `catatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bimbingans`
--

INSERT INTO `bimbingans` (`id`, `konseling_id`, `jadwal_id`, `catatan`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Dana Beasiswa Ditabung', '2022-08-17 22:12:25', '2022-08-18 21:03:25'),
(2, 2, 2, NULL, '2022-08-17 22:28:34', '2022-08-17 22:28:34'),
(3, 3, 3, 'Cari Dana Kenakalan', '2022-08-21 22:35:16', '2022-08-21 22:48:56'),
(4, 4, 4, 'Di manajemen Waktu dan Diri nya', '2022-08-21 22:49:22', '2022-08-21 22:54:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwals`
--

CREATE TABLE `jadwals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `konseling_id` bigint(20) UNSIGNED NOT NULL,
  `konselor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `waktu` time DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jadwals`
--

INSERT INTO `jadwals` (`id`, `konseling_id`, `konselor_id`, `tanggal`, `waktu`, `status`, `tempat`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2022-08-22', '10:00:00', 'Terdaftar', NULL, '2022-08-17 22:12:25', '2022-08-18 06:32:17'),
(2, 2, NULL, NULL, NULL, 'Pengajuan', NULL, '2022-08-17 22:28:34', '2022-08-17 22:28:34'),
(3, 3, 2, '2022-08-23', '12:30:00', 'Terdaftar', NULL, '2022-08-21 22:35:16', '2022-08-21 22:36:19'),
(4, 4, 2, '2022-08-26', '14:00:00', 'Terdaftar', NULL, '2022-08-21 22:49:22', '2022-08-21 22:50:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konselings`
--

CREATE TABLE `konselings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `prodi_id` bigint(20) UNSIGNED NOT NULL,
  `kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `topik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_konseling` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `konselings`
--

INSERT INTO `konselings` (`id`, `user_id`, `prodi_id`, `kelas`, `topik`, `status_konseling`, `created_at`, `updated_at`) VALUES
(1, 1, 4, '3B', 'Keuangan', 'Selesai', '2022-08-17 22:12:25', '2022-08-18 21:03:15'),
(2, 1, 4, '3B', 'Organisasi', NULL, '2022-08-17 22:28:34', '2022-08-17 22:28:34'),
(3, 5, 9, '3B', 'Keuangan', 'Selesai', '2022-08-21 22:35:16', '2022-08-21 22:48:56'),
(4, 5, 9, '3B', 'Organisasi', 'Selesai', '2022-08-21 22:49:22', '2022-08-21 22:54:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2022_07_11_111341_create_posts_table', 1),
(15, '2014_10_12_000000_create_users_table', 2),
(16, '2014_10_12_100000_create_password_resets_table', 2),
(17, '2019_08_19_000000_create_failed_jobs_table', 2),
(18, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(19, '2022_07_29_105046_create_jadwals_table', 2),
(20, '2022_08_17_140103_create_konselings_table', 2),
(21, '2022_08_17_140821_create_prodis_table', 2),
(22, '2022_08_17_144133_add_username_column_to_users_table', 2),
(23, '2022_08_18_035442_create_bimbingans_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodis`
--

CREATE TABLE `prodis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `prodis`
--

INSERT INTO `prodis` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'D4 Teknologi Rekayasa Perangkat Lunak', NULL, NULL),
(2, 'D4 Teknologi Pengolahan Hasil Ternak', NULL, NULL),
(3, 'D4 Teknologi Rekayasa Manufaktur', NULL, NULL),
(4, 'D4 Teknologi Rekayasa Komputer', NULL, NULL),
(5, 'D4 Bisnis Digital', NULL, NULL),
(6, 'D4 Manajemen Bisnis Pariwisata', NULL, NULL),
(7, 'D4 Agribisnis', NULL, NULL),
(8, 'D4 Teknik Manufaktur Kapal', NULL, NULL),
(9, 'D3 Teknik Informatika', NULL, NULL),
(10, 'D3 Teknik Sipil', NULL, NULL),
(11, 'D3 Teknik Mesin', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nim`, `name`, `email`, `username`, `no_hp`, `role_user`, `email_verified_at`, `password`, `remember_token`, `foto`, `created_at`, `updated_at`) VALUES
(1, '361955401045', 'Romadhon Priyono', 'romadhon@gmail.com', 'romadhon_pr', '089222912212', 'mahasiswa', '2022-08-17 21:00:40', '$2y$10$7dUoT9Zi9B8wUP0YU4Hh1OUOlWRFGS6FCakI8aVASPhbz50ChCB9W', NULL, 'romadhon_pr.png', '2022-08-17 21:00:40', '2022-08-20 23:21:31'),
(2, NULL, 'Agus Mahardika', 'agusmahardika@gmail.com', NULL, NULL, 'konselor', NULL, '$2y$10$rpC3pKXStf9oI2bwNVOuCek.NrT2bZdvM8In6a4.bStprtQss1bx2', NULL, NULL, '2022-08-18 04:28:18', '2022-08-18 04:28:18'),
(3, NULL, 'Admin', 'admin@gmail.com', 'admin', NULL, 'admin', NULL, '$2y$10$t.QZXbg42TnAcG/atJe0iuX1JK0RG1PIqGXMgotRlPvTsz4ndvEjq', NULL, NULL, '2022-08-18 19:51:11', '2022-08-18 19:51:11'),
(4, '361955401015', 'Gatot Gan', 'gatot@gmail.com', 'gatot_gan', '081221122211', 'mahasiswa', NULL, '$2y$10$qCgqJei2SdpjW/aKPaSQAuOW9AJ16pNcPZtCORSy8ueIgOfV3WBqC', NULL, 'gatot_gan.png', '2022-08-20 03:20:42', '2022-08-20 05:24:50'),
(5, '361855401033', 'Prayoga', 'prayoga@gmail.com', 'prayoga00', '082211232123', 'mahasiswa', NULL, '$2y$10$jvRDZsJFqdxhc31NQx9BxuH4PcA1LphwkeHEnv3gcCcJ.iUf6rppS', NULL, 'prayoga00.png', '2022-08-21 22:33:36', '2022-08-21 22:34:50'),
(6, '362055401088', 'Samsudin', 'samsudin@gmail.com', 'samsudin_gs', NULL, 'mahasiswa', NULL, '$2y$10$M7q0fqACcVO7yLLAjOxeAe9ep7VUMXAfARW0XWFkEUV/oFYkrwwhG', NULL, NULL, '2022-09-03 05:27:54', '2022-09-03 06:01:04');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bimbingans`
--
ALTER TABLE `bimbingans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jadwals`
--
ALTER TABLE `jadwals`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `konselings`
--
ALTER TABLE `konselings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `prodis`
--
ALTER TABLE `prodis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bimbingans`
--
ALTER TABLE `bimbingans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jadwals`
--
ALTER TABLE `jadwals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `konselings`
--
ALTER TABLE `konselings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `prodis`
--
ALTER TABLE `prodis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
