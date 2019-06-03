CREATE DATABASE imd;
USE imd;
CREATE TABLE mc(
	name varchar(255) NOT NULL,
	rmc varchar(255) NOT NULL,
	state varchar(255) NOT NULL,
	PRIMARY KEY(name)
);

CREATE TABLE users(
	username varchar(255) NOT NULL,
	password varchar(255) NOT NULL,
	salt varchar(255) NOT NULL,
	status int,
	PRIMARY KEY(username)
);


CREATE TABLE instruments(
	name varchar(255) NOT NULL
);