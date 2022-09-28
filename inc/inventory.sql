CREATE DATABASE IF NOT EXISTS `inventory`;
USE `inventory`;

CREATE TABLE `place`(
`place_id` int(50) NOT NULL,
`zip` integer(4) NOT NULL,
`place` varchar(28) NOT NULL,
PRIMARY KEY (`place_id`)
);


CREATE TABLE `employee`(
`employee_id` int(11) NOT NULL AUTO_INCREMENT,
`name` varchar(20) NOT NULL,
`lastname` varchar(20) NOT NULL,
`email` varchar(20) NOT NULL,
`adress` varchar(30) NOT NULL,
`place_id` int,
PRIMARY KEY (`employee_id`),
FOREIGN KEY (`place_id`) REFERENCES `place`(`place_id`)
);


CREATE TABLE `company`(
`company_id` int(11) NOT NULL AUTO_INCREMENT,
`company` ENUM ('eyevip','landlord') DEFAULT 'eyevip',
PRIMARY KEY (`company_id`)
);


CREATE TABLE `employment`(
`employment_id` int(11) NOT NULL AUTO_INCREMENT,
`company_id` int,
`employee_id` int,
PRIMARY KEY (`employment_id`),
FOREIGN KEY (`company_id`) REFERENCES `company`(`company_id`),
FOREIGN KEY (`employee_id`) REFERENCES `employee`(`employee_id`)
);


CREATE TABLE `inventory`(
`inventory_id` integer(20) NOT NULL AUTO_INCREMENT,
`product_id` int(11) NOT NULL,
`type` int(11) NOT NULL,
`serial` int(11) NUll,
`bought` DATE,
`warranty` DATE,
`owner`int,
`employee_id` int,
PRIMARY KEY (`inventory_id`),
FOREIGN KEY (`employee_id`) REFERENCES `employee`(`employee_id`),
FOREIGN KEY (`owner`) REFERENCES `company`(`company_id`)
);


CREATE TABLE `products`(
`product_id` int(20) NOT NULL AUTO_INCREMENT,
`type` int(11) NOT NULL,
`manufactor` varchar(20) NOT NULL,
`modelNbr` varchar(30) NULL,
PRIMARY KEY (`product_id`)
);


CREATE TABLE `consumption`(
`inventory_id` int(20) NOT NULL AUTO_INCREMENT,
`power` int(20),
PRIMARY KEY (`inventory_id`)
);


CREATE TABLE `hardware`(
`product_id` int(11) NOT NULL AUTO_INCREMENT,
`type` int(11) NOT NULL,
`consumption` int(20) NOT NULL,
`ram` varchar(16) NOT NULL,
`harddisk` int(11) NOT NULL,
`screensize` int(11) NOT NULL,
`year` int(11) NOT NULL,
PRIMARY KEY (`product_id`)
);


CREATE TABLE `powerdevice`(
`product_id` int(11) NOT NULL AUTO_INCREMENT,
`type` int(11) NOT NULL,
`consumption` int(20) NOT NULL,
`screensize` int(11) NULL,
PRIMARY KEY (`product_id`)
);


CREATE TABLE `furniture` (
    `product_id` INT(11) NOT NULL AUTO_INCREMENT,
    `type` INT(11) NOT NULL,
    PRIMARY KEY (`product_id`)
);


LOAD DATA INFILE 
'/Users/eni/Sites/localhost/scripts/inc/place.csv'
INTO TABLE place
CHARACTER SET 'utf8'
FIELDS TERMINATED BY ';'
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS;