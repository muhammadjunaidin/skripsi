-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 27, 2019 at 05:28 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` enum('pria','wanita') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `nama`, `jenis_kelamin`) VALUES
(1, 'admin', 'admin@test.com', '$2y$10$a8SRu.EigAxpFEJAaY7BVu5ResFnq/MMaopi7H21UwpebI55uBo4a', 'admin', 'pria');

-- --------------------------------------------------------

--
-- Table structure for table `antrian`
--

CREATE TABLE `antrian` (
  `id` int(11) NOT NULL,
  `kode_antrian` varchar(255) NOT NULL,
  `id_permohonan_izin` int(11) NOT NULL,
  `tanggal_pengajuan` date NOT NULL,
  `pesan` text NOT NULL,
  `status_permohonan` enum('diproses','diterima','ditolak','selesai') NOT NULL,
  `status_antrian` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `antrian`
--

INSERT INTO `antrian` (`id`, `kode_antrian`, `id_permohonan_izin`, `tanggal_pengajuan`, `pesan`, `status_permohonan`, `status_antrian`, `user_id`, `created_at`, `deleted_at`) VALUES
(19, '11/3/01/2019', 11, '2019-01-27', 'OK', 'diterima', 1, 1, '2019-01-27 11:01:58', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `antrian_log`
--

CREATE TABLE `antrian_log` (
  `id` int(11) NOT NULL,
  `id_antrian` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `status_detail` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `deleted_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_usaha`
--

CREATE TABLE `jenis_usaha` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `syarat` text NOT NULL,
  `prosedur` text NOT NULL,
  `file_pengesahan` varchar(255) NOT NULL,
  `estimasi_proses` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jenis_usaha`
--

INSERT INTO `jenis_usaha` (`id`, `nama`, `deskripsi`, `syarat`, `prosedur`, `file_pengesahan`, `estimasi_proses`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'Izin Lokasi', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus et leo at lectus pretium porttitor ac vitae mauris. Duis vehicula tellus sed felis lacinia, at malesuada leo ornare. Vestibulum sagittis, lectus vel elementum laoreet, sem orci viverra lectus, nec accumsan risus enim in leo. Proin magna tortor, euismod vel ipsum sit amet, vulputate mollis dui. In ultrices orci lorem, in mattis erat congue eu. Aenean vel elit hendrerit, efficitur sapien a, lobortis lectus. Nulla facilisi. Suspendisse non rutrum mi. Sed sit amet cursus neque. Aenean ac dictum arcu. Vestibulum eget augue et leo sagittis ullamcorper vel a sapien. Nam ullamcorper lobortis fringilla. Nullam molestie erat vel leo pretium vehicula. Vestibulum placerat sollicitudin quam non semper. Nullam dapibus ultricies purus a fringilla. Donec tellus neque, fringilla eu velit sed, varius convallis augue.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus et leo at lectus pretium porttitor ac vitae mauris. Duis vehicula tellus sed felis lacinia, at malesuada leo ornare. Vestibulum sagittis, lectus vel elementum laoreet, sem orci viverra lectus, nec accumsan risus enim in leo. Proin magna tortor, euismod vel ipsum sit amet, vulputate mollis dui. In ultrices orci lorem, in mattis erat congue eu. Aenean vel elit hendrerit, efficitur sapien a, lobortis lectus. Nulla facilisi. Suspendisse non rutrum mi. Sed sit amet cursus neque. Aenean ac dictum arcu. Vestibulum eget augue et leo sagittis ullamcorper vel a sapien. Nam ullamcorper lobortis fringilla. Nullam molestie erat vel leo pretium vehicula. Vestibulum placerat sollicitudin quam non semper. Nullam dapibus ultricies purus a fringilla. Donec tellus neque, fringilla eu velit sed, varius convallis augue.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus et leo at lectus pretium porttitor ac vitae mauris. Duis vehicula tellus sed felis lacinia, at malesuada leo ornare. Vestibulum sagittis, lectus vel elementum laoreet, sem orci viverra lectus, nec accumsan risus enim in leo. Proin magna tortor, euismod vel ipsum sit amet, vulputate mollis dui. In ultrices orci lorem, in mattis erat congue eu. Aenean vel elit hendrerit, efficitur sapien a, lobortis lectus. Nulla facilisi. Suspendisse non rutrum mi. Sed sit amet cursus neque. Aenean ac dictum arcu. Vestibulum eget augue et leo sagittis ullamcorper vel a sapien. Nam ullamcorper lobortis fringilla. Nullam molestie erat vel leo pretium vehicula. Vestibulum placerat sollicitudin quam non semper. Nullam dapibus ultricies purus a fringilla. Donec tellus neque, fringilla eu velit sed, varius convallis augue.</p>', 'IP-dan-IL-1.pdf', '12 Hari', '2019-01-13 00:01:47', '0000-00-00 00:00:00', NULL),
(4, 'Izin pemasangan baliho', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'resume biaya flysurya.pdf', '12 Hari', '2019-01-26 10:01:15', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permohonan_izin`
--

CREATE TABLE `permohonan_izin` (
  `id` int(11) NOT NULL,
  `nomor_izin` varchar(255) NOT NULL,
  `id_izin_usaha` varchar(255) NOT NULL,
  `kode_antrian` varchar(255) NOT NULL,
  `tanggal_survey` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama_usaha` varchar(255) NOT NULL,
  `status_terakhir` varchar(255) NOT NULL,
  `tanggal_berdiri` date NOT NULL,
  `alamat_usaha` text NOT NULL,
  `nama_pemilik` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `pekerjaan` text NOT NULL,
  `alamat` text NOT NULL,
  `no_tlp` varchar(100) NOT NULL,
  `kewarganegaraan` varchar(100) DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `antrian`
--
ALTER TABLE `antrian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_usaha`
--
ALTER TABLE `jenis_usaha`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permohonan_izin`
--
ALTER TABLE `permohonan_izin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `antrian`
--
ALTER TABLE `antrian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `jenis_usaha`
--
ALTER TABLE `jenis_usaha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permohonan_izin`
--
ALTER TABLE `permohonan_izin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
