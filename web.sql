-- --------------------------------------------------------
-- Host:                         103.143.63.94
-- Server version:               8.0.35-0ubuntu0.23.04.1 - (Ubuntu)
-- Server OS:                    Linux
-- HeidiSQL Version:             12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for website
CREATE DATABASE IF NOT EXISTS `website` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `website`;

-- Dumping structure for table website.beritas
DROP TABLE IF EXISTS `beritas`;
CREATE TABLE IF NOT EXISTS `beritas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `kategori` bigint unsigned NOT NULL,
  `ruangan` bigint unsigned NOT NULL,
  `expert` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kontent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website.beritas: ~2 rows (approximately)
REPLACE INTO `beritas` (`id`, `user_id`, `kategori`, `ruangan`, `expert`, `judul`, `gambar`, `slug`, `kontent`, `created_at`, `updated_at`) VALUES
	(1, 218, 30, 1, 'https://docs.google.com/spreadsheets/d/1jaEjvbEgJltSmn0kR3Th8kbillB7GPBxfepPDVThsDA/edit?usp=sharing', 'dsadsad', 'GambarBerita/x7VYRjkNMlt6uS1wryjCAa8VmzoauOv6QrJzQGu2.jpg', 'dsadsad', '<p><a href="https://docs.google.com/spreadsheets/d/1jaEjvbEgJltSmn0kR3Th8kbillB7GPBxfepPDVThsDA/edit?usp=sharing">https://docs.google.com/spreadsheets/d/1jaEjvbEgJltSmn0kR3Th8kbillB7GPBxfepPDVThsDA/edit?usp=sharing</a></p>', '2024-04-26 08:43:38', '2024-04-26 08:43:38'),
	(2, 218, 30, 1, 'download', 'dsadasdasdas', 'GambarBerita/DuM5b8coywKhpqBJZ8jvC9dGvy0B1kHGasSsw76X.jpg', 'dsadasdasdas', '<p><a href="https://docs.google.com/spreadsheets/d/1jaEjvbEgJltSmn0kR3Th8kbillB7GPBxfepPDVThsDA/edit?usp=sharing">download</a></p>', '2024-04-26 08:44:22', '2024-04-26 08:44:22');

-- Dumping structure for table website.carousels
DROP TABLE IF EXISTS `carousels`;
CREATE TABLE IF NOT EXISTS `carousels` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `carusel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website.carousels: ~4 rows (approximately)
REPLACE INTO `carousels` (`id`, `carusel`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'GambarCarusel/aIRM9mg169HuI6ox8rQZfHjKmwsfsFXoX50KeUQD.jpg', 1, '2024-02-05 16:00:13', '2024-02-05 16:00:13'),
	(2, 'GambarCarusel/Fv4ofiyJbkY7Ddx7ljkMtFSf2m3YlTNPxqxnI69j.jpg', 1, '2024-02-13 12:37:07', '2024-02-13 12:37:07'),
	(3, 'GambarCarusel/TDP5mPwoVkrWhBkbuy7FlZX31sFR55SwSPrOcZlI.jpg', 1, '2024-02-13 12:37:22', '2024-02-13 12:37:22'),
	(4, 'GambarCarusel/uJRQw316iMUM4OJQkcVoX1Psm86sKJQgJNdcM12u.jpg', 1, '2024-02-13 13:31:07', '2024-02-13 13:31:07');

-- Dumping structure for table website.direkturs
DROP TABLE IF EXISTS `direkturs`;
CREATE TABLE IF NOT EXISTS `direkturs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `awal_periode` date NOT NULL,
  `akhir_periode` date NOT NULL,
  `foto_direktur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pegawai_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website.direkturs: ~0 rows (approximately)

-- Dumping structure for table website.dokters
DROP TABLE IF EXISTS `dokters`;
CREATE TABLE IF NOT EXISTS `dokters` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `spesialis` bigint unsigned NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website.dokters: ~0 rows (approximately)

-- Dumping structure for table website.dokumens
DROP TABLE IF EXISTS `dokumens`;
CREATE TABLE IF NOT EXISTS `dokumens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `dokumen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website.dokumens: ~0 rows (approximately)

-- Dumping structure for table website.failed_jobs
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table website.instalasis
DROP TABLE IF EXISTS `instalasis`;
CREATE TABLE IF NOT EXISTS `instalasis` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `instalasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website.instalasis: ~8 rows (approximately)
REPLACE INTO `instalasis` (`id`, `instalasi`, `status`, `slug`) VALUES
	(1, 'Instalasi Gawat Darurat', 1, 'InstalasiGawatDarurat'),
	(2, 'Instalasi Rawat Inap', 1, 'InstalasiRawatInap'),
	(3, 'Instalasi Rawat Jalan', 1, 'InstalasiRawatJalan'),
	(4, 'Instalasi Care Unit', 1, 'InstalasiCareUnit'),
	(5, 'Instalasi Bedah Sentral', 1, 'InstalasiBedahSentral'),
	(6, 'Instalasi Radiologi', 1, 'InstalasiRadiologi'),
	(7, 'Instalasi Laboratorium', 1, 'InstalasiLaboratorium'),
	(8, 'Instalasi Farmasi', 1, 'InstalasiFarmasi'),
	(15, 'Instalasi Manajemen Data Dan Rekam Medis', 1, 'instalasimanajemendatadanrekammedis');

-- Dumping structure for table website.jadwaldokters
DROP TABLE IF EXISTS `jadwaldokters`;
CREATE TABLE IF NOT EXISTS `jadwaldokters` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `jadwal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dokter` bigint unsigned NOT NULL,
  `poliklnik` bigint unsigned NOT NULL,
  `senin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selasa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rabu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kamis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website.jadwaldokters: ~0 rows (approximately)

-- Dumping structure for table website.jenis_referensis
DROP TABLE IF EXISTS `jenis_referensis`;
CREATE TABLE IF NOT EXISTS `jenis_referensis` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `deskripsi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website.jenis_referensis: ~8 rows (approximately)
REPLACE INTO `jenis_referensis` (`id`, `deskripsi`) VALUES
	(1, 'Nilai'),
	(2, 'Instalasi Rawat Darurat'),
	(3, 'Instalasi Rawat Jalan'),
	(4, 'DOKTER'),
	(5, 'Ruangan/Unit'),
	(6, 'Level Akses'),
	(7, 'Status Waktu Kerusakan'),
	(8, 'Kategori Berita'),
	(9, 'Jam Praktek');

-- Dumping structure for table website.kritiksarans
DROP TABLE IF EXISTS `kritiksarans`;
CREATE TABLE IF NOT EXISTS `kritiksarans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notelepon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kritiksaran` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website.kritiksarans: ~0 rows (approximately)

-- Dumping structure for table website.laporankerusakans
DROP TABLE IF EXISTS `laporankerusakans`;
CREATE TABLE IF NOT EXISTS `laporankerusakans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `pengirim` bigint unsigned NOT NULL,
  `dariruangan` bigint unsigned NOT NULL,
  `tujuanruangan` bigint unsigned NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spesifikasi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alat` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_pelaporan` datetime NOT NULL,
  `waktu_respon` datetime DEFAULT NULL,
  `diterima_oleh` bigint unsigned DEFAULT NULL,
  `status` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website.laporankerusakans: ~2 rows (approximately)
REPLACE INTO `laporankerusakans` (`id`, `pengirim`, `dariruangan`, `tujuanruangan`, `keterangan`, `spesifikasi`, `alat`, `waktu_pelaporan`, `waktu_respon`, `diterima_oleh`, `status`) VALUES
	(1, 218, 16, 1, 'dasdas', 'asdasdas', 'dasdasd', '2023-10-10 16:41:00', NULL, NULL, '1'),
	(2, 218, 1, 1, 'dsdasd', 'dasdasd', 'asdasdas', '2023-10-11 23:11:00', NULL, NULL, '0');

