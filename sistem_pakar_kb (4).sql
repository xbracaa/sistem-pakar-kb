-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 13, 2026 at 03:24 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_pakar_kb`
--

-- --------------------------------------------------------

--
-- Table structure for table `aturans`
--

CREATE TABLE `aturans` (
  `id` bigint UNSIGNED NOT NULL,
  `id_aturan` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `premis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `konklusi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_mec` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cf_pakar` double NOT NULL,
  `alasan_medis` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aturans`
--

INSERT INTO `aturans` (`id`, `id_aturan`, `premis`, `konklusi`, `kategori_mec`, `cf_pakar`, `alasan_medis`, `created_at`, `updated_at`) VALUES
(1, 'R01', 'K05 AND K07', 'M01', '1', 0.88, 'Dapat digunakan dengan aman. Kondisi sehat / fisik normal (tanpa komplikasi penyerta), tekanan darah normal yang dialami pasien tidak menjadi halangan besar untuk metode ini.', '2026-06-10 06:28:13', '2026-07-09 09:28:16'),
(2, 'R02', 'K05 AND K07', 'M02', '1', 0.85, 'Metode ini aman untuk digunakan karena manfaat medisnya jauh lebih besar dibandingkan risiko pada pasien dengan riwayat sehat / fisik normal (tanpa komplikasi penyerta), tekanan darah normal.', '2026-06-10 06:28:13', '2026-07-09 09:28:16'),
(3, 'R03', 'K05 AND K06', 'M05', '1', 0.9, 'Dapat digunakan dengan aman. Kondisi sehat / fisik normal (tanpa komplikasi penyerta), siklus haid teratur yang dialami pasien tidak menjadi halangan besar untuk metode ini.', '2026-06-10 06:28:13', '2026-07-09 09:28:16'),
(4, 'R04', 'K05 AND K06', 'M04', '1', 0.85, 'Dapat digunakan dengan aman. Kondisi sehat / fisik normal (tanpa komplikasi penyerta), siklus haid teratur yang dialami pasien tidak menjadi halangan besar untuk metode ini.', '2026-06-10 06:28:13', '2026-07-09 09:28:16'),
(5, 'R05', 'K05 AND K07 AND K06', 'M09', '1', 0.82, 'Meskipun pasien memiliki profil sehat / fisik normal (tanpa komplikasi penyerta), tekanan darah normal, siklus haid teratur, metode ini tetap diklasifikasikan aman dan direkomendasikan secara klinis.', '2026-06-10 06:28:13', '2026-07-09 09:28:16'),
(6, 'R06', 'K05 AND K07 AND K06', 'M10', '1', 0.8, 'Meskipun pasien memiliki profil sehat / fisik normal (tanpa komplikasi penyerta), tekanan darah normal, siklus haid teratur, metode ini tetap diklasifikasikan aman dan direkomendasikan secara klinis.', '2026-06-10 06:28:13', '2026-07-09 09:28:16'),
(8, 'R08', 'K03 AND K29', 'M03', '1', 0.85, 'Metode ini aman untuk digunakan karena manfaat medisnya jauh lebih besar dibandingkan risiko pada pasien dengan riwayat sedang menyusui (umum), pasca persalinan >= 4 minggu.', '2026-06-10 06:28:13', '2026-07-09 09:28:16'),
(9, 'R09', 'K03 AND K29', 'M07', '1', 0.88, 'Dapat digunakan dengan aman. Kondisi sedang menyusui (umum), pasca persalinan >= 4 minggu yang dialami pasien tidak menjadi halangan besar untuk metode ini.', '2026-06-10 06:28:13', '2026-07-09 09:28:16'),
(10, 'R10', 'K03 AND K29', 'M01', '1', 0.86, 'Meskipun pasien memiliki profil sedang menyusui (umum), pasca persalinan >= 4 minggu, metode ini tetap diklasifikasikan aman dan direkomendasikan secara klinis.', '2026-06-10 06:28:13', '2026-07-09 09:28:16'),
(11, 'R11', 'K28 AND K29', 'M01', '1', 0.88, 'Metode ini aman untuk digunakan karena manfaat medisnya jauh lebih besar dibandingkan risiko pada pasien dengan riwayat menyusui secara eksklusif, pasca persalinan >= 4 minggu.', '2026-06-10 06:28:13', '2026-07-09 09:28:16'),
(12, 'R12', 'K28 AND K29', 'M06', '1', 0.92, 'Metode ini aman untuk digunakan karena manfaat medisnya jauh lebih besar dibandingkan risiko pada pasien dengan riwayat menyusui secara eksklusif, pasca persalinan >= 4 minggu.', '2026-06-10 06:28:13', '2026-07-09 09:28:16'),
(13, 'R13', 'K13 AND K18', 'M01', '1', 0.92, 'Dapat digunakan dengan aman. Kondisi ingin jarak kehamilan panjang, butuh perlindungan jangka panjang (5-10 tahun) yang dialami pasien tidak menjadi halangan besar untuk metode ini.', '2026-06-10 06:28:13', '2026-07-09 09:28:16'),
(14, 'R14', 'K13 AND K18', 'M02', '1', 0.9, 'Metode ini aman untuk digunakan karena manfaat medisnya jauh lebih besar dibandingkan risiko pada pasien dengan riwayat ingin jarak kehamilan panjang, butuh perlindungan jangka panjang (5-10 tahun).', '2026-06-10 06:28:13', '2026-07-09 09:28:16'),
(15, 'R15', 'K13 AND K18', 'M07', '1', 0.88, 'Metode ini aman untuk digunakan karena manfaat medisnya jauh lebih besar dibandingkan risiko pada pasien dengan riwayat ingin jarak kehamilan panjang, butuh perlindungan jangka panjang (5-10 tahun).', '2026-06-10 06:28:13', '2026-07-09 09:28:16'),
(16, 'R16', 'K04 AND K20', 'M07', '1', 0.88, 'Dapat digunakan dengan aman. Kondisi ingin menunda kehamilan, butuh perlindungan menengah (3 tahun) yang dialami pasien tidak menjadi halangan besar untuk metode ini.', '2026-06-10 06:28:13', '2026-07-09 09:28:16'),
(17, 'R17', 'K04 AND K20', 'M03', '1', 0.85, 'Metode ini aman untuk digunakan karena manfaat medisnya jauh lebih besar dibandingkan risiko pada pasien dengan riwayat ingin menunda kehamilan, butuh perlindungan menengah (3 tahun).', '2026-06-10 06:28:13', '2026-07-09 09:28:16'),
(18, 'R18', 'K12 AND K22', 'M01', '1', 0.92, 'Dapat digunakan dengan aman. Kondisi memiliki anak lebih dari 3, butuh efektivitas perlindungan tinggi yang dialami pasien tidak menjadi halangan besar untuk metode ini.', '2026-06-10 06:28:13', '2026-07-09 09:28:16'),
(19, 'R19', 'K12 AND K22', 'M02', '1', 0.9, 'Dapat digunakan dengan aman. Kondisi memiliki anak lebih dari 3, butuh efektivitas perlindungan tinggi yang dialami pasien tidak menjadi halangan besar untuk metode ini.', '2026-06-10 06:28:13', '2026-07-09 09:28:16'),
(20, 'R20', 'K12 AND K22', 'M07', '1', 0.88, 'Meskipun pasien memiliki profil memiliki anak lebih dari 3, butuh efektivitas perlindungan tinggi, metode ini tetap diklasifikasikan aman dan direkomendasikan secara klinis.', '2026-06-10 06:28:13', '2026-07-09 09:28:16'),
(24, 'R24', 'K05 AND K23', 'M05', '1', 0.88, 'Meskipun pasien memiliki profil sehat / fisik normal (tanpa komplikasi penyerta), memiliki kedisiplinan tinggi (rutin minum obat), metode ini tetap diklasifikasikan aman dan direkomendasikan secara klinis.', '2026-06-10 06:28:13', '2026-07-09 09:28:16'),
(25, 'R25', 'K05 AND K23', 'M06', '1', 0.85, 'Meskipun pasien memiliki profil sehat / fisik normal (tanpa komplikasi penyerta), memiliki kedisiplinan tinggi (rutin minum obat), metode ini tetap diklasifikasikan aman dan direkomendasikan secara klinis.', '2026-06-10 06:28:13', '2026-07-09 09:28:16'),
(26, 'R26', 'K21 AND K22', 'M01', '1', 0.92, 'Meskipun pasien memiliki profil takut pada efek samping hormonal, butuh efektivitas perlindungan tinggi, metode ini tetap diklasifikasikan aman dan direkomendasikan secara klinis.', '2026-06-10 06:28:13', '2026-07-09 09:28:16'),
(27, 'R27', 'K21', 'M08', '1', 0.78, 'Metode ini aman untuk digunakan karena manfaat medisnya jauh lebih besar dibandingkan risiko pada pasien dengan riwayat takut pada efek samping hormonal.', '2026-06-10 06:28:13', '2026-07-09 09:28:16'),
(28, 'R28', 'K16 AND K17', 'M01', '1', 0.85, 'Meskipun pasien memiliki profil menderita diabetes < 20 tahun, tanpa komplikasi (ginjal/mata/saraf), metode ini tetap diklasifikasikan aman dan direkomendasikan secara klinis.', '2026-06-10 06:28:13', '2026-07-09 09:28:16'),
(29, 'R29', 'K16 AND K17', 'M06', '2', 0.78, 'Meskipun pasien memiliki profil menderita diabetes < 20 tahun, tanpa komplikasi (ginjal/mata/saraf), metode ini tetap diklasifikasikan aman dan direkomendasikan secara klinis.', '2026-06-10 06:28:13', '2026-07-09 09:28:16'),
(31, 'R31', 'K16 AND K17', 'M07', '2', 0.78, 'Meskipun pasien memiliki profil menderita diabetes < 20 tahun, tanpa komplikasi (ginjal/mata/saraf), metode ini tetap diklasifikasikan aman dan direkomendasikan secara klinis.', '2026-06-10 06:28:13', '2026-07-09 09:28:16'),
(32, 'R32', 'K09', 'M01', '1', 0.82, 'Dapat digunakan dengan aman. Kondisi hipertensi ringan (sistolik 140-159 atau diastolik 90-99 mmhg) yang dialami pasien tidak menjadi halangan besar untuk metode ini.', '2026-06-10 06:28:13', '2026-07-09 09:28:16'),
(33, 'R33', 'K09', 'M03', '2', 0.72, 'Metode ini aman untuk digunakan karena manfaat medisnya jauh lebih besar dibandingkan risiko pada pasien dengan riwayat hipertensi ringan (sistolik 140-159 atau diastolik 90-99 mmhg).', '2026-06-10 06:28:13', '2026-07-09 09:28:16'),
(34, 'R34', 'K09', 'M06', '1', 0.75, 'Metode ini aman untuk digunakan karena manfaat medisnya jauh lebih besar dibandingkan risiko pada pasien dengan riwayat hipertensi ringan (sistolik 140-159 atau diastolik 90-99 mmhg).', '2026-06-10 06:28:13', '2026-07-09 09:28:16'),
(35, 'R35', 'K09', 'M07', '1', 0.78, 'Meskipun pasien memiliki profil hipertensi ringan (sistolik 140-159 atau diastolik 90-99 mmhg), metode ini tetap diklasifikasikan aman dan direkomendasikan secara klinis.', '2026-06-10 06:28:13', '2026-07-09 09:28:16'),
(36, 'R36', 'K09', 'M08', '1', 0.7, 'Meskipun pasien memiliki profil hipertensi ringan (sistolik 140-159 atau diastolik 90-99 mmhg), metode ini tetap diklasifikasikan aman dan direkomendasikan secara klinis.', '2026-06-10 06:28:13', '2026-07-09 09:28:16'),
(37, 'R37', 'K08', 'M01', '1', 0.82, 'Dapat digunakan dengan aman. Kondisi obesitas yang dialami pasien tidak menjadi halangan besar untuk metode ini.', '2026-06-10 06:28:13', '2026-07-09 09:28:16'),
(38, 'R38', 'K08', 'M07', '1', 0.78, 'Meskipun pasien memiliki profil obesitas, metode ini tetap diklasifikasikan aman dan direkomendasikan secara klinis.', '2026-06-10 06:28:13', '2026-07-09 09:28:16'),
(39, 'R39', 'K08', 'M02', '1', 0.78, 'Dapat digunakan dengan aman. Kondisi obesitas yang dialami pasien tidak menjadi halangan besar untuk metode ini.', '2026-06-10 06:28:13', '2026-07-09 09:28:16'),
(41, 'R41', 'K39', 'M03', '1', 0.78, 'Dapat digunakan dengan aman. Kondisi anemia (defisiensi besi) / riwayat anemia yang dialami pasien tidak menjadi halangan besar untuk metode ini.', '2026-06-10 06:28:13', '2026-07-09 09:28:16'),
(42, 'R42', 'K39', 'M05', '1', 0.75, 'Metode ini aman untuk digunakan karena manfaat medisnya jauh lebih besar dibandingkan risiko pada pasien dengan riwayat anemia (defisiensi besi) / riwayat anemia.', '2026-06-10 06:28:13', '2026-07-09 09:28:16'),
(43, 'R43', 'K49', 'M01', '1', 0.85, 'Dapat digunakan dengan aman. Kondisi pasca keguguran (trimester 1 atau 2) tanpa komplikasi infeksi yang dialami pasien tidak menjadi halangan besar untuk metode ini.', '2026-06-10 06:28:13', '2026-07-09 09:28:16'),
(44, 'R44', 'K49', 'M05', '1', 0.82, 'Dapat digunakan dengan aman. Kondisi pasca keguguran (trimester 1 atau 2) tanpa komplikasi infeksi yang dialami pasien tidak menjadi halangan besar untuk metode ini.', '2026-06-10 06:28:13', '2026-07-09 09:28:16'),
(45, 'R45', 'K49', 'M07', '1', 0.8, 'Meskipun pasien memiliki profil pasca keguguran (trimester 1 atau 2) tanpa komplikasi infeksi, metode ini tetap diklasifikasikan aman dan direkomendasikan secara klinis.', '2026-06-10 06:28:13', '2026-07-09 09:28:16'),
(46, 'R46', 'K50', 'M08', '1', 0.92, 'Metode ini aman untuk digunakan karena manfaat medisnya jauh lebih besar dibandingkan risiko pada pasien dengan riwayat terinfeksi hiv klinis stabil & terapi arv rutin.', '2026-06-10 06:28:13', '2026-07-09 09:28:16'),
(47, 'R47', 'K50', 'M01', '1', 0.8, 'Dapat digunakan dengan aman. Kondisi terinfeksi hiv klinis stabil & terapi arv rutin yang dialami pasien tidak menjadi halangan besar untuk metode ini.', '2026-06-10 06:28:13', '2026-07-09 09:28:16'),
(48, 'R48', 'K50', 'M03', '1', 0.75, 'Meskipun pasien memiliki profil terinfeksi hiv klinis stabil & terapi arv rutin, metode ini tetap diklasifikasikan aman dan direkomendasikan secara klinis.', '2026-06-10 06:28:13', '2026-07-09 09:28:16'),
(50, 'R50', 'K36', 'M03', '2', 0.72, 'Dapat digunakan dengan aman. Kondisi migrain tanpa aura yang dialami pasien tidak menjadi halangan besar untuk metode ini.', '2026-06-10 06:28:13', '2026-07-09 09:28:16'),
(51, 'R51', 'K36', 'M01', '1', 0.8, 'Dapat digunakan dengan aman. Kondisi migrain tanpa aura yang dialami pasien tidak menjadi halangan besar untuk metode ini.', '2026-06-10 06:28:13', '2026-07-09 09:28:16'),
(52, 'R52', 'K10', 'M01', '1', 0.82, 'Metode ini aman untuk digunakan karena manfaat medisnya jauh lebih besar dibandingkan risiko pada pasien dengan riwayat terdapat benjolan payudara jinak (non-kanker).', '2026-06-10 06:28:13', '2026-07-09 09:28:16'),
(53, 'R53', 'K10', 'M08', '1', 0.75, 'Meskipun pasien memiliki profil terdapat benjolan payudara jinak (non-kanker), metode ini tetap diklasifikasikan aman dan direkomendasikan secara klinis.', '2026-06-10 06:28:13', '2026-07-09 09:28:16'),
(54, 'R54', 'K25', 'M08', '1', 0.85, 'Dapat digunakan dengan aman. Kondisi data anamnesa medis pasien tidak lengkap yang dialami pasien tidak menjadi halangan besar untuk metode ini.', '2026-06-10 06:28:13', '2026-07-09 09:28:16'),
(56, 'R56', 'K51', 'M01', '1', 0.82, 'Metode ini aman untuk digunakan karena manfaat medisnya jauh lebih besar dibandingkan risiko pada pasien dengan riwayat kanker payudara dengan masa remisi > 5 tahun (tanpa kekambuhan).', '2026-06-10 06:28:13', '2026-07-09 09:28:16'),
(57, 'R57', 'K51', 'M08', '1', 0.78, 'Dapat digunakan dengan aman. Kondisi kanker payudara dengan masa remisi > 5 tahun (tanpa kekambuhan) yang dialami pasien tidak menjadi halangan besar untuk metode ini.', '2026-06-10 06:28:13', '2026-07-09 09:28:16'),
(58, 'R58', 'K52', 'M01', '1', 0.85, 'Metode ini aman untuk digunakan karena manfaat medisnya jauh lebih besar dibandingkan risiko pada pasien dengan riwayat sedang mengonsumsi obat tbc (rifampisin).', '2026-06-10 06:28:13', '2026-07-09 09:28:16'),
(59, 'R59', 'K52', 'M08', '1', 0.8, 'Meskipun pasien memiliki profil sedang mengonsumsi obat tbc (rifampisin), metode ini tetap diklasifikasikan aman dan direkomendasikan secara klinis.', '2026-06-10 06:28:13', '2026-07-09 09:28:16'),
(61, 'R61', 'K47', 'M01', '1', 0.85, 'Dapat digunakan dengan aman. Kondisi konsumsi rutin obat anti-kejang / epilepsi (karbamazepin, dll) yang dialami pasien tidak menjadi halangan besar untuk metode ini.', '2026-06-10 06:28:13', '2026-07-09 09:28:17'),
(62, 'R62', 'K47', 'M03', '1', 0.78, 'Metode ini aman untuk digunakan karena manfaat medisnya jauh lebih besar dibandingkan risiko pada pasien dengan riwayat konsumsi rutin obat anti-kejang / epilepsi (karbamazepin, dll).', '2026-06-10 06:28:13', '2026-07-09 09:28:17'),
(63, 'R63', 'K47', 'M02', '1', 0.82, 'Dapat digunakan dengan aman. Kondisi konsumsi rutin obat anti-kejang / epilepsi (karbamazepin, dll) yang dialami pasien tidak menjadi halangan besar untuk metode ini.', '2026-06-10 06:28:13', '2026-07-09 09:28:17'),
(64, 'R64', 'K53', 'M01', '1', 0.82, 'Meskipun pasien memiliki profil memiliki penyakit kandung empedu (aktif diobati), metode ini tetap diklasifikasikan aman dan direkomendasikan secara klinis.', '2026-06-10 06:28:13', '2026-07-09 09:28:17'),
(65, 'R65', 'K53', 'M03', '2', 0.72, 'Metode ini aman untuk digunakan karena manfaat medisnya jauh lebih besar dibandingkan risiko pada pasien dengan riwayat memiliki penyakit kandung empedu (aktif diobati).', '2026-06-10 06:28:13', '2026-07-09 09:28:17'),
(66, 'R66', 'K55 AND K54', 'M05', '2', 0.65, 'Dapat digunakan dengan aman. Kondisi usia < 35 tahun, merokok aktif (umum) yang dialami pasien tidak menjadi halangan besar untuk metode ini.', '2026-06-10 06:28:13', '2026-07-09 09:28:17'),
(67, 'R67', 'K55 AND K54', 'M03', '1', 0.78, 'Meskipun pasien memiliki profil usia < 35 tahun, merokok aktif (umum), metode ini tetap diklasifikasikan aman dan direkomendasikan secara klinis.', '2026-06-10 06:28:13', '2026-07-09 09:28:17'),
(68, 'R68', 'K55 AND K54', 'M01', '1', 0.82, 'Dapat digunakan dengan aman. Kondisi usia < 35 tahun, merokok aktif (umum) yang dialami pasien tidak menjadi halangan besar untuk metode ini.', '2026-06-10 06:28:13', '2026-07-09 09:28:17'),
(69, 'R69', 'K27', 'M06', '1', 0.82, 'Dapat digunakan dengan aman. Kondisi pasca persalinan < 21 hari yang dialami pasien tidak menjadi halangan besar untuk metode ini.', '2026-06-10 06:28:13', '2026-07-09 09:28:17'),
(70, 'R70', 'K27', 'M03', '1', 0.78, 'Metode ini aman untuk digunakan karena manfaat medisnya jauh lebih besar dibandingkan risiko pada pasien dengan riwayat pasca persalinan < 21 hari.', '2026-06-10 06:28:13', '2026-07-09 09:28:17'),
(71, 'R71', 'K27', 'M07', '1', 0.8, 'Meskipun pasien memiliki profil pasca persalinan < 21 hari, metode ini tetap diklasifikasikan aman dan direkomendasikan secara klinis.', '2026-06-10 06:28:13', '2026-07-09 09:28:17'),
(73, 'R73', 'K56', 'M08', '1', 0.85, 'Dapat digunakan dengan aman. Kondisi baru mengalami keguguran / aborsi (< 7 hari) yang dialami pasien tidak menjadi halangan besar untuk metode ini.', '2026-06-10 06:28:13', '2026-07-09 09:28:17'),
(75, 'R75', 'K26', 'M08', '1', 0.85, 'Meskipun pasien memiliki profil punya komorbiditas/penyakit kronis berat, metode ini tetap diklasifikasikan aman dan direkomendasikan secara klinis.', '2026-06-10 06:28:13', '2026-07-09 09:28:17'),
(76, 'R76', 'K26', 'M01', '1', 0.72, 'Meskipun pasien memiliki profil punya komorbiditas/penyakit kronis berat, metode ini tetap diklasifikasikan aman dan direkomendasikan secara klinis.', '2026-06-10 06:28:13', '2026-07-09 09:28:17'),
(77, 'R77', 'K11', 'M05', '4', -1, 'Berdasarkan standar medis WHO, metode ini haram digunakan karena dapat memicu komplikasi fatal pada penderita terdapat kanker payudara aktif.', '2026-06-10 06:28:13', '2026-07-09 09:28:17'),
(78, 'R78', 'K11', 'M06', '4', -1, 'Kontraindikasi absolut! Pasien dengan riwayat terdapat kanker payudara aktif sama sekali tidak boleh menggunakan metode ini secara medis.', '2026-06-10 06:28:13', '2026-07-09 09:28:17'),
(79, 'R79', 'K11', 'M02', '4', -1, 'DILARANG MUTLAK (MEC 4). Penggunaan metode ini sangat berbahaya dan berisiko tinggi mengancam jiwa atau memperparah kondisi terdapat kanker payudara aktif pasien.', '2026-06-10 06:28:13', '2026-07-09 09:28:17'),
(80, 'R80', 'K11', 'M03', '4', -1, 'Kontraindikasi absolut! Pasien dengan riwayat terdapat kanker payudara aktif sama sekali tidak boleh menggunakan metode ini secara medis.', '2026-06-10 06:28:13', '2026-07-09 09:28:17'),
(81, 'R81', 'K11', 'M07', '4', -1, 'DILARANG MUTLAK (MEC 4). Penggunaan metode ini sangat berbahaya dan berisiko tinggi mengancam jiwa atau memperparah kondisi terdapat kanker payudara aktif pasien.', '2026-06-10 06:28:13', '2026-07-09 09:28:17'),
(82, 'R82', 'K11', 'M04', '4', -1, 'DILARANG MUTLAK (MEC 4). Penggunaan metode ini sangat berbahaya dan berisiko tinggi mengancam jiwa atau memperparah kondisi terdapat kanker payudara aktif pasien.', '2026-06-10 06:28:13', '2026-07-09 09:28:17'),
(83, 'R83', 'K11', 'M09', '4', -1, 'Berdasarkan standar medis WHO, metode ini haram digunakan karena dapat memicu komplikasi fatal pada penderita terdapat kanker payudara aktif.', '2026-06-10 06:28:13', '2026-07-09 09:28:17'),
(84, 'R84', 'K11', 'M10', '4', -1, 'Kontraindikasi absolut! Pasien dengan riwayat terdapat kanker payudara aktif sama sekali tidak boleh menggunakan metode ini secara medis.', '2026-06-10 06:28:13', '2026-07-09 09:28:17'),
(85, 'R85', 'K32', 'M05', '4', -1, 'DILARANG MUTLAK (MEC 4). Penggunaan metode ini sangat berbahaya dan berisiko tinggi mengancam jiwa atau memperparah kondisi hipertensi berat (sistolik >= 160 atau diastolik >= 100 mmhg) pasien.', '2026-06-10 06:28:13', '2026-07-09 09:28:17'),
(86, 'R86', 'K32', 'M04', '4', -1, 'Kontraindikasi absolut! Pasien dengan riwayat hipertensi berat (sistolik >= 160 atau diastolik >= 100 mmhg) sama sekali tidak boleh menggunakan metode ini secara medis.', '2026-06-10 06:28:13', '2026-07-09 09:28:17'),
(87, 'R87', 'K32', 'M09', '4', -1, 'Berdasarkan standar medis WHO, metode ini haram digunakan karena dapat memicu komplikasi fatal pada penderita hipertensi berat (sistolik >= 160 atau diastolik >= 100 mmhg).', '2026-06-10 06:28:13', '2026-07-09 09:28:17'),
(88, 'R88', 'K32', 'M10', '4', -1, 'Berdasarkan standar medis WHO, metode ini haram digunakan karena dapat memicu komplikasi fatal pada penderita hipertensi berat (sistolik >= 160 atau diastolik >= 100 mmhg).', '2026-06-10 06:28:13', '2026-07-09 09:28:17'),
(89, 'R89', 'K33', 'M05', '4', -1, 'DILARANG MUTLAK (MEC 4). Penggunaan metode ini sangat berbahaya dan berisiko tinggi mengancam jiwa atau memperparah kondisi riwayat penyakit jantung iskemik pasien.', '2026-06-10 06:28:13', '2026-07-09 09:28:17'),
(90, 'R90', 'K33', 'M04', '4', -1, 'Kontraindikasi absolut! Pasien dengan riwayat riwayat penyakit jantung iskemik sama sekali tidak boleh menggunakan metode ini secara medis.', '2026-06-10 06:28:13', '2026-07-09 09:28:17'),
(91, 'R91', 'K33', 'M09', '4', -1, 'Berdasarkan standar medis WHO, metode ini haram digunakan karena dapat memicu komplikasi fatal pada penderita riwayat penyakit jantung iskemik.', '2026-06-10 06:28:13', '2026-07-09 09:28:17'),
(92, 'R92', 'K33', 'M10', '4', -1, 'Kontraindikasi absolut! Pasien dengan riwayat riwayat penyakit jantung iskemik sama sekali tidak boleh menggunakan metode ini secara medis.', '2026-06-10 06:28:13', '2026-07-09 09:28:17'),
(93, 'R93', 'K34', 'M05', '4', -1, 'DILARANG MUTLAK (MEC 4). Penggunaan metode ini sangat berbahaya dan berisiko tinggi mengancam jiwa atau memperparah kondisi riwayat stroke pasien.', '2026-06-10 06:28:13', '2026-07-09 09:28:17'),
(94, 'R94', 'K34', 'M04', '4', -1, 'DILARANG MUTLAK (MEC 4). Penggunaan metode ini sangat berbahaya dan berisiko tinggi mengancam jiwa atau memperparah kondisi riwayat stroke pasien.', '2026-06-10 06:28:13', '2026-07-09 09:28:17'),
(95, 'R95', 'K34', 'M09', '4', -1, 'Berdasarkan standar medis WHO, metode ini haram digunakan karena dapat memicu komplikasi fatal pada penderita riwayat stroke.', '2026-06-10 06:28:13', '2026-07-09 09:28:17'),
(96, 'R96', 'K34', 'M10', '4', -1, 'DILARANG MUTLAK (MEC 4). Penggunaan metode ini sangat berbahaya dan berisiko tinggi mengancam jiwa atau memperparah kondisi riwayat stroke pasien.', '2026-06-10 06:28:13', '2026-07-09 09:28:17'),
(97, 'R97', 'K35', 'M05', '4', -1, 'Berdasarkan standar medis WHO, metode ini haram digunakan karena dapat memicu komplikasi fatal pada penderita migrain dengan aura (gangguan saraf tepi/visual).', '2026-06-10 06:28:13', '2026-07-09 09:28:17'),
(98, 'R98', 'K35', 'M04', '4', -1, 'Berdasarkan standar medis WHO, metode ini haram digunakan karena dapat memicu komplikasi fatal pada penderita migrain dengan aura (gangguan saraf tepi/visual).', '2026-06-10 06:28:13', '2026-07-09 09:28:17'),
(99, 'R99', 'K35', 'M09', '4', -1, 'DILARANG MUTLAK (MEC 4). Penggunaan metode ini sangat berbahaya dan berisiko tinggi mengancam jiwa atau memperparah kondisi migrain dengan aura (gangguan saraf tepi/visual) pasien.', '2026-06-10 06:28:13', '2026-07-09 09:28:17'),
(100, 'RA0', 'K35', 'M10', '4', -1, 'Berdasarkan standar medis WHO, metode ini haram digunakan karena dapat memicu komplikasi fatal pada penderita migrain dengan aura (gangguan saraf tepi/visual).', '2026-06-10 06:28:13', '2026-07-09 09:28:17'),
(101, 'RA1', 'K40', 'M05', '4', -1, 'Berdasarkan standar medis WHO, metode ini haram digunakan karena dapat memicu komplikasi fatal pada penderita sedang menderita / riwayat trombosis vena dalam (dvt) / emboli paru.', '2026-06-10 06:28:13', '2026-07-09 09:28:17'),
(102, 'RA2', 'K40', 'M04', '4', -1, 'Berdasarkan standar medis WHO, metode ini haram digunakan karena dapat memicu komplikasi fatal pada penderita sedang menderita / riwayat trombosis vena dalam (dvt) / emboli paru.', '2026-06-10 06:28:13', '2026-07-09 09:28:17'),
(103, 'RA3', 'K40', 'M09', '4', -1, 'Berdasarkan standar medis WHO, metode ini haram digunakan karena dapat memicu komplikasi fatal pada penderita sedang menderita / riwayat trombosis vena dalam (dvt) / emboli paru.', '2026-06-10 06:28:13', '2026-07-09 09:28:17'),
(104, 'RA4', 'K40', 'M10', '4', -1, 'Berdasarkan standar medis WHO, metode ini haram digunakan karena dapat memicu komplikasi fatal pada penderita sedang menderita / riwayat trombosis vena dalam (dvt) / emboli paru.', '2026-06-10 06:28:13', '2026-07-09 09:28:17'),
(105, 'RA5', 'K43', 'M05', '4', -1, 'Berdasarkan standar medis WHO, metode ini haram digunakan karena dapat memicu komplikasi fatal pada penderita sirosis hati dekompensata (berat).', '2026-06-10 06:28:13', '2026-07-09 09:28:17'),
(106, 'RA6', 'K43', 'M04', '4', -1, 'Berdasarkan standar medis WHO, metode ini haram digunakan karena dapat memicu komplikasi fatal pada penderita sirosis hati dekompensata (berat).', '2026-06-10 06:28:13', '2026-07-09 09:28:17'),
(107, 'RA7', 'K44', 'M05', '4', -1, 'Berdasarkan standar medis WHO, metode ini haram digunakan karena dapat memicu komplikasi fatal pada penderita tumor / kanker hati.', '2026-06-10 06:28:13', '2026-07-09 09:28:17'),
(108, 'RA8', 'K44', 'M04', '4', -1, 'Berdasarkan standar medis WHO, metode ini haram digunakan karena dapat memicu komplikasi fatal pada penderita tumor / kanker hati.', '2026-06-10 06:28:13', '2026-07-09 09:28:17'),
(109, 'RA9', 'K45', 'M05', '4', -1, 'Berdasarkan standar medis WHO, metode ini haram digunakan karena dapat memicu komplikasi fatal pada penderita lupus (sle) dengan antibodi antifosfolipid positif.', '2026-06-10 06:28:13', '2026-07-09 09:28:17'),
(110, 'RB0', 'K45', 'M04', '4', -1, 'Berdasarkan standar medis WHO, metode ini haram digunakan karena dapat memicu komplikasi fatal pada penderita lupus (sle) dengan antibodi antifosfolipid positif.', '2026-06-10 06:28:13', '2026-07-09 09:28:17'),
(111, 'RB1', 'K45', 'M09', '4', -1, 'Berdasarkan standar medis WHO, metode ini haram digunakan karena dapat memicu komplikasi fatal pada penderita lupus (sle) dengan antibodi antifosfolipid positif.', '2026-06-10 06:28:13', '2026-07-09 09:28:17'),
(112, 'RB2', 'K45', 'M10', '4', -1, 'Berdasarkan standar medis WHO, metode ini haram digunakan karena dapat memicu komplikasi fatal pada penderita lupus (sle) dengan antibodi antifosfolipid positif.', '2026-06-10 06:28:13', '2026-07-09 09:28:17'),
(113, 'RB3', 'K30 AND K31', 'M05', '4', -1, 'Berdasarkan standar medis WHO, metode ini haram digunakan karena dapat memicu komplikasi fatal pada penderita usia >= 35 tahun, merokok >= 15 batang/hari.', '2026-06-10 06:28:13', '2026-07-09 09:28:17'),
(114, 'RB4', 'K30 AND K31', 'M04', '4', -1, 'Berdasarkan standar medis WHO, metode ini haram digunakan karena dapat memicu komplikasi fatal pada penderita usia >= 35 tahun, merokok >= 15 batang/hari.', '2026-06-10 06:28:14', '2026-07-09 09:28:17'),
(115, 'RB5', 'K30 AND K31', 'M09', '4', -1, 'Berdasarkan standar medis WHO, metode ini haram digunakan karena dapat memicu komplikasi fatal pada penderita usia >= 35 tahun, merokok >= 15 batang/hari.', '2026-06-10 06:28:14', '2026-07-09 09:28:17'),
(116, 'RB6', 'K30 AND K31', 'M10', '4', -1, 'Berdasarkan standar medis WHO, metode ini haram digunakan karena dapat memicu komplikasi fatal pada penderita usia >= 35 tahun, merokok >= 15 batang/hari.', '2026-06-10 06:28:14', '2026-07-09 09:28:17'),
(117, 'RB7', 'K48', 'M05', '4', -1, 'Berdasarkan standar medis WHO, metode ini haram digunakan karena dapat memicu komplikasi fatal pada penderita multi-risiko kardiovaskular (tua + merokok + hipertensi).', '2026-06-10 06:28:14', '2026-07-09 09:28:17'),
(118, 'RB8', 'K48', 'M04', '4', -1, 'Berdasarkan standar medis WHO, metode ini haram digunakan karena dapat memicu komplikasi fatal pada penderita multi-risiko kardiovaskular (tua + merokok + hipertensi).', '2026-06-10 06:28:14', '2026-07-09 09:28:17'),
(119, 'RB9', 'K48', 'M09', '4', -1, 'Berdasarkan standar medis WHO, metode ini haram digunakan karena dapat memicu komplikasi fatal pada penderita multi-risiko kardiovaskular (tua + merokok + hipertensi).', '2026-06-10 06:28:14', '2026-07-09 09:28:17'),
(120, 'RC0', 'K48', 'M10', '4', -1, 'Berdasarkan standar medis WHO, metode ini haram digunakan karena dapat memicu komplikasi fatal pada penderita multi-risiko kardiovaskular (tua + merokok + hipertensi).', '2026-06-10 06:28:14', '2026-07-09 09:28:17'),
(121, 'RC1', 'K41 AND K42', 'M05', '4', -1, 'Berdasarkan standar medis WHO, metode ini haram digunakan karena dapat memicu komplikasi fatal pada penderita menderita diabetes > 20 tahun, terdapat komplikasi diabetes (nefropati/retinopati/neuropati).', '2026-06-10 06:28:14', '2026-07-09 09:28:17'),
(122, 'RC2', 'K41 AND K42', 'M04', '4', -1, 'Berdasarkan standar medis WHO, metode ini haram digunakan karena dapat memicu komplikasi fatal pada penderita menderita diabetes > 20 tahun, terdapat komplikasi diabetes (nefropati/retinopati/neuropati).', '2026-06-10 06:28:14', '2026-07-09 09:28:17'),
(123, 'RC3', 'K27', 'M05', '4', -1, 'Berdasarkan standar medis WHO, metode ini haram digunakan karena dapat memicu komplikasi fatal pada penderita pasca persalinan < 21 hari.', '2026-06-10 06:28:14', '2026-07-09 09:28:17'),
(124, 'RC4', 'K27', 'M04', '4', -1, 'Berdasarkan standar medis WHO, metode ini haram digunakan karena dapat memicu komplikasi fatal pada penderita pasca persalinan < 21 hari.', '2026-06-10 06:28:14', '2026-07-09 09:28:17'),
(125, 'RC5', 'K27', 'M09', '4', -1, 'Berdasarkan standar medis WHO, metode ini haram digunakan karena dapat memicu komplikasi fatal pada penderita pasca persalinan < 21 hari.', '2026-06-10 06:28:14', '2026-07-09 09:28:17'),
(126, 'RC6', 'K27', 'M10', '4', -1, 'Berdasarkan standar medis WHO, metode ini haram digunakan karena dapat memicu komplikasi fatal pada penderita pasca persalinan < 21 hari.', '2026-06-10 06:28:14', '2026-07-09 09:28:17'),
(127, 'RC7', 'K46', 'M01', '4', -1, 'Berdasarkan standar medis WHO, metode ini haram digunakan karena dapat memicu komplikasi fatal pada penderita penyakit radang panggul (pid) aktif / servisitis.', '2026-06-10 06:28:14', '2026-07-09 09:28:17'),
(128, 'RC8', 'K46', 'M02', '4', -1, 'Berdasarkan standar medis WHO, metode ini haram digunakan karena dapat memicu komplikasi fatal pada penderita penyakit radang panggul (pid) aktif / servisitis.', '2026-06-10 06:28:14', '2026-07-09 09:28:17'),
(129, 'RC9', 'K37', 'M01', '3', -0.7, 'Tidak dianjurkan. Secara medis, metode ini memiliki interaksi negatif dengan kondisi pendarahan vagina tidak wajar (belum dievaluasi).', '2026-06-10 06:28:14', '2026-07-09 09:28:17'),
(130, 'RD0', 'K37', 'M02', '3', -0.7, 'Tidak dianjurkan. Secara medis, metode ini memiliki interaksi negatif dengan kondisi pendarahan vagina tidak wajar (belum dievaluasi).', '2026-06-10 06:28:14', '2026-07-09 09:28:17'),
(131, 'RD1', 'K38', 'M01', '3', -0.6, 'Tidak dianjurkan. Secara medis, metode ini memiliki interaksi negatif dengan kondisi kanker serviks (menunggu pengobatan bedah/radiasi).', '2026-06-10 06:28:14', '2026-07-09 09:28:17'),
(132, 'RD2', 'K38', 'M02', '3', -0.6, 'Tidak dianjurkan. Secara medis, metode ini memiliki interaksi negatif dengan kondisi kanker serviks (menunggu pengobatan bedah/radiasi).', '2026-06-10 06:28:14', '2026-07-09 09:28:17'),
(133, 'RD3', 'K03', 'M05', '4', -1, 'Berdasarkan standar medis WHO, metode ini haram digunakan karena dapat memicu komplikasi fatal pada penderita sedang menyusui (umum).', '2026-06-10 06:28:14', '2026-07-09 09:28:17'),
(134, 'RD4', 'K03', 'M04', '4', -1, 'Berdasarkan standar medis WHO, metode ini haram digunakan karena dapat memicu komplikasi fatal pada penderita sedang menyusui (umum).', '2026-06-10 06:28:14', '2026-07-09 09:28:17'),
(135, 'RD5', 'K03', 'M09', '4', -1, 'Berdasarkan standar medis WHO, metode ini haram digunakan karena dapat memicu komplikasi fatal pada penderita sedang menyusui (umum).', '2026-06-10 06:28:14', '2026-07-09 09:28:17'),
(136, 'RD6', 'K03', 'M10', '4', -1, 'Berdasarkan standar medis WHO, metode ini haram digunakan karena dapat memicu komplikasi fatal pada penderita sedang menyusui (umum).', '2026-06-10 06:28:14', '2026-07-09 09:28:17'),
(137, 'RD7', 'K01', 'M05', '3', -0.6, 'Tidak dianjurkan. Secara medis, metode ini memiliki interaksi negatif dengan kondisi hipertensi (umum).', '2026-06-10 06:28:14', '2026-07-09 09:28:17'),
(138, 'RD8', 'K01', 'M04', '3', -0.6, 'Tidak dianjurkan. Secara medis, metode ini memiliki interaksi negatif dengan kondisi hipertensi (umum).', '2026-06-10 06:28:14', '2026-07-09 09:28:17'),
(139, 'RD9', 'K02', 'M05', '4', -1, 'Berdasarkan standar medis WHO, metode ini haram digunakan karena dapat memicu komplikasi fatal pada penderita riwayat penyakit jantung.', '2026-06-10 06:28:14', '2026-07-09 09:28:17'),
(140, 'RE0', 'K02', 'M04', '4', -1, 'Berdasarkan standar medis WHO, metode ini haram digunakan karena dapat memicu komplikasi fatal pada penderita riwayat penyakit jantung.', '2026-06-10 06:28:14', '2026-07-09 09:28:17'),
(141, 'RE1', 'K02', 'M09', '4', -1, 'Berdasarkan standar medis WHO, metode ini haram digunakan karena dapat memicu komplikasi fatal pada penderita riwayat penyakit jantung.', '2026-06-10 06:28:14', '2026-07-09 09:28:17'),
(142, 'RE2', 'K02', 'M10', '4', -1, 'Berdasarkan standar medis WHO, metode ini haram digunakan karena dapat memicu komplikasi fatal pada penderita riwayat penyakit jantung.', '2026-06-10 06:28:14', '2026-07-09 09:28:17'),
(147, 'RE3', 'K43', 'M09', '4', -1, 'Sirosis hati dekompensata (berat) merupakan kontraindikasi absolut untuk Koyo Kontrasepsi (Patch) karena termasuk kontrasepsi hormonal kombinasi. Hati yang rusak berat tidak mampu memetabolisme hormon estrogen dan progesteron secara aman, sehingga berisiko memperburuk fungsi hati dan meningkatkan risiko tromboemboli.', '2026-07-10 18:05:34', '2026-07-10 18:05:34'),
(148, 'RE4', 'K43', 'M10', '4', -1, 'Sirosis hati dekompensata (berat) merupakan kontraindikasi absolut untuk Cincin Vagina (Vaginal Ring) karena termasuk kontrasepsi hormonal kombinasi. Hati yang rusak berat tidak mampu memetabolisme hormon estrogen dan progesteron secara aman, sehingga berisiko memperburuk fungsi hati dan meningkatkan risiko tromboemboli.', '2026-07-10 18:05:34', '2026-07-10 18:05:34'),
(149, 'RE5', 'K43', 'M06', '3', -0.6, 'Sirosis hati dekompensata (berat) menjadikan penggunaan Pil Progestin (POP/Minipil) tidak direkomendasikan. Meskipun hanya mengandung progesteron, metabolisme hati yang terganggu berat tetap berisiko mengganggu efektivitas dan keamanan obat ini.', '2026-07-10 18:05:34', '2026-07-10 18:05:34'),
(150, 'RE6', 'K43', 'M07', '3', -0.6, 'Sirosis hati dekompensata (berat) menjadikan penggunaan Implan (AKBK) tidak direkomendasikan. Meskipun implan bersifat progesteron-only, gangguan metabolisme hati yang berat tetap berisiko memengaruhi keamanan penggunaannya.', '2026-07-10 18:05:34', '2026-07-10 18:05:34'),
(151, 'RE7', 'K43', 'M03', '3', -0.6, 'Sirosis hati dekompensata (berat) menjadikan penggunaan Suntik Progestin 3 Bulan (DMPA) tidak direkomendasikan. Gangguan metabolisme hati yang berat dapat memengaruhi keamanan kontrasepsi progestin-only.', '2026-07-10 18:05:34', '2026-07-10 18:05:34'),
(152, 'RE8', 'K44', 'M09', '4', -1, 'Tumor atau kanker hati merupakan kontraindikasi absolut untuk Koyo Kontrasepsi (Patch) karena termasuk kontrasepsi hormonal kombinasi. Hormon estrogen dapat menstimulasi pertumbuhan tumor hati dan memperburuk kondisi.', '2026-07-10 18:05:34', '2026-07-10 18:05:34'),
(153, 'RE9', 'K44', 'M10', '4', -1, 'Tumor atau kanker hati merupakan kontraindikasi absolut untuk Cincin Vagina (Vaginal Ring) karena termasuk kontrasepsi hormonal kombinasi. Hormon estrogen dapat menstimulasi pertumbuhan tumor hati dan memperburuk kondisi.', '2026-07-10 18:05:34', '2026-07-10 18:05:34'),
(154, 'RF0', 'K44', 'M06', '3', -0.6, 'Tumor atau kanker hati menjadikan penggunaan Pil Progestin (POP/Minipil) tidak direkomendasikan. Walaupun progesteron-only, metabolisme hati yang terganggu akibat tumor tetap berisiko memengaruhi keamanan obat.', '2026-07-10 18:05:34', '2026-07-10 18:05:34'),
(155, 'RF1', 'K44', 'M07', '3', -0.6, 'Tumor atau kanker hati menjadikan penggunaan Implan (AKBK) tidak direkomendasikan. Gangguan fungsi hati akibat tumor dapat memengaruhi keamanan kontrasepsi progestin-only.', '2026-07-10 18:05:34', '2026-07-10 18:05:34'),
(156, 'RF2', 'K44', 'M03', '3', -0.6, 'Tumor atau kanker hati menjadikan penggunaan Suntik Progestin 3 Bulan (DMPA) tidak direkomendasikan. Gangguan fungsi hati akibat tumor dapat memengaruhi keamanan kontrasepsi progestin-only.', '2026-07-10 18:05:34', '2026-07-10 18:05:34'),
(157, 'RF3', 'K32', 'M03', '3', -0.7, 'Hipertensi berat (sistolik >= 160 atau diastolik >= 100 mmHg) menjadikan penggunaan Suntik Progestin 3 Bulan (DMPA) tidak direkomendasikan. DMPA dapat memengaruhi tekanan darah dan meningkatkan risiko kardiovaskular pada pasien dengan hipertensi yang tidak terkontrol.', '2026-07-10 18:05:34', '2026-07-10 18:05:34'),
(158, 'RF4', 'K40', 'M03', '3', -0.7, 'Riwayat atau sedang menderita Trombosis Vena Dalam (DVT) atau Emboli Paru menjadikan penggunaan Suntik Progestin 3 Bulan (DMPA) tidak direkomendasikan. DMPA memiliki efek progestasional yang dapat meningkatkan risiko tromboemboli pada pasien yang sudah memiliki riwayat gangguan pembekuan darah.', '2026-07-10 18:05:34', '2026-07-10 18:05:34'),
(159, 'RF5', 'K41 AND K42', 'M09', '4', -1, 'Diabetes mellitus > 20 tahun dengan komplikasi vaskular (nefropati, retinopati, neuropati) merupakan kontraindikasi absolut untuk Koyo Kontrasepsi (Patch) karena termasuk kontrasepsi hormonal kombinasi. Estrogen dapat memperburuk komplikasi vaskular diabetes dan meningkatkan risiko kardiovaskular secara signifikan.', '2026-07-10 18:05:34', '2026-07-10 18:05:34'),
(160, 'RF6', 'K41 AND K42', 'M10', '4', -1, 'Diabetes mellitus > 20 tahun dengan komplikasi vaskular (nefropati, retinopati, neuropati) merupakan kontraindikasi absolut untuk Cincin Vagina (Vaginal Ring) karena termasuk kontrasepsi hormonal kombinasi. Estrogen dapat memperburuk komplikasi vaskular diabetes dan meningkatkan risiko kardiovaskular secara signifikan.', '2026-07-10 18:05:34', '2026-07-10 18:05:34'),
(161, 'RP01', 'K34', 'M12', '1', 1, 'Sangat Disarankan! Penderita riwayat stroke sangat berisiko jika hamil kembali atau menggunakan kontrasepsi hormon. MOW (Tubektomi) adalah jalan paling aman untuk perlindungan permanen tanpa risiko kardiovaskular.', '2026-07-12 12:46:06', '2026-07-12 12:46:06'),
(162, 'RP02', 'K43', 'M12', '1', 1, 'Sangat Disarankan! Kondisi sirosis hati dekompensata sangat berbahaya jika terjadi kehamilan. MOW adalah solusi kontrasepsi mantap yang paling tepat.', '2026-07-12 12:46:06', '2026-07-12 12:46:06'),
(163, 'RP03', 'K11', 'M12', '1', 1, 'Untuk penderita kanker payudara aktif, penggunaan kontrasepsi sangat dibatasi. Jika Anda sudah tidak ingin memiliki anak, MOW adalah pilihan mutlak terbaik.', '2026-07-12 12:46:06', '2026-07-12 12:46:06'),
(164, 'RP04', 'K38', 'M12', '1', 1, 'Penderita kanker serviks sangat disarankan mengambil rute kontrasepsi mantap (MOW) untuk menghindari komplikasi medis serius.', '2026-07-12 12:46:06', '2026-07-12 12:46:06'),
(165, 'RP05', 'K44', 'M12', '1', 1, 'Penderita tumor/kanker hati sangat disarankan mengambil rute kontrasepsi mantap (MOW) untuk menghindari komplikasi.', '2026-07-12 12:46:06', '2026-07-12 12:46:06'),
(166, 'RP06', 'K30 AND K02', 'M12', '1', 1, 'Usia di atas 35 tahun yang disertai riwayat penyakit jantung sangat berisiko tinggi jika hamil. MOW sangat dianjurkan.', '2026-07-12 12:46:06', '2026-07-12 12:46:06'),
(167, 'RP07', 'K30 AND K41 AND K42', 'M12', '1', 1, 'Diabetes kronis dengan komplikasi pada usia di atas 35 tahun adalah kontraindikasi kehamilan mutlak. MOW sangat disarankan.', '2026-07-12 12:46:06', '2026-07-12 12:46:06'),
(168, 'RP08', 'K37', 'M13', '1', 1, 'Peringatan: Pendarahan vagina yang tidak wajar (belum dievaluasi) adalah sinyal bahaya. Anda HARUS memeriksakan diri ke dokter spesialis kandungan sebelum memutuskan alat kontrasepsi apa pun!', '2026-07-12 12:46:06', '2026-07-12 12:46:06'),
(169, 'RP09', 'K45', 'M13', '1', 1, 'Kondisi Autoimun (Lupus/SLE) sangat kompleks. Kami sangat menyarankan Anda melakukan konsultasi mendalam dengan Sp.OG sebelum mengambil tindakan.', '2026-07-12 12:46:06', '2026-07-12 12:46:06'),
(170, 'RP10', 'K49 AND K39', 'M14', '1', 1, 'Pasca keguguran yang disertai komplikasi anemia sangat berisiko. Anda disarankan untuk fokus pada masa pemulihan dan menunda kontrasepsi hingga HB normal.', '2026-07-12 12:46:06', '2026-07-12 12:46:06'),
(171, 'RP11', 'K56 AND K39', 'M14', '1', 1, 'Pasca keguguran yang disertai komplikasi anemia sangat berisiko. Anda disarankan untuk fokus pada masa pemulihan dan menunda kontrasepsi hingga HB normal.', '2026-07-12 12:46:06', '2026-07-12 12:46:06'),
(172, 'RP12', 'K35', 'M03', '4', -1, 'DILARANG MUTLAK! Suntik Progestin dapat memperparah penyempitan pembuluh darah di otak bagi penderita migrain dengan aura.', '2026-07-12 12:46:06', '2026-07-12 12:46:06'),
(173, 'RP13', 'K36', 'M03', '4', -1, 'DILARANG MUTLAK! Suntik Progestin diketahui dapat memicu sakit kepala dan sangat tidak disarankan bagi penderita migrain (bikin makin pusing).', '2026-07-12 12:46:06', '2026-07-12 12:46:06'),
(174, 'RP14', 'K35', 'M04', '4', -1, 'DILARANG MUTLAK! Suntik Kombinasi dapat memperparah migrain dengan aura.', '2026-07-12 12:46:06', '2026-07-12 12:46:06'),
(175, 'RP15', 'K36', 'M04', '4', -1, 'DILARANG MUTLAK! Suntik Kombinasi dapat memicu sakit kepala dan sangat tidak disarankan bagi penderita migrain (bikin makin pusing).', '2026-07-12 12:46:06', '2026-07-12 12:46:06'),
(176, 'RP16', 'K01', 'M05', '4', -1, 'DILARANG MUTLAK! Hormon Estrogen pada Pil Kombinasi sangat berbahaya bagi penderita hipertensi karena dapat memicu lonjakan tekanan darah (makin tinggi).', '2026-07-12 12:46:06', '2026-07-12 12:46:06'),
(177, 'RP17', 'K09', 'M05', '4', -1, 'DILARANG MUTLAK! Hormon Estrogen pada Pil Kombinasi sangat berbahaya bagi penderita hipertensi ringan, berisiko memicu lonjakan tensi.', '2026-07-12 12:46:06', '2026-07-12 12:46:06'),
(178, 'RP18', 'K32', 'M05', '4', -1, 'DILARANG MUTLAK! Hipertensi berat ditambah Pil Kombinasi dapat memicu pecahnya pembuluh darah atau stroke.', '2026-07-12 12:46:06', '2026-07-12 12:46:06'),
(179, 'RP19', 'K50', 'M08', '4', -1, 'DILARANG! Sesuai kepakaran medis, bagi penderita HIV, kondom saja dinilai tidak cukup untuk menahan kehamilan. Pasien HIV diwajibkan menggunakan kontrasepsi dengan efektivitas tinggi seperti IUD atau Implan.', '2026-07-12 12:46:06', '2026-07-12 12:46:06'),
(180, 'RP20', 'K45', 'M05', '4', -1, 'DILARANG! Penderita Lupus (SLE) sangat berisiko mengalami penyumbatan pembuluh darah jika mengonsumsi Pil Kombinasi.', '2026-07-12 12:46:06', '2026-07-12 12:46:06'),
(181, 'RP21', 'K45', 'M06', '4', -1, 'DILARANG! Penderita Lupus (SLE) sangat berisiko menggunakan kontrasepsi oral/pil. Sangat disarankan beralih ke MKJP seperti IUD.', '2026-07-12 12:46:06', '2026-07-12 12:46:06'),
(182, 'RP22', 'K02', 'M01', '1', 0.95, 'Sangat Disarankan! IUD Tembaga adalah kontrasepsi yang 100% bebas hormon, sehingga tidak akan membebani kerja organ jantung Anda sama sekali.', '2026-07-12 12:46:06', '2026-07-12 12:46:06'),
(183, 'RP23', 'K33', 'M01', '1', 0.95, 'Sangat Disarankan! IUD Tembaga bebas hormon sehingga aman dari risiko komplikasi pada penderita riwayat jantung iskemik.', '2026-07-12 12:46:06', '2026-07-12 12:46:06'),
(184, 'RP24', 'K22', 'M08', '3', -0.7, 'TIDAK COCOK. Anda menuntut efektivitas (keberhasilan) yang sangat tinggi, sedangkan kondom memiliki *failure rate* (tingkat kegagalan seperti sobek/bocor) yang cukup besar.', '2026-07-12 12:46:06', '2026-07-12 12:46:06'),
(185, 'RP25', 'K13', 'M08', '3', -0.7, 'TIDAK COCOK. Kondom bukanlah alat kontrasepsi yang ideal untuk misi menjaga jarak kehamilan (penjarangan) karena rawan gagal.', '2026-07-12 12:46:06', '2026-07-12 12:46:06'),
(186, 'RP26', 'K18', 'M08', '3', -0.8, 'TIDAK COCOK. Kondom sangat tidak disarankan jika tujuan utama Anda adalah mencari perlindungan jangka panjang yang konsisten.', '2026-07-12 12:46:06', '2026-07-12 12:46:06'),
(187, 'R200', 'K30 AND K34', 'M12', '1', 1, 'Berdasarkan keahlian Bidan, pasien dengan usia lanjut yang memiliki riwayat stroke sangat berisiko menggunakan KB hormonal maupun spiral. Sangat disarankan untuk mengambil langkah aman permanen melalui MOW.', '2026-07-12 12:49:13', '2026-07-12 12:49:13'),
(188, 'R201', 'K43', 'M12', '1', 1, 'Berdasarkan tinjauan Bidan, pasien dengan Sirosis Hati Dekompensata berada dalam kondisi kritis di mana KB biasa tidak disarankan. Metode sterilisasi permanen (MOW) adalah pilihan paling aman.', '2026-07-12 12:49:13', '2026-07-12 12:49:13'),
(189, 'R202', 'K11', 'M12', '1', 1, 'Kanker payudara aktif merupakan kontraindikasi absolut untuk metode hormonal. Bidan sangat merekomendasikan sterilisasi (MOW) untuk perlindungan tanpa mengganggu kondisi medis.', '2026-07-12 12:49:13', '2026-07-12 12:49:13'),
(190, 'R203', 'K38', 'M12', '1', 1, 'Kanker serviks sangat rentan terhadap alat kontrasepsi dalam rahim. MOW adalah tindakan sterilisasi paling disarankan.', '2026-07-12 12:49:13', '2026-07-12 12:49:13'),
(191, 'R204', 'K44', 'M12', '1', 1, 'Kanker hati sangat berbahaya jika dipicu metabolisme hormon KB. MOW merupakan jalan paling aman.', '2026-07-12 12:49:13', '2026-07-12 12:49:13'),
(192, 'R205', 'K02', 'M12', '1', 1, 'Riwayat penyakit jantung memiliki risiko gagal jantung fatal jika menggunakan KB konvensional. MOW sangat diutamakan.', '2026-07-12 12:49:13', '2026-07-12 12:49:13'),
(193, 'R206', 'K30 AND K02', 'M12', '1', 1, 'Mengingat usia Bunda sudah berisiko tinggi dan memiliki riwayat penyakit jantung, Bidan sangat merekomendasikan MOW (sterilisasi) demi keselamatan jangka panjang.', '2026-07-12 12:49:13', '2026-07-12 12:49:13'),
(194, 'R207', 'K37', 'M13', '1', 1, 'Bidan menegaskan bahwa pendarahan vagina yang belum dievaluasi adalah gejala bahaya. Anda WAJIB diperiksa terlebih dahulu oleh Dokter Kandungan (Sp.OG) sebelum memasang alat kontrasepsi apapun.', '2026-07-12 12:49:13', '2026-07-12 12:49:13'),
(195, 'R208', 'K45', 'M13', '1', 1, 'Lupus dan kelainan autoimun memiliki respons sistem imun yang tidak bisa ditebak. Bidan menyarankan agar Anda berkonsultasi langsung dengan Spesialis Kandungan untuk perlindungan terbaik.', '2026-07-12 12:49:13', '2026-07-12 12:49:13'),
(196, 'R209', 'K49 AND K39', 'M14', '1', 1, 'Menurut pakar, kondisi pasca keguguran yang disertai kurang darah (anemia) membuat rahim dan tubuh sangat lemah. Anda tidak disarankan menggunakan KB apa pun saat ini, berfokuslah pada pemulihan tubuh.', '2026-07-12 12:49:13', '2026-07-12 12:49:13'),
(197, 'R210', 'K56 AND K39', 'M14', '1', 1, 'Pasca keguguran baru dengan kondisi anemia sangat rentan. Jangan gunakan kontrasepsi dulu, utamakan istirahat dan perbaikan nutrisi.', '2026-07-12 12:49:13', '2026-07-12 12:49:13'),
(198, 'R211', 'K35', 'M03', '4', -1, 'Suntik hormonal sangat tidak disarankan karena akan memicu penyempitan pembuluh darah yang membuat migrain Bunda semakin parah (pusing hebat).', '2026-07-12 12:49:13', '2026-07-12 12:49:13'),
(199, 'R212', 'K35', 'M04', '4', -1, 'Suntik kombinasi sangat berbahaya bagi penderita migrain, bisa memperparah sakit kepala hingga komplikasi saraf.', '2026-07-12 12:49:13', '2026-07-12 12:49:13'),
(200, 'R213', 'K36', 'M03', '4', -1, 'Hormon pada suntik KB sering kali memicu frekuensi dan intensitas migrain menjadi lebih berat menurut pengalaman klinis Bidan.', '2026-07-12 12:49:13', '2026-07-12 12:49:13'),
(201, 'R214', 'K36', 'M04', '4', -1, 'Suntik tidak disarankan sama sekali karena pasien migrain berisiko mengalami pusing berkelanjutan akibat lonjakan hormon.', '2026-07-12 12:49:13', '2026-07-12 12:49:13'),
(202, 'R215', 'K01', 'M05', '4', -1, 'Pil Kombinasi dilarang keras bagi penderita hipertensi umum karena estrogen di dalamnya memicu kenaikan tekanan darah lebih tinggi.', '2026-07-12 12:49:13', '2026-07-12 12:49:13'),
(203, 'R216', 'K09', 'M05', '4', -1, 'Meskipun hipertensi ringan, Bidan melarang Pil Kombinasi karena hormon estrogennya rentan menaikkan tensi darah.', '2026-07-12 12:49:13', '2026-07-12 12:49:13'),
(204, 'R217', 'K32', 'M05', '4', -1, 'Hipertensi berat mutlak dilarang menggunakan Pil Kombinasi karena bisa berujung pada stroke seketika akibat penggumpalan darah.', '2026-07-12 12:49:13', '2026-07-12 12:49:13'),
(205, 'R218', 'K45', 'M05', '4', -1, 'Pasien Lupus (SLE) mutlak dilarang menggunakan Pil hormonal karena dapat memicu pembekuan darah (trombosis) yang fatal.', '2026-07-12 12:49:13', '2026-07-12 12:49:13'),
(206, 'R219', 'K45', 'M06', '4', -1, 'Pil progestin tidak disarankan bagi penderita autoimun Lupus dengan antibodi positif karena risiko kardiovaskular tinggi.', '2026-07-12 12:49:13', '2026-07-12 12:49:13'),
(207, 'R220', 'K50', 'M08', '4', -1, 'Kondom dilarang digunakan sebagai KB utama bagi penderita HIV karena menurut pandangan klinis pakar, efektivitas pencegahan kehamilannya tidak cukup kuat untuk kondisi ini.', '2026-07-12 12:49:13', '2026-07-12 12:49:13'),
(208, 'R221', 'K22', 'M08', '4', -1, 'Anda membutuhkan efektivitas perlindungan yang tinggi. Kondom sangat tidak disarankan karena memiliki tingkat kegagalan (kebocoran) yang lumayan besar jika tidak dipakai sempurna.', '2026-07-12 12:49:13', '2026-07-12 12:49:13'),
(209, 'R222', 'K18', 'M08', '4', -1, 'Anda butuh KB jangka panjang. Kondom tidak disarankan karena sangat merepotkan untuk penggunaan jangka panjang dan rentan putus asa (lupa pemakaian).', '2026-07-12 12:49:13', '2026-07-12 12:49:13'),
(210, 'R223', 'K08', 'M09', '4', -1, 'Koyo Kontrasepsi sangat dilarang bagi pasien obesitas karena jaringan lemak yang tebal menghalangi penyerapan hormon ke dalam darah, sehingga KB akan gagal.', '2026-07-12 12:49:13', '2026-07-12 12:49:13'),
(211, 'R224', 'K08', 'M10', '4', -1, 'Bagi penderita obesitas, Cincin Vagina memiliki tingkat efektivitas penyerapan yang buruk dan memicu risiko penggumpalan darah (trombosis).', '2026-07-12 12:49:13', '2026-07-12 12:49:13'),
(212, 'R300', 'K55', 'M05', '3', -0.8, 'Metode Pil Kombinasi menuntut kedisiplinan minum rutin. Pada usia muda, terdapat kecenderungan lupa yang tinggi sehingga berisiko gagal. Penggunaannya butuh pengawasan (Kategori 2 mendekati 3), kecuali metode lain tidak memungkinkan.', '2026-07-12 13:54:19', '2026-07-12 14:51:09'),
(213, 'R301', 'K55', 'M09', '3', -0.8, 'Metode Koyo menuntut jadwal penggantian rutin. Pada usia muda, kecenderungan lalai lebih tinggi. Penggunaannya butuh pengawasan (Kategori 2 mendekati 3).', '2026-07-12 13:54:19', '2026-07-12 14:51:09'),
(214, 'R302', 'K04', 'M08', '3', -0.7, 'Tidak cocok, karena tingkat keberhasilan kecil jika digunakan untuk menunda kehamilan. Disarankan implan atau IUD.', '2026-07-12 13:54:19', '2026-07-12 13:54:19'),
(215, 'R303', 'K03 AND K29', 'M06', '3', -0.7, 'Tidak disarankan, lebih disarankan metode MKJP seperti IUD atau Implan.', '2026-07-12 13:54:19', '2026-07-12 13:54:19'),
(216, 'R304', 'K03 AND K39', 'M03', '3', -0.7, 'Tidak disarankan, lebih disarankan Implan karena suntik dapat mempengaruhi siklus haid.', '2026-07-12 13:54:19', '2026-07-12 13:54:19'),
(217, 'R305', 'K16', 'M03', '3', -0.7, 'Suntik tidak disarankan untuk penderita diabetes, IUD lebih disarankan.', '2026-07-12 13:54:19', '2026-07-12 13:54:19');
INSERT INTO `aturans` (`id`, `id_aturan`, `premis`, `konklusi`, `kategori_mec`, `cf_pakar`, `alasan_medis`, `created_at`, `updated_at`) VALUES
(218, 'R306', 'K52', 'M03', '3', -0.7, 'Tidak disarankan, disarankan menggunakan IUD karena interaksi obat TBC mengurangi efektivitas hormon.', '2026-07-12 13:54:19', '2026-07-12 13:54:19'),
(219, 'R307', 'K27', 'M08', '3', -0.7, 'Tidak disarankan, suntik 1 bulan sekali lebih direkomendasikan.', '2026-07-12 13:54:19', '2026-07-12 13:54:19'),
(220, 'R308', 'K39', 'M01', '3', -0.7, 'Tidak disarankan soalnya penderita anemia rawan kehilangan darah karena IUD itu memperpanjang siklus haid.', '2026-07-12 13:54:19', '2026-07-12 13:54:19'),
(221, 'R309', 'K39', 'M02', '3', -0.7, 'Tidak disarankan soalnya penderita anemia rawan kehilangan darah karena IUD itu memperpanjang siklus haid.', '2026-07-12 13:54:19', '2026-07-12 13:54:19'),
(222, 'R310', 'K09', 'M07', '3', -0.7, 'Tidak cocok implan. Kata bidan tensi segini sudah tinggi banget bukan ringan 140-159.', '2026-07-12 13:54:19', '2026-07-12 13:54:19'),
(223, 'R311', 'K26', 'M07', '4', -1, 'Tidak disarankan, disarankan IUD. Kandungan hormonal pada implan terlalu tinggi untuk kondisi komorbiditas berat.', '2026-07-12 13:54:19', '2026-07-12 13:54:19'),
(224, 'R312', 'K55', 'M10', '4', -1, 'Cincin vagina tidak cocok, umurnya terlalu muda.', '2026-07-12 13:54:19', '2026-07-12 13:54:19'),
(225, 'R313', 'K41 AND K42', 'M12', '1', 1, 'Disarankan MOW karena menderita diabetes kronis dengan komplikasi yang membahayakan jika kehamilan terjadi.', '2026-07-12 13:54:19', '2026-07-12 13:54:19'),
(226, 'R400', 'K55', 'M12', '4', -1, 'Metode Operasi Wanita (MOW/Tubektomi) dilarang dan kontraindikasi untuk pasien dengan usia terlalu muda karena bersifat menghentikan kesuburan secara permanen.', '2026-07-12 14:23:44', '2026-07-12 14:23:44'),
(227, 'R401', 'K30', 'M12', '3', -0.7, 'Metode Operasi Wanita (MOW/Tubektomi) tidak disarankan secara default kecuali jika ada komplikasi medis berat yang mengharuskan Bunda menghentikan kesuburan (MEC 3).', '2026-07-12 14:23:44', '2026-07-12 14:23:44'),
(228, 'R402', 'K55', 'M13', '3', -0.7, 'Tindakan Rujukan / Konsultasi Dokter Kandungan secara khusus tidak diperlukan saat ini; Bunda dapat langsung memilih metode KB reguler yang tersedia.', '2026-07-12 14:23:44', '2026-07-12 14:23:44'),
(229, 'R403', 'K30', 'M13', '3', -0.7, 'Tindakan Rujukan / Konsultasi Dokter Kandungan secara khusus tidak diperlukan saat ini; Bunda dapat langsung memilih metode KB reguler yang tersedia.', '2026-07-12 14:23:44', '2026-07-12 14:23:44'),
(230, 'R404', 'K55', 'M14', '3', -0.7, 'Bunda tidak sedang dalam kondisi pasca keguguran atau krisis pendarahan, sehingga tidak memerlukan Masa Pemulihan khusus. Silakan pilih alat kontrasepsi.', '2026-07-12 14:23:44', '2026-07-12 14:23:44'),
(231, 'R405', 'K30', 'M14', '3', -0.7, 'Bunda tidak sedang dalam kondisi pasca keguguran atau krisis pendarahan, sehingga tidak memerlukan Masa Pemulihan khusus. Silakan pilih alat kontrasepsi.', '2026-07-12 14:23:44', '2026-07-12 14:23:44');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kondisis`
--

CREATE TABLE `kondisis` (
  `id` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kondisi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kondisis`
