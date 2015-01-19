
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- permanent_redirection
-- ---------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `permanent_redirection`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `visible` TINYINT DEFAULT 0 NOT NULL,
    `position` INTEGER DEFAULT 0 NOT NULL,
    `path` LONGTEXT NOT NULL,
    `destination` LONGTEXT NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `version` INTEGER DEFAULT 0,
    `version_created_at` DATETIME,
    `version_created_by` VARCHAR(100),
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- permanent_redirection_i18n
-- ---------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `permanent_redirection_i18n`
(
    `id` INTEGER NOT NULL,
    `locale` VARCHAR(5) DEFAULT 'en_US' NOT NULL,
    `title` VARCHAR(255),
    `chapo` TEXT,
    PRIMARY KEY (`id`,`locale`),
    CONSTRAINT `permanent_redirection_i18n_FK_1`
        FOREIGN KEY (`id`)
        REFERENCES `permanent_redirection` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- permanent_redirection_version
-- ---------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `permanent_redirection_version`
(
    `id` INTEGER NOT NULL,
    `visible` TINYINT DEFAULT 0 NOT NULL,
    `position` INTEGER DEFAULT 0 NOT NULL,
    `path` LONGTEXT NOT NULL,
    `destination` LONGTEXT NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `version` INTEGER DEFAULT 0 NOT NULL,
    `version_created_at` DATETIME,
    `version_created_by` VARCHAR(100),
    PRIMARY KEY (`id`,`version`),
    CONSTRAINT `permanent_redirection_version_FK_1`
        FOREIGN KEY (`id`)
        REFERENCES `permanent_redirection` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
