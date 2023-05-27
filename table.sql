use ENSIM;

-- faire un drop table si elle existe


Drop table if exists Paye;
Drop table if exists Fabrique;
Drop table if exists EstLie_Membre_Regle;
Drop table if exists Valider;
Drop table if exists Log;
Drop table if exists TypeAction;
Drop table if exists Concierge;
Drop table if exists Contient;
Drop table if exists FactureCommande;
Drop table if exists Remise;
Drop table if exists Facture;
Drop table if exists Commande;
Drop table if exists Produit;
Drop table if exists Fournisseur;
Drop table if exists Payement;
Drop table if exists TypePayement;
Drop table if exists Point;
Drop table if exists Client;
Drop table if exists HistoriquePoint;
Drop table if exists TypeOperation;
Drop table if exists TypeRegle;
Drop table if exists Membre;
Drop table if exists TypeMembre;
Drop table if exists Telephone;
Drop table if exists Adresse;



-- Create table adresse
CREATE TABLE Adresse (
  id_adresse int(11) NOT NULL AUTO_INCREMENT,
  rue varchar(255) NOT NULL,
  code_postal varchar(255) NOT NULL,
  PRIMARY KEY (id_adresse)
);

-- Create table Telephone
CREATE TABLE Telephone (
  id_telephone int(11) NOT NULL AUTO_INCREMENT,
  numero varchar(13) NOT NULL,
  PRIMARY KEY (id_telephone)
);

-- Create table TypeMembre
CREATE TABLE TypeMembre (
  id_type_membre int(11) NOT NULL AUTO_INCREMENT,
  libelle varchar(255) NOT NULL,
  PRIMARY KEY (id_type_membre)
);

-- Create table Membre
CREATE TABLE Membre (
  id_membre int(11) NOT NULL AUTO_INCREMENT,
  description varchar(255) NOT NULL,
  dateMembre date NOT NULL,
  pointMin int(11) NOT NULL,
  pointMax int(11) NOT NULL,
  seuil int(11) NOT NULL,
  id_type_membre int(11) NOT NULL,
  PRIMARY KEY (id_membre),
  KEY fk_type_membre (id_type_membre),
  CONSTRAINT fk_type_membre FOREIGN KEY (id_type_membre) REFERENCES TypeMembre (id_type_membre)
);

-- Create table TypeRegle 
CREATE TABLE TypeRegle (
  id_type_regle int(11) NOT NULL AUTO_INCREMENT,
  libelle varchar(255) NOT NULL,
  nombre_points int(11) NOT NULL,
  date date NOT NULL,
  valeur int(11) NOT NULL,
  PRIMARY KEY (id_type_regle)
);

-- Create table TypeOperation
CREATE TABLE TypeOperation (
  id_type_operation int(11) NOT NULL AUTO_INCREMENT,
  type_operation varchar(255) NOT NULL,
  nombre_Points int(11) NOT NULL,
  libelle varchar(255) NOT NULL,
  id_type_regle int(11) NOT NULL,
  PRIMARY KEY (id_type_operation),
  KEY fk_type_regle (id_type_regle),
  CONSTRAINT fk_type_regle FOREIGN KEY (id_type_regle) REFERENCES TypeRegle (id_type_regle)
);

-- Create table HistoriquePoint
CREATE TABLE HistoriquePoint (
  id_historique_point int(11) NOT NULL AUTO_INCREMENT,
  date date NOT NULL,
  description varchar(255) NOT NULL,
  id_type_regle int(11) NOT NULL,
  PRIMARY KEY (id_historique_point),
  KEY fk_type_regle_histo (id_type_regle),
  CONSTRAINT fk_type_regle_histo FOREIGN KEY (id_type_regle) REFERENCES TypeRegle (id_type_regle)
);


-- Create table Client
CREATE TABLE Client (
  id_client int(11) NOT NULL AUTO_INCREMENT,
  nom varchar(255) NOT NULL,
  prenom varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  dateNaissance date NOT NULL,
  noBancaire varchar(255) NOT NULL,
  website varchar(255) NOT NULL,
  facebook varchar(255) NOT NULL,
  actif BOOLEAN NOT NULL,
  description varchar(255) NOT NULL,
  id_adresse int(11) NOT NULL,
  id_telephone int(11) NOT NULL,
  id_membre int(11),
  PRIMARY KEY (id_client),
  KEY fk_adresse (id_adresse),
  KEY fk_telephone (id_telephone),
  KEY fk_membre (id_membre),
  CONSTRAINT fk_adresse FOREIGN KEY (id_adresse) REFERENCES Adresse (id_adresse),
  CONSTRAINT fk_telephone FOREIGN KEY (id_telephone) REFERENCES Telephone (id_telephone),
  CONSTRAINT fk_membre FOREIGN KEY (id_membre) REFERENCES Membre (id_membre)
);

