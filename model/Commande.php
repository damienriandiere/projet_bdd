<?php

class Commande {

    private $id_commande;
    private $dateCommande;
    private $id_client;
    private $dateReception;
    private $statut;

    public function __construct() {
        
    }

    public function init($id_commande, $dateCommande, $id_client, $dateReception, $statut) {
        $this->id_commande = $id_commande;
        $this->dateCommande = $dateCommande;
        $this->id_client = $id_client;
        $this->dateReception = $dateReception;
        $this->statut = $statut;
    }

    public function getId_commande() {
        return $this->id_commande;
    }

    public function getDateCommande() {
        return $this->dateCommande;
    }

    public function getId_client() {
        return $this->id_client;
    }

    public function getDateReception() {
        return $this->dateReception;
    }

    public function getStatut() {
        return $this->statut;
    }

    public function setDateCommande($dateCommande) {
        $this->dateCommande = $dateCommande;
    }

    public function setId_client($id_client) {
        $this->id_client = $id_client;
    }

    public function setDateReception($dateReception) {
        $this->dateReception = $dateReception;
    }

    public function setStatut($statut) {
        $this->statut = $statut;
    }

    public function __toString() {
        return json_encode($this);
    }
}

?>