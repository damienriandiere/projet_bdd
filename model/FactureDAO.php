<?php
require_once('MysqlConnexion.php');

class FactureDAO {
    private static $dao;

    private function __construct() {}

    public final static function getInstance() {
        if(!isset(self::$dao)) {
            self::$dao= new FactureDAO();
        }
        return self::$dao;
    }

    public final function findAll(){
        $dbc = Database::getInstance()->getConnection();
        $query = "SELECT * FROM Facture ORDER BY id_facture";
        $stmt = $dbc->query($query);
        $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'Facture');
        return $results;
    }

    public final function insert($st){
        if($st instanceof Facture){
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "INSERT INTO Facture ( nom, dateFacture, FraisService,dateUpdate,valider) VALUES (:n,:d,:m,:f,:u,:v);";
            $stmt = $dbc -> prepare($query);
            
            // bind the paramaters
            $stmt->bindValue(':n',$st->getNom(), PDO::PARAM_STR);
            $stmt->bindValue(':d',$st->getDateFacture(), PDO::PARAM_STR);
            $stmt->bindValue(':m',$st->getNom(), PDO::PARAM_STR);
            $stmt->bindValue(':f',$st->getFraisService(), PDO::PARAM_STR);
            $stmt->bindValue(':u',$st->getDateUpdate(), PDO::PARAM_STR);
            $stmt->bindValue(':v',$st->getValider(), PDO::PARAM_STR);
            
            // execute the prepared statement
            $stmt->execute();
        }
    }

    public final function delete($st){
        if($st instanceof Facture){
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "DELETE FROM Facture WHERE id_facture = :id;";
            $stmt = $dbc -> prepare($query);
            
            // bind the paramaters
            $stmt->bindValue(':id',$st->getId_facture(), PDO::PARAM_INT);
            
            // execute the prepared statement
            $stmt->execute();
        }
    }

    public final function update($st){
        if($st instanceof Facture){
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "UPDATE Facture SET nom = :n, dateFacture = :d, FraisService = :f,dateUpdate = :u,valider = :v WHERE id_facture = :id;";
            $stmt = $dbc -> prepare($query);
            
            // bind the paramaters
            $stmt->bindValue(':n',$st->getNom(), PDO::PARAM_STR);
            $stmt->bindValue(':d',$st->getDateFacture(), PDO::PARAM_STR);
            $stmt->bindValue(':f',$st->getFraisService(), PDO::PARAM_STR);
            $stmt->bindValue(':u',$st->getDateUpdate(), PDO::PARAM_STR);
            $stmt->bindValue(':v',$st->getValider(), PDO::PARAM_STR);
            $stmt->bindValue(':id',$st->getId_facture(), PDO::PARAM_INT);

            // execute the prepared statement
            $stmt->execute();
        }
    }
}
?>