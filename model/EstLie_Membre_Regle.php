<?php
class EstLie_Membre_Regle {
    private $id_type_membre;
    private $id_type_regle;

    public function __construct() {
    }
    
    public function init($id_type_membre = null, $id_type_regle = null) {
        $this->id_type_membre = $id_type_membre;
        $this->id_type_regle = $id_type_regle;
    }
    
    public function getId_type_membre() {
        return $this->id_type_membre;
    }

    public function getId_type_regle() {
        return $this->id_type_regle;
    }
}
?>
