-- Table structure for SwapBoard Users table.

CREATE TABLE IF NOT EXISTS `###sboard_users`
(
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`fullName` VARCHAR(191),
	`email` VARCHAR(191) NOT NULL UNIQUE,
	`position` VARCHAR(191),
	`location` VARCHAR(191),
	`password` VARCHAR(255) NOT NULL,
	`createdAt` DATETIME DEFAULT CURRENT_TIMESTAMP,
	`modifiedAt` DATETIME ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ~~~COLLATE;

-- Table structure for SwapBoard Users meta table.

CREATE TABLE IF NOT EXISTS `###sboard_users_meta`
(
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`userID` INT(10) NOT NULL UNIQUE,
	`value` LONGTEXT,
	`createdAt` DATETIME DEFAULT CURRENT_TIMESTAMP,
	`modifiedAt` DATETIME ON UPDATE CURRENT_TIMESTAMP,
	FOREIGN KEY(userID) REFERENCES ###sboard_users(id) ON DELETE CASCADE,
	PRIMARY KEY (`id`)
) ~~~COLLATE;

-- Company table.

CREATE TABLE IF NOT EXISTS `###sboard_companies`
(
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`userID` INT(10) NOT NULL,
	`name` VARCHAR(191) NOT NULL,
	`url` VARCHAR(191) NOT NULL UNIQUE,
	`details` LONGTEXT NULL,
	`createdAt` DATETIME DEFAULT CURRENT_TIMESTAMP,
	`modifiedAt` DATETIME ON UPDATE CURRENT_TIMESTAMP,
	FOREIGN KEY(userID) REFERENCES ###sboard_users(id),
	PRIMARY KEY (`id`)
) ~~~COLLATE;

-- User chats table.

CREATE TABLE IF NOT EXISTS `###sboard_chats`
(
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`authorID` INT(10),
	`clientID` INT(10),
	`ts` DATETIME DEFAULT CURRENT_TIMESTAMP,
	FOREIGN KEY(authorID) REFERENCES ###sboard_users(id),
	FOREIGN KEY(clientID) REFERENCES ###sboard_users(id),
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
	FOREIGN KEY(chatID) REFERENCES ###sboard_chat_messages(id),
	PRIMARY KEY (`id`)
) ~~~COLLATE;
