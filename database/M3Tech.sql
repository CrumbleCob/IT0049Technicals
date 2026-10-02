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
  `full_name` varchar(100) NOT NULL,
  `email` varchar(120) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `customers` (`full_name`, `email`, `phone`, `address`, `created_at`, `updated_at`) VALUES
('Rosie Flores', 'rosie@example.com', '0917 123 4567', 'Manila', NOW(), NOW()),
('Bella Santos', 'bella@example.com', '0918 765 4321', 'Quezon City', NOW(), NOW());

INSERT INTO `users` (`username`, `full_name`, `email`, `avatar`, `created_at`, `updated_at`) VALUES
('admin', 'Pink Admin', 'admin@example.com', NULL, NOW(), NOW()),
('cashier', 'Coquette Cashier', 'cashier@example.com', NULL, NOW(), NOW());
