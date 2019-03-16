-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Feb 2019 pada 05.19
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asisten`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`, `jabatan`, `foto`) VALUES
(2, 'Laily Suhening', 'admin', '0fd490ba3432bc55bd8a6bc127492ce4', 'Ketua', 'admin-images.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `asisten`
--

CREATE TABLE `asisten` (
  `nim_asisten` varchar(21) NOT NULL,
  `nama_asisten` varchar(100) NOT NULL,
  `kelas_asisten` varchar(20) NOT NULL,
  `jk` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tmp_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `telp` varchar(15) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `asisten`
--

INSERT INTO `asisten` (`nim_asisten`, `nama_asisten`, `kelas_asisten`, `jk`, `alamat`, `tmp_lahir`, `tgl_lahir`, `telp`, `foto`) VALUES
('15.11.0080', 'ADI PURNOMO', 'SI18A', 'Laki-laki', '', '', '0000-00-00', '0895 3405 09066', '15.11.0080-Adi Purnomo.jpeg'),
('15.11.0106', 'RAMADANI FIRDAUS', 'TI17E', 'Laki-laki', '', '', '0000-00-00', '0857 1215 1950', ''),
('15.11.0136', 'LAILY SUHENING', 'SI16B', 'Perempuan', '', '', '0000-00-00', '0815 4817 7326', '15.11.0136-LAILY SUHENING_15.12.0143.jpg'),
('15.11.0203', 'ANA ROFIQOH', 'TI16A', 'Perempuan', '', '', '0000-00-00', '0853 3070 7050', '15.11.0203-ANA ROFIQOH_15.11.0203.jpg'),
('15.11.0223', 'GAGAS RESTU SUTIKNO', 'TI18C', 'Laki-laki', '', '', '0000-00-00', '0858 3994 1170', '15.11.0223-GAGAS RESTU SUTIKNO_15.11.0223.jpg'),
('15.11.0231', 'DWI YULIANTO KUSUMA W', 'SI17B', 'Laki-laki', '', '', '0000-00-00', ' 0856 4771 3128', '15.11.0231-DWI YULIANTO KUSUMA W_15.11.0231.jpg'),
('15.11.0241', 'KHOERUL UMAM', 'SI16C', 'Laki-laki', '', '', '0000-00-00', '0815 4802 2233', '15.11.0241-Umam.jpeg'),
('15.11.0252', 'RIYANUAR NUGROHO', '', 'Laki-laki', '', '', '0000-00-00', '0821 4447 2816', ''),
('15.11.0253', 'AFRIZAL RIFAI', 'TI17A', 'Laki-laki', '', '', '0000-00-00', '0815 6831 1749', '15.11.0253-AFRIZAL RIFAI_15.11.0253.jpg'),
('15.11.0254', 'RIZKY ARIF FAUZI', 'TI15D', 'Laki-laki', '', '', '0000-00-00', '0896 0575 7557', '15.11.0254-Rizky.jpeg'),
('15.11.0273', 'RANDI OCTAVIAN ANDRIYONO', 'TI17A', 'Laki-laki', '', '', '0000-00-00', '0857 2713 4787', ''),
('15.11.0284', 'RILAS AGUNG PAMBUDI', 'TI15E', 'Laki-laki', '', '', '0000-00-00', '0813 9049 2606', '15.11.0284-Rilas.jpeg'),
('15.11.0291', 'TEGAR JUNIAR WIBOWO', 'TI16A', 'Laki-laki', '', '', '0000-00-00', '0857 2633 4029', ''),
('15.11.0294', 'ERLANGGA PUTRA', 'TI17A', 'Laki-laki', '', '', '0000-00-00', '0899 3126 323', '15.11.0294-ERLANGGA PUTRA BUANA_15.11.0294.jpg'),
('15.11.0336', 'AHMAD YAHYA ASY SYIDQIE', 'SI17A', 'Laki-laki', '', '', '0000-00-00', '0895 3579 48031', ''),
('15.12.0017', 'RAHMA DIYANI', 'SI16A', 'Perempuan', '', '', '0000-00-00', '0857 1262 8575', '15.12.0017-Rahma Diyani.jpeg'),
('15.12.0045', 'AHMAD REZA', 'TI17A', 'Laki-laki', '', '', '0000-00-00', '0857 2639 8344', '15.12.0045-AHMAD REZA_15.12.0045.png'),
('15.12.0102', 'HERLINA PURWATI', 'SI16B', 'Perempuan', '', '', '0000-00-00', '0813 2988 2523', ''),
('15.12.0150', 'MELYANA FATMA', 'TI17E', 'Perempuan', '', '', '0000-00-00', '0857 4152 2402', '15.12.0150-Meli.jpeg'),
('16.11.0001', 'FAHMI YAHYA', 'TI17A', 'Laki-laki', '', '', '0000-00-00', '0895 2079 8661', '16.11.0001-FAHMI YAHYA_16.11.0001.jpg'),
('16.11.0008', 'ANAAM BARERA', 'SI17A', 'Laki-laki', '', '', '0000-00-00', '0896 1051 0513', '16.11.0008-ANAAM BARERA.jpg'),
('16.11.0028', 'GRISELA DIKI ', 'TI18A', 'Laki-laki', '', '', '0000-00-00', '0822 2785 5173', '16.11.0028-Grisela Diki Ardiyanto.jpg'),
('16.11.0043', 'SURATI NINGSIH', 'TI17C', 'Perempuan', '', '', '0000-00-00', '0822 5740 8284', ''),
('16.11.0055', 'LINATUN MASROHAH', 'TI17A', 'Perempuan', '', '', '0000-00-00', '0823 1875 2862', '16.11.0055-LINATUN MASROHAH_16.11.00555.jpg'),
('16.11.0059', 'SAPUTRA HENDARTO', 'TI18B', 'Laki-laki', '', '', '0000-00-00', '0857 1262 8575', ''),
('16.11.0068', 'ZAENUROCHMAN', 'TI18B', 'Laki-laki', '', '', '0000-00-00', '0815 7898 8248', ''),
('16.11.0069', 'MUHAMMAD REZA', 'TI17B', 'Laki-laki', '', '', '0000-00-00', '16.11.0069', '16.11.0069-MUHAMMAD REZA_16.11.0069.jpg'),
('16.11.0071', 'MUHAMMAD ALI HASANI', 'SI18C', 'Laki-laki', '', '', '0000-00-00', '0813 2629 1368', '16.11.0071-MUHAMMAD ALI HASANI.jpg'),
('16.11.0085', 'FENDI KURNIAWAN', 'TI17A', 'Laki-laki', '', '', '0000-00-00', '0881 6647 031', '16.11.0085-FENDI KURNIAWAN_16.11.0085.jpg'),
('16.11.0136', 'FADIL', 'TI18A', 'Laki-laki', '', '', '0000-00-00', '0856 0020 9539', '16.11.0136-FADIL_16.11.0136.jpg'),
('16.11.0137', 'UNTUNG NUR KHIFNI', 'TI18S', 'Laki-laki', '', '', '0000-00-00', '0857 4703 4398', ''),
('16.11.0161', 'HEGA FAISAL A.', 'TI17A', 'Laki-laki', '', '', '0000-00-00', '0813 8551 9324', '16.11.0161-HEGA FAISAL AGUSTIAN_16.11.0161.jpg'),
('16.11.0164', 'DESI PUTRI PRATIWI', 'TI18C', 'Perempuan', '', '', '0000-00-00', '0831 0666 6253', '16.11.0164-DESI PUTRI PRATIWI_16.11.0164.jpg'),
('16.11.0180', 'TRIAN DAMAI', 'TI18S', 'Laki-laki', '', '', '0000-00-00', '0857 9996 1438', ''),
('16.11.0188', 'LISTYANINGRUM EKA WULANDARI', 'TI17A', 'Perempuan', '', '', '0000-00-00', '0895 3084 0812', '16.11.0188-LISTYANINGRUM EKA WULANDARI.jpg'),
('16.11.0207', 'RIFKI KURNIAWAN FAUZI', 'SI18C', 'Laki-laki', '', '', '0000-00-00', '0822 6262 3199', ''),
('16.11.0227', 'GILANG DWI PRASETYO', 'SI17C', 'Laki-laki', '', '', '0000-00-00', '0822 1529 3251', '16.11.0227-GILANG DWI PRASETYO_16.11.0227.jpg'),
('16.11.0235', 'DEDEN WINANTO', 'TI17A', 'Laki-laki', '', '', '0000-00-00', '0822 2390 2952', '16.11.0235-DEDEN WINANTO_16.11.02355.jpg'),
('16.11.0247', 'RAFLI FIRDAUSY ', 'TI18B', 'Laki-laki', '', '', '0000-00-00', '0857 2609 6515', '16.11.0247-RAFLI FIRDAUSY IRAWAN_16.11.0247.jpg'),
('16.11.0249', 'FATHUROHMAN', 'SI17C', 'Laki-laki', '', '', '0000-00-00', '0857 4747 5003', '16.11.0249-FATHURROHMAN_16.11.0249.jpg'),
('16.11.0254', 'AHMAD FAUZI', 'TI17A', 'Laki-laki', '', '', '0000-00-00', '0877 2442 7313', '16.11.0254-AHAMAD FAUZI_16.11.0254.jpg'),
('16.11.0257', 'BUDIYANI HARTATI', 'TI17A', 'Perempuan', '', '', '0000-00-00', '0822 4333 4309', '16.11.0257-BUDIYANI HARTATI_16.11.0257.jpg'),
('16.11.0263', 'TEGUH SUDRAJAT', 'TI18A', 'Laki-laki', '', '', '0000-00-00', '0856 4770 7794', '16.11.0263-TEGUH SUDRAJAT.jpg'),
('16.11.0273', 'LAELI NASIKHATUL KHASANAH', 'TI17B', 'Perempuan', '', '', '0000-00-00', '0857 2650 9805', '16.11.0273-LAELI NASIKHATUL KHASANAH_16.11.0273.jpg'),
('16.11.0290', 'SHERLINA TYAS UTAMI', 'TI17A', 'Perempuan', '', '', '0000-00-00', '0821 4424 9706', ''),
('16.11.0292', 'ALUNG SUSLI', 'TI18C', 'Perempuan', '', '', '0000-00-00', '0877 0508 7455', '16.11.0292-ALUNG SUSLI_16.11.0292.jpg'),
('16.11.0299', 'ISNA BUDIATI', 'TI17A', 'Perempuan', '', '', '0000-00-00', '0896 1989 0513', '16.11.0299-ISNA BUDIATI_16.11.0299.jpg'),
('16.11.0312', 'RAHMITA PRATAMA', 'SI17C', 'Perempuan', '', '', '0000-00-00', '0812 2613 7363', '16.11.0312-Rahmita Pratama.jpg'),
('16.12.0059', 'VIKI CAHYANI', 'TI18A', 'Perempuan', '', '', '0000-00-00', '0838 6357 8872', ''),
('16.12.0062', 'BAYU NAVANTO SADIQ', 'SI17B', 'Laki-laki', '', '', '0000-00-00', '0857 4703 3606', '16.12.0062-BAYU NAVANTO SADIQ.jpg'),
('16.12.0077', 'SUROSO ', 'SI17A', 'Laki-laki', '', '', '0000-00-00', '0857 0043 4548', ''),
('16.12.0106', 'WILA AUDINA', 'TI17D', 'Perempuan', '', '', '0000-00-00', '0857 2659 1606', ''),
('16.12.0108', 'MIEFTAHUDIN TRIYAS', 'SI17C', 'Laki-laki', '', '', '0000-00-00', '0896 2032 8871', '16.12.0108-MEIFTAHUDIN TRIYAS S_16.12.0108.jpg'),
('16.12.0115', 'ARYUSTIAN STYA RAMADHAN', 'SI18A', 'Laki-laki', '', '', '0000-00-00', '0877 3683 7525', '16.12.0115-ARYUSTIAN STYA RAMADHAN_16.12.0115.jpg'),
('16.12.0123', 'ZULKARNAIN ROMADHON', 'SI17A', 'Laki-laki', '', '', '0000-00-00', '0838 6332 7730', ''),
('16.12.0149', 'TRI MURNIATI', 'SI18A', 'Perempuan', '', '', '0000-00-00', '0857 4708 8595', ''),
('16.12.0181', 'TRIANA YULISTIA', 'SI17B', 'Perempuan', '', '', '0000-00-00', '0855 7725 0411', ''),
('16.12.0183', 'ARI PRIONO', 'SI17B', 'Laki-laki', '', '', '0000-00-00', '0896 4275 5265', '16.12.0183-ARI PRIONO_16.12.0183.jpg'),
('16.12.0193', 'ADITYA BAYU', 'SI18B', 'Laki-laki', '', '', '0000-00-00', '0821 3760 4056', '16.12.0193-ADITYA BAYU IRGIYANTO_16.12.0193.jpg'),
('16.12.0207', 'AVIT LIA ANGGRAENI', 'TI17D', 'Perempuan', '', '', '0000-00-00', '0857 0041 4512', '16.12.0207-AVIT LIA ANGGRAENI_16.12.0207.jpg'),
('16.12.0208', 'ARIS DWI ARIANTO', 'SI17B', 'Laki-laki', '', '', '0000-00-00', '0877 0510 4086', '16.12.0208-ARIS DWI ARIANTO_16.12.0208.jpg'),
('16.12.0214', 'UMAR ABDURRAHMAN', 'TI16B', 'Laki-laki', '', '', '0000-00-00', '0852 1121 6901', '16.12.0214-images.png'),
('16.12.0216', 'RESTA RAMADANI', 'SI17D', 'Perempuan', '', '', '0000-00-00', '0822 2014 7129', ''),
('17.11.0013', 'RANGGA PRANGWEDANA', 'TI17C', 'Laki-laki', '', '', '0000-00-00', '0856 9452 2958', ''),
('17.11.0016', 'ARIEF KURNIA RAMADHANI', 'TI18B', 'Laki-laki', '', '', '0000-00-00', '0853 2724 4674', ''),
('17.11.0020', 'AFIF MA&#039;RUF ESKA', 'TI18A', 'Laki-laki', '', '', '0000-00-00', '0895 3323 77823', ''),
('17.11.0047', 'ABDUL GHOFUR', 'SI18A', 'Laki-laki', '', '', '0000-00-00', '0852 1121 6901', '17.11.0047-ABDUL GHOFUR_17.11.0047.jpg'),
('17.11.0085', 'IRFAN RIFAI AZIZ', 'TI18B', 'Laki-laki', '', '', '0000-00-00', '0822 9796 7250', '17.11.0085-IRFAN RIFAI AZIZ_17.11.0085.jpg'),
('17.11.0088', 'DINO PURNAMA AJI', 'TI18A', 'Laki-laki', '', '', '0000-00-00', '0812 3322 6805', '17.11.0088-DINO PURNAMA AJI_17.11.0088.jpg'),
('17.11.0093', 'ZIDA KUMALA S', 'TI18A', 'Perempuan', '', '', '0000-00-00', '0857 2942 0600', ''),
('17.11.0125', 'BAGAS SURYATAMA', 'TI18C', 'Laki-laki', '', '', '0000-00-00', '0857 1252 6933', '17.11.0125-BAGAS SURYATAMA_17.11.0125.jpg'),
('17.11.0126', 'MUHAMMAD RIZA FAUZILLAH', 'TI18C', 'Laki-laki', '', '', '0000-00-00', '0895 3729 05981', '17.11.0126-MUHAMMAD REZA_16.11.0069.jpg'),
('17.11.0136', 'DIDIK WICAKSONO', 'TI18A', 'Laki-laki', '', '', '0000-00-00', '0878 1258 6338', '17.11.0136-DIDIK WICAKSONO_17.11.0136.jpg'),
('17.11.0142', 'PUTRI DWI ERFIYANTI', 'TI18A', 'Perempuan', '', '', '0000-00-00', '0857 8630 3560', '17.11.0142-PUTRI DWI ERFIYANTI_17.11.0142.jpg'),
('17.11.0149', 'DINA FAJAR SULISTIYANI', 'TI18S', 'Perempuan', '', '', '0000-00-00', '0857 3671 7564', '17.11.0149-Dina Fajar S.jpg'),
('17.11.0157', 'RISQI BAYU PRATAMA', 'TI18B', 'Laki-laki', '', '', '0000-00-00', '0822 2169 8789', '17.11.0157-Risqi Bayu Pratama.jpg'),
('17.11.0181', 'INDRA ALAN N', 'TI18A', 'Laki-laki', '', '', '0000-00-00', '0815 4819 9338', '17.11.0181-INDRA ALAN NUGROHO_17.11.0181.jpg'),
('17.11.0182', 'ERICK SETIO PAMUJI', 'TI18S', 'Laki-laki', '', '', '0000-00-00', '0812 8800 9819', '17.11.0182-ERICK SETIO PAMUJI_17.11.0182.jpg'),
('17.11.0209', 'MUFLIH ZULFIAN', 'SI18B', 'Laki-laki', '', '', '0000-00-00', '0857 2606 6144', '17.11.0209-MUFLIH DZULFIAN_17.11.0209.jpg'),
('17.11.0252', 'LAELI NUR HIDAYATI', 'SI18C', 'Perempuan', '', '', '0000-00-00', '0812 2579 7405', '17.11.0252-LAELI NUR HIDAYATI_17.11.0252.jpg'),
('17.11.0269', 'BINTARI HIDAYANTI', 'TI18B', 'Perempuan', '', '', '0000-00-00', '0822 1087 2283', '17.11.0269-BINTARI HIDAYANTI_17.11.0269.jpg'),
('17.12.0006', 'ZULFA AULIA', 'SI18A', 'Perempuan', '', '', '0000-00-00', '0823 2388 5278', '17.12.0006-ZULFA AULIAA.jpg'),
('17.12.0007', 'SITI KHUMAEROH', 'SI18A', 'Perempuan', '', '', '0000-00-00', '0823 2474 1610', '17.12.0007-SITI KHUMAEROH.jpg'),
('17.12.0027', 'DESTY SANDRA UTAMI', 'SI18B', 'Perempuan', '', '', '0000-00-00', '0812 5903 7835', '17.12.0027-DESTY SANDRA UTAMI_17.12.0027.jpg'),
('17.12.0042', 'SEKAR ANDINI', 'SI18D', 'Perempuan', '', '', '0000-00-00', '0822 2041 3628', ''),
('17.12.0052', 'ZEZYA RAMADHANY KHARISMA M', 'SI18C', 'Perempuan', '', '', '0000-00-00', '0857 8629 2685', '17.12.0052-Rahma Diyani.jpeg'),
('17.12.0073', 'MA&#039;RUF MAFTUKHIN', 'SI18A', 'Laki-laki', '', '', '0000-00-00', '0856 4345 0737', ''),
('17.12.0080', 'NAILIS SYAFI`AH', 'SI18A', 'Perempuan', '', '', '0000-00-00', '0813 2707 7150', '17.12.0080-nailis syafiah.jpg'),
('17.12.0089', 'FATIN MUSTIKA SARI', 'SI18A', 'Perempuan', '', '', '0000-00-00', '0822 4272 3048', '17.12.0089-FATIN MUSTIKA SARI_17.12.0089.jpg'),
('17.12.0098', 'DWI MEILIANA', 'SI18A', 'Perempuan', '', '', '0000-00-00', '0812 2815 6267', '17.12.0098-DWI MEILIANA_17.12.0098.jpg'),
('17.12.0111', 'AMELIA MAWADDAH ALFATHANI', 'SI18A', 'Perempuan', '', '', '0000-00-00', '0858 6833 6250', '17.12.0111-AMELIA MAWADDAH ALFATHANI_17.12.0111.jpg'),
('17.12.0120', 'ERADIKA REZA LUTFIANSYAH', 'SI18A', 'Laki-laki', '', '', '0000-00-00', '0823 1181 5410', '17.12.0120-ERADIKA REZA LUTFIANSYAH_17.12.0120.jpg'),
('17.12.0140', 'INDIKA MANGGALA PUTRA', 'SI18A', 'Laki-laki', '', '', '0000-00-00', '0822 9909 9796', '17.12.0140-INDIKA MANGGALA PUTRA_17.12.0140.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `asisten_kelas`
--

CREATE TABLE `asisten_kelas` (
  `id_asisten_kelas` int(11) NOT NULL,
  `id_asisten` varchar(20) NOT NULL,
  `id_kelas_asisten` int(11) NOT NULL,
  `id_matkul_asisten` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `id_tahun` int(11) NOT NULL,
  `smt` enum('Genap','Ganjil') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `asisten_kelas`
--

INSERT INTO `asisten_kelas` (`id_asisten_kelas`, `id_asisten`, `id_kelas_asisten`, `id_matkul_asisten`, `id_jurusan`, `id_tahun`, `smt`) VALUES
(7, '15.11.0136', 13, 2, 1, 3, 'Genap'),
(11, '17.12.0111', 11, 2, 2, 3, 'Ganjil'),
(12, '17.12.0089', 11, 2, 2, 3, 'Ganjil'),
(13, '17.12.0073', 11, 2, 2, 3, 'Ganjil'),
(14, '17.12.0111', 11, 1, 2, 3, 'Ganjil'),
(15, '15.11.0080', 11, 1, 1, 3, 'Ganjil'),
(16, '16.12.0149', 11, 3, 2, 3, 'Ganjil'),
(17, '17.12.0006', 11, 3, 2, 3, 'Ganjil'),
(18, '17.12.0111', 12, 2, 2, 3, 'Ganjil'),
(19, '17.12.0120', 12, 2, 1, 3, 'Ganjil'),
(20, '17.12.0140', 12, 2, 2, 3, 'Ganjil'),
(21, '17.12.0027', 12, 1, 2, 3, 'Ganjil'),
(22, '16.12.0193', 12, 3, 2, 3, 'Ganjil'),
(23, '17.12.0006', 12, 3, 2, 3, 'Ganjil'),
(24, '17.11.0209', 12, 3, 2, 3, 'Ganjil'),
(25, '16.11.0071', 13, 2, 2, 3, 'Ganjil'),
(26, '17.12.0027', 13, 1, 2, 3, 'Ganjil'),
(27, '17.12.0098', 13, 3, 2, 3, 'Ganjil'),
(29, '17.12.0080', 13, 3, 2, 3, 'Ganjil'),
(30, '17.12.0052', 13, 3, 2, 3, 'Ganjil'),
(31, '17.12.0140', 16, 2, 2, 3, 'Ganjil'),
(32, '17.12.0140', 16, 1, 2, 3, 'Ganjil'),
(33, '17.12.0073', 16, 1, 2, 3, 'Ganjil'),
(34, '17.12.0111', 16, 1, 2, 3, 'Ganjil'),
(35, '16.12.0216', 16, 1, 2, 3, 'Ganjil'),
(36, '17.12.0098', 16, 3, 2, 3, 'Ganjil'),
(37, '16.12.0216', 16, 3, 2, 3, 'Ganjil'),
(38, '17.12.0052', 16, 4, 2, 3, 'Ganjil'),
(39, '17.12.0140', 16, 3, 2, 3, 'Ganjil'),
(40, '16.12.0059', 17, 4, 1, 3, 'Ganjil'),
(41, '16.11.0136', 17, 4, 1, 3, 'Ganjil'),
(42, '17.12.0080', 17, 3, 1, 3, 'Ganjil'),
(43, '17.11.0136', 11, 23, 1, 3, 'Ganjil'),
(44, '17.11.0088', 17, 23, 1, 3, 'Ganjil'),
(45, '16.11.0263', 17, 23, 1, 3, 'Ganjil'),
(46, '17.11.0093', 17, 6, 1, 3, 'Ganjil'),
(47, '17.11.0181', 17, 6, 1, 3, 'Ganjil'),
(48, '16.11.0028', 17, 6, 1, 3, 'Ganjil'),
(49, '17.11.0020', 17, 7, 1, 3, 'Ganjil'),
(50, '17.11.0136', 17, 7, 1, 3, 'Ganjil'),
(51, '17.11.0142', 17, 7, 1, 3, 'Ganjil'),
(52, '16.11.0068', 18, 4, 1, 3, 'Ganjil'),
(53, '17.11.0269', 18, 4, 1, 3, 'Ganjil'),
(54, '16.11.0136', 18, 4, 1, 3, 'Ganjil'),
(55, '17.11.0016', 18, 5, 1, 3, 'Ganjil'),
(56, '17.11.0085', 18, 23, 1, 3, 'Ganjil'),
(57, '17.11.0157', 18, 23, 1, 3, 'Ganjil'),
(58, '17.11.0136', 18, 7, 1, 3, 'Ganjil'),
(59, '16.12.0115', 11, 1, 2, 3, 'Ganjil'),
(60, '15.12.0017', 34, 15, 2, 3, 'Ganjil'),
(61, '17.12.0080', 11, 1, 2, 3, 'Ganjil'),
(62, '17.12.0120', 12, 2, 2, 3, 'Ganjil'),
(63, '17.11.0093', 18, 6, 1, 3, 'Ganjil'),
(64, '16.11.0247', 18, 6, 1, 3, 'Ganjil'),
(65, '16.11.0059', 18, 7, 1, 3, 'Ganjil'),
(66, '17.11.0047', 18, 6, 1, 3, 'Ganjil'),
(67, '17.11.0252', 19, 4, 1, 3, 'Ganjil'),
(68, '17.11.0209', 19, 4, 1, 3, 'Ganjil'),
(69, '16.11.0069', 19, 4, 1, 3, 'Ganjil'),
(70, '17.11.0016', 19, 23, 1, 3, 'Ganjil'),
(71, '17.11.0088', 19, 23, 1, 3, 'Ganjil'),
(72, '15.11.0223', 19, 23, 1, 3, 'Ganjil'),
(73, '16.11.0292', 19, 6, 1, 3, 'Ganjil'),
(74, '16.11.0164', 19, 6, 1, 3, 'Ganjil'),
(75, '17.11.0047', 19, 6, 1, 3, 'Genap'),
(76, '17.11.0125', 19, 7, 1, 3, 'Genap'),
(77, '17.11.0252', 19, 7, 1, 3, 'Genap'),
(78, '16.11.0059', 19, 7, 1, 3, 'Genap'),
(79, '17.11.0269', 20, 4, 1, 3, 'Genap'),
(80, '17.11.0093', 20, 4, 1, 3, 'Genap'),
(81, '17.12.0080', 20, 4, 1, 3, 'Genap'),
(82, '17.11.0136', 20, 23, 1, 3, 'Genap'),
(83, '17.12.0111', 20, 1, 1, 3, 'Genap'),
(84, '16.11.0292', 20, 6, 1, 3, 'Genap'),
(85, '17.11.0125', 20, 6, 1, 3, 'Genap'),
(86, '16.11.0164', 20, 6, 1, 3, 'Genap'),
(87, '16.11.0059', 20, 7, 1, 3, 'Genap'),
(88, '17.11.0088', 20, 7, 1, 3, 'Genap'),
(89, '16.11.0136', 21, 4, 1, 3, 'Genap'),
(90, '17.11.0085', 21, 23, 1, 3, 'Genap'),
(91, '17.12.0080', 21, 4, 1, 3, 'Genap'),
(92, '17.11.0157', 21, 23, 1, 3, 'Genap'),
(93, '16.11.0028', 21, 23, 1, 3, 'Genap'),
(94, '17.11.0181', 21, 6, 1, 3, 'Genap'),
(95, '17.11.0085', 21, 6, 1, 3, 'Genap'),
(96, '17.11.0142', 21, 6, 1, 3, 'Genap'),
(97, '17.11.0149', 21, 7, 1, 3, 'Genap'),
(98, '17.11.0182', 21, 7, 1, 3, 'Genap'),
(99, '17.11.0142', 21, 7, 1, 3, 'Genap'),
(100, '16.12.0059', 22, 4, 1, 3, 'Genap'),
(101, '16.11.0136', 22, 4, 1, 3, 'Genap'),
(102, '17.12.0080', 22, 4, 1, 3, 'Genap'),
(103, '16.11.0028', 22, 23, 1, 3, 'Genap'),
(104, '16.11.0028', 22, 6, 1, 3, 'Genap'),
(105, '17.11.0085', 22, 6, 1, 3, 'Genap'),
(106, '16.11.0137', 22, 23, 1, 3, 'Genap'),
(107, '16.11.0247', 22, 6, 1, 3, 'Genap'),
(108, '17.11.0020', 22, 7, 1, 3, 'Genap'),
(109, '17.11.0149', 22, 7, 1, 3, 'Genap'),
(110, '17.11.0182', 22, 7, 1, 3, 'Genap'),
(111, '16.12.0059', 23, 8, 2, 3, 'Genap'),
(112, '16.11.0008', 23, 8, 2, 3, 'Genap'),
(113, '16.12.0077', 23, 9, 2, 3, 'Genap'),
(114, '16.12.0123', 23, 9, 2, 3, 'Genap'),
(115, '15.11.0336', 23, 5, 2, 3, 'Genap'),
(116, '17.11.0269', 23, 5, 2, 3, 'Genap'),
(117, '16.12.0208', 24, 8, 2, 3, 'Genap'),
(118, '16.12.0181', 24, 8, 2, 3, 'Genap'),
(119, '16.12.0183', 24, 9, 2, 3, 'Genap'),
(120, '16.12.0149', 24, 9, 2, 3, 'Genap'),
(121, '16.12.0062', 24, 5, 2, 3, 'Genap'),
(122, '15.11.0231', 24, 5, 2, 3, 'Genap'),
(123, '17.11.0181', 24, 5, 2, 3, 'Genap'),
(124, '16.11.0008', 25, 8, 2, 3, 'Genap'),
(125, '16.11.0249', 25, 8, 1, 3, 'Genap'),
(126, '16.11.0227', 25, 8, 2, 3, 'Genap'),
(127, '16.11.0312', 25, 8, 2, 3, 'Genap'),
(128, '16.12.0077', 25, 9, 2, 3, 'Genap'),
(129, '16.12.0123', 25, 9, 2, 3, 'Genap'),
(130, '16.12.0108', 25, 9, 2, 3, 'Genap'),
(131, '15.11.0336', 25, 5, 2, 3, 'Genap'),
(132, '15.11.0231', 25, 5, 2, 3, 'Genap'),
(133, '16.12.0062', 25, 5, 2, 3, 'Genap'),
(134, '16.11.0008', 26, 8, 2, 3, 'Genap'),
(135, '16.12.0208', 26, 8, 2, 3, 'Genap'),
(136, '16.12.0181', 26, 8, 2, 3, 'Genap'),
(137, '16.11.0249', 26, 8, 2, 3, 'Genap'),
(138, '16.11.0180', 26, 9, 2, 3, 'Genap'),
(139, '16.12.0149', 26, 9, 2, 3, 'Genap'),
(140, '15.11.0336', 26, 5, 2, 3, 'Genap'),
(141, '15.11.0231', 26, 5, 2, 3, 'Genap'),
(142, '16.11.0071', 26, 5, 2, 3, 'Genap'),
(143, '15.12.0045', 27, 22, 1, 3, 'Genap'),
(144, '16.11.0161', 27, 22, 1, 3, 'Genap'),
(145, '16.11.0055', 27, 22, 1, 3, 'Genap'),
(146, '16.11.0085', 27, 10, 1, 3, 'Genap'),
(147, '15.11.0273', 27, 10, 1, 3, 'Genap'),
(148, '16.11.0008', 27, 10, 1, 3, 'Genap'),
(149, '15.11.0253', 27, 11, 1, 3, 'Genap'),
(150, '15.11.0294', 27, 11, 1, 3, 'Genap'),
(151, '16.11.0180', 27, 11, 1, 3, 'Genap'),
(152, '16.11.0254', 27, 12, 1, 3, 'Genap'),
(153, '16.11.0001', 27, 12, 1, 3, 'Genap'),
(154, '16.11.0290', 27, 12, 1, 3, 'Genap'),
(155, '16.11.0235', 27, 13, 1, 3, 'Genap'),
(156, '16.11.0299', 27, 13, 1, 3, 'Genap'),
(157, '16.11.0188', 27, 13, 1, 3, 'Genap'),
(158, '16.11.0292', 27, 14, 1, 3, 'Genap'),
(159, '16.11.0257', 27, 14, 1, 3, 'Genap'),
(160, '16.11.0164', 27, 14, 1, 3, 'Genap'),
(161, '16.11.0161', 28, 22, 1, 3, 'Genap'),
(162, '16.11.0055', 28, 22, 1, 3, 'Genap'),
(163, '16.11.0227', 28, 22, 1, 3, 'Genap'),
(164, '16.11.0299', 28, 10, 1, 3, 'Genap'),
(165, '16.11.0273', 28, 10, 1, 3, 'Genap'),
(166, '16.11.0085', 28, 10, 1, 3, 'Genap'),
(167, '16.11.0071', 28, 11, 1, 3, 'Genap'),
(168, '16.11.0180', 28, 11, 1, 3, 'Genap'),
(169, '16.11.0069', 28, 11, 1, 3, 'Genap'),
(170, '16.11.0312', 28, 12, 1, 3, 'Genap'),
(171, '16.11.0071', 28, 12, 1, 3, 'Genap'),
(172, '16.12.0214', 28, 12, 1, 3, 'Genap'),
(173, '16.11.0001', 28, 13, 1, 3, 'Genap'),
(174, '16.11.0247', 28, 13, 1, 3, 'Genap'),
(175, '16.11.0068', 28, 13, 1, 3, 'Genap'),
(176, '16.11.0292', 28, 14, 1, 3, 'Genap'),
(177, '16.11.0257', 28, 14, 1, 3, 'Genap'),
(178, '16.11.0164', 28, 14, 1, 3, 'Genap'),
(179, '16.11.0312', 29, 22, 1, 3, 'Genap'),
(180, '15.11.0106', 29, 22, 1, 3, 'Genap'),
(181, '15.11.0252', 29, 22, 1, 3, 'Genap'),
(182, '16.11.0273', 29, 10, 1, 3, 'Genap'),
(183, '16.12.0208', 29, 10, 1, 3, 'Genap'),
(184, '15.11.0273', 29, 10, 1, 3, 'Genap'),
(185, '15.11.0273', 29, 11, 1, 3, 'Genap'),
(186, '16.11.0290', 29, 11, 1, 3, 'Genap'),
(187, '16.11.0043', 29, 11, 1, 3, 'Genap'),
(188, '16.11.0254', 29, 12, 1, 3, 'Genap'),
(189, '16.11.0312', 29, 12, 1, 3, 'Genap'),
(190, '16.11.0071', 29, 12, 1, 3, 'Genap'),
(191, '16.11.0085', 29, 13, 1, 3, 'Genap'),
(192, '16.11.0188', 29, 13, 1, 3, 'Genap'),
(193, '15.11.0106', 29, 13, 1, 3, 'Genap'),
(194, '17.11.0013', 29, 14, 1, 3, 'Genap'),
(195, '16.11.0227', 29, 14, 1, 3, 'Genap'),
(196, '16.11.0008', 30, 22, 1, 3, 'Genap'),
(197, '15.12.0045', 30, 22, 1, 3, 'Genap'),
(198, '16.11.0055', 30, 22, 1, 3, 'Genap'),
(199, '16.12.0106', 30, 10, 1, 3, 'Genap'),
(200, '15.11.0273', 30, 10, 1, 3, 'Genap'),
(201, '16.12.0207', 30, 10, 1, 3, 'Genap'),
(202, '16.11.0008', 30, 11, 1, 3, 'Genap'),
(203, '16.11.0254', 30, 12, 1, 3, 'Genap'),
(204, '16.11.0312', 30, 12, 1, 3, 'Genap'),
(205, '16.11.0085', 30, 13, 1, 3, 'Genap'),
(206, '16.11.0235', 30, 13, 1, 3, 'Genap'),
(207, '16.11.0247', 30, 13, 1, 3, 'Genap'),
(208, '17.11.0013', 30, 14, 1, 3, 'Genap'),
(209, '15.11.0106', 31, 22, 1, 3, 'Genap'),
(210, '16.12.0181', 31, 22, 1, 3, 'Genap'),
(211, '16.11.0055', 31, 22, 1, 3, 'Genap'),
(212, '16.12.0077', 31, 10, 1, 3, 'Genap'),
(213, '16.12.0106', 31, 10, 1, 3, 'Genap'),
(214, '16.12.0207', 31, 10, 1, 3, 'Genap'),
(215, '15.11.0253', 31, 11, 1, 3, 'Genap'),
(216, '16.11.0290', 31, 11, 1, 3, 'Genap'),
(217, '16.11.0180', 31, 11, 1, 3, 'Genap'),
(218, '16.11.0249', 31, 12, 1, 3, 'Genap'),
(219, '16.11.0043', 31, 12, 1, 3, 'Genap'),
(220, '16.11.0290', 31, 12, 1, 3, 'Genap'),
(221, '16.11.0235', 31, 13, 1, 3, 'Genap'),
(222, '15.11.0106', 31, 13, 1, 3, 'Genap'),
(223, '16.11.0068', 31, 13, 1, 3, 'Genap'),
(224, '16.11.0312', 31, 14, 1, 3, 'Genap'),
(225, '15.12.0150', 31, 14, 1, 3, 'Genap'),
(226, '15.11.0106', 32, 22, 1, 3, 'Genap'),
(227, '15.11.0252', 32, 22, 1, 3, 'Genap'),
(228, '16.11.0055', 32, 22, 1, 3, 'Genap'),
(229, '16.12.0208', 32, 10, 1, 3, 'Genap'),
(230, '15.11.0080', 32, 10, 1, 3, 'Genap'),
(231, '17.12.0111', 32, 1, 1, 3, 'Genap'),
(232, '15.11.0253', 32, 11, 1, 3, 'Genap'),
(233, '15.11.0294', 32, 11, 1, 3, 'Genap'),
(234, '15.11.0273', 32, 11, 1, 3, 'Genap'),
(235, '15.11.0294', 32, 12, 1, 3, 'Genap'),
(236, '16.11.0249', 32, 12, 1, 3, 'Genap'),
(237, '16.11.0043', 32, 12, 1, 3, 'Genap'),
(238, '16.11.0001', 32, 13, 1, 3, 'Genap'),
(239, '16.11.0071', 32, 13, 1, 3, 'Genap'),
(240, '16.11.0312', 32, 13, 1, 3, 'Genap'),
(241, '16.11.0227', 32, 14, 1, 3, 'Genap'),
(242, '17.11.0013', 32, 14, 1, 3, 'Genap'),
(244, '17.12.0140', 11, 1, 1, 3, 'Ganjil');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(1, 'Teknik Informatika'),
(2, 'Sistem Informasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(20) NOT NULL,
  `kode_akses` varchar(100) NOT NULL,
  `jml_mhs` int(11) NOT NULL,
  `jurusan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `kode_akses`, `jml_mhs`, `jurusan`) VALUES
(11, 'SI18A', 'Lqw8t', 2, 2),
(12, 'SI18B', 'ApOOB', 2, 2),
(13, 'SI18C', 'Tqvbk', 0, 2),
(16, 'SI18D', 'IVBGq', 0, 2),
(17, 'TI18A', 'a793f', 3, 1),
(18, 'TI18B', 'KTtok', 0, 1),
(19, 'TI18C', 'E2J19', 0, 1),
(20, 'TI18D', 'Kn5C2', 0, 1),
(21, 'TI18E', 'GFTsm', 0, 1),
(22, 'TI18S', 'NMjj5', 0, 1),
(23, 'SI17A', 'hODio', 0, 2),
(24, 'SI17B', 'Ttv6N', 0, 2),
(25, 'SI17C', 'VilzP', 0, 2),
(26, 'SI17D', '', 0, 2),
(27, 'TI17A', '', 0, 1),
(28, 'TI17B', '', 0, 1),
(29, 'TI17C', '', 0, 1),
(30, 'TI17D', '', 0, 1),
(31, 'TI17E', '', 0, 1),
(32, 'TI17F', '', 0, 1),
(33, 'TI17S', '', 0, 1),
(34, 'SI16A', '', 0, 2),
(35, 'SI16B', '', 0, 2),
(36, 'SI16C', '', 0, 2),
(37, 'SI16D', '', 0, 2),
(38, 'TI16A', '', 0, 1),
(39, 'TI16B', '', 0, 1),
(40, 'TI16C', '', 0, 1),
(41, 'TI16D', '', 0, 1),
(42, 'TI16E', '', 0, 1),
(43, 'TI16F', '', 0, 1),
(44, 'TI16S', '', 0, 1),
(45, 'TI15B', '', 0, 1),
(46, 'TI15D', '', 0, 1),
(47, 'TI15E', '', 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `keterangan`
--

CREATE TABLE `keterangan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keterangan`
--

INSERT INTO `keterangan` (`id`, `nama`, `keterangan`) VALUES
(1, 'Kreatifitas', 'Membantu Mahasiswa Saat Sedang Praktikum'),
(2, 'Kedisiplinan', 'Kehadiran Asistsen Tepat Waktu'),
(3, 'Kerapian', 'Dalam Berpakaian'),
(4, 'Komunikasi', 'Menggunakan Bahasa Yang Baik\r\n'),
(5, 'Pemahaman Materi', 'Menyampaikan Sesuai Dengan Materi Yang Di sampaikan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(20) NOT NULL,
  `nama_mhs` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `kelas_mhs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama_mhs`, `password`, `kelas_mhs`) VALUES
('19.11.010', 'Yovie A1', 'LG68', 20),
('19.11.011', 'Yovie A2', 'VC80', 20),
('19.11.012', 'Yovie A3', 'VU63', 20),
('19.11.013', 'Yovie A4', 'JX36', 20),
('19.11.014', 'Yovie A5', 'AI83', 20),
('19.11.015', 'Yovie A6', 'SA51', 20),
('19.11.016', 'Yovie A7', 'ZL99', 20),
('19.11.017', 'Yovie A8', 'KX44', 20),
('19.11.018', 'Yovie A9', 'MA40', 20),
('19.11.019', 'Yovie A10', 'FL42', 20),
('19.11.020', 'Yovie A11', 'KN36', 20),
('19.11.021', 'Yovie A12', 'TJ33', 20),
('19.11.022', 'Yovie A13', 'SX76', 20),
('19.11.023', 'Yovie A14', 'ZL98', 20),
('19.11.024', 'Yovie A15', 'NH84', 20),
('19.11.025', 'Yovie A16', 'NB21', 20),
('19.11.026', 'Yovie A17', 'ZJ89', 20),
('19.11.027', 'Yovie A18', 'RO42', 20),
('19.11.028', 'Yovie A19', 'XS57', 20),
('19.11.029', 'Yovie A20', 'IN89', 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `matkul`
--

CREATE TABLE `matkul` (
  `id_matkul` int(11) NOT NULL,
  `nama_matkul` varchar(100) NOT NULL,
  `dosen_matkul` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `matkul`
--

INSERT INTO `matkul` (`id_matkul`, `nama_matkul`, `dosen_matkul`) VALUES
(1, 'Aplikasi Komputer', 'Dwi Krisbiantoro, M.Kom'),
(2, 'Algoritma dan Pemrograman', 'Luzi Dwi Oktaviana, S.Kom., M.MSI'),
(3, 'Sistem Manajemen Basis Data', 'Gustin  Setyaningsih, S.Kom.,M.MSI'),
(4, 'Sistem Basis Data', 'Andik Wijanarko, M.T'),
(5, 'Pemrograman Web Sistem Informasi', 'Rizki Wahyudi, M.Kom'),
(6, 'Algoritma Struktur Data', 'Maskur, S.Kom'),
(7, 'Arsitektur dan Organisasi Komputer', 'Dhanar Intan Surya Saputra, M.Kom'),
(8, 'Jaringan Komputer Sistem Informasi', 'Ranggi Praharaningtyas A, S.Kom., M.MSI'),
(9, 'Pemrograman Berorientasi Objek', 'Nurfaizah, M.Kom'),
(10, 'Sistem Operasi', 'Abednego Dwi Septiadi, M.Kom'),
(11, 'Mikroprosesor', 'Agus Pramono, ST, MT'),
(12, 'Grafika Komputer', 'Argiiyan Dwi Pritama, S.Kom'),
(13, 'Pemrograman. Net', 'Asep Suryanto, S.Si'),
(14, 'Pembelajaran Mesin', 'Bagus Adhi Kusuma, ST'),
(15, 'Kecerdasan Bisnis', 'Kuat Indarto, ST, M.Eng'),
(16, 'Statistik', 'Desty Rakhmawati, S.Si, M.Sc'),
(17, 'MPPL', 'Yuli Purwati, M.Kom'),
(18, 'Keamanan Informasi dan Jaringan', 'Sarmini, S.Kom., M.MSI'),
(19, 'Visualisasi 3D', 'Helik Hermawan, M.Kom'),
(20, 'Pemrograman Mobile 2', 'Hendra Marcos, ST, M.Eng'),
(21, 'Digital Forensik', 'Didit Suhartono, S. Sos, M. Kom'),
(22, 'Jaringan Komputer Teknik Informatika', 'Ito Setiawan, S.Kom., M.MSI'),
(23, 'Pemrograman Web Teknik Informatika', 'Dias Ayu Budi Utami, M.Kom');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `tahun_ajar` int(11) NOT NULL,
  `kelas` int(11) NOT NULL,
  `asisten` varchar(100) NOT NULL,
  `penilai` varchar(15) NOT NULL,
  `kreatifitas` decimal(10,0) NOT NULL,
  `kedisiplinan` decimal(10,0) NOT NULL,
  `kerapian` decimal(10,0) NOT NULL,
  `komunikasi` decimal(10,0) NOT NULL,
  `pemahaman_materi` decimal(10,0) NOT NULL,
  `kritik-saran` varchar(100) NOT NULL,
  `total` double NOT NULL,
  `smt` enum('Genap','Ganjil') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `tahun_ajar`, `kelas`, `asisten`, `penilai`, `kreatifitas`, `kedisiplinan`, `kerapian`, `komunikasi`, `pemahaman_materi`, `kritik-saran`, `total`, `smt`) VALUES
(11, 3, 26, '15.11.0231', '19.11.010', '4', '4', '4', '4', '4', 'baik', 20, 'Genap'),
(12, 3, 26, '15.11.0336', '19.11.010', '5', '4', '4', '4', '5', 'baik', 22, 'Genap'),
(13, 3, 26, '16.11.0008', '19.11.010', '3', '3', '5', '4', '4', 'baik', 19, 'Genap'),
(14, 3, 26, '16.11.0071', '19.11.010', '4', '3', '5', '4', '4', 'baik', 20, 'Genap'),
(15, 3, 26, '16.11.0180', '19.11.010', '4', '4', '3', '4', '4', 'baik', 19, 'Genap'),
(16, 3, 26, '16.11.0249', '19.11.010', '4', '4', '3', '5', '5', 'baik', 21, 'Genap'),
(17, 3, 26, '16.12.0149', '19.11.010', '4', '4', '4', '4', '4', 'baik', 20, 'Genap'),
(18, 3, 26, '16.12.0181', '19.11.010', '4', '3', '4', '3', '4', 'baik', 18, 'Genap'),
(19, 3, 26, '16.12.0208', '19.11.010', '4', '4', '4', '4', '4', 'baik', 20, 'Genap'),
(20, 3, 26, '15.11.0231', '19.11.011', '4', '4', '3', '4', '3', 'baik', 18, 'Genap'),
(21, 3, 26, '15.11.0336', '19.11.011', '4', '4', '5', '4', '5', 'baik', 22, 'Genap'),
(22, 3, 26, '16.11.0008', '19.11.011', '4', '4', '4', '4', '4', 'baik', 20, 'Genap'),
(23, 3, 26, '16.11.0071', '19.11.011', '4', '4', '4', '4', '4', 'baik', 20, 'Genap'),
(24, 3, 26, '16.11.0180', '19.11.011', '3', '3', '4', '4', '4', 'baik', 18, 'Genap'),
(25, 3, 26, '16.11.0249', '19.11.011', '4', '4', '4', '4', '5', 'baik', 21, 'Genap'),
(26, 3, 26, '16.12.0149', '19.11.011', '3', '4', '4', '4', '4', 'baik', 19, 'Genap'),
(27, 3, 26, '16.12.0181', '19.11.011', '4', '4', '4', '5', '4', 'baik', 21, 'Genap'),
(28, 3, 26, '16.12.0208', '19.11.011', '4', '4', '4', '4', '4', 'baik', 20, 'Genap'),
(29, 3, 26, '15.11.0231', '19.11.012', '4', '3', '4', '4', '4', 'baik', 19, 'Genap'),
(30, 3, 26, '15.11.0336', '19.11.012', '3', '3', '4', '3', '3', 'baik', 16, 'Genap'),
(31, 3, 26, '16.11.0008', '19.11.012', '3', '3', '3', '4', '3', 'baik', 16, 'Genap'),
(32, 3, 26, '16.11.0071', '19.11.012', '4', '4', '4', '4', '3', 'baik', 19, 'Genap'),
(33, 3, 26, '16.11.0180', '19.11.012', '4', '4', '4', '4', '4', 'baik', 20, 'Genap'),
(34, 3, 26, '16.11.0249', '19.11.012', '3', '4', '3', '4', '4', 'baik', 18, 'Genap'),
(35, 3, 26, '16.12.0208', '19.11.012', '3', '4', '4', '4', '4', 'baik', 19, 'Genap'),
(36, 3, 26, '16.12.0149', '19.11.012', '4', '4', '4', '4', '4', 'baik', 20, 'Genap'),
(37, 3, 26, '16.12.0181', '19.11.012', '3', '4', '4', '4', '4', 'baik', 19, 'Genap');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_akumulasi_favorit`
--

CREATE TABLE `nilai_akumulasi_favorit` (
  `id_nilai_favorit` int(11) NOT NULL,
  `id_asisten` varchar(20) NOT NULL,
  `jml_pemilih` int(11) NOT NULL,
  `tahun_ajar` int(11) NOT NULL,
  `smt` enum('Genap','Ganjil') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai_akumulasi_favorit`
--

INSERT INTO `nilai_akumulasi_favorit` (`id_nilai_favorit`, `id_asisten`, `jml_pemilih`, `tahun_ajar`, `smt`) VALUES
(2, '15.11.0336', 2, 3, 'Genap'),
(3, '16.12.0208', 1, 3, 'Genap');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_akumulasi_terbaik`
--

CREATE TABLE `nilai_akumulasi_terbaik` (
  `id_nilai` int(11) NOT NULL,
  `id_asisten` varchar(20) NOT NULL,
  `tot_kreatifias` double NOT NULL,
  `tot_kedisiplinan` double NOT NULL,
  `tot_kerapihan` double NOT NULL,
  `tot_komunikasi` double NOT NULL,
  `tot_pemahaman` double NOT NULL,
  `jml_mhs` double NOT NULL,
  `tahun_ajar` int(11) NOT NULL,
  `semester` enum('Genap','Ganjil') NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai_akumulasi_terbaik`
--

INSERT INTO `nilai_akumulasi_terbaik` (`id_nilai`, `id_asisten`, `tot_kreatifias`, `tot_kedisiplinan`, `tot_kerapihan`, `tot_komunikasi`, `tot_pemahaman`, `jml_mhs`, `tahun_ajar`, `semester`, `total`) VALUES
(21, '15.11.0231', 12, 11, 11, 12, 11, 3, 3, 'Genap', 19),
(22, '15.11.0336', 12, 11, 13, 11, 13, 3, 3, 'Genap', 20),
(23, '16.11.0008', 10, 10, 12, 12, 11, 3, 3, 'Genap', 18.333333333333),
(24, '16.11.0071', 12, 11, 13, 12, 11, 3, 3, 'Genap', 19.666666666667),
(25, '16.11.0180', 11, 11, 11, 12, 12, 3, 3, 'Genap', 19),
(26, '16.11.0249', 11, 12, 10, 13, 14, 3, 3, 'Genap', 20),
(27, '16.12.0149', 11, 12, 12, 12, 12, 3, 3, 'Genap', 19.666666666667),
(28, '16.12.0181', 11, 11, 12, 12, 12, 3, 3, 'Genap', 19.333333333333),
(29, '16.12.0208', 11, 12, 12, 12, 12, 3, 3, 'Genap', 19.666666666667);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_asistenfavorit`
--

CREATE TABLE `nilai_asistenfavorit` (
  `id_asistenfavorit` int(11) NOT NULL,
  `tahun_ajar` int(11) NOT NULL,
  `kelas` int(11) NOT NULL,
  `penilai` varchar(15) NOT NULL,
  `asistenfavorit` varchar(100) NOT NULL,
  `smt` enum('Genap','Ganjil') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai_asistenfavorit`
--

INSERT INTO `nilai_asistenfavorit` (`id_asistenfavorit`, `tahun_ajar`, `kelas`, `penilai`, `asistenfavorit`, `smt`) VALUES
(2, 3, 20, '19.11.010', '15.11.0336', 'Genap'),
(3, 3, 20, '19.11.011', '16.12.0208', 'Genap'),
(4, 3, 20, '19.11.012', '15.11.0336', 'Genap');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun_ajar`
--

CREATE TABLE `tahun_ajar` (
  `id_tahun` int(11) NOT NULL,
  `tahun_ajar` varchar(100) NOT NULL,
  `aktif` enum('Ya','Tidak') NOT NULL DEFAULT 'Tidak',
  `semester` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tahun_ajar`
--

INSERT INTO `tahun_ajar` (`id_tahun`, `tahun_ajar`, `aktif`, `semester`) VALUES
(3, '2018/2019', 'Ya', 'Genap'),
(4, '2017/2018', 'Tidak', 'Ganjil'),
(5, '2019/2020', 'Tidak', 'Ganjil');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `asisten`
--
ALTER TABLE `asisten`
  ADD PRIMARY KEY (`nim_asisten`),
  ADD KEY `kelas_asisten` (`kelas_asisten`);

--
-- Indeks untuk tabel `asisten_kelas`
--
ALTER TABLE `asisten_kelas`
  ADD PRIMARY KEY (`id_asisten_kelas`),
  ADD KEY `id_asisten` (`id_asisten`),
  ADD KEY `id_kelas_asisten` (`id_kelas_asisten`),
  ADD KEY `id_matkul_asisten` (`id_matkul_asisten`),
  ADD KEY `id_jurusan` (`id_jurusan`),
  ADD KEY `id_tahun` (`id_tahun`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `jurusan` (`jurusan`);

--
-- Indeks untuk tabel `keterangan`
--
ALTER TABLE `keterangan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `kelas_mhs` (`kelas_mhs`);

--
-- Indeks untuk tabel `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`id_matkul`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `tahun_ajar` (`tahun_ajar`),
  ADD KEY `kelas` (`kelas`),
  ADD KEY `asisten` (`asisten`);

--
-- Indeks untuk tabel `nilai_akumulasi_favorit`
--
ALTER TABLE `nilai_akumulasi_favorit`
  ADD PRIMARY KEY (`id_nilai_favorit`);

--
-- Indeks untuk tabel `nilai_akumulasi_terbaik`
--
ALTER TABLE `nilai_akumulasi_terbaik`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `tahun_ajar` (`tahun_ajar`),
  ADD KEY `semester` (`semester`);

--
-- Indeks untuk tabel `nilai_asistenfavorit`
--
ALTER TABLE `nilai_asistenfavorit`
  ADD PRIMARY KEY (`id_asistenfavorit`);

--
-- Indeks untuk tabel `tahun_ajar`
--
ALTER TABLE `tahun_ajar`
  ADD PRIMARY KEY (`id_tahun`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `asisten_kelas`
--
ALTER TABLE `asisten_kelas`
  MODIFY `id_asisten_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `keterangan`
--
ALTER TABLE `keterangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `matkul`
--
ALTER TABLE `matkul`
  MODIFY `id_matkul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `nilai_akumulasi_favorit`
--
ALTER TABLE `nilai_akumulasi_favorit`
  MODIFY `id_nilai_favorit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `nilai_akumulasi_terbaik`
--
ALTER TABLE `nilai_akumulasi_terbaik`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `nilai_asistenfavorit`
--
ALTER TABLE `nilai_asistenfavorit`
  MODIFY `id_asistenfavorit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tahun_ajar`
--
ALTER TABLE `tahun_ajar`
  MODIFY `id_tahun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `asisten_kelas`
--
ALTER TABLE `asisten_kelas`
  ADD CONSTRAINT `asisten_kelas_ibfk_2` FOREIGN KEY (`id_matkul_asisten`) REFERENCES `matkul` (`id_matkul`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `asisten_kelas_ibfk_3` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `asisten_kelas_ibfk_4` FOREIGN KEY (`id_tahun`) REFERENCES `tahun_ajar` (`id_tahun`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `asisten_kelas_ibfk_5` FOREIGN KEY (`id_asisten`) REFERENCES `asisten` (`nim_asisten`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`jurusan`) REFERENCES `jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`kelas_mhs`) REFERENCES `kelas` (`id_kelas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
