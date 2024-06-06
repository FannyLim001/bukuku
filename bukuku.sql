-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2024 at 10:40 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bukuku`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `judul_buku` varchar(255) NOT NULL,
  `deskripsi_buku` text NOT NULL,
  `jumlah_buku` int(11) NOT NULL,
  `harga_buku` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `tahun_terbit` int(11) NOT NULL,
  `cover` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `deskripsi_buku`, `jumlah_buku`, `harga_buku`, `author`, `tahun_terbit`, `cover`) VALUES
(1, 'Novel Cantik Itu Luka', 'Hidup di era kolonialisme bagi para wanita dianggap sudah setara seperti hidup di neraka. Terutama bagi para wanita berparas cantik yang menjadi incaran tentara penjajah untuk melampiaskan hasrat mereka. Itu lah takdir miris yang dilalui Dewi Ayu, demi menyelamatkan hidupnya sendiri Dewi harus menerima paksaan menjadi pelacur bagi tentara Belanda dan Jepang selama masa kedudukan mereka di Indonesia.', 3, 125000, 'Eka Kurniawan', 2018, '9786020366517_Cantik-Itu-Luka-Hard-Cover---Limited-Edition.jpg'),
(2, 'Laut Bercerita', 'Buku ini terdiri atas dua bagian. Bagian pertama mengambil sudut pandang seorang mahasiswa aktivis bernama Laut, menceritakan bagaimana Laut dan kawan-kawannya menyusun rencana, berpindah-pindah dalam pelarian, hingga tertangkap oleh pasukan rahasia. Sedangkan bagian kedua dikisahkan oleh Asmara, adik Laut. Bagian kedua mewakili perasaan keluarga korban penghilangan paksa, bagaimana pencarian mereka terhadap kerabat mereka yang tak pernah kembali.\r\nBuku ini ditulis sebagai bentuk tribute bagi para aktivis yang diculik, yang kembali, dan yang tak kembali dan keluarga yang terus menerus sampai sekarang mencari-cari jawaban.', 1, 115000, 'Leila S. Chudori', 2017, 'Laut-Bercerita4-1.jpg'),
(3, 'Novel Ronggeng Dukuh Paruk', 'Ronggeng Dukuh Paruk adalah sebuah judul novel dari trilogi novel karya Ahmad Tohari yang merupakan novel pertama dari trilogi tersebut. Dua judul lainnya adalah Lintang Kemukus Dini Hari dan Jantera Bianglala. Novel ini–Ronggeng Dukuh Paruk, membuka ceritanya dengan mendeskripsikan suatu keadaan sebuah perkampungan di daerah Jawa. Memuat cerita kehidupan dan adat kebiasaan masyarakat di Dukuh Paruk, dukuh ini terletak pada sebuah wilayah di Jawa dengan kondisi memprihatinkan: terbelakang dan melarat, serta memiliki penduduk yang memelihara kebodohan dan rasa malas. Namun, pedukuhan ini memiliki suatu kebiasaan yang menjadi ciri khasnya, yaitu ronggeng.', 10, 99000, 'Ahmad Tohari', 2020, '9789792201963_Ronggeng-Dukuh-Paruk.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `jumlah_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `id_buku`, `jumlah_order`) VALUES
(5, 1, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `fk_id_buku` (`id_buku`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `fk_id_buku` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
