-- Company table.

CREATE TABLE IF NOT EXISTS `###sboard_companies`
(
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`userID` BIGINT(20) UNSIGNED NOT NULL,
	`name` VARCHAR(191) NOT NULL,
	`url` VARCHAR(191) NOT NULL UNIQUE,
	`positions` LONGTEXT,
	`locations` LONGTEXT,
	`details` LONGTEXT,
	`createdAt` DATETIME DEFAULT CURRENT_TIMESTAMP,
	`modifiedAt` DATETIME ON UPDATE CURRENT_TIMESTAMP,
	FOREIGN KEY(userID) REFERENCES ###users(id) ON DELETE CASCADE,
	PRIMARY KEY (`id`)
) ~~~COLLATE;

-- User chats table.

CREATE TABLE IF NOT EXISTS `###sboard_chats`
(
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`authorID` BIGINT(20) UNSIGNED NOT NULL,
	`clientID` BIGINT(20) UNSIGNED NOT NULL,
	`ts` DATETIME DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ~~~COLLATE;

-- User chat messages table.

CREATE TABLE IF NOT EXISTS `###sboard_chat_messages`
(
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`chatID` INT(10),
	`content` TEXT,
	`status` TINYINT,
	`ts` DATETIME DEFAULT CURRENT_TIMESTAMP,
	FOREIGN KEY(chatID) REFERENCES ###sboard_chats(id) ON DELETE CASCADE,
	PRIMARY KEY (`id`)
) ~~~COLLATE;

-- Plans and Pricing table.

CREATE TABLE IF NOT EXISTS `###sboard_plans`
(
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(191),
	`price` INT(10),
	`description` TEXT,
	`createdAt` DATETIME DEFAULT CURRENT_TIMESTAMP,
	`modifiedAt` DATETIME ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ~~~COLLATE;

-- Offers table.

CREATE TABLE IF NOT EXISTS `###sboard_offers`
(
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`companyID` INT(10) NOT NULL,
	`position` VARCHAR(191),
	`location` VARCHAR(191),
	`description` TEXT,
	`datetime` LONGTEXT,
	`type` TINYINT NOT NULL,
	`status` TINYINT DEFAULT 1,
	`createdAt` DATETIME DEFAULT CURRENT_TIMESTAMP,
	`modifiedAt` DATETIME ON UPDATE CURRENT_TIMESTAMP,
	FOREIGN KEY(companyID) REFERENCES ###sboard_companies(id) ON DELETE CASCADE,
	PRIMARY KEY (`id`)
) ~~~COLLATE;

-- Members table.

CREATE TABLE IF NOT EXISTS `###sboard_members`
(
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`companyID` INT(10) NOT NULL,
	`email` VARCHAR(191),
	`firstName` VARCHAR(50),
	`lastName` VARCHAR(50),
	`hash` VARCHAR(100),
	`isMember` TINYINT DEFAULT 0,
	`isAdmin` TINYINT DEFAULT 0,
	`createdAt` DATETIME DEFAULT CURRENT_TIMESTAMP,
	`modifiedAt` DATETIME ON UPDATE CURRENT_TIMESTAMP,
	FOREIGN KEY(companyID) REFERENCES ###sboard_companies(id) ON DELETE CASCADE,
	PRIMARY KEY (`id`)
) ~~~COLLATE;

-- Email Templates table.

CREATE TABLE IF NOT EXISTS `###sboard_email_templates`
(
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`tempID` VARCHAR(50),
	`subject` VARCHAR(50),
	`content` LONGTEXT,
	`createdAt` DATETIME DEFAULT CURRENT_TIMESTAMP,
	`modifiedAt` DATETIME ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ~~~COLLATE;