-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Mar 2024 pada 03.03
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
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `penulis` varchar(255) DEFAULT NULL,
  `penerbit` varchar(255) DEFAULT NULL,
  `tahun_terbit` int(11) DEFAULT NULL,
  `stok` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `id_kategori`, `judul`, `penulis`, `penerbit`, `tahun_terbit`, `stok`) VALUES
(3, NULL, 'will you be there?', 'guillaume musso', 'spring', 2006, 7),
(4, NULL, 'classroom of the elite', 'shougo kinugasa', 'media factory', 2015, 29),
(5, NULL, 'pemrograman dasar website', 'agusriandi', 'gramedia', 2018, 10),
(6, NULL, 'dasar dasar fotografi untuk pemula', 'teguh setiadi', 'gramedia', 2010, 5),
(7, NULL, 'cara cepat kaya tanpa mencuri', 'ewoks santoso', 'gramedia', 2019, 9),
(8, NULL, 'toaru majutsu no index', 'kazuma kamachi', 'gramedia', 2007, 44),
(23, NULL, 'Komik Boboiboy Galaxy musim 2', 'Monsta', 'Monsta', 2021, 19),
(24, NULL, 'PG SCHOOL', 'Kiels', 'wattpad', 2020, 30),
(25, NULL, 'paduan pemula memulai adobe photoshop', 'zavier', 'gramedia', 2021, 30),
(35, NULL, 'paduan untuk membuat game sederhana', 'zavier', 'gramedia', 2015, 36);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoribuku_relasi`
--

CREATE TABLE `kategoribuku_relasi` (
  `id_kategoribuku` int(11) NOT NULL,
  `id_buku` int(11) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategoribuku_relasi`
--

