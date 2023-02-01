CREATE DATABASE IF NOT EXISTS property;
USE property;
SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS user;
DROP TABLE IF EXISTS tenant;
DROP TABLE IF EXISTS agent;

CREATE TABLE agent (
AgentPassword VARCHAR (256) NOT NULL,
Name VARCHAR (256) NOT NULL,
Gender CHAR (1) CHECK (gender = 'M' or gender = 'F'),
Email VARCHAR (256) CHECK (EMAIL LIKE '_%@_%._%'),
ContactNumber CHAR (8) NOT NULL,
RegistrationNo VARCHAR (64) PRIMARY KEY,
RegistrationStartDate DATE NOT NULL,
RegistrationEndDate DATE NOT NULL,
EstateAgentName VARCHAR (256) NOT NULL,
EstateAgentLicenseNo VARCHAR (64) NOT NULL
);

insert into agent values ('123456','Eugene','M','eugene@property.com','22334455', 'AGT123', '2022-01-16', '2023-01-16', 'DodoAgent', ' DD123456');

CREATE TABLE user (
UserID VARCHAR (256) PRIMARY KEY,
UserPassword VARCHAR (256) NOT NULL,
UserName VARCHAR (256) NOT NULL,
Gender CHAR (1) CHECK (gender = 'M' or gender = 'F'),
Email VARCHAR (256) CHECK (EMAIL LIKE '_%@_%._%'),
ContactNumber CHAR (8) NOT NULL
);

insert into user values ('112233','22334455','Peter','M','eugene@property.com', '88182233');