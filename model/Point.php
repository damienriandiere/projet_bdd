<?php
class Point{
    private $id_point;
    private $nombrePoint;
    private $date;
    private $id_client;
    
    public function __construct($id_point, $nombrePoint, $date, $id_client) {
        $this->id_point = $id_point;
        $this->nombrePoint = $nombrePoint;
        $this->date = $date;
        $this->id_client = $id_client;
    }
    
    public function getId_point() {
        return $this->id_point;
    }

    public function getNombrePoint() {
        return $this->nombrePoint;
    }

    public function getDate() {
        return $this->date;
    }

    public function getId_client() {
        return $this->id_client;
    }

    public function setNombrePoint($nombrePoint) {
        $this->nombrePoint = $nombrePoint;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function setId_client($id_client) {
        $this->id_client = $id_client;
    }

    public function __toString() {
        return json_encode($this);
    }
}
?>
