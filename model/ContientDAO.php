<?php
require_once('MysqlConnexion.php');

class ContientDAO {
    private static $dao;

    private function __construct() {}

    public final static function getInstance() {
        if(!isset(self::$dao)) {
            self::$dao= new ContientDAO();
        }
        return self::$dao;
    }

    public final function findAll(){
        $dbc = Database::getInstance()->getConnection();
        $query = "SELECT * FROM Contient ORDER BY id_commande";
        $stmt = $dbc->query($query);
        $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'Contient');
        return $results;
    }

    public final function insert($st){
        if($st instanceof Contient){
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "INSERT INTO Contient (id_commande, id_produit, quantite,status,remarque,prixVente,dateLivraison) VALUES (:idc,:idp,:q,:s,:r,:pv,:dl);";
            $stmt = $dbc -> prepare($query);
            
            // bind the paramaters
            $stmt->bindValue(':idc',$st->getId_commande(), PDO::PARAM_INT);
            $stmt->bindValue(':idp',$st->getId_produit(), PDO::PARAM_INT);
            $stmt->bindValue(':q',$st->getQuantite(), PDO::PARAM_INT);
            $stmt->bindValue(':s',$st->getStatus(), PDO::PARAM_STR);
            $stmt->bindValue(':r',$st->getRemarque(), PDO::PARAM_STR);
            $stmt->bindValue(':pv',$st->getPrixVente(), PDO::PARAM_INT);
            $stmt->bindValue(':dl',$st->getDateLivraison(), PDO::PARAM_STR);

            // execute the prepared statement
            $stmt->execute();
        }
    }

    public final function delete($st){
        if($st instanceof Contient){
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "DELETE FROM Contient WHERE id_contient= ic AND id_commande = :idc AND id_produit = :idp;";
            $stmt = $dbc -> prepare($query);
            
            // bind the paramaters
            $stmt->bindValue(':ic',$st->getId_contient(), PDO::PARAM_INT);
            $stmt->bindValue(':idc',$st->getId_commande(), PDO::PARAM_INT);
            $stmt->bindValue(':idp',$st->getId_produit(), PDO::PARAM_INT);
            
            // execute the prepared statement
            $stmt->execute();
        }
    }

    public final function update($st){
        if($st instanceof Contient){
            $dbc = Database::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "UPDATE Contient SET quantite = :q, status = :s,remarque = :rem,prixVente = :pv,dateLivraison = :dl WHERE id_contient= ic AND id_commande = :idc AND id_produit = :idp;";
            $stmt = $dbc -> prepare($query);
            
            // bind the paramaters
            $stmt->bindValue(':ic',$st->getId_contient(), PDO::PARAM_INT);
            $stmt->bindValue(':idc',$st->getId_commande(), PDO::PARAM_INT);
            $stmt->bindValue(':idp',$st->getId_produit(), PDO::PARAM_INT);
            $stmt->bindValue(':q',$st->getQuantite(), PDO::PARAM_INT);
            $stmt->bindValue(':s',$st->getStatus(), PDO::PARAM_STR);
            $stmt->bindValue(':rem',$st->getRemarque(), PDO::PARAM_STR);
            $stmt->bindValue(':pv',$st->getPrixVente(), PDO::PARAM_INT);
            $stmt->bindValue(':dl',$st->getDateLivraison(), PDO::PARAM_STR);

            // execute the prepared statement
            $stmt->execute();
        }
    }
}
?>
