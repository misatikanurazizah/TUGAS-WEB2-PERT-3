-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Okt 2024 pada 05.37
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_php_0026`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_users_0026`
--

CREATE TABLE `tb_users_0026` (
  `id` int(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jns_kelamin` enum('Laki-laki','Perempuan','','') NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nohp` char(13) NOT NULL,
  `gambar` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_users_0026`
--

INSERT INTO `tb_users_0026` (`id`, `nama`, `jns_kelamin`, `alamat`, `nohp`, `gambar`) VALUES
(1, 'azizah', 'Perempuan', 'batang', '083195095675', 0x75706c6f6164732f363731343731343364336164612e6a706567),
(2, 'kakgem', 'Perempuan', 'pekalongan', '083195083423', 0x75706c6f6164732f363731343731393037643939312e6a706567);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_users_0026`
--
ALTER TABLE `tb_users_0026`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_users_0026`
--
ALTER TABLE `tb_users_0026`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
