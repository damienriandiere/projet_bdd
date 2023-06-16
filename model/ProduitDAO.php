<?php
require_once('MysqlConnexion.php');

class ProduitDAO {

    private static $dao;

    private function __construct() {}

    public static function getInstance() {
        if (!isset(self::$dao)) {
            self::$dao = new ProduitDAO();
        }
        return self::$dao;
    }

    public final function findAll(){
        $dbc = Database::getInstance()->getConnection();
        $query = "SELECT * FROM Produit";
        $stmt = $dbc->query($query);
        $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'Produit');
        return $results;
    }

    public final function find($id){
        $dbc = Database::getInstance()->getConnection();
        $query = "SELECT * FROM Produit WHERE id_produit = :id";
        $stmt = $dbc->prepare($query);
        $stmt->bindValue(':id',$id, PDO::PARAM_INT);
        $stmt->execute();
        $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'Produit');
        return $results;
    }

    public final function insert($st){
        if($st instanceof Produit){
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "INSERT INTO Produit ( nom, description, prix, stock, status) VALUES (:n,:d,:p,:s,:st);";
            $stmt = $dbc -> prepare($query);

            // bind the paramaters
            $stmt->bindValue(':n',$st->getNom(), PDO::PARAM_STR);
            $stmt->bindValue(':d',$st->getDescription(), PDO::PARAM_STR);
            $stmt->bindValue(':p',$st->getPrix(), PDO::PARAM_STR);
            $stmt->bindValue(':s',$st->getStock(), PDO::PARAM_INT);
            $stmt->bindValue(':st',$st->getStatus(), PDO::PARAM_STR);
            
            // execute the prepared statement
            $stmt->execute();
        }
    }

    public final function delete($st){
        if($st instanceof Produit){
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "DELETE FROM Produit WHERE id_produit = :id;";
            $stmt = $dbc -> prepare($query);

            // bind the paramaters
            $stmt->bindValue(':id',$st->getId_produit(), PDO::PARAM_INT);

            // execute the prepared statement
            $stmt->execute();
        }
    }

    public final function update($st){
        if($st instanceof Produit){
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "UPDATE Produit SET nom = :n, description = :d, prix = :p, stock = :s, status = :st WHERE id_produit = :id;";
            $stmt = $dbc -> prepare($query);

            // bind the paramaters
            $stmt->bindValue(':n',$st->getNom(), PDO::PARAM_STR);
            $stmt->bindValue(':d',$st->getDescription(), PDO::PARAM_STR);
            $stmt->bindValue(':p',$st->getPrix(), PDO::PARAM_STR);
            $stmt->bindValue(':s',$st->getStock(), PDO::PARAM_INT);
            $stmt->bindValue(':st',$st->getStatus(), PDO::PARAM_STR);
            $stmt->bindValue(':id',$st->getId_produit(), PDO::PARAM_INT);

            // execute the prepared statement
            $stmt->execute();
        }
    }
}

?>
