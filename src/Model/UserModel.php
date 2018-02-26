<?php
namespace Model;
use \Core\ORM;
use \Core\Database;
use \Core\Entity;
class UserModel extends Entity
{
    private $_email;
    private $_password;
    protected $_db;

    public function __construct(){
        $this->_db = new Database();
        $this->_db = $this->_db->getConnection();
    }

    public function save($email, $password){

        $sql = "INSERT INTO users (email, password) VALUES ('".$email."','". $password ."')";
        $stmt = $this->_db->prepare($sql);
        $stmt->execute();
        return $this->_db->lastInsertId();
    }

    public function login($email, $password){
        
        $sql = "SELECT * FROM users";   
        $stmt = $this->_db->query($sql);
        $row = $stmt->fetchAll();

        for($i = 0; $i < count($row); $i++){
            if($row[$i]['email'] === $email && $row[$i]['password'] === $password){
                return true;
            }
            else {
                return false;
            }
        }
    }

    public function create($email, $password){
        $sql = "INSERT INTO users (email, password) VALUES ('".$email."','". $password ."')";
        $stmt = $this->_db->prepare($sql);
        $stmt->execute();
        return $this->_db->lastInsertId(); 
    }
    public function read($id){
        $sql = "SELECT * FROM users WHERE id =" . $id;
        $stmt = $this->_db->query($sql);
        $row = $stmt->fetchAll();
        return $row;
    }
    public function update($email, $password, $id){
        $sql = "UPDATE users SET email = " . $email . ", password =" . $password . " WHERE id = " .$id;
        $stmt = $this->_db->prepare($sql);
        $stmt->exectute(); 
    }
    public function delete($id){
        $sql = "DELETE from users WHERE id=". $id;
        $stmt = $this->_db->prepare($sql);
        $stmt->exectute();
    }
    public function read_all(){
        $sql = "SELECT * FROM users";
        $stmt = $this->_db->query($sql);
        $row = $stmt->fetchAll();
        return $row;
    }
    
}
