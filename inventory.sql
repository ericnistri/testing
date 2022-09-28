CREATE DATABASE IF NOT EXISTS `inventoryy`;
USE `inventoryy`;

CREATE TABLE `inventory_type` (
  `key` varchar(127)  NOT NULL,
  PRIMARY KEY (`key`)
  );
INSERT INTO `inventory_type`
VALUES  ('server'),
        ('computer'),
        ('laptop'),
        ('furniture'),
        ('monitor');
        
CREATE TABLE `place`(
`place_id` int(20) NOT NULL AUTO_INCREMENT,
`place` varchar(50) NOT NULL,
`zip` integer(20) NOT NULL,
PRIMARY KEY (`place_id`)
);


CREATE TABLE `employee`(
`employee_id` int(11) NOT NULL AUTO_INCREMENT,
`name` varchar(20) NOT NULL,
`lastname` varchar(20) NOT NULL,
`email` varchar(50) NOT NULL,
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
FOREIGN KEY (`product_id`, `type`) REFERENCES `products`(`product_id`, `type`),
FOREIGN KEY (`employee_id`) REFERENCES `employee`(`employee_id`),
FOREIGN KEY (`owner`) REFERENCES `company`(`company_id`)
);


CREATE TABLE `products`(
`product_id` int(20) NOT NULL AUTO_INCREMENT,
`type` VARCHAR(127) NOT NULL DEFAULT 'computer',
`manufactor` varchar(20) NOT NULL,
`modelNbr` varchar(30) NULL,
UNIQUE (`product_id`),
PRIMARY KEY (`product_id`, `type`)
);


CREATE TABLE `consumption`(
`inventory_id` int(20) NOT NULL AUTO_INCREMENT,
`power` int(20),
PRIMARY KEY (`inventory_id`)
);



CREATE TABLE `hardware`(
`product_id` int(11) PRIMARY KEY,
`type` VARCHAR(127) NOT NULL DEFAULT 'computer',
`consumption` int(20) NOT NULL,
`ram` varchar(16) NOT NULL,
`harddisk` int(11) NOT NULL,
`screensize` int(11) NOT NULL,
`year` int(11) NOT NULL,
-- UNIQUE (`product_id`, `type`),
FOREIGN KEY (`product_id`, `type`) REFERENCES `products`(`product_id`, `type`),
CONSTRAINT `check_type` CHECK (`type` IN ('computer', 'laptop','Server'))
);

CREATE TABLE `screen` (

  CONSTRAINT `check_type` CHECK (`type` = 'laptop', OR 'laptop')
)




CREATE TABLE `powerdevice`(
`product_id` int(11) NOT NULL AUTO_INCREMENT,
`type` VARCHAR(127) NOT NULL DEFAULT 'Monitor',
`consumption` int(20) NOT NULL,
`screensize` int(11),
FOREIGN KEY (`product_id`, `type`) REFERENCES `products`(`product_id`, `type`),
CONSTRAINT `check_type` CHECK 
(`type` = 'Monitor' OR 'TV' OR 'Lamp' OR 'Windows' OR 'Telephone' OR 'Refrigerator' OR 'Microwave' OR 'Dishwasher' OR 'Speaker' OR 'Coffeemachine')
);



CREATE TABLE `furniture` (
`product_id` INT(11) NOT NULL AUTO_INCREMENT,
`type` VARCHAR(127) NOT NULL DEFAULT 'Office desk',
FOREIGN KEY (`product_id`, `type`) REFERENCES `products`(`product_id`, `type`),
CONSTRAINT `check_type` CHECK (`type` = 'Office desk', OR 'Office chair', OR 'Table', OR 'chair')
);

LOAD DATA INFILE 
`/Users/eni/Documents/Technik/Inventory/Inventory.sql`
INTO TABLE place
CHARACTER SET `utf8`
FIELDS TERMINATED BY `;`
ENCLOSED BY `"`
LINES TERMIATED BY `\n`
IGNORE 1 ROWS;

/*---------------- TESTING -------------*/

CREATE TABLE `user`(
`user_id` int(11) NOT NULL AUTO_INCREMENT,
`name` varchar(20) NOT NULL,
`lastname` varchar(20) NOT NULL,
PRIMARY KEY (`user_id`)
);