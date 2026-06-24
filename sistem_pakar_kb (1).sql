-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 24, 2026 at 01:03 PM
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aturans`
--

INSERT INTO `aturans` (`id`, `id_aturan`, `premis`, `konklusi`, `kategori_mec`, `cf_pakar`, `created_at`, `updated_at`) VALUES
(1, 'R01', 'K05 AND K07', 'M01', '1', 0.88, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(2, 'R02', 'K05 AND K07', 'M02', '1', 0.85, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(3, 'R03', 'K05 AND K06', 'M05', '1', 0.9, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(4, 'R04', 'K05 AND K06', 'M04', '1', 0.85, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(5, 'R05', 'K05 AND K07 AND K06', 'M09', '1', 0.82, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(6, 'R06', 'K05 AND K07 AND K06', 'M10', '1', 0.8, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(7, 'R07', 'K03 AND K29', 'M06', '1', 0.9, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(8, 'R08', 'K03 AND K29', 'M03', '1', 0.85, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(9, 'R09', 'K03 AND K29', 'M07', '1', 0.88, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(10, 'R10', 'K03 AND K29', 'M01', '1', 0.86, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(11, 'R11', 'K28 AND K29', 'M01', '1', 0.88, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(12, 'R12', 'K28 AND K29', 'M06', '1', 0.92, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(13, 'R13', 'K13 AND K18', 'M01', '1', 0.92, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(14, 'R14', 'K13 AND K18', 'M02', '1', 0.9, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(15, 'R15', 'K13 AND K18', 'M07', '1', 0.88, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(16, 'R16', 'K04 AND K20', 'M07', '1', 0.88, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(17, 'R17', 'K04 AND K20', 'M03', '1', 0.85, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(18, 'R18', 'K12 AND K22', 'M01', '1', 0.92, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(19, 'R19', 'K12 AND K22', 'M02', '1', 0.9, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(20, 'R20', 'K12 AND K22', 'M07', '1', 0.88, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(21, 'R21', 'K14 AND K15', 'M05', '1', 0.85, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(22, 'R22', 'K14 AND K24', 'M05', '1', 0.82, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(23, 'R23', 'K14 AND K24', 'M08', '1', 0.8, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(24, 'R24', 'K05 AND K23', 'M05', '1', 0.88, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(25, 'R25', 'K05 AND K23', 'M06', '1', 0.85, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(26, 'R26', 'K21 AND K22', 'M01', '1', 0.92, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(27, 'R27', 'K21', 'M08', '1', 0.78, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(28, 'R28', 'K16 AND K17', 'M01', '1', 0.85, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(29, 'R29', 'K16 AND K17', 'M06', '2', 0.78, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(30, 'R30', 'K16 AND K17', 'M03', '2', 0.75, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(31, 'R31', 'K16 AND K17', 'M07', '2', 0.78, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(32, 'R32', 'K09', 'M01', '1', 0.82, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(33, 'R33', 'K09', 'M03', '2', 0.72, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(34, 'R34', 'K09', 'M06', '1', 0.75, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(35, 'R35', 'K09', 'M07', '1', 0.78, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(36, 'R36', 'K09', 'M08', '1', 0.7, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(37, 'R37', 'K08', 'M01', '1', 0.82, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(38, 'R38', 'K08', 'M07', '1', 0.78, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(39, 'R39', 'K08', 'M02', '1', 0.78, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(40, 'R40', 'K39', 'M02', '1', 0.82, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(41, 'R41', 'K39', 'M03', '1', 0.78, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(42, 'R42', 'K39', 'M05', '1', 0.75, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(43, 'R43', 'K49', 'M01', '1', 0.85, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(44, 'R44', 'K49', 'M05', '1', 0.82, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(45, 'R45', 'K49', 'M07', '1', 0.8, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(46, 'R46', 'K50', 'M08', '1', 0.92, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(47, 'R47', 'K50', 'M01', '1', 0.8, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(48, 'R48', 'K50', 'M03', '1', 0.75, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(49, 'R49', 'K36', 'M06', '1', 0.78, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(50, 'R50', 'K36', 'M03', '2', 0.72, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(51, 'R51', 'K36', 'M01', '1', 0.8, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(52, 'R52', 'K10', 'M01', '1', 0.82, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(53, 'R53', 'K10', 'M08', '1', 0.75, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(54, 'R54', 'K25', 'M08', '1', 0.85, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(55, 'R55', 'K25', 'M11', '1', 0.9, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(56, 'R56', 'K51', 'M01', '1', 0.82, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(57, 'R57', 'K51', 'M08', '1', 0.78, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(58, 'R58', 'K52', 'M01', '1', 0.85, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(59, 'R59', 'K52', 'M08', '1', 0.8, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(60, 'R60', 'K52', 'M03', '1', 0.78, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(61, 'R61', 'K47', 'M01', '1', 0.85, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(62, 'R62', 'K47', 'M03', '1', 0.78, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(63, 'R63', 'K47', 'M02', '1', 0.82, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(64, 'R64', 'K53', 'M01', '1', 0.82, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(65, 'R65', 'K53', 'M03', '2', 0.72, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(66, 'R66', 'K55 AND K54', 'M05', '2', 0.65, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(67, 'R67', 'K55 AND K54', 'M03', '1', 0.78, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(68, 'R68', 'K55 AND K54', 'M01', '1', 0.82, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(69, 'R69', 'K27', 'M06', '1', 0.82, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(70, 'R70', 'K27', 'M03', '1', 0.78, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(71, 'R71', 'K27', 'M07', '1', 0.8, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(72, 'R72', 'K27', 'M08', '1', 0.75, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(73, 'R73', 'K56', 'M08', '1', 0.85, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(74, 'R74', 'K56', 'M11', '1', 0.8, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(75, 'R75', 'K26', 'M08', '1', 0.85, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(76, 'R76', 'K26', 'M01', '1', 0.72, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(77, 'R77', 'K11', 'M05', '4', -1, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(78, 'R78', 'K11', 'M06', '4', -1, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(79, 'R79', 'K11', 'M02', '4', -1, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(80, 'R80', 'K11', 'M03', '4', -1, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(81, 'R81', 'K11', 'M07', '4', -1, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(82, 'R82', 'K11', 'M04', '4', -1, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(83, 'R83', 'K11', 'M09', '4', -1, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(84, 'R84', 'K11', 'M10', '4', -1, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(85, 'R85', 'K32', 'M05', '4', -1, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(86, 'R86', 'K32', 'M04', '4', -1, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(87, 'R87', 'K32', 'M09', '4', -1, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(88, 'R88', 'K32', 'M10', '4', -1, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(89, 'R89', 'K33', 'M05', '4', -1, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(90, 'R90', 'K33', 'M04', '4', -1, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(91, 'R91', 'K33', 'M09', '4', -1, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(92, 'R92', 'K33', 'M10', '4', -1, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(93, 'R93', 'K34', 'M05', '4', -1, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(94, 'R94', 'K34', 'M04', '4', -1, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(95, 'R95', 'K34', 'M09', '4', -1, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(96, 'R96', 'K34', 'M10', '4', -1, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(97, 'R97', 'K35', 'M05', '4', -1, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(98, 'R98', 'K35', 'M04', '4', -1, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(99, 'R99', 'K35', 'M09', '4', -1, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(100, 'RA0', 'K35', 'M10', '4', -1, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(101, 'RA1', 'K40', 'M05', '4', -1, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(102, 'RA2', 'K40', 'M04', '4', -1, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(103, 'RA3', 'K40', 'M09', '4', -1, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(104, 'RA4', 'K40', 'M10', '4', -1, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(105, 'RA5', 'K43', 'M05', '4', -1, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(106, 'RA6', 'K43', 'M04', '4', -1, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(107, 'RA7', 'K44', 'M05', '4', -1, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(108, 'RA8', 'K44', 'M04', '4', -1, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(109, 'RA9', 'K45', 'M05', '4', -1, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(110, 'RB0', 'K45', 'M04', '4', -1, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(111, 'RB1', 'K45', 'M09', '4', -1, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(112, 'RB2', 'K45', 'M10', '4', -1, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(113, 'RB3', 'K30 AND K31', 'M05', '4', -1, '2026-06-10 06:28:13', '2026-06-10 06:28:13'),
(114, 'RB4', 'K30 AND K31', 'M04', '4', -1, '2026-06-10 06:28:14', '2026-06-10 06:28:14'),
(115, 'RB5', 'K30 AND K31', 'M09', '4', -1, '2026-06-10 06:28:14', '2026-06-10 06:28:14'),
(116, 'RB6', 'K30 AND K31', 'M10', '4', -1, '2026-06-10 06:28:14', '2026-06-10 06:28:14'),
(117, 'RB7', 'K48', 'M05', '4', -1, '2026-06-10 06:28:14', '2026-06-10 06:28:14'),
(118, 'RB8', 'K48', 'M04', '4', -1, '2026-06-10 06:28:14', '2026-06-10 06:28:14'),
(119, 'RB9', 'K48', 'M09', '4', -1, '2026-06-10 06:28:14', '2026-06-10 06:28:14'),
(120, 'RC0', 'K48', 'M10', '4', -1, '2026-06-10 06:28:14', '2026-06-10 06:28:14'),
(121, 'RC1', 'K41 AND K42', 'M05', '4', -1, '2026-06-10 06:28:14', '2026-06-10 06:28:14'),
(122, 'RC2', 'K41 AND K42', 'M04', '4', -1, '2026-06-10 06:28:14', '2026-06-10 06:28:14'),
(123, 'RC3', 'K27', 'M05', '4', -1, '2026-06-10 06:28:14', '2026-06-10 06:28:14'),
(124, 'RC4', 'K27', 'M04', '4', -1, '2026-06-10 06:28:14', '2026-06-10 06:28:14'),
(125, 'RC5', 'K27', 'M09', '4', -1, '2026-06-10 06:28:14', '2026-06-10 06:28:14'),
(126, 'RC6', 'K27', 'M10', '4', -1, '2026-06-10 06:28:14', '2026-06-10 06:28:14'),
(127, 'RC7', 'K46', 'M01', '4', -1, '2026-06-10 06:28:14', '2026-06-10 06:28:14'),
(128, 'RC8', 'K46', 'M02', '4', -1, '2026-06-10 06:28:14', '2026-06-10 06:28:14'),
(129, 'RC9', 'K37', 'M01', '3', -0.7, '2026-06-10 06:28:14', '2026-06-10 06:28:14'),
(130, 'RD0', 'K37', 'M02', '3', -0.7, '2026-06-10 06:28:14', '2026-06-10 06:28:14'),
(131, 'RD1', 'K38', 'M01', '3', -0.6, '2026-06-10 06:28:14', '2026-06-10 06:28:14'),
(132, 'RD2', 'K38', 'M02', '3', -0.6, '2026-06-10 06:28:14', '2026-06-10 06:28:14'),
(133, 'RD3', 'K03', 'M05', '4', -1, '2026-06-10 06:28:14', '2026-06-10 06:28:14'),
(134, 'RD4', 'K03', 'M04', '4', -1, '2026-06-10 06:28:14', '2026-06-10 06:28:14'),
(135, 'RD5', 'K03', 'M09', '4', -1, '2026-06-10 06:28:14', '2026-06-10 06:28:14'),
(136, 'RD6', 'K03', 'M10', '4', -1, '2026-06-10 06:28:14', '2026-06-10 06:28:14'),
(137, 'RD7', 'K01', 'M05', '3', -0.6, '2026-06-10 06:28:14', '2026-06-10 06:28:14'),
(138, 'RD8', 'K01', 'M04', '3', -0.6, '2026-06-10 06:28:14', '2026-06-10 06:28:14'),
(139, 'RD9', 'K02', 'M05', '4', -1, '2026-06-10 06:28:14', '2026-06-10 06:28:14'),
(140, 'RE0', 'K02', 'M04', '4', -1, '2026-06-10 06:28:14', '2026-06-10 06:28:14'),
(141, 'RE1', 'K02', 'M09', '4', -1, '2026-06-10 06:28:14', '2026-06-10 06:28:14'),
(142, 'RE2', 'K02', 'M10', '4', -1, '2026-06-10 06:28:14', '2026-06-10 06:28:14');

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
('K49', 'Pasca Keguguran (Trimester 1 atau 2) tanpa komplikasi infeksi', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('K50', 'Terinfeksi HIV klinis stabil & terapi ARV rutin', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('K51', 'Kanker Payudara dengan masa remisi > 5 tahun (tanpa kekambuhan)', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('K52', 'Sedang mengonsumsi obat TBC (Rifampisin)', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('K53', 'Memiliki Penyakit Kandung Empedu (aktif diobati)', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('K54', 'Merokok aktif (Umum)', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('K55', 'Usia < 35 tahun', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('K56', 'Baru mengalami keguguran / Aborsi (< 7 hari)', '2026-06-10 02:16:48', '2026-06-10 02:16:48');

-- --------------------------------------------------------

--
-- Table structure for table `metode_kbs`
--

CREATE TABLE `metode_kbs` (
  `id` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_metode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `metode_kbs`
--

INSERT INTO `metode_kbs` (`id`, `nama_metode`, `created_at`, `updated_at`) VALUES
('M01', 'IUD Tembaga (Cu-IUD)', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('M02', 'IUD Hormonal (LNG-IUD)', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('M03', 'Suntik Progestin 3 Bulan (DMPA)', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('M04', 'Suntik Kombinasi 1 Bulan', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('M05', 'Pil Kombinasi (CHC)', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('M06', 'Pil Progestin (POP / Minipil)', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('M07', 'Implan (AKBK)', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('M08', 'Kondom', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('M09', 'Koyo Kontrasepsi (Patch)', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('M10', 'Cincin Vagina (Vaginal Ring)', '2026-06-10 02:16:48', '2026-06-10 02:16:48'),
('M11', 'Testpack (Skrining Kehamilan Tunda KB)', '2026-06-10 02:16:48', '2026-06-10 02:16:48');

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
(6, '2026_06_10_090339_create_aturans_table', 1);

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
('3kj7cMKMuNYVkp24ugDb4LYLR9l796WDBpnORrRp', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.124.2 Chrome/148.0.7778.97 Electron/42.2.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiejhjWmxBa0JRbEFnaFA4eDdvengzWFhUeFh3Z1FQTG5JNG14THN3UyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1782294178),
('AKUaNUIr2uINamiKliCdEC2OgbLhUVoevLsJINLg', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiYU44MGFkUmZEZ3BJZDd4RHlkQU5URHBUNVdEaUdnekEwMUVyOUxNOCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9rb25zdWx0YXNpIjtzOjU6InJvdXRlIjtOO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjEwOiJoYXNpbEFraGlyIjthOjExOntpOjA7YTo2OntzOjI6ImlkIjtzOjM6Ik0wMSI7czoxMToibmFtYV9tZXRvZGUiO3M6MjA6IklVRCBUZW1iYWdhIChDdS1JVUQpIjtzOjI6ImNmIjtpOjA7czoxMDoicGVyc2VudGFzZSI7aTowO3M6Njoic3RhdHVzIjtzOjE0OiJ0aWRha19hZGFfZGF0YSI7czo2OiJhbGFzYW4iO2E6MDp7fX1pOjE7YTo2OntzOjI6ImlkIjtzOjM6Ik0wMiI7czoxMToibmFtYV9tZXRvZGUiO3M6MjI6IklVRCBIb3Jtb25hbCAoTE5HLUlVRCkiO3M6MjoiY2YiO2k6MDtzOjEwOiJwZXJzZW50YXNlIjtpOjA7czo2OiJzdGF0dXMiO3M6MTQ6InRpZGFrX2FkYV9kYXRhIjtzOjY6ImFsYXNhbiI7YTowOnt9fWk6MjthOjY6e3M6MjoiaWQiO3M6MzoiTTAzIjtzOjExOiJuYW1hX21ldG9kZSI7czozMToiU3VudGlrIFByb2dlc3RpbiAzIEJ1bGFuIChETVBBKSI7czoyOiJjZiI7aTowO3M6MTA6InBlcnNlbnRhc2UiO2k6MDtzOjY6InN0YXR1cyI7czoxNDoidGlkYWtfYWRhX2RhdGEiO3M6NjoiYWxhc2FuIjthOjA6e319aTozO2E6Njp7czoyOiJpZCI7czozOiJNMDQiO3M6MTE6Im5hbWFfbWV0b2RlIjtzOjI0OiJTdW50aWsgS29tYmluYXNpIDEgQnVsYW4iO3M6MjoiY2YiO2k6MDtzOjEwOiJwZXJzZW50YXNlIjtpOjA7czo2OiJzdGF0dXMiO3M6MTQ6InRpZGFrX2FkYV9kYXRhIjtzOjY6ImFsYXNhbiI7YTowOnt9fWk6NDthOjY6e3M6MjoiaWQiO3M6MzoiTTA1IjtzOjExOiJuYW1hX21ldG9kZSI7czoxOToiUGlsIEtvbWJpbmFzaSAoQ0hDKSI7czoyOiJjZiI7aTowO3M6MTA6InBlcnNlbnRhc2UiO2k6MDtzOjY6InN0YXR1cyI7czoxNDoidGlkYWtfYWRhX2RhdGEiO3M6NjoiYWxhc2FuIjthOjA6e319aTo1O2E6Njp7czoyOiJpZCI7czozOiJNMDYiO3M6MTE6Im5hbWFfbWV0b2RlIjtzOjI5OiJQaWwgUHJvZ2VzdGluIChQT1AgLyBNaW5pcGlsKSI7czoyOiJjZiI7aTowO3M6MTA6InBlcnNlbnRhc2UiO2k6MDtzOjY6InN0YXR1cyI7czoxNDoidGlkYWtfYWRhX2RhdGEiO3M6NjoiYWxhc2FuIjthOjA6e319aTo2O2E6Njp7czoyOiJpZCI7czozOiJNMDciO3M6MTE6Im5hbWFfbWV0b2RlIjtzOjEzOiJJbXBsYW4gKEFLQkspIjtzOjI6ImNmIjtpOjA7czoxMDoicGVyc2VudGFzZSI7aTowO3M6Njoic3RhdHVzIjtzOjE0OiJ0aWRha19hZGFfZGF0YSI7czo2OiJhbGFzYW4iO2E6MDp7fX1pOjc7YTo2OntzOjI6ImlkIjtzOjM6Ik0wOCI7czoxMToibmFtYV9tZXRvZGUiO3M6NjoiS29uZG9tIjtzOjI6ImNmIjtpOjA7czoxMDoicGVyc2VudGFzZSI7aTowO3M6Njoic3RhdHVzIjtzOjE0OiJ0aWRha19hZGFfZGF0YSI7czo2OiJhbGFzYW4iO2E6MDp7fX1pOjg7YTo2OntzOjI6ImlkIjtzOjM6Ik0wOSI7czoxMToibmFtYV9tZXRvZGUiO3M6MjQ6IktveW8gS29udHJhc2Vwc2kgKFBhdGNoKSI7czoyOiJjZiI7aTowO3M6MTA6InBlcnNlbnRhc2UiO2k6MDtzOjY6InN0YXR1cyI7czoxNDoidGlkYWtfYWRhX2RhdGEiO3M6NjoiYWxhc2FuIjthOjA6e319aTo5O2E6Njp7czoyOiJpZCI7czozOiJNMTAiO3M6MTE6Im5hbWFfbWV0b2RlIjtzOjI4OiJDaW5jaW4gVmFnaW5hIChWYWdpbmFsIFJpbmcp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', 1782305888),
('pBgOG5LiUJts4Du6seO2nbv8KZW9tzg35Cu819QO', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiZHFCS05MWGdRUmNXTVRVMDNaeDFsNTB4d0ZUaDhMM0tYNWtnOHNCOCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9rb25zdWx0YXNpIjtzOjU6InJvdXRlIjtOO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjEwOiJoYXNpbEFraGlyIjthOjExOntpOjA7YTo2OntzOjI6ImlkIjtzOjM6Ik0wOCI7czoxMToibmFtYV9tZXRvZGUiO3M6NjoiS29uZG9tIjtzOjI6ImNmIjtkOjAuODU7czoxMDoicGVyc2VudGFzZSI7ZDo4NTtzOjY6InN0YXR1cyI7czoxNzoic2FuZ2F0X2Rpc2FyYW5rYW4iO3M6NjoiYWxhc2FuIjthOjE6e2k6MDtzOjUwOToiTWVsaWhhdCBrb25kaXNpIEJ1bmRhIHlhbmcgbWVtaWxpa2kgY2F0YXRhbiBQdW55YSBrb21vcmJpZGl0YXMvcGVueWFraXQga3JvbmlzIGJlcmF0LCBtZXRvZGUgaW5pIG1lbmR1ZHVraSBwZXJpbmdrYXQgdGVyYXRhcyBzZWJhZ2FpIHBpbGloYW4gcHJpb3JpdGFzIHlhbmcgc2FuZ2F0IGRpcmVrb21lbmRhc2lrYW4uIERhcmkgZXZhbHVhc2kgcGFrYXIsIG1ldG9kZSBpbmkgdGVyYnVrdGkgbWVtaWxpa2kgdGluZ2thdCBrb21wYXRpYmlsaXRhcyB5YW5nIHNhbmdhdCB0aW5nZ2kgZGVuZ2FuIGtvbmRpc2kgdHVidWggQnVuZGEgc2FhdCBpbmkuIFBlbmdndW5hYW5ueWEgZGlqYW1pbiBhbWFuIHVudHVrIGphbmdrYSBwYW5qYW5nIGRhbiB0aWRhayBha2FuIG1lbWljdSBpbnRlcmFrc2kgbmVnYXRpZiBkZW5nYW4gcml3YXlhdCBtZWRpcyBCdW5kYS4gSW5pIGFkYWxhaCBzb2x1c2kgcGVybGluZHVuZ2FuIHlhbmcgc2FuZ2F0IGFuZGFsIGRhbiBtZW1iZXJpa2FuIGtldGVuYW5nYW4gcGlraXJhbi4iO319aToxO2E6Njp7czoyOiJpZCI7czozOiJNMDEiO3M6MTE6Im5hbWFfbWV0b2RlIjtzOjIwOiJJVUQgVGVtYmFnYSAoQ3UtSVVEKSI7czoyOiJjZiI7ZDowLjM7czoxMDoicGVyc2VudGFzZSI7ZDozMDtzOjY6InN0YXR1cyI7czoxNToicGVybHVfcGVyaGF0aWFuIjtzOjY6ImFsYXNhbiI7YToxOntpOjA7czo1NTU6IlNlY2FyYSB1bXVtLCBtZXRvZGUgaW5pIGN1a3VwIGFtYW4gZGFuIGJvbGVoIGRpZ3VuYWthbiwgbmFtdW4gZGVuZ2FuIHBlbmdhd2FzYW4ga2h1c3VzIChLYXRlZ29yaSBNRUMgMikuIEthbWkgbWVuY2F0YXQgYWRhbnlhIGtvbmRpc2kgUHVueWEga29tb3JiaWRpdGFzL3Blbnlha2l0IGtyb25pcyBiZXJhdC4gTmFtdW4sIGthcmVuYSBCdW5kYSBqdWdhIG1lbWlsaWtpIHJpd2F5YXQgS2Fua2VyIFNlcnZpa3MgKG1lbnVuZ2d1IHBlbmdvYmF0YW4gYmVkYWgvcmFkaWFzaSksIGhhbCBpbmkgbWVtZXJsdWthbiBrZWhhdGktaGF0aWFuIGVrc3RyYS4gS2V1bnR1bmdhbm55YSBtZW1hbmcgbWFzaWggdGVyYnVrdGkgbGViaWggYmVzYXIgZGFyaXBhZGEgcmlzaWtvbnlhLCB0ZXRhcGkga2FtaSBzYW5nYXQgbWVueWFyYW5rYW4gQnVuZGEgdW50dWsgYmVya29uc3VsdGFzaSBsYW5nc3VuZyBkYW4gbWVtZXJpa3Nha2FuIGRpcmkgc2VjYXJhIHJ1dGluIGtlIGJpZGFuIGF0YXUgZG9rdGVyIGthbmR1bmdhbiB1bnR1ayBtZW5nYW50aXNpcGFzaSBrZWx1aGFuIHNhYXQgcGVtYWthaWFuLiI7fX1pOjI7YTo2OntzOjI6ImlkIjtzOjM6Ik0wMyI7czoxMToibmFtYV9tZXRvZGUiO3M6MzE6IlN1bnRpayBQcm9nZXN0aW4gMyBCdWxhbiAoRE1QQSkiO3M6MjoiY2YiO2k6MDtzOjEwOiJwZXJzZW50YXNlIjtpOjA7czo2OiJzdGF0dXMiO3M6MTQ6InRpZGFrX2FkYV9kYXRhIjtzOjY6ImFsYXNhbiI7YTowOnt9fWk6MzthOjY6e3M6MjoiaWQiO3M6MzoiTTA2IjtzOjExOiJuYW1hX21ldG9kZSI7czoyOToiUGlsIFByb2dlc3RpbiAoUE9QIC8gTWluaXBpbCkiO3M6MjoiY2YiO2k6MDtzOjEwOiJwZXJzZW50YXNlIjtpOjA7czo2OiJzdGF0dXMiO3M6MTQ6InRpZGFrX2FkYV9kYXRhIjtzOjY6ImFsYXNhbiI7YTowOnt9fWk6NDthOjY6e3M6MjoiaWQiO3M6MzoiTTA3IjtzOjExOiJuYW1hX21ldG9kZSI7czoxMzoiSW1wbGFuIChBS0JLKSI7czoyOiJjZiI7aTowO3M6MTA6InBlcnNlbnRhc2UiO2k6MDtzOjY6InN0YXR1cyI7czoxNDoidGlkYWtfYWRhX2RhdGEiO3M6NjoiYWxhc2FuIjthOjA6e319aTo1O2E6Njp7czoyOiJpZCI7czozOiJNMTEiO3M6MTE6Im5hbWFfbWV0b2RlIjtzOjM4OiJUZXN0cGFjayAoU2tyaW5pbmcgS2VoYW1pbGFuIFR1bmRhIEtCKSI7czoyOiJjZiI7aTowO3M6MTA6InBlcnNlbnRhc2UiO2k6MDtzOjY6InN0YXR1cyI7czoxNDoidGlkYWtfYWRhX2RhdGEiO3M6NjoiYWxhc2FuIjthOjA6e319aTo2O2E6Njp7czoyOiJpZCI7czozOiJNMDIiO3M6MTE6Im5hbWFfbWV0b2RlIjtzOjIyOiJJVUQgSG9ybW9uYWwgKExORy1JVUQpIjtzOjI6ImNmIjtkOi0wLjY7czoxMDoicGVyc2VudGFzZSI7aTowO3M6Njoic3RhdHVzIjtzOjE2OiJ0aWRha19kaXNhcmFua2FuIjtzOjY6ImFsYXNhbiI7YToxOntpOjA7czo0NTA6Ik1vaG9uIGJlcmhhdGktaGF0aS4gS2FtaSBtZW5jYXRhdCBrb25kaXNpIEthbmtlciBTZXJ2aWtzIChtZW51bmdndSBwZW5nb2JhdGFuIGJlZGFoL3JhZGlhc2kpIHBhZGEgcmVrYW0gbWVkaXMgQnVuZGEuIFNlY2FyYSBrbGluaXMsIG1ldG9kZSBpbmkgS0FNSSBLVVJBTkcgU0FSQU5LQU4gKE1FQyAzKSBrYXJlbmEgZGlraGF3YXRpcmthbiBkYXBhdCBtZW1pY3Uga2V0aWRha255YW1hbmFuLCBrZXRpZGFrc2VpbWJhbmdhbiBob3Jtb24sIGF0YXUgcmlzaWtvIGtvbXBsaWthc2kgeWFuZyBsZWJpaCBiZXNhciBkYXJpcGFkYSBtYW5mYWF0bnlhLiBKaWthIG1lbXVuZ2tpbmthbiwgc2FuZ2F0IGJpamFrIHVudHVrIG1lbmdoaW5kYXJpIG1ldG9kZSBpbmkgZGFuIG1lbWlsaWggYWx0ZXJuYXRpZiBkaSBwZXJpbmdrYXQgYXRhcyB5YW5nIGphdWggbGViaWggYW1hbiBiYWdpIHR1YnVoIEJ1bmRhLiI7fX1pOjc7YTo2OntzOjI6ImlkIjtzOjM6Ik0wNCI7czoxMToibmFtYV9tZXRvZGUiO3M6MjQ6IlN1bnRpayBLb21iaW5hc2kgMSBCdWxhbiI7czoyOiJjZiI7ZDotMTtzOjEwOiJwZXJzZW50YXNlIjtpOjA7czo2OiJzdGF0dXMiO3M6ODoiZGlsYXJhbmciO3M6NjoiYWxhc2FuIjthOjE6e2k6MDtzOjYzMzoiQmVyZGFzYXJrYW4gcGVkb21hbiBrZXNlbGFtYXRhbiBtZWRpcyBrZXRhdCBkYXJpIFdITyAoS2F0ZWdvcmkgTUVDIDQpLCBtZXRvZGUgaW5pIGthbWkgdGV0YXBrYW4gc2ViYWdhaSBESUxBUkFORyBNVVRMQUsgdW50dWsgQnVuZGEuIEthbWkgbWVuZGV0ZWtzaSBhZGFueWEgcml3YXlhdCBIaXBlcnRlbnNpIGJlcmF0IChTaXN0b2xpayA+PSAxNjAgYXRhdSBEaWFzdG9saWsgPj0gMTAwIG1tSGcpIHNlcnRhIFNlZGFuZyBtZW5kZXJpdGEgLyBSaXdheWF0IFRyb21ib3NpcyBWZW5hIERhbGFtIChEVlQpIC8gRW1ib2xpIFBhcnUuIFBlbmdndW5hYW4gbWV0b2RlIGluaSBkYWxhbSBrb25kaXNpIHRlcnNlYnV0IHNhbmdhdCBkaWxhcmFuZyBrYXJlbmEgYmVycG90ZW5zaSBtZW1pY3Uga29tcGxpa2FzaSBmYXRhbCB5YW5nIG1lbmdhbmNhbSBqaXdhIGF0YXUgbWVtcGVyYnVydWsgcml3YXlhdCBwZW55YWtpdCB5YW5nIHN1ZGFoIGFkYS4gU2ViYWdhaSBwcmFrdGlzaSBrZXNlaGF0YW4sIGtlc2VsYW1hdGFuIGRhbiBueWF3YSBCdW5kYSBhZGFsYWggcHJpb3JpdGFzIHRlcnRpbmdnaSBrYW1pLCBzZWhpbmdnYSBvcHNpIGluaSB0ZWxhaCBkaWd1Z3Vya2FuIHNlcGVudWhueWEgZGFyaSBkYWZ0YXIgcmVrb21lbmRhc2kuIjt9fWk6ODthOjY6e3M6MjoiaWQiO3M6MzoiTTA1IjtzOjExOiJuYW1hX21ldG9kZSI7czoxOToiUGlsIEtvbWJpbmFzaSAoQ0hDKSI7czoyOiJjZiI7ZDotMTtzOjEwOiJwZXJzZW50YXNlIjtpOjA7czo2OiJzdGF0dXMiO3M6ODoiZGlsYXJhbmciO3M6NjoiYWxhc2FuIjthOjE6e2k6MDtzOjYzMzoiQmVyZGFzYXJrYW4gcGVkb21hbiBrZXNlbGFtYXRhbiBtZWRpcyBrZXRhdCBkYXJpIFdITyAoS2F0ZWdvcmkgTUVDIDQpLCBtZXRvZGUgaW5pIGthbWkgdGV0YXBrYW4gc2ViYWdhaSBESUxBUkFORyBNVVRMQUsgdW50dWsgQnVuZGEuIEthbWkgbWVuZGV0ZWtzaSBhZGFueWEgcml3YXlhdCBIaXBlcnRlbnNpIGJlcmF0IChTaXN0b2xpayA+PSAxNjAgYXRhdSBEaWFzdG9saWsgPj0gMTAwIG1tSGcpIHNlcnRhIFNlZGFuZyBtZW5kZXJpdGEgLyBSaXdheWF0IFRyb21ib3NpcyBWZW5hIERhbGFtIChEVlQpIC8gRW1ib2xpIFBhcnUuIFBlbmdndW5hYW4gbWV0b2RlIGluaSBkYWxhbSBrb25kaXNpIHRlcnNlYnV0IHNhbmdhdCBkaWxhcmFuZyBrYXJlbmEgYmVycG90ZW5zaSBtZW1pY3Uga29tcGxpa2FzaSBmYXRhbCB5YW5nIG1lbmdhbmNhbSBqaXdhIGF0YXUgbWVtcGVyYnVydWsgcml3YXlhdCBwZW55YWtpdCB5YW5nIHN1ZGFoIGFkYS4gU2ViYWdhaSBwcmFrdGlzaSBrZXNlaGF0YW4sIGtlc2VsYW1hdGFuIGRhbiBueWF3YSBCdW5kYSBhZGFsYWggcHJpb3JpdGFzIHRlcnRpbmdnaSBrYW1pLCBzZWhpbmdnYSBvcHNpIGluaSB0ZWxhaCBkaWd1Z3Vya2FuIHNlcGVudWhueWEgZGFyaSBkYWZ0YXIgcmVrb21lbmRhc2kuIjt9fWk6OTthOjY6e3M6MjoiaWQiO3M6MzoiTTA5IjtzOjExOiJuYW1hX21ldG9kZSI7czoyNDoiS295byBLb250cmFzZXBzaSAoUGF0Y2gpIjtzOjI6ImNmIjtkOi0xO3M6MTA6InBlcnNlbnRhc2UiO2k6MDtzOjY6InN0YXR1cyI7czo4OiJkaWxhcmFuZyI7czo2OiJhbGFzYW4iO2E6MTp7aTowO3M6NjMzOiJCZXJkYXNhcmthbiBwZWRvbWFuIGtlc2VsYW1hdGFuIG1lZGlzIGtldGF0IGRhcmkgV0hPIChLYXRlZ29yaSBNRUMgNCksIG1ldG9kZSBpbmkga2FtaSB0ZXRhcGthbiBzZWJhZ2FpIERJTEFSQU5HIE1VVExBSyB1bnR1ayBCdW5kYS4gS2FtaSBtZW5kZXRla3NpIGFkYW55YSByaXdheWF0IEhpcGVydGVuc2kgYmVyYXQgKFNpc3RvbGlrID49IDE2MCBhdGF1IERpYXN0b2xpayA+PSAxMDAgbW1IZykgc2VydGEgU2VkYW5nIG1lbmRlcml0YSAvIFJpd2F5YXQgVHJvbWJvc2lzIFZlbmEgRGFsYW0gKERWVCkgLyBFbWJvbGkgUGFydS4gUGVuZ2d1bmFhbiBtZXRvZGUgaW5pIGRhbGFtIGtvbmRpc2kgdGVyc2VidXQgc2FuZ2F0IGRpbGFyYW5nIGthcmVuYSBiZXJwb3RlbnNpIG1lbWljdSBrb21wbGlrYXNpIGZhdGFsIHlhbmcgbWVuZ2FuY2FtIGppd2EgYXRhdSBtZW1wZXJidXJ1ayByaXdheWF0IHBlbnlha2l0IHlhbmcgc3VkYWggYWRhLiBTZWJhZ2FpIHByYWt0aXNpIGtlc2VoYXRhbiwga2VzZWxhbWF0YW4gZGFuIG55YXdhIEJ1bmRhIGFkYWxhaCBwcmlvcml0YXMgdGVydGluZ2dpIGthbWksIHNlaGluZ2dhIG9wc2kgaW5pIHRlbGFoIGRpZ3VndXJrYW4gc2VwZW51aG55YSBkYXJpIGRhZnRhciByZWtvbWVuZGFzaS4iO319aToxMDthOjY6e3M6MjoiaWQiO3M6MzoiTTEwIjtzOjExOiJuYW1hX21ldG9kZSI7czoyODoiQ2luY2luIFZhZ2luYSAoVmFnaW5hbCBSaW5nKSI7czoyOiJjZiI7ZDotMTtzOjEwOiJwZXJzZW50YXNlIjtpOjA7czo2OiJzdGF0dXMiO3M6ODoiZGlsYXJhbmciO3M6NjoiYWxhc2FuIjthOjE6e2k6MDtzOjYzMzoiQmVyZGFzYXJrYW4gcGVkb21hbiBrZXNlbGFtYXRhbiBtZWRpcyBrZXRhdCBkYXJpIFdITyAoS2F0ZWdvcmkgTUVDIDQpLCBtZXRvZGUgaW5pIGthbWkgdGV0YXBrYW4gc2ViYWdhaSBESUxBUkFORyBNVVRMQUsgdW50dWsgQnVuZGEuIEthbWkgbWVuZGV0ZWtzaSBhZGFueWEgcml3YXlhdCBIaXBlcnRlbnNpIGJlcmF0IChTaXN0b2xpayA+PSAxNjAgYXRhdSBEaWFzdG9saWsgPj0gMTAwIG1tSGcpIHNlcnRhIFNlZGFuZyBtZW5kZXJpdGEgLyBSaXdheWF0IFRyb21ib3NpcyBWZW5hIERhbGFtIChEVlQpIC8gRW1ib2xpIFBhcnUuIFBlbmdndW5hYW4gbWV0b2RlIGluaSBkYWxhbSBrb25kaXNpIHRlcnNlYnV0IHNhbmdhdCBkaWxhcmFuZyBrYXJlbmEgYmVycG90ZW5zaSBtZW1pY3Uga29tcGxpa2FzaSBmYXRhbCB5YW5nIG1lbmdhbmNhbSBqaXdhIGF0YXUgbWVtcGVyYnVydWsgcml3YXlhdCBwZW55YWtpdCB5YW5nIHN1ZGFoIGFkYS4gU2ViYWdhaSBwcmFrdGlzaSBrZXNlaGF0YW4sIGtlc2VsYW1hdGFuIGRhbiBueWF3YSBCdW5kYSBhZGFsYWggcHJpb3JpdGFzIHRlcnRpbmdnaSBrYW1pLCBzZWhpbmdnYSBvcHNpIGluaSB0ZWxhaCBkaWd1Z3Vya2FuIHNlcGVudWhueWEgZGFyaSBkYWZ0YXIgcmVrb21lbmRhc2kuIjt9fX1zOjE0OiJrb25kaXNpRGlwaWxpaCI7TzozOToiSWxsdW1pbmF0ZVxEYXRhYmFzZVxFbG9xdWVudFxDb2xsZWN0aW9uIjoyOntzOjg6IgAqAGl0ZW1zIjthOjc6e2k6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', 1782297603);

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
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

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
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
