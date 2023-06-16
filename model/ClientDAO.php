<?php 
require_once('MysqlConnexion.php');

class ClientDAO {

    private static $dao;

    private function __construct() {}

    public final static function getInstance() {
        if(!isset(self::$dao)) {
            self::$dao= new ClientDAO();
        }
        return self::$dao;
    }

    public final function findAll(){
        $dbc = Database::getInstance()->getConnection();
        $query = "SELECT * FROM Client ORDER BY id_client";
        $stmt = $dbc->query($query);
        $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'Client');
        return $results;
    }

    public final function find($st){
        $dbc = Database::getInstance()->getConnection();
        $query = "SELECT * FROM Client WHERE id_client = :id";
        $stmt = $dbc->prepare($query);
        $stmt->bindValue(':id',$st, PDO::PARAM_INT);
        $stmt->execute();
        $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'Client');
        return $results;
    }

    public final function insert($st){
        if($st instanceof Client){
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "INSERT INTO Client (nom, prenom, email, dateNaissance, noBancaire, website, facebook, actif, description, id_adresse, id_telephone, id_membre) VALUES (:n,:p,:e,:d,:b,:w,:f,:a,:des,:ida,:idt,:idm);";
            $stmt = $dbc -> prepare($query);
            
            // bind the paramaters
            $stmt->bindValue(':n',$st->getNom(), PDO::PARAM_STR);
            $stmt->bindValue(':p',$st->getPrenom(), PDO::PARAM_STR);
            $stmt->bindValue(':e',$st->getEmail(), PDO::PARAM_STR);
            $stmt->bindValue(':d',$st->getDateNaissance(), PDO::PARAM_STR);
            $stmt->bindValue(':b',$st->getNoBancaire(), PDO::PARAM_STR);
            $stmt->bindValue(':w',$st->getWebsite(), PDO::PARAM_STR);
            $stmt->bindValue(':f',$st->getFacebook(), PDO::PARAM_STR);
            $stmt->bindValue(':a',$st->getActif(), PDO::PARAM_BOOL);
            $stmt->bindValue(':des',$st->getDescription(), PDO::PARAM_STR);
            $stmt->bindValue(':ida',$st->getId_adresse(), PDO::PARAM_INT);
            $stmt->bindValue(':idt',$st->getId_telephone(), PDO::PARAM_INT);
            $stmt->bindValue(':idm',$st->getId_membre(), PDO::PARAM_INT);
            
            // execute the prepared statement
            $stmt->execute();
        }
    }

    public function delete($st){
        if($st instanceof Client){
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "DELETE FROM Client WHERE id_client = :id;";
            $stmt = $dbc -> prepare($query);
            
            // bind the paramaters
            $stmt->bindValue(':id',$st->getId_client(), PDO::PARAM_INT);
            
            // execute the prepared statement
            $stmt->execute();
        }
    }

    public function update($st){
        if($st instanceof Client){
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "UPDATE Client SET nom = :n, prenom = :p, email = :e, dateNaissance = :d, noBancaire = :b, website = :w, facebook = :f, actif = :a, description = :des, id_adresse = :ida, id_telephone = :idt, id_membre = :idm WHERE id_client = :id;";
            $stmt = $dbc->prepare($query);
            
            // bind the paramaters
            $stmt->bindValue(':n',$st->getNom(), PDO::PARAM_STR);
            $stmt->bindValue(':p',$st->getPrenom(), PDO::PARAM_STR);
            $stmt->bindValue(':e',$st->getEmail(), PDO::PARAM_STR);
            $stmt->bindValue(':d',$st->getDateNaissance(), PDO::PARAM_STR);
            $stmt->bindValue(':b',$st->getNoBancaire(), PDO::PARAM_STR);
            $stmt->bindValue(':w',$st->getWebsite(), PDO::PARAM_STR);
            $stmt->bindValue(':f',$st->getFacebook(), PDO::PARAM_STR);
            $stmt->bindValue(':a',$st->getActif(), PDO::PARAM_STR);
            $stmt->bindValue(':des',$st->getDescription(), PDO::PARAM_STR);
            $stmt->bindValue(':ida',$st->getId_adresse(), PDO::PARAM_INT);
            $stmt->bindValue(':idt',$st->getId_telephone(), PDO::PARAM_INT);
            $stmt->bindValue(':idm',$st->getId_membre(), PDO::PARAM_INT);
            $stmt->bindValue(':id',$st->getId_client(), PDO::PARAM_INT);
            
            // execute the prepared statement
            $stmt->execute();
        }
    }

}
?>