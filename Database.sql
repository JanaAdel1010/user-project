CREATE DATABASE registration;
USE registration;
CREATE TABLE `user`(
`user_id` INT not null AUTO_INCREMENT,
`email` varchar(255) not null,
`name` varchar(225) not null,`password` varchar(225) not null,
`registration_date` timestamp default current_timestamp,
`PRIMARY KEY` (`user_id`));

