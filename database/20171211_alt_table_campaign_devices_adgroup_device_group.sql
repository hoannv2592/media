ALTER TABLE campaign_groups  ADD `path_logo` varchar(500) DEFAULT NULL;
ALTER TABLE campaign_groups  ADD  `image_logo` varchar(500) DEFAULT NULL;
ALTER TABLE campaign_groups  ADD  `title_connect` varchar(255) DEFAULT NULL;
ALTER TABLE campaign_groups  ADD  `hidden_connect` int(12) DEFAULT NULL;

ALTER TABLE devices  ADD `path_logo` varchar(500) DEFAULT NULL;
ALTER TABLE devices  ADD  `image_logo` varchar(500) DEFAULT NULL;
ALTER TABLE devices  ADD  `title_connect` varchar(255) DEFAULT NULL;
ALTER TABLE devices  ADD  `hidden_connect` int(12) DEFAULT NULL;

ALTER TABLE device_groups  ADD `path_logo` varchar(500) DEFAULT NULL;
ALTER TABLE device_groups  ADD  `image_logo` varchar(500) DEFAULT NULL;
ALTER TABLE device_groups  ADD  `title_connect` varchar(255) DEFAULT NULL;
ALTER TABLE device_groups  ADD  `hidden_connect` int(12) DEFAULT NULL;

ALTER TABLE adgroups  ADD `path_logo` varchar(500) DEFAULT NULL;
ALTER TABLE adgroups  ADD  `image_logo` varchar(500) DEFAULT NULL;
ALTER TABLE adgroups  ADD  `title_connect` varchar(255) DEFAULT NULL;
ALTER TABLE adgroups  ADD  `hidden_connect` int(12) DEFAULT NULL;

