USE myDB;


DROP TABLE IF EXISTS Type_Produit;
DROP TABLE IF EXISTS Categorie_de_produit;
DROP TABLE IF EXISTS Compte;
DROP TABLE IF EXISTS Commandes;
DROP TABLE IF EXISTS Produit;
DROP TABLE IF EXISTS Commentaire;
DROP TABLE IF EXISTS Etre_Dans_Panier;

CREATE TABLE Compte(
	prenom VARCHAR(20),
    nom VARCHAR(20),
    pseudo VARCHAR(20),
	ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    addresse_livraison TEXT,
    email VARCHAR(50),
    motdePasse VARCHAR(20),
    date_creation DATE,
    adresse TEXT,
    telephone VARCHAR(20),
    nom_role VARCHAR(20)
);
SELECT * FROM Compte;
SELECT * FROM Compte WHERE (email = "loic.briant78@gmail.com")and( motdePasse = 1234);
SELECT * FROM Compte WHERE (email = "solene.abbas23@gmail.com");
INSERT INTO Compte (addresse_livraison,email,motdePasse ,date_creation,adresse,telephone,nom_role) VALUES (null,"loic.briant78@gmail.com","1234",null,null,null,null);

CREATE TABLE Commandes(
	ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    date_commandes DATE,
    prix DECIMAL(10,2),
    idCompte INT,
    FOREIGN KEY fk_compte(idCompte) REFERENCES Compte(ID) ON DELETE CASCADE
);

CREATE TABLE Fournisseur(
	ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    addresse TEXT,
    nom VARCHAR(50),
    telephone VARCHAR(20)
);

CREATE TABLE Produit(
	ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    date_livraison DATE,
    delai INT,
    idVendeur INT,
    idCommandes INT,
    idTypeProduit INT,
    idFournisseur INT,
    FOREIGN KEY fk_vendeur(idVendeur) REFERENCES Compte(ID) ON DELETE CASCADE,
	FOREIGN KEY fk_commandes(idCommandes) REFERENCES Commandes(ID) ON DELETE CASCADE,
    FOREIGN KEY fk_type_produit(idTypeProduit) REFERENCES Type_Produit(ID) ON DELETE CASCADE,
    FOREIGN KEY fk_fournisseur(idFournisseur) REFERENCES Fournisseur(ID) ON DELETE CASCADE
);

CREATE TABLE Commentaire(
	ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    date_commentaire DATE,
    contenu TEXT,
    idCompte INT,
    idTypeProduit INT,
    FOREIGN KEY fk_compte(idCompte) REFERENCES Compte(ID) ON DELETE CASCADE,
    FOREIGN KEY fk_type_produit(idTypeProduit) REFERENCES Type_Produit(ID) ON DELETE CASCADE

);

CREATE TABLE Categorie_de_produit(
   ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
   Categorie VARCHAR(50) NOT NULL,
   idTypeProduit INT
);

CREATE TABLE Type_Produit(
	ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nom VARCHAR(50),
	prix DECIMAL(15,2),
	poids INT,
	Descriptif_produit TEXT,
	note DECIMAL(5,1),
	UNIQUE(nom)
);
SELECT * FROM Type_Produit;

CREATE TABLE Etre_Dans_Panier(
	ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    idCompte INT,
    idTypeProduit INT,
    FOREIGN KEY fk_compte(idCompte) REFERENCES Compte(ID) ON DELETE CASCADE,
    FOREIGN KEY fk_type_produit(idTypeProduit) REFERENCES Type_Produit(ID) ON DELETE CASCADE
);

CREATE TABLE Produit_Categorie(
	ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	idTypeProduit INT,
    idCategorie INT,
	FOREIGN KEY fk_categorie(idCategorie) REFERENCES Categorie_de_produit(ID) ON DELETE CASCADE,
	FOREIGN KEY fk_type_produit(idTypeProduit) REFERENCES Type_Produit(ID) ON DELETE CASCADE
);
DELETE
FROM Type_Produit
WHERE nom = 'Health_Potion';

INSERT INTO Type_Produit (nom,prix,poids,Descriptif_produit,note) VALUES ("Health_Potion",12.6,500,"potion de soin",2.5);

INSERT INTO Type_Produit (nom,prix,poids,Descriptif_produit,note) VALUES ("Refillable_Potion",12.6,500,"potion de shimmer	",2.5);

INSERT INTO Type_Produit (nom,prix,poids,Descriptif_produit,note) VALUES ("Corrupting_Potion",12.6,500,"potion de shimmer",2.5);

INSERT INTO Type_Produit (nom,prix,poids,Descriptif_produit,note) VALUES ("Elixir_of_Iron",12.6,500,"potion de shimmer",2.5);

INSERT INTO Type_Produit (nom,prix,poids,Descriptif_produit,note) VALUES ("Elixir_of_Sorcery",12.6,500,"potion de shimmer",2.5);

INSERT INTO Type_Produit (nom,prix,poids,Descriptif_produit,note) VALUES ("Oracle_s_Extract",12.6,500,"potion de shimmer",2.5);

INSERT INTO Type_Produit (nom,prix,poids,Descriptif_produit,note) VALUES ("Elixir_of_Wrath",12.6,500,"potion de shimmer",2.5);

INSERT INTO Type_Produit (nom,prix,poids,Descriptif_produit,note) VALUES ("Insanity_Potion",12.6,500,"potion de shimmer",2.5);

INSERT INTO Type_Produit (nom,prix,poids,Descriptif_produit,note) VALUES ("Mana_Potion",12.6,500,"potion de shimmer",2.5);


INSERT INTO Categorie_de_produit (Categorie) VALUES ("shimer");

INSERT INTO Categorie_de_produit (Categorie) VALUES ("figurine");

INSERT INTO Categorie_de_produit (Categorie) VALUES ("jeux");

INSERT INTO Categorie_de_produit (Categorie) VALUES ("champinion");

INSERT INTO Categorie_de_produit (Categorie) VALUES ("hextech");

INSERT INTO Categorie_de_produit (Categorie) VALUES ("chemtech");

SELECT *
FROM Categorie_de_produit;

SELECT * FROM Compte;