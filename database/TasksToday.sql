CREATE DATABASE IF NOT EXISTS `TasksToday` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `TasksToday`;

CREATE TABLE IF NOT EXISTS `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(120) NOT NULL,
  `description` text DEFAULT NULL,
  `task_date` date NOT NULL,
  `priority` varchar(10) NOT NULL DEFAULT 'Medium',
  `is_archived` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tasks_archived_date` (`is_archived`, `task_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`username`, `password`, `full_name`, `created_at`, `updated_at`) VALUES
('admin', '$2y$12$KeFIZSgr2dmDPgTUY9lCke9Ogpq260dVT3QOMwmS.trLtiRJMTYbW', 'Task Manager', NOW(), NOW());

INSERT INTO `tasks` (`title`, `description`, `task_date`, `priority`, `is_archived`, `created_at`, `updated_at`) VALUES
('Finish Web Systems activity', 'Review the requirements before submission.', DATE_ADD(CURDATE(), INTERVAL 1 DAY), 'High', 0, NOW(), NOW()),
('Prepare class notes', 'Organize notes for the next lesson.', DATE_ADD(CURDATE(), INTERVAL 3 DAY), 'Medium', 0, NOW(), NOW()),
('Archived sample task', 'This record demonstrates soft deletion.', CURDATE(), 'Low', 1, NOW(), NOW());
