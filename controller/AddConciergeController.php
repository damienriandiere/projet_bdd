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
        $utilisateurDAO = ConciergeDAO::getInstance();
        $tab = ConciergeDAO::getInstance()->findAll();
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
        $email = $request['email'];
        $password = $request['password'];
        $nom = $request['nom'];
        $prenom = $request['prenom'];
        $telephone = $request['telephone'];
        $login = $request['login'];

        $options = [
            'cost' => 3476,
        ];
        $password = password_hash($password, PASSWORD_BCRYPT, $options);

        if($this->unique($email)){
            $utilisateurCreate = new Concierge();
            $utilisateurCreate->init(0,$nom, $prenom,$telephone,$email, $password, true  ,$login);
            $utilisateurDAO=AdresseDAO::getInstance();
            $utilisateurDAO->insert($utilisateurCreate);
        }
    }
}