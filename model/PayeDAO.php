<?php
require_once('MysqlConnexion.php');

class PayeDAO {
    private static $dao;

    private function __construct() {}

    public final static function getInstance() {
        if(!isset(self::$dao)) {
            self::$dao = new PayeDAO();
        }
        return self::$dao;
    }

    public final function findAll() {
        $dbc = Database::getInstance()->getConnection();
        // prepare the SQL statement
        $query = "SELECT * FROM Paye;";
        $stmt = $dbc -> prepare($query);
        
        // execute the prepared statement

        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_CLASS, 'Paye');
        return $results;
    }

    public final function insert($st) {
        if($st instanceof Paye) {
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "INSERT INTO Paye (id_facture, id_payement) VALUES (:id_facture, :id_payement);";
            $stmt = $dbc -> prepare($query);
            
            // bind the paramaters
            $stmt->bindValue(':id_facture',$st->getId_facture(), PDO::PARAM_INT);
            $stmt->bindValue(':id_payement',$st->getId_payement(), PDO::PARAM_INT);
            
            // execute the prepared statement
            $stmt->execute();
        }
    }

    public final function delete($st) {
        if($st instanceof Paye) {
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "DELETE FROM Paye WHERE id_paye = :id_paye;";
            $stmt = $dbc -> prepare($query);
            
            // bind the paramaters
            $stmt->bindValue(':id_paye',$st->getId_paye(), PDO::PARAM_INT);
            
            // execute the prepared statement
            $stmt->execute();
        }
    }
    
    public final function update($st) {
        if($st instanceof Paye) {
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "UPDATE Paye SET id_facture = :id_facture, id_payement = :id_payement WHERE id_paye = :id_paye;";
            $stmt = $dbc -> prepare($query);
            
            // bind the paramaters
            $stmt->bindValue(':id_paye',$st->getId_paye(), PDO::PARAM_INT);
            $stmt->bindValue(':id_facture',$st->getId_facture(), PDO::PARAM_INT);
            $stmt->bindValue(':id_payement',$st->getId_payement(), PDO::PARAM_INT);

            // execute the prepared statement
            $stmt->execute();
        }
    }
}
?>