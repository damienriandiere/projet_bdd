<?php
class Fabrique {
    private $id_fabrique;
    private $id_produit;
    private $id_fournisseur;

    public function __construct() {
    }
    
    public function init($id_fabrique = null, $id_produit = null, $id_fournisseur = null) {
        $this->id_fabrique = $id_fabrique;
        $this->id_produit = $id_produit;
        $this->id_fournisseur = $id_fournisseur;
    }
    
    public function getId_fabrique() {
        return $this->id_fabrique;
    }

    public function getId_produit() {
        return $this->id_produit;
    }

    public function getId_fournisseur() {
        return $this->id_fournisseur;
    }

    public function setId_produit($id_produit) {
        $this->id_produit = $id_produit;
    }

    public function setId_fournisseur($id_fournisseur) {
        $this->id_fournisseur = $id_fournisseur;
    }
}
?>