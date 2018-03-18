<?php
namespace Controller;

use \Core\Controller;
use \Model\FilmModel;
use \Model\UserModel;
use \Model\AbonnementModel;
use \Model\MembreModel;
use \Model\GenreModel;
use \Model\DistribModel;
use \Model\HistoriqueModel;

class MembreController extends Controller
{
    public function index(){
        $membre = new MembreModel($this->params);
        
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $regpage = 20;
        $ini = ($page>1) ? (($page * $regpage)-$regpage) : 0; 
        $nb_pages = ceil($membre->nb_pages(['WHERE'=>"1"]) / $regpage);
        
        $email = "";
        if(isset($this->params['email'])){
            $email = $this->params['email'];
        }

        $membreList = $membre->listMembre([
            "WHERE" => "users.email LIKE '%" . $email . "%'", 
            "ORDER BY" => 'membres.id_membre',
            "LIMIT" => $ini . "," . $regpage
            ]);

        $this->render('index', 
        [
            'membreList' => $membreList,
            "page" => $page,
            'nb_pages' => $nb_pages
        ]);
    }

    public function info(){
        $membre = new MembreModel($this->params);

        $membreDetail = $membre->listMembre([
            "WHERE" => 'membres.id_membre =' . $_GET['id_membre']
        ]);
        
        $historique = new HistoriqueModel($this->params);
        $historiqueMembre = $historique->filmHistorique( $_GET['id_membre']);

        $this->render('info', ['membreDetail' => $membreDetail[0], 'historiqueMembre' => $historiqueMembre]);
    }

    public function deleteFilm(){
        $historique = new HistoriqueModel($this->params);
        $delHistorique = $historique->deleteFilm($_GET["id_membre"], $_GET['id_film']);

        header('Location: /PiePHP/membre/info?id_membre='.$_GET['id_membre']);
    }
    public function addFilm(){
        $historique = new HistoriqueModel($this->params);
        $addHist = $historique->save();
        header('Location: /PiePHP/membre/info?id_membre='.$_GET['id_membre']);
        
    }
}