<?php
require_once('MysqlConnexion.php');

class TypeActionDAO {

    private static $dao;

    private function __construct() {}

    public final static function getInstance() {
        if(!isset(self::$dao)) {
            self::$dao = new TypeActionDAO();
        }
        return self::$dao;
    }

    public final function findAll() {
        $dbc = Database::getInstance()->getConnection();
        // prepare the SQL statement
        $query = "SELECT * FROM TypeAction;";
        $stmt = $dbc -> prepare($query);
        
        // execute the prepared statement

        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_CLASS, 'TypeAction');
        return $results;
    }

    public final function insert($st) {
        if($st instanceof TypeAction) {
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "INSERT INTO TypeAction (libelle, date) VALUES (:l, :d);";
            $stmt = $dbc -> prepare($query);
            
            // bind the paramaters
            $stmt->bindValue(':l',$st->getLibelle(), PDO::PARAM_STR);
            $stmt->bindValue(':d',$st->getDate(), PDO::PARAM_STR);
            
            // execute the prepared statement
            $stmt->execute();
        }
    }

    public final function delete($st) {
        if($st instanceof TypeAction) {
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "DELETE FROM TypeAction WHERE id_type = :id;";
            $stmt = $dbc -> prepare($query);
            
            // bind the paramaters
            $stmt->bindValue(':id',$st->getId_type(), PDO::PARAM_INT);
            
            // execute the prepared statement
            $stmt->execute();
        }
    }

    public final function update($st) {
        if($st instanceof TypeAction) {
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "UPDATE TypeAction SET libelle = :l, date = :d WHERE id_type = :id;";
            $stmt = $dbc -> prepare($query);
            
            // bind the paramaters
            $stmt->bindValue(':l',$st->getLibelle(), PDO::PARAM_STR);
            $stmt->bindValue(':d',$st->getDate(), PDO::PARAM_STR);
            $stmt->bindValue(':id',$st->getId_type(), PDO::PARAM_INT);
            
            // execute the prepared statement
            $stmt->execute();
        }
    }

    

}
?>