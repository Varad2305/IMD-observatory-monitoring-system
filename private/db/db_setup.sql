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
	status int NOT NULL,
	PRIMARY KEY(username)
	FOREIGN KEY(username) references mc(name) ON DELETE CASCADE ON UPDATE CASCADE
);


CREATE TABLE report(
	date_recorded date NOT NULL,
	observatory varchar(255) NOT NULL,
	instrument varchar(255) NOT NULl,
	working int(1) NOT NULL,
	PRIMARY KEY(date_recorded,observatory,instrument)
);