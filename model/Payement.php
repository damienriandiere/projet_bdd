<?php
class Payement{
    private $id_payement;
    private $montant;
    private $datePayement;
    private $id_type_payement;
    
    public function __construct(){}

    public function init($id_payement, $montant, $datePayement, $id_type_payement){
        $this->id_payement = $id_payement;
        $this->montant = $montant;
        $this->datePayement = $datePayement;
        $this->id_type_payement = $id_type_payement;
    }

    public function getId_payement(){
        return $this->id_payement;
    }

    public function getMontant(){
        return $this->montant;
    }

    public function getDatePayement(){
        return $this->datePayement;
    }

    public function getId_type_payement(){
        return $this->id_type_payement;
    }

    public function setMontant($montant){
        $this->montant = $montant;
    }

    public function setDatePayement($datePayement){
        $this->datePayement = $datePayement;
    }

    public function setId_type_payement($id_type_payement){
        $this->id_type_payement = $id_type_payement;
    }

    public function __toString(){
        return json_encode($this);
    }
}
?>

