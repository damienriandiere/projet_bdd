<?php
class Telephone {
    
    private $id_telephone;
    private $numero;
    
    function __construct() {
        
    }

    function init($id_telephone, $numero) {
        $this->id_telephone = $id_telephone;
        $this->numero = $numero;
    }

    function getId_telephone() {
        return $this->id_telephone;
    }

    function getNumero() {
        return $this->numero;
    }

    function setId_telephone($id_telephone) {
        $this->id_telephone = $id_telephone;
    }

    function setNumero($numero) {
        $this->numero = $numero;
    }

    public function __toString() {
        return "id_telephone: ".$this->id_telephone." numero: ".$this->numero;
    }

}

?>