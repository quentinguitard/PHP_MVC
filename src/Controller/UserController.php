<?php

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
        $addUser = new UserModel();
        $addUser->save($_POST['email'], $_POST['password']);
        var_dump($_POST);
        echo "registerAction";

    }
    public function login(){
        $loginUser = new UserModel();
        var_dump($_POST);
        if($loginUser->login($_POST['email'], $_POST['password']) === true){
            echo "Connected";
        }
        else{
            echo " FAILED TO CONNECT";
        }
            
    }

}
