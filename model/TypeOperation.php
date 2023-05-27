<?php
class TypeOperation {
    
        private $id_type_operation;
        private $type_operation;
        private $nombre_Point;
        private $libelle;
        private $id_type_regle;
        
        public function __construct() {}
    
        public function init($id_type_operation, $type_operation, $nombre_Point, $libelle, $id_type_regle) {
            $this->id_type_operation = $id_type_operation;
            $this->type_operation = $type_operation;
            $this->nombre_Point = $nombre_Point;
            $this->libelle = $libelle;
            $this->id_type_regle = $id_type_regle;
        }
    
        public function getId_type_operation() {
            return $this->id_type_operation;
        }
    
        public function getType_operation() {
            return $this->type_operation;
        }
    
        public function getNombre_Point() {
            return $this->nombre_Point;
        }
    
        public function getLibelle() {
            return $this->libelle;
        }
    
        public function getId_type_regle() {
            return $this->id_type_regle;
        }
    
        public function setType_operation($type_operation) {
            $this->type_operation = $type_operation;
        }
    
        public function setNombre_Point($nombre_Point) {
            $this->nombre_Point = $nombre_Point;
        }
    
        public function setLibelle($libelle) {
            $this->libelle = $libelle;
        }
    
        public function setId_type_regle($id_type_regle) {
            $this->id_type_regle = $id_type_regle;
        }
    
        public function __toString()
        {
            return json_encode($this);
        }
}
?>