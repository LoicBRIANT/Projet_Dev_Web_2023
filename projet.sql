USE myDB;


DROP TABLE IF EXISTS Type_Produit;


CREATE TABLE Categorie_de_produit(
   Id INTEGER,
   Categorie VARCHAR(50) NOT NULL,
   PRIMARY KEY(Id)
);

CREATE TABLE films(
	ID INT NOT NULL AUTO_INCREMENT,
    nom CHAR(20),
    dateFilm date,
    commentaire CHAR (100),    
    PRIMARY KEY (ID)
);

CREATE TABLE Type_Produit(
	ID INT NOT NULL AUTO_INCREMENT,
	nom VARCHAR(50),
	prix FLOAT NOT NULL,
	poids INT,
	Descriptif_produit TEXT,
	note DECIMAL(15,2),
	PRIMARY KEY(ID),
	UNIQUE(nom)
);
SELECT * FROM Type_Produit;


DELETE
FROM Type_Produit
WHERE nom = 'Health_Potion';

INSERT INTO Type_Produit (nom,prix,poids,Descriptif_produit,note) VALUES ("Health_Potion",12.6,500,"potion de soin",2.5);

INSERT INTO Type_Produit (nom,prix,poids,Descriptif_produit,note) VALUES ("Refillable_Potion",12.6,500,"potion de shimmer",2.5);

INSERT INTO Type_Produit (nom,prix,poids,Descriptif_produit,note) VALUES ("Corrupting_Potion",12.6,500,"potion de shimmer",2.5);

INSERT INTO Type_Produit (nom,prix,poids,Descriptif_produit,note) VALUES ("Elixir_of_Iron",12.6,500,"potion de shimmer",2.5);

INSERT INTO Type_Produit (nom,prix,poids,Descriptif_produit,note) VALUES ("Elixir_of_Sorcery",12.6,500,"potion de shimmer",2.5);

INSERT INTO Type_Produit (nom,prix,poids,Descriptif_produit,note) VALUES ("Oracle_s_Extract",12.6,500,"potion de shimmer",2.5);

INSERT INTO Type_Produit (nom,prix,poids,Descriptif_produit,note) VALUES ("Elixir_of_Wrath",12.6,500,"potion de shimmer",2.5);

INSERT INTO Type_Produit (nom,prix,poids,Descriptif_produit,note) VALUES ("Insanity_Potion",12.6,500,"potion de shimmer",2.5);

INSERT INTO Type_Produit (nom,prix,poids,Descriptif_produit,note) VALUES ("Mana_Potion",12.6,500,"potion de shimmer",2.5);


INSERT INTO Categorie_de_produit VALUES (1,"shimer");

INSERT INTO Categorie_de_produit VALUES (2,"figurine");

INSERT INTO Categorie_de_produit VALUES (3,"jeux");

INSERT INTO Categorie_de_produit VALUES (4,"champinion");

INSERT INTO Categorie_de_produit VALUES (5,"hextech");

INSERT INTO Categorie_de_produit VALUES (6,"chemtech");

SELECT *
FROM Categorie_de_produit;