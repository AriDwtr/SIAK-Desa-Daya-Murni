-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2022 at 12:29 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_siak_daya_murni`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(46, '2022-06-13-162439', 'App\\Database\\Migrations\\TblPegawai', 'default', 'App', 1655571451, 1),
(47, '2022-06-15-080432', 'App\\Database\\Migrations\\TblJabatan', 'default', 'App', 1655571451, 1),
(48, '2022-06-16-111211', 'App\\Database\\Migrations\\TblSkDomisili', 'default', 'App', 1655571451, 1),
(49, '2022-06-17-122104', 'App\\Database\\Migrations\\TblSkTidakMampu', 'default', 'App', 1655571451, 1),
(50, '2022-06-17-125349', 'App\\Database\\Migrations\\TblSkPindahDatang', 'default', 'App', 1655571451, 1),
(51, '2022-06-17-125527', 'App\\Database\\Migrations\\TblSkKematian', 'default', 'App', 1655571451, 1),
(52, '2022-06-17-130643', 'App\\Database\\Migrations\\TblSkKelahiran', 'default', 'App', 1655571451, 1),
(53, '2022-06-17-131116', 'App\\Database\\Migrations\\TblPenduduk', 'default', 'App', 1655571451, 1),
(54, '2022-06-17-131558', 'App\\Database\\Migrations\\TblAyah', 'default', 'App', 1655571451, 1),
(55, '2022-06-17-131931', 'App\\Database\\Migrations\\TblIbu', 'default', 'App', 1655571451, 1),
(56, '2022-06-17-132150', 'App\\Database\\Migrations\\TblAnak', 'default', 'App', 1655571451, 1),
(57, '2022-06-19-051805', 'App\\Database\\Migrations\\TblSurat', 'default', 'App', 1655616055, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_anak`
--

