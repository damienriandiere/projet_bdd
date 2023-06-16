<?php
require_once('MysqlConnexion.php');

class ConciergeDAO{
    private static $dao;

    private function __construct() {}

    public final static function getInstance() {
        if(!isset(self::$dao)) {
            self::$dao= new ConciergeDAO();
        }
        return self::$dao;
    }

    public final function findAll(){
        $dbc = Database::getInstance()->getConnection();
        $query = "SELECT * FROM Concierge ORDER BY id_concierge";
        $stmt = $dbc->query($query);
        $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'Concierge');
        return $results;
    }

    public final static function find($email,$password){
        $dbc = Database::getInstance()->getConnection();
        $query = "SELECT * FROM Concierge WHERE email = :email AND password = :password";
        $stmt = $dbc->prepare($query);
        $stmt->bindValue(':email',$email, PDO::PARAM_STR);
        $stmt->bindValue(':password',$password, PDO::PARAM_STR);
        $stmt->execute();
        $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'Concierge');
        if(count($results) == 1){
            return $results[0];
        }
        else{
            return null;
        }
        return $results;
    }

    public final function insert($st){
        if($st instanceof Concierge){
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "INSERT INTO Concierge ( nom, prenom, email, telephone, password,login,actif) VALUES (:n,:p,:e,:t,:mdp,:l,:a);";
            $stmt = $dbc -> prepare($query);
            
            // bind the paramaters
            $stmt->bindValue(':n',$st->getNom(), PDO::PARAM_STR);
            $stmt->bindValue(':p',$st->getPrenom(), PDO::PARAM_STR);
            $stmt->bindValue(':e',$st->getEmail(), PDO::PARAM_STR);
            $stmt->bindValue(':t',$st->getTelephone(), PDO::PARAM_STR);
            $stmt->bindValue(':mdp',$st->getPassword(), PDO::PARAM_STR);
            $stmt->bindValue(':l',$st->getLogin(), PDO::PARAM_STR);
            $stmt->bindValue(':a',$st->getActif(), PDO::PARAM_INT);
            
            // execute the prepared statement
            $stmt->execute();
        }
    }

    public final function delete($st){
        if($st instanceof Concierge){
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "DELETE FROM Concierge WHERE id_concierge = :id;";
            $stmt = $dbc -> prepare($query);
            
            // bind the paramaters
            $stmt->bindValue(':id',$st->getId_concierge(), PDO::PARAM_INT);
            
            // execute the prepared statement
            $stmt->execute();
        }
    }

    public final function update($st){
        if($st instanceof Concierge){
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "UPDATE Concierge SET nom = :n, prenom = :p, email = :e, telephone = :t, motDePasse = :mdp, login = :l, actif = :a WHERE id_concierge = :id;";
            $stmt = $dbc -> prepare($query);

            // bind the paramaters
            $stmt->bindValue(':n',$st->getNom(), PDO::PARAM_STR);
            $stmt->bindValue(':p',$st->getPrenom(), PDO::PARAM_STR);
            $stmt->bindValue(':e',$st->getEmail(), PDO::PARAM_STR);
            $stmt->bindValue(':t',$st->getTelephone(), PDO::PARAM_STR);
            $stmt->bindValue(':mdp',$st->getPassword(), PDO::PARAM_STR);
            $stmt->bindValue(':l',$st->getLogin(), PDO::PARAM_STR);
            $stmt->bindValue(':a',$st->getActif(), PDO::PARAM_INT);
            $stmt->bindValue(':id',$st->getId_concierge(), PDO::PARAM_INT);

            // execute the prepared statement
            $stmt->execute();
        }
    }
}
?>