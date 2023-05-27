<?php
require_once('MysqlConnexion.php');

class TypePayementDAO {

    private static $dao;

    private function __construct() {}

    public final static function getInstance() {
        if(!isset(self::$dao)) {
            self::$dao = new TypePayementDAO();
        }
        return self::$dao;
    }

    public final function findAll() {
        $dbc = Database::getInstance()->getConnection();
        // prepare the SQL statement
        $query = "SELECT * FROM TypePayement;";
        $stmt = $dbc -> prepare($query);
        
        // execute the prepared statement

        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_CLASS, 'TypePayement');
        return $results;
    }

    public final function insert($st) {
        if($st instanceof TypePayement) {
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "INSERT INTO TypePayement (libelle) VALUES (:l);";
            $stmt = $dbc -> prepare($query);
            
            // bind the paramaters
            $stmt->bindValue(':l',$st->getLibelle(), PDO::PARAM_STR);
            
            // execute the prepared statement
            $stmt->execute();
        }
    }

    public final function delete($st) {
        if($st instanceof TypePayement) {
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "DELETE FROM TypePayement WHERE id_type_payement = :id;";
            $stmt = $dbc -> prepare($query);
            
            // bind the paramaters
            $stmt->bindValue(':id',$st->getId_type_payement(), PDO::PARAM_INT);
            
            // execute the prepared statement
            $stmt->execute();
        }
    }

    public final function update($st) {
        if($st instanceof TypePayement) {
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "UPDATE TypePayement SET libelle = :l WHERE id_type_payement = :id;";
            $stmt = $dbc -> prepare($query);
            
            // bind the paramaters
            $stmt->bindValue(':l',$st->getLibelle(), PDO::PARAM_STR);
            $stmt->bindValue(':id',$st->getId_type_payement(), PDO::PARAM_INT);
            
            // execute the prepared statement
            $stmt->execute();
        }
    }
}
?>