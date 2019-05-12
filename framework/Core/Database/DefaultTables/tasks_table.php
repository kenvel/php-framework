<?php
/**
 * Tasks table
 */

return [
    'name' => 'tasks',

    'create' => [
        'table' => "CREATE TABLE IF NOT EXISTS `tasks` (
			`id` int(10) unsigned NOT NULL,
			`close` tinyint(1) DEFAULT NULL,
			`name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
			`email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
			`text` text COLLATE utf8mb4_unicode_ci NOT NULL,
			`created_at` timestamp NULL DEFAULT NULL,
			`updated_at` timestamp NULL DEFAULT NULL
			) ENGINE=InnoDB AUTO_INCREMENT=1329 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;",

        'settings' => [
            "INSERT INTO `tasks` (`id`,`name`, `email`, `text`) VALUES (1, 'user', 'user@email.com', 'Task description');",
            "ALTER TABLE `tasks` ADD PRIMARY KEY (`id`);",
            "ALTER TABLE `tasks` MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;",
        ]
    ]
];