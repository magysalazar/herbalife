
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- ci_sessions
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ci_sessions`;

CREATE TABLE `ci_sessions`
(
    `id` VARCHAR(128) DEFAULT '0' NOT NULL,
    `ip_address` VARCHAR(45) DEFAULT '0' NOT NULL,
    `timestamp` int(10) unsigned DEFAULT 0 NOT NULL,
    `data` BLOB NOT NULL
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- cms_articles
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `cms_articles`;

CREATE TABLE `cms_articles`
(
    `id_article` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(100) NOT NULL,
    `slug` VARCHAR(100) NOT NULL,
    `body` TEXT NOT NULL,
    `date_publication` DATE NOT NULL,
    `date_created` DATETIME NOT NULL,
    `date_modified` DATETIME NOT NULL,
    PRIMARY KEY (`id_article`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- cms_pages
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `cms_pages`;

CREATE TABLE `cms_pages`
(
    `id_page` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(100) NOT NULL,
    `slug` VARCHAR(100) NOT NULL,
    `order_page` INTEGER NOT NULL,
    `body` TEXT NOT NULL,
    `parent_id` int(11) unsigned DEFAULT 0,
    PRIMARY KEY (`id_page`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- cms_users
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `cms_users`;

CREATE TABLE `cms_users`
(
    `id_user` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `email` VARCHAR(100) NOT NULL,
    `password` VARCHAR(128) NOT NULL,
    `name` VARCHAR(100) NOT NULL,
    PRIMARY KEY (`id_user`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- migrations
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations`
(
    `version` BIGINT NOT NULL
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
