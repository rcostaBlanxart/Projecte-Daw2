DROP DATABASE IF exists projecte;
CREATE DATABASE projecte;
USE projecte;

CREATE TABLE usuari (
    id_usuari INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(20) NOT NULL UNIQUE,
    gmail VARCHAR(60) NOT NULL UNIQUE,
    password VARCHAR(20) NOT NULL,
    es_Admin bit NOT NULL
);

CREATE TABLE curs (
    id_curs INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nom_curs VARCHAR(60),
    descripcio VARCHAR(200),
    horari VARCHAR(60),
    professor VARCHAR(60),
    preu FLOAT,
    placesDisponibles INT
);

CREATE TABLE reserva (
    id_reserva INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_usuari INT NOT NULL,
    id_curs INT NOT NULL,
    FOREIGN KEY (id_usuari) REFERENCES usuari(id_usuari),
    FOREIGN KEY (id_curs) REFERENCES curs(id_curs)
);

INSERT INTO usuari VALUES 
-- id_usuari, nom, gmail, password, es_admin
(1, "Joel", "jlopez@insdanielblanxart.cat", "1234", 1),
(2, "Roger", "rcosta@insdanielblanxart.cat", "1234", 1);

INSERT INTO curs (nom_curs, descripcio, horari, professor, preu, placesDisponibles)
VALUES ('Spanish for Beginners', 'Learn the basics of Spanish in this introductory course.', 'Mondays and Wednesdays at 6pm', 'Juan Garcia', 200, 20),
       ('Advanced Python Programming', 'Take your Python skills to the next level in this advanced course.', 'Tuesdays and Thursdays at 7pm', 'Samantha Smith', 300, 15),
       ('Salsa Dancing for Everyone', 'Learn the fundamentals of salsa dancing in this fun and interactive course.', 'Fridays at 7pm', 'Isabella Rodriguez', 150, 25);