-- Dumping structure for table website.layanans
DROP TABLE IF EXISTS `layanans`;
CREATE TABLE IF NOT EXISTS `layanans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `instalasi` bigint NOT NULL,
  `ruangan` bigint unsigned NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `konten` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pegawai` bigint unsigned NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website.layanans: ~0 rows (approximately)

-- Dumping structure for table website.menu_utamas
DROP TABLE IF EXISTS `menu_utamas`;
CREATE TABLE IF NOT EXISTS `menu_utamas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user` bigint unsigned NOT NULL,
  `judul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `konten` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website.menu_utamas: ~3 rows (approximately)
REPLACE INTO `menu_utamas` (`id`, `user`, `judul`, `konten`, `gambar`, `created_at`, `updated_at`) VALUES
	(5, 1, 'Sejarah Rumah Sakit Dayaku Raja', '<p>Rumah Sakit Umum Daerah Dayaku Raja Kabupaten Kutai Kartanegara merupakan Rumah Sakit milik Pemerintah Kabupaten Kutai Kartanegara Provinsi Kalimantan Timur,&nbsp;RSUD Dayaku Raja yang merupakan RSUD ke 3 milik Pemkab Kukar setelah RSUD AM Parikesit di Tenggarong dan RSUD Batara Agung Dewa Sakti di Kecamatan Samboja,&nbsp;RSUD Dayaku&nbsp;Raja diresmikan pada tanggal 13 Maret 2013 dan berdasarkan Surat Keputusan Bupati Kutai Kartanegara Nomor 37/SK-BUP/HK/2017 tanggal 17 Februari 2017 ditetapkan sebagai BLUD–RSUD dengan status penuh.</p><p>Sejak Agustus 2016 melalui perjanjian kerjasama, RSUD Dayaku Raja bekerjasama dengan BPJS Kesehatan.&nbsp;Rumah Sakit Umum Daerah Dayaku Raja selanjutnya disingkat RSUD Dayaku Raja&nbsp;Unit Organisasi Bersifat Khusus (UOBK) milik Pemerintah Daerah yang menerapkan sistem Badan Layanan Umum Daerah.</p><p>Seiring dengan perkembangan demografi masyarakat, status sosial ekonomi, teknologi dan informasi menyebabkan kesadaran dan harapan masyarakat akan pelayanan kesehatan yang bermutu semakin meningkat. Sebagai rumah sakit yang memiliki kekhususan dalam pengelolaan, RSUD Dayaku Raja dibangun sebagai rumah sakit yang tidak memiliki tarif dan kelas perawatan sehingga seluruh masyarakat memiliki akses untuk mendapatkan pelayanan kesehatan secara gratis.</p><p>Berdasarkan Peraturan Menteri Kesehatand tahun 340 tentang Klasifikasi Rumah Sakit, sebagai rumah sakit tipe&nbsp;D, RSUD Dayaku Raja wajib menyediakan 4 pelayanan spesialis dasar. Saat ini RSUD Dayaku Raja masih bekerja sama dengan dokter spesialis yang berada di RSUD Parikesit dengan jadwal buka pelayanan poliklinik yang disesuaikan dengan jadwal kesepakatan dengan dokter spesialis di RSUD Parikesit.</p><p>RSUD Dayaku Raja perlu menjawab tantangan yang ada kedepannya dengan terus meningkatkan kualitas pelayanan kesehatan di rumah sakit serta menangkap peluang yang ada dengan memberikan pelayanan yang prima walaupun sebagai Rumah Sakit tanpa tarif sesuai dengan kebutuhan masyarakat Dayaku Raja dan sekitarnya.</p><p>Raja. Pada tanggal 11 Desember 2020 Berdasarkan Peraturan Bupati Kutai Kartanegara Nomor&nbsp;73&nbsp;Tahun&nbsp;2020 tentang&nbsp;Perubahan Atas Peraturan Bupati Kutai Kartanegara Nomor 22&nbsp;Tahun&nbsp;2018 tentang Tarif&nbsp; Pelayanan Kesehatan&nbsp;pada Badan Layanan Umum&nbsp; Daerah Rumah Sakit Umum Daerah Dayaku Raja, memberlakukan tarif baru berdasarkan lampiran yang terlampir dalam peraturan tersebut</p>', 'GambarMenuUtama/GoVu5l00uz2KbviotgtSASA7h0ERx3cWcfgxZhJZ.png', NULL, NULL),
	(11, 1, 'Visi Misi Motto dan Nilai Nilai', '<h2><strong>Visi</strong></h2>\r\n\r\n<ul>\r\n	<li>Terwujudnya Rumah Sakit&nbsp;&nbsp;yang&nbsp;Berkualitas&nbsp;dan Terpercaya</li>\r\n</ul>\r\n\r\n<h2><strong>Misi</strong></h2>\r\n\r\n<ol>\r\n	<li>Mengembangkan layanan prima yang dapat meningkatkan kualitas kesehatan masyarakat</li>\r\n	<li>Menyelenggarakan pelayanan paripurna untuk meningkatkan kepuasan pelanggan</li>\r\n	<li>Menyelenggarakan Pendidikan, Pelatihan dan Penelitian, untuk mewujudkan Sumber Daya Manusia yang kompeten dan profesional</li>\r\n	<li>Menerapkan manajemen yang bersih, efektif, efisien dan melayani untuk meningkatkan kesehatan masyarakat</li>\r\n</ol>\r\n\r\n<h2><strong>Motto</strong></h2>\r\n\r\n<p><strong>&ldquo;&nbsp;Menyapa dengan senyum, merawat dengan hati&rdquo;</strong></p>\r\n\r\n<h2><strong>Nilai-Nilai</strong></h2>\r\n\r\n<ol>\r\n	<li>Berorientasi pada pelayanan</li>\r\n	<li>Akuntabel</li>\r\n	<li>Kompeten</li>\r\n	<li>Harmonis</li>\r\n	<li>Loyal</li>\r\n	<li>Adaptif</li>\r\n	<li>Kolaboratif</li>\r\n	<li>Ramah</li>\r\n</ol>\r\n\r\n', NULL, NULL, NULL),
	(15, 1, 'STRUKTUR ORAGANISASI', '<h1>STRUKTUR ORGANISASI RSUD DAYAKU RAJA</h1>\r\n\r\n<p>&quot;</p>\r\n\r\n<p>&quot;</p>\r\n\r\n<p>&quot;</p>', 'GambarMenuUtama/z0Wl3Xa6lqSJuESPbyIgRDtHp4t6L97TJ9nkY3qu.png', NULL, '2023-06-11 04:06:46');

-- Dumping structure for table website.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website.migrations: ~17 rows (approximately)
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(5, '2023_06_07_071436_create_menu_utamas_table', 1),
	(14, '2014_10_12_000000_create_users_table', 2),
	(15, '2014_10_12_100000_create_password_reset_tokens_table', 2),
	(16, '2014_10_12_100000_create_password_resets_table', 2),
	(17, '2019_08_19_000000_create_failed_jobs_table', 2),
	(18, '2019_12_14_000001_create_personal_access_tokens_table', 2),
	(19, '2023_06_09_081727_create_beritas_table', 2),
	(20, '2023_08_24_102652_create_kritiksarans_table', 3),
	(21, '2023_08_24_124207_create_jenis_referensis_table', 4),
	(22, '2023_08_24_124225_create_referensis_table', 4),
	(23, '2023_08_24_152701_create_dokters_table', 5),
	(24, '2023_08_25_094045_add_slug_column_to_berita_table', 6),
	(25, '2023_09_27_202241_add_user_to_pegawai', 7),
	(26, '2023_09_28_152017_pegawai', 8),
	(27, '2023_10_04_062901_create_instalasis_table', 9),
	(28, '2023_10_04_062919_create_ruangans_table', 9),
	(29, '2023_10_06_215423_create_permission_tables', 10),
	(30, '2023_10_09_205423_create_laporankerusakans_table', 11),
	(31, '2023_10_09_205452_create_tindaklanjuts_table', 12),
	(32, '2023_10_11_202029_create_layanans_table', 13),
	(33, '2023_10_20_230546_create_dokumens_table', 14),
	(34, '2024_01_03_095108_create_jadwaldokters_table', 15),
	(35, '2024_01_25_091017_create_carousels_table', 16),
	(36, '2024_03_06_122746_create_direkturs_table', 17);

-- Dumping structure for table website.model_has_permissions
DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website.model_has_permissions: ~17 rows (approximately)
REPLACE INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
	(1, 'App\\Models\\User', 1),
	(1, 'App\\Models\\User', 2),
	(2, 'App\\Models\\User', 2),
	(3, 'App\\Models\\User', 2),
	(2, 'App\\Models\\User', 3),
	(3, 'App\\Models\\User', 3),
	(2, 'App\\Models\\User', 4),
	(3, 'App\\Models\\User', 4),
	(1, 'App\\Models\\User', 5),
	(2, 'App\\Models\\User', 5),
	(3, 'App\\Models\\User', 5),
	(1, 'App\\Models\\User', 6),
	(2, 'App\\Models\\User', 6),
	(3, 'App\\Models\\User', 6),
	(1, 'App\\Models\\User', 7),
	(2, 'App\\Models\\User', 7),
	(3, 'App\\Models\\User', 7);

-- Dumping structure for table website.model_has_roles
DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website.model_has_roles: ~0 rows (approximately)

-- Dumping structure for table website.password_resets
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website.password_resets: ~0 rows (approximately)

-- Dumping structure for table website.password_reset_tokens
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table website.pegawais
DROP TABLE IF EXISTS `pegawais`;
CREATE TABLE IF NOT EXISTS `pegawais` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ruangan` bigint unsigned DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=329 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website.pegawais: ~323 rows (approximately)
REPLACE INTO `pegawais` (`id`, `nama`, `nip`, `ruangan`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Erna Sulastri', 'H197710122013012001', 1, 1, NULL, NULL),
	(2, 'Rina Baya', 'H197804152013012002', 1, 1, NULL, NULL),
	(3, 'Robiannur', 'H197902142013011003', 1, 1, NULL, NULL),
	(4, 'Hijrah', 'H198001012013012004', 1, 1, NULL, NULL),
	(5, 'Heti Diana', 'H198009042013012005', 1, 1, NULL, NULL),
	(6, 'Dedi Aspawiharja', 'H198009282013011006', 1, 1, NULL, NULL),
	(7, 'Mirna Hidayati', 'H198106242013012007', 1, 1, NULL, NULL),
	(8, 'Nurhayati Rahmah', 'H198202062013012008', 1, 1, NULL, NULL),
	(9, 'Purwoko', 'H198206062013011009', 1, 1, NULL, NULL),
	(10, 'Aspiran', 'H198209122013011010', 1, 1, NULL, NULL),
	(11, 'Hendra Permana, S. Hut', 'H198209192013011011', 1, 1, NULL, NULL),
	(12, 'Leni Marlina', 'H198211052013012012', 1, 1, NULL, NULL),
	(13, 'Iman Asnawi, SH', 'H198311062013011013', 1, 1, NULL, NULL),
	(14, 'Neni Susanti', 'H198405132013012014', 1, 1, NULL, NULL),
	(15, 'Jumiatun, S.P', 'H198408032013012015', 1, 1, NULL, NULL),
	(16, 'Muhammad Zulhaidir', 'H198409012013031016', 1, 1, NULL, NULL),
	(17, 'Nurul Hatimah', 'H198412112013012017', 1, 1, NULL, NULL),
	(18, 'Amat', 'H198502072013011018', 1, 1, NULL, NULL),
	(19, 'Nuryati Br. Pasaribu, Amd. Keb', 'H198503272013012019', 1, 1, NULL, NULL),
	(20, 'Jumidah', 'H198506082013012020', 1, 1, NULL, NULL),
	(21, 'Ns. Herman Syam, S. Kep', 'H198510132013011021', 1, 1, NULL, NULL),
	(22, 'Ns. Nurmiati Jafar, S. Kep', 'H198512312013012022', 1, 1, NULL, NULL),
	(23, 'Muhammad Rodi, S. Pd', 'H198601012013011023', 1, 1, NULL, NULL),
	(24, 'Eki Manosa', 'H198601092013011024', 1, 1, NULL, NULL),
	(25, 'Rita Maya', 'H198602072013012025', 1, 1, NULL, NULL),
	(26, 'Yunisa, Amd. Kep', 'H198612172013012026', 1, 1, NULL, NULL),
	(27, 'Rima Amriani Amir, S. Pd', 'H198701142013012027', 1, 1, NULL, NULL),
	(28, 'Melati', 'H198702032013012028', 1, 1, NULL, NULL),
	(29, 'Habibi', 'H198705012013041029', 1, 1, NULL, NULL),
	(30, 'Salma Sulimas, Amd. Kep', 'H198705122013012030', 1, 1, NULL, NULL),
	(31, 'Rusiah', 'H198705142013012031', 1, 1, NULL, NULL),
	(32, 'Padliansyah, S. Pd', 'H198705182013011032', 1, 1, NULL, NULL),
	(33, 'Asmaniah, S. Pd', 'H198706192013012033', 1, 1, NULL, NULL),
	(34, 'Adiansyah', 'H198706262013011034', 1, 1, NULL, NULL),
	(35, 'Ns. Erma Winata, S. Kep', 'H198708182013012035', 1, 1, NULL, NULL),
	(36, 'Muhammad Zaid, SE', 'H198709162013011036', 1, 1, NULL, NULL),
	(37, 'Herlin Harnani', 'H198801252013012037', 1, 1, NULL, NULL),
	(38, 'Lisda Wati', 'H198802022013012038', 1, 1, NULL, NULL),
	(39, 'Rismawati, S. Sos', 'H198802072013012039', 1, 1, NULL, NULL),
	(40, 'Iswan Minardy Idrus, S. Kep', 'H198802262013011040', 1, 1, NULL, NULL),
	(41, 'Sri Ratni', 'H198803102013012041', 1, 1, NULL, NULL),
	(42, 'Fajrian Noor', 'H198804292013011042', 1, 1, NULL, NULL),
	(43, 'Elisda Wahyuni', 'H198806062013012043', 1, 1, NULL, NULL),
	(44, 'Feni Fadila, S. Sos', 'H198806152013012044', 1, 1, NULL, NULL),
	(45, 'Aisah Susanti, S. Sos', 'H198811262013012045', 1, 1, NULL, NULL),
	(46, 'Halimah', 'H198901012013012046', 1, 1, NULL, NULL),
	(47, 'Fandy Ahmad, Amd. Far', 'H198902072013011047', 1, 1, NULL, NULL),
	(48, 'Mirwansyah, Amd. Kep', 'H198903242013011048', 1, 1, NULL, NULL),
	(49, 'Elisa Fitriani, Amd. Keb', 'H198905032013012049', 1, 1, NULL, NULL),
	(50, 'Nur Halimah', 'H198906152013012050', 1, 1, NULL, NULL),
	(51, 'Hardedi Wahyudi', 'H198908152013011051', 1, 1, NULL, NULL),
	(52, 'Ovi Nur Surya, Amd. Kep', 'H198909292013011052', 1, 1, NULL, NULL),
	(53, 'Erlita Budhiarti, SKM', 'H198910032013012053', 1, 1, NULL, NULL),
	(54, 'Trida Octavian Scorpion', 'H198910302013011054', 1, 1, NULL, NULL),
	(55, 'Siti Rukmana, S. Farm', 'H198911042013012055', 1, 1, NULL, NULL),
	(56, 'Heriyani, S. Pd', 'H198911062013012056', 1, 1, NULL, NULL),
	(57, 'Rahmi', 'H198911122013012057', 1, 1, NULL, NULL),
	(58, 'Muhammad Nasrullah', 'H198911142013011058', 1, 1, NULL, NULL),
	(59, 'Mu\'minatun, Amd. AK', 'H198911242013012059', 1, 1, NULL, NULL),
	(60, 'Abdul Rahman', 'H198912122013011060', 1, 1, NULL, NULL),
	(61, 'Hestia Norvita, Amd. Kep', 'H199002022013012061', 1, 1, NULL, NULL),
	(62, 'Akhmad Affandi, S. Kom', 'H199003012013011062', 1, 1, NULL, NULL),
	(63, 'Esy Apriani, S. Pd', 'H199004072013012063', 1, 1, NULL, NULL),
	(64, 'Rahmawati, Amd. Kep', 'H199005222013012064', 1, 1, NULL, NULL),
	(65, 'Misran', 'H199005312013011065', 1, 1, NULL, NULL),
	(66, 'Nur Rahmawati Finni, Amd. Keb', 'H199006112013012066', 1, 1, NULL, NULL),
	(67, 'Miftahul Anisa', 'H199007132013012067', 1, 1, NULL, NULL),
	(68, 'Sandi Karahman', 'H199007182013011068', 1, 1, NULL, NULL),
	(69, 'Martina Yanti Sianipar, Amd. Kep', 'H199007242013012069', 1, 1, NULL, NULL),
	(70, 'Narita Angriani, Amd. Kep', 'H199008222013012070', 1, 1, NULL, NULL),
	(71, 'Andina Sapitri', 'H199010112013012071', 1, 1, NULL, NULL),
	(72, 'Noormina Sari, Amd. Keb', 'H199011262013012072', 1, 1, NULL, NULL),
	(73, 'Khusnun Dwi Syaefudin', 'H199103092013011073', 1, 1, NULL, NULL),
	(74, 'Any Bariyah', 'H199104012013012074', 1, 1, NULL, NULL),
	(75, 'Rutliza Alfrida Hasibuan, Amd. Keb', 'H199104082013012075', 1, 1, NULL, NULL),
	(76, 'Muhammad Hanafi', 'H199104112013011076', 1, 1, NULL, NULL),
	(77, 'Heri Azhari, S. Sos', 'H199105112013011077', 1, 1, NULL, NULL),
	(78, 'Demirza Friadynata, Amd. Kep', 'H199106162013011078', 1, 1, NULL, NULL),
	(79, 'Panji Cipta Rasa', 'H199107062013041079', 1, 1, NULL, NULL),
	(80, 'Reny Ayu Fajriyah, Amd. Keb', 'H199107142013012080', 1, 1, NULL, NULL),
	(81, 'Jumaidiansyah', 'H199107262013011081', 1, 1, NULL, NULL),
	(82, 'Novi Hardianti, Amd. AK', 'H199108012013012082', 1, 1, NULL, NULL),
	(83, 'Bhakti Nur Septika Sari, Amd. Kep', 'H199109052013012083', 1, 1, NULL, NULL),
	(84, 'Oki Nurhuda, Amd. Kep', 'H199110172013011084', 1, 1, NULL, NULL),
	(85, 'Ayu Nursilawati', 'H199112072013012085', 1, 1, NULL, NULL),
	(86, 'Misla', 'H199201252013012086', 1, 1, NULL, NULL),
	(87, 'Normahrita', 'H199202022013012087', 1, 1, NULL, NULL),
	(88, 'Muhammad Ali Yusman', 'H199204072013011088', 1, 1, NULL, NULL),
	(89, 'Afandi', 'H199204212013011089', 1, 1, NULL, NULL),
	(90, 'Afandy Pratama', 'H199209222013011090', 1, 1, NULL, NULL),
	(91, 'Marliyana, Amd. AK', 'H199209292013012091', 1, 1, NULL, NULL),
	(92, 'Hendra Wijaya', 'H199211222013011092', 1, 1, NULL, NULL),
	(93, 'Juwita Nopita Sari', 'H199310062013012093', 1, 1, NULL, NULL),
	(94, 'Muhamad Hudzaifah', 'H199309192013011094', 1, 1, NULL, NULL),
	(95, 'Muhammad Khaidir Ali', 'H199304192013011095', 1, 1, NULL, NULL),
	(96, 'Nur Hariani', 'H199301052013012096', 1, 1, NULL, NULL),
	(97, 'Saptika', 'H199306142013012097', 1, 1, NULL, NULL),
	(98, 'Azizatul Nurjanah', 'H199307132013012098', 1, 1, NULL, NULL),
	(99, 'Zulkhaidir', 'H199307232013011099', 1, 1, NULL, NULL),
	(100, 'Hendra Gunawan', 'H199309292013011100', 1, 1, NULL, NULL),
	(101, 'Haryati', 'H199311022013012101', 1, 1, NULL, NULL),
	(102, 'Eri Yuniarta', 'H198206262013031102', 1, 1, NULL, NULL),
	(103, 'Doni', 'H197901262013041103', 1, 1, NULL, NULL),
	(104, 'Sabrin', 'H198604022013041104', 1, 1, NULL, NULL),
	(105, 'Hirmalasari, S. Sos', 'H198812242013042105', 1, 1, NULL, NULL),
	(106, 'Wahyuni', 'H198711162013072106', 1, 1, NULL, NULL),
	(107, 'Muhammad Nur, Amd. Kep', 'H199103052014011001', 1, 1, NULL, NULL),
	(108, 'Marini, Amd. Kep', 'H198007052014102002', 1, 1, NULL, NULL),
	(109, 'Ns. Hj.Rabiatul Adawiah, S. Kep', 'H198601032014102003', 1, 1, NULL, NULL),
	(110, 'Norhayati, Amd. Kep', 'H198610102014102004', 1, 1, NULL, NULL),
	(111, 'Pebriansyah, Amd. KL', 'H198802242014101005', 1, 1, NULL, NULL),
	(112, 'Tulen Ganna Pabisa, Amd. Kep', 'H199003052014102006', 1, 1, NULL, NULL),
	(113, 'Apt. Iyut Arfianti Putri Anwar, S. Farm.', 'H199003072014102007', 1, 1, NULL, NULL),
	(114, 'Herlinda, Amd. Keb', 'H199008102014102008', 1, 1, NULL, NULL),
	(115, 'Akhmad Mauladin, Amd. Kep', 'H199010042014101009', 1, 1, NULL, NULL),
	(116, 'Rusmini, Amd. Keb', 'H199102082014102010', 1, 1, NULL, NULL),
	(117, 'Riza Fahru Rozi, Amd. KL', 'H199103032014101011', 1, 1, NULL, NULL),
	(118, 'Mariah, Amd. Keb', 'H199105032014102012', 1, 1, NULL, NULL),
	(119, 'Meirinda Susanti, Amd. KL', 'H199105062014102013', 1, 1, NULL, NULL),
	(120, 'Hj. Dewi Risky, Amd. Keb', 'H199108092014102014', 1, 1, NULL, NULL),
	(121, 'Ade Candra Saputra, Amd. Kep', 'H199201192014101015', 1, 1, NULL, NULL),
	(122, 'Lisa Maria Priselia, Amd. Keb', 'H199204222014102016', 1, 1, NULL, NULL),
	(123, 'Endang Trisnawati, Amd. Kep', 'H199208212014102017', 1, 1, NULL, NULL),
	(124, 'Rurin Novita, Amd. Keb', 'H199211282014102018', 1, 1, NULL, NULL),
	(125, 'Atik Zatmikhowati, Amd. Kep', 'H199303082014102019', 1, 1, NULL, NULL),
	(126, 'Eka Nur Afriani, SKM', 'H198704092014122020', 1, 1, NULL, NULL),
	(127, 'Rifa\' Atul Mahmudah, SKM', 'H198803032014122021', 1, 1, NULL, NULL),
	(128, 'Ns. Sudarmono, S. Kep', 'H198803112014121022', 1, 1, NULL, NULL),
	(129, 'Syahril Anwar, Amd. Kep', 'H198906032014121023', 1, 1, NULL, NULL),
	(130, 'Ns. Yulista Rombe Layuk, S. Kep', 'H199007182014122024', 1, 1, NULL, NULL),
	(131, 'Gajali Rahman, Amd. Kep', 'H199210122014121025', 1, 1, NULL, NULL),
	(132, 'Rahmat Mukhlisin, Amd. Kep', 'H199301282014121026', 1, 1, NULL, NULL),
	(133, 'Muhammad Fairil Ruza, Amd. Kep', 'H199302072014121027', 1, 1, NULL, NULL),
	(134, 'Daniel Dorus, Amd. AK', 'H199303302014121028', 1, 1, NULL, NULL),
	(135, 'Muhammad Ridho, Amd. Kep', 'H199312222014121029', 1, 1, NULL, NULL),
	(136, 'Thamrin', 'H197010132015111001', 1, 1, NULL, NULL),
	(137, 'Dedi Hadianto', 'H197304172015111002', 1, 1, NULL, NULL),
	(138, 'Robiah', 'H197410172015112003', 1, 1, NULL, NULL),
	(139, 'Midiyanti', 'H197506022015112004', 1, 1, NULL, NULL),
	(140, 'Ibnu Subhan', 'H197509262015111005', 1, 1, NULL, NULL),
	(141, 'Azwar', 'H197610172015111006', 1, 1, NULL, NULL),
	(142, 'Reni Sari Nurulita, Amd', 'H197701112015112007', 1, 1, NULL, NULL),
	(143, 'Heldi Friandi', 'H197701192015111008', 1, 1, NULL, NULL),
	(144, 'Misnah', 'H197706102015112009', 1, 1, NULL, NULL),
	(145, 'Rita Diananur', 'H197801012015112010', 1, 1, NULL, NULL),
	(146, 'Edisi Marzuki', 'H197904042015111011', 1, 1, NULL, NULL),
	(147, 'Nana Diana, SE', 'H197905162015112012', 1, 1, NULL, NULL),
	(148, 'Tomi Abdullah Hidayat', 'H197912142015111013', 1, 1, NULL, NULL),
	(149, 'Joni Santoso', 'H197912152015111014', 1, 1, NULL, NULL),
	(150, 'Aspian Nur, S. Sos', 'H198003032015111015', 1, 1, NULL, NULL),
	(151, 'Epi Lukmiwati', 'H198011042015112016', 1, 1, NULL, NULL),
	(152, 'Subardi, Amd', 'H198105142015111017', 1, 1, NULL, NULL),
	(153, 'Rolly AB', 'H198107292015111018', 1, 1, NULL, NULL),
	(154, 'Beni Rahman', 'H198108142015111019', 1, 1, NULL, NULL),
	(155, 'Raihanah, Amd', 'H198110162015112020', 1, 1, NULL, NULL),
	(156, 'Jubaini', 'H198112072015112021', 1, 1, NULL, NULL),
	(157, 'Zulkifli', 'H198203022015111022', 1, 1, NULL, NULL),
	(158, 'Irhan', 'H198203062015111023', 1, 1, NULL, NULL),
	(159, 'Martina', 'H198206012015112024', 1, 1, NULL, NULL),
	(160, 'Deni', 'H198301122015111025', 1, 1, NULL, NULL),
	(161, 'Linda', 'H198303032015112026', 1, 1, NULL, NULL),
	(162, 'Hetti Kustinawati', 'H198308142015112027', 1, 1, NULL, NULL),
	(163, 'Agustina Amir', 'H198308272015112028', 1, 1, NULL, NULL),
	(164, 'Rohaimah', 'H198404212015112029', 1, 1, NULL, NULL),
	(165, 'Irma Suryani', 'H198411102015112030', 1, 1, NULL, NULL),
	(166, 'Zulkifli', 'H198501032015111031', 1, 1, NULL, NULL),
	(167, 'Syahruddin', 'H198503272015111032', 1, 1, NULL, NULL),
	(168, 'Hetmi', 'H198504152015112033', 1, 1, NULL, NULL),
	(169, 'Muhammad Faisal Fartoni', 'H198601202015111034', 1, 1, NULL, NULL),
	(170, 'Haidir Hafid, Amd', 'H198608102015111035', 1, 1, NULL, NULL),
	(171, 'Yoso Andy Wijaya, S. Sos', 'H198701252015111036', 1, 1, NULL, NULL),
	(172, 'Hairil Anwar, S. ST', 'H198702042015111037', 1, 1, NULL, NULL),
	(173, 'Hairil Anwar', 'H198703222015111038', 1, 1, NULL, NULL),
	(174, 'Evi Kristina', 'H198707052015112039', 1, 1, NULL, NULL),
	(175, 'Iskandar Taufik', 'H198707062015111040', 1, 1, NULL, NULL),
	(176, 'Rakhmawati Ningsih, SE', 'H198709272015112041', 1, 1, NULL, NULL),
	(177, 'Wawan Setiawan', 'H198802162015111042', 1, 1, NULL, NULL),
	(178, 'Hartami Apriani, Amd. AK', 'H198804212015112043', 1, 1, NULL, NULL),
	(179, 'Riva Santoso, Amd. Kep', 'H198806242015111044', 1, 1, NULL, NULL),
	(180, 'Akhmad Fauzi', 'H198808262015111045', 1, 1, NULL, NULL),
	(181, 'Novi Faridatul Nurhana', 'H198812142015112046', 1, 1, NULL, NULL),
	(182, 'Muzi Burrakhman, S. Kom', 'H198812172015111047', 1, 1, NULL, NULL),
	(183, 'Dwi Utami, S. Farm', 'H198901052015112048', 1, 1, NULL, NULL),
	(184, 'Prima Hadi Saputra, Amd. Kep', 'H198902032015111049', 1, 1, NULL, NULL),
	(185, 'Mahmud, Amd. Kep', 'H198906242015111050', 1, 1, NULL, NULL),
	(186, 'Linda Rahmawati, Amd. Keb', 'H198909202015112051', 1, 1, NULL, NULL),
	(187, 'Ruspita Dewi, S. Sos', 'H198909272015112052', 1, 1, NULL, NULL),
	(188, 'M. Andryan Pratama', 'H199003292015111053', 1, 1, NULL, NULL),
	(189, 'Samsiah', 'H199004022015112054', 1, 1, NULL, NULL),
	(190, 'Nita Ayutri, SH', 'H199004082015112055', 1, 1, NULL, NULL),
	(191, 'Apriadi Ramdani, SE', 'H199004092015111056', 1, 1, NULL, NULL),
	(192, 'Cusnul Comariah, Amd. Keb', 'H199004112015112057', 1, 1, NULL, NULL),
	(193, 'Meilia Andini, S. Sos', 'H199005072015112058', 1, 1, NULL, NULL),
	(194, 'Rahmat Sholeh, S. Kom', 'H199005142015111059', 1, 1, NULL, NULL),
	(195, 'Muhammad Sukriadi, S. Pd. I', 'H199005282015111060', 1, 1, NULL, NULL),
	(196, 'Hana Mardina, S. Sos', 'H199006132015112061', 1, 1, NULL, NULL),
	(197, 'Herlena Essy Phitri, Amd. Kep', 'H199006252015112062', 1, 1, NULL, NULL),
	(198, 'M. Abdillah Rahman S, Amd. Kep', 'H199007052015111063', 1, 1, NULL, NULL),
	(199, 'M. Murdani, S. Sos', 'H199008132015111064', 1, 1, NULL, NULL),
	(200, 'Rini Wardani, S. IP', 'H199010052015112065', 1, 1, NULL, NULL),
	(201, 'Darna Tursinawati, Amd. Keb', 'H199012042015112066', 1, 1, NULL, NULL),
	(202, 'Fransiskus Andreas, AMd Rad', 'H199102022015111067', 1, 1, NULL, NULL),
	(203, 'Muhammad Febriansyah, S. Sos', 'H199102222015111068', 1, 1, NULL, NULL),
	(204, 'Pebriyani Jahrah', 'H199102272015112069', 1, 1, NULL, NULL),
	(205, 'Faris Maulana Sahar', 'H199103052015111070', 1, 1, NULL, NULL),
	(206, 'Hairullah', 'H199103172015111071', 1, 1, NULL, NULL),
	(207, 'Juliana', 'H199104022015112072', 1, 1, NULL, NULL),
	(208, 'Jumratul Hasanah', 'H199105162015112073', 1, 1, NULL, NULL),
	(209, 'Maya Ariyanti, Amd. Keb', 'H199105292015112074', 1, 1, NULL, NULL),
	(210, 'Niko Dokot', 'H199106162015111075', 1, 1, NULL, NULL),
	(211, 'Zainal Bahar, Amd. Far', 'H199106172015111076', 1, 1, NULL, NULL),
	(212, 'Muhammad Alkahfi Nur Elfandy', 'H199106252015111077', 1, 1, NULL, NULL),
	(213, 'Deni Irawan', 'H199108042015111078', 1, 1, NULL, NULL),
	(214, 'Era Setia Wati, Amd Keb', 'H199109292015112079', 1, 1, NULL, NULL),
	(215, 'Arisyuda Praditya, Amd. Kep', 'H199110122015111080', 1, 1, NULL, NULL),
	(216, 'Risfan Nurhafizh', 'H199112062015111081', 1, 1, NULL, NULL),
	(217, 'Maya Sari', 'H199201012015112082', 1, 1, NULL, NULL),
	(218, 'Ragil M. Rivandi, S. Kom', 'H199204042015111083', 1, 1, NULL, NULL),
	(219, 'Sinta Dewi, Amd. Kep', 'H199204212015112084', 1, 1, NULL, NULL),
	(220, 'Halimah Sa\'diyah, Amd. AK', 'H199205102015112085', 1, 1, NULL, NULL),
	(221, 'Neni Narisa Putri, Amd. Far', 'H199206302015112086', 1, 1, NULL, NULL),
	(222, 'Lisnawati', 'H199207052015112087', 1, 1, NULL, NULL),
	(223, 'Putri Ermi Karmiati, Amd. Keb', 'H199210052015112088', 1, 1, NULL, NULL),
	(224, 'Nurita, Amd. Far', 'H199211182015112089', 1, 1, NULL, NULL),
	(225, 'Novita Anggraini, Amd. Keb', 'H199211262015112090', 1, 1, NULL, NULL),
	(226, 'Dina Mustika', 'H199302062015112091', 1, 1, NULL, NULL),
	(227, 'Amrullah Hamidi, AMTE', 'H199302132015111092', 1, 1, NULL, NULL),
	(228, 'Uswatun Nurul Hasanah, Amd. Kep', 'H199303232015112093', 1, 1, NULL, NULL),
	(229, 'Yorizal Saputra', 'H199306102015111094', 1, 1, NULL, NULL),
	(230, 'Ferly Juniar', 'H199306162015112095', 1, 1, NULL, NULL),
	(231, 'Sinta Tri Radiani, Amd. Keb', 'H199307162015112096', 1, 1, NULL, NULL),
	(232, 'Sherlie Restiani, Amd. Keb', 'H199307212015112097', 1, 1, NULL, NULL),
	(233, 'Neneng Rahayu, Amd. Keb', 'H199308192015112098', 1, 1, NULL, NULL),
	(234, 'Muhammad Iqbal Suzufi, Amd. Kep', 'H199309092015111099', 1, 1, NULL, NULL),
	(235, 'Nirwana Fajriani, Amd. AK', 'H199309222015112100', 1, 1, NULL, NULL),
	(236, 'Devi Septia Ayu Ningrum, Amd. RMIK', 'H199309232015112101', 1, 1, NULL, NULL),
	(237, 'Nor Hikmah Fajar', 'H199309292015112102', 1, 1, NULL, NULL),
	(238, 'Ary Adyawati, Amd. Kep', 'H199309302015112103', 1, 1, NULL, NULL),
	(239, 'Tutut, Amd. Keb', 'H199310272015112104', 1, 1, NULL, NULL),
	(240, 'Ida Novia Wulandari, Amd. Keb', 'H199311092015112105', 1, 1, NULL, NULL),
	(241, 'Siti Hardianti', 'H199312282015112106', 1, 1, NULL, NULL),
	(242, 'Hesriyadi Ayub, Amd. Kep', 'H199401102015111107', 1, 1, NULL, NULL),
	(243, 'Andri Saputra', 'H199401312015111108', 1, 1, NULL, NULL),
	(244, 'Mifta Arinda Listiyanti, Amd. Keb', 'H199403152015112109', 1, 1, NULL, NULL),
	(245, 'Mega Selvina', 'H199404112015112110', 1, 1, NULL, NULL),
	(246, 'Rizka Aprilia Sari, Amd. Keb', 'H199404132015112111', 1, 1, NULL, NULL),
	(247, 'Faisal Afif Giyats Asri', 'H199404272015111112', 1, 1, NULL, NULL),
	(248, 'Almuttaqin, Amd. Kep', 'H199406102015111113', 1, 1, NULL, NULL),
	(249, 'Faisal Wilmarul Fazrin, Amd. Kep', 'H199406132015111114', 1, 1, NULL, NULL),
	(250, 'Lisa Herdina', 'H199406182015112115', 1, 1, NULL, NULL),
	(251, 'Eko Hari Sejahtera, Amd Rad', 'H199406292015111116', 1, 1, NULL, NULL),
	(252, 'Risa, Amd. Keb', 'H199407142015112117', 1, 1, NULL, NULL),
	(253, 'Muhammad Jumadil M. Nur, Amd. Kep', 'H199408122015111118', 1, 1, NULL, NULL),
	(254, 'Evi Maulidia, Amd. Kep', 'H199408142015112119', 1, 1, NULL, NULL),
	(255, 'Yusran', 'H199409152015111120', 1, 1, NULL, NULL),
	(256, 'Rysa Dwi Khusuma Wijayanti, Amd. Kep', 'H199411132015112121', 1, 1, NULL, NULL),
	(257, 'Rizqa Sukmawati Pertiwi, Amd.AK', 'H199412282015112122', 1, 1, NULL, NULL),
	(258, 'Rizki Fahrodan Alfajri', 'H199502152015111123', 1, 1, NULL, NULL),
	(259, 'Aidil Fitri, Amd. Kep', 'H199503032015111124', 1, 1, NULL, NULL),
	(260, 'Rangga Arisandi', 'H199503032015111125', 1, 1, NULL, NULL),
	(261, 'Muhammad Rusdiansyah', 'H199503252015111126', 1, 1, NULL, NULL),
	(262, 'Hendi Setiawan', 'H199505172015111127', 1, 1, NULL, NULL),
	(263, 'Siti Rahmah', 'H199506262015112128', 1, 1, NULL, NULL),
	(264, 'Meerly Qabillah', 'H199507242015112129', 1, 1, NULL, NULL),
	(265, 'Billy Nusqan Infitarruzaman', 'H199512062015111130', 1, 1, NULL, NULL),
	(266, 'Dwi Ratna Sari', 'H199605222015112131', 1, 1, NULL, NULL),
	(267, 'Pardian Nur', 'H199606192015111132', 1, 1, NULL, NULL),
	(268, 'Padliansyah', 'H199610032015111133', 1, 1, NULL, NULL),
	(269, 'Muhammad Rizky', 'H199705122015111134', 1, 1, NULL, NULL),
	(270, 'Husnul Huda', 'H199709082015111135', 1, 1, NULL, NULL),
	(271, 'dr. Wirsal Indra Wijaya Gea', 'H199207112018011001', 1, 1, NULL, NULL),
	(272, 'dr. Muhammad Gufran', 'H198711082018071002', 1, 1, NULL, NULL),
	(273, 'Siti Aminah, SKM', 'H199201012020012001', 1, 1, NULL, NULL),
	(274, 'Dedy Ismanuddin, Amd. Kep', 'H199512132020011002', 1, 1, NULL, NULL),
	(275, 'Resty Nurjannah, Amd. Kep', 'H199512232020012003', 1, 1, NULL, NULL),
	(276, 'Chairunnisa Aisyah, Amd. Farm', 'H199612262020012004', 1, 1, NULL, NULL),
	(277, 'Apt. Putri Rizki Sari, S. Farm', 'H199209042020122001', 1, 1, NULL, NULL),
	(278, 'Ns. Ahmad Nuzhan Effendi, S. Kep', 'H199511052020121002', 1, 1, NULL, NULL),
	(279, 'Ns. Tiara Febrina, S. Kep', 'H199303122020122003', 1, 1, NULL, NULL),
	(280, 'Ns. Muhammad Darmawan, S. Kep', 'H199310012020121004', 1, 1, NULL, NULL),
	(281, 'Miranti Wulandari, Amd. Keb', 'H199310032020122005', 1, 1, NULL, NULL),
	(282, 'Yulischa Marinda Ping, Amd. Kep', 'H199402102020122006', 1, 1, NULL, NULL),
	(283, 'Ns. Siti Rahmah, S. Kep', 'H199409112020122007', 1, 1, NULL, NULL),
	(284, 'Putri Norita Nugraha, A.Md. Kep', 'H199411102020122008', 1, 1, NULL, NULL),
	(285, 'Ns. Eri Mustika Ratu, S. Kep', 'H199505302020122009', 1, 1, NULL, NULL),
	(286, 'Arifuddin Nur, A.Md. Kep', 'H199510012020121010', 1, 1, NULL, NULL),
	(287, 'Raudah, A.Md. Far', 'H199512032020122011', 1, 1, NULL, NULL),
	(288, 'Wulandari Desilia, A.Md. Keb', 'H199512042020122012', 1, 1, NULL, NULL),
	(289, 'Ade Nur Handayani, A.Md. Kep', 'H199512312020122013', 1, 1, NULL, NULL),
	(290, 'Surya Fatma, A.Md. AK', 'H199601072020122014', 1, 1, NULL, NULL),
	(291, 'Venty Malinda, A.Md. Kep', 'H199611052020122015', 1, 1, NULL, NULL),
	(292, 'Dewy Ariyani, A.Md. Kep', 'H199702212020122016', 1, 1, NULL, NULL),
	(293, 'Nita Dasiani Avianisa, S. Gz', 'H199705112020122017', 1, 1, NULL, NULL),
	(294, 'Desi Eliyani, A.Md. Kep', 'H199708132020122018', 1, 1, NULL, NULL),
	(295, 'Wigia Miranda, A.Md. AK', 'H199709212020122019', 1, 1, NULL, NULL),
	(296, 'Nirwanda, A.Md. Kep', 'H199710152020121020', 1, 1, NULL, NULL),
	(297, 'Muhammad Sainudin Noor, S.Tr. AK', 'H199712132020121021', 1, 1, NULL, NULL),
	(298, 'M. Fachri, A.Md. Kep', 'H199802212020121022', 1, 1, NULL, NULL),
	(299, 'Elia Meika, A.Md. Farm', 'H199805072020122023', 1, 1, NULL, NULL),
	(300, 'Sri Hartati, A.Md. Farm', 'H199808072020122024', 1, 1, NULL, NULL),
	(301, 'Siska Irani Palloan, A.Md. Farm', 'H199808232020122025', 1, 1, NULL, NULL),
	(302, 'dr. Muhammad Noor Fitriansyah', 'H199204042021091001', 1, 1, NULL, NULL),
	(303, 'dr. Safrina', 'H199502182021092002', 1, 1, NULL, NULL),
	(304, 'Nira Febriani, A.Md. AK', 'H199602292021012003', 1, 1, NULL, NULL),
	(305, 'Mita Mutiara Nurviani, A.Md. Kep', 'H199603252021012004', 1, 1, NULL, NULL),
	(306, 'Sasnian, A.Md. Keb', 'H199609122021012005', 1, 1, NULL, NULL),
	(307, 'Belinda Apriani, Amd. AK', 'H199804042021012006', 1, 1, NULL, NULL),
	(308, 'Taufik Kurahman, Amd. Kes', 'H199902212021011007', 1, 1, NULL, NULL),
	(309, 'dr. Herman Syah Putra Nasution,Sp. B', 'H198710012022011001', 1, 1, NULL, NULL),
	(310, 'Khoirul Hadipranoto, Amd. Kep', 'H199012122022011002', 1, 1, NULL, NULL),
	(311, 'dr. Ni Made Hendrayati Surany', 'H199412142022012003', 1, 1, NULL, NULL),
	(312, 'dr. Daniel Aprianto Sihotang', 'H199604112022011004', 1, 1, NULL, NULL),
	(313, 'Ns. Indah Novita Sari, S. Kep', 'H199611092022012005', 1, 1, NULL, NULL),
	(314, 'Ns. Yesi Alpiani, S. Kep', 'H199704172022012006', 1, 1, NULL, NULL),
	(315, 'Jusni Kumala Sari, Amd. Kes', 'H199903192022012007', 1, 1, NULL, NULL),
	(316, 'Felsa Nabila, Amd. RMIK', 'H200010242022012008', 1, 1, NULL, NULL),
	(317, 'Fitri Febrianti, A.Md.Kes', 'H199912182022032009', 1, 1, NULL, NULL),
	(318, 'dr. Refi Yulistian. Sp., Pd', 'H198407042022041010', 1, 1, NULL, NULL),
	(319, 'dr. Rosalia Desi Susanto, Sp. A', 'H198212172022062011', 1, 1, NULL, NULL),
	(320, 'dr. Wandi Wardani Ardi', 'H199208102022061012', 1, 1, NULL, NULL),
	(321, 'dr. Peter Turmandito', 'H199505192022071013', 1, 1, NULL, NULL),
	(322, 'Apt. Dwi Agung Prastyo, S. Farm', 'H199602202023011001', 1, 1, NULL, NULL),
	(323, 'Apt. Muhammad Ansar, S. Farm', 'H199605192023011002', 1, 1, NULL, NULL);

-- Dumping structure for table website.permissions
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website.permissions: ~14 rows (approximately)
REPLACE INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'DashBoardDokumen', 'web', NULL, NULL),
	(2, 'DashboardPelaporan', 'web', NULL, NULL),
	(3, 'DashboardMenuUtama', 'web', NULL, NULL),
	(4, 'DashboardInstalasi', 'web', NULL, NULL),
	(5, 'DashboardCreateInstalasi', 'web', NULL, NULL),
	(6, 'DashboardEditInstalasi', 'web', NULL, NULL),
	(7, 'DashboardBerita', 'web', NULL, NULL),
	(8, 'DashboardDokter', 'web', NULL, NULL),
	(9, 'DashboardLaporan', 'web', NULL, NULL),
	(10, 'DashboardPegawai', 'web', NULL, NULL),
	(11, 'DasboardCreateEditPegawai', 'web', NULL, NULL),
	(12, 'DashboardCreateEditUsername', 'web', NULL, NULL),
	(13, 'DashboardLaporanKerusakan', 'web', NULL, NULL),
	(14, 'DashBoardDokumenCreate/Hapus', 'web', NULL, NULL);

