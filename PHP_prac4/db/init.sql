CREATE DATABASE IF NOT EXISTS appDB;

CREATE USER IF NOT EXISTS 'user'@'%' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON appDB.* TO 'user'@'%';
FLUSH PRIVILEGES;
USE appDB;

DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS menu;

CREATE TABLE IF NOT EXISTS users
(
    ID       INT(11) NOT NULL AUTO_INCREMENT,
    name     VARCHAR(20) CHARACTER SET ascii NOT NULL,
    password VARCHAR(45) CHARACTER SET ascii NOT NULL,
    PRIMARY KEY (ID)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS menu
(
    ID          INT(10) NOT NULL AUTO_INCREMENT,
    name        VARCHAR(32)  NOT NULL,
    description VARCHAR(256) NOT NULL,
    price       INT(6) NOT NULL,
    PRIMARY KEY (ID)
);

INSERT INTO users (name, password)
VALUES ('admin', '{SHA}0DPiKuNIrrVmD8IUCuw1hQxNqZc=');


INSERT INTO menu (name, description, price)
VALUES ('Breakfast', 'Very tasty', 9);

INSERT INTO menu (name, description, price)
VALUES ('Black Americano', 'Very tasty',
        5);

INSERT INTO menu (name, description, price)
VALUES ('Cappuccino', 'Very tasty', 2);

INSERT INTO menu (name, description, price)
VALUES ('Latte', 'Very tasty', 4);

INSERT INTO menu (name, description, price)
VALUES ('Espresso',
        'Very tasty',
        10);

INSERT INTO menu (name, description, price)
VALUES ('Sandwich', 'Very tasty', 11);

INSERT INTO menu (name, description, price)
VALUES ('Cheese Sandwich', 'Very tasty', 12);