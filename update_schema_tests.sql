-- SQL Script to add Mock Test and Unit Test tables

-- 1. Modules Table
CREATE TABLE IF NOT EXISTS `tbl_modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(255) NOT NULL,
  `course_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 2. Units Table
CREATE TABLE IF NOT EXISTS `tbl_units` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unit_name` varchar(255) NOT NULL,
  `module_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 3. Mock Tests Table
CREATE TABLE IF NOT EXISTS `tbl_mock_tests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `module_id` int(11) DEFAULT NULL,
  `duration_minutes` int(11) NOT NULL DEFAULT '120',
  `note` text DEFAULT NULL,
  `is_active` int(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 4. Mock Test Questions Table
CREATE TABLE IF NOT EXISTS `tbl_mock_test_questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mock_test_id` int(11) NOT NULL,
  `question_text` text NOT NULL,
  `options` text NOT NULL COMMENT 'JSON array of options',
  `correct_option` int(11) NOT NULL COMMENT 'Index of correct option (0-based)',
  `explanation` text DEFAULT NULL,
  `is_active` int(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `mock_test_id` (`mock_test_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 5. Mock Test User Answers Table
CREATE TABLE IF NOT EXISTS `tbl_mock_test_user_answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `mock_test_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `selected_option` int(11) NOT NULL,
  `user_comment` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `mock_test_id` (`mock_test_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 6. Unit Tests Table
CREATE TABLE IF NOT EXISTS `tbl_unit_tests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_name` varchar(255) NOT NULL,
  `module_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 7. Unit Test Questions Table
CREATE TABLE IF NOT EXISTS `tbl_unit_questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unit_test_id` int(11) NOT NULL,
  `question_text` text NOT NULL,
  `options` text NOT NULL COMMENT 'JSON array of options',
  `correct_option` int(11) NOT NULL,
  `explanation` text DEFAULT NULL,
  `is_active` int(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `unit_test_id` (`unit_test_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 8. User Accessible Tests Table
CREATE TABLE IF NOT EXISTS `tbl_user_accessible_tests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `allowed_categories` varchar(500) DEFAULT NULL COMMENT 'Comma separated category IDs',
  `allowed_mock_tests` varchar(500) DEFAULT NULL COMMENT 'Comma separated mock test IDs',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
