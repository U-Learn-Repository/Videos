DROP TABLE IF EXISTS `videos`;
CREATE TABLE IF NOT EXISTS `videos` (
 `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
 `id_curso` int(11) NOT NULL,
 `id_capitulo` int(11) NOT NULL,
 `id_tema` int(11) NOT NULL,
 `archivo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
 `descripcion` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
 `calificacion` double(8,2) NOT NULL,
 `created_at` timestamp NULL DEFAULT NULL,
 `updated_at` timestamp NULL DEFAULT NULL,
 PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `videos` (`id`, `id_curso`, `id_capitulo`, `id_tema`, `archivo`, `descripcion`, 
`calificacion`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '../videos/video_1_1_1.mp4', 'actualizado', 0.00, '2020-04-10 19:24:57', '2020-04-10 
20:10:30');
