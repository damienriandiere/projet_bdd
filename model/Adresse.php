<?php
class Adresse{
    private $id_adresse;
    private $rue;
    private $code_postal;

    public function __construct() {}

    public function init($id_adresse, $rue, $code_postal){
        if($id_adresse != null){
            $this->id_adresse = $id_adresse;
            $this->rue = $rue;
            $this->code_postal = $code_postal;
        }
    }

    public function getId_adresse()
    {
        return $this->id_adresse;
    }

    public function getRue()
    {
        return $this->rue;
    }

    public function getCode_postal()
    {
        return $this->code_postal;
    }

    public function setRue($rue)
    {
        $this->rue = $rue;
    }

    public function setCode_postal($code_postal)
    {
        $this->code_postal = $code_postal;
    }

    public function  __toString(){
        return json_encode($this);
    }
}
?>





