<?php
class HistoriquePoint {

    private $id_historique;
    private $date;
    private $description;
    private $id_type_regle;
    
    public function __construct() {}

    public function init($id_historique, $date, $description, $id_type_regle) {
        $this->id_historique = $id_historique;
        $this->date = $date;
        $this->description = $description;
        $this->id_type_regle = $id_type_regle;
    }

    public function getId_historique() {
        return $this->id_historique;
    }

    public function getDate() {
        return $this->date;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getId_type_regle() {
        return $this->id_type_regle;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function setDescription($description) {
        $this->description = $description;
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
