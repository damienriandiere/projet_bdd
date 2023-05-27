<?php
require_once('MysqlConnexion.php');

class TelephoneDAO {

    private static $dao;

    private function __construct() {}

    public final static function getInstance() {
        if(!isset(self::$dao)) {
            self::$dao = new TelephoneDAO();
        }
        return self::$dao;
    }

    public final function findAll() {
        $dbc = Database::getInstance()->getConnection();
        // prepare the SQL statement
        $query = "SELECT * FROM Telephone;";
        $stmt = $dbc -> prepare($query);
        
        // execute the prepared statement

        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_CLASS, 'Telephone');
        return $results;
    }

    // last id
    public final function findLastId() {
        $dbc = Database::getInstance()->getConnection();
        // prepare the SQL statement
        $query = "SELECT id_telephone FROM Telephone ORDER BY id_telephone DESC LIMIT 1;";
        $stmt = $dbc -> prepare($query);
        // execute the prepared statement
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_CLASS, 'Telephone');
        return $results;
    }

    public final function insert($st) {
        if($st instanceof Telephone) {
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "INSERT INTO Telephone (numero) VALUES (:n);";
            $stmt = $dbc -> prepare($query);
            
            // bind the paramaters
            $stmt->bindValue(':n',$st->getNumero(), PDO::PARAM_STR);
            
            // execute the prepared statement
            $stmt->execute();
        }
    }

    public final function delete($st) {
        if($st instanceof Telephone) {
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "DELETE FROM Telephone WHERE id_telephone = :id;";
            $stmt = $dbc -> prepare($query);
            
            // bind the paramaters
            $stmt->bindValue(':id',$st->getId_telephone(), PDO::PARAM_INT);
            
            // execute the prepared statement
            $stmt->execute();
        }
    }

    public final function update($st) {
        if($st instanceof Telephone) {
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "UPDATE Telephone SET numero = :n WHERE id_telephone = :id;";
            $stmt = $dbc -> prepare($query);
            
            // bind the paramaters
            $stmt->bindValue(':n',$st->getNumero(), PDO::PARAM_STR);
            $stmt->bindValue(':id',$st->getId_telephone(), PDO::PARAM_INT);
            
            // execute the prepared statement
            $stmt->execute();
        }
    }

}
?>