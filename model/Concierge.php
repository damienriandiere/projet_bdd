<?php
class Concierge {
    private $id_concierge;
    private $nom;
    private $prenom;
    private $telephone;
    private $email;
    private $password;
    private $actif;
    private $login;

    public function __construct() {}
    
    public function init($id_concierge, $nom, $prenom, $telephone, $email, $password, $actif, $login) {
        $this->id_concierge = $id_concierge;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->telephone = $telephone;
        $this->email = $email;
        $this->password = $password;
        $this->actif = $actif;
        $this->login = $login;
    }
    
    public function getId_concierge() {
        return $this->id_concierge;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getTelephone() {
        return $this->telephone;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getActif() {
        return $this->actif;
    }

    public function getLogin() {
        return $this->login;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function setTelephone($telephone) {
        $this->telephone = $telephone;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setActif($actif) {
        $this->actif = $actif;
    }

    public function setLogin($login) {
        $this->login = $login;
    }

    public function __toString() {
        return json_encode($this);
    }
}
?>
