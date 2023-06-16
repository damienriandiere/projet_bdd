<?php
class Facture {
    private $id_facture;
    private $nom;
    private $dateFacture;
    private $FraisService;
    private $dateUpdate;
    private $valider;
    private $prix;
    private $remise;

    public function __construct() {}
    
    public function init($id_facture, $dateFacture, $nom, $valider, $FraisService, $dateUpdate) {
        $this->id_facture = $id_facture;
        $this->dateFacture = $dateFacture;
        $this->nom = $nom;
        $this->valider = $valider;
        $this->FraisService = $FraisService;
        $this->dateUpdate = $dateUpdate;

    }
    
    public function getId_facture() {
        return $this->id_facture;
    }

    public function getDateFacture() {
        return $this->dateFacture;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getValider() {
        return $this->valider;
    }

    public function getFraisService() {
        return $this->FraisService;
    }

    public function getDateUpdate() {
        return $this->dateUpdate;
    }

    public function setId_facture($id_facture) {
        $this->id_facture = $id_facture;
    }

    public function setDateFacture($dateFacture) {
        $this->dateFacture = $dateFacture;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setValider($valider) {
        $this->valider = $valider;
    }

    public function setFraisService($FraisService) {
        $this->FraisService = $FraisService;
    }

    public function setDateUpdate($dateUpdate) {
        $this->dateUpdate = $dateUpdate;
    }

    public function getPrix() {
        return $this->prix;
    }

    public function getRemise() {
        return $this->remise;
    }

    public function __toString() {
        return json_encode($this);
    }



}
?>