INSERT INTO `kategoribuku_relasi` (`id_kategoribuku`, `id_buku`, `id_kategori`) VALUES
(7, 3, 4),
(3, 4, 4),
(5, 5, 1),
(4, 6, 1),
(1, 7, 1),
(8, 8, 3),
(11, 23, 3),
(12, 24, 4),
(13, 25, 5),
(15, 35, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_buku`
--

CREATE TABLE `kategori_buku` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori_buku`
--

INSERT INTO `kategori_buku` (`id_kategori`, `nama_kategori`) VALUES
(1, 'pendidikan'),
(2, 'ekonomi'),
(3, 'komik'),
(4, 'novel'),
(5, 'fotografi'),
(9, 'contohkategori');

-- --------------------------------------------------------

--
-- Struktur dari tabel `koleksipribadi`
--

CREATE TABLE `koleksipribadi` (
  `id_koleksi` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_buku` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `koleksipribadi`
--

INSERT INTO `koleksipribadi` (`id_koleksi`, `id_user`, `id_buku`) VALUES
(5, 2, 3),
(4, 2, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_peminjaman`
--

CREATE TABLE `log_peminjaman` (
  `keterangan` varchar(25) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `log_peminjaman`
--

INSERT INTO `log_peminjaman` (`keterangan`, `waktu`) VALUES
('Buku di pinjam', '2024-01-23 08:56:33'),
('Buku di diubah', '2024-01-23 08:57:53'),
('Buku dikembalikan', '2024-01-23 08:58:18'),
('Buku di diubah', '2024-01-23 09:52:00'),
('Buku di diubah', '2024-01-23 09:52:40'),
('Buku di diubah', '2024-01-23 09:58:33'),
('Buku di diubah', '2024-01-23 09:58:52'),
('Buku di diubah', '2024-01-23 09:59:02'),
('Buku di diubah', '2024-01-23 09:59:09'),
('Buku di pinjam', '2024-01-23 09:59:56'),
('Buku di pinjam', '2024-01-23 10:02:52'),
('Buku di diubah', '2024-02-12 08:42:18'),
('Buku di diubah', '2024-02-12 08:42:33'),
('Buku di pinjam', '2024-02-19 11:49:39'),
('Buku di diubah', '2024-02-19 11:50:37'),
('Buku dikembalikan', '2024-02-19 11:56:19'),
('Buku di pinjam', '2024-02-19 13:04:16'),
('Buku dikembalikan', '2024-02-19 13:04:27'),
('Buku di pinjam', '2024-02-19 13:06:09'),
('Buku dikembalikan', '2024-02-19 13:14:35'),
('Buku di pinjam', '2024-02-19 13:14:52'),
('Buku dikembalikan', '2024-02-19 13:17:22'),
('Buku di pinjam', '2024-02-19 13:20:14'),
('Buku di pinjam', '2024-02-19 13:20:54'),
('Buku di pinjam', '2024-02-19 13:23:41'),
('Buku dikembalikan', '2024-02-19 13:25:26'),
('Buku dikembalikan', '2024-02-19 13:25:39'),
('Buku di pinjam', '2024-02-19 13:25:59'),
('Buku di pinjam', '2024-02-19 13:38:51'),
('Buku di diubah', '2024-02-19 13:49:10'),
('Buku di pinjam', '2024-02-19 14:00:06'),
('Buku di diubah', '2024-02-19 14:00:47'),
('Buku di diubah', '2024-02-19 14:01:47'),
('Buku di pinjam', '2024-02-19 14:04:45'),
('Buku di diubah', '2024-02-21 07:40:27'),
('Buku di diubah', '2024-02-21 07:41:08'),
('Buku di pinjam', '2024-02-21 08:49:37'),
('Buku di diubah', '2024-02-21 08:50:32'),
('Buku di pinjam', '2024-02-21 08:52:51'),
('Buku di diubah', '2024-02-21 08:53:08'),
('Buku di pinjam', '2024-02-21 09:15:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_user`
--

CREATE TABLE `log_user` (
  `kejadian` varchar(25) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `log_user`
--

INSERT INTO `log_user` (`kejadian`, `waktu`) VALUES
('Tambah data user', '2024-01-23 08:29:35'),
('Ubah data user', '2024-01-23 08:36:59'),
('Ubah data user', '2024-01-24 09:58:07'),
('Ubah data user', '2024-01-24 09:58:20'),
('Ubah data user', '2024-01-24 09:58:38'),
('Ubah data user', '2024-01-24 09:58:48'),
('Ubah data user', '2024-01-24 09:59:00'),
('Ubah data user', '2024-01-24 09:59:09'),
('Ubah data user', '2024-01-24 09:59:23'),
('Ubah data user', '2024-01-30 08:53:03'),
('Hapus data user', '2024-01-30 09:21:33'),
('Tambah data user', '2024-01-30 09:22:12'),
('Hapus data user', '2024-01-30 21:25:11'),
('Tambah data user', '2024-01-31 20:46:36'),
('Tambah data user', '2024-02-07 08:17:42'),
('Tambah data user', '2024-02-12 09:01:12'),
('Ubah data user', '2024-02-12 09:08:49'),
('Hapus data user', '2024-02-12 09:12:06'),
('Tambah data user', '2024-02-12 09:19:17'),
('Tambah data user', '2024-02-20 14:23:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_buku` int(11) DEFAULT NULL,
  `judul` varchar(255) NOT NULL,
  `tanggal_peminjaman` date DEFAULT NULL,
  `tanggal_pengembalian` date DEFAULT NULL,
  `status_peminjaman` varchar(255) DEFAULT NULL,
  `jumlah_dipinjam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_user`, `id_buku`, `judul`, `tanggal_peminjaman`, `tanggal_pengembalian`, `status_peminjaman`, `jumlah_dipinjam`) VALUES
(2, 4, 7, 'cara cepat kaya tanpa mencuri', '2024-01-10', '2024-01-17', 'dipinjam', 1),
(3, 3, 4, 'classroom of the elite', '2024-01-12', '2024-01-22', 'dikembalikan', 1),
(4, 5, 3, 'will you be there', '2024-01-11', '2024-01-22', 'dipinjam', 1),
(5, 2, 5, 'pemrograman dasar website', '2024-01-12', '2024-01-14', 'dikembalikan', 1),
(8, 3, 4, 'classroom of the elite', '2024-01-04', '2024-02-21', 'dikembalikan', 2),
(16, 2, 6, '', '2024-02-12', '2024-02-21', 'dikembalikan', 0),
(19, 10, 3, '', '2024-02-19', '2024-02-20', 'dipinjam', 1),
(20, 2, 8, '', '2024-02-19', '2024-02-29', 'dikembalikan', 1),
(21, 2, 3, '', '2024-02-19', '2024-03-01', 'dikembalikan', 1),
(22, 2, 4, '', '2024-02-19', '2024-02-21', 'dikembalikan', 1),
(23, 10, 24, '', '2024-02-21', '2024-02-29', 'dikembalikan', 1),
(24, 2, 6, '', '2024-02-21', '2024-02-29', 'dikembalikan', 1),
(25, 13, 23, '', '2024-02-21', NULL, 'dipinjam', 1);

--
-- Trigger `peminjaman`
--
DELIMITER $$
CREATE TRIGGER `del_peminjaman` AFTER DELETE ON `peminjaman` FOR EACH ROW INSERT INTO log_peminjaman values('Buku dikembalikan',now())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `ins_peminjaman` AFTER INSERT ON `peminjaman` FOR EACH ROW INSERT INTO log_peminjaman values('Buku di pinjam',now())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `kurangi_stok` AFTER INSERT ON `peminjaman` FOR EACH ROW UPDATE buku set 
stok=stok-new.jumlah_dipinjam 
where id_buku=new.id_buku
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updt_peminjaman` AFTER UPDATE ON `peminjaman` FOR EACH ROW INSERT INTO log_peminjaman values('Buku di diubah',now())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ulasan_buku`
--

CREATE TABLE `ulasan_buku` (
  `id_ulasan` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_buku` int(11) DEFAULT NULL,
  `ulasan` text DEFAULT NULL,
  `rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ulasan_buku`
--

INSERT INTO `ulasan_buku` (`id_ulasan`, `id_user`, `id_buku`, `ulasan`, `rating`) VALUES
(2, 3, 6, 'bukunya mudah banget dimengerti,dasar dasar fotografinya sangat cocok buat pemula yang baru belajar fotografi', 8),
(3, 4, 7, 'buku ini sangat mengubah mindset atau pola pikir saya sehingga dapat mengerti dalam mengelola uang untuk dipakai dan di investasikan itu tidak semudah yang dibayangkan', 7),
(5, 5, 3, 'alur ceritanya lumayan seru buat diikutin,tapi ini buku alurnya lumayan berat buat dimengerti,dan membuat kita berfikir', 8),
(6, 3, 23, 'dibagian boboiboy gentar kocak banget,pede dan narsis parahh hahaha', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `nama_lengkap`, `alamat`, `role`) VALUES
(1, 'tengku', '8fdcbe593451c8e7f22fb874ed9505ab', 'tengku@gmail.com', 'tengku ahmad hasydan', 'metro', 'petugas'),
(2, 'bringafell', '5f506caed4d1e9b93436c5761a02fe43', 'bringafell@gmail.com', 'bringafelling', 'metro', 'user'),
(3, 'zayyan', '07e77b04a31033c3191ae84b81e45ec0', 'zayyan@gmail.com', 'zayyan de\' fontaine', 'fontaine', 'user'),
(4, 'furina', '589cc8a5be69e145b693dc5a5930c114', 'furina@gmail.com', 'furina de\' fontaine', 'fontaine', 'user'),
(5, 'leomord', '739fcbf413acb17d5d2c961020e637cf', 'leomord@gmail.com', 'leomord', 'land of dawn', 'user'),
(6, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 'admin', 'anonymous', 'admin'),
(7, 'ewoks', 'd09161931a04dcff99004658c95fae94', 'ewoksantoso@gmail.com', 'ewok santoso', 'gunung pelindung', 'user'),
(10, 'dhani', 'da92f7066e5b27648d685cd6cf84f4bb', 'dhani@gmail.com', 'dhani santoso', 'metro', 'user'),
(11, 'rainiya', '7fd4d336d3c66e08f239eb209de0e81a', 'rainiya@gmail.com', 'rainiya', 'metro', 'user'),
(13, 'alaric', '1339228e1b35e805a48d0e23e2699fa6', 'alaric@gmail.com', 'alaric nathan', 'fontaine', 'user'),
(14, 'jin', '84fff20659999e2b83b45c6851ec57dd', 'jin@gmail.com', 'jin kazama', 'yakushima', 'user');

--
-- Trigger `user`
--
DELIMITER $$
CREATE TRIGGER `del_user` AFTER DELETE ON `user` FOR EACH ROW INSERT into log_user values('Hapus data user',now())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `ins_user` AFTER INSERT ON `user` FOR EACH ROW INSERT into log_user values('Tambah data user',now())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updt_user` AFTER UPDATE ON `user` FOR EACH ROW INSERT into log_user values('Ubah data user',now())
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `kategoribuku_relasi`
--
ALTER TABLE `kategoribuku_relasi`
  ADD PRIMARY KEY (`id_kategoribuku`),
  ADD KEY `id_buku` (`id_buku`,`id_kategori`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `kategori_buku`
--
ALTER TABLE `kategori_buku`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `koleksipribadi`
--
ALTER TABLE `koleksipribadi`
  ADD PRIMARY KEY (`id_koleksi`),
  ADD UNIQUE KEY `id_user` (`id_user`,`id_buku`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_user` (`id_user`,`id_buku`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indeks untuk tabel `ulasan_buku`
--
ALTER TABLE `ulasan_buku`
  ADD PRIMARY KEY (`id_ulasan`),
  ADD KEY `id_user` (`id_user`,`id_buku`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `kategoribuku_relasi`
--
ALTER TABLE `kategoribuku_relasi`
  MODIFY `id_kategoribuku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `kategori_buku`
--
ALTER TABLE `kategori_buku`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `koleksipribadi`
--
ALTER TABLE `koleksipribadi`
  MODIFY `id_koleksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `ulasan_buku`
--
ALTER TABLE `ulasan_buku`
  MODIFY `id_ulasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_buku` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kategoribuku_relasi`
--
ALTER TABLE `kategoribuku_relasi`
  ADD CONSTRAINT `kategoribuku_relasi_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kategoribuku_relasi_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_buku` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `koleksipribadi`
--
ALTER TABLE `koleksipribadi`
  ADD CONSTRAINT `koleksipribadi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `koleksipribadi_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ulasan_buku`
--
ALTER TABLE `ulasan_buku`
  ADD CONSTRAINT `ulasan_buku_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ulasan_buku_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
