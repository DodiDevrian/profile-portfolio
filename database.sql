-- =====================================================================
--  Dynamic Portfolio CMS - Database Schema + Seed
--  Engine: MySQL / MariaDB   |   Charset: utf8mb4
--  Import:  mysql -u root portfolio_cms < database.sql
-- =====================================================================

CREATE DATABASE IF NOT EXISTS `portfolio_cms`
  DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `portfolio_cms`;

SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- users
-- ---------------------------------------------------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id`            INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name`          VARCHAR(100) NOT NULL,
  `email`         VARCHAR(150) NOT NULL UNIQUE,
  `password`      VARCHAR(255) NOT NULL,
  `avatar`        VARCHAR(255) DEFAULT NULL,
  `role`          ENUM('admin','editor') NOT NULL DEFAULT 'admin',
  `remember_token` VARCHAR(255) DEFAULT NULL,
  `reset_token`   VARCHAR(255) DEFAULT NULL,
  `reset_expires` DATETIME DEFAULT NULL,
  `created_at`    DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at`    DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ---------------------------------------------------------------------
-- profiles (single row - personal identity)
-- ---------------------------------------------------------------------
DROP TABLE IF EXISTS `profiles`;
CREATE TABLE `profiles` (
  `id`         INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name`       VARCHAR(120) NOT NULL,
  `title`      VARCHAR(150) DEFAULT NULL,
  `photo`      VARCHAR(255) DEFAULT NULL,
  `bio`        TEXT,
  `email`      VARCHAR(150) DEFAULT NULL,
  `phone`      VARCHAR(50)  DEFAULT NULL,
  `address`    VARCHAR(255) DEFAULT NULL,
  `birthday`   DATE DEFAULT NULL,
  `freelance`  ENUM('Available','Not Available') DEFAULT 'Available',
  `linkedin`   VARCHAR(255) DEFAULT NULL,
  `github`     VARCHAR(255) DEFAULT NULL,
  `instagram`  VARCHAR(255) DEFAULT NULL,
  `facebook`   VARCHAR(255) DEFAULT NULL,
  `twitter`    VARCHAR(255) DEFAULT NULL,
  `youtube`    VARCHAR(255) DEFAULT NULL,
  `website`    VARCHAR(255) DEFAULT NULL,
  `resume`     VARCHAR(255) DEFAULT NULL,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ---------------------------------------------------------------------
