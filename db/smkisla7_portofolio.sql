-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 11 Jan 2025 pada 10.25
-- Versi server: 10.6.20-MariaDB-cll-lve
-- Versi PHP: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smkisla7_portofolio`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `about_me`
--

CREATE TABLE `about_me` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `konten` text DEFAULT NULL,
  `aktif` smallint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `blog`
--

CREATE TABLE `blog` (
  `id` int(11) UNSIGNED NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `penulis` varchar(255) DEFAULT NULL,
  `konten` text DEFAULT NULL,
  `gambar_utama` varchar(255) DEFAULT NULL,
  `aktif` smallint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact_me`
--

CREATE TABLE `contact_me` (
  `id` int(11) UNSIGNED NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `konten` text DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `no_hp_wa` varchar(20) DEFAULT NULL,
  `instagram` varchar(100) DEFAULT NULL,
  `tiktok` varchar(100) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `linkedin` varchar(100) DEFAULT NULL,
  `aktif` smallint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `home`
--

CREATE TABLE `home` (
  `id` int(11) UNSIGNED NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `konten` text DEFAULT NULL,
  `tentang_saya` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `aktif` smallint(1) DEFAULT 1,
  `gambar_latar_belakang` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `home`
--

INSERT INTO `home` (`id`, `judul`, `konten`, `tentang_saya`, `created_at`, `updated_at`, `aktif`, `gambar_latar_belakang`) VALUES
(2, 'Halo, Selamat Datang', '<h2>Salam kenal,</h2>\r\n<h2><em>Nama saya Ahmad Husna Ahadi</em></h2>', 'Web Developer;Dosen', '2025-01-03 03:59:11', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `home_sosial_media`
--

CREATE TABLE `home_sosial_media` (
  `id` int(11) UNSIGNED NOT NULL,
  `bx_logo` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `home_sosial_media`
--

INSERT INTO `home_sosial_media` (`id`, `bx_logo`, `link`, `created_at`, `updated_at`) VALUES
(1, 'bxl-instagram', 'https://www.instagram.com/rsqkrnwn?igsh=cnNna2lzb3k4Y2wy', '2025-01-03 02:40:45', NULL),
(2, 'bxl-whatsapp', 'https://wa.me/+6281809208710', '2025-01-03 02:40:45', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `my_services`
--

CREATE TABLE `my_services` (
  `id` int(11) UNSIGNED NOT NULL,
  `bx_logo` varchar(255) DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `konten` text DEFAULT NULL,
  `aktif` smallint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `my_skills`
--

CREATE TABLE `my_skills` (
  `id` int(11) UNSIGNED NOT NULL,
  `tipe_skill` enum('technical','profesional') DEFAULT NULL,
  `nama_skill` varchar(255) DEFAULT NULL,
  `bx_logo` varchar(255) DEFAULT NULL,
  `nilai` int(1) DEFAULT 0,
  `aktif` smallint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengunjung_per_hari`
--

CREATE TABLE `pengunjung_per_hari` (
  `id` int(11) UNSIGNED NOT NULL,
  `tanggal` date DEFAULT NULL,
  `total_pengunjung` int(11) DEFAULT NULL,
  `last_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengunjung_per_hari`
--

INSERT INTO `pengunjung_per_hari` (`id`, `tanggal`, `total_pengunjung`, `last_updated`) VALUES
(27, '2025-01-04', 47, '2025-01-04 21:41:46'),
(74, '2025-01-05', 18, '2025-01-05 22:43:37'),
(92, '2025-01-06', 6, '2025-01-06 17:31:46'),
(98, '2025-01-07', 3, '2025-01-07 11:52:07'),
(101, '2025-01-08', 4, '2025-01-08 14:35:21'),
(105, '2025-01-09', 10, '2025-01-09 23:02:21'),
(115, '2025-01-11', 5, '2025-01-11 10:25:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `phinxlog`
--

CREATE TABLE `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `phinxlog`
--

INSERT INTO `phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20241220072041, 'CreateUser', '2024-12-20 23:47:10', '2024-12-20 23:47:10', 0),
(20250103022048, 'CreateHome', '2025-01-03 02:36:01', '2025-01-03 02:36:01', 0),
(20250103022618, 'CreateHomeSosialMedia', '2025-01-03 02:36:01', '2025-01-03 02:36:01', 0),
(20250103030835, 'AlterHomeFieldAktif', '2025-01-03 03:09:38', '2025-01-03 03:09:38', 0),
(20250103042924, 'CreatePengunjungPerHari', '2025-01-03 04:35:59', '2025-01-03 04:35:59', 0),
(20250105024744, 'AlterHomeFieldGambarLatarBelakang', '2025-01-04 20:06:07', '2025-01-04 20:06:07', 0),
(20250109061816, 'CreateAboutMe', '2025-01-08 23:45:32', '2025-01-08 23:45:32', 0),
(20250109062140, 'CreateMyServices', '2025-01-08 23:45:32', '2025-01-08 23:45:32', 0),
(20250109062300, 'CreateMySkills', '2025-01-08 23:45:32', '2025-01-08 23:45:32', 0),
(20250109062654, 'CreateBlog', '2025-01-08 23:45:32', '2025-01-08 23:45:32', 0),
(20250109062922, 'CreateContactMe', '2025-01-08 23:45:32', '2025-01-08 23:45:32', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `last_login` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`, `last_login`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$7Ajccv77CN4hVGDalq8JN.mZqlak9Wyp308l/nIVwjDnHTxc2xrY2', '2024-12-20 23:47:26', '2025-01-11 03:25:13');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `about_me`
--
ALTER TABLE `about_me`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `contact_me`
--
ALTER TABLE `contact_me`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `home_sosial_media`
--
ALTER TABLE `home_sosial_media`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `my_services`
--
ALTER TABLE `my_services`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `my_skills`
--
ALTER TABLE `my_skills`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengunjung_per_hari`
--
ALTER TABLE `pengunjung_per_hari`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tanggal` (`tanggal`);

--
-- Indeks untuk tabel `phinxlog`
--
ALTER TABLE `phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `about_me`
--
ALTER TABLE `about_me`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `contact_me`
--
ALTER TABLE `contact_me`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `home`
--
ALTER TABLE `home`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `home_sosial_media`
--
ALTER TABLE `home_sosial_media`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `my_services`
--
ALTER TABLE `my_services`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `my_skills`
--
ALTER TABLE `my_skills`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengunjung_per_hari`
--
ALTER TABLE `pengunjung_per_hari`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
