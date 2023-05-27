<?php
require_once('MysqlConnexion.php');

class TypeOperationDAO {

    private static $dao;

    private function __construct() {}

    public final static function getInstance() {
        if(!isset(self::$dao)) {
            self::$dao = new TypeOperationDAO();
        }
        return self::$dao;
    }

    public final function findAll() {
        $dbc = Database::getInstance()->getConnection();
        // prepare the SQL statement
        $query = "SELECT * FROM TypeOperation;";
        $stmt = $dbc -> prepare($query);
        
        // execute the prepared statement

        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_CLASS, 'TypeOperation');
        return $results;
    }

    public final function insert($st) {
        if($st instanceof TypeOperation) {
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "INSERT INTO TypeOperation (type_operation, nombre_Point,libelle,id_type_regle) VALUES (:t, :n, :l, :id);";
            $stmt = $dbc -> prepare($query);
            
            // bind the paramaters
            $stmt->bindValue(':t',$st->getType_operation(), PDO::PARAM_STR);
            $stmt->bindValue(':n',$st->getNombre_Point(), PDO::PARAM_INT);
            $stmt->bindValue(':l',$st->getLibelle(), PDO::PARAM_STR);
            $stmt->bindValue(':id',$st->getId_type_regle(), PDO::PARAM_INT);
            
            // execute the prepared statement
            $stmt->execute();
        }
    }

    public final function delete($st) {
        if($st instanceof TypeOperation) {
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "DELETE FROM TypeOperation WHERE id_type_operation = :id;";
            $stmt = $dbc -> prepare($query);
            
            // bind the paramaters
            $stmt->bindValue(':id',$st->getId_type_operation(), PDO::PARAM_INT);
            
            // execute the prepared statement
            $stmt->execute();
        }
    }

    public final function update($st) {
        if($st instanceof TypeOperation) {
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "UPDATE TypeOperation SET type_operation = :t, nombre_Point = :n, libelle = :l, id_type_regle = :idr WHERE id_type_operation = :id;";
            $stmt = $dbc -> prepare($query);
            
            // bind the paramaters
            $stmt->bindValue(':t',$st->getType_operation(), PDO::PARAM_STR);
            $stmt->bindValue(':n',$st->getNombre_Point(), PDO::PARAM_INT);
            $stmt->bindValue(':l',$st->getLibelle(), PDO::PARAM_STR);
            $stmt->bindValue(':id',$st->getId_type_operation(), PDO::PARAM_INT);
            $stmt->bindValue(':idr',$st->getId_type_regle(), PDO::PARAM_INT);
            
            // execute the prepared statement
            $stmt->execute();
        }
    }
}
?>