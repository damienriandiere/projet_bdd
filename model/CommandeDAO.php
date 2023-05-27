<?php
require_once('MysqlConnexion.php');

class CommandeDAO {
    private static $dao;

    private function __construct() {}

    public final static function getInstance() {
        if(!isset(self::$dao)) {
            self::$dao= new CommandeDAO();
        }
        return self::$dao;
    }

    public final function findAll(){
        $dbc = Database::getInstance()->getConnection();
        $query = "SELECT * FROM Commande ORDER BY id_commande";
        $stmt = $dbc->query($query);
        $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'Commande');
        return $results;
    }

    public final function insert($st){
        if($st instanceof Commande){
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "INSERT INTO Commande ( dateCommande, id_client, dateReception, statut) VALUES (:d,:i,:dr,:s);";
            $stmt = $dbc -> prepare($query);
            
            // bind the paramaters
            $stmt->bindValue(':d',$st->getDateCommande(), PDO::PARAM_STR);
            $stmt->bindValue(':i',$st->getId_client(), PDO::PARAM_INT);
            $stmt->bindValue(':dr',$st->getDateReception(), PDO::PARAM_STR);
            $stmt->bindValue(':s',$st->getStatut(), PDO::PARAM_STR);
            
            // execute the prepared statement
            $stmt->execute();
        }
    }

    public final function delete($st){
        if($st instanceof Commande){
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "DELETE FROM Commande WHERE id_commande = :id;";
            $stmt = $dbc -> prepare($query);
            
            // bind the paramaters
            $stmt->bindValue(':id',$st->getId_commande(), PDO::PARAM_INT);
            
            // execute the prepared statement
            $stmt->execute();
        }
    }

    public final function update($st){
        if($st instanceof Commande){
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "UPDATE Commande SET dateCommande = :d, id_client = :i, dateReception = :dr, statut = :s WHERE id_commande = :id;";
            $stmt = $dbc->prepare($query);
            
            // bind the paramaters
            $stmt->bindValue(':d',$st->getDateCommande(), PDO::PARAM_STR);
            $stmt->bindValue(':i',$st->getId_client(), PDO::PARAM_INT);
            $stmt->bindValue(':dr',$st->getDateReception(), PDO::PARAM_STR);
            $stmt->bindValue(':s',$st->getStatut(), PDO::PARAM_STR);
            $stmt->bindValue(':id',$st->getId_commande(), PDO::PARAM_INT);

            // execute the prepared statement
            $stmt->execute();

        }
    }
}
?>