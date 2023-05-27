<?php
require_once('MysqlConnexion.php');

class EstLie_Membre_RegleDAO {

    private static $dao;

    private function __construct() {}

    public final static function getInstance() {
        if(!isset(self::$dao)) {
            self::$dao = new EstLie_Membre_RegleDAO();
        }
        return self::$dao;
    }

    public final function findAll() {
        $dbc = Database::getInstance()->getConnection();
        // prepare the SQL statement
        $query = "SELECT * FROM EstLie_Membre_Regle;";
        $stmt = $dbc -> prepare($query);
        
        // execute the prepared statement

        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_CLASS, 'EstLie_Membre_Regle');
        return $results;
    }

    public final function insert($st) {
        if($st instanceof EstLie_Membre_Regle) {
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "INSERT INTO EstLie_Membre_Regle (id_type_membre, id_type_regle) VALUES (:id_type_membre, :id_type_regle);";
            $stmt = $dbc -> prepare($query);
            
            // bind the paramaters
            $stmt->bindValue(':id_type_membre',$st->getId_type_membre(), PDO::PARAM_INT);
            $stmt->bindValue(':id_type_regle',$st->getId_type_regle(), PDO::PARAM_INT);
            
            // execute the prepared statement
            $stmt->execute();
        }
    }

    public final function delete($st) {
        if($st instanceof EstLie_Membre_Regle) {
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "DELETE FROM EstLie_Membre_Regle WHERE id_type_membre = :id_type_membre AND id_type_regle = :id_type_regle;";
            $stmt = $dbc -> prepare($query);
            
            // bind the paramaters
            $stmt->bindValue(':id_type_membre',$st->getId_type_membre(), PDO::PARAM_INT);
            $stmt->bindValue(':id_type_regle',$st->getId_type_regle(), PDO::PARAM_INT);
            
            // execute the prepared statement
            $stmt->execute();
        }
    }

    public final function update($st) {
        if($st instanceof EstLie_Membre_Regle) {
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "UPDATE EstLie_Membre_Regle SET id_type_membre = :id_type_membre, id_type_regle = :id_type_regle WHERE id_type_membre = :id_type_membre AND id_type_regle = :id_type_regle;";
            $stmt = $dbc -> prepare($query);
            
            // bind the paramaters
            $stmt->bindValue(':id_type_membre',$st->getId_type_membre(), PDO::PARAM_INT);
            $stmt->bindValue(':id_type_regle',$st->getId_type_regle(), PDO::PARAM_INT);
            
            // execute the prepared statement
            $stmt->execute();
        }
    }
}

?>