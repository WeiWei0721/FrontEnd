SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


--
-- Database: `vuelogin`
--

-- --------------------------------------------------------

CREATE DATABASE IF NOT EXISTS vuelogin;
USE vuelogin;
SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS user;
DROP TABLE IF EXISTS agent;


CREATE TABLE user (
  userid int(11) NOT NULL,
  username varchar(30) NOT NULL,
  password varchar(30) NOT NULL,
  contact_number CHAR (8) NOT NULL,
  email VARCHAR(256) CHECK (EMAIL LIKE '_%@_%._%')
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO user (userid, username, password, contact_number, email) VALUES
(1, 'Alice', 'alice', '11223344', 'Alice@nus.edu.sg'),
(2, 'Bob', 'bob', '99887766', 'Bob@nus.edu.sg');


CREATE TABLE agent (
  User_n VARCHAR (256) NOT NULL,
  User_pass VARCHAR (30) NOT NULL,
  User_license VARCHAR (15) NOT NULL,
  Contact_number CHAR (8) NOT NULL,
  Email VARCHAR(256) CHECK (EMAIL LIKE '_%@_%._%')
);


INSERT INTO agent (User_n, User_pass, User_license, Contact_number, Email) VALUES
('Eugene', 'eugene', 'aabbcc1122', '22334455', 'eugene@agent.com.sg'), 
('Ali', 'ali', 'ddeeff3344', '66778899', 'ali@agent.com.sg');
