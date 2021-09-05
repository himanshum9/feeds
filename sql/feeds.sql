
START TRANSACTION;



CREATE TABLE `manage_url` (
  `id` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



INSERT INTO `manage_url` (`id`, `url`) VALUES
(1, 'https://www.axelerant.com/tag/drupal-planet/feed'),
(2, 'http://feeds.bbci.co.uk/news/technology/rss.xml'),
(3, 'https://feeds.feedburner.com/symfony/blog');



CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ;



INSERT INTO `user` (`id`, `email`, `roles`, `password`, `name`) VALUES
(1, 'abc@gmail.com', '[\"ROLE_USER\"]', '$2y$13$5HPmpWBppo586pZqv4DiWeKGVTV1qLALDK.FAqFcir5VM4jPAkemu', 'abc'),
(2, 'admin@gmail.com', '[\"ADMIN_USER\"]', '$2y$13$5HPmpWBppo586pZqv4DiWeKGVTV1qLALDK.FAqFcir5VM4jPAkemu', 'admin'),
(3, 'qwerty@gmail.com', '[\"ADMIN_USER\"]', '$2y$13$GhGtZuL8EfxqdVFxcYBDfuQr/GP26HMSzyHR3BbbMJBPpeqwpFiPy', 'qwert');


ALTER TABLE `manage_url`
  ADD PRIMARY KEY (`id`);

COMMIT;
