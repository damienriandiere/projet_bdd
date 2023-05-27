<?php
class Fournisseur {

    private $id_Fournisseur;
    private $nom;
    private $email;
    private $telephone;
    private $adresse;
    private $libelle;
    
    public function __construct() {}

    public function init($id_Fournisseur, $nom, $email, $telephone, $adresse, $libelle) {
        $this->id_Fournisseur = $id_Fournisseur;
        $this->nom = $nom;
        $this->email = $email;
        $this->telephone = $telephone;
        $this->adresse = $adresse;
        $this->libelle = $libelle;
    }

    public function getId_Fournisseur() {
        return $this->id_Fournisseur;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getTelephone() {
        return $this->telephone;
    }

    public function getAdresse() {
        return $this->adresse;
    }

    public function getLibelle() {
        return $this->libelle;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setTelephone($telephone) {
        $this->telephone = $telephone;
    }

    public function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    public function setLibelle($libelle) {
        $this->libelle = $libelle;
    }

    public function __toString()
    {
        return json_encode($this);
    }
}
?>
