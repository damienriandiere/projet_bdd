<?php
require_once('MysqlConnexion.php');

class FabriqueDAO {
    private static $dao;

    private function __construct() {}

    public final static function getInstance() {
        if(!isset(self::$dao)) {
            self::$dao = new FabriqueDAO();
        }
        return self::$dao;
    }

    public final function findAll() {
        $dbc = Database::getInstance()->getConnection();
        // prepare the SQL statement
        $query = "SELECT * FROM Fabrique;";
        $stmt = $dbc -> prepare($query);
        
        // execute the prepared statement

        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_CLASS, 'Fabrique');
        return $results;
    }

    public final function insert($st) {
        if($st instanceof Fabrique) {
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "INSERT INTO Fabrique (id_produit, id_fournisseur) VALUES (:id_produit, :id_fournisseur);";
            $stmt = $dbc -> prepare($query);
            
            // bind the paramaters
            $stmt->bindValue(':id_produit',$st->getId_produit(), PDO::PARAM_INT);
            $stmt->bindValue(':id_fournisseur',$st->getId_fournisseur(), PDO::PARAM_INT);
            
            // execute the prepared statement
            $stmt->execute();
        }
    }

    public final function delete($st) {
        if($st instanceof Fabrique) {
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "DELETE FROM Fabrique WHERE id_fabrique = :id_fabrique;";
            $stmt = $dbc -> prepare($query);
            
            // bind the paramaters
            $stmt->bindValue(':id_fabrique',$st->getId_fabrique(), PDO::PARAM_INT);
            
            // execute the prepared statement
            $stmt->execute();
        }
    }
    
    public final function update($st) {
        if($st instanceof Fabrique) {
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "UPDATE Fabrique SET id_produit = :id_produit, id_fournisseur = :id_fournisseur WHERE id_fabrique = :id_fabrique;";
            $stmt = $dbc -> prepare($query);
            
            // bind the paramaters
            $stmt->bindValue(':id_fabrique',$st->getId_fabrique(), PDO::PARAM_INT);
            $stmt->bindValue(':id_produit',$st->getId_produit(), PDO::PARAM_INT);
            $stmt->bindValue(':id_fournisseur',$st->getId_fournisseur(), PDO::PARAM_INT);

            // execute the prepared statement
            $stmt->execute();

        }
    }
}
