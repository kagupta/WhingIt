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
--
-- Table for Images 
--
CREATE TABLE `uImage` (
  `id` int(11) NOT NULL,
  content MEDIUMBLOB NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id`) REFERENCES user(`id`)
  ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `eImage` (
  `id` int(11) NOT NULL,
  content MEDIUMBLOB NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id`) REFERENCES events(`id`)
  ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ---------------------------------------------------------------------------------------
-- Insert Data into Tables 
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

INSERT INTO `events` (name, time, location, creator) VALUES ('Event 1', '2012-05-26 15:30:00', 'Location 1', 3); 
INSERT INTO `events` (name, time, location, creator) VALUES ('Event 2', '2012-05-26 16:30:00', 'Location 2', 10); 
INSERT INTO `events` (name, time, location, creator) VALUES ('Happy Hour 1', '2012-05-26 17:30:00', 'Atlanta', 5); 
INSERT INTO `events` (name, time, location, creator) VALUES ('Happy Hour 2', '2012-05-26 19:30:00', 'Las Vegas', 6); 
INSERT INTO `events` (name, time, location, creator) VALUES ('Games 1', '2012-05-26 23:30:00', 'TBA 2', 7); 
INSERT INTO `events` (name, time, location, creator) VALUES ('Games 2', '2012-05-26 22:30:00', 'TBA 1', 3); 
INSERT INTO `events` (name, time, location, creator) VALUES ('Blah Blah 1', '2012-05-26 23:30:00', 'UCSD Scripps', 3); 
INSERT INTO `events` (name, time, location, creator) VALUES ('Blah Blah 2', '2012-05-26 21:30:00', 'UCSD Rec Room', 4); 
INSERT INTO `events` (name, time, location, creator) VALUES ('Final 1', '2012-05-26 20:30:00', 'Somewhere 1', 1); 
INSERT INTO `events` (name, time, location, creator) VALUES ('Final 2', '2012-05-26 19:30:00', 'Somewhere 2', 2); 

INSERT INTO `tags` (tag) VALUES ('other');
INSERT INTO `tags` (tag) VALUES ('free food');
INSERT INTO `tags` (tag) VALUES ('tech talk');
INSERT INTO `tags` (tag) VALUES ('student org');
INSERT INTO `tags` (tag) VALUES ('professional');
INSERT INTO `tags` (tag) VALUES ('academic');
INSERT INTO `tags` (tag) VALUES ('entertainment');
INSERT INTO `tags` (tag) VALUES ('bars');
INSERT INTO `tags` (tag) VALUES ('sports');

INSERT INTO `attend` (id, attendee, status) VALUES (1,3,1);
INSERT INTO `attend` (id, attendee, status) VALUES (2,10,1);
INSERT INTO `attend` (id, attendee, status) VALUES (3,5,1);
INSERT INTO `attend` (id, attendee, status) VALUES (4,6,1);
INSERT INTO `attend` (id, attendee, status) VALUES (5,7,1);
INSERT INTO `attend` (id, attendee, status) VALUES (6,3,1);
INSERT INTO `attend` (id, attendee, status) VALUES (7,3,1);
INSERT INTO `attend` (id, attendee, status) VALUES (8,4,1);
INSERT INTO `attend` (id, attendee, status) VALUES (9,1,1);
INSERT INTO `attend` (id, attendee, status) VALUES (10,2,1);
INSERT INTO `attend` (id, attendee, status) VALUES (1,5,2);
INSERT INTO `attend` (id, attendee, status) VALUES (2,5,1);
INSERT INTO `attend` (id, attendee, status) VALUES (3,7,1);
INSERT INTO `attend` (id, attendee, status) VALUES (4,5,1);
INSERT INTO `attend` (id, attendee, status) VALUES (5,5,1);
INSERT INTO `attend` (id, attendee, status) VALUES (6,5,1);
INSERT INTO `attend` (id, attendee, status) VALUES (7,5,1);
INSERT INTO `attend` (id, attendee, status) VALUES (8,7,2);
INSERT INTO `attend` (id, attendee, status) VALUES (9,8,1);
INSERT INTO `attend` (id, attendee, status) VALUES (1,8,1);
INSERT INTO `attend` (id, attendee, status) VALUES (2,8,1);
INSERT INTO `attend` (id, attendee, status) VALUES (3,8,1);
INSERT INTO `attend` (id, attendee, status) VALUES (4,8,2);
INSERT INTO `attend` (id, attendee, status) VALUES (5,8,2);


INSERT INTO `tagLookup` (eventID, tagID) VALUES (1,1);
INSERT INTO `tagLookup` (eventID, tagID) VALUES (1,2);
INSERT INTO `tagLookup` (eventID, tagID) VALUES (1,4);
INSERT INTO `tagLookup` (eventID, tagID) VALUES (1,5);
INSERT INTO `tagLookup` (eventID, tagID) VALUES (2,1);
INSERT INTO `tagLookup` (eventID, tagID) VALUES (3,2);
INSERT INTO `tagLookup` (eventID, tagID) VALUES (4,3);
INSERT INTO `tagLookup` (eventID, tagID) VALUES (5,4);
INSERT INTO `tagLookup` (eventID, tagID) VALUES (6,4);
INSERT INTO `tagLookup` (eventID, tagID) VALUES (7,4);
INSERT INTO `tagLookup` (eventID, tagID) VALUES (7,6);
INSERT INTO `tagLookup` (eventID, tagID) VALUES (8,6);
INSERT INTO `tagLookup` (eventID, tagID) VALUES (9,6);
INSERT INTO `tagLookup` (eventID, tagID) VALUES (10,1);
INSERT INTO `tagLookup` (eventID, tagID) VALUES (10,2);
INSERT INTO `tagLookup` (eventID, tagID) VALUES (10,3);
INSERT INTO `tagLookup` (eventID, tagID) VALUES (10,4);
INSERT INTO `tagLookup` (eventID, tagID) VALUES (10,5);

INSERT INTO `description` (eventID, about) VALUES (1,'This is event 1');
INSERT INTO `description` (eventID, about) VALUES (2,'This is event 2');
INSERT INTO `description` (eventID, about) VALUES (3,'This is event 3');
INSERT INTO `description` (eventID, about) VALUES (4,'This is event 4');
INSERT INTO `description` (eventID, about) VALUES (5,'This is event 5');
INSERT INTO `description` (eventID, about) VALUES (6,'This is event 6');
INSERT INTO `description` (eventID, about) VALUES (7,'This is event 7');
INSERT INTO `description` (eventID, about) VALUES (8,'This is event 8');
INSERT INTO `description` (eventID, about) VALUES (9,'This is event 9');
INSERT INTO `description` (eventID, about) VALUES (10,'This is event 10');

