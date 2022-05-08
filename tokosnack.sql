-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jan 2021 pada 06.10
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokosnack`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(30) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `password`, `level`, `foto`) VALUES
('bagus', 'ninja123asu', 'admin', ''),
('koko', 'ninja123asu', '', ''),
('smk4malang', '123', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(100) NOT NULL,
  `nama_kategori` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'pedas'),
(2, 'manis\r\n'),
(3, 'gurih'),
(4, 'sehat\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keluh_kesah`
--

CREATE TABLE `keluh_kesah` (
  `id_keluh` int(100) NOT NULL,
  `nama` varchar(180) NOT NULL,
  `gmail` varchar(200) NOT NULL,
  `keluh` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keluh_kesah`
--

INSERT INTO `keluh_kesah` (`id_keluh`, `nama`, `gmail`, `keluh`) VALUES
(1, 'bagus', 'bagushantu369@yahoo.com', '0'),
(2, 'bagus', '087867606810', '0'),
(3, 'bagus', '087867606810', 'asdadsad'),
(4, 'Bagus Romadhon', 'bagusromadhon007@gmail.com', 'web sangat membantu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(89) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `password_pelanggan` varchar(100) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `telepon_pelanggan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`) VALUES
(1, 'bagushantu369@yahoo.com', '123123123', 'bagushantu', '089289281123'),
(2, 'bagusromadhon007@gmail.com', '097989898987988', 'baguskb7', '0877897898797'),
(3, 'kiki111@gmail.com', '123', 'kiki', '0812837123'),
(8099898, 'bagushanru@gmail,com', 'ninja123asu', 'bagus', '08928989'),
(8099899, 'pelanggan@gmail.com', 'pelanggan', 'pelanggan', '07878796876'),
(8099900, 'sonicbo2t111@gmail.com', 'asdsad', 'Bagus Romadhonsdsd', '08123932813212323'),
(8099901, 'bagus@gmail.com', '123', '  bagus romadhon', '0829382981');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(30) NOT NULL,
  `id_pembelian` int(30) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `bank` varchar(200) NOT NULL,
  `jumlah` varchar(200) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(4, 55, 'bagus', 'bri', '123123123', '2020-12-23', '20201223130335IMG_20'),
(5, 4, 'sonicbot', 'bri', '100000', '2020-12-27', 'brownis.jpg'),
(6, 56, 'bagus', 'bri', '25000', '2020-12-27', '20201227091423IMG_20181013_132744.jpg'),
(7, 62, 'sonic', 'bri', '115000', '2020-12-27', '20201227105130burger.jpg'),
(8, 64, 'pelanggan', 'bri', '115000', '2020-12-27', '20201227143151pentol.jpg'),
(9, 63, 'bagus', 'bri', '25000', '2020-12-29', '20201229191822eurika-chese.jpg'),
(10, 70, 'bagus', 'bri', '170000', '2020-12-30', '20201230045339eurika-chese.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_ongkir` int(30) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `nama_kota` varchar(200) NOT NULL,
  `tarif` int(60) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `status_pembelian` varchar(100) NOT NULL DEFAULT 'pending',
  `resi_pengiriman` varchar(100) NOT NULL,
  `provinsi` varchar(200) NOT NULL,
  `tipe` varchar(200) NOT NULL,
  `distrik` varchar(200) NOT NULL,
  `kodepos` varchar(200) NOT NULL,
  `ekspedisi` varchar(200) NOT NULL,
  `paket` varchar(200) NOT NULL,
  `ongkir` varchar(200) NOT NULL,
  `estimasi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `id_ongkir`, `tanggal_pembelian`, `total_pembelian`, `nama_kota`, `tarif`, `alamat_pengiriman`, `status_pembelian`, `resi_pengiriman`, `provinsi`, `tipe`, `distrik`, `kodepos`, `ekspedisi`, `paket`, `ongkir`, `estimasi`) VALUES
(62, 3, 2, '2020-12-27', 115000, 'jakarta', 10000, 'jakarta(53434)\r\n', 'barang dikirim', '18239213', '', '', '', '', '', '', '', ''),
(63, 3, 1, '2020-12-27', 25000, 'Demak', 10000, 'demak(5534)', 'menunggu di validasi ', '', '', '', '', '', '', '', '', ''),
(64, 8099899, 1, '2020-12-27', 115000, 'Demak', 10000, 'jakarta(54540)', 'menunggu di validasi ', '', '', '', '', '', '', '', '', ''),
(65, 8099899, 1, '2020-12-28', 20010000, 'Demak', 10000, 'jakarta (55443)', 'pending', '', '', '', '', '', '', '', '', ''),
(66, 3, 1, '2020-12-29', 25000, 'Demak', 10000, 'demak(5543)', 'pending', '', '', '', '', '', '', '', '', ''),
(67, 3, 1, '2020-12-29', 25000, 'Demak', 10000, 'sadsad(40550)', 'pending', '', '', '', '', '', '', '', '', ''),
(68, 3, 1, '2020-12-29', 130000, 'Demak', 10000, 'jln supriadi no 1 c (4420)', 'pending', '', '', '', '', '', '', '', '', ''),
(69, 3, 0, '2020-12-29', 10000000, '', 0, '', 'pending', '', '', '', '', '', '', '', '', ''),
(70, 3, 1, '2020-12-30', 170000, 'Demak', 10000, 'demak jln demak (5534)', 'menunggu di validasi ', '', '', '', '', '', '', '', '', ''),
(71, 8099899, 0, '2021-01-03', 15000, '', 0, '', 'pending', '', '', '', '', '', '', '', '', ''),
(72, 8099901, 0, '2021-01-05', 105000, '', 0, '', 'pending', '', 'Jawa Tengah', 'Kabupaten', 'Magelang', '56519', 'pos', 'Paket Kilat Khusus', '22000', '2-3 HARI'),
(73, 8099901, 0, '2021-01-05', 90000, '', 0, 'magelang jln magelang', 'pending', '', 'Jawa Tengah', 'Kabupaten', 'Kudus', '59311', 'pos', 'Paket Kilat Khusus', '13000', '2-3 HARI'),
(74, 8099901, 0, '2021-01-05', 130000, '', 0, 'jln magelang ', 'pending', '', 'Jawa Tengah', 'Kabupaten', 'Brebes', '52212', 'tiki', 'ECO', '36000', '4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `harga` int(100) NOT NULL,
  `berat` int(100) NOT NULL,
  `subberat` int(100) NOT NULL,
  `subharga` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama`, `harga`, `berat`, `subberat`, `subharga`) VALUES
