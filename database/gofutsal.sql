-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 04 Jan 2017 pada 15.22
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gofutsal`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nama`, `email`, `password`, `foto`) VALUES
('risqi', 'Risqi Ahmad Sultoni', 'ahmadreys@gmail.com', '12', 'dua.jpg'),
('yunita', 'Yunita', 'yunitadwi79@gmail.com', '2', '6.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bayar_cod`
--

CREATE TABLE `bayar_cod` (
  `id_book` varchar(10) NOT NULL,
  `jumlah_bayar` int(10) NOT NULL,
  `bayar` int(10) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bayar_cod`
--

INSERT INTO `bayar_cod` (`id_book`, `jumlah_bayar`, `bayar`, `status`) VALUES
('KB00000002', 100000, 100000, 'Selesai'),
('KB00000003', 200000, 200000, 'Selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bayar_transfer`
--

CREATE TABLE `bayar_transfer` (
  `id_book` varchar(10) NOT NULL,
  `rek_kirim` varchar(30) NOT NULL,
  `rek_tujuan` varchar(30) NOT NULL,
  `status` varchar(50) NOT NULL,
  `bukti_bayar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bayar_transfer`
--

INSERT INTO `bayar_transfer` (`id_book`, `rek_kirim`, `rek_tujuan`, `status`, `bukti_bayar`) VALUES
('KB00000001', '010020931847834', 'bri', 'Selesai', 'auth-providers.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `harga`
--

CREATE TABLE `harga` (
  `id_lap` varchar(5) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `jam` varchar(15) NOT NULL,
  `harga` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lapangan`
--

CREATE TABLE `lapangan` (
  `id_lap` varchar(5) NOT NULL,
  `jenis_rumput` varchar(20) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `harga` int(20) NOT NULL,
  `no_lap` varchar(5) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lapangan`
--

INSERT INTO `lapangan` (`id_lap`, `jenis_rumput`, `foto`, `harga`, `no_lap`, `username`) VALUES
('LP001', 'sintetis', 'IMG_6862.JPG', 65000, '01', 'yunita'),
('LP002', 'sintetis', 'IMG_6864.JPG', 100000, '02', 'yunita'),
('LP003', 'beton/semen', 'IMG_6874.JPG', 50000, '03', 'yunita'),
('LP004', 'beton/semen', 'IMG_6883.jpg', 70000, '04', 'yunita'),
('LP005', 'sintetis', 'IMG_6885.jpg', 50000, '05', 'yunita'),
('LP007', 'sintetis', 'IMG_6916.jpg', 100000, '02', 'vivinia'),
('LP008', 'beton/semen', 'IMG_6910.jpg', 60000, '03', 'vivinia'),
('LP009', 'beton/semen', 'IMG_6907.jpg', 60000, '01', 'vivinia'),
('LP010', 'beton/semen', 'IMG_6912.jpg', 60000, '04', 'vivinia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `username_member` varchar(30) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` varchar(1) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `ver_code` varchar(255) NOT NULL,
  `lupa_pass` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`username_member`, `nama`, `tgl_lahir`, `jk`, `email`, `password`, `foto`, `ver_code`, `lupa_pass`) VALUES
('risqi17', 'Risqi Ahmad Sultoni', '1997-03-12', 'L', 'ahmadreys@gmail.com', '44', '20160723_172837.jpg', '', 'IK71DI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `operator`
--

CREATE TABLE `operator` (
  `username` varchar(50) NOT NULL,
  `nama_opt` varchar(100) NOT NULL,
  `nama_futsal` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `alamat_futsal` varchar(250) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `ver_code` varchar(255) NOT NULL,
  `lupa_code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `operator`
--

INSERT INTO `operator` (`username`, `nama_opt`, `nama_futsal`, `email`, `password`, `alamat`, `alamat_futsal`, `kota`, `foto`, `ver_code`, `lupa_code`) VALUES
('iqbal', 'Iqbal Fathur', 'United Futsal Jember', 'golonganc@gmail.com', '55', 'Jember', 'Jl. Carefour Jember', 'Jember', 'IMG_6947.jpg', '', 'HF5LL0'),
('vivinia', 'vivinia Agustin S', 'Elphasindo Jember', 'viviniaaguss@gmail.com', '22', 'Jl. Mastrip 02 Jember', 'Jl. Mastrip 02 Jember\r\n', 'jember', 'vivin.jpg', '', ''),
('yunita', 'Yunita Dwi P', 'Zona Futsal Jember', 'shoimatulmubarokah@gmail.com', '11', 'Jl. Tidar 23 Jember', 'Jl. Tidar 23 Jember', 'Jember', 'yunita.jpg', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_book` varchar(10) NOT NULL,
  `username_member` varchar(30) NOT NULL,
  `id_lap` varchar(5) NOT NULL,
  `tgl_book` datetime NOT NULL,
  `batas_bayar` datetime NOT NULL,
  `tgl_main` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_berakhir` time NOT NULL,
  `jenis_bayar` varchar(10) NOT NULL,
  `total_harga` int(10) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_book`, `username_member`, `id_lap`, `tgl_book`, `batas_bayar`, `tgl_main`, `jam_mulai`, `jam_berakhir`, `jenis_bayar`, `total_harga`, `status`) VALUES
('KB00000001', 'risqi17', 'LP003', '2017-01-02 15:26:53', '2017-01-02 21:26:53', '2017-01-03', '18:00:00', '20:00:00', 'transfer', 100000, 'Selesai'),
('KB00000002', 'risqi17', 'LP003', '2017-01-02 15:36:52', '2017-01-02 21:36:52', '2017-01-03', '18:00:00', '20:00:00', 'cod', 100000, 'Selesai'),
('KB00000003', 'rijal-86K9', 'LP002', '2017-01-02 15:46:43', '2017-01-02 21:46:43', '2017-01-03', '12:00:00', '14:00:00', 'off cod', 200000, 'Selesai'),
('KB00000004', 'risqi17', 'LP001', '2017-01-02 20:51:41', '2017-01-03 02:51:41', '2017-01-03', '17:00:00', '19:00:00', 'transfer', 130000, 'Dibatalkan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lapangan`
--
ALTER TABLE `lapangan`
  ADD PRIMARY KEY (`id_lap`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`username_member`);

--
-- Indexes for table `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_book`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
