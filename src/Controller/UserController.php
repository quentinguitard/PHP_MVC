<?php
namespace Controller;

use \Core\Controller;
use \Model\UserModel;

class UserController extends Controller
{
    
    public function index(){
        $this->render('login');
    }

    public function register()
    {
        $this->render('register', []);
    }

    public function registerAction(){
        var_dump($this->params);
        if(!isset($_SESSION['idUser'])){
            $addUser = new UserModel($this->params);
            $_SESSION['idUser'] = $addUser->save();
        }else {
            $addUser = new UserModel($this->params, $_SESSION['idUser']);
            $addUser->save();
        }
        var_dump($_SESSION['idUser']);
        echo "WIN !";

    }
    public function login(){

        $loginUser = new UserModel($this->params);
        var_dump($this->request);

        $authUser= $loginUser->find(["WHERE" => "email = '" . $this->request->email ."'"]);

        if($authUser[0]['email'] === $this->request->email && $authUser[0]['password'] === $this->request->password){
            echo "Connected";
            $_SESSION['idUser'] = $authUser[0]['id'];
        }
        else{
            echo " FAILED TO CONNECT";
        }
            
    }

    public function logout(){
        session_destroy();
    }

    public function test(){
        $this->render('test');
    }
}
