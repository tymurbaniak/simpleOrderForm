-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 07 Gru 2015, 14:52
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sf`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `order_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_fname` varchar(32) NOT NULL,
  `order_lname` varchar(32) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_id`),
  UNIQUE KEY `id` (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Zrzut danych tabeli `order`
--

INSERT INTO `order` (`order_id`, `order_fname`, `order_lname`, `order_date`) VALUES
(7, 'Krzysiu', 'Pysiu', '2015-12-04 10:56:32'),
(8, 'Jasiu', 'Masiu', '2015-12-04 10:57:25'),
(9, 'Hubert', 'Masiu', '2015-12-04 12:18:51'),
(10, 'Hubert', 'Masiu', '2015-12-04 12:23:25'),
(11, 'Hubert', 'Masiu', '2015-12-04 12:25:21'),
(12, '', '', '2015-12-07 09:26:09'),
(13, 'Tomasz', 'UrbaÅ„ski', '2015-12-07 11:46:55'),
(14, 'Tomasz', 'UrbaÅ„ski', '2015-12-07 11:59:38'),
(15, 'Tomasz', 'UrbaÅ„ski', '2015-12-07 12:01:50'),
(16, 'Tomasz', 'UrbaÅ„ski', '2015-12-07 12:02:48'),
(17, 'Tomasz', 'UrbaÅ„ski', '2015-12-07 12:04:45'),
(18, 'Tomasz', 'UrbaÅ„ski', '2015-12-07 12:06:25'),
(19, 'Tomasz', 'UrbaÅ„ski', '2015-12-07 14:25:29');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `product_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_pname` varchar(128) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_price` float NOT NULL,
  `product_forordkey` bigint(20) unsigned NOT NULL,
  `product_cost` float NOT NULL,
  PRIMARY KEY (`product_id`),
  UNIQUE KEY `id` (`product_id`),
  KEY `forordkey` (`product_forordkey`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=169 ;

--
-- Zrzut danych tabeli `product`
--

INSERT INTO `product` (`product_id`, `product_pname`, `product_quantity`, `product_price`, `product_forordkey`, `product_cost`) VALUES
(1, 'kurczaki', 23, 0, 7, 0),
(2, 'ziemniaki', 1, 20, 7, 20),
(3, 'pasztet', 3, 0, 7, 0),
(4, 'zupa pomidorowa', 90, 0, 7, 0),
(5, 'baweÅ‚na', 34, 0, 7, 0),
(6, 'ryÅ¼ - kg', 23, 45.23, 7, 1040.29),
(7, 'drzewo', 54, 0, 7, 0),
(8, 'piasek', 76, 0, 7, 0),
(9, 'ryby', 34, 0, 7, 0),
(10, 'Å›mietana', 23, 0, 7, 0),
(11, 'cif', 54, 0, 7, 0),
(12, 'ludwik', 65, 0, 7, 0),
(13, 'kurczaki', 23, 3, 8, 69),
(14, 'ziemniaki', 1, 12, 8, 12),
(15, 'pasztet', 3, 17, 8, 51),
(16, 'zupa pomidorowa', 90, 23, 8, 2070),
(17, 'baweÅ‚na', 34, 22, 8, 748),
(18, 'ryÅ¼ - kg', 23, 0, 8, 0),
(19, 'drzewo', 54, 0, 8, 0),
(20, 'piasek', 76, 0, 8, 0),
(21, 'ryby', 34, 0, 8, 0),
(22, 'Å›mietana', 23, 0, 8, 0),
(23, 'cif', 54, 0, 8, 0),
(24, 'ludwik', 65, 0, 8, 0),
(25, 'klocki', 6, 0, 9, 0),
(26, 'komputer', 12, 0, 9, 0),
(27, 'gniazdka', 12, 23.5, 9, 282),
(28, 'korki', 1, 0, 9, 0),
(29, 'ciuchy', 9, 0, 9, 0),
(30, 'buty', 9, 0, 9, 0),
(31, 'nogi', 9, 0, 9, 0),
(32, 'ryby', 923, 24, 9, 22152),
(33, 'portki', 2, 34, 9, 68),
(34, 'samochÃ³d', 12, 56.5, 9, 678),
(35, 'trabant', 2, 0, 9, 0),
(36, 'pizza', 9, 0, 9, 0),
(37, 'czapka', 6, 0, 10, 0),
(38, 'pralka', 12, 0, 10, 0),
(39, 'wyÅ¼ymaczka', 12, 0, 10, 0),
(40, 'taczka', 1, 0, 10, 0),
(41, 'kubki', 9, 0, 10, 0),
(42, 'Å›ciany', 9, 0, 10, 0),
(43, 'dom', 9, 0, 10, 0),
(44, 'rÄ™ce', 923, 0, 10, 0),
(45, 'kable', 2, 0, 10, 0),
(46, 'krzesÅ‚o', 12, 0, 10, 0),
(47, 'farby', 2, 0, 10, 0),
(48, 'podÅ‚oga', 9, 0, 10, 0),
(49, 'czapka', 6, 23, 11, 138),
(50, 'pralka', 12, 65.45, 11, 785.4),
(51, 'wyÅ¼ymaczka', 12, 0, 11, 0),
(52, 'taczka', 1, 25, 11, 25),
(53, 'kubki', 9, 32, 11, 288),
(54, 'Å›ciany', 9, 13, 11, 117),
(55, 'dom', 9, 0, 11, 0),
(56, 'rÄ™ce', 923, 0, 11, 0),
(57, 'kable', 2, 43, 11, 86),
(58, 'krzesÅ‚o', 12, 56.34, 11, 676.08),
(59, 'farby', 2, 0, 11, 0),
(60, 'podÅ‚oga', 9, 0, 11, 0),
(73, '', 0, 0, 12, 0),
(74, '', 0, 0, 12, 0),
(75, '', 0, 0, 12, 0),
(76, '', 0, 0, 12, 0),
(77, '', 0, 0, 12, 0),
(78, '', 0, 0, 12, 0),
(79, '', 0, 0, 12, 0),
(80, '', 0, 0, 12, 0),
(81, '', 0, 0, 12, 0),
(82, '', 0, 0, 12, 0),
(83, '', 0, 0, 12, 0),
(84, '', 0, 0, 12, 0),
(85, 'samochÃ³d', 2, 0, 13, 0),
(86, 'monitor', 3, 0, 13, 0),
(87, 'stÃ³Å‚', 2, 0, 13, 0),
(88, 'krzesÅ‚o', 1, 0, 13, 0),
(89, 'robaki', 3, 0, 13, 0),
(90, 'ziemniaki', 9, 0, 13, 0),
(91, 'tablica', 2, 0, 13, 0),
(92, 'buty', 1, 0, 13, 0),
(93, 'kubek', 3, 0, 13, 0),
(94, 'kurtka', 3, 0, 13, 0),
(95, 'parapet', 2, 0, 13, 0),
(96, 'widelec', 1, 0, 13, 0),
(97, 'samochÃ³d', 2, 0, 14, 0),
(98, 'monitor', 3, 0, 14, 0),
(99, 'stÃ³Å‚', 2, 0, 14, 0),
(100, 'krzesÅ‚o', 1, 0, 14, 0),
(101, 'robaki', 3, 0, 14, 0),
(102, 'ziemniaki', 9, 0, 14, 0),
(103, 'tablica', 2, 0, 14, 0),
(104, 'buty', 1, 0, 14, 0),
(105, 'kubek', 3, 0, 14, 0),
(106, 'kurtka', 3, 0, 14, 0),
(107, 'parapet', 2, 0, 14, 0),
(108, 'widelec', 1, 0, 14, 0),
(109, 'samochÃ³d', 2, 0, 15, 0),
(110, 'monitor', 3, 0, 15, 0),
(111, 'stÃ³Å‚', 2, 0, 15, 0),
(112, 'krzesÅ‚o', 1, 0, 15, 0),
(113, 'robaki', 3, 0, 15, 0),
(114, 'ziemniaki', 9, 0, 15, 0),
(115, 'tablica', 2, 0, 15, 0),
(116, 'buty', 1, 0, 15, 0),
(117, 'kubek', 3, 0, 15, 0),
(118, 'kurtka', 3, 0, 15, 0),
(119, 'parapet', 2, 0, 15, 0),
(120, 'widelec', 1, 0, 15, 0),
(121, 'samochÃ³d', 2, 0, 16, 0),
(122, 'monitor', 3, 0, 16, 0),
(123, 'stÃ³Å‚', 2, 0, 16, 0),
(124, 'krzesÅ‚o', 1, 0, 16, 0),
(125, 'robaki', 3, 0, 16, 0),
(126, 'ziemniaki', 9, 0, 16, 0),
(127, 'tablica', 2, 0, 16, 0),
(128, 'buty', 1, 0, 16, 0),
(129, 'kubek', 3, 0, 16, 0),
(130, 'kurtka', 3, 0, 16, 0),
(131, 'parapet', 2, 0, 16, 0),
(132, 'widelec', 1, 0, 16, 0),
(133, 'samochÃ³d', 2, 0, 17, 0),
(134, 'monitor', 3, 0, 17, 0),
(135, 'stÃ³Å‚', 2, 0, 17, 0),
(136, 'krzesÅ‚o', 1, 0, 17, 0),
(137, 'robaki', 3, 0, 17, 0),
(138, 'ziemniaki', 9, 0, 17, 0),
(139, 'tablica', 2, 0, 17, 0),
(140, 'buty', 1, 0, 17, 0),
(141, 'kubek', 3, 0, 17, 0),
(142, 'kurtka', 3, 0, 17, 0),
(143, 'parapet', 2, 0, 17, 0),
(144, 'widelec', 1, 0, 17, 0),
(145, 'samochÃ³d', 2, 0, 18, 0),
(146, 'monitor', 3, 0, 18, 0),
(147, 'stÃ³Å‚', 2, 0, 18, 0),
(148, 'krzesÅ‚o', 1, 0, 18, 0),
(149, 'robaki', 3, 0, 18, 0),
(150, 'ziemniaki', 9, 0, 18, 0),
(151, 'tablica', 2, 0, 18, 0),
(152, 'buty', 1, 0, 18, 0),
(153, 'kubek', 3, 0, 18, 0),
(154, 'kurtka', 3, 0, 18, 0),
(155, 'parapet', 2, 0, 18, 0),
(156, 'widelec', 1, 0, 18, 0),
(157, 'samochÃ³d', 2, 0, 19, 0),
(158, 'monitor', 3, 0, 19, 0),
(159, 'stÃ³Å‚', 2, 0, 19, 0),
(160, 'krzesÅ‚o', 1, 0, 19, 0),
(161, 'robaki', 3, 0, 19, 0),
(162, 'ziemniaki', 9, 0, 19, 0),
(163, 'tablica', 2, 0, 19, 0),
(164, 'buty', 1, 0, 19, 0),
(165, 'kubek', 3, 0, 19, 0),
(166, 'kurtka', 3, 0, 19, 0),
(167, 'parapet', 2, 0, 19, 0),
(168, 'widelec', 1, 0, 19, 0);

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`product_forordkey`) REFERENCES `order` (`order_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
