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
-- Insert values into database
-- ---------------------------------------------------------------------------------------

INSERT INTO `user` (user_email, user_name, user_password) VALUES('ad', 'Ansum Dholakia', 'blahblah');
INSERT INTO `user` (user_email, user_name, user_password) VALUES('ak47', 'AK Kumar', 'qwerty');
INSERT INTO `user` (user_email, user_name, user_password) VALUES('bgrif', 'Blake Griffin', 'clippers');
INSERT INTO `user` (user_email, user_name, user_password) VALUES('jimmyclackers', 'Jonathan Lam', 'clackers');
INSERT INTO `user` (user_email, user_name, user_password) VALUES('kgupta', 'KAPS Gupta', 'word');
INSERT INTO `user` (user_email, user_name, user_password) VALUES('kobeBryant', 'Kobe Bryant', 'lakers');
INSERT INTO `user` (user_email, user_name, user_password) VALUES('sechan', 'Sean Chan', 'seanseanchan');
INSERT INTO `user` (user_email, user_name, user_password) VALUES('sechen', 'Sean Chen', 'seanseanchen');
INSERT INTO `user` (user_email, user_name, user_password) VALUES('spark', 'Sean Parker', 'seanseanparker');
INSERT INTO `user` (user_email, user_name, user_password) VALUES('vbhalodi', 'Viral Bhalodia', 'password');

INSERT INTO `events` (name, time, location, creator) VALUES ('Lakers Nuggets Game 7', '2012-05-12 07:30:00', 'TNT', 3);
INSERT INTO `events` (name, time, location, creator) VALUES ('Scripps Canyon Shore Dive: May Dives= Hella Fun!', '2012-05-13 07:30:00', 'Scripps', 3);
INSERT INTO `events` (name, time, location, creator) VALUES ('Happy Hour', '2012-05-12 17:30:00', 'Beaumonts', 5);
INSERT INTO `events` (name, time, location, creator) VALUES ('JUNKYARD DERBY', '2012-05-14 08:30:00', 'Peterson Hill', 7);
INSERT INTO `events` (name, time, location, creator) VALUES ('Lakers Thunder Game 1', '2012-05-16 07:30:00', 'TNT', 7);

INSERT INTO `tags` (`tag`) VALUES ('other');
INSERT INTO `tags` (`tag`) VALUES ('free food');
INSERT INTO `tags` (`tag`) VALUES ('tech talk');
INSERT INTO `tags` (`tag`) VALUES ('student org');
INSERT INTO `tags` (`tag`) VALUES ('professional');
INSERT INTO `tags` (`tag`) VALUES ('academic');
INSERT INTO `tags` (`tag`) VALUES ('entertainment');
INSERT INTO `tags` (`tag`) VALUES ('bars');
INSERT INTO `tags` (`tag`) VALUES ('sports');

INSERT INTO `attend` VALUES (1,3,1);
INSERT INTO `attend` VALUES (1,9,1);
INSERT INTO `attend` VALUES (1,10,2);
INSERT INTO `attend` VALUES (1,2,3);
INSERT INTO `attend` VALUES (1,6,1);
INSERT INTO `attend` VALUES (2,6,2);
INSERT INTO `attend` VALUES (2,3,2);
INSERT INTO `attend` VALUES (3,7,1);
INSERT INTO `attend` VALUES (3,6,1);
INSERT INTO `attend` VALUES (3,5,2);
INSERT INTO `attend` VALUES (3,3,3);
INSERT INTO `attend` VALUES (5,9,1);
INSERT INTO `attend` VALUES (5,7,1);
INSERT INTO `attend` VALUES (5,3,1);
INSERT INTO `attend` VALUES (5,1,1);
INSERT INTO `attend` VALUES (4,2,1);
INSERT INTO `attend` VALUES (4,5,1);
INSERT INTO `attend` VALUES (4,7,2);
INSERT INTO `attend` VALUES (4,10,1);

INSERT INTO `tagLookup` VALUES (1,2);
INSERT INTO `tagLookup` VALUES (1,7);
INSERT INTO `tagLookup` VALUES (2,9);
INSERT INTO `tagLookup` VALUES (2,7);
INSERT INTO `tagLookup` VALUES (3,8);
INSERT INTO `tagLookup` VALUES (4,7);
INSERT INTO `tagLookup` VALUES (4,4);
INSERT INTO `tagLookup` VALUES (4,3);
INSERT INTO `tagLookup` VALUES (5,9);
