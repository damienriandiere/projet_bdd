<?php
require_once('MysqlConnexion.php');

class PointDAO {
    
    private static $dao;

    private function __construct() {}

    public final static function getInstance() {
        if(!isset(self::$dao)) {
            self::$dao= new PointDAO();
        }
        return self::$dao;
    }

    public final function findAll(){
        $dbc = Database::getInstance()->getConnection();
        $query = "SELECT * FROM Point ORDER BY id_client";
        $stmt = $dbc->query($query);
        $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'Point');
        return $results;
    }

    public final function insert($st){
        if($st instanceof Point){
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "INSERT INTO Point ( nombrePoint, date, id_client) VALUES (:np,:d,:idc);";
            $stmt = $dbc -> prepare($query);
            
            // bind the paramaters
            $stmt->bindValue(':np',$st->getNombrePoint(), PDO::PARAM_INT);
            $stmt->bindValue(':d',$st->getDate(), PDO::PARAM_STR);
            $stmt->bindValue(':idc',$st->getId_client(), PDO::PARAM_INT);
            
            // execute the prepared statement
            $stmt->execute();
        }
    }

    public final function delete($st){
        if($st instanceof Point){
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "DELETE FROM Point WHERE id_point = :id;";
            $stmt = $dbc -> prepare($query);
            
            // bind the paramaters
            $stmt->bindValue(':id',$st->getId_point(), PDO::PARAM_INT);
            
            // execute the prepared statement
            $stmt->execute();
        }
    }

    public final function update($st){
        if($st instanceof Point){
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "UPDATE Point SET nombrePoint = :np, date = :d, id_client = :idc WHERE id_point = :id;";
            $stmt = $dbc -> prepare($query);
            
            // bind the paramaters
            $stmt->bindValue(':np',$st->getNombrePoint(), PDO::PARAM_INT);
            $stmt->bindValue(':d',$st->getDate(), PDO::PARAM_STR);
            $stmt->bindValue(':idc',$st->getId_client(), PDO::PARAM_INT);
            $stmt->bindValue(':id',$st->getId_point(), PDO::PARAM_INT);

            // execute the prepared statement
            $stmt->execute();
            
        }
    }
    
}
?>
