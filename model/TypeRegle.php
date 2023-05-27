<?php
class TypeRegle {
        
        private $id_type_regle;
        private $libelle;
        private $nombre_point;
        private $date;
        private $valeur;
        
        public function __construct() {}
    
        public function init($id_type_regle, $libelle, $nombre_point, $date, $valeur) {
            $this->id_type_regle = $id_type_regle;
            $this->libelle = $libelle;
            $this->nombre_point = $nombre_point;
            $this->date = $date;
            $this->valeur = $valeur;
        }
    
        public function getId_type_regle() {
            return $this->id_type_regle;
        }
    
        public function getLibelle() {
            return $this->libelle;
        }
    
        public function getNombre_point() {
            return $this->nombre_point;
        }
    
        public function getDate() {
            return $this->date;
        }
    
        public function getValeur() {
            return $this->valeur;
        }
    
        public function setLibelle($libelle) {
            $this->libelle = $libelle;
        }
    
        public function setNombre_point($nombre_point) {
            $this->nombre_point = $nombre_point;
        }
    
        public function setDate($date) {
            $this->date = $date;
        }
    
        public function setValeur($valeur) {
            $this->valeur = $valeur;
        }
        
        public function __toString()
        {
            return json_encode($this);
        }
}
?>