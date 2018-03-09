<?php
namespace Controller;

use \Core\Controller;
use \Model\FilmModel;
use \Model\UserModel;
use \Model\AbonnementModel;
use \Model\MembreModel;
use \Model\GenreModel;
use \Model\DistribModel;

class FilmController extends Controller
{
    public function index(){
        $genre = new GenreModel($this->params);
        $allGenre = $genre->find(['WHERE' => '1']);
        
        $distrib = new DistribModel($this->params);
        $allDistrib = $distrib->find(['WHERE' => '1']);

        $this->render('index', [
            'allGenre' => $allGenre, 
            'allDistrib' => $allDistrib
            ]);
    }

    public function searchFilm(){

        $genre = new GenreModel($this->params);
        $allGenre = $genre->find(['WHERE' => '1']);
        
        $distrib = new DistribModel($this->params);
        $allDistrib = $distrib->find(['WHERE' => '1']);

        $film = new FilmModel($this->params);
        
        var_dump($this->params);

        if(isset($this->params['id_genre']) && $this->params['id_genre'] != 'Choisir genre'){
            $genreId = ' AND genres.id_genre = ' . $this->params["id_genre"];
        }
        else{
            $genreId = "";
        }
        if(isset($this->params['id_distrib']) && $this->params['id_distrib'] != 'Choisir distributeur'){
            $distribId = ' AND distribs.id_distrib = ' . $this->params['id_distrib'];
        }
        else{
            $distribId = "";
        }

        $filmSearch = $film->searchFilm([
            'WHERE'=>"titre LIKE '%" . $this->params['searchFilm'] . "%'" . $genreId . $distribId,
            "ORDER BY" => "films.id_film",
            "LIMIT" => "10"
             ]);
        //var_dump($filmSearch);

        $this->render('index', [
            'allGenre' => $allGenre, 
            'allDistrib' => $allDistrib, 
            "filmSearch" => $filmSearch
            ]);
    }
    
    public function filmInfo(){

        $film = new FilmModel($this->params, $_GET['id_film']);
        $filmInfo = $film->read();

        $genre = new GenreModel($this->params, $filmInfo[0]['id_genre']);
        $genreNom = $genre->read();

        $distribNom = "";

        if(isset($filmInfo[0]['id_distrib'])){
            $distrib = new DistribModel($this->params, $filmInfo[0]['id_distrib']);
            $distribNom = $distrib->read();
        }

        $this->render('info', [
            'filmInfo' => $filmInfo[0],
            'genreNom' => $genreNom[0],
            'distribNom' => $distribNom
            ]);
    }
}