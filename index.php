<?php
/*
* index allows you to initialize the first page of the site and the other pages
*/

ini_set('display_errors', 'On');
    error_reporting(E_ALL);
    require_once('controller/ApplicationController.php');


if(!isset($_REQUEST['page'])){
    $_REQUEST['page']= '/';
}

$controller = ApplicationController::getInstance()->getController($_REQUEST);
if($controller != null){
    include "controller/$controller.php";
    (new $controller())->handle($_REQUEST);
}



$view = ApplicationController::getInstance()->getView($_REQUEST);
if($view != null){
    include "view/$view";
}

?>