-- Dumping structure for table website.personal_access_tokens
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`) USING BTREE,
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table website.referensis
DROP TABLE IF EXISTS `referensis`;
CREATE TABLE IF NOT EXISTS `referensis` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `jenisreferensi` bigint unsigned NOT NULL,
  `deskripsi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website.referensis: ~30 rows (approximately)
REPLACE INTO `referensis` (`id`, `jenisreferensi`, `deskripsi`) VALUES
	(1, 1, 'Sangat Buruk'),
	(2, 1, 'Buruk'),
	(3, 1, 'Cukup'),
	(4, 1, 'Baik'),
	(5, 1, 'Sangat Baik'),
	(6, 4, 'UMUM'),
	(7, 4, 'PENYAKIT DALAM'),
	(8, 4, 'KANDUNGAN'),
	(9, 4, 'ANAK'),
	(10, 4, 'BEDAH UMUM'),
	(11, 4, 'MATA'),
	(12, 4, 'GIGI'),
	(13, 4, 'ANASTESI'),
	(14, 4, 'RADIOLOGI'),
	(15, 4, 'PATALOGI KLINIK'),
	(16, 5, 'SIMRS'),
	(17, 5, 'HUMAS'),
	(18, 5, 'Mutu'),
	(19, 5, 'PKRS'),
	(20, 5, 'Umum Dan Kepegawaian'),
	(21, 5, 'Binatu'),
	(22, 5, 'Gizi'),
	(23, 6, 'Level 1'),
	(24, 6, 'Level 2'),
	(25, 6, 'Level 3'),
	(26, 2, 'Unit Gawat Darurat'),
	(27, 7, 'Belum Di Respon'),
	(28, 7, 'Di Terima'),
	(29, 7, 'Selesai'),
	(30, 8, 'Umum'),
	(31, 8, 'Kesehatan'),
	(32, 9, '08.00 - 15.00'),
	(33, 9, 'Tidak Pelayanan');