--

INSERT INTO `kondisis` (`id`, `nama_kondisi`, `created_at`, `updated_at`) VALUES
('K01', 'Hipertensi (Umum)', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('K02', 'Riwayat Penyakit Jantung', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('K03', 'Sedang menyusui (Umum)', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('K04', 'Ingin menunda kehamilan', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('K05', 'Sehat / Fisik normal (tanpa komplikasi penyerta)', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('K06', 'Siklus haid teratur', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('K07', 'Tekanan darah normal', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('K08', 'Obesitas', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('K09', 'Hipertensi Ringan (Sistolik 140-159 atau Diastolik 90-99 mmHg)', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('K10', 'Terdapat benjolan payudara jinak (non-kanker)', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('K11', 'Terdapat kanker payudara aktif', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('K12', 'Memiliki anak lebih dari 3', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('K13', 'Ingin jarak kehamilan panjang', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('K14', 'Baru menikah', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('K15', 'Ingin jarak kehamilan pendek', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('K16', 'Menderita Diabetes < 20 tahun', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('K17', 'Tanpa komplikasi (ginjal/mata/saraf)', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('K18', 'Butuh perlindungan jangka panjang (5-10 tahun)', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('K19', 'Tidak memiliki riwayat tumor', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('K20', 'Butuh perlindungan menengah (3 tahun)', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('K21', 'Takut pada efek samping hormonal', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('K22', 'Butuh efektivitas perlindungan tinggi', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('K23', 'Memiliki kedisiplinan tinggi (rutin minum obat)', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('K24', 'Ingin metode yang mudah dihentikan', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('K25', 'Data anamnesa medis pasien tidak lengkap', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('K26', 'Punya komorbiditas/penyakit kronis berat', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('K27', 'Pasca persalinan < 21 hari', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('K28', 'Menyusui secara eksklusif', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('K29', 'Pasca persalinan >= 4 minggu', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('K30', 'Usia >= 35 tahun', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('K31', 'Merokok >= 15 batang/hari', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('K32', 'Hipertensi berat (Sistolik >= 160 atau Diastolik >= 100 mmHg)', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('K33', 'Riwayat Penyakit Jantung Iskemik', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('K34', 'Riwayat Stroke', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('K35', 'Migrain dengan aura (gangguan saraf tepi/visual)', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('K36', 'Migrain tanpa aura', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('K37', 'Pendarahan vagina tidak wajar (belum dievaluasi)', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('K38', 'Kanker Serviks (menunggu pengobatan bedah/radiasi)', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('K39', 'Anemia (Defisiensi Besi) / Riwayat Anemia', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('K40', 'Sedang menderita / Riwayat Trombosis Vena Dalam (DVT) / Emboli Paru', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('K41', 'Menderita Diabetes > 20 tahun', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('K42', 'Terdapat komplikasi diabetes (Nefropati/Retinopati/Neuropati)', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('K43', 'Sirosis Hati Dekompensata (Berat)', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('K44', 'Tumor / Kanker Hati', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('K45', 'Lupus (SLE) dengan antibodi antifosfolipid positif', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('K46', 'Penyakit Radang Panggul (PID) aktif / Servisitis', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('K47', 'Konsumsi rutin obat Anti-kejang / Epilepsi (Karbamazepin, dll)', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('K48', 'Multi-risiko Kardiovaskular (Tua + Merokok + Hipertensi)', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('K49', 'Pasca Keguguran (Trimester 1) atau Abortus/Prematur', '2026-06-10 02:16:48', '2026-07-12 12:48:28'),
('K50', 'Terinfeksi HIV klinis stabil & terapi ARV rutin', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('K51', 'Kanker Payudara dengan masa remisi > 5 tahun (tanpa kekambuhan)', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('K52', 'Sedang mengonsumsi obat TBC (Rifampisin)', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('K53', 'Memiliki Penyakit Kandung Empedu (aktif diobati)', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('K54', 'Merokok aktif (Umum)', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('K55', 'Usia < 35 tahun', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('K56', 'Baru mengalami keguguran / Aborsi (< 7 hari)', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('K57', 'pilek', '2026-07-12 16:54:40', '2026-07-12 16:54:40');

-- --------------------------------------------------------

--
-- Table structure for table `metode_kbs`
--

CREATE TABLE `metode_kbs` (
  `id` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_metode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kelebihan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `kekurangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `metode_kbs`
--

INSERT INTO `metode_kbs` (`id`, `nama_metode`, `created_at`, `updated_at`, `kelebihan`, `kekurangan`) VALUES
('M01', 'IUD Tembaga (Cu-IUD)', '2026-06-10 02:16:48', '2026-07-09 06:20:11', 'Sangat efektif untuk jangka panjang (hingga 10 tahun), tidak mengandung hormon, tidak mengganggu ASI.', 'Memerlukan pemeriksaan panggul, dapat meningkatkan volume darah haid atau kram pada bulan-bulan pertama.'),
('M02', 'IUD Hormonal (LNG-IUD)', '2026-06-10 02:16:48', '2026-07-09 06:20:11', 'Efektif jangka panjang, mengurangi volume darah haid dan dismenore (nyeri haid).', 'Pemasangan perlu tenaga terlatih, biayanya lebih mahal, efek samping hormonal lokal seperti bercak darah (spotting).'),
('M03', 'Suntik Progestin 3 Bulan (DMPA)', '2026-06-10 02:16:48', '2026-07-09 06:20:11', 'Suntikan cukup 3 bulan sekali, aman untuk ibu menyusui, mengurangi nyeri haid dan risiko kanker endometrium.', 'Klien bergantung pada klinik untuk suntik ulang, terlambatnya kembali kesuburan (rata-rata 4 bulan), perubahan pola haid.'),
('M04', 'Suntik Kombinasi 1 Bulan', '2026-06-10 02:16:48', '2026-07-09 06:20:11', 'Mengurangi jumlah perdarahan, mencegah anemia, haid lebih teratur dibandingkan suntik 3 bulan.', 'Harus disuntik setiap bulan, mual, pusing, sakit kepala ringan pada awal pemakaian, mengurangi produksi ASI.'),
('M05', 'Pil Kombinasi (CHC)', '2026-06-10 02:16:48', '2026-07-09 06:20:11', 'Efektivitas tinggi jika diminum teratur, mengurangi risiko kista ovarium dan penyakit radang panggul.', 'Membosankan karena harus diminum setiap hari, jika lupa risiko gagal tinggi, mengurangi ASI, tidak mencegah IMS.'),
('M06', 'Pil Progestin (POP / Minipil)', '2026-06-10 02:16:48', '2026-07-09 06:20:11', 'Sangat aman untuk ibu menyusui (tidak menurunkan produksi ASI), kesuburan cepat kembali.', 'Harus diminum pada jam yang persis sama setiap hari, rentan pendarahan tidak teratur.'),
('M07', 'Implan (AKBK)', '2026-06-10 02:16:48', '2026-07-09 06:20:11', 'Perlindungan jangka panjang (3-5 tahun), nyaman, kesuburan segera kembali setelah dicabut, aman masa laktasi.', 'Memerlukan prosedur bedah minor oleh petugas terlatih untuk pasang/cabut, mahal, sering timbul perubahan pola haid (spotting).'),
('M08', 'Kondom', '2026-06-10 02:16:48', '2026-07-09 06:20:11', 'Murah, dibeli bebas tanpa resep, memberikan proteksi ganda (mencegah kehamilan sekaligus mencegah penularan IMS/HIV).', 'Efektivitas sangat bergantung pada cara pemakaian yang benar, dapat mengurangi sensasi sentuhan, risiko bocor/robek.'),
('M09', 'Koyo Kontrasepsi (Patch)', '2026-06-10 02:16:48', '2026-07-09 06:20:11', 'Mudah digunakan sendiri tanpa bantuan tenaga medis, siklus haid menjadi lebih teratur.', 'Bisa menyebabkan iritasi kulit pada area tempelan, harus diganti tepat waktu secara berkala.'),
('M10', 'Cincin Vagina (Vaginal Ring)', '2026-06-10 02:16:48', '2026-07-09 06:20:11', 'Digunakan secara mandiri setiap bulan, dosis hormon lebih rendah dibandingkan pil.', 'Pasien harus merasa nyaman dan berani memasukkan serta melepas cincin sendiri ke dalam vagina.'),
('M12', 'MOW (Tubektomi / Metode Operasi Wanita)', '2026-07-12 12:46:06', '2026-07-12 12:48:28', 'Sangat efektif secara permanen, tidak mengganggu hormon, aman untuk pasien risiko tinggi kardiovaskular atau kanker stadium lanjut.', 'Metode permanen (tidak bisa dikembalikan/irreversibel), membutuhkan tindakan pembedahan medis.'),
('M13', 'Konsultasi Dokter Kandungan (Sp.OG)', '2026-07-12 12:46:06', '2026-07-12 12:48:28', 'Mendapatkan penanganan klinis yang tepat dari ahlinya sesuai dengan kompleksitas penyakit penyerta.', 'Bukan sebuah metode kontrasepsi langsung, memerlukan waktu dan biaya ekstra untuk konsultasi medis lanjutan.'),
('M14', 'Masa Pemulihan (Tidak Disarankan Kontrasepsi)', '2026-07-12 12:46:06', '2026-07-12 12:48:28', 'Memberikan waktu bagi tubuh dan organ reproduksi untuk pulih sepenuhnya dari trauma medis atau kondisi kekurangan darah (anemia akut).', 'Pasien berisiko mengalami kehamilan yang tidak direncanakan selama masa pemulihan jika melakukan hubungan intim tanpa pengaman.');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_06_10_090255_create_metode_kbs_table', 1),
(5, '2026_06_10_090327_create_kondisis_table', 1),
(6, '2026_06_10_090339_create_aturans_table', 1),
(7, '2026_06_26_205916_add_alasan_medis_to_aturans_table', 2),
(9, '2026_07_09_131629_add_kelebihan_kekurangan_to_metode_kbs_table', 3),
(10, '2026_07_10_235920_add_role_to_users_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('cLA1p1pdPHVOa9gNIfA2WULuutAyf2vUZj5aYGFe', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMEV2amhtN1Jxd0JhVzBjS2xtY1VxQnlZOXNobHNQODJiQ3RSUlNXNiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7Tjt9fQ==', 1783875412);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('user','bidan') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Bidan Pakar', 'bidan@sureplan.com', NULL, '$2y$12$UF5fT2jCjBCru61FtCrwjOz3zJeKHriLKSqK5csOY3cDCzV54gB4C', 'bidan', NULL, '2026-06-26 14:00:18', '2026-07-10 16:59:52'),
(2, 'kalila sabil', 'cieee@mail.com', NULL, '$2y$12$f5N6BRmq2LPZCnkku55DhOIda6GkAMsVFIpLv9E1d8zAhgtnsWUiq', 'user', NULL, '2026-07-10 17:15:48', '2026-07-10 17:15:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aturans`
--
ALTER TABLE `aturans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kondisis`
--
ALTER TABLE `kondisis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `metode_kbs`
--
ALTER TABLE `metode_kbs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aturans`
--
ALTER TABLE `aturans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
