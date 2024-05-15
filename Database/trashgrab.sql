-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2024 at 03:52 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trashgrab`
--

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `id_area` int(11) NOT NULL,
  `kode_area` varchar(100) NOT NULL,
  `lokasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`id_area`, `kode_area`, `lokasi`) VALUES
(1, 'AREA1', 'Mulyorejo Barat, Mulyorejo Timur, Mulyorejo Utaraa'),
(2, 'AREA2', 'Mulyorejo Barat, Mulyorejo Timur, Mulyorejo Utara, Mulyorejo Selatan');

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_sampah` int(11) NOT NULL,
  `qty` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_transaksi`, `id_sampah`, `qty`) VALUES
(7, 2, 2),
(7, 5, 3),
(1, 4, 3),
(2, 5, 2),
(3, 3, 2),
(3, 4, 5),
(10, 4, 2),
(10, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_pickup`
--

CREATE TABLE `jadwal_pickup` (
  `id_jadwal` int(11) NOT NULL,
  `kode_jadwal` varchar(25) NOT NULL,
  `tanggal` date NOT NULL,
  `id_area` int(11) NOT NULL,
  `id_peg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal_pickup`
--

INSERT INTO `jadwal_pickup` (`id_jadwal`, `kode_jadwal`, `tanggal`, `id_area`, `id_peg`) VALUES
(3, '11/4/24/AR1', '2024-04-11', 1, 4),
(5, '20/4/24/AR1', '2024-04-20', 1, 4),
(6, '10/4/24/AR1', '2024-04-10', 1, 3),
(9, '30/04/AR2', '2024-04-30', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `katalog_sampah`
--

CREATE TABLE `katalog_sampah` (
  `id_sampah` int(11) NOT NULL,
  `jenis_sampah` varchar(255) DEFAULT NULL,
  `photo` varchar(150) NOT NULL,
  `harga` int(200) NOT NULL,
  `img` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `katalog_sampah`
--

INSERT INTO `katalog_sampah` (`id_sampah`, `jenis_sampah`, `photo`, `harga`, `img`) VALUES
(2, 'Botol Plastik', '', 4000, ''),
(3, 'Kaleng', '', 5500, ''),
(4, 'Kertas', '', 6000, ''),
(5, 'Botol Kaca', '', 4500, '');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_peg` int(11) NOT NULL,
  `nama_peg` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_peg`, `nama_peg`, `jenis_kelamin`, `no_telp`, `email`, `alamat`) VALUES
(3, 'agung', 'laki-laki', '0987981234', 'agung@gmail.com', 'manyar sabrangan'),
(4, 'Santi', 'perempuan', '098786798765', 'santi@gmail.com', 'surabaya');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `alamat_jemput` text NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_jadwal`, `tgl_transaksi`, `alamat_jemput`, `status`) VALUES
(1, 2, 3, '2024-04-12', 'Jl. Manyar Tegal No.47 RT.006/RW.03, Manyar Sabrangan, Kec. Mulyorejo, Kota SBY, Jawa Timur 60116', 'finished'),
(2, 2, 5, '2024-04-06', 'manyar sabrangan', 'dibatalkan'),
(3, 6, 5, '2024-04-07', 'manyar sabrangan', 'dibatalkan'),
(4, 10, 5, '2024-04-08', 'Jl. Manyar Tegal No.45 RT.006/RW.03, Manyar Sabrangan, Kec. Mulyorejo', 'ongoing'),
(7, 2, 9, '2024-04-26', 'jl kenangan manis 26', 'waiting'),
(8, 2, 9, '2024-04-26', 'tulungagung 35 surabaya', 'finished'),
(9, 6, 9, '2024-04-26', 'jalan kenangan indah 20', 'dibatalkan'),
(10, 6, 9, '2024-04-26', 'jalan yos sudarso 20', 'finished');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `password` varchar(200) NOT NULL,
  `alamat` varchar(250) DEFAULT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `username`, `telp`, `password`, `alamat`, `role`) VALUES
(2, 'bingar', 'bingar@gmail.com', 'bingar', '0897838387', '827ccb0eea8a706c4c34a16891f84e7b', 'surabaya', 'Member'),
(5, 'Krisna', 'krisna@gmail.com', 'Krisna', '089765452345', '827ccb0eea8a706c4c34a16891f84e7b', 'Jl. Raya Karangrejo No.25, Dusun Ngemplak, Sembon, Kec. Karangrejo, Kabupaten Tulungagung, Jawa Timur', 'Admin'),
(6, 'sopo', 'sopo@gmail.com', 'Sopo', '098798786756', '827ccb0eea8a706c4c34a16891f84e7b', NULL, 'Member'),
(7, 'P', 'p@gmail.com', 'P', '098978', '827ccb0eea8a706c4c34a16891f84e7b', 'manyar sabrangan', 'Admin'),
(10, 'Tio', 'tio123@gmail.com', 'Tio', '0897838387', '827ccb0eea8a706c4c34a16891f84e7b', 'surabaya', 'Member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id_area`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_sampah` (`id_sampah`);

--
-- Indexes for table `jadwal_pickup`
--
ALTER TABLE `jadwal_pickup`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD UNIQUE KEY `kode_jadwal` (`kode_jadwal`),
  ADD KEY `id_area` (`id_area`),
  ADD KEY `id_peg` (`id_peg`);

--
-- Indexes for table `katalog_sampah`
--
ALTER TABLE `katalog_sampah`
  ADD PRIMARY KEY (`id_sampah`),
  ADD UNIQUE KEY `jenis_sampah` (`jenis_sampah`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_peg`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_jadwal` (`id_jadwal`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `id_area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jadwal_pickup`
--
ALTER TABLE `jadwal_pickup`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `katalog_sampah`
--
ALTER TABLE `katalog_sampah`
  MODIFY `id_sampah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_peg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`),
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`id_sampah`) REFERENCES `katalog_sampah` (`id_sampah`);

--
-- Constraints for table `jadwal_pickup`
--
ALTER TABLE `jadwal_pickup`
  ADD CONSTRAINT `jadwal_pickup_ibfk_1` FOREIGN KEY (`id_area`) REFERENCES `area` (`id_area`),
  ADD CONSTRAINT `jadwal_pickup_ibfk_2` FOREIGN KEY (`id_peg`) REFERENCES `pegawai` (`id_peg`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal_pickup` (`id_jadwal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_4` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
