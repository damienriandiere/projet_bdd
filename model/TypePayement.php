<?php
class TypePayement {
    
    private $id_type_payement;
    private $libelle;
    
    public function __construct() {}

    public function init($id_type_payement, $libelle) {
        $this->id_type_payement = $id_type_payement;
        $this->libelle = $libelle;
    }

    public function getId_type_payement() {
        return $this->id_type_payement;
    }

    public function getLibelle() {
        return $this->libelle;
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