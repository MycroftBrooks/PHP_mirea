CREATE DATABASE IF NOT EXISTS appDB;
CREATE USER IF NOT EXISTS 'user'@'%' IDENTIFIED BY 'password';
GRANT SELECT,UPDATE,INSERT ON appDB.* TO 'user'@'%';
FLUSH PRIVILEGES;

USE appDB;
SET NAMES utf8;

CREATE TABLE IF NOT EXISTS menu
(
    ID          INT(10) NOT NULL AUTO_INCREMENT,
    name        VARCHAR(32)  NOT NULL,
    description VARCHAR(256) NOT NULL,
    price       INT(6) NOT NULL,
    PRIMARY KEY (ID)
);


CREATE TABLE IF NOT EXISTS auth (
    ID INT(11) NOT NULL AUTO_INCREMENT,
    login VARCHAR(20) NOT NULL UNIQUE,
    password VARCHAR(40) NOT NULL,
    PRIMARY KEY(ID)
);

INSERT INTO auth (login, password)
VALUES ('admin', '{SHA}0DPiKuNIrrVmD8IUCuw1hQxNqZc=');

INSERT INTO menu (name, description, price)
VALUES ('ENGLISH BREAKFAST', 'Very tasty', 10);

INSERT INTO menu (name, description, price)
VALUES ('Black Americano', 'Served as a 12oz drink All our Barista prepared drinks are also available decaffeinated',
        3);

INSERT INTO menu (name, description, price)
VALUES ('Cappuccino', 'Served as a 12oz drink All our Barista prepared drinks are also available decaffeinated', 3);

INSERT INTO menu (name, description, price)
VALUES ('Latte', 'Served as a 12oz drink All our Barista prepared drinks are also available decaffeinated', 3);

INSERT INTO menu (name, description, price)
VALUES ('HOMEMADE SAUSAGE ROLL',
        'Honey roasted sausage meat mixed with caramelised onion chutney and wholegrain mustard wrapped in a flaky puff pastr',
        9);

INSERT INTO menu (name, description, price)
VALUES ('THE CLUB SANDWICH', 'Chicken Breast, Crispy Bacon, Lettuce, Tomato & Mayonnaise', 7);

INSERT INTO menu (name, description, price)
VALUES ('THE PLOUGHMAN SANDWICH', 'Cheddar Cheese, Honey Roasted Ham & Caramelised Onion Chutney', 7);

