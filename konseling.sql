-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2022 at 06:31 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

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
-- Table structure for table `bimbingans`
--

CREATE TABLE `bimbingans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `konseling_id` bigint(20) UNSIGNED NOT NULL,
  `jadwal_id` bigint(20) UNSIGNED NOT NULL,
  `catatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bimbingans`
--

INSERT INTO `bimbingans` (`id`, `konseling_id`, `jadwal_id`, `catatan`, `created_at`, `updated_at`) VALUES
(1, 2, 1, NULL, '2022-11-05 02:53:40', '2022-11-05 03:16:46'),
(2, 3, 3, NULL, '2022-11-05 03:03:22', '2022-11-05 03:03:22'),
(3, 4, 4, 'Langsung Eksekusi Saja Orangnya', '2022-11-05 04:11:17', '2022-11-05 04:19:38');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `jadwals`
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
-- Dumping data for table `jadwals`
--

INSERT INTO `jadwals` (`id`, `konseling_id`, `konselor_id`, `tanggal`, `waktu`, `status`, `tempat`, `created_at`, `updated_at`) VALUES
(1, 1, 22, '2022-11-30', '10:15:00', 'Terdaftar', 'Ruang Dosen', '2022-11-05 02:52:48', '2022-11-05 03:16:46'),
(2, 2, NULL, NULL, NULL, 'Pengajuan', NULL, '2022-11-05 02:53:40', '2022-11-05 02:53:40'),
(3, 3, NULL, NULL, NULL, 'Pengajuan', NULL, '2022-11-05 03:03:22', '2022-11-05 03:03:22'),
(4, 4, 22, '2022-11-08', '09:00:00', 'Terdaftar', 'Cafe Sianida', '2022-11-05 04:11:17', '2022-11-05 04:13:42');

-- --------------------------------------------------------

--
-- Table structure for table `konselings`
--

CREATE TABLE `konselings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status_konseling` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `topik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `konselings`
--

