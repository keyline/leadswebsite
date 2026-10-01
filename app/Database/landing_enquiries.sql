-- Import once into the application's database when deploying the landing page.
CREATE TABLE IF NOT EXISTS `landing_enquiries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `city` varchar(100) NOT NULL,
  `business_type` varchar(60) NOT NULL,
  `interested_in` varchar(40) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `created_at` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
