<?php
class TypeMembre {
    
    private $id_type_membre;
    private $libelle;
    
    function __construct() {
        
    }

    function init($id_type_membre, $libelle) {
        $this->id_type_membre = $id_type_membre;
        $this->libelle = $libelle;
    }

    function getId_type_membre() {
        return $this->id_type_membre;
    }

    function getLibelle() {
        return $this->libelle;
    }

    function setLibelle($libelle) {
        $this->libelle = $libelle;
    }

    public function __toString() {
        return json_encode($this);
    }

}

?>