-- hero (single row)
-- ---------------------------------------------------------------------
DROP TABLE IF EXISTS `hero`;
CREATE TABLE `hero` (
  `id`          INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `title`       VARCHAR(200) NOT NULL,
  `subtitle`    VARCHAR(255) DEFAULT NULL,
  `description` TEXT,
  `photo`       VARCHAR(255) DEFAULT NULL,
  `background`  VARCHAR(255) DEFAULT NULL,
  `typed_text`  VARCHAR(255) DEFAULT NULL,
  `cta_primary_label` VARCHAR(60) DEFAULT 'Download CV',
  `cta_secondary_label` VARCHAR(60) DEFAULT 'Contact Me',
  `animation`   VARCHAR(60) DEFAULT 'fade',
  `updated_at`  DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ---------------------------------------------------------------------
-- abouts (single row)
-- ---------------------------------------------------------------------
DROP TABLE IF EXISTS `abouts`;
CREATE TABLE `abouts` (
  `id`          INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `photo`       VARCHAR(255) DEFAULT NULL,
  `description` TEXT,
  `age`         INT DEFAULT NULL,
  `domicile`    VARCHAR(150) DEFAULT NULL,
  `email`       VARCHAR(150) DEFAULT NULL,
  `phone`       VARCHAR(50)  DEFAULT NULL,
  `freelance`   VARCHAR(60)  DEFAULT NULL,
  `experience_years` INT DEFAULT NULL,
  `projects_done`    INT DEFAULT NULL,
  `happy_clients`    INT DEFAULT NULL,
  `updated_at`  DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ---------------------------------------------------------------------
-- skills
-- ---------------------------------------------------------------------
DROP TABLE IF EXISTS `skills`;
CREATE TABLE `skills` (
  `id`        INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name`      VARCHAR(100) NOT NULL,
  `category`  ENUM('Frontend','Backend','Database','Mobile','Tools','Cloud') NOT NULL DEFAULT 'Frontend',
  `icon`      VARCHAR(100) DEFAULT NULL,
  `percentage` TINYINT UNSIGNED DEFAULT 80,
  `color`     VARCHAR(20)  DEFAULT '#38BDF8',
  `sort_order` INT DEFAULT 0,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ---------------------------------------------------------------------
-- experiences
-- ---------------------------------------------------------------------
DROP TABLE IF EXISTS `experiences`;
CREATE TABLE `experiences` (
  `id`          INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `company`     VARCHAR(150) NOT NULL,
  `logo`        VARCHAR(255) DEFAULT NULL,
  `position`    VARCHAR(150) NOT NULL,
  `start_date`  VARCHAR(50)  DEFAULT NULL,
  `end_date`    VARCHAR(50)  DEFAULT NULL,
  `description` TEXT,
  `technology`  VARCHAR(255) DEFAULT NULL,
  `sort_order`  INT DEFAULT 0,
  `created_at`  DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ---------------------------------------------------------------------
-- educations
-- ---------------------------------------------------------------------
DROP TABLE IF EXISTS `educations`;
CREATE TABLE `educations` (
  `id`          INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `institution` VARCHAR(150) NOT NULL,
  `logo`        VARCHAR(255) DEFAULT NULL,
  `major`       VARCHAR(150) DEFAULT NULL,
  `gpa`         VARCHAR(20)  DEFAULT NULL,
  `start_year`  VARCHAR(10)  DEFAULT NULL,
  `end_year`    VARCHAR(10)  DEFAULT NULL,
  `description` TEXT,
  `sort_order`  INT DEFAULT 0,
  `created_at`  DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ---------------------------------------------------------------------
-- portfolios
-- ---------------------------------------------------------------------
DROP TABLE IF EXISTS `portfolios`;
CREATE TABLE `portfolios` (
  `id`          INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `title`       VARCHAR(200) NOT NULL,
  `slug`        VARCHAR(220) NOT NULL UNIQUE,
  `category`    VARCHAR(100) DEFAULT NULL,
  `thumbnail`   VARCHAR(255) DEFAULT NULL,
  `description` TEXT,
  `technology`  VARCHAR(255) DEFAULT NULL,
  `github_url`  VARCHAR(255) DEFAULT NULL,
  `demo_url`    VARCHAR(255) DEFAULT NULL,
  `status`      ENUM('Published','Draft') DEFAULT 'Published',
  `featured`    TINYINT(1) DEFAULT 0,
  `meta_title`  VARCHAR(200) DEFAULT NULL,
  `meta_description` VARCHAR(255) DEFAULT NULL,
  `sort_order`  INT DEFAULT 0,
  `views`       INT UNSIGNED DEFAULT 0,
  `created_at`  DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ---------------------------------------------------------------------
-- portfolio_images (gallery)
-- ---------------------------------------------------------------------
DROP TABLE IF EXISTS `portfolio_images`;
CREATE TABLE `portfolio_images` (
  `id`           INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `portfolio_id` INT UNSIGNED NOT NULL,
  `image`        VARCHAR(255) NOT NULL,
  `sort_order`   INT DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `idx_portfolio` (`portfolio_id`),
  CONSTRAINT `fk_gallery_portfolio` FOREIGN KEY (`portfolio_id`)
    REFERENCES `portfolios` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ---------------------------------------------------------------------
-- services
-- ---------------------------------------------------------------------
DROP TABLE IF EXISTS `services`;
CREATE TABLE `services` (
  `id`          INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `icon`        VARCHAR(100) DEFAULT NULL,
  `title`       VARCHAR(150) NOT NULL,
  `description` TEXT,
  `sort_order`  INT DEFAULT 0,
  `created_at`  DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ---------------------------------------------------------------------
-- certificates
-- ---------------------------------------------------------------------
DROP TABLE IF EXISTS `certificates`;
CREATE TABLE `certificates` (
  `id`         INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `title`      VARCHAR(200) NOT NULL,
  `issuer`     VARCHAR(150) DEFAULT NULL,
  `image`      VARCHAR(255) DEFAULT NULL,
  `issue_date` DATE DEFAULT NULL,
  `credential_url` VARCHAR(255) DEFAULT NULL,
  `sort_order` INT DEFAULT 0,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ---------------------------------------------------------------------
-- testimonials
-- ---------------------------------------------------------------------
DROP TABLE IF EXISTS `testimonials`;
CREATE TABLE `testimonials` (
  `id`        INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name`      VARCHAR(120) NOT NULL,
  `position`  VARCHAR(150) DEFAULT NULL,
  `photo`     VARCHAR(255) DEFAULT NULL,
  `message`   TEXT,
  `rating`    TINYINT DEFAULT 5,
  `sort_order` INT DEFAULT 0,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ---------------------------------------------------------------------
-- blog_categories
-- ---------------------------------------------------------------------
DROP TABLE IF EXISTS `blog_categories`;
CREATE TABLE `blog_categories` (
  `id`   INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(120) NOT NULL,
  `slug` VARCHAR(140) NOT NULL UNIQUE,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ---------------------------------------------------------------------
-- blogs
-- ---------------------------------------------------------------------
DROP TABLE IF EXISTS `blogs`;
CREATE TABLE `blogs` (
  `id`          INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` INT UNSIGNED DEFAULT NULL,
  `title`       VARCHAR(220) NOT NULL,
  `slug`        VARCHAR(240) NOT NULL UNIQUE,
  `thumbnail`   VARCHAR(255) DEFAULT NULL,
  `excerpt`     VARCHAR(300) DEFAULT NULL,
  `content`     LONGTEXT,
  `tags`        VARCHAR(255) DEFAULT NULL,
  `status`      ENUM('Published','Draft') DEFAULT 'Draft',
  `meta_title`  VARCHAR(200) DEFAULT NULL,
  `meta_description` VARCHAR(255) DEFAULT NULL,
  `views`       INT UNSIGNED DEFAULT 0,
  `created_at`  DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_blog_cat` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ---------------------------------------------------------------------
-- messages (contact form)
-- ---------------------------------------------------------------------
DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `id`        INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name`      VARCHAR(120) NOT NULL,
  `email`     VARCHAR(150) NOT NULL,
  `subject`   VARCHAR(200) DEFAULT NULL,
  `message`   TEXT,
  `is_read`   TINYINT(1) DEFAULT 0,
  `is_replied` TINYINT(1) DEFAULT 0,
  `ip_address` VARCHAR(45) DEFAULT NULL,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ---------------------------------------------------------------------
-- settings (key/value)
-- ---------------------------------------------------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id`    INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `skey`  VARCHAR(100) NOT NULL UNIQUE,
  `svalue` TEXT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ---------------------------------------------------------------------
-- social_medias
-- ---------------------------------------------------------------------
DROP TABLE IF EXISTS `social_medias`;
CREATE TABLE `social_medias` (
  `id`    INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `platform` VARCHAR(60) NOT NULL,
  `icon`  VARCHAR(80) DEFAULT NULL,
  `url`   VARCHAR(255) NOT NULL,
  `sort_order` INT DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ---------------------------------------------------------------------
-- visitors (analytics)
-- ---------------------------------------------------------------------
DROP TABLE IF EXISTS `visitors`;
CREATE TABLE `visitors` (
  `id`         INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` VARCHAR(45) DEFAULT NULL,
  `user_agent` VARCHAR(255) DEFAULT NULL,
  `page`       VARCHAR(150) DEFAULT NULL,
  `visited_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

SET FOREIGN_KEY_CHECKS = 1;

-- =====================================================================
--  SEED DATA
-- =====================================================================

-- Admin login:  admin@portfolio.test  /  admin123
INSERT INTO `users` (`name`,`email`,`password`,`role`) VALUES
('Administrator','admin@portfolio.test','$2y$10$p/cfypiBG.PHibp.tR8A2uSPgE73W/jBjER9rGpdCflgK1PKUBXfC','admin');

INSERT INTO `profiles`
(`name`,`title`,`bio`,`email`,`phone`,`address`,`birthday`,`freelance`,`linkedin`,`github`,`instagram`,`twitter`,`website`)
VALUES
('John Doe','Full Stack Developer',
 'I build modern, fast and elegant web applications with clean, maintainable code.',
 'hello@johndoe.dev','+62 812 3456 7890','Jakarta, Indonesia','1998-05-14','Available',
 'https://linkedin.com/in/johndoe','https://github.com/johndoe','https://instagram.com/johndoe',
 'https://twitter.com/johndoe','https://johndoe.dev');

INSERT INTO `hero`
(`title`,`subtitle`,`description`,`typed_text`,`cta_primary_label`,`cta_secondary_label`,`animation`)
VALUES
('Hi, I''m John Doe','Full Stack Developer & UI Engineer',
 'I craft premium digital experiences — from pixel-perfect interfaces to robust backend systems.',
 'Web Developer,Backend Engineer,UI Designer,Problem Solver','Download CV','Contact Me','fade');

INSERT INTO `abouts`
(`description`,`age`,`domicile`,`email`,`phone`,`freelance`,`experience_years`,`projects_done`,`happy_clients`)
VALUES
('I am a passionate full stack developer with a love for clean architecture, elegant UI and delightful user experience. I turn ideas into production-ready products.',
 27,'Jakarta, Indonesia','hello@johndoe.dev','+62 812 3456 7890','Available',5,48,32);

INSERT INTO `skills` (`name`,`category`,`icon`,`percentage`,`color`,`sort_order`) VALUES
('Laravel','Backend','bi-stack',92,'#EF4444',1),
('PHP','Backend','bi-filetype-php',90,'#6366F1',2),
('JavaScript','Frontend','bi-filetype-js',88,'#F59E0B',3),
('Vue.js','Frontend','bi-bootstrap',85,'#22C55E',4),
('React','Frontend','bi-diagram-3',82,'#38BDF8',5),
('MySQL','Database','bi-database',88,'#0EA5E9',6),
('Docker','Tools','bi-box-seam',78,'#2496ED',7),
('Git','Tools','bi-git',90,'#F05033',8),
('Linux','Cloud','bi-terminal',80,'#FCC419',9),
('Redis','Database','bi-hdd-network',75,'#DC382D',10);

INSERT INTO `experiences` (`company`,`position`,`start_date`,`end_date`,`description`,`technology`,`sort_order`) VALUES
('Tech Nova','Senior Full Stack Developer','2023','Present','Led development of a multi-tenant SaaS platform serving 10k+ users.','Laravel, Vue, MySQL, Redis',1),
('Digital Wave','Backend Engineer','2021','2023','Designed and maintained REST APIs and microservices.','PHP, Node.js, PostgreSQL',2),
('StartX','Junior Web Developer','2019','2021','Built responsive marketing sites and internal tools.','JavaScript, Bootstrap, MySQL',3);

INSERT INTO `educations` (`institution`,`major`,`gpa`,`start_year`,`end_year`,`description`,`sort_order`) VALUES
('University of Indonesia','Computer Science','3.78','2016','2020','Focused on software engineering and web technologies.',1),
('SMA Negeri 1','Science','88','2013','2016','Graduated with honors.',2);

INSERT INTO `portfolios` (`title`,`slug`,`category`,`description`,`technology`,`github_url`,`demo_url`,`status`,`featured`,`sort_order`) VALUES
('E-Commerce Platform','ecommerce-platform','Web App','A full-featured online store with cart, checkout and admin dashboard.','Laravel, Vue, Stripe','https://github.com/','https://demo.com/','Published',1,1),
('Task Manager','task-manager','SaaS','Kanban-style project management tool with realtime collaboration.','React, Node, Socket.io','https://github.com/','https://demo.com/','Published',1,2),
('Portfolio CMS','portfolio-cms','Website','Dynamic portfolio manageable from an admin dashboard.','CodeIgniter, Bootstrap','https://github.com/','https://demo.com/','Published',0,3),
('Weather App','weather-app','Mobile','Cross-platform weather forecast application.','Flutter, OpenWeather API','https://github.com/','https://demo.com/','Published',0,4);

INSERT INTO `services` (`icon`,`title`,`description`,`sort_order`) VALUES
('bi-code-slash','Website Development','Modern, fast and responsive websites built with best practices.',1),
('bi-hdd-stack','Backend API','Scalable and secure REST APIs and backend systems.',2),
('bi-diagram-3','System Analysis','Requirement analysis and technical architecture design.',3),
('bi-palette','UI Implementation','Pixel-perfect implementation of your designs.',4),
('bi-chat-dots','Consultation','Technical consultation for your product and stack.',5);

INSERT INTO `certificates` (`title`,`issuer`,`issue_date`,`credential_url`,`sort_order`) VALUES
('AWS Certified Developer','Amazon Web Services','2024-03-01','https://aws.amazon.com/',1),
('Professional Scrum Master','Scrum.org','2023-08-15','https://scrum.org/',2),
('Laravel Certified','Laravel','2023-01-10','https://laravel.com/',3);

INSERT INTO `testimonials` (`name`,`position`,`message`,`rating`,`sort_order`) VALUES
('Sarah Lee','Product Manager, Tech Nova','John delivered beyond expectations. Clean code and great communication.',5,1),
('Michael Chen','CTO, Digital Wave','One of the most reliable engineers I have worked with.',5,2),
('Amanda Putri','Founder, StartX','Turned our idea into a polished product on time.',5,3);

INSERT INTO `social_medias` (`platform`,`icon`,`url`,`sort_order`) VALUES
('GitHub','bi-github','https://github.com/johndoe',1),
('LinkedIn','bi-linkedin','https://linkedin.com/in/johndoe',2),
('Twitter','bi-twitter-x','https://twitter.com/johndoe',3),
('Instagram','bi-instagram','https://instagram.com/johndoe',4);

INSERT INTO `settings` (`skey`,`svalue`) VALUES
('site_title','John Doe — Portfolio'),
('logo',''),
('favicon',''),
('meta_title','John Doe — Full Stack Developer'),
('meta_description','Portfolio of John Doe, a full stack developer building modern web applications.'),
('meta_keywords','developer, portfolio, full stack, laravel, vue, react'),
('google_analytics',''),
('facebook_pixel',''),
('maintenance_mode','0'),
('dark_mode','1'),
('map_embed',''),
('whatsapp','6281234567890');