INSERT INTO `konselings` (`id`, `user_id`, `status_konseling`, `topik`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 5, 'Belum Selesai', 'Keuangan', 'Kurang Bayar UKT', '2022-11-05 02:52:48', '2022-11-05 03:15:31'),
(2, 5, NULL, 'Keuangan', 'Kurang Bayar UKT', '2022-11-05 02:53:40', '2022-11-05 02:53:40'),
(3, 5, NULL, 'Organisasi', 'Waktu Flexibel', '2022-11-05 03:03:22', '2022-11-05 03:03:22'),
(4, 6, 'Selesai', 'Pertemanan', 'Masalah Utang Piutang', '2022-11-05 04:11:17', '2022-11-05 04:19:38');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswas`
--

CREATE TABLE `mahasiswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kelas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prodi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mahasiswas`
--

INSERT INTO `mahasiswas` (`id`, `user_id`, `nim`, `nama`, `no_hp`, `kelas`, `prodi`, `created_at`, `updated_at`) VALUES
(1, 2, '361955401001', 'Ahmad Hisyam', NULL, NULL, NULL, '2022-11-04 01:30:53', '2022-11-04 01:30:53'),
(2, 3, '361955401002', 'Muhammad Ishaq', NULL, NULL, NULL, '2022-11-04 01:30:53', '2022-11-04 01:30:53'),
(3, 4, '361955401003', 'Muhammad Baihaqi', '089822124422', '3F', 'D3 Teknik Sipil', '2022-11-04 01:30:53', '2022-11-05 22:30:34'),
(4, 5, '361955401004', 'Muhammad Sumbul', '082221233342', '3B', 'D4 Teknologi Rekayasa Perangkat Lunak', '2022-11-04 01:30:53', '2022-11-05 03:13:34'),
(5, 6, '361955401005', 'Ahmad Ustman Kannabawi', '081221312244', '4C', 'D4 Agribisnis', '2022-11-04 01:30:53', '2022-11-05 04:10:51'),
(6, 7, '361955401006', 'Khalid Khasmiri', NULL, NULL, NULL, '2022-11-04 01:30:53', '2022-11-04 01:30:53'),
(7, 8, '361955401007', 'Fatimah Zahra', NULL, NULL, NULL, '2022-11-04 01:30:54', '2022-11-04 01:30:54'),
(8, 9, '361955401008', 'Angkara Zaenuddin', NULL, NULL, NULL, '2022-11-04 01:30:54', '2022-11-04 01:30:54'),
(9, 10, '361955401009', 'Lukman Dinata', NULL, NULL, NULL, '2022-11-04 01:30:54', '2022-11-04 01:30:54'),
(10, 11, '361955401010', 'Dwi Hariyadi', '082133212244', '3G', 'D4 Bisnis Digital', '2022-11-04 01:30:54', '2022-11-05 02:17:18'),
(11, 12, '361955401011', 'Sulaiman Zainuddin', NULL, NULL, NULL, '2022-11-04 01:30:54', '2022-11-04 01:30:54'),
(12, 13, '361955401012', 'Tarim Subhan', NULL, NULL, NULL, '2022-11-04 01:30:54', '2022-11-04 01:30:54'),
(13, 14, '361955401013', 'Umar Zaelanni', NULL, NULL, NULL, '2022-11-04 01:30:54', '2022-11-04 01:30:54'),
(14, 15, '361955401014', 'Jakfar Alaydrus', NULL, NULL, NULL, '2022-11-04 01:30:54', '2022-11-04 01:30:54'),
(15, 16, '361955401015', 'Ali Zaenal Abidin', NULL, NULL, NULL, '2022-11-04 01:30:54', '2022-11-04 01:30:54'),
(16, 17, '361955401016', 'Sulthon Anbiya', NULL, NULL, NULL, '2022-11-04 01:30:54', '2022-11-04 01:30:54'),
(17, 18, '361955401017', 'Jufri Assegaff', NULL, NULL, NULL, '2022-11-04 01:30:54', '2022-11-04 01:30:54'),
(18, 19, '361955401018', 'Ghofar Al Habsyi', NULL, NULL, NULL, '2022-11-04 01:30:54', '2022-11-04 01:30:54'),
(19, 20, '361955401019', 'Darwin Al Furqon', NULL, NULL, NULL, '2022-11-04 01:30:55', '2022-11-04 01:30:55'),
(20, 21, '361955401020', 'Nashwa Insyirah', NULL, NULL, NULL, '2022-11-04 01:30:55', '2022-11-04 01:30:55'),
(21, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-05 01:21:55', '2022-11-05 01:21:55'),
(22, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-05 01:23:18', '2022-11-05 01:23:18'),
(23, NULL, NULL, NULL, NULL, '3G', 'D4 Bisnis Digital', '2022-11-05 02:15:27', '2022-11-05 02:15:27');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_07_29_105046_create_jadwals_table', 1),
(6, '2022_08_17_140103_create_konselings_table', 1),
(7, '2022_08_17_140821_create_prodis_table', 1),
(8, '2022_08_17_144133_add_username_column_to_users_table', 1),
(9, '2022_08_18_035442_create_bimbingans_table', 1),
(10, '2022_11_04_060430_create_mahasiswas_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `prodis`
--

CREATE TABLE `prodis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prodis`
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nim`, `name`, `email`, `username`, `role_user`, `email_verified_at`, `password`, `foto`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Admin', 'admin@gmail.com', 'admin', 'admin', '2022-11-04 00:04:28', '$2y$10$LcRkDTxonfiAP.exhLEIceduQsTsalS.2JPbPzhXBQ4u64VcbffVC', 'admin.jpg', NULL, '2022-11-04 00:04:28', '2022-11-05 00:28:21'),
(2, '361955401001', 'Ahmad Hisyam', NULL, NULL, 'mahasiswa', NULL, '$2y$10$5cDWNxVbJ6iqHl7.hQUokuo1jHLnNgsXEwUsdQ3corBAYJJ0jWhqy', NULL, NULL, '2022-11-04 01:30:53', '2022-11-04 01:30:53'),
(3, '361955401002', 'Muhammad Ishaq', NULL, NULL, 'mahasiswa', NULL, '$2y$10$TWJILks83M9r2U16b1iZteRhGQ7zbpyYsfGr5ojX70LtPI/SG5KTu', NULL, NULL, '2022-11-04 01:30:53', '2022-11-04 01:30:53'),
(4, '361955401003', 'Muhammad Baihaqi', 'mbaihaqi@gmail.com', NULL, 'mahasiswa', NULL, '$2y$10$ulXetU43L6fccZV/VE10uuh5NrG2lSUBqkDaKAfnFKjaDw2hbueX6', '.png', NULL, '2022-11-04 01:30:53', '2022-11-05 22:30:34'),
(5, '361955401004', 'Muhammad Sumbul', 'muhsumbul@gmail.com', 'muh_sumbul', 'mahasiswa', '2022-11-05 06:59:29', '$2y$10$pLqPzdb.tDPFuVkR6f9hRePDJtmMvJDdEFYovSE717oO9/fXKGVwe', 'muh_sumbul.png', NULL, '2022-11-04 01:30:53', '2022-11-05 03:06:31'),
(6, '361955401005', 'Ahmad Ustman Kannabawi', 'ustman@gmail.com', 'ahm_ustman', 'mahasiswa', NULL, '$2y$10$5blSg5RGaJXCwaR9h4Nqx.ff4/gWikCpvC4R2h5RYI54Bu53OrR4e', '.png', NULL, '2022-11-04 01:30:53', '2022-11-05 04:10:51'),
(7, '361955401006', 'Khalid Khasmiri', NULL, NULL, 'mahasiswa', NULL, '$2y$10$nDqum8eJBxL/8enLXs/td.hzPQUX6ZMrRS81W1RxHEBGLWxOIQWIi', NULL, NULL, '2022-11-04 01:30:53', '2022-11-04 01:30:53'),
(8, '361955401007', 'Fatimah Zahra', NULL, NULL, 'mahasiswa', NULL, '$2y$10$3Ic/te3nQ1heawt6nejh8eOGk5PT.cuZKpkzQTNRY4SyVjHxlosH6', NULL, NULL, '2022-11-04 01:30:54', '2022-11-04 01:30:54'),
(9, '361955401008', 'Angkara Zaenuddin', NULL, NULL, 'mahasiswa', NULL, '$2y$10$X4yIGMy0FJJylv.ek3ekmeQ82oiCmxg199ZmQQp91MCLOiy6tg9gy', NULL, NULL, '2022-11-04 01:30:54', '2022-11-04 01:30:54'),
(10, '361955401009', 'Lukman Dinata', NULL, NULL, 'mahasiswa', NULL, '$2y$10$kc82qH0Xw5NykKB0JO8IQ.X7C8gV7oj856.8adLTc6hffAMSw1hDW', NULL, NULL, '2022-11-04 01:30:54', '2022-11-04 01:30:54'),
(11, '361955401010', 'Dwi Hariyadi', 'dwihariyadi@gmail.com', 'dwihariyadi', 'mahasiswa', NULL, '$2y$10$3YnCgb9dBx64pgRKuq4rj.5vQVEDlp2xI0R8NRPTa2jmHBJ9OOX4G', 'Dwi Hariyadi.png', NULL, '2022-11-04 01:30:54', '2022-11-05 02:15:27'),
(12, '361955401011', 'Sulaiman Zainuddin', NULL, NULL, 'mahasiswa', NULL, '$2y$10$BKq4vru6pKP1M70UdSam9ed3DhjbjAOlgshEh2wxiPrwTlUlQpDVW', NULL, NULL, '2022-11-04 01:30:54', '2022-11-04 01:30:54'),
(13, '361955401012', 'Tarim Subhan', NULL, NULL, 'mahasiswa', NULL, '$2y$10$ebKqbwKlj6Mx73XHunJ9LuZKG7zHN/n.rOcp8mCSo3Kbc2XR2Njpe', NULL, NULL, '2022-11-04 01:30:54', '2022-11-04 01:30:54'),
(14, '361955401013', 'Umar Zaelanni', NULL, NULL, 'mahasiswa', NULL, '$2y$10$BfWFVLAZ07fhJ6fsEqie0Oq5JFJJjlzxf84Rk5vR5ogSyV3bpKLQW', NULL, NULL, '2022-11-04 01:30:54', '2022-11-04 01:30:54'),
(15, '361955401014', 'Jakfar Alaydrus', NULL, NULL, 'mahasiswa', NULL, '$2y$10$kvwO.iXp3zS0uqEWpRikn.YfpxANG6Qf9Th8aOXIb50VUf7fOdCXG', NULL, NULL, '2022-11-04 01:30:54', '2022-11-04 01:30:54'),
(16, '361955401015', 'Ali Zaenal Abidin', NULL, NULL, 'mahasiswa', NULL, '$2y$10$F3U9NI6rqOJUVvgmjbt1BOhdcbCsGR4Clf8sWNLumCnCm5IP.HBiq', NULL, NULL, '2022-11-04 01:30:54', '2022-11-04 01:30:54'),
(17, '361955401016', 'Sulthon Anbiya', NULL, NULL, 'mahasiswa', NULL, '$2y$10$5PLS22/VKBaTqmoAWr44guK223pfQ3vkWkYkk0Krw4Tf6neEDnTjq', NULL, NULL, '2022-11-04 01:30:54', '2022-11-04 01:30:54'),
(18, '361955401017', 'Jufri Assegaff', NULL, NULL, 'mahasiswa', NULL, '$2y$10$i2jkHTgr4uIOeTkVR8CyoejjESIiJ.3IWq6E1Cet.UB1ONaAeVCfK', NULL, NULL, '2022-11-04 01:30:54', '2022-11-04 01:30:54'),
(19, '361955401018', 'Ghofar Al Habsyi', NULL, NULL, 'mahasiswa', NULL, '$2y$10$q41QC73/PBCT9g3/6rMtneWo.DRMoMQaoL88FfcQjVkff6qyHmNrK', NULL, NULL, '2022-11-04 01:30:54', '2022-11-04 01:30:54'),
(20, '361955401019', 'Darwin Al Furqon', NULL, NULL, 'mahasiswa', NULL, '$2y$10$85EMDqJyHCSgPERt6uzMhu8bRW0M8UhyirP62Vun/n5OPTt0j.1dW', NULL, NULL, '2022-11-04 01:30:55', '2022-11-04 01:30:55'),
(21, '361955401020', 'Nashwa Insyirah', NULL, NULL, 'mahasiswa', NULL, '$2y$10$yziTNPdpQR0jm9z7ff1Ghu30.WxLsS3OEnCwNF8/93y4oUawfn7.e', NULL, NULL, '2022-11-04 01:30:55', '2022-11-04 01:30:55'),
(22, NULL, 'Gufron', 'gufron@gmail.com', 'gufron_konselor', 'konselor', '2022-11-04 08:37:20', '$2y$10$iE4IqAl0OrJGyArCsM16quFsfOrMnMGW.jBK8YGEYCDrWx2Wq1Pv6', 'gufron_konselor.png', NULL, '2022-11-04 01:36:50', '2022-11-05 00:47:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bimbingans`
--
ALTER TABLE `bimbingans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jadwals`
--
ALTER TABLE `jadwals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `konselings`
--
ALTER TABLE `konselings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswas`
--
ALTER TABLE `mahasiswas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `prodis`
--
ALTER TABLE `prodis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bimbingans`
--
ALTER TABLE `bimbingans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwals`
--
ALTER TABLE `jadwals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `konselings`
--
ALTER TABLE `konselings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mahasiswas`
--
ALTER TABLE `mahasiswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prodis`
--
ALTER TABLE `prodis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
