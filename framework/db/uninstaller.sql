ALTER TABLE `###sboard_chat_messages` DROP FOREIGN KEY ###sboard_chat_messages_ibfk_1;
DROP TABLE IF EXISTS `###sboard_chat_messages`;

DROP TABLE IF EXISTS `###sboard_chats`;

DROP TABLE IF EXISTS `###sboard_plans`;

ALTER TABLE `###sboard_offers` DROP FOREIGN KEY ###sboard_offers_ibfk_1;
DROP TABLE IF EXISTS `###sboard_offers`;

ALTER TABLE `###sboard_members` DROP FOREIGN KEY ###sboard_members_ibfk_1;
DROP TABLE IF EXISTS `###sboard_members`;

DROP TABLE IF EXISTS `###sboard_companies`;

DROP TABLE IF EXISTS `###sboard_email_templates`;