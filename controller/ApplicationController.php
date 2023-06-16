<?php
/**
 * This controller makes the link between the different pages to move around in the application
 */
class ApplicationController{
    private static $instance;
    private $routes;
    
    private function __construct(){
        // Sets the controllers and the views of the application.
        $this->routes = [
            '/' => ['controller'=>null, 'view'=>'MainView.html'],
            'addClient' => ['controller'=>null, 'view'=>'AddClient.html'],
            'user_add' => ['controller' => 'AddUserController', 'view' => 'AddClientValidationView.html'],
            'error' => ['controller'=>null, 'view'=>'ErrorView.html'],
            'addConcierge' => ['controller'=>null, 'view'=>'AddConcierge.html'],
            'addConciergeValidation' => ['controller'=>'AddConciergeController', 'view'=>'addConciergeValidationView.html'],
            'listCommande' => ['controller'=>null, 'view'=>'ListCommande.php'],
            'listArticle' => ['controller'=>null, 'view'=>'ListArticle.php']
        ];
    }

    /**
     * Returns the single instance of this class.
     * @return ApplicationController the single instance of this class.
     */
    public static function getInstance(){
        if(!isset(self::$instance)){
            self::$instance = new ApplicationController;
        }
        return self::$instance;
    }

    /**
     * Returns the controller that is responsible for processing the request
     * specified as parameter. The controller can be null if their is no data to
     * process.
     * @param Array $request The HTTP request.
     * @param Controller The controller that is responsible for processing the
     * request specified as parameter.  
     */
    public function getController($request){
        if(array_key_exists($request['page'], $this->routes)){
            return $this->routes[$request['page']]['controller'];
        }
        return null;
    }

    /**
     * Returns the view that must be return in response of the HTTP request
     * specified as parameter.  
     * @param Array $request The HTTP request.
     * @param Object The view that must be return in response of the HTTP request
     * specified as parameter. 
     */
    public function getView($request){
        if( array_key_exists($request['page'], $this->routes)){
            return $this->routes[$request['page']]['view'];
        }
        return $this->routes['error']['view'];
    }
}
?>
