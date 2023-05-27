<?php
class Contient {
    private $id_contient;
    private $id_commande;
    private $id_produit;
    private $quantite;
    private $status;
    private $remarque;
    private $prixVente;
    private $dateLivraison;

    public function __construct() {
        
    }

    public function init($id_contient, $id_commande, $id_produit, $quantite, $status, $remarque, $prixVente, $dateLivraison) {
        $this->id_contient = $id_contient;
        $this->id_commande = $id_commande;
        $this->id_produit = $id_produit;
        $this->quantite = $quantite;
        $this->status = $status;
        $this->remarque = $remarque;
        $this->prixVente = $prixVente;
        $this->dateLivraison = $dateLivraison;
    }

    public function getId_contient() {
        return $this->id_contient;
    }

    public function getId_commande() {
        return $this->id_commande;
    }

    public function getId_produit() {
        return $this->id_produit;
    }

    public function getQuantite() {
        return $this->quantite;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getRemarque() {
        return $this->remarque;
    }

    public function getPrixVente() {
        return $this->prixVente;
    }

    public function getDateLivraison() {
        return $this->dateLivraison;
    }

    public function setId_commande($id_commande) {
        $this->id_commande = $id_commande;
    }

    public function setId_produit($id_produit) {
        $this->id_produit = $id_produit;
    }

    public function setQuantite($quantite) {
        $this->quantite = $quantite;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function setRemarque($remarque) {
        $this->remarque = $remarque;
    }

    public function setPrixVente($prixVente) {
        $this->prixVente = $prixVente;
    }

    public function setDateLivraison($dateLivraison) {
        $this->dateLivraison = $dateLivraison;
    }

    public function __toString() {
        return json_encode($this);
    }
}
?>
