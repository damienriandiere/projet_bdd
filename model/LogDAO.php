<?php
require_once('MysqlConnexion.php');

class LogDAO {

    private static $dao;

    private function __construct() {}

    public final static function getInstance() {
        if(!isset(self::$dao)) {
            self::$dao= new LogDAO();
        }
        return self::$dao;
    }

    public final function findAll(){
        $dbc = Database::getInstance()->getConnection();
        $query = "SELECT * FROM Log ORDER BY id_log";
        $stmt = $dbc->query($query);
        $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'Log');
        return $results;
    }

    public final function insert($st){
        if($st instanceof Log){
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "INSERT INTO Log ( date, url, objectModifie, idObjectModifie, id_action, id_concierge) VALUES (:d,:u,:om,:idom,:ia,:ic);";
            $stmt = $dbc -> prepare($query);
            
            // bind the paramaters
            $stmt->bindValue(':d',$st->getDate(), PDO::PARAM_STR);
            $stmt->bindValue(':u',$st->getUrl(), PDO::PARAM_STR);
            $stmt->bindValue(':om',$st->getObjectModifie(), PDO::PARAM_STR);
            $stmt->bindValue(':idom',$st->getIdObjectModifie(), PDO::PARAM_INT);
            $stmt->bindValue(':ia',$st->getId_action(), PDO::PARAM_INT);
            $stmt->bindValue(':ic',$st->getId_concierge(), PDO::PARAM_INT);
            
            // execute the prepared statement
            $stmt->execute();
        }
    }

    public final function delete($st){
        if($st instanceof Log){
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "DELETE FROM Log WHERE id_log = :id;";
            $stmt = $dbc -> prepare($query);
            
            // bind the paramaters
            $stmt->bindValue(':id',$st->getId_log(), PDO::PARAM_INT);
            
            // execute the prepared statement
            $stmt->execute();
        }
    }

    public final function update($st){
        if($st instanceof Log){
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "UPDATE Log SET date = :d, url = :u, objectModifie = :om, idObjectModifie = :idom, id_action = :ia, id_concierge = :ic WHERE id_log = :id;";
            $stmt = $dbc -> prepare($query);
            
            // bind the paramaters
            $stmt->bindValue(':d',$st->getDate(), PDO::PARAM_STR);
            $stmt->bindValue(':u',$st->getUrl(), PDO::PARAM_STR);
            $stmt->bindValue(':om',$st->getObjectModifie(), PDO::PARAM_STR);
            $stmt->bindValue(':idom',$st->getIdObjectModifie(), PDO::PARAM_INT);
            $stmt->bindValue(':ia',$st->getId_action(), PDO::PARAM_INT);
            $stmt->bindValue(':ic',$st->getId_concierge(), PDO::PARAM_INT);
            $stmt->bindValue(':id',$st->getId_log(), PDO::PARAM_INT);
            
            // execute the prepared statement
            $stmt->execute();
        }
    }
}
?>