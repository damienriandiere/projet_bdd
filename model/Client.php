<?php 
class Client {
    private $id_client;
    private $nom;
    private $prenom;
    private $email;
    private $dateNaissance;
    private $noBancaire;
    private $website;
    private $facebook;
    private $actif;
    private $description;
    private $id_adresse;
    private $id_telephone;
    private $id_membre;

    public function __construct() {}

    public function init($id_client, $nom, $prenom, $email, $dateNaissance, $noBancaire, $website, $facebook, $actif, $description, $id_adresse, $id_telephone, $id_membre){
        if($id_client != null){
            $this->id_client = $id_client;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->email = $email;
            $this->dateNaissance = $dateNaissance;
            $this->noBancaire = $noBancaire;
            $this->website = $website;
            $this->facebook = $facebook;
            $this->actif = $actif;
            $this->description = $description;
            $this->id_adresse = $id_adresse;
            $this->id_telephone = $id_telephone;
            $this->id_membre = $id_membre;
        }
    }

    public function getId_client()
    {
        return $this->id_client;
    }
    
    public function getNom()
    {
        return $this->nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    public function getNoBancaire()
    {
        return $this->noBancaire;
    }

    public function getWebsite()
    {
        return $this->website;
    }

    public function getFacebook()
    {
        return $this->facebook;
    }

    public function getActif()
    {
        return $this->actif;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getId_adresse()
    {
        return $this->id_adresse;
    }

    public function getId_telephone()
    {
        return $this->id_telephone;
    }

    public function getId_membre()
    {
        return $this->id_membre;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }
    
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;
    }

    public function setNoBancaire($noBancaire)
    {
        $this->noBancaire = $noBancaire;
    }

    public function setWebsite($website)
    {
        $this->website = $website;
    }

    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;
    }

    public function setActif($actif)
    {
        $this->actif = $actif;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }
    
    public function setId_adresse($id_adresse)
    {
        $this->id_adresse = $id_adresse;
    }
    
    public function setId_telephone($id_telephone)
    {
        $this->id_telephone = $id_telephone;
    }

    public function setId_membre($id_membre)
    {
        $this->id_membre = $id_membre;
    }

    public function  __toString(){
        return json_encode($this);
    }
}
?>

