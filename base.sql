CREATE DATABASE URBAN;

USE URBAN;

CREATE TABLE USERS (
    idUsers INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    rolee INT NOT NULL,
    contact VARCHAR(30) NOT NULL,
    matricule VARCHAR(20) NOT NULL,
    mbp TEXT NOT NULL
);

CREATE TABLE ETABLISSEMENT (
    idEtat INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL,
    adresse VARCHAR(50)
);

CREATE TABLE SECTION (
    idSection INT PRIMARY KEY AUTO_INCREMENT,
    section VARCHAR(30) NOT NULL
);

CREATE TABLE NIVEAU (
    idNiv INT PRIMARY KEY AUTO_INCREMENT,
    niveau VARCHAR(5) NOT NULL,
    prix INT NOT NULL,
    idSection INT NOT NULL,
    CONSTRAINT fkSect FOREIGN KEY (idSection) REFERENCES SECTION(idSection)
);

CREATE TABLE CLASS (
    idClass INT PRIMARY KEY AUTO_INCREMENT,
    class_name VARCHAR(10) NOT NULL,
    idNiv INT NOT NULL,
    CONSTRAINT fkNivClass FOREIGN KEY (idNiv) REFERENCES NIVEAU(idNiv)
);

CREATE TABLE ELEVE (
    idEleve INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    matricule VARCHAR(30),
    adresse VARCHAR(50),
    numero VARCHAR(30),
    nomTuteur VARCHAR(50) NOT NULL,
    prenomTuteur VARCHAR(50) NOT NULL,
    numTuteur VARCHAR(50) NOT NULL,
    adresseTuteur VARCHAR(50),
    idClass INT NOT NULL,
    CONSTRAINT fkClas FOREIGN KEY (idClass) REFERENCES CLASS(idClass)
);

CREATE TABLE PROF (
    idProf INT PRIMARY KEY AUTO_INCREMENT,
    matricule INT NOT NULL,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    email VARCHAR(50),
    adresse VARCHAR(50),
    telephone VARCHAR(50) NOT NULL,
    date_recrutement DATE,
    date_ajout TIMESTAMP DEFAULT CURRENT_TIMESTAMP

   
);

CREATE TABLE MATIERE (
    idMat INT PRIMARY KEY AUTO_INCREMENT,
    matiere VARCHAR(50) NOT NULL,
    coef INT NOT NULL,
    nbHeures INT,
    idNiv INT NOT NULL,
    idProf INT,
    CONSTRAINT fkNivMatiere FOREIGN KEY (idNiv) REFERENCES NIVEAU(idNiv),
    CONSTRAINT fkprof FOREIGN KEY (idProf) REFERENCES PROF(idProf)
);

CREATE TABLE PLATEFORME (
    idPlateforme INT PRIMARY KEY AUTO_INCREMENT,
    etat ENUM('non_configure', 'configure') NOT NULL DEFAULT 'non_configure'
);

INSERT INTO PLATEFORME (etat) VALUES ('non_configure');

INSERT INTO USERS (nom, prenom, rolee, contact, matricule, mbp) VALUES ("admin", "admin", "0", "admin@gmail.com", "22S", "00000000");