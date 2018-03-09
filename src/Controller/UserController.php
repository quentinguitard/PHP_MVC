<?php
namespace Controller;

use \Core\Controller;
use \Model\UserModel;
use \Model\AbonnementModel;
use \Model\MembreModel;

class UserController extends Controller
{
    
    public function index(){
        $this->render('index');
    }

    public function register()
    {
        $abo = new AbonnementModel($this->params);
        $aboList = $abo->find(["WHERE"=>"1"]);
        $this->render('register', ["aboList" => $aboList]);
    }


    public function registerAction(){
        var_dump($this->params);
        $idAbo = $this->params['id_abonnement'];

        if(!isset($_SESSION['idUser'])){
            
            unset($this->params['id_abonnement']);
            $addUser = new UserModel($this->params);

            if($addUser->find(['WHERE' => "email = '" . $this->request->email . "'"])[0]['email'] != $this->request->email && !empty($this->request->email) && !empty($this->request->password) &&  !empty($this->request->nom) && !empty($this->request->prenom) && !empty($this->request->ville) &&  !empty($this->request->cpostal) && !empty($this->request->date_naissance)){

                $_SESSION['idUser'] = $addUser->save();
    
                $addMembre = new MembreModel(['id_abonnement'=>$idAbo, 'id_user'=>$_SESSION['idUser']]);
                $addMembre->save();
    
                header('Location: /PiePHP/');
            }
            else{
                header('Location: /PiePHP/user/register');
            }

        }else {
            $addUser = new UserModel($this->params, $_SESSION['idUser']);
            $addUser->save();
        }
    }

    public function userLogin(){
        $this->render('login');
    }


    public function login(){
        $loginUser = new UserModel($this->params);
        
        $authUser = $loginUser->find(["WHERE" => "email = '" . $this->request->email ."'"]);

        if($authUser[0]['email'] === $this->request->email && $authUser[0]['password'] === $this->request->password){
            echo "Connected";
            $_SESSION['idUser'] = $authUser[0]['id_user'];
            $this->render('index');
        }
        else{
            echo " FAILED TO CONNECT";
        }
            
    }

    public function profile(){
        
        $profile = new UserModel($this->params, $_SESSION['idUser']);
        $userProfile = $profile->read();
        //var_dump($userProfile);

        $membre = new MembreModel($this->params);
        $membreDetails = $membre->find(['WHERE' => 'id_user = '. $_SESSION['idUser'] ]);

        $abo = new AbonnementModel($this->params, $membreDetails[0]['id_abonnement']);
        $aboList = $abo->find(["WHERE"=>"1"]);
        $aboUser = $abo->read();

        $this->render('profile', ['userProfile' => $userProfile[0] , "aboList" => $aboList, 'aboUser'=>$aboUser[0]]);
    }

    public function editProfile(){
        
        $idAbo = $this->params['id_abonnement'];
        unset($this->params['id_abonnement']);
        $membre = new MembreModel(['id_abonnement'=>$idAbo]);
        $findMembre = $membre->find(['WHERE' => 'id_user = '.$_SESSION['idUser']]);
        var_dump($findMembre);
        
        if(empty($this->request->password)){
            unset($this->params['password']);
        }

        $profile = new UserModel($this->params, $_SESSION['idUser']);
        $authUser = $profile->find(["WHERE" => "email = '" . $this->request->email ."'"]);
        $readProfile = $profile->read();
        
        if(!empty($this->request->email) &&  !empty($this->request->nom) && !empty($this->request->prenom) && !empty($this->request->ville) &&  !empty($this->request->cpostal)){
           if($readProfile[0]['email'] == $this->request->email || $authUser[0]['email'] != $this->request->email){
               $userProfile = $profile->save();
               $membre = new MembreModel(['id_abonnement'=>$idAbo], $findMembre[0]['id_membre']);
               $updateMembre = $membre->save();
               header('Location: /PiePHP/user/profile');           
            }
           else{
               header('Location: /PiePHP/user/profile');
           }        
        }
    }

    public function logout(){
        session_destroy();
        header('Location: /PiePHP/');
    }

    public function test(){
        $this->render('test');
    }
}
