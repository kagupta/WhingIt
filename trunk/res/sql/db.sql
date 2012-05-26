SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `whingit`
--
CREATE DATABASE `whingit` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `whingit`;

-- ---------------------------------------------------------------------------------------
-- Create Tables
-- ---------------------------------------------------------------------------------------
-- 
-- Table For Users
-- 
CREATE TABLE `user` (
  `user_name` varchar(100) DEFAULT NULL,
  `city` varchar(31) NOT NULL,
  `address` varchar(31) NOT NULL,
  `age` decimal(3,0) DEFAULT NULL,
  `user_location` varchar(100) DEFAULT NULL,
  `user_email` varchar(50) DEFAULT NULL,
  `user_password` varchar(10) DEFAULT NULL,
  `gender` varchar(1) NOT NULL,
   `id` int(11) NOT NULL AUTO_INCREMENT,
  `imageID` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
-- ---------------------------------------------------------------------------------------
--
-- Table for Events
-- 
CREATE TABLE `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `creator` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`creator`) REFERENCES user(`id`)
  ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;
-- ---------------------------------------------------------------------------------------
--
-- Table for Attendees
--
CREATE TABLE `attend` (
  `id` int(11) NOT NULL,
  `attendee` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`,`attendee`),
  FOREIGN KEY (`id`) REFERENCES events(`id`)
  ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`attendee`) REFERENCES user(`id`)
  ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
-- ---------------------------------------------------------------------------------------
--
-- Table for Tags (Possible Tags)
--
CREATE TABLE `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
-- ---------------------------------------------------------------------------------------
--
-- Table for Event Tag Lookup
--
CREATE TABLE `tagLookup` (
  `eventID` int(11) NOT NULL,
  `tagID` int(11) NOT NULL,
  PRIMARY KEY (`eventID`,`tagID`),
  FOREIGN KEY (`eventID`) REFERENCES events(`id`)
  ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`tagID`) REFERENCES tags(`id`)
  ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ---------------------------------------------------------------------------------------
--
-- Table for Event Description
--
CREATE TABLE `description` (
  `eventID` int(11) NOT NULL,
  `about` varchar(240),
  PRIMARY KEY (`eventID`),
  FOREIGN KEY (`eventID`) REFERENCES events(`id`)
  ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
-- ---------------------------------------------------------------------------------------
--
-- Table for Images 
--
CREATE TABLE `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  content MEDIUMBLOB NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


