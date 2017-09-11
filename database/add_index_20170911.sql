ALTER TABLE `users` ADD INDEX `user_id` (`id`);
ALTER TABLE `devices` ADD INDEX `device_id` (`id`);
ALTER TABLE `devices` ADD INDEX `devices` (`id`,`user_id`);