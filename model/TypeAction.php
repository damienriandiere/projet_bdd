<?php
class TypeAction {
        
        private $id_type;
        private $libelle;
        private $date;
        
        function __construct() {
            
        }
    
        function init($id_type, $libelle, $date) {
            $this->id_type = $id_type;
            $this->libelle = $libelle;
            $this->date = $date;
        }
    
        function getId_type() {
            return $this->id_type;
        }
    
        function getLibelle() {
            return $this->libelle;
        }
    
        function getDate() {
            return $this->date;
        }
    
        function setLibelle($libelle) {
            $this->libelle = $libelle;
        }
    
        function setDate($date) {
            $this->date = $date;
        }
    
        public function __toString() {
            return json_encode($this);
        }
}

?>