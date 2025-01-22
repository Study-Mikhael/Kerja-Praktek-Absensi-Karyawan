-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Jan 2025 pada 05.44
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_absensi_kominfo`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `email`, `password`, `foto`) VALUES
(1, 'Muhammad Akmal Ali Pasha', 'akmal@gmail.com', '272874d450b7f8381b1174133ac62b40', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buatqr`
--

CREATE TABLE `buatqr` (
  `id_qrcode` int(11) NOT NULL,
  `no_pelatihan` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `buatqr`
--

INSERT INTO `buatqr` (`id_qrcode`, `no_pelatihan`, `id_admin`) VALUES
(2147483647, 3, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `nik` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `kota` varchar(30) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `password` varchar(80) NOT NULL,
  `foto` varchar(225) NOT NULL,
  `id_google` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`nik`, `nama_lengkap`, `email`, `tanggal_lahir`, `alamat`, `kota`, `no_hp`, `password`, `foto`, `id_google`) VALUES
(10121110, 'MUHAMMAD AKMAL ALI PASHA', 'ali@gmail.com', '2025-01-24', 'BANDUNG', 'BANDUNG', '09917397193', '272874d450b7f8381b1174133ac62b40', '1737479671_1644056184923.jpg', ''),
(10121115, 'MUHAMMAD ALIF NUR FIRDAUS', 'alif@gmail.com', '2025-01-15', 'CIAMIS', 'CIAMIS', '09887766545', '099a147c0c6bcd34009896b2cc88633c', '1737479514_1644056184799.jpg', ''),
(10121116, 'WAHYU CANDRA UTAMA', 'wahyucandrautama@gmail.com', '2002-11-24', 'Komplek, Jl. Margahayu Kencana Raya No.3 Blok H3, Margahayu Sel., Kec. Margahayu, Kabupaten Bandung, Jawa Barat 40226', 'BANDUNG', '089635633226', '32c9e71e866ecdbc93e497482aa6779f', '10121116.jpeg', ''),
(10121117, 'KEMAL ABDUL AZIZ', 'kemal@gmail.com', '2025-01-01', 'PANGALENGAN', 'BANDUNG', '0897654321', 'ce76d254d71c00b771b8b2013d0a1485', 'uploads/LOGO 1.jpg', ''),
(10121118, 'FIRJATULAH AL KINDI', 'firja@gmail.com', '2025-01-09', 'JATINAGOR', 'BANDUNG', '09876564322', '566a66203d6485473221aaea77369b01', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kehadiran`
--

CREATE TABLE `kehadiran` (
  `id_kehadiran` int(11) NOT NULL,
  `id_qrcode` int(11) NOT NULL,
  `nik` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kehadiran`
--

INSERT INTO `kehadiran` (`id_kehadiran`, `id_qrcode`, `nik`, `tanggal_masuk`) VALUES
(4, 2147483647, 10121116, '2025-01-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelatihan`
--

CREATE TABLE `pelatihan` (
  `no_pelatihan` int(11) NOT NULL,
  `nama_pelatihan` text NOT NULL,
  `tanggal_acara` date NOT NULL,
  `tempat_acara` varchar(100) NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pelatihan`
--

INSERT INTO `pelatihan` (`no_pelatihan`, `nama_pelatihan`, `tanggal_acara`, `tempat_acara`, `id_admin`) VALUES
(1, 'Pelatihan Security Operation Center', '2025-01-01', 'Hotel Horison Bandung', 1),
(2, 'FIRWALL SERVER', '2025-01-30', 'HOTEL TRANS', 1),
(3, 'PELATIHAN CYBER SECURITY', '2025-01-22', 'HOTEL SANTIKA SLIPI BANDUNG', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `buatqr`
--
ALTER TABLE `buatqr`
  ADD PRIMARY KEY (`id_qrcode`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD PRIMARY KEY (`id_kehadiran`);

--
-- Indeks untuk tabel `pelatihan`
--
ALTER TABLE `pelatihan`
  ADD PRIMARY KEY (`no_pelatihan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `buatqr`
--
ALTER TABLE `buatqr`
  MODIFY `id_qrcode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `nik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10121119;

--
-- AUTO_INCREMENT untuk tabel `kehadiran`
--
ALTER TABLE `kehadiran`
  MODIFY `id_kehadiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pelatihan`
--
ALTER TABLE `pelatihan`
  MODIFY `no_pelatihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
