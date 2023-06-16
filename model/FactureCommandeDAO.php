<?php
require_once('MysqlConnexion.php');

class FactureCommandeDAO {
    private static $dao;

    private function __construct() {}

    public final static function getInstance() {
        if(!isset(self::$dao)) {
            self::$dao= new FactureCommandeDAO();
        }
        return self::$dao;
    }

    public final function findAll(){
        $dbc = Database::getInstance()->getConnection();
        $query = "SELECT * FROM FactureCommande ORDER BY id_facture";
        $stmt = $dbc->query($query);
        $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'FactureCommande');
        return $results;
    }

    public final function insert($st){
        if($st instanceof FactureCommande){
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "INSERT INTO FactureCommande ( id_facture, id_commande, FraisLivraison) VALUES (:idf,:idc,:fl);";
            $stmt = $dbc -> prepare($query);
            
            // bind the paramaters
            $stmt->bindValue(':idf',$st->getId_facture(), PDO::PARAM_INT);
            $stmt->bindValue(':idc',$st->getId_commande(), PDO::PARAM_INT);
            $stmt->bindValue(':fl',$st->getFraisLivraison(), PDO::PARAM_INT);

            
            
            // execute the prepared statement
            $stmt->execute();
        }
    }

    public final function delete($st){
        if($st instanceof FactureCommande){
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "DELETE FROM FactureCommande WHERE id_facture = :idf AND id_commande = :idc;";
            $stmt = $dbc -> prepare($query);
            
            // bind the paramaters
            $stmt->bindValue(':idf',$st->getId_facture(), PDO::PARAM_INT);
            $stmt->bindValue(':idc',$st->getId_commande(), PDO::PARAM_INT);
            
            
            // execute the prepared statement
            $stmt->execute();
        }
    }
}
?>