(56, 62, 30, 1, 'snack', 90000, 900, 900, 90000),
(57, 62, 31, 1, 'burger', 15000, 900, 900, 15000),
(58, 63, 31, 1, 'burger', 15000, 900, 900, 15000),
(59, 64, 31, 1, 'burger', 15000, 900, 900, 15000),
(60, 64, 30, 1, 'snack', 90000, 900, 900, 90000),
(61, 65, 32, 2, 'pentol', 10000000, 19909, 39818, 20000000),
(62, 66, 31, 1, 'burger', 15000, 900, 900, 15000),
(63, 67, 31, 1, 'burger', 15000, 900, 900, 15000),
(64, 68, 30, 1, 'snack', 90000, 900, 900, 90000),
(65, 68, 31, 2, 'burger', 15000, 900, 1800, 30000),
(66, 69, 32, 1, 'pentol', 10000000, 19909, 19909, 10000000),
(67, 70, 30, 1, 'snack', 90000, 900, 900, 90000),
(68, 70, 34, 1, 'Chips ', 10000, 1000, 1000, 10000),
(69, 70, 35, 3, 'eureka-snacck', 20000, 1500, 4500, 60000),
(70, 71, 31, 1, 'burger', 15000, 900, 900, 15000),
(71, 72, 30, 1, 'snack', 90000, 900, 900, 90000),
(72, 72, 31, 1, 'burger', 15000, 900, 900, 15000),
(73, 73, 30, 1, 'snack', 90000, 900, 900, 90000),
(74, 74, 30, 1, 'snack', 90000, 900, 900, 90000),
(75, 74, 33, 1, 'eskrim', 40000, 1500, 1500, 40000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(50) NOT NULL,
  `berat_produk` int(60) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi_produk` varchar(100) NOT NULL,
  `stock_produk` int(100) NOT NULL,
  `id_kategori` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `berat_produk`, `foto_produk`, `deskripsi_produk`, `stock_produk`, `id_kategori`) VALUES
(30, 'snack', 90000, 900, 'brownis.jpg', 'enak ', 97, 2),
(31, 'Burger', 15000, 900, 'burger.jpg', 'Burger sangat enak Ditaburi oleh wijen berkulitas', 0, 1),
(32, 'Kue Kering', 19000, 200, 'massimo-adami-QhIE94TpnkA-unsplash.jpg', 'Kue Kering Yang Sangat Enak Untuk Dimakan ', 100, 2),
(33, 'eskrim', 40000, 1500, 'erwan-hesry-OlQ-NaEyVmQ-unsplash.jpg', 'Ice Cream Yang Sangat Enak ,Cocok Untuk Menemani Hari Libur anda ', -1, 2),
(34, 'Chips ', 10000, 1000, 'chips_ahoy.jpg', 'Sebuah merek chocolate chip cookie yang dibuat oleh Nabisco, yang berjaya pada tahun 1963. Mereka ba', 100, 2),
(35, 'eureka-snacck', 20000, 1500, 'eurika-chese.jpg', 'eureka snack ini terkenal akan rasanya yang renyah dan lezat tanpa lemak lemak jenuh dan pengawet.\r\n', 100, 2),
(36, 'Chocolate ', 15000, 500, 'american-heritage-chocolate-8eOY6u1FxZU-unsplash.jpg', 'Coklat Yang Sangat Enak Dengan Balutan Coklat Asli Dari Amerika ', 100, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_ongkir`
--

CREATE TABLE `tabel_ongkir` (
  `id_ongkir` int(5) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_ongkir`
--

INSERT INTO `tabel_ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(1, 'Demak', 10000),
(2, 'jakarta', 10000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `keluh_kesah`
--
ALTER TABLE `keluh_kesah`
  ADD PRIMARY KEY (`id_keluh`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `tabel_ongkir`
--
ALTER TABLE `tabel_ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `keluh_kesah`
--
ALTER TABLE `keluh_kesah`
  MODIFY `id_keluh` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(89) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8099902;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `tabel_ongkir`
--
ALTER TABLE `tabel_ongkir`
  MODIFY `id_ongkir` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
