<?php
namespace Controller;

use \Core\Controller;
use \Model\FilmModel;
use \Model\UserModel;
use \Model\AbonnementModel;
use \Model\MembreModel;
use \Model\GenreModel;
use \Model\DistribModel;

class GenreController extends Controller
{
    public function index(){
        $genre = new GenreModel($this->params);
        $allGenre = $genre->find([
            'WHERE' => '1',
            'ORDER BY' => 'nom_genre'
            ]);
        
        if(isset($_GET['id_genre'])){
            $genre = new GenreModel($this->params, $_GET['id_genre']);
            $genreDetail = $genre->read();
            //var_dump($genreDetail);
            $this->render('index', [
                'allGenre' => $allGenre,
                'genreDetail' => $genreDetail[0],
                ]);
        }
        else{
            $this->render('index', [
                'allGenre' => $allGenre,
                ]);
        }
    }
    public function editGenre(){
        var_dump($this->params);
        $genre = new GenreModel($this->params, $this->request->id_genre);
        $genreUpdate = $genre->save();
        header("Location: /PiePHP/genre");
        exit();
    }
    public function add(){
        $genre = new GenreModel($this->params);
        $genreUpdate = $genre->save();
        header("Location: /PiePHP/genre");
        exit();
    }
    public function delete(){
        $genre = new GenreModel($this->params, $_GET['id_genre']);
        $genreDelete = $genre->delete();
        header("Location: /PiePHP/genre");
        exit();

    }
}