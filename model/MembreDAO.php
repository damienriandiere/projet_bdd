<?php
require_once('MysqlConnexion.php');

class MembreDAO {

    private static $dao;

    private function __construct() {}

    public final static function getInstance() {
        if(!isset(self::$dao)) {
            self::$dao= new MembreDAO();
        }
        return self::$dao;
    }

    public final function findAll(){
        $dbc = Database::getInstance()->getConnection();
        $query = "SELECT * FROM Membre ORDER BY id_membre";
        $stmt = $dbc->query($query);
        $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'Membre');
        return $results;
    }

    public final function insert($st){
        if($st instanceof Membre){
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "INSERT INTO Membre ( description, dateMembre, pointMin, pointMax, seuil, id_type_regle) VALUES (:des,:dm,:pm,:pM,:s,:itr);";
            $stmt = $dbc -> prepare($query);
            
            // bind the paramaters
            $stmt->bindValue(':des',$st->getDescription(), PDO::PARAM_STR);
            $stmt->bindValue(':dm',$st->getDateMembre(), PDO::PARAM_STR);
            $stmt->bindValue(':pm',$st->getPointMin(), PDO::PARAM_INT);
            $stmt->bindValue(':pM',$st->getPointMax(), PDO::PARAM_INT);
            $stmt->bindValue(':s',$st->getSeuil(), PDO::PARAM_INT);
            $stmt->bindValue(':itr',$st->getId_type_regle(), PDO::PARAM_INT);
            
            // execute the prepared statement
            $stmt->execute();
        }
    }

    public final function delete($st){
        if($st instanceof Membre){
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "DELETE FROM Membre WHERE id_membre = :id;";
            $stmt = $dbc -> prepare($query);
            
            // bind the paramaters
            $stmt->bindValue(':id',$st->getId_membre(), PDO::PARAM_INT);
            
            // execute the prepared statement
            $stmt->execute();
        }
    }

    public final function update($st){
        if($st instanceof Membre){
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "UPDATE Membre SET description = :des, dateMembre = :dm, pointMin = :pm, pointMax = :pM, seuil = :s, id_type_regle = :itr WHERE id_membre = :id;";
            $stmt = $dbc -> prepare($query);
            
            // bind the paramaters
            $stmt->bindValue(':des',$st->getDescription(), PDO::PARAM_STR);
            $stmt->bindValue(':dm',$st->getDateMembre(), PDO::PARAM_STR);
            $stmt->bindValue(':pm',$st->getPointMin(), PDO::PARAM_INT);
            $stmt->bindValue(':pM',$st->getPointMax(), PDO::PARAM_INT);
            $stmt->bindValue(':s',$st->getSeuil(), PDO::PARAM_INT);
            $stmt->bindValue(':itr',$st->getId_type_regle(), PDO::PARAM_INT);
            $stmt->bindValue(':id',$st->getId_membre(), PDO::PARAM_INT);
            
            // execute the prepared statement
            $stmt->execute();
        }
    }

    public final function find($id){
        $dbc = Database::getInstance()->getConnection();
        $query = "SELECT * FROM Membre WHERE id_membre = :id;";
        $stmt = $dbc -> prepare($query);
        $stmt->bindValue(':id',$id, PDO::PARAM_INT);
        $stmt->execute();
        $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'Membre');
        return $results;
    }

}
?>
