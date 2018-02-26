<?php
namespace Controller;
use \Core\Controller;
use \Model\UserModel;
use \Core\ORM;
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
        $request = (array) $this->request;
        var_dump( $request);
        $addUser = new UserModel();
        $orm = new ORM();
        $orm->update('users', 5, $request);
        echo "WIN !";

    }
    public function login(){
        $loginUser = new UserModel();
        var_dump($this->request);
        if($loginUser->login($this->request->email, $this->request->password) === true){
            echo "Connected";
        }
        else{
            echo " FAILED TO CONNECT";
        }
            
    }

}
