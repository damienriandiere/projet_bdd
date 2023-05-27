<?php
class Remise {

    private $id_remise;
    private $dateRemise;
    private $montant;
    private $id_facture;
    private $id_historique_point;

    public function __construct() {}

    public function init($id_remise, $dateRemise, $montant, $id_facture, $id_historique_point) {
        $this->id_remise = $id_remise;
        $this->dateRemise = $dateRemise;
        $this->montant = $montant;
        $this->id_facture = $id_facture;
        $this->id_historique_point = $id_historique_point;
    }

    public function getId_remise() {
        return $this->id_remise;
    }

    public function getDateRemise() {
        return $this->dateRemise;
    }

    public function getMontant() {
        return $this->montant;
    }

    public function getId_facture() {
        return $this->id_facture;
    }

    public function getId_historique_point() {
        return $this->id_historique_point;
    }

    public function setDateRemise($dateRemise) {
        $this->dateRemise = $dateRemise;
    }

    public function setMontant($montant) {
        $this->montant = $montant;
    }

    public function setId_facture($id_facture) {
        $this->id_facture = $id_facture;
    }

    public function setId_historique_point($id_historique_point) {
        $this->id_historique_point = $id_historique_point;
    }

    public function __toString()
    {
        return json_encode($this);
    }
}
?>