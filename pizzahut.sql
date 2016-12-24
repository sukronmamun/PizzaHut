-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2016 at 09:48 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizzahut`
--

-- --------------------------------------------------------

--
-- Table structure for table `bagian`
--

CREATE TABLE `bagian` (
  `idBagian` int(10) UNSIGNED NOT NULL,
  `bagianinduk_id` int(11) NOT NULL,
  `nama` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bagian`
--

INSERT INTO `bagian` (`idBagian`, `bagianinduk_id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 1, 'Restourant Manager ( RM )', NULL, NULL),
(2, 1, 'Ass Rest Manager ( ARM )', NULL, NULL),
(3, 1, 'Shift Leader ( SL )', NULL, NULL),
(4, 2, 'Kasir', NULL, NULL),
(5, 2, 'Server', NULL, NULL),
(6, 3, 'Salad', NULL, NULL),
(7, 3, 'Bar', NULL, NULL),
(8, 3, 'Steward', NULL, NULL),
(9, 3, 'Topping', NULL, NULL),
(10, 3, 'Pasta', NULL, NULL),
(11, 4, 'Order Taker ( OT )', NULL, NULL),
(12, 4, 'Delivery Man', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bagianinduk`
--

CREATE TABLE `bagianinduk` (
  `idInduk` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bagianinduk`
--

INSERT INTO `bagianinduk` (`idInduk`, `nama`, `create_at`, `update_at`) VALUES
(1, 'Manager', '2016-12-12 15:17:20', '0000-00-00 00:00:00'),
(2, 'FOH (Front of the house)', '2016-12-12 15:17:20', '0000-00-00 00:00:00'),
(3, 'BOH (Back of the house)', '2016-12-12 15:17:20', '0000-00-00 00:00:00'),
(4, 'Delivery', '2016-12-12 15:17:20', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cuti`
--

CREATE TABLE `cuti` (
  `idCuti` int(10) UNSIGNED NOT NULL,
  `karyawan_id` int(11) NOT NULL,
  `jenisCuti` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8_unicode_ci NOT NULL,
  `lamaCuti` int(11) NOT NULL,
  `mulaiCuti` date NOT NULL,
  `batasCuti` date NOT NULL,
  `manager_id` int(11) NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cuti`
--

INSERT INTO `cuti` (`idCuti`, `karyawan_id`, `jenisCuti`, `keterangan`, `lamaCuti`, `mulaiCuti`, `batasCuti`, `manager_id`, `status`, `created_at`, `updated_at`) VALUES
(4, 201142164, 'Tes Cuti Lagi', 'Masa Bodo', 3, '2016-12-26', '2016-12-29', 2011142164, 'Pandding', '2016-12-24 09:29:01', '2016-12-24 11:16:55');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `idJabatan` int(10) UNSIGNED NOT NULL,
  `nama` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`idJabatan`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Restaurant Manager (RM)', NULL, NULL),
(2, 'Ass Rest Manager (ARM)', NULL, NULL),
(3, 'Shift Leader (SL)', NULL, NULL),
(4, 'Gol 03 (CT)', NULL, NULL),
(5, 'Gol 02 (CT)', NULL, NULL),
(6, 'Gol 01 (CT)', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(10) UNSIGNED NOT NULL,
  `nik` int(11) NOT NULL,
  `idJabatan` int(11) NOT NULL,
  `idBagian` int(11) NOT NULL,
  `namadepan` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `namaBelakang` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jeniskelamin` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `tglLahir` date NOT NULL,
  `agama` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `noTpl` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `joinDate` date NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `munculCuti` date NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `nik`, `idJabatan`, `idBagian`, `namadepan`, `namaBelakang`, `username`, `password`, `alamat`, `jeniskelamin`, `tglLahir`, `agama`, `noTpl`, `joinDate`, `status`, `munculCuti`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 201142164, 4, 6, 'Sukron', 'Mamun', 'SukronMamun', '$2y$10$I2Jr9cJEN63skXBwxRg/juELoNpQTnOxanuSLjuTEU1qzWHKFbnAW', 'Jl pesantren pondok aren', 'L', '1991-12-11', 'Islam', '08816199183', '2016-12-19', 'Tetap', '2016-12-29', '1482137402.jpg', NULL, '2016-12-19 01:50:02', '2016-12-24 11:16:55'),
(2, 2011142167, 3, 6, 'Arifin', 'Muhammad', 'ArifinMuhammad', '$2y$10$qHMFfzDt4CyZlzSJqoZZ6eij3tGmMOQyPzPTQV0LuFYcgVsdSncLG', 'Jl pesantren no 19', 'L', '1997-12-11', 'Islam', '08816188173', '2016-12-12', 'Tetap', '2016-12-12', '1482141138.jpg', NULL, '2016-12-19 02:52:18', '2016-12-19 03:18:43'),
(3, 2011142188, 3, 6, 'Arifina', 'Muhammada', 'ArifinMuhammad', '$2y$10$qHMFfzDt4CyZlzSJqoZZ6eij3tGmMOQyPzPTQV0LuFYcgVsdSncLG', 'Jl pesantren no 19', 'L', '1997-12-11', 'Islam', '08816188173', '2016-12-12', 'Tetap', '2016-12-12', '1482141138.jpg', NULL, '2016-12-19 02:52:18', '2016-12-19 03:18:43'),
(4, 2011142198, 3, 6, 'BArifina', 'BMuhammada', 'ArifinMuhammad', '$2y$10$qHMFfzDt4CyZlzSJqoZZ6eij3tGmMOQyPzPTQV0LuFYcgVsdSncLG', 'Jl pesantren no 19', 'L', '1997-12-11', 'Islam', '08816188173', '2016-12-12', 'Tetap', '2016-12-12', '1482141138.jpg', NULL, '2016-12-19 02:52:18', '2016-12-19 03:18:43'),
(5, 2011143298, 3, 6, 'Arifin', 'Muhammad-S', 'ArifinMuhammad-s', '$2y$10$W4vPixRMapc28EFzDjjLF.5TRTvV/pgysVPPpSvtl7zwoV5TmEFVu', 'Jl pesantren no 18', 'L', '1997-12-18', 'Islam', '08816188173', '2016-12-12', 'Tetap', '2016-12-12', '1482141138.jpg', NULL, '2016-12-19 02:52:18', '2016-12-24 11:27:35'),
(6, 2011233298, 3, 6, 'Arifin', 'Muhammad-SB', 'ArifinMuhammad', '$2y$10$qHMFfzDt4CyZlzSJqoZZ6eij3tGmMOQyPzPTQV0LuFYcgVsdSncLG', 'Jl pesantren no 19', 'L', '1997-12-11', 'Islam', '08816188173', '2016-12-12', 'Tetap', '2016-12-12', '1482141138.jpg', NULL, '2016-12-19 02:52:18', '2016-12-19 03:18:43'),
(7, 2011333298, 3, 2, 'Arifin-s', 'Muhammad-SB', 'ArifinMuhammad', '$2y$10$qHMFfzDt4CyZlzSJqoZZ6eij3tGmMOQyPzPTQV0LuFYcgVsdSncLG', 'Jl pesantren no 19', 'L', '1997-12-11', 'Islam', '08816188173', '2016-12-12', 'Tetap', '2016-12-12', '1482141138.jpg', NULL, '2016-12-19 02:52:18', '2016-12-19 03:18:43'),
(8, 2011345298, 1, 2, 'Arifin-2', 'Muhammad-ss', 'ArifinMuhammad', '$2y$10$qHMFfzDt4CyZlzSJqoZZ6eij3tGmMOQyPzPTQV0LuFYcgVsdSncLG', 'Jl pesantren no 19', 'L', '1997-12-11', 'Islam', '08816188173', '2016-12-12', 'Tetap', '2016-12-12', '1482141138.jpg', NULL, '2016-12-19 02:52:18', '2016-12-19 03:18:43');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `id` int(10) UNSIGNED NOT NULL,
  `nik` int(11) NOT NULL,
  `idBagian` int(11) NOT NULL,
  `namadepan` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `namaBelakang` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jeniskelamin` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `tglLahir` date NOT NULL,
  `agama` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `noTpl` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `joinDate` date NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`id`, `nik`, `idBagian`, `namadepan`, `namaBelakang`, `email`, `password`, `alamat`, `jeniskelamin`, `tglLahir`, `agama`, `noTpl`, `joinDate`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 2011142164, 2, 'manager', 'pizza', 'managerPizza@mail.com', '$2y$10$UwkxkLzQOiP7li86fjb6sewEgaTvTRFQFNrwpIo9bnJs1kpFaZEKK', 'Tangerang', 'L', '1990-02-12', 'islam', '08816199183', '2015-02-01', 'manager.jpg', NULL, '2016-12-18 11:43:46', '2016-12-18 11:43:46');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_12_08_170627_jabatan', 1),
(4, '2016_12_08_170824_bagian', 1),
(5, '2016_12_08_171521_cuti', 1),
(6, '2016_12_08_171938_manager', 1),
(7, '2016_12_11_181804_karyawan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@mail.com', '$2y$10$.a4h/yPpU3.ib9VGaSp5LOI4K2xo4b8uCcpsVlYjZNSWnpWqvoPaq', 'avatar.jpg', 'STTGXEq2brIXWljJV5vCxnzHO5zcZEnG5WBJ1qXJHcsELTXwqKUucibiNqub', '2016-12-12 08:50:41', '2016-12-24 13:05:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bagian`
--
ALTER TABLE `bagian`
  ADD PRIMARY KEY (`idBagian`);

--
-- Indexes for table `bagianinduk`
--
ALTER TABLE `bagianinduk`
  ADD PRIMARY KEY (`idInduk`);

--
-- Indexes for table `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`idCuti`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`idJabatan`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `karyawan_nik_unique` (`nik`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `manager_nik_unique` (`nik`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bagian`
--
ALTER TABLE `bagian`
  MODIFY `idBagian` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `bagianinduk`
--
ALTER TABLE `bagianinduk`
  MODIFY `idInduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `cuti`
--
ALTER TABLE `cuti`
  MODIFY `idCuti` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `idJabatan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