-- Create table Points
CREATE TABLE Point (
  id_point int(11) NOT NULL AUTO_INCREMENT,
  nombrePoint int(11) NOT NULL,
  date date NOT NULL,
  id_client int(11) NOT NULL,
  KEY fk_client (id_client),
  CONSTRAINT fk_client FOREIGN KEY (id_client) REFERENCES Client (id_client),
  PRIMARY KEY (id_point)
);

-- Create table TypePayement
CREATE TABLE TypePayement (
  id_type_payement int(11) NOT NULL AUTO_INCREMENT,
  libelle varchar(255) NOT NULL,
  PRIMARY KEY (id_type_payement)
);

-- Create table Payement
CREATE TABLE Payement (
  id_payement int(11) NOT NULL AUTO_INCREMENT,
  montant float(9,2) NOT NULL,
  datePayement date NOT NULL,
  id_type_payement int(11) NOT NULL,
  PRIMARY KEY (id_payement),
  KEY fk_type_payement (id_type_payement),
  CONSTRAINT fk_type_payement FOREIGN KEY (id_type_payement) REFERENCES TypePayement (id_type_payement)
);

-- Create table Fournisseur
CREATE TABLE Fournisseur (
  id_fournisseur int(11) NOT NULL AUTO_INCREMENT,
  nom varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  libelle varchar(255) NOT NULL,
  adresse varchar(255) NOT NULL,
  telephone varchar(12) NOT NULL,
  PRIMARY KEY (id_fournisseur)
);

-- Create table Produit
CREATE TABLE Produit (
  id_produit int(15) NOT NULL AUTO_INCREMENT,
  nom varchar(255) NOT NULL,
  description varchar(255) NOT NULL,
  prix float(9,2) NOT NULL,
  stock int(5) NOT NULL,
  statut varchar(255) NOT NULL,
  PRIMARY KEY (id_produit)
);

-- Create table Commande
CREATE TABLE Commande (
  id_commande int(11) NOT NULL AUTO_INCREMENT,
  dateCommande date NOT NULL,
  id_client int(11) NOT NULL,
  dateReception date NOT NULL,
  statut varchar(255) NOT NULL,
  PRIMARY KEY (id_commande),
  KEY fk_client_com (id_client),
  CONSTRAINT fk_client_com FOREIGN KEY (id_client) REFERENCES Client (id_client)
);

-- Create table Facture
CREATE TABLE Facture (
  id_facture int(11) NOT NULL AUTO_INCREMENT,
  nom varchar(255) NOT NULL,
  dateFacture date NOT NULL,
  FraisService float(9,2) NOT NULL,
  dateUpdate date NOT NULL,
  valider BOOLEAN NOT NULL,
  PRIMARY KEY (id_facture)
);

Create table Remise (
  id_remise int(11) NOT NULL AUTO_INCREMENT,
  dateRemise date NOT NULL,
  montant float(9,2) NOT NULL,
  id_facture int(11) NOT NULL,
  id_historique_point int(11) NOT NULL,
  PRIMARY KEY (id_remise),
  KEY fk_facture (id_facture),
  CONSTRAINT fk_facture FOREIGN KEY (id_facture) REFERENCES Facture (id_facture),
  KEY fk_historique_point (id_historique_point),
  CONSTRAINT fk_historique_point FOREIGN KEY (id_historique_point) REFERENCES HistoriquePoint (id_historique_point)
);

Create table FactureCommande(
  id_facture int(11) NOT NULL,
  id_commande int(11) NOT NULL,
  PRIMARY KEY (id_facture, id_commande),
  KEY fk_facture_FC (id_facture),
  CONSTRAINT fk_facture_FC FOREIGN KEY (id_facture) REFERENCES Facture (id_facture),
  KEY fk_commande_FC (id_commande),
  CONSTRAINT fk_commande_FC FOREIGN KEY (id_commande) REFERENCES Commande (id_commande)
);