-- Dumping structure for table website.roles
DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website.roles: ~2 rows (approximately)
REPLACE INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'Level 1', 'web', NULL, NULL),
	(2, 'Level 2', 'web', NULL, NULL),
	(3, 'Level 3', 'web', NULL, NULL);

-- Dumping structure for table website.role_has_permissions
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website.role_has_permissions: ~0 rows (approximately)

-- Dumping structure for table website.ruangans
DROP TABLE IF EXISTS `ruangans`;
CREATE TABLE IF NOT EXISTS `ruangans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `instalasi` bigint unsigned NOT NULL,
  `ruangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penerima_order` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website.ruangans: ~18 rows (approximately)
REPLACE INTO `ruangans` (`id`, `instalasi`, `ruangan`, `penerima_order`, `status`) VALUES
	(1, 15, 'Unit SIMRS', 0, 1),
	(2, 1, 'Unit Gawat Darurat', 0, 1),
	(3, 1, 'Unit Ambulan dan Pemulasaran Jenazah', 0, 1),
	(4, 2, 'Rawat Inap Anak', 0, 1),
	(5, 2, 'Rawat Inap Dewasa', 0, 1),
	(6, 2, 'Rawat Inap Maternitas', 0, 1),
	(7, 4, 'ICU dan HCU', 0, 1),
	(8, 3, 'Poli Penyakit Dalam', 0, 1),
	(9, 3, 'Poli Kandungan', 0, 1),
	(10, 3, 'Poli Bedah Umum', 0, 1),
	(11, 3, 'Poli Mata', 0, 1),
	(12, 3, 'Poli Anak', 0, 1),
	(17, 3, 'Poliklinik Penyakit Dalam', 0, 1),
	(18, 3, 'Poliklinik Bedah Umum', 0, 1),
	(19, 3, 'Poliklinik Anak', 0, 1),
	(20, 3, 'Poliklinik Mata', 0, 1),
	(21, 4, 'ICU DAN HCU', 0, 1),
	(22, 6, 'Radiologi', 0, 1),
	(23, 7, 'Laboratorium', 0, 1);

-- Dumping structure for table website.tindaklanjuts
DROP TABLE IF EXISTS `tindaklanjuts`;
CREATE TABLE IF NOT EXISTS `tindaklanjuts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `notiket` bigint unsigned NOT NULL,
  `kegiatan_survei` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penyebab_rusak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kodisi_alat` bigint unsigned NOT NULL,
  `hasil_perbaikan` bigint unsigned NOT NULL,
  `rekomendasi` bigint unsigned NOT NULL,
  `petugas_pemeriksa` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website.tindaklanjuts: ~0 rows (approximately)

-- Dumping structure for table website.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `pegawai_id` bigint unsigned NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `akses` bigint unsigned DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table website.users: ~6 rows (approximately)
REPLACE INTO `users` (`id`, `pegawai_id`, `username`, `password`, `status`, `akses`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 1, 'erna', '$2y$10$vPsGLmZjgriNHbOXBD3L9ePBpM4vFY4ZBtbztizisbfgI4yvsoOK.', 1, 23, NULL, NULL, NULL),
	(2, 218, 'immedy', '$2y$10$1mLOWNypiGu/YBRg41t60.COBg9oMg/AmsYHAIMcDBSHdW.1P3sUO', 1, 24, NULL, NULL, NULL),
	(3, 2, 'rina_baya', '$2y$10$7a7jWX3uBjtiErxnD6O.0eI8QFRSBbxmeAaZ5n7owsime69BohmlS', 1, 25, NULL, NULL, NULL),
	(4, 3, 'robi', '$2y$10$x2T.Jmr6UJ4vmEtLcNiswug4zXtq3D9Tn6r9gwp3id0eDrfY.V0gW', 1, 24, NULL, NULL, NULL),
	(5, 4, 'Hijrah', '$2y$10$0pMprdmNURqR4sF14uW/9ODE4i2Td8wqZj7P8V4ahxd7/koQFkGsO', 1, 25, NULL, NULL, NULL),
	(6, 5, 'heti', '$2y$10$oCmQYiDZG6Dl8D6zEKf68uQ5kr88JnUcUa6fN.MBW85aRiO2ARvKy', 1, NULL, NULL, NULL, NULL),
	(7, 94, 'hudzaifah', '$2y$10$AC61lAttRK6ZRSdYrCi6ZuWyjw0u5T6Hc5oIMwnJ6QjiqQHeDUud.', 1, NULL, NULL, NULL, NULL),
	(8, 6, 'heti1', '$2y$10$Zd9xNO5JiRzS6zyKAhkRV.kungEmvcgMdpVnfIXOrwSyf7mxFWQ/G', 1, NULL, NULL, NULL, NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
