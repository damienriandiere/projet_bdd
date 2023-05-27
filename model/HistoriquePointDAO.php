<?php
require_once('MysqlConnexion.php');

class HistoriquePointDAO{

    private static $dao;

    private function __construct() {}

    public final static function getInstance() {
        if(!isset(self::$dao)) {
            self::$dao= new HistoriquePointDAO();
        }
        return self::$dao;
    }

    public final function findAll(){
        $dbc = Database::getInstance()->getConnection();
        $query = "SELECT * FROM HistoriquePoint ORDER BY id_client";
        $stmt = $dbc->query($query);
        $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'HistoriquePoint');
        return $results;
    }

    public final function insert($st){
        if($st instanceof HistoriquePoint){
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "INSERT INTO HistoriquePoint ( id_type_regle, date, description) VALUES (:itr,:d,:des);";
            $stmt = $dbc -> prepare($query);
            
            // bind the paramaters
            $stmt->bindValue(':itr',$st->getId_type_regle(), PDO::PARAM_INT);
            $stmt->bindValue(':d',$st->getDate(), PDO::PARAM_STR);
            $stmt->bindValue(':des',$st->getDescription(), PDO::PARAM_INT);
            
            // execute the prepared statement
            $stmt->execute();
        }
    }

    public final function delete($st){
        if($st instanceof HistoriquePoint){
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "DELETE FROM HistoriquePoint WHERE id_historique_point = :id;";
            $stmt = $dbc -> prepare($query);
            
            // bind the paramaters
            $stmt->bindValue(':id',$st->getId_historique(), PDO::PARAM_INT);
            
            // execute the prepared statement
            $stmt->execute();
        }
    }

    public final function update($st){
        if($st instanceof HistoriquePoint){
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "UPDATE HistoriquePoint SET  id_type_regle = :itr, date = :d, description = :des WHERE id_historique_point = :id;";
            $stmt = $dbc -> prepare($query);
            
            // bind the paramaters
            $stmt->bindValue(':itr',$st->getId_type_regle(), PDO::PARAM_INT);
            $stmt->bindValue(':d',$st->getDate(), PDO::PARAM_STR);
            $stmt->bindValue(':des',$st->getDescription(), PDO::PARAM_INT);
            $stmt->bindValue(':id',$st->getId_historique(), PDO::PARAM_INT);

            // execute the prepared statement
            $stmt->execute();
        }
    }
}
?>
