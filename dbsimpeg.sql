-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2020 at 07:44 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `app_level` enum('admin','pegawai') NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` enum('A','NA') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `nip`, `app_level`, `password`, `status`) VALUES
(2, '198609262015051002', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'A'),
(3, '198609262015051003', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE `dokumen` (
  `id_dokumen` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama_dokumen` varchar(50) NOT NULL,
  `type_dokumen` varchar(10) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
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
  `id_desa` varchar(20) NOT NULL COMMENT 'api',
  `id_kecamatan` varchar(20) NOT NULL COMMENT 'api',
  `id_kabupaten` varchar(20) NOT NULL COMMENT 'api',
  `id_provinsi` int(11) NOT NULL COMMENT 'api',
  `alamat_lengkap` text NOT NULL,
  `no_telepon` char(15) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_golongan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nip`, `nama`, `gelar_depan`, `gelar_belakang`, `tempat_lahir`, `tanggal_lahir`, `id_jk`, `id_agama`, `foto`, `email`, `id_desa`, `id_kecamatan`, `id_kabupaten`, `id_provinsi`, `alamat_lengkap`, `no_telepon`, `id_jabatan`, `id_golongan`) VALUES
(3, '198609262015051002', 'Yayat Nurhidayat', '', 'S.Kom', 'Majalengka', '1997-04-04', 1, 1, 'pancingan.jpg', 'yayat9744@gmail.com', '3210060004', '3210060', '3210', 32, 'Panyindangan', '087654678876', 1, 14),
(4, '198609262015051003', 'Firmansyah', 'Drs', '', 'Majalengka', '1997-05-04', 1, 1, 'LOGO_FFM.png', 'fajar.anugrah85@yahoo.co.id', '3210180010', '3210180', '3210', 32, 'Sukamulya', '087865765543', 2, 14);

-- --------------------------------------------------------

--
-- Table structure for table `pengangkatan`
--

CREATE TABLE `pengangkatan` (
  `id_pengangkatan` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `tanggal_pengangkatan` date NOT NULL,
  `nomor_sk` varchar(50) NOT NULL,
  `tgl_kenaikan_berkala` date NOT NULL,
  `tgl_kenaikan_pangkat` date NOT NULL,
  `tgl_pensiun` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengangkatan`
--

INSERT INTO `pengangkatan` (`id_pengangkatan`, `nip`, `tanggal_pengangkatan`, `nomor_sk`, `tgl_kenaikan_berkala`, `tgl_kenaikan_pangkat`, `tgl_pensiun`) VALUES
(2, '198609262015051002', '2020-07-31', 'SK2', '2022-07-31', '2022-07-31', '2030-07-31'),
(3, '198609262015051003', '2020-09-30', 'SK3', '2022-09-30', '2022-09-30', '2030-09-30');

-- --------------------------------------------------------

--
-- Table structure for table `ref_agama`
--

