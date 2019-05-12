<?php
/**
 * users table
 */
$user_name = 'admin';
$user_email = 'admin@local.loc';
$user_password = password_hash('123', PASSWORD_BCRYPT);

return [
	'name' => 'users',

	'create' => [
		'table' => "CREATE TABLE IF NOT EXISTS `users` (
			`id` int(10) unsigned NOT NULL,
			`role` enum('admin','user') NOT NULL DEFAULT 'user',
			`name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
			`email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
			`password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,  
			`created_at` timestamp NULL DEFAULT NULL,
			`updated_at` timestamp NULL DEFAULT NULL
			) ENGINE=InnoDB AUTO_INCREMENT=1329 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;",

		'settings' => [
            "INSERT INTO `users` (`id`,`role`, `name`, `email`, `password`) VALUES (1, 'admin', '$user_name', '$user_email', '$user_password');",
			"ALTER TABLE `users` ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);",
			"ALTER TABLE `users` MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;",
		]
	]
];