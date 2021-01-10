-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2020 at 10:49 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nachipatildatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `year` char(4) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `rating` varchar(5) DEFAULT NULL,
  `genre` varchar(50) DEFAULT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `writer` varchar(50) DEFAULT NULL,
  `director` varchar(50) DEFAULT NULL,
  `starring` varchar(255) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `video` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`year`, `title`, `rating`, `genre`, `summary`, `writer`, `director`, `starring`, `image`, `video`) VALUES
('1999', 'Star Wars: Episode 1 - The Phantom Menace', 'PG', 'Action, Adventure, Fantasy', 'Two Jedi escape a hostile blockade to find allies and come across a young boy who may bring balance to the Force, but the long dormant Sith resurface to claim their original glory.', 'George Lucas', 'George Lucas', 'Ewan McGregor, Liam Neeson, Natalie Portman', 'film_covers/1999.jpg', 'sample_vid.mp4'),
('2000', 'Mission: Impossible II', 'PG-13', 'Action, Adventure, Thriller', 'IMF agent Ethan Hunt is sent to Sydney to find and destroy a genetically modified disease called \"Chimera\".', 'Bruce Geller, Ronald D. Moore', 'John Woo', 'Tom Cruise, Dougray Scott, Thandie Newton', 'film_covers/2000.jpg', 'sample_vid.mp4'),
('2001', 'Harry Potter and the Sorcerer\'s Stone', 'PG', 'Adventure, Family, Fantasy', 'An orphaned boy enrolls in a school of wizardry, where he learns the truth about himself, his family and the terrible evil that haunts the magical world.', 'J.K. Rowling, Steve Kloves', 'Chris Colombus', 'Daniel Radcliffe, Rupert Grint, Richard Harris', 'film_covers/2001.jpg', 'sample_vid.mp4'),
('2002', 'The Lord of the Rings: The Two Towers', 'PG-13', 'Action, Adventure, Drama', 'While Frodo and Sam edge closer to Mordor with the help of the shifty Gollum, the divided fellowship makes a stand against Sauron\'s new ally, Saruman, and his hordes of Isengard.', 'J.R.R. Tolkien, Fran Walsh', 'Peter Jackson', 'Elijah Wood, Ian McKellen, Viggo Mortensen', 'film_covers/2002.jpg', 'sample_vid.mp4'),
('2003', 'The Lord of the Rings: The Return of the King', 'PG-13', 'Action, Adventure, Drama', 'Gandalf and Aragorn lead the World of Men against Sauron\'s army to draw his gaze from Frodo and Sam as they approach Mount Doom with the One Ring.', 'J.R.R. Tolkien, Fran Walsh', 'Peter Jackson', 'Elijah Wood, Viggo Mortensen, Ian McKellen', 'film_covers/2003.jpg', 'sample_vid.mp4'),
('2004', 'Shrek 2', 'PG', 'Animation, Adventure, Comedy', 'Shrek and Fiona travel to the Kingdom of Far Far Away, where Fiona\'s parents are King and Queen, to celebrate their marriage. When they arrive, they find they are not as welcome as they thought they would be.', 'William Steig, Andrew Adamson', 'Andrew Adamson, Kelly Asbury', 'Mike Myers, Eddie Murphy, Cameron Diaz', 'film_covers/2004.jpg', 'sample_vid.mp4'),
('2005', 'Harry Potter and the Goblet of Fire', 'PG-13', 'Adventure, Family, Fantasy', 'Harry Potter finds himself competing in a hazardous tournament between rival schools of magic, but he is distracted by recurring nightmares.', 'J.K. Rowling, Steve Kloves', 'Mike Newell', 'Daniel Radcliffe, Emma Watson, Rupert Grint', 'film_covers/2005.jpg', 'sample_vid.mp4'),
('2006', 'Pirates of the Caribbean: Dead Man\'s Chest', 'PG-13', 'Action, Adventure, Fantasy', 'Jack Sparrow races to recover the heart of Davy Jones to avoid enslaving his soul to Jones\' service, as other friends and foes seek the heart for their own agenda as well.', 'Ted Elliott, Terry Rossio', 'Gore Verbinski', 'Johnny Depp, Orlando Bloom, Keira Knightley', 'film_covers/2006.jpg', 'sample_vid.mp4'),
('2007', 'Pirates of the Caribbean: At World\'s End', 'PG-13', 'Action, Adventure, Fantasy', 'Captain Barbossa, Will Turner and Elizabeth Swann must sail off the edge of the map, navigate treachery and betrayal, find Jack Sparrow, and make their final alliances for one last decisive battle.', 'Ted Elliot, Terry Rossio', 'Gore Verbinski', 'Johnny Depp, Orlando Bloom, Keira Knightley', 'film_covers/2007.jpg', 'sample_vid.mp4'),
('2008', 'The Dark Knight', 'PG-13', 'Action, Crime, Drama', 'When the menace known as the Joker wreaks havoc and chaos on the people of Gotham, Batman must accept one of the greatest psychological and physical tests of his ability to fight injustice.', 'Johnathan Nolan, Christopher Nolan', 'Christopher Nolan', 'Christian Bale, Heath Ledger, Aaron Eckhart', 'film_covers/2008.jpg', 'sample_vid.mp4'),
('2009', 'Avatar', 'PG-13', 'Action, Adventure, Fantasy', 'A paraplegic Marine dispatched to the moon Pandora on a unique mission becomes torn between following his orders and protecting the world he feels is his home.', 'James Cameron', 'James Cameron', 'Sam Worthington, Zoe Saldana, Sigourney Weaver', 'film_covers/2009.jpg', 'sample_vid.mp4'),
('2010', 'Toy Story 3', 'G', 'Animation, Adventure, Comedy', 'The toys are mistakenly delivered to a day-care center instead of the attic right before Andy leaves for college, and it\'s up to Woody to convince the other toys that they weren\'t abandoned and to return home.', 'John Lasseter, Andrew Stanton', 'Lee Unkrich', 'Tom Hanks, Tim Allen, Joan Cusack', 'film_covers/2010.jpg', 'sample_vid.mp4'),
('2011', 'Harry Potter and the Deathly Hallows: Part 2', 'PG-13', 'Adventure, Drama, Fantasy', 'Harry, Ron, and Hermione search for Voldemort\'s remaining Horcruxes in their effort to destroy the Dark Lord as the final battle rages on at Hogwarts.', 'J.K. Rowling, Steve Kloves', 'David Yates', 'Daniel Radcliffe, Emma Watson, Rupert Grint', 'film_covers/2011.jpg', 'sample_vid.mp4'),
('2012', 'The Avengers', 'PG-13', 'Action, Adventure, Sci-Fi', 'Earth\'s mightiest heroes must come together and learn to fight as a team if they are going to stop the mischievous Loki and his alien army from enslaving humanity.', 'Joss Whedon, Zak Penn', 'Joss Whedon', 'Robert Downey Jr., Chris Evans, Scarlett Johansson', 'film_covers/2012.jpg', 'sample_vid.mp4'),
('2013', 'Frozen', 'PG', 'Animation, Adventure, Comedy', 'When the newly crowned Queen Elsa accidentally uses her power to turn things into ice to curse her home in infinite winter, her sister Anna teams up with a mountain man, his playful reindeer, and a snowman to change the weather condition.', 'Jennifer Lee, Hans Christian Andersen', 'Chris Buck, Jennifer Lee', 'Kristen Bell, Idina Menzel, Jonathan Groff', 'film_covers/2013.jpg', 'sample_vid.mp4'),
('2014', 'Transformers: Age of Extinction', 'PG-13', 'Action, Adventure, Sci-Fi', 'When humanity allies with a bounty hunter in pursuit of Optimus Prime, the Autobots turn to a mechanic and his family for help.', 'Ehren Kruger', 'Michael Bay', 'Mark Wahlberg, Nicola Peltz, Jack Reynor', 'film_covers/2014.jpg', 'sample_vid.mp4'),
('2015', 'Star Wars: Episode VII - The Force Awakens', 'PG-13', 'Action, Adventure, Sci-Fi', 'As a new threat to the galaxy rises, Rey, a desert scavenger, and Finn, an ex-stormtrooper, must join Han Solo and Chewbacca to search for the one hope of restoring peace.', 'Lawrence Kasdan, J.J. Abrams', 'J.J. Abrams', 'Daisy Ridley, John Boyega, Oscar Isaac', 'film_covers/2015.jpg', 'sample_vid.mp4'),
('2016', 'Captain America: Civil War', 'PG-13', 'Action, Adventure, Sci-Fi', 'Political involvement in the Avengers\' affairs causes a rift between Captain America and Iron Man.', 'Christopher Markus, Stephen McFeely', 'Anthony Russo, Joe Russo', 'Chris Evans, Robert Downey Jr., Scarlett Johansson', 'film_covers/2016.jpg', 'sample_vid.mp4'),
('2017', 'Star Wars: Episode VIII - The Last Jedi', 'PG-13', 'Action, Adventure, Fantasy', 'Rey develops her newly discovered abilities with the guidance of Luke Skywalker, who is unsettled by the strength of her powers. Meanwhile, the Resistance prepares for battle with the First Order.', 'Rian Johnson, George Lucas', 'Rian Johnson', 'Daisy Ridley, John Boyega, Mark Hamill', 'film_covers/2017.jpg', 'sample_vid.mp4'),
('2018', 'Avengers: Infinity War', 'PG-13', 'Action, Adventure, Sci-Fi', 'The Avengers and their allies must be willing to sacrifice all in an attempt to defeat the powerful Thanos before his blitz of devastation and ruin puts an end to the universe.', 'Christopher Markus, Stephen McFeely', 'Anthony Russo, Joe Russo', 'Robert Downey Jr., Chris Hemsworth, Mark Ruffalo', 'film_covers/2018.jpg', 'sample_vid.mp4'),
('2019', 'Avengers: Endgame', 'PG-13', 'Action, Adventure, Drama', 'After the devastating events of Avengers: Infinity War (2018), the universe is in ruins. With the help of remaining allies, the Avengers assemble once more in order to reverse Thanos\' actions and restore balance to the universe.', 'Christopher Markus, Stephen McFeely', 'Anthony Russo, Joe Russo', 'Robert Downey Jr., Chris Evans, Mark Ruffalo', 'film_covers/2019.jpg', 'sample_vid.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

GRANT SELECT, INSERT, DELETE, UPDATE
ON nachipatildatabase.*
TO nachipatil@localhost
IDENTIFIED BY 'nachipatil';