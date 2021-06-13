-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2021 at 07:54 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news`
--
CREATE DATABASE IF NOT EXISTS `news` DEFAULT CHARACTER SET utf8 COLLATE utf8_croatian_ci;
USE `news`;

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(8) NOT NULL,
  `date` varchar(32) COLLATE utf8_croatian_ci NOT NULL,
  `title` varchar(64) COLLATE utf8_croatian_ci NOT NULL,
  `summary` text COLLATE utf8_croatian_ci NOT NULL,
  `content` text COLLATE utf8_croatian_ci NOT NULL,
  `image` varchar(64) COLLATE utf8_croatian_ci NOT NULL,
  `category` varchar(64) COLLATE utf8_croatian_ci NOT NULL,
  `archive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `date`, `title`, `summary`, `content`, `image`, `category`, `archive`) VALUES
(1, '11.06.2021.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam sed do eiusmod tempor consectetur adipiscing elit incididunt ut labore et dolore', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nisl condimentum id venenatis a condimentum vitae. Vestibulum lectus mauris ultrices eros. Mattis molestie a iaculis at erat pellentesque adipiscing commodo. Mattis vulputate enim nulla aliquet porttitor lacus luctus. Eget nulla facilisi etiam dignissim diam. Et malesuada fames ac turpis. Vitae purus faucibus ornare suspendisse sed nisi lacus. Faucibus purus in massa tempor nec. In massa tempor nec feugiat. Tellus in metus vulputate eu scelerisque felis imperdiet. Urna condimentum mattis pellentesque id nibh.', 'merkel.jpg', 'europa', 0),
(2, '01.06.2021.', 'Duis aute irure dolor in reprehenderit in voluptate velit esse c', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam sed do eiusmod tempor consectetur adipiscing elit incididunt ut labore et dolore', 'Nunc scelerisque viverra mauris in aliquam. Condimentum mattis pellentesque id nibh tortor. Leo urna molestie at elementum eu facilisis. Et leo duis ut diam quam nulla porttitor massa id. Sagittis id consectetur purus ut faucibus pulvinar elementum. Dictum varius duis at consectetur. Ultricies tristique nulla aliquet enim tortor. Netus et malesuada fames ac turpis egestas sed tempus urna. Pellentesque nec nam aliquam sem et tortor consequat. Vitae elementum curabitur vitae nunc sed velit dignissim sodales. Ut consequat semper viverra nam libero justo laoreet sit. Mattis nunc sed blandit libero volutpat sed.', 'iceberg.jpeg', 'teknautas', 0),
(4, '04.05.2021.', 'Dictum varius duis at consectetur. Ultricies tristique nulla ali', 'Vitae elementum curabitur vitae nunc sed velit dignissim sodales. Ut consequat semper viverra nam libero justo laoreet sit. Mattis nunc sed blandit libero volutpat sed.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nisl condimentum id venenatis a condimentum vitae. Vestibulum lectus mauris ultrices eros. Mattis molestie a iaculis at erat pellentesque adipiscing commodo. Mattis vulputate enim nulla aliquet porttitor lacus luctus. Eget nulla facilisi etiam dignissim diam. Et malesuada fames ac turpis. Vitae purus faucibus ornare suspendisse sed nisi lacus. Faucibus purus in massa tempor nec. In massa tempor nec feugiat. Tellus in metus vulputate eu scelerisque felis imperdiet. Urna condimentum mattis pellentesque id nibh.', 'ecar.jpg', 'teknautas', 0),
(6, '11.06.2021.', 'Donec sodales eros vitae viverra lacinia, nullam a facilisis ni', 'Suspendisse potenti. Etiam vitae sapien lacinia, mattis arcu quis, imperdiet ex. Aliquam interdum nulla id velit semper aliquam ultricies ac purus.', 'Etiam convallis magna tellus, eu gravida nisl eleifend ac. Nulla rutrum sapien ac nibh iaculis tristique. Donec at tempor nulla. Maecenas augue ligula, iaculis a ipsum in, scelerisque semper mi. Donec rhoncus et dui ornare consequat. Etiam venenatis lacinia fermentum. Vivamus vel tempor augue. Proin egestas accumsan metus. Suspendisse potenti. Ut cursus accumsan arcu, at blandit mi lacinia in. Interdum et malesuada fames ac ante ipsum primis in faucibus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas rutrum ornare ante ac cursus. Duis at est leo. Sed commodo ligula at sapien placerat auctor. Maecenas fermentum odio a vestibulum lacinia.', 'rimac.jpg', 'teknautas', 0),
(13, '01.06.2021.', 'Duis aute irure dolor in reprehenderit in voluptate velit esse c', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam sed do eiusmod tempor consectetur adipiscing elit incididunt ut labore et dolore', 'Nunc scelerisque viverra mauris in aliquam. Condimentum mattis pellentesque id nibh tortor. Leo urna molestie at elementum eu facilisis. Et leo duis ut diam quam nulla porttitor massa id. Sagittis id consectetur purus ut faucibus pulvinar elementum. Dictum varius duis at consectetur. Ultricies tristique nulla aliquet enim tortor. Netus et malesuada fames ac turpis egestas sed tempus urna. Pellentesque nec nam aliquam sem et tortor consequat. Vitae elementum curabitur vitae nunc sed velit dignissim sodales. Ut consequat semper viverra nam libero justo laoreet sit. Mattis nunc sed blandit libero volutpat sed.', 'iceberg.jpeg', 'teknautas', 0),
(14, '23.06.2021.', 'Excepteur sint occaecat cupidatat non proident', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam sed do eiusmod tempor consectetur adipiscing elit incididunt ut labore et dolore\r\n', 'Nunc scelerisque viverra mauris in aliquam. Condimentum mattis pellentesque id nibh tortor. Leo urna molestie at elementum eu facilisis. Et leo duis ut diam quam nulla porttitor massa id. Sagittis id consectetur purus ut faucibus pulvinar elementum. Dictum varius duis at consectetur. Ultricies tristique nulla aliquet enim tortor. Netus et malesuada fames ac turpis egestas sed tempus urna. Pellentesque nec nam aliquam sem et tortor consequat. Vitae elementum curabitur vitae nunc sed velit dignissim sodales. Ut consequat semper viverra nam libero justo laoreet sit. Mattis nunc sed blandit libero volutpat sed', 'macron.jpg', 'europa', 0),
(17, '11.06.2021.', 'Donec sodales eros vitae viverra lacinia, nullam a facilisis ni', 'Suspendisse potenti. Etiam vitae sapien lacinia, mattis arcu quis, imperdiet ex. Aliquam interdum nulla id velit semper aliquam ultricies ac purus.', 'Etiam convallis magna tellus, eu gravida nisl eleifend ac. Nulla rutrum sapien ac nibh iaculis tristique. Donec at tempor nulla. Maecenas augue ligula, iaculis a ipsum in, scelerisque semper mi. Donec rhoncus et dui ornare consequat. Etiam venenatis lacinia fermentum. Vivamus vel tempor augue. Proin egestas accumsan metus. Suspendisse potenti. Ut cursus accumsan arcu, at blandit mi lacinia in. Interdum et malesuada fames ac ante ipsum primis in faucibus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas rutrum ornare ante ac cursus. Duis at est leo. Sed commodo ligula at sapien placerat auctor. Maecenas fermentum odio a vestibulum lacinia.', 'rimac.jpg', 'teknautas', 0),
(25, '11.06.2021.', 'Plenkovic dolor sit amet', 'Plenky tugy plaky lorem amet sit', 'Plenky plenky zoky zoky tugy plaky bubi babi Plenky plenky zoky zoky tugy plaky bubi babi Plenky plenky zoky zoky tugy plaky bubi babi Plenky plenky zoky zoky tugy plaky bubi babi Plenky plenky zoky zoky tugy plaky bubi babi Plenky plenky zoky zoky tugy plaky bubi babi Plenky plenky zoky zoky tugy plaky bubi babi Plenky plenky zoky zoky tugy plaky bubi babi Plenky plenky zoky zoky tugy plaky bubi babi ', 'plenkovic.jpg', 'europa', 0),
(26, '11.06.2021.', 'Bitcoin go brrrrr', 'Bitcoin good dollar bad', 'bitcoin go brrrr musk go brrrRRR plebs go noo \r\nbitcoin go brrrr musk go brrrRRR plebs go noo\r\nbitcoin go brrrr musk go brrrRRR plebs go noo\r\nbitcoin go brrrr musk go brrrRRR plebs go noo\r\nbitcoin go brrrr musk go brrrRRR plebs go noo\r\nbitcoin go brrrr musk go brrrRRR plebs go noo\r\nbitcoin go brrrr musk go brrrRRR plebs go noo\r\nbitcoin go brrrr musk go brrrRRR plebs go noo', 'bitcoin.jpg', 'teknautas', 0),
(60, '13.06.2021.', 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nisl condimentum id venenatis a condimentum vitae. Vestibulum lectus mauris ultrices eros. Mattis molestie a iaculis at erat pellentesque adipiscing commodo. Mattis vulputate enim nulla aliquet porttitor lacus luctus. Eget nulla facilisi etiam dignissim diam. Et malesuada fames ac turpis. Vitae purus faucibus ornare suspendisse sed nisi lacus. Faucibus purus in massa tempor nec. In massa tempor nec feugiat. Tellus in metus vulputate eu scelerisque felis imperdiet. Urna condimentum mattis pellentesque id nibh.\r\n\r\n', 'corona.jpg', 'europa', 0),
(64, '13.06.2021.', 'Corona brrrrr', 'Lorem dolor sit ipsum nunc excem bunt', 'Lorem dolor sit ipsum nunc excem bunt Lorem dolor sit ipsum nunc excem bunt Lorem dolor sit ipsum nunc excem bunt Lorem dolor sit ipsum nunc excem bunt Lorem dolor sit ipsum nunc excem bunt Lorem dolor sit ipsum nunc excem bunt Lorem dolor sit ipsum nunc excem bunt Lorem dolor sit ipsum nunc excem buntLorem dolor sit ipsum nunc excem bunt Lorem dolor sit ipsum nunc excem bunt', 'corona.jpg', 'europa', 0),
(65, '13.06.2021.', 'Meow dolor meow sit', 'Meow meow meow', 'Lorem meow dolor meow sit meow amet meow. Lorem meow dolor meow sit meow amet meow. Lorem meow dolor meow sit meow amet meow. Lorem meow dolor meow sit meow amet meow. Lorem meow dolor meow sit meow amet meow. Lorem meow dolor meow sit meow amet meow. Lorem meow dolor meow sit meow amet meow. Lorem meow dolor meow sit meow amet meow. Lorem meow dolor meow sit meow amet meow. Lorem meow dolor meow sit meow amet meow. ', 'download.jpg', 'europa', 0);

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(100) COLLATE utf8_croatian_ci NOT NULL,
  `prezime` varchar(100) COLLATE utf8_croatian_ci NOT NULL,
  `korisnicko_ime` varchar(100) COLLATE utf8_croatian_ci NOT NULL,
  `lozinka` varchar(255) COLLATE utf8_croatian_ci NOT NULL,
  `razina` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `korisnicko_ime`, `lozinka`, `razina`) VALUES
(7, 'Vedran', 'Repanić', 'admin', '$2y$10$X4Adf1Q5EecULESWv7oKp.Eb8m7eX7xY4YT8HAU.INxW5SvZcB9w6', 1),
(8, 'John', 'Doe', 'gost', '$2y$10$DfL/2xj0kSg5H7PYZ/wAnOEyDBTSmug7PpLR7oq.MJtwJKOVwP4w.', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `korisnicko_ime` (`korisnicko_ime`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
