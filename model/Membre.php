<?php
class Membre{
    private $id_membre;
    private $description;
    private $dateMembre;
    private $pointMin;
    private $pointMax;
    private $seuil;
    private $id_type_regle;
    
    public function __construct(){}

    public function init($id_membre, $description, $dateMembre, $pointMin, $pointMax, $seuil, $id_type_regle){
        $this->id_membre = $id_membre;
        $this->description = $description;
        $this->dateMembre = $dateMembre;
        $this->pointMin = $pointMin;
        $this->pointMax = $pointMax;
        $this->seuil = $seuil;
        $this->id_type_regle = $id_type_regle;
    }

    public function getId_membre(){
        return $this->id_membre;
    }

    public function getDescription(){
        return $this->description;
    }

    public function getDateMembre(){
        return $this->dateMembre;
    }

    public function getPointMin(){
        return $this->pointMin;
    }

    public function getPointMax(){
        return $this->pointMax;
    }

    public function getSeuil(){
        return $this->seuil;
    }

    public function getId_type_regle(){
        return $this->id_type_regle;
    }

    public function setDescription($description){
        $this->description = $description;
    }

    public function setDateMembre($dateMembre){
        $this->dateMembre = $dateMembre;
    }

    public function setPointMin($pointMin){
        $this->pointMin = $pointMin;
    }

    public function setPointMax($pointMax){
        $this->pointMax = $pointMax;
    }

    public function setSeuil($seuil){
        $this->seuil = $seuil;
    }

    public function setId_type_regle($id_type_regle){
        $this->id_type_regle = $id_type_regle;
    }

    public function __toString(){
        return json_encode($this);
    }
}
?>
