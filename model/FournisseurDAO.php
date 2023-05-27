<?php
require_once('MysqlConnexion.php');

class FournisseurDAO {
    private static $dao;

    private function __construct() {}

    public final static function getInstance() {
        if(!isset(self::$dao)) {
            self::$dao= new FournisseurDAO();
        }
        return self::$dao;
    }

    public final function findAll(){
        $dbc = Database::getInstance()->getConnection();
        $query = "SELECT * FROM Fournisseur ORDER BY id_fournisseur";
        $stmt = $dbc->query($query);
        $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'Fournisseur');
        return $results;
    }

    public final function insert($st){
        if($st instanceof Fournisseur){
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "INSERT INTO Fournisseur ( nom, adresse, telephone, email, libelle) VALUES (:n,:a,:t,:e,:l);";
            $stmt = $dbc -> prepare($query);
            
            // bind the paramaters
            $stmt->bindValue(':n',$st->getNom(), PDO::PARAM_STR);
            $stmt->bindValue(':a',$st->getAdresse(), PDO::PARAM_STR);
            $stmt->bindValue(':t',$st->getTelephone(), PDO::PARAM_STR);
            $stmt->bindValue(':e',$st->getEmail(), PDO::PARAM_STR);
            $stmt->bindValue(':l',$st->getLibelle(), PDO::PARAM_STR);
            
            // execute the prepared statement
            $stmt->execute();
        }
    }

    public final function delete($st){
        if($st instanceof Fournisseur){
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "DELETE FROM Fournisseur WHERE id_fournisseur = :id;";
            $stmt = $dbc -> prepare($query);
            
            // bind the paramaters
            $stmt->bindValue(':id',$st->getId_fournisseur(), PDO::PARAM_INT);
            
            // execute the prepared statement
            $stmt->execute();
        }
    }

    public final function update($st){
        if($st instanceof Fournisseur){
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "UPDATE Fournisseur SET nom = :n, adresse = :a, telephone = :t email = :e, libelle = :l WHERE id_fournisseur = :id;";
            $stmt = $dbc -> prepare($query);
            
            // bind the paramaters
            $stmt->bindValue(':id',$st->getId_fournisseur(), PDO::PARAM_INT);
            $stmt->bindValue(':n',$st->getNom(), PDO::PARAM_STR);
            $stmt->bindValue(':a',$st->getAdresse(), PDO::PARAM_STR);
            $stmt->bindValue(':t',$st->getTelephone(), PDO::PARAM_STR);
            $stmt->bindValue(':e',$st->getEmail(), PDO::PARAM_STR);
            $stmt->bindValue(':l',$st->getLibelle(), PDO::PARAM_STR);

            // execute the prepared statement
            $stmt->execute();

        }
    }
}
?>

