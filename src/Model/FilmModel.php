<?php
namespace Model;
use \Core\Entity;
use \Core\Database;
class FilmModel extends Entity
{
    public function searchFilm($params){
        $sql = "SELECT films.titre, films.id_genre, films.id_distrib, genres.nom_genre, distribs.nom_distrib, films.id_film FROM films LEFT JOIN genres ON genres.id_genre = films.id_genre LEFT JOIN distribs ON distribs.id_distrib = films.id_distrib ";
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