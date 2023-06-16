<?php
require_once('./model/Concierge.php');
require_once('./model/ConciergeDAO.php');


require_once('Controller.php');


/**
 * The class allows you to create a new user of the application
 */
class AddConciergeController implements Controller
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
        $utilisateurDAO = ConciergeDAO::getInstance();
        $email = $request['email'];
        // Nous avons juste choisi de ne pas modifier le mot de passe mais nous aurions utilisé password_hash de php
        $password = $request['password'];
        $nom = $request['nom'];
        $prenom = $request['prenom'];
        $telephone = $request['telephone'];
        $login = $request['login'];

        

        if($this->unique($email)){
            $utilisateurCreate = new Concierge();
            $utilisateurCreate->init(0,$nom, $prenom,$telephone,$email, $password, true  ,$login);
            $utilisateurDAO->insert($utilisateurCreate);
        }
    }
}