CREATE DATABASE IF NOT EXISTS appDB;
CREATE USER IF NOT EXISTS 'user'@'%' IDENTIFIED BY 'password';
GRANT SELECT,UPDATE,INSERT ON appDB.* TO 'user'@'%';
FLUSH PRIVILEGES;

USE appDB;
CREATE TABLE IF NOT EXISTS users (
  ID INT(11) NOT NULL AUTO_INCREMENT,
  login VARCHAR(20) NOT NULL,
  password VARCHAR(40) NOT NULL,
  PRIMARY KEY (ID)
);
CREATE TABLE IF NOT EXISTS afisha (
  ID INT(11) NOT NULL AUTO_INCREMENT,
  film VARCHAR(20) NOT NULL,
  price INTEGER,
  PRIMARY KEY (ID)
);

INSERT INTO users (login, password)
SELECT * FROM (SELECT 'akim', '{SHA}QL0AFWMIX8NRZTKeof9cXsvbvu8=') AS tmp
WHERE NOT EXISTS (
    SELECT login FROM users WHERE login='akim' AND password='akim'
) LIMIT 1;

INSERT INTO afisha (film, price)
SELECT * FROM (SELECT 'The Black Phone', 400) AS tmp
WHERE NOT EXISTS (
    SELECT film FROM afisha WHERE film = 'The Black Phone' AND price = 400
) LIMIT 1;

INSERT INTO afisha (film, price)
SELECT * FROM (SELECT 'Never Let Me Go', 150) AS tmp
WHERE NOT EXISTS (
    SELECT film FROM afisha WHERE film = 'Never Let Me Go' AND price = 150
) LIMIT 1;

INSERT INTO afisha (film, price)
SELECT * FROM (SELECT 'Nightcrawler', 750) AS tmp
WHERE NOT EXISTS (
    SELECT film FROM afisha WHERE film = 'Nightcrawler' AND price = 750
) LIMIT 1;

INSERT INTO afisha (film, price)
SELECT * FROM (SELECT 'Tenet', 700) AS tmp
WHERE NOT EXISTS (
    SELECT film FROM afisha WHERE film = 'Tenet' AND price = 700
) LIMIT 1;

INSERT INTO afisha (film, price)
SELECT * FROM (SELECT 'Knives Out', 300) AS tmp
WHERE NOT EXISTS (
    SELECT film FROM afisha WHERE film = 'Knives Out' AND price = 300
) LIMIT 1;

INSERT INTO afisha (film, price)
SELECT * FROM (SELECT 'Inception', 400) AS tmp
WHERE NOT EXISTS (
        SELECT film FROM afisha WHERE film = 'Inception' AND price = 400
) LIMIT 1;

INSERT INTO afisha (film, price)
SELECT * FROM (SELECT 'Zodiac', 200) AS tmp
WHERE NOT EXISTS (
        SELECT film FROM afisha WHERE film = 'Zodiac' AND price = 200
) LIMIT 1;

INSERT INTO afisha (film, price)
SELECT * FROM (SELECT 'The Great Gatsby', 300) AS tmp
WHERE NOT EXISTS (
        SELECT film FROM afisha WHERE film = 'The Great Gatsby' AND price = 300
) LIMIT 1;

INSERT INTO afisha (film, price)
SELECT * FROM (SELECT 'Dune', 120) AS tmp
WHERE NOT EXISTS (
        SELECT film FROM afisha WHERE film = 'Dune' AND price = 120
) LIMIT 1;

INSERT INTO afisha (film, price)
SELECT * FROM (SELECT 'Gladiator', 500) AS tmp
WHERE NOT EXISTS (
        SELECT film FROM afisha WHERE film = 'Gladiator' AND price = 500
) LIMIT 1;