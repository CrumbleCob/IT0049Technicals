CREATE DATABASE IF NOT EXISTS `MidtermPOS` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `MidtermPOS`;

SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS `sales`;
DROP TABLE IF EXISTS `users`;
DROP TABLE IF EXISTS `customers`;
DROP TABLE IF EXISTS `products`;
SET FOREIGN_KEY_CHECKS = 1;

CREATE TABLE `products` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock_quantity` int NOT NULL DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `is_archived` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `customers` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `sales` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int unsigned NOT NULL,
  `customer_id` int unsigned DEFAULT NULL,
  `sold_by` int unsigned NOT NULL,
  `quantity` int NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `sales_product_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `sales_customer_fk` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE SET NULL,
  CONSTRAINT `sales_user_fk` FOREIGN KEY (`sold_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `products` (`name`, `price`, `stock_quantity`, `image`, `is_archived`, `created_at`) VALUES
('Strawberry Notebook', 129.00, 24, NULL, 0, NOW()),
('Pink Gel Pen', 35.50, 50, NULL, 0, NOW()),
('Ribbon Pouch', 249.00, 12, NULL, 0, NOW());

INSERT INTO `customers` (`full_name`, `email`, `phone`, `created_at`) VALUES
('Rosie Flores', 'rosie@example.com', '09171234567', NOW()),
('Bella Santos', 'bella@example.com', '09187654321', NOW());

INSERT INTO `users` (`username`, `full_name`, `password`, `avatar`, `created_at`) VALUES
('admin', 'Pink Admin', '$2y$12$KeFIZSgr2dmDPgTUY9lCke9Ogpq260dVT3QOMwmS.trLtiRJMTYbW', NULL, NOW()),
('cashier', 'Coquette Cashier', '$2y$12$KeFIZSgr2dmDPgTUY9lCke9Ogpq260dVT3QOMwmS.trLtiRJMTYbW', NULL, NOW());
