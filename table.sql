CREATE TABLE IF NOT EXISTS `ekatte` (
  `id` int NOT NULL,
  `ekatte` varchar(50) COLLATE utf8mb4_bg_0900_ai_ci DEFAULT NULL,
  `t_v_m` varchar(255) COLLATE utf8mb4_bg_0900_ai_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_bg_0900_ai_ci DEFAULT NULL,
  `oblast` varchar(255) COLLATE utf8mb4_bg_0900_ai_ci DEFAULT NULL,
  `obshtina` varchar(255) COLLATE utf8mb4_bg_0900_ai_ci DEFAULT NULL,
  `kmetstvo` varchar(255) COLLATE utf8mb4_bg_0900_ai_ci DEFAULT NULL,
  `kind` int DEFAULT NULL,
  `category` int DEFAULT NULL,
  `altitude` int DEFAULT NULL,
  `document` int DEFAULT NULL,
  `abc` int DEFAULT NULL,
  `name_en` varchar(50) COLLATE utf8mb4_bg_0900_ai_ci DEFAULT NULL,
  `nuts1` varchar(50) COLLATE utf8mb4_bg_0900_ai_ci DEFAULT NULL,
  `nuts2` varchar(50) COLLATE utf8mb4_bg_0900_ai_ci DEFAULT NULL,
  `nuts3` varchar(50) COLLATE utf8mb4_bg_0900_ai_ci DEFAULT NULL,
  `text` text COLLATE utf8mb4_bg_0900_ai_ci,
  `oblast_name` varchar(255) COLLATE utf8mb4_bg_0900_ai_ci DEFAULT NULL,
  `obshtina_name` varchar(255) COLLATE utf8mb4_bg_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bg_0900_ai_ci;

-- Indexes for table `ekatte`
--
ALTER TABLE `ekatte`
    ADD PRIMARY KEY (`id`);

ALTER TABLE `ekatte`
    MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;
