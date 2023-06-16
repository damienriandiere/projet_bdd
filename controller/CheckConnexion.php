<?php
/**
 * The class allows you to create a new user of the application
 */

require_once('Controller.php');
require_once('./model/Concierge.php');
require_once('./model/ConciergeDAO.php');

class CheckConnexion implements Controller
{   
    
    /**
    * processes the variable $ _REQUEST received as a parameter.
    */
    public function handle($request)
    {
        $email = $request['email'];
        // Nous avons juste choisi de ne pas modifier le mot de passe mais nous aurions utilisé password_hash de php
        $password = $request['password'];

        $utilisateurDAO = ConciergeDAO::getInstance();
        $user = $utilisateurDAO->find($email, $password);
        if($user != null){
            session_start();
            $_SESSION['email'] = $user->getEmail();
        } else {
            header('Location: ./index.php?page=connexion');
        }
    }
}
?>