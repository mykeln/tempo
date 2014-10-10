CREATE TABLE `athletes` (
  `athlete_id` int(5) NOT NULL AUTO_INCREMENT,
  `created_date` datetime NOT NULL,
  `lastlogin_date` datetime NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `weight` int(3) NOT NULL,
  `1s` int(4) NOT NULL,
  `5s` int(4) NOT NULL,
  `30s` int(4) NOT NULL,
  `1m` int(4) NOT NULL,
  `5m` int(3) NOT NULL,
  `10m` int(3) NOT NULL,
  `20m` int(3) NOT NULL,
  `60m` int(3) NOT NULL,
  PRIMARY KEY (`athlete_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

CREATE TABLE `activities` (
  `activity_id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `shortname` varchar(25) NOT NULL,
  `type` varchar(25) NOT NULL,
  `wu` text,
  `desc` text,
  `info` text,
  `target` text,
  `cd` text,
  `duration` int(4),
  PRIMARY KEY (`activity_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `activities` VALUES (

)