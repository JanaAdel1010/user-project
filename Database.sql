CREATE DATABASE registration;
USE registration;
CREATE TABLE users(
user_id INT not null AUTO_INCREMENT,
email varchar(255) not null,
name varchar(225) not null,password varchar(225) not null,registration_date timestamp default current_timestamp,PRIMARY KEY (user_id));
INSERT INTO users (email, name ,password) VALUES ('test@test.com',’test’,'testpassword');