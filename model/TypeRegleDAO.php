<?php

require_once('MysqlConnexion.php');

class TypeRegleDAO {
    private static $dao;

    private function __construct() {}

    public final static function getInstance() {
        if(!isset(self::$dao)) {
            self::$dao = new TypeRegleDAO();
        }
        return self::$dao;
    }

    public final function findAll() {
        $dbc = Database::getInstance()->getConnection();
        // prepare the SQL statement
        $query = "SELECT * FROM TypeRegle;";
        $stmt = $dbc -> prepare($query);
        
        // execute the prepared statement

        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_CLASS, 'TypeRegle');
        return $results;
    }

    public final function insert($st) {
        if($st instanceof TypeRegle) {
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "INSERT INTO TypeRegle (libelle, nombre_point, date, valeur) VALUES (:l, :np, :d, :v);";
            $stmt = $dbc -> prepare($query);
            
            // bind the paramaters
            $stmt->bindValue(':l',$st->getLibelle(), PDO::PARAM_STR);
            $stmt->bindValue(':np',$st->getNombre_point(), PDO::PARAM_INT);
            $stmt->bindValue(':d',$st->getDate(), PDO::PARAM_STR);
            $stmt->bindValue(':v',$st->getValeur(), PDO::PARAM_INT);
            
            // execute the prepared statement
            $stmt->execute();
        }
    }

    public final function delete($st) {
        if($st instanceof TypeRegle) {
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "DELETE FROM TypeRegle WHERE id_type_regle = :id;";
            $stmt = $dbc -> prepare($query);
            
            // bind the paramaters
            $stmt->bindValue(':id',$st->getId_type_regle(), PDO::PARAM_INT);
            
            // execute the prepared statement
            $stmt->execute();
        }
    }

    public final function update($st) {
        if($st instanceof TypeRegle) {
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "UPDATE TypeRegle SET libelle = :l, nombre_point = :np, date = :d, valeur = :v WHERE id_type_regle = :id;";
            $stmt = $dbc -> prepare($query);
            
            // bind the paramaters
            $stmt->bindValue(':l',$st->getLibelle(), PDO::PARAM_STR);
            $stmt->bindValue(':np',$st->getNombre_point(), PDO::PARAM_INT);
            $stmt->bindValue(':d',$st->getDate(), PDO::PARAM_STR);
            $stmt->bindValue(':v',$st->getValeur(), PDO::PARAM_INT);
            $stmt->bindValue(':id',$st->getId_type_regle(), PDO::PARAM_INT);
            
            // execute the prepared statement
            $stmt->execute();
        }
    }
}
?>