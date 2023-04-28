CREATE DATABASE siteECommerce;
USE siteECommerce;

CREATE TABLE Paiement(
   ID INTEGER,
   type VARCHAR(50) NOT NULL,
   Date_paiement DATETIME,
   montant CURRENCY NOT NULL,
   PRIMARY KEY(ID)
);

CREATE TABLE Fournisseur(
   id INTEGER,
   nom VARCHAR(50),
   adresse VARCHAR(50),
   telephone INT,
   PRIMARY KEY(id),
   UNIQUE(nom)
);

CREATE TABLE Categorie_de_produit(
   Id INTEGER,
   Categorie VARCHAR(50) NOT NULL,
   PRIMARY KEY(Id)
);

CREATE TABLE Role(
   id INTEGER,
   role VARCHAR(50),
   PRIMARY KEY(id)
);

DROP TABLE IF EXISTS Compte;

CREATE TABLE Compte(
   id INTEGER NOT NULL AUTO_INCREMENT,
   prenom_client VARCHAR(50),
   Nom_client VARCHAR(50) NOT NULL,
   email VARCHAR(50) NOT NULL,
   pseudo VARCHAR(50),
   Motdepasse VARCHAR(50),
   #date_creation DATETIME,
   #adrresse VARCHAR(50),
   #telephone INT,
   #id_1 INT NOT NULL,
   PRIMARY KEY(id),
   UNIQUE(pseudo)
   #FOREIGN KEY(id_1) REFERENCES Role(id)
);

CREATE TABLE Commanders(
   id INTEGER,
   date_commande DATETIME NOT NULL,
   Prix_total FLOAT,
   ID_1 INT NOT NULL,
   id_2 INT NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(ID_1) REFERENCES Paiement(ID),
   FOREIGN KEY(id_2) REFERENCES Compte(id)
);

CREATE TABLE Panier(
   id INTEGER,
   nb_prroduits INT,
   id_1 INT NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(id_1) REFERENCES Compte(id)
);

CREATE TABLE Produit(
   id INTEGER,
   nom VARCHAR(50),
   prix FLOAT NOT NULL,
   poids INT,
   Descrriptif_produit TEXT,
   note DECIMAL(15,2),
   Id_1 INT NOT NULL,
   id_2 INT NOT NULL,
   PRIMARY KEY(id),
   UNIQUE(nom),
   FOREIGN KEY(Id_1) REFERENCES Categorie_de_produit(Id),
   FOREIGN KEY(id_2) REFERENCES Compte(id)
);

CREATE TABLE Commentaire(
   Id INTEGER,
   date_commentaire TIME,
   Message TEXT,
   id_1 INT NOT NULL,
   id_2 INT NOT NULL,
   PRIMARY KEY(Id),
   FOREIGN KEY(id_1) REFERENCES Compte(id),
   FOREIGN KEY(id_2) REFERENCES Produit(id)
);

CREATE TABLE Dans_le_panier(
   id INT,
   id_1 INT,
   PRIMARY KEY(id, id_1),
   FOREIGN KEY(id) REFERENCES Panier(id),
   FOREIGN KEY(id_1) REFERENCES Produit(id)
);

CREATE TABLE Commande_contient(
   id INT,
   id_1 INT,
   quantité INT,
   PRIMARY KEY(id, id_1),
   FOREIGN KEY(id) REFERENCES Commanders(id),
   FOREIGN KEY(id_1) REFERENCES Produit(id)
);

CREATE TABLE Livraison(
   id INT,
   id_1 INT,
   date_livraison DATETIME,
   delai INT,
   PRIMARY KEY(id, id_1),
   FOREIGN KEY(id) REFERENCES Produit(id),
   FOREIGN KEY(id_1) REFERENCES Fournisseur(id)
);

INSERT INTO Role (id, role) VALUES (1, 'Acheteur');
INSERT INTO Compte (id, prenom_client, Nom_client, email, pseudo, Motdepasse, date_creation, adrresse, telephone, nom_entreprrise_ou_particulier, id_1)
VALUES (1, 'Sammy', 'Darliz', 'sammy678@gmail.com', 'sam678', 'newt', NOW(), '123 Main Street', 555-1234, 'Entreprise X', 1);

SELECT *
FROM Compte;