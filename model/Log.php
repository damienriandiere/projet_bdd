<?php
class Log {
    private $id_log;
    private $date;
    private $url;
    private $objectModifie;
    private $idObjectModifie;
    private $id_action;
    private $id_concierge;
    
    public function __construct(){}

    public function init($id_log, $date, $url, $objectModifie, $idObjectModifie, $id_action, $id_concierge){
        $this->id_log = $id_log;
        $this->date = $date;
        $this->url = $url;
        $this->objectModifie = $objectModifie;
        $this->idObjectModifie = $idObjectModifie;
        $this->id_action = $id_action;
        $this->id_concierge = $id_concierge;
    }

    public function getId_log(){
        return $this->id_log;
    }

    public function getDate(){
        return $this->date;
    }

    public function getUrl(){
        return $this->url;
    }

    public function getObjectModifie(){
        return $this->objectModifie;
    }

    public function getIdObjectModifie(){
        return $this->idObjectModifie;
    }

    public function getId_action(){
        return $this->id_action;
    }

    public function getId_concierge(){
        return $this->id_concierge;
    }

    public function setDate($date){
        $this->date = $date;
    }

    public function setUrl($url){
        $this->url = $url;
    }

    public function setObjectModifie($objectModifie){
        $this->objectModifie = $objectModifie;
    }

    public function setIdObjectModifie($idObjectModifie){
        $this->idObjectModifie = $idObjectModifie;
    }

    public function setId_action($id_action){
        $this->id_action = $id_action;
    }

    public function setId_concierge($id_concierge){
        $this->id_concierge = $id_concierge;
    }

    public function __toString(){
        return json_encode($this);
    }
}
?>
