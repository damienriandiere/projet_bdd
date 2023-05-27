<?php
//faire la classe Paye avec comme attributs id_paye, id_facture, id_payement
class Paye {
    private $id_paye;
    private $id_facture;
    private $id_payement;

    public function __construct() {
    }
    
    public function init($id_paye = null, $id_facture = null, $id_payement = null) {
        $this->id_paye = $id_paye;
        $this->id_facture = $id_facture;
        $this->id_payement = $id_payement;
    }
    
    public function getId_paye() {
        return $this->id_paye;
    }

    public function getId_facture() {
        return $this->id_facture;
    }

    public function getId_payement() {
        return $this->id_payement;
    }

    public function setId_facture($id_facture) {
        $this->id_facture = $id_facture;
    }

    public function setId_payement($id_payement) {
        $this->id_payement = $id_payement;
    }
}
?>