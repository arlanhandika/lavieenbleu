-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2023 at 03:43 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lavieenbleu`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `email`, `password`) VALUES
(1, 'admin', 'admin@admin.com', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id_kontak` int(11) NOT NULL,
  `nama` varchar(69) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pesan` text NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id_kontak`, `nama`, `email`, `pesan`, `waktu`) VALUES
(1, 'Arlan', 'handikaarlan@gmail.com', 'Mantap', '2023-11-26 17:14:49'),
(2, 'Arlan', 'handikaarlan@gmail.com', 'Trusted\r\n', '2023-11-26 17:14:57'),
(3, 'Ujang', 'Ujang@gmail.com', 'Barangnya bagus', '2023-11-26 17:15:11'),
(4, 'Radit', 'radititam@gmail.com', 'Websitenya user-friendly banget', '2023-11-26 17:15:51');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama_produk` varchar(40) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `spek` text NOT NULL,
  `stok` int(255) NOT NULL,
  `harga` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama_produk`, `gambar`, `spek`, `stok`, `harga`) VALUES
(1, 'LENOVO IDEAPAD GAMING 3', 'produk1.jpg', 'LENOVO GAMING 3 15 RTX4050 6GB/ RYZEN 7 7735HS 8GB 512SSD W11+OHS 15.6WQHD IPS 165HZ 100SRGB MOS 2YR+2ADP GRY', 40, 14999000),
(2, 'RAZER BLADE 15', 'produk2.png', 'With the Razer Blade 15, true power will always be wherever you are. Featuring 3th Gen Intel® Core™ i7 processors, NVIDIA® GeForce RTX™ 4060', 2, 26700000),
(3, 'MACBOOK AIR 2020 13 M1', 'produk3.png', 'Apple M1 Chip, 8Core CPU, 7 Core GPU, 16 Core Neural Engine8GB RAM256GB SSDMAGIC KEYBOARD2 thunderbolts / USB-C Ports', 23, 11489000),
(4, 'ASUS M415DAO VIPS351', 'r.jpg', 'Processor : Intel Core i3-1115G4 ProcessorGraphics : Intel UHD GraphicsDisplay : 14.0-inch, FHD (1920 x 1080) 16:9 aspect ratio, LED Backlit, 60Hz refresh rate', 0, 6269000),
(5, 'ASUS VIVOBOOK GO OLED', 's.jpg', 'Processor : Intel® Core™ i5-13500H Processor 2.6 GHz (18MB Cache, up to 4.7 GHz, 12 cores, 16 Threads)\r\nMemory : 16GB DDR4 3200\r\nStorage : 512GB M.2 NVMe', 18, 12849000),
(6, 'ASUS ZENBOOK PRO DUO', 't.jpg', 'Processor Onboard : Intel Core i9-10980HK Processor (16M Cache, up to 5.30 GHz)Memori Standar : 32GB DDR4 on boardHard Disk : 1TB M.2 NVMe PCIe', 16, 46999000),
(7, 'MSI GF63 THIN ', 'z.jpg', 'Processor : Intel Core i5-11400H hexa-core (12 thread) 2,7 GHz TurboBoost 4,5GHz\r\nOS : Windows 11\r\nDisplay : Layar 15,6 inci resolusi full HD 1920 x 1080', 26, 9799000),
(8, 'HP PAVILION PLUS 14', 'x.jpg', 'Processor : AMD Ryzen™ 5 7540U (up to 4.9 GHz max boost clock, 16 MB L3 cache, 6 cores, 12 threads)Graphics : AMD Radeon GraphicsMemory : 16 GB', 46, 12399000),
(9, 'DELL LATITUDE 14 3420', 'w.jpg', 'Screen Size : 15.6 inch HD\r\n- Operating System : Windows 10 Home\r\n- Processor : 10th Generation Intel Core i3 10110\r\n- Memory : 4 GB\r\n- Storage : 1TB HDD', 20, 6249000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(100) NOT NULL,
  `nama_produk` varchar(40) NOT NULL,
  `harga` int(30) NOT NULL,
  `total_produk` int(255) NOT NULL,
  `ongkir` int(20) NOT NULL,
  `total_harga` int(30) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `email` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Verifikasi Pembayaran',
  `no_resi` varchar(40) NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `nama_produk`, `harga`, `total_produk`, `ongkir`, `total_harga`, `tanggal`, `email`, `status`, `no_resi`, `bukti`) VALUES
