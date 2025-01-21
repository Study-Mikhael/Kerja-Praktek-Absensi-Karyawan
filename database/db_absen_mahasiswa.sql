-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Feb 2024 pada 03.18
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_absen_mahasiswa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`, `status`) VALUES
(1, 'WAHYU ADMIN', '111', '21232f297a57a5a743894a0e4a801fc3', 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buatqr`
--

CREATE TABLE `buatqr` (
  `id_qrcode` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `no_matakuliah` varchar(10) NOT NULL,
  `jurusan` varchar(20) NOT NULL,
  `ruangan` varchar(10) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `semester` int(4) NOT NULL,
  `pertemuan` int(4) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buatqr`
--

INSERT INTO `buatqr` (`id_qrcode`, `nip`, `no_matakuliah`, `jurusan`, `ruangan`, `kelas`, `semester`, `pertemuan`, `latitude`, `longitude`) VALUES
(65, 101, '9012', 'Teknik Informatika', '4508', 'IF3', 5, 8, '-6.9734656', '107.5698597'),
(29408, 105, '1171', 'Teknik Informatika', 'R5407', 'IF3', 5, 1, '-6.8840384', '107.6187893'),
(35637, 103, '1140', 'Teknik Informatika', 'R5045', 'IF3', 5, 1, '-6.8840409', '107.6187898'),
(67939, 101, '1105', 'Teknik Informatika', 'R5043', 'IF3', 5, 1, '-6.8840378', '107.6187875'),
(68611, 107, '1172', 'Teknik Informatika', 'RDAGO7', 'IF3', 5, 1, '-6.8840366', '107.6187896'),
(71773, 101, '9012', 'Teknik Informatika', 'R4053', 'IF2', 1, 2, '-6.8840385', '107.6187941'),
(72821, 102, '1173', 'Teknik Informatika', 'R5042', 'IF3', 5, 1, '-6.884037', '107.6187899'),
(78176, 106, '1170', 'Teknik Informatika', 'LAB-5', 'IF3', 5, 1, '-6.8840397', '107.6187879'),
(82733, 104, '1177', 'Teknik Informatika', 'R5405', 'IF3', 5, 1, '-6.8840367', '107.6187908'),
(245801, 101, '9011', 'Teknik Informatika', 'R4054', 'IF1', 1, 1, '-6.8840394', '107.618795'),
(12345678, 101, '9011', 'TEKNIK INFORMATIKA', 'R4053', 'IF3', 5, 4, '-6.973462', '107.5698558'),
(29112023, 101, '9012', 'TEKNIK INFORMATIKA', 'R4052', 'IF3', 5, 1, '-6.9734637', '107.5698549'),
(30112023, 101, '9011', 'TEKNIK INFORMATIKA', 'R4054', 'IF3', 5, 1, '-6.9734623', '107.5698574'),
(31112023, 101, '9012', 'TEKNIK INFORMATIKA', 'R4054', 'IF3', 5, 2, '-6.9734631', '107.569859'),
(72819263, 101, '9011', 'TEKNIK INFORMATIKA', 'R5404', 'IF3', 5, 2, '-6.9734594', '107.5698561'),
(2147483647, 101, '9011', 'TEKNIK INFORMATIKA', 'R2009', 'IF3', 5, 5, '-6.9350781', '107.5666077');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `nip` int(11) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `fakultas` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_matakuliah` varchar(5) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`nip`, `nama_dosen`, `prodi`, `fakultas`, `email`, `no_matakuliah`, `password`, `foto`) VALUES
(101, 'Resti Noviyanty, M.Kom', 'TEKNIK INFORMATIKA', 'TEKNIK DAN ILMU KOMPUTER', 'restinoviyanti@gmail.com', '1105', 'f5a7a91022921bea8248c0b7176902ed', ''),
(102, 'Alif Finandhita,S.Kom,M.T', 'TEKNIK INFORMATIKA', 'TEKNIK DAN ILMU KOMPUTER', 'AlifFinandhita@gmail.com', '1173', '099a147c0c6bcd34009896b2cc88633c', ''),
(103, 'Kania Evita Dewi, Spd.,M.Si', 'TEKNIK INFORMATIKA', 'TEKNIK DAN ILMU KOMPUTER', 'kanievitadewi@gmail.com', '1140', '98928d89c33969c35adc6836c8ff7151', ''),
(104, 'Sopian Alvian S.Kom.,M.Kom', 'TEKNIK INFORMATIKA', 'TEKNIK DAN ILMU KOMPUTER', 'sopianalviana@gmail.com', '1177', 'bd99eb0d2f4f613a4812b37049b06991', ''),
(105, 'Maya Hermawati,S.Kom.,M.Kom.', 'TEKNIK INFORMATIKA', 'TEKNIK DAN ILMU KOMPUTER', 'mayahermawati@gmail.com', '1171', 'b2693d9c2124f3ca9547b897794ac6a1', ''),
(106, 'Eko Budi Setiawan, S.Kom., M.T', 'TEKNIK INFORMATIKA', 'TEKNIK DAN ILMU KOMPUTER', 'ekobudi@gmail.com', '1170', 'e5ea9b6d71086dfef3a15f726abcc5bf', ''),
(107, 'Dian Dharmayanti,S.T, M.Kom', 'TEKNIK INFORMATIKA', 'TEKNIK DAN ILMU KOMPUTER', 'diandharmayanti@gmail.com', '1172', 'f97de4a9986d216a6e0fea62b0450da9', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kehadiran`
--

CREATE TABLE `kehadiran` (
  `id_kehadiran` int(11) NOT NULL,
  `id_qrcode` varchar(10) NOT NULL,
  `nim` int(11) NOT NULL,
  `no_matakuliah` varchar(10) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL,
  `entry_time` time NOT NULL,
  `jam_pulang` time NOT NULL,
  `tanggal_absen` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kehadiran`
--

INSERT INTO `kehadiran` (`id_kehadiran`, `id_qrcode`, `nim`, `no_matakuliah`, `latitude`, `longitude`, `entry_time`, `jam_pulang`, `tanggal_absen`) VALUES
(1, '30112023', 10121116, '9011', '-6.9734574', '107.5698587', '00:04:00', '00:05:00', '2023-11-30'),
(2, '72819263', 10121116, '9011', '-6.981555', '107.5623617', '00:35:00', '00:35:00', '2023-11-30'),
(3, '29112023', 10121116, '9012', '-6.9734631', '107.569859', '00:40:00', '00:40:00', '2023-11-30'),
(4, '31112023', 10121116, '9012', '-6.9734554', '107.5698581', '00:42:00', '00:42:00', '2023-11-30'),
(5, '12345678', 10121117, '9011', '-6.973463', '107.569859', '15:07:00', '15:08:00', '2023-12-01'),
(6, '12345678', 10121116, '9011', '-6.9734627', '107.5698581', '16:07:00', '16:07:00', '2023-12-01'),
(7, '30112023', 10121117, '9011', '-6.9734681', '107.5698647', '19:02:00', '19:03:00', '2023-12-13'),
(8, '2147483647', 10121116, '9011', '-6.9350788', '107.5666084', '15:50:00', '15:50:00', '2023-12-29'),
(9, '65', 10121116, '9012', '-6.9734652', '107.5698578', '15:26:00', '15:26:00', '2024-01-19'),
(10, '82733', 10121105, '1177', '-6.8840368', '107.6187894', '13:55:00', '13:56:00', '2024-01-23'),
(11, '82733', 10121116, '1177', '-6.8840449', '107.6187853', '13:58:00', '13:59:00', '2024-01-23'),
(12, '67939', 10121116, '1105', '-6.8840372', '107.6187925', '14:54:00', '14:54:00', '2024-01-23'),
(13, '72821', 10121116, '1173', '-6.8840384', '107.61879', '14:59:00', '14:59:00', '2024-01-23'),
(14, '35637', 10121116, '1140', '-6.8840384', '107.6187905', '15:02:00', '15:02:00', '2024-01-23'),
(15, '29408', 10121116, '1171', '-6.8840373', '107.618789', '15:05:00', '15:05:00', '2024-01-23'),
(16, '78176', 10121116, '1170', '-6.884034', '107.6187904', '15:08:00', '15:08:00', '2024-01-23'),
(17, '68611', 10121116, '1172', '-6.8840382', '107.6187922', '15:10:00', '15:10:00', '2024-01-23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `kelas` varchar(5) NOT NULL,
  `prodi` varchar(100) NOT NULL,
  `fakultas` varchar(70) NOT NULL,
  `semester` int(11) NOT NULL,
  `tahun_masuk` int(11) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `kota` varchar(50) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(225) NOT NULL,
  `id_google` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama_lengkap`, `email`, `kelas`, `prodi`, `fakultas`, `semester`, `tahun_masuk`, `tanggal_lahir`, `alamat`, `kota`, `no_hp`, `password`, `foto`, `id_google`) VALUES
(10121105, 'MUHAMMAD ALIFNURFIRDAUS', 'muhamadalif1123@gmail.com', 'IF3', 'TEKNIK INFORMATIKA', 'TEKNIKDAN ILMU KOMPUTER', 5, 2021, '2002-12-27', 'JL.DIPATIUKUR NO 3', 'BANDUNG', '081296009223', '099a147c0c6bcd34009896b2cc88633c', '', ''),
(10121106, 'MUFTAHUL FAUZAN', 'fauzan1123@gmail.com', 'IF3', 'TEKNIK INFORMATIK', 'TEKNIK DAN ILMU KOMPUTER', 5, 2021, '2001-11-23', 'JL.TUBAGUS ISMAIL NO 7', 'BANDUNG', '085221759934', 'eacaf53cb2b533a68baa765faedf7e59', '', ''),
(10121108, 'WILDAN AZHAR', 'wildanazhar@gmail.com', 'IF3', 'TEKNIK INFORMATIKA', 'TEKNIK DAN ILMU KOMPUTER', 5, 2021, '2002-01-02', 'JL.BUAH BATU NO 4', 'BANDUNG', '081278934562', 'af6b3aa8c3fcd651674359f500814679', '', ''),
(10121112, 'MUHAMMAD AKMAL', 'akmalamroji123@gmail.com', 'IF3', 'TEKNIK INFORMATIKA', 'TEKNIK DAN ILMU KOMPUTER', 5, 2021, '2000-12-27', 'JL.MOHTOHANO 24', 'BANDUNG', '082398967834', '272874d450b7f8381b1174133ac62b40', '', ''),
(10121116, 'WAHYU CANDRA UTAMA', 'wahyucandrautama@gmail.com', 'IF3', 'TEKNIK INFORMATIKA', 'TEKNIK DAN ILMU KOMPUTER', 5, 2021, '2002-11-24', 'MARGAHAYU KENCANA BLOK H3 NO.3', 'BANDUNG', '083838313624', '32c9e71e866ecdbc93e497482aa6779f', '10121116.jpeg', '108189986518025937130'),
(10121117, 'KEMAL ABDUL AZIZ', 'kemalabdulaziz@gmail.com', 'IF3', 'TEKNIK INFORMATIKA', 'TEKNIK DAN ILMU KOMPUTER', 5, 2021, '2003-12-05', 'JALAN CIMAUNG NO 10', 'PANGALENGAN', '08982918281', 'ce76d254d71c00b771b8b2013d0a1485', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matakuliah`
--

CREATE TABLE `matakuliah` (
  `no_matakuliah` varchar(10) NOT NULL,
  `nama_matakuliah` varchar(50) NOT NULL,
  `dosen` varchar(50) NOT NULL,
  `ruangan` varchar(10) NOT NULL,
  `semester` int(3) NOT NULL,
  `nip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `matakuliah`
--

INSERT INTO `matakuliah` (`no_matakuliah`, `nama_matakuliah`, `dosen`, `ruangan`, `semester`, `nip`) VALUES
('1105', 'Rekayasa Perangkat Lunak II', 'Resti Noviyanty, M.Kom', 'R5043', 5, 101),
('1140', 'Pembelajaran Mesin', 'Kania EvitaDewi,S.Pd,. M.Kom', 'R5405', 5, 103),
('1170', 'Penerapan Teknologi Internet', 'Eko Budi Setiawan, S.kom., M.T', 'LAB-5', 5, 106),
('1171', 'Penambangan Data', 'Maya Hermawati, S.Kom., M.Kom.', 'R5407', 5, 105),
('1172', 'Kecerdasan Bisnis dan Visualisasi', 'Dian Dharmayanti, S.T,M.Kom', 'RDAG07', 5, 107),
('1173', 'Pemrograman Basis Data', 'Alif Finandhita,S.Kom,M.T', 'R5042', 5, 102),
('1177', 'Infrastruktur dan Teknologi Big Data', 'Sopian Alviana, S.Kom., M.Kom', 'R5406', 5, 104);

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
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD PRIMARY KEY (`id_kehadiran`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`no_matakuliah`);

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
-- AUTO_INCREMENT untuk tabel `kehadiran`
--
ALTER TABLE `kehadiran`
  MODIFY `id_kehadiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