CREATE TABLE `tbl_anak` (
  `id_anak` int(5) UNSIGNED NOT NULL,
  `id_penduduk` int(5) DEFAULT NULL,
  `nik_anak` varchar(100) DEFAULT NULL,
  `nama_anak` varchar(100) DEFAULT NULL,
  `tgl_lahir_anak` date DEFAULT NULL,
  `tempat_lahir_anak` varchar(100) DEFAULT NULL,
  `agama_anak` varchar(100) DEFAULT NULL,
  `pekerjaan_anak` varchar(100) DEFAULT NULL,
  `jenis_kelamin_anak` varchar(100) DEFAULT NULL,
  `tgl_buat` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_anak`
--

INSERT INTO `tbl_anak` (`id_anak`, `id_penduduk`, `nik_anak`, `nama_anak`, `tgl_lahir_anak`, `tempat_lahir_anak`, `agama_anak`, `pekerjaan_anak`, `jenis_kelamin_anak`, `tgl_buat`) VALUES
(2, 1, '125612521', 'ratih', '2021-12-12', 'portugal', 'Islam', 'Aktor', 'Laki - Laki', '2022-06-21'),
(3, 1, '232372', 'tukiyam', '2009-06-22', 'depok', 'Katolik', 'Swasta', 'Perempuan', '2022-06-21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ayah`
--

CREATE TABLE `tbl_ayah` (
  `id_ayah` int(5) UNSIGNED NOT NULL,
  `id_penduduk` int(5) DEFAULT NULL,
  `nik_ayah` varchar(100) DEFAULT NULL,
  `nama_ayah` varchar(100) DEFAULT NULL,
  `tgl_lahir_ayah` date DEFAULT NULL,
  `tempat_lahir_ayah` varchar(100) DEFAULT NULL,
  `agama_ayah` varchar(100) DEFAULT NULL,
  `pekerjaan_ayah` varchar(100) DEFAULT NULL,
  `jenis_kelamin_ayah` varchar(100) DEFAULT NULL,
  `tgl_buat` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_ayah`
--

INSERT INTO `tbl_ayah` (`id_ayah`, `id_penduduk`, `nik_ayah`, `nama_ayah`, `tgl_lahir_ayah`, `tempat_lahir_ayah`, `agama_ayah`, `pekerjaan_ayah`, `jenis_kelamin_ayah`, `tgl_buat`) VALUES
(10, 1, '222222', 'ari dwiantoro', '1997-07-07', 'Semarang', 'Islam', 'Pesepakbola', 'Laki - Laki', '2022-06-20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ibu`
--

CREATE TABLE `tbl_ibu` (
  `id_ibu` int(5) UNSIGNED NOT NULL,
  `id_penduduk` int(5) DEFAULT NULL,
  `nik_ibu` varchar(100) DEFAULT NULL,
  `nama_ibu` varchar(100) DEFAULT NULL,
  `tgl_lahir_ibu` date DEFAULT NULL,
  `tempat_lahir_ibu` varchar(100) DEFAULT NULL,
  `agama_ibu` varchar(100) DEFAULT NULL,
  `pekerjaan_ibu` varchar(100) DEFAULT NULL,
  `jenis_kelamin_ibu` varchar(100) DEFAULT NULL,
  `tgl_buat` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_ibu`
--

INSERT INTO `tbl_ibu` (`id_ibu`, `id_penduduk`, `nik_ibu`, `nama_ibu`, `tgl_lahir_ibu`, `tempat_lahir_ibu`, `agama_ibu`, `pekerjaan_ibu`, `jenis_kelamin_ibu`, `tgl_buat`) VALUES
(2, 1, '333333', 'rizki ratih purwasih3', '1999-01-22', 'babat3', 'Katolik', 'PNS3', 'Perempuan', '2022-06-20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jabatan`
--

CREATE TABLE `tbl_jabatan` (
  `id_jabatan` int(5) UNSIGNED NOT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_jabatan`
--

INSERT INTO `tbl_jabatan` (`id_jabatan`, `jabatan`, `status`) VALUES
(1, 'Administrator', 'admin'),
(2, 'Kepala Desa', 'kades'),
(3, 'Pelayanan', 'pelayanan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pegawai`
--

CREATE TABLE `tbl_pegawai` (
  `id_pegawai` int(5) UNSIGNED NOT NULL,
  `nip` varchar(100) DEFAULT NULL,
  `nik` varchar(100) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jk` varchar(20) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `id_jabatan` int(5) DEFAULT NULL,
  `agama` varchar(20) DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL,
  `role` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_pegawai`
--

INSERT INTO `tbl_pegawai` (`id_pegawai`, `nip`, `nik`, `nama`, `jk`, `tempat_lahir`, `tanggal_lahir`, `id_jabatan`, `agama`, `foto`, `alamat`, `username`, `password`, `role`) VALUES
(1, '1234567', '070797', 'ari dwiantoro', 'Laki - Laki', 'palembang', '1997-07-07', 1, 'Islam', NULL, 'jl. Soak', '07071997', '$2y$10$mQIiUqOoMjn61rjNFvLwhOgDgYWPU6ptqvx8LIJuWdO.LLXzOMeM.', 'admin'),
(2, '452327328311', '26326382311', 'Bima Purwantoro', 'Laki - Laki', 'Semarang', '2012-12-12', 2, 'Islam', NULL, 'jl. letna murod', '12122012', '$2y$10$nU7WMWXSqkd/U.0S8.qa3e6P7C36eMiyoWe8kGKdBSTdjTiKvUbqK', 'kades'),
(3, '1234567', '22011999', 'rizki ratih purwasih', 'Perempuan', 'palembang', '1999-01-22', 3, 'Islam', NULL, 'jl. babat supat', '22011999', '$2y$10$GHU/K0BXliOx8fFUuzeSFuV745swFC7Da6hCuayuWPiuHLFV9Abam', 'pelayanan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penduduk`
--

CREATE TABLE `tbl_penduduk` (
  `id_penduduk` int(5) UNSIGNED NOT NULL,
  `no_kk` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `rtrw` varchar(100) DEFAULT NULL,
  `kelurahan` varchar(100) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `tgl_buat` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_penduduk`
--

INSERT INTO `tbl_penduduk` (`id_penduduk`, `no_kk`, `alamat`, `rtrw`, `kelurahan`, `kecamatan`, `tgl_buat`) VALUES
(1, '1670670798', 'jl .soak permain nomor a51', '081/781', 'sukarame1', 'sukajaya1', '2022-06-20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sk_domisili`
--

CREATE TABLE `tbl_sk_domisili` (
  `id_domisili` int(5) UNSIGNED NOT NULL,
  `nik` varchar(100) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `agama` varchar(100) DEFAULT NULL,
  `pekerjaan` varchar(100) DEFAULT NULL,
  `jenis_kelamin` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `foto_dokumen` text DEFAULT NULL,
  `tgl_buat` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_sk_domisili`
--

INSERT INTO `tbl_sk_domisili` (`id_domisili`, `nik`, `nama`, `tgl_lahir`, `tempat_lahir`, `agama`, `pekerjaan`, `jenis_kelamin`, `alamat`, `foto_dokumen`, `tgl_buat`) VALUES
(1, '12576872', 'ria hartien', '1997-12-14', 'palembang', 'Islam', 'Mahasiswa', 'Perempuan', 'jl. bukit tinggi no 66', '1655575987_76fa1f6d8223f364b5aa.jpg', '2022-06-18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sk_kelahiran`
--

CREATE TABLE `tbl_sk_kelahiran` (
  `id_kelahiran` int(5) UNSIGNED NOT NULL,
  `nik_ayah` varchar(100) DEFAULT NULL,
  `nik_ibu` varchar(100) DEFAULT NULL,
  `nama_ayah` varchar(100) DEFAULT NULL,
  `nama_ibu` varchar(100) DEFAULT NULL,
  `tgl_lahir_ayah` date DEFAULT NULL,
  `tgl_lahir_ibu` date DEFAULT NULL,
  `tempat_lahir_ayah` varchar(100) DEFAULT NULL,
  `tempat_lahir_ibu` varchar(100) DEFAULT NULL,
  `nama_anak` varchar(100) DEFAULT NULL,
  `tgl_lahir_anak` date DEFAULT NULL,
  `tempat_lahir_anak` varchar(100) DEFAULT NULL,
  `agama_anak` varchar(100) DEFAULT NULL,
  `jenis_kelamin` varchar(100) DEFAULT NULL,
  `lokasi_lahir` text DEFAULT NULL,
  `foto_dokumen` text DEFAULT NULL,
  `tgl_buat` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sk_kematian`
--

CREATE TABLE `tbl_sk_kematian` (
  `id_kematian` int(5) UNSIGNED NOT NULL,
  `nik` varchar(100) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `agama` varchar(100) DEFAULT NULL,
  `pekerjaan` varchar(100) DEFAULT NULL,
  `jenis_kelamin` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `tanggal_wafat` date DEFAULT NULL,
  `alamat_makam` text DEFAULT NULL,
  `foto_dokumen` text DEFAULT NULL,
  `tgl_buat` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_sk_kematian`
--

INSERT INTO `tbl_sk_kematian` (`id_kematian`, `nik`, `nama`, `tgl_lahir`, `tempat_lahir`, `agama`, `pekerjaan`, `jenis_kelamin`, `alamat`, `tanggal_wafat`, `alamat_makam`, `foto_dokumen`, `tgl_buat`) VALUES
(2, '1678090', 'ronaldo', '1980-08-23', 'portugal', 'Khonghucu', 'Pesepakbola', 'Laki - Laki', 'jl. Pertugal', '2022-06-19', 'TPU Sungai Aires', '1655624411_c364793efe44dc6c0514.jpg', '2022-06-19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sk_pindahdatang`
--

CREATE TABLE `tbl_sk_pindahdatang` (
  `id_pindahdatang` int(5) UNSIGNED NOT NULL,
  `nik` varchar(100) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `agama` varchar(100) DEFAULT NULL,
  `pekerjaan` varchar(100) DEFAULT NULL,
  `jenis_kelamin` varchar(100) DEFAULT NULL,
  `alamat_sekarang` text DEFAULT NULL,
  `alamat_tujuan` text DEFAULT NULL,
  `foto_dokumen` text DEFAULT NULL,
  `tgl_buat` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_sk_pindahdatang`
--

INSERT INTO `tbl_sk_pindahdatang` (`id_pindahdatang`, `nik`, `nama`, `tgl_lahir`, `tempat_lahir`, `agama`, `pekerjaan`, `jenis_kelamin`, `alamat_sekarang`, `alamat_tujuan`, `foto_dokumen`, `tgl_buat`) VALUES
(2, '152632372', 'rista', '2003-12-18', 'palembang', 'Islam', 'Mahasiswa', 'Perempuan', 'jl. babat supat', 'jl.palembang', '1655652012_5dd657b0609a6801fef1.jpg', '2022-06-19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sk_tidakmampu`
--

CREATE TABLE `tbl_sk_tidakmampu` (
  `id_tidakmampu` int(5) UNSIGNED NOT NULL,
  `nik` varchar(100) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `agama` varchar(100) DEFAULT NULL,
  `pekerjaan` varchar(100) DEFAULT NULL,
  `jenis_kelamin` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `foto_dokumen` text DEFAULT NULL,
  `tgl_buat` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_sk_tidakmampu`
--

INSERT INTO `tbl_sk_tidakmampu` (`id_tidakmampu`, `nik`, `nama`, `tgl_lahir`, `tempat_lahir`, `agama`, `pekerjaan`, `jenis_kelamin`, `alamat`, `foto_dokumen`, `tgl_buat`) VALUES
(1, '24343545', 'lionel messiia', '1970-10-12', 'argentina', 'Katolik', 'barcelona', 'Perempuan', 'jl. soak simpur', '1655639117_66034a3d5b028debc51a.jpg', '2022-06-19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_surat`
--

CREATE TABLE `tbl_surat` (
  `id_surat` int(5) UNSIGNED NOT NULL,
  `domisili` int(10) DEFAULT NULL,
  `tidak_mampu` int(10) DEFAULT NULL,
  `pindah_datang` int(10) DEFAULT NULL,
  `kematian` int(10) DEFAULT NULL,
  `kelahiran` int(10) DEFAULT NULL,
  `penduduk` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_surat`
--

INSERT INTO `tbl_surat` (`id_surat`, `domisili`, `tidak_mampu`, `pindah_datang`, `kematian`, `kelahiran`, `penduduk`) VALUES
(1, 3, 3, 2, 15, 4, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_anak`
--
ALTER TABLE `tbl_anak`
  ADD PRIMARY KEY (`id_anak`);

--
-- Indexes for table `tbl_ayah`
--
ALTER TABLE `tbl_ayah`
  ADD PRIMARY KEY (`id_ayah`);

--
-- Indexes for table `tbl_ibu`
--
ALTER TABLE `tbl_ibu`
  ADD PRIMARY KEY (`id_ibu`);

--
-- Indexes for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `tbl_penduduk`
--
ALTER TABLE `tbl_penduduk`
  ADD PRIMARY KEY (`id_penduduk`);

--
-- Indexes for table `tbl_sk_domisili`
--
ALTER TABLE `tbl_sk_domisili`
  ADD PRIMARY KEY (`id_domisili`);

--
-- Indexes for table `tbl_sk_kelahiran`
--
ALTER TABLE `tbl_sk_kelahiran`
  ADD PRIMARY KEY (`id_kelahiran`);

--
-- Indexes for table `tbl_sk_kematian`
--
ALTER TABLE `tbl_sk_kematian`
  ADD PRIMARY KEY (`id_kematian`);

--
-- Indexes for table `tbl_sk_pindahdatang`
--
ALTER TABLE `tbl_sk_pindahdatang`
  ADD PRIMARY KEY (`id_pindahdatang`);

--
-- Indexes for table `tbl_sk_tidakmampu`
--
ALTER TABLE `tbl_sk_tidakmampu`
  ADD PRIMARY KEY (`id_tidakmampu`);

--
-- Indexes for table `tbl_surat`
--
ALTER TABLE `tbl_surat`
  ADD PRIMARY KEY (`id_surat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `tbl_anak`
--
ALTER TABLE `tbl_anak`
  MODIFY `id_anak` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_ayah`
--
ALTER TABLE `tbl_ayah`
  MODIFY `id_ayah` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_ibu`
--
ALTER TABLE `tbl_ibu`
  MODIFY `id_ibu` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  MODIFY `id_jabatan` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  MODIFY `id_pegawai` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_penduduk`
--
ALTER TABLE `tbl_penduduk`
  MODIFY `id_penduduk` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_sk_domisili`
--
ALTER TABLE `tbl_sk_domisili`
  MODIFY `id_domisili` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_sk_kelahiran`
--
ALTER TABLE `tbl_sk_kelahiran`
  MODIFY `id_kelahiran` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_sk_kematian`
--
ALTER TABLE `tbl_sk_kematian`
  MODIFY `id_kematian` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_sk_pindahdatang`
--
ALTER TABLE `tbl_sk_pindahdatang`
  MODIFY `id_pindahdatang` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_sk_tidakmampu`
--
ALTER TABLE `tbl_sk_tidakmampu`
  MODIFY `id_tidakmampu` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_surat`
--
ALTER TABLE `tbl_surat`
  MODIFY `id_surat` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
