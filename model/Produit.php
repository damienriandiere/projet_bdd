<?php
class Produit {
    
    private $id_produit;
    private $nom;
    private $description;
    private $prix;
    private $stock;
    private $status;
    
    public function __construct() {}

    public function init($id_produit, $nom, $description, $prix, $stock, $status) {
        $this->id_produit = $id_produit;
        $this->nom = $nom;
        $this->description = $description;
        $this->prix = $prix;
        $this->stock = $stock;
        $this->status = $status;
    }

    public function getId_produit() {
        return $this->id_produit;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getDescription() {
        return $this->description;
    }
    
    public function getPrix() {
        return $this->prix;
    }

    public function getStock() {
        return $this->stock;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setDescription($description) {
        $this->description = $description;
    }
    
    public function setPrix($prix) {
        $this->prix = $prix;
    }

    public function setStock($stock) {
        $this->stock = $stock;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function __toString()
    {
        return json_encode($this);
    }
}
?>