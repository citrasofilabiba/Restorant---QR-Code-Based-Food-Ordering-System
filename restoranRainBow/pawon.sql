-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jan 2025 pada 06.05
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pawon`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `Username` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `Username`, `Password`) VALUES
(1234, 'admin123', '12345678'),
(1238, 'enakbanget', '$2y$10$PpH1hU7oSAsq4rZ3pinE3.D2S3x0ymLDkTlsDp4UoNpFtXQjsM3we'),
(1239, 'bayusamudra', '$2y$10$iH7zEvjMk1pzCbS8AVwWv.1cXFapDZjOl7TEwGhKBTpi/BXNFAamu'),
(1240, 'wawanmks', '$2y$10$kHL.apPBtIsg1rxcEgRRHuiMP4HNlLdwclaRCwPHgiE5HXXKreM5i');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_penjualan`
--

CREATE TABLE `laporan_penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `Nama_menu` varchar(100) NOT NULL,
  `Jumlah` int(100) NOT NULL,
  `Harga_satuan` int(100) NOT NULL,
  `Total_harga` int(100) NOT NULL,
  `Metode_pembayaran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `laporan_penjualan`
--

INSERT INTO `laporan_penjualan` (`id_penjualan`, `tanggal`, `Nama_menu`, `Jumlah`, `Harga_satuan`, `Total_harga`, `Metode_pembayaran`) VALUES
(1146, '2025-01-06 08:00:00', 'Sosis Bakar Besar', 2, 5000, 10000, 'Cash');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id` int(100) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `harga` varchar(100) NOT NULL,
  `kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id`, `nama`, `harga`, `kategori`) VALUES
(1239, 'Sosis Bakar Kecil', '3000', 'SATE-SATEAN'),
(1240, 'Sosis Bakar Besar', '5000', 'SATE-SATEAN'),
(1241, 'Paket Ayan Goreng', '22000', 'PAKETAN NASI'),
(1242, 'Paket Ayam  Bakar', '22000', 'PAKETAN NASI'),
(1243, 'Paket Ayam Kremes', '25000', 'PAKETAN NASI'),
(1244, 'Paket Nila Goreng', '22000', 'PAKETAN NASI'),
(1245, 'Paket Ayam Kampung', '28000', 'PAKETAN NASI'),
(1246, 'Paket Sop Iga', '30000', 'PAKETAN NASI'),
(1247, 'Paket Empal Sapi', '30000', 'PAKETAN NASI'),
(1248, 'Baso Bakar', '5000', 'SATE-SATEAN'),
(1249, 'Chikuwa Bakar', '5000', 'SATE-SATEAN'),
(1250, 'Otak-otak Singapure', '10000', 'SATE-SATEAN'),
(1251, 'Mie Rebus Special', '10000', 'MENU KUAH'),
(1252, 'MIe Nyemek', '13000', 'MENU KUAH'),
(1253, 'Mie Ayam', '13000', 'MENU KUAH'),
(1254, 'Bacitul', '13000', 'MENU KUAH'),
(1255, 'Seblak Ori', '11000', 'MENU KUAH'),
(1256, 'Seblak Balungan', '16000', 'MENU KUAH'),
(1257, 'Seblak Seafood', '16000', 'MENU KUAH'),
(1258, 'Baso Sapi', '13000', 'MENU KUAH'),
(1259, 'Kentang Goreng', '10000', 'CEMAL CEMIL'),
(1260, 'Otak-otak', '10000', 'CEMAL CEMIL'),
(1261, 'Roti Bakar', '10000', 'CEMAL CEMIL'),
(1262, 'Roti Maryam', '10000', 'CEMAL CEMIL'),
(1263, 'Pisang Bakar', '10000', 'CEMAL CEMIL'),
(1264, 'Pisang Goreng', '10000', 'CEMAL CEMIL'),
(1265, 'Cireng Ayam (4Pcs)', '12000', 'CEMAL CEMIL'),
(1266, 'Risol Mayo (3Pcs)', '12000', 'CEMAL CEMIL'),
(1267, 'Bakwan Jagung (5Pcs)', '10000', 'CEMAL CEMIL'),
(1268, 'Nasi Putih', '5000', 'TAMBAHAN'),
(1269, 'Nasi Liwet', '6000', 'TAMBAHAN'),
(1270, 'Tempe + Tahu', '2000', 'TAMBAHAN'),
(1271, 'Sayur Asem', '6000', 'TAMBAHAN'),
(1272, 'Karedok', '10000', 'TAMBAHAN'),
(1273, 'Es Batu', '2000', 'TAMBAHAN'),
(1274, 'Sambel', '2000', 'TAMBAHAN'),
(1275, 'Pedesaan Sayap (3Pcs)', '15000', 'TAMBAHAN'),
(1276, 'Pepes Ayam', '8000', 'TAMBAHAN'),
(1277, 'Pepes Ikan', '18000', 'TAMBAHAN'),
(1278, 'Pepes Tahu', '5000', 'TAMBAHAN'),
(1279, 'Pepes Peda', '8000', 'TAMBAHAN'),
(1280, 'Rujak Buah', '13000', 'TAMBAHAN'),
(1281, 'Teh Tawar', '2000', 'MINUMAN'),
(1282, 'Teh Manis', '5000', 'MINUMAN'),
(1283, 'Air Mineral Botol', '5000', 'MINUMAN'),
(1284, 'Nutrisari', '6000', 'MINUMAN'),
(1285, 'Kopi Panas', '5000', 'MINUMAN'),
(1286, 'Lemontea', '7000', 'MINUMAN'),
(1287, 'Dancow Coklat', '8000', 'MINUMAN'),
(1288, 'Dancow Putih', '8000', 'MINUMAN'),
(1289, 'Milo', '8000', 'MINUMAN'),
(1290, 'Good Day Freeze', '8000', 'MINUMAN'),
(1291, 'Teh Tarik', '8000', 'MINUMAN'),
(1292, 'Pink Lava', '10000', 'MINUMAN'),
(1293, 'Kelapa Degan (Air Kelapa)', '11000', 'MINUMAN'),
(1294, 'Lemon Water', '8000', 'MINUMAN'),
(1295, 'Matcha', '8000', 'MINUMAN'),
(1298, 'Es Campur Rainbow', '12000', 'MINUMAN'),
(1300, 'teri', '2000', 'MENU KUAH'),
(1301, 'oom', '333', 'SATE-SATEAN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `no` int(11) NOT NULL,
  `Nama_makanan_Minuman` varchar(50) NOT NULL,
  `Harga` int(20) NOT NULL,
  `Porsi` int(10) NOT NULL,
  `Total_harga` int(50) NOT NULL,
  `NO_MEJA` varchar(10) NOT NULL,
  `NAMA` varchar(100) NOT NULL,
  `Metode_pembayaran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`no`, `Nama_makanan_Minuman`, `Harga`, `Porsi`, `Total_harga`, `NO_MEJA`, `NAMA`, `Metode_pembayaran`) VALUES
(1286591, 'Sosis Bakar Besar', 5000, 2, 10000, '1', 'a', 'Cash');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `laporan_penjualan`
--
ALTER TABLE `laporan_penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1241;

--
-- AUTO_INCREMENT untuk tabel `laporan_penjualan`
--
ALTER TABLE `laporan_penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1147;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1302;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1286592;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
