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
            'allDistrib' => $allDistrib,
            ]);
    }

    public function searchFilm(){
        //var_dump($this->params);
        $genre = new GenreModel($this->params);
        $allGenre = $genre->find(['WHERE' => '1']);
        
        $distrib = new DistribModel($this->params);
        $allDistrib = $distrib->find(['WHERE' => '1']);

        $film = new FilmModel($this->params);

        /* ---- GESTION RECHERCHE GENRE ---- */

        if(!isset($this->params['id_genre'])){
            if(isset($_SESSION['id_genre'])){
                $this->params['id_genre'] = $_SESSION['id_genre'];
            }
        }
        if(isset($_SESSION['id_genre'])){
            if(isset($this->params['id_genre']) && $this->params['id_genre'] == 'Choisir genre' || $_SESSION['id_genre'] != $this->params['id_genre']){
                unset($_SESSION['id_genre']);
            }
        }
       
        if(isset($this->params['id_genre']) && $this->params['id_genre'] != 'Choisir genre'){
            $_SESSION['id_genre'] = $this->params["id_genre"];
            $genreId = ' AND films.id_genre = ' . $this->params['id_genre'];
        }
        else{
            $genreId = "";
        }

        /* ---- GESTION RECHERCHE DISTRIB ---- */

        if(!isset($this->params['id_distrib'])){
            if(isset($_SESSION['id_distrib'])){
                $this->params['id_distrib'] = $_SESSION['id_distrib'];
            }
        }
        if(isset($_SESSION['id_distrib'])){
            if(isset($this->params['id_distrib']) && $this->params['id_distrib'] == 'Choisir distributeur' || $_SESSION['id_distrib'] != $this->params['id_distrib']){
                unset($_SESSION['id_distrib']);
            }
        }
        if(isset($this->params['id_distrib']) && $this->params['id_distrib'] != 'Choisir distributeur'){
            $_SESSION['id_distrib'] = $this->params["id_distrib"];
            $distribId = ' AND films.id_distrib = ' . $this->params['id_distrib'];
        }
        else{
            $distribId = "";
        }

        /* ---- GESTION RECHERCHE SEARCH ---- */

        if(isset($this->params['searchFilm'])){
            $_SESSION['searchFilm'] = $this->params['searchFilm'];
        }
        else {
            $this->params['searchFilm'] = $_SESSION['searchFilm'];
        }

        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $regpage = 20;
        $ini = ($page>1) ? (($page * $regpage)-$regpage) : 0;   

        $filmSearch = $film->searchFilm([
            'WHERE'=>"titre LIKE '%" . $_SESSION['searchFilm'] . "%'" . $genreId . $distribId,
            "ORDER BY" => "films.id_film",
            "LIMIT" => $ini . "," . $regpage
             ]);

        $nb_pages = ceil($film->nb_pages([
            'WHERE'=>"titre LIKE '%" . $_SESSION['searchFilm'] . "%'" . $genreId . $distribId,
            "ORDER BY" => "films.id_film"
             ]) / $regpage);

            //var_dump($nb_pages);

        $this->render('index', [
            'allGenre' => $allGenre, 
            'allDistrib' => $allDistrib, 
            "filmSearch" => $filmSearch,
            "page" => $page,
            'nb_pages' => $nb_pages
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

    public function editFilm(){
        $genre = new GenreModel($this->params);
        $allGenre = $genre->find(['WHERE' => '1']);
        
        $distrib = new DistribModel($this->params);
        $allDistrib = $distrib->find(['WHERE' => '1']);

        $film = new FilmModel($this->params, $_GET['id_film']);
        $filmInfo = $film->read();

        $genre = new GenreModel($this->params, $filmInfo[0]['id_genre']);
        $genreNom = $genre->read();

        $distribNom = "";

        if(isset($filmInfo[0]['id_distrib'])){
            $distrib = new DistribModel($this->params, $filmInfo[0]['id_distrib']);
            $distribNom = $distrib->read();
        }
        
        $this->render('edit', [
            'allGenre' => $allGenre, 
            'allDistrib' => $allDistrib,
            'filmInfo' => $filmInfo[0],
            'genreNom' => $genreNom[0],
            'distribNom' => $distribNom
            ]);        
    }
    public function edit(){
        
        $id_film = $this->params['id_film'];
        unset($this->params['id_film']);

        if($this->params['id_genre'] == "none"){
            unset( $this->params['id_genre'] );
        }
        if($this->params['id_distrib'] == "none"){
            unset( $this->params['id_distrib'] );
        }
        //var_dump($this->params);

        $film = new FilmModel($this->params, $id_film);
        $filmEdit = $film->save();

        header('Location: /PiePHP/film/filmInfo?id_film=' . $id_film );
        exit();
    }

    public function addForm(){
        $genre = new GenreModel($this->params);
        $allGenre = $genre->find(['WHERE' => '1']);
        
        $distrib = new DistribModel($this->params);
        $allDistrib = $distrib->find(['WHERE' => '1']);

        $this->render('add', [
            'allGenre' => $allGenre, 
            'allDistrib' => $allDistrib]);
    }

    public function addFilm(){
        if($this->params['id_genre'] == "none"){
            unset( $this->params['id_genre'] );
        }
        if($this->params['id_distrib'] == "none"){
            unset( $this->params['id_distrib'] );
        }
        //var_dump($this->params);
        $film = new FilmModel($this->params);
        $filmAdd = $film->save();

        header('Location: /PiePHP/film/filmInfo?id_film=' . $filmAdd );
        exit();
    }

    public function deleteFilm(){
        $film = new FilmModel($this->params, $_GET['id_film']);
        $deleteFilm = $film->delete();

        header('Location: /PiePHP/film' );
        exit();
    }

}