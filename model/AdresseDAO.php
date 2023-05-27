<?php
require_once('MysqlConnexion.php');

class AdresseDAO {
    private static $dao;

    private function __construct() {}

    public final static function getInstance() {
        if(!isset(self::$dao)) {
            self::$dao= new AdresseDAO();
        }
        return self::$dao;
    }

    public final function findAll(){
        $dbc = Database::getInstance()->getConnection();
        $query = "SELECT * FROM Adresse ORDER BY id_adresse";
        $stmt = $dbc->query($query);
        $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'Adresse');
        return $results;
    }

    public final function insert($st){
        if($st instanceof Adresse){
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "INSERT INTO Adresse (rue,code_postal) VALUES (:r,:c);";
            $stmt = $dbc -> prepare($query);
            
            // bind the paramaters
            $stmt->bindValue(':r',$st->getRue(), PDO::PARAM_STR);
            $stmt->bindValue(':c',$st->getCode_postal(), PDO::PARAM_INT);
            
            // execute the prepared statement
            $stmt->execute();
        }
    }

    public final function findLastId(){
        $dbc = Database::getInstance()->getConnection();
        $query = "SELECT id_adresse FROM Adresse ORDER BY id_adresse DESC LIMIT 1";
        $stmt = $dbc->query($query);
        $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'Adresse');
        return $results;
    }

    public final function delete($st){
        if($st instanceof Adresse){
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "DELETE FROM Adresse WHERE id_adresse = :id;";
            $stmt = $dbc -> prepare($query);
            
            // bind the paramaters
            $stmt->bindValue(':id',$st->getId_Adresse(), PDO::PARAM_INT);
            
            // execute the prepared statement
            $stmt->execute();
        }
    }

    public final function update($st){
        if($st instanceof Adresse){
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "UPDATE Adresse SET rue = :r, code_postal = :c WHERE id_adresse = :id;";
            $stmt = $dbc->prepare($query);
            
            // bind the paramaters
            $stmt->bindValue(':id',$st->getId_Adresse(), PDO::PARAM_INT);
            $stmt->bindValue(':r',$st->getRue(), PDO::PARAM_STR);
            $stmt->bindValue(':c',$st->getCode_Postal(), PDO::PARAM_INT);
            
            // execute the prepared statement
            $stmt->execute();
        }
    }
}
?>