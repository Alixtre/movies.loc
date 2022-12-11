CREATE TABLE `Users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(150) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`)
);

CREATE TABLE `Films` (
  `film_id` int NOT NULL AUTO_INCREMENT,
  `film_name` varchar(100) NOT NULL,
  `release_date` date NOT NULL,
  `genre` varchar(50) NOT NULL,
  `country` varchar(100) NOT NULL,
  `director` varchar(100) NOT NULL,
  PRIMARY KEY (`film_id`)
);

CREATE TABLE `Favorite` (
  `film_id` int NOT NULL,
  `user_id` int NOT NULL,
  FOREIGN KEY (`film_id`) REFERENCES `Films` (`film_id`),
  FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`)
)