Create table Contient(
  id_contient int(11) NOT NULL AUTO_INCREMENT,
  id_commande int(11) NOT NULL,
  id_produit int(11),
  quantite int(11) NOT NULL,
  status varchar(255) NOT NULL,
  remarque varchar(255) NOT NULL,
  prixVente float(9,2) NOT NULL,
  dateLivraison date NOT NULL,
  PRIMARY KEY (id_contient),
  KEY fk_commande_Contient (id_commande),
  CONSTRAINT fk_commande_Contient FOREIGN KEY (id_commande) REFERENCES Commande (id_commande),
  KEY fk_produit_Contient (id_produit),
  CONSTRAINT fk_produit_Contient FOREIGN KEY (id_produit) REFERENCES Produit (id_produit)
);

Create table Concierge(
  id_concierge int(11) NOT NULL AUTO_INCREMENT,
  nom varchar(255) NOT NULL,
  prenom varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  login varchar(255) NOT NULL,
  password varchar(255) NOT NULL,
  actif BOOLEAN NOT NULL,
  telephone varchar(255) NOT NULL,
  PRIMARY KEY (id_concierge)
);

CREATE table TypeAction (
  id_type_action int(11) NOT NULL AUTO_INCREMENT,
  libelle varchar(255) NOT NULL,
  date date NOT NULL,
  PRIMARY KEY (id_type_action)
);

Create table Log (
  id_log int(11) NOT NULL AUTO_INCREMENT,
  date date NOT NULL,
  url varchar(255) NOT NULL,
  objetModifie varchar(255) NOT NULL,
  idObjetModifie int(11) NOT NULL,
  id_concierge int(11) NOT NULL,
  PRIMARY KEY (id_log),
  KEY fk_concierge (id_concierge),
  CONSTRAINT fk_concierge FOREIGN KEY (id_concierge) REFERENCES Concierge (id_concierge),
  id_type_action int(11) NOT NULL,
  KEY fk_type_action (id_type_action),
  CONSTRAINT fk_type_action FOREIGN KEY (id_type_action) REFERENCES TypeAction (id_type_action)
);

Create table Valider(
  id_commande int(11) NOT NULL,
  id_concierge int(11) NOT NULL,
  dateAcces date NOT NULL,
  dateMaj date NOT NULL,
  PRIMARY KEY (id_commande, id_concierge),
  KEY fk_commande_v (id_commande),
  CONSTRAINT fk_commande_v FOREIGN KEY (id_commande) REFERENCES Commande (id_commande),
  KEY fk_concierge_v (id_concierge),
  CONSTRAINT fk_concierge_v FOREIGN KEY (id_concierge) REFERENCES Concierge (id_concierge)
);

Create table Paye (
  id_paye int(11) NOT NULL AUTO_INCREMENT,
  id_facture int(11) NOT NULL,
  id_payement int(11) NOT NULL,
  PRIMARY KEY (id_paye),
  KEY fk_facture_p (id_facture),
  CONSTRAINT fk_facture_p FOREIGN KEY (id_facture) REFERENCES Facture (id_facture),
  KEY fk_payement_p (id_payement),
  CONSTRAINT fk_payement_p FOREIGN KEY (id_payement) REFERENCES Payement (id_payement)
);

Create table Fabrique (
  id_fabrique int(11) NOT NULL AUTO_INCREMENT,
  id_produit int(11) NOT NULL,
  id_fournisseur int(11) NOT NULL,
  PRIMARY KEY (id_fabrique),
  KEY fk_produit_f (id_produit),
  CONSTRAINT fk_produit_f FOREIGN KEY (id_produit) REFERENCES Produit (id_produit),
  KEY fk_fournisseur_f (id_fournisseur),
  CONSTRAINT fk_fournisseur_f FOREIGN KEY (id_fournisseur) REFERENCES Fournisseur (id_fournisseur)
);

CREATE TABLE EstLie_Membre_Regle (
  id_type_membre int(11) NOT NULL,
  id_type_regle int(11) NOT NULL,
  PRIMARY KEY (id_type_membre, id_type_regle),
  KEY fk_estlie_membre_regle_membre (id_type_membre),
  CONSTRAINT fk_estlie_membre_regle_membre FOREIGN KEY (id_type_membre) REFERENCES TypeMembre (id_type_membre),
  KEY fk_estlie_membre_regle_regle (id_type_regle),
  CONSTRAINT fk_estlie_membre_regle_regle FOREIGN KEY (id_type_regle) REFERENCES TypeRegle (id_type_regle)
);

