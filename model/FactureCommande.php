<?php
class FactureCommande {
    private $id_facture;
    private $id_commande;
    
    public function __construct() {}
    
    public function init($id_facture, $id_commande) {
        $this->id_facture = $id_facture;
        $this->id_commande = $id_commande;
    }
    
    public function getId_facture() {
        return $this->id_facture;
    }

    public function getId_commande() {
        return $this->id_commande;
    }

    public function setId_facture($id_facture) {
        $this->id_facture = $id_facture;
    }

    public function setId_commande($id_commande) {
        $this->id_commande = $id_commande;
    }

    public function __toString()
    {
        return json_encode($this);
    }
}
?>

