<?php

class UserController
{
    Private $_email;
    Private $_password;
    
    function __construct($email, $password){
        $this->setEmail($email);
        $this->setPassword($password);
    }


    public function getEmail(){
		return $this->_email;
    }
    public function getPassword(){
        return $this->_password;
    }
    public function setEmail($email){
         $this->_email = $email;
    }
    public function setPassword($password){
        $this->_password = $password;
    }
}
