﻿

-- Table des patients
CREATE TABLE Patients (
    patient_id INT AUTO_INCREMENT not null,
	nom  VARCHAR(15),
	prenom VARCHAR(15),
	age  VARCHAR(3),
	sexe CHAR(1),
	telephone  INTEGER(19),
	adresse   VARCHAR(50),
	constraint pk_patient_id primary key (patient_id)
    -- Autres colonnes pour les informations du patient
);
insert into Patients (nom, prenom, age, sexe, telephone, adresse) values (/*'01'*/ 'Ngassa', 'kevin', '34', 'M','691916265', "Rue Gallieni");
insert into Patients (nom, prenom, age, sexe, telephone, adresse) values (/*'02'*/ 'Luther', 'Martine', '24', 'F','694556477', "Rue de bobolo");
insert into Patients (nom, prenom, age, sexe, telephone, adresse) values (/*'03'*/ 'Z', 'Malcolm', '57', 'M','697879786', "Rue de Harlem");
insert into Patients (nom, prenom, age, sexe, telephone, adresse) values (/*'04'*/ 'Mandela', 'Nelson', '27', 'M','695545465', "Rue de l'apartheid");
insert into Patients (nom, prenom, age, sexe, telephone, adresse) values (/*'05'*/ 'Ngongang ', 'Annette', '49', 'M','697565458', "Cercle bansoa");
insert into Patients (nom, prenom, age, sexe, telephone, adresse) values (/*'06'*/ 'Aya', 'Lynn', '13', 'F','698475896', "Rue de brieve");
insert into Patients (nom, prenom, age, sexe, telephone, adresse) values (/*'07'*/ 'Larsein', 'Maurice', '54', 'M','694334477', "Rue de bobolo");
insert into Patients (nom, prenom, age, sexe, telephone, adresse) values (/*'08'*/ 'Poupignou', 'Elise', '57', 'F','634479786', "Bravine de cerve");
insert into Patients (nom, prenom, age, sexe, telephone, adresse) values (/*'09'*/ 'Leaticia', 'Nelsy', '27', 'F','695543435', "Rue de l'Armeiny");
insert into Patients (nom, prenom, age, sexe, telephone, adresse) values (/*'10'*/ 'Oueifiou', 'Peniel', '15', 'M','697563448', "Cercle bansoa");
insert into Patients (nom, prenom, age, sexe, telephone, adresse) values (/*'10'*/ 'Monkam', 'Pauline', '32', 'F','697552348', "hyon colfontaine");
insert into Patients (nom, prenom, age, sexe, telephone, adresse) values (/*'10'*/ 'Ngassa', 'Pauline', '03', 'F','697552348', "meilleur pays");
-- Table des échantillons
CREATE TABLE Echantillons (
    echantillon_id INT PRIMARY KEY,
    patient_id INT,
	examen set ('NFS', 'ELECTROPHORESE', 'VIH', 'GLYCEMIE', 'GS', 'WIDAL'),
	Date_h_reception DATETIME,
	commentaire VARCHAR(250),
    -- Autres colonnes pour les détails de l'échantillon
    FOREIGN KEY (patient_id) REFERENCES Patients(patient_id)
);
insert into Echantillons (echantillon_id, examen, patient_id, Date_h_reception, commentaire) values ('12001', 'GS', '10','2014-12-15 06:08:51',NULL);
insert into Echantillons (echantillon_id, examen, patient_id, Date_h_reception, commentaire) values ('12002', 'NFS,GS', '04','2023-04-30 08:09:15',NULL);
insert into Echantillons (echantillon_id, examen, patient_id, Date_h_reception, commentaire) values ('12003', 'GLYCEMIE,WIDAL', '02','2023-04-30 09:09:15','glycémie urgente!');
insert into Echantillons (echantillon_id, examen, patient_id, Date_h_reception, commentaire) values ('12004', 'VIH', '02','2023-04-30 09:09:15',NULL);

