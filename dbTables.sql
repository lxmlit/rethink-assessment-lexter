CREATE TABLE `users` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(30) NOT NULL,
    `email` varchar(30) NOT NULL,
    `password` varchar(150) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `email` (`email`)
) ENGINE = InnoDB AUTO_INCREMENT = 12 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

CREATE TABLE posts (
    `id` INT(6) AUTO_INCREMENT PRIMARY KEY,
    `post_title` VARCHAR(191) NOT NULL,
    `post_content` VARCHAR(191) NOT NULL
)