CREATE TABLE Groupe(
   nomGrp VARCHAR(50),
   PRIMARY KEY(nomGrp)
);

CREATE TABLE Musicien(
   idM SMALLINT,
   nomM VARCHAR(50),
   prenomM VARCHAR(50),
   nomSceneM VARCHAR(50),
   roleM VARCHAR(50),
   PRIMARY KEY(idM)
);

CREATE TABLE Chanson(
   idC SMALLINT,
   titreChanson VARCHAR(50),
   dateChanson DATE,
   genreChanson VARCHAR(50),
   nomGrp VARCHAR(50) NOT NULL,
   PRIMARY KEY(idC),
   FOREIGN KEY(nomGrp) REFERENCES Groupe(nomGrp)
);

CREATE TABLE Version(
   idC SMALLINT,
   numV SMALLINT,
   dureeV TIME,
   dateV DATE,
   nomFichierV VARCHAR(50),
   PRIMARY KEY(idC, numV),
   FOREIGN KEY(idC) REFERENCES Chanson(idC)
);

CREATE TABLE Album(
   idA SMALLINT,
   titreAlbum VARCHAR(50),
   dateSortieA DATE,
   producteurA VARCHAR(50),
   PRIMARY KEY(idA)
);

CREATE TABLE Playlist(
   idPlay SMALLINT,
   titrePlay VARCHAR(50),
   datePlay DATE,
   PRIMARY KEY(idPlay)
);

CREATE TABLE AlbumLive(
   idAL SMALLINT,
   concertAL VARCHAR(50),
   idA SMALLINT NOT NULL,
   PRIMARY KEY(idAL),
   UNIQUE(idA),
   FOREIGN KEY(idA) REFERENCES Album(idA)
);

CREATE TABLE AlbumCompilation(
   idAC SMALLINT,
   descripAC TEXT,
   idA SMALLINT NOT NULL,
   PRIMARY KEY(idAC),
   UNIQUE(idA),
   FOREIGN KEY(idA) REFERENCES Album(idA)
);

CREATE TABLE AlbumStudio(
   idAS SMALLINT,
   nomIngeSon VARCHAR(50),
   idA SMALLINT NOT NULL,
   PRIMARY KEY(idAS),
   UNIQUE(idA),
   FOREIGN KEY(idA) REFERENCES Album(idA)
);

CREATE TABLE Lieu(
   idL SMALLINT,
   nomLieu VARCHAR(50),
   coordLong INT,
   coordLat VARCHAR(50),
   PRIMARY KEY(idL)
);

CREATE TABLE Genre(
   idG SMALLINT,
   nomGenre VARCHAR(50),
   PRIMARY KEY(idG)
);

CREATE TABLE Periode(
   idP SMALLINT,
   dateDebut DATE,
   dateFin DATE,
   PRIMARY KEY(idP)
);

CREATE TABLE DateConcert(
   idDC SMALLINT,
   jourConcert DATE,
   PRIMARY KEY(idDC)
);

CREATE TABLE RelationChanson(
   idRC SMALLINT,
   typeChanson VARCHAR(50),
   PRIMARY KEY(idRC)
);

CREATE TABLE Appartenir(
   nomGrp VARCHAR(50),
   idM SMALLINT,
   idP SMALLINT,
   fondateurM BOOLEAN, --c'était logical mais pas pris en compte par mariadb
   PRIMARY KEY(nomGrp, idM, idP),
   FOREIGN KEY(nomGrp) REFERENCES Groupe(nomGrp),
   FOREIGN KEY(idM) REFERENCES Musicien(idM),
   FOREIGN KEY(idP) REFERENCES Periode(idP)
);

CREATE TABLE Enregistrer(
   nomGrp VARCHAR(50),
   idA SMALLINT,
   comCollab VARCHAR(50),
   PRIMARY KEY(nomGrp, idA),
   FOREIGN KEY(nomGrp) REFERENCES Groupe(nomGrp),
   FOREIGN KEY(idA) REFERENCES Album(idA)
);

CREATE TABLE Contenir(
   idC SMALLINT,
   numV SMALLINT,
   idPlay SMALLINT,
   PRIMARY KEY(idC, numV, idPlay),
   FOREIGN KEY(idC, numV) REFERENCES Version(idC, numV),
   FOREIGN KEY(idPlay) REFERENCES Playlist(idPlay)
);

CREATE TABLE Posseder(
   idC SMALLINT,
   numV SMALLINT,
   idA SMALLINT,
   PRIMARY KEY(idC, numV, idA),
   FOREIGN KEY(idC, numV) REFERENCES Version(idC, numV),
   FOREIGN KEY(idA) REFERENCES Album(idA)
);

CREATE TABLE Jouer(
   idAL SMALLINT,
   idL SMALLINT,
   idDC SMALLINT,
   PRIMARY KEY(idAL, idL, idDC),
   FOREIGN KEY(idAL) REFERENCES AlbumLive(idAL),
   FOREIGN KEY(idL) REFERENCES Lieu(idL),
   FOREIGN KEY(idDC) REFERENCES DateConcert(idDC)
);

CREATE TABLE estRelie(
   idC SMALLINT,
   idC_1 SMALLINT,
   idRC SMALLINT,
   PRIMARY KEY(idC, idC_1, idRC),
   FOREIGN KEY(idC) REFERENCES Chanson(idC),
   FOREIGN KEY(idC_1) REFERENCES Chanson(idC),
   FOREIGN KEY(idRC) REFERENCES RelationChanson(idRC)
);

CREATE TABLE Categoriser(
   idC SMALLINT,
   idG SMALLINT,
   PRIMARY KEY(idC, idG),
   FOREIGN KEY(idC) REFERENCES Chanson(idC),
   FOREIGN KEY(idG) REFERENCES Genre(idG)
);

CREATE TABLE estSousGenreDe(
   idG SMALLINT,
   idG_1 SMALLINT,
   PRIMARY KEY(idG, idG_1),
   FOREIGN KEY(idG) REFERENCES Genre(idG),
   FOREIGN KEY(idG_1) REFERENCES Genre(idG)
);

CREATE TABLE estActif(
   nomGrp VARCHAR(50),
   idP SMALLINT,
   PRIMARY KEY(nomGrp, idP),
   FOREIGN KEY(nomGrp) REFERENCES Groupe(nomGrp),
   FOREIGN KEY(idP) REFERENCES Periode(idP)
);
