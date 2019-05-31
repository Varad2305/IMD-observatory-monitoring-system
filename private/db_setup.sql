CREATE DATABASE imd;
USE imd;

CREATE TABLE administrators (
	firstname varchar(255) NOT NULL,
	lastname varchar(255) NOT NULL,
	email varchar(255) NOT NULL,
	phone varchar(20) NOT NULL,
	sex varchar(255) NOT NULL,
	username varchar(25) NOT NULL,
	password varchar(255) NOT NULL,
	dob date NOT NULL,
	account_created_on datetime NOT NULL,
	PRIMARY KEY(username);
)

CREATE TABLE station_incharges (
	username varchar(25) NOT NULL,
	password varchar(255) NOT NULL,
	salt varchar(255) NOT NULL,
	account_created_on datetime NOT NULL,
	PRIMARY KEY(username);
)