(98, 'ASUS M415DAO VIPS351', 6269000, 1, 150000, 6419000, '2023-11-14 07:36:15', 'firdhapsari@gmail.com', 'Pesanan Gagal', '', 'photo_612730616862904202.jpg'),
(99, 'HP PAVILION PLUS 14', 12399000, 1, 150000, 12549000, '2023-11-15 07:36:15', 'firdhapsari@gmail.com', 'Sedang Dikemas', '', 'photo_612730616862904202.jpg'),
(102, 'ASUS VIVOBOOK GO OLED', 12849000, 1, 150000, 12999000, '2023-11-16 12:36:15', 'kalisaarchive@gmail.com', 'Pesanan Berhasil', 'LVNBL57379824', 'photo_612730616862904202.jpg'),
(103, 'HP PAVILION PLUS 14', 12399000, 1, 150000, 12549000, '2023-11-17 07:36:15', 'wawa@gmail.com', 'Pesanan Berhasil', 'LVNBL57593913', 'photo_612730616862904202.jpg'),
(106, 'MACBOOK AIR 2020 13 M1', 11489000, 1, 150000, 11639000, '2023-11-17 14:36:15', 'handikaarlann@gmail.com', 'Pesanan Berhasil', 'LVNBL33564253', 'photo_612730616862904202.jpg'),
(115, 'MACBOOK AIR 2020 13 M1', 11489000, 1, 150000, 11639000, '2023-11-20 06:38:34', 'handikaarlan@gmail.com', 'Pesanan Berhasil', 'LVNBL48429932', 'photo_612730616862904202.jpg'),
(117, 'LENOVO IDEAPAD GAMING 3', 14999000, 1, 150000, 15149000, '2023-11-24 06:20:45', 'handikaarlan@gmail.com', 'Pesanan Gagal', '', 'photo_612730616862904202.jpg'),
(121, 'ASUS VIVOBOOK GO OLED', 12849000, 2, 300000, 25998000, '2023-11-24 07:03:54', 'handikaarlan@gmail.com', 'Pesanan Batal', '', 'photo_612730616862904202.jpg'),
(122, 'LENOVO IDEAPAD GAMING 3', 14999000, 1, 150000, 15149000, '2023-11-26 16:06:09', 'handikaarlan@gmail.com', 'Sedang Diantar', 'LVNBL33564355', 'photo_612730616862904202.jpg'),
(123, 'ASUS VIVOBOOK GO OLED', 12849000, 3, 450000, 38997000, '2023-11-26 16:50:04', 'handikaarlan@gmail.com', 'Sedang Dikemas', '', 'photo_612730616862904202.jpg'),
(124, 'HP PAVILION PLUS 14', 12399000, 2, 300000, 25098000, '2023-11-26 16:50:28', 'handikaarlan@gmail.com', 'Verifikasi Pembayaran', '', 'photo_612730616862904202.jpg'),
(125, 'HP PAVILION PLUS 14', 12399000, 1, 150000, 12549000, '2023-11-27 03:37:45', 'handikaarlan@gmail.com', 'Verifikasi Pembayaran', '', 'photo_612730616862904202.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kode_pos` int(10) NOT NULL,
  `alamat` text NOT NULL,
  `umur` int(11) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `provinsi`, `kota`, `kecamatan`, `kode_pos`, `alamat`, `umur`, `no_telp`, `email`, `password`) VALUES
(1, 'Arlan', 'Sumatera Utara', 'Medan', 'Medan Maimun', 20158, 'Jalan Brigjend Katamso', 19, '089613338528', 'handikaarlan@gmail.com', 'a'),
(10, 'Firdha Hapsari', 'Sumatera Utara', 'Deli Serdang', 'Batang Kuis', 20372, 'Batang Kuis', 19, '081268755633', 'firdhapsari@gmail.com', 'hapsari04'),
(13, 'khalishah Khirman', 'Sumatera Utara', 'Deli Serdang', 'Martubung', 20252, 'Martubung', 19, '085835281554', 'kalisaarchive@gmail.com', 'kalisaaaa'),
(14, 'Nazwa Ali', 'Sumatera Utara', 'Pematang Siantar', 'Sunggal', 20351, 'Siantar', 19, '085277698503', 'wawa@gmail.com', 'wacai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_produk` (`nama_produk`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `email` (`email`),
  ADD KEY `email_2` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
