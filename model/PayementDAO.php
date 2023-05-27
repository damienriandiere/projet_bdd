<?php
require_once('MysqlConnexion.php');

class PayementDAO{

    private static $dao;

    private function __construct() {}

    public final static function getInstance() {
        if(!isset(self::$dao)) {
            self::$dao= new PayementDAO();
        }
        return self::$dao;
    }

    public final function findAll(){
        $dbc = Database::getInstance()->getConnection();
        $query = "SELECT * FROM Payement ORDER BY id_payement";
        $stmt = $dbc->query($query);
        $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'Payement');
        return $results;
    }

    public final function insert($st){
        if($st instanceof Payement){
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "INSERT INTO Payement ( montant, datePayement, id_type_payement) VALUES (:m,:d,:itp);";
            $stmt = $dbc -> prepare($query);
            
            // bind the paramaters
            $stmt->bindValue(':m',$st->getMontant(), PDO::PARAM_INT);
            $stmt->bindValue(':d',$st->getDatePayement(), PDO::PARAM_STR);
            $stmt->bindValue(':itp',$st->getId_type_payement(), PDO::PARAM_INT);
            
            // execute the prepared statement
            $stmt->execute();
        }
    }

    public final function delete($st){
        if($st instanceof Payement){
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "DELETE FROM Payement WHERE id_payement = :id;";
            $stmt = $dbc -> prepare($query);
            
            // bind the paramaters
            $stmt->bindValue(':id',$st->getId_payement(), PDO::PARAM_INT);
            
            // execute the prepared statement
            $stmt->execute();
        }
    }

    public final function update($st){
        if($st instanceof Payement){
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "UPDATE Payement SET montant = :m, datePayement = :d, id_type_payement = :itp WHERE id_payement = :id;";
            $stmt = $dbc -> prepare($query);
            
            // bind the paramaters
            $stmt->bindValue(':m',$st->getMontant(), PDO::PARAM_INT);
            $stmt->bindValue(':d',$st->getDatePayement(), PDO::PARAM_STR);
            $stmt->bindValue(':itp',$st->getId_type_payement(), PDO::PARAM_INT);
            $stmt->bindValue(':id',$st->getId_payement(), PDO::PARAM_INT);

            // execute the prepared statement
            $stmt->execute();

        }
    }
}
?>

