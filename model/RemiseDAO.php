<?php
require_once('MysqlConnexion.php');

class RemiseDAO {
    private static $dao;

    private function __construct() {}

    public final static function getInstance() {
        if(!isset(self::$dao)) {
            self::$dao = new RemiseDAO();
        }
        return self::$dao;
    }

    public final function findAll() {
        $dbc = Database::getInstance()->getConnection();
        $query = "SELECT * FROM Remise";
        $stmt = $dbc->query($query);
        $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'Remise');
        return $results;
    }

    public final function insert($st) {
        if($st instanceof Remise) {
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "INSERT INTO Remise (dateRemise, montant, id_facture,id_historique_point) VALUES (:d,:m,:id,:idhp);";
            $stmt = $dbc -> prepare($query);
            
            // bind the paramaters
            $stmt->bindValue(':d',$st->getDateRemise(), PDO::PARAM_STR);
            $stmt->bindValue(':m',$st->getMontant(), PDO::PARAM_INT);
            $stmt->bindValue(':id',$st->getId_facture(), PDO::PARAM_INT);
            $stmt->bindValue(':idhp',$st->getId_historique_point(), PDO::PARAM_INT);
            
            // execute the prepared statement
            $stmt->execute();
        }
    }

    public final function delete($st) {
        if($st instanceof Remise) {
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "DELETE FROM Remise WHERE id_remise = :id;";
            $stmt = $dbc -> prepare($query);
            
            // bind the paramaters
            $stmt->bindValue(':id',$st->getId_remise(), PDO::PARAM_INT);
            
            // execute the prepared statement
            $stmt->execute();
        }
    }

    public final function update($st) {
        if($st instanceof Remise) {
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "UPDATE Remise SET dateRemise = :d, montant = :m, id_facture = :id, id_historique_point = :idhp WHERE id_remise = :id;";
            $stmt = $dbc -> prepare($query);
            
            // bind the paramaters
            $stmt->bindValue(':d',$st->getDateRemise(), PDO::PARAM_STR);
            $stmt->bindValue(':m',$st->getMontant(), PDO::PARAM_INT);
            $stmt->bindValue(':id',$st->getId_facture(), PDO::PARAM_INT);
            $stmt->bindValue(':idhp',$st->getId_historique_point(), PDO::PARAM_INT);
            $stmt->bindValue(':id',$st->getId_remise(), PDO::PARAM_INT);
            
            // execute the prepared statement
            $stmt->execute();
        }
    }

    
}
?>