CREATE TABLE `ref_agama` (
  `id_agama` int(11) NOT NULL,
  `nama_agama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ref_agama`
--

INSERT INTO `ref_agama` (`id_agama`, `nama_agama`) VALUES
(1, 'Islam'),
(2, 'Protestan'),
(3, 'Katolik'),
(4, 'Hindu'),
(5, 'Buddha'),
(6, 'Khonghucu');

-- --------------------------------------------------------

--
-- Table structure for table `ref_golongan`
--

CREATE TABLE `ref_golongan` (
  `id_golongan` int(11) NOT NULL,
  `nama_golongan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ref_golongan`
--

INSERT INTO `ref_golongan` (`id_golongan`, `nama_golongan`) VALUES
(1, 'I/A'),
(3, 'I/B'),
(4, 'I/C'),
(5, 'I/D'),
(6, 'II/A'),
(7, 'II/B'),
(8, 'II/C'),
(9, 'II/D'),
(10, 'III/A'),
(11, 'III/B'),
(12, 'III/C'),
(13, 'III/D'),
(14, 'IV/A'),
(15, 'IV/B'),
(16, 'IV/C'),
(17, 'IV/D'),
(18, 'IV/E');

-- --------------------------------------------------------

--
-- Table structure for table `ref_jabatan`
--

CREATE TABLE `ref_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ref_jabatan`
--

INSERT INTO `ref_jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'CAMAT'),
(2, 'SEKRETARIS'),
(3, 'KASUBAG UMUM DAN KEPEGAWAIAN'),
(4, 'KASUBAG PEP DAN KEUANGAN'),
(5, 'KASI PEMERINTAHAN DAN PELAYANAN'),
(6, 'KASI KESEJAHTERAAN SOSIAL'),
(7, 'KASI PEMBANGUNAN DAN PEMBERDAYAAN MASYARAKAT'),
(8, 'KASI TRANTIBUM'),
(9, 'PELAKSANA');

-- --------------------------------------------------------

--
-- Table structure for table `ref_jk`
--

CREATE TABLE `ref_jk` (
  `id_jk` int(11) NOT NULL,
  `nama_jk` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ref_jk`
--

INSERT INTO `ref_jk` (`id_jk`, `nama_jk`) VALUES
(1, 'Laki-laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_kenaikan_pangkat`
--

CREATE TABLE `riwayat_kenaikan_pangkat` (
  `id_riwayat` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_golongan` int(11) NOT NULL,
  `tanggal_kenaikan` date NOT NULL,
  `kenaikan_berkala` date NOT NULL,
  `kenaikan_pangkat` date NOT NULL,
  `pensiun` date NOT NULL,
  `no_sk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `riwayat_kenaikan_pangkat`
--

INSERT INTO `riwayat_kenaikan_pangkat` (`id_riwayat`, `nip`, `id_jabatan`, `id_golongan`, `tanggal_kenaikan`, `kenaikan_berkala`, `kenaikan_pangkat`, `pensiun`, `no_sk`) VALUES
(2, '198609262015051002', 1, 13, '2020-07-26', '2022-07-26', '2022-07-26', '2022-07-26', 'SK'),
(4, '198609262015051003', 2, 12, '2020-07-27', '2022-07-27', '2022-07-27', '2022-07-27', 'SK1'),
(6, '198609262015051002', 1, 14, '2020-07-31', '2022-07-31', '2022-07-31', '2030-07-31', 'SK2'),
(7, '198609262015051003', 2, 13, '2020-08-01', '2022-08-01', '2022-08-01', '2035-08-01', 'SK2'),
(8, '198609262015051003', 2, 14, '2020-09-30', '2022-09-30', '2022-09-30', '2030-09-30', 'SK3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id_dokumen`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD UNIQUE KEY `nip` (`nip`);

--
-- Indexes for table `pengangkatan`
--
ALTER TABLE `pengangkatan`
  ADD PRIMARY KEY (`id_pengangkatan`);

--
-- Indexes for table `ref_agama`
--
ALTER TABLE `ref_agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indexes for table `ref_golongan`
--
ALTER TABLE `ref_golongan`
  ADD PRIMARY KEY (`id_golongan`);

--
-- Indexes for table `ref_jabatan`
--
ALTER TABLE `ref_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `ref_jk`
--
ALTER TABLE `ref_jk`
  ADD PRIMARY KEY (`id_jk`);

--
-- Indexes for table `riwayat_kenaikan_pangkat`
--
ALTER TABLE `riwayat_kenaikan_pangkat`
  ADD PRIMARY KEY (`id_riwayat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id_dokumen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengangkatan`
--
ALTER TABLE `pengangkatan`
  MODIFY `id_pengangkatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ref_agama`
--
ALTER TABLE `ref_agama`
  MODIFY `id_agama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ref_golongan`
--
ALTER TABLE `ref_golongan`
  MODIFY `id_golongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `ref_jabatan`
--
ALTER TABLE `ref_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ref_jk`
--
ALTER TABLE `ref_jk`
  MODIFY `id_jk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `riwayat_kenaikan_pangkat`
--
ALTER TABLE `riwayat_kenaikan_pangkat`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
