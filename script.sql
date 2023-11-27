CREATE DATABASE dashboard;


CREATE TABLE categorie (
    id  int PRIMARY KEY,
    nom VARCHAR(255)
    
)



CREATE TABLE movies (
    id  int PRIMARY KEY,
    titire VARCHAR(255),
    duree int,
    nombre_des_etoiles int,
    categorie_id int,
    FOREIGN KEY (categorie_id) REFERENCES categorie (id)
)


CREATE TABLE series (
    id  int PRIMARY KEY,
    titire VARCHAR(255),
    nombre_des_episodes int,
    nombre_des_etoiles int,
    categorie_id int,
    FOREIGN KEY (categorie_id) REFERENCES categorie (id)
)