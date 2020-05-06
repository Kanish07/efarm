CREATE TABLE `orderplaced` (
    `id` int(10) NOT NULL AUTO_INCREMENT,
    `orderplaced` varchar(5000) DEFAULT NULL,
    `user` varchar(20) DEFAULT NULL,
    `price` int(10) DEFAULT NULL,
    `Time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    PRIMARY KEY (`id`)
)