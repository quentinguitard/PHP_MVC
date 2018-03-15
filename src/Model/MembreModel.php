<?php
namespace Model;
use \Core\Entity;
use \Core\Database;

class MembreModel extends Entity
{
    public function listMembre($params){
        $sql = "SELECT membres.id_membre, membres.id_user, membres.id_abonnement, users.nom as 'nomUser',
        users.prenom as 'prenomUser', users.date_naissance, users.email, users.adresse, users.cpostal, users.ville, abonnements.nom as 'nomAbo' 
        FROM membres 
        JOIN abonnements ON membres.id_abonnement = abonnements.id_abonnement 
        JOIN users ON membres.id_user = users.id_user";
        
        foreach($params as $key => $value){
            $sql.= " " . $key . " " . $value;
        }
        var_dump($sql);

        $db = new Database();
        $stmt = $db->getConnection()->query($sql);
        $row = $stmt->fetchAll();
        return $row;
    }

}