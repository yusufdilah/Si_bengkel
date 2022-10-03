-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Okt 2022 pada 07.06
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.3.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si_bengkel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_booking_service`
--

CREATE TABLE `tbl_booking_service` (
  `id_booking` int(11) NOT NULL,
  `id_customer` int(11) DEFAULT NULL,
  `kategori_service` int(11) DEFAULT NULL,
  `detail_kategori_service` int(11) DEFAULT NULL,
  `tgl_booking` datetime DEFAULT NULL,
  `tgl_service` datetime DEFAULT NULL,
  `created_by` varchar(15) CHARACTER SET utf8 NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(15) CHARACTER SET utf8 NOT NULL,
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id_customer` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `nama_customer` varchar(150) DEFAULT NULL,
  `created_by` varchar(15) CHARACTER SET utf8 NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(15) CHARACTER SET utf8 NOT NULL,
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detail_kategori_service`
--

CREATE TABLE `tbl_detail_kategori_service` (
  `id_detail_kategori` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `detail_kategori_service` varchar(200) DEFAULT NULL,
  `created_by` varchar(15) CHARACTER SET utf8 NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(15) CHARACTER SET utf8 NOT NULL,
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_detail_kategori_service`
--

INSERT INTO `tbl_detail_kategori_service` (`id_detail_kategori`, `id_kategori`, `detail_kategori_service`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(1, 115, 'mc', 'admin', '2022-10-02 00:45:57', '', NULL),
(2, 115, 'ladska', 'admin', '2022-10-02 00:52:29', '', NULL),
(3, 115, 'zxc', 'admin', '2022-10-02 00:53:04', '', NULL),
(4, 115, 'zxc', 'admin', '2022-10-02 00:53:06', '', NULL),
(5, 115, 'zxc', 'admin', '2022-10-02 00:53:06', '', NULL),
(6, 115, 'zxc', 'admin', '2022-10-02 00:53:11', '', NULL),
(7, 115, 'kl', 'admin', '2022-10-02 00:53:43', '', NULL),
(8, 115, 'pdsa', 'admin', '2022-10-02 00:55:34', '', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori_service`
--

CREATE TABLE `tbl_kategori_service` (
  `id_kategori` int(11) NOT NULL,
  `kategori_service` varchar(200) DEFAULT NULL,
  `created_by` varchar(15) CHARACTER SET utf8 NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(15) CHARACTER SET utf8 NOT NULL,
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kategori_service`
--

INSERT INTO `tbl_kategori_service` (`id_kategori`, `kategori_service`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(115, 'Testerxxx', '', '2022-10-01 14:42:55', '', '2022-10-01 15:25:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `username` varchar(126) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `status` int(1) DEFAULT 1 COMMENT '1 = active ; inactive',
  `level` varchar(66) DEFAULT NULL,
  `created_by` varchar(15) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama`, `username`, `password`, `status`, `level`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(10, 'admin mimin', 'admin', '827ccb0eea8a706c4c34a16891f84e7b ', 1, 'admin', NULL, '2022-10-01 06:25:14', NULL, NULL),
(11, 'user ser', 'user', '827ccb0eea8a706c4c34a16891f84e7b ', 1, 'user', NULL, '2022-10-01 06:25:14', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_booking_service`
--
ALTER TABLE `tbl_booking_service`
  ADD PRIMARY KEY (`id_booking`);

--
-- Indeks untuk tabel `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indeks untuk tabel `tbl_detail_kategori_service`
--
ALTER TABLE `tbl_detail_kategori_service`
  ADD PRIMARY KEY (`id_detail_kategori`);

--
-- Indeks untuk tabel `tbl_kategori_service`
--
ALTER TABLE `tbl_kategori_service`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_booking_service`
--
ALTER TABLE `tbl_booking_service`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT untuk tabel `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT untuk tabel `tbl_detail_kategori_service`
--
ALTER TABLE `tbl_detail_kategori_service`
  MODIFY `id_detail_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori_service`
--
ALTER TABLE `tbl_kategori_service`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