-- Table des examens
CREATE TABLE Examens (
    examen_id INT PRIMARY KEY,
	echantillon_id INT,
    nom_examen VARCHAR(255),
	Date_h_manipulation DATETIME,
	commentaire VARCHAR(250),
	jour DATE,
	resultat_dispo INT default 0,
    -- Autres colonnes pour les détails de l'examen
	FOREIGN KEY (echantillon_id) REFERENCES Echantillons(echantillon_id)
);
insert into Examens (examen_id, echantillon_id, nom_examen, Date_h_manipulation, jour, commentaire) values ('32001', '12001', 'GS','2014-12-15 07:08:51','2014-12-15', NULL);
insert into Examens (examen_id, echantillon_id, nom_examen, Date_h_manipulation, jour, commentaire) values ('32002', '12002', 'NFS','2023-04-30 09:09:15','2023-04-30', NULL);
insert into Examens (examen_id, echantillon_id, nom_examen, Date_h_manipulation, jour, commentaire) values ('32003', '12002', 'GS','2023-04-30 09:09:15','2023-04-30', NULL);
insert into Examens (examen_id, echantillon_id, nom_examen, Date_h_manipulation, jour, commentaire) values ('32004', '12003', 'GLYCEMIE','2023-04-30 10:09:15','2023-04-30', NULL);
insert into Examens (examen_id, echantillon_id, nom_examen, Date_h_manipulation, jour, commentaire) values ('32005', '12003', 'WIDAL','2023-04-30 10:09:15','2023-04-30', NULL);


-- Table des résultats des examens
CREATE TABLE Resultats (
    resultat_id INT AUTO_INCREMENT PRIMARY KEY,
    id_examen INT UNIQUE KEY,
	Date_h_resultat DATETIME,
    description VARCHAR(255) NOT NULL,
    -- Autres colonnes pour les détails du résultat
    FOREIGN KEY (id_examen) REFERENCES Examens(examen_id)
);

DELIMITER //

CREATE TRIGGER after_insert_resultat
AFTER INSERT ON Resultats
FOR EACH ROW
BEGIN
    UPDATE Examens
    SET resultat_dispo = 1
    WHERE examen_id = NEW.id_examen;
END;
//
DELIMITER ;
insert into Resultats (id_examen, description,Date_h_resultat) values ('32005','Anti-O: 1:160; Anti-H: 1:80; Anti-A: < 1:20; Anti-B: < 1:20','2023-04-30 12:40:06');
insert into Resultats (id_examen, description,Date_h_resultat) values ('32004','0,75g/l','2023-04-30 10:19:15');


-- Table des Services
CREATE TABLE Services (
    service_id INT PRIMARY KEY,
	nom VARCHAR(255),
    description VARCHAR(255),
    -- Autres colonnes pour les détails de la paillasse
);

-- Table du personnel
CREATE TABLE Personnel (
    personnel_id INT PRIMARY KEY,
    nom VARCHAR(255),
    prenom VARCHAR(255),
    -- Autres colonnes pour les informations du personnel
);

-- Table de liaison entre échantillons et Services (M à N)
CREATE TABLE Examen_Services (
    examen_id INT,
    service_id INT,
	
    PRIMARY KEY (examen_id, service_id),
    FOREIGN KEY (examen_id) REFERENCES Examens(examen_id),
    FOREIGN KEY (service_id) REFERENCES Services(service_id)
);

-- Table de liaison entre Services et personnel (M à N)
CREATE TABLE Services_Personnel (
    service_id INT,
    personnel_id INT,
    jour_semaine DATE, -- Ajoutez les détails spécifiques aux jours et heures si nécessaire
    PRIMARY KEY (service_id, personnel_id, jour_semaine),
    FOREIGN KEY (service_id) REFERENCES Services(service_id),
    FOREIGN KEY (personnel_id) REFERENCES Personnel(personnel_id)
);
