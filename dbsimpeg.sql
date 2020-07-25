-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Jul 2020 pada 17.22
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbsimpeg`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `app_level` enum('admin','pegawai') NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` enum('A','NA') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id_akun`, `nip`, `app_level`, `password`, `status`) VALUES
(1, '198609262015051001', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumen`
--

CREATE TABLE `dokumen` (
  `id_dokumen` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama_dokumen` varchar(50) NOT NULL,
  `type_dokumen` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `gelar_depan` varchar(10) NOT NULL,
  `gelar_belakang` varchar(20) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `id_jk` int(11) NOT NULL COMMENT 'ref_jk',
  `id_agama` int(11) NOT NULL COMMENT 'ref_jk',
  `foto` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `id_desa` int(11) NOT NULL COMMENT 'api',
  `id_kecamatan` int(11) NOT NULL COMMENT 'api',
  `id_kabupaten` int(11) NOT NULL COMMENT 'api',
  `id_provinsi` int(11) NOT NULL COMMENT 'api',
  `alamat_lengkap` text NOT NULL,
  `no_telepon` char(15) NOT NULL,
  `id_jabatan` int(11) NOT NULL COMMENT 'ref jabatan',
  `id_golongan` int(11) NOT NULL COMMENT 'ref golongan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengangkatan`
--

CREATE TABLE `pengangkatan` (
  `id_pengangkatan` int(11) NOT NULL,
  `nip` int(20) NOT NULL,
  `tanggal_pengangkatan` date NOT NULL,
  `masa_aktif_jabatan` date NOT NULL,
  `id_dokumen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_agama`
--

CREATE TABLE `ref_agama` (
  `id_agama` int(11) NOT NULL,
  `nama_agama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_golongan`
--

CREATE TABLE `ref_golongan` (
  `id_golongan` int(11) NOT NULL,
  `nama_golongan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_jabatan`
--

CREATE TABLE `ref_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_jk`
--

CREATE TABLE `ref_jk` (
  `id_jk` int(11) NOT NULL,
  `nama_jk` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_kenaikan_pangkat`
--

CREATE TABLE `riwayat_kenaikan_pangkat` (
  `id_riwayat` int(11) NOT NULL,
  `nip` int(20) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_golongan` int(11) NOT NULL,
  `tanggal_kenaikan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indeks untuk tabel `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id_dokumen`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD UNIQUE KEY `nip` (`nip`);

--
-- Indeks untuk tabel `pengangkatan`
--
ALTER TABLE `pengangkatan`
  ADD PRIMARY KEY (`id_pengangkatan`);

--
-- Indeks untuk tabel `ref_agama`
--
ALTER TABLE `ref_agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indeks untuk tabel `ref_golongan`
--
ALTER TABLE `ref_golongan`
  ADD PRIMARY KEY (`id_golongan`);

--
-- Indeks untuk tabel `ref_jabatan`
--
ALTER TABLE `ref_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `ref_jk`
--
ALTER TABLE `ref_jk`
  ADD PRIMARY KEY (`id_jk`);

--
-- Indeks untuk tabel `riwayat_kenaikan_pangkat`
--
ALTER TABLE `riwayat_kenaikan_pangkat`
  ADD PRIMARY KEY (`id_riwayat`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id_dokumen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengangkatan`
--
ALTER TABLE `pengangkatan`
  MODIFY `id_pengangkatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ref_agama`
--
ALTER TABLE `ref_agama`
  MODIFY `id_agama` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ref_golongan`
--
ALTER TABLE `ref_golongan`
  MODIFY `id_golongan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ref_jabatan`
--
ALTER TABLE `ref_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ref_jk`
--
ALTER TABLE `ref_jk`
  MODIFY `id_jk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `riwayat_kenaikan_pangkat`
--
ALTER TABLE `riwayat_kenaikan_pangkat`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
