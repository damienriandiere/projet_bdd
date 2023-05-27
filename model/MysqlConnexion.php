<?php
/**
 * The class makes the connection with the database
 */
class Database {
    private static $connection;

    private function __construct(){ }
    
    /**
     * The intance of the connection
     * @return Database the instance
     */
    public final static function getInstance(){
        if(!isset(self::$connection)){
            self::$connection = new Database();
        }
        return self::$connection;
    }

    /**
     * gives the connection
     * @return Database the connection
     */
    public function getConnection(){
        include('config.php');
        try{
            $db = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8',$usernamebdd,$passwordbdd, array(PDO::ATTR_PERSISTENT => true));
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        }catch(PDOException $e){
            print "Error !:" . $e->getMessage(). "<br>";
            die();
        }
    }
}
?>