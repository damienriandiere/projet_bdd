<?php

require_once('./model/Client.php');
require_once('./model/Adresse.php');
require_once('./model/Telephone.php');

require_once('Controller.php');
require_once('./model/ClientDAO.php');
require_once('./model/AdresseDAO.php');
require_once('./model/TelephoneDAO.php');

/**
 * The class allows you to create a new user of the application
 */
class AddUserController implements Controller
{   
    /**
     * It check that the new identifier is not in the database
     */
    public function unique($email){
        $utilisateurDAO = ClientDAO::getInstance();
        $tab = ClientDAO::getInstance()->findAll();
        $i = 0;
        $unique = true;

        while($unique && $i < count($tab)){
            $utilisateur = $tab[$i];
            if($email == $utilisateur->getEmail() ){
                $unique = false;
            }
            $i = $i+1;
        }
        return $unique;
    }

    /**
    * processes the variable $ _REQUEST received as a parameter.
    */
    public function handle($request)
    {
        $email = "";
        $mdp = "";
        $nom = "";
        $prenom = "";
        $dateNaissance = "";
        $sexe = "";
        if(isset($request['nom'])) { $nom = $request['nom']; }
        if(isset($request['prenom'])) { $prenom = $request['prenom']; }
        if(isset($request['email'])) { $email = $request['email']; }
        if(isset($request['dateNaissance'])) { $dateNaissance = $request['dateNaissance']; }
        if(isset($request['noBancaire'])) { $noBancaire = $request['noBancaire']; }
        if(isset($request['website'])) { $website = $request['website']; }
        if(isset($request['facebook'])) { $facebook = $request['facebook']; }
        if(isset($request['actif'])) { $actif = $request['actif']; }
        if(isset($request['description'])) { $description = $request['description']; }
        if(isset($request['adresse'])) { $adresse = $request['adresse']; }
        if(isset($request['codePostal'])) { $codePostal = $request['codePostal']; }
        if(isset($request['telephone'])) { $telephone = $request['telephone']; }

        if($this->unique($email)){
            $adresseId = AdresseDAO::getInstance()->findLastId()[0]->getId_adresse()+1;            
            $adresseCreate = new Adresse();
            $adresseCreate->init($adresseId,$adresse,$codePostal);
            $adresseDAO=AdresseDAO::getInstance();
            $adresseDAO->insert($adresseCreate);
            $telephoneId = TelephoneDAO::getInstance()->findLastId()[0]->getId_telephone()+1;
            $telephoneCreate = new Telephone();
            $telephoneCreate->init($telephoneId, $telephone);
            $telephoneDAO=TelephoneDAO::getInstance();
            $telephoneDAO->insert($telephoneCreate);
            $client = new Client();
            $client->init(2748,$nom, $prenom, $email, $dateNaissance, $noBancaire, $website, $facebook, true, $description, $adresseId, $telephoneId, null);
            $clientDAO=ClientDAO::getInstance();
            $clientDAO->insert($client);
        }
    }
}