CREATE DATABASE IF NOT EXISTS `M3Tech` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `M3Tech`;

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(120) NOT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(120) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `users`
  ADD COLUMN IF NOT EXISTS `password` varchar(255) NOT NULL DEFAULT '' AFTER `username`;

UPDATE `users`
SET `password` = '$2y$12$KeFIZSgr2dmDPgTUY9lCke9Ogpq260dVT3QOMwmS.trLtiRJMTYbW'
WHERE `password` = '' OR `password` IS NULL;

INSERT INTO `customers` (`full_name`, `email`, `phone`, `address`, `created_at`, `updated_at`) VALUES
('Rosie Flores', 'rosie@example.com', '0917 123 4567', 'Manila', NOW(), NOW()),
('Bella Santos', 'bella@example.com', '0918 765 4321', 'Quezon City', NOW(), NOW());

INSERT INTO `users` (`username`, `password`, `full_name`, `email`, `avatar`, `created_at`, `updated_at`) VALUES
('admin', '$2y$12$KeFIZSgr2dmDPgTUY9lCke9Ogpq260dVT3QOMwmS.trLtiRJMTYbW', 'Pink Admin', 'admin@example.com', NULL, NOW(), NOW()),
('cashier', '$2y$12$KeFIZSgr2dmDPgTUY9lCke9Ogpq260dVT3QOMwmS.trLtiRJMTYbW', 'Coquette Cashier', 'cashier@example.com', NULL, NOW(), NOW());
