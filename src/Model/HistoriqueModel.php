<?php
namespace Model;
use \Core\Entity;
use \Core\Database;

class HistoriqueModel extends Entity
{
    public function filmHistorique($id_membre){
        $sql = "SELECT * FROM historiques JOIN films on historiques.id_film = films.id_film WHERE historiques.id_membre = " .$id_membre;
        $db = new Database();
        $stmt = $db->getConnection()->query($sql);
        $row = $stmt->fetchAll();
        return $row;        
    }
    public function deleteFilm($id_membre,$id_film){
        $sql = 'DELETE FROM historiques WHERE id_membre='.$id_membre.' AND id_film='. $id_film;
        $db = new Database();
        $stmt = $db->getConnection()->prepare($sql);
        $stmt->execute();
    }

}