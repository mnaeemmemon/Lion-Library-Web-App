-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2020 at 05:45 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lion library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(5) NOT NULL,
  `name` varchar(30) NOT NULL,
  `author` varchar(30) NOT NULL,
  `image` varchar(20000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `author`, `image`) VALUES
(1, 'Secrets of Divine Love', 'A.Helwa', 'https://readings.com.pk/Pages/Categories/BookImages/9789696401629.jpg'),
(2, 'The Murder of History', 'A.A.Aziz', 'https://www.libertybooks.com/image/catalog/The-Murder-of-History.jpg'),
(3, '29 dates', 'Melissa de sa cruz', 'https://www.libertybooks.com/image/catalog/83913.jpg'),
(4, 'Revive Your Heart', 'Nauman Ali Khan', 'https://www.libertybooks.com/image/catalog/Revive-Your-Heart:-Putting-Life-in-Perspective.jpg'),
(5, 'I Robot', 'Issac Asimov', 'https://www.libertybooks.com/image/catalog/87986.jpg'),
(6, 'The Enigma Of Arrival', 'V.Neipal', 'https://www.libertybooks.com/image/Aqib%20(DMC)/51RRWqItQiL._SX328_BO1,204,203,200_.jpg'),
(7, 'A Bend In The River', 'V.S.Naipal', 'https://www.libertybooks.com/image/Aqib%20(DMC)/51A+yep1zVL._SX328_BO1,204,203,200_.jpg'),
(8, 'In A Free State', 'V.S.Naipal', 'https://www.libertybooks.com/image/Aqib%20(DMC)/514AJEYxQ7L._SX328_BO1,204,203,200_.jpg'),
(9, 'The Queens Assassin', 'Melissa de sa cruz', 'https://www.libertybooks.com/image/catalog/87954.jpg'),
(10, 'Notes on a Scandal', 'Zoe heller', 'https://www.libertybooks.com/image/Fuzail%20folder/165.jpg'),
(11, 'The Night Country', 'Melissa Albert', 'https://www.libertybooks.com/image/catalog/87528.jpg'),
(12, 'Helen Keller', 'Sara Albee', 'https://www.libertybooks.com/image/catalog/isbndbimages/9780062432810_isbn.jpg'),
(13, 'The death of Shakespeare', 'Kathryn Harkup', 'https://www.libertybooks.com/image/Usama/Death%20By%20Shakespeare.jpg'),
(14, 'HER', 'Pierre Alex Jeanty', 'https://www.libertybooks.com/image/catalog/her-9780997426588.jpg'),
(15, 'UnSpoken', 'Pierre Alex Jeanty', 'https://www.libertybooks.com/image/catalog/aaa70.jpg'),
(16, 'The Women I Once Loved', 'Pierre Alex Jeanty', 'https://www.libertybooks.com/image/catalog/to-the-women-i-once-loved-9780986255632.jpg'),
(17, 'Arctic Zoo', 'Robert', 'https://www.libertybooks.com/image/Fuzail%20folder/100.jpg'),
(18, 'HIM', 'Pierre Alex Jeanty', 'https://www.libertybooks.com/image/catalog/82540.jpg'),
(19, 'Never grow Up', 'Jackie Chan', 'https://www.libertybooks.com/image/catalog/isbndbimages/9781471177255_isbn.jpg'),
(20, '9 Lessons In Brexit', 'Ivan Rogers', 'https://www.libertybooks.com/image/catalog/87429.jpg'),
(21, 'Come Back for Me', 'Heidi perks', 'https://www.libertybooks.com/image/catalog/87651.jpg'),
(22, 'The Lost Symbol', 'Simon Cox', 'https://www.libertybooks.com/image/decoding-the-lost-symbol-unravelling-the-secrets-behind-dan-browns-international-bestseller-the-unauthorised-guide-rp9781845960544.jpg'),
(23, 'The paradigm', 'Jonthan cahn', 'https://www.libertybooks.com/image/catalog/the-paradigm-the-ancient-blueprint-that-holds-the-mystery-of-our-times-9781629994765.jpg'),
(24, 'Little Boy', 'Lawrence Ferlinghetti', 'https://www.libertybooks.com/image/sami/51xeWlSbPzL._SX324_BO1,204,203,200_.jpg'),
(25, 'A year in the world', 'Mayes', 'https://www.libertybooks.com/image/a-year-in-the-world-journeys-of-a-passionate-traveller-rp9780767910057.jpg'),
(26, 'Cyber War', 'Richard', 'https://www.libertybooks.com/image/cyber-war-the-next-threat-to-national-security-and-what-to-do-about-it-rp9780061962233.jpg'),
(27, 'When Breath Becomes Air', 'Paulo Cohelo', 'https://www.libertybooks.com/image/catalog/when-breath-becomes-air-9781784701994.jpg'),
(28, 'The Doll', 'Ismail Kadare', 'https://www.libertybooks.com/image/catalog/87666.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
